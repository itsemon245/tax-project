@extends('frontend.layouts.app')

@section('main')
    @push('customCss')
    @endpush
    <x-frontend.hero-section :banners="$banners" />
    {{-- Services --}}
    <section class="px-lg-5 px-2 my-5">
        <h4 class="text-center my-5" style="font-size:28px; font-weight:600;">Purchase Items
        </h4>
        <div class="row justify-content-center px-3">
            @foreach ($purchaseItem as $item)
                @php
                    $model = app('App\Models\\' . $item->purchasable_type);
                    $modelTableRowID = $model::find($item->id);
                @endphp
                <div class="col-sm-6 col-md-4 col-xl-3 mb-3">
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
                </div>
            @endforeach
        </div>
    </section>
    @push('customJs')
    @endpush
@endsection
