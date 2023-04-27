@extends('layouts.frontend.app')
@section('main')
    <!-- Session Status -->

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="container">

            <div class="">
                <form action="{{ route('login') }}">
                    @csrf
                    <x-frontend.form.text-input name='email' type='email' required />
                    <x-frontend.form.text-input name='password' type='password' required />
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">
                                Remember me
                            </label>
                        </div>
                        <a href="{{ route('password.request') }}" class="text-body">Forgot password?</a>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button class="btn btn-primary">Login</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="link-danger">Register</a>
                        </p>
                    </div>

                </form>
            </div>
        </div>

    </form>
@endsection
