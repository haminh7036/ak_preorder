@extends('layouts_admin.admin')
@section('content')
    @include('layouts_admin._breadcrumbs')
    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-bordered row-border data-table" style="width: 100%;">
                    <thead>
                    <tr style="background: #455A64">
                        <th>@lang('validation.attributes.row_index')</th>
                        <th>Tên page</th>
                        <th>Người nổi tiếng</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="card">



        <button class="btn btn-primary float-left" id="add">
            Thêm người nổi tiếng
        </button>

        <div class="card-body">
            {!! Form::open(['url'=>route('celebrity.store'), 'method'=>'POST','class'=>'form-material mt-4']) !!}

            <div class="form-group row">

                <label for="example-month-input" class="col-2 col-form-label">Thuộc về Landing Page *</label>

                <div class="col-10">

                    <select name="landing_page" class="custom-select col-12">

                        <option selected="" disabled>Choose...</option>

                        @foreach($options as $option)

                            <option value="{{$option->id}}">Page {{$option->page_name}}</option>

                        @endforeach

                    </select>

                </div>

            </div>
            {!! $errors->first('landing_page', '<p class="text-danger">Vui lòng chọn Landing Page</p>') !!}
            {!! $errors->first('name', '<p class="text-danger">Vui lòng nhập ít nhất 1 nhân vật nổi tiếng</p>') !!}

            <div id="input">
            </div>

            {!! Form::submit(__('validation.buttons.create'), ['class' => 'btn btn-success float-right']) !!}
            {!! Form::close() !!}
        </div>

    </div>
@endsection

@section('extra_scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            let columnOptions = {
                ajax: '{{ route('celebrity.index') }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'page_name', name: 'page_name'},
                    {data: 'influencers', name:'influencers',render: function(dataField) {
                        return  dataField ?'<i>'+dataField.name+'</i>': '<i>NULL</i>'
                        }},
                ],
                responsive: true,
                order: [[1, 'asc']], // column Name
                pageLength: 10,
            };
            let options = Object.assign({}, datatablesOptions(), columnOptions, datatablesLanguage());
            let table = $('.data-table').DataTable(options);
        });


    </script>
    <script>


        $('#add').click(function () {
            $('#input').append('<div class="form-group">' +
                '<label class="col-form-label" for="name">Tên người nổi tiếng</label>' +
                '<input placeholder="Nhập tên người nổi tiếng" class="form-control col-lg-11" name="name[]" type="text">' +
                '<button class="border border border-danger rounded bg-transparent text-danger float-right mx-auto" id="remove" type="button" onclick="remove(this)">X</button>'+
                '</div>')
        })
        function remove(a) {
            a.parentNode.remove();
        }
    </script>


@endsection

