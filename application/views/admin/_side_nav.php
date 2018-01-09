<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="<?=site_url('Admin')?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> Pengguna<span class="fa arrow"></span></a>
                 <ul class="nav nav-second-level">
                    <li>
                        <a href="<?=site_url('User')?>">Kelola Pengguna</a>
                    </li>
                    <li>
                        <a href="<?=site_url('User/user_add')?>">Tambah Pengguna</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart fa-fw"></i> Laporan Penjualan<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?=site_url('Admin/penjualan_laporan_get_filter_date/'.date('Y-m-d'))?>">Laporan Harian</a>
                    </li>
                    <li>
                        <a href="<?=site_url('Admin/penjualan_laporan_get_filter_month/'.date('m').'/'.date('Y'))?>">Laporan Bulanan</a>
                    </li>
                    <li>
                        <a href="<?=site_url('Admin/penjualan_laporan_get_filter_year/'.date('Y'))?>">Laporan Tahunan</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-book fa-fw"></i> Manajemen Koleksi<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?=site_url('Admin/koleksi_add')?>">Tambah Koleksi</a>
                    </li>
                    <li>
                        <a href="<?=site_url('Admin/koleksi_show')?>">Lihat Koleksi</a>
                    </li>
                    <li>
                        <a href="<?=site_url('Admin/koleksi_show_stok_0')?>">Lihat Koleksi kosong</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="<?=site_url('Kasir')?>">
                    <i class="fa fa-barcode fa-fw"></i> Kasir
                </a>
            </li>            
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->