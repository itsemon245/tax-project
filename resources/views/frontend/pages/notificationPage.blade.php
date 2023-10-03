@extends('frontend.layouts.app')
@php
    $user = request()->user();
    $notifications = $user
        ->notifications()
        ->latest()
        ->get(['id', 'data', 'type', 'read_at']);
    $isRead = count($user->unreadNotifications) === 0;
@endphp
@pushOnce('customCss')
    <style>
        .read>* {
            color: var(--ct-gray-800) !important;
            opacity: 0.6 !important;
        }
    </style>
@endPushOnce
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h3 class="">Notifications</h3>
                    <div data-is-marked="{{ $isRead ? 'true' : 'false' }}" id="mark-notification-btn" role="button"
                        class="d-inline-flex gap-2 align-items-center {{ $isRead ? 'read' : 'text-dark' }}">
                        <span class="mdi mdi-check-all font-16"></span>
                        <span class="font-14">Mark all as read</span>
                    </div>
                </div>
                @forelse (request()->user()->notifications as $notification)
                <div class="overflow-scroll" style=" height:400px;">
                        <div class="card show w-100 mb-3 {{ $isRead ? 'read' : 'unread' }}" role="alert" aria-live="assertive"
                            aria-atomic="true">
                            <div class="card-header bg-primary text-white">
                                <img loading="lazy" src="{{ asset('backend/assets/images/users/user-6.jpg') }}" alt="" height="30"
                                    class="me-1 rounded-circle shadow">
                                <strong class="me-auto">{{ $notification->data['title'] }}</span></strong>
                                <small>{{ Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</small>
                                <button type="button" class="float-end btn-close ms-2" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="card-body">
                                {{ $notification->data['body'] }}
                                <a href="{{ $notification->data['url'] }}">Explore more</a>
                            </div>
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
        </div>
    </div>
@endsection

@push('customJs')
    <script>
        $(document).ready(function() {
            let unRead = $('.unread')
            $('#mark-notification-btn').click(function() {
                let isMarked = this.dataset.isMarked === 'true'
                if (!isMarked) {
                    $.ajax({
                        type: "post",
                        url: "{{ route('ajax.notifications.read') }}",
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: (response) => {
                            $(this)
                                .toggleClass('read')
                            unRead
                                .toggleClass('read')
                                .toggleClass('unread')

                            // Toast.fire({
                            //     'title': 'Success',
                            //     'icon': 'success',
                            //     'text': response.message
                            // })
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                }
            })
        });
    </script>
@endpush
