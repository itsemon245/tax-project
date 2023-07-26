@extends('frontend.layouts.app')
@section('main')
    <div class="container">
        {{-- {{ dd($user->promoCodes[0]) }} --}}
        <h2 class="mt-2 mb-2 p-3">All Promo Codes Here: </h2>
        <div class="row mt-3">
            @foreach ($user->promoCodes as $code)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class=" mt-4 d-flex justify-content-center border-bottom">CODE : <span class="text-success">{{ $user->promoCodes[0]->code }}</span></h3>
                        <div class="d-flex justify-content-around">
                            <p class="d-flex justify-content-center mt-0">Expire : <span class="text-muted"> {{ $user->promoCodes[0]->expired_at }}</span></p>
                            <p class="d-flex justify-content-center mt-0">Limit : <span class="text-muted"> {{ $user->promoCodes[0]->pivot->limit }} </span></p>
                        </div>
                    </div>
                    <span class="mdi mdi-graph-outline p-0 m-0" style="color: var(--bs-gray-500);position: absolute;top:0;right:4px;"></span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
@push('customCss')
    <style>
        .copy-btn{
            cursor: pointer;
            transition: all 150ms ease-in;
        }
        .copy-btn:hover {
            /* color: var(--bs-success); */
            scale: 1.05;
            background: var(--bs-gray-300)!important;
        }
    </style>
@endpush

