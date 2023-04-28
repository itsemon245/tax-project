@extends('backend.layouts.app')

@section('content')

<form action="{{ route('user-profile.update', auth()->id()) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')  
<div class="container rounded bg-white mb-5">
      <div class="row">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h4 class="text-right">Profile Update</h4>
        </div>
            <div class="col-md-3 mt-1 border-right">
                <label style="width: 9rem; height:9rem; margin-left: 3rem"  for="imagefile">
                    <input class="form-control
                    @error('profile_img')
                    is-invalid
                    @enderror
                    " type="file" id="imagefile" style=" visibility:hidden;" name="profile_img" >
                    <img class="mt-1" id="liveImage" style=" height:100%; border:1px solid rgb(199, 199, 199); width:100%; border-radius:50%;" src="{{ $user->image_url }}" alt="">
                    @error('profile_img')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror


                    <div class="row m-2 col-sm-12 text-center">
                        <span class="col-sm-12 font-weight-bold">{{ $user->name }}</span>
                        <span class="col-sm-12 text-black-50" style="pading-right: 3rem;">{{ $user->email }}</span>
                    </div>
                </label>
            </div>
            <div class="col-md-9 border-right">
                <div class=" py-5">
                    <div class="row">
                        <div class="col-md-6"><label class="labels">Name<span style="color:red;">*</span></label><input name="name" type="text" class="form-control 
                            @error('name')
                            is-invalid
                            @enderror" placeholder="fullname" value="{{ $user->name }}"> 
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                        
                        <div class="col-md-6"><label class="labels">Username<span style="color:red;">*</span></label><input name="user_name" type="text" class="form-control 
                            @error('user_name')
                            is-invalid
                            @enderror
                            " value="{{ $user->user_name }}" placeholder="username">
                            @error('user_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Mobile Number<span style="color:red;">*</span></label><input name="phone" type="number" class="form-control
                            @error('phone')
                            is-invalid
                            @enderror
                            " placeholder="phone number" value="{{ $user->phone }}">
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="col-md-6"><label class="labels">E-mail   <span style="color:green;"><small>  verified</small></span></label><input name="email" type="email" class="form-control" placeholder="email" disabled value="{{ $user->email }}"></div>
                    </div>
                    <div class="mt-3 text-center"><button class="btn btn-primary profile-button" type="submit" >Profile Update</button></div>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="{{ asset('backend/assets/js/instandphotochange.js') }}"></script>
@endsection
