@extends('layouts_admin.admin')
@section('content')
    @include('layouts_admin._breadcrumbs')

    <div class="card div card-body">
        <div class="form-group row">

            <label for="example-month-input" class="col-2 col-form-label">Select</label>

            <div class="col-10">

                <select class="custom-select col-12" id="select1" onchange="setForm(this.value)">

                    <option value="form1">Hình Ảnh</option>
                    <option value="form2">Iframe</option>
                </select>

            </div>

        </div>
        <hr>
        {!! Form::open(['id'=>'form1','url' => route('pages.update',$id),'method'=>'PATCH','enctype'=>"multipart/form-data"]) !!}
        <div class="form-group row">

            <label for="example-month-input" class="col-2 col-form-label">Sự kiện</label>

            <div class="col-10">
                <select name="discount_id" class="custom-select col-12">
                    @if(!empty($data->discount))
                        <option value="">Chọn sự kiện</option>
                        @foreach($data->discount as $item)
                            <option value="{{$item->did}}">{{$item->title}}</option>
                        @endforeach
                    @else
                        <option value="" disabled selected>Hiện không có sự kiện nào active</option>
                    @endif
                </select>
                {!! $errors->first('discount_id', '<p class="text-danger">Vui lòng chọn sự kiện</p>') !!}

            </div>
        </div>
        <div class="form-group">

            <label>Keywords :</label>
            <input class="form-control" type="text" value="{{$data->keywords}}" name="keywords">

        </div>
        <div class="form-group">

            <label>Title :</label>
            <input class="form-control" type="text" value="{{$data->title}}" name="title">

        </div
        ><div class="form-group">

            <label>Description :</label>
            <input class="form-control" type="text" value="{{$data->description}}" name="description">

        </div>

        <label for="big_banner" class="col-sm-12 col-form-label">
            @lang('validation.attributes.big_banner')
            <span class="text-danger"> *</span>
        </label>
        <div class="col-sm-12" id="big-banner">
            {!! $errors->first('big_banner', '<p class="text-danger">Vui lòng chọn nhập thông tin của Banner chính</p>') !!}
        </div>

        <br>
        {!! Form::submit(__('validation.buttons.update'), ['class' => 'btn btn-success float-right  ']) !!}
        {!! Form::close() !!}
    </div>

    <br>
    <br>
    <br>
    <img id="output" src="{{asset('storage/'.$data->big_banner)}}" width="750px" height="750px">
@endsection

@section('extra_scripts')


    <script type="text/javascript">
        let a = '<input id="big_banner_form_1" name="big_banner" type="file" accept="image/*" onchange="document.getElementById(\'output\').src = window.URL.createObjectURL(this.files[0])">'
        let htmlObject = document.createElement('div');
        htmlObject.innerHTML = a;
        document.getElementById('big-banner').append(htmlObject);
        const setForm = (value) => {
            if (value == 'form1') {
                let a = '<input id="big_banner_form_1" name="big_banner" type="file" accept="image/*" onchange="document.getElementById(\'output\').src = window.URL.createObjectURL(this.files[0])">'
                let htmlObject = document.createElement('div');
                htmlObject.innerHTML = a;
                document.getElementById('big-banner').append(htmlObject);
                document.getElementById('big_banner_form_2').remove();

            } else {
                let a = '<input id="big_banner_form_2" name="big_banner" class="form-control" type="text">'
                let htmlObject = document.createElement('div');
                htmlObject.innerHTML = a;
                document.getElementById('big-banner').append(htmlObject);
                document.getElementById('big_banner_form_1').remove();
            }

        }

    </script>

@endsection
