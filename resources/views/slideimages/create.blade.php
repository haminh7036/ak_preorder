@extends('layouts_admin.admin')
@section('content')
    @include('layouts_admin._breadcrumbs')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['url' => route('store_images_slide'),'method'=>'POST','enctype'=>"multipart/form-data"]) !!}

            <div class="form-group row">
                <div class="col-lg-2">
                    <label for="Images">Images</label>
                </div>
                <div class="col-lg-10">
                    <input type="file" name="images[]" multiple>
                </div>
                <div class="col-lg-12">
                    {!! $errors->first('images', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
            <div class="form-group">
                <select class="form-control" name="landing_page" id="landingPage">
                    <option value="" selected disabled>Chọn thuộc Landing Page</option>
                    @foreach($options as $option)
                        <option value="{{$option->id}}">{{$option->page_name}}</option>
                    @endforeach
                </select>
                {!! $errors->first('landing_page', '<p class="text-danger">Landing Page field is required</p>') !!}

            </div>

            {!! Form::submit(__('validation.buttons.create'), ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection

