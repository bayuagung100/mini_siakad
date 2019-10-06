<?php
    if ($_POST['aksi']=="tambah-daftar-dosen") {
        echo $_POST['kd_dosen']."<br>";
        echo $_POST['nama_dosen']."<br>";
        echo $_POST['pwd_dosen']."<br>";
        echo $_POST['dot_dosen']."<br>";
        echo $_POST['alamat_dosen']."<br>";
        echo $_POST['email_dosen']."<br>";
        echo $_POST['hp_dosen']."<br>";
        echo $_POST['gender_dosen']."<br>";
        
        $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
        $file = $_FILES['foto_dosen']['name'];
        $x = explode('.', $file);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto_dosen']['tmp_name'];

        echo $file;
    }elseif ($_POST['aksi']=="edit-daftar-dosen") {
        # code...
    }
?>