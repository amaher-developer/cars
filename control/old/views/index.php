<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $title?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css"/>
    <link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="css/menu.css"/>
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $('.datepicker').css('text-align', 'left');
    $(".datepicker").datepicker({dateFormat: "dd-mm-yy"});
    $('input[name=Reset]').click(function(){
        //alert('?');
        history.back();
    });

    <?php
    if($_GET['print']) {
        ?>
        $('.noPrint').hide();
        window.print();
    <?php
    }
    ?>
});
</script>
    <style type="text/css" media="print">
        @page
        {
            size: auto;   /* auto is the initial value */
            margin: 0mm;  /* this affects the margin in the printer settings */
        }
    </style>
<style>
/*
.maher {
    width: 1245px;
}
*/
.boody {
    min-height: 300px !important;
}

</style>
<script>
$(document).ready(function () {
        var url = window.location;
    // Will only work if string in href matches with location
        $('ul.nav a[href="' + url + '"]').parent().addClass('active');

    // Will also work for relative and absolute hrefs
        $('ul.nav a').filter(function () {
            return this.href == url;
        }).addClass('active').parent().addClass('active');
    });
</script>
</head>
<body>
<?php
if($_GET['p'] == 'login') {
?>
    <div class="col-sm-12" style="background-color: #ffffff;text-align: center;display: inline-block; padding: 20px;">
        <img class="logo" src="img/logo1.png"/>
    </div><!--end col-4-->
    <?php
}else{
?>
<div class="header noPrint">
    <div class="container">
        <div class="row">
            <div class="cleaner-h2"></div>
            <div class="col-lg-4 col-xs-12"  style="background-color: #ffffff;text-align: center;">
                <img class="logo" src="img/logo1.png"/>
            </div><!--end col-4-->
            <div class="col-lg-8 col-xs-12">
                <div class="menu-first pull-right">
                    <ul>
                        <li class="social"><a href="index.php"><a><i class="fa fa-dashboard"></i> مرحبا بك <?php echo $_SESSION['admin']['name']?> </a></li>
                        <div class="cleaner-h1 hidden-xs"></div>
                        <li class="social"><a href="index.php"><i class="fa fa-home"></i> الرئيسية</a></li>
                       <li class="social"><a href="index.php?p=passwordEdit"><i class="fa fa-briefcase"></i> تعديل كلمة المرور</a></li>
                        <li class="social"><a href="index.php?p=login"><i class="fa fa-expand"></i> خروج</a></li>
                    </ul>
                </div><!--end menu-first-->
            </div><!--end col-8-->
            <div class="cleaner-h2"></div>
        </div><!--end row-->
    </div><!--end container-->
</div>
<div class="menu_main noPrint">
<div class="container">
<div class="navbar yamm maher">
<div>
    <div class="navbar-toggle .navbar-collapse .pull-right " data-toggle="collapse" data-target="#navbar-collapse-1"  > <span>Menu</span>
        <button type="button" > <i class="fa fa-bars"></i></button>
    </div>
</div>
    <div id="navbar-collapse-1" class="navbar-collapse collapse colaspse-gemy noPrint">
        <ul class="nav navbar-nav">
            <li><a href="index.php?p=default">التقارير</a></li>
            <li class="dropdown"> <a href="index.php?p=reports" data-toggle="dropdown" class="dropdown-toggle">النقلات</a>
                <ul class="dropdown-menu multilevel" role="menu">

                    <li><a href="index.php?p=trips">عرض النقلات</a></li>
                    <li><a href="index.php?p=tripAdd">أضافة نقلة</a></li>
                </ul>
            </li>
            <li class="dropdown"> <a href="index.php?p=reports" data-toggle="dropdown" class="dropdown-toggle">الحسابات</a>
                <ul class="dropdown-menu multilevel" role="menu">

                    <li><a href="index.php?p=accounting">تقرير حسابات</a></li>
                    <li><a href="index.php?p=incomeAdd">أضافة وارد</a></li>
                    <li><a href="index.php?p=expenseAdd">أضافة صارد</a></li>
                </ul>
            </li>
            <li class="dropdown"> <a href="index.php?p=reports" data-toggle="dropdown" class="dropdown-toggle">العملاء</a>
                <ul class="dropdown-menu multilevel" role="menu">

                    <li><a href="index.php?p=clients">عرض العملاء</a></li>
                    <li><a href="index.php?p=clientAdd">أضافة عميل</a></li>
                </ul>
            </li>
            <li class="dropdown"> <a href="index.php?p=reports" data-toggle="dropdown" class="dropdown-toggle">الموردون</a>
                <ul class="dropdown-menu multilevel" role="menu">

                    <li><a href="index.php?p=suppliers">عرض الموردون</a></li>
                    <li><a href="index.php?p=supplierAdd">أضافة مورد</a></li>
                </ul>
            </li>
            <li class="dropdown"> <a href="index.php?p=reports" data-toggle="dropdown" class="dropdown-toggle">الموظفون</a>
                <ul class="dropdown-menu multilevel" role="menu">

                    <li><a href="index.php?p=admins">عرض الموظفين</a></li>
                    <li><a href="index.php?p=adminAdd">أضافة موظف</a></li>
                </ul>
            </li>
        </ul>
</div>
</div>
</div>
    </div>
<?php
}
?>
<div class="boody">
<div>
<?php
/*if($errors){
    ?>
    <ul class="alert alert-danger display">
        <li class="please">من فضلك:</li>
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
?></div><?php
if(!$success || !$successOnly){
    if($noRecords){
        ?>
        <div style="text-align: center;" class="alert alert-danger display"><?php echo $noRecords?></div>
    <?php
    }else*/
        include $module;
//}
?>
</div>
</div><!-- end menu -->
<div class="container">
<div class="row">
<div class="cleaner-h2 visible-xs"></div>
</div><!--end row-->
</div><!--end container-->
<div class="cleaner-h3"></div>
<div class="footer" style="height:80px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <a>Faster for Transport</a>
                <br />
                <a style="font-size:12px;font-weight: normal;" href="http://www.manassa.net" target="_blank">Developed by Manassa Solutions</a>
            </div>
        </div>
    </div>
</div><!--end footer-->
</body>
</html>