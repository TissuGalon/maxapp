<?php
include 'koneksi.php';
session_start();
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

    <!-- map api -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v7.2.2/ol.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css"
        type="text/css">

    <link rel="stylesheet" href="node_modules/ol/ol.css">


    <!-- HERE MAP API -->
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
    <script>
        window.ENV_VARIABLE = "developer.here.com";
    </script>
    <script src="../iframeheight.js"></script>
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
            <div class="back-button me-2"><a href="cart.php?harga=<?php echo $_GET['harga'] ?>"><i
                        class="fa-solid fa-arrow-left-long"></i></a>
            </div>
            <!-- Page Title-->
            <div class="page-heading">
                <h6 class="mb-0">Informasi Billing</h6>
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
        <div class="container px-0">



            <!-- Checkout Wrapper-->
            <div class="checkout-wrapper-area py-1 pb-3">


                <!-- Billing Address-->
                <div class="billing-information-card">
                    <div class="card billing-information-title-card bg-light">
                        <div class="card-body">
                            <h6 class="text-center mb-0 text-dark">Lokasi Terima Pesanan</h6>
                        </div>
                    </div>
                    <div class="card user-data-card">
                        <div class="card-body">
                            <div class="single-profile-data d-flex align-items-center justify-content-between">
                                <div class="title d-flex align-items-center"><i
                                        class="fa-solid fa-location-crosshairs"></i><span id="testing">Lokasi Terima
                                        Pesanan
                                    </span>
                                </div>
                                <div class="data-content" id="datalokasi"><span id="lat"></span>, <span id="lng"></span>
                                </div>
                            </div>


                            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                            <!-- MAP -->
                            <div id="map" style="display:none;"></div>
                            <!-- <script type="text/javascript" src="demo.js"></script> -->
                            <script>

                                let lat;
                                let lng;

                                function addDraggableMarker(map, behavior) {

                                    var marker = new H.map.Marker({ lat: 4.479158, lng: 97.956429 }, {
                                        // mark the object as volatile for the smooth dragging
                                        volatility: true
                                    });
                                    // Ensure that the marker can receive drag events
                                    marker.draggable = true;
                                    map.addObject(marker);

                                    // disable the default draggability of the underlying map
                                    // and calculate the offset between mouse and target's position
                                    // when starting to drag a marker object:
                                    map.addEventListener('dragstart', function (ev) {
                                        var target = ev.target,
                                            pointer = ev.currentPointer;
                                        if (target instanceof H.map.Marker) {
                                            var targetPosition = map.geoToScreen(target.getGeometry());
                                            target['offset'] = new H.math.Point(pointer.viewportX - targetPosition.x, pointer.viewportY - targetPosition.y);
                                            behavior.disable();
                                        }
                                    }, false);


                                    // re-enable the default draggability of the underlying map
                                    // when dragging has completed
                                    map.addEventListener('dragend', function (ev) {
                                        var target = ev.target;
                                        if (target instanceof H.map.Marker) {
                                            behavior.enable();
                                        }
                                    }, false);

                                    // Listen to the drag event and move the position of the marker
                                    // as necessary
                                    map.addEventListener('drag', function (ev) {
                                        var target = ev.target,
                                            pointer = ev.currentPointer;
                                        if (target instanceof H.map.Marker) {
                                            target.setGeometry(map.screenToGeo(pointer.viewportX - target['offset'].x, pointer.viewportY - target['offset'].y));
                                            document.getElementById("lat").innerHTML = target.a.lat;
                                            document.getElementById("lng").innerHTML = target.a.lng;
                                            lat = target.a.lat;
                                            lng = target.a.lng;
                                            /* console.log(target); */
                                        }
                                    }, false);
                                }

                                /* --------------------------------------------------------------------- */


                                function markersekarang(map, behavior) {

                                    var marker = new H.map.Marker({ lat: document.getElementById("lat").innerHTML, lng: document.getElementById("lng").innerHTML }, {
                                        // mark the object as volatile for the smooth dragging
                                        volatility: true
                                    });
                                    // Ensure that the marker can receive drag events
                                    marker.draggable = true;
                                    map.addObject(marker);

                                    // disable the default draggability of the underlying map
                                    // and calculate the offset between mouse and target's position
                                    // when starting to drag a marker object:
                                    map.addEventListener('dragstart', function (ev) {
                                        var target = ev.target,
                                            pointer = ev.currentPointer;
                                        if (target instanceof H.map.Marker) {
                                            var targetPosition = map.geoToScreen(target.getGeometry());
                                            target['offset'] = new H.math.Point(pointer.viewportX - targetPosition.x, pointer.viewportY - targetPosition.y);
                                            behavior.disable();
                                        }
                                    }, false);


                                    // re-enable the default draggability of the underlying map
                                    // when dragging has completed
                                    map.addEventListener('dragend', function (ev) {
                                        var target = ev.target;
                                        if (target instanceof H.map.Marker) {
                                            behavior.enable();
                                        }
                                    }, false);

                                    // Listen to the drag event and move the position of the marker
                                    // as necessary
                                    map.addEventListener('drag', function (ev) {
                                        var target = ev.target,
                                            pointer = ev.currentPointer;
                                        if (target instanceof H.map.Marker) {
                                            target.setGeometry(map.screenToGeo(pointer.viewportX - target['offset'].x, pointer.viewportY - target['offset'].y));
                                            document.getElementById("lat").innerHTML = target.a.lat;
                                            document.getElementById("lng").innerHTML = target.a.lng;
                                            lat = target.a.lat;
                                            lng = target.a.lng;
                                            /* console.log(target); */
                                        }
                                    }, false);
                                }





                                /**
                                 * Boilerplate map initialization code starts below:
                                 */

                                //Step 1: initialize communication with the platform
                                // In your own code, replace variable window.apikey with your own apikey
                                var platform = new H.service.Platform({
                                    apikey: 'yh0mc-Rjnt_fCGA5XlSj97jr9NbkK-BjUYVe6AdPAYE'
                                });
                                var defaultLayers = platform.createDefaultLayers();

                                //Step 2: initialize a map - this map is centered over Europe
                                var map = new H.Map(document.getElementById('map'),
                                    defaultLayers.vector.normal.map, {
                                    center: { lat: 50, lng: 5 },
                                    zoom: 4,
                                    pixelRatio: window.devicePixelRatio || 1
                                });
                                // add a resize listener to make sure that the map occupies the whole container
                                window.addEventListener('resize', () => map.getViewPort().resize());

                                //Step 3: make the map interactive
                                // MapEvents enables the event system
                                // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
                                var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

                                // Create the default UI components
                                var ui = H.ui.UI.createDefault(map, defaultLayers);

                                /* -------------------------------------------------------------------------- */






                                // Now use the map as required...
                                /* window.onload = function () {
                                    movemaptoLangsa(map);
                                } */

                                /* Move to Langsa */
                                function movemaptoLangsa(map) {
                                    map.setCenter({ lat: 4.479158, lng: 97.956429 });
                                    map.setZoom(14);
                                }


                                let x;
                                let y;


                                window.onload = function () {
                                    getLocation();
                                }

                                function getLocation() {
                                    lat = document.getElementById("lat");
                                    lng = document.getElementById("lng");

                                    if (navigator.geolocation) {
                                        navigator.geolocation.getCurrentPosition(showPosition);
                                    } else {
                                        lat.innerHTML = "Tidak Support GPS.";
                                        movemaptoLangsa(map);
                                        // Add the click event listener.
                                        addDraggableMarker(map, behavior);
                                    }

                                }

                                function showPosition(position) {
                                    lat.innerHTML = position.coords.latitude;
                                    lng.innerHTML = position.coords.longitude;
                                    x = position.coords.latitude;
                                    y = position.coords.longitude;
                                    movetosekarang(map);
                                    markersekarang(map, behavior);
                                }

                                /* Move to Sekarang */
                                function movetosekarang(map) {
                                    map.setCenter({ lat: document.getElementById("lat").innerHTML, lng: document.getElementById("lng").innerHTML });
                                    map.setZoom(18);
                                }

                                /* BTN Move to Sekarang */
                                function btnmovetosekarang(map) {
                                    document.getElementById("lat").innerHTML = x;
                                    document.getElementById("lng").innerHTML = y;
                                    map.setCenter({ lat: x, lng: y });
                                    map.setZoom(15);
                                }

                            </script>


                            <!-- SET ALAMAT-->
                            <div class="d-flex justify-content-between mt-2">
                                <a onclick="buka()" id="btnbuka" class="btn btn-success
                             w-50 text-light" href="#map" aria-controls="suhaOffcanvas">Set
                                    Alamat
                                </a>

                                <a onclick="btnmovetosekarang(map)" id="btnlokasi" style="display:none;" class="btn btn-primary
                             w-50 text-light" href="#" aria-controls="suhaOffcanvas">Lokasi Sekarang

                                </a>

                                <a onclick="tutup()" style="display:none;" id="btntutup" class="btn btn-danger
                             w-40 text-light" href="#" aria-controls="suhaOffcanvas">Tutup

                                </a>

                                <button class="btn btn-sm btn-info"
                                    onclick="alert('Koordinat anda : '+x+', '+y)">CEK</button>

                                <script>
                                    function buka() {
                                        document.getElementById("map").style.display = "block";
                                        document.getElementById("btnbuka").style.display = "none";
                                        document.getElementById("btntutup").style.display = "block";
                                        document.getElementById("btnlokasi").style.display = "block";
                                    }

                                    function tutup() {
                                        document.getElementById("map").style.display = "none";
                                        document.getElementById("btntutup").style.display = "none";
                                        document.getElementById("btnlokasi").style.display = "none";
                                        document.getElementById("btnbuka").style.display = "block";
                                    }
                                </script>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-1"></div>

                <!-- MODAL -->
                <div class="offcanvas offcanvas-start " tabindex="-1" id="setmap" aria-labelledby="suhaOffcanvasLabel">
                    <!-- Close button-->
                    <button class="btn-close btn-close-white" type="button" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                    <!-- Offcanvas body-->
                    <div class="offcanvas-body">

                    </div>
                </div>




                <?php
                /* <script>
                // Set up five markers.
                var coords = [{ lat: 4.47908, lng: 97.95635 },
                { lat: 60.1704, lng: 24.8285 },
                { lat: 60.1709, lng: 24.8277 },
                { lat: 60.1700, lng: 24.8265 },
                { lat: 60.1700, lng: 24.8283 }];
                //Create the svg mark-up
                var svgMarkup = '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg">' +
                '<rect stroke="white" fill="#1b468d" x="1" y="1" width="22" height="22" />' +
                '<text x="12" y="18" font-size="12pt" font-family="Arial" font-weight="bold" ' +
                'text-anchor="middle" fill="white">${REPLACE}</text></svg>';
                coords.forEach(function (value, index) {
                var myIcon = new H.map.Icon(svgMarkup.replace('${REPLACE}', index + 1), {
                anchor: { x: 12, y: 12 }
                }),
                marker = new H.map.Marker(value, {
                icon: myIcon,
                volatility: true
                });
                // add custom data to the marker
                marker.setData(index + 1);
                // set draggable attribute on the marker so it can recieve drag events
                marker.draggable = true;
                map.addObject(marker);
                });
                // simple D'n"D implementation for markers"'
                map.addEventListener('dragstart', function (ev) {
                var target = ev.target;
                if (target instanceof H.map.Marker) {
                behavior.disable();
                }
                }, false);
                map.addEventListener('drag', function (ev) {
                var target = ev.target,
                pointer = ev.currentPointer;
                if (target instanceof H.map.Marker) {
                target.setGeometry(map.screenToGeo(pointer.viewportX, pointer.viewportY));
                }
                }, false);
                map.addEventListener('dragend', function (ev) {
                var target = ev.target;
                if (target instanceof H.map.Marker) {
                behavior.enable();
                }
                }, false);
                // Add the click event listener.
                addClickEventListenerToMap(map);
                </script> */
                ?>


                <!-- Billing Address-->
                <div class="billing-information-card ">
                    <div class="card billing-information-title-card bg-light">
                        <div class="card-body">
                            <h6 class="text mb-0 text-dark">Produk</h6>
                        </div>
                    </div>
                    <div class="card user-data-card">
                        <div class="card-body px-2">

                            <script>
                                let allproduk = new Array();
                            </script>

                            <?php
                            $no = 1;
                            $jmlproduk = 0;
                            $iduser = $_SESSION['iduser'];
                            $keranjang = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_user='$iduser'");
                            while ($view = mysqli_fetch_array($keranjang)) {
                                $idp = $view['id_produk'];
                                $produk = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$idp'");

                                while ($row = mysqli_fetch_array($produk)) {
                                    $jmlproduk++;
                                    $idmerchant = $row['id_merchant'];
                                    $toko = mysqli_query($conn, "SELECT * FROM merchant WHERE id_merchant='$idmerchant'");
                                    $vtoko = mysqli_fetch_array($toko);
                                    ?>



                                    <script>                                        
                                        allproduk.push({ id: <?php echo $row['id_produk'] ?>, produk: "<?php echo $row['nama_produk'] ?>", harga: <?php echo $row['harga'] ?>, qty: <?php echo $view['qty'] ?>, id_merchant: <?php echo $row['id_merchant'] ?>});
                                    </script>

                                    <div class='border rounded shadow-sm p-2'>
                                        <div class="m-2 my-3 d-flex justify-content-between">
                                            <div><i class="fa-solid fa-shop"></i>
                                                <small class="mx-2">
                                                    <?php echo $vtoko['nama'] ?>
                                                </small>
                                            </div>
                                            <small>
                                                <i class="fa-solid fa-location"></i>
                                                <a href="#" class="text-secondary">
                                                    <?php echo $vtoko['latitude'] ?>,
                                                    <?php echo $vtoko['longtitude'] ?>
                                                </a></small>
                                        </div>
                                        <hr>
                                        <div class="single-profile-data d-flex align-items-center justify-content-center px-2">
                                            <div class="title d-flex align-items-center">
                                                <strong class="mx-2">
                                                    <?php echo $no; ?>
                                                </strong>
                                                <img class="rounded" src="img/product/<?php echo $row['gambar'] ?>" width="80"
                                                    height="auto" alt="">

                                            </div>
                                            <div class="data-content d-flex justify-content-between">
                                                <span class="text-dark">
                                                    <?php echo $row['nama_produk'] ?>
                                                </span>
                                                <div><strong>Rp.
                                                <?php echo number_format($row['harga'],2,",",".") ?></strong>
                                                </div>
                                                <div>x
                                                    <?php echo $view['qty'] ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <?php $no++ ?>
                                <?php }
                            } ?>



                        </div>
                        <div class="card-footer bg-white">
                                                
                            <div class="data-content d-flex my-2 justify-content-between">
                                <div class="text"><small>Total Pesanan (
                                        <span id="jml_produk">
                                            <?php echo $jmlproduk; ?>
                                        </span> Produk ) :
                                    </small></div>
                                <div class="text-warning text"><strong>Rp.
                                <?php echo number_format($_GET['harga'],2,",",".") ?>
                                    </strong></div>
                            </div>
                        </div>
                    </div>
                </div>

                

                <!-- Voucher-->
                <!-- <div class="billing-information-card ">
                    <div class="card billing-information-title-card bg-light">
                        <div class="card-body">
                            <h6 class="text mb-0 text-dark"><i class="fa-solid fa-"></i> Voucher
                            </h6>
                        </div>
                    </div>
                    <div class="card user-data-card">
                        <div class="card-body">


                            <div class="single-profile-data d-flex align-items-center justify-content-between">
                                <div class="title d-flex align-items-center">
                                    <i class="fa-solid fa-credit-card"></i>
                                    <span class="m-2">Voucher Max</span>
                                </div>
                                <div class="data-content d-flex justify-content-between">
                                    <div>Gunakan/Masukkan Kode</div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div> -->

                <!-- Billing Address-->
                <div class="billing-information-card my-1">
                    <div class="card billing-information-title-card bg-light">
                        <div class="card-body">
                            <h6 class="text mb-0 text-dark"><i class="fa-solid fa-note-sticky"></i> Catatan Pesan
                            </h6>
                        </div>
                    </div>
                    <div class="card user-data-card">
                        <div class="card-body">


                        <div class="d-flex mb-2">
                                            <textarea class="form-control" id="tekspesan" maxlength="250" placeholder="Silahkan tinggalkan pesan . . ."></textarea>
                                        </div>

                        </div>

                    </div>
                </div>

                <!-- Billing Address-->
                <div class="billing-information-card my-1">
                    <div class="card billing-information-title-card bg-light">
                        <div class="card-body">
                            <h6 class="text mb-0 text-dark"><i class="fa-solid fa-credit-card"></i> Metode Pembayaran
                            </h6>
                        </div>
                    </div>
                    <div class="card user-data-card">
                        <div class="card-body">


                            <div class="shipping-method-choose">
                                <ul class="ps-0">
                                    <?php
                                    $no = 1;
                                    $pay = mysqli_query($conn, "SELECT * FROM pay_method");
                                    while($py = mysqli_fetch_array($pay)){ ?>
                                    <li>
                                        <input id="fastShipping<?php echo $no; ?>" type="radio" value="<?php echo $py['id_metode'] ?>" name="pembayaran">
                                        <label for="fastShipping<?php echo $no++; ?>"><?php echo $py['nama'] ?><span></span></label>
                                        <div class="check"></div>
                                    </li>
                                    <?php } ?>

                                </ul>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Billing Address-->
                <div class="billing-information-card ">
                    <div class="card billing-information-title-card bg-light">
                        <div class="card-body">
                            <h6 class="text mb-0 text-dark"><i class="fa-solid fa-"></i> Rincian
                                Pembayaran
                            </h6>
                        </div>
                    </div>
                    <div class="card user-data-card">
                        <div class="card-body">


                            <div class="single-profile-data d-flex align-items-center justify-content-between">
                                <div class=" d-flex align-items-center">
                                    <span class="">Subtotal untuk Produk</span>
                                </div>
                                <div class="data-content d-flex justify-content-end">
                                    <div>Rp.
                                        <span id="hproduk">
                                            <?php echo $_GET['harga'] ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="single-profile-data d-flex align-items-center justify-content-between">
                                <div class=" d-flex align-items-center">
                                    <span class="">Subtotal Pengiriman</span>
                                </div>
                                <div class="data-content d-flex justify-content-end">
                                    <?php
                                    $pengiriman = 8000;
                                    $jmlh_toko = $no - 1;
                                    if ($jmlh_toko > 1) {
                                        $hkirim = 1000 * $jmlh_toko;
                                        $hkirim -= 1000;
                                    } else {
                                        $hkirim = 0;
                                    }

                                    $pengiriman += $hkirim;
                                    ?>
                                    <div>Rp.<span id="hkirim">
                                            <?php echo $pengiriman ?>
                                        </span></div>

                                </div>
                            </div>
                            <div class="single-profile-data d-flex align-items-center justify-content-between">
                                <div class="title d-flex align-items-center">
                                    <span class="">Total Pembayaran</span>
                                </div>
                                <div class="data-content d-flex justify-content-end">
                                    <div class="text-warning"><strong>Rp.<span id="htotal"></span></strong></div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <br>
                <br>

                <script>
                    window.addEventListener("load", setharga);
                    function setharga() {
                        let hproduk = Number(document.getElementById('hproduk').innerHTML);
                        let hkirim = Number(document.getElementById('hkirim').innerHTML);
                        let htotal = Number(document.getElementById('htotal').innerHTML);
                        let tambah = hproduk + hkirim;
                        document.getElementById('htotal').innerHTML = tambah;
                        document.getElementById('totalbayar').innerHTML = tambah;
                    }
                </script>


                <!-- Cart Amount Area-->
                <div class="card cart-amount-area fixed-bottom mb-5 ">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <small>Total Pembayaran :</small>
                        <h5 class="total-price mb-0">Rp. <span class="" id="totalbayar">
                                <?php echo $_GET['harga'] ?>
                            </span></h5>
                        <a class="btn btn-warning btn-lg text-light" href="#" onclick="buatpesanan()">Buat Pesanan</a>

                        <script>
                            function buatpesanan() {
                                if (x == "" || x == null && y == "" || y == null) {
                                    Swal.fire(
                                        'Lokasi Tidak di atur',
                                        'Mohon atur lokasi terima pesanan',
                                        'info'
                                    )
                                } else {
                                    let jmlproduk = document.getElementById('jml_produk').innerHTML;
                                    let total = document.getElementById('totalbayar').innerHTML;

                                    let metode_pembayaran = document.querySelector('input[name="pembayaran"]:checked').value;
                                    let total_produk = jmlproduk;
                                    let total_pengiriman = Number(document.getElementById("hkirim").innerHTML);
                                    let total_pembayaran = Number(total);

                                    let catatan = document.getElementById('tekspesan').value;

                                    sessionStorage.setItem("allproduk", null);

                                    Swal.fire({
                                        title: 'Konfirmasi',
                                        text: 'Total ' + jmlproduk + ' Produk Rp. ' + total + ' dan Lokasi Terima ' + x + ', ' + y,
                                        showCancelButton: true,
                                        confirmButtonText: 'Buat Pesanan',
                                        cancelButtonText: 'Batal'
                                    }).then((result) => {
                                        /* Read more about isConfirmed, isDenied below */
                                        if (result.isConfirmed) {
                                            sessionStorage.setItem("allproduk", JSON.stringify(allproduk));
                                            sessionStorage.getItem("allproduk");
                                            location.href = "proses/buatpesanan.php?metode_pembayaran=" + metode_pembayaran + "&total_produk=" + Number(total_produk) + "&total_pengiriman=" + total_pengiriman + "&total_pembayaran=" + total_pembayaran + "&latitude=" + x + "&longtitude=" + y + "&allproduk=" + JSON.stringify(allproduk) + "&catatan=" + catatan;
                                        } else if (result.isDenied) {
                                            Swal.fire('Changes are not saved', '', 'info')
                                        }
                                    })

                                }
                            }
                        </script>

                    </div>
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