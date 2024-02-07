@extends('frontend.layouts.app')

@section('main')
    @push('customCss')
    @endpush
    {{-- Services --}}
@section('main')
    <div class="container">
        <h4 class="mt-5 mb-3" style="font-size:28px; font-weight:600;">Purchase Items
        </h4>

        <div class="d-flex justify-content-start align-items-center gap-4 mb-3">
            @forelse ($purchaseItem  as $item)
                <div class="" style="width: max-content;">
                    <div class="w-100 h-100 rounded-2" style="overflow: hidden;">
                        <div class="align-items-center border p-3">
                            <span class="ms-auto fw-bold mb-2 {{ $item->approved == 1 ? 'text-success' : 'text-danger' }}">
                                {{ $item->approved == 1 ? 'Approved.' : 'Waiting for Approval.' }}</span>
                            <div class="text-muted text-start">
                                Purchase Type: <b>{{ $item->purchasable_type }}</b>
                            </div>
                            <div class="text-muted text-start">
                                {{ $item->purchasable_type }} Name:
                                <b>{{ $item?->purchasable?->title ?? $item?->purchasable?->name }}</b>
                            </div>
                            <div class="text-muted text-start">
                                Payment Date: <b>{{ \Carbon\Carbon::parse($item->payment_date)->format('d F, Y') }}</b>
                            </div>
                            <div class="text-muted text-start">
                                Transaction Id: <b>{{ $item->trx_id }}</b>
                            </div>
                            <div class="text-muted text-start">
                                Expire Date:
                                <b>{{ $item->expire_date ? \Carbon\Carbon::parse($item->expire_date)->format('d F, Y') : 'After Approval' }}</b>
                            </div>
                        </div>
                        <div class="bg-primary p-3 w-full">
                            <div class="w-full mb-1 text-black d-flex justify-contents-between">
                                Payble Amount: <b class="ms-auto"> {{ $item->payable_amount }} BDT</b>
                            </div>
                            <div class="w-full mb-1 text-black  d-flex justify-contents-between">
                                Paid Amount: <b class="ms-auto">{{ $item->paid ?? '0.00' }} BDT</b>
                            </div>
                            <div class="w-full mb-1 text-black  d-flex justify-contents-between">
                                Due Amount: <b class="ms-auto">{{ $item->due }} BDT</b>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <img loading="lazy" class="w-100" src="{{ asset('frontend/assets/images/no_data.jpg') }}"
                            style="height:100%;" class="img-fluid p-5" alt="Responsive image">
                    </div>
                    <div class="col-md-2"></div>
                </div>
            @endforelse
        </div>
    </div>
@endsection

{{-- <section class="px-lg-12 px-2 my-5">

    </section> --}}
@push('customJs')
@endpush
@endsection
