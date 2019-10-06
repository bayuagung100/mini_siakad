<?php include "website/header.php" ?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Halaman Daftar Matkul
      </h1>
      <!--<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>-->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Matkul</h3>
              <a class="btn btn-primary" style="float:right"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php
              buka_tabel(array("Kode Matkul","Nama Matkul"));
              
              tutup_tabel(array("Kode Matkul","Nama Matkul"));
              ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->


<?php include "website/footer.php" ?>