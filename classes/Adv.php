<?php
/**
 * @author maher
 * @copyright 2012
 */

class Adv extends Entity{
    
    public function __construct($queryFirstPart = ' select * from ads '){
        parent::__construct($queryFirstPart);
    }
}
?>