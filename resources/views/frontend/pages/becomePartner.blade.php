@extends('frontend.layouts.app')
@section('main')
<form action="{{ route('user-profile.update.become', auth()->id()) }}" method="post" >
    @csrf
    @method('PUT')
    <div class="row align-items-center mx-5 my-5">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                    <x-backend.form.text-input name="nid" :value="$user->nid" class="mb-3" type="number" label="Nid No." placeholder="National Identity Card Number"  required />
                    <x-backend.form.text-input name="dob" :value="$user->dob" class="mb-3" type="date" label="Date of Birth"  required />
                    <x-backend.form.text-input name="user_name" :value="$user->user_name" class="mb-3"  label="Username" disabled />
                </div>
                <div class="col-md-6">
                    <x-backend.form.text-input name="name" :value="$user->name" class="mb-3" label="Full Name"  required />
                    <x-backend.form.text-input name="phone" :value="$user->phone" class="mb-3" placeholder="+880 1XXXXXXXXX" label="Contract Number"  required />
                    <x-backend.form.text-input type='email' :value="$user->email" name="email" disabled label="Email" 
                        required />
                </div>
                <label for="address" class="col-md-12">
                    <x-form.ck-editor id="address" name="address" placeholder="Address"></x-form.ck-editor>
                </label>
                <div class="mt-3 mb-3">
                    <button class="btn btn-primary profile-button" type="submit">Submit
                    </button>
                </div>
            </div>
        </div>
</form>
@endsection
@push('customJs')
    <script src="{{ asset('backend/assets/js/instandphotochange.js') }}"></script>
@endpush