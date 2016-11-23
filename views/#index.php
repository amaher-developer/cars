<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="ar">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <title><?php echo $title?></title>
        
        <meta name="keywords" content="<?php echo $keywords?>" />
        <meta name="description" content="<?php echo $description?>" />
        <meta name="author" content="<?php echo Globals::$author?>" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <link rel="stylesheet" data-them="" href="css/styles-flat-rtl.css">
        <link rel="stylesheet" type="text/css" href="js/specific/revolution-slider/css/settings.css" media="screen" />
        <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
        <!-- Googl Font -->
        <link href="http://fonts.googleapis.com/css?family=Droid+Arabic+Naskh" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Droid+Arabic+Kufi" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="images/logo.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="images/logo.ico" type="image/x-icon" />
        
        <style>
        .maher-internetplus-footer li{
            float: right!important;
        }
        .maher-internetplus-footer a{
            padding: 0 !important;
        }
        .maher-free-button {
            background-color: #FFFFFF !important;
            border: 1px solid #FFFFFF !important;
        }
        .maher-contactinfo-p {
            padding-top: 4px;
            font-size: 18px;
        }
        .maher-payment-img {
            width: 18px;
        }
        .maher-deactivate-color{
            color: #e74c3c;
        }
        .maher-activate-color{
            color: #a2da00;
        }
        .maher-activatelink-color {
            color: #A1DA01 !important;
        }
        .maher-color-white{
            color: #fff;
        }
        .maher-salah-checkbox {
            padding: 0 20px;
        }
        .maher-selectyears {
              margin: 0em;
            padding: 16px;
            /* background-color: transparent; */
            border: 1px solid #7bd2f9;
        }
        .maher-cursor-default{
            cursor: default;
        }
        .maher-float-left {
            float: left;
        }
        .maher-note {
            font-size: 11px;    
            color: white;
        }
        </style>
        
        
    </head>
    <body class="responsive " id="demo-flat">
        <!-- LOADING -->
        <div class="all_content">
            <!-- Dima-loading -->
            <!--<div class="dima-loading">
                <span class="loading-top"></span>
                <span class="loading-bottom"></span>
                <span class="spin-2"><p>LOADING</p>
                </span><a href="#" class="load-close">X</a>
            </div>-->
            
            
            
            <!--! Dima-loading -->
            <!-- HEADER -->
            <header role="banner">
                <!-- DESKTOP MENU -->
                <div class="dima-navbar-wrap dima-navbar-fixed-top-active desk-nav">
                    <div class="dima-navbar fix-one">
                        <div class="clearfix dima-nav-fixed"></div>
                        
                        <div class="container">
                            <!-- Nav bar button -->
                            <a class="dima-btn-nav" href="#"><i class="fa fa-bars"></i></a>
                            <!-- LOGO -->
                            <div class="logo" >
                                <h1>
                                <a data-animated-link="fadeOut" href="<?php echo Globals::$siteURL?>" title="<?php echo Globals::$siteName?>">
                                <span class="vertical-middle"></span>
                                <img src="images/logo.png" style="width: 126px;" alt="<?php echo Globals::$siteName?>" title="<?php echo Globals::$siteName?>">
                                </a>
                                </h1>
                            </div>
                            <!-- MENU -->
                            <nav role="navigation" class="clearfix">
                                <!--<ul class="dima-nav-end">
                                    <li class="search-btn">
                                        <a data-animated-link="fadeOut" href="#"><i class="fa fa-search"></i></a>
                                    </li>
                                </ul>-->
                                <ul class="dima-nav  " >
                                    <li class="dima-mega-menu col-3 sub-icon menu-item-has-children menu-full-width">
                                        <a data-animated-link="fadeOut" href="<?php if($_GET['p'] != 'default' && $_GET['p'] != ''){ echo Globals::$siteURL; }?>#about">تعريف</a>
                                    </li>
                                    <li class="sub-icon menu-item-has-children">
                                        <a data-animated-link="fadeOut" href="<?php if($_GET['p'] != 'default' && $_GET['p'] != ''){ echo Globals::$siteURL; }?>#subscriptions">انواع الاشتراك</a>
                                    </li>
                                    <li class="sub-icon menu-item-has-children">
                                        <a data-animated-link="fadeOut" href="<?php if($_GET['p'] != 'default' && $_GET['p'] != ''){ echo Globals::$siteURL; }?>#term">اتفاقية الاستخدام</a>
                                        
                                    </li>
                                    <li class="dima-mega-menu col-4 sub-icon menu-item-has-children menu-full-width">
                                        <a data-animated-link="fadeOut" href="<?php if($_GET['p'] != 'default' && $_GET['p'] != ''){ echo Globals::$siteURL; }?>#contacts">اتصل بنا</a>
                                        
                                    </li>
                                    <?php if($user){ ?>
                                    <li class="shopping-btn sub-icon menu-item-has-children cart_wrapper">
                                        <a data-animated-link="fadeOut" href="#" class="start-border" style="padding-top: 28px;">
                                        <i>
                                        
                                        <span class="fa fa-arrow-down" style="float: left;padding-top: 22px;"></span>
                                        
                                        <img src="<?php echo $user['userphoto']?>" style="width: 58px;border: 1px solid;" /></i>
                                        <!--<span class="badge-number">2</span>-->
                                        </a>
                                        <ul class="sub-menu with-border product_list_widget" style="margin-right: -100px;padding-top: 0px;">
                                            
                                            <?php /* ?>
                                            <li>
                                                <a data-animated-link="fadeOut" href="payments" title="اشتراكي">اشتراكي</a>
                                            </li>
                                            <?php */ ?>
                                            
                                            <li>
                                                <a data-animated-link="fadeOut" href="settings" title="إعدادات الخدمة">إعدادات الخدمة</a>
                                            </li>
                                            <li>
                                                <?php if($user['useractivate']){ ?>
                                                <a data-animated-link="fadeOut" href="activate.php?t=0" title="تعطيل مؤقت">
                                                تعطيل مؤقت
                                                </a>
                                                <?php }else{ ?>
                                                <a data-animated-link="fadeOut" href="activate.php?t=1" title="تشغيل الخدمة">
                                                تشغيل الخدمة
                                                </a>
                                                <?php } ?>
                                            </li>
                                            <li>
                                                <a data-animated-link="fadeOut" href="logout.php" title="تسجيل الخروج">تسجيل الخروج</a>
                                            </li>
                                           
                                        </ul>
                                    </li>
                                    <?php } ?>

                                    
                                </ul>
                            </nav>
                        </div>
                        
                        
                        
                        <!-- container -->
                        <!--<div id="search-box">
                            <div class="container">
                                <form>
                                    <input type="text" placeholder="Start Typing...">
                                </form>
                                <div id="close">
                                    <a data-animated-link="fadeOut" href="#">
                                    <i class="di-close"></i>
                                    </a>
                                </div>
                            </div>
                        </div>-->
                    </div>
                    <div class="clear-nav"></div>
                </div>
                <!--! DESKTOP MENU -->
                <!-- PHONE MENU -->
                <div class="dima-navbar-wrap mobile-nav">
                    <div class="dima-navbar fix-one">
                        <div class="clearfix dima-nav-fixed"></div>
                        <div class="container">
                            <!-- Nav bar button -->
                            <a class="dima-btn-nav" href=""><i class="fa fa-bars"></i></a>
                            <!-- LOGO -->
                            <div class="logo">
                                <h1>
                                <a data-animated-link="fadeOut" href="<?php echo Globals::$siteURL?>" title="<?php echo Globals::$siteName?>">
                                <span class="vertical-middle"></span>
                                <img src="images/logo.png" style="width: 126px;" alt="<?php echo Globals::$siteName?>" title="<?php echo Globals::$siteName?>">
                                </a>
                                </h1>
                            </div>
                            <!-- MENU -->
                            <nav role="navigation" class="clearfix">
                                <!--<ul class="dima-nav-end">
                                    <li class="search-btn">
                                        <a data-animated-link="fadeOut" href="#"><i class="fa fa-search"></i></a>
                                    </li>
                                </ul>-->
                                <ul class="dima-nav  ">
                                    
                                    <li class="dima-mega-menu col-3 sub-icon menu-item-has-children menu-full-width">
                                        <a data-animated-link="fadeOut" href="<?php if($_GET['p'] != 'default' && $_GET['p'] != ''){ echo Globals::$siteURL; }?>#about">تعريف</a>
                                    </li>
                                    <li class="sub-icon menu-item-has-children">
                                        <a data-animated-link="fadeOut" href="<?php if($_GET['p'] != 'default' && $_GET['p'] != ''){ echo Globals::$siteURL; }?>#subscriptions">انواع الاشتراك</a>
                                    </li>
                                    <li class="sub-icon menu-item-has-children">
                                        <a data-animated-link="fadeOut" href="<?php if($_GET['p'] != 'default' && $_GET['p'] != ''){ echo Globals::$siteURL; }?>#term">اتفاقية الاستخدام</a>
                                        
                                    </li>
                                    <li class="dima-mega-menu col-4 sub-icon menu-item-has-children menu-full-width">
                                        <a data-animated-link="fadeOut" href="<?php if($_GET['p'] != 'default' && $_GET['p'] != ''){ echo Globals::$siteURL; }?>#contacts">اتصل بنا</a>
                                        
                                    </li>
                                    
                                    
                                    <?php if($user){ ?>
                                    <li class="dima-mega-menu col-4 sub-icon menu-item-has-children menu-full-width">
                                        <a data-animated-link="fadeOut"  title=""></a>
                                    </li>
                                        
                                    <?php /* ?>
                                    <li>
                                        <a data-animated-link="fadeOut" href="payments" title="اشتراكي">اشتراكي</a>
                                    </li>
                                    <?php */ ?>
                                    <li>
                                        <a data-animated-link="fadeOut" href="settings" title="إعدادات الخدمة">إعدادات الخدمة</a>
                                    </li>
                                    <li>
                                        <?php if($user['useractivate']){ ?>
                                        <a data-animated-link="fadeOut" href="activate.php?t=0" title="تعطيل مؤقت">
                                        تعطيل مؤقت
                                        </a>
                                        <?php }else{ ?>
                                        <a data-animated-link="fadeOut" href="activate.php?t=1" title="تشغيل الخدمة">
                                        تشغيل الخدمة
                                        </a>
                                        <?php } ?>
                                    </li>
                                    <li>
                                        <a data-animated-link="fadeOut" href="logout.php" title="تسجيل الخروج">تسجيل الخروج</a>
                                    </li>
                                    <?php } ?>
                                    
                                </ul>
                            </nav>
                        </div>
                        
                    </div>
                </div>
                <!-- !PHONE MENU -->
            </header>
            <!--! HEADER -->
            
            <?php if($_GET['p'] == 'default' || $_GET['p'] == ''){ ?>
            
            <!-- BIG TITLE HERE -->
            <section class="title_container">
            <div class="page-section-content overflow-hidden">
                <div class="background-image-hide parallax-background">
                    <img class="background-image" alt="طرق الدفع" src="images/slides/header-bg.jpg">
                </div>         
                <div class="container page-section text-center">
                    <div class="tp-caption lft customout float-end hidden-xsd"  >
                        <img alt="" src="images/azan-silder.jpg" style="width: 250px;border: 3px solid white;">
                    </div>
                    
                    <div class="tp-caption lft customout float-end hidden-ld"  style="padding-left: 25%;"  >
                        <img alt="" src="images/azan-silder.jpg" style="width: 200px;border: 3px solid white;">
                        <div style="padding-top: 50px;" ></div>
                    </div>
                    
                    
                    <div class=" skewfromleft customout rs-parallaxlevel-0  float-start"  >
                     <p class="opacity-zero show animated fadeInUp" style="font-size: 18px;color:#fff;" >
                    <?php if($_SESSION['twitterlogin'] == 2){ ?>
                           <?php echo $user['username']?><br />السلام عليكم ورحمة الله وبركاته .. مرحبا بك في أذان تويتر <br />
                            انت الآن تستخدم  <?php if($user['userpaymenttype']){echo 'اشتراك VIP';}else{echo 'الاشتراك المجاني';}?> 
                            عن مدينة <?php echo $user['usercity']?><br />
                            اشتراكك <?php if($user['useractivate']){ echo '<span >مفعل</span>';}else{ echo '<span >غير مفعل</span> (<a  href="activate.php?t=1" class="maher-activatelink-color">اضغط هنا للتفعيل</a>)';}?><br />
                            
                            
                            
                             <?php if($_SESSION['payment']){ ?>
                             <p class="hide-on-m maher-activate-color" style="font-size: x-large; padding: 28px 0;" >لقد تم عملية الدفع بنجاح</p>
                             <?php unset($_SESSION['payment']); } ?>
                            
                            <?php if(!$user['userpaid']){ ?><br />
                            <a  class="di_white button uppercase fill large Pill" <?php /* ?> href="payments"<?php */ ?> title="ترقية الاشتراك" >ترقية الاشتراك (قريبا)</a>
                            <?php } ?>
                            <?php if($user['userpaid']){ ?><br />
                            <a  class="di_white button uppercase fill large Pill" <?php /* ?> href="payments"<?php */ ?> title="اضافة مدة جديدة">اضافة مدة جديدة (قريبا)</a>
                            <?php } ?>
                            
                        <?php } else if($_SESSION['twitterlogin'] == 3){ ?>
                            <p class="flat-paragraph hide-on-m maher-deactivate-color"style="padding-right: 15%;" >يوجد خطأ في تسجيل الدخول</p>
                        <?php }//else{ ?>
                        
                        
                             <?php if(!$user){ ?>
                             <h1 class="undertitle" style="padding-right: 15%;" ><span class="theme-color"> صدقة جارية</span> في خطوتين </h1>
                           
                            
                            <div class="clearfix"></div>
                            <div class="tp-caption skewfromleft customout rs-parallaxlevel-0" style="padding-right: 15%;"  >
                                <a class="di_white button uppercase fill large Pill" href="<?php echo Globals::$siteURL?>api/login.php?provider=twitter">التسجيل بحساب تويتر</a>
                            </div>
                            <?php } ?>
                            
                            
                              
                        <?php //} ?>
                        </p>
                    </div>
                    
                        
                    </div>
                             
                </div>         
            </div>             
            </section>         
            <!-- BIG TITLE HERE -->
            
            
            <?php /* ?>
            <!-- SLIDER -->
            <div class="tp-banner-container">
                <div class="tp-banner fullscreenOnePage">
                    <ul>
                        <li data-transition="fadefromtop" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Intro Slide">
                            <img alt="slidebg1" src="images/slides/slide-flat-1.jpg" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                            
                            <div class="tp-caption lft customout  hidden-xsd" data-x="0" data-y="20" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="750" data-start="1100" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1">
                                <img alt="" src="images/slides/flat-device.png">
                            </div>
                            
                            
                            
                            
                            <?php if($_SESSION['twitterlogin'] == 2){ ?>
                            <div class="tp-caption skewfromleft customout rs-parallaxlevel-0 hidden-xsd" data-x="500" data-y="165" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="530" data-start="900" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1">
                                <p class="app flat-paragraph  " ><?php echo $user['username']?><br />السلام عليكم ورحمة الله وبركاته .. مرحبا بك في أذان تويتر <br />
                                انت الآن تستخدم  <?php if($user['userpaymenttype']){echo 'اشتراك VIP';}else{echo 'الاشتراك المجاني';}?> 
                                عن مدينة <?php echo $user['usercity']?><br />
                                اشتراكك <?php if($user['useractivate']){ echo '<span >مفعل</span>';}else{ echo '<span >غير مفعل</span> (<a  href="activate.php?t=1" class="maher-activatelink-color">اضغط هنا للتفعيل</a>)';}?><br />
                                <?php if(!$user['userpaid'] && $user['useractivate']){ ?><br />
                                <a  data-animated-link="fadeOut"  class="di_white button uppercase fill large Pill" href="payments">ترقية الاشتراك</a>
                                <?php } ?>
                                <?php if($user['userpaid'] && $user['useractivate']){ ?><br />
                                <a  data-animated-link="fadeOut"  class="di_white button uppercase fill large Pill" href="payments">اضافة مدة جديدة</a>
                                <?php } ?>
                                </p>
                                
                            </div> 
                            <div class="tp-caption skewfromleft customout rs-parallaxlevel-0 hidden-ld" data-x="10" data-y="165" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="530" data-start="900" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1">
                             
                                <p class="app flat-paragraph" ><?php echo $user['username']?><br />السلام عليكم ورحمة الله وبركاته
                                <br />
                                 مرحبا بك في تغريدات الأذان <br />
                                انت الآن تستخدم  <?php if($user['userpaymenttype']){echo 'اشتراك VIP';}else{echo 'الاشتراك المجاني';}?> 
                                عن مدينة <?php echo $user['usercity']?><br />
                                اشتراكك <?php if($user['useractivate']){ echo '<span >مفعل</span>';}else{ echo '<span >غير مفعل</span> (<a href="activate.php?t=1" class="maher-activatelink-color">اضغط هنا للتفعيل</a>)';}?><br />
                                <?php if(!$user['userpaid'] && $user['useractivate']){ ?><br />
                                <a  data-animated-link="fadeOut"  class="di_white button uppercase fill large Pill" href="payments">ترقية الاشتراك</a>
                                <?php } ?>
                                <?php if($user['userpaid'] && $user['useractivate']){ ?><br />
                                <a  data-animated-link="fadeOut"  class="di_white button uppercase fill large Pill" href="payments">اضافة مدة جديدة</a>
                                <?php } ?>
                                </p>
                                  
                            </div> 
                            <?php } else if($_SESSION['twitterlogin'] == 3){ ?>
                            <div class="tp-caption skewfromleft customout rs-parallaxlevel-0" data-x="400" data-y="265" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="530" data-start="900" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1">
                                <p class="app flat-paragraph hide-on-m maher-deactivate-color" >يوجد خطأ في تسجيل الدخول</p>
                            </div> 
                            <?php }else{ ?>
                            
                            <div class="tp-caption lft customout  hidden-ld" data-x="0" data-y="20" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="750" data-start="1100" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1">
                                <img alt="" src="images/slides/flat-device.png">
                            </div>
                            
                            <div class="tp-caption skewfromleft customout rs-parallaxlevel-0" data-x="400" data-y="185" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="530" data-start="700" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1">
                                <h1 class="undertitle"><span class="theme-color"> صدقة جارية</span> في خطوتين </h1>
                            </div>
                            <?php } ?>
                            
                            <?php if(!$user){ ?>
                            <div class="tp-caption skewfromleft customout rs-parallaxlevel-0" data-x="630" data-y="310" data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;" data-speed="530" data-start="900" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1">
                                <a data-animated-link="fadeOut"  class="di_white button uppercase fill large Pill" href="<?php echo Globals::$siteURL?>api/login.php?provider=twitter">تسجيل الدخول</a>
                            </div>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
            <!--! SLIDER -->
            <?php */ ?>
            <?php } ?>
            
            <hr style="padding: 0px;margin: 0px;color: #29B6F6;border: 1px solid;">
            
            <!-- ALL CONTENTS -->
