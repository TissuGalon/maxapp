<?php
session_start();
include '../koneksi.php';

$idproduk = $_GET['idproduk'];
$comment = $_GET['comment'];
$star = $_GET['star'];
$iduser = $_SESSION['iduser'];
$idmerchant = $_GET['idmerchant'];

date_default_timezone_set("Asia/Jakarta");

$waktu = date("H:i");
$tgl = date("Y-m-d");

$kueri = mysqli_query($conn, "INSERT INTO ulasan_produk (id_produk,id_user,id_merchant,bintang,ulasan,waktu,tgl) VALUES ('$idproduk', '$iduser', '$idmerchant', '$star', '$comment', '$waktu', '$tgl')");
header("location:../produk.php?id=" . $idproduk);

?>