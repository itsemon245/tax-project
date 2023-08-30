@extends('frontend.layouts.app')
@section('main')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-4 mt-5 card bg-success bg-gradient text-white">
                <div class="p-4 card-body">
                    <p>Available Commissions Balance</p>
                    <h2 class="mt-3">443 Tk.</h2>
                    <hr class="bg-light my-4">
                    <div class="text-light" style="font-size: 14px;">
                        <div class="d-flex justify-content-between">
                            <p>Commissions Pending</p>
                            <p>443 TK</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Total Amount Withdrawn</p>
                            <p>443 TK</p>
                        </div>
                        <a class="btn rounded-3 shadow d-flex align-items-center justify-content-center gap-3 bg-light bg-gradient text-success"
                            style="font-weight: 500;">
                            <span class="mdi mdi-cash p-0 m-0"></span> Request Withdrawl
                        </a>
                    </div>
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
                                <div class="copy-btn bg-light text-center py-2 px-3 rounded shoadow-sm">
                                    <span class="mdi mdi-content-copy">

                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="mt-3">Your Refereals</h2>
            <div class="card p-2">
                <table class="table mt-3 text-dark">
                    <tbody>
                        @forelse ($referees as $referee)
                            <tr>
                                <td>{{ $referee->user->name }}</td>
                                <td>43</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-muted text-center">No refereals yet</td>
                                </td>
                        @endforelse
                    </tbody>
                </table>
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
