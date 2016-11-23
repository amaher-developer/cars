<?php
include '../../prepare.php';
$id = (int)$_POST['id'];
$table = $_POST['table'];
if($id && $table){
    switch ($table)
    {
        case 'images' :
            $fetch = new Query('select * from images');//mysql_fetch_assoc(Database::query('select * from images where id = "'.$id.'" limit 1'));
            $fetch->addCondition('id = "'.$id.'"');
            $fetch->prepare();
            $image = $fetch->getSingleRecord();
            if($image){
                unlink('../../dynamic/places/'.$image['image']);
                unlink('../../dynamic/places/thumb_'.$image['image']);
            }
            $result = Database::query('delete from images where id = "'.$id.'"');
        break;
        case 'admins' :
            if($id != 1)
                $result = Database::query('delete from '.$table.' where id = '.$id.' '); 
        break;
        default :
            $result = Database::query('delete from '.$table.' where id = '.$id.' '); 
    }
    if($result)
        echo $id;
}
?>