<?php
session_start();
include '../../koneksi.php';
$id = $_SESSION['id_driver'];
$kueri = mysqli_query($conn, "UPDATE driver SET status='offline' WHERE id_driver='$id'");
header('location:../index.php');
?>