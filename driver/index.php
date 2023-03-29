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
  <link rel="stylesheet" href="style.css">
  <!-- Web App Manifest -->
  <link rel="manifest" href="manifest.json">
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

      <!-- Search Form-->
      <div class="w-100">
        <div class="search-form d-flex w-100">
          <form action="#" method="">
            <input class="form-control  bg-white w-100" type="search" placeholder="Search in MaxApp">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
          <!-- <a class="btn btn-warning text-light m-2"><i class="fa-solid fa-magnifying-glass"></i></a> -->
        </div>
      </div>

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



  <?php if (isset($_GET['status'])) { ?>

    <!-- PWA Install Alert -->
    <div class="toast pwa-install-alert shadow bg-white" role="alert" aria-live="assertive" aria-atomic="true"
      data-bs-delay="5000" data-bs-autohide="true">
      <div class="toast-body">
        <div class="content d-flex align-items-center mb-2"><img src="img/icons/icon-72x72.png" alt="">
          <h6 class="mb-0">Selamat Datang di Aplikasi MaxApp</h6>
          <button class="btn-close ms-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
        </div><span class="mb-0 d-block">Lengkapi profil anda di <a href="#"><strong class="mx-1">Halaman
              Profil</strong></a>
          Untuk dapat menggunakan Aplikasi ini secara maksimal.</span>
      </div>
    </div>

  <?php } ?>


  <div class="page-content-wrapper pt-1">



  <?php
  $id = $_SESSION['id_driver'];
  $kueri = mysqli_query($conn, "SELECT * FROM driver WHERE id_driver = '$id'");
  $row = mysqli_fetch_array($kueri);
  ?>

    
    <!-- Hero Wrapper -->
    <div class="hero-wrapper">
      <div class="container px-0">
      



      <?php if(isset($_SESSION['id_driver'])){ ?>


    <?php 
    $iddriver = $_SESSION['id_driver'];
      $wallet = mysqli_query($conn, "SELECT * FROM wallet_driver WHERE id_driver = '$iddriver'");
      $wal = mysqli_fetch_array($wallet);
      $cekwallet = mysqli_num_rows($wallet);
      if($cekwallet > 0){ ?>



       

        <!-- WALLET -->
    <div class="container px-2 mt-2">
      <div class="card mt-1 shadow-none bg-white" style="/* From https://css.glass */
background: rgba(255, 255, 255, 0.41);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(8.3px);
-webkit-backdrop-filter: blur(8.3px);
border: 1px solid rgba(255, 255, 255, 1);">

        <div class="d-flex justify-content-between">

          <div class="card-body p-0 px-1 m-3">
          <i class="fa-solid fa-wallet text-dark"></i>
            <span class="text-dark m-2 mt-3">Rp <?php echo number_format($wal['saldo'],2,",",".") ?></span><br>
          </div>

          <div class="d-flex align-items-center text-center m-1">
            <div class="m-2">
              <a href="top-up.php" class="btn btn-warning text-light  shadow-sm">Top Up <i class="fa-solid fa-plus text-light"></i></a>
            </div>
            <div class="m-2">
              <a href="#" class="btn btn-primary  shadow-sm"><i class="fa-solid fa-qrcode text-light"></i></a>
            </div>

          </div>
        </div>

        <hr class="my-1">

        <?php if($row['status'] == 'offline'){ ?>

          <div class="card-body p-0 px-1 m-3 my-2  d-flex justify-content-between">
            <span class="text-dark mt-0">Status  <i class="fa-solid fa-circle text-danger ms-2"></i> Offline</span>
            <a class=" btn btn-success text-light" href="proses/go-online.php">Go Online</a>
          </div>

          <?php }else{ ?>

            <div class="card-body p-0 px-1 m-3 my-2  d-flex justify-content-between">
            <span class="text-dark mt-0">Status  <i class="fa-solid fa-circle text-success ms-2"></i> Online</span>
            <a class=" btn btn-danger text-light" href="proses/go-offline.php">Go Offline</a>
          </div>

            <?php } ?>



      </div>
    </div>
<!-- WALLET -->


        <?php }else{ 

function generateRandomString($length = 30) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[random_int(0, $charactersLength - 1)];
  }
  return $randomString;
}


