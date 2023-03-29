<?php
session_start();
include 'koneksi.php';
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
            <div class="back-button me-2 me-2"><a href="mytoko.php"><i
                        class="fa-solid fa-arrow-left-long"></i></a>
            </div>
            <!-- Page Title-->
            <div class="page-heading">
                <h6 class="mb-0">Edit Toko</h6>
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
                <button class="btn btn-success w-100 rounded-0 mt-1" id="response">
                    <?php echo ucfirst($_GET['response']) ?>
                </button>
            <?php } else { ?>
                <script>
                    setTimeout(function () {
                        document.getElementById('response').style.display = "none";
                    }, 5000);
                </script>
                <button class="btn btn-danger w-100 rounded-0 mt-1" id="response">
                    <?php echo ucfirst($_GET['response']) ?>
                </button>
            <?php } ?>

        <?php } ?>




        <div class="container px-0">
            <!-- Profile Wrapper-->
            <div class="profile-wrapper-area pb-3 pt-1">
            

                <!-- User Meta Data-->
                <div class="card user-data-card">
                    <div class="card-body">

                        <div class="d-flex justify-content-center">

                        <div class="shadow-sm" style="width:120px;height:120px;overflow:hidden;">
                            <?php
                            $id = $_SESSION['toko'];
                            $kueri = mysqli_query($conn, "SELECT * FROM merchant WHERE id_merchant = '$id'");
                            $row = mysqli_fetch_array($kueri);
                            if ($row['avatar'] == null) { ?>
                                <img id="image" src="img/product/10.png"
                            <?php } else { ?>
                                <img id="image" src="img/merchant-image/<?php echo $row['avatar'] ?>">
                            <?php } ?>
                        </div>

                            


                        </div>
                        <div class="justify-content-center mt-3">
                            <form action="proses/upfoto_toko.php" method="POST" enctype="multipart/form-data">
                                <label class="text-primary"><small>*Ukuran max 5MB</small></label>
                                <input type="hidden" name="id" value="<?php echo $_SESSION['toko'] ?>"></input>
                                <input type="file" onchange="validateSize(this)" name="foto" accept="image/*" required class="form-control pt-2">
                                <script>
                                    function validateSize(input) {
                                    const fileSize = input.files[0].size / 1024 / 1024; // in MiB
                                    if (fileSize > 5) {
                                        alert('Ukuran File melebihi 5  MiB');
                                        window.location.reload();
                                        // $(file).val(''); //for clearing with Jquery
                                    } else {
                                        // Proceed further
                                    }
                                    }
                                </script>                        
                                <!--    <a href="#" class="btn m-1 btn-light w-100 text-warning border">Upload
                                Gambar</a> -->
                                <input type="submit" value="Ganti Foto" name="ubah"
                                    class="btn m-1 btn-primary w-100 text-light"></input>
                            </form>
                        </div>
                                <hr>

                        
                            <form action="proses/update_toko.php" class="row" method="GET" id="submitform">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['toko'] ?>"></input>
                            <div class="col-12 my-1">
                                <label><small class="text-dark">Nama Toko</small></label>
                                <input class="form-control text-dark" name="nama" value="<?php echo $row['nama'] ?>"> 
                            </div>
                            <div class="col-12 my-1">
                                <label><small class="text-dark">Alamat Toko</small></label>
                                <textarea class="form-control text-dark" type="text" rows="4" name="lokasi" value="<?php echo $row['lokasi'] ?>"><?php echo $row['lokasi'] ?></textarea>
                            </div>
                            <div class="col-12 my-1">
                                <label><small class="text-dark">No Telp. / WA</small></label>
                                <input type="number" class="form-control text-dark" name="nohp" value="<?php echo $row['nohp'] ?>"> 
                            </div>
                       
                            <div class="col-12 my-1">
                                <label><small class="text-dark">Bio / Deskripsi Toko</small></label>
                                <textarea class="form-control text-dark" rows="12" name="text_bio"><?php echo $row['text_bio'] ?></textarea>
                            </div>
                            <div class="col-12 my-1">
                                <input type="submit" style="display:none;" value="Update Produk" name="ubah"
                                        class="btn m-1 btn-warning btn-lg w-100 text-light">
                                </input>
                                <a class="btn btn-warning btn-lg text-light w-100 m-1" onclick="ask()">Update Toko</a>
                            </div>
                            </form>
                        

                            <script>
                            function ask(){
                                Swal.fire({
                                icon:'question',
                                title: 'Update Toko?',
                                text:'Perubahan akan disimpan.',
                                showCancelButton: true,
                                cancelButtonText: 'Batal',
                                confirmButtonText: 'Update',
                                }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                    document.getElementById('submitform').submit();
                                } else if (result.isDenied) {
                                }
                            })
                            }
                            </script>


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