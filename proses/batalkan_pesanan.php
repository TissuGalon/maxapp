<?php
include '../koneksi.php';
session_start();

$id = $_GET['id'];

$iduser = $_SESSION['iduser'];

$kcek = mysqli_query($conn, "SELECT * FROM pesanan WHERE id_pesanan='$id'");
$cek = mysqli_num_rows($kcek);
$row= mysqli_fetch_array($kcek);

$tgl = date("Y-m-d");
$waktu = date("H:i");


if($cek > 0 && $row['status_pesanan'] == "diproses"){
    header('location:../pesanan.php?pesan=Pesanan sedang di proses, Tidak dapat dibatalkan !');
}else{
    $kueri = mysqli_query($conn, "UPDATE pesanan SET status_pesanan ='dibatalkan' WHERE id_pesanan='$id'");

    if($row['metode_pembayaran'] == 1){
        /* UPDATE WALLET */
        $qwallet = mysqli_query($conn, "SELECT * FROM wallet WHERE id_user = '$iduser'");
        $cow = mysqli_fetch_array($qwallet);
        $total = $row['total_pembayaran'];
        $saldo = $cow['saldo'] + $total;
        $balikin = mysqli_query($conn, "UPDATE wallet SET saldo = '$saldo' WHERE id_user = '$iduser'");

        /* UPDATE HISTORY */

        /* RANDOM STRING */
        function generateRandomString($length = 15) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[random_int(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        /* RANDOM STRING */

        $id_pembayaran = generateRandomString();

        /* CEK RANDOM STRING */
        $cekid = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_pembayaran = '$id_pembayaran'");
        if(mysqli_num_rows($cekid) > 0){
            $id_pembayaran = generateRandomString();
        }
        /* CEK RANDOM STRING */

        $update = mysqli_query($conn, "INSERT INTO pembayaran (id_pembayaran, id_pesanan, id_user, jumlah, keterangan, status, tgl, waktu) VALUES ('$id_pembayaran', '$id', '$iduser', '$total', 'Batalkan pemesanan', 'masuk', '$tgl', '$waktu')");

    }

    header('location:../pesanan.php?pesan=Pesanan '. $id . ' Dibatalkan !');
}


?>