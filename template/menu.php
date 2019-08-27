<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../images/picture-1-1505503146.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Admin</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="<?php if($_GET['page'] == 'home'){echo 'active'; } ?>"><a href="index.php?page=home"><i class="fa fa-home"></i> Beranda</a></li>
      <li class="<?php if($_GET['page'] == 't_produksi' || $_GET['page'] == 'd_produksi' || $_GET['page'] == 'd_mobil' || $_GET['page'] == 't_mobil'){echo 'active'; } ?> treeview">
        <a href="#">
          <i class="fa fa-table"></i> <span>Data - Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if($_GET['page'] == 'd_mobil' || $_GET['page'] == 't_mobil'){echo 'active'; } ?>"><a href="index.php?page=d_mobil"><i class="fa fa-table"></i> Data Mobil</a></li>
          <li class="<?php if($_GET['page'] == 'd_produksi' || $_GET['page'] == 't_produksi'){echo 'active'; } ?>"><a href="index.php?page=d_produksi"><i class="fa fa-table"></i> Data Penjualan</a></li>
        </ul>
      </li>
      <li class="treeview <?php if($_GET['page'] == 'sma' || $_GET['page'] == 'ls'){echo 'active';} ?>">
        <a href="#">
          <i class="fa fa-pie-chart"></i> <span>Prediksi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php if($_GET['page'] == 'sma'){echo 'active';} ?>"><a href="index.php?page=sma"><i class="fa fa-laptop"></i> Metode SMA</a></li>
          <li class="<?php if($_GET['page'] == 'ls'){echo 'active';} ?>"><a href="index.php?page=ls"><i class="fa fa-laptop"></i> Metode Least Square</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>