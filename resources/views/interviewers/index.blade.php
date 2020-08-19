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
                        <th>@lang('validation.attributes.avatar')</th>
                        <th>@lang('validation.attributes.name')</th>
                        <th>@lang('validation.attributes.email')</th>
                        <th>@lang('validation.attributes.content')</th>
                        <th class="col-action">@lang('validation.attributes.action')</th>
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
                ajax: '{{ route('interviewers.index') }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'avatar', name: 'avatar',width:"7%",render: function (dataField) { return '<img style="width: 50px; height: 50px; border-radius: 50px;display:block; margin:0 auto; text-align: center"  src="/storage/avatars/'+dataField+'"></img>';}},
                    {data: 'name', name: 'name'},
                    {data: 'address', name: 'address'},
                    {data: 'content', name: 'content'},
                    {data:'action', name:'action'}
                ],
                order: [[1, 'asc']], // column Name
                pageLength: 10,
                columnDefs: [
                    { "width": "5%", "targets": 'content' }
                ]
            };
            let buttonOptions = {
                dom: 'Bfrtip',
                buttons: [
                    {
                        text: 'New',
                        className: 'btn-new',
                        action: function () {
                            window.location.href = '{{ route('interviewers.create') }}';
                        },
                    },
                    datatablesExport('Interviewers ' + moment().format('YYYYMMDDhhmmss'), 'Interviewers_' + moment().format('YYYYMMDDhhmmss')),
                    datatablesColumnVisibility(),
                ],
            };

            let options = Object.assign({}, datatablesOptions(), columnOptions,buttonOptions, datatablesLanguage());
            let table = $('.data-table').DataTable(options);
            $('#filterSelect').change(function () {
                table.search(this.value).draw();
            })
        });


    </script>
@endsection
