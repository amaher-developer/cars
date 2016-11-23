<script>
function adminDelete(id, name){
	var conf = confirm('هل انت متأكد أنك تريد حذف العميل "'+name+'"؟');
	if(conf){
		location.href = "index.php?p=adminDelete&id="+id+"&returnTo=<?php echo $returnTo?>";
	}
}
</script>
</head>
<body>
<div class="container">
<div class="row">
<div class="cleaner-h2"></div>
<div class="col-lg-6 noPrint">
    <a href="index.php?p=reports&type=governorates" class="btn btn-primary">تقارير المحافظات</a>
    <a href="index.php?p=reports&type=monthly" class="btn btn-primary">التقارير الشهرية</a>
    <a href="index.php?p=reports&type=clients" class="btn btn-primary">تقارير العملاء</a>
</div><!--end col12--->

<div class="cleaner-h2"></div>

<div style="direction: ltr">
    <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto;"></div>
</div>

<div class="col-lg-12">
<table class="table table-bordered">



<?php //foreach($records as $record){ ?>
    <?php
    if($_GET['type'] == 'clients') {
        ?>
        <script type="text/javascript">
            $(function () {
                $('#container').highcharts('StockChart', {

                    chart: {
                        alignTicks: false,
                        type: 'column'
                    },
                    yAxis: {
                        min: 0
                    },
                    rangeSelector: {
                        selected: 1
                    },
                    legend: {
                        enabled: true,
                        verticalAlign: 'top'
                    },
                    series: [{
                        name: '',
                        data: [ {
                            name: "عميل ١",
                            y: 50,
                            drilldown: "Chrome"
                        }, {
                            name: "عميل ٢",
                            y: 30,
                            drilldown: "Firefox"
                        }, {
                            name: "عميل ٣",
                            y: 12,
                            drilldown: "Safari"
                        }]
                    }]

                });
            });
        </script>
        <tr class="text-center bg-primary">
            <td>العميل</td>
            <td>عدد النقلات</td>
            <td>العائد</td>
        </tr>
        <tr id="remove_record<?php echo $record['id'] ?>">

            <td align="center">
                عميل ١
            </td>

            <td align="center">
                12
            </td>
            <td align="center">
                50,000
            </td>
        </tr>

        <tr id="remove_record<?php echo $record['id'] ?>">

            <td align="center">
                عميل ٢
            </td>

            <td align="center">
                6
            </td>
            <td align="center">
                30,000
            </td>
        </tr>

        <tr id="remove_record<?php echo $record['id'] ?>">

            <td align="center">
                عميل ٣
            </td>

            <td align="center">
                1
            </td>
            <td align="center">
                12,000
            </td>
        </tr>

    <?php
    }else if($_GET['type'] == 'monthly') {
        ?>

        <script type="text/javascript">
            $(function () {
                $('#container').highcharts('StockChart', {

                    chart: {
                        alignTicks: false
                    },
                    yAxis: {
                        min: 0
                    },
                    rangeSelector: {
                        selected: 1
                    },
                    legend: {
                        enabled: true,
                        verticalAlign: 'top'
                    },
                    series: [{
                        type: 'line',
                        name: 'Revenue',
                        data: [[1404864000000, 12000], [1405296000000, 3400], [1406246400000, 11000], [1406678400000, 30000], [1407279600000, 12000]]
                    }
                    ]

                });
            });
        </script>
        <tr class="text-center bg-primary">
            <td>الشهر</td>
            <td>عدد النقلات</td>
            <td>العائد</td>
        </tr>
        <tr id="remove_record<?php echo $record['id'] ?>">

            <td align="center">
8-2015
            </td>

            <td align="center">
                42
            </td>
            <td align="center">
                98,000
            </td>
        </tr>

        <tr id="remove_record<?php echo $record['id'] ?>">

            <td align="center">
7-2015
            </td>

            <td align="center">
                63
            </td>
            <td align="center">
                302,000
            </td>
        </tr>

        <tr id="remove_record<?php echo $record['id'] ?>">

            <td align="center">
6-2015
            </td>

            <td align="center">
                1
            </td>
            <td align="center">
                12,000
            </td>
        </tr>

    <?php
    }else{
?>
        <script type="text/javascript">
            $(function () {
                $('#container').highcharts('StockChart', {

                    chart: {
                        alignTicks: false,
                        type: 'column'
                    },
                    yAxis: {
                        min: 0
                    },
                    rangeSelector: {
                        selected: 1
                    },
                    legend: {
                        enabled: true,
                        verticalAlign: 'top'
                    },
                    series: [{
                        name: '',
                        data: [ {
                            name: "القاهرة",
                            y: 70,
                            drilldown: "Chrome"
                        }, {
                            name: "الجيزة",
                            y: 30,
                            drilldown: "Firefox"
                        }, {
                            name: "أسوان",
                            y: 12,
                            drilldown: "Safari"
                        }]
                    }]

                });
            });
        </script>
        <tr class="text-center bg-primary">
            <td>المحافظة</td>
            <td>عدد النقلات</td>
            <td>العائد</td>
        </tr>
        <tr id="remove_record<?php echo $record['id'] ?>">

            <td align="center">
القاهرة
            </td>

            <td align="center">
            87
            </td>
            <td align="center">
            700,000
        </td>
        </tr>

        <tr id="remove_record<?php echo $record['id'] ?>">

            <td align="center">
الجيزة
            </td>

            <td align="center">
            23
            </td>
            <td align="center">
            300,000
        </td>
        </tr>

        <tr id="remove_record<?php echo $record['id'] ?>">

            <td align="center">
أسوان
            </td>

            <td align="center">
            12
            </td>
            <td align="center">
            120,000
        </td>
        </tr>
        <?php
    } ?>



</table>
</div><!--end-col-12-->

</div><!--end row-->
</div>
<script src="scripts/highstock.js"></script>
<script src="scripts/highcharts-more.js"></script>
<script src="scripts/modules/exporting.js"></script>
