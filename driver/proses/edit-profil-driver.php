<?php
include '../../koneksi.php';
session_start();

$nama = $_POST['nama'];
$nohp = $_POST['nohp'];

$iddriver = $_SESSION['id_driver'];

$kueri = mysqli_query($conn, "UPDATE driver SET nama_driver='$nama', nohp='$nohp' WHERE id_driver='$iddriver'");
echo "Sukses";

?>