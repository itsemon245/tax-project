 <!-- Vendor js -->
 <script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>

 <!-- Plugins js-->
 <script src="{{ asset('backend/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
 <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

 <script src="{{ asset('backend/assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>





 <!-- Dashboard 1 init js-->
 <script src="{{ asset('backend/assets/js/pages/dashboard-1.init.js') }}"></script>
 <!-- TextArea -->
 <script src="{{ asset('backend/assets/libs/quill/quill.min.js') }}"></script>

 <script src="{{ asset('backend/assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>
 <!-- App js-->
 <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>
 {{-- toaster js  --}}
 <script src="{{ asset('backend/assets/js/toastr.min.js') }}"></script>

 <script src="{{ asset('backend/assets/js/instandphotochange.js') }}"></script>
 {{-- sweet alert2 --}}
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 @include('backend.layouts.alert')
 @stack('customJs')
