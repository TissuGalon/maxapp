<?php
include 'koneksi.php';
session_start();

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$cek = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
$cek = mysqli_num_rows($cek);

$cek2 = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
$cek2 = mysqli_num_rows($cek2);

if ($cek > 0) {
    echo "Username Digunakan";
} elseif ($cek2 > 0) {
    echo "Email Digunakan";
} else {
    $kueri = mysqli_query($conn, "INSERT INTO user (username,password,email,role) VALUES ('$username','$password','$email', 'user')");    
    $_SESSION['email'] = $email;
    echo "Berhasil";
}

?>