@extends('backend.layouts.app')

@pushOnce('customCss')
    <style>
        input[type="date"] {
            letter-spacing: 2px;
            border: none;
            padding: 0.2rem 0.1rem;
        }

        input[type="date"]:focus {
            border-radius: 5px;
        }

        input[type="date"]:hover {
            cursor: pointer;
        }

        input {
            border: none;
            border-radius: 5px;
            display: block;
            background: none;
        }

        textarea {
            border: none;
            border-radius: 5px;
            display: block;
            background: none;
        }

        .tax-wrapper {
            position: relative;
        }

        .tax-container {
            position: absolute;
            background: var(--ct-white);
            width: 320px;
            border-radius: 10px;
            border: 2px solid var(--ct-gray-300);
            overflow: visible;
            top: -20px;
            left: 60px;
        }

        .tax-container>.title {
            background: var(--ct-light);
            margin: 0 0 .5rem;
            padding: .5rem;
            position: relative;
            border-radius: 10px 10px 0 0;
        }

        .tax-container>.title::before {
            content: '';

            border-top: .5rem solid transparent;
            border-right: 1rem solid var(--ct-gray-300);
            border-bottom: .5rem solid transparent;
            bottom: 0;
            left: -1rem;
            position: absolute;
        }

        .tax-container .close-icon {
            top: -.5rem;
            right: -.7rem;
            position: absolute;
            z-index: 2;
        }

        .discount-wrapper {
            position: relative;
        }

        .discount-container {
            position: absolute;
            background: var(--ct-white);
            width: 200px;
            border-radius: 10px;
            border: 2px solid var(--ct-gray-300);
            overflow: visible;
            top: -20px;
            left: 60px;
        }

        .discount-container>.title {
            background: var(--ct-light);
            margin: 0 0 .5rem;
            padding: .5rem;
            position: relative;
            border-radius: 10px 10px 0 0;
        }

        .discount-container>.title::before {
            content: '';

            border-top: .5rem solid transparent;
            border-right: 1rem solid var(--ct-gray-300);
            border-bottom: .5rem solid transparent;
            bottom: 0;
            left: -1rem;
            position: absolute;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endPushOnce
@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Invoice', 'Create']" />
    <!-- end page title -->

    <x-backend.ui.section-card>
        <input type="hidden" name="" id="fiscal-year">
        <section class="p-lg-3">
            <form id="submit-form" action="{{ route('invoice.update', $invoice->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div>
                    <div class="row">
                        <div class="d-flex border my-5 justify-content-center">
                            <img style="object-fit: cover; max-width:1240px;height:250px;" src="{{asset('storage/'.app('setting')->basic->header_image)}}" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-md-3">
                            <div class="pe-2 mb-2">
                                <select class="mb-2 tail-select" id="client" name="client"
                                    placeholder="Select Client..." label="Bill To" required>
                                    @foreach ($clients as $client)
                                        <option @selected($client->id == $invoice->client_id)
                                            data-description="{{ "<div class='fw-normal'>Company: $client->company_name,</br>Phone: $client->phone,</br> TIN: $client->tin, Ref: $client->ref_no, </br> Circle: $client->circle </div>" }}"
                                            value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </select>
                                <a href="{{ route('client.create') }}" class="text-blue" style="font-weight: 500;">Create
                                    New Client</a>
                            </div>
                            <div class="pe-2">
                                <x-backend.form.select-input name="year" placeholder="Select Year" label="Year">
                                    @foreach (range(currentYear(), 2020) as $year)
                                        <option value="{{ $year - 1 . '-' . $year }}" @selected($year - 1 . '-' . $year == $activeYear)>
                                            {{ $year - 1 . '-' . $year }}
                                        </option>
                                    @endforeach
                                </x-backend.form.select-input>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-3">
                            <div class="mb-3">
                                <label for="issue-date" class="mb-0 d-block">Date of Issue</label>
                                <div class="d-flex align-items-center">
                                    <input type="date" name="issue_date" id="issue-date"
                                        value="{{ Carbon\Carbon::parse($invoice->issue_date)->format('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="issue-date" class="mb-0 d-block">Due Date</label>
                                <div class="d-flex align-items-center">
                                    <input type="date" name="due_date" id="due-date"
                                        value="{{ Carbon\Carbon::parse($invoice->due_date)->format('Y-m-d') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-3">
                            <div class="mb-3">
                                <p class="mb-0 form-label">Invoice Number</p>
                                <span class="text-black" id="invoice-id">{{ $invoice->id }}</span>
                            </div>
                            <div>
                                <label class="mb-0" for="reference">Reference</label>
                                <input type="text" id="reference" name="reference" value="{{ $invoice->reference_no }}">
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="d-flex justify-content-end ">
                                <p class="mb-0">Amount Due (USD) </br>
                                    <span class="fs-1 fw-bold text-black" id="amount-due-vue">0 Tk</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="invoice-edit-app">

                </div>
                <div class="row">
                    <div class="d-flex border my-5 justify-content-center">
                        <img style="object-fit: cover; max-width:1240px;height:250px;" src="{{asset('storage/'.app('setting')->basic->footer_image)}}" alt="">
                    </div>
                </div>

                <button id="submit-btn" type="submit"
                    class="btn btn-primary waves-effect waves-light mt-2 rounded-3 shadow">Update</button>

            </form>

        </section>

    </x-backend.ui.section-card>
@endsection

@push('customJs')
    <script>
        $(document).ready(function() {
            $('#client').on('change', function(e) {
                let url = "{{ route('api.get.client', ':CLIENT') }}"
                url = url.replace(':CLIENT', e.target.value)
                $.ajax({
                    type: "get",
                    url: url,
                    success: function(response) {
                        $('input[name="reference"]').val(response.client.ref_no)
                    }
                });
            })
        });
    </script>
@endpush
