<!-- Morris Charts CSS -->
<link href="<?=base_url('assets/vendor/morrisjs/morris.css')?>" rel="stylesheet">
<!-- Morris Charts JavaScript -->
<script src="<?=base_url('assets/vendor/raphael/raphael.js')?>"></script>
<script src="<?=base_url('assets/vendor/morrisjs/morris.min.js')?>"></script>
<?php
#################################################################################
?>
<h4>Laporan Tahun <?=$year?></h4>
<hr>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-bar-chart"></i> Grafik Transaksi</div>
            <div class="panel-body">
                <div class="box-body chart-responsive">
                    <div class="chart" id="line-transaksi-chart" style="height: 300px;"></div>
                </div>                
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-bar-chart"></i> Grafik Pendapatan</div>
            <div class="panel-body">
                <div class="box-body chart-responsive">
                    <div class="chart" id="revenue-chart" style="height: 300px;"></div>
                </div>                
            </div>
        </div>
    </div>    
</div>
<div>
    <table width="100%" class="table table-striped table-bordered table-condensed table-hover" id="penjualan_table">
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Total Transaksi</th>
                <th>Total Item</th>
                <th>Total Qty</th>
                <th>Total Pendapatan (Rp)</th>
                <th>Total Harga Beli (Rp)</th>
                <th>Total Profit (Rp)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($penjualans as $penjualan): ?>
            <tr>
                <td><?=$penjualan->month?></td>
                <td><span class="pull-right"><?=format_angka($penjualan->total_transaksi)?></span></td>
                <td><span class="pull-right"><?=format_angka($penjualan->total_item)?></span></td>
                <td><span class="pull-right"><?=format_angka($penjualan->total_qty)?></span></td>
                <td><span class="pull-right"><?=format_angka($penjualan->total_omset)?></span></td>
                <td><span class="pull-right"><?=format_angka($penjualan->total_modal)?></span></td>
                <td><span class="pull-right"><?=format_angka($penjualan->total_profit)?></span></td>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>
<div class="row">
    <div class="form-group col-md-3">
        <form method="GET" action="<?=site_url('Admin/penjualan_laporan_get_filter_year')?>">
            <label>Ganti Tahun</label>
            <input type="text" name="year" class="form-control" placeholder="tahun">          
            <input type="submit" class="btn btn-default">
        </form>
    </div>    
</div>

<script>
    var data_grafik=0;

    $(document).ready(function() {
        $.get("<?=site_url('Admin/chart_transaksi_omset_modal_peryear/'.$year)?>", function(data_response){
            data_grafik=data_response;
            chart_function();
        });
    });
    var chart_function=function(){
        var line = new Morris.Line({
            element: 'line-transaksi-chart',
            resize: true,
            data: data_grafik,
            xkey: 'bulan',
            ykeys: ['total_transaksi'],
            labels: ['total transaksi'],
            lineColors: ['#3c8dbc'],
            hideHover: 'auto'
        });        
        var area = new Morris.Area({
            element: 'revenue-chart',
            resize: true,
            data: data_grafik,
            xkey: 'bulan',
            ykeys: ['profit','modal','omset'],
            labels: ['profit','modal','omset'],
            lineColors: ['red','#a0d0e0', '#3c8dbc'],
            hideHover: 'auto'
        });
    }

</script>