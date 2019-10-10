<?php include "website/header.php";
?>

  <div class="content-wrapper">
  
    <section class="content-header">
      <h1>
        Halaman Daftar Dosen
      </h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Dosen</h3>
             <!-- <a href="form/?act=tambah&for=daftar-dosen" class="btn btn-primary" style="float:right"><i class="fa fa-plus"></i> Tambah</a>-->
             <button class="btn btn-primary" style="float:right" data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-plus"></i>
              Tambah
            </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php
              buka_tabel(array("Kode Dosen","Nama","Email","Alamat"));
              $no = 1;
              $query = $mysqli->query("SELECT * FROM users JOIN roles ON users.user_role_id = roles.role_id WHERE roles.role_name='dosen' ");
              while ($data = $query->fetch_array()) {
                $id = $data['user_id'];
                $kd_dosen = $data['user_code'];
                $nama = $data['user_name'];
                $email = $data['user_email'];
                $alamat = $data['user_address'];

                isi_tabel($no, array($kd_dosen, $nama, $email, $alamat),"form/?act=edit&for=daftar-dosen","form/?act=delete&for=daftar-dosen", $id);
                $no++;
              }
              
              tutup_tabel(array("Kode Dosen","Nama","Email","Alamat"));
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
                        <h4 class="modal-title">Tambah Dosen</h4>
                      </div>
                      <div class="modal-body">
                        
                    <div class="form-group">
                        <label>Kode Dosen</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Dosen</label>
                        <input type="text" class="form-control"required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control"required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Alamat</label>
                        <input type="text" class="form-control"required>
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
    
  

  </div>


<?php
include "website/footer.php" ?>