{{-- success message --}}
@if (Session::has('success'))
    <script>
        $(document).ready(()=> {
            $('#addNewAppModal').modal('show');
        });
        $('.page-content-wrapper').pgNotification({
            style: 'flip',
            message: '{{ Session::get('success') }}',
            position: 'top-right',
            timeout: 0,
            type: 'success'
        }).show();
    </script>
@endif
{{-- info message --}}
@if (Session::has('info'))
    <script>
        $(document).ready(()=> {
            $('#addNewAppModal').modal('show');
        });
        $('.page-content-wrapper').pgNotification({
            style: 'flip',
            message: '{{ Session::get('info') }}',
            position: 'top-right',
            timeout: 0,
            type: 'info'
        }).show();
    </script>
@endif
{{-- warning message --}}
@if (Session::has('warning'))
    <script>
        $(document).ready(()=> {
            $('#addNewAppModal').modal('show');
        });
        $('.page-content-wrapper').pgNotification({
            style: 'flip',
            message: '{{ Session::get('warning') }}',
            position: 'top-right',
            timeout: 0,
            type: 'info'
        }).show();
    </script>
@endif

@if ($errors->any())
    <script>
        $(document).ready(()=> {
            $('#addNewAppModal').modal('show');
        });
    </script>
@endif
