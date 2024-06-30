@extends('frontend.layouts.app')

@section('main')
    @push('customCss')
    @endpush
    {{-- Services --}}
@section('main')
    <div class="container">
        <h4 class="mt-5 mb-3 text-center" style="font-size:28px; font-weight:600;">Purchase Items
        </h4>

        <div
            class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 items-center justify-center gap-4 mb-3">
            @forelse ($purchaseItem  as $item)
                <div class="w-100 h-100 rounded-2" style="overflow: hidden;">
                    <div class="align-items-center border p-3">
                        <div class="row gap-4 align-items-center justify-content-center mb-3">
                            <div
                                class="d-flex {{ $item->due >= 1 ? 'justify-content-between gap-2' : 'justify-content-center' }}  align-items-center">
                                <div
                                    class="py-2 fw-bold text-center {{ $item->approved == 1 ? 'text-success' : 'text-danger' }}">
                                    {{ $item->approved == 1 ? 'Approved' : ($item->due >= 1 ? 'Waiting for Payment' : 'Waiting for Approval') }}
                                </div>
                                @if ($item->due >= 1)
                                    <a href="{{ route('payment.create', ['model' => $item->purchasable_type, 'id' => $item->purchasable_id, 'purchase_id' => encrypt($item->id)]) }}"
                                        class="btn btn-primary text-white" style="font-weight: 500;">Pay
                                        Now</a>
                                @endif

                            </div>
                        </div>
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
                        {{-- <div class="text-muted text-start">
                                Expire Date:
                                <b>{{ $item->expire_date ? \Carbon\Carbon::parse($item->expire_date)->format('d F, Y') : 'After Approval' }}</b>
                            </div> --}}
                    </div>
                    <div class="!bg-primary p-3 w-full">
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
            @empty
                <div class="row col-span-full">
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


@push('customJs')
    {{-- <script>
        $('.swal-modal-btn').click(e => {
            e.preventDefault()
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(e.target).parent().submit()
                }
            })
        })
    </script> --}}
@endpush
@endsection
