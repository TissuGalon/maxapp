<?php
session_start();
include '../../koneksi.php';

$id = $_GET['id'];
$kueri = mysqli_query($conn, "UPDATE merchant SET konfirmasi = 'true' WHERE id_merchant = '$id'");
echo "<script>window.location.href = '../daftar_merchant.php?success=success'</script>";

?>