<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">

            <a href="{{ route('admin.dashboard') }}"> <img alt="image"
                    src="{{ asset('public/assets/images/repair-my-car-logos/repairmycarlogo.png') }}"
                    class="header-logo" />
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown @if (request()->routeIs('admin.dashboard')) active @endif">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                        data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown @if (request()->routeIs(
                'admin.garage.index',
                'admin.user.index',
                'admin.category.edit',
                'admin.category.show',
                'admin.subcategory.index',
                'admin.subcategory.create',
                'admin.subcategory.edit',
                'admin.subcategory.show',
                'admin.childcategory.index',
                'admin.childcategory.create',
                'admin.childcategory.edit',
                'admin.childcategory.show',
                'admin.order.index',
                'admin.order.create',
                'admin.order.edit',
                '.index',
                'admin.insurance-company',
                'admin.vendor.index',
                'admin.category.index')) active @endif">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="tag"></i><span>Master List</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link " href="{{ route('admin.garage.index') }}">Garages</a></li>
                    <li class=""><a class="nav-link " href="{{ route('admin.user.index') }}">Customers</a></li>
                    <li class=""><a class="nav-link " href="{{ route('.index') }}">Car Ads</a></li>
                    <li class=""><a class="nav-link " href="{{ route('admin.insurance-company') }}">Insurance
                            Company</a></li>
                    <li class=""><a class="nav-link " href="{{ route('admin.vendor.index') }}">Vendors</a></li>
                    <li class=""><a class="nav-link " href="{{ route('admin.category.index') }}">Services</a></li>
                    <li class=""><a class="nav-link " href="{{ route('admin.order.index') }}">Orders</a></li>
                </ul>
            </li>
            <li class="dropdown @if (request()->routeIs(
                'admin.news.index',
                'admin.about.index',
                'admin.cookie.index',
                'admin.cookie.edit',
                'admin.cookie.store',
                '/admin/faqs',
                'admin.term.index',
                'admin.privacyPolicy.index',
                'admin.childcategory.show')) active @endif">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="tag"></i><span>Main Settings</span></a>
                <ul class="dropdown-menu">
                    {{-- <li class=""><a class="nav-link " href="{{ route('admin.garage.index') }}">Garages</a></li> --}}
                    <li class="dropdown @if (request()->routeIs(
                        'admin.news.index',
                        'admin.cookie.index',
                        'admin.cookie.edit',
                        'admin.cookie.store',
                        'admin.about.index',
                        '/admin/faqs',
                        'admin.term.index',
                        'admin.privacyPolicy.index',
                        'admin.childcategory.show')) active @endif">
                        <a href="#" class="menu-toggle nav-link has-dropdown">
                            <i data-feather="tag"></i><span>Site Settings</span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown @if (request()->routeIs(
                                'admin.news.index',
                                'admin.about.index',
                                'admin.cookie.index',
                                'admin.cookie.edit',
                                'admin.cookie.store',
                                '/admin/faqs',
                                'admin.term.index',
                                'admin.privacyPolicy.index',
                                'admin.childcategory.show')) active @endif">
                                <a href="#" class="menu-toggle nav-link has-dropdown">
                                    <i data-feather="tag"></i><span>Pages</span></a>
                                <ul class="dropdown-menu">
                                    
                                    <li><a href="{{ url('admin/slider') }}" class="nav-link">Home Banner Slides</a>
                                    </li>
                                    <li class=""><a class="nav-link "
                                            href="{{ route('admin.news.index') }}">News</a></li>
                                    <li><a href="{{ route('admin.about.index') }}" class="nav-link">About Us</a></li>
                                    {{-- <li><a href="{{ route('admin.contact.index') }}" class="nav-link">Contact Us</a></li> --}}
                                    <li class=""><a class="nav-link " href="{{ url('/admin/faqs') }}">Faq</a>
                                    </li>
                                    <li><a href="{{ route('admin.term.index') }}" class="nav-link">Terms &
                                            Condition</a></li>
                                    <li><a class="nav-link" href="{{ route('admin.privacyPolicy.index') }}">Privacy
                                            Policy</a></li>
                                    <li><a class="nav-link" href="{{ route('admin.cookie.index') }}">Cookies
                                            Policy</a></li>
                                </ul>
                            </li>
                                <a href="#" class="menu-toggle nav-link has-dropdown">
                                    <i data-feather="tag"></i><span>Simple Ads</span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('admin.ad') }}" class="nav-link">All Ads</a>
                                    </li>
                                    <li class=""><a class="nav-link"
                                            href="{{ route('admin.ad.index') }}">Packages</a></li>
                                </ul>
                            
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="dropdown @if (request()->routeIs(
                'admin.company.index',
                'admin.brand.index',
                'admin.model_year.index',
                'admin.childcategory.show')) active @endif">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="tag"></i><span>Car Setup</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link " href="{{ route('admin.company.index') }}">Cars
                            Manufacture/Brand</a></li>
                    <li class=""><a class="nav-link " href="{{ route('admin.car-model') }}">Cars Model</a></li>
                    <li class=""><a class="nav-link " href="{{ route('admin.model_year.index') }}">Cars Year</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown @if (request()->routeIs(
                'admin.company.index',
                'admin.brand.index',
                'admin.model_year.index',
                'admin.childcategory.show')) active @endif">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="tag"></i><span>Setting</span></a>
                <ul class="dropdown-menu">
                    {{-- <li class=""><a class="nav-link " href="{{ route('admin.company.index') }}">Car Company Name</a></li>
                    <li class=""><a class="nav-link " href="{{ route('admin.brand.index') }}">Brands</a></li>
                    <li class=""><a class="nav-link " href="{{ route('admin.model_year.index') }}">Model Year</a></li> --}}
                    <li class=""><a class="nav-link " href="{{ url('/admin/percentage') }}">Payment and Vat</a>
                    </li>
                </ul>
            </li>
            {{-- <li class="dropdown @if (request()->routeIs('admin.order.index', 'admin.order.create', 'admin.order.edit')) active @endif">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="shopping-cart"></i><span>Orders</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link " href="{{ route('admin.order.index') }}">Orders</a></li>
                </ul>
            </li> --}}
        </ul>
    </aside>
</div>
