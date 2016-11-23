<div align="right"><b>متوسط العقارات لهذا الشهر : </b><span id="total_record"><?php echo $estatesAverage?></span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
<b>متوسط الاعضاء لهذا الشهر : </b><span id="total_record"><?php echo $usersAverage?></span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
<b>متوسط المشاهدة لهذا الشهر : </b><span id="total_record"><?php echo $viewsAverage?></span></div>
<table width="100%" align="center" class="table_title">
<th>التاريخ</th><th>عدد العقارات</th><th>عدد الأعضاء</th><th>عدد المشاهدات</th>
<?php foreach($records as $record){ ?>
<tr>
<td align="center"><?php echo $record['date']?></td>
<td align="center"><?php echo $record['numberOfEstates']?></td>
<td align="center"><?php echo $record['numberOfUsers']?></td>
<td align="center"><?php echo $record['numberOfViews']?></td>
</tr>
<?php } ?>
</table>
