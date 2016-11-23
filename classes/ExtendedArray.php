<?php

Class ExtendedArray{
    static function searchInKey($needle, $haystack, $searchKey) {
        if(!is_array($haystack))
            return false;
        else{
            $result = array();
            foreach($haystack as $key => $value){
                foreach($value as $key2 => $value2){
                    if($needle == $value2 && $key2 == $searchKey){
                        $result[$key] = $value;
                        continue;    
                    }
                }
            }
            return $result;
        }
    }
}

?>