<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
  <meta name="description" content="Suha - Multipurpose Ecommerce Mobile HTML Template">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="theme-color" content="#100DD1">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <!-- The above tags *must* come first in the head, any other head content must come *after* these tags -->
  <!-- Title -->
  <title>Suha - Multipurpose Ecommerce Mobile HTML Template</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&amp;display=swap"
    rel="stylesheet">
  <!-- Favicon -->
  <link rel="icon" href="img/icons/icon-72x72.png">
  <!-- Apple Touch Icon -->
  <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
  <link rel="apple-touch-icon" sizes="152x152" href="img/icons/icon-152x152.png">
  <link rel="apple-touch-icon" sizes="167x167" href="img/icons/icon-167x167.png">
  <link rel="apple-touch-icon" sizes="180x180" href="img/icons/icon-180x180.png">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/brands.min.css">
  <link rel="stylesheet" href="css/solid.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/nice-select.css">
  <!-- Stylesheet -->
  <link rel="stylesheet" href="style2.css">
  <!-- Web App Manifest -->
  <link rel="manifest" href="manifest.json">
</head>

<body>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <?php
  if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $pass = $_POST['pass'];

    $kueri = mysqli_query($conn, "SELECT * FROM driver WHERE id='$id' AND pass ='$pass'");
    $tampil = mysqli_fetch_array($kueri);
    $cek = mysqli_num_rows($kueri);
    if ($cek > 0) {
      $iddriver = $tampil['id_driver'];
      $online = mysqli_query($conn, "UPDATE driver SET status = 'online' WHERE id_driver = '$iddriver'");
      $_SESSION['username'] = $tampil['nama_driver'];
      $_SESSION['id_driver'] = $tampil['id_driver'];
      header("location:driver/index.php");
    } else { ?>
      <script>
        alert();
        function alert() {
          Swal.fire(
            'Gagal',
            'Password Salah / Akun tidak terdaftar !',
            'error'
          )
        }
      </script>

    <?php }
  } ?>

  <!-- Preloader-->
  <div class="preloader" id="preloader">
    <div class="spinner-grow text-secondary" role="status">
      <div class="sr-only"></div>
    </div>
  </div>
  <!-- Login Wrapper Area-->
  <div class="login-wrapper d-flex align-items-center justify-content-center text-center" style="">
    <!-- Background Shape-->
    <div class="background-shape"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-10 col-lg-8"><img class="big-logo rounded-circle shadow-sm" src="img/core-img/circle-logo.png" style="width:100px; height:auto;" alt="">
          <!-- Register Form-->
          <div class="register-form mt-5">
            <form method="POST">
              <div class="form-group text-start text-dark mb-4"><span class="text-dark">ID</span>
                <label for="username"><i class="fa-solid fa-user text-secondary"></i></label>
                <input class="form-control" id="username" type="text" name="id" placeholder="ID Driver"
                  required max="50">
              </div>
              <div class="form-group text-start text-dark mb-4"><span class="text-dark">Password</span>
                <label for="password"><i class="fa-solid fa-key text-secondary"></i></label>
                <input class="form-control" id="password" type="password" name="pass" placeholder="Password" required
                  max="50">
              </div>
              <button class="btn btn-warning btn-lg w-100 text-light" type="submit" name="submit">Log In</button>
            </form>
          </div>

          <a class="btn btn-dark w-100 btn-lg mt-1 text-secondary" style='/* From https://css.glass */
background: rgba(255, 255, 255, 0.2);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(5px);
-webkit-backdrop-filter: blur(5px);
border: 1px solid rgba(255, 255, 255, 0.3);' href="login.php">Kembali</a>
          <!-- Login Meta-->
          <div class="login-meta-data">
           <!--  <a class="forgot-password d-block mt-3 mb-1 text-light" href="forget-password.html">Lupa
              Password?</a> -->
            <!-- <p class="mb-0 text-light">Belum punya akun?<a class="mx-1 text-light" href="opsi-register.php">Daftar Sekarang</a></p> -->
          </div>
          <!-- View As Guest-->
          <!-- <div class="view-as-guest mt-3"><a class="btn text-light" href="index.php">Masuk sebagai Tamu</a></div> -->
        </div>
      </div>
    </div>
  </div>
  <!-- All JavaScript Files-->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.passwordstrength.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/theme-switching.js"></script>
  <script src="js/active.js"></script>
  <script src="js/pwa.js"></script>
</body>

</html>