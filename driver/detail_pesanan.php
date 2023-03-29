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
            <div class="back-button me-2">
                <a href="ambil_pesanan.php">
                    <i class="fa-solid fa-arrow-left-long"></i>
                </a>
            </div>

            <!-- Page Title-->
            <div class="page-heading">
                <h6 class="mb-0">Pesanan #
                    <?php echo $_GET['id'] ?>
                </h6>
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

        <?php if (isset($_SESSION['id_driver'])) { ?>


            <?php
            $idpesanan = $_GET['id'];
            $kueri = mysqli_query($conn, "SELECT * FROM pesanan WHERE id_pesanan='$idpesanan'");
            $row = mysqli_fetch_array($kueri);
            $iduser = $row['id_user'];
            $kueri2 = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$iduser'");
            $u = mysqli_fetch_array($kueri2);

            ?>


            <div class="container px-0 pt-1">
                <!-- Cart Wrapper-->
                <div class="cart-wrapper-area pb-2">
                    <div class="card billing-information-title-card bg-success">
                        <div class="card-body">
                        <div class="d-flex align-items-start">
                    <!-- Vendor Profile-->
                    <div class="vendor-profile me-3 mt-1">
                        <figure class="m-0"><img src="../img/user-image/<?php echo $u['foto'] ?>" alt="Foto User" class="shadow" style="width:80px;height:auto;border-radius:50%;"></figure>
                    </div>
                    <!-- Vendor Info-->
                    <div class="vendor-info">
                        <div class="d-flex">
                            <h5 class="vendor-title text-white">
                                Muhammad kholis                         </h5>
         
                            
                        </div>
                        <p class="mb-1 text-white"><i class="fa-solid fa-location-dot me-1"></i>
                            Jln T Fakinah                        </p>
                            <a class="btn btn-primary btn-sm py-2 w-100" href="edit-toko.php"><i class="fa-solid fa-user me-2"></i> Lihat Profil</a>
                    </div>
                </div>
                        </div>
                    </div>

                    


                    <div class="billing-information-card ">
                        
                        

                        <div class="my-1"></div>

                        
                        <div class="card billing-information-title-card ">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    
                                    <div>
                                        <h6 class="vendor-title text-dark my-0">
                                            Lokasi Terima Pesanan
                                        </h6>
                                        <small class="text-secondary"><?php echo $row['latitude'] ?>, <?php echo $row['longtitude'] ?></small>
                                    </div>

                                    <a class="btn btn-primary my-2" href="alamat_pengiriman.php?id=<?php echo $_GET['id'] ?>">Tampilkan Lokasi</a>
                                    
                                </div>
                               
                            </div>
                        </div>
                       


                    </div>

                    <div class="my-1"></div>

                    <div class="billing-information-card ">
                        <div class="card billing-information-title-card bg-light">
                            <div class="card-body">
                                <h6 class="text mb-0 text-dark">Produk</h6>
                            </div>
                        </div>

                        <div class="card user-data-card">


                            <div class="card-body px-0" style="">


                                <?php
                                $no = 1;
                                $tharga = 0;
                                $allproduk = $row['produk'];

                                $produk = json_decode($allproduk);



                                ?>


                                <?php
                                foreach ($produk as $var) {

                                    $idpr = $var->id;
                                    $pr = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$idpr'");
                                    $prr = mysqli_fetch_array($pr);
                                    $idmerchant = $prr['id_merchant'];
                                    $merchant = mysqli_query($conn, "SELECT * FROM merchant WHERE id_merchant='$idmerchant'");
                                    $vm = mysqli_fetch_array($merchant);
                                    ?>

                                    <div class='border rounded shadow-sm p-2 m-2'>
                                        <div class="p-2 py-3 d-flex justify-content-between bg-success rounded">
                                            <div class="text-light m-1"><i class="fa-solid fa-shop"></i>
                                                <small class="mx-2">
                                                    <?php echo $vm['nama'] ?>
                                                </small>
                                            </div>
                                            <small>
                                                <!-- <i class="fa-solid fa-location"></i> -->
                                                <a href="merchant.php?id=<?php echo $idmerchant ?>" class="text-success btn btn-light ">
                                                    Lihat Toko <i class="fa-solid fa-arrow-right"></i>
                                                </a></small>
                                        </div>
                                        <hr>



                                        <div class="single-profile-data d-flex align-items-center justify-content-center border p-1 px-3 py-2 rounded shadow-sm">
                                            <div class="title d-flex align-items-center">
                                                <strong class="mx-2">
                                                    <?php echo $no++; ?>
                                                </strong>
                                                
                                                <div style="overflow:hidden; width:80px; height:80px;" class="shadow-sm rounded">
                                                    <img class="" src="../img/product/<?php echo $prr['gambar']; ?>" alt="">
                                                </div>

                                            </div>
                                            <div class="data-content d-flex justify-content-between">
                                                <span class="text-dark">
                                                    <?php echo $var->produk; ?>
                                                </span>
                                                <div class=""><strong>Rp.
                                                    <?php echo $var->harga; ?>
                                                    <?php
                                                    $hharga = $var->harga * $var->qty;
                                                    $tharga += $hharga;
                                                    ?></strong>
                                                </div>
                                                <div class="text-dark">x
                                                    <?php echo $var->qty; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-2 border p-2 rounded">
                                            <small>Pesan :</small>
                                            <div class='mx-2'></div>
                                            <small class="">Tidak ada pesan</small>
                                            <!-- <input type="text" class="form-control" placeholder="Tidak ada pesan" readonly> -->
                                        </div>
                                    </div>

                                <?php } ?>



                            </div>
                            <div class="card-footer bg-white">
                                <div class="data-content d-flex my-2 justify-content-between">
                                    <div class="text"><small>Total Pesanan (
                                            <span id="jml_produk">
                                                <?php echo count($produk) ?>
                                            </span> Produk ) :
                                        </small></div>
                                    <div class="text-warning text"><strong>Rp.
                                            <?php echo $tharga; ?>
                                        </strong></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-1"></div>

                    


                </div>
            </div>
            
        <?php } ?>

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