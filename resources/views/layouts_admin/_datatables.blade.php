<script type="text/javascript">
    function datatablesOptions(title, filename) {
        return {
            // scroll
            scrollY: false,
            scrollX: true,
            scrollCollapse: true,

            // server side processing
            processing: true,
            serverSide: true,
        };
    }

    function datatablesExport(title, filename) {
        return {
            extend: 'collection',
            text: '@lang('datatables.export')',
            autoClose: true,
            buttons: [
                {
                    extend: 'csvHtml5',
                    filename: filename,
                    charset: 'UTF-8',
                    fieldSeparator: ';',
                    bom: true,
                },
                {
                    extend: 'excelHtml5',
                    filename: filename,
                    sheetName: title,
                    title: title,
                },
                {
                    extend: 'pdfHtml5',
                    filename: filename,
                    title: title,
                },
                {
                    extend: 'print',
                    text: '@lang('datatables.print')',
                    title: title,
                },
            ],
        };
    }

    function datatablesColumnVisibility() {
        return {
            extend: 'colvis',
            text: '@lang('datatables.columnVisibility')',
        };
    }

    function datatablesLanguage() {
        return {
            language: {
                decimal: '@lang('datatables.decimal')',
                emptyTable: '@lang('datatables.emptyTable')',
                info: '@lang('datatables.info')',
                infoEmpty: '@lang('datatables.infoEmpty')',
                infoFiltered: '@lang('datatables.infoFiltered')',
                infoPostFix: '@lang('datatables.infoPostFix')',
                thousands: '@lang('datatables.thousands')',
                lengthMenu: '@lang('datatables.lengthMenu')',
                loadingRecords: '@lang('datatables.loadingRecords')',
                processing: '@lang('datatables.processing')',
                search: '@lang('datatables.search')',
                zeroRecords: '@lang('datatables.zeroRecords')',
                paginate: {
                    first: '@lang('datatables.paginate.first')',
                    last: '@lang('datatables.paginate.last')',
                    next: '@lang('datatables.paginate.next')',
                    previous: '@lang('datatables.paginate.previous')',
                },
                aria: {
                    sortAscending: '@lang('datatables.aria.sortAscending')',
                    sortDescending: '@lang('datatables.aria.sortDescending')',
                }
            }
        };
    }
</script>
