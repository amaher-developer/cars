<?
/**

 * @author yehia

 * @copyright 2010

 */
?>

    <form method="post" enctype="multipart/form-data" id="contactform">
     <ul>
     <li><b>بيانات اساسية</b></li>
     
     <!--<li class="separator"></li>-->
     <li>عنوان الموقع</li>
     <li><input type="text" name="siteName" value="<?php echo $default['siteName']?>" class="input" /></li>

     <!--<li class="separator"></li>-->
     <li>البريد الإلكتروني</li>
     <li><input type="text" name="siteEmail" value="<?php echo $default['siteEmail']?>" dir="ltr" class="input" /></li>
     
     <!--<li class="separator"></li>-->
     <li><input type="submit" name="Submit" value="حفظ" class="button" style="margin-right: 500px;" /></li>

     </ul>
    </form>