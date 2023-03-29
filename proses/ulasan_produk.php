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

/* CEK ID ULASAN */
/* RANDOM STRING */
function generateRandomString($length = 15) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}
/* RANDOM STRING */

$id_ulasan = generateRandomString();
$cekid = mysqli_query($conn, "SELECT * FROM ulasan_produk WHERE id_ulasan = '$id_ulasan'");
if(mysqli_num_rows($cekid) > 0){
    $id_ulasan = generateRandomString();
    
}
/* CEK ID ULASAN */


$kueri = mysqli_query($conn, "INSERT INTO ulasan_produk (id_ulasan,id_produk,id_user,id_merchant,bintang,ulasan,waktu,tgl) VALUES ('$id_ulasan','$idproduk', '$iduser', '$idmerchant', '$star', '$comment', '$waktu', '$tgl')");
/* header("location:../produk.php?id=" . $idproduk); */
echo "<script>window.location.href = '../produk.php?id=" . $idproduk . "&ulasan=success'</script>";

?>