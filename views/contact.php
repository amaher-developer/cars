<!-- NEWS SECTION -->
<section class="section section-colored"   id="contacts">
    <div class="page-section-content overflow-hidden">
        <div class="container">
            <!-- TITLE -->
            <h2 class="uppercase text-center" data-animate="fadeInDown" data-delay="0">اتـصــل بنــا</h2>
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
                                <input id="name" name="name" type="text" placeholder="الأسم" style="line-height: inherit;" required="" aria-required="true">
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