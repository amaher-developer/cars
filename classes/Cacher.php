<?php
class Cacher{

	private $collection = array();
	private $fileLocation;
    private $c;

	public function __construct(){
	   $this->c = '<?php
';
	}
	public function addRecordsWithName($records, $name, $customKey = false){
		if(is_array($records)){
			if(is_array($records[0])){
                $i = 0;
				foreach($records as $record){
			        foreach($record as $key => $val){
			            $val = str_replace('"', '\"', htmlspecialchars($val));
			            $this->c .= '$'.$name.'[';
                        if(!$customKey)
                            $this->c .= $i;
                        else
                            $this->c .= '"'.$record[$customKey].'"';    
                        $this->c .= ']["'.$key.'"] = "'.$val.'"; 
'; 
			        }
                    $i++;
    			}
                $this->c .= '
';
			}else{
		        foreach($records as $key => $val){
		            $val = str_replace('"', '\"', htmlspecialchars($val));
		            $this->c .= '$'.$name.'["'.$key.'"] = "'.$val.'"; 
'; 
		        }
			}
		}else{
		}

	}
    public function saveToFile($file){
        $this->c .= '
?>';
        
        $f = fopen($file, "w");
        fwrite($f, $this->c);
        fclose($f);
    }
}

?>