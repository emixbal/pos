<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$title?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?=base_url('assets/vendor/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
    <!-- Select2 -->
    <link href="<?=base_url('assets/vendor/select2/css/select2.min.css')?>" rel="stylesheet">    
    <!-- jQuery -->
    <script src="<?=base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
    <!-- Select2 -->
    <script src="<?=base_url('assets/vendor/select2/js/select2.min.js')?>"></script>    
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
</head>
<body>
    <div class="container">
        <?php $this->load->view('kasir/_nav');?>
        <div class="wrapper">
            <?php $this->load->view($main_view);?>
        </div>
    </div>
</body>
</html>
