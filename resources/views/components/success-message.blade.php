@if (Session::get('cardsuccess'))
<script>
    Swal.fire({
        title: "Card Added",
        text: "{{ Session::get('success') }}",
        type: "success",
        confirmButtonColor: "#E4AA3D",
    });
</script>
@elseif (Session::get('success'))
<script>
    Swal.fire({
        title: "Sucessful!",
        text: "{{ Session::get('success') }}",
        type: "success",
        confirmButtonColor: "#E4AA3D",
    });
</script>
@endif
