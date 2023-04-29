 <!-- Vendor js -->
 <script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>

 <!-- Plugins js-->
 <script src="{{ asset('backend/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
 <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

 <script src="{{ asset('backend/assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>

 <!-- Dashboar 1 init js-->
 <script src="{{ asset('backend/assets/js/pages/dashboard-1.init.js') }}"></script>

 <!-- App js-->
 <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>
 {{-- toaster js  --}}
 <script src="{{ asset('backend/assets/js/toastr.min.js') }}"></script>
@include('backend.layouts.alert')
 @stack('customJs')
