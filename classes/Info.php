<?php
/**
 * @author maher
 * @copyright 2012
 */

class Info extends Entity{
    
    public function __construct($queryFirstPart = ' select * from info '){
        parent::__construct($queryFirstPart);
    }
}
?>