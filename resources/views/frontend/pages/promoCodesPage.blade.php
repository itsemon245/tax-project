@extends('frontend.layouts.app')
@section('main')
    <div class="container">
        <h2 class="mt-2 mb-2 p-3">All Promo Codes Here: </h2>
        <div class="row mt-3">
            @foreach ($user->promoCodes as $code)
            <div class="col-md-4 ">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-felx">
                            <h4 class="mb-2 d-flex justify-content-center mb-0 border-bottom">CODE : <span class="text-success">{{ $code->code }}</span></h4>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h1 class="d-flex justify-content-center mb-0">{{ $code->amount }} <span class="text-success fs-3">{!! $code->is_discount !== 1 ? '&#2547;' : '%' !!}</span> </h1>
                            </div>
                            <div class="col-md-9">
                                <p class="d-flex justify-content-start mt-0 mb-0">Expire : <span class="text-muted"> {{ \Carbon\Carbon::parse( $code->expired_at)->format('d-M-Y') }}</span></p>
                                <p class="d-flex justify-content-start mt-0 mb-0">Limit : <span class="text-muted"> {{ $code->pivot->limit }} </span></p>
                            </div>
                        </div>
                    </div>
                    <span style="color: var(--bs-gray-500);position: absolute;top:0;right:0;">
                        <div class=" text-center ">
                            <button class="btn" id="copyButton{{ $code->id }}"><span class="mdi mdi-content-copy"></span></button>
                        </div>
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
@push('customJs')
<script>
    document.getElementById('copyButton{{ $code->id }}').addEventListener('click', function() {
        var textToCopy = "{{ $code->code }}"; 
        var tempInput = document.createElement("input");
        tempInput.type = "text";
        tempInput.value = textToCopy;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
            document.body.removeChild(tempInput);
            alert("Copied Promo : " + textToCopy);
        }); 
    </script>
@endpush

