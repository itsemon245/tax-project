@extends('frontend.layouts.app')
@section('main')
    <div class="container">
        <div class="row my-5">
            <h3 class="">Promo Codes</h3>
            <div class="d-flex flex-wrap gap-3 align-items-center justify-content-center mb-5">

                @forelse ($promoCodes as $code)
                    <div style="min-width: 250px;max-width:300px;">
                        <div class="card shadow-sm rounded-3">
                            <div class="card-body">
                                <div class="d-felx">
                                    <h4 class="my-2 d-flex gap-3 justify-content-center align-items-center border-bottom">CODE :
                                        <span class="text-success">{{ $code->code }}</span>
                                        <span style="color: var(--bs-gray-500);">
                                            <div class=" text-center ">
                                                <span class="copyButton mdi mdi-content-copy"
                                                    data-code="{{ $code->code }}"></span>
                                            </div>
                                        </span>
                                    </h4>
                                </div>
                                <div class="flex flex-col items-center">
                                    <h1 class="d-flex justify-content-center my-2">{{ $code->amount }} <span
                                            class="text-success fs-3">{!! $code->is_discount ? '%' : '&#2547;' !!}</span> </h1>
                                    <div>
                                        <p class="d-flex justify-content-start mt-0 mb-0 gap-2">Expire Date: <b
                                                class="font-bold">
                                                {{ \Carbon\Carbon::parse($code->expired_at)->format('F d, Y') }}</b></p>
                                        <p class="d-flex justify-content-start mt-0 mb-0 gap-2">Limit Remains: <span
                                                class="text-muted"> {!! $code->pivot->limit > 0 ? $code?->pivot?->limit : '<b class="text-danger">Exceded</b>' !!} </span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8" style="max-width:800px;">
                    <img loading="lazy" src="{{ asset('frontend/assets/images/no_data.jpg') }}" style="height:100%;"
                        class="img-fluid p-5" alt="Responsive image">
                </div>
                <div class="col-md-2"></div>
            </div>
            @endforelse
        </div>
    </div>
@endsection
@push('customJs')
    <script>
        $(".copyButton").each((i, btn) => {
            btn.addEventListener('click', function(e) {
                var textToCopy = e.target.dataset.code;
                navigator.clipboard.writeText(textToCopy);
                Toast.fire({
                    title: 'Copy to Clipboard',
                    icon: 'success'
                })
            });
        })
    </script>
@endpush
