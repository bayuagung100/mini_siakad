<?php include "website/header.php";
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Halaman Daftar Mahasiswa
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Daftar Mahasiswa</h3>
            <button class="btn btn-primary" style="float:right" data-toggle="modal" data-target="#modal-tambah">
              <i class="fa fa-plus"></i>
              Tambah
            </button>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <?php
              buka_tabel(array("NIM","Nama","Email","Alamat"));
                  $no = 1;
                  $query = $mysqli->query("SELECT * FROM users JOIN roles ON users.user_role_id = roles.role_id WHERE roles.role_name='mahasiswa' ");
                  while ($data = $query->fetch_array()) {
                    $id = $data['user_id'];
                    $nim = $data['user_code'];
                    $nama = $data['user_name'];
                    $email = $data['user_email'];
                    $alamat = $data['user_address'];
                    
                    echo '
                    <tr>
                    <td>'.$no.'</td>
                    <td>'.$nim.'</td>
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
                    </tr>
                    ';
                    $no++;
                  }
              tutup_tabel(array("NIM","Nama","Email","Alamat"));
            ?>
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
                  <h4 class="modal-title">Tambah Mahasiswa</h4>
                </div>
                <form method="post" action="aksi/" role="form" enctype="multipart/form-data">
                  <input type="hidden" name="aksi" value="admin-tambah-mahasiswa">
                  <div class="modal-body">
                    <?php
                        text_form("NIM", "nim","");
                        text_form("Nama", "nama_mahasiswa","");
                        text_form("Email", "email_mahasiswa","","email");
                        text_form("No Tlp", "hp_mahasiswa","");
                        text_form("Tanggal Lahir", "dob_mahasiswa","","date");

                        $list = array();
                        $list[] = array('val'=>'', 'cap'=>'Pilih Jenis Kelamin');
                        $list[] = array('val'=>'L', 'cap'=>'Laki-Laki');
                        $list[] = array('val'=>'P', 'cap'=>'Perempuan');
                        genre_form("Jenis Kelamin", "gender_mahasiswa", $list,"");
                        image_form("Foto", "foto_mahasiswa","");
                        textarea_form("Alamat", "alamat_mahasiswa","");
                        ?>
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
            $query = $mysqli->query("SELECT * FROM users JOIN roles ON users.user_role_id = roles.role_id WHERE roles.role_name='mahasiswa' ");
            while ($data = $query->fetch_array()) {
              $id = $data['user_id'];
              $nim = $data['user_code'];
              $nama = $data['user_name'];
              $email = $data['user_email'];
              $hp = $data['user_phone_number'];
              $dob = $data['user_dob'];
              $gender = $data['user_gender'];
              $foto = $data['user_image'];
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
                      <h4 class="modal-title">Edit Mahasiswa</h4>
                    </div>
                    <form method="post" action="aksi/" role="form" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="'.$id.'">
                      <input type="hidden" name="aksi" value="admin-edit-mahasiswa">
                      <div class="modal-body">';
                        text_form("NIM", "nim",$nim);
                        text_form("Nama", "nama_mahasiswa",$nama);
                        text_form("Email", "email_mahasiswa",$email,"email");
                        text_form("No Tlp", "hp_mahasiswa",$hp);
                        text_form("Tanggal Lahir", "dob_mahasiswa",$dob,"date");

                        $list = array();
                        $list[] = array('val'=>'', 'cap'=>'Pilih Jenis Kelamin');
                        $list[] = array('val'=>'L', 'cap'=>'Laki-Laki');
                        $list[] = array('val'=>'P', 'cap'=>'Perempuan');
                        genre_form("Jenis Kelamin", "gender_mahasiswa", $list, $gender);
                        image_form("Foto", "foto_mahasiswa",$foto);
                        textarea_form("Alamat", "alamat_mahasiswa",$alamat);
              echo'    
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
            $query = $mysqli->query("SELECT * FROM users JOIN roles ON users.user_role_id = roles.role_id WHERE roles.role_name='mahasiswa' ");
            while ($data = $query->fetch_array()) {
              $id = $data['user_id'];
              $nim = $data['user_code'];
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
                      <h4 class="modal-title">Delete Mahasiswa</h4>
                    </div>
                    <form method="post" action="aksi/" role="form" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="'.$id.'">
                      <input type="hidden" name="aksi" value="admin-delete-mahasiswa">
                      <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus <b>'.$nama.'</b> dari daftar mahasiswa?</p>
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