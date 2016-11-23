<?php
/**

 * @author yehia

 * @copyright 2010

 */

?>

    <form method="post" enctype="multipart/form-data" id="contactform" >
     <ul>

     <li><b><input type="radio" name="openclosed" value="true" <?php echo $default['open']?> /><span for="open">الموقع يعمل</span></b></li>

     <!--<li class="separator"></li>-->
     <li><b><input type="radio" name="openclosed" id="closed" value="false" <?php echo $default['closed']?> /><span for="closed">الموقع مغلق</span></b></li>

     <!--<li class="separator"></li>-->
     <li><b for="message"> رسالة الإغلاق</b></li>
     
     <!--<li class="separator"></li>-->
     <li>
     <textarea name="message" id="message" cols="40" rows="6"><?php echo $message?></textarea>
     </li>

     <!--<li class="separator"></li>-->
     <li><input type="submit" name="Submit" value="حفظ" class="button" style="margin-right: 500px;" /></li>
     
     </ul>
    </form>