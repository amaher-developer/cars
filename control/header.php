<?php

$siteUrl = Globals::$siteURL;
$siteName = Globals::$siteName;
?>
<?php
if(Globals::isAdmin()){
?>

<div class="header">
<div class="container">
<div class="row">
<div class="cleaner-h2"></div>
<div class="col-lg-4 col-xs-12">
<img class="logo" src="images/logo.png"/>
</div><!--end col-4-->
<div class="col-lg-8 col-xs-12">
<div class="menu-first pull-right">
<ul>
            <li class="social"><a href="javascripts::void(0);"><i class="fa fa-dashboard"></i> مرحبا بك <?php echo $_SESSION['admin']['name']?></a></li>
<div class="cleaner-h1 hidden-xs"></div>
            <li class="social"><a href="index.php?p=default"><i class="fa fa-home"></i> الرئيسية</a></li>
            <li class="social"><a href="<?php echo $siteUrl?>" target="_blank"><i class="fa fa-briefcase"></i> تصفح الموقع</a></li>
            <li class="social"><a href="logout.php"><i class="fa fa-expand"></i> خروج</a></li>
        </ul>
        </div><!--end menu-first-->
</div><!--end col-8-->
<div class="cleaner-h2"></div>
</div><!--end row-->
</div><!--end container-->
</div>

<?php } ?>