<?php

/**
 * @author maher
 * @copyright 2012
 */

class UserAdd extends FormProcessor{

    public function __construct(){
        $module = 'userAdd';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        
        Database::query('insert into admins '.$this->columnsToInsert().'');
        $_SESSION['getUserId'] = mysql_insert_id();
    }
     
}
?>