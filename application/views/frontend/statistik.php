<style>
#container {
  min-width: 310px;
  max-width: 800px;
  height: 400px;
  margin: 0 auto
}
</style>

<script src="<?php echo base_url('assets/js/rifqi/highcharts.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/rifqi/series-label.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/rifqi/exporting.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/rifqi/export-data.js'); ?>"></script>

<!-- About Us -->
<section id="about" class="about scrollspy">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <!--<form action="<?php echo base_url('diagram'); ?>" method="post">
                        Tanggal : <input class="date-range-filter" name="date-range-filter" id="filter_metric" value="<?= $min_date.'-'.$max_date; ?>">
                        <input type="hidden" id="min-date" name="min-date" value="<?= $min_date;?>">
                        <input type="hidden" id="max-date" name="max-date" value="<?= $max_date;?>">
                        <input type="submit" value="submit" name="submit">
                </form>-->
              <div id="container" style="height: 400px; min-width: 600px"></div>
             </div>
        </div>
    </div>
  </div>
</section>
<!-- End About Us -->

<?php

    foreach($report as $result){
        $jenis[] = $result->jenis; 
        $jumlah[] = (float) $result->jumlah;
    }
     
    foreach($category as $result){
        $tanggal[] = $result->tanggal; 
    }
     
    foreach($chart_saran as $result){
        $tgl_saran[] = $result->tgl_saran; 
        $saran[] = $result->saran; 
    }
     
    foreach($chart_kritik as $result){
        $tgl_kritik[] = $result->tgl_kritik; 
        $kritik[] = $result->kritik;
    }
     
?>
<!-- LINE CHART two point 
<script>

Highcharts.chart('container', {

    title: {
        text: 'Data Statistik e-Complaint PCM Bligo'
    },

    subtitle: {
        text: 'Source: e-Complaint PCM Bligo'
    },

    xAxis: {
            categories: <?php echo json_encode($tanggal); ?>
        },

    yAxis: {
        title: {
            text: 'Jumlah data masuk'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 0
        }
    },

    series: [{
            name: 'Saran',
            color: '#000080',
            data : <?php echo json_encode($saran,JSON_NUMERIC_CHECK); ?>
        },
        {
            name: 'kritik',
            color: '#FF1493',
            data : <?php echo json_encode($kritik,JSON_NUMERIC_CHECK); ?>
        }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
</script>
-->

<!-- BAR CHART column
<script>
Highcharts.chart('container', {

    chart: {
        type: 'column'
    },

    title: {
        text: 'Data Statistik e-Complaint PCM Bligo'
    },
    
    subtitle: {
        text: 'Source: e-Complaint PCM Bligo'
    },

    xAxis: {
            categories: <?php echo json_encode($tanggal); ?>
        },

    yAxis: {
        allowDecimals: false,
        min: 0,
        title: {
            text: 'Jumah Data Masuk'
        }
    },

    tooltip: {
        formatter: function () {
            return '<b>' + this.x + '</b><br/>' +
                this.series.name + ': ' + this.y + '<br/>' +
                'Total: ' + this.point.stackTotal;
        }
    },

    plotOptions: {
        column: {
            stacking: 'normal'
        }
    },

    series: [{
            name: 'Saran',
            color: '#000080',
            data : <?php echo json_encode($saran,JSON_NUMERIC_CHECK); ?>
        },
        {
            name: 'kritik',
            color: '#FF1493',
            data : <?php echo json_encode($kritik,JSON_NUMERIC_CHECK); ?>
        }]
});
</script>
-->

<!-- PIE -->
<script>
Highcharts.chart('container', {
    colors: ['#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#058DC7', '#50B432',
        '#FF9655', '#FFF263', '#6AF9C4'],
    chart: {
        backgroundColor: {
            linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
            stops: [
                [0, 'rgb(255, 255, 255)'],
                [1, 'rgb(240, 240, 255)']
            ]
        },
        type: 'pie'
    },
    
    title: {
        text: 'Data Statistik e-Complaint PCM Bligo'
    },
    
    subtitle: {
        text: 'Jumlah Data : '+<?php echo json_encode($total,JSON_NUMERIC_CHECK); ?>
    },

    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },

    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            },
            showInLegend: true
        }
    },

    series: <?php echo $pie; ?>
});
</script>
