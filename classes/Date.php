<?php

/**
 * @author yehia
 * @copyright 2010
 */

class Date extends Input{

    private $date;
    private $day;
    private $month;
    private $year;
    private $timestamp;
    
    static public function timestampToDayMonthYear($timestamp){
        return date('j-n-Y', $timestamp);
    }
    static public function timestampToDayMonthYear2($timestamp){
        return date('Y-m-d', $timestamp);
    }
    static public function timestampToSecMinHourDayMonthYear($timestamp){
        return date('Y-m-d H:i:s', $timestamp);
    }
    static public function DayMonthYearTotimestamp($dayMonthYear){
        $dayMonthYear = str_replace('/', '-', $dayMonthYear);
        $date = explode('-', $dayMonthYear);
        return mktime(0, 0, 0, $date[0], $date[1], $date[2]);
    }
    static public function DayMonthYearThemeTotimestamp($dayMonthYear){
        $dayMonthYear = str_replace('/', '-', $dayMonthYear);
        $date = explode('-', $dayMonthYear);
        return mktime(0, 0, 0, $date[1], $date[0], $date[2]);
    }
    static public function DayMonthYearHTMLTotimestamp($dayMonthYear){
        $dayMonthYear = str_replace('/', '-', $dayMonthYear);
        $date = explode('-', $dayMonthYear);
        return mktime(0, 0, 0, $date[1], $date[2], $date[0]);
    }  
	
	static public function calculateAge($birthday){
    	//return floor((time() - strtotime($birthday))/31556926);
        return ((time() - strtotime($birthday))/31556926);
	}
    static public function calculateAgePerMonth($birthday){
    	return floor((time() - strtotime($birthday))/2629743.833);
	}
        
    public function __construct($date){
        $this->date = $date;
        if($this->isDayMonthYear()){
            $dmy = $this->split();
            $this->day = $dmy[0];
            $this->month = $dmy[1];
            $this->year = $dmy[2];
        }
    }
    public function isDayMonthYear(){
        $dmy = $this->split();
        return (
                ($dmy[0] >= 1 && $dmy[0] <= 31) &&
                ($dmy[1] >= 1 && $dmy[1] <= 12) &&
                ($dmy[2] >= 1 && $dmy[2] <= 3000)
            );
    }
    public function getTimestamp(){
        return mktime(0, 0, 0, $this->month, $this->day, $this->year);
    }
    
    private function split(){
        return explode('-', $this->date);
    }
    
    public function date_arabic($time , $num){ 
	$arabicdays = array('الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس','الجمعة','السبت'); 
	$arabicmonths = array('','يناير','فبراير','مارس','إبريل','مايو','يونيو','يوليو','أغسطس','سبتمبر','أكتوبر','نوفمبر','ديسمبر'); 
	$date = getdate($time); 
	$amorpm = date ('a', $time);
	switch ($amorpm) {
		case 'am':
		$amorpm = "صباحًا";
		case 'pm':
		$amorpm = "مساءً";
	}
	$da = $arabicdays[$date['wday']].' '.$date['mday'].' '.$arabicmonths[$date['mon']].' , '.$date['year'].'<br>'.'  الوقت  '.date("h", $time).':'.date("i", $time).':'.date("s", $time);
	$d1_date = date ("j/n/Y", $time);
	$d2_date = $arabicdays[$date['wday']];
	$d3_date = $date['mday'].' '.$arabicmonths[$date['mon']].' , '.$date['year'];
	$d4_date = $date['mday'].' '.$arabicmonths[$date['mon']];
	$d5_date = $arabicdays[$date['wday']].' '.$date['mday'].' '.$arabicmonths[$date['mon']];
	$d6_date = date("g", $time).':'.date("i", $time). ' '. $amorpm;
	$d7_date = $d1_date . " الساعة ". $d6_date;
	$d8_date = $arabicdays[$date['wday']].' '.$date['mday'].' '.$arabicmonths[$date['mon']].' , '.$date['year']. " الساعة ". $d6_date;
	$d9_date = $arabicdays[$date['wday']].' '.$d1_date;
	if ($num == 0) return $d1_date;
	if ($num == 1) return $d2_date;
	if ($num == 2) return $d3_date;
	if ($num == 3) return $d4_date;
	if ($num == 4) return $d5_date;
	if ($num == 5) return $d6_date;
	if ($num == 6) return $d7_date;
	if ($num == 7) return $d8_date;
	if ($num == 8) return $d8_date;
	if ($num == 9) return $d9_date;
	// if($da <> "") return $da;
	// else return false;
	} 	
    
}
?>