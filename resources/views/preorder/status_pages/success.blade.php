<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>@lang('app.name')</title>
    <link rel="shortcut icon" href="{{asset('images/anhkhue-icon.png')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body style="height:100vh">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
    </div>
    <div class="d-flex justify-content-center align-items-center h-100" style="background: #1D1B4D">

        <div class="card bg-transparent text-center border border-0">
            <div class="card-header border border-0">
                <img src="https://casio.anhkhue.com/uploads/logo-01_2.png" alt="logo">
            </div>
            <div class="card-body text-white border border-0 bg-transparent">
                <p class="h3 text-uppercase">Cảm ơn quý khách đã đặt trước thành công!</p>
            </div>
            <div class="card-footer border border-0 bg-transparent text-white">
                <a href="https://casio.anhkhue.com/" class="btn btn-outline-primary">Trở về trang chủ</a>
                <hr class="bg-white">
                <p class="text-uppercase" > Liên hệ hotline <a href="tel:0934003403">0934 003 403</a> để biết thêm chi tiết.</p>
            </div>
        </div>

    </div>
</body>
<script src="{{ asset('js/app.js') }}" defer></script>
</html>
