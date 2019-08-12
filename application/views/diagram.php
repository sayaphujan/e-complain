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

<section class="content-header">
    <h1>
        Laporan
        <small>Diagram</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Laporan</a></li>
        <li class="active">Diagram</li>
    </ol>
</section>
<section class="content">   

    <div class="row">
        <div class="col-md-12">
                    <form action="<?php echo base_url(uri_string()); ?>" method="post">
                        
                        Dari <input type="date" id="min-date" name="min-date" value="<?= $min_date; ?>">
                        s/d  <input type="date" id="max-date" name="max-date" value="<?= $max_date;?>">
                        <input type="submit" value="submit" name="submit" class="btn btn-primary">
                    </form>
                    <br/>
                    <form action="<?php echo base_url(uri_string().'/excel'); ?>" method="post">
                        <input type="hidden" name="min" value="<?= $min_date; ?>">
                        <input type="hidden" name="max" value="<?= $max_date;?>">
                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Ekspor XLS</button>
                    </form>
                    <hr/>
            <div class="box box-primary">
              <div id="container" style="height: 400px; min-width: 600px"></div>
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->
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
