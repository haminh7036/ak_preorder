@extends('layouts_admin.admin')

@section('content')
    @include('layouts_admin._breadcrumbs')

    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-bordered row-border data-table" style="width: 100%;">
                <thead>
                <tr style="background: #455A64">
                    <th>#</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng còn lại</th>
                    <th>Trạng thái</th>
                    <th>@lang('validation.attributes.action')</th>
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
                ajax: '{{ route('product.index') }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data:'Product_Name', name:'Product_Name'},
                    {data:'Quantity', name:'Quantity'},
                    {data:'status', name: 'status', render: function (dataField) {
                        return dataField === 0 ? '<p class="text-success">Đang hiệu lực</p>' : '<p class="text-dark">Đang vô hiệu hóa</p>'
                    }},
                    {data: 'action', name: 'action',width:'15%'},
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
                            window.location.href = '{{ route('product.create') }}';
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



