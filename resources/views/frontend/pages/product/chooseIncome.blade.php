@extends('frontend.layouts.app')

@pushOnce('customCss')
    <style>
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
    <div id="app_header">
        <div class="container">
            <div class="row">
                <div class="app_header_content text-center">
                    <h2>What are your sources of income?</h2>
                </div>
            </div>
            <div class="custom-grid">
                @foreach (range(1, 6) as $item)
                    <label
                        class="bg-light d-flex justify-content-center align-items-center border rounded position-relative">
                        <input type="checkbox" name="income_source" class="position-absolute top-0 end-0">
                        <div class="text-dark d-flex flex-column align-items-center">
                            <img loading="lazy" src="{{ asset('frontend/assets/images/Frame.png') }}" width="80" height="60"
                                alt="">
                            <h6 class="text-center">Lorem Ipsum</h6>
                        </div>
                    </label>
                @endforeach
            </div>
            <h2 class="text-center mt-5">
                Complete Your Transaction Safely
            </h2>

        </div>
    </div>



    <div id="order_form">
        <div class="container">
            <div class="row">
                @if (Auth::user())
                    <div class="col-lg-12">
                        <div class="row">

                            <div class="col-lg-12 mt-3">
                                <label for="partialPayment">Partial Payment</label>
                                <input type="checkboX" id="partialPayment">
                            </div>

                            <div class="col-lg-12" id="payment_form" style="display: block">

                                <div class="row">
                                    <div class="col-lg-6 mt-3">
                                        <div class="form-group">
                                            <label for="billing_type">Billing Type</label>
                                            <select name="billing_type" id="billing_type" class="form-control">
                                                <option value="onetime">onetime</option>
                                                <option value="monthly">monthly</option>
                                                <option value="yearly">yearly</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <div class="form-group">
                                            <label for="payment_method">Payment Method</label>
                                            <select name="payment_method" id="payment_method" class="form-control">
                                                <option value="card">Card</option>
                                                <option value="bank">Bank</option>
                                                <option value="rocket">Rocket</option>
                                                <option value="nagad">Nagad</option>
                                                <option value="bkash">Bkash</option>
                                                <option value="cash">Cash</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <div class="form-group">
                                            <label for="is_promo_code_applied">Promo Code</label>
                                            <input type="text" name="is_promo_code_applied" class="form-control" placeholder="Promo Code">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <div class="form-group">
                                            <label for="contact_number">Contact Number</label>
                                            <input type="number" name="contact_number" class="form-control" placeholder="Contact Number">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <div class="form-group">
                                            <label for="payable_amount">Payable Amount</label>
                                            <input type="number" name="payable_amount" class="form-control" placeholder="Payable Amount">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <div class="form-group">
                                            <label for="paid">Paid</label>
                                            <input type="number" name="paid" class="form-control" placeholder="Paid">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <div class="form-group">
                                            <label for="due">Due</label>
                                            <input type="number" name="due" class="form-control" placeholder="Due">
                                        </div>
                                    </div>
                                    

                                </div>

                            </div>

                            <div class="col-lg-12" id="duePaymentDate" style="display: none">
                                <div class="form-group">
                                    <label for="">Due Date</label>
                                    <input type="date" class="form-control" name="due_date">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                @else
                @endif
            </div>
        </div>
    </div>

    @push('customJs')
        <script>
            $(document).ready(function() {
                $('#partialPayment').on('click', function() {
                    $('#payment_form').toggle()
                })
            })

            $(document).ready(function() {
                var paymentFormVisible = false; // Initialize to hidden state

                $('#partialPayment').click(function() {
                    paymentFormVisible = !paymentFormVisible; // Toggle the state
                    $('#payment_form').css('display', paymentFormVisible ? 'none' : 'block');
                    $('#duePaymentDate').css('display', paymentFormVisible ? 'block' : 'none');
                });
            });
        </script>
    @endpush
@endsection
