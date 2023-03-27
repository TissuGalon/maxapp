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
    <title>Suha - Multipurpose Ecommerce Mobile HTML Template</title>
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
            <div class="back-button me-2"><a href="#" onclick="history.back()"><i
                        class="fa-solid fa-arrow-left-long"></i></a></div>
            <div></div>
            <!-- Page Title-->
            <div class="page-heading">
                <h6 class="mb-0">Riwayat Pesanan</h6>
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
                <div class="container px-0">

                    <!-- Cart Wrapper-->
                    <div class="cart-wrapper-area pb-3 pt-1">

                    <?php
                    $id_driver = $_SESSION['id_driver'];
                    $produk = mysqli_query($conn, "SELECT * FROM pesanan WHERE status_pesanan = 'selesai' AND id_driver = '$id_driver' ORDER BY tgl_pemesanan DESC");
                    $jml = mysqli_num_rows($produk);
                    ?>

                    <div class="card my-2" style="/* From https://css.glass */
background: rgba(255, 255, 255, 0.44);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(7.6px);
-webkit-backdrop-filter: blur(7.6px);
border: 1px solid rgba(255, 255, 255, 0.52);">
                        <div class="card-body">
                            <div class="d-flex justify-content-between text-dark">
                                <small class="">Total Pesanan : </small>
                                <div>
                                    <strong class="me-1"><?php echo $jml; ?> </strong><small>Pesanan</small>
                                </div>
                            </div>
                        </div>
                    </div>


                        <div class="cart-table card mb-3" style="/* From https://css.glass */
background: rgba(255, 255, 255, 0.44);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(7.6px);
-webkit-backdrop-filter: blur(7.6px);
border: 1px solid rgba(255, 255, 255, 0.52);">
                            <div class="table-responsive card-body shadow-sm">
                                <table class="table mb-0">
                                    <tbody>
                                        <?php                                        
                                        while ($row = mysqli_fetch_array($produk)) {
                                            ?>
                                                <a href="detail-pesanan.php?id=<?php echo $row['id_pesanan'] ?>">
                                                    <tr id='<?php echo $rows['id_produk'] ?>'>
                                                        <td><img class="rounded" src="../img/menunggu.jpg" height="80" alt=""></td>
                                                        <td>                                                        
                                                            <a href="detail-pesanan.php?id=<?php echo $row['id_pesanan'] ?>">
                                                                Pesanan
                                                                #
                                                                <?php echo $row['id_pesanan'] ?>                                                                

                                                                <span>
                                                                    <?php echo $row['total_produk'] ?> Produk
                                                                    
                                                                    <strong class='ms-1 text-warning'>
                                                                        Rp.
                                                                        <?php echo $row['total_pembayaran'] ?>
                                                                    </strong>
                                                                </span>

                                                            </a>
                                                            <small>
                                                                <span>
                                                                    <?php echo $row['waktu_pemesanan'] ?>
                                                                </span>
                                                                <span class="mx-1"></span>
                                                                <span>
                                                                    <?php echo $row['tgl_pemesanan'] ?>
                                                                </span>
                                                                
                                                            </small>
                                                            <br>
                                                            <a href="#" class="btn btn-sm btn-success rounded-pill w-100 mt-1 text-light">SELESAI</a>

                                                        </td>
                                                        <td>
                                                            <?php if ($row['status_pesanan'] == "menunggu") { ?>
                                                                <a href="#" onclick="batalkan()" class="btn btn-warning py-2 btn-sm text-light w-100"><i class="fa-solid fa-hand-pointer"></i> Ambil Pesanan</a>
                                                                <script>
                                                                    function batalkan(){
                                                                        Swal.fire({
  title: 'Ambil Pesanan ?',
  icon: 'info',
  showCancelButton: true,
  confirmButtonText: 'Ambil',
  confirmButtonColor: '#ffc107',
  cancelButtonText: `Tidak`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    Swal.fire('Pesanan di batalkan !', '', 'success')
  } else if (result.isDenied) {

  }
})
                                                                    }
                                                                </script>
        <?php } else { ?>
                <a href="detail_pesanan.php?id=<?php echo $row['id_pesanan'] ?>" class="btn btn-warning text-light w-100">Lihat Detail</a>
        <?php } ?>

        
                                                        </td>
                                                        
                                                    </tr>
                                                    
                                                    <a>

                                                <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
        <?php } ?>

    </div>



    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>





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