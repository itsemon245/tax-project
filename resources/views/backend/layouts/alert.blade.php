<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
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
    

    $(document).ready(function() {
        if ("{{ request()->session()->has('message') }}") {
            Toast.fire({
                icon: "{{ request()->session()->get('alert-type') }}",
                title: "{{ str(request()->session()->get('alert-type'))->title() }}",
                text: "{{ request()->session()->get('message') }}"
            })
        }
    });
</script>
