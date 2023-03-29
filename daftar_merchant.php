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
            <div class="back-button me-2 me-2"><a href="profile.php"><i
                        class="fa-solid fa-arrow-left-long"></i></a>
            </div>
            <!-- Page Title-->
            <div class="page-heading">
                <h6 class="mb-0">Daftar Merchant</h6>
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
            

                

                <?php
                if(isset($_SESSION['iduser'])){

                $iduser = $_SESSION['iduser'];
                $kueri = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$iduser'");
                $row = mysqli_fetch_array($kueri);
                if($row['id_merchant'] == null || $row['id_merchant'] == ''){
                ?>
                <!-- User Meta Data-->
                <div class="card user-data-card">
                    <div class="card-body">

                            <form action="proses/daftar_merchant.php" class="row" method="POST" id="submitform" enctype="multipart/form-data">
                             
                            <div class="col-12 my-1">
                                <label class="text-dark d-flex justify-content-between"><small >Foto Profil Merchant</small><small class="text-primary">*Ukuran max 5MB</small></label>
                                <input type="file" name="foto" accept="image/*" required class="form-control pt-2">
                            </div>
                            <div class="col-12 my-1">
                                <label><small class="text-dark">Nama Merchant</small></label>
                                <input class="form-control text-dark" name="nama" value=""> 
                            </div>
                            <div class="col-12 my-1">
                                <label><small class="text-dark">No Telp. Merchant</small></label>
                                <input type="number" class="form-control text-dark" name="nohp" value=""> 
                            </div>
                           <!--  <div class="col-6 my-1">
                                <label><small class="text-dark">Koordinat x</small></label>
                                <input class="form-control text-dark" type="number" name="x" value=""> 
                            </div>
                            <div class="col-6 my-1">
                                <label><small class="text-dark">Koordinat y</small></label>
                                <input type="number" class="form-control text-dark" name="y" value=""> 
                            </div> -->
                            <div class="col-12 my-1">
                                <label><small class="text-dark">Alamat Merchant / Toko</small></label>
                                <textarea cols="6" class="form-control" name="alamat"></textarea>
                            </div>
                 
                            <div class="col-12 my-1">
                                <label><small class="text-dark">Bio Merchant</small></label>
                                <textarea class="form-control text-dark" rows="6" name="deskripsi"></textarea>
                            </div>
                            
                            
                            <div class="col-12 my-1 d-flex">
                            <input type="checkbox" name="setuju" id="benar" required value="benar" class="form-check m-1">
                            <span for="setuju" class="text-warning m-3">Setuju dengan syarat & ketentuan</span>
                            </input>
                            </div>

                            <div class="col-12 my-1">
                                <input type="submit" value="Daftar Merchant" name="daftar"
                                        class="btn m-1 btn-warning btn-lg w-100 text-light rounded-pill">
                                </input>
          
                            </div>
                            </form>
                        



                    </div>

                </div>

                <?php }else{ ?>

                    <?php
                    $idm = $row['id_merchant'];
                    $kueri2 = mysqli_query($conn, "SELECT * FROM merchant WHERE id_merchant = '$idm'");
                    $row2 = mysqli_fetch_array($kueri2);
                    ?>

                    <div class="card  my-1">
                        <div class="card-body p-1">
                            <a class="btn btn-warning rounded-pill w-100 text-light">Menunggu Konfirmasi Pendaftaran</a>
                        </div>
                    </div>

                    <!-- User Meta Data-->
                <div class="card user-data-card">
                    <div class="card-body">

                            <form action="proses/daftar_merchant.php" class="row" method="POST" id="submitform" enctype="multipart/form-data">
                             
                            <div class="d-flex justify-content-center">
                                <!-- GAMBAR -->
            <div class="" style="height:100px;width:100px;overflow:hidden;border-radius:50%; background-position: center; background-size:cover;
  background-repeat: no-repeat; background-image: url('img/merchant-image/<?php echo $row2['avatar'] ?>')">
            </div>    
            <!-- GAMBAR -->
                            </div>


                            <div class="col-12 my-1">
                                <label><small class="text-dark">Nama Merchant</small></label>
                                <input class="form-control text-dark" name="nama" readonly value="<?php echo $row2['nama'] ?>"> 
                            </div>
                            <div class="col-12 my-1">
                                <label><small class="text-dark">No Telp. Merchant</small></label>
                                <input class="form-control text-dark" name="nohp" readonly value="<?php echo $row2['nohp'] ?>"> 
                            </div>
                           <!--  <div class="col-6 my-1">
                                <label><small class="text-dark">Koordinat x</small></label>
                                <input class="form-control text-dark" type="number" name="x" value=""> 
                            </div>
                            <div class="col-6 my-1">
                                <label><small class="text-dark">Koordinat y</small></label>
                                <input type="number" class="form-control text-dark" name="y" value=""> 
                            </div> -->
                            <div class="col-12 my-1">
                                <label><small class="text-dark">Alamat Merchant / Toko</small></label>
                                <textarea cols="6" class="form-control" name="alamat" readonly><?php echo $row2['lokasi'] ?></textarea>
                            </div>
                 
                            <div class="col-12 my-1">
                                <label><small class="text-dark">Bio Merchant</small></label>
                                <textarea class="form-control text-dark" rows="6" name="deskripsi" readonly><?php echo $row2['text_bio'] ?></textarea>
                            </div>
                            
                           <!--  <div class="col-12 my-1">
                                <input type="submit" value="Daftar Merchant" name="daftar"
                                        class="btn m-1 btn-warning btn-lg w-100 text-light rounded-pill">
                                </input>
                            </div> -->

                            </form>
    


                    </div>

                </div>


                    <div class="card  my-1">
                        <div class="card-body p-1">
                            <a class="btn btn-danger rounded-pill w-100 text-light" onclick="batalkan()">Batalkan</a>
                        </div>
                    </div>
                    <script>
                        function batalkan(){
                            Swal.fire({
                            icon: 'warning',
                            title: 'Batalkan pendaftaran ?',
                            showCancelButton: true,
                            confirmButtonText: 'Batalkan',
                            confirmButtonColor: '#d33',
                            }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                window.location.href = 'proses/batalkan_daftar_merchant.php?id=<?php echo $idm; ?>';
                            } else if (result.isDenied) {
                                
                            }
                            })
                        }
                    </script>

                <?php }} ?>





            </div>

        </div>
    </div>


    <?php
    if(isset($_GET['status']) && $_GET['status'] == 'dibatalkan'){ ?>
    <script>
        Swal.fire(
        'Dibatalkan',
        'Pengajuan pendaftaran merchant berhasil dibatalkan.',
        'success'
        )
    </script>
    <?php }
    ?>


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