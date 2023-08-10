 <!-- Vendor js -->
 <script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>

 <!-- App js-->
 <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>

 {{-- fix for dropdown --}}
 <script>
     $(document).ready(function() {
         $('.dropdown-toggle').each(function(i, toggle) {
             $(toggle).click(function(e) {
                 $(toggle).parent().find('.dropdown-menu').toggle()
             })
         })
     });
 </script>


 @stack('selectizeCDN')
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 @stack('customJs')
 {{-- sweet alert2 --}}
 @include('backend.layouts.alert')
