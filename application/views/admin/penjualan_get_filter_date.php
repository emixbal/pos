<!-- DataTables CSS -->
<link href="<?=base_url('assets/vendor/datatables-plugins/dataTables.bootstrap.css')?>" rel="stylesheet"> 

<!-- DataTables JavaScript -->
<script src="<?=base_url('assets/vendor/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('assets/vendor/datatables-plugins/dataTables.bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/vendor/datatables-responsive/dataTables.responsive.js')?>"></script>
<?php
$date= explode('-', $date);
?>
<h4>Laporan tanggal <?php echo date ("d F Y", mktime (0,0,0,$date[1],$date[2],$date[0])); ?></h4>
<?php
if($total->transaksi>0):
?>
<hr>
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3><?=format_angka($total->transaksi)?></h3>
                <p>Total Transaksi</p>
            </div>
        </div>        
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3><?=format_angka($total->item)?></h3>
                <p>Total Item</p>
            </div>
        </div>        
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3><?=format_angka($total->qty)?></h3>
                <p>Total Quantitas</p>
            </div>
        </div>        
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Rp. <?=format_angka($total->omset)?></h3>
                <p>Total Omset</p>
            </div>
        </div>        
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Rp. <?=format_angka($total->modal)?></h3>
                <p>Total Modal</p>
            </div>
        </div>        
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Rp. <?=format_angka($total->profit)?></h3>
                <p>Total Profit</p>
            </div>
        </div>        
    </div>
</div>
<?php
endif;
?>
<div>
	<table width="100%" class="table table-striped table-bordered table-condensed table-hover" id="penjualan_table">
        <thead>
            <tr>
                <td>ID</td>
                <td>Waktu</td>
                <td>Jumlah Item</td>
                <td>Qty</td>
                <td>Kasir</td>
                <td>Total Harga Jual (Rp)</td>
                <td>Total Harga Beli (Rp)</td>
                <td>Total Profit (Rp)</td>
            </tr>
        </thead>
        <tbody>
        	<?php
            foreach ($penjualans as $penjualan):
            ?>
        	<tr>
        		<td><?=$penjualan->id?></td>
        		<td><?=$penjualan->waktu_transaksi?></td>
        		<td><?=$penjualan->jumlah_item?></td>
        		<td><?=$penjualan->qty?></td>
        		<td><?=$penjualan->kasir?></td>
        		<td><span class="pull-right"><?=format_angka($penjualan->t_harga_jual)?></span></td>
        		<td><span class="pull-right"><?=format_angka($penjualan->t_harga_beli)?></span></td>
        		<td><span class="pull-right"><?=format_angka($penjualan->profit)?></span></td>
        	</tr>
        	<?php endforeach; ?>
        </tbody>

	</table>
</div>
<div class="row">
    <div class="form-group col-md-3">
        <form method="GET" action="<?=site_url('Admin/penjualan_laporan_get_filter_date')?>">
            <label>Ubah Tanggal</label>
            <input type="text" name="date" class="form-control">
            <input type="submit" class="btn btn-default">
        </form>
    </div>    
</div>
<script>
    $(document).ready(function() {
        $('#penjualan_table').DataTable({
            responsive: true
        });
    });
</script>