<div class="dima-main">
            
            
            
            
            
            <?php
if($websiteIsClosed){
                    ?><div style="text-align: center;width: 100%;"><?php echo $websiteIsClosed?></div><?php
                    }else{
?>
<?php /* ?>
<div style="margin-bottom: 10px;margin-top: 10px;" class="bread_crambles width-container">
    <tr >
        <td>
            <span>	
                <span><img class="bread_crambles" src="images/demo/icon-1.png" width="25" height="30" style="vertical-align: -webkit-baseline-middle;" /></span>
                <?php foreach($tree as $key => $val){ ?>
                <?php if($key == count($tree)-1){ ?>
                <b class="tree_child" style="vertical-align: -webkit-baseline-middle;"><?php echo $val['name']?></b>
                <?php }else{ ?>
                <a href="<?php echo $val['url']?>" class="tree_child_link" style="vertical-align: -webkit-baseline-middle;font-weight: bold;"><?php echo $val['name']?></a>
                <img class="bread_crambles" src="images/arrow3.png" style="vertical-align: -webkit-baseline-middle;"/>
                <?php } } ?>
            </span>
        </td>
    </tr>
</div>
<?php */ ?>
<?php if($pageDoesNotExist){ ?>
<!--<div style="text-align: center;">الصفحة غير موجودة</div>-->
<?php }else{
        if($errors){ ?>
    <!--<ul class="failure">
    <li class="please">من فضلك :</li>
    <?php foreach($errors as $val){ ?>
    <li>
    <?php echo $val; ?>
    </li>
    <?php } ?>
    </ul>-->
    <?php }else if($success){ ?>
    <?php //echo $success; ?>
    <?php
    	}
    	if(!$success || !$successOnly){
    		if($noRecords){
    ?>
    <p class="norecords"><?php echo $noRecords; ?></p>
    <?php
    		}else
    			include $module;
    }
}
?>     
<?php } ?>
            
            
            
