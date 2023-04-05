<?php
include '../koneksi.php';
session_start();
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
  <title>Maxapp</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&amp;display=swap"
    rel="stylesheet">
  <!-- Favicon -->
  <link rel="icon" href="../img/icons/icon-72x72.png">
  <!-- Apple Touch Icon -->
  <link rel="apple-touch-icon" href="../img/icons/icon-96x96.png">
  <link rel="apple-touch-icon" sizes="152x152" href="../img/icons/icon-152x152.png">
  <link rel="apple-touch-icon" sizes="167x167" href="../img/icons/icon-167x167.png">
  <link rel="apple-touch-icon" sizes="180x180" href="../img/icons/icon-180x180.png">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/animate.css">
  <link rel="stylesheet" href="../css/all.min.css">
  <link rel="stylesheet" href="../css/brands.min.css">
  <link rel="stylesheet" href="../css/solid.min.css">
  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/magnific-popup.css">
  <link rel="stylesheet" href="../css/nice-select.css">
  <!-- Stylesheet -->
  <link rel="stylesheet" href="../style.css">
  <!-- Web App Manifest -->
  <link rel="manifest" href="../manifest.json">
</head>

<body>
  <!-- Preloader-->
  <div class="preloader" id="preloader">
    <div class="spinner-grow text-secondary" role="status">
      <div class="sr-only"></div>
    </div>
  </div>


  <!-- Header Area -->
  <div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between d-flex rtl-flex-d-row-r px-0">
      <!-- Logo Wrapper -->

      <a class="btn btn-light btn-lg" href="index.php"><i class="fa-solid fa-arrow-left"></i></a>


      <div class="navbar-logo-container d-flex align-items-center">
        
        <a class="btn btn-light text-secondary m-2"><i class="fa-solid fa-bell"></i></a>
        <!-- Navbar Toggler -->
        <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas"
          aria-controls="suhaOffcanvas">
          <div><span></span><span></span><span></span></div>
        </div>
      </div>

      
    </div>
  </div>



  <?php include 'sidebar.php' ?>



  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <?php
  $ids = $_GET['id'];
  $kueri = mysqli_query($conn, "SELECT * FROM wallet WHERE alamat_wallet = '$ids'");
  $cek = mysqli_num_rows($kueri);

  if($cek > 0){ 
    $row = mysqli_fetch_array($kueri);
    $tipe = 'user';
  }else{ 
    $kueri2 = mysqli_query($conn, "SELECT * FROM wallet_driver WHERE alamat_wallet = '$ids'");
    $cek2 = mysqli_num_rows($kueri);

    if($cek2 > 0){
      $row = mysqli_fetch_array($kueri2);
      $tipe = 'driver';
    }else{ ?>

      <script>
      Swal.fire(
      'QR Invallid !',
      'Alamat Wallet tidak terdeteksi',
      'error'
      ).then((result) => {
        window.location.href = 'index.php';
      })
      </script>

    <?php } } ?>


  <div class="page-content-wrapper">

<div class="pt-1"></div>

    <!-- Top Products -->
    <div class="top-products-area py-3 pb-4  container rounded" style="/* From https://css.glass */
background: rgba(255, 255, 255, 0.44);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(7.6px);
-webkit-backdrop-filter: blur(7.6px);
border: 1px solid rgba(255, 255, 255, 0.52);">
      <div class="container px-0">
        <div class="section-heading d-flex align-items-center justify-content-between dir-rtl">
          <?php if(isset($tipe)){ ?>
            <h6>Top Up Saldo</h6><a class="btn p-0" href="transaksi.php">ID Wallet #<small class="text-secondary"><?php echo $row['alamat_wallet'] ?></small></a>
          <?php } ?>
        </div>
        <hr>

        <div class="card card-body mb-2">
            <div class="d-flex">
                <a class="btn btn-warning btn-sm text-light m-1" onclick="nominal(5000)">5.000</a>
                <a class="btn btn-warning btn-sm text-light m-1" onclick="nominal(10000)">10.000</a>
                <a class="btn btn-warning btn-sm text-light m-1" onclick="nominal(25000)">25.000</a>
                <a class="btn btn-warning btn-sm text-light m-1" onclick="nominal(50000)">50.000</a>
                <a class="btn btn-warning btn-sm text-light m-1" onclick="nominal(100000)">100.000</a>
            </div>
        </div>

        <script>
            function nominal(nilai){
                document.getElementById('jumlah').value = nilai;
            }
        </script>

        <div class="row g-2 ">        

        <div class="card my-1">
          <div class="card-body pl-3">
           <form action="proses/topup.php" method="GET">
            <label for="jumlah" class="text-dark m-1"><small >Type</small></label>
            <input type="text" name="tipe" value="<?php echo $tipe; ?>" class="form-control border-warning" readonly>
            <label for="jumlah" class="text-dark m-1"><small >Masukkan Jumlah Top Up</small></label>
            <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
            <input type="number" name="jumlah" placeholder="Jumlah Top Up" min="1000" required  id="jumlah"  min="1" class="form-control border-success">
            <div class="d-flex justify-content-end">
                <input type="submit" name="submit" value="Top Up" class="btn btn-primary m-2">
            </div>
           </form>
          </div>
        </div>

     
        </div>
      </div>
    </div>



    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>

    <!-- Footer Nav-->
    <?php include 'navigasi.php' ?>

    <!-- All JavaScript Files-->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/waypoints.min.js"></script>
    <script src="../js/jquery.easing.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/jquery.counterup.min.js"></script>
    <script src="../js/jquery.countdown.min.js"></script>
    <script src="../js/jquery.passwordstrength.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/theme-switching.js"></script>
    <script src="../js/no-internet.js"></script>
    <script src="../js/active.js"></script>
    <script src="../js/pwa.js"></script>
</body>

</html>