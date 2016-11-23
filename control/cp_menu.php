<?php
//include '../prepare.php';
$adminLoggedIn = Globals::isAdmin();

/*
$fetch = new Course();
$fetch->addCondition('deleted = "0"');
$fetch->addOrderBy('id asc');
$fetch->prepare();
$courses = $fetch->getRecordSet();

$fetch = new Level('select a.*, b.id bId, b.title course from levels a left join courses b on a.courseId = b.id');
$fetch->addCondition('a.deleted = "0"');
$fetch->addOrderBy('b.id asc');
$fetch->prepare();
$levels = $fetch->getRecordSet();
*/


if(!$adminLoggedIn){
    $_COOKIE['user_id'];
    $userId_cookie = (int)$_COOKIE['user_id'];
    if($userId_cookie){
        $fetch = new Admin('select a.*, b.id bId, b.name permissions_name, b.permissions from admins a left join admins_groups b on a.groupId = b.id');
        $fetch->addCondition('a.id = "'.$userId_cookie.'" and a.visible = "1"');
        $fetch->prepare();
        $user_cookie = $fetch->getSingleRecord();
        if($user_cookie){
            $_SESSION['adminId'] = $user_cookie['id'];
            $_SESSION['admin'] = $user_cookie;
            echo '<script>location.reload();</script>';
        }
            
    }  
}else{
    setcookie('user_id', $adminLoggedIn['id']);
    //$_COOKIE['user_id'] = $adminLoggedIn['id'];
}


?>
<?php if($adminLoggedIn){ ?>
<?php

// Page Report
//$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//AdminLog::insert($_SESSION['admin']['id'], '', '', $_GET['p'], $actual_link);

// if not have premissions redirect it to another page.

$get_page = $_GET['p'];
$premissions_str = $_SESSION['admin']['permissions'];
$premissions_ar = explode(',', $_SESSION['admin']['permissions']);
$premissions_str = implode(' ', $premissions_ar);
$premissions_str = ' '.$premissions_str;

if($_SESSION['admin']['groupId'] && !in_array($get_page, $premissions_ar)){
    //echo "<script>window.location = '".Globals::$siteURL."index.php?p=default'</script>";
}




foreach(new RecursiveIteratorIterator( new RecursiveDirectoryIterator("controllers/")) as $file) {
  if (strtolower(substr($file, -4)) == ".php") {
        $key = trim(str_replace('.php', '', str_replace('controllers\\','', str_replace("controllers/", '', $file))));
        $user_pages[] = $key;
  }
}
//$user_pages = array('users', 'userAdd', 'userEdit', 'reports', 'emails', 'userMail', 'emailAdd', 'userGroups', 'userGroupAdd', 'userGroupEdit', 'callLogins',);

?>
<div class="menu_main">
    <div class="container">
	<div class="navbar yamm">
      <div>
        <div class="navbar-toggle .navbar-collapse .pull-right " data-toggle="collapse" data-target="#navbar-collapse-1"  > <span>Menu</span>
          <button type="button" > <i class="fa fa-bars"></i></button>
        </div>
      </div>
      <div id="navbar-collapse-1" class="navbar-collapse collapse colaspse-gemy">
        <ul class="nav navbar-nav">
        <li><a href="index.php?p=default" class="active">الرئيسية</a></li>
        <li class="dropdown"> <a href="" data-toggle="dropdown" class="dropdown-toggle">الأعضاء</a>
          <ul class="dropdown-menu multilevel" role="menu">
            <li><a href="index.php?p=admins">الأعضاء</a></li>
            <li><a href="index.php?p=adminAdd">أضافة عضو</a></li>
            <li><a href="index.php?p=adminGroups">العضويات</a></li>
            <li><a href="index.php?p=adminGroupAdd">أضافة عضوية</a></li>
          </ul>
        </li>
        <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle">الأماكن</a>
        <ul class="dropdown-menu" role="menu">
          <li> <a href="index.php?p=places">الأماكن</a> </li>
          <li> <a href="index.php?p=placeAdd">أضافة مكان</a> </li>
        </ul>
        </li>
        <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle">الأقسام</a>
        <ul class="dropdown-menu" role="menu">
          <li> <a href="index.php?p=categories">الأقسام</a> </li>
          <li> <a href="index.php?p=categoryAdd">أضافة قسم</a> </li>
        </ul>
        </li>
        
        <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle">الأخبار</a>
        <ul class="dropdown-menu" role="menu">
          <li> <a href="index.php?p=news">الأخبار</a> </li>
          <li> <a href="index.php?p=newsAdd">أضافة خبر</a> </li>
        </ul>
        </li>
        
        <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle">الأعلانات</a>
        <ul class="dropdown-menu" role="menu">
          <li> <a href="index.php?p=ads">الأعلانات</a> </li>
          <li> <a href="index.php?p=advAdd">أضافة أعلان</a> </li>
        </ul>
        </li>
        
        <li class="dropdown"> <a href="#" data-toggle="dropdown" class="dropdown-toggle">أتصل بنا</a>
        <ul class="dropdown-menu" role="menu">
          <li> <a href="index.php?p=contacts">أتصل بنا</a> </li>
        </ul>
        </li>
        
      </div>
      </div>
     </div>
    </div>
<?php } ?>