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
                    {!! Form::open(['url'=>route('product.update',$product->id), 'method'=>'PATCH','class'=>'form-horizontal','enctype'=>"multipart/form-data"]) !!}
                        <div class="form-body">

                            <h3 class="box-title">Thông tin sản phẩm</h3>

                            <hr class="m-t-0 m-b-40">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group row">

                                        <label class="control-label text-right col-md-3">Tên sản phẩm: </label>

                                        <div class="col-md-9">

                                            <input type="text" name="Product_Name" class="form-control form-control-line" value="{{$product->Product_Name}}" >
                                            {!! $errors->first('Product_Name', '<p class="text-danger">:message</p>')!!}

                                        </div>

                                    </div>

                                </div>

                                <!--/span-->

                                <div class="col-md-6">

                                    <div class="form-group row">

                                        <label class="control-label text-right col-md-3">Mã sản phẩm</label>

                                        <div class="col-md-9">
                                            <input type="text" name="Product_Code" class="form-control form-control-line" value="{{ $product->Product_Code }}">
                                            {!! $errors->first('Product_Code', '<p class="text-danger">:message</p>')!!}
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

                                            <input type="number" name="Price" value="{{($product->Price)}}" min="0" class="form-control form-control-line">
                                            {!! $errors->first('Price', '<p class="text-danger">:message</p>')!!}

                                        </div>

                                    </div>

                                </div>

                                <!--/span-->

                                <div class="col-md-6">

                                    <div class="form-group row">

                                        <label class="control-label text-right col-md-3">Số lượng</label>

                                        <div class="col-md-9">
                                            <input type="number" min="0" name="Quantity" value="{{$product->Quantity}}" class="form-control form-control-line">
                                            {!! $errors->first('Quantity', '<p class="text-danger">:message</p>')!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Giá giảm</label>
                                        <div class="col-md-9">
                                            <input type="number" value="{{$product->Reduced_Price}}" min="0" name="Reduced_Price" class="form-control form-control-line">

                                        </div>

                                    </div>

                                </div>

                                <!--/span-->

                                <div class="col-md-6">


                                    <div class="form-group row">

                                        <label class="control-label text-right col-md-3">Quà tặng:</label>

                                        <div class="col-md-9" id="input">
                                            @if(!empty($product->Gift))
                                                @foreach(unserialize($product->Gift) as $item)
                                                    <div class="form-group">
                                                        <input placeholder="Nhập quà kèm theo" value="{{$item}}" class="form-control col-lg-11" name="Gift[]" type="text">
                                                        <button class="border border border-danger rounded bg-transparent text-danger float-right mx-auto" id="remove" type="button" onclick="remove(this)">X</button>
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                        <button class="btn btn-primary col-md-3 ml-auto " type="button" id="add">
                                            Thêm quà kèm theo
                                        </button>
                                    </div>

                                </div>

                                <!--/span-->

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Đặt cọc</label>
                                        <div class="col-md-9">
                                            <input type="number" value="{{$product->Deposit}}" min="0" name="Deposit" class="form-control form-control-line">
                                            {!! $errors->first('Deposit', '<p class="text-danger">:message</p>')!!}

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
                                            <input type="text" name="Material" value="{{$product->Specification->Material}}" class="form-control form-control-line" >
                                            {!! $errors->first('Material', '<p class="text-danger">:message</p>')!!}

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group row">

                                        <label class="control-label text-right col-md-3">Đường kính mặt :</label>

                                        <div class="col-md-9">
                                            <input type="text" name="Face_diameter" value="{{$product->Specification->Face_diameter}}" class="form-control form-control-line" >
                                            {!! $errors->first('Face_diameter', '<p class="text-danger">:message</p>')!!}

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
                                            <input type="text" name="Type" value="{{$product->Specification->Type}}" class="form-control form-control-line" >
                                            {!! $errors->first('Type', '<p class="text-danger">:message</p>')!!}

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group row">

                                        <label class="control-label text-right col-md-3">Chất liệu khung viền :</label>

                                        <div class="col-md-9">
                                            <input type="text" value="{{$product->Specification->Frame}}" name="Frame" class="form-control form-control-line" >
                                            {!! $errors->first('Frame', '<p class="text-danger">:message</p>')!!}

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
                                            <input value=" {{$product->Specification->Case_diameter}}" type="text" name="Case_diameter" class="form-control form-control-line" >
                                            {!! $errors->first('Case_diameter', '<p class="text-danger">:message</p>')!!}

                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group row">

                                        <label class="control-label text-right col-md-3">Chất liệu dây :</label>

                                        <div class="col-md-9">
                                            <input type="text" value="{{$product->Specification->Wire_Material}}" name="Wire_Material" class="form-control form-control-line" >
                                            {!! $errors->first('Wire_Material', '<p class="text-danger">:message</p>')!!}

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
                                        <input type="text" value="{{$product->Specification->Wire_Width}}" name="Wire_Width" class="form-control form-control-line" >
                                        {!! $errors->first('Wire_Width', '<p class="text-danger">:message</p>')!!}

                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group row">

                                    <label class="control-label text-right col-md-3">Chống nước :</label>

                                    <div class="col-md-9">
                                        <input type="text"  value="{{$product->Specification->Waterproof}}" name="Waterproof" class="form-control form-control-line" >
                                        {!! $errors->first('Waterproof', '<p class="text-danger">:message</p>')!!}

                                    </div>

                                </div>

                            </div>


                        </div>
                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group row">

                                    <label class="control-label text-right col-md-3">Nguốn năng lượng :</label>

                                    <div class="col-md-9">
                                        <input type="text" value="{{$product->Specification->Energy_Sources}}" name="Energy_Sources" class="form-control form-control-line" >
                                        {!! $errors->first('Energy_Sources', '<p class="text-danger">:message</p>')!!}

                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group row">

                                    <label class="control-label text-right col-md-3">Thời gian sử dụng pin :</label>

                                    <div class="col-md-9">
                                        <input type="text" value="{{$product->Specification->Battery_life_time}}" name="Battery_life_time" class="form-control form-control-line" >
                                        {!! $errors->first('Battery_life_time', '<p class="text-danger">:message</p>')!!}

                                    </div>

                                </div>

                            </div>


                        </div>
                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group row">

                                    <label class="control-label text-right col-md-3">Đối tượng sử dụng :</label>

                                    <div class="col-md-9">
                                        <input type="text" value="{{$product->Specification->User_Object}}" name="User_Object" class="form-control form-control-line" >
                                        {!! $errors->first('User_Object', '<p class="text-danger">:message</p>')!!}


                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group row">

                                    <label class="control-label text-right col-md-3">Thương hiệu :</label>

                                    <div class="col-md-9">
                                        <input type="text" value="{{$product->Specification->Trademark}}" name="Trademark" class="form-control form-control-line" >
                                        {!! $errors->first('Trademark', '<p class="text-danger">:message</p>')!!}

                                    </div>

                                </div>

                            </div>


                        </div>

                        <div class="form-group">

                            <label>Phương thức đặt hàng:</label>

                            <textarea name='order_guide' id="text" cols="30" rows="10">{{$product->order_guide}}</textarea>
                        </div>

                        <h3 class="box-title">Hình ảnh</h3>

                        <hr class="m-t-0 m-b-40">

                        <div class="row">

                            <div class="col-md-12">

                                <label>File upload</label>

                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">

                                    <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>

                                            <input type="hidden">

                                            <input type="hidden"><input type="file" multiple name="images[]"> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>

                            </div>

                        </div>


                        <div class="form-actions">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="row">

                                        <div class="col-md-offset-3 col-md-9">

                                            <button type="submit" class="btn btn-info"><i class="fa fa-pencil"></i> Edit
                                            </button>

                                            <button type="button" class="btn btn-inverse">Cancel</button>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-6"></div>

                            </div>

                        </div>

                    {!! Form::close() !!}

                </div>

            </div>

        </div>

    </div>
@endsection
@section('extra_scripts')
    <script src={{ url('ckeditor/ckeditor.js') }}></script>
    <script>
        CKEDITOR.replace( 'text', {
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

        } );
    </script>
    @include('ckfinder::setup')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>


        $('#add').click(function () {
            $('#input').append('<div class="form-group">' +
                '<input placeholder="Nhập quà kèm theo" class="form-control col-lg-11" name="Gift[]" type="text">' +
                '<button class="border border border-danger rounded bg-transparent text-danger float-right mx-auto" id="remove" type="button" onclick="remove(this)">X</button>'+
                '</div>')
        })
        function remove(a) {
            a.parentNode.remove();
        }
    </script>

@endsection

