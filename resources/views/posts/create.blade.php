@extends('layouts_admin.admin')
@section('content')
    @include('layouts_admin._breadcrumbs')
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            {!! Form::open(['url'=>route('posts.store'), 'method'=>'POST','class'=>'form-material m-t-40','enctype'=>"multipart/form-data"]) !!}
            <div class="row">
                <label class="col-2 col-form-label">Icon</label>
                <select id="icon" name="icon" data-show-content="true" class="form-control col-10 selectpicker">
                    <option value="" selected disabled> Chọn Icon cho thông tin </option>
                </select>
            </div>

            <div class="form-group row my-2">

                <label class="col-2 col-form-label">Tựa đề</label>

                <div class="col-10">

                    {!! Form::textarea('title',null,['class'=>'form-control', 'rows'=>3]) !!}
                    {!! $errors->first('title', '<p class="text-danger">Vui lòng nhập tựa đề</p>') !!}
                </div>

            </div>
            <div class="form-group row">

                <label class="col-2 col-form-label">Nội Dung</label>

                <div class="col-10">

                    {!! Form::textarea('content',null,['class'=>'form-control']) !!}

                    {!! $errors->first('content', '<p class="text-danger">Vui lòng nhập nội dung</p>') !!}

                </div>

            </div>
            <div class="form-group row">

                <label class="col-2 col-form-label">Hình ảnh</label>

                <div class="col-10">

                    {!! Form::file('img',null,['class'=>'form-control']) !!}

                </div>

            </div>
            <div class="form-group row">

                <label class="col-2 col-form-label">Vị trí</label>

                <div class="col-10">

                    <select name="position" class="form-control">
                        <option value="" selected disabled> Vị trí của thông tin </option>
                        @foreach(array_keys($position) as $item)

                            <option value="{{$item}}">{{$item}}</option>

                        @endforeach

                    </select>
                    {!! $errors->first('position', '<p class="text-danger">Vui lòng chọn vị trí</p>') !!}

                </div>

            </div>
            <div class="form-group row">

                <label class="col-2 col-form-label">Trang*</label>

                <div class="col-10">

                    <select name="landing_page_id" class="form-control">
                        <option value="" selected disabled>Thông tin thuộc trang</option>
                        @foreach($landing_page as $item)

                            <option value="{{$item->id}}">{{$item->page_name}}</option>

                        @endforeach

                    </select>
                    {!! $errors->first('landing_page_id', '<p class="text-danger">Vui lòng chọn Landing Page</p>') !!}
                </div>

            </div>

            {!! Form::submit(__('validation.buttons.create'), ['class' => 'btn btn-success float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <script src="{{ asset('js/iconlist.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        list.forEach(function(e,value) {
            $('#icon').append(`<option data-content="<i class='${e}' ></i>" value="${e}" >
                                  </option>`);
        })
    </script>
@endsection



