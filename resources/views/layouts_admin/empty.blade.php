<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@lang('app.name')</title>

    <!-- Favicon icon -->
{{--    <link rel="icon" type="image/png" sizes="16x16" href="{{ $app_login_bg }}">--}}

<!-- Styles -->
    <link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet">
</head>

<body>

<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>

<section id="wrapper" class="login-register login-sidebar" style="background-image:url({{ asset('/images/login_bg.jpg') }});">
    <div class="login-box card">
        <div class="card-body">
            @yield('content')
        </div>
    </div>


</section>


</body>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

</html>
