@extends('layouts.app')
@section('content')

    <div class="main-wrapper">

        @if($landing_page->type=='image')
            <img width="100%" src="{{asset('storage/'.$landing_page->big_banner)}}" alt="">
        @else
            <div class="frame-big-banner">
                {!! $landing_page->big_banner !!}
            </div>
        @endif

    </div>
    <section class="main text-center p-5">
        <div class="col-lg-12">
            @foreach($landing_page->posts as $item)
                <h2 class="text-uppercase display-4 font-weight-bold">{!! $item->title !!}</h2>
                <br>
                <p class="my-3 h4 ">{!! preg_replace("/\r\n|\r|\n/", '<br/>', $item->content) !!}</p>
                <ul class="list-unstyled d-inline-flex ">
                    <li class="p-2"><a id="fb" class="display-3 text-dark"
                                       href="https://www.facebook.com/Casio.AnhKhueSaiGon/" target="_blank"
                                       title="Casio Anh Khuê Sài Gòn"><i class="mdi mdi-facebook-box"
                                                                         aria-hidden="true"></i></a></li>
                    <li class="p-2"><a id="yt" class="display-3 text-dark"
                                       href="https://www.youtube.com/channel/UC9junguUoHEXK7fNcOo0ivQ?sub_confirmation=1"
                                       target="_blank" title="Casio Anh Khuê Sài Gòn"><i class="mdi mdi-youtube-play"
                                                                                         aria-hidden="true"></i></a>
                    </li>
                    <li class="p-2"><a id="ins" class="display-3 text-dark"
                                       href="https://www.instagram.com/gshock_babyg.vietnam/" target="_blank"
                                       title="Casio Anh Khuê Sài Gòn"><i class="mdi mdi-instagram"
                                                                         aria-hidden="true"></i></a></li>
                </ul>
                <div class="p5">
                    <div class="col-lg-12 my-2  mx-auto">
                        @if(pathinfo($item->img,PATHINFO_EXTENSION) == 'mp4')
                            <video class="col-lg-6 col-md-6" width="50%" height="50%" controls src="{{asset('storage/'.$item->img)}}"></video>
                        @else
                            <img width="50%" height="320px" src="{{asset('storage/'.$item->img)}}" alt="">
                        @endif

                    </div>

                </div>
            @endforeach

        </div>
    </section>

    <div class="images pb-3">
        <div class="col-lg-12">
            <div class="px-1 py-1">
                <div class="owl-carousel owl-theme mt-1" id="slide-registrant">
                    @foreach($landing_page->images as $item)
                        <div class="item">
                                <a href="{{asset('storage/'.$item->images)}}" data-lightbox="example-set">
                                    <img height="500px" style="object-fit: cover ;background-position: 50% 50%;"
                                         src="{{asset('storage/'.$item->images)}}" alt="{{$item->images}}">
                                </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div id="related-watch" class="p-4">
        <div class="container">
            <div class="col-lg-12">
                <h2 class="text-uppercase display-4 text-center">Related Watches</h2>
                <hr>
                <div class="px-1 py-1">
                    <div class="owl-carousel owl-theme mt-1" id="slide-videos">
                        @foreach($products as $item)
                            <div class="item">
                                <a href="https://casio.anhkhue.com/index.php/{{$item->catalias.'/'.$item->vi_alias}}.html">
                                    <img height="300px" class="mx-auto"
                                         style=" width: 300px !important;background-position: center;"
                                         src="https://casio.anhkhue.com/uploads/shops/{{$item->homeimgfile}}"
                                         alt="{{$item->vi_alias}}">
                                    <br>
                                    <h4 class="text-center">{{$item->product_code}}</h4>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="latest-content p-4 bg-light">
        <div class="container">
            <div class="col-lg-12 text-center">
                <h3 class="text-uppercase display-4 ">Latest contents</h3>
                <hr>
                <div class="owl-carousel news owl-theme px-3 py-3" id="slide-news">
                    @foreach($posts as $item)
                        <div class="item">
                            <a href="https://casio.anhkhue.com/index.php/news/{{$item->cat.'/'.$item->alias.'-'.$item->id}}.html"
                               class="m-r-10 text-decoration-none">
                                <div class="card" style="height: 350px; ">
                                    <img class="card-img-top px-2" width="100%" height="45%"
                                         src="https://casio.anhkhue.com/assets/news/{{$item->homeimgfile}}"
                                         alt="Card image cap">
                                    <div class="card-body" style="height: 40%">
                                        <p class="card-text text-left text-secondary">
                                            {{date('d/m/Y', $item->addtime)}}
                                        </p>
                                        <p class="card-title font-weight-bold text-left">{!! $item->title !!}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection
