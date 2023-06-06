@extends('frontend.layouts.app')
@section('main')
<form action="{{ route('user-profile.update', auth()->id()) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row align-items-center mx-5 my-5">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                    <x-backend.form.text-input name="nid" class="mb-3" label="Nid No."  required />
                    <x-backend.form.text-input name="dob" class="mb-3" type="date" label="Date of Birth"  required />
                </div>
                <div class="col-md-6">
                    <x-backend.form.text-input name="name" class="mb-3" label="Full Name"  required />
                    <x-backend.form.text-input name="phone" class="mb-3" label="Contract Number"  required />
                </div>
                <label for="address" class="col-md-12">
                    Present Address: 
                    <textarea name="address" id="address" cols="30" class="form-control"
                    placeholder="Division: , Distric: , Police Station: , Post Office: , Area/R.A:"   
                    rows="8"></textarea>
                </label>
                <div class="mt-3 mb-3">
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