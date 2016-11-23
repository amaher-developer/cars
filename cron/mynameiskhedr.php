<?  
	session_start();
	if($_GET['yes'] == "YES") $_SESSION['loggedin'] = "YES";
	if($_SESSION['loggedin'] == "YES"){
$db_host = "localhost";
$db_name = "athantwe_athan";
$db_user = "athantwe_athan";
$db_pass = "d&lUP*S}#V}d";
		$link = mysql_connect("$db_host", "$db_user", "$db_pass") or die($error_msg);
		mysql_select_db($db_name, $link);

	function prep($text){
		
	}

	$m['eg'] = "هيئة المساحة المصرية";
	$m['bo'] = "رابطة العالم الاسلامي";
	$m['um'] = "ام القرى";
	$m['us'] = "امريكا الشمالية";
	$m['ka'] = "جامعة العلوم الاسلامية كراتشي";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir=rtl>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prayer Times</title>
<style>
body, div, input, p, td, .input {font: normal 14px Tahoma; margin: 10px;}
h1 {font: bold 16px Arial; margin: 10px;}
</style>
</head>

<body>

  <?
	$do = $_GET['do'];
	switch($do){
	
	case 'addcountry':
?>
<h1>اضافة دولة</h1>
<form action="mynameiskhedr.php?do=addcountrydone" method="post">
<table width="90%" border="1">
  <tr>
    <td width="30%">اختصار اسم الدولة: </td>
    <td><label>
      <input name="country" type="text" id="country"  dir="ltr" />
    </label></td>
  </tr>
  <tr>
    <td>اسم الدولة الثلاثي: </td>
    <td><label>
      <input name="con" type="text" id="con"  dir="ltr" />
    </label></td>
  </tr>
  <tr>
    <td>الاسم الانجليزي: </td>
    <td><label>
      <input name="coen" type="text" id="coen"  dir="ltr" />
    </label></td>
  </tr>
  <tr>
    <td>الاسم العربي: </td>
    <td><label>
      <input name="co" type="text" id="co" />
    </label></td>
  </tr>
  <tr>
    <td>طريقة الحساب: </td>
    <td><label>
      <select name="method" class="input">
<?
	foreach($m as $key => $val){
?>
	  <option value="<?=$key?>"><?=$val?></option>
<?
	}
?>
      </select>
    </label></td>
  </tr>
  <tr>
    <td>التوقيت الصيفي: </td>
    <td><label>
      <input name="dst" type="checkbox" id="dst" value="1" />
    نعم</label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input name="Submit" type="submit" id="Submit" value="اضافة" />
    </label></td>
  </tr>
</table>



</form>


<?	
	
	break;
	
	case 'addcountrydone':
	foreach($_POST as $key => $val){
	$$key = mysql_real_escape_string($val);
	}
	if($dst == "") $dst = '0';
	$query = "INSERT INTO countries (
	country, co, coen, con, dst, method
	) VALUES (
	'$country', '$co', '$coen', '$con', '$dst', '$method'
	)";
	echo $query;
	//mysql_query($query) or die(mysql_error());
	
?>
<h1>اضافة دولة</h1>

<p>تم عمل المطلوب</p>

<?	
	break;




	case 'editcountry':
	$countryid = intval($_POST['countryid']);
	$result = mysql_query("SELECT * FROM countries WHERE countryid = $countryid");
	if(mysql_num_rows($result) > 0){
	$rs = mysql_fetch_assoc($result);
	
?>
<h1>تعديل بيانات دولة</h1>
<form action="mynameiskhedr.php?do=ditcountrydone" method="post">
<input type="hidden" name="countryid" value="<?=$countryid?>" />

<table width="90%" border="1">
  <tr>
    <td width="30%">اختصار اسم الدولة: </td>
    <td><label>
      <input name="country" type="text" id="country"  dir="ltr" value="<?=$rs['country']?>" />
    </label></td>
  </tr>
  <tr>
    <td>اسم الدولة الثلاثي: </td>
    <td><label>
      <input name="con" type="text" id="con"  dir="ltr" value="<?=$rs['con']?>" />
    </label></td>
  </tr>
  <tr>
    <td>الاسم الانجليزي: </td>
    <td><label>
      <input name="coen" type="text" id="coen"  dir="ltr"  value="<?=$rs['coen']?>"/>
    </label></td>
  </tr>
  <tr>
    <td>الاسم العربي: </td>
    <td><label>
      <input name="co" type="text" id="co"  value="<?=$rs['co']?>"/>
    </label></td>
  </tr>
  <tr>
    <td>طريقة الحساب: </td>
    <td><label>
      <select name="method" class="input">
<?
	foreach($m as $key => $val){
	$sel  = "";
	if($rs['method'] == $key) $sel = "selected";
	
?>
	  <option value="<?=$key?>" <?=$sel?>><?=$val?></option>
<?
	}
?>
      </select>
    </label></td>
  </tr>
  <tr>
    <td>التوقيت الصيفي: </td>
    <td><label>
<input type="hidden" name="olddst" value="<?=$rs['dst']?>" />
      <input name="dst" type="checkbox" id="dst" value="1"  <? if($rs['dst'] == "1") echo "checked"; ?> />
    نعم</label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input name="Submit" type="submit" id="Submit" value="تعديل" />
    </label></td>
  </tr>
</table>



</form>


<?	
	}
	break;
	
	case 'ditcountrydone':
	foreach($_POST as $key => $val){
	$$key = mysql_real_escape_string($val);
	}
	if($dst == "") $dst = '0';
	$query = "UPDATE countries 
	SET 
	country ='$country',  
	co = '$co',
	coen =  '$coen', 
	con =  '$con',
	dst =  '$dst',
	method =  '$method'
	 
	WHERE countryid = $countryid";
	mysql_query($query) or die(mysql_error());
	
	if($dst <> $olddst) mysql_query("UPDATE cities SET dstz = '$dst' WHERE countries = '$country'") or die(mysql_error());
	
?>
<h1>تعديل بيانات دولة</h1>

<p>تم عمل المطلوب</p>

<?	
	break;
	
	
		
	case 'addcity':
?>

<h1>اضافة مدينة</h1>

<form action="mynameiskhedr.php?do=addcitydone" method="post"> 
<table width="90%" border="1">
  <tr>
    <td>الدولة: </td>
    <td><label>
      <select name="countries" class="input">
<?
	$result = mysql_query("SELECT * FROM countries ORDER BY co");
	while($rs=mysql_fetch_assoc($result)){
?>
	  <option value="<?=$rs['country']?>"><?=$rs['co']?> <?=$m[$rs['method']]?></option>
<?
	}
?>
      </select>
    </label></td>
  </tr>
  <tr>
    <td width="30%">الاسم الانجليزي المختصر: </td>
    <td><label>
      <input name="city" type="text" id="country" dir="ltr" />
    </label></td>
  </tr>
  <tr>
    <td>الاسم الانجليزي: </td>
    <td><label>
      <input name="cen" type="text" id="con"  dir="ltr" />
    </label></td>
  </tr>
  <tr>
    <td>الاسم العربي: </td>
    <td><label>
      <input name="car" type="text" id="coen" />
    </label></td>
  </tr>

  <tr>
    <td>طريقة الحساب: </td>
    <td><label>
      <select name="area" class="input">
<?
	foreach($m as $key => $val){
?>
	  <option value="<?=$key?>"><?=$val?></option>
<?
	}
?>
      </select>
    </label></td>
  </tr>

  <tr>
    <td>خط العرض: </td>
    <td><label>
      <input name="lats" type="text" id="co"  dir="ltr" />
    </label></td>
  </tr>

  <tr>
    <td>خط الطول: </td>
    <td><label>
      <input name="longs" type="text" id="co" dir="ltr" />
    </label></td>
  </tr>

  <tr>
    <td>منطقة الزمن: </td>
    <td><label>
      <input name="tzs" type="text" id="co" dir="ltr" />
    </label></td>
  </tr>

  <tr>
    <td>التوقيت الصيفي: </td>
    <td><label>
      <input name="dstz" type="radio"  value="0" checked /> لا 
 <input name="dstz" type="radio"  value="1" />    نعم</label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input name="Submit" type="submit" id="Submit" value="اضافة" />
    </label></td>
  </tr>
</table>



</form>



<?	
	
	break;


	case 'addcitydone':
	foreach($_POST as $key => $val){
	$$key = mysql_real_escape_string($val);
	}
	if($dstz == "") $dstz = '0';
	$query = "INSERT INTO cities (
	city, lats, longs, tzs, car, cen, countries, area, dstz
	) VALUES (
	'$city', '$lats', '$longs', '$tzs', '$car', '$cen', '$countries', '$area', '$dstz'
	)";
