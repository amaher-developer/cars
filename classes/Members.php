<?php

/**
 * @author yehia
 * @copyright 2010
 */

class Members extends Entity{
	
	static public function ip(){
		if (getenv(HTTP_X_FORWARDED_FOR)){ 
			return getenv(HTTP_X_FORWARDED_FOR); 
		} 
		elseif (getenv(HTTP_CLIENT_IP)){ 
			return getenv(HTTP_CLIENT_IP); 
		} 
		else { 
			return getenv(REMOTE_ADDR); 
		} 
	}
    public function __construct($queryFirstPart = 'select * from hospital_users'){
        parent::__construct($queryFirstPart);
    }
}
?>