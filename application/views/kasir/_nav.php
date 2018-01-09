<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?=site_url('Kasir')?>"><?=$title?></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="<?=site_url('Kasir/chart_add')?>">Mesin Kasir</a></li>
                        <li><a href="<?=site_url('Kasir/penjualan_get')?>">Penjualan</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?=site_url('Login/logout')?>">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" id="cari_koleksi">
                        </div >
                    </div>
                    <?php if ($this->ion_auth->is_admin()): ?>
                    <ul class="nav navbar-nav pull-right">
                        <li class=""><a href="<?=site_url('Admin')?>">Admin</a></li>
                    </ul>
                <?php endif; ?>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

<!-- modal_cari_koleksi Mulai -->
<div class="modal fade" id="modal_cari_koleksi" role="dialog">
    <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">x</button>
            </div>
            <div class="modal-body">
                <label>Nama Koleksi</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="cari_koleksi_text">
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Koleksi</th>
                            <th>Harga</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody id="table_cari_koleksi"></tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button class="btn btn-danger " data-dismiss="modal">Batal</button>
                <button class="btn btn-primary " id="bayar_btn">Bayar</button>
            </div>
        </div>
    </div>
</div>
<!-- modal_bayar Selesai -->
<script type="text/javascript">
$(document).ready(function(){
    $("body").on("click", "#cari_koleksi", function(e){
        $("#modal_cari_koleksi").modal('show');
    });
    $("body").on("keyup", "#cari_koleksi_text", function(e){
        var koleksi_key = $("#cari_koleksi_text").val();
        $.post('<?=site_url('Kasir/cari_koleksi')?>',{'koleksi_key':koleksi_key},function(data){
            if(data){
                var table_cari_koleksi_str ='';
                //foreach(i=0; i<data.length; i++){}
                for (var i = data.length - 1; i >= 0; i--) {
        table_cari_koleksi_str+="<tr><td>"+data[i]['name']+"</td><td>"+data[i]['harga_jual']+"</td><td>"+data[i]['stok']+"</td></tr>";
                }
    //table_cari_koleksi_str+="<tr><td>"+data[i]['name']+"</td><td>"+data[i]['harga_jual']+"</td><td>"+data[i]['stok']+"</td></tr>";
                
                $("#table_cari_koleksi").html(table_cari_koleksi_str);
            }
        });
    });
});
</script>        