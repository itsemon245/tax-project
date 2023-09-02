@extends('frontend.layouts.app')
@section('main')
@php
        $referees = App\Models\Referee::with('user')->where('parent_id', auth()->id())->get();
        $reference = App\Models\Referee::with('user')->where('parent_id', auth()->id())->first();
@endphp
    <div class="container">
        @if ($referees)
            @if ($reference)
                @php
                $parent = App\Models\User::find($reference->parent_id);
                @endphp
                @if ($parent->remaining_commission < 500)
                <div class="row mb-4">
                    <div class="col-md-4 mt-5 card bg-success bg-gradient text-white">
                        <div class="p-4 card-body">
                            <p>Available Commissions Balance</p>
                            <h2 class="mt-3 text-center">{{ $parent->total_commission - $parent->withdrawn_commission }} Tk.</h2>
                            <hr class="bg-light my-4">
                            <div class="text-light " style="font-size: 14px;">
                                <div class="d-flex mt-2 justify-content-between">
                                    <p>Total Amount Withdrawn</p>
                                    <p>{{ $parent->total_commission }} TK</p>
                                </div>
                                <a class="btn mt-5 rounded-3 shadow d-flex align-items-center justify-content-center gap-3 bg-light bg-gradient text-success"
                                    style="font-weight: 500;">
                                    <span class="mdi mdi-cash p-0 m-0"></span> Request Withdrawl
                                </a>
                            </div>
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
                            @forelse ($referees as $key=> $referee)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-start">
                                            <img class="rounded rounded-circle" src="{{ useImage($referee->user->image_url) }}"
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
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @else
                <div class="row">
                    <div class="col-md-4 mt-5 card bg-success bg-gradient text-white">
                        <div class="p-4 card-body">
                            <p>Available Commissions Balance</p>
                            <h2 class="mt-3 text-center">0.00 Tk.</h2>
                            <hr class="bg-light my-4">
                                <div class="d-flex justify-content-between">
                                    <p>Total Amount Withdrawn</p>
                                    <p>0.00 TK</p>
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
                @endif
            @else
            <div class="row">
                <div class="col-md-4 mt-5 card bg-success bg-gradient text-white">
                    <div class="p-4 card-body">
                        <p>Available Commissions Balance</p>
                        <h2 class="mt-3 text-center">0.00 Tk.</h2>
                        <hr class="bg-light my-4">
                            <div class="d-flex justify-content-between">
                                <p>Total Amount Withdrawn</p>
                                <p>0.00 TK</p>
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
            @endif
        @else
        <div class="row">
                    <div class="col-md-4 mt-5 card bg-success bg-gradient text-white">
                        <div class="p-4 card-body">
                            <p>Available Commissions Balance</p>
                            <h2 class="mt-3 text-center">0.00 Tk.</h2>
                            <hr class="bg-light my-4">
                                <div class="d-flex justify-content-between">
                                    <p>Total Amount Withdrawn</p>
                                    <p>0.00 TK</p>
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
        @endif
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
