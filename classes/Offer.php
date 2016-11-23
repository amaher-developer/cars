<?php
/**
 * @author maher
 * @copyright 2012
 */

class Offer extends Entity{
    
    public function __construct($queryFirstPart = ' select * from offers '){
        parent::__construct($queryFirstPart);
    }
}
?>