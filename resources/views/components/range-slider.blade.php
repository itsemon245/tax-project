@props([
    'from' => 0,
    'to' => 100,
    'step' => 1,
    'id' => 'slider',
    'label' => str($id)->title(),
    'name' => str($id)->snake(),
    'icon' => '',
])
@php
    $label = str($id)->title();
    $name = str($id)->snake();
    $id = str($id)->slug();
@endphp

<div class="card">
    <div class="card-header bg-white">
        <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    </div>
    <div class="card-body">
        <div class="row align-items-center justify-content-between">
            <div class="col-12">
                <div style="padding: 0 1.5rem 0 1rem;">
                    <div id="{{ $id }}" class="mb-2"></div>
                </div>
            </div>
            <div class="col-6">
                <input type="text" placeholder="From" class="form-control w-100 p-1" name='{{ $name . '_from' }}' />
            </div>
            <div class="col-6">
                <input type="text" placeholder="To" class="form-control w-100 p-1" name='{{ $name . '_to' }}' />
            </div>
        </div>
    </div>
</div>

@pushOnce('customJs')
    <script src="{{ asset('libs/nouislider/dist/nouislider.min.js') }}"></script>
    <script>
        let formatForSlider = {
            from: function(formattedValue) {
                return Number(formattedValue);
            },
            to: function(numericValue) {
                return Math.round(numericValue);
            }
        };
    </script>
@endPushOnce

@push('customJs')
    <script>
        function sliderConfig() {

            let from = parseInt('{{ $from }}')
            let to = parseInt('{{ $to }}')
            let step = parseInt('{{ $step }}')
            let tooltips = '{{ $tooltips }}'
            let htmlRegEx = /<\/?[a-z][\s\S]*>/i
            let icon = htmlRegEx.test('{{ $icon }}') ? '{{ $icon }}' :
                `<span class='{{ $icon }}' style='font-size: 1.1rem;'></span>`

            let slider = document.getElementById('{{ $id }}');
            noUiSlider.create(slider, {
                start: [from, to],
                connect: true,
                format: formatForSlider,
                tooltips: {
                    // tooltips are output only, so only a "to" is needed
                    to: function(numericValue) {
                        switch (tooltips) {
                            case 'custom':
                                return customToolTip(numericValue, '{{ $name }}')
                                break;

                            default:
                                return icon + " " + numericValue.toFixed(0);
                                break;
                        }
                    }
                },
                step: step,
                range: {
                    'min': from,
                    'max': to
                },
            });

            slider.noUiSlider.on('slide', (values) => {
                let from = parseInt(values[0])
                let to = parseInt(values[1])
                $('input[name="{{ $name }}_from"]').val(from)
                $('input[name="{{ $name }}_to"]').val(to)
            });
            $('input[name="{{ $name }}_from"]').on('input', e => {
                let value = parseInt(e.target.value)
                slider.noUiSlider.set([value, null]);
            })
            $('input[name="{{ $name }}_to"]').on('input', e => {
                let value = parseInt(e.target.value)
                slider.noUiSlider.set([null, value]);
            })
        }
        sliderConfig()
    </script>
@endpush
