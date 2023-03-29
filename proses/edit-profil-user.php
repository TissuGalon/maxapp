<?php
include '../koneksi.php';
session_start();

$username = $_POST['username'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$nohp = $_POST['nohp'];
$alamat = $_POST['alamat'];

/* CEK NOHP */
$ceknohp = substr($nohp, 0, 2);

if($ceknohp != "62"){
    if(str_contains($ceknohp, '0')){
        $ceknohp = trim($ceknohp, '0');
        $nohp = '62' . $ceknohp . substr($nohp,2);
    }else{
        $nohp = '62' . $nohp;
    }
}
/* CEK NOHP */

$username = $_SESSION['username'];

$kueri = mysqli_query($conn, "UPDATE user SET nama='$nama', nohp='$nohp', email='$email', alamat='$alamat' WHERE username='$username'");
echo "Sukses";

?>