{{-- vendor JS  --}}
<script src="{{ asset('frontend/assets/js/vendor.min.js') }}"></script>
{{-- app JS  --}}
<script src="{{ asset('frontend/assets/js/app.min.js') }}"></script>
{{-- sweet alert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('selectizeCDN')
@include('frontend.layouts.alert')
@stack('customJs')
