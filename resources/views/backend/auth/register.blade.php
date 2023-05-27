@extends('backend.auth.layouts.app')

@section('content')
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <div class="auth-logo">
                                    <a href="{{ route('login') }}" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt=""
                                                height="22">
                                        </span>
                                    </a>

                                    <a href="{{ route('login') }}" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt=""
                                                height="22">
                                        </span>
                                    </a>
                                </div>
                                <p class="text-muted mb-4 mt-3">Don't have an account? Create your account, it takes less
                                    than a minute</p>
                            </div>

                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Full Name</label>
                                    <input
                                        class="form-control @error('name')
                                is-invalid
                        @enderror"
                                        type="text" id="fullname" placeholder="Enter your name" name="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">User Name</label>
                                    <input
                                        class="form-control @error('user_name')
                                is-invalid
                        @enderror"
                                        type="text" id="fullname" placeholder="Enter your user name" name="user_name">
                                    @error('user_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input
                                        class="form-control @error('email')
                                is-invalid
                        @enderror"
                                        type="email" id="emailaddress" placeholder="Enter your email" name="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Phone</label>
                                    <input
                                        class="form-control @error('phone')
                                is-invalid
                        @enderror"
                                        type="number" id="emailaddress" placeholder="Enter your phone" name="phone">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password"
                                            class="form-control @error('password')
                                    is-invalid
                            @enderror"
                                            placeholder="Enter your password" name="password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Confirm Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password"
                                            class="form-control @error('password_confirmation')
                                    is-invalid
                            @enderror"
                                            placeholder="Enter your confirm password" name="password_confirmation">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @isset($user_name)
                                    <x-backend.form.text-input name="refer_code" label="Refer Code" :value="$user_name" />
                                @endisset
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox-signup" required>
                                        <label class="form-check-label" for="checkbox-signup">I accept <a
                                                href="javascript: void(0);" class="text-dark">Terms and
                                                Conditions</a></label>
                                    </div>
                                </div>
                                
                                <div class="text-center d-grid">
                                    <button class="btn btn-success"> Sign Up </button>
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-white-50">Already have account? <a href="{{ route('login') }}"
                                    class="text-white ms-1"><b>Sign In</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->
@endsection
