<?php
/**
 * @author maher
 * @copyright 2015
 */


$this->title = 'تسجيل دخول';
    
if(Globals::isAdmin())
    echo '<script>window.location = "'.Globals::$siteURL.'index.php?p=default";</script>';
 

//$successOnly = true;
if($formSubmitted){
    $default = array(
                    'email' => '',
                    'password' => '',
                );
        $successMessage = '<div class="alert alert-success">Sccessfully login</div>';
        $form = new Login();
        $form->addText('email', 'Enter Email and password correctly.');
        $form->addText('password', 'Enter Email and password correctly.');
        $form->process($successMessage);
        if($_SESSION['adminVisible'] == 'false')
            $_SESSION['errors']['login']['failure']['email'] = 'Your account is disable';
        else if($_SESSION['adminLogin'] == 'false')
            $_SESSION['errors']['login']['failure']['email'] = 'Enter Email and password correctly.';
        unset($_SESSION['adminLogin']);
        unset($_SESSION['adminVisible']);
    
    
}




?>