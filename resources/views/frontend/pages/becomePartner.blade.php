@extends('frontend.layouts.app')
@section('main')
<form action="{{ route('user-profile.update.become', auth()->id()) }}" method="post" >
    @csrf
    @method('PUT')
    <div class="row align-items-center mx-5 my-5">
        <div class="col-md-2"></div>
        <div class="col-md-10 container">
            <div class="container">
                <div class="card-body">

                    <h4 class="header-title mb-3"> Wizard With Form Validation</h4>
        
                    <div id="rootwizard">
                        <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3" role="tablist">
                            <li class="nav-item" data-target-form="#accountForm" role="presentation">
                                <a href="#first" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2" aria-selected="false" role="tab" tabindex="-1">
                                    <i class="mdi mdi-account-circle me-1"></i>
                                    <span class="d-none d-sm-inline">Account</span>
                                </a>
                            </li>
                            <li class="nav-item" data-target-form="#profileForm" role="presentation">
                                <a href="#second" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2" aria-selected="false" role="tab" tabindex="-1">
                                    <i class="mdi mdi-face-profile me-1"></i>
                                    <span class="d-none d-sm-inline">Profile</span>
                                </a>
                            </li>
                            <li class="nav-item" data-target-form="#otherForm" role="presentation">
                                <a href="#third" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 active" aria-selected="true" role="tab">
                                    <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i>
                                    <span class="d-none d-sm-inline">Finish</span>
                                </a>
                            </li>
                        </ul>
        
                        <div class="tab-content mb-0 b-0 pt-0">
        
                            <div class="tab-pane" id="first" role="tabpanel">
                                <form id="accountForm" method="post" action="#" class="form-horizontal was-validated">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row mb-3">
                                                <label class="col-md-3 col-form-label" for="userName3">User name</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" id="userName3" name="userName3" required="">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-md-3 col-form-label" for="password3"> Password</label>
                                                <div class="col-md-9">
                                                    <input type="password" id="password3" name="password3" class="form-control" required="">
                                                </div>
                                            </div>
                                            
                                            <div class="row mb-3">
                                                <label class="col-md-3 col-form-label" for="confirm3">Re Password</label>
                                                <div class="col-md-9">
                                                    <input type="password" id="confirm3" name="confirm3" class="form-control" required="">
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->
                                </form>
                            </div>
        
                            <div class="tab-pane fade" id="0" role="tabpanel">
                                <form id="profileForm" method="post" action="#" class="form-horizontal was-validated">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row mb-3">
                                                <label class="col-md-3 col-form-label" for="name3"> First name</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="name3" name="name3" class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-md-3 col-form-label" for="surname3"> Last name</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="surname3" name="surname3" class="form-control" required="">
                                                </div>
                                            </div>
                                
                                            <div class="row mb-3">
                                                <label class="col-md-3 col-form-label" for="email3">Email</label>
                                                <div class="col-md-9">
                                                    <input type="email" id="email3" name="email3" class="form-control" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </form>
                            </div>
        
                            <div class="tab-pane fade active show" id="third" role="tabpanel">
                                <form id="otherForm" method="post" action="#" class="form-horizontal">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="text-center">
                                                <h2 class="mt-0">
                                                    <i class="mdi mdi-check-all"></i>
                                                </h2>
                                                <h3 class="mt-0">Thank you !</h3>
                                
                                                <p class="w-75 mb-2 mx-auto">Quisque nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis
                                                    dui. Aliquam mattis dictum aliquet.</p>
                                
                                                <div class="mb-3">
                                                    <div class="form-check d-inline-block">
                                                        <input type="checkbox" class="form-check-input" id="customCheck4" required="">
                                                        <label class="form-check-label" for="customCheck4">I agree with the Terms and Conditions</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </form>
                            </div>
        
                            <ul class="list-inline wizard mb-0">
                                <li class="previous list-inline-item"><a href="javascript: void(0);" class="btn btn-secondary">Previous</a>
                                </li>
                                <li class="next list-inline-item float-end disabled"><a href="javascript: void(0);" class="btn btn-secondary">Next</a></li>
                            </ul>
        
                        </div> <!-- tab-content -->
                    </div> <!-- end #rootwizard-->
        
                </div>
            </div>
        </div>











        {{-- <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                    <x-backend.form.text-input name="nid" :value="$user->nid" class="mb-3" type="number" label="Nid No." placeholder="National Identity Card Number"  required />
                    <x-backend.form.text-input name="dob" :value="$user->dob" class="mb-3" type="date" label="Date of Birth"  required />
                    <x-backend.form.text-input name="user_name" :value="$user->user_name" class="mb-3"  label="Username" disabled />
                        <x-backend.form.select-input id="category" label="Category" name="category"
                        placeholder="Choose Category...">
                        <option value="">Dhaka</option>
                        <option value="">Chittagong</option>
                        <option value="">Mymensingh</option>
                        <option value="">Barisal</option>
                        <option value="">Khulna</option>
                        <option value="">Rajshahi</option>
                        <option value="">Rangpur</option>
                        <option value="">Sylhet</option>
                     </x-backend.form.select-input>
                </div>
                <div class="col-md-6">
                    <x-backend.form.text-input name="name" :value="$user->name" class="mb-3" label="Full Name"  required />
                    <x-backend.form.text-input name="phone" :value="$user->phone" class="mb-3" placeholder="+880 1XXXXXXXXX" label="Contract Number"  required />
                    <x-backend.form.text-input type='email' :value="$user->email" name="email" disabled label="Email" 
                        required />
                </div>
                <div class="mt-3 mb-3">
                    <button class="btn btn-primary profile-button" type="submit">Submit
                    </button>
                </div>
            </div>
        </div> --}}
</form>
@endsection
@push('customJs')
    <script src="{{ asset('backend/assets/js/instandphotochange.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/form-wizard.init.js') }}"></script>
@endpush