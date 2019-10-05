<?php
session_start();
ob_start();
define("INDEX", true);
include "inc/config.php";
include "inc/helper.php";

$kosong   = true;

if (isset($_SESSION['is_login'])) {
  $content = isset($_GET['content']) ? $_GET['content'] : header("location: ".$_SESSION['role']."/");
  $page = array('admin/home', 'admin/daftar-dosen', 'admin/daftar-mahasiswa', 'admin/daftar-matkul', 'admin/daftar-jadwal','dosen/home', 'dosen/daftar-matkul', 'dosen/daftar-jadwal');
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
