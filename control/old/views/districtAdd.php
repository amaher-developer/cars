<form method="post" action="contents.php?page=districtAdd" id="contactform">
<table class="table_addedit" align="center">
<tr>
<td><b>المحافظة</b></td>
<td>
<select name="cityId" class="select_record select">
<?php foreach($cities as $city){ ?>
<option value="<?php echo $city['id']?>"
<?php if($city['id'] == $default['cityId'] || $city['id'] == $_SESSION['cityId']){echo 'selected=""';}?>
><?php echo $city['name']?></option>
<?php } ?>
</select>
</td>
</tr>
<tr><td><b>الأسم</b></td><td><input type="text" name="name" size="64" value="<?php echo $default['name']?>" class="input" /></td></tr>
<tr><td><b>الأسم بالانجليزي</b></td><td><input type="text" name="name_en" value="<?php echo $default['name_en']; ?>" class="input" /></td></tr>
<tr><td></td><td><input type="submit" name="Submit" value="أضافة" class="button" /></td></tr>
</table>
</form>
<?php unset($_SESSION['cityId'])?>