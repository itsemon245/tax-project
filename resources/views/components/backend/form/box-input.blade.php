@props(['value' => null, 'range' => null])
@php
    $class = $attributes->get('class');
    $name = $attributes->get('name');
    if ($value) {
        $length = str($value)->length();
        $range = range(1, $length);
    }
@endphp
@foreach ($range as $key)
    <input type="text"
        class="box-input border border-dark text-center d-inline {{ ($key - 1) % 4 == 0 ? 'me-2' : '' }} {{ $key === 1 ? 'me-3' : '' }} {{ $class }}"
        style="width:28px;" value="{{ $value ? $value[$key - 1] : '' }}">
@endforeach
<input {{ $attributes->merge(['value' => $value]) }} hidden>


@push('customJs')
    <script>
        $(document).ready(function() {
            let codeVal = [];
            const codeInput = $('input[name="{{ $name }}"]')
            console.log(codeInput);
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
