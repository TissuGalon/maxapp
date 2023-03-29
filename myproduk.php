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


    <?php
    
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
            <div class="back-button me-2"><a href="mytoko.php"><i
                        class="fa-solid fa-arrow-left-long"></i></a></div>
            <!-- Page Title-->
            <div class="page-heading">
                <h6 class="mb-0">Produk Saya </h6>
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

        <div class="my-2"></div>

        <div class="product-description">


                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


                        <!-- Rating & Review Wrapper -->
                        <div class="rating-and-review-wrapper dir-rtl">
                            <div class="">


                            <div class="bg-white card mb-2 shadow-sm mt-1">
                        <div class="m-2">
                            <!-- Search Form-->
                            <div class="w-100">
                                <div class="search-form d-flex w-100">
                                <form action="myproduk.php" method="GET" id="formsearch">
                                    <?php if(isset($_GET['search'])){ ?>
                                    <input class="form-control  bg-white w-100" value="<?php echo $_GET['search'] ?>" type="search" name="search" placeholder="Cari Produk Berdasarkan Nama">
                                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    <?php }else{ ?>
                                    <input class="form-control  bg-white w-100" type="search" name="search" placeholder="Cari Produk Berdasarkan Nama">
                                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    <?php } ?>
                                </form>
                                <?php if(isset($_GET['search'])){ ?>
                                    <a class="btn btn-warning text-light m-2" href="myproduk.php"><i class="fa-solid fa-close"></i></a>
                                    <?php }else{ ?>
                                        <a class="btn btn-warning text-light m-2" onclick="document.getElementById('formsearch').submit()"><i class="fa-solid fa-magnifying-glass"></i></a>
                                    <?php } ?>                                
                                </div>
                            </div>
                        </div>
                    </div>



                            <div class="row g-1 align-items-center rtl-flex-d-row-r mb-2 mx-3">
                        <div class="col-8">
                        <!-- Product Catagories Slide -->

                        

                        <?php
                        /* <div class="product-catagories owl-carousel catagory-slides"><a class="shadow-sm" href="#"><img src="img/product/5.png" alt="">Furniture</a><a class="shadow-sm" href="#"><img src="img/product/9.png" alt="">Shoes</a><a class="shadow-sm" href="#"><img src="img/product/4.png" alt="">Dress</a><a class="shadow-sm" href="#"><img src="img/product/9.png" alt="">Shoes</a><a class="shadow-sm" href="#"><img src="img/product/4.png" alt="">Dress</a></div>
                        </div>
                        <div class="col-4">
                            <!-- Select Product Catagory-->
                            <div class="select-product-catagory">
                                <select class="right small border-0" id="selectProductCatagory" name="selectProductCatagory" aria-label="Default select example">
                                <option selected>Short by</option>
                                <option value="1">Terbaru</option>
                                <option value="2">Popular</option>
                                <option value="3">Rating</option>
                                </select>
                            </div>
                        </div> */
                        ?>

                    </div>


                    

                </div>
                
                
                <div class="bg-white p-2 rounded" style="height:100%;">

                    <?php
                    $idm = $_SESSION['toko'];
                    if(isset($_GET['search'])){
                        $search = $_GET['search'];
                        $kueri = mysqli_query($conn, "SELECT * FROM produk WHERE id_merchant = '$idm' AND nama_produk LIKE '%$search%'");
                    }else{
                        $kueri = mysqli_query($conn, "SELECT * FROM produk WHERE id_merchant = '$idm'");
                    }
                    $jmlproduk = mysqli_num_rows($kueri);
                    ?>

                    <div class="d-flex justify-content-between mx-2 mt-1">
                        <div class=""><a href="tambah_produk.php" class="btn btn-sm btn-warning text-light p-2">Tambah Produk <i class="fa-solid fa-plus ms-2 me-1"></i></a></div>
                        <small class="text-dark m-2"><?php echo $jmlproduk ?> <span class="ms-1">Produk</span></small>
                        <!-- <div class=""><a class="btn btn-sm btn-success text-light p-2">Restock Produk <i class="fa-solid fa-archives"></i></a></div> -->
                    </div>

                    <div class="row g-2 bg-white mt-2 mx-0 " >
                        <?php
                        while($row=mysqli_fetch_array($kueri)){
                        ?>

                        <!-- Weekly Product Card -->
                        <div class="col-12 pt-1  mt-1" >
                            <div class="horizontal-product-card shadow-sm p-1" style="border-radius:10px; border-style:solid; border-color:#efefef;">
                                <div class="d-flex align-items-center">
                                <div class="product-thumbnail-side">
                                <!-- Thumbnail -->
                                <a class="product-thumbnail d-block" style="border-style:solid; border-color:#efefef;" href="produk.php?id=<?php echo $row['id_produk'] ?>"><img src="img/product/<?php echo $row['gambar'] ?>" style="height:80px; width:auto;" alt="<?php echo $row['nama_produk'] ?>"></a>
                            </div>
                            <div class="product-description p-1">
                                <!-- Wishlist  -->
                                <a class="btn btn-danger text-light float-end btn-sm m-1" onclick="hapus('<?php echo $row['id_produk'] ?>')"><i class="fa-solid fa-trash"></i></a>

                                <a class="btn btn-warning text-light float-end btn-sm m-1"
                                href="produk_edit.php?id=<?php echo $row['id_produk'] ?>"><i class="fa-solid fa-pencil"></i></a>

                                <script>
                                    function hapus(idproduk){
                                        Swal.fire({
                                icon:'warning',
                                title: 'Hapus Produk?',
                                text:'Produk terhapus tidak dapat dikembalikan.',
                                showCancelButton: true,
                                cancelButtonText: 'Batal',
                                confirmButtonText: 'Hapus',
                                confirmButtonColor: '#d33',
                                }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                    window.location.href = "proses/hapus_produk.php?id="+idproduk;
                                } else if (result.isDenied) {
                                }
                            })
                                    }
                                </script>
                                                
                                <!-- Product Title -->
                                <a class="product-title d-block" href="produk.php?id=<?php echo $row['id_produk'] ?>"><?php echo $row['nama_produk'] ?></a>
                                <!-- Price -->
                                <p class="sale-price"><!-- <i class="fa-solid fa-dollar-sign"></i> -->Rp. <?php echo number_format($row['harga'],2,",",".") ?></p>
                                <!-- Rating -->
                                <div class="product-rating">Stok : <span class="ms-1"><?php echo $row['stock'] ?></span></div>

                                <!-- <a class="wishlist-btn position-fixed" href="#"><a class="btn btn-sm text-white btn-primary"><i class="fa-solid fa-minus"></i></a></a>
                                <input type="text" name="qty" id="qty" readonly class=" w-25">
                                <a class="wishlist-btn position-fixed" href="#"><a class="btn btn-sm text-white btn-primary"><i class="fa-solid fa-plus"></i></a></a> -->                                
                                <!-- <a class="btn btn-sm text-white btn-warning w-50" href="produk_edit.php?id=<?php echo $row['id_produk'] ?>"><i class="fa-solid fa-pencil"></i> Edit</a></a> -->

                                </div>
                            </div>
                        </div>
                        <?php } ?>


                        
                    </div>
                </div>
                    
            </div>
       
            
            <!-- Ratings Submit Form-->
            <!-- <div class="ratings-submit-form bg-white py-3 dir-rtl">
                <div class="container">
                    <h6>Berikan Ulasan Anda</h6>
                    <form action="proses/ulasan_produk.php" method="GET">
                        <div class="stars mb-3">
                            <input required class="star-1" type="radio" name="star" value="1" id="star1">
                            <label class="star-1" for="star1"></label>
                            <input required class="star-2" type="radio" name="star" value="2" id="star2">
                            <label class="star-2" for="star2"></label>
                            <input required class="star-3" type="radio" name="star" value="3" id="star3">
                            <label class="star-3" for="star3"></label>
                            <input required class="star-4" type="radio" name="star" value="4" id="star4">
                            <label class="star-4" for="star4"></label>
                            <input required class="star-5" type="radio" name="star" value="5" id="star5">
                            <label class="star-5" for="star5"></label>
                            <span></span>
                        </div>
                        <textarea class="form-control mb-3" required id="comments" name="comment" cols="30" rows="10"
                            data-max-length="200" placeholder="Tulis ulasan Anda..."></textarea>
                        <input type="hidden" name="idproduk" value="<?php echo $row['id_produk'] ?>">
                        <input type="hidden" name="idmerchant" value="<?php echo $idm ?>">

                        <?php if (!isset($_SESSION['iduser'])) { ?>
                            <a class="btn btn-primary" href="#" onclick="err()">Kirim Ulasan</a>
                            <script>
                                function err() {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal',
                                        text: 'Login untuk memberikan ulasan !'
                                    })
                                }
                            </script>
                        <?php } else { ?>
                            <button class="btn btn-primary" type="submit">Kirim Ulasan</button>
                        <?php } ?>
                    </form>
                </div>
            </div> -->


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