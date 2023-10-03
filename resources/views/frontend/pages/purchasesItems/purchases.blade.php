@extends('frontend.layouts.app')

@section('main')
    @push('customCss')
    @endpush
    {{-- Services --}}
    @section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <h4 class="my-5" style="font-size:28px; font-weight:600;">Purchase Items
                </h4>
            </div>
            <div class="col-sm-8 col-xl-3 mb-3">
            @forelse ($purchaseItem  as $item)
            @php
            $model = app('App\Models\\' . $item->purchasable_type);
            $modelTableRowID = $model::find($item->id);
            @endphp
            <div class="w-100 h-100">
                <div class="d-flex flex-column align-items-center border p-3">
                    <span class="text-muted text-start">
                        {{ $item->purchasable_type }}
                    </span>
                    <span class="text-dark text-capitalize" href="">
                        @if ($modelTableRowID->title)
                            <h6>{{ $modelTableRowID->title }}</h6>
                        @elseif($modelTableRowID->name)
                            <h6>{{ $modelTableRowID->name }}</h6>
                        @endif

                    </span>
                    <span class=" text-muted">
                        {{ $item->name }}
                    </span>
                    <span class=" text-muted">
                    Contact Number: {{ $item->contact_number }}
                    </span>
                    <span class="text-muted">
                        Transaction Id: {{ $item->trx_id }}
                    </span>
                    <span class="text-muted">
                        Payment Date: {{ $item->payment_date }}
                    </span>
                    <span  class=" text-muted">
                        Expire Date: {{ $item->expire_date }}
                    </span>
                </div>
                <div class="bg-primary p-2 custom-grid">
                    <span  class="mb-1 text-black d-block">
                        Payble Amount: {{ $item->payable_amount }}
                    </span>
                    <span class="mb-1 text-black  d-block">
                        Paid Amount: {{ $item->paid }}
                    </span>
                    <span class="mb-1 text-black  d-block">
                        Due Amount: {{ $item->due }}
                    </span>
                </div>
            </div>
            @empty
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8" style="max-width:800px;">
                    <img loading="lazy" src="{{ asset('frontend/assets/images/no_data.jpg') }}" style="height:100%;" class="img-fluid p-5" alt="Responsive image">
                </div>
                <div class="col-md-2"></div>
            </div>
            @endforelse
        </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    @endsection

    {{-- <section class="px-lg-12 px-2 my-5">

    </section> --}}
    @push('customJs')
    @endpush
@endsection
