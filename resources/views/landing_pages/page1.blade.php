@extends('layouts.app')
@section('meta')
    <meta name="keywords" content="{{$landing_page->keywords}}">
    <meta property="og:title" content="{{$landing_page->title}}">
    <meta property="og:description" content="{{$landing_page->description}}">
@endsection
@section('content')
    <div class="main-wrapper">

        @if($landing_page->type=='image')
            <img width="100%" height="650px" src="{{asset('storage/'.$landing_page->big_banner)}}" alt="">
        @else
            <div class="frame-big-banner">
                {!! $landing_page->big_banner !!}
            </div>
        @endif

    </div>
    <div class="px-1 py-1">
        <div class="owl-carousel owl-theme mt-1" id="slide-registrant">
            @foreach($landing_page->images as $item)
                <div class="item">
                    <a href="{{asset('storage/'.$item->images)}}" data-lightbox="example-set">
                        <img class="example-image" src="{{asset('storage/'.$item->images)}}" alt="{{$item->images}}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container-fluid px-3 py-3">
        <h3 class="text-uppercase mx-3 my-3">clip hậu trường thách thức cầu thủ </h3>
            <div class="owl-carousel owl-theme px-3 py-3" id="slide-videos">
            @foreach($landing_page->videos as $item)
                @if($loop->iteration <= 4)
                    <div class="item px-0">
                        <div class="text-center w-video">
                            {!! $item->url !!}
                        </div>
                    </div>
                @else
                @endif
            @endforeach
            </div>
    </div>
    <div class="container-fluid">
        <h3 class="text-uppercase mx-3 my-3">tin tức thách thức đại sứ </h3>
        <div class="owl-carousel news owl-theme px-3 py-3" id="slide-news">
            @foreach($posts as $item)
                <div class="item">
                    <div class="card shadow-sm" style="height: 600px">
                        <img class="card-img-top px-2" width="100%" height="45%"
                             src="https://casio.anhkhue.com/assets/news/{{$item->homeimgfile}}"
                             alt="Card image cap">
                        <a href="https://casio.anhkhue.com/index.php/news/{{$item->cat.'/'.$item->alias.'-'.$item->id}}.html" ></a>
                        <div class="card-body" style="height: 40%">
                            <p class="card-text text-secondary">
                                {{date('d/m/Y', $item->addtime)}}
                            </p>

                            <a href="https://casio.anhkhue.com/index.php/news/{{$item->cat.'/'.$item->alias.'-'.$item->id}}.html"><h5 class="card-title text-dark text-decoration-none">{!! $item->title !!}</h5></a>
                            <p class="card-text">{!! $item->hometext !!}</p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="https://casio.anhkhue.com/index.php/news/{{$item->cat.'/'.$item->alias.'-'.$item->id}}.html" class="btn btn-outline-secondary  m-r-10">Xem Thêm</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>



    <div class="container-fluid py-3">
        <h3 class="text-uppercase mx-3 my-3">phỏng vấn người chơi</h3>
        <div class="row">
            <div class="col-lg-8 col-md-12 af-row px-3 py-3">
                <div class="col-lg-12">
                    <div class="container card col-lg-12">
                        <div class="row">
                            @foreach($interviewers as $interviewer)

                                <div class="col-lg-4 p-3">
                                    <div class="card shadow-lg px-3 rounded" style="height: 400px;">
                                        <span
                                            class="card-img-top mx-auto rounded-circle mt-4 d-flex align-items-center justify-content-center"
                                            style="background: #E3307E;width: 75px; height: 75px">
                                            <i class="mdi mdi-comment-text-outline h4 my-auto" style="color: ghostwhite"></i>
                                        </span>
                                        <div class="card-body">
                                            <p class="card-text text-center" >{{$interviewer->content}}</p>
                                        </div>
                                        <div class="card-footer bg-transparent " style=" height: 120px !important;">
                                            <div class="row d-flex align-items-center justify-content-center">
                                                <img style="object-fit:cover" src="{{asset('storage/avatars/'.$interviewer->avatar)}}" class="mt-2 mr-2 rounded-circle interviewer-img" alt="nguoi-phong-van">
                                                <div class="d-block my-auto">
                                                    <p >{{$interviewer->name}}</p>
                                                    <i class="text-danger">{{$interviewer->address}}</i>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-lg-4 col-md-12 px-3 py-3">
                <div class="card shadow-lg card-body">

                    <h3 class="box-title m-b-0">THÁCH THỨC CẦU THỦ</h3>

                    <p class="text-muted m-b-30 font-13">(* Nhận quà hấp dẫn) </p>

                    <div class="row">

                        <div class="col-sm-12 col-xs-12">

                            <form method="post" action="{{route('store_registrant')}}">
                                @csrf
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control" placeholder="Họ tên*">
                                    {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}

                                </div>
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control" placeholder="Email*">
                                    {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}

                                </div>
                                <div class="form-group">
                                    <input name="phone" type="phone" class="form-control" placeholder="Điện Thoại*">
                                    {!! $errors->first('phone', '<p class="text-danger">:message</p>') !!}

                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control" placeholder="Mật khẩu*">
                                    {!! $errors->first('password', '<p class="text-danger">:message</p>') !!}
                                </div>
                                <div class="form-group">
                                    <input name="password_confirmation" type="password" class="form-control"
                                           placeholder="Nhập lại mật khẩu">
                                    {!! $errors->first('password_confirmation', '<p class="text-danger">:message</p>') !!}
                                </div>
                                <div class="form-group">
                                    <div class="checkbox checkbox-success">
                                    <textarea name="content" style="width: 100%" class="px-2" rows="3"
                                              placeholder="Nội dung thách thức"></textarea>
                                    </div>
                                    {!! $errors->first('content', '<p class="text-danger">:message</p>') !!}

                                </div>
                                <div class="form-group">
                                    <div class="row col-lg-12 text-left m-auto">
                                        @if(!empty($influencers['name']))
                                            @foreach($influencers['name'] as $item)
                                                @if($item != null)
                                                    <label class="form-input-challenger-radio custom-control custom-radio">
                                                        <input required name="option" value="{{$item}}" type="radio"
                                                               class="custom-control-input">
                                                        <span class="custom-control-label h4">{{$item}}</span>
                                                    </label>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Gửi
                                </button>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection