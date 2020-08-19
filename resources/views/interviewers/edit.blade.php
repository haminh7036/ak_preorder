@extends('layouts_admin.admin')
@section('content')
    @include('layouts_admin._breadcrumbs')
    <div class="card">
        <div class="card-body">
            <form class="form-material m-t-40" method="post" action="{{route('update_interview',[$interviewer->id])}}" enctype="multipart/form-data" >
                {{csrf_field()}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">

                    <label>File upload</label>

                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">

                        <input type="file" name="avatar">

                    </div>
                    <div class="form-group">

                        <label> @lang('validation.attributes.name') </label>

                        <input type="text" name="name" class="form-control form-control-line" value="{{$interviewer->name}}"> </div>

                    <div class="form-group">

                        <label for="example-email">@lang('validation.attributes.address')</label>
                        <input type="text" name="address" class="form-control form-control-line" value="{{$interviewer->address}}"> </div>


                    <div class="form-group">
                        <label>@lang('validation.attributes.content')</label>
                        <textarea name="content" class="form-control" rows="5" >{{$interviewer->content}}</textarea>

                    </div>

                    <div class="form-group">

                        <div class="col-sm-12">

                            <button class="btn btn-success float-right ">@lang('component.button.interview')</button>

                        </div>

                    </div>

            </form>
        </div>
    </div>
@endsection
