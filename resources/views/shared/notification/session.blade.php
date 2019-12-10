<script>
    @if(count($errors) > 0)
        $.notify('Something wrong \n Check the errors below the page ', 'error');
    @endif

    @if(Session::has('message'))
    $.notify('{{ Session::get('message') }}', '{{ Session::get('alert-class') }}');
    @endif
</script>