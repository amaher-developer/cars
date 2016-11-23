<?
/**

 * @author yehia

 * @copyright 2010

 */
?>

    <form method="post" enctype="multipart/form-data" class="table_addedit">
     <ul>
     <li><b>Main Information</b></li>
     
     <!--<li class="separator"></li>-->
     <li>website title</li>
     <li><input type="text" name="siteName" value="<?php echo $default['siteName']?>" class="input" /></li>

     <!--<li class="separator"></li>-->
     <li>email address</li>
     <li><input type="text" name="siteEmail" value="<?php echo $default['siteEmail']?>" class="input" /></li>
     
     <!--<li class="separator"></li>-->
     <li><input type="submit" name="Submit" value="save" class="button" /></li>

     </ul>
    </form>