<?php
/**
 * @author maher
 * @copyright 2012
 */

class Country extends Entity{
    
    public function __construct($queryFirstPart = ' select * from countries '){
        parent::__construct($queryFirstPart);
    }
}
?>