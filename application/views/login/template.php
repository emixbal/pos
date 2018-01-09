<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?=$title?></title>
        
        <!-- Bootstrap Core CSS -->
        <link href="<?=base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?=base_url('assets/vendor/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
        
    </head>
    <body>
        <?php
        // put your code here
        $this->load->view($main_view);
        ?>
        
        <!-- jQuery -->
        <script src="<?=base_url('assets/vendor/jquery/jquery.min.js')?>"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>        
    </body>
</html>
