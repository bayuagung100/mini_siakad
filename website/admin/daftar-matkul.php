<?php include "website/header.php";
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Halaman Daftar Matkul
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Daftar Matkul</h3>
            <button class="btn btn-primary" style="float:right" data-toggle="modal" data-target="#modal-tambah">
              <i class="fa fa-plus"></i>
              Tambah
            </button>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <?php
              buka_tabel(array("Ruangan","Nama Matkul","Dosen"));
                  $no = 1;
                  $query = $mysqli->query("SELECT * FROM courses");
                  while ($data = $query->fetch_array()) {
                    $id = $data['course_id'];
                    $code = $data['course_code'];
                    $name = $data['course_name'];
                    $dosen = $data['course_dosen'];

                    $querydosen = $mysqli->query("SELECT * FROM users WHERE user_code='$dosen' ");
                    while($datadosen = $querydosen->fetch_array()){
                      $kd_dosen = $datadosen['user_code'];
                      $nama_dosen = $datadosen['user_name'];
                      echo '
                      <tr>
                      <td>'.$no.'</td>
                      <td>'.$code.'</td>
                      <td>'.$name.'</td>
                      <td>'.$kd_dosen.'-'.$nama_dosen.'</td>
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
                    }
                    $no++;
                  }
              tutup_tabel(array("Ruangan","Nama Matkul","Dosen"));
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
                  <h4 class="modal-title">Tambah Matkul</h4>
                </div>
                <form method="post" action="aksi/" role="form" enctype="multipart/form-data">
                  <input type="hidden" name="aksi" value="admin-tambah-matkul">
                  <div class="modal-body">
                    <?php
                        text_form("Ruangan", "kd_matkul","");
                        text_form("Nama Matkul", "nama_matkul","");

                        $query = $mysqli->query("SELECT * FROM users JOIN roles ON users.user_role_id = roles.role_id WHERE roles.role_name='dosen' ");
                        $list = array();
                        $list[] = array('val'=>'', 'cap'=>'Pilih Dosen Pengampu');
                        while ($d = $query->fetch_array()) {
                          $list[] = array('val'=>$d['user_code'], 'cap'=>$d['user_code']."-".$d['user_name']);
                        }
                        genre_form("Dosen", "dosen", $list,"");
                        
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
            $query = $mysqli->query("SELECT * FROM courses");
            while ($data = $query->fetch_array()) {
              $id = $data['course_id'];
              $code = $data['course_code'];
              $name = $data['course_name'];
              $dosen = $data['course_dosen'];
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
                      text_form("Ruangan", "kd_matkul", $code);
                      text_form("Nama Matkul", "nama_matkul", $name);

                      $query2 = $mysqli->query("SELECT * FROM users JOIN roles ON users.user_role_id = roles.role_id WHERE roles.role_name='dosen' ");
                      $list = array();
                      $list[] = array('val'=>'', 'cap'=>'Pilih Dosen Pengampu');
                      while ($d = $query2->fetch_array()) {
                        $list[] = array('val'=>$d['user_code'], 'cap'=>$d['user_code']."-".$d['user_name']);
                      }
                      genre_form("Dosen", "dosen", $list, $dosen);
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
            $query = $mysqli->query("SELECT * FROM courses");
            while ($data = $query->fetch_array()) {
              $id = $data['course_id'];
              $code = $data['course_code'];
              $name = $data['course_name'];
              $dosen = $data['course_dosen'];
              echo '
              <!--Modal Edit-->
              <div class="modal fade in" id="modal-delete-'.$id.'">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                      </button>
                      <h4 class="modal-title">Delete Matkul</h4>
                    </div>
                    <form method="post" action="aksi/" role="form" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="'.$id.'">
                      <input type="hidden" name="aksi" value="admin-delete-matkul">
                      <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus <b>'.$name.'</b> dari daftar matkul?</p>
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