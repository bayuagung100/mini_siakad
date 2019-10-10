<?php
    if ($_POST['aksi']=="admin-tambah-dosen") {
        echo $_POST['kd_dosen']."<br>";
        echo $_POST['nama_dosen']."<br>";
        echo $_POST['email']."<br>";
        echo $_POST['alamat']."<br>";

        // $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
        // $file = $_FILES['foto_dosen']['name'];
        // $x = explode('.', $file);
        // $ekstensi = strtolower(end($x));
        // $file_tmp = $_FILES['foto_dosen']['tmp_name'];

        // echo $file;
    }elseif ($_POST['aksi']=="admin-edit-dosen") {
        echo $_POST['id']."<br>";
        echo $_POST['kd_dosen']."<br>";
        echo $_POST['nama_dosen']."<br>";
        echo $_POST['email']."<br>";
        echo $_POST['alamat']."<br>";
    }elseif ($_POST['aksi']=="admin-delete-dosen") {
        echo $_POST['id']."<br>";
    }
?>