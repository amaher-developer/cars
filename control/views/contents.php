<?php /* ?>
<html>
<head>
<title>Control Panal</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="rev_cont_style.css" type="text/css" rel="stylesheet">
<script src="scripts/jquery.js"></script>
<script src="scripts/calendar.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.min.js"></script>
<script type="text/javascript" src="scripts/ckeditor_en/ckeditor.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('textarea:not(.mceNoEditor)').addClass('ckeditor');
	});
</script>
</head>
<body>
<div style="margin:0 auto; text-align: center; padding: 0;">
<h1><?php echo $title?></h1>
<?php
if($errors){
?>
<ul class="failure">
<li class="please">please : </li>
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
if(!$success || !$successOnly){
	if($noRecords){
?>
<?php echo $noRecords?>
<?php
	}else
		include $module;
}
?>
</div>
</body>
</html>
<?php */ ?>




<?php
if($success){
?>
<?php echo $success?>
<?php
}
if(!$success || !$successOnly){
	if($noRecords){
?>
<?php echo $noRecords?>
<?php
	}else
		include $module;
}
?>