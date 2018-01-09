<!-- DataTables CSS -->
<link href="<?=base_url('assets/vendor/datatables-plugins/dataTables.bootstrap.css')?>" rel="stylesheet"> 
<!-- DataTables JavaScript -->
<script src="<?=base_url('assets/vendor/datatables/js/jquery.dataTables.js')?>"></script>
<script src="<?=base_url('assets/vendor/datatables-plugins/dataTables.bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/vendor/datatables-responsive/dataTables.responsive.js')?>"></script>
<?php
$this->load->helper('konversi');
#############################################################################
?>
<div class="wrapper">
	<div class="row">
		<div class="col-lg-12">
			<div>
				<table width="100%" class="table table-striped table-bordered table-condensed table-hover" id="laporan_penjualan_table">
					<thead>
					    <tr>
					        <th>ID</th>
					        <th>Waktu Transaksi</th>
					        <th>Jumlah Item</th>
					        <th>Qty</th>
					        <th>Kasir</th>
					        <th>Total Harga</th>
					    </tr>
					</thead>
					<tbody>
						<?php foreach($transaksi_penjualans as $transaksi_penjualan): ?>
						<tr>
							<td><?=$transaksi_penjualan->id?></td>
							<td id="<?=$transaksi_penjualan->id?>" style="cursor: pointer;" onclick="show_detail(this.id)">
								<?=$transaksi_penjualan->waktu_transaksi?>
							</td>
							<td><span class="pull-right"><?=$transaksi_penjualan->jumlah_item?></span></td>
							<td><span class="pull-right"><?=$transaksi_penjualan->qty?></span></td>
							<td><?=$transaksi_penjualan->kasir?></td>
							<td><span class="pull-right"><?=format_angka($transaksi_penjualan->t_harga_jual)?></span></td>
						</tr>
						<?php endforeach; ?>							
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- Modal Mulai -->
<div class="modal fade" id="koleksi_detail_modal" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            	Detail Transaksi
                <button type="button" class="close" data-dismiss="modal">x</button>
            </div>
            <div class="modal-body">
                <table class="table">
                	<thead>
                		<tr>
                			<th>Nama Barang</th>
                			<th>Kode Barang</th>
                			<th>Harga Satuan</th>
                			<th>Qty</th>
                			<th>Harga Total</th>
                		</tr>
                	</thead>
                	<tbody id="koleksi_detail_table"></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-sm btn-danger " data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Selesai -->
<script>
    var show_detail = function(id){
    	var url = '<?=site_url('Kasir/transaksi_penjualan_detail/')?>'+id;
		$(document).ready(function(){
			$.get(url, function(data){
				if(data){
					var koleksi_detail_str='';
					for (var i = 0; i < data.length; i++) {
						koleksi_detail_str+="<tr>\n\
						<td>"+data[i]['koleksi_name']+"</td>\n\
						<td>"+data[i]['kode_koleksi']+"</td>\n\
						<td>"+data[i]['harga_jual']+"</td>\n\
						<td>"+data[i]['qty']+"</td>\n\
						<td>"+(data[i]['harga_jual']*data[i]['qty'])+"</td>\n\
						";
					}
					$("#koleksi_detail_table").html(koleksi_detail_str);
					$("#koleksi_detail_modal").modal('show');
				}
			});
			
		});
	}
</script>