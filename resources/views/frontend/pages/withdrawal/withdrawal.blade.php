@extends('frontend.layouts.app')
@section('main')
<form action="{{ route('withdrawal.store') }}" method="post">
    @csrf
    <div class="container m-4">
        <div class="card m-4">
            <div class="row mx-3 card-body">
                <div class="col-md-12">
                    <div class="">
                        <x-backend.form.select-input id="account_type" label="Account Type" name="account_type"
                            placeholder="Choose One...">
                            <option value="bkash">Bkash (Personal)</option>
                            <option value="nagad">Nagad (Personal)</option>
                            <option value="rocket">Rocket (Personal)</option>
                            </x-backend.form.select-input>
                    </div>
                    <x-backend.form.text-input type="text" hidden class="d-none" name="user_id" :value="auth()->id()" required />
                </div>
            </div>
            <div class="row mx-3 card-body">
                <div class="col-md-6 ">
                    <x-backend.form.text-input type="number" name="account_no" label="Account No" required />
                </div>
                <div class="col-md-6 ">
                    <x-backend.form.text-input type="number" name="pay" label="Amount" required />
                </div>
                <div class="mt-4 mb-4">
                    <button class="btn btn-sm btn-primary w-100">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
