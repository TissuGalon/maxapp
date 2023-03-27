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


  <!-- JS TOAST -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body>

  <!-- JS TOAST -->
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
      <!-- <div class="back-button me-2"><a href="shop-grid.html"><i class="fa-solid fa-arrow-left-long"></i></a></div> -->
      <div></div>
      <!-- Page Title-->
      <div class="page-heading">
        <h6 class="mb-0">My Cart</h6>
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

    <?php    
    if (isset($_SESSION['iduser']) ) {
      $id = $_SESSION['iduser'];   
    $kueri = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_user='$id'");
    $cek = mysqli_num_rows($kueri);
      if($cek > 0){
      ?>
      <div class="container px-0 ">
        <!-- Cart Wrapper-->
        <div class="cart-wrapper-area pb-1 pt-1">
          <div class="cart-table card mb-1" style="/* From https://css.glass */
background: rgba(255, 255, 255, 0.44);
border-radius: 16px;

backdrop-filter: blur(7.6px);
-webkit-backdrop-filter: blur(7.6px);
border: 1px solid rgba(255, 255, 255, 0.52);">
            <div class="table-responsive card-body rounded">
              <table class="table mb-0 ">
                <tbody>
                  <?php
                  $harga = 0;                                                                  
                  while ($rows = mysqli_fetch_array($kueri)) {
                    $idproduk = $rows['id_produk'];
                    $produk = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$idproduk'");
                    $row = mysqli_fetch_array($produk);
                    ?>
                    <tr id='<?php echo $rows['id_produk'] ?>' style="">
                      <th scope="row">
                        <a class="remove-product" href="#" onclick="hapus(<?php echo $rows['id_produk'] ?>)"><i
                            class="fa-solid fa-xmark"></i></a>
                      </th>
                      <td><img class="rounded" src="img/product/<?php echo $row['gambar'] ?>" alt=""></td>
                      <td><a href="produk.php?id=<?php echo $rows['id_produk'] ?>">
                          <?php echo $row['nama_produk'] ?><span>Rp.
                          <?php echo number_format($row['harga'],2,",",".") ?> ×
                            <small id="qtyy<?php echo $rows['id_produk'] ?>">
                              <?php echo $rows['qty'] ?>
                            </small>
                          </span>
                        </a></td>
                      <td>
                        <div class="quantity">
                          <a href="#" onclick="kurang(<?php echo $rows['id_produk'] ?>)"
                            class="btn btn-sm btn-primary text-light">-</a>
                          <input class="qty-text" id="qty<?php echo $rows['id_produk'] ?>" type="number" readonly min='1'
                            value="<?php echo $rows['qty'] ?>">
                          <input type="hidden" name='harga' id='harga<?php echo $rows['id_produk'] ?>'
                            value='<?php echo $row['harga'] ?>'>
                          <a href="#" onclick="tambah(<?php echo $rows['id_produk'] ?>)"
                            class="btn btn-sm btn-primary text-light">+</a>

                        </div>
                      </td>
                    </tr>

                    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>

                      var ajax = new XMLHttpRequest();

                      function kurang(idproduk) {
                        let current = document.getElementById('qty' + idproduk).value;
                        if (current > 1) {
                          let now = current - 1;
                          document.getElementById('qty' + idproduk).value = now;
                          document.getElementById('qtyy' + idproduk).innerHTML = now;
                          let tharga = document.getElementById('tharga').innerHTML;
                          let harga = document.getElementById('harga' + idproduk).value;
                          document.getElementById('tharga').innerHTML = Number(tharga) - Number(harga);

                          ajax.open("POST", "proses/cart_update.php", true);
                          ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                          ajax.send("idproduk=" + idproduk + "&qty=" + now);
                          ajax.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                            }
                          }

                        }

                      }

                      function tambah(idproduk) {
                        let stock = <?php echo $row['stock'] ?>;
                        let current = document.getElementById('qty' + idproduk).value;
                        if (current < stock) {
                          let now = Number(current) + 1;
                          document.getElementById('qty' + idproduk).value = now;
                          document.getElementById('qtyy' + idproduk).innerHTML = now;
                          let tharga = document.getElementById('tharga').innerHTML;
                          let harga = document.getElementById('harga' + idproduk).value;
                          document.getElementById('tharga').innerHTML = Number(tharga) + Number(harga);

                          ajax.open("POST", "proses/cart_update.php", true);
                          ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                          ajax.send("idproduk=" + idproduk + "&qty=" + now);
                          ajax.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                            }
                          }

                        }

                      }

                      


                      function hapus(idproduk) {
                        Swal.fire({
                          title: 'Hapus?',
                          text: "Hapus produk dari keranjang?",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#d33',
                          cancelButtonColor: '#3085d6',
                          confirmButtonText: 'Ya, hapus produk!',
                          cancelButtonText: 'Batal'
                        }).then((result) => {
                          if (result.isConfirmed) {

                            document.getElementById(idproduk).style.display = 'none';

                            Swal.fire(
                              'Dihapus!',
                              'Produk dihapus dari keranjang.',
                              'success'
                            )


                            ajax.open("POST", "proses/hapuskeranjang.php", true);
                            ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            ajax.send("idproduk=" + idproduk);
                            ajax.onreadystatechange = function () {
                              if (this.readyState == 4 && this.status == 200) {
                                var data = this.responseText;
                                console.log(data);

                              }



                            }

                            setTimeout(function () {
                              location.reload();
                            }, 500);

                          }
                        })

                      }





                    </script>

                    <?php
                    $h = $row['harga'] * $rows['qty'];
                    $harga = $harga + $h;
                  }?>

                </tbody>
              </table>
            </div>
          </div>
          <!-- Coupon Area-->
          <!-- <div class="card coupon-card mb-3">
              <div class="card-body">
                <div class="apply-coupon">
                  <h6 class="mb-0">Punya voucher diskon?</h6>
                  <p class="mb-2">Masukkan voucher discount disini &amp; dapatkan kejutan menarik !</p>
                  <div class="coupon-form">
                    <form action="#">
                      <input class="form-control" type="text" placeholder="SUHA30">
                      <button class="btn btn-primary" type="submit">Gunakan</button>
                    </form>
                  </div>
                </div>
              </div>
            </div> -->
          <!-- Cart Amount Area-->
          <?php if($cek > 0){ ?>
          <div class="card cart-amount-area mt-2" style="/* From https://css.glass */
background: rgba(255, 255, 255, 0.44);
border-radius: 16px;
box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
backdrop-filter: blur(7.6px);
-webkit-backdrop-filter: blur(7.6px);
border: 1px solid rgba(255, 255, 255, 0.52);">
            <div class="card-body d-flex align-items-center justify-content-between">
              <h5 class="total-price mb-0">Rp. <span class="" id='tharga'>
                  <?php echo $harga ?>
                </span></h5><a class="btn btn-warning text-light shadow-sm" id="btn_checkout" onclick="checkout()">Checkout
                Now</a>
              <script>

        

                function checkout() {
                  let harga = document.getElementById('tharga').innerHTML;
                  location.href = "checkout.php?harga=" + Number(harga);
                }
              </script>
            </div>
          </div>
          <?php } ?>


        </div>
      </div>
    <?php }else{ ?>
      
      <div class="container px-0 pt-1">
        <div class="card d-flex justify-content-center shadow">
          <img src="img/2keranjang_kosong.png" class="m-5 mb-0 mt-2" style="height:20;width:auto;aspect-ratio:1/1;object-fit:contain;"></img>
          <small class="text-center text-secondary mt-4">Keranjang kosong, Belum ada produk di keranjang mu
          </small>
          <a href="index.php" class="btn btn-white text-secondary shadow-sm border mx-2 my-2"><i class="fa-solid fa-shopping-cart"></i> Mulai Berbelanja</a>
        </div> 
      </div>
    <?php }} ?>

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