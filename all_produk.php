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
                <h6 class="mb-0">Semua Produk</h6>
            </div>
            <!-- Filter Option-->
            <br>
            <!-- <div class="filter-option ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaFilterOffcanvas"
                aria-controls="suhaFilterOffcanvas"><i class="fa-solid fa-sliders"></i></div> -->
        </div>
    </div>
    <div class="offcanvas offcanvas-start suha-filter-offcanvas-wrap" tabindex="-1" id="suhaFilterOffcanvas"
        aria-labelledby="suhaFilterOffcanvasLabel">
        <!-- Close button-->
        <button class="btn-close text-reset" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <!-- Offcanvas body-->
        <div class="offcanvas-body py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Catagory-->
                        <div class="widget catagory mb-4">
                            <h6 class="widget-title mb-2">Brand</h6>
                            <div class="widget-desc">
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="zara" type="checkbox" checked>
                                    <label class="form-check-label" for="zara">Zara</label>
                                </div>
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="Gucci" type="checkbox">
                                    <label class="form-check-label" for="Gucci">Gucci</label>
                                </div>
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="Addidas" type="checkbox">
                                    <label class="form-check-label" for="Addidas">Addidas</label>
                                </div>
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="Nike" type="checkbox">
                                    <label class="form-check-label" for="Nike">Nike</label>
                                </div>
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="Denim" type="checkbox">
                                    <label class="form-check-label" for="Denim">Denim</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <!-- Color-->
                        <div class="widget color mb-4">
                            <h6 class="widget-title mb-2">Color Family</h6>
                            <div class="widget-desc">
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="Purple" type="checkbox" checked>
                                    <label class="form-check-label" for="Purple">Purple</label>
                                </div>
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="Black" type="checkbox">
                                    <label class="form-check-label" for="Black">Black</label>
                                </div>
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="White" type="checkbox">
                                    <label class="form-check-label" for="White">White</label>
                                </div>
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="Red" type="checkbox">
                                    <label class="form-check-label" for="Red">Red</label>
                                </div>
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="Pink" type="checkbox">
                                    <label class="form-check-label" for="Pink">Pink</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <!-- Size-->
                        <div class="widget size mb-4">
                            <h6 class="widget-title mb-2">Size</h6>
                            <div class="widget-desc">
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="XtraLarge" type="checkbox" checked>
                                    <label class="form-check-label" for="XtraLarge">Xtra Large</label>
                                </div>
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="Large" type="checkbox">
                                    <label class="form-check-label" for="Large">Large</label>
                                </div>
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="medium" type="checkbox">
                                    <label class="form-check-label" for="medium">Medium</label>
                                </div>
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="Small" type="checkbox">
                                    <label class="form-check-label" for="Small">Small</label>
                                </div>
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="ExtraSmall" type="checkbox">
                                    <label class="form-check-label" for="ExtraSmall">Extra Small</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <!-- Ratings-->
                        <div class="widget ratings mb-4">
                            <h6 class="widget-title mb-2">Ratings</h6>
                            <div class="widget-desc">
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="5star" type="checkbox" checked>
                                    <label class="form-check-label" for="5star"><i
                                            class="fa-solid fa-star text-warning"></i><i
                                            class="fa-solid fa-star text-warning"></i><i
                                            class="fa-solid fa-star text-warning"></i><i
                                            class="fa-solid fa-star text-warning"></i><i
                                            class="fa-solid fa-star text-warning"></i></label>
                                </div>
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="4star" type="checkbox">
                                    <label class="form-check-label" for="4star"><i
                                            class="fa-solid fa-star text-warning"></i><i
                                            class="fa-solid fa-star text-warning"></i><i
                                            class="fa-solid fa-star text-warning"></i><i
                                            class="fa-solid fa-star text-warning"></i><i
                                            class="fa-solid fa-star text-secondary"></i></label>
                                </div>
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="3star" type="checkbox">
                                    <label class="form-check-label" for="3star"><i
                                            class="fa-solid fa-star text-warning"></i><i
                                            class="fa-solid fa-star text-warning"></i><i
                                            class="fa-solid fa-star text-warning"></i><i
                                            class="fa-solid fa-star text-secondary"></i><i
                                            class="fa-solid fa-star text-secondary"></i></label>
                                </div>
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="2star" type="checkbox">
                                    <label class="form-check-label" for="2star"><i
                                            class="fa-solid fa-star text-warning"></i><i
                                            class="fa-solid fa-star text-warning"></i><i
                                            class="fa-solid fa-star text-secondary"></i><i
                                            class="fa-solid fa-star text-secondary"></i><i
                                            class="fa-solid fa-star text-secondary"></i></label>
                                </div>
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="1star" type="checkbox">
                                    <label class="form-check-label" for="1star"><i
                                            class="fa-solid fa-star text-warning"></i><i
                                            class="fa-solid fa-star text-secondary"></i><i
                                            class="fa-solid fa-star text-secondary"></i><i
                                            class="fa-solid fa-star text-secondary"></i><i
                                            class="fa-solid fa-star text-secondary"></i></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <!-- Payment Type-->
                        <div class="widget payment-type mb-4">
                            <h6 class="widget-title mb-2">Payment Type</h6>
                            <div class="widget-desc">
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="cod" type="checkbox" checked>
                                    <label class="form-check-label" for="cod">Cash On Delivery</label>
                                </div>
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="paypal" type="checkbox">
                                    <label class="form-check-label" for="paypal">Paypal</label>
                                </div>
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="checkpayment" type="checkbox">
                                    <label class="form-check-label" for="checkpayment">Check Payment</label>
                                </div>
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="payonner" type="checkbox">
                                    <label class="form-check-label" for="payonner">Payonner</label>
                                </div>
                                <!-- Single Checkbox-->
                                <div class="form-check">
                                    <input class="form-check-input" id="mobbanking" type="checkbox">
                                    <label class="form-check-label" for="mobbanking">Mobile Banking</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <!-- Price Range-->
                        <div class="widget price-range mb-4">
                            <h6 class="widget-title mb-2">Price Range</h6>
                            <div class="widget-desc">
                                <!-- Min Value-->
                                <div class="row g-3">
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input class="form-control" id="floatingInput" type="text" placeholder="1"
                                                value="1">
                                            <label for="floatingInput">Min</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input class="form-control" id="floatingInput" type="text" placeholder="1"
                                                value="5000">
                                            <label for="floatingInput">Max</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <!-- Apply Filter-->
                        <div class="apply-filter-btn"><a class="btn btn-success w-100" href="">Apply Filter</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="py-3"></div>

    <!-- Top Products -->
    <div class="top-products-area  container rounded" style="/* From https://css.glass */
