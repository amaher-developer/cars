<?php
/**
 * @author maher
 * @copyright 2012
 */

class User extends Entity{
    
    public function __construct($queryFirstPart = ' select * from admins '){
        parent::__construct($queryFirstPart);
    }
}
?>