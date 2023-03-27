<?php
include '../koneksi.php';
session_start();

$username = $_POST['username'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$nohp = $_POST['nohp'];
$alamat = $_POST['alamat'];

$username = $_SESSION['username'];

$kueri = mysqli_query($conn, "UPDATE user SET nama='$nama', nohp='$nohp', email='$email', alamat='$alamat' WHERE username='$username'");
echo "Sukses";

?>