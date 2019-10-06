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
              <a href="form/?act=tambah&for=daftar-dosen" class="btn btn-primary" style="float:right"><i class="fa fa-plus"></i> Tambah</a>
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