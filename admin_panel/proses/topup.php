<?php
include '../../koneksi.php';
session_start();

$id = $_GET['id'];
$jumlah = $_GET['jumlah'];
$type = $_GET['type'];

if($type == 'user'){
    $kueri = mysqli_query($conn, "SELECT * FROM wallet WHERE alamat_wallet = '$id'");
    $row = mysqli_fetch_array($kueri);
    $saldo = $row['saldo'];
    $saldo = $saldo + $jumlah;

    $kueri2 = mysqli_query($conn, "UPDATE wallet SET saldo = '$saldo' WHERE alamat_wallet = '$id'");
    echo
}else{

}


?>