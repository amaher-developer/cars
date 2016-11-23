<?php

include 'prepare.php';

$userid = $_SESSION['user']['userid'];//(int)$_GET['id'];
$type = (int)$_GET['t'];
// type = 1 subscription
// type = 2 lifetime

//$type = 2;
$buyamount = Globals::$buyamount;

// STEP 1: read POST data
 
// Reading POSTed data directly from $_POST causes serialization issues with array data in the POST.
// Instead, read raw POST data from the input stream. 
$raw_post_data = file_get_contents('php://input');
$raw_post_array = explode('&', $raw_post_data);
$myPost = array();
foreach ($raw_post_array as $keyval) {
  $keyval = explode ('=', $keyval);
  if (count($keyval) == 2)
     $myPost[$keyval[0]] = urldecode($keyval[1]);
}
// read the IPN message sent from PayPal and prepend 'cmd=_notify-validate'
$req = 'cmd=_notify-validate';
if(function_exists('get_magic_quotes_gpc')) {
   $get_magic_quotes_exists = true;
} 
foreach ($myPost as $key => $value) {        
   if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) { 
        $value = urlencode(stripslashes($value)); 
   } else {
        $value = urlencode($value);
   }
   $req .= "&$key=$value";
}
 
 
// STEP 2: POST IPN data back to PayPal to validate
 
$ch = curl_init('https://www.paypal.com/cgi-bin/webscr');
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
 
// In wamp-like environments that do not come bundled with root authority certificates,
// please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set 
// the directory path of the certificate as shown below:
// curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
if( !($res = curl_exec($ch)) ) {
    // error_log("Got " . curl_error($ch) . " when processing IPN data");
    curl_close($ch);
    exit;
}
curl_close($ch);
 
 
// STEP 3: Inspect IPN validation result and act accordingly
 
