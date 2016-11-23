<?
// $hijri = 0;
// $ramadan = 1;
	$ts = time();
  $not = "مدينة غير مسجلة في الموقع";
 $title = "موافيت الصلاة";
 function dateara($this){
 global $am, $pm;
 switch(date('l', $this)){
case "Saturday":
$dateara = "السبت";
break;
case "Sunday":
$dateara = "الأحد";
break;
case "Monday":
$dateara = "الاثنين";
break;
case "Tuesday":
$dateara = "الثلاثاء";
break;
case "Wednesday":
$dateara = "الأربعاء";
break;
case "Thursday":
$dateara = "الخميس";
break;
case "Friday":
$dateara = "الجمعة";
break;
}
 $hours = date('H', $this);
 if($hours > 12){
 $hours = $hours - 12;
 $mom = " " . $pm;
 }
 elseif($hours == 12) $mom = " " . $pm;
 else $mom = " " . $am;

 // $dateara .= " الساعة " . $hours . date(":i:s", $this) . $mom;
 $dateara .= " " . date("j/n/Y", $this);
 return $dateara;
 }
 function tohours($this){
 global $am, $pm, $DST;
 $hours = $this;
 $inthours = intval($hours);
 $min = $hours - $inthours;
 $minutes = (int) ($min * 60);
 if($DST == "1") $inthours = $inthours + 1;
 if($inthours > 12){
 $inthours = $inthours - 12;
 $mom = " " . $pm;
 }
 elseif($inthours == 12) $mom = " " . $pm;
 else $mom = " " . $am;
 if($minutes < 10) $minutes1 = "0" . $minutes;
 else $minutes1 = $minutes;
 $tohours = $inthours . ":" . $minutes1 . $mom;
 return $tohours;
 }
 function tohours24($this){
 global $TZ, $ts, $DST;
 $hours = $this;
 $inthours = intval($hours);
 $min = $hours - $inthours;
	if(is_nan($min))
		return 0;
 $minutes = (int) ($min * 60);
 if($minutes < 10) $minutes1 = "0" . $minutes;
 else $minutes1 = $minutes;
 if($DST == "1") $inthours = $inthours + 1;
 $tohours = mktime($inthours, $minutes1, 0, date("m", $ts),date("d", $ts),date("Y", $ts));
// $tohours = $inthours . ":" . $minutes1;
 return $tohours;
 }
 function in360($this){
 $in360 = $this;
 if($this > 360 || $this < 0) $in360 = fmod($this,360);
 if($in360 < 0) $in360 = $in360 + 360;
 return $in360;
 }
 
 $samtdesc['eg'] = "Part of Africa, Syria, Iraq, Lebanon, Malaysia";
 $samt1['eg'] = 90.83333; $samt2['eg'] = 109.5; $samt3['eg'] = 107.5;
 $samtdesc['um'] = "Arab Peninsula";
  $samt1['um'] = 90.83333;    $samt2['um'] = 108.5;    $samt3['um'] = 108.5;
 $samtdesc['ka'] = "Pakistan, Bangladesh, part of India, Afganistan";
  $samt1['ka'] = 90.83333;    $samt2['ka'] = 108;    $samt3['ka'] = 108;
 $samtdesc['us'] = "USA, CANADA, UK, MOST OF EUROPE";
  $samt1['us'] = 90.83333;    $samt2['us'] = 105;    $samt3['us'] = 105;
 $samtdesc['bo'] = "Part of Europe, Part of Far East";
    $samt1['bo'] = 90.83333;    $samt2['bo'] = 108;    $samt3['bo'] = 107;

