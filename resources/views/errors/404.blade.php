<!doctype html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@lang('app.name')</title>
    <link rel="shortcut icon" href="{{asset('images/anhkhue-icon.png')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="fix-header fix-sidebar card-no-border">
<section id="wrapper" class="error-page">
    <style>
        .error-box {
            height: 100%;
            position: fixed;
            background: url({{asset('images/error-bg.jpg')}}) no-repeat center center #fff;
            width: 100%;
        }
        .error-body {
            padding-top: 5%;
        }
        .error-body h1 {
            font-size: 210px;
            font-weight: 900;
            line-height: 210px;
        }
        .btn-info, .btn-info.disabled {
            background: #1e88e5;
            border: 1px solid #1e88e5;
            -webkit-box-shadow: 0 2px 2px 0 rgba(66, 165, 245, 0.14), 0 3px 1px -2px rgba(66, 165, 245, 0.2), 0 1px 5px 0 rgba(66, 165, 245, 0.12);
            box-shadow: 0 2px 2px 0 rgba(66, 165, 245, 0.14), 0 3px 1px -2px rgba(66, 165, 245, 0.2), 0 1px 5px 0 rgba(66, 165, 245, 0.12);
            -webkit-transition: 0.2s ease-in;
            -o-transition: 0.2s ease-in;
            transition: 0.2s ease-in;
        }
        .error-box .footer {
            width: 100%;
            left: 0px;
            right: 0px;
        }
        .footer {
            bottom: 0;
            color: #67757c;
            left: 0px;
            padding: 17px 15px;
            position: absolute;
            right: 0;
            border-top: 1px solid rgba(120, 130, 140, 0.13);
            background: #ffffff;
        }
    </style>
    <div class="error-box">

        <div class="error-body text-center">

            <h1 class="text-danger">404</h1>

            <h3 class="text-uppercase">Trang Không Tồn Tại!</h3>

            <p class="text-muted m-t-30 m-b-30">Có vẻ như trang bạn đang tìm không tồn tại</p>

            <a href="https://casio.anhkhue.com" class="btn btn-danger btn-rounded waves-effect waves-light m-b-40">Quay lại trang chủ</a> </div>

        <footer class="footer text-center">© Anh Khuê Sài Gòn</footer>

    </div>

</section>
</body>
<script src="{{ asset('js/app.js') }}" defer></script>

</html>
