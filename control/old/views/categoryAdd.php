<style type="text/css">
  span.new {
    vertical-align: super;
    color: #cc0000;
    font-size: 70%;
  }
  .encodeBox {
    width: 550px;
    height: 40px;
    font-size: 14px;
    font-family: Courier;
  }
  .inputField {
    width: 160px;
  }
  #locations {
    width: 300px;
    font-size: 12px;
  }
  #map_canvas {
    width: 500px;
    height: 400px;
    border: 1px solid gray;
    margin-top:6px;
  }
  #txtAddress {
    width: 14em;
  }
</style>
<form method="post" action="contents.php?page=categoryAdd" id="contactform">
<table class="table_addedit" align="center">
<tr><td><b>الأسم</b></td><td><input type="text" name="name" value="<?php echo $default['name']?>" class="input" Required></td></tr>
<tr><td><b>الأسم الأنجليزي</b></td><td><input type="text" name="name_en" value="<?php echo $default['name_en']; ?>" class="input" Required></td></tr>

<tr><td></td><td><input type="submit" name="Submit" value="أضافة" class="button" /></td></tr>
</table>
</form>