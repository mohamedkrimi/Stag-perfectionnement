<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@5.9.55/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.0/dist/css/bootstrap.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  <!--Swiper slider css-->
  <link href="{{asset('assets/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>

<!-- Bootstrap Css -->
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<!-- Icons Css -->
<link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
<!-- App Css-->
<link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css">
<!-- custom Css-->
<link href="{{asset('assets/css/custom.min.css')}}" rel="stylesheet" type="text/css">
<!-- Inclure le fichier CSS de Bootstrap -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">

<!-- Inclure le fichier JavaScript de Bootstrap -->
<script src="{{ asset('js/app.js') }}"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
@include('layouts.Header')
@yield('content')

@include('layouts.Footer')
  <!-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <ul class="navbar-nav ms-auto">

                    </ul>
                </div>
            </div>
        </nav>


    </div>  -->



<!-- JAVASCRIPT -->
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/js/plugins.js')}}"></script>

<!-- isotope-layout -->
<script src="{{asset('assets/libs/isotope-layout/isotope.pkgd.min.js')}}"></script>

<!--Swiper slider js-->
<script src="{{asset('assets/libs/swiper/swiper-bundle.min.js')}}"></script>

<!-- Countdown js -->
<script src="{{asset('assets/js/pages/coming-soon.init.js')}}"></script>

<script src="{{asset('assets/js/frontend/landing-index.init.js')}}"></script>

<script src="{{asset('assets/js/frontend/menu.init.js')}}"></script>
</body>
</html>
