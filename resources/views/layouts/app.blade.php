<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Shop Casio Online Ủy Quyền Tại Việt Nam, các sản phầm đồng hồ Casio G-Shock, Baby-G, Edifice, Sheen.. chính hãng tại Anh Khuê Sài Gòn, bảo hành từ 1 đến 5 năm.">
    <meta name="keywords" content="đồng hồ casio">
    <meta name="news_keywords" content="đồng hồ casio">
    <meta name="author" content="Shop Đồng Hồ Casio Online Ủy Quyền Tại Việt Nam">
    <meta name="copyright" content="Shop Đồng Hồ Casio Online Ủy Quyền Tại Việt Nam [online@anhkhuesaigon.com.vn]">
    <meta name="robots" content="index, archive, follow, noodp">
    <meta name="googlebot" content="index,archive,follow,noodp">
    <meta name="msnbot" content="all,index,follow">
    <meta name="generator" content="vndes.net">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta property="og:title" content="Shop Đồng Hồ Casio Online Ủy Quyền Tại Việt Nam">
    <meta property="og:type" content="website">
    <meta property="og:description" content="Shop Casio Online Ủy Quyền Tại Việt Nam, các sản phầm đồng hồ Casio G-Shock, Baby-G, Edifice, Sheen.. chính hãng tại Anh Khuê Sài Gòn, bảo hành từ 1 đến 5 năm.">
    <meta property="og:site_name" content="Shop Đồng Hồ Casio Online Ủy Quyền Tại Việt Nam">
    <meta property="og:url" content="https://casio.anhkhue.com/index.php/">
    <meta property="fb:app_id" content="330368240904484">
    <meta property="fb:admins" content="AK_YFWzvkC21Jojq3Iz9o5A">
    <title>@lang('app.name')</title>
    <link rel="shortcut icon" href="{{asset('images/anhkhue-icon.png')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
    </div>
    @include('layouts._header')
    @yield('content')
    @include('layouts._footer')
</body>
<script src="{{ asset('js/app.js') }}" defer></script>
<script type="text/javascript">
    moment.locale('{{ App::getLocale() }}');
</script>
@yield('extra_scripts')

</html>
