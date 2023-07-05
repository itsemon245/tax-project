<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter',
                Swal
                .stopTimer)
            toast.addEventListener('mouseleave',
                Swal
                .resumeTimer)
        }
    })

    if ("{{ Session::has('message') }}") {
        Toast.fire({
            icon: "{{ Session::get('alert-type') }}",
            title: "{{ Session::get('message') }}"
        })
    }
</script>