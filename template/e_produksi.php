<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <?php 
        $id = $_GET['id_produksi'];
        $qry = mysql_query("SELECT * from tbl_produksi where id_produksi = '$id'");
        $t = mysql_fetch_array($qry);
        $nama_mobil = $t['nama_mobil'];
         ?>
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Penjualan</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="row">
          <div class="col-md-6">
            <form role="form" action="../inc/e_produksi.php" method="post">
              <input type="hidden" name="id_produksi" value="<?php echo $t['id_produksi']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label>Pilih Mobil</label>
                  <select class="form-control" name="nama_mobil">
                    <?php 
                      $mob = mysql_query("SELECT * from tbl_mobil");
                      while ($m = mysql_fetch_assoc($mob)) {
                     ?>
                     <option value="<?php echo $m['nama_mobil']; ?>" <?php if($nama_mobil == $m['nama_mobil']){ echo "selected"; }else{ echo ""; } ?>><?php echo $m['nama_mobil']; ?></option>
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
                      <option value="<?php echo $x; ?>" <?php if($t['tahun']==$x){ echo 'selected'; }else{ echo ''; } ?>><?php echo $x; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="j_transaksi">Jumlah Penjualan</label>
                  <input type="number" class="form-control" id="j_transaksi" name="j_transaksi" value="<?php echo $t['j_produksi']; ?>" placeholder="Jumlah Penjualan">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="tambah" class="btn btn-danger"><i class="fa fa-edit"></i> Edit</button>
                <button class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </section>