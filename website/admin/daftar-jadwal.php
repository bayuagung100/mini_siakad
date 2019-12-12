<?php include "website/header.php";
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Halaman Daftar Jadwal
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Daftar Jadwal</h3>
            <button class="btn btn-primary" style="float:right" data-toggle="modal" data-target="#modal-tambah">
              <i class="fa fa-plus"></i>
              Tambah
            </button>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <?php
              buka_tabel(array("Ruangan","Mata Kuliah","Mahasiswa", "Tanggal", "Jam Mulai", "Jam Selesai"));
                  $no = 1;
                  $query = $mysqli->query("SELECT * FROM schedule");
                  while ($data = $query->fetch_array()) {
                    $id = $data['schedule_id'];
                    $matkul = $data['schedule_course_id'];
                    $user = explode(",",$data['schedule_user_id']);
                    $date = $data['schedule_date'];
                    $time_start = $data['schedule_start_at'];
                    $time_end = $data['schedule_end_at'];
                     
                    $imp = implode(",",$user);
                    $querymatkul = $mysqli->query("SELECT * FROM courses WHERE course_id='$matkul' ");
                    while($datamatkul = $querymatkul->fetch_array()){
                      $kd_matkul = $datamatkul['course_code'];
                      $nama_matkul = $datamatkul['course_name'];
                      $dosen = $datamatkul['course_dosen'];
                      
                      
                        echo '
                        <tr>
                        <td>'.$no.'</td>
                        <td>'.$kd_matkul.'</td>
                        <td>'.$nama_matkul.'</td>
                        <td>'.count($user).' Orang</td>
                        <td>'.$date.'</td>
                        <td>'.$time_start.'</td>
                        <td>'.$time_end.'</td>
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
              tutup_tabel(array("Ruangan","Mata Kuliah","Mahasiswa", "Tanggal", "Jam Mulai", "Jam Selesai"));
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
                  <h4 class="modal-title">Tambah Jadwal</h4>
                </div>
                <form method="post" action="aksi/" role="form" enctype="multipart/form-data">
                  <input type="hidden" name="aksi" value="admin-tambah-jadwal">
                  <div class="modal-body">
                    <?php
                        $query = $mysqli->query("SELECT * FROM courses");
                        $list = array();
                        $list[] = array('val'=>'', 'cap'=>'Pilih Ruangan & Mata Kuliah');
                        while ($c = $query->fetch_array()) {
                          $dosen = $c['course_dosen'];

                          $querydosen = $mysqli->query("SELECT * FROM users WHERE user_code='$dosen' ");
                          while($datadosen = $querydosen->fetch_array()){
                            $kd_dosen = $datadosen['user_code'];
                            $nama_dosen = $datadosen['user_name'];
                          $list[] = array('val'=>$c['course_id'], 'cap'=>$c['course_code']."-".$c['course_name']."-".$nama_dosen.' ('.$kd_dosen.')');
                          }
                        }
                        genre_form("Ruangan & Mata Kuliah", "kd_matkul", $list,"");

                        $query2 = $mysqli->query("SELECT * FROM users JOIN roles ON users.user_role_id = roles.role_id WHERE roles.role_name='mahasiswa' ");
                        $list2 = array();
                        while ($d = $query2->fetch_array()) {
                          $list2[] = array('val'=>$d['user_id'], 'cap'=>$d['user_code']."-".$d['user_name']);
                        }
                        buat_inline_multi_select("Mahasiswa", "mahasiswa[]", $list2,"","Pilih Mahasiswa");

                        text_form("Tanggal", "date","","date");
                        time_form("Jam Mulai", "jam_mulai","");
                        time_form("Jam Selesai", "jam_selesai","");
                        
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
            $query = $mysqli->query("SELECT * FROM schedule");
            while ($data = $query->fetch_array()) {
              $id = $data['schedule_id'];
              $matkul = $data['schedule_course_id'];
              $user = $data['schedule_user_id'];
              $date = $data['schedule_date'];
              $time_start = $data['schedule_start_at'];
              $time_end = $data['schedule_end_at'];
              
              echo '
              <!--Modal Edit-->
              <div class="modal fade in" id="modal-edit-'.$id.'">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                      </button>
                      <h4 class="modal-title">Edit Jadwal</h4>
                    </div>
                    <form method="post" action="aksi/" role="form" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="'.$id.'">
                      <input type="hidden" name="aksi" value="admin-edit-jadwal">
                      <div class="modal-body">';
                        $query2 = $mysqli->query("SELECT * FROM courses");
                        $list = array();
                        $list[] = array('val'=>'', 'cap'=>'Pilih Ruangan & Mata Kuliah');
                        while ($c = $query2->fetch_array()) {
                          $dosen = $c['course_dosen'];

                          $querydosen = $mysqli->query("SELECT * FROM users WHERE user_code='$dosen' ");
                          while($datadosen = $querydosen->fetch_array()){
                            $kd_dosen = $datadosen['user_code'];
                            $nama_dosen = $datadosen['user_name'];
                          $list[] = array('val'=>$c['course_id'], 'cap'=>$c['course_code']."-".$c['course_name']."-".$nama_dosen.' ('.$kd_dosen.')');
                          }
                        }
                        genre_form("Ruangan & Mata Kuliah", "kd_matkul", $list,$matkul);

                        $query2 = $mysqli->query("SELECT * FROM users JOIN roles ON users.user_role_id = roles.role_id WHERE roles.role_name='mahasiswa' ");
                        $list2 = array();
                        while ($d = $query2->fetch_array()) {
                          $list2[] = array('val'=>$d['user_id'], 'cap'=>$d['user_code']."-".$d['user_name']);
                        }
                        
                        buat_inline_multi_select("Mahasiswa", "mahasiswa[]", $list2, $user, "Pilih Mahasiswa");

                        text_form("Tanggal", "date",$date,"date");
                        time_form("Jam Mulai", "jam_mulai",$time_start);
                        time_form("Jam Selesai", "jam_selesai", $time_end);

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
            $query = $mysqli->query("SELECT * FROM schedule");
            while ($data = $query->fetch_array()) {
              $id = $data['schedule_id'];
              $matkul = $data['schedule_course_id'];
              $user = $data['schedule_user_id'];
              $date = $data['schedule_date'];
              $time_start = $data['schedule_start_at'];
              $time_end = $data['schedule_end_at'];

                $querymatkul = $mysqli->query("SELECT * FROM courses WHERE course_id='$matkul' ");
                while($datamatkul = $querymatkul->fetch_array()){
                  $kd_matkul = $datamatkul['course_code'];
                  $nama_matkul = $datamatkul['course_name'];
                  $dosen = $datamatkul['course_dosen'];
              echo '
              <!--Modal Edit-->
              <div class="modal fade in" id="modal-delete-'.$id.'">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                      </button>
                      <h4 class="modal-title">Delete Jadwal</h4>
                    </div>
                    <form method="post" action="aksi/" role="form" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="'.$id.'">
                      <input type="hidden" name="aksi" value="admin-delete-jadwal">
                      <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus <b>'.$nama_matkul.'</b> dari daftar jadwal?</p>
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