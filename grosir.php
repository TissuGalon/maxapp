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
                <h6 class="mb-0"><i class="fa-solid fa-store"></i> Grosir</h6>
            </div>
            <!-- Filter Option-->
            <div></div>
            <!-- <div class="filter-option ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaFilterOffcanvas"
                aria-controls="suhaFilterOffcanvas"><i class="fa-solid fa-sliders"></i></div> -->
        </div>
    </div>
    
    <div class="page-content-wrapper">
        
        <!-- Catagory Banner-->
        <div class="pt-3">
            <div class="container">
                <div class="catagory-single-img" style="background-image: url('img/grosir-banner.webp')"></div>
            </div>
        </div>
        


        <!-- Product Catagories-->
        <!-- <div class="product-catagories-wrapper py-3">
            <div class="container">
                <div class="section-heading rtl-text-right">
                    <h6>Sub Jenis</h6>
                </div>
                <div class="product-catagory-wrap">
                    <div class="row g-2 rtl-flex-d-row-r">



                       <?php if(isset($_GET['sub']) && $_GET['sub'] == 'Makanan'){ ?>

                        <div class="col-3">
                            <div class="card catagory-card bg-warning" >
                                <div class="card-body px-2"><a href="makanan_minuman.php"><img src="img/food.png"
                                            alt=""><span class="text-light">Makanan</span></a>
                                </div>
                            </div>
                        </div>

                       <?php }else{ ?>

                        <div class="col-3">
                            <div class="card catagory-card" >
                                <div class="card-body px-2"><a href="makanan_minuman.php?sub=Makanan"><img src="img/food.png"
                                            alt=""><span>Makanan</span></a>
                                </div>
                            </div>
                        </div>

                       <?php } ?>
                        

                       <?php if(isset($_GET['sub']) && $_GET['sub'] == 'Minuman'){ ?>

                        <div class="col-3">
                            <div class="card catagory-card bg-warning">
                                <div class="card-body px-2"><a href="makanan_minuman.php"><img src="img/drink.png"
                                            alt=""><span class="text-light">Minuman</span></a>
                                </div>
                            </div>
                        </div>

                        <?php }else{ ?>

                            <div class="col-3">
                            <div class="card catagory-card">
                                <div class="card-body px-2"><a href="makanan_minuman.php?sub=Minuman"><img src="img/drink.png"
                                            alt=""><span>Minuman</span></a>
                                </div>
                            </div>
                        </div>

                        <?php } ?>


                    </div>
                </div>
            </div>
        </div> -->

        <div class="my-3"></div>

        <!-- Top Products-->
        <div class="top-products-area card">
            <div class="container pt-4">
                <div class="section-heading rtl-text-right">
                    <h6>Products</h6>
                </div>
                <div class="row g-2 rtl-flex-d-row-r mb-3">

                    <?php
                    if(isset($_GET['sub']) && $_GET['sub'] == 'Makanan'){
                        $produk = mysqli_query($conn, "SELECT * FROM produk WHERE sub_jenis='Makanan' AND hapus = 'false'");
                    }else if(isset($_GET['sub']) && $_GET['sub'] == 'Minuman'){
                        $produk = mysqli_query($conn, "SELECT * FROM produk WHERE sub_jenis='Minuman' AND hapus = 'false'");
                    }else{
                        $produk = mysqli_query($conn, "SELECT * FROM produk WHERE jenis='grosir' AND hapus = 'false'");
                    }
                    ?>


                    <?php
                    $jml = mysqli_num_rows($produk);
                    while ($p = mysqli_fetch_array($produk)) {
                        $idm = $p['id_merchant'];
                        $toko1 = mysqli_query($conn, "SELECT * FROM merchant WHERE id_merchant = '$idm'");
                        $toko = mysqli_fetch_array($toko1);
                        ?>
                        <!-- Product Card -->
                        <div class="col-6 col-md-4">
                            <div class="card product-card">
                                <div class="card-body">
                                    <!-- Badge-->
                                    <!-- <span class="badge rounded-pill badge-warning">Sale</span> -->
                                    <!-- Wishlist Button-->
                                    <!-- <a class="wishlist-btn" href="#"><i class="fa-solid fa-heart"></i></a> -->
                                    <!-- Thumbnail -->
                                    <a class="product-thumbnail d-block"
                                        href="produk.php?id=<?php echo $p['id_produk'] ?>">
                                        <div style="overflow:hidden;width:100%;height:100%;" class="mb-2 rounded shadow-sm">
                                           <!-- GAMBAR -->
            <div class="" style="height:130px;width:100%;overflow:hidden;border-radius:8px; background-position: center; background-size:cover;
  background-repeat: no-repeat; background-image: url('img/product/<?php echo $p['gambar'] ?>')">
            </div>    
            <!-- GAMBAR -->

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
                                    <small class="text-danger"><small class="fa-solid fa-shop me-1"></small> <?php echo $toko['nama'] ?></small><br>
                                    <small class="text-dark"
                                        href="produk.php?id=<?php echo $p['id_produk'] ?>">
                                        <?php echo $p['nama_produk'] ?>
                                    </small>
                                    <!-- Product Price -->
                                    <br>
                                    <small class="">Rp.
                                    <?php echo number_format($p['harga'],2,",",".") ?><span></span>
                                    </small>
                                    <!-- Rating -->
                                    <div class="product-rating">
                                        <?php $bintang = 0;
                                        while ($bintang < $p['bintang']) { ?>
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

                    <?php if($jml <= 0){?>
                        <a class="w-100 btn btn-light disabled">Coming Soon</a>
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