<style>
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .alert-success {
        background-color: #dff0d8;
        border-color: #d6e9c6;
        color: #3c763d;
    }
    .alert-danger {
        background-color: #f2dede;
        border-color: #ebccd1;
        color: #a94442;
    }

</style>
<div class="cleaner-h2"></div>
<!-- print error message -->
<?php if($errors){ ?>
<div class="alert alert-danger">
    <p><span>خطأ!</span>
<?php foreach($errors as $val){ ?>
<br/>
<?php echo $val; ?>
<?php } ?>
</p>
<!--    <span class="closer">x</span>-->
</div>
<?php 
}else if($success){ ?>
<div class="notifications success">
    <p><!--<span>Success!</span> --><?php echo $success; ?></p>
    <span class="closer">x</span>
</div>
<?php } ?>
