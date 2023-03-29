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
    <!-- Preloader-->
    <div class="preloader" id="preloader">
        <div class="spinner-grow text-secondary" role="status">
            <div class="sr-only"></div>
        </div>
    </div>
   



    <?php include 'sidebar.php' ?>



    <div class="page-content-wrapper">

    <?php
    $id_user = $_SESSION['iduser'];
    $kueri = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'");
    $row = mysqli_fetch_array($kueri);
    ?>


    <div class="py-1"></div>

     <?php if($row['foto'] != '' || $row['foto'] != null){ ?>
        <div class="d-flex justify-content-center">
            <!-- GAMBAR -->
            <div class="" style="height:130px;width:130px;overflow:hidden;border-radius:50%; background-position: center; background-size:cover;
  background-repeat: no-repeat; background-image: url('img/user-image/<?php echo $row['foto'] ?>')">
            </div>    
            <!-- GAMBAR -->
        </div>
        <?php }else{ ?>
            <img src="img/user-image/avatar.svg" style="width:35%; height:auto; border-radius:50%; margin-left:auto; margin-right:auto; display:block; border: 3px solid orange"></img>
        <?php } ?>

    <h4 class="text-center mt-3"><?php echo $row['nama'] ?></h4>

    <div class="d-flex justify-content-center">
        <!-- <h6 class="btn btn-warning text-light btn-sm rounded-pill w-25 disabled"><i class="fa-solid fa-user"></i> User</h6> -->

    </div>

    <!-- <div class="d-flex justify-content-center m-3 mt-1 mx-5">

        <div class="card m-2" style="/* From https://css.glass */
background: rgba(255, 255, 255, 0.44);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(7.6px);
-webkit-backdrop-filter: blur(7.6px);
border: 1px solid rgba(255, 255, 255, 0.52); border-radius:20px;">
            <div class="card-body">
                <div class="text-center mx-2">
                    <strong>112</strong><br>
                    <small>Text</small>
                </div>
            </div>
        </div>
        <div class="card m-2" style="/* From https://css.glass */
background: rgba(255, 255, 255, 0.44);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(7.6px);
-webkit-backdrop-filter: blur(7.6px);
border: 1px solid rgba(255, 255, 255, 0.52); border-radius:20px;">
            <div class="card-body">
                <div class="text-center mx-2">
                    <strong>112</strong><br>
                    <small>Text</small>
                </div>
            </div>
        </div>
        <div class="card m-2" style="/* From https://css.glass */
