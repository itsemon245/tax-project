@extends('frontend.layouts.app')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-5 card bg-success bg-gradient text-white">
                <div class="p-4 card-body">
                    <p>Available Commissions Balance</p>
                    <h2 class="mt-3 text-center">{{ auth()->user()->remaining_commission }}</h2>
                    <hr class="bg-light my-4">
                    <div class="d-flex justify-content-between">
                        <p>Total Commission</p>
                        <p>{{ auth()->user()->total_commission }} TK</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Total Amount Withdrawn</p>
                        <p>{{ auth()->user()->withdrawn_commission }} TK</p>
                    </div>
                    <a class="btn disabled rounded-3 shadow d-flex align-items-center justify-content-center gap-3 bg-danger bg-gradient text-light "
                        style="font-weight: 500;">
                        <span class="mdi mdi-cash p-0 m-0"></span> Request Withdrawl
                    </a>
                </div>
            </div>
            <div class="col-md-8 mt-5 pt-3 mb-4">
                <div class="card mt-5 refer-link bg-success bg-gradient">
                    <div class="card-body">
                        <div class="container p-3">
                            <p class="text-light">
                                Your Unique Referral Link :
                            </p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex gap-2 w-100">
                                        <div class="bg-light bg-gradient p-3 rounded shadow-sm w-100">
                                            {{ auth()->user()->refer_link }}
                                        </div>
                                        <div data-refer-link="{{ auth()->user()->refer_link }}"
                                            class="copy-btn bg-light text-center py-2 px-3 rounded shoadow-sm">
                                            <span class="mdi mdi-content-copy">
                                            </span>
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
@endsection
@push('customCss')
    <style>
        .copy-btn {
            cursor: pointer;
            transition: all 150ms ease-in;
        }

        .copy-btn:hover {
            /* color: var(--bs-success); */
            scale: 1.05;
            background: var(--bs-gray-300) !important;
        }
    </style>
@endpush
@push('customJs')
    <script>
        $(document).ready(function() {
            $('.copy-btn').on('click', function() {
                let textToCopy = this.dataset.referLink;
                navigator.clipboard.writeText(textToCopy);
                Toast.fire({
                    title: 'Copy to Clipboard',
                    icon: 'success'
                })
            });
        });
    </script>
@endpush
