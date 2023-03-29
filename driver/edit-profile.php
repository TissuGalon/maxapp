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


  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

</head>

<body>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


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
      <div class="back-button me-2 me-2"><a href="profile.php"><i class="fa-solid fa-arrow-left-long"></i></a></div>
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

    <?php
    $iddriver = $_SESSION['id_driver'];
    $profil = mysqli_query($conn, "SELECT * FROM driver WHERE id_driver ='$iddriver'");
    $row = mysqli_fetch_array($profil);
    ?>





    <div class="py-2"></div>

    <?php if($row['foto'] != '' || $row['foto'] != null){ ?>
        <div class="d-flex justify-content-center">

            <!-- GAMBAR -->
            <div class="" style="height:130px;width:130px;overflow:hidden;border-radius:50%; background-position: center; background-size:cover;
  background-repeat: no-repeat; background-image: url('../img/driver-image/<?php echo $row['foto'] ?>')">
            </div>    
            <!-- GAMBAR -->

        </div>
        <?php }else{ ?>
            <img src="../img/driver-image/avatar.svg" style="width:35%; height:auto; border-radius:50%; margin-left:auto; margin-right:auto; display:block; border: 3px solid orange"></img>
        <?php } ?>
        <div class="d-flex justify-content-center mt-2">
        <a href="upfoto.php" class="btn btn-primary text-center rounded-pill px-2"><i class="fa-solid fa-pencil me-1"></i> Edit foto profil</a>
        </div>
    <h4 class="text-center mt-3"><?php echo $row['nama_driver'] ?></h4>
    <h6 class="text-center mt-1">@<?php echo $row['id'] ?></h6>




    <div class="container px-0 pt-1">
      <!-- Profile Wrapper-->
      <div class="profile-wrapper-area pb-3">
        
        <!-- User Meta Data-->
        <div class="card user-data-card"  style="border-radius:20px 20px 0px 0px; ">
          <div class="card-body">
            <form>
              <div class=" mb-3">
                <div class=" mb-2"><i class="fa-solid me-2 text-dark fa-at"></i><span class="text-dark">Username</span></div>
                <input class="form-control" id="username" type="text" value="<?php echo $row['id'] ?>" disabled>
              </div>
              <div class="mb-3">
                <div class=" mb-2"><i class="fa-solid me-2 text-dark fa-user"></i><span class="text-dark">Nama Lengkap</span></div>
                <input class="form-control" id="nama" type="text" value="<?php echo $row['nama_driver'] ?>">
              </div>
              <div class="mb-3">
                <div class=" mb-2"><i class="fa-solid me-2 text-dark fa-phone"></i><span class="text-dark">Phone</span></div>
                <input class="form-control" id="nohp" type="text"  value="<?php echo $row['nohp'] ?>">
              </div>
 
              <a class="btn btn-primary rounded-pill w-100" onclick="ubah()">Simpan Perubahan</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>

    function ubah() {
      var ajax = new XMLHttpRequest();

      let username = document.getElementById("username").value
      let nama = document.getElementById("nama").value
      let nohp = document.getElementById("nohp").value

      ajax.open("POST", "proses/edit-profil-driver.php", true);
      ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      ajax.send("username=" + username + "&nama=" + nama + "&nohp=" + nohp);
      ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

          var data = this.responseText;
          console.log(data);


          /* ALERT */
          Toastify({
          text: 'Profil berhasil di update',
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
          /* ALERT */


        }

      }



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