//	echo $query;
	mysql_query($query) or die(mysql_error());
	
?>
<h1>اضافة مدينة</h1>

<p>تم عمل المطلوب</p>
<p><a href="?do=addcity">اضافة مدينة</a></p>
<?	
	break;



	case 'editcity':

	$id = intval($_POST['id']);
	$result = mysql_query("SELECT * FROM cities WHERE id = $id");
	if(mysql_num_rows($result) > 0){
	$rs = mysql_fetch_assoc($result);
	
?>

<h1>تعديل بيانات مدينة</h1>

<form action="mynameiskhedr.php?do=editcitydone" method="post"> 
<input type="hidden" name="id" value="<?=$id?>" />
<table width="90%" border="1">
  <tr>
    <td>الدولة: </td>
    <td><label>
      <select name="countries" class="input">
<?
	$result1 = mysql_query("SELECT * FROM countries ORDER BY co");
	while($rs1=mysql_fetch_assoc($result1)){
	$sel  = "";
	if($rs['countries'] == $rs1['country']) $sel = "selected";
?>
	  <option value="<?=$rs1['country']?>" <?=$sel?>><?=$rs1['co']?> <?=$m[$rs1['method']]?></option>
<?
	}
?>
      </select>
    </label></td>
  </tr>
  <tr>
    <td width="30%">الاسم الانجليزي المختصر: </td>
    <td><label>
      <input name="city" type="text" id="country" dir="ltr" value="<?=$rs['city']?>" />
    </label></td>
  </tr>
  <tr>
    <td>الاسم الانجليزي: </td>
    <td><label>
      <input name="cen" type="text" id="con"  dir="ltr" value="<?=$rs['cen']?>" />
    </label></td>
  </tr>
  <tr>
    <td>الاسم العربي: </td>
    <td><label>
      <input name="car" type="text" id="coen"  value="<?=$rs['car']?>" />
    </label></td>
  </tr>

  <tr>
    <td>طريقة الحساب: </td>
    <td><label>
      <select name="area" class="input">
<?
	foreach($m as $key => $val){
	$sel  = "";
	if($rs['area'] == $key) $sel = "selected";
?>
	  <option value="<?=$key?>" <?=$sel?>><?=$val?></option>
<?
	}
?>
      </select>
    </label></td>
  </tr>

  <tr>
    <td>خط العرض: </td>
    <td><label>
      <input name="lats" type="text" id="co"  dir="ltr" value="<?=$rs['lats']?>"  />
    </label></td>
  </tr>

  <tr>
    <td>خط الطول: </td>
    <td><label>
      <input name="longs" type="text" id="co" dir="ltr" value="<?=$rs['longs']?>"  />
    </label></td>
  </tr>

  <tr>
    <td>منطقة الزمن: </td>
    <td><label>
      <input name="tzs" type="text" id="co" dir="ltr" value="<?=$rs['tzs']?>"  />
    </label></td>
  </tr>

  <tr>
    <td>التوقيت الصيفي: </td>
    <td><label>
      <input name="dstz" type="radio"  value="0" <? if($rs['dstz'] == "0") echo "checked"; ?> /> لا 
 <input name="dstz" type="radio"  value="1"  <? if($rs['dstz'] == "1") echo "checked"; ?> />    نعم</label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input name="Submit" type="submit" id="Submit" value="تعديل" />
    </label></td>
  </tr>
</table>



</form>



<?	
}
	
	break;


	case 'editcitydone':
	foreach($_POST as $key => $val){
	$$key = mysql_real_escape_string($val);
	}
	if($dstz == "") $dstz = '0';
	$query = "UPDATE cities SET 
	city = '$city', 
	lats ='$lats' , 
	longs = '$longs', 
	tzs = '$tzs', 
	car = '$car', 
	cen = '$cen', 
	countries = '$countries', 
	area = '$area', 
	dstz = '$dstz'
	WHERE id = $id";
	mysql_query($query) or die(mysql_error());
	
