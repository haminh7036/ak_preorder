<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@lang('app.name')</title>
    <link rel="shortcut icon" href="{{asset('images/anhkhue-icon.png')}}">

    <link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet">
</head>
<body class="fix-header fix-sidebar card-no-border" >
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
    </div>
    @include('layouts_admin._header')
    @include('layouts_admin._sidebar')
    <div class="page-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
        @include('layouts_admin._footer')

    </div>
</body>
@if(Route::currentRouteName() != 'posts.create' && Route::currentRouteName() != 'posts.edit' && Route::currentRouteName() != 'posts.index' && Route::currentRouteName() != 'celebrity.index' && Route::currentRouteName() != 'registrants.index' && Route::currentRouteName() != 'link-videos.index' && Route::currentRouteName() != 'slide-images.index' && Route::currentRouteName() != 'pages.index' && Route::currentRouteName() != 'interviewers.index')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endif
@yield('extra_scripts')

@include('layouts_admin._datatables')
<script type="text/javascript">
    moment.locale('{{ App::getLocale() }}');
</script>
@include('layouts_admin._toast_message')
@include('layouts_admin._confirm_delete')


</html>
