<?php
include '../koneksi.php';
session_start();


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

$id_pembayaran = generateRandomString();

$cekid = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_pembayaran = '$id_pembayaran'");
if(mysqli_num_rows($cekid) > 0){
    $id_pembayaran = generateRandomString();
}

$id_user = $_SESSION['iduser'];

$id_pesanan = $_GET['id_pesanan'];
$saldo = $_GET['saldo'];
$nominal = $_GET['nominal'];
$keterangan = $_GET['keterangan'];
$status = $_GET['status'];

$tgl = date("Y-m-d");
$waktu = date("H:i");

$id_user = $_SESSION['iduser'];
$sisa = $saldo - $nominal;

$kueri = mysqli_query($conn, "INSERT INTO pembayaran (id_pembayaran, id_pesanan, id_user, jumlah, keterangan, status, tgl, waktu) VALUES ('$id_pembayaran', '$id_pesanan', '$id_user', '$nominal', '$keterangan', '$status', '$tgl', '$waktu')");
$kueri2 = mysqli_query($conn, "UPDATE pesanan SET bayar = 'true', id_pembayaran = '$id_pembayaran' WHERE id_pesanan = '$id_pesanan'");
$kueri3 = mysqli_query($conn, "UPDATE wallet SET saldo = $sisa WHERE id_user = '$id_user'");


/* header('location:../pesanan.php?pesan=Pembayaran Berhasil !'); */
echo "<script>window.location.href = '../pesanan.php?pesan=Pembayaran Berhasil !'</script>";

?>