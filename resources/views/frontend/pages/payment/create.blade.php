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

        .border-focus-2:focus {
            border-width: 2px !important;
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
            <div class="container my-3">
                <div class="row">
                    <div class="mb-2 text-center">
                        <h3>What are your sources of income?</h3>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @forelse ($incomeSources as $item)
                        <div class="col-6 col-sm-4 col-md-3 col-xl-2 mb-2">
                            <label
                                class="bg-light d-flex justify-content-center align-items-center border rounded position-relative p-2"
                                for="income-{{ $item->id }}">
                                <input id="income-{{ $item->id }}" type="checkbox" name="income_source[]"
                                    class="position-absolute top-0 end-0" value="{{ $item->title }}">
                                <div class="text-dark d-flex flex-column align-items-center ">
                                    <img loading="lazy" class="rounded mb-2" src="{{ useImage($item->image) }}"
                                        width="64" height="64" alt="" style="object-fit: cover;">
                                    <h6 class="text-center">{{ $item->title }}</h6>
                                </div>
                            </label>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="bg-light text-center">
                                <div class="d-flex flex-column justify-content-center rounded" style="height: 30vh;">
                                    No sources added by admin!
                                </div>
                            </div>
                        </div>
                    @endforelse
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
                                        @foreach ($paymentMethods as $payment)
                                            <div>
                                                <span class="fw-medium me-2 text-capitalize"
                                                    style="color: #e2136e;">{{ $payment->method }}:</span>
                                                <span class="fw-medium">{{ $payment->number }}</span>
                                            </div>
                                        @endforeach
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
                                <div class="row my-3 justify-content-center">
                                    <div class="col-md-10">
                                        <div class="row my-2">
                                            <label for="amoutn-to-pay" class="d-block fs-3 fw-medium">Amount To Pay</label>
                                            <input id="amount-to-pay" name="paid_amount" type="text"
                                                value="{{ $record->price }}"
                                                class=" text-center border-success rounded-3 fs-2 fw-bold py-5">
                                        </div>

                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="purchasable_type" value="{{ $model }}" hidden>
                                        <input type="text" name="purchasable_id" value="{{ $id }}" hidden>
                                        <div class="row">
                                            <div class="col-12">
                                                @if (auth()->user() === null)
                                                    <h6 class="text-success text-center fw-bold fs-5">Please create an account to
                                                        perform this action</h6>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <div class="font-18 fw-bold my-3 text-center">General Information</div>
                                                <x-backend.form.text-input name="name" label="Full Name"
                                                    placeholder="Full Name" value="{{ auth()->user()?->name }}" required />

                                                <x-backend.form.text-input name="phone" label="Contact No."
                                                    placeholder="Contact No." value="{{ auth()->user()?->phone }}"
                                                    required />

                                                <x-backend.form.text-input type="email" name="email" label="Email"
                                                    placeholder="Email" value="{{ auth()->user()?->email }}" required />
                                            </div>
                                            <div class="col-md-6" id="transaction-info">
                                                <div class="font-18 fw-bold my-3 text-center">Transaction Information</div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <x-backend.form.text-input type="text" name="payment_number"
                                                            label="Payment Number"
                                                            placeholder="Number You Have Paid From" />
                                                    </div>

                                                    <div class="col-md-6">
                                                        <x-backend.form.text-input name="trx_id" label="Trx ID"
                                                            placeholder="Trx ID" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <x-backend.form.select-input label="Payment Method"
                                                            name="payment_method" placeholder="Choose Method">
                                                            <option value="bkash">Bkash</option>
                                                            <option value="nagad">Nagad</option>
                                                            <option value="rocket">Rocket</option>
                                                        </x-backend.form.select-input>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="d-flex align-items-center gap-3">
                                                            <div class="flex-grow-1">
                                                                <label for="promo-code">Promo Code</label>
                                                                <input id="promo-code" type="text"
                                                                    class="form-control border-focus-2 py-2 px-3"
                                                                    name="promo_code" placeholder="Promo Code" />
                                                                <span id="promo-code-message"
                                                                    class="text-danger ms-2"></span>
                                                            </div>
                                                            <button onclick="code.apply()" type="button"
                                                                class="btn btn-warning h-100 py-2 px-3">Apply</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (auth()->user() === null)
                                                <div class="col-12">
                                                    <div class="row px-0">
                                                        <div class="mb-3 col-md-6">
                                                            <label for="password" class="form-label">Password</label>
                                                            <div class="input-group input-group-merge">
                                                                <input type="password" id="password"
                                                                    class="form-control @error('password')
                                                                is-invalid
                                                        @enderror"
                                                                    placeholder="Enter your password" name="password">
                                                                <div class="input-group-text" data-password="false">
                                                                    <span class="password-eye"></span>
                                                                </div>
                                                            </div>
                                                            @error('password')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3 col-md-6">
                                                            <label for="confirm_password" class="form-label">Confirm
                                                                Password</label>
                                                            <div class="input-group input-group-merge">
                                                                <input type="confirm_password" id="confirm_password"
                                                                    class="form-control @error('confirm_password')
                                                                is-invalid
                                                        @enderror"
                                                                    placeholder="Confirm your password"
                                                                    name="confirm_password">
                                                                <div class="input-group-text" data-password="false">
                                                                    <span class="password-eye"></span>
                                                                </div>
                                                            </div>
                                                            @error('confirm_password')
                                                                <div class="text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="col-12">
                                                <div class="d-flex gap-3 justify-content-center align-items-center">
                                                    <x-backend.ui.button data-bs-toggle="modal"
                                                        data-bs-target="#pay-later-modal" type="custom"
                                                        class="btn-outline-primary fw-medium p-3">Pay
                                                        Later</x-backend.ui.button>
                                                    <x-backend.ui.button type="submit"
                                                        class="btn-primary fw-medium p-3">Buy
                                                        Now</x-backend.ui.button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>

    <!-- Center modal for pay later -->
    <div class="modal fade" id="pay-later-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('payment.later') }}" method="post" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title" id="">Please fill out this form</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (auth()->user() === null)
                        <h6 class="text-success text-center fw-medium">Please create an account to perform this action</h6>
                    @endif
                    <input type="text" name="purchasable_type" value="{{ $model }}" hidden>
                    <input type="text" name="purchasable_id" value="{{ $id }}" hidden>
                    <x-backend.form.text-input name="name" label="Full Name" placeholder="Full Name"
                        value="{{ auth()->user()?->name }}" required />

                    <x-backend.form.text-input name="phone" label="Contact No." placeholder="Contact No."
                        value="{{ auth()->user()?->phone }}" required />

                    <x-backend.form.text-input name="email" label="Email" placeholder="Email"
                        value="{{ auth()->user()?->email }}" required />

                    @if (auth()->user() === null)
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password"
                                    class="form-control @error('password')
                                        is-invalid
                                    @enderror"
                                    placeholder="Enter your password" name="password">
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                            </div>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm
                                Password</label>
                            <div class="input-group input-group-merge">
                                <input type="confirm_password" id="confirm_password"
                                    class="form-control @error('confirm_password')
                                        is-invalid
                                    @enderror"
                                    placeholder="Confirm your password" name="confirm_password">
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                            </div>
                            @error('confirm_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif



                </div>
                <div class="modal-footer">

                    <x-backend.ui.button type="button" class="btn-light fw-medium py-2 px-3 mx-2 border"
                        data-bs-dismiss="modal" aria-label="Close">Close</x-backend.ui.button>
                    <x-backend.ui.button type="submit"
                        class="btn-primary fw-medium py-2 px-3 mx-2">Submit</x-backend.ui.button>
                </div>
            </form><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


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
                                    $('input[name="paid_amount"]').val(response.data.payable)
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
                $('#pay-later').on('change', function(e) {
                    $('#transactaction-info').toggle()
                })


            });
        </script>
    @endpush
@endsection
