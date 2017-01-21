<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="<?=base_url('index.php/MainPlesir/dashboard')?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>       
			<li class="header">PENGELOLAAN DATA</li>			
            <li>
                <a href="<?=base_url('index.php/MainPlesir/admin')?>">
                    <i class="fa fa-pie-chart"></i>
                    <span>Data Admin</span>
                </a>
            </li>            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Data Wisata</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=base_url('index.php/MainPlesir/jenis_wisata')?>"><i class="fa fa-circle-o"></i> Jenis Wisata</a></li>
                    <li><a href="<?=base_url('index.php/MainPlesir/tambah_wisata')?>"><i class="fa fa-circle-o"></i> Wisata</a></li>
                    <li><a href="<?=base_url('index.php/MainPlesir/tambah_foto_wisata')?>"><i class="fa fa-circle-o"></i> Foto Wisata</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">