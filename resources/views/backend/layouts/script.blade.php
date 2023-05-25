 <!-- Vendor js -->
 <script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>

 <!-- App js-->
 <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>


     {{-- Selectize start --}}
     <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
     integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
     crossorigin="anonymous"
     referrerpolicy="no-referrer"
   />
   <script
     src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
     integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
     crossorigin="anonymous"
     referrerpolicy="no-referrer"
   ></script>
   {{-- Selectize end --}}
 {{-- sweet alert2 --}}
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 @stack('customJs')
 @include('backend.layouts.alert')
