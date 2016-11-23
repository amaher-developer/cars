
<div align="right"><b>عدد الأعضاء : </b><span id="total_record"><?php echo $total_records?></span></div>
<table width="100%" align="center" class="table_title">
<th>id</th><th>كلمه البحث</th>
<?php foreach($types as $type){ ?>
<tr><td colspan="2" style="color: red;"><?php echo $type['name']?></td></tr>
<?php foreach($records as $record){ ?>
<?php if($record['typeId'] == $type['id']){ ?>
<tr align="center">
<td><?php echo $record['id']?></td>
<td><?php echo $record['name']?></td>
</tr>
<?php } ?>
<?php } ?>
<?php } ?>
</table>
