<?php
session_start();
include '../koneksi.php';
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
            <div class="back-button me-2 me-2"><a href="edit-profile.php"><i
                        class="fa-solid fa-arrow-left-long"></i></a>
            </div>
            <!-- Page Title-->
            <div class="page-heading">
                <h6 class="mb-0">Edit Profile</h6>
            </div>
            <!-- Navbar Toggler-->
            <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas"
                aria-controls="suhaOffcanvas">
                <div><span></span><span></span><span></span></div>
            </div>
        </div>
    </div>
    <?php include 'sidebar.php'; ?>
    <div class="page-content-wrapper">

        <?php if (isset($_GET['response'])) {
            if ($_GET['status'] == "1") { ?>
                <script>
                    setTimeout(function () {
                        document.getElementById('response').style.display = "none";
                    }, 5000);
                </script>
                <button class="btn btn-success w-100 rounded-0" id="response">
                    <?php echo ucfirst($_GET['response']) ?>
                </button>
            <?php } else { ?>
                <script>
                    setTimeout(function () {
                        document.getElementById('response').style.display = "none";
                    }, 5000);
                </script>
                <button class="btn btn-danger w-100 rounded-0" id="response">
                    <?php echo ucfirst($_GET['response']) ?>
                </button>
            <?php } ?>

        <?php } ?>




        <div class="container px-0">
            <!-- Profile Wrapper-->
            <div class="profile-wrapper-area pb-3 pt-1">

            

                <!-- User Meta Data-->
                <div class="card user-data-card " style="border-radius:16px;" style="">
                    <div class="card-body mt-2">

                        <div class="d-flex justify-content-center">
                            <?php
                            $iddriver = $_SESSION['id_driver'];
                            $kueri = mysqli_query($conn, "SELECT * FROM driver WHERE id_driver = '$iddriver'");
                            $row = mysqli_fetch_array($kueri);
                            if ($row['foto'] == null || $row['foto'] == '') { ?>
                                <img id="image" width="120" src="../img/driver-image/avatar.svg">
                            <?php } else { ?>
                                <!-- GAMBAR -->
                                <div class="" style="height:130px;width:130px;overflow:hidden;border-radius:50%; background-position: center; background-size:cover;
                                background-repeat: no-repeat; background-image: url('../img/driver-image/<?php echo $row['foto'] ?>')">
                                </div>    
                                <!-- GAMBAR -->
                            <?php } ?>


                        </div>
                        <div class="justify-content-center mt-3">
                            <form action="proses/edit-foto-driver.php" method="POST" enctype="multipart/form-data">
                                <label class="text-primary"><small>*Ukuran max 5MB</small></label>
                                <input type="file" name="foto" accept="image/*" required class="form-control pt-2">
                                <!--    <a href="#" class="btn m-1 btn-light w-100 text-warning border">Upload
                                Gambar</a> -->
                                <input type="submit" value="Ganti Foto" name="ganti"
                                    class="btn m-1 btn-warning w-100 text-light rounded-pill mt-2" ></input>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- SWEET ALERT -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <div class="footer-nav-area bg-warning" id="footerNav">
        <?php include 'navigasi.php'; ?>
    </div>
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