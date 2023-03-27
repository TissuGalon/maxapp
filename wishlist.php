<?php session_start(); include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Suha - Multipurpose Ecommerce Mobile HTML Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags -->
    <!-- Title -->
    <title>Wishlist</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
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
        <div class="back-button me-2"><a href="#" onclick="history.back()"><i
                        class="fa-solid fa-arrow-left-long"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Wishlist</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas">
          <div><span></span><span></span><span></span></div>
        </div>
      </div>
    </div>

    <?php include 'sidebar.php' ?>


    <div class="page-content-wrapper  pt-1 pb-3 rounded" style="/* From https://css.glass */
background: rgba(255, 255, 255, 0.44);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(7.6px);
-webkit-backdrop-filter: blur(7.6px);
border: 1px solid rgba(255, 255, 255, 0.52);">
        <div class="pb-3">
            <div class="container">


                <div class="mb-3"></div>
                <div class="row g-2 rtl-flex-d-row-r">

                    <?php
                    $iduser = $_SESSION['iduser'];
                    $all = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk IN (SELECT id_produk FROM wishlist WHERE id_user = '$iduser')");
                    while ($row = mysqli_fetch_array($all)) {
                        $idm = $row['id_merchant'];
                        $toko1 = mysqli_query($conn, "SELECT * FROM merchant WHERE id_merchant = '$idm'");
                        $toko = mysqli_fetch_array($toko1);
                        ?>
                        <!-- Product Card -->
                        <div class="col-4 col-md-4">
                            <div class="card product-card">
                                <div class="card-body">
                                    <!-- Badge-->
                                    <!-- <span class="badge rounded-pill badge-warning">Sale</span> -->
                                    <!-- Wishlist Button-->
                                    <!-- <a class="wishlist-btn" href="#"><i class="fa-solid fa-heart"></i></a> -->
                                    <!-- Thumbnail -->
                                    <a class="product-thumbnail d-block"
                                        href="produk.php?id=<?php echo $row['id_produk'] ?>">
                                        <div style="overflow:hidden;width:100%;height:90px;" class="mb-2 rounded shadow-sm">
                                            <img class="mb-2"
                                                src="img/product/<?php echo $row['gambar'] ?>" alt="">

                                        </div>

                                        <!-- Offer Countdown Timer: Please use event time this format: YYYY/MM/DD hh:mm:ss -->
                                        <!-- <ul class="offer-countdown-timer d-flex align-items-center shadow-sm"
                                                                data-countdown="2023/12/31 23:59:59">
                                                                <li><span class="days">0</span>d</li>
                                                                <li><span class="hours">0</span>h</li>
                                                                <li><span class="minutes">0</span>m</li>
                                                                <li><span class="seconds">0</span>s</li>
                                                            </ul> -->
                                    </a>
                                    <!-- Product Title -->
                                    <small class="text-danger"><small class="fa-solid fa-shop me-1"></small> <?php echo $toko['nama'] ?></small>
                                    <small class="text-dark"
                                        href="produk.php?id=<?php echo $row['id_produk'] ?>">
                                        <?php echo $row['nama_produk'] ?>
                                    </small>
                                    <!-- Product Price -->
                                    <br>
                                    <small class="">Rp.
                                    <?php echo number_format($row['harga'],2,",",".") ?><span></span>
                                    </small>
                                    <!-- Rating -->
                                    <div class="product-rating">
                                        <?php $bintang = 0;
                                        while ($bintang < $row['bintang']) { ?>
                                            <i class="fa-solid fa-star"></i>
                                            <?php $bintang += 1;
                                        }
                                        ?>
                                    </div>
                                    <!-- Add to Cart -->
                                    <!-- <a class="btn btn-success btn-sm" href="#"><i
                                            class="fa-solid fa-plus"></i></a> -->
                                </div>
                            </div>
                        </div>
                    <?php } ?>

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