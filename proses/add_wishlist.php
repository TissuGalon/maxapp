<?php
session_start();
include '../koneksi.php';
$set = $_POST['set'];
$id = $_POST['id'];
$iduser = $_SESSION['iduser'];
$tgl = date('Y-m-d');
$waktu = date('H:i');

if($set == 'set'){
    $kueri = mysqli_query($conn, "INSERT INTO wishlist (id_produk, id_user, tgl_wishlist, waktu_wishlist) VALUES ('$id', '$iduser', '$tgl', '$waktu')");
}else{
    $kueri = mysqli_query($conn, "DELETE FROM wishlist WHERE id_produk = '$id' AND id_user = '$iduser'");
}

?>