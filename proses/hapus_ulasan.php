<?php
include '../koneksi.php';
session_start();

$id = $_GET['id'];
$idproduk = $_GET['idproduk'];

$kueri = mysqli_query($conn ,"DELETE FROM ulasan_produk WHERE id_ulasan = '$id'");


echo "<script>window.location.href = '../produk.php?id=".$idproduk."&ulasan=hapus';</script>";

?>