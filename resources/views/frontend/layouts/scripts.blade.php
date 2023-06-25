{{-- vendor JS  --}}
<script src="{{ asset('frontend/assets/js/vendor.min.js') }}"></script>
{{-- app JS  --}}
<script src="{{ asset('frontend/assets/js/app.min.js') }}"></script>
@stack('customJs')
 {{-- sweet alert2 --}}
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 @include('frontend.layouts.alert')
