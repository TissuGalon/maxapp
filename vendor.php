<?php session_start();
include 'koneksi.php'; ?>
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
            <!-- Page Title-->
            <div class="page-heading">
                <h6 class="mb-0">Merchant</h6>
            </div>
            <!-- Navbar Toggler-->
            <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas"
                aria-controls="suhaOffcanvas">
                <div><span></span><span></span><span></span></div>
            </div>
        </div>
    </div>

    <?php include 'sidebar.php' ?>

    <div class="page-content-wrapper py-3">
        <div class="container">
            <div class="row gy-3">
                <div class="col-12">
                    <!-- Single Vendor -->
                    <div class="single-vendor-wrap bg-img p-4 bg-overlay"
                        style="background-image: url('img/bg-img/12.jpg')">
                        <h5 class="vendor-title text-white">Designing World</h5>
                        <div class="vendor-info">
                            <p class="mb-1 text-white"><i class="fa-solid fa-location-dot me-1"></i>Dhaka, Bangladesh
                            </p>
                            <div class="ratings lh-1"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><span class="text-white">(99% Positive Seller)</span>
                            </div>
                        </div><a class="btn btn-warning btn-sm mt-3" href="vendor-shop.html">Go To Store<i
                                class="fa-solid fa-arrow-right-long ms-1"></i></a>
                        <!-- Vendor Profile-->
                        <div class="vendor-profile shadow">
                            <figure class="m-0"><img src="img/product/dw.png" alt=""></figure>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <!-- Single Vendor -->
                    <div class="single-vendor-wrap bg-img p-4 bg-overlay"
                        style="background-image: url('img/bg-img/16.jpg')">
                        <h5 class="vendor-title text-white">Stylie Wear</h5>
                        <div class="vendor-info">
                            <p class="mb-1 text-white"><i class="fa-solid fa-location-dot me-1"></i>Dhaka, Bangladesh
                            </p>
                            <div class="ratings lh-1"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><span class="text-white">(99% Positive Seller)</span>
                            </div>
                        </div><a class="btn btn-warning btn-sm mt-3" href="vendor-shop.html">Go To Store<i
                                class="fa-solid fa-arrow-right-long ms-1"></i></a>
                        <!-- Vendor Profile-->
                        <div class="vendor-profile shadow">
                            <figure class="m-0"><img src="img/product/stylie.png" alt=""></figure>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <!-- Single Vendor -->
                    <div class="single-vendor-wrap bg-img p-4 bg-overlay"
                        style="background-image: url('img/bg-img/14.jpg')">
                        <h5 class="vendor-title text-white">Suha</h5>
                        <div class="vendor-info">
                            <p class="mb-1 text-white"><i class="fa-solid fa-location-dot me-1"></i>Dhaka, Bangladesh
                            </p>
                            <div class="ratings lh-1"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><span class="text-white">(99% Positive Seller)</span>
                            </div>
                        </div><a class="btn btn-warning btn-sm mt-3" href="vendor-shop.html">Go To Store<i
                                class="fa-solid fa-arrow-right-long ms-1"></i></a>
                        <!-- Vendor Profile-->
                        <div class="vendor-profile shadow">
                            <figure class="m-0"><img src="img/core-img/logo-small.png" alt=""></figure>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <!-- Single Vendor -->
                    <div class="single-vendor-wrap bg-img p-4 bg-overlay"
                        style="background-image: url('img/bg-img/15.jpg')">
                        <h5 class="vendor-title text-white">Affan</h5>
                        <div class="vendor-info">
                            <p class="mb-1 text-white"><i class="fa-solid fa-location-dot me-1"></i>Dhaka, Bangladesh
                            </p>
                            <div class="ratings lh-1"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><span class="text-white">(99% Positive Seller)</span>
                            </div>
                        </div><a class="btn btn-warning btn-sm mt-3" href="vendor-shop.html">Go To Store<i
                                class="fa-solid fa-arrow-right-long ms-1"></i></a>
                        <!-- Vendor Profile-->
                        <div class="vendor-profile shadow">
                            <figure class="m-0"><img src="img/product/affan.png" alt=""></figure>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <!-- Single Vendor -->
                    <div class="single-vendor-wrap bg-img p-4 bg-overlay"
                        style="background-image: url('img/bg-img/17.jpg')">
                        <h5 class="vendor-title text-white">News Ten</h5>
                        <div class="vendor-info">
                            <p class="mb-1 text-white"><i class="fa-solid fa-location-dot me-1"></i>Dhaka, Bangladesh
                            </p>
                            <div class="ratings lh-1"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><span class="text-white">(99% Positive Seller)</span>
                            </div>
                        </div><a class="btn btn-warning btn-sm mt-3" href="vendor-shop.html">Go To Store<i
                                class="fa-solid fa-arrow-right-long ms-1"></i></a>
                        <!-- Vendor Profile-->
                        <div class="vendor-profile shadow">
                            <figure class="m-0"><img src="img/product/newsten.png" alt=""></figure>
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