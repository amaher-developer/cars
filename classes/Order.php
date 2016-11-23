<?php
/**
 * @author maher
 * @copyright 2012
 */

class Order extends Entity{
    
    public function __construct($queryFirstPart = ' select * from orders '){
        parent::__construct($queryFirstPart);
    }
}
?>