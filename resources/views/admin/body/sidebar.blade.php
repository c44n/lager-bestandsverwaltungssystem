<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="" height="24">
                    </span>
                </a>
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="tp-link">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="#brands" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span>Marken</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="brands">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.brand') }}" class="tp-link">Übersicht</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#warehouse" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span>Lager</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="warehouse">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.warehouse') }}" class="tp-link">Übersicht</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#supplier" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span>Lieferanten</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="supplier">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.supplier') }}" class="tp-link">Übersicht</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#products" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span>Produkte</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="products">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.category') }}" class="tp-link">Kategorien Übersicht</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#customer" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span>Kunden</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="customer">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.customer') }}" class="tp-link">Übersicht</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#customer" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span>Produkte</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="customer">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.product') }}" class="tp-link">Übersicht</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#purchase" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span>Bestellungen</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="purchase">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('purchases.index') }}" class="tp-link">Übersicht</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title">Pages</li>

                <li>
                    <a href="#sidebarAuth" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> Authentication </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a href="auth-login.html" class="tp-link">Log In</a>
                            </li>
                            <li>
                                <a href="auth-register.html" class="tp-link">Register</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarError" data-bs-toggle="collapse">
                        <i data-feather="alert-octagon"></i>
                        <span> Error Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarError">
                        <ul class="nav-second-level">
                            <li>
                                <a href="error-404.html" class="tp-link">Error 404</a>
                            </li>
                            <li>
                                <a href="error-500.html" class="tp-link">Error 500</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
</div>
