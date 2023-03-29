<?php session_start();
include '../koneksi.php'; ?>
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


    <?php
    $id = $_GET['id'];
    $kueri = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk ='$id'");
    $row = mysqli_fetch_array($kueri);
    ?>


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
            <div class="back-button me-2"><a href="produk.php?id=<?php echo $_GET['id'] ?>"><i
                        class="fa-solid fa-arrow-left-long"></i></a></div>
            <!-- Page Title-->
            <div class="page-heading">
                <h6 class="mb-0">Ratings &amp; Ulasan</h6>
            </div>
            <!-- Navbar Toggler-->
            <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas"
                aria-controls="suhaOffcanvas">
                <div><span></span><span></span><span></span></div>
            </div>
        </div>
    </div>

    <?php include 'sidebar.php' ?>


    <div class="page-content-wrapper">

        <div class="product-description pb-1">


            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


            <!-- Rating & Review Wrapper -->
            <div class="rating-and-review-wrapper bg-white py-3 dir-rtl">
                <div class="container">
                    <div class="rating-review-content pt-1">
                        <ul class="ps-0">

                            <?php
                            $ulasan = mysqli_query($conn, "SELECT * FROM ulasan_produk WHERE id_produk = '$id' ORDER BY waktu DESC");
                            $cekulasan = mysqli_num_rows($ulasan);
                            if ($cekulasan > 0) {
                                while ($ul = mysqli_fetch_array($ulasan)) {
                                    $id_user = $ul['id_user'];
                                    $usr = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id_user'");
                                    $vuser = mysqli_fetch_array($usr);
                                    ?>
                                    <!-- Single User Review -->
                                    <li class="single-user-review d-flex">
                                        <div class="user-thumbnail">
                                        <?php if ($vuser['foto'] != null || $vuser['foto'] != "") { ?>
                                                    <img src="img/user-image/<?php echo $vuser['foto'] ?>" alt="">
                                                <?php } else { ?>
                                                    <img src="img/user-image/avatar.svg" alt="">
                                                <?php } ?>
                                        </div>
                                        <div class="rating-comment">
                                            <div class="rating">
                                                <?php $bintang = 0; ?>
                                                <?php while ($bintang < $ul['bintang']) { ?>
                                                    <i class="fa-solid fa-star"></i>
                                                    <?php $bintang += 1;
                                                } ?>
                                            </div>
                                            <small class="text-dark">
                                                <?php echo $vuser['nama'] ?>
                                            </small>
                                            <p class="comment mb-0">
                                                <?php echo $ul['ulasan'] ?>
                                            </p>
                                            <span class="name-date d-flex">
                                                <div>
                                                    <?php echo $ul['waktu'] ?>
                                                </div>
                                                <div class="mx-1"></div>
                                                <div>
                                                    <?php echo $ul['tgl'] ?>
                                                </div>
                                            </span>
                                            <!-- <a class="review-image mt-2 border rounded" href="img/product/3.png"><img
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            class="rounded-3" src="img/product/3.png" alt=""></a> -->
                                        </div>
                                    </li>

                                <?php } ?>

                            <?php } else { ?>
                                <span class="btn btn-outline-secondary w-100 border disabled text-dark">Belum ada
                                    ulasan</span>
                            <?php } ?>
                        </ul>
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