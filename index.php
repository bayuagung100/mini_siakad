<?php
session_start();
ob_start();
define("INDEX", true);
include "inc/config.php";
include "inc/helper.php";

$kosong   = true;


if (isset($_SESSION['is_login'])) {
  if ($_SESSION['role']=="admin") {
    $default = "admin/home";
  }elseif ($_SESSION['role']=="dosen") {
    $default = "dosen/home";
  }else{
    $default = "mahsiswa/home";
  }
  $content = isset($_GET['content']) ? $_GET['content'] : $default;
  $page = array('admin/home', 'admin/daftar-dosen', 'admin/daftar-mahasiswa', 'admin/daftar-matkul', 'admin/daftar-jadwal', 'dosen/home', 'dosen/daftar-matkul', 'dosen/daftar-jadwal');
  foreach ($page as $pg) {
    if ($content == $pg and $kosong) {
      include 'website/' . $pg . '.php';
      $kosong = false;
    }
  }
} else {
  include 'website/login.php';
  $kosong = false;
}

if ($kosong) include 'website/404.php';

?>