background: rgba(255, 255, 255, 0.44);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(7.6px);
-webkit-backdrop-filter: blur(7.6px);
border: 1px solid rgba(255, 255, 255, 0.52);">
      <div class="container px-0 mb-3">
        <div class="section-heading d-flex align-items-center justify-content-between dir-rtl">
          
        </div>
<br>
        <div class="row g-2 ">

          <?php
          $all = mysqli_query($conn, "SELECT * FROM produk WHERE hapus = 'false'");
          while ($view = mysqli_fetch_array($all)) {
            $idm = $view['id_merchant'];
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

                  <!-- <a class="wishlist-btn" href="#"><i class="fa-solid fa-heart"> </i></a> -->

                  <!-- Thumbnail -->
                  <a class="product-thumbnail d-block" href="produk.php?id=<?php echo $view['id_produk'] ?>">
                  <div style=" overflow:hidden; height:100%;width:100%;" class="rounded mb-2">
                  <!-- GAMBAR -->
            <div class="" style="height:130px;width:100%;overflow:hidden;border-radius:8px; background-position: center; background-size:cover;
  background-repeat: no-repeat; background-image: url('img/product/<?php echo $view['gambar'] ?>')">
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
                    <small class="fa-solid fa-store me-1"></small><?php echo $toko['nama'] ?>
                  </small>
                  
                  <?php if($toko['partner'] == 'true'){ ?>
                  <small class="text-success">
                    <img src="img/ongkir.png" style="width:auto; height:15px;">
                  </small>
                  <?php } ?>

                  </div>
                                    <small class="text-dark"
                                        href="produk.php?id=<?php echo $view['id_produk'] ?>">
                                        <?php echo $view['nama_produk'] ?>
                                    </small>
                                    <!-- Product Price -->
                                    <br>
                                    <small class="">Rp.
                                    <?php echo number_format($view['harga'],2,",",".") ?><span></span>
                                    </small>
                  <!-- Rating -->
                  <div class="product-rating">
                  
                    <?php
                    $idp = $view['id_produk'];
                    $qb = mysqli_query($conn, "SELECT AVG(bintang) FROM `ulasan_produk` WHERE id_produk = '$idp'");
                    $brow = mysqli_fetch_array($qb);
                    $bintang = 0;
                    while ($bintang < $brow[0]) { ?>
                      <i class="fa-solid fa-star"></i>
                      <?php $bintang += 1;
                    }
                    ?>

                  </div>
                  <!-- Add to Cart -->
                  <!-- <a class="btn btn-success btn-sm" href="#">
                    <i class="fa-solid fa-plus"></i></a> -->
                </div>
              </div>
            </div>
          <?php } ?>



        </div>
      </div>
    </div>

    <div class="py-4"></div>

     
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