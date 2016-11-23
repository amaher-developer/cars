<?php
class AdminLog extends Entity{
    static public function insert($adminId, $message ,$type = NULL, $page = NULL, $url = NULL){
            
        Database::query('insert into adminslog 
             (adminId, date, type, note, page, url) value ("'.$adminId.'", "'.time().'", "'.$type.'", "'.$message.'", "'.$page.'", "'.$url.'")');
    }
}
?>