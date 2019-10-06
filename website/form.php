<?php
session_start();
include "../inc/config.php";
include "../inc/helper.php";
include "header.php";

    $act=$_GET['act'];
    $var = ucwords(str_replace('-', ' ', $_GET['for']));
    if ($act=="tambah" AND $var=="Daftar Dosen") {
        echo'
        <div class="content-wrapper">
        <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tambah '.$var.'</h3>
                    </div>

                    <div class="box-body">
        ';
                        buka_form("../form/aksi/","","tambah-$_GET[for]");
                        text_form("Kode Dosen", "kd_dosen","");
                        text_form("Nama", "nama_dosen","");
                        text_form("Password", "pwd_dosen","","password");
                        text_form("Tanggal Lahir", "dot_dosen","","date");
                        textarea_form("Alamat", "alamat_dosen","");
                        text_form("Email", "email_dosen","");
                        text_form("No Tlp", "hp_dosen","");
                        genre_form("Jenis Kelamin", "gender_dosen");
                        image_form("Foto", "foto_dosen","");
                        tutup_form("../../daftar-dosen/");
        echo'
                    </div>
                </div>
            </div>
        </div>
        </section>
        </div>
        ';
    }elseif ($act=="edit" AND $var=="Daftar Dosen"){
        echo'
        <div class="content-wrapper">
        <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit '.$var.'</h3>
                    </div>

                    <div class="box-body">
        ';              
                        $query = $mysqli->query("SELECT * FROM users WHERE user_id='$_GET[id]' ");
                        $data = $query->fetch_array();
                        buka_form("../form/aksi/",$data['user_id'],"edit-$_GET[for]");
                        text_form("Kode Dosen", "kd_dosen",$data['user_code']);
                        text_form("Nama", "nama_dosen",$data['user_name']);
                        text_form("Password", "pwd_dosen",$data['user_password'],"password");
                        text_form("Tanggal Lahir", "dot_dosen",$data['user_dob'],"date");
                        textarea_form("Alamat", "alamat_dosen",$data['user_address']);
                        text_form("Email", "email_dosen",$data['user_email']);
                        text_form("No Tlp", "hp_dosen",$data['user_phone_number']);
                        genre_form("Jenis Kelamin", "gender_dosen");
                        image_form("Foto", "foto_dosen",$data['user_image']);
                        tutup_form("../../daftar-dosen/");
        echo'
                    </div>
                </div>
            </div>
        </div>
        </section>
        </div>
        ';
    }elseif ($act=="delete" AND $var=="Daftar Dosen"){
        echo'
        <div class="content-wrapper">
        <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Delete '.$var.'</h3>
                    </div>

                    
        ';
                       
        echo'
                    
                </div>
            </div>
        </div>
        </section>
        </div>
        ';
    }

include "footer.php"
?>