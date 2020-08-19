@extends('layouts_admin.admin')
@section('content')
    @include('layouts_admin._breadcrumbs')
    <div class="row">

        <div class="col-lg-12">

            <div class="card card-outline-info">

                <div class="card-header">

                    <h4 class="m-b-0 text-white">Sản phẩm</h4>

                </div>

                <div class="card-body">

                    <form class="form-horizontal" action="{{route('product.edit',$product->id)}}" role="form">

                        <div class="form-body">

                            <h3 class="box-title">Thông tin sản phẩm</h3>

                            <hr class="m-t-0 m-b-40">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group row">

                                        <label class="control-label text-right col-md-3">Tên sản phẩm: </label>

                                        <div class="col-md-9">

                                            <p class="form-control-static"> {{$product->Product_Name}}</p>

                                        </div>

                                    </div>

                                </div>

                                <!--/span-->

                                <div class="col-md-6">

                                    <div class="form-group row">

                                        <label class="control-label text-right col-md-3">Mã sản phẩm</label>

                                        <div class="col-md-9">

                                            <p class="form-control-static">{{ $product->Product_Code }} </p>

                                        </div>

                                    </div>

                                </div>

                                <!--/span-->

                            </div>

                            <!--/row-->

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group row">

                                        <label class="control-label text-right col-md-3">Giá:</label>

                                        <div class="col-md-9">

                                            <p class="form-control-static"> {{number_format($product->Price)}} </p>

                                        </div>

                                    </div>

                                </div>

                                <!--/span-->

                                <div class="col-md-6">

                                    <div class="form-group row">

                                        <label class="control-label text-right col-md-3">Số lượng</label>

                                        <div class="col-md-9">

                                            <p class="form-control-static"> {{$product->Quantity}}</p>

                                        </div>

                                    </div>

                                </div>

                                <!--/span-->

                            </div>

                            <!--/row-->

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group row">

                                        <label class="control-label text-right col-md-3">Giá giảm</label>

                                        <div class="col-md-9">

                                            <p class="form-control-static"> {{number_format($product->Reduced_Price)}} </p>

                                        </div>

                                    </div>

                                </div>

                                <!--/span-->

                                <div class="col-md-6">

                                    <div class="form-group row">

                                        <label class="control-label text-right col-md-3">Quà tặng:</label>

                                        <div class="col-md-9">
                                            @if(!empty($product->Gift))

                                            @foreach(unserialize($product->Gift) as $item)
                                                <p class="form-control-static"> {{$item}} </p>
                                            @endforeach
                                            @endif

                                        </div>

                                    </div>

                                </div>

                                <!--/span-->

                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group row">

                                        <label class="control-label text-right col-md-3">Đặt cọc</label>

                                        <div class="col-md-9">

                                            <p class="form-control-static"> {{$product->Deposit}} </p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!--/row-->

                            <h3 class="box-title">Thông số kỹ thuật</h3>

                            <hr class="m-t-0 m-b-40">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group row">

                                        <label class="control-label text-right col-md-3">Chất liệu :</label>

                                        <div class="col-md-9">

                                            <p class="form-control-static">{{$product->Specification->Material}}</p>

                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group row">

                                        <label class="control-label text-right col-md-3">Đường kính mặt :</label>

                                        <div class="col-md-9">

                                            <p class="form-control-static"> {{$product->Specification->Face_diameter}} </p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="row">


                                <!--/span-->

                                <div class="col-md-6">

                                    <div class="form-group row">

                                        <label class="control-label text-right col-md-3">Loại máy :</label>

                                        <div class="col-md-9">

                                            <p class="form-control-static"> {{$product->Specification->Type}} </p>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group row">

                                        <label class="control-label text-right col-md-3">Chất liệu khung viền :</label>

                                        <div class="col-md-9">

                                            <p class="form-control-static"> {{$product->Specification->Frame}} </p>

                                        </div>

                                    </div>

                                </div>

                                <!--/span-->

                            </div>

                            <!--/row-->

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group row">

                                        <label class="control-label text-right col-md-3">Độ dày mặt :</label>

                                        <div class="col-md-9">

                                            <p class="form-control-static"> {{$product->Specification->Case_diameter}} </p>

                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group row">

                                        <label class="control-label text-right col-md-3">Chất liệu dây :</label>

                                        <div class="col-md-9">

                                            <p class="form-control-static"> {{$product->Specification->Wire_Material}} </p>

                                        </div>

                                    </div>

                                </div>


                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group row">

                                    <label class="control-label text-right col-md-3">Độ rộng giây :</label>

                                    <div class="col-md-9">

                                        <p class="form-control-static"> {{$product->Specification->Wire_Width}} </p>

                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group row">

                                    <label class="control-label text-right col-md-3">Chống nước :</label>

                                    <div class="col-md-9">

                                        <p class="form-control-static"> {{$product->Specification->Waterproof}} </p>

                                    </div>

                                </div>

                            </div>


                        </div>
                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group row">

                                    <label class="control-label text-right col-md-3">Nguốn năng lượng :</label>

                                    <div class="col-md-9">

                                        <p class="form-control-static"> {{$product->Specification->Energy_Sources}} </p>

                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group row">

                                    <label class="control-label text-right col-md-3">Thời gian sử dụng pin :</label>

                                    <div class="col-md-9">

                                        <p class="form-control-static"> {{$product->Specification->Battery_life_time}} </p>

                                    </div>

                                </div>

                            </div>


                        </div>
                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group row">

                                    <label class="control-label text-right col-md-3">Đối tượng sử dụng :</label>

                                    <div class="col-md-9">

                                        <p class="form-control-static"> {{$product->Specification->User_Object}} </p>

                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group row">

                                    <label class="control-label text-right col-md-3">Thương hiệu :</label>

                                    <div class="col-md-9">

                                        <p class="form-control-static"> {{$product->Specification->Trademark}} </p>

                                    </div>

                                </div>

                            </div>


                        </div>

                        <h3 class="box-title">Hình ảnh</h3>

                        <hr class="m-t-0 m-b-40">

                        <div class="row">

                            @foreach($product->Image as $item)

                                <div class="col-lg-3 col-md-12 my-2">
                                    <a href="{{asset('storage/'.$item->Images)}}" data-lightbox="example-set">
                                        <img class="shadow-lg" width="100%" height="200px" style="object-fit: cover" src="{{asset('storage/'.$item->Images)}}" alt="{{asset('storage/'.$item->images)}}">
                                    </a>
                                </div>

                            @endforeach
                        </div>


                        <div class="form-actions">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="row">

                                        <div class="col-md-offset-3 col-md-9">

                                            <button type="submit" class="btn btn-info"><i class="fa fa-pencil"></i> Edit
                                            </button>

                                            <a href="{{url()->previous()}}" class="btn btn-inverse">Cancel</a>


                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-6"></div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection
