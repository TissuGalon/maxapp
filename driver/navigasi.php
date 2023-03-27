<div class="footer-nav-area bg-warning" id="footerNav">
    <div class="suha-footer-nav ">
        <ul class="h-100 d-flex align-items-center justify-content-between ps-0 d-flex rtl-flex-d-row-r">
            <li><a href="index.php"><i class="fa-solid fa-house"></i>Home</a></li>
            <!-- <li><a href="message.html"><i class="fa-solid fa-comment-dots"></i>Chat</a></li> -->
            <li><a href="ambil_pesanan.php"><i class="fa-solid fa-map-marker"></i>Pesanan</a></li>
            <li><a href="berlangsung.php"><i class="fa-solid fa-bars-progress"></i>Berlangsung</a></li>
            <?php if (!isset($_SESSION['id_driver'])) { ?>
                <li><a href="login.php"><i class="fa-solid fa-user"></i>Profil</a></li>
            <?php } else { ?>
                <li><a href="profile.php"><i class="fa-solid fa-user"></i>Profil</a></li>
            <?php } ?>

        </ul>
    </div>
</div>