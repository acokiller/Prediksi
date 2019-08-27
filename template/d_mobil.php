<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Mobil
    <small>Mobil</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Data - Data</a></li>
    <li class="active">Data Mobil</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Mobil</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Mobil</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              $sql = mysql_query("SELECT * from tbl_mobil order by nama_mobil");
              while ($data = mysql_fetch_array($sql)) {
               ?>
               <tr>
                 <td><?php echo $no++; ?></td>
                 <td><?php echo $data['nama_mobil']; ?></td>
                 <td>
                   <a href="index.php?page=e_mobil"><button class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</button></a>
                   <a href=""><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button></a>
                 </td>
               </tr>
             <?php } ?>
            </tbody>
          </table>
          <a href="index.php?page=t_mobil"><button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button></a>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
    <!-- /.content -->