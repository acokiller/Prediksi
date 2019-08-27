<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Transaksi</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="row">
          <div class="col-md-6">
            <form role="form" action="../inc/t_produksi.php" method="post">
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
                      <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="j_transaksi">Jumlah Transaksi</label>
                  <input type="number" class="form-control" id="j_transaksi" name="j_transaksi" placeholder="Jumlah Transaksi">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="tambah" class="btn btn-danger"><i class="fa fa-download"></i> Tambah</button>
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