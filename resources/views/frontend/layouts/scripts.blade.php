{{-- vendor JS  --}}
<script src="{{ asset('frontend/assets/js/vendor.min.js') }}"></script>
{{-- app JS  --}}
<script src="{{ asset('frontend/assets/js/app.min.js') }}"></script>
{{-- sweet alert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@stack('selectizeCDN')

@include('frontend.layouts.alert')
@stack('customJs')
<script src="{{asset('libs/tail.select.js-1.0.2/js/tail.select.min.js')}}"></script>
<script>
    $(document).ready(function() {
        let tailSelect = tail.select('.tail-select', {
            stayOpen: false,
        })
        document.addEventListener('htmx:load', function(){
            console.log('Hello HTMX!')
        })
        
        // htmx.onLoad(function(elt) {
        //     console.log(elt);
        // })
    });
</script>
