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
 <tr><td><b>الايميلات المضافه</b></td><td><textarea cols="60" rows="10" name="email" class="mceNoEditor" placeholder="" dir="ltr"><?php if($default['email']){ echo $default['email']; }?></textarea></td></tr>
 <tr><td></td><td><input type="submit" name="Submit" value="أرسل" class="button"  /></td></tr>
 </table>
</form>

