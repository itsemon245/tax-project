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
                        <a class="btn rounded-3 shadow d-flex align-items-center justify-content-center gap-3 bg-light bg-gradient text-success" style="font-weight: 500;">
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
                                <h1 class="text-success mt-4 d-flex justify-content-center">2</h1>
                                <p class="d-flex justify-content-center mt-0">Singup's</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body ">
                                <h1 class="text-success mt-4 d-flex justify-content-center">4</h1>
                                <p class="d-flex justify-content-center mt-0">Conversation</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card refer-link bg-success bg-gradient">
                    <div class="card-body">
                        <div class="container p-3">
                            <span class="text-light">
                                Your Unique Referral Link :
                            </span>
                            <div class="mt-2">
                                <input type="text" placeholder="http:tax-project.wisedev.xyz/refer-link..."
                                    class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="mt-3">Your Refereals</h2>
            <div class="card p-2">
                <table class="table mt-3 text-dark">
                    <tbody>
                        <tr>
                            <td>Lorem ipsum dolor sit.</td>
                            <td>43</td>
                        </tr>
                        <tr>
                            <td>Lorem ipsum dolor sit.</td>
                            <td>43</td>
                        </tr>
                        <tr>
                            <td>Lorem ipsum dolor sit.</td>
                            <td>43</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('customCss')
    <style>
    </style>
@endpush
