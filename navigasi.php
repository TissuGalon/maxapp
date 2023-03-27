<div class="footer-nav-area bg-warning" id="footerNav">
    <div class="suha-footer-nav ">
        <ul class="h-100 d-flex align-items-center justify-content-between ps-0 d-flex rtl-flex-d-row-r">
            <li><a href="index.php"><i class="fa-solid fa-house"></i>Home</a></li>
            <!-- <li><a href="message.html"><i class="fa-solid fa-comment-dots"></i>Chat</a></li> -->
            <li><a href="cart.php"><i class="fa-solid fa-bag-shopping"></i>Keranjang</a></li>
            <li><a href="pesanan.php"><i class="fa-solid fa-clock"></i>Pesanan</a></li>

            <?php if (isset($_SESSION['toko']) && $_SESSION['toko'] != null) { ?>
                <?php
                    $stoko = $_SESSION['toko'];
                    $qtoko = mysqli_query($conn, "SELECT * FROM merchant WHERE id_merchant = '$stoko'");
                    $roq = mysqli_fetch_array($qtoko);
                    if($roq['konfirmasi'] == 'true'){
                ?>
                <li><a href="mytoko.php"><i class="fa-solid fa-shop"></i>Toko</a></li>
                <?php } ?>
            <?php } ?>

            <?php if (!isset($_SESSION['username'])) { ?>
                <li><a href="login.php"><i class="fa-solid fa-user"></i>Profil</a></li>
            <?php } else { ?>
                <li><a href="profile.php"><i class="fa-solid fa-user"></i>Profil</a></li>
            <?php } ?>

        </ul>
    </div>
</div>