@extends('backend.layouts.app')

@section('content')
    <x-backend.ui.breadcrumbs :list="['User', 'Update']" />
    <x-backend.ui.section-card name="Profile">
        <form action="{{ route('user-profile.update', auth()->id()) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row align-items-center">
                <div class="col-md-3 justify-self-center">
                    <div class="row justify-content-center align-items-center gap-2">
                        <label class="col-sm-12" style="max-width: 320px" for="imagefile">
                            <input
                                class="form-control
                            @error('profile_img')
                            is-invalid
                            @enderror"
                                type="file" id="imagefile" name="profile_img" hidden>
                            <div class="relative">
                                <img class="border border-5 border-primary" id="liveImage"
                                    style=" height:100%; width:100%; border-radius:50%;"
                                    src="{{ useImage($user->image_url) === 'null' ? 'https://api.dicebear.com/6.x/initials/svg?seed=' . auth()->user()->name : useImage($user->image_url) }}"
                                    alt="{{ auth()->user()->name }}">
                                <div class="d-flex justify-content-center">
                                    <span
                                        style="
                                    font-size: 24px;
                                    margin-top:-40px;
                                    "
                                        class="mdi mdi-image-edit text-primary absolute bottom-0"></span>
                                </div>
                            </div>
                            @error('profile_img')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </label>
                        <div style="max-width: max-content;" class="text-center col-sm-12">
                            <p class="font-weight-bold mb-1">{{ $user->name }}</p>
                            <p class="text-black-50 mb-1">{{ $user->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6"><label class="labels">Name<span style="color:red;">*</span></label><input
                                name="name" type="text"
                                class="form-control 
                            @error('name')
                            is-invalid
                            @enderror"
                                placeholder="fullname" value="{{ $user->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-md-6"><label class="labels">Username<span style="color:red;">*</span></label><input
                                name="user_name" type="text"
                                class="form-control 
                            @error('user_name')
                            is-invalid
                            @enderror
                            "
                                value="{{ $user->user_name }}" placeholder="username">
                            @error('user_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Mobile Number<span
                                    style="color:red;">*</span></label><input name="phone" type="number"
                                class="form-control
                            @error('phone')
                            is-invalid
                            @enderror
                            "
                                placeholder="phone number" value="{{ $user->phone }}">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="col-md-6"><label class="labels">E-mail <span style="color:green;"><small>
                                        verified</small></span></label><input name="email" type="email"
                                class="form-control" placeholder="email" value="{{ $user->email }}"></div>
                    </div>
                    <div class="mt-3"><button class="btn btn-primary profile-button" type="submit">Update
                            Profile</button></div>
                </div>
        </form>
    </x-backend.ui.section-card>
@endsection
