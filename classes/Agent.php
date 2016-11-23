<?php

/**
 * @author maher
 * @copyright 2012
 */

class Agent extends Entity{
    public function __construct($queryFirstPart = 'select * from users'){
        parent::__construct($queryFirstPart);
    }
}
?>