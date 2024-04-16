@extends('frontend.layouts.app')
@section('main')
    <style>
        .check-active {
            background: var(--bs-primary);
            color: var(--dark);
        }

        .form-check-label {
            transition: all 150ms ease-in-out;
        }
    </style>
    <div>
        <section class="my-5">
            <div class="container d-flex justify-content-center">
                <ul class="nav nav-pills navtab-bg nav-justif" role="tablist"
                    style="width: 100%;display: flex;justify-content: center; gap:1rem;">
                    @php
                        $index = 0;
                    @endphp
                    @foreach ($settings as $for => $setting)
                        @php
                            $index++;
                        @endphp
                        <li>
                            <a href="#" id="{{ $for . '-tab' }}" data-bs-toggle="tab"
                                data-bs-target="#{{ $for }}" aria-controls="{{ $for }}"
                                @if ($index === 1) aria-expanded="true" aria-selected="true" @endif
                                role="tab"
                                class="text-capitalize nav-link border border-2 {{ $index === 1 ? 'active' : '' }}"
                                tabindex="-1">
                                {{ str($for)->headline() }}
                            </a>
                        </li>
                    @endforeach
                    <li class="ms-auto">
                        <x-backend.ui.button type="custom" :href="route('tax.calculation.results')" class="btn-success">
                            <span class="mdi mdi-file-document-outline text-white font-16"></span>
                            <span class="text-white">View Results</span>
                        </x-backend.ui.button>
                    </li>
                </ul>
            </div>
            <div class="container-fluid">
                <div class="tab-content">
                    @php
                        $index = 0;
                    @endphp
                    @forelse ($settings as $for => $settng)
                        @php
                            $index++;
                        @endphp
                        <div class="tab-pane fade {{ $index === 1 ? 'show active' : '' }}" id="{{ $for }}"
                            role="tabpanel" aria-labelledby="{{ $for . '-tab' }}">
                            <div class="container rounded bg-white py-3 px-4">
                                <form action="{{ route('tax.calculate') }}" id="form-{{$index}}" method="POST" class="row">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="row">
                                            <input hidden value="{{ $for }}" name="tax_for" class="d-none">
                                            <div class="col-md-6">
                                                <x-backend.form.text-input label="Name" :value="old('name') ? auth()->user()->name : ''" required
                                                    type="text" name="name">
                                                </x-backend.form.text-input>
                                            </div>
                                            <div class="col-md-6">
                                                <x-backend.form.text-input label="Email Address" :value="old('email') ? auth()->user()->email : ''"
                                                    type="email" name="email" required>
                                                </x-backend.form.text-input>
                                            </div>
                                            <div class="col-md-6">
                                                <x-backend.form.text-input label="Phone Number" :value="old('phone') ? auth()->user()->phone : ''"
                                                    type="number" name="phone" required>
                                                </x-backend.form.text-input>
                                            </div>
                                            <div class="col-md-6">
                                                <x-backend.form.text-input label="Source of Income" :value="old('income_source')"
                                                    type="text" name="income_source">
                                                </x-backend.form.text-input>
                                            </div>
                                            <div class="col-md-6">
                                                <x-backend.form.text-input label="Yearly Turnover" :value="old('yearly_turnover')"
                                                    name="yearly_turnover">
                                                </x-backend.form.text-input>
                                            </div>
                                            <div class="col-md-6">
                                                <x-backend.form.text-input label="Total Assets" type="number"
                                                    :value="old('total_asset')" name="total_asset">
                                                </x-backend.form.text-input>
                                            </div>
                                            <div class="col-md-6">
                                                <x-backend.form.text-input label="Yearly Income" :value="old('yearly_income')"
                                                    name="yearly_income">
                                                </x-backend.form.text-input>
                                            </div>
                                            @if ($for === 'individual')
                                                <div class="col-md-6">
                                                    <x-backend.form.text-input label="Investment of Rebate"
                                                        :value="old('rebate')" name="rebate">
                                                    </x-backend.form.text-input>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="gender" class="d-block form-label">Gender</label>
                                                    <label for="male" class=" mx-2">
                                                        <input id="male" type="radio" name="gender" value="male">
                                                        Male
                                                    </label>
                                                    <label for="female" class=" mx-2">
                                                        <input id="female" type="radio" name="gender" value="female">
                                                        Female
                                                    </label>
                                                </div>
                                            @endif
                                            <div class="col-md-6">
                                                <x-backend.form.text-input label="Tax Deduction" type="number"
                                                    :value="old('deduction')" name="deduction">
                                                </x-backend.form.text-input>
                                            </div>

                                            <div class="col-12 my-4">
                                                <h4 class="mb-2">Tax Services</h4>
                                                <div class="clearfix d-flex flex-wrap gap-3 align-items-center">
                                                    @php
                                                        $services = \App\Models\TaxSetting::where([
                                                            'for' => $for,
                                                            'type' => 'others',
                                                        ])->get(['service', 'id']);
                                                    @endphp
                                                    @foreach ($services as $key => $service)
                                                        @if ($service)
                                                            <label
                                                                class="form-check-label d-flex gap-2 py-2 px-3 bg-light bg-gradient rounded-3"
                                                                for="{{ 'service-' . $key }}">
                                                                <input class="form-check-input" type="checkbox" hidden
                                                                    id="{{ 'service-' . $key }}" name="services[]"
                                                                    value="{{ $service->id }}">
                                                                {{ $service->service }}
                                                            </label>
                                                        @endif
                                                    @endforeach

                                                </div>
                                            </div><!-- end col -->
                                            <div class="col-12">
                                                <x-form.ck-editor id="ck-editor-{{ $for }}"
                                                    name="message"></x-form.ck-editor>
                                            </div><!-- end col -->
                                            <div class="d-flex">
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light profile-button m-2">Submit</button>
                                                <button type="submit" data-form="form-{{$index}}"
                                                    class="apply btn btn-success waves-effect waves-light profile-button m-2">Submit
                                                    & Apply for service</button>
                                            </div>
                                        </div>


                                    </div>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8" style="max-width:800px;">
                                <img loading="lazy" src="{{ asset('frontend/assets/images/comming_soon.jpg') }}"
                                    style="height:100%;" class="img-fluid p-5" alt="Responsive image">
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
        <!-- end row-->
    @endsection

    @push('customJs')
        <script>
            $(document).ready(function() {
                $('.form-check-input').each((i, input)=>{
                console.log(input)
                    $(input).on('change', e => {
                        $(input)
                        .parent()
                        .toggleClass('check-active')
                        .toggleClass('bg-light');
                    })
                })
            });
        </script>
        <script>
            $(document).ready(function() {
                $(".apply").each(function(i, btn) {
                    $(btn).click((e)=>{
                        e.preventDefault()
                        let url = "{{ route('tax.calculate').'?apply=true' }}";
                        let form = $("#" + $(btn).data('form'));
                        form.attr('action', url)
                        form.submit()
                    })
                });
            });
        </script>
    @endpush
