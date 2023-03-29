<?php
session_start();
include '../../koneksi.php';

$update = $_GET['update'];
$waktu = date("d M Y - H:i");
$id = $_GET['id'];

if($update == "dikemas"){
    $kueri = mysqli_query($conn, "UPDATE progress_pesanan SET dikemas='true', waktu_dikemas='$waktu' WHERE id_progress='$id'");
}elseif($update == "diantar"){
    $kueri = mysqli_query($conn, "UPDATE progress_pesanan SET diantar='true', waktu_diantar='$waktu' WHERE id_progress='$id'");
}

/* header("location:../berlangsung.php"); */
echo "<script>window.location.href = '../berlangsung.php'</script>";

?>