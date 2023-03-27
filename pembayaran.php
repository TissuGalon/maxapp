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
                        destination: "wishlist.php",
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
            <div class="back-button me-2"><a href="pesanan.php"><i
                        class="fa-solid fa-arrow-left-long"></i></a></div>
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


    




<?php
$iduser = $_SESSION['iduser'];
$idpesanan = $_GET['id'];
$kueri = mysqli_query($conn, "SELECT * FROM pesanan WHERE id_pesanan = '$idpesanan'");
$row = mysqli_fetch_array($kueri);
$saldo = mysqli_query($conn, "SELECT * FROM wallet WHERE id_user = '$iduser'");
$s = mysqli_fetch_array($saldo);
?>


    <div class="page-content-wrapper pt-1">

        <div class="card">
            <div class="card-body">


            <input type="hidden" id="nominal" value="<?php echo $row['total_pembayaran'] ?>">
            <input type="hidden" id="saldo" value="<?php echo $s['saldo'] ?>">


            <div class="card " style="border-radius:16px;">
                <div class="card-body">
                <small>Total pembayaran</small>
                <h1 class="text-warning"><strong>Rp. <?php echo number_format($row['total_pembayaran'],2,",",".") ?></strong></h1>

                <small>Metode Pembayaran</small>
                <br>
                <a class="btn  btn-warning rounded-pill text-light w-100 btn-lg mt-2"><i class="fa-solid fa-wallet"></i> Max Saldo ( <strong>Rp. <?php echo number_format($s['saldo'],2,",",".") ?></strong> )</a>
                </div>
            </div>


            <a class="btn btn-warning rounded-pill w-100 text-light fixed-bottom mb-2 btn-lg " onclick="bayar('<?php echo $idpesanan ?>')"><i class="fa-solid fa-credit-card me-1"></i> Bayar</a>


            <script>
                function bayar(idpesanan){
                    let nominal = Number(document.getElementById('nominal').value);
                    let saldo = Number(document.getElementById('saldo').value);

                    if(saldo < nominal){
                        Swal.fire(
                        'Oops',
                        'Saldo anda tidak mencukupi !',
                        'warning'
                        )
                    }else{
                        Swal.fire({
                        title: 'Konfirmasi',
                        text: 'Lakukan pembayaran ?',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonText: 'Bayar',
                        confirmButtonColor: '#ffc107',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Batal',
                        }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            window.location.href = "proses/bayar.php?id_pesanan="+idpesanan+"&nominal="+nominal+"&saldo="+saldo+"&keterangan=Bayar pemesanan&status=keluar";
                        } else if (result.isDenied) {
                        }
                        })
                    }
                }
            </script>
              

            </div>
        </div>
        
    </div>



    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>





    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>


    <!-- Footer Nav-->
    



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