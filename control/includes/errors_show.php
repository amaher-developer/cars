<!-- print error message -->
<?php if($errors){ ?>
<div class="notifications error">
    <p><span>Error!</span> 
<?php foreach($errors as $val){ ?>
<br/>
<?php echo $val; ?>
<?php } ?>
</p>
    <span class="closer">x</span>
</div>
<?php 
}else if($success){ ?>
<div class="notifications success">
    <p><!--<span>Success!</span> --><?php echo $success; ?></p>
    <span class="closer">x</span>
</div>
<?php } ?>
