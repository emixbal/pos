<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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

    <!-- MetisMenu CSS -->
    <link href="<?=base_url('assets/vendor/metisMenu/metisMenu.min.css')?>" rel="stylesheet">   

    <!-- Select2 -->
    <link href="<?=base_url('assets/vendor/select2/css/select2.min.css')?>" rel="stylesheet">    


    <!-- Custom CSS -->
    <link href="<?=base_url('assets/dist/css/sb-admin-2.css')?>" rel="stylesheet">

    <!-- jQuery -->
    <script src="<?=base_url('assets/vendor/jquery/jquery.min.js')?>"></script>

    <!-- Select2 -->
    <script src="<?=base_url('assets/vendor/select2/js/select2.min.js')?>"></script>    

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>     

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url('assets/vendor/metisMenu/metisMenu.min.js')?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url('assets/dist/js/sb-admin-2.js')?>"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php $this->load->view('admin/_top_nav'); ?>
            <?php $this->load->view('admin/_side_nav'); ?>
        </nav>

        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header"><?=$title?></h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                
                <div class="col-sm-12 col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php $this->load->view($main_view); ?>             
                        </div>
                    </div>   
                </div>                
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>

</html>