/* 
 $co['ksa'] = "السعودية"; $coen["ksa"] = "Saudi Arabia"; $dst['ksa'] = 0; $ram['ksa'] = "1"; $con['ksa'] = "sau"; $method['ksa'] = "um";
 $co['egypt'] = "مصر"; $coen["egypt"] = "Egypt";  $dst['egypt'] = 0; $ram['egypt'] = "0"; $con['egypt'] = "egy"; $method['egypt'] = "eg";
 $co['algeria'] = "الجزائر"; $coen["algeria"] = "Algeria";  $dst['algeria'] = 0; $ram['algeria'] = "0"; $con['algeria'] = "alg"; $method['algeria'] = "bo";
 $co['palestine'] = "فلسطين"; $coen["palestine"] = "Palestine";  $dst['palestine'] = 1; $ram['palestine'] = "0"; $con['palestine'] = "pal"; $method['palestine'] = "bo";
 $co['uae'] = "الامارات"; $coen["uae"] = "United Arab Emirates";  $dst['uae'] = 0; $ram['uae'] = "1"; $con['uae'] = "uae"; $method['uae'] = "um";
 $co['morocco'] = "المغرب";  $coen["morocco"] = "Morocco"; $dst['morocco'] = 0; $ram['morocco'] = "0"; $con['morocco'] = "mor"; $method['morocco'] = "bo";
 $co['iraq'] = "العراق";  $coen["iraq"] = "Iraq"; $dst['iraq'] = 0; $ram['iraq'] = "0"; $con['iraq'] = "ira"; $method['iraq'] = "bo";
 $co['kuwait'] = "الكويت"; $coen["kuwait"] = "Kuwait";  $dst['kuwait'] = 0; $ram['kuwait'] = "1"; $con['kuwait'] = "kuw"; $method['kuwait'] = "um";
 $co['sudan'] = "السودان"; $coen["sudan"] = "Sudan";  $dst['sudan'] = 0; $ram['sudan'] = "0"; $con['sudan'] = "sud"; $method['sudan'] = "bo";
 $co['libya'] = "ليبيا"; $coen["libya"] = "Libya";  $dst['libya'] = 0; $ram['libya'] = "0"; $con['libya'] = "lib"; $method['libya'] = "eg";
 $co['yemen'] = "اليمن"; $coen["yemen"] = "Yemen";  $dst['yemen'] = 0; $ram['yemen'] = "1"; $con['yemen'] = "yem"; $method['yemen'] = "um";
 $co['jordan'] = "الأردن"; $coen['jordan'] = "Jordan"; $dst['jordan'] = 1; $ram['jordan'] = "1"; $con['jordan'] = "jor"; $method['jordan'] = "um";
 $co['oman'] = "عمان"; $coen['oman'] = "Oman"; $dst['oman'] = 0; $ram['oman'] = "1"; $con['oman'] = "oma"; $method['oman'] = "um";
 $co['lebanon'] = "لبنان"; $coen['lebanon'] = "Lebanon"; $dst['lebanon'] = 0; $ram['lebanon'] = "0"; $con['lebanon'] = "leb"; $method['lebanon'] = "bo";
 $co['qatar'] = "قطر"; $coen['qatar'] = "Qatar"; $dst['qatar'] = 0; $ram['qatar'] = "1"; $con['qatar'] = "qat"; $method['qatar'] = "um";
 $co['usa'] = "امريكا"; $coen['usa'] = "USA"; $dst['usa'] = 0; $ram['usa'] = "0"; $con['usa'] = "usa"; $method['usa'] = "us";
 $co['tunisia'] = "تونس";  $coen["tunisia"] = "Tunisia"; $dst['tunisia'] = 0; $ram['tunisia'] = "0"; $con['tunisia'] = "tun"; $method['tunisia'] = "bo";
 $co['syria'] = "سوريا"; $coen["syria"] = "Syria";  $dst['syria'] = 0; $ram['syria'] = "1"; $con['syria'] = "syr"; $method['syria'] = "um";
 $co['france'] = "فرنسا"; $coen["france"] = "France";  $dst['france'] = 0; $ram['france'] = "0"; $con['france'] = "fra"; $method['france'] = "bo";
 $co['uk'] = "بريطانيا"; $coen["uk"] = "UK";  $dst['uk'] = 0; $ram['uk'] = "0"; $con['uk'] = "uki"; $method['uk'] = "bo";
 $co['italy'] = "ايطاليا"; $coen["italy"] = "Italy";  $dst['italy'] = 0; $ram['italy'] = "0"; $con['italy'] = "ita"; $method['italy'] = "bo";
*/
 // المغرب تونس فلسطين العراق الاردن  لبنان سوريا فرنسا امريكا
 // 1 april - 1 october

 $ds = array("morocco", "palestine", "jordan", "syria", "lebanon", "usa", "france", "uk");
 $dstmonth = date("n", $ts);
/*
 if($dstmonth > 4 && $dstmonth < 9){
  foreach($ds as $key => $val){
  $dst[$val] = "1";
  }
 }
*/ 
 $pr['Fajr'] = "الفجر";
 $pr['Shorouq'] = "الشروق";
 $pr['Zuhr'] = "الظهر";
 $pr['Asr'] = "العصر";
 $pr['Maghreb'] = "المغرب";
 $pr['Isha'] = "العشاء";

// $am = "ص"; 
// $pm = "م";
?>
