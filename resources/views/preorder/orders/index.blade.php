@extends('layouts_admin.admin')
@section('content')
    @include('layouts_admin._breadcrumbs')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-bordered row-border data-table display nowrap" style="width: 100%;">
                <thead>
                <tr style="background: #455A64">
                    <th>@lang('validation.attributes.row_index')</th>
                    <th>Tên</th>
                    <th>Giới tính</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Mã sản phẩm</th>
                    <th>Phương thức thanh toán</th>
                    <th>Tình trạng cọc</th>
                    <th class="col-action">@lang('validation.attributes.action')</th>
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
                ajax: '{{ route('order.index') }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'Name', name: 'Name',defaultContent:'Not Set'},
                    {data: 'Gender', name: 'Gender',render: function (dataField) {
                            return dataField === 1 ? '<i>Nam</i>' : '<i>Nữ</i>'
                    }},
                    {data: 'Phone_Number', name: 'Phone_Number'},
                    {data: 'Address', name: 'Address',defaultContent:'Not Set'},
                    {data: 'product.Product_Code', name:'Product.Product_Code',defaultContent: 'Trống'},
                    {data: 'Payment', name:'Payment',defaultContent: 'Trống'},
                    {data: 'Status', name: 'Status',render: function (dataField) {
                            return dataField === 1 ? '<p class="text-success">Đã Cọc</p>' : '<p class="text-dark">Chưa Cọc</p>'
                        } },
                    {data: 'action', name: 'action'},
                ],
                order: [[1, 'asc']], // column Name
                pageLength: 10,
                scrollX:true,
                scrollY:"500px",
                scrollCollapse: true,
                paging:false,
                searching:true,
            };
            let buttonOptions = {
                dom: 'Bfrtip',
                buttons: [
                    datatablesExport('Order ' + moment().format('YYYYMMDDhhmmss'), 'Order_' + moment().format('YYYYMMDDhhmmss')),
                    datatablesColumnVisibility(),
                ],
            };
            let options = Object.assign({}, datatablesOptions(),buttonOptions, columnOptions, datatablesLanguage());
            let table = $('.data-table').DataTable(options);
        });
    </script>
@endsection
