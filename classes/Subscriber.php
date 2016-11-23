<?php

class Subscriber extends Entity{

    public function __construct($queryFirstPart = 'select * from subscriber'){
        parent::__construct($queryFirstPart);
    }
}
?>