<!--paste this code under the head tag-->
<div id="pgLoader">
    <span id="pgLoaderGif"></span>
</div>
<!--paste this code under the head tag-->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-custom-orange shadow">
        <div class="container-lg container-fluid">
            <a href="#" class="sidebqar_toggler navbar-toggler d-block me-2" type="button" id="menuToggle">
                <span class=" fa-solid fa-bars"></span>
            </a>
            <a class="navbar-brand" href="">
                <div class="logo_wraper">
                    <img src="{{ asset('public/assets/images/repair-my-car-logos/repairmycarlogo.png') }}">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class=" fa-solid fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex  customer_heading_main">
                    <div class="costumer_heading">
                        <h6 class="mb-0">Company Dashboard</h6>
                    </div>
                </div>
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                    {{-- <li class="nav-item">
                        <a class="nav-link " href="">My Ads Listing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="" >Request A Quote</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="" >Orders</a>
                    </li> --}}
                </ul>
                <div class="login_sinup">
                    {{-- <?php
                    $unread = \App\Models\Chat::where([['customer_receiver_id', auth()->user()->id], ['seen', 0]])->count('seen');
                    $notification = \App\Models\webNotification::where([['customer_id', auth()->user()->id], ['seen', 0]])->get();
                    $unread_noty = \App\Models\webNotification::where([['customer_id', auth()->user()->id], ['seen', 0]])->count('seen');
                    ?> --}}
                    {{-- <div class="accoutntData">
                        <a href="#"><i class="fa-solid fa-message"></i><span id="notify"
                                class="chatbox-option__notification notify text-red">{{ $unread }}</span></a>
                    </div>
                    <div class="accoutntData">
                        <a href="#" class="notify-btn"><i class="fa-solid fa-bell"></i><span id="notfication"
                                class="chatbox-option__notification notify text-red">{{ $unread_noty }}</span></a>
                        <div class="notification_tooltip " id="notification_tolltip">
                            <ul class="notification_list shadow">
                                @foreach ($notification as $data)
                                    <li><a href="{{ $data->links }}" class="notification"
                                            id="{{ $data->id }}">{{ $data->title }}</a> <a href="#"
                                            class="notification" id="{{ $data->id }}"><i class="bi bi-plus"></i></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div> --}}
                    <div class="accoutntData">
                        <a href="#" id="Logout_Profile"><i class="fa-solid fa-user"></i></a>
                        <div class="notification_tooltip" id="TopProfile">
                            <ul class="notification_list shadow">
                                <li><a href="{{ route('company.profile') }}">Profile</a>
                                </li>
                                <li><a href=""
                                        onclick="event.preventDefault(); document.getElementById('cmp-logout').submit();">
                                        Logout<span class="fas fa-sign-out-alt"></span>
                                    </a>
                                    <form id="cmp-logout" action="{{ route('company.logout') }}" method="POST"
                                        style="display: none;">
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
