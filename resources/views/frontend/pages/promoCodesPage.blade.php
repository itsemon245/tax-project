@extends('frontend.layouts.app')
@section('main')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h3 class="p-4 text-muted" >Promo Code</h3>
            @forelse ($promoCodes as $code)
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-felx">
                            <h4 class="mb-2 d-flex justify-content-center mb-0 border-bottom">CODE : <span class="text-success">{{ $code->code }}</span></h4>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h1 class="d-flex justify-content-center mb-0">{{ $code->amount }} <span class="text-success fs-3">{!! $code->is_discount ? '%' : '&#2547;' !!}</span> </h1>
                            </div>
                            <div class="col-md-9">
                                <p class="d-flex justify-content-start mt-0 mb-0">Expire : <span class="text-muted"> {{ \Carbon\Carbon::parse( $code->expired_at)->format('d-M-Y') }}</span></p>
                                <p class="d-flex justify-content-start mt-0 mb-0">Limit : <span class="text-muted"> {{ $code->pivot->limit }} </span></p>
                            </div>
                        </div>
                    </div>
                    <span style="color: var(--bs-gray-500);position: absolute;top:0;right:0;">
                        <div class=" text-center ">
                            <span class="copyButton mdi mdi-content-copy" data-code="{{ $code->code }}"></span>
                        </div>
                    </span>
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
@push('customJs')
<script>
    $( ".copyButton" ).each( (i,btn)=> {
            btn.addEventListener('click', function(e) {
            var textToCopy = e.target.dataset.code; 
            navigator.clipboard.writeText(textToCopy);
            Toast.fire({
            title: 'Copy to Clipboard', icon: 'success'
            })
        }); 
    })
</script>
@endpush

