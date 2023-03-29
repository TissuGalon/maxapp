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
            <!-- <div class="back-button me-2"><a href="shop-grid.html"><i class="fa-solid fa-arrow-left-long"></i></a></div> -->
            <div></div>
            <!-- Page Title-->
            <div class="page-heading">
                <h6 class="mb-0">Pesanan Berlangsung</h6>
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

        <div class="container px-0 pt-1">
            <?php
            $id_driver = $_SESSION['id_driver'];
            $kueri = mysqli_query($conn, "SELECT * FROM task_driver WHERE id_driver='$id_driver' AND status='diproses'");
            $row = mysqli_fetch_array($kueri);
            $cek = mysqli_num_rows($kueri);
            if($cek > 0){ ?>


                <?php
                $idpesanan = $row['id_pesanan'];
                $pesanan = mysqli_query($conn, "SELECT * FROM pesanan WHERE id_pesanan = '$idpesanan'");
                $p = mysqli_fetch_array($pesanan);
                ?>

                
                <div class="card bg-white ">
                    <div class="card-body">

                    <?php
                    $ids = $p['id_user'];
                    $user = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$ids'");
                    $u = mysqli_fetch_array($user);
                    ?>

                        <!-- ---------------- -->
                        <div class="container">
                <div class="d-flex align-items-start">
                    <!-- Vendor Profile-->
                    <div class="vendor-profile  me-3 mt-1 rounded">
                        <figure class="m-0" style="width:80px;height:80px;overflow:hidden;">
                        <!-- <img class="rounded-circle shadow-sm"  src="../img/user-image/<?php echo $u['foto'] ?>" alt=""> -->
                        <!-- GAMBAR -->
                        <div class="" style="height:100%;width:100%;overflow:hidden;border-radius:50%; background-position: center; background-size:cover;
            background-repeat: no-repeat; background-image: url('../img/user-image/<?php echo $u['foto'] ?>')">
                        </div>    
                        <!-- GAMBAR -->
                        </figure>
                    </div>
                    <!-- Vendor Info-->
                    <div class="vendor-info">
        
                            <h5 class="vendor-title text-dark">
                                <?php echo $u['nama'] ?>
                            </h5>
        

                        <p class="mb-1 text-dark"><i class="fa-solid fa-location-dot me-1"></i>
                        <small><?php echo $u['alamat'] ?></small>
                        </p>
                        <a class="btn btn-success shadow-sm">Lihat Profil <i class="fa-solid fa-eye"></i></a>

                    </div>


                </div>
    
            </div>
                        <!-- ---------------- -->

                    </div>
                </div>


                <div class="my-1"></div>

                <!-- ALAMAT -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="vendor-title text-dark my-0">
                                    Lokasi Terima Pesanan
                                </h6>
                                <small class="text-secondary"><?php echo $p['alamat'] ?></small>
                                <br>
                                <small class="text-secondary"><?php echo $p['latitude'] ?>, <?php echo $p['longtitude'] ?></small>
                            </div>
                            <div>
                                <?php if($p['latitude'] != null || $p['latitude'] != '' && $p['longtitude'] != null || $p['longtitude'] != '' ){ ?>
                                    <a class="btn btn-primary shadow-sm" href="alamat_pengiriman2.php?id=<?php echo $idpesanan; ?>">Tampilkan Lokasi </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="my-1"></div>

                <!-- HUBUNGI -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="vendor-title text-dark my-0">
                                    Hubungi pemesan
                                </h6>
                                <small class="text-secondary"><?php echo $u['nohp'] ?></small>
                            </div>
                            <div>
                                <?php if($p['latitude'] != null || $p['latitude'] != '' && $p['longtitude'] != null || $p['longtitude'] != '' ){ ?>
                                    <a class="btn btn-success shadow-sm" href="alamat_pengiriman2.php?id=<?php echo $idpesanan; ?>"><i class="fa-solid fa-messages"></i> Whatsapp </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="my-1"></div>
                
                <!-- TASK -->
                <div class="card ">
                    <div class="card-body px-0 py-0">

                        <?php
                        $no = 1;
                        $alltask = $p['produk'];                 
                        $task = json_decode($alltask);
             
                        foreach($task as $t){
                            $qgambar = mysqli_query($conn, "SELECT gambar FROM produk WHERE id_produk='$t->id'");
                            $gambar = mysqli_fetch_array($qgambar);
                            ?>
                        <div class="d-flex justify-content-start  shadow-sm p-2 pt-3">
                            <div class="text-dark px-2 pe-3"><?php echo $no++; ?> .</div>
                            <div class="d-flex">
                                <div class="shadow-sm rounded" style="width:90px;height:90px; overflow:hidden;">
                                <img src="../img/product/<?php echo $gambar['gambar'] ?>"></img>                    
                                </div>
                                <div class="m-3">
                                    <span class="text-dark"><?php echo $t->produk ?></span><br>
                                    <h6 class="text-warning my-0">Rp. <?php echo number_format($t->harga,2,",",".") ?></h6>
                                    <small>Jumlah : <b class="text-warning"><?php echo $t->qty ?></b></small>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a class="btn btn-warning text-light shadow-sm my-5 " href="produk.php?id=<?php echo $t->id ?>" style="">Lihat Produk</a>
                            </div>
                        </div>

                        <?php } ?>


                    </div>
                </div>


                <div class="my-1"></div>


                <!-- PROGRESS PESANAN -->
                <div class="card">
                    <div class="card-body">

                        
                        <?php
                        $progress = mysqli_query($conn, "SELECT * FROM progress_pesanan WHERE id_driver ='$id_driver' AND id_pesanan ='$idpesanan'");
                        $pro = mysqli_fetch_array($progress);
                        $id_progress = $pro['id_progress'];
                        ?>

                        <?php if($pro['diambil'] == "true"){?>
                            <!-- Single Order Status-->
                           <div class="single-order-status active">
                           <div class="order-icon"><i class="fa-solid fa-bag-shopping"></i></div>
                           <div class="order-text">
                               <h6>Pesanan di ambil</h6><span><?php echo $pro['waktu_diambil'] ?></span>
                           </div>
                           <div class="order-status"><i class="fa-solid fa-circle-check"></i></div>
                           </div>
                           <?php }else{ ?>
                            <!-- Single Order Status-->
                           <div class="single-order-status">
                           <div class="order-icon"><i class="fa-solid fa-bag-shopping"></i></div>
                           <div class="order-text">
                               <h6>Pesanan di ambil</h6><span>-</span>
                           </div>
                           <div class="order-status"><i class="fa-solid fa-circle-check"></i></div>
                           </div>
                        <?php } ?>


                        <?php if($pro['dikemas'] == "true"){?>
                            <!-- Single Order Status-->
                            <div class="single-order-status active">
                            <div class="order-icon"><i class="fa-solid fa-box-open"></i></div>
                            <div class="order-text">
                                <h6>Produk Dikemas</h6><span><?php echo $pro['waktu_dikemas'] ?></span>
                            </div>
                            <div class="order-status"><i class="fa-solid fa-circle-check"></i></div>
                            </div>
                            <?php }else{?>
                                <!-- Single Order Status-->
                                <div class="single-order-status">
                                <div class="order-icon"><i class="fa-solid fa-box-open"></i></div>
                                <div class="order-text">
                                    <h6>Produk Dikemas</h6><span>-</span>
                                </div>
                                <!-- <div class="order-status"><i class="fa-solid fa-circle-check"></i></div> -->
                                <a class="order-status btn btn-danger" href="proses/update_progress.php?update=dikemas&id=<?php echo $id_progress ?>">Kirim</a>
                                </div>
                            <?php } ?>

                        <?php if($pro['diantar'] == "true"){?>
                            <!-- Single Order Status-->
                            <div class="single-order-status active">
                            <div class="order-icon"><i class="fa-solid fa-truck"></i></div>
                            <div class="order-text">
                                <h6>Produk sedang diantar</h6><span><?php echo $pro['waktu_diantar'] ?></span>
                            </div>
                            <div class="order-status"><i class="fa-solid fa-circle-check"></i></div>
                            </div>                         
                            <?php }else{ ?>
                                <!-- Single Order Status-->
                                <div class="single-order-status">
                                <div class="order-icon"><i class="fa-solid fa-truck"></i></div>
                                <div class="order-text">
                                    <h6>Produk sedang diantar</h6><span>-</span>
                                </div>
                                <?php if($pro['dikemas'] == "true"){ ?>
                                        <a class="order-status btn btn-danger" href="proses/update_progress.php?update=diantar&id=<?php echo $id_progress ?>">Kirim</a>
                                <?php }else{ ?>
                                        <div class="order-status"><i class="fa-solid fa-circle-check"></i></div>
                                <?php } ?>

                                </div>
                        <?php } ?>
                       
                       
                        <?php if($pro['selesai'] == 'true'){ ?>
                            <!-- Single Order Status-->
                            <div class="single-order-status active">
                            <div class="order-icon"><i class="fa-solid fa-check"></i></div>
                            <div class="order-text">
                                <h6>Pesanan Selesai</h6><span><?php echo $pro['waktu_selesai'] ?></span>
                            </div>
                            <div class="order-status"><i class="fa-solid fa-circle-check"></i></div>
                        </div>                            
                            <?php }else{ ?>
                                <!-- Single Order Status-->
                                <div class="single-order-status">
                                <div class="order-icon"><i class="fa-solid fa-check"></i></div>
                                <div class="order-text">
                                    <h6>Pesanan Selesai</h6><span>-</span>
                                </div>
                                <div class="order-status"><i class="fa-solid fa-circle-check"></i></div>
                                </div>
                        <?php } ?>
                        


                    </div>                
                </div>
                <!-- PROGRESS PESANAN -->

                <div class="my-1"></div>
                
                <div class="card mb-1" id="card_bukti" style="display:none;">
                    <div class="card-body">
                    <form action="proses/upbukti.php" method="POST" enctype="multipart/form-data">
                                <label class="text-primary"><small>*Ukuran max 5MB</small></label>
                                <input type="hidden" name="id_pesanan" value="<?php echo $idpesanan ?>"></input>
                                <input type="file" onchange="validateSize(this)" accept="image/*" name="foto" required class="form-control pt-2">
                                <script>
                                    function validateSize(input) {
                                    const fileSize = input.files[0].size / 1024 / 1024; // in MiB
                                    if (fileSize > 10) {
                                        alert('Ukuran File melebihi 10  MiB');
                                        window.location.reload();
                                        // $(file).val(''); //for clearing with Jquery
                                    } else {
                                        // Proceed further
                                    }
                                    }
                                </script>
                              
                                <input type="submit" value="Kirim Bukti Pengiriman" name="ubah"
                                    class="btn m-1 btn-warning w-100 text-light"></input>
                            </form>
                    </div>                    
                </div>

                <div class="my-1"></div>


                <?php if($pro['diantar'] == 'true'){ ?>
                    <!-- BUTTON SELESAI -->
                    <div class="card mb-1" id="card_selesaikan">
                        <div class="card-body">
                            <a class="btn btn-warning text-white w-100" href="#card_bukti" onclick="selesaikan()"><i class="fa-solid fa-check"></i> Selesaikan Pesanan</a>
                        </div>                    
                    </div>
                    <!-- BUTTON SELESAI -->
                <?php } ?>



                <script>
                    function selesaikan(){
                        document.getElementById('card_bukti').style.display = "";
                        document.getElementById('card_selesaikan').style.display = "none";
                    }
                </script>



            <?php }else{ ?>
                <!-- DISINI -->
            <?php } ?>
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