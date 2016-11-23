<?php
$this->title = 'تسجيل الدخول';
$successOnly = true;

if($formSubmitted){
    $default = array(
                    'username' => '',
                    'password' => '',
                );
    $successMessage = '
<div class="success">تم تسجيل الدخول بنجاح</div>
<meta http-equiv="refresh" content="0; url=index.php" />
';
    $username = Database::real_escape_string($_POST['username']);
    $password = Database::real_escape_string($_POST['password']);
    
    $fetch = new Admin();
    $fetch->addCondition('username = "'.$username.'" and password = "'.$password.'"');
    $fetch->prepare();
    $record = $fetch->getSingleRecord();
    
    
    if($record){
        unset($record['password']);
        $_SESSION['admin'] = $record;
        $_SESSION['errors']['login']['noerror'] = $successMessage;
        /*        $result = mysql_query('
            select * from attendanceLog 
            where adminId= "'.$_SESSION['admin']['id'].'" and attendanceDay = "'.date('Y-n-j').'"');
        $total = mysql_num_rows($result);
        if($total == 0){
            mysql_query('insert into attendanceLog 
                (attendanceDay, adminId, loginTime, loginIp) value ("'.date('Y-n-j').'", "'.$_SESSION['admin']['id'].'", "'.time().'", "'.$ip.'")');
        }*/
    }
}

?>