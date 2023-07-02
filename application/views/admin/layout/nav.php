 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <!-- Dasbor -->
        <li><a href="<?= base_url('admin/dasbor') ?>"><i class="fa fa-dashboard"></i> <span> Dasbor</span></a></li>

         <!-- Menu Beita -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-align-center"></i> <span>Tema</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/tema') ?>"><i class="fa fa-table"></i> Data Tema</a></li>
          </ul>
        </li>

         <!-- Menu Layanan -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-music"></i> <span>Musik</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/musik') ?>"><i class="fa fa-table"></i> Data Musik</a></li>
          </ul>
        </li>

        <!-- Menu Layanan -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-map-marker"></i> <span>Venue</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/tempat') ?>"><i class="fa fa-table"></i> Data Venue</a></li>
          </ul>
        </li>

        <!-- Menu Layanan -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cutlery"></i> <span>Catering</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/catering') ?>"><i class="fa fa-table"></i> Data Catering</a></li>
          </ul>
        </li>

        <!-- Menu Layanan -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-image"></i> <span>Photoshop</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/photo') ?>"><i class="fa fa-table"></i> Data Photoshop</a></li>
          </ul>
        </li>

        <!-- Menu Layanan -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-male"></i> <span>Kostum</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/kostum') ?>"><i class="fa fa-table"></i> Data Kostum</a></li>
          </ul>
        </li>

        <!-- Menu Layanan -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gift"></i> <span>Paket</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/paket') ?>"><i class="fa fa-table"></i> Data Paket</a></li>
          </ul>
        </li>

         <!-- Menu Layanan -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/transaksi') ?>"><i class="fa fa-table"></i> Data Transaksi</a></li>
          </ul>
        </li>

        <!-- Menu Konfigurasi -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i> <span>Konfigurasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/konfigurasi') ?>"><i class="fa fa-table"></i> Konfigurasi Umum</a></li>
            <li><a href="<?= base_url('admin/konfigurasi/logo') ?>"><i class="fa fa-image"></i> Konfigurasi Logo</a></li>
             <li><a href="<?= base_url('admin/konfigurasi/icon') ?>"><i class="fa fa-plus"></i> Konfigurasi Icon</a></li>
          </ul>
        </li>

        <!-- Menu User -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-lock"></i> <span>User Administrator</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/user') ?>"><i class="fa fa-table"></i> Data User Administrator</a></li>
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?= $title ?></h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('admin/dasbor') ?>"><i class="fa fa-dashboard"></i> Dasbor</a></li>
        <li><a href="<?= base_url('admin/'.$this->uri->segment(2)) ?>">
        	<?= ucfirst(str_replace('_', ' ', $this->uri->segment(2))) ?>
        </a></li>
        <li class="active"><?= $title ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?= $title ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">