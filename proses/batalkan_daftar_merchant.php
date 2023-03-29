<?php
include '../koneksi.php';
session_start();

$id = $_GET['id'];
$iduser = $_SESSION['iduser'];

$kueri = mysqli_query($conn, "UPDATE user SET id_merchant = Null WHERE id_user = '$iduser'");
$kueri2 = mysqli_query($conn, "DELETE FROM merchant WHERE id_merchant = '$id'");

$_SESSION['toko'] = null;

echo "<script>window.location.href = '../daftar_merchant.php?status=dibatalkan';</script>"

?>