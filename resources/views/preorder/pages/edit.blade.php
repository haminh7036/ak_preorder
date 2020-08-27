@extends('layouts_admin.admin')
@section('content')
    @include('layouts_admin._breadcrumbs')

    <div class="card">
        <div class="card-body">

            {!! Form::open(['class'=>'form-horizontal','method'=>'PATCH','url'=>route('pre-order-page.update',$page->id), 'enctype'=>"multipart/form-data"]) !!}

                <div class="form-group">

                    <label>Tên trang:</label>

                    <input type="text" name="name_page" value="{{$page->name_page}}" class="form-control form-control-line" >
                </div>
            <div class="form-group">

                <label>Keywords :</label>
                <input class="form-control" type="text" value="{{$page->keywords}}" name="keywords">

            </div>
            <div class="form-group">

                <label>Title :</label>
                <input class="form-control" type="text" value="{{$page->title}}" name="title">

            </div
            ><div class="form-group">

                <label>Description :</label>
                <input class="form-control" type="text" value="{{$page->description}}" name="description">

            </div>
            <div class="form-group">

                <label>Big Banner :</label>
                <input class='form-group' type="file" name="big_banner">


            </div>
            <div class="form-group">

                <label>Title 1:</label>
                <input class="form-control" type="text" value="{{$page->title1}}" name="title1">

            </div>
            
            <div class="form-group">

                <label>Title 2:</label>
                <input class="form-control" type="text" value="{{$page->title2}}" name="title2">

            </div>
            
            <div class="form-group">

                <label>Title 3:</label>
                <input class="form-control" type="text" value="{{$page->title3}}" name="title3">

            </div>
            
            <div class="form-group">

                <label>Title 4:</label>
                <input class="form-control" type="text" value="{{$page->title4}}" name="title4">

            </div>
                
            <div class="form-group">

                <label>Tên trang:</label>

                <textarea name=bodyhtml id="text" cols="30" rows="10">{{$page->bodyhtml}}</textarea>
            </div>

            <div class="form-group">

                <label>Iframe:</label>
                <input class="form-control" type="text" value="{{$page->iframe}}" name="iframe">

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
@endsection
