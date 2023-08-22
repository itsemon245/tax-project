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
                <li>
                    <a href="#" id="company-tab" data-bs-toggle="tab" data-bs-target="#company" aria-controls="company"
                        aria-expanded="true" aria-selected="true" role="tab"
                        class="text-capitalize nav-link border border-2 active" tabindex="-1">
                        COMPANY
                    </a>
                </li>
                <li>
                    <a href="#" id="firm-tab" data-bs-toggle="tab" data-bs-target="#firm" aria-controls="firm"
                        aria-expanded="false" aria-selected="false" role="tab"
                        class="text-capitalize nav-link border border-2" tabindex="-1">
                        FIRM
                    </a>
                </li>
                <li>
                    <a href="#" id="indivudual-tab" data-bs-toggle="tab" data-bs-target="#indivudual"
                        aria-controls="indivudual" aria-expanded="false" aria-selected="false" role="tab"
                        class="text-capitalize nav-link border border-2" tabindex="-1">
                        INDIVUDUAL
                    </a>
                </li>
            </ul>
        </div>
        <div class="container-fluid">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="company" role="tabpanel" aria-labelledby="company-tab">
                    <form action="{{ route('tax.calculate') }}" method="POST">
                        @csrf
                        <input type="hidden" name="tax_for" value="company">
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
                                            <x-backend.form.text-input label="Phone Number" :value="auth()->user() ? auth()->user()->phone : ''" type="string"
                                                name="phone" required>
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Source of Income" type="text"
                                                name="income_source">
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Yearly Turnover" type="number"
                                                name="yearly_turnover">
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Total Assets" type="number"
                                                name="total_asset">
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Yearly Income" type="number"
                                                name="yearly_income">
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-12 my-4">
                                            <h4 class="mb-2">Tax Services</h4>
                                            <div class="clearfix d-flex flex-wrap gap-3 align-items-center">
                                                @isset($settings['company'])
                                                    @foreach ($settings['company'] as $setting)
                                                        @foreach ($setting->slots as $key => $slot)
                                                            @foreach ($slot->taxServices as $i => $service)
                                                                <label
                                                                    class="form-check-label d-flex gap-2 py-2 px-3 bg-light bg-gradient rounded-3"
                                                                    for="{{ $service->name . '-' . $service->id }}">
                                                                    <input class="form-check-input" type="checkbox" hidden
                                                                        id="{{ $service->name . '-' . $service->id }}"
                                                                        name="services[]" value="{{ $service->name }}">
                                                                    {{ $service->name }}
                                                                </label>
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                @endisset

                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-12">
                                            <x-form.ck-editor id="ck-editor" name="Massage"></x-form.ck-editor>
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
                <div class="tab-pane" id="firm" role="tabpanel" aria-labelledby="firm-tab">
                    <form action="" method="POST">
                        @csrf
                        <input type="hidden" name="tax_for" value="firm">

                        <div class="container rounded bg-white py-3 px-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Name" required type="text"
                                                name="name" required>
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Email Address" type="email"
                                                name="email" required>
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Phone Number" type="number" name="phone"
                                                required>
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Source of Income" type="text"
                                                name="incomeSource">
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Yearly Turnover (Eastimited)" type="number"
                                                name="yearlyTurnover">
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Total Assets (Eastimited)" type="text"
                                                name="totalAssets">
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Yearly Income (Eastimited)" type="number"
                                                name="yearlyIncome">
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-12 my-4">
                                            <h4 class="mb-2">Tax Services</h4>
                                            <div class="clearfix d-flex flex-wrap gap-3 align-items-center">


                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-12">

                                            <x-form.ck-editor id="ck-editor-firm" name="Massage"></x-form.ck-editor>

                                        </div><!-- end col -->



                                        <div class="mt-3">
                                            <button type="submit"
                                                class="btn btn-primary waves-effect waves-light profile-button">Submit</button>
                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="indivudual" role="tabpanel" aria-labelledby="indivudual-tab">
                    <form action="" method="POST">
                        @csrf
                        <input type="hidden" name="tax_for" value="individual">
                        <div class="container rounded bg-white py-3 px-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Name" required type="text"
                                                name="name" required>
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Email Address" type="email"
                                                name="email" required>
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Phone Number" type="number" name="phone"
                                                required>
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Source of Income" type="text"
                                                name="incomeSource">
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Yearly Turnover (If Any)" type="number"
                                                name="yearlyTurnover">
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Total Assets (Eastimited)" type="text"
                                                name="totalAssets">
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Yearly Income (Eastimited)" type="number"
                                                name="yearlyIncome">
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Investment of Rebate" type="text"
                                                name="investmentofRebate">
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-12 my-4">
                                            <h4 class="mb-2">Tax Services</h4>
                                            <div class="clearfix d-flex flex-wrap gap-3 align-items-center">


                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-12">

                                            <x-form.ck-editor id="ck-editor-induvudual" name="Massage"></x-form.ck-editor>

                                        </div><!-- end col -->



                                        <div class="mt-3">
                                            <button type="submit"
                                                class="btn btn-primary waves-effect waves-light profile-button">Submit</button>
                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
