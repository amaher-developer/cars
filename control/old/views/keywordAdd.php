<?php
/**
 * @author maher
 * @copyright 2012
 */
?>
<?php if($successMessage){ ?>
<p class="error"><?php echo $successMessage?></p>
<?php } ?>
<form method="post" enctype="multipart/form-data" id="contactform" >
 <table class="table_addedit" align="center">
 <tr><td><b>النوع</b></td>
 <td>
 <select name="typeId" class="selector">
 <?php foreach($types as $type){ ?>
 <option value="<?php echo $type['id']?>"><?php echo $type['name']?></option>
 <?php } ?>
 </select>
 </td></tr>
 <tr><td><b>كلمات البحث</b></td><td><textarea cols="60" rows="10" name="keyword" class="mceNoEditor" placeholder="عقارات, عقار, شقه, ارض, ..." dir="rtl"><?php if($default['keyword']){ echo $default['keyword']; }?></textarea></td></tr>
 <tr><td></td><td><input type="submit" name="Submit" value="حفظ" class="button"  /></td></tr>
 </table>
</form>

