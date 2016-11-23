<?php

/**
 * @author yehia
 * @copyright 2010
 */

class URL extends Input{

	public function isURL(){
		return (preg_match("/^(http(s?):\/\/|ftp:\/\/{1})((\w+\.){1,})\w{2,}(\/?)(.*)$/i", $this->value) == 0) ? false : true;
	}
    static public function urlize($url){
        return strtolower(preg_replace("/[^a-zA-Z0-9]/", "_", $url));
    }
}
?>