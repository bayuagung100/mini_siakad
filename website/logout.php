<?php
include'../inc/helper.php';
session_start();
session_destroy();
header("location: ".base_url(''));
?>