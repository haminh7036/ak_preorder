@extends('layouts.app')
@section('content')

    <div id="order" class="my-4">
        <h1 class="text-center text-uppercase">
            Đặt trước <br> {{$product->Product_Name}}
        </h1>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="owl-carousel news owl-theme px-3 py-3 owl-products-images">
                        @foreach($product->Image as $image)
                            <div class="item">
                                <img height="500px" src="{{asset('storage/'.$image->Images)}}" />
                            </div>
                        @endforeach
                    </div>
                    <div class="w-100 text-center">
                        <a class="text-primary" href="{{url()->previous()}}"> < Về trang chi tiết trương trình</a>
                    </div>
                </div>
                <div class="col-md-8">
                    <style>
                        tr td {
                            vertical-align: top;
                            padding-top:10px
                        }
                        input[type="radio"] {
                            margin-top: -0.5px;
                            vertical-align: middle;
                        }
                    </style>
                    <div class="mt-3">

                        {!! Form::open(['method'=>'POST','class'=>'form-horizontal','url'=>route('store_pre_order',$product->Product_Code)]) !!}
                        <table class="w-100 h-75 ">
                            <tr>
                                <td width="25%" class="h4 font-weight-normal text-right">Giá bán</td>
                                <td class="pl-3">
                                    @if($product->Reduced_Price == 0)
                                        <span class="h3 font-weight-normal text-danger font-weight-bold">{{number_format($product->Price)}} <sup>đ</sup></span>

                                    @else

                                        <span class="h3 font-weight-normal text-danger font-weight-bold">{{number_format($product->Reduced_Price)}} <sup>đ</sup></span>
                                        <br>
                                        <span class="font-weight-normal text-danger overflow-hidden"><s class="text-secondary">{{number_format($product->Price)}}<sup>đ</sup></s> (-{{number_format($product->Price - $product->Reduced_Price)}}<sup>đ</sup>)</span>
                                        <br>
                                        <span class="font-weight-normal text-danger">(Chỉ áp dụng cho khách hàng đã cọc)</span>

                                    @endif

                                </td>
                            </tr>
                            @if(!empty($product->Gift))

                            <tr>
                                <td width="25%" class="text-right h4 font-weight-normal">Khuyến mãi</td>
                                <td class="pl-3">

                                    <ul class="m-0 pl-4">
                                        <li>Chọn quà</li>
                                        <ul class="fa-ul m-1">
                                            @foreach(unserialize($product->Gift) as $gift)
                                                <li class="mdi mdi-check-circle-outline text-success"> <p class="d-inline text-dark">{{$gift}}</p> </li>
                                            @endforeach
                                        </ul>
                                    </ul>
                                    <span class="text-danger">
                                    (Chỉ áp dụng cho khách hàng đã cọc)
                                </span>
                                </td>
                            </tr>
                            @endif

                            <tr>
                                <td width="25%" class="text-right h4 font-weight-normal ">Tiền cọc</td>
                                <td class="pl-3">
                                    <span class="text-danger h4 font-weight-normal">{{number_format($product->Deposit)}}<sup>đ</sup></span>
                                </td>
                            </tr>
                            <tr>
                                <td width="25%" class="text-right h4 font-weight-normal">Thông tin người mua</td>
                                <td class="pl-3">
                                    <div class="d-inline">
                                        <input type="radio" id="male" name="Gender" value="1">
                                        <label class="h4 font-weight-normal" for="male">Nam</label>
                                        <input type="radio" id="female" name="Gender" value="0">
                                        <label class="h4 font-weight-normal" for="female">Nữ</label>
                                        {!! $errors->first('Gender', '<p class="text-danger">Vui lòng chọn giới tính</p>')!!}

                                    </div>
                                    <div>
                                        <input class="form-control d-inline" style="width:180px" type="text" name="Name" placeholder="Họ và tên (Bắt buộc)">
                                        <input class="form-control d-inline" style="width:180px" type="text" name="Phone_Number" placeholder="Số điện thoại (Bắt buộc)">
                                        {!! $errors->first('Name', '<p class="d-inline text-danger">Vui lòng nhập rõ họ và tên</p>')!!}
                                        <br>
                                        {!! $errors->first('Phone_Number', '<p class="d-inline text-danger">Vui lòng số điện thoại </p>')!!}
                                        <div class="form-group" style="width:60%">
                                            <textarea class="mt-2 form-control"  name="Other_request" placeholder="Yêu cầu khác (Không bắt buộc)" rows="3"></textarea>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <tr id="block_test" style="display: none">
                                <td width="25%" class="text-right h4 font-weight-normal">Địa chỉ giao hàng</td>
                                <td class="pl-3">
                                    <div class="form-group">
                                        <select style="width:180px" class="form-control d-inline" id="city" name="city">
                                            <option value="" selected disabled>Tỉnh/Thành phố</option>

                                            @foreach($cities as $city)
                                                <option value="{{$city['title']}}">{{$city['title']}}</option>
                                            @endforeach
                                        </select>
                                        <select style="width:180px" class="form-control d-inline" id="wards" name="wards">
                                            <option value="" selected disabled>Quận/Huyện</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select style="width:360px" class="form-control d-inline" id="detail_address" name="detail_address">
                                            <option value="" selected disabled >Địa chỉ cửa hàng</option>
                                        </select>
                                    </div>
                                    {!! $errors->first('city', '<p class="text-danger">Vui lòng chọn Thành phố</p>')!!}
                                    {!! $errors->first('wards', '<p class="text-danger">Vui lòng chọn quận huyện </p>')!!}
                                    {!! $errors->first('detail_address', '<p class="text-danger">Vui lòng nhập rõ địa chỉ</p>')!!}

                                </td>
                            </tr>
                            <tr>
                                <td width="25%" class="text-right h4 font-weight-normal">Phương thức thanh toán </td>
                                <td class="pl-3">
                                    <div class="form-group">
                                        <input type="radio" id="payinstore" name="Payment" value="Đặt cọc tại cửa hàng">
                                        <label class="h5 font-weight-normal" for="payinstore">Đặt cọc tại cửa hàng</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="radio" id="transfer" name="Payment" value="Chuyển khoản ngân hàng">
                                        <label class="h5 font-weight-normal" for="transfer">Chuyển khoản ngân hàng</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="radio" id="alepay" name="Payment" value="Thanh toán AlePay">
                                        <label class="h5 font-weight-normal" for="alepay">Thanh toán AlePay</label>
                                    </div>
                                    {!! $errors->first('Payment', '<p class="text-danger">Vui lòng chọn đúng phương thức thanh toán</p>')!!}

                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    @if($product->status == 0)
                                        <button class="btn btn-warning text-white rounded w-25 my-4" type="submit">HOÀN TẤT</button>
                                    @else
                                        <i style="font-size:12px" class="text-danger">*Đơn hàng đặt trước đã đủ số lượng hẹn quý khách vào lần sau, Cảm ơn quý khách đã quan tâm đến sản phẩm!</i>
                                        <br/>
                                        <button disabled class="bg-secondary btn btn-disabled w-25 text-uppercase text-white mb-3">HOÀN TẤT</button>
                                    @endif
                                </td>
                            </tr>
                        </table>
                        {!! Form::close() !!}
                                               
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


@endsection