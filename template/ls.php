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
          <h3 class="box-title">Proses Prediksi Least Square</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="row">
          <div class="col-md-6">
            <form role="form" action="index.php?page=ls" method="post">
              <div class="box-body">
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
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </section>
<?php }else{ 
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
                mysql_query("TRUNCATE tbl_ls");
                mysql_query("TRUNCATE tbl_hasil_ls");
                $no = 1;
                $sql = mysql_query("SELECT * from tbl_produksi where nama_mobil = '$nama_mobil' order by tahun asc");
                $jml_data = mysql_num_rows($sql);
                //echo $jml_data;
                if ($no) {
                  for($i=1;$i<=100;$i++){
                        $ss = 'Ganjil';
                        $nilai_x_awal = $jml_data - 1;
                        $nilai_x = $nilai_x_awal / 2;
                        $a = -$nilai_x;
                      //for ($a=-$nilai_x; $a <= $nilai_x; $a++) { 
                        while ($data = mysql_fetch_array($sql)) {
                        //$nooo = $a++;
                          $j_produksi = $data['j_produksi'];
                          $mobil = $data['nama_mobil'];
                          $thn = $data['tahun'];
                          $nilai_xy = $a * $j_produksi;
                          $nilai_x2 = pow($a,2);
                          mysql_query("INSERT into tbl_ls values('', '$mobil', '$thn', '$j_produksi', '$a', '$nilai_xy', '$nilai_x2')");
                          ?>
                          <tr>
                           <td><?php echo $no++; ?></td>
                           <td><?php echo $data['tahun']; ?></td>
                           <td><?php echo $data['nama_mobil']; ?></td>
                           <td><?php echo $data['j_produksi']; ?> Unit</td>
                         </tr>
                         <?php 
                      //$nilai_xy;
                     // mysql_query("UPDATE tbl_ls set nilai_x = $a");
                         $a++;
                       }
                     }
                   
                 
               }else{
                for($i=1;$i<=100;$i+=2){
                    $ss = 'Genap';
                    $nilai_x_awal = $jml_data - 1;
                    $nilai_x = $nilai_x_awal / 2;
                    $a = -$nilai_x;
                      //for ($a=-$nilai_x; $a <= $nilai_x; $a++) { 
                    while ($data = mysql_fetch_array($sql)) {
                        //$nooo = $a++;
                      $j_produksi = $data['j_produksi'];
                      $mobil = $data['nama_mobil'];
                      $thn = $data['tahun'];
                      $nilai_xy = $a * $j_produksi;
                      $nilai_x2 = pow($a,2);
                      mysql_query("INSERT into tbl_ls values('', '$mobil', '$thn', '$j_produksi', '$a', '$nilai_xy', '$nilai_x2')");
                      ?>
                      <tr>
                       <td><?php echo $no++; ?></td>
                       <td><?php echo $data['tahun']; ?></td>
                       <td><?php echo $data['nama_mobil']; ?></td>
                       <td><?php echo $data['j_produksi']; ?> Unit</td>
                     </tr>
                     <?php 
                      //$nilai_xy;
                     // mysql_query("UPDATE tbl_ls set nilai_x = $a");
                     $a++;
                   }
                 }
               }
             
             ?>
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
<!-- /.content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data <?php echo $ss; ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>Nama Mobil</th>
                <th>Penjualan (Y)</th>
                <th>Nilai X</th>
                <th>Nilai X.Y</th>
                <th>Nilai X^2</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              $sql1 = mysql_query("SELECT * from tbl_ls");
              while ($as = mysql_fetch_array($sql1)) {
               ?>
               <tr>
                 <td><?php echo $no++; ?></td>
                 <td><?php echo $as['tahun']; ?></td>
                 <td><?php echo $as['nama_mobil']; ?></td>
                 <td><?php echo $as['j_produksi']; ?></td>
                 <td><?php echo $as['nilai_x']; ?></td>
                 <td><?php echo $as['nilai_xy']; ?></td>
                 <td><?php echo $as['nilai_x2']; ?></td>
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
              $sql = mysql_query("SELECT * from tbl_produksi where nama_mobil = '$nama_mobil'");
              $sql2 = mysql_query("SELECT * from tbl_produksi where nama_mobil = '$nama_mobil' and tahun = '$tahun'");
              $sql12 = mysql_query("SELECT * from tbl_ls where nilai_x = 0");
              $j = mysql_num_rows($sql);
              $ls1 = mysql_query("SELECT sum(j_produksi) as jumlah_p, nama_mobil, tahun, sum(nilai_x) as jumlah_x, sum(nilai_xy) as jumlah_xy, sum(nilai_x2) as jumlah_x2 from tbl_ls");
              $h_ls = mysql_fetch_assoc($ls1);
              $h_ls12 = mysql_fetch_assoc($sql12);
              $jml_p = $h_ls['jumlah_p'];
              $jml_x = $h_ls['jumlah_x'];
              $jml_xy = $h_ls['jumlah_xy'];
              $jml_x2 = $h_ls['jumlah_x2'];
              $nilai_x_prediksi = $h_ls12['id_ls'];
             // echo $jml_p.'-'.$jml_x.'-'.$jml_xy.'-'.$jml_x2.'<br>';
              //echo $r_sma;  
              $nilai_a = $jml_p / $j;
              $nilai_b = $jml_xy / $jml_x2;
              $nilai_y_prediksi = $nilai_a + $nilai_b * $nilai_x_prediksi;
             // echo $nilai_y_prediksi;
              $data = mysql_fetch_array($sql2);
              $j_produksi = $data['j_produksi'];

              mysql_query("INSERT into tbl_hasil_ls values('', '$nama_mobil', '$tahun', '$j_produksi','$nilai_y_prediksi')");
              $hasil = mysql_query("SELECT * from tbl_hasil_ls");
              while ($data_hasil = mysql_fetch_assoc($hasil)) {
                $hasil_ls = $data_hasil['hasil_ls'];
                $j_produksi = $data_hasil['j_produksi'];
                $n_error = $j_produksi - $hasil_ls;
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
                <td><?php if ($data_hasil['hasil_ls'] <= 0) {
                 echo '0';
               }else{
                echo $data_hasil['hasil_ls']." Unit";
              }
              ?></td>
              <td><?php echo round($mape,2); ?> %</td>
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