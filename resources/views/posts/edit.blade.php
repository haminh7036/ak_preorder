@extends('layouts_admin.admin')
@section('content')
    @include('layouts_admin._breadcrumbs')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['url'=>route('posts.update',$post->id), 'method'=>'PATCH','class'=>'form-material m-t-40','enctype'=>"multipart/form-data"]) !!}
            <div class="row">
                <label class="col-2 col-form-label">Icon</label>
                <select id="icon" name="icon" data-show-content="true" class="form-control col-10 selectpicker">
                </select>
                {!! $errors->first('icon', '<p class="text-danger">:message</p>') !!}

            </div>

            <br>
            <div class="form-group">

                <label> @lang('validation.attributes.name') </label>

                <textarea type="text" name="title" class="form-control form-control-line">{{$post->title}}</textarea>
            {!! $errors->first('title', '<p class="text-danger">:message</p>') !!}

            </div>


            <div class="form-group">
                <label>@lang('validation.attributes.content')</label>
                <textarea name="content" class="form-control" rows="5">{{$post->content}}</textarea>
                {!! $errors->first('content', '<p class="text-danger">:message</p>') !!}
            </div>


            <div class="form-group">
                <label class="col-2 col-form-label">Media</label>
                <input type="file" name="img">

            </div>

            <div class="form-group row">

                <label class="col-2 col-form-label">Vị trí</label>

                <div class="col-10">

                    <select name="position" class="form-control">

                        @foreach(array_keys($position) as $item)

                            <option value="{{$item}}">{{$item}}</option>

                        @endforeach

                    </select>

                </div>
                {!! $errors->first('position', '<p class="text-danger">:message </p>') !!}

            </div>
            <div class="form-group row">

                <label class="col-2 col-form-label">Trang*</label>

                <div class="col-10">

                    <select name="landing_page_id" class="form-control">

                        @foreach($landing_page as $item)

                            <option value="{{$item->id}}">{{$item->page_name}}</option>

                        @endforeach

                    </select>

                </div>
                {!! $errors->first('landing_page_id', '<p class="text-danger">:message </p>') !!}

            </div>


            <div class="form-group">

                <div class="col-sm-12">

                    <button class="btn btn-success float-right ">Cập nhật nội dung</button>

                </div>

            </div>
            {!! Form::close() !!}
            </form>
        </div>
    </div>

@endsection
@section('extra_scripts')
    <script src="{{ asset('js/iconlist.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        list.forEach(function (e, value) {
            $('#icon').append(`<option data-content="<i class='${e}' ></i>" value="${e}" >
                                  </option>`);
        })
    </script>
@endsection
