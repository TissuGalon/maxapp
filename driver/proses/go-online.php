<?php
session_start();
include '../../koneksi.php';
$id = $_SESSION['id_driver'];
$kueri = mysqli_query($conn, "UPDATE driver SET status='online' WHERE id_driver='$id'");
/* header('location:../index.php'); */
echo "<script>window.location.href = '../index.php'</script>";
?>