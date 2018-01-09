<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- DataTables CSS -->
<link href="<?=base_url('assets/vendor/datatables-plugins/dataTables.bootstrap.css')?>" rel="stylesheet"> 

<!-- DataTables JavaScript -->
<script src="<?=base_url('assets/vendor/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('assets/vendor/datatables-plugins/dataTables.bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/vendor/datatables-responsive/dataTables.responsive.js')?>"></script>

<div>
    <table width="100%" class="table table-striped table-bordered table-hover" id="koleksi_table">
        <thead>
            <tr>
                <td>Kode Invoice</td>
                <td>Nama</td>
                <td>Kode</td>
                <td>Harga Jual</td>
                <td>Harga Beli</td>
                <td>Stok</td>
                <td>Diskon</td>
                <td>Keterangan</td>
                <td>Tanggal Masuk</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($koleksis as $koleksi):?>
            <tr>
                <td><?=$koleksi->kode_invoice?></td>
                <td><?=$koleksi->name?></td>
                <td><small><?=$koleksi->kode_koleksi?></small></td>
                <td><span class="pull-right"><?=$koleksi->harga_jual?></span></td>
                <td><span class="pull-right"><?=$koleksi->harga_beli?></span></td>
                <td><span class="pull-right"><?=$koleksi->stok?></span></td>
                <td><?=$koleksi->diskon?></td>
                <td><small><?=$koleksi->keterangan?></small></td>
                <td><small><?=$koleksi->created_at?></small></td>
                <td><i class="fa fa-gear koleksi_edit_btn" id="<?=$koleksi->id?>" style="cursor: pointer;"></i></td>
            </tr>            
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<!-- Modal Mulai -->
<div class="modal fade" id="koleksi_edit_modal" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <?=form_open('Admin/koleksi_update')?>
            <div class="modal-header">
                <strong>Edit Koleksi</strong>
                <button type="button" class="close" data-dismiss="modal">x</button>
            </div>
            <div class="modal-body">
                <input type="text" name="koleksi_id" id="koleksi_id" hidden>
                <div class="form-group">
                    <label>Nama Koleksi</label>
                    <input type="text" name="nama_koleksi" id="nama_koleksi" class="form-control">
                </div>
                <div class="form-group">
                    <label>Kode Koleksi</label>
                    <input type="text" name="kode_koleksi" id="kode_koleksi" class="form-control">
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Harga Beli</label>
                        <input type="text" name="harga_beli" id="harga_beli" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Harga Jual</label>
                        <input type="text" name="harga_jual" id="harga_jual" class="form-control">
                    </div>                    
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="text" name="stok" id="stok" class="form-control">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default " data-dismiss="modal">Batal</button>
                <input type="submit" class="btn btn-sm btn-warning" value="Simpan">
            </div>
        <?=form_close()?>            
        </div>
    </div>
</div>
<!-- Modal Selesai -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.koleksi_edit_btn').click(function(){
            var koleksi_id  = this.id
            var url = "<?=site_url('Admin/koleksi_detail/')?>"+koleksi_id
            $.get(url, function(response) {
                $('#koleksi_id').val(response['id']);
                $('#nama_koleksi').val(response['name']);
                $('#kode_koleksi').val(response['kode_koleksi']);
                $('#harga_jual').val(response['harga_jual']);
                $('#harga_beli').val(response['harga_beli']);
                $('#stok').val(response['stok']);
                $('#keterangan').val(response['keterangan']);
                $('#koleksi_edit_modal').modal('show');
            });
        });
    });    
</script>
<script>
    $(document).ready(function() {
        $('#koleksi_table').DataTable({
            responsive: true
        });
    });
</script>