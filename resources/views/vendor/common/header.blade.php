<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-custom-orange ">
        <div class="container-lg container-fluid">
            <a href="#" class="sidebqar_toggler navbar-toggler d-block me-2" type="button"  id="menuToggle">
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=" fa-solid fa-bars"></span>
              </button> -->

                <span class=" fa-solid fa-bars"></span>
            </a>
            <a class="navbar-brand" href="#">
                <div class="logo_wraper">
                    <img src="{{ asset('public/vendor/assets/images/logo.jpg') }}">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=" fa-solid fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex  customer_heading_main">
                    <div class="costumer_heading">
                        <h3 class="mb-0">Garage Dashboard</h3>
                    </div>
                </div>
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                      <a class="nav-link active " aria-current="page" href="index.php">Home</a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('vendor.ads.index') }}">My Listing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('vendor.bids') }}">My Bids</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('vendor.orders') }}">Orders</a>
                    </li>
                </ul>
                <div class="login_sinup">
                    <div class="accoutntData">
                        <a href="inbox.php" ><i class="fa-solid fa-message"></i></a>
                    </div>
                    <div class="accoutntData">
                        <a href="#" class="notify-btn" ><i class="fa-solid fa-bell"></i></a>
                        <div class="notification_tooltip " id="notification_tolltip">
                            <ul class="notification_list shadow">
                                <li><a href="#">Your Received a message from Ali</a> <a href="#"><i class="bi bi-plus"></i></a>
                                </li>
                                <li><a href="#">Your Received a message from Ali</a><a href="#"><i class="bi bi-plus"></i></a>
                                </li>
                                <li><a href="#">Your Received a message from Ali</a><a href="#"><i class="bi bi-plus"></i></a>
                                </li>
                                <li><a href="#">Your Received a message from Ali</a><a href="#"><i class="bi bi-plus"></i></a>
                                </li>
                                <li><a href="#">Your Received a message from Ali</a><a href="#"><i class="bi bi-plus"></i></a>
                                </li>
                                <li><a href="#">Your Received a message from Ali</a><a href="#"><i class="bi bi-plus"></i></a>
                                </li>
                                <li><a href="#">Your Received a message from Ali</a><a href="#"><i class="bi bi-plus"></i></a>
                                </li>
                                <li><a href="#">Your Received a message from Ali</a><a href="#"><i class="bi bi-plus"></i></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="accoutntData">
                        <a href="#" id="Logout_Profile"><i class="fa-solid fa-user"></i></a>
                        <div class="notification_tooltip  " id="TopProfile">
                            <ul class="notification_list shadow">
                                <li><a href="profile.php">Profile</a>
                                </li>
                                <li><a href="#">Logout</a>
                                </li>

                            </ul>
                        </div>

                    </div>



                </div>

            </div>
        </div>
    </nav>
</header>
