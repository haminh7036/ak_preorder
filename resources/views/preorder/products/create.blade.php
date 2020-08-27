@extends('layouts_admin.admin')
@section('content')
    @include('layouts_admin._breadcrumbs')
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-blue">Thông tin sản phẩm</h2>
            <hr>
            {!! Form::open(['url'=>route('product.store'),'method'=>'POST','enctype'=>"multipart/form-data",'class'=>'form-horizontal']) !!}
            <div class="form-group">
                <select name="preorder_page_id" class="form-control">
                    <option value="" selected disabled>Chọn Preorder Page</option>
                    @foreach($page as $item)
                        <option value="{{$item->id}}">{{$item->name_page}}</option>
                    @endforeach

                </select>
                {!! $errors->first('preorder_page_id', '<p class="text-danger">:message</p>')!!}
            </div>
            <div class="form-group">

                <label>Tên sản phẩm:<span class="help"> e.g. "G-SHOCK MRG-G2000HA-1A"</span></label>

                <input type="text" name="Product_Name" class="form-control form-control-line" >
                {!! $errors->first('Product_Name', '<p class="text-danger">:message</p>')!!}

            </div>
            <div class="form-group">

                <label>Mã sản phẩm: <span class="help"> e.g. "MRG-G2000HA-1A"</span></label>

                <input type="text" name="Product_Code" class="form-control form-control-line">
                {!! $errors->first('Product_Code', '<p class="text-danger">:message</p>')!!}

            </div>
            <div class="form-group">

                <label>Giá sản phẩm:</label>

                <input type="number" name="Price" min="0" class="form-control form-control-line">
                {!! $errors->first('Price', '<p class="text-danger">:message</p>')!!}

            </div>
            <div class="form-group">

                <label>Giá sản phẩm được giảm:</label>

                <input type="number" min="0" name="Reduced_Price" class="form-control form-control-line">
                {!! $errors->first('Reduced_Price', '<p class="text-danger">:message</p>')!!}

            </div>
            <div class="form-group">

                <label>Tiền đặt cọc </label>

                <input type="number" name="Deposit" min="0" class="form-control form-control-line" >
                {!! $errors->first('Deposit', '<p class="text-danger">:message</p>')!!}

            </div>

            <div class="form-group">

                <label>Số lượng sản phẩm:</label>

                <input type="number" min="0" name="Quantity" class="form-control form-control-line">
                {!! $errors->first('Deposit', '<p class="text-danger">:message</p>')!!}
            </div>

            <div class="form-group" id="gift">
                <button class="btn btn-primary" type="button" id="add">
                    Thêm quà kèm theo
                </button>
                <div class="mt-3">
                    <div id="input">
                    </div>
                </div>
            </div>

            <div class="form-group">

                <label class="control-label">Trạng thái</label>

                <select name="status" class="form-control custom-select">
                    <option value="" selected disabled>Chọn trạng thái</option>
                    <option value="0">Active</option>
                    <option value="1">Vô Hiệu Hóa</option>
                </select>
                {!! $errors->first('status', '<p class="text-danger">:message</p>')!!}
            </div>

            <h2 class="card-title text-blue">Thông số kĩ thuật</h2>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label text-right col-md-3">Chất liệu :</label>
                        <div class="col-md-9">
                            <input type="text" name="Material" class="form-control form-control-line" >
                            {!! $errors->first('Material', '<p class="text-danger">:message</p>')!!}

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label text-right col-md-3">Đường kính mặt :</label>
                        <div class="col-md-9">
                            <input type="text" name="Face_diameter" class="form-control form-control-line" >
                            {!! $errors->first('Face_diameter', '<p class="text-danger">:message</p>')!!}

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label text-right col-md-3">Loại máy :</label>
                        <div class="col-md-9">
                            <input type="text" name="Type" class="form-control form-control-line" >
                            {!! $errors->first('Type', '<p class="text-danger">:message</p>')!!}

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label text-right col-md-3">Chất liệu khung viền :</label>
                        <div class="col-md-9">
                            <input type="text" name="Frame" class="form-control form-control-line" >
                            {!! $errors->first('Frame', '<p class="text-danger">:message</p>')!!}

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label text-right col-md-3">Độ dày mặt :</label>
                        <div class="col-md-9">
                            <input type="text" name="Case_diameter" class="form-control form-control-line" >
                            {!! $errors->first('Case_diameter', '<p class="text-danger">:message</p>')!!}

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label text-right col-md-3">Chất liệu dây :</label>
                        <div class="col-md-9">
                            <input type="text" name="Wire_Material" class="form-control form-control-line" >
                            {!! $errors->first('Wire_Material', '<p class="text-danger">:message</p>')!!}

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label text-right col-md-3">Độ rộng giây :</label>
                        <div class="col-md-9">
                            <input type="text" name="Wire_Width" class="form-control form-control-line" >
                            {!! $errors->first('Wire_Width', '<p class="text-danger">:message</p>')!!}

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label text-right col-md-3">Chống nước :</label>
                        <div class="col-md-9">
                            <input type="text" name="Waterproof" class="form-control form-control-line" >
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
                            <input type="text" name="Energy_Sources" class="form-control form-control-line" >
                            {!! $errors->first('Energy_Sources', '<p class="text-danger">:message</p>')!!}

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label text-right col-md-3">Thời gian sử dụng pin :</label>
                        <div class="col-md-9">
                            <input type="text" name="Battery_life_time" class="form-control form-control-line" >
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
                            <input type="text" name="User_Object" class="form-control form-control-line" >
                            {!! $errors->first('User_Object', '<p class="text-danger">:message</p>')!!}

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label text-right col-md-3">Thương hiệu :</label>
                        <div class="col-md-9">
                            <input type="text" name="Trademark" class="form-control form-control-line" >
                            {!! $errors->first('Trademark', '<p class="text-danger">:message</p>')!!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">

                <label>Phương thức đặt hàng:</label>

                <textarea name='order_guide' id="text" cols="30" rows="10"></textarea>
            </div>


            <h2 class="card-title text-blue">Hình ảnh</h2>
            <hr>
            <div class="form-group">

                <label>File upload</label>

                <div class="fileinput fileinput-new input-group" data-provides="fileinput">

                    <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>

                                            <input type="hidden">

                                            <input type="hidden"><input type="file" multiple name="images[]" accept="image/*"> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>

            </div>
            {!! $errors->first('images', '<p class="text-danger">:message</p>')!!}

            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>
            <a href="{{url()->previous()}}" class="btn btn-inverse">Cancel</a>
            {!! Form::close() !!}


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
