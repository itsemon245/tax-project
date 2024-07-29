@php
    $id = $attributes->has('id') ? $attributes->get('id') : 'back-btn';
@endphp
<button
    {{ $attributes->merge(['class' => 'btn btn-dark btn-sm waves-effect waves-light rounded-3'])->merge(['id' => 'back-btn']) }}>Back</button>

@push('customJs')
    <script>
        $(document).ready(function() {
            btn = $('#{{ $id }}')
            btn.click(e => {
                history.back()
            })
        });
    </script>
@endpush
