<script type="text/javascript" src="//code.jquery.com/jquery-2.2.2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<style>
/* Absolute Center Spinner */
.loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}
/* Transparent Overlay */
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.3);
}
/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}
.loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 1500ms infinite linear;
  -moz-animation: spinner 1500ms infinite linear;
  -ms-animation: spinner 1500ms infinite linear;
  -o-animation: spinner 1500ms infinite linear;
  animation: spinner 1500ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
  box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
}
/* Animation */
@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
.success_overlay{
    background-image: url('images/savesuccessfully.png');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center; 
	position: absolute;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 100%;
	background-color: black;
	z-index:1001;
	-moz-opacity: 0.8;
	opacity:.80;
	filter: alpha(opacity=80);
}
.desaturate { 
	-webkit-filter: grayscale(100%);
	filter: grayscale(100%);
}

.aturate { 
	-webkit-filter: grayscale(1%);
	filter: grayscale(1%);
}
</style>
<style>
.charlimitinfo  {
    width: 0%;
    float: left;
    font-size: 20px;
    margin-left: 5%;
    color: rgb(167, 164, 164); 
}
</style>
<script type="text/javascript">
//$('#city').load('ajax/cities.php').show();
function limitChars(textid1, textid2, textid3, limit, infodiv, length = '0')
{
	var text1 = $('#'+textid1).val();	
	var text2 = $('#'+textid2).val();	
	var text3 = $('#'+textid3).val();
    if(length == '0'){
 	  var textlength = text1.length + text2.length + text3.length;
    }
	$('#' + infodiv).html(''+ (limit - textlength) +'');
    if(textlength > limit)
	{ 
		//$('#' + infodiv).html('0'); 
        document.getElementById(infodiv).style.color = "red";
		//$('#'+textid1).val(text1.substr(0, limit));
		//$('#'+textid2).val(text2.substr(0, limit));
		//$('#'+textid3).val(text3.substr(0, limit));
		//return false;
    }
	else
	{
		//return true;
	}
}
function limitCharsF(limit, length){
    var limit = limit + <?php echo (int)$tweet_lenght?>;
    var length = length;
 	$('.texttweet').keyup(function(){  
 		limitChars('texttweet1', 'texttweet2', 'texttweet3', limit, 'charlimitinfo', length);
 	})
}
</script>
<div class="loading" id="loading_update" style="display: none;">Loading&#8230;</div>
<div id="success_update" class="success_overlay" style="display: none;"></div>
<!-- BIG TITLE HERE -->
<section class="title_container">
    <div class="page-section-content overflow-hidden">
        <div class="background-image-hide parallax-background">
            <img class="background-image" alt="إعدادات الخدمة" src="images/slides/header-bg.jpg">
        </div>
        <div class="container page-section text-center">
            <h2 class="uppercase undertitle">إعدادات الخدمة</h2>
            <div class="topaz-line">
                <i class="di-separator"></i>
            </div>
        </div>
    </div>
