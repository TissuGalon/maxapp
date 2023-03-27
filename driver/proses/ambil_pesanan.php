<?php
include '../../koneksi.php';
session_start();

$id = $_GET['id'];
$iddriver = $_SESSION['id_driver'];

$ambil = mysqli_query($conn, "SELECT * FROM task_driver WHERE id_driver='$iddriver' AND status='diproses'");
$jml = mysqli_num_rows($ambil);

if($jml > 0){
    header("location:../ambil_pesanan.php?pesan=gagal");
}else{
    $qcek = mysqli_query($conn, "SELECT * FROM pesanan WHERE id_pesanan='$id'");
    $row = mysqli_fetch_array($qcek);

    if($row['status_pesanan'] == "dibatalkan"){
        header("location:../ambil_pesanan.php?pesan=dibatalkan");
    }elseif($row['status_pesanan'] == "diproses"){
        header("location:../ambil_pesanan.php?pesan=diproses");
    }else{
        $waktu = date("d M Y - H:i");


        $kueri = mysqli_query($conn, "UPDATE pesanan SET status_pesanan='diproses', id_driver='$iddriver' WHERE id_pesanan='$id'");
        $kueri2 = mysqli_query($conn, "INSERT INTO task_driver (id_driver,id_pesanan,waktu_ambil) VALUES ('$iddriver','$id','$waktu')");
        $kueri3 = mysqli_query($conn, "INSERT INTO progress_pesanan (id_pesanan, id_driver, diambil, waktu_diambil) VALUES ('$id','$iddriver','true','$waktu')");
        header("location:../berlangsung.php");
    }
}




?>