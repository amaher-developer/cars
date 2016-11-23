<?php

/**
 * @author maher
 * @copyright 2012
 */
 
class SettingEdit extends FormProcessor{

    private $id;
    
    public function __construct($id, $record){
        $this->id = $id;
        $this->record = $record;
        $module = 'settingEdit';
        parent::__construct($module);
    }
    
    protected function excuteQuery(){
        Database::query('update settings set '.$this->columnsToUpdate().' where id = '.$this->id.'');
    }
}
?>