<?php
include 'koneksi.php';
session_start();

$tipeakun = $_POST['tipeakun'];
$namatoko = $_POST['namatoko'];
$lokasi = $_POST['lokasi'];
$nohp = $_POST['nohp'];
$email = $_POST['email'];
$pass = $_POST['pass'];



$cek = mysqli_query($conn, "SELECT * FROM merchant WHERE nohp='$nohp'");
$cek = mysqli_num_rows($cek);

$cek2 = mysqli_query($conn, "SELECT * FROM merchant WHERE email='$email'");
$cek2 = mysqli_num_rows($cek2);

if ($cek > 0) {
    echo "Nomor HP Digunakan";
} elseif ($cek2 > 0) {
    echo "Email Digunakan";
} else {
    $kueri = mysqli_query($conn, "INSERT INTO merchant (nama,pass,email,tipe,nohp,lokasi) VALUES ('$namatoko','$pass','$email', '$tipeakun', '$nohp', '$lokasi')");
    $_SESSION['email'] = $email;
    echo "Berhasil";
}





?>