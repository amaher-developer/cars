<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php echo $title?></title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
 
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="css/menu.css"/>

<script type="text/javascript" src="scripts/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="scripts/bootstrap.min.js"></script>


</head>
<body>

<?php if(Globals::isAdmin()){ ?>

<?php include 'header.php'?>
<?php include 'cp_menu.php'?>

<?php } ?>
<?php /* if($errors){ ?>
<ul class="failure">
<li class="please">Please:</li>
<?php
    foreach($errors as $val){
?>
<li>
<?php echo $val?>
</li>
<?php
    }
?>
</ul>
<?php
}elseif($success){
?>
<?php echo $success?>
<?php
}
*/

if(!$success || !$successOnly){
	if($noRecords){
?>
<?php echo $noRecords?>
<?php
	}else
		include $module;
}
?>

<?php if(Globals::isAdmin()){ ?>

<div class="cleaner-h3"></div>
<div class="footer">
<div class="container">
<div class="row">
<div class="col-lg-12 text-center">
<a href="#">Copyright By Ahmed Gamal</a>
</div>
</div>
</div>
</div><!--end footer-->

<?php } ?>




</body>
<!-- END BODY -->
</html>