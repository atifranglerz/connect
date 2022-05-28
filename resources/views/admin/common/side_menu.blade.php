<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">

            <a href="{{ route('admin.dashboard') }}"> <img alt="image" src="{{ asset('public/assets/images/repair-my-car-logos/repairmycarlogo.png')}}" class="header-logo"/>
{{--                <span--}}
{{--                    class="logo-name">Connect</span>--}}
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown @if (request()->routeIs('admin.dashboard')) active @endif">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown @if (request()->routeIs('admin.category.index', 'admin.category.create', 'admin.category.edit', 'admin.category.show', 'admin.subcategory.index', 'admin.subcategory.create', 'admin.subcategory.edit', 'admin.subcategory.show', 'admin.childcategory.index', 'admin.childcategory.create', 'admin.childcategory.edit', 'admin.childcategory.show')) active @endif">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="tag"></i><span>Service</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link " href="{{ route('admin.category.index') }}">Main Services</a></li>
                    {{--<li class=""><a class="nav-link " href="{{ route('admin.subcategory.index') }}">Sub Categories</a></li>
                    <li class=""><a class="nav-link " href="{{ route('admin.childcategory.index') }}">Child Categories</a></li>--}}
                </ul>
            </li>
            {{--<li class="dropdown @if (request()->routeIs('admin.brand.index', 'admin.brand.create', 'admin.brand.edit', 'admin.brand.show')) active @endif">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="award"></i><span>Brands</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link " href="{{ route('admin.brand.index') }}">Brands</a></li>
                </ul>
            </li>--}}
            <li class="dropdown @if (request()->routeIs('admin.model_year.index', 'admin.model_year.create', 'admin
            .model_year.edit', 'admin.model_year.show', 'admin.company.index', 'admin.company.create', 'admin.company.edit', 'admin.company.show')) active @endif">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="award"></i><span>Cars</span></a>
                <ul class="dropdown-menu">
                   {{-- <li class=""><a class="nav-link " href="{{ route('admin.model.index') }}">Models</a></li>--}}
                    <li class=""><a class="nav-link " href="{{ route('admin.company.index') }}">Car Company Name</a></li>
                    <li class=""><a class="nav-link " href="{{ route('admin.model_year.index') }}">Model Year</a></li>
                </ul>
            </li>
            <li class="dropdown @if (request()->routeIs('admin.garage.index', 'admin.garage.create', 'admin.garage.edit')) active @endif">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="shopping-cart"></i><span>Garages</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link " href="{{ route('admin.garage.index') }}">Garages</a></li>
                </ul>
            </li>
            <li class="dropdown @if (request()->routeIs('admin.order.index', 'admin.order.create', 'admin.order.edit')) active @endif">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="shopping-cart"></i><span>Orders</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link " href="{{ route('admin.order.index') }}">Orders</a></li>
                </ul>
            </li>
            <li class="dropdown @if (request()->routeIs('news.index', 'news.create', 'news.edit', 'news.show')) active @endif">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="award"></i><span>News</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link " href="{{ route('admin.news.index') }}">News</a></li>
                </ul>
            </li>
            {{--
            <li class="dropdown @if (request()->routeIs('area.index', 'area.create', 'area.edit', 'area.show', 'market.index', 'market.create', 'market.edit', 'market.show')) active @endif">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="paperclip"></i><span>More Options</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link " href="{{ route('admin.area.index') }}">Area</a></li>
                    <li class=""><a class="nav-link " href="{{ route('admin.market.index') }}">Markets</a></li>
                </ul>
            </li>
            <li class="dropdown @if (request()->routeIs('store.index', 'store.create', 'store.edit', 'store.show')) active @endif ">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="home"></i><span>Stores</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link " href="{{ route('admin.store.index') }}">Stores</a></li>
                </ul>
            </li>
            <li class="dropdown @if (request()->routeIs('coupon.index', 'coupon.create', 'coupon.edit')) active @endif">
                <a href="#" class="menu-toggle nav-link has-dropdown ">
                    <i data-feather="pie-chart"></i><span>Coupons</span></a>
                <ul class="dropdown-menu @if (request()->routeIs('coupon.index')) active @endif">
                    <li class=""><a class="nav-link " href="{{ route('admin.coupon.index') }}">Coupons</a></li>
                </ul>
            </li>
            <li class="dropdown @if (request()->routeIs('review.index', 'review.create', 'review.edit')) active @endif">
                <a href="#" class="menu-toggle nav-link has-dropdown ">
                    <i data-feather="clipboard"></i><span>Reviews</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link " href="{{ route('admin.review.index') }}">Reviews</a></li>
                </ul>
            </li>
            --}}
            <li class="dropdown @if (request()->routeIs('admin.vendor.index', 'admin.vendor.create', 'admin.vendor.edit', 'admin.vendor.show')) active @endif">
                <a href="#" class="menu-toggle nav-link has-dropdown ">
                    <i data-feather="user"></i><span>Vendors</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link " href="{{ route('admin.vendor.index') }}">Vendors</a></li>
                </ul>
            </li>
            <li class="dropdown @if (request()->routeIs('admin.user.index', 'admin.user.create', 'admin.user.edit', 'admin.user.show')) active @endif">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="users"></i><span>Customers</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link " href="{{ route('admin.user.index') }}">Customers</a></li>
                </ul>
            </li>
            <li class="menu-header">Pages</li>
            <li class="dropdown @if (request()->routeIs('about.index', 'admin.about.edit', 'admin.contact.index', 'admin.contact.edit', 'admin.term.index', 'admin.term.edit', 'admin.privacyPolicy
            .index',
            'admin.privacyPolicy.edit')) active @endif">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="file"></i><span>Pages</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.about.index') }}" class="nav-link">About Us</a></li>
                    <li><a href="{{ route('admin.contact.index') }}" class="nav-link">Contact Us</a></li>
                    <li><a href="{{ route('admin.term.index') }}" class="nav-link">Terms & Condition</a></li>
                    <li><a class="nav-link" href="{{ route('admin.privacyPolicy.index') }}">Privacy Policy</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
