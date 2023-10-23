@php
    $user_id = auth()->id();
    $user = App\Models\User::find($user_id);
    $setting = \App\Models\Setting::first();
    $notifications = $user
        ->notifications()
        ->latest()
        ->get(['id', 'data', 'type', 'read_at']);
    // dd($notifications);
    $isRead = count($user?->unreadNotifications) === 0;
@endphp
<style>
    .read>* {
        color: var(--ct-gray-800) !important;
        opacity: 0.6 !important;
    }
</style>

<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-end mb-0">


            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light">
                    <i class="fe-bell noti-icon"></i>
                    @if (!$isRead)
                        <span
                            class="badge bg-danger rounded-circle noti-icon-badge">{{ count($user?->unreadNotifications) }}</span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="my-0">
                                Notifications
                            </h5>
                            <div data-is-marked="{{ $isRead ? 'true' : 'false' }}" id="mark-notification-btn"
                                role="button"
                                class="d-inline-flex gap-2 align-items-center {{ $isRead ? 'read' : 'text-dark' }}">
                                <span class="mdi mdi-check-all font-16"></span>
                                <span class="font-14">Mark all as read</span>
                            </div>
                        </div>
                    </div>

                    <div class="noti-scroll" data-simplebar>


                        @forelse ($notifications as $key => $notification)
                            <!-- item-->
                            <a href="{{ $notification->data['url'] }}"
                                class="dropdown-item notify-item {{ $notification->read_at ? 'read' : 'unread' }}">
                                <div class="notify-icon">
                                    <img loading="lazy" src="{{ useImage($user->image_url) }}"
                                        class="img-fluid rounded-circle" alt="" />
                                </div>
                                <p class="notify-details">{{ $notification->data['title'] }}</p>
                                <p class="mb-0 user-msg">
                                    <small>{{ $notification->data['body'] }}</small>
                                </p>
                            </a>
                        @empty
                            <div class="text-muted text-center">No notifications to show</div>
                        @endforelse

                    </div>

                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                        View all
                        <i class="fe-arrow-right"></i>
                    </a>

                </div>
            </li>

            <li class="dropdown">
                <a class="d-flex align-items-center gap-2 text-light dropdown-toggle me-0 waves-effect waves-light" style="height: 70px;">
                    <img loading="lazy" src="{{ useImage($user->image_url) }}" width="32px" alt="user-image"
                        class="rounded-circle">
                    <div>
                        <span class="fw-bold">{{ $user->name }}</span>
                        <small class="d-block text-capitalize fw-medium text-warning">{{ $user->roles->first()->name }}</small>
                    </div>
                    {{-- <span class="pro-user-name ms-1">
                        {{ $user->name }} <i class="mdi mdi-chevron-down"></i>
                    </span> --}}
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">


                    <!-- item-->
                    <a href="{{ route('user-profile.index') }}" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>Profile</span>
                    </a>

                    <!-- item-->
                    <a href="{{ route('user-profile.edit', auth()->id()) }}" class="dropdown-item notify-item">
                        <i class="fe-lock"></i>
                        <span>Change Password</span>
                    </a>
                    <a href="{{ route('setting.index') }}" class="dropdown-item notify-item">
                        <i class="fa fa-cog"></i>
                        <span>Settings</span>
                    </a>

                    <div class="dropdown-divider"></div>
                    <!-- item-->
                    <a href="{{ route('home') }}" class="text-primary dropdown-item">
                        <span class="fs-5 mdi mdi-web"></span>
                        <span>View Website</span></a>

                    <!-- item-->
                    <form class="text-danger dropdown-item notify-item d-flex gap-2 align-items-center"
                        action="{{ route('logout') }}" method="post">
                        @csrf
                        <span class="fe-log-out"></span>
                        <x-backend.ui.button class="border-0 p-0 flex-grow-1 text-start">
                            Log out</x-backend.ui.button>
                    </form>

                </div>
            </li>



        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="{{ route('home') }}" class="logo logo-light text-center px-2">
                <span class="logo-sm">
                    <img loading="lazy" src="{{ useImage($setting->basic->logo) }}" alt=""
                        style="object-fit:cover;" width="80px;">
                </span>
                <span class="logo-lg">
                    <img loading="lazy" src="{{ useImage($setting->basic->logo) }}" alt=""
                        style="object-fit:cover;">
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li>
                <!-- Mobile menu toggle (Horizontal Layout)-->
                <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>

        </ul>
        <div class="clearfix"></div>

    </div>
</div>

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
