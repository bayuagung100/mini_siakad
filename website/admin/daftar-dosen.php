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
            <button class="btn btn-primary" style="float:right" data-toggle="modal" data-target="#modal-tambah">
              <i class="fa fa-plus"></i>
              Tambah
            </button>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
           
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Kode Dosen</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th style="width: 150px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  $no = 1;
                  $query = $mysqli->query("SELECT * FROM users JOIN roles ON users.user_role_id = roles.role_id WHERE roles.role_name='dosen' ");
                  while ($data = $query->fetch_array()) {
                    $id = $data['user_id'];
                    $kd_dosen = $data['user_code'];
                    $nama = $data['user_name'];
                    $email = $data['user_email'];
                    $alamat = $data['user_address'];
                    
                    echo '
                    <td>'.$no.'</td>
                    <td>'.$kd_dosen.'</td>
                    <td>'.$nama.'</td>
                    <td>'.$email.'</td>
                    <td>'.$alamat.'</td>
                    <td>
                      <a data-toggle="modal" data-target="#modal-edit-'.$id.'" class="btn btn-primary">
                        <i class="fa fa-edit"></i> Edit
                      </a>
                      <a data-toggle="modal" data-target="#modal-delete-'.$id.'" class="btn btn-danger">
                        <i class="fa fa-trash"></i> Delete
                      </a>
                    </td>
                    ';
                    $no++;
                  }
                  ?>

                </tr>
              </tbody>

            </table>
          </div>
          <!-- /.box-body -->
          <!--Modal Tambah-->
          <div class="modal fade in" id="modal-tambah">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                  </button>
                  <h4 class="modal-title">Tambah Dosen</h4>
                </div>
                <form method="post" action="aksi/" role="form" enctype="multipart/form-data">
                  <input type="hidden" name="aksi" value="admin-tambah-dosen">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Kode Dosen</label>
                      <input type="text" name="kd_dosen" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Nama Dosen</label>
                      <input type="text" name="nama_dosen" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea type="text" name="alamat" class="form-control" required></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!--Modal End-->
          <?php
            $query = $mysqli->query("SELECT * FROM users JOIN roles ON users.user_role_id = roles.role_id WHERE roles.role_name='dosen' ");
            while ($data = $query->fetch_array()) {
              $id = $data['user_id'];
              $kd_dosen = $data['user_code'];
              $nama = $data['user_name'];
              $email = $data['user_email'];
              $alamat = $data['user_address'];
              echo '
              <!--Modal Edit-->
              <div class="modal fade in" id="modal-edit-'.$id.'">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                      </button>
                      <h4 class="modal-title">Edit Dosen</h4>
                    </div>
                    <form method="post" action="aksi/" role="form" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="'.$id.'">
                      <input type="hidden" name="aksi" value="admin-edit-dosen">
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Kode Dosen</label>
                          <input type="text" name="kd_dosen" class="form-control" value="'.$kd_dosen.'" required>
                        </div>
                        <div class="form-group">
                          <label>Nama Dosen</label>
                          <input type="text" name="nama_dosen" class="form-control" value="'.$nama.'" required>
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="email" class="form-control" value="'.$email.'" required>
                        </div>
                        <div class="form-group">
                          <label>Alamat</label>
                          <textarea type="text" name="alamat" class="form-control" required>'.$alamat.'</textarea>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!--Modal End-->
              ';
            }
          ?>
          
          <?php
            $query = $mysqli->query("SELECT * FROM users JOIN roles ON users.user_role_id = roles.role_id WHERE roles.role_name='dosen' ");
            while ($data = $query->fetch_array()) {
              $id = $data['user_id'];
              $kd_dosen = $data['user_code'];
              $nama = $data['user_name'];
              $email = $data['user_email'];
              $alamat = $data['user_address'];
              echo '
              <!--Modal Edit-->
              <div class="modal fade in" id="modal-delete-'.$id.'">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                      </button>
                      <h4 class="modal-title">Delete Dosen</h4>
                    </div>
                    <form method="post" action="aksi/" role="form" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="'.$id.'">
                      <input type="hidden" name="aksi" value="admin-delete-dosen">
                      <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus <b>'.$nama.'</b> dari daftar dosen?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!--Modal End-->
              ';
            }
          ?>
          
        </div>
        


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