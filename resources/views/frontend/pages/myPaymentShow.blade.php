@extends('frontend.layouts.app')
@section('main')
    <div class="container my-5">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h3 class="text-center text-muted">Show my payments:</h3>
        <div class="row">
            <div class="col-md-12 p-2">
                <h4>Product Name: 
                    {{ $history->name }}
                </h4>
            </div>
            <div class="col-md-4 mb-3 p-2">
                Contact Number: 
                {{ $history->contact_number }}
            </div>
            <div class="col-md-4 mb-3 p-2">
                Payment Method: 
                {{ $history->billing_type }}
            </div>
            <div class="col-md-4 mb-3 p-2">
                Payment Method:
                {{ $history->payment_number }}
            </div>
            <div class="col-md-4 mb-3 p-2">
                Payment Amount: 
                {{ $history->payment_amount }}
            </div>
            <div class="col-md-4 mb-3 p-2">
                TRX ID: 
                {{ $history->trx_id }}
            </div>
            <div class="col-md-4 mb-3 p-2">
                TRX ID: 
                {{ $history->payment_date }}
            </div>
            <div class="col-md-12 p-2">
                Status: 
                <span class="{{ $history->approved == 1 ? 'text-success' : 'text-danger' }}">{{ $history->approved == 1 ? 'Approved!' : 'Pendding!' }}</span>
            </div>
        </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
