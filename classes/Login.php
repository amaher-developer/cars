<?php

class Login extends FormProcessor{

    public function __construct(){
        $module = 'login';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        $IVR = $this->successfulProcessed['IVR'];
        $email = $this->successfulProcessed['email'];
        $password = $this->successfulProcessed['password'];
        $fetch = new Query('select a.*, b.id bId, b.name permissions_name, b.permissions from admins a left join admins_groups b on a.groupId = b.id where a.email = "'.$email.'" and a.password = "'.$password.'" ');
        $fetch->prepare();
        $admin = $fetch->getSingleRecord();
                        
        if($admin && ($admin['deleted'] == 0)){
            $_SESSION['admin'] = $admin;
            $_SESSION['errors']['login']['noerror'] = $successMessage;
            
            Database::query('update admins set lastLogin = "'.time().'" where id = "'.$admin['id'].'"');
            $message = $admin['name'].' login at '.Date::timestampToSecMinHourDayMonthYear(time());
            AdminLog::insert($admin['id'], $message, 1);
            
            echo '<script>window.location = "'.$_SERVER['HTTP_REFERER'].'";</script>';
            
        }else if($admin && ($admin['deleted'] == 1)){
            $_SESSION['adminVisible'] = 'false';
        }else
            $_SESSION['adminLogin'] = 'false';
    }
}
?>