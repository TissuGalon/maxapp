<?php

if (isset($_SESSION['id_driver'])) {

    $idd = $_SESSION['id_driver'];

    $user = mysqli_query($conn, "SELECT * FROM driver WHERE id_driver='$idd'");
    $usr = mysqli_fetch_array($user); ?>

    <div class="offcanvas offcanvas-start suha-offcanvas-wrap" tabindex="-1" id="suhaOffcanvas"
        aria-labelledby="suhaOffcanvasLabel">
        <!-- Close button-->
        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <!-- Offcanvas body-->
        <div class="offcanvas-body">
            <!-- Sidenav Profile-->
            <div class="sidenav-profile">
                <?php if ($usr['foto'] == '') { ?>
                    <div class="user-profile"><img src="img/user-image/avatar.svg" alt=""></div>
                <?php } else { ?>
                    <div class="user-profile"><img src="img/user-image/<?php echo $usr['foto']; ?>" alt=""></div>
                <?php } ?>

                <div class="user-info">
                    <h5 class="user-name mb-1 text-white">
                        <?php echo $usr['nama_driver'] ?>
                    </h5>
                    <p class="available-balance text-white">Saldo Rp. <span class="counter">100000</span></p>
                    <button class='btn btn-warning text-light'>Top Up</button>
                </div>
            </div>
            <!-- Sidenav Nav-->
            <ul class="sidenav-nav ps-0">
                <li><a href="profile.php"><i class="fa-solid fa-user"></i>My Profile</a></li>
                <!-- <li><a href="notifications.php"><i class="fa-solid fa-bell lni-tada-effect"></i>Notifications<span
                                                                                        class="ms-1 badge badge-warning">3</span></a></li> -->

               
               
                <!-- <li><a href="settings.html"><i class="fa-solid fa-sliders"></i>Settings</a></li> -->
                <li><a href="../proses/logout.php"><i class="fa-solid fa-toggle-off"></i>Sign Out</a></li>
            </ul>
        </div>
    </div>

<?php } else { ?>
    <div class="offcanvas offcanvas-start suha-offcanvas-wrap" tabindex="-1" id="suhaOffcanvas"
        aria-labelledby="suhaOffcanvasLabel">
        <!-- Close button-->
        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <!-- Offcanvas body-->
        <div class="offcanvas-body">
            <!-- Sidenav Profile-->
            <div class="sidenav-profile">
                <div class="user-profile"><img src="img/user-image/avatar.svg" alt=""></div>
                <div class="user-info">
                    <h5 class="user-name mb-1 text-white">
                        User
                    </h5>
                    <p class="available-balance text-white">Login untuk menggunakan Aplikasi</p>
                </div>
            </div>
            <!-- Sidenav Nav-->
            <ul class="sidenav-nav ps-0">

                <!-- <li><a href="settings.html"><i class="fa-solid fa-sliders"></i>Settings</a></li> -->
                <li><a href="../login.php"><i class="fa-solid fa-toggle-off"></i>Login</a></li>
            </ul>
        </div>
    </div>
<?php } ?>