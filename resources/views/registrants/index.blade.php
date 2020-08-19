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
                        <th>@lang('validation.attributes.name')</th>
                        <th>@lang('validation.attributes.email')</th>
                        <th>@lang('validation.attributes.phone')</th>
                        <th>@lang('validation.attributes.content')</th>
                        <th>Lựa chọn</th>
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
                ajax: '{{ route('registrants.index') }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'content.content', name: 'content.content'},
                    {data: 'content.options', name: 'content.options'},
                    {data: 'action', name:'action'}
                ],
                order: [[1, 'asc']], // column Name
                pageLength: 10,
            };
            let buttonOptions = {
                dom: 'Bfrtip',
                buttons: [
                    datatablesExport('Members ' + moment().format('YYYYMMDDhhmmss'), 'Members_' + moment().format('YYYYMMDDhhmmss')),
                    datatablesColumnVisibility(),
                ],
            };
            let options = Object.assign({}, datatablesOptions(), columnOptions,buttonOptions, datatablesLanguage());
            $('.data-table').DataTable(options);
        });
    </script>
@endsection
