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
                        <a href="#" id="{{ $for . '-tab' }}" data-bs-toggle="tab" data-bs-target="#{{ $for }}"
                            aria-controls="{{ $for }}"
                            @if ($index === 1) aria-expanded="true" aria-selected="true" @endif
                            role="tab"
                            class="text-capitalize nav-link border border-2 {{ $index === 1 ? 'active' : '' }}"
                            tabindex="-1">
                            {{ str($for)->headline() }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="container-fluid">
            <div class="tab-content">
                @php
                    $index = 0;
                @endphp
                @foreach ($settings as $for => $settng)
                    @php
                        $index++;
                    @endphp
                    <div class="tab-pane fade {{ $index === 1 ? 'show active' : '' }}" id="{{ $for }}"
                        role="tabpanel" aria-labelledby="{{ $for . '-tab' }}">
                        <form action="{{ route('tax.calculate') }}" method="POST">
                            @csrf
                            <input type="hidden" name="tax_for" value="{{ $for }}">
                            <div class="container rounded bg-white py-3 px-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <x-backend.form.text-input label="Name" :value="auth()->user() ? auth()->user()->name : ''" required
                                                    type="text" name="name" required>
                                                </x-backend.form.text-input>
                                            </div>
                                            <div class="col-md-6">
                                                <x-backend.form.text-input label="Email Address" :value="auth()->user() ? auth()->user()->email : ''"
                                                    type="email" name="email" required>
                                                </x-backend.form.text-input>
                                            </div>
                                            <div class="col-md-6">
                                                <x-backend.form.text-input label="Phone Number" :value="auth()->user() ? auth()->user()->phone : ''"
                                                    type="string" name="phone" required>
                                                </x-backend.form.text-input>
                                            </div>
                                            <div class="col-md-6">
                                                <x-backend.form.text-input label="Source of Income" type="text"
                                                    name="income_source">
                                                </x-backend.form.text-input>
                                            </div>
                                            <div class="col-md-6">
                                                <x-backend.form.text-input label="Yearly Turnover" name="yearly_turnover">
                                                </x-backend.form.text-input>
                                            </div>
                                            <div class="col-md-6">
                                                <x-backend.form.text-input label="Total Assets" name="total_asset">
                                                </x-backend.form.text-input>
                                            </div>
                                            <div class="col-md-6">
                                                <x-backend.form.text-input label="Yearly Income" name="yearly_income">
                                                </x-backend.form.text-input>
                                            </div>
                                            @if ($for === 'individual')
                                                <div class="col-md-6">
                                                    <x-backend.form.text-input label="Investment of Rebate" name="rebate">
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
                                                <x-backend.form.text-input label="Tax Deduction" name="tax_deduction">
                                                </x-backend.form.text-input>
                                            </div>

                                            <div class="col-12 my-4">
                                                <h4 class="mb-2">Tax Services</h4>
                                                <div class="clearfix d-flex flex-wrap gap-3 align-items-center">
                                                    @php
                                                        $services = \App\Models\TaxSetting::where('for', $for)
                                                            ->get()
                                                            ->pluck('service');
                                                    @endphp
                                                    @foreach ($services as $key => $service)
                                                        @if ($service)
                                                            <label
                                                                class="form-check-label d-flex gap-2 py-2 px-3 bg-light bg-gradient rounded-3"
                                                                for="{{ $service . '-' . $key }}">
                                                                <input class="form-check-input" type="checkbox" hidden
                                                                    id="{{ $service . '-' . $key }}" name="services[]"
                                                                    value="{{ $service }}">
                                                                {{ $service }}
                                                            </label>
                                                        @endif
                                                    @endforeach

                                                </div>
                                            </div><!-- end col -->
                                            <div class="col-12">
                                                <x-form.ck-editor id="ck-editor-{{ $for }}"
                                                    name="massage"></x-form.ck-editor>
                                            </div><!-- end col -->
                                            <div class="">
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light profile-button">Submit</button>
                                            </div>


                                        </div>


                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end row-->
@endsection

@push('customJs')
    <script>
        $(document).ready(function() {
            $('.form-check-input').on('change', e => {
                $(e.target)
                    .parent()
                    .toggleClass('check-active')
                    .toggleClass('bg-light');
            })
        });
    </script>
@endpush
