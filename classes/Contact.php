<?php
/**
 * @author maher
 * @copyright 2012
 */

class Contact extends Entity{
    
    public function __construct($queryFirstPart = ' select * from contacts '){
        parent::__construct($queryFirstPart);
    }
}
?>