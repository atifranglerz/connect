<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-custom-orange shadow">
        <div class="container-lg container-fluid">
            <a href="#" class="sidebqar_toggler navbar-toggler d-block me-2" type="button"  id="menuToggle">
                <span class=" fa-solid fa-bars"></span>
            </a>
            <a class="navbar-brand" href="{{ route('user.dashboard') }}">
                <div class="logo_wraper">
                    <img src="{{ asset('public/user/assets/images/logo.jpg') }}">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=" fa-solid fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex  customer_heading_main">
                    <div class="costumer_heading">
                        <h3 class="mb-0">Customer Dashboard</h3>
                    </div>
                </div>
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('user.ads.index') }}">My Listing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('user.quotecreate') }}">Request A Quote</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('user.order.index') }}">Orders</a>
                    </li>
                </ul>
                <div class="login_sinup">
                    <div class="accoutntData">
                        <a href="{{ route('user.dashboard') }}" ><i class="fa-solid fa-message"></i></a>
                    </div>
                    <div class="accoutntData">
                        <a href="#" class="notify-btn"><i class="fa-solid fa-bell"></i></a>
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
                        <div class="notification_tooltip" id="TopProfile">
                            <ul class="notification_list shadow">
                                <li><a href="{{ route('user.profile.index') }}">Profile</a>
                                </li>
                                <li><a href="" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fas fa-sign-out-alt"></i>
                                        Logout
                                    </a>
                                    <form id="frm-logout" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>

                            </ul>
                        </div>

                    </div>



                </div>

            </div>
        </div>
    </nav>
</header>
