@extends('frontend.layouts.app')
@section('main')
<form action="{{ route('user-profile.update', auth()->id()) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row align-items-center mx-5 my-5">
        <div class="col-md-2"></div>
        <div class="col-md-3 justify-self-center">
            <div class="row justify-content-center align-items-center gap-2">
                <label class="col-sm-12" style="max-width: 240%" for="imagefile">
                    <input
                        class="form-control
                    @error('profile_img')
                    is-invalid
                    @enderror"
                        type="file" id="imagefile" name="profile_img" hidden>
                    <div class="relative">
                        <img class="border border-5 border-primary" id="liveImage"
                            style=" height:100%; width:100%; border-radius:50%;"
                            src="{{ useImage($user->image_url) ? useImage($user->image_url) : 'https://api.dicebear.com/6.x/initials/svg'}} "
                            alt="">
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
                    <p class="font-weight-bold mb-1"></p>
                    <p class="text-black-50 mb-1"></p>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-6 my-2">
                    <x-backend.form.text-input name="name" label="Full Name" :value="$user->name"  required />
                </div>



                <div class="col-md-6 my-2">
                    <x-backend.form.text-input name="user_name" label="Username" :value="$user->user_name" disabled />
                </div>

            </div>
            <div class="row mt-3">
                <div class="col-md-6 my-2">
                    <x-backend.form.text-input type='number' :value="$user->phone" name="phone" label="Contact Number"
                         required />
                </div>

                <div class="col-md-6 my-2">
                    <x-backend.form.text-input type='email' :value="$user->email" name="email" label="Email" 
                        disabled />                      
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary profile-button" type="submit">Update
                        Profile
                    </button>
                </div>
            </div>

        </div>
</form>
@endsection
@push('customJs')
    <script src="{{ asset('backend/assets/js/instandphotochange.js') }}"></script>
@endpush









