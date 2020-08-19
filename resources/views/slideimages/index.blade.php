@extends('layouts_admin.admin')
@section('content')
    @include('layouts_admin._breadcrumbs')
    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <div class="form-group row">

                    <label for="example-month-input" class="col-2 col-form-label">Select</label>

                    <div class="col-10">

                        <select class="custom-select col-12" id="filterSelect">

                            <option selected="">Choose...</option>

                            @foreach($options as $option)

                                <option value="{{$option->page_name}}">Page {{$option->page_name}}</option>

                            @endforeach

                        </select>

                    </div>

                </div>
                <table class="table table-hover table-bordered row-border data-table" style="width: 100%;">
                    <thead>
                    <tr style="background: #455A64">
                        <th>@lang('validation.attributes.row_index')</th>
                        <th>@lang('validation.attributes.images')</th>
                        <th>@lang('validation.attributes.page_name')</th>
                        <th>@lang('validation.attributes.action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

@section('extra_scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            let columnOptions = {
                ajax: '{{ route('slide-images.index') }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'images', name: 'images', render: function (dataField) { return '<img style="width: 200px; height: 200px; border-radius: 5px;display:block; margin:0 auto; text-align: center"  src="/page/storage/'+dataField+'"></img>';}},
                    {data: 'landing_page_via_images.page_name', name: 'landing_page_via_images.page_name'},
                    {data: 'action', name: 'action'},
                ],
                order: [[1, 'asc']], // column Name
                pageLength: 5,
            };
            let buttonOptions = {
                dom: 'Bfrtip',
                buttons: [
                {
                    text: 'New',
                    className: 'btn-new',
                    action: function () {
                        window.location.href = '{{ route('slide-images.create') }}';
                    },
                }],
            };
            let options = Object.assign({}, datatablesOptions(), columnOptions,buttonOptions, datatablesLanguage());
            let table = $('.data-table').DataTable(options);
            $('#filterSelect').change(function () {
                table.search(this.value).draw();
            })
        });
    </script>
@endsection