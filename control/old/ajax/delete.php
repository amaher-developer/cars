<?php
include '../../prepare.php';
$id = (int)$_POST['id'];
$table = $_POST['table'];
if($id && $table){
    switch ($table)
    {
        case 'categories' :
            $images = mysql_fetch_assoc(Database::query('select * from 
            images left join (informations, sections) on (images.informationId = informations.id and informations.sectionId = sections.id)  
            where sections.catId = "'.$id.'"'));
            if($images){
                foreach($images as $image){
                    unlink('../../dynamic/informations/'.$image['image']);
                    unlink('../../dynamic/informations/thumb_'.$image['image']);
                }
            } 
            Database::query('delete images from images join informations join sections join categories 
                             where images.informationId = informations.id and informations.sectionId =  sections.id and sections.catId = '.$id.' ');
            Database::query('delete informations from informations join sections join categories 
                             where informations.sectionId =  sections.id and sections.catId = '.$id.' ');
            Database::query('delete sections from sections where catId = '.$id.' ');
            $result = Database::query('delete '.$table.' from '.$table.' where id = '.$id.' ');
        break;
        case 'sections' :
            $images = mysql_fetch_assoc(Database::query('select * from 
            images left join (informations, sections) on (images.informationId = informations.id)  
            where sections.catId = "'.$id.'"'));
            if($images){
                foreach($images as $image){
                    unlink('../../dynamic/informations/'.$image['image']);
                    unlink('../../dynamic/informations/thumb_'.$image['image']);
                }
            } 
            Database::query('delete images from images join informations join sections 
                             where images.informationId = informations.id and informations.sectionId = '.$id.' ');
            Database::query('delete informations from informations join sections 
                             where informations.sectionId = '.$id.' ');
            $result = Database::query('delete '.$table.' from '.$table.' where id = '.$id.' ');
        break;
        case 'informations' :
            
            $images = mysql_fetch_assoc(Database::query('select * from 
            images left join (informations, sections, categories) on (images.informationId = informations.id and informations.sectionId = sections.id)  
            where sections.catId = "'.$id.'"'));
            if($images){
                foreach($images as $image){
                    unlink('../../dynamic/informations/'.$image['image']);
                    unlink('../../dynamic/informations/thumb_'.$image['image']);
                }
            } 
            Database::query('delete images from images 
                             where informationId = '.$id.' ');
            $result = Database::query('delete '.$table.' from '.$table.' where id = '.$id.' ');
        break;
        case 'images' :
            $image = mysql_fetch_assoc(Database::query('select * from images where id = "'.$id.'" limit 1'));
            if($image){
                unlink('../../dynamic/informations/'.$image['image']);
                unlink('../../dynamic/informations/thumb_'.$image['image']);
            }
            $result = Database::query('delete from images where id = "'.$id.'"');
            
        break;
        default :
            $result = Database::query('delete from '.$table.' where id = '.$id.' '); 
    }
    if($result)
        echo $id;
}
?>