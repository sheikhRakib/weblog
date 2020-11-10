@if($errors->any())
<script type="text/javascript">
    $(document).ready(function () {
        @foreach($errors->all() as $error)
        toastr.error("{{ $error }}");
        @endforeach
    });
</script>
@endif

@if (session('success'))
<script type="text/javascript">
    $(document).ready(function () {
        toastr.success("{{ session('success') }}");
    });

</script>
@endif

@if (session('error'))
<script type="text/javascript">
    $(document).ready(function () {
        toastr.error("{{ session('error') }}");
    });

</script>
@endif