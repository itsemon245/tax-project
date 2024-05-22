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
<script src="{{asset('libs/tail.select.js-1.0.2/js/tail.select.min.js')}}"></script>
<script>
    $(document).ready(function() {
        let tailSelect = tail.select('.tail-select', {
            stayOpen: false,
        })
        document.addEventListener('tail:change', function(item, state){
            console.log('hello');
        })
        document.addEventListener('htmx:load', function(){
            select.reload()
        })
        
        // htmx.onLoad(function(elt) {
        //     console.log(elt);
        // })
    });
</script>
 @stack('customJs')
 {{-- sweet alert2 --}}
 @include('backend.layouts.alert')
