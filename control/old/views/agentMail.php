<?php
/**
 * @author maher
 * @copyright 2012
 */
?>
<form method="post" enctype="multipart/form-data" id="contactform" >
 <table class="table_addedit" align="center">
 <tr><td valign="top"><b>المرسل له</b></td><td><textarea cols="40" rows="8" name="to" class="mceNoEditor" dir="ltr"><?php if($default['to']){ echo $default['to']; }else{ echo $emailsInString; }?></textarea></td></tr>
 <tr><td><b>أضافه "," اوتوماتيك</b></td><td><input type="checkbox" name="comma" value="1" /></td></tr>
 <tr><td><b>عنوان الرساله</b></td><td><input type="text" name="subject" dir="rtl" value="<?php if($default['subject']){ echo $default['subject']; }else{ echo SITE_NAME;}?>" class="input" /></td></tr>
 <tr><td valign="top"><b>المحتوي</b></td><td><textarea cols="40" dir="rtl" rows="12" name="message"><?php echo $default['message']?></textarea></td></tr>
 <tr><td></td><td><input type="submit" name="Submit" value="أرسل" class="button"  /></td></tr>
 </table>
</form>