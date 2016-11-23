
<?php if($testimonials){ ?>
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

<!-- NEWS SECTION -->
<section class="section section-colored"   id="contacts">
    <div class="page-section-content overflow-hidden">
        <div class="container">
            <!-- TITLE -->
            <h2 class="uppercase text-center" data-animate="fadeInDown" data-delay="0">أضـــافـة شــهـــادة</h2>
            <div class="line-hr "></div>
            <!--! TITLE -->
            <div class="double-clear"></div>
            
            <div class="main ok-md-12 ok-xsd-12" >
                <h5 class="uppercase">أرسل لنا</h5>
                <div class="clear"></div>
                <!-- Success Msg -->
                <div id="testimonialSuccess" class="dima-alert dima-alert-success fade in hide">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="fa  fa-check "></i>
                    <!--<h4 class="header-alert">Info</h4>-->
                    <p>تم الارسال بنجاح</p>
                </div>
                <!-- Error Msg -->
                <div id="testimonialError" class="dima-alert dima-alert-error fade in hide">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="fa fa-times "></i>
                    <!--<h4 class="header-alert">Info</h4>-->
                    <p>يوجد خطأ</p>
                </div>
                <!-- Form -->
                <form action="testimonial.php" id="testimonial" class="form-small form " novalidate="novalidate">
                    <div class="ok-row">
                        <div class="post ok-md-12 ok-xsd-12  ">
                            <div class="field">
                                <input id="username" name="username" type="text" placeholder="الأسم" style="line-height: inherit;" required="" aria-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="field  ">
                        <textarea id="content" name="content" class="  textarea" placeholder="الرسالة" required="" style="line-height: inherit;" aria-required="true"></textarea>
                    </div>
                    <input type="submit" value="أرسل" class=" no-rounded button small fill">
                </form>
            </div>
            
            
        </div>
    </div>
</section>
<!--! NEWS SECTION -->