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
        
    } elseif ($_POST['aksi']=="admin-edit-dosen") {
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
        
    } elseif ($_POST['aksi']=="admin-delete-dosen") {
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
    } elseif ($_POST['aksi']=="admin-tambah-mahasiswa") {
        $nim =  $_POST['nim'];
        $nama_mahasiswa = ucwords($_POST['nama_mahasiswa']);
        $email_mahasiswa = $_POST['email_mahasiswa'];
        $hp_mahasiswa = $_POST['hp_mahasiswa'];
        $dob_mahasiswa = $_POST['dob_mahasiswa'];
        $gender_mahasiswa = $_POST['gender_mahasiswa'];

        $file = $_FILES['foto_mahasiswa']['name'];
        $type = $_FILES['foto_mahasiswa']['type'];
        $x = explode('.', $file);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto_mahasiswa']['tmp_name'];

        $alamat_mahasiswa = $_POST['alamat_mahasiswa'];
        $username = $_POST['nim'];
        $password = password_hash(str_replace("-", "", $_POST['dob_mahasiswa']), PASSWORD_DEFAULT);

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
                    '$nama_mahasiswa',
                    '$dob_mahasiswa',
                    '$alamat_mahasiswa',
                    '$email_mahasiswa',
                    '$hp_mahasiswa',
                    '$gender_mahasiswa',
                    '$file',
                    '$password',
                    '3'
                )
                ");

                if ($query) {
                    echo "
                    <script>
                    alert('Sukses Tambah Mahasiswa');
                    window.location = '".base_url('admin/daftar-mahasiswa/')."';
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
            window.location = '".base_url('admin/daftar-mahasiswa/')."';
            </script>
            ";
        }
    } elseif ($_POST['aksi']=="admin-edit-mahasiswa") {
        $id = $_POST['id'];
        $nim =  $_POST['nim'];
        $nama_mahasiswa = ucwords($_POST['nama_mahasiswa']);
        $email_mahasiswa = $_POST['email_mahasiswa'];
        $hp_mahasiswa = $_POST['hp_mahasiswa'];
        $dob_mahasiswa = $_POST['dob_mahasiswa'];
        $gender_mahasiswa = $_POST['gender_mahasiswa'];

        $file = $_FILES['foto_mahasiswa']['name'];
        $type = $_FILES['foto_mahasiswa']['type'];
        $x = explode('.', $file);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto_mahasiswa']['tmp_name'];

        $alamat_mahasiswa = $_POST['alamat_mahasiswa'];
        $username = $_POST['nim'];
        $password = password_hash(str_replace("-", "", $_POST['dob_mahasiswa']), PASSWORD_DEFAULT);

        if ($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg") {
            if (move_uploaded_file($file_tmp, "../assets/image/".$file)) {
                $query = $mysqli->query("UPDATE users SET
                user_code = '$nim',
                user_name = '$nama_mahasiswa',
                user_dob = '$dob_mahasiswa',
                user_address = '$alamat_mahasiswa',
                user_email = '$email_mahasiswa',
                user_phone_number = '$hp_mahasiswa',
                user_gender = '$gender_mahasiswa',
                user_image = '$file',
                user_password = '$password'

                WHERE user_id = '$id'
                ");

                if ($query) {
                    echo "
                    <script>
                    alert('Sukses Edit Mahasiswa');
                    window.location = '".base_url('admin/daftar-mahasiswa/')."';
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
            window.location = '".base_url('admin/daftar-mahasiswa/')."';
            </script>
            ";
        }
    } elseif ($_POST['aksi']=="admin-delete-mahasiswa") {
        $id = $_POST['id'];

        $query = $mysqli->query("DELETE FROM users WHERE user_id='$id' ");
        if ($query) {
            echo "
            <script>
            alert('Sukses Delete Mahasiswa');
            window.location = '".base_url('admin/daftar-mahasiswa/')."';
            </script>
            ";
        } else {
            echo $mysqli->error;
        }
    } elseif ($_POST['aksi']=="admin-tambah-matkul") {
        $kd_matkul = strtoupper($_POST['kd_matkul']);
        $nama_matkul = ucwords($_POST['nama_matkul']);
        $dosen = $_POST['dosen'];

        $query = $mysqli->query("INSERT INTO courses
        (
            course_code,
            course_name,
            course_dosen
        )
        VALUES 
        (
            '$kd_matkul',
            '$nama_matkul',
            '$dosen'
        )
        ");

        if ($query) {
            echo "
            <script>
            alert('Sukses Tambah Matkul');
            window.location = '".base_url('admin/daftar-matkul/')."';
            </script>
            ";
        } else {
            echo $mysqli->error;
        }

    } elseif ($_POST['aksi']=="admin-edit-matkul") {
        $id = $_POST['id'];
        $kd_matkul = strtoupper($_POST['kd_matkul']);
        $nama_matkul = ucwords($_POST['nama_matkul']);
        $dosen = $_POST['dosen'];

        $query = $mysqli->query("UPDATE courses SET
        course_code = '$kd_matkul',
        course_name = '$nama_matkul',
        course_dosen = '$dosen'

        WHERE course_id = '$id'
        ");

        if ($query) {
            echo "
            <script>
            alert('Sukses Edit Matkul');
            window.location = '".base_url('admin/daftar-matkul/')."';
            </script>
            ";
        } else {
            echo $mysqli->error;
        }
    } elseif ($_POST['aksi']=="admin-delete-matkul") {
        $id = $_POST['id'];

        $query = $mysqli->query("DELETE FROM courses WHERE course_id='$id' ");
        if ($query) {
            echo "
            <script>
            alert('Sukses Delete Matkul');
            window.location = '".base_url('admin/daftar-matkul/')."';
            </script>
            ";
        } else {
            echo $mysqli->error;
        }
    } elseif ($_POST['aksi']=="admin-tambah-jadwal") {
        $kd_matkul = $_POST['kd_matkul'];
        $mahasiswa = implode(",",$_POST['mahasiswa']);
        $date = $_POST['date'];
        $jam_mulai = $_POST['jam_mulai'];
        $jam_selesai = $_POST['jam_selesai'];

        $query = $mysqli->query("INSERT INTO schedule
        (
            schedule_course_id,
            schedule_user_id,
            schedule_start_at,
            schedule_end_at,
            schedule_date
        )
        VALUES 
        (
            '$kd_matkul',
            '$mahasiswa',
            '$jam_mulai',
            '$jam_selesai',
            '$date'
        )
        ");

        if ($query) {
            echo "
            <script>
            alert('Sukses Tambah Jadwal');
            window.location = '".base_url('admin/daftar-jadwal/')."';
            </script>
            ";
        } else {
            echo $mysqli->error;
        }
    } elseif ($_POST['aksi']=="admin-edit-jadwal") {
        $id = $_POST['id'];
        $kd_matkul = $_POST['kd_matkul'];
        $mahasiswa = implode(",",$_POST['mahasiswa']);
        $date = $_POST['date'];
        $jam_mulai = $_POST['jam_mulai'];
        $jam_selesai = $_POST['jam_selesai'];

        $query = $mysqli->query("UPDATE schedule SET
            schedule_course_id = '$kd_matkul',
            schedule_user_id = '$mahasiswa',
            schedule_start_at = '$jam_mulai',
            schedule_end_at = '$jam_selesai',
            schedule_date = '$date'

            WHERE schedule_id = '$id'
        ");

        if ($query) {
            echo "
            <script>
            alert('Sukses Edit Jadwal');
            window.location = '".base_url('admin/daftar-jadwal/')."';
            </script>
            ";
        } else {
            echo $mysqli->error;
        }
    } elseif ($_POST['aksi']=="admin-delete-jadwal") {
        $id = $_POST['id'];

        $query = $mysqli->query("DELETE FROM schedule WHERE schedule_id='$id' ");
        if ($query) {
            echo "
            <script>
            alert('Sukses Delete Jadwal');
            window.location = '".base_url('admin/daftar-jadwal/')."';
            </script>
            ";
        } else {
            echo $mysqli->error;
        }
    }
?>
