@extends('layouts_admin.admin')

@section('content')
    @include('layouts_admin._breadcrumbs')

    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-bordered row-border data-table" style="width: 100%;">
                <thead>
                <tr style="background: #455A64">
                    <th>@lang('validation.attributes.row_index')</th>
                    <th>Tên page</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

@endsection
@section('extra_scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            let columnOptions = {
                ajax: '{{ route('pre-order-page.index') }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name_page', name: 'name_page'},
                    {data: 'action', name:'action',width:'5%'}
                ],
                responsive: true,
                order: [[1, 'asc']], // column Name
                pageLength: 10,
            };
            let options = Object.assign({}, datatablesOptions(), columnOptions, datatablesLanguage());
            let table = $('.data-table').DataTable(options);
        });
    </script>
@endsection
