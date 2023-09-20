@extends('frontend.layouts.app')
@section('main')
    <div class="container my-5">
        <h4 class="text-center mb-3">Update Profile</h4>
        <form action="{{ route('user-profile.update', auth()->id()) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row justify-content-center align-items-center px-2">
                <div class="col-md-4">
                    <label class="d-flex justify-content-center" for="imagefile">
                        <input
                            class="form-control
                        @error('profile_img')
                        is-invalid
                        @enderror"
                            type="file" id="imagefile" name="avatar" hidden>
                        <div class="relative">
                            <img loading="lazy" class="border rounded rounded-circle border-5 border-primary" id="liveImage"
                                style="height:220px; width:220px;object-fit:cover;aspect-ratio:1;"
                                src="{{ useImage($user->image_url) }}" alt="">
                            <div class="d-flex justify-content-center">
                                <span
                                    style="
                                    font-size: 24px;
                                    margin-top:-40px;
                                    "
                                    class="mdi mdi-image-edit text-primary absolute bottom-0"></span>
                            </div>
                            <div class="text-center fw-medium mt-2">Avatar</div>
                        </div>


                    </label>
                    @error('profile_img')
                        <div class="text-danger text-center">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-7 col-lg-6">
                    <div class="row mb-2 mt-2 mt-md-0">
                        <div class="col-md-6">
                            <x-backend.form.text-input name="name" label="Full Name" :value="$user->name" />
                        </div>
                        <div class="col-md-6">
                            <x-backend.form.text-input name="user_name" label="User Name" :value="$user->user_name" />
                        </div>
                        <div class="col-md-6">
                            <x-backend.form.text-input type='number' :value="$user->phone" name="phone"
                                label="Contact Number" />
                        </div>
                        <div class="col-md-6">
                            <x-backend.form.text-input type='email' :value="$user->email" name="email" label="Email" />
                        </div>
                    </div>

                    <button class="btn btn-primary profile-button" type="submit">Update
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('customJs')
    {{-- Photo Preview for uploads --}}
    <script>
        $(document).ready(function() {

            const input = $("#imagefile")
            input.on('change', e => {
                const image = document.querySelector('#liveImage')
                const url = URL.createObjectURL(e.target.files[0])
                image.src = url
            })
        });
    </script>
    {{-- Photo Preview for uploads --}}
@endpush
