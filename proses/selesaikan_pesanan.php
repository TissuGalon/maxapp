<?php
include '../koneksi.php';
session_start();

$id = $_GET['id'];
$waktu = date("d M Y - H:i");
$kueri = mysqli_query($conn, "UPDATE pesanan SET status_pesanan='selesai', selesai='true', waktu_selesai='$waktu' WHERE id_pesanan='$id'");
/* header("location:../detail-pengiriman.php?id=".$id); */
echo "<script>window.location.href = '../detail-pengiriman.php?id=".$id."'</script>";
?>