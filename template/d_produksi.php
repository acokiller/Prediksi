<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Penjualan
    <small>Penjualan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Data - Data</a></li>
    <li class="active">Data Penjualan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Penjualan</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>Nama Mobil</th>
                <th>Jumlah Penjualan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              $sql = mysql_query("SELECT * from tbl_produksi order by tahun asc");
              while ($data = mysql_fetch_array($sql)) {
               ?>
               <tr>
                 <td><?php echo $no++; ?></td>
                 <td><?php echo $data['tahun']; ?></td>
                 <td><?php echo $data['nama_mobil']; ?></td>
                 <td><?php echo $data['j_produksi']; ?> Unit</td>
                 <td>
                   <a href="index.php?page=e_produksi&id_produksi=<?php echo $data['id_produksi']; ?>"><button class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</button></a>
                   <a href=""><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button></a>
                 </td>
               </tr>
             <?php } ?>
            </tbody>
          </table>
          <a href="index.php?page=t_produksi"><button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button></a>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
    <!-- /.content -->
    <section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Total Penjualan Tiap Tahun</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>Total Penjualan</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              $sql1 = mysql_query("SELECT * from tbl_tahun");
              while ($as = mysql_fetch_array($sql1)) {
                
              $tahun = $as['tahun'];
              $sql = mysql_query("SELECT sum(j_produksi) as total, tahun, nama_mobil from tbl_produksi where tahun = '$tahun'");
              while ($data = mysql_fetch_array($sql)) {
               ?>
               <tr>
                 <td><?php echo $no++; ?></td>
                 <td><?php echo $data['tahun']; ?></td>
                 <td><?php echo $data['total']; ?> Unit</td>
               </tr>
              
             <?php }} ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>