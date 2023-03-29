<?php
session_start();
include '../koneksi.php';

$id = $_GET['id'];

$nama = $_GET['nama'];
$harga = $_GET['harga'];
$deskripsi = $_GET['deskripsi'];
$jenis = $_GET['jenis'];
$subjenis = $_GET['subjenis'];
$stock = $_GET['stock'];

$tgledit = date("Y-m-d h:i:s");

$kueri = mysqli_query($conn,"UPDATE produk SET nama_produk='$nama', harga='$harga', deskripsi='$deskripsi', jenis='$jenis', sub_jenis='$subjenis', tgl_edit='$tgledit', stock='$stock' WHERE id_produk='$id'");
/* header("location:../produk_edit.php?id=".$id."&response=Produk Berhasil Diubah !&status=1"); */
echo "<script>window.location.href = '../produk_edit.php?id=".$id."&response=Produk Berhasil Diubah !&status=1'</script>";

?>