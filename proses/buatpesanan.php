<?php
include '../koneksi.php';
session_start();

date_default_timezone_set("Asia/Bangkok");

$id_user = $_SESSION['iduser'];
$latitude = $_GET['latitude'];
$longtitude = $_GET['longtitude'];

$alamat = $_GET['alamat'];

$metode_pembayaran = $_GET['metode_pembayaran'];
$total_produk = $_GET['total_produk'];
$total_pengiriman = $_GET['total_pengiriman'];
$total_pembayaran = $_GET['total_pembayaran'];
$tgl_pemesanan = date("Y-m-d");
$waktu_pemesanan = date("H:i");
$status_pesanan = "menunggu";

$catatan = $_GET['catatan'];

$produk = $_GET['allproduk'];

if($metode_pembayaran == '2'){
    $bayar = "true";
}else{
    $bayar = "false";
}

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

$id_pesanan = generateRandomString();

$cekid = mysqli_query($conn, "SELECT * FROM pesanan WHERE id_pesanan = '$id_pesanan'");
if(mysqli_num_rows($cekid) > 0){
    $id_pesanan = generateRandomString();
}


$kueri = mysqli_query($conn, "INSERT INTO pesanan (id_pesanan, id_user,latitude,longtitude,produk,metode_pembayaran,total_produk,total_pengiriman,total_pembayaran,tgl_pemesanan,waktu_pemesanan,status_pesanan,catatan,bayar, alamat) VALUES ('$id_pesanan','$id_user','$latitude','$longtitude','$produk','$metode_pembayaran',$total_produk,$total_pengiriman,$total_pembayaran,'$tgl_pemesanan','$waktu_pemesanan','$status_pesanan', '$catatan', '$bayar', '$alamat')");

if($bayar == 'true'){
    /* header('location:../pesanan.php?pesan=Produk berhasil dipesan !'); */
    echo "<script>window.location.href = '../pesanan.php?pesan=Produk berhasil dipesan !'</script>";
}else{
    /* header('location:../pembayaran.php?id='. $id_pesanan); */
    echo "<script>window.location.href = '../pembayaran.php?id=". $id_pesanan ."'</script>";
}


?>