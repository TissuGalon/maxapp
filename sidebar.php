<?php

if (isset($_SESSION['username'])) {

    $username = $_SESSION['username'];

    $user = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
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
                   <!-- GAMBAR -->
                   <div class="user-profile">
                   <div class="" style="height:100%;width:100%;overflow:hidden;border-radius:50%; background-position: center; background-size:cover;
  background-repeat: no-repeat; background-image: url('img/user-image/<?php echo $usr['foto'] ?>')">
            </div>    
                   </div>
            <!-- GAMBAR -->
                <?php } ?>

                <div class="user-info">
                    <h5 class="user-name mb-1 text-white">
                        <?php echo $usr['nama'] ?>
                    </h5>
                    <!-- <p class="available-balance text-white">Saldo Rp. <span class="counter">100000</span></p>
                    <button class='btn btn-warning text-light'>Top Up</button> -->
                </div>
            </div>
            <!-- Sidenav Nav-->
            <ul class="sidenav-nav ps-0">
                <li><a href="profile.php"><i class="fa-solid fa-user"></i>My Profile</a></li>
                <li><a href="wishlist.php"><i class="fa-solid fa-heart"></i>Wishlist Saya</a></li>
                <!-- <li><a href="notifications.php"><i class="fa-solid fa-bell lni-tada-effect"></i>Notifications<span
                                                                                                                            class="ms-1 badge badge-warning">3</span></a></li> -->

                
                <!-- <li class="suha-dropdown-menu"><a href="wishlist-grid.html"><i class="fa-solid fa-heart"></i>My Wishlist</a>
                    <ul>
                        <li><a href="wishlist-grid.html">Wishlist Grid</a></li>
                        <li><a href="wishlist-list.html">Wishlist List</a></li>
                    </ul>
                </li> -->

                
                <!-- <li><a href="settings.html"><i class="fa-solid fa-sliders"></i>Settings</a></li> -->
                <li><a href="proses/logout.php"><i class="fa-solid fa-toggle-off"></i>Sign Out</a></li>
            </ul>
        </div>
    </div>

<?php } else { ?>
    <div class="offcanvas offcanvas-start suha-offcanvas-wrap" tabindex="-1" id="suhaOffcanvas"
        aria-labelledby="suhaOffcanvasLabel">
        <!-- Close button-->
        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <!-- Offcanvas body-->
        <div class="offcanvas-body" style="">

       <!--  background: rgb(255,205,67);
    background: linear-gradient(90deg, rgba(255,205,67,1) 0%, rgba(255,193,7,1) 35%, rgba(255,152,7,1) 100%); -->

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
                <li><a href="login.php"><i class="fa-solid fa-toggle-off"></i>Login</a></li>
            </ul>
        </div>
    </div>
<?php } ?>