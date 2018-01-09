<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Custom Theme JavaScript -->
<script src="<?=base_url('assets/dist/js/pos_lib.js')?>"></script>

<div class="row">
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                Form Belanja
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="">ID Item</label>
                            <input type="text" id="kode_koleksi" name="" class="form-control">
                        </div>
                        <button class="btn btn-primary pull-right" id="cari_nama_barang_btn">Cari Nama Barang</button>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <h4 id="koleksi_name"></h4>
                <h2 id="harga_jual"></h2>
                <h1 id="harga_total"></h1>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-8">
                        <p>Grand Total:</p>
                        <h2><b>Rp</b> <b id="grand_total">0</b></h2>
                    </div>                    
                    <div class="col-md-4" id="btn_process">
                        <button class="btn btn-lg btn-block btn-primary" id="proses_btn">Proses</button>
                    </div>                    
                </div>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Nama Item
                            </th>
                            <th>
                                Harga X Qty
                            </th>
                            <th>
                                Total
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="koleksi_transaksi_table">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- modal_bayar Mulai -->
<div class="modal fade" id="modal_bayar" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">x</button>
            </div>
            <div class="modal-body">
                <label>Nominal Uang Bayar</label>
                <div class="form-group input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control" name="uang_bayar" id="uang_bayar">
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-danger " data-dismiss="modal">Batal</button>
                <button class="btn btn-primary " id="bayar_btn">Bayar</button>
            </div>
        </div>
    </div>
</div>
<!-- modal_bayar Selesai -->

<!-- modal_cari_barang Mulai -->
<div class="modal fade" id="modal_cari_barang" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">x</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" name="cari_nama_barang" id="cari_nama_barang">
                </div>
                <table class="table table-margered">
                    <thead>
                        <tr>
                            <th>Nama Koleksi</th>
                            <th>Kode</th>
                            <th>Harga Jual</th>
                            <th>stok</th>
                        </tr>
                    </thead>
                    <tbody id="table_cari_barang"></tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button class="btn btn-danger " data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- modal_cari_barang Selesai -->
<!-- modal_edit_qty Mulai -->
<div class="modal fade" id="modal_edit_qty" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <label>Detail Item</label>
                <button type="button" class="close" data-dismiss="modal">x</button>
            </div>
            <div class="modal-body">
                <input type="text" name="qty_update_kt_id" id="qty_update_kt_id" hidden="">
                <input type="text" name="koleksi_id" id="koleksi_id" hidden="">
                <input type="text" name="transaksi_penjualan_id" id="transaksi_penjualan_id" hidden="">
                <p id="nama_item"></p>
                <p id="harga_item"></p>
                <label>Qty</label>
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" name="qty_update" id="qty_update" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-danger" id="koleksi_transaksi_delete_btn">Delete</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default " data-dismiss="modal">Batal</button>
                <button class="btn btn-warning " id="qty_update_process_btn">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- modal_edit_qty Selesai -->
