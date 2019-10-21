<?php include "website/header.php" ?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Halaman Daftar Mahasiswa
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
              <h3 class="box-title">Daftar Mahasiswa</h3>
<!--              <a class="btn btn-primary" style="float:right"><i class="fa fa-plus"></i> Tambah</a>-->
            <button class="btn btn-primary" style="float:right" data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus"></i>
              Tambah
            </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php
              buka_tabel(array("NIM","Nama","Email","Alamat"));
              
              tutup_tabel(array("NIM","Nama","Email","Alamat"));
              ?>
            </div>
            <!-- /.box-body -->
<!--Modal Start-->            
            <div class="modal fade in" id="modal-default">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">X</span>
                        </button>
                        <h4 class="modal-title">Tambah Mahasiswa</h4>
                      </div>
                      <div class="modal-body">
                        
                    <div class="form-group">
                        <label>NIM</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Mahasiswa</label>
                        <input type="text" class="form-control"required>
                    </div>

                    <div class="form-group">
                      <label for="jenis_kelamin">Jenis Kelamin</label>
                    <div>
                      <label><input type="radio" name="jenis_kelamin" value="Laki Laki" required> Laki Laki</label>
                    </div>
                      <label><input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan</label>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="example@esgul.com" required>
                    </div>

                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" class="form-control"required>
                    </div>

                    <div class="form-group">
                        <label for="jabatan">Alamat</label>
                        <input type="text" class="form-control"required>
                    </div>

                    <div class="form-group">
                    <label>Foto Dosen</label>
                      <input type="file" id="gambar">
                    </div>

              </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" value="#">Simpan</button>
                      </div>
                      </div>
                    </div>
                  </div>
              </div>
<!--Modal End-->              
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