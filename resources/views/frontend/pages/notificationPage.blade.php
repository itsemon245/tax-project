@extends('frontend.layouts.app')
@section('main')
    <div class="container">
        <div class="row">
            <h3 class="text-center p-3">Notifications</h3>
            <div class="col-md-2"></div>
            <div class="col-md-8 overflow-scroll"  style=" height:400px;">
                @forelse (range(1,2) as $item)
                    <div class="card show w-100 mb-3" role="alert" aria-live="assertive" aria-atomic="true" >
                        <div class="card-header bg-primary text-white">
                            <img src="{{ asset('backend/assets/images/users/user-6.jpg') }}" alt="" height="30" class="me-1 rounded-circle shadow">
                            <strong class="me-auto">Md. Parvez | <span>New Promo Code.</span></strong>
                            <small>11 mins ago</small>
                            <button type="button" class="btn-close ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="card-body">
                            Hello, world! This is a toast message.
                        </div>
                    </div>
                @empty
                    <h4 class="text-cetner bg-light">No Notification here....</h4>
                @endforelse
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection

