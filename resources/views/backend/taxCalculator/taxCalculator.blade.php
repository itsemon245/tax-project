@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Backend', 'Tax Calculator']" />

    <x-backend.ui.section-card name="Tax Calculator">
        <div class="container d-flex justify-content-center">
            <ul class="nav nav-pills navtab-bg" role="tablist"
                style="width: 100%;display: flex;justify-content: space-evenly;">
                {{-- @foreach ($products as $type => $items)
                    <li class="nav-item" role="presentation">
                        <a href="#{{ $type }}" data-bs-toggle="tab"
                            aria-expanded="{{ $type === 'Silver' ? 'true' : 'false' }}"
                            aria-selected="{{ $type === 'Silver' ? 'true' : 'false' }}" role="tab"
                            class="text-capitalize nav-link {{ $type === 'Silver' ? 'active' : '' }}" tabindex="-1">
                            {{ $type }}
                        </a>
                    </li>
                @endforeach --}}
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
                {{-- @foreach ($products as $type => $items)
                    <div class="tab-pane {{ $type === 'Silver' ? 'active' : '' }}" id="{{ $type }}" role="tabpanel">
                        <div class="product-wrapper">
                            @foreach ($items as $product)
                                <x-frontend.product-card :$product />
                            @endforeach
                        </div>
                    </div>
                @endforeach --}}
                <div class="tab-pane fade show active" id="company" role="tabpanel" aria-labelledby="company-tab">
                    <form action="" method="POST">
                        @csrf
                        <div class="container rounded bg-white py-3 px-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Name" required type="text" name="name"
                                                required>
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Email Address" type="email" name="email"
                                                required>
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
                                            <x-backend.form.text-input label="Yearly Turnover" type="number"
                                                name="yearlyTurnover">
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Total Assets" type="text"
                                                name="totalAssets">
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Yearly Income" type="number"
                                                name="yearlyIncome">
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-12 my-4">
                                            <h4 class="mb-2">Tax Services</h4>
                                            <div class="clearfix">
                                                <div class="float-start m-1">
                                                    <input type="radio" name="texServices" id="Registration"
                                                        value="Registration" class="d-none">
                                                    <label for="Registration"
                                                        class="border rounded p-1">Registration</label>
                                                </div>
                                                <div class="float-start m-1">
                                                    <input type="radio" name="texServices" id="AccountWithAuditReport"
                                                        value="Account With Audit Report" class="d-none">
                                                    <label for="AccountWithAuditReport" class="border rounded p-1">Account
                                                        With Audit Report</label>
                                                </div>
                                                <div class="float-start m-1">
                                                    <input type="radio" name="texServices"
                                                        id="accountAuditReport&TaxAdvisory"
                                                        value="Account Audit Report & Tax Advisory" class="d-none">
                                                    <label for="accountAuditReport&TaxAdvisory"
                                                        class="border rounded p-1">Account Audit
                                                        Report & Tax Advisory</label>
                                                </div>
                                                <div class="float-start m-1">
                                                    <input type="radio" name="texServices" id="Others"
                                                        class="d-none">
                                                    <label for="Others" class="border rounded p-1 mb-1">Others</label>
                                                    <x-backend.form.text-input label="Details" type="text"
                                                        name="texServices">
                                                    </x-backend.form.text-input>
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                        <div class="col-12">

                                            <x-form.ck-editor id="ck-editor" name="Massage"></x-form.ck-editor>

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
                <div class="tab-pane" id="firm" role="tabpanel" aria-labelledby="firm-tab">
                    <form action="" method="POST">
                        @csrf
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
                                            <div class="clearfix">
                                                <div class="float-start m-1">
                                                    <input type="radio" name="texServices" id="Registration"
                                                        value="Registration" class="d-none">
                                                    <label for="Registration"
                                                        class="border rounded p-1">Registration</label>
                                                </div>
                                                <div class="float-start m-1">
                                                    <input type="radio" name="texServices" id="AccountWithAuditReport"
                                                        value="Account With Audit Report" class="d-none">
                                                    <label for="AccountWithAuditReport" class="border rounded p-1">Account
                                                        With Audit Report</label>
                                                </div>
                                                <div class="float-start m-1">
                                                    <input type="radio" name="texServices"
                                                        id="accountAuditReport&TaxAdvisory"
                                                        value="Account Audit Report & Tax Advisory" class="d-none">
                                                    <label for="accountAuditReport&TaxAdvisory"
                                                        class="border rounded p-1">Account Audit
                                                        Report & Tax Advisory</label>
                                                </div>
                                                <div class="float-start m-1">
                                                    <input type="radio" name="texServices" id="vat"
                                                        value="Vat" class="d-none">
                                                    <label for="vat" class="border rounded p-1">Vat</label>
                                                </div>
                                                <div class="float-start m-1">
                                                    <input type="radio" name="texServices" id="Others"
                                                        class="d-none">
                                                    <label for="Others" class="border rounded p-1 mb-1">Others</label>
                                                    <x-backend.form.text-input label="Details" type="text"
                                                        name="texServices">
                                                    </x-backend.form.text-input>
                                                </div>
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
                                            <div class="clearfix">
                                                <div class="float-start m-1">
                                                    <input type="radio" name="texServices" id="Registration"
                                                        value="Registration" class="d-none">
                                                    <label for="Registration"
                                                        class="border rounded p-1">Registration</label>
                                                </div>
                                                <div class="float-start m-1">
                                                    <input type="radio" name="texServices" id="Account"
                                                        value="Account" class="d-none">
                                                    <label for="Account" class="border rounded p-1">Account</label>
                                                </div>
                                                <div class="float-start m-1">
                                                    <input type="radio" name="texServices" id="account&TaxAdvisory"
                                                        value="Account & Tax Advisory" class="d-none">
                                                    <label for="account&TaxAdvisory" class="border rounded p-1">Account &
                                                        Tax Advisory</label>
                                                </div>
                                                <div class="float-start m-1">
                                                    <input type="radio" name="texServices" id="vat"
                                                        value="Vat" class="d-none">
                                                    <label for="vat" class="border rounded p-1">Vat</label>
                                                </div>
                                                <div class="float-start m-1">
                                                    <input type="radio" name="texServices" id="Others"
                                                        class="d-none">
                                                    <label for="Others" class="border rounded p-1 mb-1">Others</label>
                                                    <x-backend.form.text-input label="Details" type="text"
                                                        name="texServices">
                                                    </x-backend.form.text-input>
                                                </div>
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
    </x-backend.ui.section-card>
    <!-- end row-->
@endsection

@push('customJs')
    <script>
        const getSectionTitle = (e) => {
            const section_id = e.value
            let url = "{{ route('getInfoSectionTitle', ':sectionId') }}"
            url = url.replace(':sectionId', section_id)

            $.ajax({
                type: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(title) {
                    $('input[name="title"]').val('')
                    $('input[name="old_title"]').val('')

                    $('input[name="title"]').val(title)
                    $('input[name="old_title"]').val(title)
                },
                error: function(error) {
                    $('input[name="title"]').val('')
                    $('input[name="old_title"]').val('')
                    console.log(error)
                }
            });
        }
    </script>
@endpush