<hr style="padding: 0px;margin: 0px;" />
            
             <!--! ALL CONTENTS -->
                <!-- FOOTER -->
                <div class="top-footer">
                    <div class="container">
                        <div class="ok-row">
                            <div class="ok-md-3 ok-xsd-12 ok-sd-6 widget">
                                <a class="twitter-timeline" href="https://twitter.com/athantweets" data-widget-id="712600663629381632">Tweets by @athantweet</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

                            </div>
                            <div class="ok-md-3 ok-xsd-12 ok-sd-6 widget">
                                <h5 class="widget-titel uppercase">مشاركة</h5>
                                <div class="widget-content">
                                    <ul class="with-border featured-posts">
                                        <div>
                                           <span class='st_twitter_large' displayText='Tweet'></span>
                                            <span class='st_facebook_large' displayText='Facebook'></span>
                                            <span class='st_googleplus_large' displayText='Google +'></span>
                                            <span class='st_linkedin_large' displayText='LinkedIn'></span>
                                            <span class='st_pinterest_large' displayText='Pinterest'></span>
                                            <span class='st_email_large' displayText='Email'></span>
                                            <span class='st_sharethis_large' displayText='ShareThis'></span>
                                        </div>
                                       
                                    </ul>
                                </div>
                            </div>
                            <div class="ok-md-3 ok-xsd-12 ok-sd-6 widget ">
                                <h5 class="widget-titel uppercase">بيانات الاتصال</h5>
                                <div class="widget-content">
                                    <ul class="with-border featured-posts contact-icon">
                                        <li>
                                            <i class="fa fa-map-marker "></i>
                                            <p>فيلا 31 - شارع 35 - الحي الثالث - التجمع الخامس - القاهرة الجديدة - مصر</p>
                                        </li>
                                        <li>
                                            <i class="fa fa-phone"></i>
                                            <p class="maher-contactinfo-p">201006680032+</p>
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope"></i>
                                            <p class="maher-contactinfo-p">info@athantweets.com</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="ok-md-3 ok-xsd-12 ok-sd-6 widget ">
                                
                                <h5 class="widget-titel uppercase">من نحن</h5>
                                <div class="widget-content">
                                    <p>شركة رسمية تعمل في مجال تصميم وبرمجة مواقع الانترنت وتطبيقات الجوال منذ 2001</p>
                                </div>
                                <div class="widget-content">
                                    <div class="dima-social-footer circle-social social-media social-medium">
                                        <ul class="inline clearfix">
                                            <li><a  href="https://twitter.com/athantweets" target="_blank"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- BOTTOM FOOTER -->
                <footer role="contentinfo" class="dima-footer">
                    <div class="container">
                        <div class="ok-row">
                            <!-- COPYRIGHT -->
                            <div class="ok-md-12 ok-xsd-12 ok-sd-12">
                                <div class="dima-center-full  maher-internetplus-footer text-center" >
                                    <!--<p>© 2016 تصميم وبرمجة  <a data-animated-link="fadeOut" href="http://internetplus.biz" target="_blank" style="color:#a2da00;">انترنت بلس</a>
                                    </p>-->
                                    <a href="http://www.internetplus.biz/Design-Ar.html" target="_blank"><img title="تصميم" alt="تصميم مواقع" class="first-foter" src="img/footer_design.png" style="width: 50px;"></a>
                                    <a href="http://www.internetplus.biz/Programs-Ar.html" target="_blank"><img title="برمجة" alt="برمجة وتطوير مواقع" class="first-foter" src="img/footer_programming.png" style="width: 50px;"></a>
                                    <a href="http://www.internetplus.biz/" target="_blank"><img title="انترنت بلس" alt="انترنت بلس شركة تصميم وبرمجة مصرية" class="secnd-foter" src="img/footer_internetplus.png" style="width: 103px;"></a>
                                    
                                </div>
                            </div>
                            <!--! COPYRIGHT -->
                            
                        </div>
                    </div>
                </footer>
                <!--! BOTTOM FOOTER -->
            </div>
            
            
            <script type="text/javascript">var switchTo5x=true;</script>
            <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
            <script type="text/javascript">stLight.options({publisher: "fe50f91e-1796-4e4c-87a7-926b344835a1", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
            
            
            <!--! LOADING -->
            <!-- 1)Important in all pages -->
            <script src="js/core/jquery-2.1.1.min.js"></script>
            <!--
            <script src="http://ajax.googleapis.com/ajax/module/jquery/2.1.3/jquery.min.js"></script>
            <script>window.jQuery || document.write('<script src="js/module/jquery-2.1.1.min.js"><\/script>')</script>
            -->
            <script src="js/core/load.js"></script>
            <script src="js/core/jquery.easing.1.3.js"></script>
            <script src="js/core/modernizr-2.8.2.min.js"></script>
            <script src="js/core/imagesloaded.pkgd.min.js"></script>
            <script src="js/core/respond.src.js"></script>
            <script src="js/libs.min.js"></script>
            <!-- ALL THIS FILES CAN BE REPLACE WITH ONE FILE libs.min.js -->
            <!--
            <script src="js/module/waypoints.min.js"></script>
            <script src="js/module/SmoothScroll.js"></script>
            <script src="js/module/skrollr.js"></script>
            <script src="js/module/sly.min.js"></script>
            <script src="js/module/perfect-scrollbar.js"></script>
            <script src="js/module/retina.min.js"></script>
            <script src="js/module/jquery.localScroll.min.js"></script>
            <script src="js/module/jquery.scrollTo-min.js"></script>
            <script src="js/module/jquery.nav.js"></script>
            <script src="js/module/hoverIntent.js"></script>
            <script src="js/module/superfish.js"></script>
            <script src="js/module/jquery.placeholder.js"></script>
            <script src="js/module/countUp.js"></script>
            <script src="js/module/isotope.pkgd.min.js"></script>
            <script src="js/module/jquery.flatshadow.js"></script>
            <script src="js/module/jquery.knob.js"></script>
            <script src="js/module/jflickrfeed.min.js"></script>
            <script src="js/module/instagram.min.js"></script>
            <script src="js/module/jquery.tweet.js"></script>
            <script src="js/module/bootstrap.min.js"></script>
            <script src="js/module/bootstrap-transition.js"></script>
            <script src="js/module/responsive.tab.js"></script>
            <script src="js/module/jquery.magnific-popup.min.js"></script>
            <script src="js/module/jquery.validate.min.js"></script>
            <script src="js/module/owl.carousel.min.js"></script>
            <script src="js/module/jquery.flexslider.js"></script>
            <script src="js/module/jquery-ui.min.js"></script>
            <script src="js/module/zoomsl-3.0.min.js"></script>
            -->
            <!-- END -->
            <script src="js/specific/mediaelement/mediaelement-and-player.min.js"></script>
            <script src="js/specific/video.js"></script>
            <script src="js/specific/bigvideo.js"></script>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
            <script src="js/specific/gmap3.min.js"></script>
            <script src="js/map.js"></script>
            <script type="text/javascript" src="js/specific/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
            <script type="text/javascript" src="js/specific/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
            <script src="js/main.js"></script>
        
            
            
            <script>
              (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
              })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            
              ga('create', 'UA-33855325-3', 'auto');
              ga('send', 'pageview');
            
            </script>
            
            
            
            
    </body>
</html>