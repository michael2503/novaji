@if (Session::get('failed'))
<script>
    Swal.fire({
        type: "error",
        title: "Oops...",
        text: "{{ Session::get('failed') }}",
        confirmButtonColor: "#188ae2",
    });
</script>
@endif

