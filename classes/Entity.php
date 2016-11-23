<?php

/**
 * @author yehia
 * @copyright 2010
 * 
 * 
 */

abstract class Entity{

    protected $query;
    protected $result;
    protected $total = null;
    protected $condition = null;
    protected $orderBy = null;
    protected $limit = null;
    protected $recordSet = array();
    protected $num;
    protected $per;
    
    public function __construct($queryFirstPart){
        $this->query = $queryFirstPart;
    }
    public function addCondition($conditionClause){
        if($this->condition == null)
            $this->condition = 'where';
        $this->condition .= ' '.$conditionClause;
    }
    public function addOrderBy($orderByClause){
        $this->orderBy .= ' order by '.$orderByClause;
    }
    public function addLimit($limitClause){
        $this->limit .= ' limit '.$limitClause;
    }
    public function paginated($num, $per){
        $this->num = $num;
        $this->per = $per;
        $this->excuteQuery();
        $this->addLimit(($this->num*$this->per).', '.$this->per);
    }
    public function prepare(){
        $entities = array();
        $result = $this->excuteQuery();
        while($rs = mysqli_fetch_assoc($result)){
            $this->recordSet[] = $rs;
        }
    }
    protected function excuteQuery(){
        $query = $this->query;
        if($this->condition != null)
            $query .= ' '.$this->condition;
        if($this->orderBy != null)
            $query .= ' '.$this->orderBy;
        if($this->limit != null)
            $query .= ' '.$this->limit;
        $result = Database::query($query) or die($query);
        if($this->total == null)
            $this->total = mysqli_num_rows($result);
        return $result;
    }
    
    public function getRecordSet(){
        return $this->recordSet;
    }
    
    public function getSingleRecord(){
        return reset($this->recordSet);
    }
    
    public function getTotal(){
        return $this->total;
    }
	public function pager($links, $b4, $after = '', $text = ''){
        $num = $this->num;
        $total = $this->total;
        $per = $this->per;
        
    	$text = "";
    	$num1 = $num;
    	$num2 = intval($total/$per);
    	
    	if($num2 < $total/$per) $num2++;
    	$count = 0;
    	$half = intval($links/2) + 1;
    	$c = "";
    	$nn = $num1 + 1;
    	
    	
    	if($num1 < $half){
        	// Previous is low
        	
        	for($i=0;$i<$num1;$i++){
            	$do = $i * $per; $ii = $i + 1;
            	$c .= "<a href=".$b4.$i.$after." class=\"btn btn-success\">". $text . $ii ."</a>" . "  ";
            	$count++;
        	}
        	
        	if($num2 > $num1 + ($links - $count)) $limit = $num1 + ($links - $count);
        	else $limit = $num2;
           //because we don't want to see the number if there's only one page
            if(/* the loop above excutes at least once */ $num1>0 || /* or the loop below */$limit>$num1+1)
        	$c .= "<a class=\"btn btn-success active\" href=\"javascript::void(0)\">" . $text . $nn . "</a>";
        	
        	for($i=$num1+1;$i<$limit;$i++){
            	$do = $i * $per; $ii = $i + 1;
            	$c .=  "  " . "<a href=".$b4.$i.$after." class=\"btn btn-success\">". $text .  $ii ."</a>" ;
        	}
    	}
    	elseif($num2 - $num1 < $half){
        	
        	// Next is low
        	for($i=$num1+1;$i<$num2;$i++){
            	$do = $i * $per; $ii = $i + 1;
            	$c .=  "  " . "<a href=".$b4.$i.$after." class=\"btn btn-success\">". $text .  $ii ."</a>" ;
            	$count++;
        	}
        	
        	if($num1 - ($links - $count) > 0) $limit = $num1 - ($links - $count);
        	else $limit = 0;
        	$c = "<a class=\"btn btn-success active\" href=\"javascript::void(0)\">" . $text . $nn . "</a>" .  $c ;
        	
        	for($i=$num1-1;$i>=$limit;$i--){
            	$do = $i * $per; $ii = $i + 1;
            	$c = "<a href=".$b4.$i.$after." class=\"btn btn-success\">".  $text . $ii . "</a>" . "  " . $c;
        	}
    	
    	}
    	else{
        	// Both are fine
        	
        		
        	for($i=$num1-$half;$i<$num1;$i++){
            	$do = $i * $per; $ii = $i + 1;
            	$c .= "<a href=".$b4.$i.$after." class=\"btn btn-success\">". $text .  $ii ."</a>  ";
            	$count++;
        	}
        	
        	$limit = $links - $count;
        	$c .= "<span class=\"btn btn-success\">" . $text . $nn . "</span>" ;
        	
        	for($i=$num1+1;$i<=$num1+$limit;$i++){
            	$do = $i * $per; $ii = $i + 1;
            	$c .=  "  " . "<a href=".$b4.$i.$after." class=\"btn btn-success\">". $text .  $ii ."</a>" ;
        	}
    	}
    		return $c;
    }
}