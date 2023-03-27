<?php
session_start();
include '../koneksi.php';

$idproduk = $_POST['idproduk'];
$iduser = $_SESSION['iduser'];

$kueri = mysqli_query($conn, "DELETE FROM keranjang WHERE id_produk='$idproduk' AND id_user='$iduser'");


?>