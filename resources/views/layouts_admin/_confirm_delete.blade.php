<script type="text/javascript">
    function confirmDelete(event, element) {
        event.preventDefault();
        Swal.fire({
            title: '@lang('layouts_admin.confirm_delete.title')',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1e88e5',
            cancelButtonColor: '#fc4b6c',
            confirmButtonText: '@lang('layouts_admin.confirm_delete.button_confirm')',
            cancelButtonText: '@lang('layouts_admin.confirm_delete.button_cancel')',
        }).then((result) => {
            if (result.value) {
                $(element).parent('form').submit();
            }
        })
    }
    function confirmUpdate(event, element) {
        event.preventDefault();
        Swal.fire({
            title: 'Bạn có muốn cập nhật trạng thái ?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1e88e5',
            cancelButtonColor: '#fc4b6c',
            confirmButtonText: '@lang('layouts_admin.confirm_delete.button_confirm')',
            cancelButtonText: '@lang('layouts_admin.confirm_delete.button_cancel')',
        }).then((result) => {
            if (result.value) {
                $(element).parent('form').submit();
            }
        })
    }
</script>
