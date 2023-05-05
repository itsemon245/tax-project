@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['User', 'Password', 'Change']" />

    <x-backend.ui.section-card name="Change Password">

        {{-- Select category option --}}
        <form action="{{ route('user-profile.changePassword') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-1">
                                        <x-backend.form.text-input type="text" name="old_password" label="Old Password" class="other classes" required />
                                    </div>
                                </div> <!-- end col -->
                                {{-- Add sub-category --}}
                                <div class="col-md-4">
                                    <div>
                                        <x-backend.form.text-input type="text" name="new_password" label="New Password" class="other classes" required />
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-md-4">
                                    <div>
                                        <x-backend.form.text-input type="text" name="confirm_new_password" label="Confirm New Password" class="other classes" required />
                                    </div>
                                </div> <!-- end col -->
                                <div class="mt-1"><button class="btn btn-primary w-100 btn-sm profile-button"
                                        type="submit">Update Password</button>
                                </div>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div>
            </div>
        </form>

    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
