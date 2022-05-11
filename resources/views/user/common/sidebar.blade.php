<div id="dashboardSidebar">
    <div class="main_profile_img_name">
        <div class="customer_dashboard_img_wraper">
            <img src="{{ asset('/'.Illuminate\Support\Facades\Auth::user()->image) }}">
        </div>
        <div class="name_of_person mx-auto text-center">
            <h3>Hi, {{ \Illuminate\Support\Facades\Auth::user()->name }}</h3>
        </div>
    </div>
    <div class="sidebar_navigation">
        <ul class="sidebar_navcigation">
            <li><a href="{{ route('user.dashboard') }}"><img src="{{ asset('public/user/assets/images/dashomeicon.svg') }}"> <span>Home</span></a></li>
            <li><a href="{{ route('user.chat.index') }}"><img src="{{ asset('public/user/assets/images/dashinboxicon.svg') }}"><span>Inbox</span></a></li>
            <li><a href="{{ route('user.quoteindex') }}"><img src="{{ asset('public/user/assets/images/dashallqouticon.svg') }}"><span>All Quotes</span></a></li>
            <li><a href="{{ route('user.wishlist.index') }}"><img src="{{ asset('public/user/assets/images/dashhearticon.svg') }}"><span>Preferred Garages</span></a></li>
            <li><a href="{{ route('user.payment.index') }}"><img src="{{ asset('public/user/assets/images/dashpaymenticon.svg') }}"><span>Payment Via Insurance</span></a></li>
            <li><a href="{{ route('user.ads.create') }}"><img src="{{ asset('public/user/assets/images/dashsellcaricon.svg') }}"><span>Sell Or Replace Your Car</span></a></li>
        </ul>
    </div>
    <div class="soignou_plus_language_wraper">
        <button class="btn" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
            Signout
        </button>
        <form id="frm-logout" action="{{ route('user.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <div class="form-check form-switch toggler_switch lang_toggler mt-1 mt-lg-3">
            <label class="form-check-label arabi" for="flexSwitchCheckDefault">Arabic</label>
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
            <label class="form-check-label english" for="flexSwitchCheckDefault">English</label>
        </div>
    </div>
</div>
