
<!-- BIG TITLE HERE -->
<section class="title_container">
    <div class="page-section-content overflow-hidden">
        <div class="background-image-hide parallax-background">
            <img class="background-image" alt="<?php echo $default['title']?>" src="images/slides/header-bg.jpg">
        </div>
        <div class="container page-section text-center">
            <h2 class="uppercase undertitle"><?php echo $default['title']?></h2>
            <div class="topaz-line">
                <i class="di-separator"></i>
            </div>
        </div>
    </div>
</section>
<!-- BIG TITLE HERE -->
<!-- SECTION -->
<section class="section ">
    <div class="page-section-content overflow-hidden">
        <div class="container text-center not-found">
            <p><?php if($default['image']){ ?><img src="dynamic/news/<?php echo $default['image']?>"  /><?php } ?></p>
            
            <div class="double-clear"></div>
            <p><?php echo Date::timestampToDayMonthYear($default['date'])?></p>
            <div class="double-clear"></div>
            <h6><?php echo $default['content']?></h6>
            <div class="double-clear"></div>
            
        </div>
    </div>
</section>
<!--! SECTION -->
