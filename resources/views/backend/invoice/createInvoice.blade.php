@extends('backend.layouts.app')
@pushOnce('customCss')
    {{-- quillJs editor css  --}}
    <link href="{{ asset('backend/assets/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    {{-- quillJs editor css  --}}
@endPushOnce
@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Invoice', 'Create']" />
    <!-- end page title -->

    <x-backend.ui.section-card>
        @php
            $randomString = Str::random(13);
        @endphp
        <form action="{{ route('map.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="">
                <div class="text-center mb-4">
                    <h4>Create Invoice</h4>
                </div>
                <div class="">
                    <div class="row">
                        {{-- select client --}}
                        <div class="col-md-6 col-lg-4">
                            <div class="row align-items-center mb-2">
                                <h4 class="col-4 col-md-5">Bill To</h4>
                                <div class="col-8 col-md-7">
                                    <x-backend.form.select-input id="client" name="client"
                                        placeholder="Choose Client...">
                                        <option value="">Client 1</option>
                                    </x-backend.form.select-input>
                                </div>
                            </div>
                            {{-- Reference no --}}
                            <div class="row mb-2 align-items-center">
                                <label for="reference" class="col-md-5">Reference:</label>
                                <div class="col-md-7">
                                    <x-backend.form.text-input id="reference" placeholder="Reference" name="reference" />

                                </div>
                            </div>

                        </div>
                        {{-- select dates --}}
                        <div class="col-md-6 col-lg-4 mx-auto">
                            {{-- Issue Date --}}
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">Issue Date:</div>
                                <div class="col-md-8 px-2">
                                    <div class="text-dark border border-primary rounded p-1">
                                        <strong class="m-0">
                                            {{ Carbon\Carbon::now()->format('d M, Y') }}</strong>
                                    </div>

                                </div>
                            </div>
                            {{-- Due Date --}}
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">Due Date:</div>
                                <div class="col-md-8">
                                    <x-backend.form.text-input type="date" name="due_date" />
                                </div>
                            </div>
                        </div>
                        {{-- enter other details --}}
                        <div class="col-md-12 col-lg-4">

                            {{-- Circle --}}
                            <div class="row mb-2 align-items-center">
                                <label for="circle" class="col-md-5">Circle:</label>
                                <div class="col-md-7">
                                    <x-backend.form.text-input id="circle" placeholder="Circle" name="circle" />

                                </div>
                            </div>
                            {{-- Purpose --}}
                            <div class="row mb-2 align-items-center">
                                <label for="purpose" class="col-md-5">Purpose:</label>
                                <div class="col-md-7">
                                    <x-backend.form.select-input id="purpose" placeholder="Select Purpose" name="purpose">
                                        <option value="">Purpose 1</option>
                                    </x-backend.form.select-input>
                                </div>
                            </div>
                            {{-- Payment Method --}}
                            <div class="row mb-2 align-items-center">
                                <label for="payment-method" class="col-md-5">Payment Method:</label>
                                <div class="col-md-7">
                                    <x-backend.form.select-input id="payment-method" placeholder="Select Payment Method"
                                        name="payment_method">
                                        <option selected value="">Cash</option>
                                        <option value="">Bkash</option>
                                        <option value="">Nagad</option>
                                        <option value="">Bank</option>
                                    </x-backend.form.select-input>
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    {{-- description --}}
                    <div class="row my-3">
                        <div class="col-12">
                            <label for="snow-editor" class="form-label">Description:</label>
                            <div id="snow-editor" style="height: 200px;"></div>
                            <textarea class="d-none" name="description" id="description"></textarea>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">Amount:</div>
                                <div class="col-md-8">
                                    <x-backend.form.text-input type="text" placeholder="Amount" >
                                </div>
                            </div>
                            {{-- Tax  --}}
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">Tax:</div>
                                <div class="col-md-8">
                                    <x-backend.form.text-input type="text" placeholder="Tax" name="tax" >
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">Discount:</div>
                                <div class="col-md-8">
                                    <x-backend.form.text-input type="text" placeholder="Discount" name="discount" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">Total:</div>
                                <div class="col-md-8">
                                    <x-backend.form.text-input type="text" placeholder="Total"  >
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <div class="col-md-4">Instant Paid:</div>
                                <div class="col-md-8">
                                    <x-backend.form.text-input type="text" placeholder="Instant Paid" >
                                </div>
                            </div>
                            <div class="row mb-2 align-items-center">
                                <h4 class="col-md-4">Total:</h4>
                                <h4 class="col-md-8">
                                    Ammount
                                </h4>
                            </div>
                            <input type="text" name="amount" value="140" hidden>
                        </div>
                        {{-- Sub Total --}}


                    </div>
                    <div class="clearfix"></div>
                    <!-- end row -->

                    <div class="mb-1">
                        <div class="text-end">

                            <x-backend.ui.button onclick="descriptionAdd()" class="btn-primary">Submit
                            </x-backend.ui.button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </x-backend.ui.section-card>
    @pushOnce('customJs')
        {{-- quillJs Script  --}}
        <script src="{{ asset('backend/assets/libs/quill/quill.min.js') }}"></script>
        <script src="{{ asset('backend/assets/js/pages/form-quilljs.init.js') }}"></script>
        {{-- quillJs Script  --}}
        <script>
            const descriptionAdd = () => {
                $("#description").val($('.ql-editor').html())
                console.log($("#description").val());
            }
        </script>
    @endPushOnce
@endsection
