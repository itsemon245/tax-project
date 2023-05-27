 <!-- Vendor js -->
 <script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>

 <!-- App js-->
 <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>


@stack('selectizeCDN')
@stack('customJs')
 {{-- sweet alert2 --}}
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 @include('backend.layouts.alert')
