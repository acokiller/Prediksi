<!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Beranda
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <?php $sql1 = mysql_query("SELECT COUNT(id_mobil) as jml from tbl_mobil");
                $home = mysql_fetch_assoc($sql1); ?>
                <h3><?php echo $home['jml']; ?></h3>

                <p>Data Mobil</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="index.php?page=d_mobil" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
               <?php $sql1 = mysql_query("SELECT COUNT(id_produksi) as jml from tbl_produksi");
                $home = mysql_fetch_assoc($sql1); ?>
                <h3><?php echo $home['jml']; ?></h3>

                <p>Data Penjualan</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="index.php?page=d_produksi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Blank Box</h3>
              </div>
              <div class="box-body">
                The great content goes here
              </div>
              <!-- /.box-body -->
            </div>
          </section>
        </div>
      </section>