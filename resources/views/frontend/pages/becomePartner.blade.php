@extends('frontend.layouts.app')
@section('main')
    <div class="row align-items-center mx-5 my-5">
        <div class="col-md-2"></div>
        <div class="col-md-9 container">

            <h4 class="header-title mb-3">Become Partner Progress </h4>
        
            <form method="POST" action="{{ route('user-profile.update.become', $user->id) }}">
                <div id="progressbarwizard">
                    <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#account-2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2" aria-selected="false" role="tab" tabindex="-1">
                                <i class="mdi mdi-account-circle me-1"></i>
                                <span class="d-none d-sm-inline">Account</span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#profile-tab-2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 active" aria-selected="true" role="tab">
                                <i class="mdi mdi-office-building-marker me-1"></i>
                                <span class="d-none d-sm-inline">Address</span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#finish-2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2" aria-selected="false" role="tab" tabindex="-1">
                                <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i>
                                <span class="d-none d-sm-inline">Finish</span>
                            </a>
                        </li>
                    </ul>
                
                    <div class="tab-content b-0 mb-0 pt-0">
                
                        <div id="bar" class="progress mb-3" style="height: 7px;">
                            <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 66.6667%;"></div>
                        </div>
                
                        <div class="tab-pane active" id="account-2" role="tabpanel">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="fullName">Full Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="Input full name" id="fullName" name="fullName" required="">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="phone">Phone</label>
                                        <div class="col-md-9">
                                            <input type="number" id="phone" value="{{ $user->phone }}" name="phone" placeholder="01XXX-XXXXXX" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="email">Email</label>
                                        <div class="col-md-9">
                                            <input type="email" value="{{ $user->email }}" disabled id="email" class="form-control">
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>
                        <div class="tab-pane " id="profile-tab-2" role="tabpanel">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="division">Division</label>
                                        <div class="col-md-9">
                                            <input type="text" id="division" name="division" placeholder="Input your division" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="district">District</label>
                                        <div class="col-md-9">
                                            <input type="text" id="district" name="district" placeholder="Input your district" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="thana">Thana</label>
                                        <div class="col-md-9">
                                            <input type="email" id="thana" name="thana" placeholder="Input your thana" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3 col-form-label" for="address">Address</label>
                                        <div class="col-md-9">
                                            <textarea name="address" id="address" class="form-control" placeholder="Road no: #00, House no #00, Holding no# #00... " cols="30" required="" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>
                        <div class="tab-pane" id="finish-2" role="tabpanel">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center">
                                        <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                        <h3 class="mt-0">Thank you !</h3>
        
                                        <p class="w-75 mb-2 mx-auto">Quisque nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis dui. Aliquam
                                            mattis dictum aliquet.</p>
        
                                        <div class="mb-3">
                                            <div class="form-check d-inline-block">
                                                <input type="checkbox" class="form-check-input" id="customCheck3">
                                                <label class="form-check-label" for="customCheck3">I agree with the Terms and Conditions</label>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>
        
                        <ul class="list-inline mb-0 wizard">
                            <li class="previous list-inline-item">
                                <a href="javascript: void(0);" class="btn btn-secondary">Previous</a>
                            </li>
                            <li class="next list-inline-item float-end">
                                <a href="javascript: void(0);" class="btn btn-secondary">Next</a>
                            </li>
                        </ul>
        
                    </div> <!-- tab-content -->
                </div> <!-- end #progressbarwizard-->
            </form>
        </div>
@endsection
@push('customJs')
    <script src="{{ asset('backend/assets/js/instandphotochange.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/form-wizard.init.js') }}"></script>
    <script>
        $(document).ready(function() {
            let account = $('#account-2');
            let profile = $('#profile-tab-2');
            account.addClass('active');
            profile.removeClass('active');
        });
    </script>
@endpush










