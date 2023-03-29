<?php session_start();
include '../koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
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
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
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


    <!-- HERE MAP API -->
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
    <script>
        window.ENV_VARIABLE = "developer.here.com";
    </script>

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
        <div class="back-button me-2"><a href="berlangsung.php"><i class="fa-solid fa-arrow-left-long"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0">Alamat Pengiriman</h6>
        </div>
        <!-- Navbar Toggler-->
        <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas">
          <div><span></span><span></span><span></span></div>
        </div>
      </div>
    </div>

    <?php include 'sidebar.php'; ?>
    
    <div class="page-content-wrapper" >


    <?php
    $id = $_GET['id'];
    $kueri = mysqli_query($conn, "SELECT * FROM pesanan WHERE id_pesanan='$id'");
    $row = mysqli_fetch_array($kueri);
   
    ?>


      <!-- HERE Maps-->
          <div id="map" style="height:81vh; position:fixed;"></div>

          <a class='btn btn-warning text-light w-100 my-2 py-2' style="position:fixed;" href="https://www.google.co.id/maps/place/<?php echo $row['latitude']; ?>,<?php echo $row['longtitude']; ?>/@<?php echo $row['latitude']; ?>,<?php echo $row['longtitude']; ?>,17.75z/data=!4m4!3m3!8m2!3d<?php echo $row['latitude']; ?>!4d<?php echo $row['longtitude']; ?>">Tampilkan Di Google Maps <i class="fa-solid fa-location-pin ms-2"></i></a>
      
    </div>


    <script>
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


                                /* Move to Langsa */
                                function tampilkan(map) {
                                    map.setCenter({ lat: <?php echo $row['latitude']; ?>, lng: <?php echo $row['longtitude']; ?> });
                                    map.setZoom(14);
                                }


              


                                var markerlokasi = new H.map.Marker({
                                lat:<?php echo $row['latitude']; ?>,
                                lng:<?php echo $row['longtitude']; ?>
                                });
                                map.addObject(markerlokasi);



                                window.onload = function () {
                                    tampilkan(map);
                                }

    </script>



    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <?php include 'navigasi.php'; ?>
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