?>
<h1>تعديل بيانات مدينة</h1>

<p>تم عمل المطلوب</p>
<?	
	break;




/*
	case 'addcountryscript':
	include("where.php");
	foreach($co as $key => $val){
	$query = "INSERT INTO countries (
	country, co, coen, con, dst, method, ram
	) VALUES (
	'$key', '$val', '$coen[$key]', '$con[$key]', '$dst[$key]', '$method[$key]', '$ram[$key]'
	)";
	//echo $query;
	mysql_query($query) or die(mysql_error());
	
?>
<p><?=$val?></p>

<?	
	}
	break;
*/
/*
	case 'addcityscript':
	include("when.php");
	foreach($id as $key => $val){
	$query = "INSERT INTO cities (
	city, lats, longs, tzs, car, cen, countries, area, dstz, ram
	) VALUES (
	'$city[$key]', '$lats[$key]', '$longs[$key]', '$tzs[$key]', '$car[$key]', '$cen[$key]', '$countries[$key]', '$area[$key]', '$dstz[$key]', '$ram[$key]'
	)";
	//echo $query;
	mysql_query($query) or die(mysql_error());
	
?>
<p><?=$city[$key]?></p>


<?	
	}
	break;
*/	

	case 'export':
	$c = '<?
';
//$c = '<div align=left dir=ltr>';

	$result = mysql_query("SELECT * FROM settings");
	while($rs=mysql_fetch_assoc($result)){
	$c .= '$'.$rs['title'].' = '.$rs['value'].'; 
';
	$$rs['title'] = $rs['value'];
	}	

	mysql_query("UPDATE countries SET ram = '$ramadan' WHERE method = 'um'");
	mysql_query("UPDATE cities SET ram = '$ramadan' WHERE area = 'um'");

	$result = mysql_query("SELECT * FROM countries ORDER BY country");
	while($rs=mysql_fetch_assoc($result)){
	$key = $rs['country'];
	$c .= '$co["'.$key.'"] = "'.$rs['co'].'"; $coen["'.$key.'"] = "'.$rs['coen'].'";  $dst["'.$key.'"] = '.$rs['dst'].'; $ram["'.$key.'"] = "'.$rs['ram'].'"; $con["'.$key.'"] = "'.$rs['con'].'"; $method["'.$key.'"] = "'.$rs['method'].'";
';
	
	}	
	
	$result = mysql_query("SELECT * FROM cities ORDER BY city");
	while($rs=mysql_fetch_assoc($result)){
	$key = $rs['city'];
	$c .= '$id["'.$key.'"] = "'.$rs['id'].'"; $city["'.$key.'"] = "'.$rs['city'].'"; $lats["'.$key.'"] = "'.$rs['lats'].'";  $longs["'.$key.'"] = "'.$rs['longs'].'"; $tzs["'.$key.'"] = "'.$rs['tzs'].'"; $car["'.$key.'"] = "'.$rs['car'].'"; $cen["'.$key.'"] = "'.$rs['cen'].'"; $countries["'.$key.'"] = "'.$rs['countries'].'"; $area["'.$key.'"] = "'.$rs['area'].'"; $dstz["'.$key.'"] = "'.$rs['dstz'].'"; $ram["'.$key.'"] = "'.$rs['ram'].'";
';
	}	
	

	
