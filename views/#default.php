<section class="section section-colored"  id="about" >
    <div class="page-section-content overflow-hidden">
        <div class="container text-center">
            <!-- TITLE -->
            <h2 class="uppercase opacity-zero show animated fadeInDown" data-animate="fadeInDown" data-delay="0">تغريدات الأذان</h2>
            <div class="line-hr "></div>
            <p data-animate="fadeInUp" data-delay="100" style="font-size: 18px;">هل تود أن يصيح حسابك بتويتر بتغريدة في أوقات الأذان الخاصة بمدينتك؟ الآن يمكنك تذكير نفسك وإخوانك بالصلوات في أوقات حلولها! اشترك مجانا واختر مدينتك وسيبدأ حسابك في التغريد في أوقات الصلاة المختلفة.. يمكنك ترقية الاشتراك في اي وقت للتمتع بخدمات اضافية مثل اختيار الصلوات واضافة حكمة تلقائية الى التغريدة والتحكم في محتوى التغريدة وكذلك التغريد بصورة معبرة. ايضا يمكنك تعديل اشتراكك في اي وقت.</p>
            <!--! TITLE -->
            <div class="clear-section"></div>
            
            <!--! ICON -->
        </div>
    </div>
</section>


 <!-- FUN SECTION -->
<section class="section section-colored" data-bg="#039be5" id="fun">
    <div class="page-section-content overflow-hidden">
        <div class="background-image-hide parallax-background">
            <img class="background-image" alt="Background Image" src="images/sections/fact-bg.jpg">
        </div>
        <div class="container page-section text-center">
            <!-- TITLE -->
            <h2 class="uppercase undertitle" data-animate="fadeInDown" data-delay="0">احصائيات</h2>
            <div class="topaz-line">
                <i class="di-separator"></i>
            </div>
            <!--<p class="undertitle" data-animate="fadeInUp" data-delay="100">أبجد هوز هو مجرد دمية النص من التنضيد والطباعة وصناعة. أبجد هوز وقد نص في هذه الصناعة</p>-->
            <!--! TITLE -->
            <div class="clear-section"></div>
            <div class="ok-row">
                <!-- FACT (1) -->
                <div class="ok-md-3 ok-xsd-12 ok-sd-6" data-animate="fadeInUp" data-delay="0">
                    <div class="countUp">
                        <div class="number">
                            <i class="di-globe"></i>
                            <span data-from="0" data-to="<?php echo $_SESSION['countriesNum']?>" data-speed="5000" data-refresh-interval="50"><?php echo $_SESSION['countriesNum']?></span>
                        </div>
                        <div class="text">
                            بلد
                        </div>
                    </div>
                </div>
                <!--! FACT (1) -->
                <!-- FACT (2) -->
                <div class="ok-md-3 ok-xsd-12 ok-sd-6" data-animate="fadeInUp" data-delay="50">
                    <div class="countUp">
                        <div class="number">
                            <i class="di-map-marker"></i>
                            <span data-from="0" data-to="<?php echo $_SESSION['citiesNum']?>" data-speed="5000" data-refresh-interval="50"><?php echo $_SESSION['citiesNum']?></span>
                        </div>
                        <div class="text">
                            مدينة
                        </div>
                    </div>
                </div>
                <!--! FACT (2) -->
                <!-- FACT (3) -->
                <div class="ok-md-3 ok-xsd-12 ok-sd-6" data-animate="fadeInUp" data-delay="100">
                    <div class="countUp">
                        <div class="number">
                            <i class="di-user"></i>
                            <span data-from="0" data-to="<?php echo $_SESSION['usersNum']?>" data-speed="5000" data-refresh-interval="50"><?php echo $_SESSION['usersNum']?></span>
                        </div>
                        <div class="text">
                            مشترك
                        </div>
                    </div>
                </div>
                <!--! FACT (3) -->
                <!-- FACT (4) -->
                <div class="ok-md-3 ok-xsd-12 ok-sd-6" data-animate="fadeInUp" data-delay="150">
                    <div class="countUp">
                        <div class="number">
                            <i class="di-edit"></i>
                            <span data-from="0" data-to="<?php echo intval(file_get_contents('tweetnumbers.txt'));?>" data-speed="5000" data-refresh-interval="50"><?php echo intval(file_get_contents('tweetnumbers.txt'));?></span>
                        </div>
                        <div class="text">
                            تغريدة
                        </div>
                    </div>
                </div>
                <!--! FACT (4) -->
            </div>
        </div>
    </div>
