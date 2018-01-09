<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
    <div class="col-md-4">
        <div name="koleksi_add_fm" id="koleksi_add_fm">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Kode Invoice</label>
                    <h4><text id="kode_invoice_label">0</text></h4>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-warning" id="ganti_invoice_btn">Ganti Invoice</button>
                </div>            
            </div>
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" id="nama_barang" class="form-control nama-barang" name="nama_barang">
            </div>
            <div class="form-group">
                <label>Kode Barang</label>
                <input type="text" id="kode_koleksi" class="form-control nama-barang" name="nama_barang">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Harga Beli</label>
                    <input type="text" id="harga_beli" class="form-control harga-beli" name="harga_beli">
                </div>
                <div class="form-group col-md-6">
                    <label>Harga Jual</label>
                    <input type="text" id="harga_jual" class="form-control harga-jual" name="harga_jual">
                </div>            
            </div>
            <div class="form-group">
                <label>Jumlah Stok</label>
                <input type="text" id="stok" class="form-control stok" name="stok">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control keterangan" id="keterangan" name="keterangan"></textarea>
            </div>
            <button type="reset" class="btn btn-primary pull-right" id="koleksi_add_btn">Simpan</button>
        </div>
    </div>
    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <td>Nama</td>
                    <td>Kode</td>
                    <td>Hb</td>
                    <td>Hj</td>
                    <td>Stok</td>
                    <td>Ket</td>
                </tr>
            </thead>
            <tbody id="koleksi_table"></tbody>
        </table>
    </div>
</div>
<!-- Modal Mulai -->
<div class="modal fade" id="ganti_invoice_modal" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">x</button>
            </div>
            <div class="modal-body">
                <label>Kode Invoice</label>
                <input type="text" class="form-control" name="kode_invoice" id="kode_invoice">
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-sm btn-danger " data-dismiss="modal">Batal</button>
                <a class="btn btn-sm btn-primary " id="invoice_add_btn">Tambahkan</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal Selesai -->
<script>
$(document).ready(function(){
    $("#ganti_invoice_btn").click(function(){
        $('#ganti_invoice_modal').modal('show');
    });
    
    var kode_invoice=0;
    $('#invoice_add_btn').click(function(){
        kode_invoice    = $('#kode_invoice').val();
        $('#kode_invoice_label').html(kode_invoice);
        $('#ganti_invoice_modal').modal('hide');
        $('#kode_invoice').val('');
    });
    $('#koleksi_add_btn').click(function(){
        nama_barang = $('#nama_barang').val();
        kode_koleksi = $('#kode_koleksi').val();
        harga_beli  = $('#harga_beli').val();
        harga_jual  = $('#harga_jual').val();
        stok        = $('#stok').val();
        keterangan  = $('#keterangan').val();
        
        $.post('<?=site_url('Admin/koleksi_add_do')?>',{
            'name':nama_barang,
            'kode_koleksi':kode_koleksi,
            'harga_beli':harga_beli,
            'harga_jual':harga_jual,
            'stok':stok,
            'kode_invoice':kode_invoice,
            'keterangan':keterangan
            },function(response){
                get_koleksi_as_table(response);
                
                $('#nama_barang').val('');
                $('#kode_koleksi').val('');
                $('#harga_beli').val('');
                $('#harga_jual').val('');
                $('#stok').val('');
                $('#keterangan').val('');
        });
    });
    
    var get_koleksi_as_table=function(data){
        var table_string='';
        for(var i=0; i < data.length; i++){
            table_string+='<tr>\n\
                <td>'+data[i]['name']+'</td>\n\
                <td>'+data[i]['kode_koleksi']+'</td>\n\
                <td>'+data[i]['harga_beli']+'</td>\n\
                <td>'+data[i]['harga_jual']+'</td>\n\
                <td>'+data[i]['stok']+'</td>\n\
                <td>'+data[i]['keterangan']+'</td>\n\
                </tr>';
        }
        $('#koleksi_table').html(table_string);
    }
});
</script>