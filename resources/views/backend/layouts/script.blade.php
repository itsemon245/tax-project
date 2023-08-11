 <!-- Vendor js -->
 <script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>

 <!-- App js-->
 <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>


 @stack('selectizeCDN')
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('customJs')
 {{-- sweet alert2 --}}
 @include('backend.layouts.alert')