$alamat_dompet = generateRandomString();

$cekalamat = mysqli_query($conn, "SELECT * FROM wallet WHERE alamat_wallet = '$alamat_dompet'");
$cekalamat2 = mysqli_num_rows($cekalamat);
if($cekalamat2 > 0){
  $alamat_dompet = generateRandomString();
}

$qdompet = mysqli_query($conn, "INSERT INTO wallet_driver (id_driver, saldo, alamat_wallet) VALUES ('$iddriver', 0, '$alamat_dompet')");
echo '<script>window.location.href = "index.php"</script>';
} ?>


<?php } ?>




     



        
        <div class="my-1"></div>


        
        <?php 
        $iddriver = $_SESSION['id_driver'];
        $pesanan = mysqli_query($conn, "SELECT * FROM task_driver WHERE id_driver='$iddriver' AND status='diproses'");
        $jmlpesanan = mysqli_num_rows($pesanan);
        if($jmlpesanan > 0){
         ?>
        <div class="card" style="/* From https://css.glass */
background: rgba(255, 255, 255, 0.44);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(7.6px);
-webkit-backdrop-filter: blur(7.6px);
border: 1px solid rgba(255, 255, 255, 0.52);">
            
          <div class="card-body">          
              <div class="d-flex justify-content-between">
                <span class="text-dark m-2">Orderan sedang Berlangsung !</span>
                <a href="berlangsung.php" class="btn btn-warning m-1 text-light w-25">Lihat</a>
              </div>
          </div>          
        </div>
        <?php } ?>



        <div class="my-1"></div>




        <div class="card" style="/* From https://css.glass */
background: rgba(255, 255, 255, 0.44);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(7.6px);
-webkit-backdrop-filter: blur(7.6px);
border: 1px solid rgba(255, 255, 255, 0.52);">
          <div class="card-body ">
            <div class="d-flex justify-content-between">
              <h6 class="text-dark mt-2"><i class="fa-solid fa-history me-1 ms-1"></i> History Pesanan Hari ini</h6>
              <a href="riwayat.php" class="btn btn-light shadow-sm text-secondary">Lihat semua</a>
            </div>
            
            <hr>
            

            <?php
            $tgl = date("Y-m-d");
            $hariini = mysqli_query($conn, "SELECT * FROM pesanan WHERE selesai = 'true' AND id_driver = '$id' AND tgl_selesai = '$tgl' ");
            $hitung = mysqli_num_rows($hariini);
            if($hitung > 0){
              while($row = mysqli_fetch_array($hariini)){?>

              <div class="card my-1">
                <div class="card-body pl-3">
                  <div class="d-flex justify-content-between">
                    <strong class="">1 .</strong>
                      <div>
                        <small>Pesanan #<?php echo $row['id_pesanan'] ?></small><br>
                        <small><?php echo $row['waktu_selesai'] ?></small>                        
                      </div>
                      <div class="m-2">
                        <span class="text-dark">Rp <?php echo number_format($row['total_pembayaran'],2,",",".") ?></span>
                      </div>

                      <a class="btn btn-warning text-light shadow-sm mt-2 mb-2">Lihat Detail</a>
                  </div>
                </div>
              </div>
              <?php } ?>

            <?php }else{?>
              <div class="card my-1">
                <div class="card-body pl-3">
                  <a class="btn btn-light w-100 disabled">Belum ada pesanan selesai hari ini</a>
                </div>
              </div>

            <?php } ?>



          </div>
        </div>

        <div class="my-1"></div>


        

        

      </div>
    </div>
    






        </div>
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
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.passwordstrength.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/theme-switching.js"></script>
    <script src="js/no-internet.js"></script>
    <script src="js/active.js"></script>
    <script src="js/pwa.js"></script>
</body>

</html>