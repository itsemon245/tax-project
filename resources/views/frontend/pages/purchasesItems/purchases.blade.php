@extends('frontend.layouts.app')

@section('main')
    @push('customCss')
    @endpush
    {{-- Services --}}
@section('main')
    <div class="container">
        <h4 class="mt-5 mb-3 text-center" style="font-size:28px; font-weight:600;">Purchase Items
        </h4>

        <div class="d-flex justify-content-center align-items-center gap-4 mb-3">
            @forelse ($purchaseItem  as $item)
                <div class="h-100" style="width: max-content;">
                    <div class="w-100 h-100 rounded-2 h-100" style="overflow: hidden;">
                        <div class="align-items-center border p-3">
                            <div class="row gap-4 align-items-center justify-content-center mb-3">
                                <div style="width: max-content;">
                                    <div
                                        class="ms-auto fw-bold mb-2 text-center {{ $item->approved == 1 ? 'text-success' : 'text-danger' }}">
                                        {{ $item->approved == 1 ? 'Approved.' : 'Waiting for Approval.' }}
                                    </div>
                                    @if ($item->due > 0)
                                        <form action="{{ route('payment.pay.now', $item) }}" method="post"
                                            class="d-flex gap-4 align-items-center">
                                            @csrf
                                            <input class="form-control px-3 py-2 border-focus-2" style="width: 150px;"
                                                name="trx_id" label="Trx ID" placeholder="Trx ID" required />
                                            @error('trx_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <button class="btn btn-primary text-white" style="font-weight: 500;">Pay
                                                Now</button>
                                        </form>
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
