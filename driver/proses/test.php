<?php
include '../../koneksi.php';

$kueri = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='2'");
$row = mysqli_fetch_array($kueri);
echo implode(" ",$row);
?>