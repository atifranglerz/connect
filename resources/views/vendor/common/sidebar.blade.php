
<div id="dashboardSidebar">
    <div class="main_profile_img_name">
        <div class="customer_dashboard_img_wraper">
            <img src="{{ asset('/'.Illuminate\Support\Facades\Auth::guard('vendor')->user()->image) }}">
        </div>
        <div class="name_of_person mx-auto text-center">
            <h5 class="heading">{{Auth::guard('vendor')->user()->name}}</h5>
        </div>
    </div>

    <div class="sidebar_navigation">
        <ul class="sidebar_navcigation">
            <li>
                <a href="{{ route('vendor.dashboard') }}"><img src="{{ asset('public/vendor/assets/images/dashomeicon.svg') }}"> <span>{{__('msg.Home')}}</span></a>
            </li>
            <li>
                <a href="{{ route('vendor.chat.index') }}"><img src="{{ asset('public/vendor/assets/images/dashinboxicon.svg') }}"><span>{{__('msg.Inbox')}}</span></a>
            </li>
            <li>
                <a href="{{ route('vendor.quoteindex') }}"><img src="{{ asset('public/vendor/assets/images/dashhearticon.svg') }}"><span>{{__('msg.All Quotes')}}</span></a>

            </li>
            <li>
                <a href="{{ url('vendor/requested-inspections') }}"><img src="{{ asset('public/vendor/assets/images/dashpaymenticon.svg') }}"><span>{{__('msg.Requested Inspections')}}</span></a>
            </li>
            <li>
                <a href="{{route('vendor.all-active-order')}}"><img src="{{ asset('public/vendor/assets/images/dashallqouticon.svg') }}"><span>{{__('msg.Active Orders')}}</span></a>
            </li>
            <li><a href="{{ route('vendor.archive') }}"><img src="{{ asset('public/user/assets/images/dashpaymenticon.svg') }}"><span>{{__('msg.Archived')}}</span></a></li>

            <li>
                <a href="{{route('vendor.workshop.edit',  Auth::id()  )}}"><img src="{{ asset('public/vendor/assets/images/dashpaymenticon.svg') }}"><span>{{__('msg.Edit Workshop')}}</span></a>
            </li>
            <li>
                <a href="{{route('vendor.ads.create')}}"><img src="{{ asset('public/vendor/assets/images/dashsellcaricon.svg') }}"><span>{{__('msg.Sell Your Car')}}</span></a>
            </li>
           
            <li><a href="{{route('vendor.term_condition')}}"><img src="{{ asset('public/user/assets/images/dashpaymenticon.svg') }}"><span>{{__('msg.Terms & Conditions (Agreed)')}}</span></a></li>

           

        </ul>
    </div>
    <div class="soignou_plus_language_wraper">
        <button class="btn" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
            {{__('msg.Logout')}}
        </button>
        <form id="frm-logout" action="{{ route('vendor.logout') }}" method="POST" style="display: none;">
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