$c .= '?>';	
file_put_contents("who.php", $c);
?>
<p>تم التصدير</p>
<p><a href="exportme.php" target="_blank">تصدير المواقيت</a></p>
<?
	break;


	case 'hijri':
	include("who.php");
?>
<form action="mynameiskhedr.php?do=hijridone" method="post"> 
<table width="90%" border="1">
  <tr>
    <td width="30%">تصحيح الهجري:  </td>
    <td><label>
    <?
	for($i=-1; $i<2; $i++){
	?>
	  <input name="hijri" type="radio" value="<?=$i?>" <? if($i == $hijri) echo "checked"; ?> /> <?=$i?>
    <?
	}
	?>
	</label></td>
  </tr>
  <tr>
    <td>رمضان:</td>
    <td><label>
    <?
	for($i=0; $i<2; $i++){
	?>
   	  <input name="ramadan" type="radio" value="<?=$i?>" <? if($i == $ramadan) echo "checked"; ?> /> <?=$i?>
  	<?
		}
	?> 
	</label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input name="Submit" type="submit" id="Submit" value="تعديل" />
    </label></td>
  </tr>
</table>


</form>

<?	
	
	break;


	case 'hijridone':
	
	$hijri = $_POST['hijri'];
	$ramadan = $_POST['ramadan'];
	mysql_query("UPDATE settings SET value = '$hijri' WHERE title = 'hijri'");
	mysql_query("UPDATE settings SET value = '$ramadan' WHERE title = 'ramadan'");



?>
<p>تم التعديل</p>
<p> <a href="?do=export">تصدير</a></p>

<?	
	break;

	default:
?>
<form method="post" action="?do=editcountry">
<select name="countryid">
<?
	$result = mysql_query("SELECT * FROM countries ORDER BY BINARY co");
	while($rs=mysql_fetch_assoc($result)){
?>
<option value="<?=$rs['countryid']?>"><?=$rs['co']?><? if($rs['dst'] == '1') echo " [ص]"; ?></option>
<?
	}
?>
</select> <input name="Submit" type="submit" value ="تعديل" />
</form>

<form method="post" action="?do=editcity">
<select name="id">
<?
	$result = mysql_query("SELECT * FROM cities ORDER BY BINARY car");
	while($rs=mysql_fetch_assoc($result)){
?>
<option value="<?=$rs['id']?>"><?=$rs['car']?></option>
<?
	}
?>
</select> <input name="Submit" type="submit" value ="تعديل" />
</form>

<p><a href="?do=hijri">تعديل الهجري ورمضان</a></p>
<p> <a href="?do=dst">تعديل التوقيت الصيفي</a></p>
<p> <a href="?do=countries">عرض الدول</a></p>
<p> <a href="?do=addcountry">اضافة دولة</a></p>
<p><a href="?do=addcity">اضافة مدينة</a></p>
<p> <a href="?do=export">تصدير</a></p>
  <?	
	break;


	}
?>	
<p><a href="?do=">الرئيسية</a></p>

</body>
</html>
<?
	}
?>