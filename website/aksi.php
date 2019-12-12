<?php
include "../inc/config.php";
include "../inc/helper.php";
    if ($_POST['aksi']=="admin-tambah-dosen") {
        
        $kd_dosen =  $_POST['kd_dosen'];
        $nama_dosen = ucwords($_POST['nama_dosen']);
        $email_dosen = $_POST['email_dosen'];
        $hp_dosen = $_POST['hp_dosen'];
        $dob_dosen = $_POST['dob_dosen'];
        $gender_dosen = $_POST['gender_dosen'];

        $file = $_FILES['foto_dosen']['name'];
        $type = $_FILES['foto_dosen']['type'];
        $x = explode('.', $file);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto_dosen']['tmp_name'];

        $alamat_dosen = $_POST['alamat_dosen'];
        $username = $_POST['kd_dosen'];
        $password = password_hash(str_replace("-", "", $_POST['dob_dosen']), PASSWORD_DEFAULT);

        if ($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg") {
            if (move_uploaded_file($file_tmp, "../assets/image/".$file)) {
                $query = $mysqli->query("INSERT INTO users
                (
                    user_code,
                    user_name,
                    user_dob,
                    user_address,
                    user_email,
                    user_phone_number,
                    user_gender,
                    user_image,
                    user_password,
                    user_role_id
                )
                VALUES 
                (
                    '$username',
                    '$nama_dosen',
                    '$dob_dosen',
                    '$alamat_dosen',
                    '$email_dosen',
                    '$hp_dosen',
                    '$gender_dosen',
                    '$file',
                    '$password',
                    '2'
                )
                ");

                if ($query) {
                    echo "
                    <script>
                    alert('Sukses Tambah Dosen');
                    window.location = '".base_url('admin/daftar-dosen/')."';
                    </script>
                    ";
                } else {
                    echo $mysqli->error;
                }
            }
        } else {
            echo "
            <script>
            alert('Format Foto Tidak Didukung');
            window.location = '".base_url('admin/daftar-dosen/')."';
            </script>
            ";
        }
        
    }elseif ($_POST['aksi']=="admin-edit-dosen") {
        $id =  $_POST['id'];
        $kd_dosen =  $_POST['kd_dosen'];
        $nama_dosen = ucwords($_POST['nama_dosen']);
        $email_dosen = $_POST['email_dosen'];
        $hp_dosen = $_POST['hp_dosen'];
        $dob_dosen = $_POST['dob_dosen'];
        $gender_dosen = $_POST['gender_dosen'];

        $file = $_FILES['foto_dosen']['name'];
        $type = $_FILES['foto_dosen']['type'];
        $x = explode('.', $file);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto_dosen']['tmp_name'];

        $alamat_dosen = $_POST['alamat_dosen'];
        $username = $_POST['kd_dosen'];
        $password = password_hash(str_replace("-", "", $_POST['dob_dosen']), PASSWORD_DEFAULT);

        if ($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg") {
            if (move_uploaded_file($file_tmp, "../assets/image/".$file)) {
                $query = $mysqli->query("UPDATE users SET
                user_code = '$kd_dosen',
                user_name = '$nama_dosen',
                user_dob = '$dob_dosen',
                user_address = '$alamat_dosen',
                user_email = '$email_dosen',
                user_phone_number = '$hp_dosen',
                user_gender = '$gender_dosen',
                user_image = '$file',
                user_password = '$password'
                
                WHERE user_id = '$id'
                ");
                if ($query) {
                    echo "
                    <script>
                    alert('Sukses Edit Dosen');
                    window.location = '".base_url('admin/daftar-dosen/')."';
                    </script>
                    ";
                } else {
                    echo $mysqli->error;
                }
            }
        } else {
            echo "
            <script>
            alert('Format Foto Tidak Didukung');
            window.location = '".base_url('admin/daftar-dosen/')."';
            </script>
            ";
        }
        
    }elseif ($_POST['aksi']=="admin-delete-dosen") {
        $id = $_POST['id'];

        $query = $mysqli->query("DELETE FROM users WHERE user_id='$id' ");
        if ($query) {
            echo "
            <script>
            alert('Sukses Delete Dosen');
            window.location = '".base_url('admin/daftar-dosen/')."';
            </script>
            ";
        } else {
            echo $mysqli->error;
        }
    }
?>