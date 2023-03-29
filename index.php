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


  <!-- Header Area -->
  <div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between d-flex rtl-flex-d-row-r px-0">
      <!-- Logo Wrapper -->

      <!-- Search Form-->
      <div class="w-100" onclick="mencari()">
        <div class="search-form d-flex w-100">
          <form action="#" method="">
            <input class="form-control  bg-white w-100" type="search" placeholder="Search in MaxApp">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
          <!-- <a class="btn btn-warning text-light m-2"><i class="fa-solid fa-magnifying-glass"></i></a> -->
        </div>
      </div>

      <script>
        function mencari(){
          window.location.href = 'pencarian.php';
        }
      </script>


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


  <?php
  if(isset($_SESSION['iduser'])){
    $id_user = $_SESSION['iduser'];
    $kueri = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'");
    $row = mysqli_fetch_array($kueri);

    if($row['nama'] == '' || $row['nama'] == null || $row['nohp'] == '' || $row['nohp'] == null || $row['foto'] == '' || $row['foto'] == null || $row['alamat'] == '' || $row['alamat'] == null){ ?>
    <script>
      Swal.fire({
      title: 'Hai <?php echo $row['username'] ?> !',
      text: "Mohon Lengkapi data anda untuk menikmati layanan",
      icon: 'info',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#757474',
      confirmButtonText: 'Lengkapi sekarang',
      cancelButtonText: 'Nanti saja'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "edit-profile.php";
      }
    })
    </script>
    <?php }
  } ?>
    





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


  <div class="page-content-wrapper">












    <!-- Hero Wrapper -->
    <div class="hero-wrapper">
      <div class="">
        <div class="pt-0">
          
        
        

          <!-- Hero Slides-->
          <div class="hero-slides owl-carousel" id="owl-carousel">
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('img/banner-home/banner1.jpg')">
              <div class="slide-content h-100 d-flex align-items-center">
                <!-- <div class="slide-text">
                  <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-duration="1000ms">Amazon
                    Echo</h4>
                  <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-duration="1000ms">3rd
                    Generation, Charcoal</p><a class="btn btn-primary" href="#" data-animation="fadeInUp"
                    data-delay="800ms" data-duration="1000ms">Buy Now</a>
                </div> -->
              </div>
            </div>
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('img/banner-home/banner2.jpg')">
              <div class="slide-content h-100 d-flex align-items-center">
                <!-- <div class="slide-text">
                  <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-duration="1000ms">Light
                    Candle</h4>
                  <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-duration="1000ms">Now only $22
                  </p><a class="btn btn-success" href="#" data-animation="fadeInUp" data-delay="500ms"
                    data-duration="1000ms">Buy Now</a>
                </div> -->
              </div>
            </div>
            <!-- Single Hero Slide-->
            <div class="single-hero-slide" style="background-image: url('img/banner-home/banner3.jpg')">
              <div class="slide-content h-100 d-flex align-items-center">
                <!-- <div class="slide-text">
                  <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-duration="1000ms">Best
                    Furniture</h4>
                  <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-duration="1000ms">3 years
                    warranty</p><a class="btn btn-danger" href="#" data-animation="fadeInUp" data-delay="800ms"
                    data-duration="1000ms">Buy Now</a>
                </div> -->
              </div>
            </div>

          </div>


          
          <script>
  $(document).ready(function(){
  $('.owl-carousel').owlCarousel({
    loop:true,
    autoplay:true,
    autoplayTimeout:3000, // set autoplay timeout in milliseconds
    autoplayHoverPause:true, // pause autoplay when mouse hovers over carousel
    items:1 // number of items to display at once
  });
});

</script>
          


        </div>
      </div>
    </div>





    <?php if(isset($_SESSION['iduser'])){ ?>


      <?php 
        $wallet = mysqli_query($conn, "SELECT * FROM wallet WHERE id_user = '$id_user'");
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

          $qdompet = mysqli_query($conn, "INSERT INTO wallet (id_user, saldo, alamat_wallet) VALUES ('$id_user', 0, '$alamat_dompet')");
          echo '<script>window.location.href = "index.php"</script>';
        } ?>


