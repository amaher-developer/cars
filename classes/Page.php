<?php
/**
 * @author maher
 * @copyright 2012
 */

class Page extends Entity{
    
    public function __construct($queryFirstPart = ' select * from pages '){
        parent::__construct($queryFirstPart);
    }
}
?>