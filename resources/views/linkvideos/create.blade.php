@extends('layouts_admin.admin')
@section('content')
    @include('layouts_admin._breadcrumbs')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['url'=>route('link-videos.store'), 'method'=>'POST','class'=>'form-material m-t-40' ]) !!}

            <div class="form-group">
                <select name="landing_page_id" class="form-control" id="landingPage">
                    <option value="" selected disabled>Chọn những video thuộc Landing Page</option>
                    @foreach($options as $option)

                        <option value="{{$option->id}}">{{$option->page_name}}</option>

                    @endforeach

                </select>
                {!! $errors->first('landing_page_id', '<p class="text-danger">Vui lòng chọn Landing Page</p>') !!}

            </div>

            <div class="form-group row">

                <label class="col-2 col-form-label">Link Nhúng(Iframe)</label>

                <div class="col-10">

                    {!! Form::text('url',null,['class'=>'form-control']) !!}


                </div>

            </div>
            {!! $errors->first('url', '<p class="text-danger">Vui lòng nhập Video nhúng</p>') !!}
            {!! Form::submit(__('validation.buttons.create'), ['class' => 'btn btn-success float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
