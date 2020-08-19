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
                        <th>@lang('validation.attributes.page_name')</th>
                        <th>@lang('validation.attributes.big_banner')</th>
                        <th>Review</th>
                        <th>Tên Sự kiện</th>
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
                ajax: '{{ route('pages.index') }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'page_name', name: 'page_name', width:'7%'},
                    {data: 'big_banner', name: 'big_banner',defaultContent: "<i>Not set</i>", render: function (dataField) {
                        if(dataField === null){
                            return ''
                        }
                        else{
                            return  (dataField.match(/[^/]+(jpg|jpeg|png|gif)$/))? '<img style="width: 200px; height: 200px; border-radius: 5px;display:block; margin:0 auto; text-align: center"  src="/page/storage/'+dataField+'"></img>'  :  $("<div/>").html(dataField).text();
                        }}},
                    {data: 'url',name: 'url',render: function(dataField){
                        return '<a href="/page/'+dataField+'"  class="btn btn-primary w-100"><span><i class="mdi mdi-eye"></i></span></a>'
                    }},
                    {data: 'discount.title', name: 'discount.title',width: '10%',defaultContent: "<i>Not set</i>"},
                    {data: 'action', name: 'action',width: '10%'},
                ],
                order: [[1, 'asc']], // column Name
                pageLength: 5,
                searching:false,
            };
            let buttonOptions = {
                dom: 'Bfrtip',
                buttons: [],
            };
            let options = Object.assign({}, datatablesOptions(), columnOptions,buttonOptions, datatablesLanguage());
            let table = $('.data-table').DataTable(options);
            $('#filterSelect').change(function () {
                table.search(this.value).draw();
            })
        });
    </script>
@endsection