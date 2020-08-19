@extends('layouts.app')
@section('content')
    <div id="banner">

        <img src="{{asset('images/onpiece_1.jpg')}}" alt="" class="w-100 h-100">

    </div>
    <h2 class="text-center text-primary text-uppercase my-4">Danh Sách đặt trước</h2>
    <div class="container-fluid my-4 ">
        <div class="col-md-12">
            <div class="row">
                @foreach($products as $key=>$product)
                    @if($loop->iteration > 2)
                        @break
                    @endif
                <div class="@if($product->count() >= 2) col-md-6 mx-auto @else col-md-7 mx-auto @endif" >
                    <div class="row">
                        <div class="col-md-6 p-0">
                            <a href="{{asset('storage/'.$product->Image->first()->Images)}}" data-lightbox="{{$product->Product_Name}}">

                                <img src="{{asset('storage/'.$product->Image->first()->Images)}}" width="100%" alt="">
                            </a>
                        </div>
                        <div class="col-md-6 d-flex flex-column">
                            <div>
                                <h3>{{$product->Product_Name}}</h3>
                                <br>
                                <h4 class="text-danger"> <span class="text-dark">Giá dự kiến </span> {{number_format($product->Price)}}  <sup>đ</sup></h4>
                                <h4 class="text-danger"> <span class="text-dark">Tiền cọc </span> {{number_format($product->Deposit)}}  <sup>đ</sup></h4>
                                @if($product->Reduced_Price != 0)
                                    <h4 class="text-danger font-weight-bold">Giá giảm: {{number_format($product->Reduced_Price)}} <sup>đ</sup> </h4>
                                @endif
                                <p class="text-primary h4 text-uppercase"><span class="fa fa-spinner spin h2 font-weight-bold"></span> Còn <b class="text-danger h1 font-weight-bold">{{$product->Quantity}}</b> sản phẩm</p>
                                @if(!empty($product->Gift))
                                    <div class="af-row">
                                        <p class=" float-left badge badge-warning p-2  rounded text-white" >Quà tặng</p>
                                        <hr class="border border-warning" style="width: 75%">
                                    </div>
                                    <ul class="m-0">
                                        <li>Chọn quà</li>
                                        <ul class="fa-ul m-1">
                                            @foreach(unserialize($product->Gift) as $gift)
                                                <li class="mdi mdi-check-circle-outline text-success"> <p class="d-inline text-dark">{{$gift}}</p> </li>
                                            @endforeach
                                        </ul>
                                    </ul>
                                @endif
                                <br>
                            </div>
                            <div class="d-flex flex-column justify-content-center h-100" >
                                @if($product->status == 0)
                                    <br />
                                    <button id="myBtn" class="btn btn-primary w-100 text-uppercase mb-3">Hướng dẫn đặt hàng</button>
                                    <a href="{{route('preorder_order',$product->Product_Code)}}" class="btn btn-warning w-100 text-uppercase text-white mb-3">Đặt cọc</a>
                                @else
                                    <i style="font-size:12px" class="text-danger">* Còn {{$product->Quantity}} sản phẩm</i>
                                    <i style="font-size:12px" class="text-danger">*Đơn hàng đặt trước đã đủ số lượng hẹn quý khách vào lần sau, Cảm ơn quý khách đã quan tâm đến sản phẩm!</i>
                                    <br/>
                                    <button id="myBtn" class="btn btn-primary w-100 text-uppercase mb-3">Hướng dẫn đặt hàng</button>
                                    <button disabled class="bg-secondary btn btn-disabled w-100 text-uppercase text-white mb-3">Đặt cọc</button>
                                @endif
                                
                                <a href="tel:0934003403" style="background-color:#1B1D4D" class="btn w-100 text-uppercase text-white mb-3">Gọi ngay: 0934 003 403</a>
                            </div>
                        </div>
                    </div>
               
                    <div class="row my-3 px-1">
                        <div class="col-md-6 w-100 rounded pl-0" style="background-color: #F07F20; height: 10px"></div>
                        <div class="col-md-6 w-100 rounded" style="background-color: #1B1D4D"></div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
    <div id="myModal" class="modal-guide">
        <div class="modal-guide-content">
            <span class="modal-guide-close">&times;</span>
            <p style="text-align:center">PRE ODER &ndash; ĐẶT H&Agrave;NG TRƯỚC</p>
            <p style="text-align:center">HƯỚNG DẪN ĐẶT H&Agrave;NG TRƯỚC &amp; THANH TO&Aacute;N SẢN PHẨM: G-SHOCK GA-110JOP</p>
            <p><strong>1. THỜI GIAN:</strong></p>
            <p style="margin-left:40px">Thời gian đặt h&agrave;ng trước: từ ng&agrave;y 12 đến 17/08/2020</p>
            <p style="margin-left:40px">Thời gian giao h&agrave;ng dự kiến: từ ng&agrave;y 18 đến 22/08/2020</p>
            <p><strong>2. HƯỚNG DẪN ĐẶT H&Agrave;NG TRƯỚC:</strong></p>
            <p style="margin-left:40px">- Bước 1: Qu&yacute; kh&aacute;ch c&oacute; thể đặt h&agrave;ng sản phẩm tại: Website: https://casio.anhkhue.com/</p>
            <p style="margin-left:40px">Fanpage:</p>
            <p style="margin-left:40px">+ FB/Casio.AnhKhueSaiGon/</p>
            <p style="margin-left:40px">+ FB/GShockBabyGinVietnam/</p>
            <p style="margin-left:40px">Hoặc li&ecirc;n hệ hotline: 0934 003 403 để được hỗ trợ đặt h&agrave;ng.</p>
            <p style="margin-left:40px">- Bước 2: H&igrave;nh thức nhận h&agrave;ng</p>
            <p style="margin-left:40px">+ Giao h&agrave;ng tận nơi.</p>
            <p style="margin-left:40px">- Bước 3: H&igrave;nh thức thanh to&aacute;n</p>
            <p style="margin-left:40px">+ Gi&aacute; b&aacute;n: 6,580,000đ đặt cọc trước 30% gi&aacute; trị sản phẩm (tương ứng 1,974,000đ)</p>
            <p style="margin-left:40px">+ Thanh to&aacute;n: h&igrave;nh thức thanh to&aacute;n trực tuyến (sử dụng thẻ t&iacute;n dụng, ATM, chuyển khoản)</p>
            <p style="margin-left:40px">Th&ocirc;ng tin chuyển khoản:</p>
            <p style="margin-left:40px">&middot; T&ecirc;n t&agrave;i khoản: CT CP Anh Khu&ecirc; S&agrave;i G&ograve;n</p>
            <p style="margin-left:40px">&middot; Số t&agrave;i khoản: 0251002726845</p>
            <p style="margin-left:40px">&middot; Tại: Ng&acirc;n h&agrave;ng Vietcombank - Chi nh&aacute;nh B&igrave;nh T&acirc;y</p>
            <p style="margin-left:40px">&middot; Nội dung chuyển khoản: Đặt cọc 30% ĐH One piece</p>
            <p style="margin-left:40px">+ Khi nhận h&agrave;ng Qu&yacute; kh&aacute;ch sẽ thanh to&aacute;n 70% gi&aacute; trị c&ograve;n lại.</p>
            <p style="margin-left:40px">Lưu &yacute;: Mỗi kh&aacute;ch h&agrave;ng chỉ được đặt một c&aacute;i. Nếu kh&aacute;ch h&agrave;ng thay đổi &yacute; định kh&ocirc;ng nhận h&agrave;ng sau khi đ&atilde; tiến h&agrave;nh đặt h&agrave;ng, phần đặt cọc n&agrave;y sẽ kh&ocirc;ng được ho&agrave;n lại.</p>
        </div>
    </div>

    @if(!empty($Page->iframe))

        <section id="iframe " class="my-3">
            <div class="container">

                <style>
                    #iframe-present iframe{
                        width: 80%;
                        height: 600px;
                    }
                </style>
                <h2 class="text-uppercase text-center text-primary my-3">video giới thiệu sản phẩm</h2>
                <div class="text-center" id="iframe-present">
                    {!! $Page->iframe !!}
                </div>

            </div>
        </section>

    @endif

    @if(!empty($Page->bodyhtml))
        <article id="content" class="my-4">
            <h2 class="text-uppercase text-primary text-center">Bộ hình & thông số</h2>
            
            <div class="container">

                <div class="overflow-auto">
                    {!! $Page->bodyhtml !!}
                </div>

            </div>
        </article>

    @endif
    <div id="specification">
        <h2 class="text-uppercase text-center text-primary my-3">hình ảnh và thông số kỹ thuật</h2>
        <div class="container">
            <ul class="nav nav-pills m-t-30 justify-content-center m-b-30 my-4">
                @foreach($products as $product)
                    @if($loop->iteration==1)
                        <li class="nav-item mx-2 border border-primary rounded"> <a href="#navpills2-{{$loop->iteration}}" class="nav-link text-uppercase active show" data-toggle="tab" aria-expanded="true">{{$product->Product_Code}}</a> </li>
                    @else
                        <li class="nav-item mx-2 border border-primary rounded"> <a href="#navpills2-{{$loop->iteration}}" class="nav-link text-uppercase" data-toggle="tab" aria-expanded="false">{{$product->Product_Code}}</a> </li>
                    @endif
                @endforeach
            </ul>
            <div class="tab-content br-n pn " style="transition: 3s">
                @foreach($products as $product)
                <div id="navpills2-{{$loop->iteration}}" class="tab-pane  @if($loop->iteration ==1) active show @endif">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="owl-carousel news owl-theme px-3 py-3 owl-products-images">
                                @foreach($product->Image as $image)
                                <div class="item ">
                                    <a href="{{asset('storage/'.$image->Images)}}" data-lightbox="example-set">
                                        <img style="object-fit: cover; height:500px" src="{{asset('storage/'.$image->Images)}}" />
                                    </a>
                                </div>
                                @endforeach
                            </div>

                            <div class="px-3 text-center">
                                <h5 class="text-uppercase">{{$product->Product_Name}}</h5>
                                @if($product->Reduced_Price == 0)
                                    <h3 class="text-danger font-weight-bold">>Giá dự kiến: {{number_format($product->Price)}} <sup>đ</sup> </h3>
                                @else
                                    <span class="text-uppercase">Giá dự kiến:</span> {{number_format($product->Price)}}<sup>đ</sup>
                                    <h3 class="text-danger font-weight-bold"> <span class="text-uppercase text-dark h5">Tiền cọc:</span>{{number_format($product->Deposit)}} <sup>đ</sup> </h3>
                                    @if(!empty($product->Gift))

                                    <div class="af-row">
                                        <p class=" float-left badge badge-warning p-2  rounded text-white" >Quà tặng</p>
                                        <hr class="border border-warning" style="width: 85%">
                                    </div>
                                    <ul class="m-0 text-left">

                                        <li>Chọn quà</li>
                                        <ul class="fa-ul m-1">
                                            @foreach(unserialize($product->Gift) as $gift)
                                                <li class="mdi mdi-check-circle-outline text-success"> <p class="d-inline text-dark">{{$gift}}</p> </li>
                                            @endforeach
                                        </ul>
                                    </ul>
                                    @endif

                                @endif
                                <p class="text-center">Còn {{$product->Quantity}} sản phẩm</p>

                                @if($product->status == 0)
                                    <a href="{{route('preorder_order',$product->Product_Code)}}" class="btn btn-warning w-100 text-uppercase text-white mb-3">Đặt ngay</a>
                                @else
                                    <i style="font-size:12px" class="text-danger">*Đơn hàng đặt trước đã đủ số lượng hẹn quý khách vào lần sau, Cảm ơn quý khách đã quan tâm đến sản phẩm!</i>
                                    <br/>
                                    <button disabled class="bg-secondary btn btn-disabled w-100 text-uppercase text-white mb-3">Đặt ngay</button>
                                @endif
                                
                            </div>


                        </div>

                        <div class="col-md-6 pt-3">
                            <h4>Thông số kỹ thuật</h4>
                            <table class="table-striped w-100 h-75">
                                <tr>
                                    <td class="px-3" width="40%">Chất liệu :</td>
                                    <td>{{$product->Specification->Material}}</td>
                                </tr>
                                <tr>
                                    <td class="px-3" width="40%">Đường kính mặt :</td>
                                    <td>{{$product->Specification->Face_diameter}}</td>
                                </tr>
                                <tr>
                                    <td class="px-3" width="40%">Độ dày mặt :</td>
                                    <td>{{$product->Specification->Case_diameter}}</td>
                                </tr>
                                <tr>
                                    <td class="px-3" width="40%">Loại máy :</td>
                                    <td>{{$product->Specification->Type}}</td>
                                </tr>
                                <tr>
                                    <td class="px-3" width="40%">Chất liệu khung viền :</td>
                                    <td>{{$product->Specification->Frame}}</td>
                                </tr>
                                <tr>
                                    <td class="px-3" width="40%">Chất liệu dây :</td>
                                    <td>{{$product->Specification->Wire_Material}}</td>
                                </tr>
                                <tr>
                                    <td class="px-3" width="40%">Độ rộng giây :</td>
                                    <td>{{$product->Specification->Wire_Width}}</td>
                                </tr>
                                <tr>
                                    <td class="px-3" width="40%">Chống nước :</td>
                                    <td>{{$product->Specification->Waterproof}}</td>
                                </tr>
                                <tr>
                                    <td class="px-3" width="40%">Nguốn năng lượng :</td>
                                    <td>{{$product->Specification->Energy_Sources}}</td>
                                </tr>
                                <tr>
                                    <td class="px-3" width="40%">Thời gian sử dụng pin :</td>
                                    <td>{{$product->Specification->Battery_life_time}}</td>
                                </tr>
                                <tr>
                                    <td class="px-3" width="40%">Đối tượng sử dụng :</td>
                                    <td>{{$product->Specification->User_Object}}</td>
                                </tr>
                                <tr>
                                    <td class="px-3" width="40%">Thương hiệu :</td>
                                    <td>{{$product->Specification->Trademark}}</td>
                                </tr>
                            </table>
                        </div>

                    </div>

                </div>
                @endforeach
            </div>
        </div>

    </div>


    <div class="latest-content p-4">
        <div class="container">
            <div class="col-lg-12 text-center">
                <h2 class="text-uppercase text-primary ">Tin tức mới nhất</h2>
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


    <div id="facebook-comment ">
        <div class="fb-comments d-flex justify-content-center" data-href="{{Request::url()}}" data-numposts="10" data-width="1000"></div>
    </div>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0" nonce="Bb7Rxt9Q"></script>
@endsection


@section('extra_scripts')

    <script>
        let modal = document.getElementById("myModal");
        let btn = document.getElementById("myBtn");
        let span = document.getElementsByClassName("modal-guide-close")[0];
        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

@endsection