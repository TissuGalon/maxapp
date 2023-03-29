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
    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center bg-success">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10 col-lg-8">
                    <h3 class="mb-4 text-white">Become a seller</h3>
                    <!-- Register Form-->
                    <div class="register-form mt-5">
                        <form action="#" onsubmit="cek(); return false;">
                            <div class="form-group text-start mb-4"><span class="mb-2">Account Type*</span>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" id="tipeakun" type="radio" name="tipeakun"
                                                value="personal">
                                            <label class="form-check-label text-white fz-14"
                                                for="personal">Personal</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" id="tipeakun" type="radio" name="tipeakun"
                                                value="bisnis" checked>
                                            <label class="form-check-label text-white fz-14"
                                                for="business">Business</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-start mb-4"><span>Nama Toko*</span>
                                <label for="username"><i class="fa-solid fa-basket-shopping"></i></label>
                                <input class="form-control" id="namatoko" name="namatoko" type="text"
                                    placeholder="TSG Cafe" required>
                            </div>
                            <div class="form-group text-start mb-4"><span>Lokasi Toko*</span>
                                <label for="location"><i class="fa-solid fa-location-dot"></i></label>
                                <input class="form-control" id="lokasi" name="lokasi" type="text"
                                    placeholder="Jln T Fakinah" required>
                            </div>
                            <div class="form-group text-start mb-4"><span>Email*</span>
                                <label for="mobileNumber"><i class="fa-solid fa-envelope"></i></label>
                                <input class="input-psswd form-control" id="email" name="email" type="text"
                                    placeholder="Name@email" required>
                            </div>
                            <div class="form-group text-start mb-4"><span>Mobile Number*</span>
                                <label for="mobileNumber"><i class="fa-solid fa-phone"></i></label>
                                <input class="input-psswd form-control" id="nohp" name="nohp" type="text"
                                    placeholder="+62 1234 7896 123" required>
                            </div>
                            <div class="form-group text-start mb-4"><span>Password*</span>
                                <label for="registerPassword"><i class="fa-solid fa-key"></i></label>
                                <input class="input-psswd form-control" id="pass" name="pass" type="password"
                                    placeholder="" required>
                            </div>
                            <div class="form-group text-start mb-4"><span>Konfirmasi Password*</span>
                                <label for="registerPassword"><i class="fa-solid fa-key"></i></label>
                                <input class="input-psswd form-control" id="pass2" name="pass2" type="password"
                                    placeholder="" required>
                            </div>
                            <div class="form-group text-start mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" id="ketentuan" name="ketentuan" type="checkbox"
                                        value="" required>
                                    <label class="form-check-label fz-14 text-white" for="acceptTerms">Saya sudah
                                        membaca dan menyutujui <a class="fz-14 text-warning text-decoration-underline"
                                            href="privacy-policy.html">Syarat &amp; ketentuan.</a></label>
                                </div>
                            </div>
                            <button class="btn btn-warning btn-lg w-100 tetx-light">Daftar</button>
                        </form>





                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                        <script>


                            var ajax = new XMLHttpRequest();

                            function daftar() {

                                let tipeakun = document.querySelector('input[name="tipeakun"]:checked').value;
                                let namatoko = document.getElementById('namatoko').value;

                                let lokasi = document.getElementById('lokasi').value;
                                let nohp = document.getElementById('nohp').value;
                                let email = document.getElementById('email').value;

                                let pass = document.getElementById('pass').value;

                                ajax.open("POST", "reg-merchant.php", true);
                                ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                ajax.send("tipeakun=" + tipeakun + "&namatoko=" + namatoko + "&lokasi=" + lokasi + "&nohp=" + nohp + "&pass=" + pass + "&email=" + email);
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
                                        } else if (data == "Nomor HP Digunakan") {
                                            Swal.fire(
                                                'Gagal!',
                                                'Nomor HP telah digunakan.',
                                                'error'
                                            )
                                        } else if (data == "Berhasil") {
                                            Swal.fire(
                                                'Berhasil!',
                                                'Akun telah berhasil dibuat.',
                                                'success'
                                            );

                                            function pindah() {
                                                window.location.replace("merchant/index.php?status=newmerchant");
                                            }
                                            setInterval(pindah, 2000);

                                        }

                                    }



                                }

                            }



                            function cek() {

                                let tipeakun = document.getElementById('tipeakun').value;
                                let namatoko = document.getElementById('namatoko').value;

                                let lokasi = document.getElementById('lokasi').value;
                                let nohp = document.getElementById('nohp').value;
                                let email = document.getElementById('email').value;

                                let pass = document.getElementById('pass').value;
                                let pass2 = document.getElementById('pass2').value;



                                if (email == null || tipeakun == null || namatoko == null || lokasi == null || nohp == null || pass == null) {
                                    Swal.fire(
                                        'Invalid!',
                                        'Lengkapi Data.',
                                        'error'
                                    )
                                } else {
                                    if (pass != pass2) {
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
                        <p class="mt-3 mb-0">Sudah memiliki Akun?<a class="ms-1" href="login.php">Log In</a></p>
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