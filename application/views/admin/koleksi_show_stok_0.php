<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div>
    <table class="table table-bordered table-striped table-condensed">
        <thead>
            <tr>
                <td></td>
                <td>Kode Invoice</td>
                <td>Nama</td>
                <td>Kode</td>
                <td>Harga Jual</td>
                <td>Harga Beli</td>
                <td>Stok</td>
                <td>Diskon</td>
                <td>Keterangan</td>
                <td>Tanggal Masuk</td>
            </tr>
        </thead>
        <tbody>
            <?=form_open('Admin/koleksi_delete_multiple')?>
            <?php foreach ($koleksis as $koleksi):?>
            <tr>
                <td><input type="checkbox" name="koleksi_delete_check[]" value="<?=$koleksi->id?>"></td>
                <td><?=$koleksi->kode_invoice?></td>
                <td><?=$koleksi->name?></td>
                <td><small><?=$koleksi->kode_koleksi?></small></td>
                <td><span class="pull-right"><?=$koleksi->harga_jual?></span></td>
                <td><span class="pull-right"><?=$koleksi->harga_beli?></span></td>
                <td><span class="pull-right"><?=$koleksi->stok?></span></td>
                <td><?=$koleksi->diskon?></td>
                <td><small><?=$koleksi->keterangan?></small></td>
                <td><small><?=$koleksi->created_at?></small></td>
            </tr>            
            <?php endforeach;?>
            <tr>
                <td colspan="10">
                    With selected:
                    <button type="submit"><i class="fa fa-times"></i>Hapus</button>
                </td>
            </tr>
            <?=form_close()?>
        </tbody>
    </table>
</div>