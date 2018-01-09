<!-- Morris Charts CSS -->
<link href="<?=base_url('assets/vendor/morrisjs/morris.css')?>" rel="stylesheet">
<!-- Morris Charts JavaScript -->
<script src="<?=base_url('assets/vendor/raphael/raphael.js')?>"></script>
<script src="<?=base_url('assets/vendor/morrisjs/morris.min.js')?>"></script>

<!-- DataTables CSS -->
<link href="<?=base_url('assets/vendor/datatables-plugins/dataTables.bootstrap.css')?>" rel="stylesheet"> 

<!-- DataTables JavaScript -->
<script src="<?=base_url('assets/vendor/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('assets/vendor/datatables-plugins/dataTables.bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/vendor/datatables-responsive/dataTables.responsive.js')?>"></script>
<?php
#################################################################################
?>

<h4>Laporan Bulan <?php echo date ("F, Y", mktime (0,0,0,1,$month,$year)); ?></h4>
<?php
if($total->transaksi>0):
?>
<hr>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o"></i> Grafik Transaksi
            </div>
            <div class="panel-body">
                <div class="box-body chart-responsive">
                    <div class="chart" id="line-transaksi-chart" style="height: 300px;"></div>
                </div>
            </div>
        </div>        
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bell fa-fw"></i> Resume Laporan
            </div>
            <div class="panel-body">
                <div class="list-group">
                    <a href="#" class="list-group-item">
                        <span class="text-muted small">
                            Total Transaksi
                        </span>
                        <span class="pull-right"><?=format_angka($total->transaksi)?></span>
                    </a>
                    <a href="#" class="list-group-item">
                        <span class="text-muted small">
                            Total Item
                        </span>
                        <span class="pull-right"><?=format_angka($total->item)?></span>
                    </a>
                    <a href="#" class="list-group-item">
                        <span class="text-muted small">
                            Total Qty
                        </span>
                        <span class="pull-right"><?=format_angka($total->qty)?></span>
                    </a>
                    <a href="#" class="list-group-item">
                        <span class="text-muted small">
                            Total Omset
                        </span>
                        <span class="pull-right">Rp. <?=format_angka($total->omset)?></span>
                    </a>
                    <a href="#" class="list-group-item">
                        <span class="text-muted small">
                            Total modal
                        </span>
                        <span class="pull-right">Rp. <?=format_angka($total->modal)?></span>
                    </a>
                    <a href="#" class="list-group-item">
                        <span class="text-muted small">
                            Total Profit
                        </span>
                        <span class="pull-right">Rp. <?=format_angka($total->profit)?></span>
                    </a>
                </div><!--/.list-group-->
            </div>
        </div>        
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o"></i> Grafik Pendapatan
            </div>
            <div class="panel-body">
                <div class="box-body chart-responsive">
                    <div class="chart" id="revenue-chart" style="height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
endif;
?>
<hr>
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-book fa-fw"></i> Rekap Transaksi sebulan</div>
    <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-condensed table-hover" id="penjualan_table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Tanggal & Waktu</td>
                    <td>Jumlah Item</td>
                    <td>Qty</td>
                    <td>Kasir</td>
                    <td>Total Harga Jual (Rp)</td>
                    <td>Total Harga Beli (Rp)</td>
                    <td>Total Profit (Rp)</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($penjualans as $penjualan): ?>
                <tr>
                    <td><?=$penjualan->id?></td>
                    <td><?=$penjualan->waktu_transaksi?></td>
                    <td><span class="pull-right"><?=format_angka($penjualan->jumlah_item)?></span></td>
                    <td><span class="pull-right"><?=format_angka($penjualan->qty)?></span></td>
                    <td><?=$penjualan->kasir?></td>
                    <td><span class="pull-right"><?=format_angka($penjualan->t_harga_jual)?></span></td>
                    <td><span class="pull-right"><?=format_angka($penjualan->t_harga_beli)?></span></td>
                    <td><span class="pull-right"><?=format_angka($penjualan->profit)?></span></td>
                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>    
</div>
<div class="row">
    <div class="form-group col-md-3">
        <form method="GET" action="<?=site_url('Admin/penjualan_laporan_get_filter_month')?>">
            <label>Ubah Bulan</label>
            <select class="form-control" name="month" >
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>  
            <input type="text" name="year" class="form-control" placeholder="tahun">          
            <input type="submit" class="btn btn-default">
        </form>
    </div>    
</div>

<script>
    var data_grafik=0;

    $(document).ready(function() {
        $('#penjualan_table').DataTable({
            responsive: true
        });
        
        $.get("<?=site_url('Admin/chart_transaksi_omset_modal_permonth/'.$month.'/'.$year)?>", function(data_response){
            data_grafik=data_response;
            chart_function();
        });        
    });
    var chart_function=function(){
        var area = new Morris.Area({
            element: 'revenue-chart',
            resize: true,
            data: data_grafik,
            xkey: 'date',
            ykeys: ['profit','modal','omset'],
            labels: ['profit','modal','omset'],
            lineColors: ['red','#a0d0e0', '#3c8dbc'],
            hideHover: 'auto'
        });
        var line = new Morris.Line({
            element: 'line-transaksi-chart',
            resize: true,
            data: data_grafik,
            xkey: ['date'],
            ykeys: ["total_transaksi"],
            labels: ['total transaksi'],
            lineColors: ['#3c8dbc'],
            hideHover: 'auto'
        });
    }

</script>