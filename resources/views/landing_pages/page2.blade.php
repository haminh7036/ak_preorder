@extends('layouts.app')
@section('content')

    @if($landing_page->type=='image')
        <div class="bg-img col-lg-12"
             style="width:100%; min-height:580px; background: url('{{asset('storage/'.$landing_page->big_banner)}}');background-position: center;
                 background-repeat: no-repeat;
                 background-size: cover;">
            <form method="post " class="form-input-challenger col-lg-12  shadow-lg" action="{{route('store_registrant')}}">
                @csrf
                <div class="form-group">
                    <input name="name" type="text" class="form-control" placeholder="Họ tên*">
                </div>
                <div class="form-group">
                    <input name="email" type="email" class="form-control" placeholder="Email*">
                </div>
                <div class="form-group">
                    <input name="phone" type="phone" class="form-control" placeholder="Điện Thoại*">
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" placeholder="Mật khẩu*">
                </div>
                <div class="form-group">
                    <input name="password_confirmation" type="password" class="form-control"
                           placeholder="Nhập lại mật khẩu">
                </div>
                <div class="form-group">
                    <div class="checkbox checkbox-success">
                                    <textarea name="content" style="width: 100%" class="px-2" rows="3"
                                              placeholder="Nội dung thách thức"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row col-lg-12 text-left m-auto ">
                        @foreach($influencers['name'] as $item)
                            @if($item != null)
                                <label class="form-input-challenger-radio custom-control custom-radio col-lg-6">
                                    <input name="option" value="{{$item}}" type="radio"
                                           class="custom-control-input">
                                    <span class="custom-control-label h4">{{$item}}</span>
                                </label>
                            @endif
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Gửi
                </button>
            </form>

        </div>
    @else
        <div class="frame-big-banner">
            {!! $landing_page->big_banner !!}
        </div>
    @endif
    <section class="bg-danger text-white">
        <div class="container">
            <div class="col-lg-12 col-md-4 row">
                    @foreach($landing_page->posts->where('position',1)->where('landing_page_id','2') as $item)

                        <div class="col-lg-4 col-md-12 p-0 text-center mx-auto p-2">
                            <div class="col-lg-12 row">
                                <div
                                    class="col-lg-4 w-50 bg-transparent d-flex align-items-center justify-content-center"
                                    style="height: 160px">
                                    <i class="{{$item->icon}} display-1"></i>
                                </div>
                                <div class="col-lg-8 w-50 my-auto pt-3 text-left">
                                    <h4>{{$item->title}}</h4>
                                    <p>{{$item->content}}</p>
                                </div>
                            </div>

                        </div>
                    @endforeach
            </div>
        </div>
    </section>

    <div id="content">
        <div class="container">
            @foreach($landing_page->posts->where('position',2)->where('landing_page_id','2') as $item)
                <div class="row py-4">
                    <div class="col-lg-6 col-md-12 row">
                        <div class="col-lg-12">
                            <div class="col-lg-12 row">
                                <div class="col-lg-3">
                                    <i class="{{$item->icon}} display-4 text-danger"></i>
                                </div>
                                <div class="col-lg-9 my-auto">
                                    <p class="h5">{{$item->title}}</p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <p>
                                    {{$item->content}}

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="col-lg-12">
                            <a  href="{{asset('storage/'.$item->img)}}" data-lightbox="example-set">
                                <img class=" shadow-lg" width="100%" height="50%"
                                     src="{{asset('storage/'.$item->img)}}"
                                     alt="{{$item->img}}">
                            </a>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div id="profits" class="overflow-auto overlay"
        style="background: url('https://casio.anhkhue.com/page/images/8-20200221061145.jpg'),rgba(0,0,0,0.7);
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-attachment: fixed;
        object-fit: cover !important;
        " >
        <div class="container text-white py-5 my-auto" >
            <div class="col-lg-12 col-md-12 text-center">
                <p class="h4 text-uppercase mt-4">chúng tôi mang lại những gì</p>
                <hr class="border border-light" style="width: 25%">
            </div>

            <div class="col-lg-12 col-md-12">
                <div class="row">
                    @foreach($landing_page->posts->where('position',3)->where('landing_page_id','2') as $item)

                    <div class="col-lg-4 col-md-12 p-0 text-center mx-auto p-2">
                            <div class="col-lg-12">
                                <div
                                    class="af-if-h bg-transparent mx-auto my-4 border border-light rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="{{$item->icon}} display-1" style="color: #e3307e"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="h2" style="color: #e3307e" >{{$item->title}}</h4>
                                <p class=" font-weight-normal px-3">{{$item->content}}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>


    </div>



    <div id="images" class="py-5">

        <div class="container">

            <div class="text-center p-5 ">
                <h4 class="text-uppercase">hình ảnh cầu thủ tại shop</h4>
                <p>Chùm ảnh các tuyển thủ đã từng tham gia giao lưu với người hâm mộ tại các sự kiện của Anh Khuê Sài
                    Gòn.</p>
            </div>
            <div class="col-lg-12 col-md-12 af-row">
                @foreach($landing_page->images as $item)
                    @if($loop->iteration <= 8)
                        <div class="col-lg-3 col-md-12 my-2">
                            <a href="{{asset('storage/'.$item->images)}}" data-lightbox="example-set">
                                <img class="shadow-lg img-fluid" width="100%" height="200px" style="object-fit: cover" src="{{asset('storage/'.$item->images)}}" alt="{{asset('storage/'.$item->images)}}">
                            </a>
                        </div>
                    @else
                        @break
                    @endif
                @endforeach
            </div>

        </div>


    </div>
    <section id="info" class="my-4 bg-light">
        <div class="container p-3">
            @foreach($landing_page->posts->where('position',4)->where('landing_page_id','2') as $item)
                @if($loop->iteration > 1)
                    @break
                @endif
            <div class="col-lg-12 col-md-12 text-left">
                <p class="h4 text-uppercase mt-4 ">Cầu thủ tại Anh Khuê Sài Gòn</p>
            </div>
                <div class="col-lg-12 col-md-12 af-row">
                    <div class="col-lg-6 my-auto h-100">
                        <div class="card shadow-lg" >
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div
                                        class="w-25 bg-light mx-auto my-4 rounded-circle d-flex align-items-center justify-content-center"
                                        style="height: 100px">
                                        <i class="{{$item->icon}} display-4 p-4 text-danger"></i>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <p class="h4 my-3 text-danger">{!! $item->title !!}</p>
                                    <p class="text-danger">{!!$item->content !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 my-2 ">
                        @if(pathinfo($item->img,PATHINFO_EXTENSION) == 'mp4')

                            <a  href="{{asset('storage/'.$item->img)}}" data-lightbox="example-set">
                                <video width="100%" height="100%" controls src="{{asset('storage/'.$item->img)}}"></video>
                                <img  src="{{asset('storage/'.$item->img)}}" alt="{{asset('storage/'.$item->img)}}">
                            </a>

                        @else
                            <a  href="{{asset('storage/'.$item->img)}}" data-lightbox="example-set">
                                <img width="100%" height="320px" src="{{asset('storage/'.$item->img)}}" alt="">
                            </a>

                        @endif

                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section id="products">
        <div class="container">
            <div class="col-lg-12">
                <div class="text-center ">
                    <h3 class="text-uppercase">Khuyến Mãi Đặc Biệt</h3>
                    <hr class="w-25">
                    <p>Chọn màu sắc và mẫu đồng hồ bạn thích. Việc còn lại để chúng tôi lo</p>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-lg-4 my-3   ">
                        <div class="card shadow-lg">
                            <div class="card-header  border-bottom-0 bg-transparent text-center">
                                <h2>{{$product->product_code}}</h2>
                            </div>
                            <div class="card-body text-center">
                                <img src="https://casio.anhkhue.com/uploads/shops/{{$product->homeimgfile}}"
                                     class="w-100 h-100" alt="">
                                
                                @if($product->saleprice != 0)
                                    <h3><s>{{ number_format($product->product_price) }}Đ</s></h3>
                                    <h4 class="text-uppercase text-danger">chỉ còn: {{$product->saleprice}}</h4>
                                @else
                                    <h3>{{ number_format($product->product_price) }} <sup>đ</sup></h3>
                                @endif
                                
                            </div>
                            <div class="card-footer border-0 bg-transparent text-center">
                                <a href="https://casio.anhkhue.com/index.php/{{$product->catalias.'/'.$product->vi_alias}}.html"
                                   class="text-uppercase w-50 text-center btn btn-primary">Đặt ngay</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <br>
    <div class="w-100  text-center ">
        <a href="https://casio.anhkhue.com/index.php/g-shock/" class="btn-lg btn-danger text-uppercase mt-4">xem thêm</a>
    </div>
    <br>

@endsection