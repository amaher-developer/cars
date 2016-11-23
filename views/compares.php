<div class="col-lg-9">
<h2 class="no-margin h2-new"> <img src="img/003.png"/> <?php echo $this->title?> </h2>

<div class="cleaner-h1"></div>

<div class="boddy">
<div style="text-align: <?php echo $textAlign?>;">
<?php foreach($records as $record){ ?>
<h3 class="no-margin h3-inter h3-right"><a href="index.php?p=book&id=<?php echo $record['id']?>" ><?php echo $record['name']?></a></h3>
<div class="cleaner-h1"></div>
<p class="p-normal p-right"><?php echo trim($record['brief'])?></p>
<a href="index.php?p=book&id=<?php echo $record['id']?>" class="pull-right"><?php echo $clickHere?></a>
<div class="cleaner-h2"></div>
<?php } ?>
</div>
</div><!--end boddy-->

</div><!--end col-9-->