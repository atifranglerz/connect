<div id="dashboardSidebar">
    <div class="main_profile_img_name">
        <div class="customer_dashboard_img_wraper">
            <img src="{{ asset('/' . Illuminate\Support\Facades\Auth::user()->image) }}">
        </div>
        <div class="name_of_person mx-auto text-center">
            <h5 class="heading">{{ \Illuminate\Support\Facades\Auth::user()->name }}</h5>
        </div>
    </div>
    <div class="sidebar_navigation">
        <ul class="sidebar_navcigation">
            <li><a href="{{ route('user.dashboard') }}"><img
                        src="{{ asset('public/user/assets/images/dashomeicon.svg') }}">
                    <span>{{ __('msg.Home') }}</span></a></li>
            <li><a href="{{ route('user.chat.index') }}"><img
                        src="{{ asset('public/user/assets/images/dashinboxicon.svg') }}"><span>{{ __('msg.Inbox') }}</span></a>
            </li>
            <li><a href="{{ route('user.quoteindex') }}"><img
                        src="{{ asset('public/user/assets/images/dashallqouticon.svg') }}"><span>{{ __('msg.All Quotes') }}</span></a>
            </li>
            @if (Auth::user()->type == 'company')
                <li><a href="{{ route('user.insurance-index') }}"><img
                            src="{{ asset('public/user/assets/images/dashallqouticon.svg') }}"><span>{{__('msg.Insurance Request')}}</span></a></li>
            @endif
            <li><a href="{{ route('user.wishlist.index') }}"><img
                        src="{{ asset('public/user/assets/images/dashhearticon.svg') }}"><span>{{ __('msg.Preferred Garages') }}</span></a>
            </li>
            <li><a href="{{ route('user.archive') }}"><img
                        src="{{ asset('public/user/assets/images/dashpaymenticon.svg') }}"><span>{{ __('msg.Archived') }}</span></a>
            </li>
            {{-- <li><a href="{{ route('user.payment.index') }}"><img src="{{ asset('public/user/assets/images/dashpaymenticon.svg') }}"><span>Payment Via Insurance</span></a></li> --}}
            @if (Auth::user()->type == 'user')
                <li><a href="{{ route('user.ads.create') }}"><img
                            src="{{ asset('public/user/assets/images/dashsellcaricon.svg') }}"><span>{{ __('msg.Sell Your Car') }}</span></a>
                </li>
            @endif
            <li><a href="{{ route('user.term_condition') }}"><img
                        src="{{ asset('public/user/assets/images/dashpaymenticon.svg') }}"><span>{{ __('msg.Terms & Conditions (Agreed)') }}</span></a>
            </li>
        </ul>
    </div>
    <div class="soignou_plus_language_wraper">
        <button class="btn" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
            {{ __('msg.Logout') }}
        </button>
        <form id="frm-logout" action="{{ route('user.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @include('locale/index');
    </div>
</div>
