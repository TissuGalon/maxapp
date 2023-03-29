<?php
include 'koneksi.php';
session_start();

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$nohp = $_POST['nohp'];


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



/* CEK IDUSER */
function generateRandomString($length = 15) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}


  $iduser = generateRandomString();

  $cekid = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$iduser'");
  $cekid2 = mysqli_num_rows($cekid);
  if($cekid2 > 0){
    $iduser = generateRandomString();
  }
/* CEK IDUSER */

$cek = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
$cek = mysqli_num_rows($cek);

$cek2 = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
$cek2 = mysqli_num_rows($cek2);

$cek3 = mysqli_query($conn, "SELECT * FROM user WHERE nohp='$nohp'");
$cek3 = mysqli_num_rows($cek3);

if ($cek > 0) {
    echo "Username Digunakan";
} elseif ($cek2 > 0) {
    echo "Email Digunakan";
} elseif ($cek3 > 0) {
    echo "NoHP Digunakan";
} else {
    $kueri = mysqli_query($conn, "INSERT INTO user (id_user, nohp, username,password,email,role) VALUES ('$iduser','$nohp','$username','$password','$email', 'user')");    
    $_SESSION['email'] = $email;
    echo "Berhasil";
}

?>