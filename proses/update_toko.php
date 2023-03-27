<?php
session_start();
include '../koneksi.php';

$id = $_SESSION['toko'];

$nama = $_GET['nama'];
$lokasi = $_GET['lokasi'];
$nohp = $_GET['nohp'];
$email = $_GET['email'];
$text_bio = $_GET['text_bio'];


$kueri = mysqli_query($conn,"UPDATE merchant SET nama='$nama', lokasi='$lokasi', nohp='$nohp', email='$email', text_bio='$text_bio' WHERE id_merchant='$id'");
header("location:../edit-toko.php?id=".$id."&response=Toko Berhasil Diubah !&status=1");

?>