<div id="dashboardSidebar">
    <div class="main_profile_img_name">
        <div class="customer_dashboard_img_wraper">
            <img src="{{ asset('/'.Illuminate\Support\Facades\Auth::guard('company')->user()->image) }}">
        </div>
        <div class="name_of_person mx-auto text-center">
            <h5 class="heading">{{ \Illuminate\Support\Facades\Auth::guard('company')->user()->name }}</h5>
        </div>
    </div>
    <div class="sidebar_navigation">
        <ul class="sidebar_navcigation">
            <li><a href="{{route('company.dashboard')}}"><img src="{{ asset('public/user/assets/images/dashomeicon.svg') }}"> <span>Home</span></a></li>
            <li><a href="{{route('company.insurance-index')}}"><img src="{{ asset('public/user/assets/images/dashallqouticon.svg') }}"><span>Insurance Request</span></a></li>
            <li><a href="{{route('company.paid-insurance')}}"><img src="{{ asset('public/user/assets/images/dashallqouticon.svg') }}"><span>Paid Insurance</span></a></li>
            <li><a href="{{route('company.term_condition')}}"><img src="{{ asset('public/user/assets/images/dashpaymenticon.svg') }}"><span>Terms & Conditions (Agreed)</span></a></li>
        </ul>
    </div>
    <div class="soignou_plus_language_wraper">
        <button class="btn" onclick="event.preventDefault(); document.getElementById('cmp-logout').submit();">
            Signout
        </button>
        <form id="cmp-logout" action="{{ route('company.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @include('locale/index');

        <div class="form-check form-switch toggler_switch lang_toggler mt-1 mt-lg-3">
            <label class="form-check-label arabi" for="flexSwitchCheckDefault">Arabic</label>
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
            <label class="form-check-label english" for="flexSwitchCheckDefault">English</label>
        </div>
    </div>
</div>
