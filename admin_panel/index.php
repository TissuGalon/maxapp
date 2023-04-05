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

      <br>


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
        <div class="content d-flex align-items-center mb-2"><img src="../img/icons/icon-72x72.png" alt="">
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
            <div class="single-hero-slide" style="background-image: url('../img/banner-home/banner1.jpg')">
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
            <div class="single-hero-slide" style="background-image: url('../img/banner-home/banner2.jpg')">
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
            <div class="single-hero-slide" style="background-image: url('../img/banner-home/banner3.jpg')">
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



    <?php
    $kueri = mysqli_query($conn, "SELECT * FROM pesanan WHERE status_pesanan = 'selesai'");
    $pendapatan = 0;
    while($p = mysqli_fetch_array($kueri)){
      $pendapatan = $p['total_pengiriman'];
    }
    ?>


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
            <small class="text-dark">Total Pendapatan hari ini</small>
            <br>
          <i class="fa-solid fa-wallet text-dark"></i>
            <span class="text-dark m-2 mt-3">Rp <?php echo $pendapatan ?></span><br>
          </div>

          <div class="d-flex align-items-center text-center m-1">
            <div class="m-2">
              <a href="top-up.php" class="btn btn-warning text-light  shadow-sm">Lihat Semua <i class="fa-solid fa-eye text-light"></i></a>
            </div>
           <!--  <div class="m-2">
              <a href="#" class="btn btn-primary  shadow-sm"><i class="fa-solid fa-qrcode text-light"></i></a>
            </div> -->

          </div>
        </div>

      </div>
    </div>
<!-- WALLET -->



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
                <a href="daftar_merchant.php"
                  style="background-image: url('img/max_delivery.png'); background-size: cover; background-position: center;">
                  <div class='text-light mt-2 d-flex justify-content-center'>
                    <i class="fa-solid fa-store text-light me-1"></i> <small>Pendaftaran Merchant</small>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <!-- Catagory Card -->
          <div class="col-6">
            <div class="card catagory-card" style="background-color:#FDA501;">
              <div class="card-body px-2">
                <a href="topup_scan.php"
                  style="background-image: url('img/max_laundry.png'); background-size: cover; background-position: center;">
                  <div class='text-light mt-2 d-flex justify-content-center'>
                    <i class="fa-solid fa-qrcode text-light me-1"></i> <small>Top up User</small>
                  </div>
              </div>
            </div>
          </div>




<?php
/* 
<!-- Catagory Card -->
<div class="col-3">
  <div class="card catagory-card">
    <div class="card-body px-2"><a href="makanan_minuman.php"><img src="../img/2food-drink.png"
          alt=""><span>Makanan &amp; Minuman</span></a></div>
  </div>
</div>
<!-- Catagory Card -->
<div class="col-3">
  <div class="card catagory-card">
    <div class="card-body px-2"><a href="grosir.php"><img src="../img/core-img/grocery.png"
          alt=""><span>Produk <br> Grosir</span></a></div>
  </div>

</div>
<!-- Catagory Card -->
<div class="col-3">
  <div class="card catagory-card">
    <div class="card-body px-2"><a href="kecantikan.php"><img src="../img/core-img/shampoo.png"
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
    <div class="card-body px-2"><a href="obat.php"><img src="../img/2medicine.png"
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
 */
?>





        </div>
      </div>
    </div>

    


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
          <h6>Transaksi hari ini</h6><a class="btn p-0" href="transaksi.php">Lihat Semua<i
              class="ms-1 fa-solid fa-arrow-right-long"></i></a>
        </div>
        <hr>
        <div class="row g-2 ">

        <?php 
        
        $tcek = mysqli_num_rows($kueri);
        if($tcek > 0){
          while($t = mysqli_fetch_array($kueri)){ ?>
          
             <div class="card my-1">
          <div class="card-body pl-3">
            <div class="d-flex justify-content-between">
              <strong class="">1 .</strong>
                <div>
                  <small>Pesanan #<?php echo $t['id_pesanan'] ?></small><br>
                  <small><?php echo $t['waktu_selesai'] ?></small>                        
                </div>
                <div class="m-2">
                  <span class="text-dark">Rp <?php echo $t['total_pembayaran'] ?></span>
                </div>

                <a class="btn btn-warning text-light shadow-sm mt-2 mb-2">Lihat Detail</a>
            </div>
          </div>
        </div>

           <?php }
        }else{ ?>

        <div class="card my-1">
          <div class="card-body pl-3">
            <div class="d-flex justify-content-center">
              <span class="text-dark"><i class="fa-solid fa-ghost me-1"></i> Belum ada transaksi hari ini</span>
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