<script type="text/javascript" src="//code.jquery.com/jquery-2.2.2.min.js"></script>



<!-- BIG TITLE HERE -->
<section class="title_container">
    <div class="page-section-content overflow-hidden">
        <div class="background-image-hide parallax-background">
            <img class="background-image" alt="طرق الدفع" src="images/slides/header-bg.jpg">
        </div>
        <div class="container page-section text-center">
            <h2 class="uppercase undertitle">طرق الدفع</h2>
            <div class="topaz-line">
                <i class="di-separator"></i>
            </div>
        </div>
    </div>
</section>
<!-- BIG TITLE HERE -->


<!-- PRICING -->
<section class="section " id="subscriptions">
    <div class="page-section-content overflow-hidden">
        <div class="container text-center ">
            
            <div class="ok-row">
                <div class="dima-pricing-table">
                    
                    <!-- TABLE(1) -->
                    <div class="dima-pricing-col ok-md-6 featured-larg" data-animate="flipInY" data-delay="50">
                        <div class="header dima-pricing-col-success"  style="background: #F6992F;">
                            <h2>بطاقة إئتمان</h2>
                            <span><?php echo $buyamountunit?></span>
                            <hr  style="margin:0px;"/>
                            <br /><br />
                            <p class="maher-color-white">
                            يمكنك الدفع اون لين عن طريق بطاقة إئتمانك من خلال هذا الزر
                            </p>
                            <?php  if($type == 1){  echo Functions::toCheckoutForm('AthanTweets.com subscription', $buyamount,'http://www.athantweets.com/paypal.php?id='.$_SESSION['user']['userid'] );  }else{ echo Functions::toCheckoutSubscriptionForm('AthanTweets.com subscription', $buyamount,'http://www.athantweets.com/2checkout.php?id='.$_SESSION['user']['userid'].'&y='.$years ); }?>
                            
                            
                            
                            
                            <?php /* ?>
                            <br />
                            <span>عدد السنوات: 
                            <select class="yearbanktransfer maher-selectyears" name="yearbanktransfer1" id="yearbanktransfer1"><?php for($i=1;$i < 10; $i++){?><option value="<?php echo $i?>"><?php echo $i?></option><?php } ?></select></span>
                            
                            <hr  style="margin:0px;"/>
                            <br /><br />
                            <p class="maher-color-white">                        
                            التحويل البنكي لحساب الشركة<br />(مصرف الراجحي
                            رقم الحساب : 203608010410889<br />
                            IBAN : SA59 8000 0203 6080 1041 0889<br />
                            باسم : مؤسسة أبعاد الجيل لتقنية المعلومات
                            )
                            </p>
                            <br /><input type="text" name="banktransfer" id="banktransfer" style="background-color:white;line-height: inherit;width: 80%;" placeholder="أدخل رقم التحويل هنا" /></li>
                            <br /><br />
                            <a data-animated-link="fadeOut" class="di_white small Pill button fill  maher-free-button" id="payment_button" onclick="payment(1);" title="prices">ارسال</a>
                        
                            <?php */ ?>
                        </div>
                    </div>
                    <!--! TABLE(1) -->
                    <!-- TABLE(2) -->
                    <div class="dima-pricing-col ok-md-6 featured-larg" data-animate="flipInY" data-delay="150">
                        <div class="header dima-pricing-col-success" style="background: #F6992F;">
                            <h2>باي بال</h2>
                            <span><?php echo $buyamountunit?></span>
                            <?php /* ?>
                            <br />
                            <span>عدد السنوات: 
                            <select  class="yearbanktransfer maher-selectyears" id="yearbanktransfer2" name="yearbanktransfer2" ><?php for($i=1;$i < 10; $i++){?><option value="<?php echo $i?>"><?php echo $i?></option><?php } ?></select></span>
                            <?php */ ?>
                            <hr  style="margin:0px;"/>
                            <br /><br />
                             <p class="maher-color-white">
                            يمكنك الدفع اون لاين عن طريق حسابك علي الباي بال من خلال هذا الزر
                            </p>
                            <br />
                            <?php if($type == 1){  echo Functions::paypalForm('AthanTweets.com subscription', $buyamount,'http://www.athantweets.com/paypal.php?id='.$_SESSION['user']['userid'].'&t=2' );  }else{ echo Functions::paypalSubscriptionForm('AthanTweets.com subscription', $buyamount,'http://www.athantweets.com/paypal.php?id='.$_SESSION['user']['userid'].'&t=1' ); }?>
                            <!--<a data-animated-link="fadeOut" class="small Pill button fill" href="#example" title="prices">سجل الآن</a>-->
                            
                        </div>
                    </div>
                    <!--! TABLE(2) -->
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!--! PRICING -->


<script>

$('#yearbanktransfer2').change(function() {
  var yearbanktransfer2 = $('#yearbanktransfer2').val();
  document.getElementById('quantity').value = yearbanktransfer2;  
}); 

function payment(type){
        var type = type;
        var banktransfer = $('#banktransfer').val();
        var yearbanktransfer = $('#yearbanktransfer1').val();
        
        if( (type != '1') || (banktransfer == '') ){
            alert('برجاء ادخال رقم التحويل بشكل صحيح');
        }else{
            $('#payment_button').hide();
            $('<img id="loading"  src="images/loading.gif" style="width: 46px;height: 46px;" />').insertAfter('#payment_button');
        
            $.post('ajax/payments.php', {type:type, banktransfer:banktransfer, yearbanktransfer:yearbanktransfer}, function(data){
  
                if(data == 'true'){
                    $('#loading').delay(1500).fadeOut(300);
                    //$('<img id="paymentsave"  src="images/savesuccessfully.png" style="width: 46px;height: 46px;"  />').insertAfter('#loading').delay(200).fadeIn(300);
                    $('<div id="paymentsave" class="dima-alert dima-alert-info"><button type="button" class="close" data-dismiss="alert">×</button><i class="fa  fa-check "></i><p>تم تسجيل الرقم بنجاح .. سيقوم الشرف بمراجعتة لترقية الاشتراك</p></div>').insertAfter('#loading');
                    $('#banktransfer').hide();
                    //$('#paymentsave').delay(1500).fadeOut(300);
                    //score = score-1;
                    //document.getElementById('total_record').innerHTML = score;               
                }else{
                    alert('Error, please try again');
                }
                $('#loading').remove();
                //parent.Three.location.reload();
        
            });
        
        }
}

</script>
