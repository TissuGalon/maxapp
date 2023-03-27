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
  <link rel="stylesheet" href="style2.css">
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
  <!-- Login Wrapper Area-->
  <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
    <!-- Background Shape-->
    <div class="background-shape"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-10 col-lg-8"><img class="big-logo rounded-circle shadow-sm" src="img/core-img/circle-logo.png" style="width:100px; height:auto;" alt="">




          <!-- Register Form-->

          <div class="register-form mt-4">
            <form action="#" onsubmit="cek(); return false;">
              <div class="form-group text-start mb-4"><span class="text-dark">Username</span>
                <label for="username"><i class="fa-solid fa-user text-secondary"></i></label>
                <input class="form-control" id="username" type="text" placeholder="Nama User" name="username" required>
              </div>
              <div class="form-group text-start mb-4"><span class="text-dark">Email</span>
                <label for="email"><i class="fa-solid fa-at text-secondary"></i></label>
                <input class="form-control" id="email" type="email" placeholder="email@example.com" name="email"
                  required>
              </div>
              <div class="form-group text-start mb-4"><span class="text-dark">Password</span>
                <label for="password"><i class="fa-solid fa-key text-secondary"></i></label>
                <input class="input-psswd form-control" id="password1" type="password" placeholder="Password"
                  name="password1" required>
              </div>
              <div class="form-group text-start mb-4"><span class="text-dark">Konfirmasi Password</span>
                <label for="password"><i class="fa-solid fa-key text-secondary"></i></label>
                <input class="input-psswd form-control" id="password2" type="password" placeholder="Password"
                  name="password2" required>
              </div>
              <div class="form-group  mb-4 d-flex">
                <input type="checkbox" name="benar" id="benar" required value="benar" class="form-check m-1">

                <span for="benar" class="text-dark mt-2 ml-3">Data Sudah Benar</span>
                </input>
              </div>
              <button class="btn btn-warning btn-lg w-100 text-light">Daftar</button>
            </form>


            <a class="btn btn-dark w-100 btn-lg mt-1 text-secondary" style='/* From https://css.glass */
background: rgba(255, 255, 255, 0.2);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(5px);
-webkit-backdrop-filter: blur(5px);
border: 1px solid rgba(255, 255, 255, 0.3);' href="login.php"><!-- <i class="fa-solid fa-arrow-left me-2"></i> --> Kembali</a>



            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script>


              var ajax = new XMLHttpRequest();

              function daftar() {

                let email = document.getElementById('email').value;
                let username = document.getElementById('username').value;

                let password1 = document.getElementById('password1').value;
                let password2 = document.getElementById('password2').value;


                ajax.open("POST", "reg.php", true);
                ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                ajax.send("email=" + email + "&username=" + username + "&password=" + password1);
                ajax.onreadystatechange = function () {
                  if (this.readyState == 4 && this.status == 200) {

                    var data = this.responseText;
                    console.log(data);

                    if (data == "Email Digunakan") {
                      Swal.fire(
                        'Gagal!',
                        'Email sudah digunakan.',
                        'error'
                      );
                    } else if (data == "Username Digunakan") {
                      Swal.fire(
                        'Gagal!',
                        'Username telah digunakan.',
                        'error'
                      )
                    } else if (data == "Berhasil") {
                      Swal.fire(
                        'Berhasil!',
                        'Akun telah berhasil dibuat.',
                        'success'
                      );

                      function pindah() {
                        window.location.replace("login.php?email=email");
                      }
                      setInterval(pindah, 2000);

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


          </div>
          <!-- Login Meta-->
          <div class="login-meta-data">
            <p class="mt-3 mb-0 text-dark">Sudah punya Akun?<a class="mx-1 text-warning" href="login.php">Login</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- All JavaScript Files-->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.passwordstrength.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/theme-switching.js"></script>
  <script src="js/active.js"></script>
  <script src="js/pwa.js"></script>
</body>

</html>