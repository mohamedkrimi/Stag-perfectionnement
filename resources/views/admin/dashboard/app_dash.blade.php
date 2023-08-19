<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Tableau de bordTableau de bord </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin_assets/assets/images/favicon.ico') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fermer l'alerte après 5 secondes
            setTimeout(function() {
                $(".alert").alert('close');
            }, 3000);
        });
    </script>
    <!-- App css -->
    <link href="{{ asset('admin_assets/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_assets/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{ asset('admin_assets/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css"
        id="dark-style" />
    @yield('head')

</head>

<body class="loading"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <!-- LOGO -->
            <a href="index.html" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="{{ asset('admin_assets/assets/images/logo.png') }}" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="{{ asset('admin_assets/assets/images/logo_sm.png') }}" alt="" height="16">
                </span>
            </a>

            <!-- LOGO -->
            <a href="index.html" class="logo text-center logo-dark">
                <span class="logo-lg">
                    <img src="{{ asset('admin_assets/assets/images/logo-dark.png') }}" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="{{ asset('admin_assets/assets/images/logo_sm_dark.png') }}" alt="" height="16">
                </span>
            </a>

            <div class="h-100" id="leftside-menu-container" data-simplebar>

                <!--- Sidemenu -->
                <ul class="side-nav">
                    @include('admin.dashboard.menu')
                </ul>


                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <div class="navbar-custom">
                    <ul class="list-unstyled topbar-menu float-end mb-0">
                        <li class="dropdown notification-list d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-search noti-icon"></i>
                            </a>

                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown"
                                href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="{{ asset('admin_assets/assets/images/users/avatar-1.jpg') }}"
                                        alt="user-image" class="rounded-circle">
                                </span>
                                <span>
                                    <span class="account-user-name">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
                                    <span class="account-position">{{ Auth::user()->email }}</span>
                                </span>
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-circle me-1"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">




                                    <span>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                            {{ csrf_field() }}
                                            <i class="mdi mdi-logout me-1"></i> <input type="submit" value="Déconnecter" class="btn" style="margin-top:0px"/>
                                        </form>
                                    </span>
                                </a>
                            </div>
                        </li>

                    </ul>
                    <button class="button-menu-mobile open-left">
                        <i class="mdi mdi-menu"></i>
                    </button>

                </div>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="dripicons-wrong me-2"></i> {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endforeach

                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            <strong>{{ Session::get('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @yield('breadscrumbs')
                    @yield('content')
                </div>
                <!-- container -->

            </div>
            <!-- content -->

            <!-- Footer Start
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Hyper - Coderthemes.com
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
             end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <!-- bundle -->
    <script src="{{ asset('admin_assets/assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('admin_assets/assets/js/app.min.js') }}"></script>

    @yield('script')
</body>

<!-- Mirrored from coderthemes.com/hyper_2/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Jan 2022 06:52:52 GMT -->

</html>
