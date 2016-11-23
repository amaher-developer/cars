<?php

/**
 * @author maher
 * @copyright 2012
 */

class AdminAdd extends FormProcessor{

    public function __construct(){
        $module = 'adminAdd';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
        Database::query('insert into admins '.$this->columnsToInsert().'');
        $_SESSION['getAdminId'] = mysql_insert_id();
    }
     
}
?>