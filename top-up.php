<?php
include 'koneksi.php';
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

 <!-- Header Area-->
 <div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between rtl-flex-d-row-r">
      <!-- Back Button-->
      <div class="back-button me-2"><a href="index.php"><i class="fa-solid fa-arrow-left-long"></i></a></div>
      <div></div>
      <!-- Page Title-->
      <div class="page-heading">
        <!-- <h6 class="mb-0">Top up</h6> -->
      </div>
      <!-- Navbar Toggler-->
      <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas"
        aria-controls="suhaOffcanvas">
        <div><span></span><span></span><span></span></div>
      </div>
    </div>
  </div>



  <?php include 'sidebar.php' ?>



  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <div class="page-content-wrapper">


  <?php
  $iduser = $_SESSION['iduser'];
  $kueri = mysqli_query($conn, "SELECT * FROM wallet WHERE id_user = '$iduser'");
  $row = mysqli_fetch_array($kueri);
  ?>


  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript">
            function generateBarCode()
            {
                var nric = $('#text').val();
                var url = 'https://api.qrserver.com/v1/create-qr-code/?data=' + nric + '&amp;size=50x50';
                $('#barcode').attr('src', url);
            }

            generateBarCode();

        </script>


<div class="py-1"></div>

  <div class="card container">
      <div class="card-body">
            <div class="d-flex justify-content-center">
            <img id='barcode' 
            src="https://api.qrserver.com/v1/create-qr-code/?data=<?php echo $row['alamat_wallet'] ?>&amp;size=100x100" 
            alt="" 
            title="HELLO" 
            width="50%" 
            height="190" />
            
            </div>

            <div class="d-flex justify-content-center mt-4">
            <small class="text-primary  text-center">*Tunjukkan QR Code ke Kasir</small>
            </div>

      </div>
  </div>

  <div class="py-1"></div>

  <div class="card container">
      <div class="card-body">
        <small class="text-dark"><i class="fa-solid fa-file-invoice me-1"></i> Transaksi Wallet</small>
        <hr>

        <?php
        $iduser = $_SESSION['iduser'];
        $kueri2 = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_user = '$iduser'");
        $cek = mysqli_num_rows($kueri2);
        while($wew = mysqli_fetch_array($kueri2)){
         ?>

        <?php if($wew['status'] == 'masuk'){ ?>
        <a href="#" class="text-secondary btn   text-dark w-100 py-2 my-1" style="background-color:#f5f7fa; border: 1px solid green">
            <div class="d-flex justify-content-between">
                <div class="d-flex justify-content-between">
                    
                        <strong class="text-success me-3">Rp. <?php echo $wew['jumlah'] ?> </strong>

                    <small><?php echo $wew['keterangan'] ?></small> 
                </div>

                <i class="fa-solid fa-circle-arrow-down m-1 text-success"></i>
            </div>
            <div class="d-flex justify-content-between">
              <small class="text-secondary"><?php echo $wew['tgl'] ?> / <?php echo $wew['waktu'] ?></small> 
            </div>
        </a>
        <?php }else{ ?>
          <a href="#" class="text-secondary btn   text-dark w-100 py-2 my-1" style="background-color:#f5f7fa; border: 1px solid red">
            <div class="d-flex justify-content-between">
                <div class="d-flex justify-content-between">
                    
                        <strong class="text-danger me-3">Rp. <?php echo $wew['jumlah'] ?> </strong>

                    <small><?php echo $wew['keterangan'] ?></small> 
                </div>

                <i class="fa-solid fa-circle-arrow-up m-1 text-danger"></i>
            </div>
            <div class="d-flex justify-content-between">
              <small class="text-secondary"><?php echo $wew['tgl'] ?> / <?php echo $wew['waktu'] ?></small> 
            </div>
        </a>
        <?php } ?>

        <?php } ?>


        <?php if($cek == 0){ ?>
          <a class="btn btn-light disabled w-100"><i class="fa-solid fa-ghost me-1"></i> Belum ada aktivitas transaksi wallet</a>
        <?php } ?>


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