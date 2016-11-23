<?php

/**
 * @author yehia
 * @copyright 2010
 */

class Text extends Input{

    static public function yousef($string, $length, $trailingLetters = ''){ 
	   return Text::limit($string, $length, $trailingLetters);
	}
    static public function limit($string, $length, $trailingLetters = ''){ 
	   if(strlen($string) <= $length) 
            return $string; 
	   else{ 
	       $text = explode(" ", $string);
	       $now = 0;
	       $ahmed = "";
    	   for($i=0; $i<count($text); $i++){ 
    	       $now += strlen($text[$i]); 
    	       if($now <= $length)     
                    $ahmed .= $text[$i] . " ";
	       } 
	       if($ahmed == $string) 
                return $ahmed ; 
	       else
                return $ahmed . $trailingLetters;
    	}
	}
    static public function safe($text){
    	return mysql_real_escape_string($text);
    } 
	static public function getVariableName(&$iVar, &$aDefinedVars)
    {
	    foreach ($aDefinedVars as $k=>$v)
	        $aDefinedVars_0[$k] = $v;
	        
	    $iVarSave = $iVar;
	    $iVar     =!$iVar;
	    
	    $aDiffKeys = array_keys (array_diff_assoc ($aDefinedVars_0, $aDefinedVars));
	    $iVar      = $iVarSave;
	 
	    return $aDiffKeys[0];
    }
 
	public function lengthIsLessThan($max){
		if(strlen($this->value) < $max)
			return true;
		else
			return false;
	}
	public function lenghtIsLessThanOrEquals($max){
		if(strlen($this->value) <= $max)
			return true;
		else
			return false;
	}
	public function lengthIsMoreThan($min){
		if(strlen($this->value) > $min)
			return true;
		else
			return false;
	}
	public function lengthIsMoreThanOrEquals($min){
		if(strlen($this->value) >= $min)
			return true;
		else
			return false;
	}
	public function lengthIsBetween($min, $max){
		if(strlen($this->value) > $min && strlen($this->value) < $max)
			return true;
		else
			return false;
	}
	public function lengthIsBetweenOrEquals($min, $max){
		if(strlen($this->value) >= $min && strlen($this->value) <= $max)
			return true;
		else
			return false;
	}
	public function lengthIs($value){
		if(strlen($this->value) == $value)
			return true;
		else
			return false;
	}
	public function equals($value){
		if($this->value == $value)
			return true;
		else
			return false;
	}
}
?>