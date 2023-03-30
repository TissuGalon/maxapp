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
            <div></div>
            <!-- Page Title-->
            <div class="page-heading">
                <h6 class="mb-0">Toko Saya</h6>
            </div>
            <!-- Navbar Toggler-->
            <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas"
                aria-controls="suhaOffcanvas">
                <div><span></span><span></span><span></span></div>
            </div>
        </div>
    </div>

    <?php include 'sidebar.php' ?>


    <?php
    $idm = $_SESSION['toko'];
    $kueri = mysqli_query($conn, "SELECT * FROM merchant WHERE id_merchant ='$idm'");
    $produk = mysqli_query($conn, "SELECT * FROM produk WHERE id_merchant = '$idm' AND hapus = 'false'");
    $jml_produk = mysqli_num_rows($produk);
    $row = mysqli_fetch_array($kueri);
    ?>


    <div class="page-content-wrapper pb-3">
        <!-- Vendor Details Wrap -->
        <div class="vendor-details-wrap bg-img bg-overlay py-4"
            style="background-image: url('img/bg-img/15.jpg'); background-size: 800px 533px;">
            <div class="container">
                <div class="d-flex align-items-start">
                    <!-- Vendor Profile-->
                    <div class="vendor-profile shadow me-3 mt-1">
                        <figure class="m-0"><img src="img/merchant-image/<?php echo $row['avatar'] ?>" alt=""></figure>
                    </div>
                    <!-- Vendor Info-->
                    <div class="vendor-info">
                        <div class="d-flex">
                            <h5 class="vendor-title text-white">
                                <?php echo $row['nama'] ?>
                            </h5>
                            <div class="mx-5"></div>
                            <a class="btn btn-primary btn-sm py-2" href="edit-toko.php">Edit
                                Toko <i
                                    class="fa-solid fa-pencil ms-1"></i></a>
                        </div>
                        <p class="mb-1 text-white"><i class="fa-solid fa-location-dot me-1"></i>
                            <?php echo $row['lokasi'] ?>
                        </p>
                        <div class="ratings lh-1">
                            <?php
                            $starav = mysqli_query($conn, "SELECT AVG(bintang) AS avg FROM ulasan_produk WHERE id_merchant='$idm'");
                            $vstar = mysqli_fetch_array($starav);
                            $s = round($vstar[0]);
                            for ($i = 1; $i <= $s; $i++) {
                                ?>
                                <i class="fa-solid fa-star"></i>
                            <?php } ?>
                            <span class="text-white">( Rata - rata Ulasan )</span>
                        </div>
                    </div>
                </div>
                <!-- Vendor Basic Info-->
                <div class="vendor-basic-info d-flex align-items-center justify-content-between mt-4">
                    <div class="single-basic-info">
                        <?php
                        if ($row['partner'] == 'true') {
                            ?>
                            <div class="icon"><i class="fa-solid fa-certificate text-success me-1"></i></div><span class="text-light">Max Partner</span>
                        <?php } ?>

                    </div>
                    <div class="single-basic-info">
                        <div class="icon"><i class="fa-solid fa-bag-shopping me-1"></i></div><span>
                            <?php echo $jml_produk ?> Produk
                        </span>
                    </div>
                    <div class="single-basic-info">
                        <?php
                        $cek_ulasan = mysqli_query($conn, "SELECT * FROM ulasan_produk WHERE id_merchant='$idm'");
                        $jml_ulasan = mysqli_num_rows($cek_ulasan);
                        ?>
                        <div class="icon"><i class="fa-solid fa-star me-1"></i></div><span>
                            <?php echo $jml_ulasan ?> Ulasan
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vendor Tabs -->
        <div class="vendor-tabs">
            <div class="container">
                <ul class="nav nav-tabs  py-2" id="vendorTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                            role="tab" aria-controls="home" aria-selected="true">Tentang</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="products-tab" data-bs-toggle="tab"
                            data-bs-target="#products" type="button" role="tab" aria-controls="products"
                            aria-selected="false">Produk</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                            type="button" role="tab" aria-controls="reviews" aria-selected="false">Rating &amp;
                            Ulasan</button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="vendorTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="container px-0 mt-1">
                    <div class="card">
                        <div class="card-body about-content-wrap dir-rtl">

                            <?php echo $row['text_bio'] ?>

                            <!-- <h6>Welcome to our shop gallery.</h6>
                            <p>A versatile e-commerce shop template. It is very nicely designed with modern features
                                &amp; coded with the latest technology.</p>
                            <ul class="mb-3 ps-3">
                                <li><i class="fa-solid fa-circle-check me-1"></i>Trusted Seller</li>
                                <li><i class="fa-solid fa-circle-check me-1"></i>100+ Items</li>
                                <li><i class="fa-solid fa-circle-check me-1"></i>98% Ship On Time</li>
                            </ul>
                            <p>It nicely views on all devices with smartphones, tablets, laptops &amp; desktops.</p><img
                                class="mb-3 rounded" src="img/bg-img/16.jpg" alt="">
                            <p>A versatile e-commerce shop template. It is very nicely designed with modern features
                                &amp; coded with the latest technology.</p>
                            <p>It nicely views on all devices with smartphones, tablets, laptops &amp; desktops.</p>
                            <h6>Need Help?</h6>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus sint reiciendis minima
                                iusto ex beatae.</p> -->

                            <!-- <div class="contact-btn-wrap text-center">
                                <p class="mb-2">For more information, submit a request.</p><a
                                    class="btn btn-primary w-100" href="contact.html"><i
                                        class="fa-solid fa-life-ring me-2"></i>Submit A Query</a>
                            </div> -->

                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show active bg-light mt-1" id="products" role="tabpanel" aria-labelledby="products-tab">
                <div class="container px-0 py-3">
                    <a class="btn btn-warning text-light w-100 mb-3" href="myproduk.php"><i
                            class="fa-solid fa-pencil me-2"></i> Update Produk
                    </a>

                    <div class="row g-2 rtl-flex-d-row-r">

                        <?php
                        while ($vw = mysqli_fetch_array($produk)) {
                            ?>

                            <!-- ----------PRODUK------------- -->
                            <!-- Product Card -->
            <div class="col-6 col-md-4">
              <div class="card product-card">
                <div class="card-body">
                  <!-- Badge-->
                  <!-- <span class="badge rounded-pill badge-warning">Sale</span> -->
                  <!-- Wishlist Button-->

                  <!-- <a class="wishlist-btn" href="#"><i class="fa-solid fa-heart"> </i></a> -->

                  <!-- Thumbnail -->
                  <a class="product-thumbnail d-block" href="produk.php?id=<?php echo $vw['id_produk'] ?>">
                  <div style=" overflow:hidden; height:100%;width:100%;" class="rounded mb-2">
                  <!-- GAMBAR -->
            <div class="" style="height:130px;width:100%;overflow:hidden;border-radius:8px; background-position: center; background-size:cover;
  background-repeat: no-repeat; background-image: url('img/product/<?php echo $vw['gambar'] ?>')">
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
                  <!-- <small class=""><i class="fa-solid fa-shop"></i> gg</small> -->
                  <!-- Product Title -->

                  <div class="d-flex justify-content-between mb-2 mt-1">
                  <small class="text-danger">
                    <small class="fa-solid fa-store me-1"></small><?php echo $row['nama'] ?>
                  </small>
                  
                  <?php if($row['partner'] == 'true'){ ?>
                  <small class="text-success">
                    <img src="img/ongkir.png" style="width:auto; height:15px;">
                  </small>
                  <?php } ?>

                  </div>
                                    <small class="text-dark"
                                        href="produk.php?id=<?php echo $vw['id_produk'] ?>">
                                        <?php echo $vw['nama_produk'] ?>
                                    </small>
                                    <!-- Product Price -->
                                    <br>
                                    <small class="">Rp.
                                    <?php echo number_format($vw['harga'],2,",",".") ?><span></span>
                                    </small>


                  <!-- Rating -->
                  <div class="product-rating">
                    <?php
                    $idp = $vw['id_produk'];
                    $qb = mysqli_query($conn, "SELECT AVG(bintang) FROM `ulasan_produk` WHERE id_produk = '$idp'");
                    $brow = mysqli_fetch_array($qb);
                    $bintang = 0;
                    while ($bintang < $brow[0]) { ?>
                      <i class="fa-solid fa-star"></i>
                      <?php $bintang += 1;
                    }
                    ?>
                  </div>
                  <!-- Rating -->



                  <!-- Add to Cart -->
                  <!-- <a class="btn btn-success btn-sm" href="#">
                    <i class="fa-solid fa-plus"></i></a> -->
                </div>
              </div>
            </div>
                            <!-- ----------PRODUK------------- -->
                            
                            
                        <?php } ?>



                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                <!-- Rating & Review Wrapper -->
                <div class="rating-and-review-wrapper bg-white py-3 mt-1 mb-1 dir-rtl">
                    <div class="container">
                        <div class="rating-review-content">
                            <ul class="ps-0">

                                <?php

                                $ulasan = mysqli_query($conn, "SELECT * FROM ulasan_produk WHERE id_merchant = '$idm' ORDER BY waktu DESC LIMIT 20 ");
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
                                                    <!-- GAMBAR -->
            <div class="" style="height:40px;width:40px;overflow:hidden;border-radius:50%; background-position: center; background-size:cover;
  background-repeat: no-repeat; background-image: url('img/user-image/<?php echo $vuser['foto'] ?>')">
            </div>    
            <!-- GAMBAR -->
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

                                    <!--  <a class="btn btn-warning text-light w-100">Lihat Seluruh Ulasan
                                                                                                                                                                                                                                                        </a> -->
                                <?php } else { ?>
                                    <span class="btn btn-outline-secondary w-100 border disabled text-dark">Belum ada
                                        ulasan</span>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Ratings Submit Form-->

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