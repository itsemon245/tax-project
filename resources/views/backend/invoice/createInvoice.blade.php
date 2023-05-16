@extends('backend.layouts.app')

@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Invoice', 'Create']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="Create Invoice">
        @php
            $randomString = Str::random(13);
        @endphp
    <form action="{{ route('map.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6" style="border: 1px solid black;">
                <h4 class="text-center">Generate Invoice</h4>
                <div class="card-body">
                    <!-- Logo & title -->
                    <div class="clearfix">
                        <div class="float-start">
                            <div class="auth-logo">
                                <div class="logo logo-dark">
                                    <span class="logo-lg">
                                        <img src="{{ asset('backend/assets/images/logo-dark-2.png') }}" alt="" height="22">
                                    </span>
                                </div>
            
                                <div class="logo logo-light">
                                    <span class="logo-lg">
                                        <img src="assets/images/logo-light.png" alt="" height="22">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="float-end">
                            <h4 class="m-0 d-print-none">Invoice</h4>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-md-5">
                            <div class="mt-3">
                                <h4>Bill To</h4>
                                <p class="text-muted"> <p class="mb-0"><b>Mohammad Emdad</b></p>
                                    M/s.Rahmania Trading16/B, Gulistan R/A,Anderkilla
                                    Chattogram.
                                    01634-859-749</p>
                            </div>
        
                        </div><!-- end col -->
                        <div class="col-md-7 mt-4">
                            <div class="row">
                                <div class="col-md-5">Invoice Date:</div>
                                <div class="col-md-7">
                                    <input type="date" name="date" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-5">Reference no:</div>
                                <div class="col-md-7">
                                    <input type="text" placeholder="Reference no..." name="reference" value="{{ strtoupper($randomString) }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-5">Client Name:</div>
                                    <div class="col-md-7">
                                        <select name="client_name" class="form-control">
                                         <option selected disabled >Client Name</option>
                                         <option value="">xyz</option>
                                         <option value="">abc</option>
                                         <option value="">123</option>
                                         <option value="">321</option>
                                        </select>
                                     </div>
                                </div>
                            <div class="row mt-1">
                                <div class="col-md-5">Purpose:</div>
                                <div class="col-md-7">
                                   <select name="purpose" class="form-control">
                                    <option selected disabled >Purpose Select</option>
                                    <option value="">xyz</option>
                                    <option value="">abc</option>
                                    <option value="">123</option>
                                    <option value="">321</option>
                                   </select>
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->
        
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table mt-4 table-centered">
                                    <thead>
                                    <tr><th>#</th>
                                        <th>Item</th>
                                        <th style="width: 10%">Quantity</th>
                                        <th style="width: 10%">Rate</th>
                                        <th style="width: 10%" class="text-end">Total</th>
                                    </tr></thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <b>Web Design</b> <br>
                                            2 Pages static website - my website
                                        </td>
                                        <td>22</td>
                                        <td>30</td>
                                        <td class="text-end">660.00</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <b>Software Development</b> <br>
                                            Invoice editor software - AB'c Software
                                        </td>
                                        <td>112.5</td>
                                        <td>35</td>
                                        <td class="text-end">3937.50</td>
                                    </tr>
        
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
        
                    <div class="row">
                        <div class="col-sm-6">
                            <x-backend.form.text-input type="text" name="text_input" label="Text Input" class="other classes" required />
                        </div> <!-- end col -->
                        <div class="col-sm-6">
                            <div class="float-end">
                                <p><b>Sub-total:</b> <span class="float-end">4597.50</span></p>
                                <p><b>Include-Tax(0%) :</b> <span class="float-end">00.00</span></p>
                                <p><b>Discount (10%):</b> <span class="float-end"> &nbsp;&nbsp;&nbsp; 459.75</span></p>
                                <h3>4137.75 TAKA</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
        
                    <div class="mt-4 mb-1">
                        <div class="text-end">
                        
                            <a href="#" class="btn btn-info waves-effect waves-light">Submit</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6"  style="border: 1px solid black;">
                <h4 class="text-center">Preview Invoice</h4>
                <div class="card-body">
                    <!-- Logo & title -->
                    <div class="clearfix">
                        <div class="float-start">
                            <div class="auth-logo">
                                <div class="logo logo-dark">
                                    <span class="logo-lg">
                                        <img src="{{ asset('backend/assets/images/logo-dark-2.png') }}" alt="" height="22">
                                    </span>
                                </div>
            
                                <div class="logo logo-light">
                                    <span class="logo-lg">
                                        <img src="assets/images/logo-light.png" alt="" height="22">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="float-end">
                            <h4 class="m-0 d-print-none">Invoice</h4>
                        </div>
                    </div>
        
                    <div class="row">
                        <div class="col-md-5">
                            <div class="mt-3">
                                <h4>Bill To</h4>
                                <p class="text-muted"> <p class="mb-0"><b>Mohammad Emdad</b></p>
                                    M/s.Rahmania Trading16/B, Gulistan R/A,Anderkilla
                                    Chattogram.
                                    01634-859-749</p>
                            </div>
        
                        </div><!-- end col -->
                        <div class="col-md-7 mt-4">
                            <div class="row">
                                <div class="col-md-5">Invoice Date:</div>
                                <div class="col-md-7">
                                    <input type="date" name="date" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-5">Reference no:</div>
                                <div class="col-md-7">
                                    <input type="text" placeholder="Reference no..." name="reference" value="{{ strtoupper($randomString) }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-5">Client Name:</div>
                                    <div class="col-md-7">
                                        <select name="client_name" class="form-control">
                                         <option selected disabled >Client Name</option>
                                         <option value="">xyz</option>
                                         <option value="">abc</option>
                                         <option value="">123</option>
                                         <option value="">321</option>
                                        </select>
                                     </div>
                                </div>
                            <div class="row mt-1">
                                <div class="col-md-5">Purpose:</div>
                                <div class="col-md-7">
                                   <select name="purpose" class="form-control">
                                    <option selected disabled >Purpose Select</option>
                                    <option value="">xyz</option>
                                    <option value="">abc</option>
                                    <option value="">123</option>
                                    <option value="">321</option>
                                   </select>
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->
        
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table mt-4 table-centered">
                                    <thead>
                                    <tr><th>#</th>
                                        <th>Item</th>
                                        <th style="width: 10%">Quantity</th>
                                        <th style="width: 10%">Rate</th>
                                        <th style="width: 10%" class="text-end">Total</th>
                                    </tr></thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <b>Web Design</b> <br>
                                            2 Pages static website - my website
                                        </td>
                                        <td>22</td>
                                        <td>30</td>
                                        <td class="text-end">660.00</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <b>Software Development</b> <br>
                                            Invoice editor software - AB'c Software
                                        </td>
                                        <td>112.5</td>
                                        <td>35</td>
                                        <td class="text-end">3937.50</td>
                                    </tr>
        
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
        
                    <div class="row">
                        <div class="col-sm-6">
                            <x-backend.form.text-input type="text" name="text_input" label="Text Input" class="other classes" required />
                        </div> <!-- end col -->
                        <div class="col-sm-6">
                            <div class="float-end">
                                <p><b>Sub-total:</b> <span class="float-end">4597.50</span></p>
                                <p><b>Include-Tax(0%) :</b> <span class="float-end">00.00</span></p>
                                <p><b>Discount (10%):</b> <span class="float-end"> &nbsp;&nbsp;&nbsp; 459.75</span></p>
                                <h3>4137.75 TAKA</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
        
                    <div class="mt-4 mb-1">
                        <div class="text-end d-print-none">
                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer me-1"></i> Print</a>
                            <a href="#" class="btn btn-info waves-effect waves-light">Submit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </x-backend.ui.section-card>
    @push('customJs')
        <script></script>
    @endpush
@endsection
