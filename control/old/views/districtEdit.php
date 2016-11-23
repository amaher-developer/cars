<form method="post" action="contents.php?page=districtEdit&id=<?php echo $default['id']?>" id="contactform">
<table class="table_addedit" align="center">
<tr>
<td><b>المحافظة</b></td>
<td>
<select name="cityId" class="select_record select">
<?php foreach($cities as $city){ ?>
<option value="<?php echo $city['id']?>"
<?php if($city['id'] == $default['cityId']){echo 'selected=""';}?>
><?php echo $city['name']?></option>
<?php } ?>
</select>
</td>
</tr>
<tr><td><b>الأسم</b></td><td><input type="text" name="name" value="<?php echo $default['name']; ?>" class="input" /></td></tr>
<tr><td><b>الأسم بالانجليزي</b></td><td><input type="text" name="name_en" value="<?php echo $default['name_en']; ?>" class="input" /></td></tr>
<tr><td></td><td><input type="submit" name="Submit" value="تعديل" class="button" /></td></tr>
</table>
</form>