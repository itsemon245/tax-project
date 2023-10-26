@props(['value' => null, 'range' => null, 'hasSpace' => false])
@php
    $class = $attributes->get('class');
    $name = $attributes->get('name');
    if ($value) {
        $length = str($value)->length();
        $range = range(1, $length);
    }
    $space = $hasSpace === true ? 'me-3' : '';
@endphp
@pushOnce('customCss')
    <style>
        .hide-default-action[type=number]::-webkit-inner-spin-button,
        .hide-default-action[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@endPushOnce
@foreach ($range as $key)
    <input type="number"
        class="hide-default-action box-input border border-dark text-center d-inline {{ ($key - 1) % 4 == 0 ? $space : '' }} {{ $key === 1 ? $space : '' }} {{ $class }}"
        style="width:1.5rem!important;" value="{{ $value ? $value[$key - 1] : '' }}">
@endforeach
<input {{ $attributes->merge(['value' => $value]) }} hidden>


@push('customJs')
    <script>
        $(document).ready(function() {
            let codeVal = [];
            const codeInput = $('input[name="{{ $name }}"]')
            $('.box-input').each((i, element) => {
                const input = $(element)
                codeVal[i] = input.val();
                input.on('change', e => {
                    codeVal[i] = e.target.value;
                    codeInput.val(codeVal.join(''))
                })
                input.on('keydown', key => {
                    if (key.code !== 'Backspace') {
                        input.val(null)
                    }
                })
                input.on('keyup', key => {
                    if (key.code === 'Backspace') {
                        input.prev().trigger('focus');
                    }
                    if (input.next().hasClass('box-input') && (key.code !== 'Backspace')) {
                        input.next().trigger('focus');
                    } else {
                        input.trigger('blur')
                    }

                })
            })
        });
    </script>
@endpush