<?php } ?>



    <!-- Product Catagories -->
    <div class="product-catagories-wrapper py-3 pt-2">
      <div class="container">
        <div class="row g-2 rtl-flex-d-row-r">


          <!-- <div class="single-hero-slide" style="background-image: url('img/max_delivery.png')">

            <div class="slide-content h-100 d-flex align-items-center">
              <div class="">
                <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-duration="1000ms">

                </h4>
                <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-duration="1000ms">
                </p>
                <br>
                <a class="btn btn-dark text-light mt-5" href="#" data-animation="fadeInUp" data-delay="800ms"
                  data-duration="1000ms">Pesan Sekarang</a>
              </div>
            </div>
          </div> -->








          <!--           <div class="card catagory-card">
            <div class="card-body px-2"><a href="makanan_minuman.php"><img src="img/core-img/grocery.png" alt="">
                <div class='d-flex'>
                  <a class="btn btn-sm btn-warning col-6 text-light mr-1">Delivery</a>
                  <a class="btn btn-sm btn-warning col-6 text-light ml-1">Delivery</a>
                </div>
              </a></div>
          </div> -->




          <!-- Catagory Card -->
          <div class="col-6">
            <div class="card catagory-card" style="background-color:#FDA501;">
              <div class="card-body px-2">
                <a href="max_delivery.php"
                  style="background-image: url('img/max_delivery.png'); background-size: cover; background-position: center;">
                  <span class='text-light py-3'>
                  </span></a>
              </div>
            </div>
          </div>
          <!-- Catagory Card -->
          <div class="col-6">
            <div class="card catagory-card" style="background-color:#FDA501;">
              <div class="card-body px-2">
                <a href="#"
                  style="background-image: url('img/max_laundry.png'); background-size: cover; background-position: center;">
                  <span class='text-light py-3'>
                  </span></a>
              </div>
            </div>
          </div>





          <!-- Catagory Card -->
          <div class="col-3">
            <div class="card catagory-card">
              <div class="card-body px-2"><a href="makanan_minuman.php"><img src="img/2food-drink.png"
                    alt=""><span>Makanan &amp; Minuman</span></a></div>
            </div>
          </div>
          <!-- Catagory Card -->
          <div class="col-3">
            <div class="card catagory-card">
              <div class="card-body px-2"><a href="grosir.php"><img src="img/core-img/grocery.png"
                    alt=""><span>Produk <br> Grosir</span></a></div>
            </div>
          
          </div>
          <!-- Catagory Card -->
          <div class="col-3">
            <div class="card catagory-card">
              <div class="card-body px-2"><a href="kecantikan.php"><img src="img/core-img/shampoo.png"
                    alt=""><span>Produk Kecantikan</span></a></div>
            </div>
          </div>
          <!-- Catagory Card -->
          <!-- <div class="col-3">
            <div class="card catagory-card">
              <div class="card-body px-2"><a href="catagory.html"><img src="img/core-img/rowboat.png"
                    alt=""><span>Sports &amp; Outdoors</span></a></div>
            </div>
          </div> -->
          <!-- Catagory Card -->
          <div class="col-3">
            <div class="card catagory-card">
              <div class="card-body px-2"><a href="obat.php"><img src="img/2medicine.png"
                    alt=""><span>Obat <br> obatan</span></a></div>
            </div>
          </div>
          
          <!-- Catagory Card -->
          <!-- <div class="col-3">
            <div class="card catagory-card">
              <div class="card-body px-2"><a href="catagory.html"><img src="img/core-img/beach.png" alt=""><span>Tour
                    &amp; Travels</span></a></div>
            </div>
          </div>
          
          <div class="col-3">
            <div class="card catagory-card">
              <div class="card-body px-2"><a href="catagory.html"><img src="img/core-img/baby-products.png"
                    alt=""><span>Mother &amp; Baby</span></a></div>
            </div>
          </div> -->
          <!-- Catagory Card -->






        </div>
      </div>
    </div>

    <?php
    /*
    <!-- Flash Sale Slide -->
    <div class="flash-sale-wrapper">
    <div class="container">
    <div class="section-heading d-flex align-items-center justify-content-between rtl-flex-d-row-r">
    <h6 class="d-flex align-items-center rtl-flex-d-row-r"><i
    class="fa-solid fa-bolt-lightning me-1 text-danger lni-flashing-effect"></i>Flash Sale</h6>
    <!-- Please use event time this format: YYYY/MM/DD hh:mm:ss -->
    <ul class="sales-end-timer ps-0 d-flex align-items-center rtl-flex-d-row-r"
    data-countdown="2023/12/31 14:21:59">
    <li><span class="days">0</span>d</li>
    <li><span class="hours">0</span>h</li>
    <li><span class="minutes">0</span>m</li>
    <li><span class="seconds">0</span>s</li>
    </ul>
    </div>
    <!-- Flash Sale Slide-->
    <div class="flash-sale-slide owl-carousel">
    <!-- Flash Sale Card -->
    <div class="card flash-sale-card">
    <div class="card-body"><a href="single-product.html"><img src="img/product/1.png" alt=""><span
    class="product-title">Black Table Lamp</span>
    <p class="sale-price">$7.99<span class="real-price">$15</span></p><span class="progress-title">33%
    Sold</span>
    <!-- Progress Bar-->
    <div class="progress">
    <div class="progress-bar" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0"
    aria-valuemax="100"></div>
    </div>
    </a></div>
    </div>
    <!-- Flash Sale Card -->
    <div class="card flash-sale-card">
    <div class="card-body"><a href="single-product.html"><img src="img/product/2.png" alt=""><span
    class="product-title">Modern Sofa</span>
    <p class="sale-price">$14<span class="real-price">$21</span></p><span class="progress-title">57%
    Sold</span>
    <!-- Progress Bar-->
    <div class="progress">
    <div class="progress-bar" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0"
    aria-valuemax="100"></div>
    </div>
    </a></div>
    </div>
    <!-- Flash Sale Card -->
    <div class="card flash-sale-card">
    <div class="card-body"><a href="single-product.html"><img src="img/product/3.png" alt=""><span
    class="product-title">Classic Garden Chair</span>
    <p class="sale-price">$36<span class="real-price">$49</span></p><span class="progress-title">99%
    Sold</span>
    <!-- Progress Bar-->
    <div class="progress">
    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100"
    aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    </a></div>
    </div>
    <!-- Flash Sale Card -->
    <div class="card flash-sale-card">
    <div class="card-body"><a href="single-product.html"><img src="img/product/1.png" alt=""><span
    class="product-title">Black Table Lamp</span>
    <p class="sale-price">$7.99<span class="real-price">$15</span></p><span class="progress-title">33%
    Sold</span>
    <!-- Progress Bar-->
    <div class="progress">
    <div class="progress-bar" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0"
    aria-valuemax="100"></div>
    </div>
    </a></div>
    </div>
    <!-- Flash Sale Card -->
    <div class="card flash-sale-card">
    <div class="card-body"><a href="single-product.html"><img src="img/product/2.png" alt=""><span
    class="product-title">Modern Sofa</span>
    <p class="sale-price">$14<span class="real-price">$21</span></p><span class="progress-title">57%
    Sold</span>
    <!-- Progress Bar-->
    <div class="progress">
    <div class="progress-bar" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0"
    aria-valuemax="100"></div>
    </div>
    </a></div>
    </div>
    <!-- Flash Sale Card -->
    <div class="card flash-sale-card">
    <div class="card-body"><a href="single-product.html"><img src="img/product/3.png" alt=""><span
    class="product-title">Classic Garden Chair</span>
    <p class="sale-price">$36<span class="real-price">$49</span></p><span class="progress-title">99%
    Sold</span>
    <!-- Progress Bar-->
    <div class="progress">
    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100"
    aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    </a></div>
    </div>
    </div>
    </div>
    </div>
    */?>




    <!-- CTA Area -->
    <!-- <div class="container">
      <div class="cta-text dir-rtl p-4 p-lg-5">
        <div class="row">
          <div class="col-9">
            <h4 class="text-white mb-1">100% Gratis Ongkir</h4>
            <p class="text-white mb-2 opacity-75">Nikmati penawaran gratis ongkir kami untuk seluruh pemesanan produk.
            </p><a class="btn btn-warning" href="#">Pesan Sekarang</a>
          </div>
        </div><img src="img/bg-img/make-up.png" alt="">
      </div>
    </div> -->




    <?php
    /* <!-- Featured Products Wrapper-->
    <div class="featured-products-wrapper py-3 mt-3">
    <div class="container">
    <div class="section-heading d-flex align-items-center justify-content-between dir-rtl">
    <h6>Best Sellers</h6><a class="btn p-0" href="best-seller.php">Lihat Semua<i
    class="ms-1 fa-solid fa-arrow-right-long"></i></a>
    </div>
    <div class="row g-2">
    <!-- Featured Product Card-->
    <div class="col-4">
    <div class="card featured-product-card">
    <div class="card-body">
    <!-- Badge--><span class="badge badge-warning custom-badge"><i class="fa-solid fa-star"></i></span>
    <div class="product-thumbnail-side">
    <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.html"><img
    src="img/product/14.png" alt=""></a>
    </div>
    <div class="product-description">
    <!-- Product Title --><a class="product-title d-block" href="single-product.html">Blue Skateboard</a>
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
    <!-- Badge--><span class="badge badge-warning custom-badge"><i class="fa-solid fa-star"></i></span>
    <div class="product-thumbnail-side">
    <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.html"><img
    src="img/product/15.png" alt=""></a>
    </div>
    <div class="product-description">
    <!-- Product Title --><a class="product-title d-block" href="single-product.html">Travel Bag</a>
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
    <!-- Badge--><span class="badge badge-warning custom-badge"><i class="fa-solid fa-star"></i></span>
    <div class="product-thumbnail-side">
    <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.html"><img
    src="img/product/16.png" alt=""></a>
    </div>
    <div class="product-description">
    <!-- Product Title --><a class="product-title d-block" href="single-product.html">Cotton T-shirts</a>
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
    <!-- Badge--><span class="badge badge-warning custom-badge"><i class="fa-solid fa-star"></i></span>
    <div class="product-thumbnail-side">
    <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.html"><img
    src="img/product/21.png" alt=""></a>
    </div>
    <div class="product-description">
    <!-- Product Title --><a class="product-title d-block" href="single-product.html">ECG Rice Cooker</a>
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
    <!-- Badge--><span class="badge badge-warning custom-badge"><i class="fa-solid fa-star"></i></span>
    <div class="product-thumbnail-side">
    <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.html"><img
    src="img/product/20.png" alt=""></a>
    </div>
    <div class="product-description">
    <!-- Product Title --><a class="product-title d-block" href="single-product.html">Beauty Cosmetics</a>
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
    <!-- Badge--><span class="badge badge-warning custom-badge"><i class="fa-solid fa-star"></i></span>
    <div class="product-thumbnail-side">
    <!-- Thumbnail --><a class="product-thumbnail d-block" href="single-product.html"><img
    src="img/product/19.png" alt=""></a>
    </div>
    <div class="product-description">
    <!-- Product Title --><a class="product-title d-block" href="single-product.html">Basketball</a>
    <!-- Price -->
    <p class="sale-price">$16<span>$20</span></p>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div> */
    ?>










    <!-- Top Products -->
    <div class="top-products-area py-3 pb-4  container rounded" style="/* From https://css.glass */
