<?php include 'koneksi.php'; session_start(); ?>
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


    <!-- HERE MAP API -->
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
    <script>
        window.ENV_VARIABLE = "developer.here.com";
    </script>

<style>
        body {
            padding: 0;
            margin: 0;
        }

        #map {
            width: 100%;
            height: 500px;
        }
    </style>

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
            <!-- <div class="back-button me-2"><a href="#" onclick="window.history.go(-1); return false;"><i
                        class="fa-solid fa-arrow-left-long"></i></a></div> -->
                        <div class="back-button me-2"><a href="#" onclick="history.back()"><i
                        class="fa-solid fa-arrow-left-long"></i></a></div>
            <!-- Page Title-->
            <div class="page-heading">
                <h6 class="mb-0">Status Pengiriman</h6>
            </div>
            <!-- Navbar Toggler-->
            <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas"
                aria-controls="suhaOffcanvas">
                <div><span></span><span></span><span></span></div>
            </div>
        </div>
    </div>
    <?php include 'sidebar.php' ?>
    <div class="my-order-wrapper" style="background-image: url('img/map-bg.jpg');">
    
    
        <div class="container">


            <div class="card" style="/* From https://css.glass */
background: rgba(255, 255, 255, 0.44);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(7.6px);
-webkit-backdrop-filter: blur(7.6px);
border: 1px solid rgba(255, 255, 255, 0.52);">
                <div class="card-body p-4">
                <?php
                        $id = $_GET['id'];
                        $kueri = mysqli_query($conn, "SELECT * FROM progress_pesanan WHERE id_pesanan ='$id'");
                        $pro = mysqli_fetch_array($kueri);
                        
                        $pesanan = mysqli_query($conn, "SELECT * FROM pesanan WHERE id_pesanan='$id'");
                        $row = mysqli_fetch_array($pesanan);
                        ?>

                            <!-- Single Order Status-->
                           <div class="single-order-status active">
                           <div class="order-icon"><i class="fa-solid fa-bag-shopping"></i></div>
                           <div class="order-text">
                               <h6>Pesanan di buat</h6><span><?php echo $row['tgl_pemesanan'] ?> - <?php echo $row['waktu_pemesanan'] ?></span>
                           </div>
                           <div class="order-status"><i class="fa-solid fa-circle-check"></i></div>
                           </div>
 


                        <?php if($pro['dikemas'] == "true"){?>
                            <!-- Single Order Status-->
                            <div class="single-order-status active">
                            <div class="order-icon"><i class="fa-solid fa-box-open"></i></div>
                            <div class="order-text">
                                <h6>Pesanan dikemas</h6><span><?php echo $pro['waktu_dikemas'] ?></span>
                            </div>
                            <div class="order-status"><i class="fa-solid fa-circle-check"></i></div>
                            </div>
                            <?php }else{?>
                                <!-- Single Order Status-->
                                <div class="single-order-status">
                                <div class="order-icon"><i class="fa-solid fa-box-open"></i></div>
                                <div class="order-text">
                                    <h6>Pesanan sedang dikemas</h6><span>-</span>
                                </div>
                                <div class="order-status"><i class="fa-solid fa-circle-check"></i></div>
                                </div>
                            <?php } ?>

                        <?php if($pro['diantar'] == "true"){?>
                            <!-- Single Order Status-->
                            <div class="single-order-status active">
                            <div class="order-icon"><i class="fa-solid fa-truck"></i></div>
                            <div class="order-text">
                                <h6>Pesanan diantar</h6><span><?php echo $pro['waktu_diantar'] ?></span>
                            </div>
                            <div class="order-status"><i class="fa-solid fa-circle-check"></i></div>
                            </div>                         
                            <?php }else{ ?>
                                <!-- Single Order Status-->
                                <div class="single-order-status">
                                <div class="order-icon"><i class="fa-solid fa-truck"></i></div>
                                <div class="order-text">
                                    <h6>Pesanan segera diantar</h6><span>-</span>
                                </div>
                                <div class="order-status"><i class="fa-solid fa-circle-check"></i></div>

                                </div>
                        <?php } ?>
                       
                       


                        <?php if($row['selesai'] == 'true'){ ?>
                            <!-- Single Order Status-->
                            <div class="single-order-status active">
                            <div class="order-icon"><i class="fa-solid fa-check"></i></div>
                            <div class="order-text">
                                <h6>Pesanan Dikirim</h6><span><?php echo $row['tgl_selesai'] ?> - <?php echo $row['waktu_selesai'] ?></span>
                            </div>
                            <div class="order-status"><i class="fa-solid fa-circle-check"></i></div>
                        </div>                            
                            <?php }else{ ?>
                                <!-- Single Order Status-->
                                <div class="single-order-status">
                                <div class="order-icon"><i class="fa-solid fa-check"></i></div>
                                <div class="order-text">
                                    <h6>Pesanan Dikirim</h6><span>-</span>
                                </div>
                                <div class="order-status"><i class="fa-solid fa-circle-check"></i></div>
                                </div>
                        <?php } ?>


                        
                </div>
            </div>

            <?php if($row['selesai'] == 'true'){ ?>                
            <div class="card mt-2" style="/* From https://css.glass */
background: rgba(255, 255, 255, 0.44);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(7.6px);
-webkit-backdrop-filter: blur(7.6px);
border: 1px solid rgba(255, 255, 255, 0.52);">
                <div class="card-body py-2 px-2">
                    <a class="btn btn-success btn-lg w-100" href="lihat_bukti_kirim.php?id=<?php echo $id; ?>">Lihat Bukti Pengiriman <i class="fa-solid fa-image ms-2"></i></a>
                </div>
            </div>
                <?php }?>


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