<?php
/**
 * @author maher
 * @copyright 2012
 */

class AdminGroup extends Entity{
    
    public function __construct($queryFirstPart = ' select * from admins_groups '){
        parent::__construct($queryFirstPart);
    }
}
?>