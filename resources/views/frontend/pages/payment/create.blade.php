@extends('frontend.layouts.app')

@pushOnce('customCss')
    <style>
        .line-through {
            text-decoration: var(--bs-danger) solid line-through 2px;
        }

        .custom-grid {
            display: grid;
            grid-template-columns: 220px 220px;
            justify-content: center;
            margin-bottom: 1rem;
            gap: 1rem;
        }

        @media (min-width:550px) {
            .custom-grid {
                grid-template-columns: 170px 170px 170px;
            }
        }

        @media (min-width:850px) {
            .custom-grid {
                grid-template-columns: 250px 250px 250px;
                margin-bottom: 2rem;
            }
        }
    </style>
@endPushOnce
@section('main')
    <form action="{{ route('payment.store') }}" method="post" class="my-3">
        @csrf

        @if ($model === Product::class)
            <div id="app_header">
                <div class="container">
                    <div class="row">
                        <div class="app_header_content text-center">
                            <h2>What are your sources of income?</h2>
                        </div>
                    </div>
                    <div class="custom-grid">
                        @foreach ($incomeSources as $item)
                            <label
                                class="bg-light d-flex justify-content-center align-items-center border rounded position-relative">
                                <input type="checkbox" name="income_source[]" class="position-absolute top-0 end-0" value="{{$item->title}}">
                                <div class="text-dark d-flex flex-column align-items-center">
                                    <img src="{{ useImage($item->image)}}" width="80" height="60"
                                        alt="">
                                    <h6 class="text-center">{{$item->title}}</h6>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif



        <div class="my-3">
            <h4 class="text-center">
                Complete Your Transaction Safely
            </h4>
            <div class="container-lg">
                <div class="bg-light">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">Payment Information</h5>
                        </div>
                        <div class="card-body px-lg-5">
                            <div class="row justify-content-between">
                                <div class="col-md-5">
                                    <div class="text-end">
                                        <div class="text-muted">Pay using any of these number</div>
                                        <div>
                                            <span class="fw-medium me-2" style="color: #e2136e;">Bkash:</span>
                                            <span class="fw-medium">01548488888</span>
                                        </div>
                                        <div>
                                            <span class="fw-medium me-2" style="color: #ec1c24;">Nagad:</span>
                                            <span class="fw-medium">01548488888</span>
                                        </div>
                                        <div>
                                            <span class="fw-medium me-2" style="color: #8c3494;">Rocket:</span>
                                            <span class="fw-medium">01548488888</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-5 mb-2">
                                    <div class="fw-medium text-start">
                                        <div>
                                            <strong> Item Name:</strong> @php
                                                try {
                                                    echo $record->title;
                                                } catch (\Throwable $th) {
                                                    echo $record->name;
                                                }
                                            @endphp
                                        </div>
                                        <div>
                                            <span class="fw-medium">Item Type:</span> <span
                                                class="badge bg-soft-success text-success mb-0">{{ $model }}</span>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center">
                                            <span class="fw-medium">Item Price:</span>
                                            <div>
                                                <span class="font-24 prev-price" id="record-price">
                                                    {{ $record->price }}</span>
                                                <span class="mdi mdi-currency-bdt font-24 fw-bold p-0 prev-price"></span>
                                            </div>
                                            @if ($record->discount)
                                                @php
                                                    $discount = $record->is_discount_fixed ? $record->discount : $record->price * ($record->discount / 100);
                                                    $greaterPrice = $record->price + $discount;
                                                @endphp
                                                <div class="" style="text-decoration: line-through;">
                                                    <span class=""> {{ $greaterPrice }}</span>
                                                    <span class="mdi mdi-currency-bdt font-16 p-0"></span>
                                                </div>
                                            @endif
                                            <div id="payable-wrapper" class="text-success fw-bold d-none">
                                                <span class="font-24" id="price"></span>
                                                <span class="mdi mdi-currency-bdt font-24 fw-bold p-0"></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12">

                                    <input type="text" name="purchasable_type" value="{{ $model }}" hidden>
                                    <input type="text" name="purchasable_id" value="{{ $id }}" hidden>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <x-backend.form.text-input name="name" label="Full Name"
                                                placeholder="Full Name"
                                                value="{{ auth()->user() ? auth()->user()->name : '' }}" required />

                                        </div>
                                        <div class="col-md-6">

                                            <x-backend.form.text-input name="phone" label="Contact No."
                                                placeholder="Contact No."
                                                value="{{ auth()->user() ? auth()->user()->phone : '' }}" required />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-lg-3 col-4 mb-2">
                                                    <label class="form-label mb-0" for="pay-later-switch">Pay Later</label>
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" name="pay_later" class="form-check-input"
                                                            id="pay-later-switch">

                                                    </div>
                                                </div>
                                                <div class="col-lg-9 col-8 payment_field">
                                                    <x-backend.form.text-input class="" type="number"
                                                        name="paid_amount" label="Amount To Pay(৳)" placeholder="0.00 ৳" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 payment_field">
                                            <div class="row">
                                                <div class="col-6">
                                                    <x-backend.form.text-input type="text" name="payment_number"
                                                        label="Payment Number" placeholder="Number You Have Paid From" />
                                                </div>
                                                <div class="col-6">
                                                    <x-backend.form.select-input label="Payment Method"
                                                        name="payment_method" placeholder="Choose Payment Method">
                                                        <option value="bkash">Bkash</option>
                                                        <option value="nagad">Nagad</option>
                                                        <option value="rocket">Rocket</option>
                                                    </x-backend.form.select-input>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row payment_field">
                                        <div class="col-md-6">
                                            <x-backend.form.text-input name="trx_id" label="Trx ID"
                                                placeholder="Trx ID" />
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="flex-grow-1">
                                                    <label for="promo-code">Promo Code</label>
                                                    <input id="promo-code" class="form-control" name="promo_code"
                                                        placeholder="Promo Code" />
                                                    <span id="promo-code-message" class="text-danger ms-2"></span>
                                                </div>
                                                <button onclick="code.apply()" type="button"
                                                    class="btn btn-warning h-100">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary rounded rounded-3">Submit Payment</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>


    @push('customJs')
        <script>
            let code = {}
            $(document).ready(function() {
                code = {
                    data: function() {
                        let promo = $("input[name='promo_code']").val();
                        let price = $("#record-price").text();
                        price = parseFloat(price).toFixed(2);
                        return {
                            code: promo,
                            price: parseFloat(price)
                        };
                    },
                    hasApplied: false,
                    message: $('#promo-code-message'),
                    apply: function() {
                        if (!this.hasApplied) {
                            this.sendRequest()
                        }
                    },
                    sendRequest: function() {
                        $.ajax({
                            url: "{{ route('ajax.promo.apply') }}",
                            method: "POST",
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            data: code.data(),
                            // dataType: "json",
                            // contentType: "json",
                            success: function(response) {
                                if (response.success) {
                                    let message = response.message
                                    code.message
                                        .text(message)
                                        .toggleClass('text-danger')
                                        .toggleClass('text-success')
                                    $('#payable-wrapper')
                                        .removeClass('d-none')
                                        .find('#price')
                                        .text(response.data.payable)
                                    $('.prev-price').addClass('line-through')
                                    $('input[name="discount"]').val(response.data.discount)
                                    $('input[name="payable"]').val(response.data.payable)
                                    $('input[name="is_promo_code_applied"]').val(true)
                                    code.hasApplied = true
                                }
                            },
                            error: function(error) {
                                console.log(error);
                                if (error.status === 401 || error.statusText === 'Unauthorized') {
                                    let message = 'Please login to apply promo code !'
                                    code.message.text(message)
                                }
                                if (error.status === 404) {
                                    code.message.text(error.responseJSON.message).addClass(
                                        'text-danger')
                                }
                            }
                        });
                    }
                }

                // TODO: Hide some feilds upon paylater enabled
                $('#pay-later-switch').on('change', function(e) {
                    $('.payment_field').toggle()
                })


            });
        </script>
    @endpush
@endsection
