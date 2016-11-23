<?php

/**
 * @author yehia
 * @copyright 2010
 */

abstract class Random{

	public static function alphanumeric(){ 
	   $salt = "abchefghjkmnpqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; 
	   srand((double)microtime()*1000000); 
      $i = 0; 
      $codeit = '';
      while ($i < 16) { 
            $num = rand() % 33; 
            $tmp = substr($salt, $num, 1); 
            $codeit = $codeit . $tmp; 
            $i++; 
      } 
      return $codeit; 
	}
}

?>