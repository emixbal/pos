<!-- Morris Charts CSS -->
<link href="<?=base_url('assets/vendor/morrisjs/morris.css')?>" rel="stylesheet">
<!-- Morris Charts JavaScript -->
<script src="<?=base_url('assets/vendor/raphael/raphael.js')?>"></script>
<script src="<?=base_url('assets/vendor/morrisjs/morris.min.js')?>"></script>
<?php
#################################################################################
?>
<div class="row">
  <div class="col-md-4 col-lg-4">
    <div class="panel panel-green">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-shopping-cart fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge"><?=$resume->total_transaksi?></div>
            <div>Transaksi hari ini!</div>
          </div>
        </div>
      </div>
      <a href="#">
        <div class="panel-footer">
          <span class="pull-left">View Details</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div><!-- /.panel panel-green-->
  </div><!-- /.col-md-6 col-lg-4 -->
  <div class="col-md-4 col-lg-4">
    <div class="panel panel-red">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-money fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge"><?=format_angka($resume->omset)?></div>
            <div>Omset hari ini!</div>
          </div>
        </div>
      </div>
      <a href="#">
        <div class="panel-footer">
          <span class="pull-left">View Details</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div><!-- /.panel panel-green-->
  </div><!-- /.col-md-6 col-lg-4 -->
  <div class="col-md-4 col-lg-4">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="fa fa-bar-chart-o fa-5x"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge"><?=format_angka($resume->profit)?></div>
            <div>Profit hari ini!</div>
          </div>
        </div>
      </div>
      <a href="#">
        <div class="panel-footer">
          <span class="pull-left">View Details</span>
          <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div><!-- /.panel panel-green-->
  </div><!-- /.col-md-6 col-lg-4 -->    
</div>

<div class="row">
	<div class="col-lg-6">
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            Transaksi 30 Hari Terahir
	        </div>
	        <!-- /.panel-heading -->
	        <div class="panel-body">
	            <div id="line-transaksi-chart"></div>
	        </div>
	        <!-- /.panel-body -->
	    </div>
	    <!-- /.panel -->
	</div>
	<!-- /.col-lg-6 -->	
  <div class="col-lg-6">
      <div class="panel panel-default">
          <div class="panel-heading">
              Omset 30 Hari Terahir
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
              <div id="line-omset-chart"></div>
          </div>
          <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
  </div>
  <!-- /.col-lg-6 -->   
</div>

<script>
  var data_resume_transaksi=0;
  var data_resume_omset=0;
  $(document).ready(function(){
    $.get("<?=site_url('Admin/chart_omset_transaksis_perday_last30')?>", function(data_response){
      data_resume_transaksi=data_response['resume_transaksi'];
      data_resume_omset=data_response['resume_omset'];
      chart_function();
    });
  });

  var chart_function=function(){
    $(function () {
    "use strict";
      // LINE CHART
      var line = new Morris.Line({
        element: 'line-transaksi-chart',
        resize: true,
        data: data_resume_transaksi,
        xkey: ['tanggal'],
        ykeys: ["total_transaksi"],
        labels: ['total transaksi'],
        lineColors: ['#3c8dbc'],
        hideHover: 'auto'
      });
      var line = new Morris.Line({
        element: 'line-omset-chart',
        resize: true,
        data: data_resume_omset,
        xkey: ['tanggal'],
        ykeys: ["omset"],
        labels: ['omset'],
        lineColors: ['#3c8dbc'],
        hideHover: 'auto'
      });      
    });
  }
</script>