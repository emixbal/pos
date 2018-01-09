<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-lg-6 col-lg-offset-3">
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-barcode fa-5x"></i>
                    <h4 class="pull-right">Aplikasi Kasir</h4>
                </div>
                <a href="<?=  site_url('Kasir/chart_add')?>">
                    <div class="panel-body">
                        Buka Aplikasi Kasir <i class="fa fa-arrow-circle-right pull-right"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-book fa-5x"></i>
                    <h4 class="pull-right">Laporan</h4>
                </div>
                <a href="<?=site_url('Kasir/penjualan_get')?>">
                    <div class="panel-body">
                        Buka Laporan Penjualan <i class="fa fa-arrow-circle-right pull-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>