<script type="text/javascript" >
    var harga=1000;
    harga=parseInt(harga);
    harga=harga.toLocaleString('id')

    parseInt(harga).toLocaleString('id');
    $(document).ready(function(){
        var uniq=0;
        $('#kode_koleksi').focus();

        $("#cari_nama_barang_btn").click(function(){
            $("#modal_cari_barang").modal('show');
        });

        $("#cari_nama_barang").keyup(function(){
            var koleksi_key = $("#cari_nama_barang").val();
            $.post("<?=site_url('Kasir/cari_koleksi')?>", {'koleksi_key':koleksi_key}, function(response){
                var table_cari_barang_str='';
                for(var i=0; i<response.length; i++){
                    table_cari_barang_str+="\
                    <tr style='cursor:pointer' id='"+JSON.stringify(response[i])+"' class='barang_pilih'>\
                        <td>"+response[i]['name']+"</td>\
                        <td>"+response[i]['kode_koleksi']+"</td>\
                        <td><span class='pull-right'>"+parseInt(response[i]['harga_jual']).toLocaleString('id')+"</span></td>\
                        <td>"+response[i]['stok']+"</td>\
                    </tr>";
                }
                $("#table_cari_barang").html(table_cari_barang_str);
            });
        });

        $('body').on('click', '.barang_pilih', function(e){
            var koleksi = JSON.parse(this.id);
            transaksi_penjualan_add(e);
            var data = {
                'koleksi_id':koleksi['id'],
                'uniq':uniq,
                'koleksi_name':koleksi['name'],
                'harga_beli':koleksi['harga_beli'],
                'harga_jual':koleksi['harga_jual'],
            }

            koleksi_transaksi_add(e, data);
            
            table_cari_brg_string='';
            $("#table_cari_barang").html(table_cari_brg_string);
            $("#modal_cari_barang").modal('hide');
            $("#cari_nama_barang").val('');
        });
        $('#kode_koleksi').keyup(function(e){
            e.preventDefault();
            e.stopPropagation();

            transaksi_penjualan_add(e);

            var kode_koleksi = $('#kode_koleksi').val();
            var url = '<?=site_url('Kasir/koleksi_get_detail')?>';
            $.post(url, {'kode_koleksi':kode_koleksi}, function(response){
                if(response){
                    var harga_jual = parseInt(response['harga_jual']).toLocaleString('id');
                    $('#koleksi_name').html(response['name']);
                    $('#harga_jual').html("Rp. "+harga_jual);

                    var data = {
                        'koleksi_id':response['id'],
                        'uniq':uniq,
                        'koleksi_name':response['name'],
                        'harga_beli':response['harga_beli'],
                        'harga_jual':response['harga_jual'],
                    }
                    koleksi_transaksi_add(e, data);
                }
                $('#kode_koleksi').val('');
            });            
        });
        var transaksi_penjualan_add = function(e){
            e.preventDefault();
            e.stopPropagation();
            var now = new Date();
            var random = parseInt(Math.random()*10000);
            if(uniq==0){
               uniq=now.getDate()+""+now.getMonth()+""+now.getYear()+""+now.getHours()+""+now.getMinutes()+""+now.getSeconds()+"_"+random;
                user_id = <?=$this->ion_auth->user()->row()->id?>;
                $.post('<?=site_url('Kasir/transaksi_penjualan_add')?>',{'uniq':uniq,'user_id':user_id});
            }
        }
        var koleksi_transaksi_add = function(e, data){
            $.post('<?=site_url('Kasir/koleksi_transaksi_add')?>',data, function(response){
                if(response){
                    koleksi_transaksi_as_table(response);
                }
            });            
        }
        var t_harga_jual=0;
        var t_harga_beli=0;
        var table_cari_brg_string='';
        function koleksi_transaksi_as_table(transaksi_penjualan_id){
            var url = "<?=site_url('Kasir/koleksi_transaksi_get_filter/')?>"+transaksi_penjualan_id;
            $.get(url, function(data){
                t_harga_jual=0;
                t_harga_beli=0;

                table_cari_brg_string='';
                for (i=0; i<data.length; i++) {
                    table_cari_brg_string+="<tr>\
                    <td>"+data[i]['name']+"</td>\
                    <td>"+parseInt(data[i]['harga_jual']).toLocaleString('id')+" X "+data[i]['qty']+"</td>\
                    <td><p class='pull-right'>"+parseInt(data[i]['harga_jual']*data[i]['qty']).toLocaleString('id')+"</p></td>\
                    <td><p class='qty_update_btn' id='"+JSON.stringify(data[i])+"' style='cursor:pointer' ><i class='fa fa-gear'></i></p></td>\
                    </tr>";
                    harga_jual=data[i]['harga_jual']*data[i]['qty'];
                    harga_beli=data[i]['harga_beli']*data[i]['qty'];
                    t_harga_jual+=harga_jual;
                    t_harga_beli+=harga_beli;
                }
                $("#grand_total").html(parseInt(t_harga_jual).toLocaleString('id'));
                $("#koleksi_transaksi_table").html(table_cari_brg_string);
            });
        }

        $('body').on('click', '.qty_update_btn', function(e){
            var koleksi = this.id;
            koleksi = JSON.parse(koleksi);

            $("#nama_item").html("Nama :<b>"+koleksi['name']+"<b>");
            $("#harga_item").html("Harga :<b>"+koleksi['harga_jual']+"<b>");
            $("#qty_update_kt_id").val(koleksi['id']);
            $("#koleksi_id").val(koleksi['koleksi_id']);
            $("#qty_update").val(koleksi['qty']);
            $('#modal_edit_qty').modal('show');
            $('#transaksi_penjualan_id').val(koleksi['transaksi_penjualan_id']);
        });

        $('body').on('click', '#qty_update_process_btn', function(e){
            e.preventDefault();
            e.stopPropagation();

            var koleksi_transaksi_id = $("#qty_update_kt_id").val();
            var new_qty = $("#qty_update").val();
            var koleksi_id = $("#koleksi_id").val();
            var transaksi_penjualan_id = $("#transaksi_penjualan_id").val();
            var data = {
                'koleksi_transaksi_id':koleksi_transaksi_id,
                'new_qty':new_qty,
                'koleksi_id':koleksi_id
            }
            $.post("<?=site_url('Kasir/transaksi_penjualan_qty_update')?>", data, function(){

                $("#qty_update").val('');
                $('#modal_edit_qty').modal('hide');
                koleksi_transaksi_as_table(transaksi_penjualan_id);
            });
        });

        $('body').on('click','#koleksi_transaksi_delete_btn', function(e){
            e.preventDefault();
            e.stopPropagation();

            var koleksi_transaksi_id = $("#qty_update_kt_id").val();
            var koleksi_id = $("#koleksi_id").val();
            var transaksi_penjualan_id = $("#transaksi_penjualan_id").val();
            var data = {
                'koleksi_transaksi_id':koleksi_transaksi_id,
                'new_qty':0,
                'koleksi_id':koleksi_id
            }
            $.post("<?=site_url('Kasir/transaksi_penjualan_qty_update')?>", data, function(){

                $("#qty_update").val('');
                $('#modal_edit_qty').modal('hide');
                koleksi_transaksi_as_table(transaksi_penjualan_id);
            });            
        });

        $('#proses_btn').click(function(e){
            $("#modal_bayar").modal('show');

        });

        $('body').on('click','#bayar_btn', function(e){
        	e.preventDefault();
            e.stopPropagation();
            
            $("#modal_bayar").modal('hide');
            var uang_bayar = $("#uang_bayar").val();

            var url='<?=site_url('Kasir/transaksi_penjualan_bayar')?>';
            data = {'uniq':uniq,'t_harga_beli':t_harga_beli,'t_harga_jual':t_harga_jual,'nominal_bayar':uang_bayar}
            $.post(url, data, function(){
                alert('Kembalian: '+(uang_bayar-t_harga_jual));
            });
        });
    });
    
</script>