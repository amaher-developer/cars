<?
	error_reporting(E_ALL);
$db_host = "localhost";
$db_name = "athantwe_athan";
$db_user = "athantwe_athan";
$db_pass = "d&lUP*S}#V}d";
		$link = mysql_connect("$db_host", "$db_user", "$db_pass") or die(mysql_error());
		mysql_select_db($db_name, $link);

	include("where.php");
	include("who.php");

	$result = mysql_query("SELECT * FROM settings");
	while($rs=mysql_fetch_assoc($result)){
	$$rs['title'] = $rs['value'];
	}	

	
	echo "Starting at " . date("h:i") . '
';
        $ampm['am'] = 'ص';
        $ampm['pm'] = 'م';
    echo "Num: " . count($countries) . "<br>";    
	$ccc = 0;
	foreach($countries as $key => $val){	
	// $key = city   $val = country
	$ccc++;
	$city = $key;
	echo $ccc . " " . $city ;
	if(array_key_exists($city, $lats)){
	include("samt.php");
	echo " found<br>";
	// Time Zone
	$DST = $dstz[$city];
//	$DST = $dst[$val];
	$TZ = $tzs[$city];
		$ts = time() + ($TZ * 60 * 60);
if(isset($_GET['Y'])){
	$Y = (int) $_GET['Y'];
	$M = $_GET['M'];
	$D = $_GET['D'];
	}
	else{
	$Y = date("Y", $ts);
	$M = date ("m", $ts);
	$D = date("d", $ts);
	}
	// Longitude 
        $mykey = $D . "-" . $M;

	$long = $longs[$city];
	// Latitude 
	$lat = $lats[$city];
	// Convert latitude to radian
	$lat = deg2rad($lat);

	// Time Equation (from table)
	$timeeq = $te[$mykey];
	// Tropical Slope (from table)
	// Convert Tropical Slope to radian
	$troslope = deg2rad($tro[$mykey]);
	// Samt Angles (from table)
	$samtshor = $samt1[$area[$city]];
	$samtfajr = $samt2[$area[$city]];
	$samtisha = $samt3[$area[$city]];

	// JULIANI START
	if($M < 3){
	$Y = $Y -1;
	$M = $M + 12;
	}
	$A = intval($Y/100);
	$B = 2 - $A + intval ($A/4);
	$JD = intval(365.25 * ($Y+4716)) + intval(30.6001 * ($M+1)) + $D + $B - 1524.5;
	// JULIANI END
	 

$L_ = intval($JD) - 1948439 + 10632 + $hijri;
$N_ = intval(($L_ - 1) / 10631);
$L_ = $L_ - 10631 * $N_ + 354;
$J_ = intval((10985 - $L_) / 5316) * intval((50 * $L_) / 17719) + intval($L_ / 5670) * intval((43 * $L_) / 15238);
$L_ = $L_ - intval((30 - $J_) / 15) * intval((17719 * $J_) / 50) - intval($J_ / 16) * intval((15238 * $J_) / 43) + 29;
$M_ = intval((24 * $L_) / 709);
$D_ = $L_ - intval((709 * $M_) / 24);
$Y_ = intval(30 * $N_ + $J_ - 30);

	$hdate = $D_ . "/" . $M_ . "/" . $Y_;

	// Medium Longitude
	$medlong = $TZ  * 15;
	// Longitude Difference
	$longdiff = ($medlong - $long)/15;
	// + 1-60 one minute for zuhr
	$Zu = (((12 + $longdiff)/24) - ($timeeq/(24*60))); // + (1/60/24);
	$Zuhr = tohours($Zu*24);
	$Zuhr1 = tohours24($Zu*24);

	$samt = deg2rad($samtfajr);
	$Hi = (cos($samt) - sin($lat) * sin($troslope)) / (cos($lat) * cos($troslope));
	$H = rad2deg(acos($Hi));

	$H = ($H / 15)/24;
	$Fa = $Zu - $H;
	$Fajr = tohours($Fa*24);
	$Fajr1 = tohours24($Fa*24);

	$samt = deg2rad($samtshor);
	$Hi = (cos($samt) - sin($lat) * sin($troslope)) / (cos($lat) * cos($troslope));
	$H = rad2deg(acos($Hi));

	$H = ($H / 15)/24;
	$Sh = $Zu - $H;
	$Shorouq = tohours($Sh*24);
	$Shorouq1 = tohours24($Sh*24);
	



	$samt = deg2rad($samtshor);
	$Hi = (cos($samt) - sin($lat) * sin($troslope)) / (cos($lat) * cos($troslope));
	$H = rad2deg(acos($Hi));

	$H = ($H / 15)/24;
	// + 1-60 for maghrib
	$Ma = $Zu + $H + (1/60/24);
	$Maghreb = tohours($Ma*24);
	$Maghreb1 = tohours24($Ma*24);
	
	$samt = deg2rad($samtisha);
	$Hi = (cos($samt) - sin($lat) * sin($troslope)) / (cos($lat) * cos($troslope));
	$H = rad2deg(acos($Hi));

	if($area[$city] == "um"){
	$Ish = $Ma + 90/60/24;
	$coocoo = $countries[$city];
//	if($ram[$coocoo] == "1" && $coocoo == "ksa") $Ish = $Ma + 120/60/24;
	}
else{	
	$H = ($H / 15)/24;
	$Ish = $Zu + $H;
}
	$Isha = tohours($Ish*24);
	$Isha1 = tohours24($Ish*24);
	

	// ASR ASR ASR ASR

	$samt = atan (1 + tan (abs( $lat - $troslope)));
	$samty = rad2deg($samt);
	$tim = ACOS( (SIN (deg2rad(90 - $samty)) - SIN($troslope)*SIN($lat)) / (COS($troslope)*COS($lat) ));
	$H = (rad2deg($tim)/15)/24;
	$As = $Zu + $H;
	$Asr = tohours($As*24);
	$Asr1 = tohours24($As*24);
        
        
	//extreme latitudes

        if($Isha1 <=0){
            echo '*** <br />';
            $extreme = true;
            //include_once 'extreme_cache/'.$city['countryCode'].'-'.date('Y', $ts).'.php';
            include_once 'gb-2012.php';
                
            $Fajr1 = $Shorouq1-$chosen_period;
            $Isha1 = $Maghreb1+$chosen_period;
            
            $Fajr = date('h:i',$Fajr1).' '.$ampm[date('a',$Fajr1)];

            $Isha = date('h:i', $Isha1).' '.$ampm[date('a', $Isha1)];

        }
        
	echo $Isha1.', '.$Isha.'^^^<br />';
	$output = "<b>".ucfirst($car[$city]) . " - " . ucfirst($co[$countries[$city]]). "</b><br>
	".dateara($ts)."<br>
	<table border=0 cellpadding:5 cellspacing=0>
	<tr><td class=row1>" . $pr['Fajr'] ."</td><td class=row1>$Fajr</td></tr>
	<tr><td class=row2>" . $pr['Shorouq'] ."</td><td class=row2>$Shorouq</td></tr>
	<tr><td class=row1>" . $pr['Zuhr'] ."</td><td class=row1>$Zuhr</td></tr>
	<tr><td class=row2>" . $pr['Asr'] ."</td><td class=row2>$Asr</td></tr>
	<tr><td class=row1>" . $pr['Maghreb'] ."</td><td class=row1>$Maghreb</td></tr>
	<tr><td class=row2>" . $pr['Isha'] ."</td><td class=row2>$Isha</td></tr>
	</table>";
$ttt = $TZ;//+$DST;
	$c = '<?
$city = "'.$city.'";
$cityar = "'.$car[$city].'";
$country = "'.$co[$countries[$city]]. '";
$date = "'.dateara($ts).'";
$pt[1] = "'.$Fajr.'";
$pt[6] = "'.$Shorouq.'";
$pt[2] = "'.$Zuhr.'";
$pt[3] = "'.$Asr.'";
$pt[4] = "'.$Maghreb.'";
$pt[5] = "'.$Isha.'";
$di[1] = "'.$Fajr1.'";
$di[6] = "'.$Shorouq1.'";
$di[2] = "'.$Zuhr1.'";
$di[3] = "'.$Asr1.'";
$di[4] = "'.$Maghreb1.'";
$di[5] = "'.$Isha1.'";
$TZ = '.$ttt.';
$DST = '.$DST.';
$RAM = "'.$ram[$countries[$city]].'"; 
$hdate = "'.$hdate.'"; 
$hijri = '.$hijri.'; 
?>';
        
//	$file = fopen("/home/internet/www/ig/prayertimes/times/$city-today.php", 'w') or die("error");
//	fwrite($file, $c);
//	fclose($file);
	
	$query = "UPDATE citiesathan SET 
	prayercitytime = $Fajr1, prayertime = " . ($Fajr1 - $ttt * 60 * 60) . " WHERE cityid = " . $id[$key] . " AND prayer = 1";
	mysql_query($query) or die(mysql_error() . " " . $query);

	$query = "UPDATE citiesathan SET 
	prayercitytime = $Zuhr1, prayertime = " . ($Zuhr1  - $ttt * 60 * 60) . " WHERE cityid = " . $id[$key] . " AND prayer = 2";
	mysql_query($query) or die(mysql_error());

	$query = "UPDATE citiesathan SET 
	prayercitytime = $Asr1, prayertime = " . ($Asr1 - $ttt * 60 * 60) . "  WHERE cityid = " . $id[$key] . " AND prayer = 3";
	mysql_query($query) or die(mysql_error());

	$query = "UPDATE citiesathan SET 
	prayercitytime = $Maghreb1, prayertime = " . ($Maghreb1 - $ttt * 60 * 60) . "  WHERE cityid = " . $id[$key] . " AND prayer = 4";
	mysql_query($query) or die(mysql_error());

	$query = "UPDATE citiesathan SET 
	prayercitytime = $Isha1, prayertime = " . ($Isha1 - $ttt * 60 * 60) . "  WHERE cityid = " . $id[$key] . " AND prayer = 5";
	mysql_query($query) or die(mysql_error());

	$query = "UPDATE citiesathan SET 
	prayercitytime = $Shorouq1, prayertime = " . ($Shorouq1 - $ttt * 60 * 60) . "  WHERE cityid = " . $id[$key] . " AND prayer = 6";
	mysql_query($query) or die(mysql_error());

	$query = "UPDATE cities SET 
	hijridate = '".$hdate."' WHERE id = " . $id[$key];
	mysql_query($query) or die(mysql_error());





/*
	$query = "INSERT INTO citiesathan (cityid, prayer, prayertime) 
	VALUES (".$id[$key].", 1, ".$Fajr1."), 
	(".$id[$key].", 2, ".$Zuhr1."), 
	(".$id[$key].", 3, ".$Asr1."), 
	(".$id[$key].", 4, ".$Maghreb1."), 
	(".$id[$key].", 5, ".$Isha1."),
	(".$id[$key].", 6, ".$Shorouq1.") ";
	mysql_query($query) or die(mysql_error());
*/








	// Time Zone
	$DST = $dstz[$city];
	//$DST = $dst[$val];
		$TZ = $tzs[$city] ;
//	$ts = (time() + 5 * 60 * 60) + ($TZ * 60 * 60);
	$ts = time() + ($TZ * 60 * 60);
	$ts = mktime(date("H", $ts), date("i", $ts), date("s", $ts), date("m", $ts), date("d", $ts)+1, date("Y", $ts));
	$Y = date("Y", $ts);
	$M = date ("m", $ts);
	$D = date("d", $ts);

        $mykey = $D . "-" . $M;

	// JULIANI START
	if($M < 3){
	$Y = $Y -1;
	$M = $M + 12;
	}
	$A = intval($Y/100);
	$B = 2 - $A + intval ($A/4);
	$JD = intval(365.25 * ($Y+4716)) + intval(30.6001 * ($M+1)) + $D + $B - 1524.5;
	// JULIANI END
	 

$L_ = intval($JD) - 1948439 + 10632 + $hijri;
$N_ = intval(($L_ - 1) / 10631);
$L_ = $L_ - 10631 * $N_ + 354;
$J_ = intval((10985 - $L_) / 5316) * intval((50 * $L_) / 17719) + intval($L_ / 5670) * intval((43 * $L_) / 15238);
$L_ = $L_ - intval((30 - $J_) / 15) * intval((17719 * $J_) / 50) - intval($J_ / 16) * intval((15238 * $J_) / 43) + 29;
$M_ = intval((24 * $L_) / 709);
$D_ = $L_ - intval((709 * $M_) / 24);
$Y_ = intval(30 * $N_ + $J_ - 30);

	$hdate = $D_ . "/" . $M_ . "/" . $Y_;


	// Longitude 

	$long = $longs[$city];
	// Latitude 
	$lat = $lats[$city];
	// Convert latitude to radian
	$lat = deg2rad($lat);

	// Time Equation (from table)
	$timeeq = $te[$mykey];
	// Tropical Slope (from table)
	// Convert Tropical Slope to radian
	$troslope = deg2rad($tro[$mykey]);
	// Samt Angles (from table)
	$samtshor = $samt1[$area[$city]];
	$samtfajr = $samt2[$area[$city]];
	$samtisha = $samt3[$area[$city]];
 
 	// Medium Longitude
	$medlong = $TZ * 15;
	// Longitude Difference
	$longdiff = ($medlong - $long)/15;

	$Zu = (((12 + $longdiff)/24) - ($timeeq/(24*60)));
	$Zuhr = tohours($Zu*24);
	$Zuhr1 = tohours24($Zu*24);

	$samt = deg2rad($samtfajr);
	$Hi = (cos($samt) - sin($lat) * sin($troslope)) / (cos($lat) * cos($troslope));
	$H = rad2deg(acos($Hi));

	$H = ($H / 15)/24;
	$Fa = $Zu - $H;
	$Fajr = tohours($Fa*24);
	$Fajr1 = tohours24($Fa*24);

	$samt = deg2rad($samtshor);
	$Hi = (cos($samt) - sin($lat) * sin($troslope)) / (cos($lat) * cos($troslope));
	$H = rad2deg(acos($Hi));

	$H = ($H / 15)/24;
	$Sh = $Zu - $H;
	$Shorouq = tohours($Sh*24);
	$Shorouq1 = tohours24($Sh*24);
	



	$samt = deg2rad($samtshor);
	$Hi = (cos($samt) - sin($lat) * sin($troslope)) / (cos($lat) * cos($troslope));
	$H = rad2deg(acos($Hi));

	$H = ($H / 15)/24;
	$Ma = $Zu + $H;
	$Maghreb = tohours($Ma*24);
	$Maghreb1 = tohours24($Ma*24);
	
	$samt = deg2rad($samtisha);
	$Hi = (cos($samt) - sin($lat) * sin($troslope)) / (cos($lat) * cos($troslope));
	$H = rad2deg(acos($Hi));

	if($area[$city] == "um"){
	$umm = 90;
	if($ram[$val] == "1") $umm = 120;
	$Ish = $Ma + $umm/60/24;
	}
else{	
	$H = ($H / 15)/24;
	$Ish = $Zu + $H;
}
	$Isha = tohours($Ish*24);
	$Isha1 = tohours24($Ish*24);
	

	// ASR ASR ASR ASR

	$samt = atan (1 + tan (abs( $lat - $troslope)));
	$samty = rad2deg($samt);
	$tim = ACOS( (SIN (deg2rad(90 - $samty)) - SIN($troslope)*SIN($lat)) / (COS($troslope)*COS($lat) ));
	$H = (rad2deg($tim)/15)/24;
	$As = $Zu + $H;
	$Asr = tohours($As*24);
	$Asr1 = tohours24($As*24);
	
	//extreme latitudes

        if($Isha1 <=0){
            $extreme = true;
            //include_once 'extreme_cache/'.$city['countryCode'].'-'.date('Y', $ts).'.php';
            include_once 'gb-2012.php';
                
            $Fajr1 = $Shorouq1-$chosen_period;
            $Isha1 = $Maghreb1+$chosen_period;
            
            $Fajr = date('h:i',$Fajr1).' '.$ampm[date('a',$Fajr1)];

            $Isha = date('h:i', $Isha1).' '.$ampm[date('a', $Isha1)];

        }
        
	$output = "<b>".ucfirst($car[$city]) . " - " . ucfirst($co[$countries[$city]]). "</b><br>
	".dateara($ts)."<br>
	<table border=0 cellpadding:5 cellspacing=0>
	<tr><td class=row1>" . $pr['Fajr'] ."</td><td class=row1>$Fajr</td></tr>
	<tr><td class=row2>" . $pr['Shorouq'] ."</td><td class=row2>$Shorouq</td></tr>
	<tr><td class=row1>" . $pr['Zuhr'] ."</td><td class=row1>$Zuhr</td></tr>
	<tr><td class=row2>" . $pr['Asr'] ."</td><td class=row2>$Asr</td></tr>
	<tr><td class=row1>" . $pr['Maghreb'] ."</td><td class=row1>$Maghreb</td></tr>
	<tr><td class=row2>" . $pr['Isha'] ."</td><td class=row2>$Isha</td></tr>
	</table>";
$ttt = $TZ;//+$DST;

	$c = '<?
$city = "'.$city.'";
$cityar = "'.$car[$city].'";
$country = "'.$co[$countries[$city]]. '";
$date = "'.dateara($ts).'";
$pt[1] = "'.$Fajr.'";
$pt[6] = "'.$Shorouq.'";
$pt[2] = "'.$Zuhr.'";
$pt[3] = "'.$Asr.'";
$pt[4] = "'.$Maghreb.'";
$pt[5] = "'.$Isha.'";
$di[1] = "'.$Fajr1.'";
$di[6] = "'.$Shorouq1.'";
$di[2] = "'.$Zuhr1.'";
$di[3] = "'.$Asr1.'";
$di[4] = "'.$Maghreb1.'";
$di[5] = "'.$Isha1.'";
$TZ = '.$ttt.';
$DST = '.$DST.';
$RAM = "'.$ram[$countries[$city]].'"; 
$hdate = "'.$hdate.'"; 
$hijri = '.$hijri.'; 
?>';
//	$file = fopen("/home/internet/www/ig/prayertimes/times/$city-tomorrow.php", 'w') or die("error");
//	fwrite($file, $c);
//	fclose($file);

	}
	else{
	$output = $not;	
	}	
	}
	echo 'Done
';
?>
