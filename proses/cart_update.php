<?php
session_start();
include '../koneksi.php';

$iduser = $_SESSION['iduser'];
$idproduk = $_POST['idproduk'];
$qty = $_POST['qty'];

$kueri = mysqli_query($conn, "UPDATE keranjang SET qty=$qty WHERE id_produk='$idproduk' AND id_user='$iduser'");


?>