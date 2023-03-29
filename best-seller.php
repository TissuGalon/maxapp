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
            <!-- Page Title-->
            <div class="page-heading">
                <h6 class="mb-0">Featured Products</h6>
            </div>
            <!-- Filter Option-->
            <div class="filter-option ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaFilterOffcanvas"
                aria-controls="suhaFilterOffcanvas"><i class="fa-solid fa-sliders"></i></div>
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
    <div class="page-content-wrapper">
        <div class="py-3">
            <div class="container">
                <div class="row g-2 rtl-flex-d-row-r">
                    <!-- Featured Product Card-->
                    <div class="col-4">
                        <div class="card featured-product-card">
                            <div class="card-body">
                                <!-- Badge--><span class="badge badge-warning custom-badge"><i
                                        class="fa-solid fa-star"></i></span>
                                <div class="product-thumbnail-side">
                                    <!-- Thumbnail --><a class="product-thumbnail d-block"
                                        href="single-product.html"><img src="img/product/14.png" alt=""></a>
                                </div>
                                <div class="product-description">
                                    <!-- Product Title --><a class="product-title d-block"
                                        href="single-product.html">Blue Skateboard</a>
                                    <!-- Price -->
                                    <p class="sale-price">$39<span>$89</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Featured Product Card-->
                    <div class="col-4">
                        <div class="card featured-product-card">
                            <div class="card-body">
                                <!-- Badge--><span class="badge badge-warning custom-badge"><i
                                        class="fa-solid fa-star"></i></span>
                                <div class="product-thumbnail-side">
                                    <!-- Thumbnail --><a class="product-thumbnail d-block"
                                        href="single-product.html"><img src="img/product/15.png" alt=""></a>
                                </div>
                                <div class="product-description">
                                    <!-- Product Title --><a class="product-title d-block"
                                        href="single-product.html">Travel Bag</a>
                                    <!-- Price -->
                                    <p class="sale-price">$14.7<span>$21</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Featured Product Card-->
                    <div class="col-4">
                        <div class="card featured-product-card">
                            <div class="card-body">
                                <!-- Badge--><span class="badge badge-warning custom-badge"><i
                                        class="fa-solid fa-star"></i></span>
                                <div class="product-thumbnail-side">
                                    <!-- Thumbnail --><a class="product-thumbnail d-block"
                                        href="single-product.html"><img src="img/product/16.png" alt=""></a>
                                </div>
                                <div class="product-description">
                                    <!-- Product Title --><a class="product-title d-block"
                                        href="single-product.html">Cotton T-shirts</a>
                                    <!-- Price -->
                                    <p class="sale-price">$3.69<span>$5</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Featured Product Card-->
                    <div class="col-4">
                        <div class="card featured-product-card">
                            <div class="card-body">
                                <!-- Badge--><span class="badge badge-warning custom-badge"><i
                                        class="fa-solid fa-star"></i></span>
                                <div class="product-thumbnail-side">
                                    <!-- Thumbnail --><a class="product-thumbnail d-block"
                                        href="single-product.html"><img src="img/product/21.png" alt=""></a>
                                </div>
                                <div class="product-description">
                                    <!-- Product Title --><a class="product-title d-block"
                                        href="single-product.html">ECG Rice Cooker</a>
                                    <!-- Price -->
                                    <p class="sale-price">$9.33<span>$13</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Featured Product Card-->
                    <div class="col-4">
                        <div class="card featured-product-card">
                            <div class="card-body">
                                <!-- Badge--><span class="badge badge-warning custom-badge"><i
                                        class="fa-solid fa-star"></i></span>
                                <div class="product-thumbnail-side">
                                    <!-- Thumbnail --><a class="product-thumbnail d-block"
                                        href="single-product.html"><img src="img/product/20.png" alt=""></a>
                                </div>
                                <div class="product-description">
                                    <!-- Product Title --><a class="product-title d-block"
                                        href="single-product.html">Beauty Cosmetics</a>
                                    <!-- Price -->
                                    <p class="sale-price">$5.99<span>$8</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Featured Product Card-->
                    <div class="col-4">
                        <div class="card featured-product-card">
                            <div class="card-body">
                                <!-- Badge--><span class="badge badge-warning custom-badge"><i
                                        class="fa-solid fa-star"></i></span>
                                <div class="product-thumbnail-side">
                                    <!-- Thumbnail --><a class="product-thumbnail d-block"
                                        href="single-product.html"><img src="img/product/19.png" alt=""></a>
                                </div>
                                <div class="product-description">
                                    <!-- Product Title --><a class="product-title d-block"
                                        href="single-product.html">Basketball</a>
                                    <!-- Price -->
                                    <p class="sale-price">$16<span>$20</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Featured Product Card-->
                    <div class="col-4">
                        <div class="card featured-product-card">
                            <div class="card-body">
                                <!-- Badge--><span class="badge badge-warning custom-badge"><i
                                        class="fa-solid fa-star"></i></span>
                                <div class="product-thumbnail-side">
                                    <!-- Thumbnail --><a class="product-thumbnail d-block"
                                        href="single-product.html"><img src="img/product/14.png" alt=""></a>
                                </div>
                                <div class="product-description">
                                    <!-- Product Title --><a class="product-title d-block"
                                        href="single-product.html">Blue Skateboard</a>
                                    <!-- Price -->
                                    <p class="sale-price">$39<span>$89</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Featured Product Card-->
                    <div class="col-4">
                        <div class="card featured-product-card">
                            <div class="card-body">
                                <!-- Badge--><span class="badge badge-warning custom-badge"><i
                                        class="fa-solid fa-star"></i></span>
                                <div class="product-thumbnail-side">
                                    <!-- Thumbnail --><a class="product-thumbnail d-block"
                                        href="single-product.html"><img src="img/product/15.png" alt=""></a>
                                </div>
                                <div class="product-description">
                                    <!-- Product Title --><a class="product-title d-block"
                                        href="single-product.html">Travel Bag</a>
                                    <!-- Price -->
                                    <p class="sale-price">$14.7<span>$21</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Featured Product Card-->
                    <div class="col-4">
                        <div class="card featured-product-card">
                            <div class="card-body">
                                <!-- Badge--><span class="badge badge-warning custom-badge"><i
                                        class="fa-solid fa-star"></i></span>
                                <div class="product-thumbnail-side">
                                    <!-- Thumbnail --><a class="product-thumbnail d-block"
                                        href="single-product.html"><img src="img/product/16.png" alt=""></a>
                                </div>
                                <div class="product-description">
                                    <!-- Product Title --><a class="product-title d-block"
                                        href="single-product.html">Cotton T-shirts</a>
                                    <!-- Price -->
                                    <p class="sale-price">$3.69<span>$5</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Featured Product Card-->
                    <div class="col-4">
                        <div class="card featured-product-card">
                            <div class="card-body">
                                <!-- Badge--><span class="badge badge-warning custom-badge"><i
                                        class="fa-solid fa-star"></i></span>
                                <div class="product-thumbnail-side">
                                    <!-- Thumbnail --><a class="product-thumbnail d-block"
                                        href="single-product.html"><img src="img/product/21.png" alt=""></a>
                                </div>
                                <div class="product-description">
                                    <!-- Product Title --><a class="product-title d-block"
                                        href="single-product.html">ECG Rice Cooker</a>
                                    <!-- Price -->
                                    <p class="sale-price">$9.33<span>$13</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Featured Product Card-->
                    <div class="col-4">
                        <div class="card featured-product-card">
                            <div class="card-body">
                                <!-- Badge--><span class="badge badge-warning custom-badge"><i
                                        class="fa-solid fa-star"></i></span>
                                <div class="product-thumbnail-side">
                                    <!-- Thumbnail --><a class="product-thumbnail d-block"
                                        href="single-product.html"><img src="img/product/20.png" alt=""></a>
                                </div>
                                <div class="product-description">
                                    <!-- Product Title --><a class="product-title d-block"
                                        href="single-product.html">Beauty Cosmetics</a>
                                    <!-- Price -->
                                    <p class="sale-price">$5.99<span>$8</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Featured Product Card-->
                    <div class="col-4">
                        <div class="card featured-product-card">
                            <div class="card-body">
                                <!-- Badge--><span class="badge badge-warning custom-badge"><i
                                        class="fa-solid fa-star"></i></span>
                                <div class="product-thumbnail-side">
                                    <!-- Thumbnail --><a class="product-thumbnail d-block"
                                        href="single-product.html"><img src="img/product/19.png" alt=""></a>
                                </div>
                                <div class="product-description">
                                    <!-- Product Title --><a class="product-title d-block"
                                        href="single-product.html">Basketball</a>
                                    <!-- Price -->
                                    <p class="sale-price">$16<span>$20</span></p>
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