</section>
<!--! FUN SECTION -->


<?php if(!$testimonials){ ?>
<!-- TESTIMONIALS SECTION -->
<section class="section section-colored" data-bg="#039be5" >
    <div class="page-section-content overflow-hidden">
        <div class="container">
            <!-- TITLE -->
            <h2 class="undertitle text-center" data-animate="fadeInDown" data-delay="0">‫ قـالــوا عــنـا</h2>
            <div class="line-hr hr_white"></div>
            <!--! TITLE -->
            <div class="double-clear"></div>
            <div class="ok-row">
                <!-- TESTIMONIAL SLIDER -->
                <div class="owl-slider">
                    <div id="owl" class="owl-carousel owl-circle" data-owl-namber="1" data-owl-margin="3" data-owl-autoPlay="false" data-owl-loop="true" data-owl-navigation="false" data-owl-pagination="true">
                        <?php foreach($testimonials as $testimonial){  if($testimonial['userphoto']){ $userphoto = $testimonial['userphoto']; }else{$userphoto = 'images/posts/user-flat.png';} ?>
                        <div class="ok-md-12">
                            <div class="dima-testimonial testimonial-side quote-text quote-start">
                                <div class="dima-testimonial-image circle">
                                    <img src="<?php echo $userphoto?>" style="width: 80px;height: 80px;" alt="">
                                </div>
                                <blockquote>
                                    <div class="quote-content quote-start">
                                        <p class="flat-paragraph">
                                    <?php echo $testimonial['content']?>
                                        </p>
                                        <span class="dima-testimonial-meta">
                                        <strong><?php echo $testimonial['username']?></strong>
                                        <span>
                                        <!--<span> | </span>مصمم ويب</span>-->
                                        </span>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="ok-md-12">
                            <div class="dima-testimonial testimonial-side quote-text quote-start">
                                <div class="dima-testimonial-image circle">
                                    <img src="images/posts/user-flat.png" alt="">
                                </div>
                                <blockquote>
                                    <div class="quote-content quote-start">
                                        <p>أبجد هوز هو مجرد دمية النص من التنضيد والطباعة وصناعة أبجد هوز وقد نص في هذه الصناعة  أبجد هوز هو مجرد دمية النص من التنضيد والطباعة وصناعة أبجد هوز وقد نص في هذه الصناعة أبجد هوز هو مجرد دمية النص من التنضيد والطباعة وصناعة أبجد هوز وقد نص في هذه الصناعة.
                                        </p>
                                        <span class="dima-testimonial-meta">
                                        <strong>احمد</strong>
                                        <span>
                                        <span> | </span>مصمم ويب</span>
                                        </span>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
                <!--! TESTIMONIAL SLIDER -->
            </div>
            <!--! ICON -->
        </div>
    </div>
</section>
<!--! TESTIMONIALS SECTION -->
<?php } ?>      
                
                
<!-- PRICING -->
<section class="section " id="subscriptions">
    <?php /* ?>
    <div class="widget dima-tabs responsive-tab">
        <ul class="dima-tab-nav" id="dima-tab-nav">
            <li class="tab active"><a data-animated-link="fadeOut" href="#tab-1" data-toggle="tab" aria-expanded="true">Featured</a>
            </li>
            <li class="tab"><a data-animated-link="fadeOut" href="#tab-2" data-toggle="tab" aria-expanded="false">TAGS</a>
            </li>
        </ul>
        <div class="dima-tab-content  ">
            <div id="tab-1" class="tab-pane fade clearfix dima-tab_content active in">
                <ul class="with-border featured-posts">
                    <li>
                        <a data-animated-link="fadeOut" href="#">
                        <h6 class="uppercase">The psychology of branding</h6>
                        </a>
                        <span>By Admin / 09 Sept 2014</span>
                    </li>
                    <li>
                        <a data-animated-link="fadeOut" href="#">
                        <h6 class="uppercase">The psychology of branding</h6>
                        </a>
                        <span>By Admin / 09 Sept 2014</span>
                    </li>
                    <li>
                        <a data-animated-link="fadeOut" href="#">
                        <h6 class="uppercase">The psychology of branding</h6>
                        </a>
                        <span>By Admin / 09 Sept 2014</span>
                    </li>
                </ul>
            </div>
            <div id="tab-2" class="tab-pane fade clearfix dima-tab_content">
                <div class="tags">
                    <a data-animated-link="fadeOut" href="#">logo</a>
                    <a data-animated-link="fadeOut" href="#">design</a>
                    <a data-animated-link="fadeOut" href="#">website</a>
                    <a data-animated-link="fadeOut" href="#">wordpress</a>
                    <a data-animated-link="fadeOut" href="#">elegant</a>
                    <a data-animated-link="fadeOut" href="#">brand</a>
                    <a data-animated-link="fadeOut" href="#">simple</a>
                </div>
            </div>
        </div>
    </div>
    <?php */ ?>
    
    <div class="page-section-content overflow-hidden">
        <div class="container text-center ">
            <h2 class="uppercase" data-animate="fadeInDown" data-delay="0">انواع الاشتراك</h2>
            <div class="line-hr"></div>
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
                                            <li>اخفاء عنوان الموقع <span class="red-color fa fa-times fa-fw maher-float-left" ></span></li>
                                            <li>تغريدة بصورة <span class="red-color fa fa-times fa-fw maher-float-left"></span></li>
                                            <li>اضافة دعاء تلقائي <span class="red-color fa fa-times fa-fw maher-float-left"></span></li>
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
                                            <li>اخفاء عنوان الموقع <span class="green-color fa fa-check fa-fw maher-float-left" ></span></li>
                                            <li>تغريدة بصورة <span class="green-color fa fa-check fa-fw maher-float-left"></span></li>
                                            <li>اضافة دعاء تلقائي <span class="green-color fa fa-check fa-fw maher-float-left"></span></li>
                                            <li>اختيار الصلوات <span class="green-color fa fa-check fa-fw maher-float-left"></span></li>
                                            <li>التحكم في محتوى التغريدة <span class="green-color fa fa-check fa-fw maher-float-left"></span></li>
                                            <!--<li>تغريدة صوتية <img src="images/true_icon.png" class="maher-payment-img" /></li>-->
                                        </ul>
                                        <?php if($user['userpaymenttype'] > 1){ ?>
                                        <a data-animated-link="fadeOut" class="di_white small Pill button fill  maher-free-button maher-cursor-default"  title="تخطيت هذه المرحلة">تخطيت هذه المرحلة</a>
                                        <?php }else if(($user['userpaymenttype'] > 0)){ ?>
                                        <a data-animated-link="fadeOut" class="small Pill button fill" <?php /* ?> href="payments" <?php */ ?> id="vip" title="اضافة مدة جديدة">قريبا</a>
                                        <?php }else if($user && ($user['userpaymenttype'] == 0)){ ?>
                                        <a data-animated-link="fadeOut" class="small Pill button fill" <?php /* ?> href="payments" <?php */ ?> id="vip" title="ترقية اشتراكك">قريبا</a>
                                        <?php }else{ ?>
                                        <a data-animated-link="fadeOut" class="small Pill button fill"  <?php /* ?> href="payments" <?php */ ?> id="vip" title="سجل الآن">قريبا</a>
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
                                            <li>اخفاء عنوان الموقع <span class="green-color fa fa-check fa-fw maher-float-left" ></span></li>
                                            <li>تغريدة بصورة <span class="green-color fa fa-check fa-fw maher-float-left"></span></li>
                                            <li>اضافة دعاء تلقائي <span class="green-color fa fa-check fa-fw maher-float-left"></span></li>
                                            <li>اختيار الصلوات <span class="green-color fa fa-check fa-fw maher-float-left"></span></li>
                                            <li>التحكم في محتوى التغريدة <span class="green-color fa fa-check fa-fw maher-float-left"></span></li>
                                            <!--<li>تغريدة صوتية <img src="images/true_icon.png" class="maher-payment-img" /></li>-->
                                        </ul>
                                        
                                        <?php if($user['userpaymenttype'] == 2){ ?>
                                        <a data-animated-link="fadeOut" class="small Pill button fill" <?php /* ?> href="payments-lifetime" <?php */ ?> id="vip" title="اشتراكك الحالي">اشتراكك الحالي</a>
                                        <?php }else{ ?>
                                        <a data-animated-link="fadeOut" class="small Pill button fill" <?php /* ?> href="payments-lifetime" <?php */ ?> id="lifetime" title="سجل الآن">قريبا</a>
                                        <?php } ?>
                                        
                                        <br /><br />
                                        <span class="maher-note">* طول فترة عمل الخدمة</span>
                                                                                                                                                                
                                        
                                    </div>
                                </div>
                                <!--! TABLE(3) -->
                                
                                
                            </div>
                            
                            <div class="dima-data-table-wrap hidden-lg">
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
                                            <td>اضافة دعاء تلقائي</td>
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
                                            <a data-animated-link="fadeOut" class="tiny Pill button fill" <?php /* ?> href="payments"<?php */ ?> id="vip" title="اضافة مدة جديدة">قريبا</a>
                                            <?php }else if($user && ($user['userpaymenttype'] == 0)){ ?>
                                            <a data-animated-link="fadeOut" class="tiny Pill button fill"  <?php /* ?> href="payments"<?php */ ?> id="vip" title="ترقية اشتراكك">قريبا</a>
                                            <?php }else{ ?>
                                            <a data-animated-link="fadeOut" class="tiny Pill button fill" <?php /* ?> href="payments"<?php */ ?> id="vip" title="سجل الآن">قريبا</a>
                                            <?php } ?>
                                            </td>
                                            
                                            <td>
                                            <?php if($user['userpaymenttype'] == 2){ ?>
                                            <a data-animated-link="fadeOut" class="tiny Pill button fill" <?php /* ?> href="payments-lifetime"<?php */ ?> id="vip" title="اشتراكك الحالي">قريبا</a>
                                            <?php }else{ ?>
                                            <a data-animated-link="fadeOut" class="tiny Pill button fill" <?php /* ?> href="payments-lifetime"<?php */ ?> id="lifetime" title="سجل الآن">قريبا</a>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
        </div>
    </div>
</section>
<!--! PRICING -->



<?php /* if($news){ ?>
<!-- NEWS SECTION -->
<section class="section section-colored" data-bg="#0288d1">
    <div class="page-section-content overflow-hidden">
        <div class="container">
            <!-- TITLE -->
            <h2 class="uppercase undertitle text-center" data-animate="fadeInDown" data-delay="0">اخر الاخبار</h2>
            <div class="line-hr hr_white"></div>
            <!--! TITLE -->
            <div class="double-clear"></div>
            <div class="boxed-blog">
                <!-- POST (1) -->
                <?php foreach($news as $n){ ?>
                <article role="article" class="ok-md-4 ok-xsd-6" data-animate="fadeInUp" data-delay="50">
                    <div class="post e-post">
                        <div class="post-img">
                            <img src="<?php if($n['image']){ ?>dynamic/news/<?php echo $n['image']?><?php }else{ ?>images/posts/flat-post-1.jpg<?php } ?>" alt="Brand Consulting">
                            <div class="link_overlay with_opacity">
                                <ul class="icons-media">
                                    <li><a data-animated-link="fadeOut" href="news-<?php echo $n['id']?>"><i class="fa fa-link"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="post-meta box">
                            <ul>
                                <li class="post-on"><?php echo Date::timestampToDayMonthYear($n['date'])?></li>
                                <li class="post-view"><i class="fa fa-eye"></i> <?php echo $n['views']?></li>
                            </ul>
                        </div>
                        <div class="post-content text-start box">
                            <h5><a data-animated-link="fadeOut" href="news-<?php echo $n['id']?>"><?php echo $n['title']?></a>
                            </h5>
                            <p class="flat-paragraph"><?php echo $n['content']?></p>
                        </div>
                    </div>
                </article>
                <?php } ?>
                <!--! POST (1) -->
                
            </div>
        </div>
    </div>
</section>
<!--! NEWS SECTION -->
<?php } */?>


<!-- NEWS SECTION -->
<section class="section section-colored" data-bg="#0288d1"  id="term">
    <div class="page-section-content overflow-hidden">
        <div class="container">
            <!-- TITLE -->
            <h2 class="uppercase undertitle text-center" data-animate="fadeInDown" data-delay="0">اتفاقية الاستخدام</h2>
            <div class="line-hr hr_white"></div>
            <!--! TITLE -->
            <p data-animate="fadeInUp" data-delay="100" style="font-size: 18px;color:#fff;">
            يقدم الموقع خدمة نشر تغريدات في وقت الاذان للصلوات في مدينة من اختيار المشترك<br />
            الاشتراك المدفوع مدى الحياة مستمر طيلة فترة عمل الموقع<br />
            الموقع غير مسؤول عن التوقفات التي قد تحدث للخدمة نتيجة تغير سياسات تويتر او طريقتها او لاي اسباب اخرى، مع التزامه بتقديم كل ما يلزم لضمان استمرار الخدمة
            </p>
            <!--! TITLE -->
            <div class="clear-section"></div>
        </div>
    </div>
</section>
<!--! NEWS SECTION -->


<!-- NEWS SECTION -->
<section class="section section-colored"   id="contacts">
    <div class="page-section-content overflow-hidden">
        <div class="container">
            <!-- TITLE -->
            <h2 class="uppercase text-center" data-animate="fadeInDown" data-delay="0">اتصل بنا</h2>
            <div class="line-hr "></div>
            <!--! TITLE -->
            <div class="double-clear"></div>
            
            <div class="main ok-md-12 ok-xsd-12" >
                <h5 class="uppercase">أرسل لنا</h5>
                <div class="clear"></div>
                <!-- Success Msg -->
                <div id="contactSuccess" class="dima-alert dima-alert-success fade in hide">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="fa  fa-check "></i>
                    <!--<h4 class="header-alert">Info</h4>-->
                    <p>تم الارسال بنجاح</p>
                </div>
                <!-- Error Msg -->
                <div id="contactError" class="dima-alert dima-alert-error fade in hide">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="fa fa-times "></i>
                    <!--<h4 class="header-alert">Info</h4>-->
                    <p>يوجد خطأ</p>
                </div>
                <!-- Form -->
                <form action="contact.php" id="contact" class="form-small form " novalidate="novalidate">
                    <div class="ok-row">
                        <div class="post ok-md-4 ok-xsd-6  ">
                            <div class="field">
                                <input id="name" name="name" type="text" placeholder="الأسم" style="line-height: inherit;" required=""  aria-required="true" >
                            </div>
                        </div>
                        <div class="post ok-md-4 ok-xsd-6  ">
                            <div class="field">
                                <input id="email" name="email" type="email" placeholder="البريد الاليكتروني" style="line-height: inherit;" required="" aria-required="true">
                            </div>
                        </div>
                        <div class="post ok-md-4 ok-xsd-6  ">
                            <div class="field">
                                <input id="subject" name="subject" type="text" placeholder="العنوان" style="line-height: inherit;" required="" aria-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="field  ">
                        <textarea id="message" name="message" class="  textarea" placeholder="الرسالة" required="" style="line-height: inherit;" aria-required="true"></textarea>
                    </div>
                    <input type="submit" value="أرسل" class=" no-rounded button small fill">
                </form>
            </div>
            
            
        </div>
    </div>
</section>
<!--! NEWS SECTION -->