</section>
<!-- BIG TITLE HERE -->
<section class="section section-colored"  id="contact">
    <div class="page-section-content overflow-hidden">
        <div class="container">
            <div class="post ok-md-6 ok-xsd-12  ">
                           <div class="features-start small-flat opacity-zero show animated fadeInUp">
                              <header role="banner">
                                    <i class="fa fa-cogs"></i>
                                </header>
                                <div class="features-content">
            <?php if($user['usercityid']){ ?>
            <p>انت الآن تستخدم <?php echo Globals::$siteName?> عن مدينة <?php echo $user['usercity']?>.<br />
             يمكنك استخدام النموذج التالي للتحكم في تفاصيل الخدمة. </p> 
            <?php }else{ ?>
            <p>برجاء اختيار البلد والمدينة ونوع الاشتراك لكي يتم الأذان بميعاد البلد التي تم اختيارها</p>
            <?php } ?>
            <div class="double-clear"></div>
            </div>
                            <div class="double-clear"></div>
                            </div>
                        </div>
            <div class="main ok-md-12 ok-xsd-12"  >
                <!-- Form -->
                <form action="php/contact-form-smtp.php" class="form-small form " id="form" name="form"  novalidate="novalidate">
                    <div class="ok-row">
                        <!-- أختر المدينة والدوله -->
                        <div class="post ok-md-12 ok-xsd-12  ">
                           <div class="features-start small-flat opacity-zero show animated fadeInUp">
                              <header role="banner">
                                    <i class="">1</i>
                                </header>
                                <div class="features-content" style="padding-top: 18px;">
                                      <p>اختر المدينة التي تريدها</p>
                                </div>
                            <div class="double-clear"></div>
                            <div class="double-clear"></div>
                            </div>
                        </div>
                        <div class="post ok-md-6 ok-xsd-6  ">
                            <div class="field">
                                <select name="country" id="country" style="background-color: #fff;line-height: inherit;" aria-required="true">
                                    <option value="">اختر الدولة</option>
                                    <?php foreach($countries as $country){ ?>
                                    <option value="<?php echo $country['country']?>" <?php if($country['country'] == 'ksa'){echo 'selected=""';} if($user['usercountry'] == $country['country']){echo 'selected=""';} ?> ><?php echo $country['co']?></option>
                                    <?php } ?>
                                    </select>
                            </div>
                        </div>
                        <div class="post ok-md-6 ok-xsd-6  ">
                            <div class="field">
                                <select name="city" id="city" style="background-color: #fff;line-height: inherit;" aria-required="true">
                                <option value="">اختر المدينة</option>
                                <?php foreach($cities as $city){ ?>
                                <option value="<?php echo $city['id']?>" <?php   if($user['usercityid'] == $city['id']){echo 'selected=""';}?> ><?php echo $city['car']?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <!-- اختر الصلوات -->
                        <div class="post ok-md-12 ok-xsd-12  ">
                            <div class="features-start small-flat opacity-zero show animated fadeInUp">
                              <header role="banner">
                                    <i class="">2</i>
                                </header>
                                <div class="features-content" style="padding-top: 18px;" >
                                     <p>اختر الصلوات التي تريدها <?php if($user['userpaymenttype'] == 0){?>(متاحة في اشتراك VIP)<?php } ?></p>
                                </div>
                            </div>
                            <div class="double-clear"></div>
                            <div class="double-clear"></div>
                        </div>
                        <div class="post ok-md-12 ok-xsd-12  ">
                            <div class="field">
                                <span class="maher-salah-checkbox"><input type="checkbox" class="azancheckbox" name="azan<?php echo '7'?>" id="azan<?php echo '7'?>" <?php if($user["azan7"]){ echo 'checked=""';} ?> <?php if(!$user['userpaymenttype']){ ?>disabled=""<?php } ?> /> تغريدة جميع الصلوات </span>
                                <div class="double-clear visible-xsd"></div>
                                
                                <?php $naz = 1; foreach($azan as $az){ ?>
                                <span class="maher-salah-checkbox"><input type="checkbox" class="azancheckbox" name="azan<?php echo $naz?>" id="azan<?php echo $naz?>" <?php if($user["azan$naz"]){ echo 'checked=""';} ?> <?php if(!$user['userpaymenttype']){ ?>disabled=""<?php } ?> /> <?php echo $az?> </span>
                                <div class="double-clear visible-xsd"></div>
                                <?php $naz++;} ?>
                            </div>
                        </div>
                        <!-- هل تريد ظهور صوره للتغريدة -->
                        <div class="post ok-md-12 ok-xsd-12  ">
                            <div class="features-start small-flat opacity-zero show animated fadeInUp">
                              <header role="banner">
                                    <i class="">3</i>
                                </header>
                                <div class="features-content" style="padding-top: 18px;" >
                                     <p>هل تود ظهور صورة تعبر عن الوقت والمدينة مع التغريدة؟ <?php if($user['userpaymenttype'] == 0){?>(متاحة في اشتراك VIP)<?php } ?></p>
                                </div>
                            </div>
                            <div class="double-clear"></div>
                            <div class="double-clear"></div>
                        </div>
                        
                        
                        <div class="post ok-md-6 ok-xsd-12  ">
                            <div class="field">
                                <span class="maher-salah-checkbox"><input type="radio" class="imagetweetradiobutton" name="imagetweet" id="imagetweetradiobutton1" value="1" <?php if($user["userimagetweet"] == 1){ echo 'checked=""';} ?>   <?php if(!$user['userpaymenttype']){ ?>disabled=""<?php } ?>/> نعم </span>
                                <span class="maher-salah-checkbox"><input type="radio" class="imagetweetradiobutton" name="imagetweet" id="imagetweetradiobutton0" value="0" <?php if($user["userimagetweet"] == 0){ echo 'checked=""';} ?>   <?php if(!$user['userpaymenttype']){ ?>disabled=""<?php } ?>/> لا </span>
                                <div class="double-clear visible-xsd"></div>
                            </div>
                        </div>
                        <div class="post ok-md-6 ok-xsd-12  ">
                            <div class="features-start small-flat opacity-zero show animated fadeInUp">
                               <img alt="" src="images/azan-silder.jpg" id="imagetweetslider" style="width: 200px;border: 3px solid white;">
                            </div>
                            <div class="double-clear"></div>
                            <div class="double-clear"></div>
                        </div>
                        <!-- التحكم في محتوى التغريدة -->
                        <div class="post ok-md-12 ok-xsd-12  ">
                            <div class="features-start small-flat opacity-zero show animated fadeInUp">
                              <header role="banner">
                                    <i class="">4</i>
                                </header>
                                <div class="features-content" style="padding-top: 18px;" >
                                     <p>التحكم في محتوى التغريدة <?php if($user['userpaymenttype'] == 0){?>(متاحة في اشتراك VIP)<?php } ?></p>
                                </div>
                            </div>
                            <div class="double-clear"></div>
                            <div class="double-clear"></div>
                        </div>
                        <div class="post ok-md-3 ok-xsd-12  ">
                            <div class="field">
                                <input type="text" style="line-height: inherit;"  class="texttweet" name="texttweet[]"  id="texttweet1"  value="<?php echo $tweet_first?>" <?php if(!$user['userpaymenttype']){ ?>disabled=""<?php } ?> /> 
                            </div>
                        </div>
                        <div class="post ok-md-1 ok-xsd-12  ">
                            <div class="field" style="padding-top: 10px;">
                            العشاء
                            </div>
                        </div>
                        <div class="post ok-md-3 ok-xsd-12  ">
                            <div class="field">
                            <input type="text" style="line-height: inherit;" value="<?php echo $tweet_middle?>"  class="texttweet"  id="texttweet2"  name="texttweet[]" <?php if(!$user['userpaymenttype']){ ?>disabled=""<?php } ?> />
                            </div>
                        </div>
                        <div class="post ok-md-2 ok-xsd-12  ">
                            <div class="field" style="padding-top: 10px;">
                            الرياض 12:40
                            </div>
                        </div>
                        <div class="post ok-md-3 ok-xsd-12  ">
                            <div class="field">
                            <input type="text" style="line-height: inherit;" placeholder="نهاية التغريدة" value="<?php echo $tweet_last?>"  class="texttweet" id="texttweet3"  name="texttweet[]" <?php if(!$user['userpaymenttype']){ ?>disabled=""<?php } ?> /> 
                            </div>
                        </div>
                        <div class="post ok-md-12 ok-xsd-12">
                            <div class="field" style="padding-top: 10px;">
                                <span style="width:auto;margin-left: 2%;float:right;">الاحرف المتبقية: </span>
                                <span id="charlimitinfo" class="charlimitinfo comment_number" style="width:auto;margin-left: 2%;float:right;"><?php if($user["userdoaatweet"] == 1){echo (50 - $tweet_lenght); }else{echo (130 - $tweet_lenght);}?></span>
                            </div>
                        </div> 
                        <?php if($user['userpaymenttype'] > 0){ ?> 
                        <div class="post ok-md-4 ok-xsd-4  ">
                            <div class="field" style="padding-top: 10px;">
                            <input type="checkbox" name="doaatweet" class="doaatweet" id="doaatweet" <?php if($user["userdoaatweet"] == 1){ echo 'checked=""';} ?>  <?php if(!$user['userpaymenttype']){ ?>disabled=""<?php } ?> /> اضافة دعاء تلقائي
                            </div>
                        </div>      
                        <?php } ?>
                        <?php if($user['userpaymenttype']){ ?>
                        <div class="post ok-md-8 ok-xsd-8  ">
                            <div class="field">
                            <a data-animated-link="fadeOut" class="small Pill button fill" id="texttweet_button" onclick="tweettextsave();">حفظ التغريدة</a>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="post ok-md-12 ok-xsd-12  ">
                            <div class="field">
                                <div id="doaasavefalse" style="display: none;">
                                    <!--<img src="images/savesuccessfully.png" style="width: 50px;" />-->
                                    <div id="contactError" class="dima-alert dima-alert-error">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <i class="fa  fa-check "></i>
                                    <!--<h4 class="header-alert">Info</h4>-->
                                    <p>عدد الحروف الاجمالي يتجاوز الحد الاقصى للتغريدة بمقدار <span id="errortextlimit"></span> حرفا، فضلا عن المحتوى الذي ادخلته قبل اختيار اضافة دعاء تلقائي (يتطلب 50 حرفا)</p>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="double-clear"></div>
                        <div class="ok-row">
                             <div class="dima-pricing-table  hidden-xsd">
                                 <!-- TABLE(1) -->
                                <div class="dima-pricing-col ok-md-4 ok-xsd-6" data-animate="flipInY" data-delay="50">
                                    <div class="header">
                                        <h2>مجــاني</h2>
                                        <span><?php echo Globals::$buyamountunitfree?></span>
                                        <div class="topaz-border"></div>
                                    </div>
                                    <div class="dima-pricing-col-info">
                                        <ul>
                                            <li>تغريدة نصية <span class="green-color fa fa-check fa-fw maher-float-left"></span></li>
                                            <li>اضافة دعاء تلقائي <span class="green-color fa fa-check fa-fw maher-float-left"></span></li>
                                            <li>اخفاء عنوان الموقع <span class="red-color fa fa-times fa-fw maher-float-left" ></span></li>
                                            <li>تغريدة بصورة <span class="red-color fa fa-times fa-fw maher-float-left"></span></li>
                                            <li>اختيار الصلوات <span class="red-color fa fa-times fa-fw maher-float-left"></span></li>
                                            <li>التحكم في محتوى التغريدة <span class="red-color fa fa-times fa-fw maher-float-left"></span></li>
                                            <!--<li>تغريدة صوتية <img src="images/false_icon.png" class="maher-payment-img" /></li>-->
                                        </ul>
                                        <?php if($user['userpaymenttype'] > 0){ ?>
                                        <a data-animated-link="fadeOut" class="di_white small Pill button fill  maher-free-button maher-cursor-default"  title="تخطيت هذه المرحلة">تخطيت هذه المرحلة</a>
                                        <?php }else if($user && ($user['userpaymenttype'] == 0)){ ?>
                                        <a data-animated-link="fadeOut" class="di_white small Pill button fill  maher-free-button maher-cursor-default"    title="اشتراكك الحالي">اشتراكك الحالي</a>
                                        <?php }else{ ?>
                                        <a data-animated-link="fadeOut" class="di_white small Pill button fill  maher-free-button" id="payment_button" href="<?php echo Globals::$siteURL?>api/login.php?provider=twitter" title="سجل الآن">سجل الآن</a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!--! TABLE(1) -->
                                <!-- TABLE(2) -->
                                <div class="dima-pricing-col  ok-md-4 ok-xsd-6 featured-larg" data-animate="flipInY" data-delay="150">
                                    <div class="header">
                                        <h2>VIP</h2>
                                        <span><?php echo Globals::$buyamountunit?></span>
                                        <div class="topaz-border"></div>
                                    </div>
                                    <div class="dima-pricing-col-info">
                                        <ul>
                                            <li>تغريدة نصية <span class="green-color fa fa-check fa-fw maher-float-left" ></span></li>
                                            <li>اضافة دعاء تلقائي <span class="green-color fa fa-check fa-fw maher-float-left"></span></li>
                                            <li>اخفاء عنوان الموقع <span class="green-color fa fa-check fa-fw maher-float-left" ></span></li>
                                            <li>تغريدة بصورة <span class="green-color fa fa-check fa-fw maher-float-left"></span></li>
                                            <li>اختيار الصلوات <span class="green-color fa fa-check fa-fw maher-float-left"></span></li>
                                            <li>التحكم في محتوى التغريدة <span class="green-color fa fa-check fa-fw maher-float-left"></span></li>
                                            <!--<li>تغريدة صوتية <img src="images/true_icon.png" class="maher-payment-img" /></li>-->
                                        </ul>
                                        <?php if($user['userpaymenttype'] > 1){ ?>
                                        <a data-animated-link="fadeOut" class="di_white small Pill button fill  maher-free-button maher-cursor-default"  title="تخطيت هذه المرحلة">تخطيت هذه المرحلة</a>
                                        <?php }else if(($user['userpaymenttype'] > 0)){ ?>
                                        <a data-animated-link="fadeOut" class="small Pill button fill"  href="payments"  id="vip" title="اضافة مدة جديدة">اضافة مدة جديدة</a>
                                        <?php }else if($user && ($user['userpaymenttype'] == 0)){ ?>
                                        <a data-animated-link="fadeOut" class="small Pill button fill"  href="payments"  id="vip" title="ترقية اشتراكك">ترقية اشتراكك</a>
                                        <?php }else{ ?>
                                        <a data-animated-link="fadeOut" class="small Pill button fill"  href="payments"  id="vip" title="سجل الآن">سجل الآن</a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!--! TABLE(2) -->
                                <!-- TABLE(3) -->
                                <div class="dima-pricing-col ok-md-4 ok-xsd-6" data-animate="flipInY" data-delay="150">
                                    <div class="header">
                                        <h2>مدى الحياة *</h2>
                                        <span><?php echo Globals::$buyamountunitlife?></span>
                                        <div class="topaz-border"></div>
                                    </div>
                                    <div class="dima-pricing-col-info">
                                        <ul>
                                            <li>تغريدة نصية <span class="green-color fa fa-check fa-fw maher-float-left" ></span></li>
                                            <li>اضافة دعاء تلقائي <span class="green-color fa fa-check fa-fw maher-float-left"></span></li>
                                            <li>اخفاء عنوان الموقع <span class="green-color fa fa-check fa-fw maher-float-left" ></span></li>
                                            <li>تغريدة بصورة <span class="green-color fa fa-check fa-fw maher-float-left"></span></li>
                                            <li>اختيار الصلوات <span class="green-color fa fa-check fa-fw maher-float-left"></span></li>
                                            <li>التحكم في محتوى التغريدة <span class="green-color fa fa-check fa-fw maher-float-left"></span></li>
                                            <!--<li>تغريدة صوتية <img src="images/true_icon.png" class="maher-payment-img" /></li>-->
                                        </ul>
                                        <?php if($user['userpaymenttype'] == 2){ ?>
                                        <a data-animated-link="fadeOut" class="small Pill button fill" id="vip" title="اشتراكك الحالي">اشتراكك الحالي</a>
                                        <?php }else{ ?>
                                        <a data-animated-link="fadeOut" class="small Pill button fill" href="payments-lifetime" id="lifetime" title="ترقية اشتراكك">ترقية اشتراكك</a>
                                        <?php } ?>
                                        <br /><br />
                                        <span class="maher-note">* طول فترة عمل الخدمة</span>
                                    </div>
                                </div>
                                <!--! TABLE(3) -->
                            </div>
                            <div class="dima-data-table-wrap maher-table-scroll hidden-lg">
                                <table>
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>مجاني<br /><?php echo Globals::$buyamountunitfree?></th>
                                            <th>VIP<br /><?php echo Globals::$buyamountunit?></th>
                                            <th>مدي&nbsp;الحياة<br /><?php echo Globals::$buyamountunitlife?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>تغريدة نصية</td>
                                            <td><span class="green-color fa fa-check fa-fw"></span></td>
                                            <td><span class="green-color fa fa-check fa-fw"></span></td>
                                            <td><span class="green-color fa fa-check fa-fw"></span></td>
                                        </tr>
                                        <tr>
                                            <td>اضافة دعاء تلقائي</td>
                                            <td><span class="green-color fa fa-check fa-fw"></span></td>
                                            <td><span class="green-color fa fa-check fa-fw"></span></td>
                                            <td><span class="green-color fa fa-check fa-fw"></span></td>
                                        </tr>
                                        <tr>
                                            <td>اخفاء عنوان الموقع</td>
                                            <td><span class="red-color fa fa-times fa-fw"></span></td>
                                            <td><span class="green-color fa fa-check fa-fw"></span></td>
                                            <td><span class="green-color fa fa-check fa-fw"></span></td>
                                        </tr>
                                        <tr>
                                            <td>تغريدة بصورة</td>
                                            <td><span class="red-color fa fa-times fa-fw"></span></td>
                                            <td><span class="green-color fa fa-check fa-fw"></span></td>
                                            <td><span class="green-color fa fa-check fa-fw"></span></td>
                                        </tr>
                                        <tr>
                                            <td>اختيار الصلوات</td>
                                            <td><span class="red-color fa fa-times fa-fw"></span></td>
                                            <td><span class="green-color fa fa-check fa-fw"></span></td>
                                            <td><span class="green-color fa fa-check fa-fw"></span></td>
                                        </tr>
                                        <tr>
                                            <td>التحكم في محتوى التغريدة</td>
                                            <td><span class="red-color fa fa-times fa-fw"></span></td>
                                            <td><span class="green-color fa fa-check fa-fw"></span></td>
                                            <td><span class="green-color fa fa-check fa-fw"></span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                            <?php if($user['userpaymenttype'] > 0){ ?>
                                            <a data-animated-link="fadeOut" class="di_white tiny Pill button fill  maher-free-button maher-cursor-default"  title="تخطيت هذه المرحلة">تخطيت هذه المرحلة</a>
                                            <?php }else if($user && ($user['userpaymenttype'] == 0)){ ?>
                                            <a data-animated-link="fadeOut" class="di_white tiny Pill button fill  maher-free-button maher-cursor-default"    title="اشتراكك الحالي">اشتراكك الحالي</a>
                                            <?php }else{ ?>
                                            <a data-animated-link="fadeOut" class="di_white tiny Pill button fill  maher-free-button" id="payment_button" href="<?php echo Globals::$siteURL?>api/login.php?provider=twitter" title="اشتراك مجاني">سجل الآن</a>
                                            <?php } ?>
                                            </td>
                                            <td>
                                            <?php if($user['userpaymenttype'] > 1){ ?>
                                            <a data-animated-link="fadeOut" class="di_white tiny Pill button fill  maher-free-button maher-cursor-default"  title="تخطيت هذه المرحلة">تخطيت هذه المرحلة</a>
                                            <?php }else if(($user['userpaymenttype'] > 0)){ ?>
                                            <a data-animated-link="fadeOut" class="tiny Pill button fill" href="payments" id="vip" title="اضافة مدة جديدة">اضافة مدة جديدة</a>
                                            <?php }else if($user && ($user['userpaymenttype'] == 0)){ ?>
                                            <a data-animated-link="fadeOut" class="tiny Pill button fill" href="payments" id="vip" title="ترقية اشتراكك">ترقية اشتراكك</a>
                                            <?php }else{ ?>
                                            <a data-animated-link="fadeOut" class="tiny Pill button fill" href="payments" id="vip" title="سجل الآن">سجل الآن</a>
                                            <?php } ?>
                                            </td>
                                            <td>
                                            <?php if($user['userpaymenttype'] == 2){ ?>
                                            <a data-animated-link="fadeOut" class="tiny Pill button fill"   id="vip" title="اشتراكك الحالي">اشتراكك الحالي</a>
                                            <?php }else{ ?>
                                            <a data-animated-link="fadeOut" class="tiny Pill button fill"  href="payments-lifetime" id="lifetime" title="ترقية اشتراكك">ترقية اشتراكك</a>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php /* ?>
<!-- PRICING -->
<section class="section " id="subscriptions">
    <div class="page-section-content overflow-hidden">
        <div class="container text-center ">
            <h2 class="uppercase" data-animate="fadeInDown" data-delay="0">الاشــتراكــات</h2>
            <div class="line-hr"></div>
            <div class="double-clear"></div>
            <div class="ok-row">
                <div class="dima-pricing-table">
                    <!-- TABLE(1) -->
                    <div class="dima-pricing-col ok-md-6 featured-larg" data-animate="flipInY" data-delay="50">
                        <div class="header">
                            <h2>مَجَّانِي</h2>
                            <span>$0 / شهر</span>
                            <div class="topaz-border"></div>
                        </div>
                        <div class="dima-pricing-col-info">
                            <ul>
                                <li>يصل الى 100 مستخدم</li>
                                <li>تحديث الثيم</li>
                                <li>الدعم في المنتدى</li>
                                <li>ملفات فوتوشوب</li>
                                <li>خدمات العميل</li>
                            </ul>
                            <a data-animated-link="fadeOut" class="di_white small Pill button fill  maher-free-button" id="payment_button" onclick="payment(0);" title="prices">سجل الآن</a>
                        </div>
                    </div>
                    <!--! TABLE(1) -->
                    <!-- TABLE(2) -->
                    <div class="dima-pricing-col ok-md-6 ok-xsd-6 featured-larg" data-animate="flipInY" data-delay="150">
                        <div class="header">
                            <h2>أَسَاسِي</h2>
                            <span>$29 / شهر</span>
                            <div class="topaz-border"></div>
                        </div>
                        <div class="dima-pricing-col-info">
                            <ul>
                                <li>يصل الى 100 مستخدم</li>
                                <li>تحديث الثيم</li>
                                <li>الدعم في المنتدى</li>
                                <li>ملفات فوتوشوب</li>
                                <li>خدمات العميل</li>
                            </ul>
                            <a data-animated-link="fadeOut" class="small Pill button fill" href="index.php?p=payments" title="prices">سجل الآن</a>
                        </div>
                    </div>
                    <!--! TABLE(2) -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--! PRICING -->
<?php */ ?>
<script>

<?php if($user['userimagetweet']){ ?>
//$('#imagetweetslider').addClass = "aturate";
document.getElementById('imagetweetslider').className = "aturate"; 
<?php }else{ ?>
//$('#imagetweetslider').addClass = "desaturate";
document.getElementById('imagetweetslider').className = "desaturate"; 
<?php } ?>
$('.doaatweet').click(function() {
    $('#doaasavefalse').hide();
    if(document.getElementById('doaatweet').checked){var doaatweet = '1'; }else{var doaatweet = '0';}
    var text1 = $('#texttweet1').val();	
	var text2 = $('#texttweet2').val();	
	var text3 = $('#texttweet3').val();	
	var textlength = text1.length + text2.length + text3.length;
    $.post('ajax/doaasave.php', { doaatweet:doaatweet, textlength:textlength }, 
    function(result){
        if(result == 'false'){
            $('#doaasavefalse').delay(50).fadeIn(100);
            document.getElementById("doaatweet").checked = false;
            toastr.error('حدث خطأ.');
        }else if(result){
            score = result;
            document.getElementById('charlimitinfo').innerHTML = score ;
            //alert(score);
            $('#loading_update').delay(40).fadeIn(50);
            $('#loading_update').delay(500).fadeOut(50);
            toastr.success('تم التعديل بنجاح.');
            location.reload();
        }
    });
});
$(document).ready(function(){
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "positionClass": "toast-top-left",
      "onclick": null,
      "showDuration": "1000",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    var limit = parseInt(document.getElementById('charlimitinfo').innerHTML);
    limitCharsF(limit);
    $('#country').change(function(){
        country = $('#country').val();
        $.post('ajax/cities.php', { country:country }, 
        function(result){
           $('#city').html(result).show(); 
        });       
    });
    $('#city').change(function(){
        country = $('#country').val();
        city = $('#city').val();
        var cityname = getSelectedText('city');
        $.post('ajax/citysave.php', { city: city, cityname: cityname, country: country }, 
        function(result){
            $('#loading_update').delay(40).fadeIn(50);
                $('#loading_update').delay(500).fadeOut(50);
                toastr.success('تم التعديل بنجاح.');
            if(result == 'true1'){
                payment(0);
            }
           //$('#city').html(result).show(); 
        });       
    });
});
$('.azancheckbox').click(function() {
    if(document.getElementById('azan1').checked){var azan1 = '1'; }else{var azan1 = '0';}
    if(document.getElementById('azan2').checked){var azan2 = '1'; }else{var azan2 = '0';}
    if(document.getElementById('azan3').checked){var azan3 = '1'; }else{var azan3 = '0';}
    if(document.getElementById('azan4').checked){var azan4 = '1'; }else{var azan4 = '0';}
    if(document.getElementById('azan5').checked){var azan5 = '1'; }else{var azan5 = '0';}
    //if(document.getElementById('azan6').checked){var azan6 = '1'; }else{var azan6 = '0';}
    if(document.getElementById('azan7').checked){var azan7 = '1'; }else{var azan7 = '0';}
    $.post('ajax/azansave.php', { azan1: azan1, azan2: azan2, azan3: azan3, azan4: azan4, azan5: azan5,/* azan6: azan6,*/ azan7: azan7}, 
    function(result){
        $('#loading_update').delay(40).fadeIn(50);
        $('#loading_update').delay(500).fadeOut(50);
        toastr.success('تم التعديل بنجاح.');
       //$('#city').html(result).show(); 
    });
});
$('.imagetweetradiobutton').click(function() { 
    if (document.getElementById('imagetweetradiobutton1').checked) {
          imagetweet = document.getElementById('imagetweetradiobutton1').value;
          document.getElementById('imagetweetslider').className = "aturate"; 
          //$('#imagetweetslider').addClass = "aturate"; 
        }
        if (document.getElementById('imagetweetradiobutton0').checked) {
          imagetweet = document.getElementById('imagetweetradiobutton0').value;
          //$('#imagetweetslider').addClass = "desaturate";
          document.getElementById('imagetweetslider').className = "desaturate";  
        }
    
    $.post('ajax/imagesave.php', { imagetweet: imagetweet}, 
    function(result){
         
        
        $('#loading_update').delay(50).fadeIn(100);
        $('#loading_update').delay(1500).fadeOut(300);
        toastr.success('تم التعديل بنجاح.');
    });
});
function getSelectedText(elementId) {
    var elt = document.getElementById(elementId);
    if (elt.selectedIndex == -1)
        return null;
    return elt.options[elt.selectedIndex].text;
}
function tweettextsave(){
    var texttweet1 = $('#texttweet1').val();
    var texttweet2 = $('#texttweet2').val();
    var texttweet3 = $('#texttweet3').val();
    if(document.getElementById('doaatweet').checked){var doaatweet = '1'; }else{var doaatweet = '0';}
    $('#texttweet_button').hide();
    $('<img id="loading"  src="images/loading.gif" style="width: 46px;height: 46px;" />').insertAfter('#texttweet_button');
    $.post('ajax/texttweet.php', {doaatweet:doaatweet, texttweet1:texttweet1, texttweet2:texttweet2, texttweet3:texttweet3}, function(data){
        if(data == 'true'){
            $('#loading').delay(1500).fadeOut(300);
            $('#texttweet_button').show();
            toastr.success('تم التعديل بنجاح.');
            location.reload();
            //score = score-1;
            //document.getElementById('total_record').innerHTML = score;               
        }else if(data == 'false'){
            $('#doaasavefalse').delay(50).fadeIn(100);
            $('#texttweet_button').show();
            toastr.error('حدث خطأ.');
        }else{
            alert('Error, please try again');
        }
        $('#loading').remove();
        //parent.Three.location.reload();
    });
}
function payment(type){
        var type = type;
        $('#payment_button').hide();
        $('<img id="loading"  src="images/loading.gif" style="width: 46px;height: 46px;" />').insertAfter('#payment_button');
        $.post('ajax/payments.php', {type:type}, function(data){
            if(data){
                $('#loading').delay(1500).fadeOut(300);
                $('<img id="paymentsave"  src="images/savesuccessfully.png" style="width: 46px;height: 46px;"  />').insertAfter('#loading').delay(200).fadeIn(300);
                $('#paymentsave').delay(1500).fadeOut(300);
                $('<a data-animated-link="fadeOut" class="di_white small Pill button fill  maher-free-button maher-cursor-default"    title="اشتراكك الحالي">اشتراكك الحالي</a>').insertAfter('#paymentsave');
                $('#vip').hide();
                $('<a data-animated-link="fadeOut" class="small Pill button fill" href="payments" id="vip" title="ترقية اشتراكك">ترقية اشتراكك</a>').insertAfter('#vip');
                //score = score-1;
                //document.getElementById('total_record').innerHTML = score;               
            }else{
                alert('Error, please try again');
            }
            $('#loading').remove();
            //parent.Three.location.reload();
        });
}
</script>