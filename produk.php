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


    <?php
    $id = $_GET['id'];
    $kueri = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk ='$id'");
    $row = mysqli_fetch_array($kueri);
    ?>


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
            <!-- Page Title-->
            <div class="page-heading">
                <h6 class="mb-0">Product Details</h6>
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
        <div class="product-slide-wrapper">
            <!-- Product Slides-->
            <div class="product-slides owl-carousel">
                <div class="single-product-slide"
                    style="background-image: url('img/product/<?php echo $row['gambar'] ?>')"></div>
                <!-- <div class="single-product-slide" style="background-image: url('img/bg-img/10.jpg')"></div>
                <div class="single-product-slide" style="background-image: url('img/bg-img/11.jpg')"></div> -->
            </div>
            <!-- Video Button-->
            <!-- <a class="video-btn shadow-sm" id="singleProductVideoBtn"
                href="https://www.youtube.com/watch?v=lFGvqvPh5jI">
                <i class="fa-solid fa-play"></i>
            </a> -->
        </div>
        <div class="product-description pb-1">
            <!-- Product Title & Meta Data-->
            <div class="product-title-meta-data bg-white  py-3">
                <div class="container d-flex justify-content-between rtl-flex-d-row-r">
                    <div class="p-title-price">
                        <h5 class="mb-1">
                            <?php echo $row['nama_produk'] ?>
                        </h5>
                        <p class="sale-price mb-0 lh-1">Rp.
                            <?php echo $row['harga'] ?><span></span>
                        </p>
                    </div>
                    <div class="p-wishlist-share">

                   

                    <?php
                    if(isset($_SESSION['iduser'])){
                    $id_user = $_SESSION['iduser'];
                    $wishlist = mysqli_query($conn, "SELECT * FROM wishlist WHERE id_produk = '$id' AND id_user = '$id_user'");
                    $wish = mysqli_num_rows($wishlist);
                    if($wish > 0){ ?>
                        <a href="#" onclick="wishlist('<?php echo $row['id_produk'] ?>')"><i id="1heart<?php echo $row['id_produk'] ?>" class="fa-solid fa-heart"></i></a>
                        <?php }else{ ?>
                        <a href="#" onclick="wishlist('<?php echo $row['id_produk'] ?>')"><i id="1heart<?php echo $row['id_produk'] ?>" class="fa-sharp fa-regular fa-heart"></i></a>
                    <?php }
                } ?>
                    
                    


                        <script>



                        function runtoast(text){
                            Toastify({
                        text: text,
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
                            background: "linear-gradient(to right, #f54248, #f542a1)",
                        },
                        onClick: function(){} // Callback after click
                        }).showToast();
                        }

                       


                                    
                                    var ajax = new XMLHttpRequest();


                                    function wishlist(id){
                                        let namaclass = document.getElementById('1heart'+id).className;
                                        if(namaclass == 'fa-sharp fa-regular fa-heart'){
                                            document.getElementById('1heart'+id).className = "fa-solid fa-heart";
                                            sent('set', id);
                                            runtoast('Ditambahkan ke Wishlist !');
                                        }else{
                                            document.getElementById('1heart'+id).className = "fa-sharp fa-regular fa-heart";
                                            sent('unset', id);
                                            runtoast('Dihapus dari Wishlist !');
                                        }
                                    }
                                    
                                    function sent(set, id){
                                        ajax.open("POST", "proses/add_wishlist.php", true);
                                        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                        ajax.send("set=" + set + "&id=" + id);
                                        ajax.onreadystatechange = function () {
                                            if (this.readyState == 4 && this.status == 200) {
                                                var data = this.responseText;
                                                /* alert(data); */
                                            }
                                        }
                                    }
                                                                 
                                    </script>


                    </div>
                </div>
                <!-- Ratings-->
                <div class="product-ratings">

                    <!-- FREE ONGKIR -->
                    <div class="container d-flex justify-content-end my-1">
                        <?php
                        $idm = $row['id_merchant'];
                        $mq = mysqli_query($conn, "SELECT * FROM merchant WHERE id_merchant = '$idm'");
                        $m = mysqli_fetch_array($mq);
                        ?>
                        <?php if($m['partner'] == 'true'){ ?>
                            <small class="text-success">
                                <img src="img/ongkir.png" style="width:auto; height:15px;">
                            </small>
                        <?php } ?>
                    </div>
                    <!-- FREE ONGKIR -->


                    <div class="container d-flex align-items-center justify-content-between rtl-flex-d-row-r">
                        <div class="ratings">
                            <?php
                            $idp = $row['id_produk'];
                            $qb = mysqli_query($conn, "SELECT AVG(bintang) FROM `ulasan_produk` WHERE id_produk = '$idp'");
                            $brow = mysqli_fetch_array($qb);
                            $bintang = 0;
                            while ($bintang < $brow[0]) { ?>
                                <i class="fa-solid fa-star"></i>
                                <?php $bintang += 1;
                            } ?>


                            <span class="ps-1">
                                <?php echo round($brow[0]) ?> ratings
                            </span>
                        </div>
                        <div class="total-result-of-ratings"><span>
                                <?php echo round($brow[0]) ?>.0
                            </span>
                            <?php switch (round($brow[0])) {
                                case 0:
                                    echo '<span class="text-secondary">Belum diberi Rating</span>';
                                    break;
                                case 1:
                                    echo '<span class="text-danger">Kurang Baik</span>';
                                    break;
                                case 2:
                                    echo '<span class="text-warning">Baik</span>';
                                    break;
                                case 3:
                                    echo '<span>Sangat Baik</span>';
                                    break;
                                case 4:
                                    echo '<span>Bagus</span>';
                                    break;
                                case 5:
                                    echo '<span class="text-primary">Sangat Bagus</span>';
                                    break;
                            } ?>


                        </div>
                    </div>
                </div>
            </div>



            <?php /* <!-- Flash Sale Panel-->
             <div class="flash-sale-panel bg-white mb-3 py-3">
             <div class="container">
             <!-- Sales Offer Content-->
             <div class="sales-offer-content d-flex align-items-end justify-content-between">
             <!-- Sales End-->
             <div class="sales-end">
             <p class="mb-1 font-weight-bold"><i
             class="fa-solid fa-bolt-lightning lni-flashing-effect text-danger"></i> Flash sale
             end in</p>
             <!-- Please use event time this format: YYYY/MM/DD hh:mm:ss-->
             <ul class="sales-end-timer ps-0 d-flex align-items-center"
             data-countdown="2024/01/01 14:21:37">
             <li><span class="days">0</span>d</li>
             <li><span class="hours">0</span>h</li>
             <li><span class="minutes">0</span>m</li>
             <li><span class="seconds">0</span>s</li>
             </ul>
             </div>
             <!-- Sales Volume-->
             <div class="sales-volume text-end">
             <p class="mb-1 font-weight-bold">82% Sold Out</p>
             <div class="progress" style="height: 6px;">
             <div class="progress-bar bg-warning" role="progressbar" style="width: 82%;"
             aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
             </div>
             </div>
             </div>
             </div>
             </div> */?>




            <!-- Selection Panel-->
            <!-- <div class="selection-panel bg-white mb-3 py-3">

                <div class="container">

                    <div class="choose-color-wrapper">
                        <p class="mb-1 font-weight-bold">Note :</p>
                        <div class="choose-color-radio d-flex align-items-center">

                            <textarea name="note" rows="5" cols="50" class='form-control'
                                placeholder='Tambahkan Catatan Khusus...'></textarea>
                        </div>
                    </div>

                </div>
            </div> -->

            <!-- Add To Cart-->
            <div class="cart-form-wrapper bg-white  border-bottom pb-3 py-1">
                <div class="container">
                    <small class="m-2 text-secondary">Stock :
                        <strong class="text-warning" id="stock">
                            <?php echo $row['stock'] ?>
                        </strong>
                    </small>
                    <form class="cart-form mt-2">
                        <div class="order-plus-minus d-flex align-items-center">
                            <div class="btn btn-warning text-light" onclick="kurang()">-</div>
                            <input class="form-control cart-quantity-input" id="qty" type="text" step="1"
                                name="quantity" value="1" max="5" readonly>
                            <div class="btn btn-warning text-light" onclick="tambah()">+</div>

                            <script>
                                function tambah() {
                                    let qty = Number(document.getElementById('qty').value);
                                    let stock = Number(document.getElementById('stock').innerHTML);
                                    if (qty < stock) {
                                        qty += 1;
                                        document.getElementById('qty').value = qty;
                                    }
                                }

                                function kurang() {
                                    let qty = Number(document.getElementById('qty').value);
                                    let stock = Number(document.getElementById('stock').innerHTML);
                                    if (qty > 1) {
                                        qty -= 1;
                                        document.getElementById('qty').value = qty;
                                    }
                                }
                            </script>

                        </div>
                        <div class="mx-3"></div>
                        <?php if (!isset($_SESSION['username'])) { ?>
                            <a href="#" onclick="err_keranjang()" class="btn btn-warning text-light ms-3">Tambahkan ke Keranjang</a>
                            <script>
                                function err_keranjang() {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal',
                                        text: 'Login untuk menambahkan ke keranjang !'
                                    })
                                }
                            </script>
                        <?php } else { ?>

                            <?php if($row['id_merchant'] != $_SESSION['toko']){ ?>
                                <a href="#" class="btn btn-warning text-light ms-1" onclick="add('<?php echo $id; ?>')">Tambahkan ke Keranjang <i class="fa-solid fa-cart-plus ms-2"></i></a>
                            <?php }else{ ?>
                                <a href="produk_edit.php?id=<?php echo $row['id_produk'] ?>" class="btn btn-warning text-light w-50 ms-3"><i class="fa-solid fa-pencil me-2"></i> Edit Produk</a>
                            <?php } ?>


                        <?php } ?>
                    </form>
                </div>
            </div>


            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>


                var ajax = new XMLHttpRequest();

                function add(idd) {

                    let qty = document.getElementById('qty').value;



                    ajax.open("POST", "proses/addtocart.php", true);
                    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    ajax.send("idd=" + idd + "&qty=" + qty);
                    ajax.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {

                            var data = this.responseText;
                            console.log(data);

                            if (data == "berhasil") {
                                Swal.fire(
                                    'Berhasil!',
                                    'Produk berhasil ditambahkan kedalam keranjang.',
                                    'success'
                                );
                            }

                        }



                    }

                }



                function cek() {

                    let email = document.getElementById('email').value;
                    let username = document.getElementById('username').value;
                    let password1 = document.getElementById('password1').value;
                    let password2 = document.getElementById('password2').value;

                    if (email == null || username == null || password1 == null || password2 == null) {
                        Swal.fire(
                            'Invalid!',
                            'Lengkapi Data.',
                            'error'
                        )
                    } else {
                        if (password1 != password2) {
                            Swal.fire(
                                'Invalid!',
                                'Password tidak sama.',
                                'error'
                            )
                        } else {
                            daftar();
                        }

                    }




                }





            </script>

            <!-- Product Specification-->
            <div class="p-specification bg-white border-bottom py-3">
                <div class="container">
                    <h6>Tentang Produk</h6>
                    <small>
                        <?php echo $row['deskripsi'] ?>
                    </small>

                </div>
            </div>


            <?php
            $idm = $row['id_merchant'];
            $toko = mysqli_query($conn, "SELECT * FROM merchant WHERE id_merchant ='$idm'");
            $vtoko = mysqli_fetch_array($toko);
            ?>

            <!-- Merchant -->
            <div class="p-specification bg-white py-3">
                <div class="container">
                    <div class="single-profile-data d-flex align-items-center justify-content-center">
                        <div class="title d-flex align-items-center">
                        <div class="user-profile me-3 shadow-sm" style="overflow:hidden; height:50px;width:50px;">
                                <img class="rounded" src="img/merchant-image/<?php echo $vtoko['avatar'] ?>" width="80" height="auto" alt="">
                            </div>
                            <div>
                                <div class="text-dark">
                                    <?php echo $vtoko['nama'] ?>
                                </div>
                                <!-- <span class="text-secondary">Status</span> -->
                                <div class="text-secondary">
                                    <?php echo $vtoko['lokasi'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="data-content d-flex justify-content-end">
                            <div>
                                <a href="merchant.php?id=<?php echo $row['id_merchant'] ?>"
                                    class="btn btn-sm text-light btn-warning"><i class="fa-solid fa-store"></i> Kunjungi Toko</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    $jmlproduk = mysqli_query($conn, "SELECT * FROM produk WHERE id_merchant='$idm'");
                    $jmlp = mysqli_num_rows($jmlproduk);
                    ?>
                    <div class="d-flex justify-content-start">
                        <div class="">
                            <strong class="text-warning mx-1">
                                <?php echo $jmlp ?>
                            </strong>
                            <small>Produk</small>
                        </div>

                        <div class="mx-4"></div>

                        <div class="">
                            <?php
                            $cekpenilaian = mysqli_query($conn, "SELECT * FROM ulasan_produk WHERE id_merchant = '$idm'");
                            $cekp = mysqli_num_rows($cekpenilaian);
                            ?>
                            <strong class="text-warning mx-1">
                                <?php echo $cekp ?>
                            </strong>
                            <small>Penilaian</small>
                        </div>
                        <div class="">
                            <!-- <strong class="text-warning mx-1">100%</strong>
                            <small>Chat Dibalas</small> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Video -->
            <!-- <div class="bg-img" style="background-image: url(img/product/18.jpg)">
                <div class="container">
                    <div class="video-cta-content d-flex align-items-center justify-content-center">
                        <div class="video-text text-center">
                            <h4 class="mb-4">Summer Clothing</h4><a class="btn btn-info rounded-circle" id="videoButton"
                                href="https://www.youtube.com/watch?v=lFGvqvPh5jI"><i class="fa-solid fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div> -->





           
            <!-- Related Products Slides-->
            <div class="related-product-wrapper bg-white py-3 my-1">
                <div class="container">
                    <div class="section-heading d-flex align-items-center justify-content-between rtl-flex-d-row-r">
                        <h6>Produk Serupa</h6><!-- <a class="btn p-0" href="shop-grid.html">Lihat Semua</a> -->
                    </div>


                    <div class="related-product-slide owl-carousel">


                        <?php
                        $jenis = $row['jenis'];
                        $subjenis = $row['sub_jenis'];
                        $produk = mysqli_query($conn, "SELECT * FROM produk WHERE jenis='$jenis' OR sub_jenis ='$subjenis' LIMIT 10");
                        while ($p = mysqli_fetch_array($produk)) {
                            ?>

                            <div class="card product-card bg-gray shadow-none">
                                <div class="card-body">
                                    <!-- Badge-->
                                    <!-- <span class="badge rounded-pill badge-warning"><?php echo $p['sub_jenis'] ?></span> -->
                                    <!-- Wishlist Button-->

                                    
                                    
                                   

                                        
                                    <!-- Thumbnail -->
                                    <a class="product-thumbnail d-block"
                                        href="produk.php?id=<?php echo $p['id_produk'] ?>">
                                        
                                        <div style="overflow:hidden;width:100%;height:140px;" class="mb-2 rounded">
                                            <img class="mb-2"
                                                src="img/product/<?php echo $p['gambar'] ?>" alt="">

                                        </div>

                                        <!-- Offer Countdown Timer: Please use event time this format: YYYY/MM/DD hh:mm:ss -->
                                        <!-- <ul class="offer-countdown-timer d-flex align-items-center shadow-sm"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            data-countdown="2023/12/31 23:59:59">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <li><span class="days">0</span>d</li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <li><span class="hours">0</span>h</li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <li><span class="minutes">0</span>m</li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <li><span class="seconds">0</span>s</li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </ul> -->

                                    </a>

                                    <?php
                                    $id_merchant = $p['id_merchant'];
                                    $toko = mysqli_query($conn, "SELECT * FROM merchant WHERE id_merchant = '$id_merchant'");
                                    $t = mysqli_fetch_array($toko);
                                    ?>
                                    <small class="text-danger my-2"><i class="fa-solid fa-store"></i> <?php echo $t['nama'] ?></small><br>

                                    <!-- Product Title -->
                                    <a class="product-title" href="produk.php?id=<?php echo $p['id_produk'] ?>">
                                        <?php echo $p['nama_produk'] ?>
                                    </a>
                                    </a>
                                    <!-- Product Price -->
                                    <p class="sale-price">Rp.
                                    <?php echo number_format($p['harga'],2,",",".") ?><span></span>
                                    </p>
                                    <!-- Rating -->
                                    <div class="product-rating">
                                        <?php $bintang = 0; ?>
                                        <?php while ($bintang < $p['bintang']) { ?>
                                            <i class="fa-solid fa-star"></i>
                                            <?php $bintang += 1;
                                        } ?>

                                    </div>

                                    <!-- Add to Cart -->
                                   

                                </div>
                            </div>
                        <?php } ?>




                    </div>
                </div>
            </div>

            <?php if(isset($_GET['ulasan']) && $_GET['ulasan'] == 'hapus'){ ?>
                <script>
                    function alert_ulasan(text){
                            Toastify({
                        text: text,
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
                            background: "linear-gradient(to right, #f54248, #f542a1)",
                        },
                        onClick: function(){} // Callback after click
                        }).showToast();
                        }
                        alert_ulasan('Ulasan dihapus');
            </script>
            <?php }else if(isset($_GET['ulasan']) && $_GET['ulasan'] == 'success'){ ?>
                <script>
                    function alert_ulasan(text){
                            Toastify({
                        text: text,
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
                        }
                        alert_ulasan('Ulasan ditambahkan');
            </script>
            <?php } ?>

            <!-- Rating & Review Wrapper -->
            <div class="rating-and-review-wrapper bg-white py-3 my-1 dir-rtl">
                <div class="container">
                    <h6>Ratings &amp; Ulasan</h6>
                    <div class="rating-review-content ">
                        <ul class="ps-0">

                            <?php
                            $ulasan = mysqli_query($conn, "SELECT * FROM ulasan_produk WHERE id_produk = '$id' ORDER BY waktu DESC LIMIT 8 ");
                            $cekulasan = mysqli_num_rows($ulasan);
                            if ($cekulasan > 0) {
                                while ($ul = mysqli_fetch_array($ulasan)) {
                                    $id_user = $ul['id_user'];
                                    $usr = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id_user'");
                                    $vuser = mysqli_fetch_array($usr);
                                    ?>
                                    <!-- Single User Review -->
                                    <li class="single-user-review d-flex">
                                        <div class="user-thumbnail">

                                            <?php if ($vuser['foto'] != null || $vuser['foto'] != "") { ?>
                                                    <!-- GAMBAR -->
            <div class="" style="height:41px;width:41px;overflow:hidden;border-radius:50%; background-position: center; background-size:cover;
  background-repeat: no-repeat; background-image: url('img/user-image/<?php echo $vuser['foto'] ?>')">
            </div>    
            <!-- GAMBAR -->
                                                <?php } else { ?>
                                                    <img src="img/user-image/avatar.svg" alt="">
                                                <?php } ?>
                                        </div>


                                        <div class="rating-comment">
                                            <div class="rating">
                                                <?php $bintang = 0; ?>
                                                <?php while ($bintang < $ul['bintang']) { ?>
                                                    <i class="fa-solid fa-star"></i>
                                                    <?php $bintang += 1;
                                                } ?>
                                            </div>
                                            
                                            <small class="text-dark">
                                                <?php echo $vuser['nama'] ?>
                                            </small>
                                            <p class="comment mb-0">
                                                <?php echo $ul['ulasan'] ?>
                                            </p>
                                            <span class="name-date d-flex">
                                                <div>
                                                    <?php echo $ul['waktu'] ?>
                                                </div>
                                                <div class="mx-1"></div>
                                                <div>
                                                    <?php echo $ul['tgl'] ?>
                                                </div>
                                            </span>
                                            <?php if($ul['id_user'] == $_SESSION['iduser']){ ?>
                                                <a class="btn btn-danger btn-sm m-1" onclick="hps_penilaian('<?php echo $ul['id_ulasan'] ?>')"><i class="fa-solid fa-x me-1"></i> Hapus Penilaian</a>                                            
                                            <?php } ?>

                                            <script>
                                                function hps_penilaian(id){
                                                    Swal.fire({
                                                    icon: 'warning',
                                                    title: 'Hapus ulasan anda ?',
                                                    showCancelButton: true,
                                                    cancelButtonText: 'Batal',
                                                    confirmButtonText: 'Hapus',
                                                    confirmButtonColor: '#d33',
                                                    }).then((result) => {
                                                    /* Read more about isConfirmed, isDenied below */
                                                    if (result.isConfirmed) {
                                                        window.location.href = "proses/hapus_ulasan.php?id="+id+"&idproduk=<?php echo $_GET['id'] ?>";
                                                    } else if (result.isDenied) {
                                                    }
                                                    })
                                                }
                                            </script>
                                            

                                            <!-- <a class="review-image mt-2 border rounded" href="img/product/3.png"><img
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            class="rounded-3" src="img/product/3.png" alt=""></a> -->
                                        </div>
                                     
                                    </li>

                                <?php } ?>

                                <a class="btn btn-warning text-light w-100"
                                    href="seluruh_ulasan.php?id=<?php echo $id ?>">Lihat Seluruh
                                    Ulasan
                                </a>
                            <?php } else { ?>
                                <span class="btn btn-outline-secondary w-100 border disabled text-dark">Belum ada
                                    ulasan</span>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Ratings Submit Form-->
            <div class="ratings-submit-form bg-white py-3 dir-rtl">
                <div class="container">
                    <h6>Berikan Ulasan Anda</h6>
                    <form action="proses/ulasan_produk.php" method="GET">
                        <div class="stars mb-3">
                            <input required class="star-1" type="radio" name="star" value="1" id="star1">
                            <label class="star-1" for="star1"></label>
                            <input required class="star-2" type="radio" name="star" value="2" id="star2">
                            <label class="star-2" for="star2"></label>
                            <input required class="star-3" type="radio" name="star" value="3" id="star3">
                            <label class="star-3" for="star3"></label>
                            <input required class="star-4" type="radio" name="star" value="4" id="star4">
                            <label class="star-4" for="star4"></label>
                            <input required class="star-5" type="radio" name="star" value="5" id="star5">
                            <label class="star-5" for="star5"></label>
                            <span></span>
                        </div>
                        <textarea class="form-control mb-3" required id="comments" name="comment" cols="30" rows="10"
                            data-max-length="200" placeholder="Tulis ulasan Anda..."></textarea>
                        <input type="hidden" name="idproduk" value="<?php echo $row['id_produk'] ?>">
                        <input type="hidden" name="idmerchant" value="<?php echo $idm ?>">

                        <?php if (!isset($_SESSION['iduser'])) { ?>
                            <a class="btn btn-primary" href="#" onclick="err()">Kirim Ulasan</a>
                            <script>
                                function err() {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal',
                                        text: 'Login untuk memberikan ulasan !'
                                    })
                                }
                            </script>
                        <?php } else { ?>
                            <button class="btn btn-primary" type="submit">Kirim Ulasan</button>
                        <?php } ?>
                    </form>
                </div>
            </div>
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