background: rgba(255, 255, 255, 0.44);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(7.6px);
-webkit-backdrop-filter: blur(7.6px);
border: 1px solid rgba(255, 255, 255, 0.52);">
      <div class="container px-0">
        <div class="section-heading d-flex align-items-center justify-content-between dir-rtl">
          <h6>Semua Produk</h6><a class="btn p-0" href="all_produk.php">Lihat Semua<i
              class="ms-1 fa-solid fa-arrow-right-long"></i></a>
        </div>
        <hr>
        <div class="row g-2 ">

          <?php
          $all = mysqli_query($conn, "SELECT * FROM `produk` P JOIN merchant m ON P.id_merchant = m.id_merchant ORDER BY partner DESC LIMIT 50");
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
                  <!-- Rating -->



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















    <!--  <div class="container mt-3 mb-3">
      <div class="section-heading d-flex align-items-center justify-content-between dir-rtl">
        <h6>List Merchant</h6><a class="btn p-0" href="vendor.php">
          Lihat Semua<i class="ms-1 fa-solid fa-arrow-right-long"></i></a>
      </div>
      <div class="row gy-3">

        <?php
        $merchant = mysqli_query($conn, "SELECT * FROM merchant LIMIT 5");
        while ($m = mysqli_fetch_array($merchant)) {
          ?>

        
                                                                                                                                                                                                                                                                                                                                                            <div class="single-vendor-wrap bg-img p-4 bg-overlay" style="background-image: url('img/bg-img/12.jpg')">
                                                                                                                                                                                                                                                                                                                                                              <h5 class="vendor-title text-white">
                                                                                                                                                                                                                                                                                                                                                                <?php echo $m['nama'] ?>
                                                                                                                                                                                                                                                                                                                                                              </h5>
                                                                                                                                                                                                                                                                                                                                                              <div class="vendor-info">
                                                                                                                                                                                                                                                                                                                                                                <p class="mb-1 text-white"><i class="fa-solid fa-location-dot me-1"></i>
                                                                                                                                                                                                                                                                                                                                                                  <?php echo $m['lokasi'] ?>
                                                                                                                                                                                                                                                                                                                                                                </p>
                                                                                                                                                                                                                                                                                                                                                                <div class="ratings lh-1"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                                                                                                                                                                                                                                                                                                                                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><span
                                                                                                                                                                                                                                                                                                                                                                    class="text-white">(99% Positive Seller)</span></div>
                                                                                                                                                                                                                                                                                                                                                              </div><a class="btn btn-warning btn-sm mt-3" href="merchant.php?id=<?php echo $m['id_merchant'] ?>">Go To
                                                                                                                                                                                                                                                                                                                                                                Store<i class="fa-solid fa-arrow-right-long ms-1"></i></a>
           
                                                                                                                                                                                                                                                                                                                                                              <div class="vendor-profile shadow">
                                                                                                                                                                                                                                                                                                                                                                <figure class="m-0"><img src="img/product/dw.png" alt=""></figure>
                                                                                                                                                                                                                                                                                                                                                              </div>
                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                          </div>
        <?php } ?>



      </div>
    </div> -->




    <?php
    /*   <!-- Weekly Best Sellers-->
    <div class="weekly-best-seller-area py-3">
    <div class="container">
    <div class="section-heading d-flex align-items-center justify-content-between dir-rtl">
    <h6>Weekly Best Sellers</h6><a class="btn p-0" href="shop-list.html">
    View All<i class="ms-1 fa-solid fa-arrow-right-long"></i></a>
    </div>
    <div class="row g-2">
    <!-- Weekly Product Card -->
    <div class="col-12">
    <div class="horizontal-product-card">
    <div class="d-flex align-items-center">
    <div class="product-thumbnail-side">
    <!-- Thumbnail --><a class="product-thumbnail shadow-sm d-block" href="single-product.html"><img
    src="img/product/18.png" alt=""></a>
    </div>
    <div class="product-description">
    <!-- Wishlist  --><a class="wishlist-btn" href="#"><i class="fa-solid fa-heart"></i></a>
    <!-- Product Title --><a class="product-title d-block" href="single-product.html">Nescafe Coffee
    Jar</a>
    <!-- Price -->
    <p class="sale-price"><i class="fa-solid fa-dollar-sign"></i>$64<span>$89</span></p>
    <!-- Rating -->
    <div class="product-rating"><i class="fa-solid fa-star"></i>4.88 <span class="ms-1">(39 review)</span>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Weekly Product Card -->
    <div class="col-12">
    <div class="horizontal-product-card">
    <div class="d-flex align-items-center">
    <div class="product-thumbnail-side">
    <!-- Thumbnail --><a class="product-thumbnail shadow-sm d-block" href="single-product.html"><img
    src="img/product/7.png" alt=""></a>
    </div>
    <div class="product-description">
    <!-- Wishlist  --><a class="wishlist-btn" href="#"><i class="fa-solid fa-heart"></i></a>
    <!-- Product Title --><a class="product-title d-block" href="single-product.html">Modern Office
    Chair</a>
    <!-- Price -->
    <p class="sale-price"><i class="fa-solid fa-dollar-sign"></i>$99<span>$159</span></p>
    <!-- Rating -->
    <div class="product-rating"><i class="fa-solid fa-star"></i>4.82 <span class="ms-1">(125
    review)</span></div>
    </div>
    </div>
    </div>
    </div>
    <!-- Weekly Product Card -->
    <div class="col-12">
    <div class="horizontal-product-card">
    <div class="d-flex align-items-center">
    <div class="product-thumbnail-side">
    <!-- Thumbnail --><a class="product-thumbnail shadow-sm d-block" href="single-product.html"><img
    src="img/product/12.png" alt=""></a>
    </div>
    <div class="product-description">
    <!-- Wishlist  --><a class="wishlist-btn" href="#"><i class="fa-solid fa-heart"></i></a>
    <!-- Product Title --><a class="product-title d-block" href="single-product.html">Beach Sunglasses</a>
    <!-- Price -->
    <p class="sale-price"><i class="fa-solid fa-dollar-sign"></i>$24<span>$32</span></p>
    <!-- Rating -->
    <div class="product-rating"><i class="fa-solid fa-star"></i>4.79 <span class="ms-1">(63 review)</span>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Weekly Product Card -->
    <div class="col-12">
    <div class="horizontal-product-card">
    <div class="d-flex align-items-center">
    <div class="product-thumbnail-side">
    <!-- Thumbnail --><a class="product-thumbnail shadow-sm d-block" href="single-product.html"><img
    src="img/product/17.png" alt=""></a>
    </div>
    <div class="product-description">
    <!-- Wishlist  --><a class="wishlist-btn" href="#"><i class="fa-solid fa-heart"></i></a>
    <!-- Product Title --><a class="product-title d-block" href="single-product.html">Meow Mix Cat
    Food</a>
    <!-- Price -->
    <p class="sale-price"><i class="fa-solid fa-dollar-sign"></i>$11.49<span>$13</span></p>
    <!-- Rating -->
    <div class="product-rating"><i class="fa-solid fa-star"></i>4.78 <span class="ms-1">(7 review)</span>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div> */
    ?>












    <!-- Discount Coupon Card-->
    <!-- <div class="container">
  <div class="discount-coupon-card p-4 p-lg-5 dir-rtl">
        <div class="d-flex align-items-center">
          <div class="discountIcon"><img class="w-100" src="img/core-img/discount.png" alt=""></div>
          <div class="text-content">
            <h4 class="text-white mb-1">Get 20% discount!</h4>
            <p class="text-white mb-0">To get discount, enter the<span class="px-1 fw-bold">GET20</span>code on the
              checkout page.</p>
          </div>
        </div>
      </div>
    </div> -->









    <br>


    <?php
    /* <!-- Collection -->
    <div class="pb-3">
    <div class="container">
    <div class="section-heading d-flex align-items-center justify-content-between dir-rtl">
    <h6>Collections</h6><a class="btn p-0" href="#">
    View All<i class="ms-1 fa-solid fa-arrow-right-long"></i></a>
    </div>
    <!-- Collection Slide-->
    <div class="collection-slide owl-carousel">
    <!-- Collection Card-->
    <div class="card collection-card"><a href="single-product.html"><img src="img/product/17.jpg" alt=""></a>
    <div class="collection-title"><span>Women</span><span class="badge bg-danger">9</span></div>
    </div>
    <!-- Collection Card-->
    <div class="card collection-card"><a href="single-product.html"><img src="img/product/19.jpg" alt=""></a>
    <div class="collection-title"><span>Men</span><span class="badge bg-danger">29</span></div>
    </div>
    <!-- Collection Card-->
    <div class="card collection-card"><a href="single-product.html"><img src="img/product/21.jpg" alt=""></a>
    <div class="collection-title"><span>Kids</span><span class="badge bg-danger">4</span></div>
    </div>
    <!-- Collection Card-->
    <div class="card collection-card"><a href="single-product.html"><img src="img/product/22.jpg" alt=""></a>
    <div class="collection-title"><span>Gadget</span><span class="badge bg-danger">11</span></div>
    </div>
    <!-- Collection Card-->
    <div class="card collection-card"><a href="single-product.html"><img src="img/product/23.jpg" alt=""></a>
    <div class="collection-title"><span>Foods</span><span class="badge bg-danger">2</span></div>
    </div>
    <!-- Collection Card-->
    <div class="card collection-card"><a href="single-product.html"><img src="img/product/24.jpg" alt=""></a>
    <div class="collection-title"><span>Sports</span><span class="badge bg-danger">5</span></div>
    </div>
    </div>
    </div>
    </div>
    </div> */
    ?>



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