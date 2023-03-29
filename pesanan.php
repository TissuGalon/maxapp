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

    <!-- JS TOAST -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body>

    <!-- JS TOAST -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


    <?php if(isset($_GET['pesan'])){ ?>
        
        <script>
                        Toastify({
                        text: '<?php echo $_GET['pesan'] ?>',
                        offset: {
                            x: 10, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
                            y: 40 // vertical axis - can be a number or a string indicating unity. eg: '2em'
                        },
                        duration: 3000,
                        destination: "#",
                        newWindow: false,
                        close: true,
                        gravity: "top", // `top` or `bottom`
                        position: "center", // `left`, `center` or `right`
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                        style: {
                            background: "linear-gradient(to right, #369bc7, #36c2c7)",
                        },
                        onClick: function(){} // Callback after click
                        }).showToast();


                        //Hapus Parameter
                        if (location.href.includes('?')) { 
                            history.pushState({}, null, location.href.split('?')[0]); 
                        }
        </script>
        
    <?php } ?>


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
            <!-- <div class="back-button me-2"><a href="shop-grid.html"><i class="fa-solid fa-arrow-left-long"></i></a></div> -->
            <div></div>
            <!-- Page Title-->
            <div class="page-heading">
                <h6 class="mb-0">Pesanan Saya</h6>
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

        <?php if(isset($_GET['pesan']) && $_GET['pesan'] == "diproses"){ ?>
        <script>
            setTimeout(function () {
                document.getElementById('response').style.display = "none";
            }, 3000);
        </script>
        <a class="btn btn-warning w-100  text-white" id="response">Tidak Dapat Dibatalkan, Pesanan Sedang Diproses.</a>
        <?php }elseif(isset($_GET['pesan']) && $_GET['pesan'] == "dibatalkan"){ ?>
            <script>
            setTimeout(function () {
                document.getElementById('response').style.display = "none";
            }, 2000);
            </script>
            <a class="btn btn-success w-100  text-white" id="response">Pesanan Dibatalkan.</a>
        <?php } ?>

        <?php
        if(isset($_SESSION['iduser'])){
            $iduser = $_SESSION['iduser'];
            $produk = mysqli_query($conn, "SELECT * FROM pesanan WHERE id_user = '$iduser' AND status_pesanan != 'selesai' AND status_pesanan != 'dibatalkan' ORDER BY tgl_pemesanan DESC");
            $hitung = mysqli_num_rows($produk);
        }
        ?>

        <?php if (isset($_SESSION['iduser']) && $hitung > 0) { ?>
                <div class="container px-0">
                    <!-- Cart Wrapper-->
                    <div class="cart-wrapper-area pb-1 pt-1">
                        <div class="cart-table card mb-1 py-2" style="/* From https://css.glass */
background: rgba(255, 255, 255, 0.44);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(7.6px);
-webkit-backdrop-filter: blur(7.6px);
border: 1px solid rgba(255, 255, 255, 0.52);">
                            <div class="table-responsive card-body">
                                <table class="table mb-0">
                                    <tbody>
                                        <?php
                                        
                                        while ($row = mysqli_fetch_array($produk)) {
                                            ?>
                                                <a href="detail-pesanan.php?id=<?php echo $row['id_pesanan'] ?>">
                                                    <tr id='<?php echo $rows['id_produk'] ?>' class=" rounded" style="overflow:hidden;">
                                                        <td><img class="rounded" src="img/menunggu.jpg" height="80" alt=""></td>
                                                        <td>
                                                            <a href="detail-pesanan.php?id=<?php echo $row['id_pesanan'] ?>">
                                                                Pesanan
                                                                <small class="text-primary">#<?php echo $row['id_pesanan'] ?></small>
                                                                

                                                                <span>
                                                                    <?php echo $row['total_produk'] ?> Produk
                                                                    <br>
                                                                    <strong class='text-warning'>
                                                                        Rp.
                                                                        <?php echo number_format($row['total_pembayaran'],2,",",".") ?>
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
<?php if($row['status_pesanan'] == "menunggu"){ ?>
                                                            <span class="badge badge-primary text-light w-100">
                                                                <?php echo $row['status_pesanan'] ?>
                                                            </span>
<?php } elseif ($row['status_pesanan'] == "diproses") { ?>
    <span class="badge badge-warning text-light w-100">
                                                                <?php echo $row['status_pesanan'] ?>
                                                            </span>
    <?php }else{ ?>
        <span class="badge badge-primary text-light w-100">
                                                                <?php echo $row['status_pesanan'] ?>
                                                            </span>
    <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?php if($row['bayar'] == "false"){?>
                                                                <div class="row">
                                                                    <a style="width:90%;" href="pembayaran.php?id=<?php echo $row['id_pesanan'] ?>" class="btn btn-success text-light  px-4  m-1 btn-sm mx-2"><i class="fa-solid fa-credit-card"></i> Bayar</a>
                                                                    <a style="width:90%;" href="#" onclick="batalkan('<?php echo $row['id_pesanan'] ?>')" class="btn btn-danger text-light   m-1 btn-sm mx-2"><i class="fa-solid fa-x me-1"></i> Batalkan</a>
                                                                </div>
                                                            <?php }else{ ?>

                                                            <?php if ($row['status_pesanan'] == "menunggu") { ?>
                                                                <a href="#" onclick="batalkan('<?php echo $row['id_pesanan'] ?>')" class="btn btn-danger text-light w-100"><i class="fa-solid fa-x me-1"></i> Batalkan</a>
                                                                
                                                            <?php } else { ?>
                                                                    <a href="detail-pengiriman.php?id=<?php echo $row['id_pesanan'] ?>" class="btn btn-success text-light w-100">Lacak Pesanan</a>
                                                            <?php } ?>
                                                            
                                                            <?php } ?>

                                                            <script>
                                                                    function batalkan(idpesanan){
                                                                        Swal.fire({
                                                                        title: 'Batalkan Pesanan ?',
                                                                        icon: 'warning',
                                                                        showCancelButton: true,
                                                                        confirmButtonText: 'Batalkan',
                                                                        cancelButtonText: `Tidak`,
                                                                        }).then((result) => {
                                                                        /* Read more about isConfirmed, isDenied below */
                                                                        if (result.isConfirmed) {
                                                                            window.location.href = "proses/batalkan_pesanan.php?id="+idpesanan;
                                                                        } else if (result.isDenied) {

                                                                        }
                                                                        })
                                                                    }
                                                                </script>
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


        <?php if(isset($_SESSION['iduser'])){ ?>
            <div class="container">
                <div class="card" style=" /* From https://css.glass */
        background: rgba(255, 255, 255, 0.2);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.3);">
                    <div class="card-body ">
                        <a class="btn btn-light w-100 text-secondary" href="riwayat.php" style=""><i class="fa-solid fa-history"></i> Lihat Riwayat Pemesanan</a>
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