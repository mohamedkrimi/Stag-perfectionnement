<div class="top-tagbar">
    <div class="w-100">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-4 col-9">
                <div class="fs-14 fw-medium">
                   Société
                </div>
            </div>
            <div class="col-md-4 col-6 d-none d-xxl-block">
                <div class="d-flex align-items-center justify-content-center gap-3 fs-14 fw-medium">
                    <div>
                     krimi@mohamed.com
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-3">
                <div class="d-flex align-items-center justify-content-end gap-3 fs-14">
                    <div class="text-reset fw-normal d-none d-lg-block">
 +(216) 01234 5678
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
        <nav class="navbar navbar-expand-lg ecommerce-navbar" id="navbar">
            <div class="container">
                <a class="navbar-brand d-none d-lg-block" href="#">
                    <div class="logo-dark">
                        <img src="../assets/images/logo-dark.png" alt="" height="25">
                    </div>
                    <div class="logo-light">
                        <img src="../assets/images/logo-light.png" alt="" height="25">
                    </div>
                </a>
                <button class="btn btn-soft-primary btn-icon d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list fs-20"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-lg-auto mb-2 mb-lg-0" id="navigation-menu">
                        <li class="nav-item d-block d-lg-none">
                            <a class="d-block p-3 h-auto text-center" href="#">
                                <img src="../assets/images/logo-dark.png" alt="" height="25" class="card-logo-dark mx-auto">
                                <img src="../assets/images/logo-light.png" alt="" height="25" class="card-logo-light mx-auto">
                            </a>
                        </li>
                        <!-- <li class="nav-item dropdown dropdown-hover">
                            <a class="nav-link dropdown-toggle" data-key="t-demos" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Demos
                            </a>
                            <ul class="dropdown-menu dropdown-menu-md dropdown-menu-center dropdown-menu-list submenu">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" data-key="t-main-layout">Main Layout</a>
                                </li>
                                <li class="nav-item">
                                    <a href="watch-main-layout.html" class="nav-link" data-key="t-unique-watches">Unique Watches</a>
                                </li>
                                <li class="nav-item">
                                    <a href="modern-fashion.html" class="nav-link" data-key="t-modern-fashion">Modern Fashion</a>
                                </li>
                                <li class="nav-item">
                                    <a href="trend-fashion.html" class="nav-link" data-key="t-trend-fashion">Trend Fashion</a>
                                </li>
                            </ul>
                        </li> -->
                        <li class="nav-item dropdown dropdown-hover dropdown-mega-full">
                            <a class="nav-link" data-key="t-catalog" href="/" >
                                Accueil
                            </a>

                        </li>

                        <li class="nav-item dropdown dropdown-hover">
                            <a class="nav-link" data-key="t-pages" href="/offres">
                                Nos offres
                            </a>

                        </li>
                        @auth
                        <li class="nav-item dropdown dropdown-hover">
                            <a class="nav-link" data-key="t-pages" href="/reservation">
                               Reservation
                            </a>

                        </li>
                        @endauth

                        <li class="nav-item">
                            <a class="nav-link" href="/contact" data-key="t-contact">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-lg-auto mb-2 mb-lg-0" id="navigation-menu">
                @guest
                            @if (Route::has('login'))
                            <button class="btn btn-danger btn-hover mr-2" > <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> </button>
                            @endif
                            @if (Route::has('register'))
                            <button class="btn btn-danger btn-hover ml-2" > <a class="nav-link " href="{{ route('register') }}">{{ __('Register') }}</a> </button>
                            @endif


                        @else
                        <li class="nav-item dropdown dropdown-hover">
                            <a class="nav-link dropdown-toggle" data-key="t-demos" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-md dropdown-menu-center dropdown-menu-list submenu">
                                <li class="nav-item">
                                    <a href="{{ route('logout') }}" class="nav-link" data-key="t-main-layout"    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>

                            </ul>
                        </li>

                        @endguest
                        </ul>
                        </div>
                <!-- <div class="bg-overlay navbar-overlay" data-bs-toggle="collapse"  data-bs-target="#navbarSupportedContent.show"></div> -->


            </div>
        </nav>
