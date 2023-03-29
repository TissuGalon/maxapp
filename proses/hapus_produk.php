<?php 
include '../koneksi.php';

$id = $_GET['id'];
$kueri = mysqli_query($conn, "DELETE FROM produk WHERE id_produk ='$id'");
/* header("location:../myproduk.php"); */
echo "<script>window.location.href = '../myproduk.php'</script>";
?>