if (strcmp ($res, "VERIFIED") == 0) {
    // The IPN is verified, process it:
    // check whether the payment_status is Completed
    // check that txn_id has not been previously processed
    // check that receiver_email is your Primary PayPal email
    // check that payment_amount/payment_currency are correct
    // process the notification
 
    // assign posted variables to local variables
    $item_name = $_POST['item_name'];
    $item_number = $_POST['item_number'];
    $payment_status = $_POST['payment_status'];
    $payment_amount = $_POST['mc_gross'];
    $payment_currency = $_POST['mc_currency'];
    $txn_id = $_POST['txn_id'];
    $receiver_email = $_POST['receiver_email'];
    $payer_email = $_POST['payer_email'];
    
    $paypal = 'Item Name: '.$item_name.', '.'Item Number: '.$item_number.', Payment Status: '.$payment_status.', Payment Currency: '.$payment_currency.', Txn ID: '.$txn_id.', Receiver Email: '.$receiver_email.', Payer Email: '.$payer_email;
    
    
    $fetch = new Order('select * from orders');
    $fetch->addCondition('userid = "'.$userid.'" ');
    $fetch->addOrderBy('orderid desc');
    $fetch->prepare();
    $order = $fetch->getSingleRecord();
    
    if($order) 
        $dateFrom = $order['dateTo'];
    else
        $dateFrom = time();
    
    
    if($type == 2)
        $dateTo = strtotime('+100 years', $dateFrom);
    else
        $dateTo = strtotime('+1 years', $dateFrom);
    
    
    Database::query('insert into orders (userid, type, amount, status, paypal, datepaid, date, dateFrom, dateTo) value ("'.$_SESSION['user']['userid'].'", "'.$type.'", "'.$buyamount.'", "1", "'.$paypal.'", "'.time().'", "'.time().'", "'.$dateFrom.'", "'.$dateTo.'")');
    Database::query('update users set useractivate = "1", userpaymenttype = "'.$type.'" where userid = "'.$_SESSION['user']['userid'].'"');    
    
    $_SESSION['payment'] = $type;
    
    header('Location: '.Globals::$siteURL);       
    
    /*
    if($order){
        
        
        $fetch = new Student();
        $fetch->addCondition('id = "'.$order['studentId'].'"');
        $fetch->prepare();
        $student = $fetch->getSingleRecord();
        
        $fetch = new Student('select max(studentId_paid) studentId_paid from students ');
        $fetch->prepare();
        $studentId = $fetch->getSingleRecord();
        
        if($student['studentId_paid'])
            $studentId_paid = $student['studentId_paid'];
        else
            $studentId_paid = ($studentId['studentId_paid']+1);
        
        Database::query('update orders set paid = "1", datePaid = "'.time().'", paymentMethod = "4", studentId_paid = "'.$studentId_paid.'", paypal = "'.$paypal.'" where id = "'.$order['id'].'"');
        
        
        
        Database::query('update students set studentId_paid = "'.$studentId_paid.'" where id = "'.$student['id'].'"');
        Database::query('update orders set studentId_paid = "'.$studentId_paid.'" where studentId = "'.$student['id'].'"');
        
        
        // send email and sms
        if($student['contact'] == 1){
            $semail = $student['femail'];
            $smobile = $student['fphone1'];
        }else{
            $semail = $student['memail'];
            $smobile = $student['mphone1'];
        }
        
        $fetch = new Form();
        if($default['orderType'] == 0)
            $fetch->addCondition('id = "4"');
        else
            $fetch->addCondition('id = "7"');
        $fetch->prepare();
        $form = $fetch->getSingleRecord();
        
        $fetch = new Query('select * from policies');
        $fetch->addCondition('id = "1"');
        $fetch->prepare();
        $policy = $fetch->getSingleRecord();
        
        if($student['plang'] == 1){ 
            $get_policy = $policy['content_ar']; 
            $email_title = $form['title_ar'];
            $email_message = $form['email_ar'];
            $sms_message = $form['sms_ar'];
        } else { 
            $get_policy = $policy['content_en']; 
            $email_title = $form['title_en'];
            $email_message = $form['email_en'];
            $sms_message = $form['sms_en'];
        
        }
        $codes = array('@order_id'=>$order['id'],'@order_amount'=>$order['amount'],'@order_details'=>$order['details'], '@registration_id'=>$student['id'],'@student_id'=>$studentId_paid,'@student_name'=>$student['name'].' '.$student['fname'],'@policy'=>$get_policy);
        
        echo Functions::sendForm($semail, $smobile, $email_title, $email_message, $sms_message, $codes, $student['plang']);
      
        
        
        
        
        //Database::query('insert into paypal(item_name, item_number, payment_status, mc_gross, mc_currency, txn_id, receiver_email, payer_email, date)
        //                 value("'.$item_name.'", "'.$item_number.'", "'.$payment_status.'", "'.$payment_amount.'", "'.$payment_currency.'", "'.$txn_id.'", "'.$receiver_email.'", "'.$payer_email.'", "'.time().'")');
        
        $check = true;
    }
    */
    
    
    // IPN message values depend upon the type of notification sent.
    // To loop through the &_POST array and print the NV pairs to the screen:
    
    foreach($_POST as $key => $value) {
      echo $key." = ". $value."<br>";
    }
    
} else if (strcmp ($res, "INVALID") == 0) {
    // IPN invalid, log for manual investigation
    echo "The response from IPN was: <b>" .$res ."</b>";
}


//$payment_code = $_SESSION['payment_code'];

//$this->title = 'User Payment';
//$this->tree[] = array('url' => 'user-payment-'.$paymentId.'-'.$payment_code.'.html', 'name' => Functions::ucwords($this->title));


//if($paymentId && $userId && ($payment_code == $_GET['code'])){
if($paymentId && $userId && ($check ==true)){
    
}//else
    //echo "<script>window.location = '".Globals::$siteURL."'</script>";



?>