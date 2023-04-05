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

      <a class="btn btn-light shadow-sm" href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
    

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



  <div class="page-content-wrapper">



<div class="py-1"></div>


        <?php
        if(isset($_GET['success'])){ ?>
        
          <script>
              Swal.fire({
              icon: 'success',
              title: 'Konfirmasi berhasil',
              confirmButtonText: 'Ok',
            }).then((result) => {
              window.location.href="daftar_merchant.php";
            })
          </script>

        <?php } ?>


    <!-- Top Products -->
    <div class="top-products-area py-3 pb-4 mx-1 rounded" style="/* From https://css.glass */
background: rgba(255, 255, 255, 0.44);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(7.6px);
-webkit-backdrop-filter: blur(7.6px);
border: 1px solid rgba(255, 255, 255, 0.52);">
      <div class="container px-0">
        <div class="section-heading d-flex align-items-center justify-content-between dir-rtl">
          <h6><i class="fa-solid fa-store me-1"></i> Pendaftaran merchant</h6><!-- <a class="btn p-0" href="#">Lihat Semua<i
              class="ms-1 fa-solid fa-arrow-right-long"></i></a> -->
        </div>
        <hr>
        <div class="row g-2 ">

        <?php 
        $kueri = mysqli_query($conn, "SELECT * FROM merchant WHERE konfirmasi = 'false'");
        $tcek = mysqli_num_rows($kueri);
        if($tcek > 0){ ?>

          <div class="card my-1">

          <?php while($t = mysqli_fetch_array($kueri)){ ?>
          
          
          <div class="card-body border pl-3" >
            <div class="d-flex justify-content-between">
              <strong class="">1 .</strong>
              <div style="width:80px;height:80px; overflow:hidden;" class="" onclick="window.location.href = 'detail_merchant.php?id=<?php echo $t['id_merchant'] ?>';">
                <img src="../img/merchant-image/<?php echo $t['avatar']; ?>" style="width:auto; height:auto;"></img>
              </div>
              <div class="my-4" onclick="window.location.href = 'detail_merchant.php?id=<?php echo $t['id_merchant'] ?>';">
                  <i class="fa-solid fa-store me-1 text-danger"></i> <small class="text-dark"><?php echo $t['nama'] ?> </small>               
                  <!-- <br> <small>2022</small> -->
              </div>

              <a href="#" onclick="terima('<?php echo $t['id_merchant'] ?>')" class="btn btn-warning text-light shadow-sm my-4">Terima</a>
            </div>
          </div>  
          
          <?php } ?>

          <script>
            function terima(idmerchant){
              Swal.fire({
              icon: 'question',
              title: 'Konfirmasi pendaftaran?',
              showCancelButton: true,
              confirmButtonText: 'Konfirmasi',
              cancelButtonText: 'Batal',
            }).then((result) => {
              /* Read more about isConfirmed, isDenied below */
              if (result.isConfirmed) {
                window.location.href = 'proses/konfirmasi_merchant.php?id='+idmerchant;
              } else if (result.isDenied) {
                
              }
            })
            }
          </script>

          
        </div>    

        <?php }else{ ?>

        <div class="card my-1">
          <div class="card-body pl-3">
            <div class="d-flex justify-content-center">
              <span class="text-dark"><i class="fa-solid fa-ghost me-1"></i> Tidak ada pengajuan pendaftaran</span>
            </div>
          </div>
        </div>

        <?php } ?>


       




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