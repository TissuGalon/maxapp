<?php
session_start();
include '../koneksi.php';

$idd = $_POST['idd'];
$qty = $_POST['qty'];
$username = $_SESSION['username'];
$iduser = $_SESSION['iduser'];

$tgl = date("Y-m-d");

$cek1 = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_produk='$idd' AND id_user='$iduser'");

$cek = mysqli_num_rows($cek1);
if ($cek > 0) {
    $get = mysqli_fetch_array($cek1);
    $qty2 = $qty + $get['qty'];
    $kueri = mysqli_query($conn, "UPDATE keranjang SET qty=$qty2 WHERE id_produk='$idd' AND id_user='$iduser'");
} else {
    $kueri = mysqli_query($conn, "INSERT INTO keranjang (id_user,id_produk,qty,tgl_diubah) VALUES ('$iduser','$idd',$qty,'$tgl')");
}

echo "berhasil";

?>