background: rgba(255, 255, 255, 0.44);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(7.6px);
-webkit-backdrop-filter: blur(7.6px);
border: 1px solid rgba(255, 255, 255, 0.52); border-radius:20px;">
            <div class="card-body">
                <div class="text-center mx-2">
                    <strong>112</strong><br>
                    <small>Text</small>
                </div>
            </div>
        </div>
        
    </div> -->

  

    <div class="card my-3 mb-0">
      <div class="card-body">

            <a href="#" class="text-secondary btn   text-dark w-100 py-2 my-1" style="background-color:#f5f7fa; border-radius:20px;">
            <div class="d-flex justify-content-between mr-3">
                <div>
                    <i class="fa-solid fa-user text-dark me-4 ms-2"></i> <small>Username</small> 
                </div>
                <small clas="text-secondary"><?php echo $row['username'] ?></small>
            </div>
            </a>
            <a href="#" class="text-secondary btn   text-dark w-100 py-2 my-1" style="background-color:#f5f7fa; border-radius:20px;">
            <div class="d-flex justify-content-between mr-3">
                <div>
                    <i class="fa-solid fa-user text-dark me-4 ms-2"></i> <small>Nama Lengkap</small> 
                </div>
                <small clas="text-secondary"><?php echo $row['nama'] ?></small>
            </div>
            </a>
            <a href="#" class="text-secondary btn   text-dark w-100 py-2 my-1" style="background-color:#f5f7fa; border-radius:20px;">
            <div class="d-flex justify-content-between mr-3">
                <div>
                    <i class="fa-solid fa-phone text-dark me-4 ms-2"></i> <small>No. Telp</small> 
                </div>
                <small clas="text-secondary"><?php echo $row['nohp'] ?></small>
            </div>
            </a>
            <a href="#" class="text-secondary btn   text-dark w-100 py-2 my-1" style="background-color:#f5f7fa; border-radius:20px;">
            <div class="d-flex justify-content-between mr-3">
                <div>
                    <i class="fa-solid fa-envelope text-dark me-4 ms-2"></i> <small>Email</small> 
                </div>
                <small clas="text-secondary"><?php echo $row['email'] ?></small>
            </div>
            </a>
            <a href="#" class="text-secondary btn   text-dark w-100 py-2 my-1" style="background-color:#f5f7fa; border-radius:20px;">
            <div class="d-flex justify-content-between mr-3">
                <div>
                    <i class="fa-solid fa-location-pin text-dark me-4 ms-2"></i> <small>Alamat</small> 
                </div>
                <small clas="text-secondary"><?php echo $row['alamat'] ?></small>
            </div>
            </a>

            <a href="edit-profile.php" class="btn btn-primary w-100 mt-2 rounded-pill">Edit Profile <i class="fa-solid fa-pencil ms-2"></i></a>
           

      </div>
    </div>



    <div class="card my-1">
        <!-- <small style="border-radius: 0px; background-color:#f5f7fa;" class=" text-secondary btn btn-secondary w-100">Daftar merchant untuk mulai berjualan !</small> -->
        <div class="card-body">

        <?php
        
        if($_SESSION['toko'] != null || $_SESSION['toko'] != ''){
            $idm = $_SESSION['toko'];
            $mq = mysqli_query($conn, "SELECT * FROM merchant WHERE id_merchant = '$idm'");
            $moq = mysqli_fetch_array($mq);
        
            if($moq['konfirmasi'] == 'false'){
        ?>
            <a href="daftar_merchant.php" class="text-secondary btn   text-dark w-100 py-3 my-1" style="background-color:#f5f7fa; border-radius:20px; border: 2px solid orange">
            <div class="d-flex justify-content-between">
                <div>
                    <i class="fa-solid fa-store text-warning me-4 ms-2"></i> <small>Daftar Merchant</small> 
                </div>
                <i class="fa-solid fa-arrow-right m-1 "></i>
            </div>
            </a>

            <?php } ?>

            
            <?php if($moq['partner'] != 'true' && $moq['konfirmasi'] == 'true'){ ?>
            <a href="daftar_partner.php" class="text-secondary btn   text-dark w-100 py-3 my-1" style="background-color:#f5f7fa; border-radius:20px; border: 2px solid orange">
            <div class="d-flex justify-content-between">
                <div>
                    <i class="fa-solid fa-certificate text-warning me-3 ms-2"></i> <small>Daftar Max Partner</small> 
                </div>
                <i class="fa-solid fa-arrow-right m-1 "></i>
            </div>
            </a>
            <?php } ?> 

        <?php }else{ ?>

            <a href="daftar_merchant.php" class="text-secondary btn   text-dark w-100 py-3 my-1" style="background-color:#f5f7fa; border-radius:20px; border: 2px solid orange">
            <div class="d-flex justify-content-between">
                <div>
                    <i class="fa-solid fa-store text-warning me-4 ms-2"></i> <small>Daftar Merchant</small> 
                </div>
                <i class="fa-solid fa-arrow-right m-1 "></i>
            </div>
            </a>

        <?php } ?>


        </div>
    </div>

    

    <div class="card pb-5" style="border-radius:20px 20px 0px 0px; ">
        <div class="card-body px-2">
            
        <div class="py-2"></div>

            
            <a href="wishlist.php" class="text-secondary btn   text-dark w-100 py-3 my-1" style="background-color:#f5f7fa; border-radius:20px;">
            <div class="d-flex justify-content-between">
                <div>
                    <i class="fa-solid fa-heart text-danger me-4 ms-2"></i> <small>Wishlist Saya</small> 
                </div>
                <i class="fa-solid fa-arrow-right m-1 "></i>
            </div>
            </a>
            <a href="riwayat.php" class="text-secondary btn   text-dark w-100 py-3 my-1" style="background-color:#f5f7fa; border-radius:20px;">
            <div class="d-flex justify-content-between">
                <div>
                    <i class="fa-solid fa-history text-secondary me-4 ms-2"></i> <small>Riwayat Pesanan</small> 
                </div>
                <i class="fa-solid fa-arrow-right m-1 "></i>
            </div>
            </a>

            <!-- <a href="#" class="text-secondary btn   text-dark w-100 py-3 my-1" style="background-color:#f5f7fa; border-radius:20px;">
            <div class="d-flex justify-content-between">
                <div>
                    <i class="fa-solid fa-gear text-secondary me-4 ms-2"></i> <small>Setting</small> 
                </div>
                <i class="fa-solid fa-arrow-right m-1 "></i>
            </div>
            </a> -->
          
            <a href="#" onclick="logout()" class="text-secondary btn   text-dark w-100 py-3 my-1" style="background-color:#f5f7fa; border-radius:20px;">
            <div class="d-flex justify-content-between">
                <div>
                    <i class="fa-solid fa-right-from-bracket text-danger me-4 ms-2"></i> <small>Logout</small> 
                </div>
                <i class="fa-solid fa-arrow-right m-1 "></i>
            </div>
            </a>

            <script>
                function logout(){
                    Swal.fire({
                        icon:'question',
                        title:'Logout',
                        text: 'Keluar dari akun ini ?',
                        showCancelButton: true,
                        cancelButtonText: 'Batal',
                        confirmButtonText: 'Keluar',
                        confirmButtonColor: '#d33'
                    }).then((result) => {
                        if(result.isConfirmed){
                            window.location.href = 'proses/logout.php';
                        }
                    })
                }
            </script>


        </div>
    </div>





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