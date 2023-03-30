<?php 
include '../koneksi.php';

$id = $_GET['id'];
$tgl = date("Y-m-d H:i:s");
$kueri = mysqli_query($conn, "UPDATE produk SET hapus = 'true', tgl_hapus = '$tgl' WHERE id_produk ='$id'");
/* header("location:../myproduk.php"); */
echo "<script>window.location.href = '../myproduk.php'</script>";
?>