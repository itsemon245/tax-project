@extends('frontend.layouts.app')
@section('main')
    @php
        $withdrwalAmount = \App\Models\Setting::first()->reference->withdrawal;
        $canWithdraw = auth()->user()->remaining_temp_commission >= $withdrwalAmount;
    @endphp
    <div class="container">
        <div class="row">
            <h4 class="text-center my-3">My Referals</h4>
            <div class="col-md-4 mt-5 card bg-success bg-gradient text-white">
                <div class="p-4 card-body">
                    <p>Available Commissions Balance</p>
                    <h2 class="mt-3 text-center">{{ auth()->user()->remaining_temp_commission }}</h2>
                    <hr class="bg-light my-4">
                    <div class="d-flex justify-content-between">
                        <p>Total Commission</p>
                        <p>{{ auth()->user()->total_temp_commission }} TK</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Total Amount Withdrawn</p>
                        <p>{{ auth()->user()->withdrawn_temp_commission }} TK</p>
                    </div>
                    <div class="d-flex justify-content-between ">
                        <p class="fw-medium text-warninig">Minmum withdrawl limit</p>
                        <p class="fw-medium text-warninig">{{ $withdrwalAmount }} TK</p>
                    </div>
                    @if ($canWithdraw)
                        <button type="button" data-bs-toggle="modal" data-bs-target="#centermodal"
                            class="w-100 btn rounded-3 shadow d-flex align-items-center justify-content-center gap-3 bg-dark text-light mt-3 "
                            style="font-weight: 500;">
                            <span class="mdi mdi-cash p-0 m-0"></span> Request Withdrawl
                        </button>
                        <div class="modal fade" id="centermodal" tabindex="-1" style="display: none;" aria-modal="true"
                            role="dialog">
                            <div class="modal-dialog modal-dialog-centered" style="max-width: 40rem;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title text-dark" id="myCenterModalLabel">Make an widthdrawl</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-dark">
                                        <form action="{{ route('withdrawal.store') }}" method="post" class="row">
                                            @csrf
                                            <div class="col-md-12">
                                                <div class="">
                                                    <x-backend.form.select-input id="account_type" label="Account Type"
                                                        name="account_type" placeholder="Choose One...">
                                                        <option value="bkash">Bkash (Personal)</option>
                                                        <option value="nagad">Nagad (Personal)</option>
                                                        <option value="rocket">Rocket (Personal)</option>
                                                    </x-backend.form.select-input>
                                                </div>
                                                <x-backend.form.text-input type="text" hidden class="d-none"
                                                    name="user_id" :value="auth()->id()" required />
                                            </div>

                                            <div class="col-md-6 ">
                                                <x-backend.form.text-input type="number" name="account_no"
                                                    label="Account No" required />
                                            </div>
                                            <div class="col-md-6 ">
                                                <x-backend.form.text-input type="number" name="amount" label="Amount"
                                                    required />
                                            </div>
                                            <div class="mt-4 mb-4">
                                                <x-backend.ui.button class="btn-sm btn-primary">
                                                    Submit
                                                </x-backend.ui.button>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                    @else
                        <p
                            class="btn rounded-3 shadow d-flex align-items-center justify-content-center gap-3 bg-dark text-warning fw-medium mt-3">
                            <span>You need at least {{ $withdrwalAmount }}</span>
                            <span class="mdi mdi-currency-bdt font-16"></span>
                        </p>
                    @endif
                </div>
            </div>
            <div class="col-md-8 mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="text-success mt-4 d-flex justify-content-center">0</h1>
                                <p class="d-flex justify-content-center mt-0">Singups</p>
                            </div>
                            <span class="mdi mdi-graph-outline p-0 m-0"
                                style="color: var(--bs-gray-500);position: absolute;top:0;right:4px;"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="text-success mt-4 d-flex justify-content-center">0</h1>
                                <p class="d-flex justify-content-center mt-0">Conversation</p>
                            </div>
                            <span class="mdi mdi-account-cash p-0 m-0"
                                style="color: var(--bs-gray-500);position: absolute;top:0;right:4px;"></span>
                        </div>
                    </div>
                </div>
                <div class="card refer-link bg-success bg-gradient">
                    <div class="card-body">
                        <div class="container p-3">
                            <p class="text-light">
                                Your Unique Referral Link :
                            </p>
                            <div class="d-flex gap-2">
                                <div class="bg-light bg-gradient p-3 rounded shadow-sm">
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
            <h2 class="mt-5 mb-2">Your Referals</h2>
            <table class="table table-responsive text-dark mb-5">
                <thead>
                    <tr>
                        <th class="fw-bold">No.</th>
                        <th class="fw-bold">Referal</th>
                        <th class="fw-bold">Joined At</th>
                        <th class="fw-bold">Commision(%)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse (auth()->user()->referees as $key=> $referee)
                        <tr>
                            <td>
                                {{ $key + 1 }}
                            </td>
                            <td>
                                <div class="d-flex gap-2 align-items-start">
                                    <img loading="lazy" class="rounded rounded-circle" src="{{ useImage($referee->user->image_url) }}"
                                        width="48px" height="48px" style="object-fit: cover;" alt="">
                                    <div>
                                        <div class="fw-bold">{{ $referee->user->name }}</div>
                                        <div class="fw-medium">{{ $referee->user->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $referee->user->created_at->format('d M, Y') }}</td>
                            <td>
                                <div>
                                    {{ $referee->commission }}
                                    <span class="mdi mdi-percent-outline font-16"></span>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-muted text-center">No refereals yet</td>
                            </td>
                    @endforelse
                </tbody>
            </table>
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
