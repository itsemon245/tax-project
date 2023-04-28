@extends('backend.layouts.app')

@section('content')

<form action="{{ route('user-profile.update', auth()->id()) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')  
<div class="container rounded bg-white mb-5">
    <div class="row">
            <div class="col-md-3 mt-4 border-right">
                <label style="width: 9rem; height:9rem; margin-left: 3rem"  for="imagefile">
                    <input type="file" id="imagefile" style=" visibility:hidden;" name="profile_img" >
                    <img class="mt-1" id="liveImage" style=" height:100%; border:1px solid rgb(199, 199, 199); width:100%; border-radius:50%;" src="{{ $user->image_url }}" alt="">
                    <div class="row col-sm-12">
                        <span class="col-sm-12 font-weight-bold">{{ $user->name }}</span>
                        <span class="col-sm-12 text-black-50">{{ $user->email }}</span><span> </span>
                    </div>
                </label>
            </div>
            <div class="col-md-9 border-right">
                <div class="p-2 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h4 class="text-right">Profile Update</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name<span style="color:red;">*</span></label><input name="name" type="text" class="form-control" placeholder="fullname" value="{{ $user->name }}"></div>
                        <div class="col-md-6"><label class="labels">Username<span style="color:red;">*</span></label><input name="user_name" type="text" class="form-control" value="{{ $user->user_name }}" placeholder="username"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Mobile Number<span style="color:red;">*</span></label><input name="phone" type="number" class="form-control" placeholder="phone number" value="{{ $user->phone }}"></div>
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
