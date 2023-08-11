 <!-- Vendor js -->
 <script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>

 <!-- App js -->
 <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
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