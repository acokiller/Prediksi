<?php 
if (!isset($_POST['proses'])) {
 ?>
 <section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Proses Prediksi Simple Moving Average</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="row">
          <div class="col-md-6">
            <form role="form" action="index.php?page=sma" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label>Pilih Periode</label>
                  <select class="form-control" name="periode">
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Pilih Mobil</label>
                  <select class="form-control" name="nama_mobil">
                    <?php 
                    $mob = mysql_query("SELECT * from tbl_mobil");
                    while ($m = mysql_fetch_assoc($mob)) {
                     ?>
                     <option value="<?php echo $m['nama_mobil']; ?>"><?php echo $m['nama_mobil']; ?></option>
                   <?php } ?>
                 </select>
               </div>
               <div class="form-group">
                <label>Pilih Tahun</label>
                <select name="tahun" class="form-control">
                  <?php
                  $thn_skr = date('Y');
                  for ($x = $thn_skr; $x >= 2000; $x--) {
                    ?>
                    <option value="<?php echo $x ?>"><?php echo $x ?></option>
                    <?php
                  }
                  ?>
                </select>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" name="proses" class="btn btn-warning"><i class="fa fa-search"></i> Proses</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</section>
<?php }else{ 
  $periode = $_POST['periode'] + 1;
  $nama_mobil = $_POST['nama_mobil'];
  $tahun = $_POST['tahun'];
  ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Penjualan Mobil <?php echo $nama_mobil; ?></h3>
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
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                $sql = mysql_query("SELECT * from tbl_produksi where nama_mobil = '$nama_mobil' order by tahun asc");
                while ($data = mysql_fetch_array($sql)) {
                  mysql_query("TRUNCATE tbl_sma");
                  ?>
                  <tr>
                   <td><?php echo $no++; ?></td>
                   <td><?php echo $data['tahun']; ?></td>
                   <td><?php echo $data['nama_mobil']; ?></td>
                   <td><?php echo $data['j_produksi']; ?> Unit</td>
                 </tr>
               <?php } ?>
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
 <!-- /.content -->
 <!-- Main content -->
 <section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Hasil Prediksi Tahun <?php echo $tahun; ?></h3>
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
                <th>Hasil Prediksi</th>
                <th>Hasil Mape</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              $sql = mysql_query("SELECT * from tbl_produksi where nama_mobil = '$nama_mobil' and tahun = '$tahun'");
              $j = mysql_num_rows($sql);
              $sma1 = mysql_query("SELECT sum(j_produksi) as jumlah_tr, nama_mobil, tahun from tbl_produksi where nama_mobil = '$nama_mobil' and tahun between '$tahun'-'$periode' and '$tahun'-1");
              $h_sma = mysql_fetch_assoc($sma1);
              $r_sma = $h_sma['jumlah_tr'] / ($periode - 1);
              //echo $r_sma;  
              
              $data = mysql_fetch_array($sql);
              $j_produksi = $data['j_produksi'];

              mysql_query("INSERT into tbl_sma values('', '$nama_mobil', '$j_produksi', '$tahun','$r_sma')");
              $hasil = mysql_query("SELECT * from tbl_sma");
              while ($data_hasil = mysql_fetch_assoc($hasil)) {
                $hasil_sma = $data_hasil['hasil_sma'];
                $j_produksi = $data_hasil['j_produksi'];
                $n_error = $j_produksi - $hasil_sma;
               // echo abs($n_error);
                @$mape = (abs($n_error)/$j_produksi) * 100;
                ?>
                <tr>
                 <td><?php echo $no++; ?></td>
                 <td><?php echo $data_hasil['tahun']; ?></td>
                 <td><?php echo $data_hasil['nama_mobil']; ?></td>
                 <td><?php if ($data_hasil['j_produksi'] == 0) {
                   echo '-';
                 }else{
                  echo $data_hasil['j_produksi']." Unit";
                }
                ?></td>
                 <td><?php if ($data_hasil['hasil_sma'] == 0) {
                   echo '-';
                 }else{
                  echo $data_hasil['hasil_sma']." Unit";
                }
                ?></td>
                <td><?php echo round($mape,2); ?>%</td>
              </tr>
            <?php } ?>
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
<!-- /.content -->
<?php } ?>