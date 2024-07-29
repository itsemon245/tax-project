@extends('frontend.layouts.app')
@section('main')
<div>
    <h4 class="text-center my-3">Developers</h4>
    <div class="container">
        <div class="col-md-12 mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="card" >
                        <div class="card-body row">
                            <div class="col-md-4">
                                <img loading="lazy" class="border border-5 border-primary" id="liveImage" style=" height:100%; width:100%; border-radius:50%;" src="{{ asset('images/developer_3.jpg') }}" alt="Mojahidul Islam Image">
                            </div>
                                            <div class="col-md-8">
                                <h3 class="mt-3">Mojahidul Islam Emon </h3>
                                <h5>Mobile: +8801643428395</h5>
                                <h5>Email: +8801612418511</h5>
                                <div class="flex">
                                    <span class="fs-5">
                                        <a href="http://"><i class="fab fa-facebook"></i></a> 
                                        <a href="http://"><i class="fab fa-linkedin-in"></i></a> 
                                    </span>
                                </div>
                            </div> 
                        </div>
                        <span class="mdi mdi-graph-outline p-0 m-0"
                            style="color: var(--bs-gray-500);position: absolute;top:0;right:4px;"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" >
                        <div class="card-body row">
                            <div class="col-md-4">
                                <img loading="lazy" class="border border-5 border-primary" id="liveImage" style=" height:100%; width:100%; border-radius:50%;" src="{{ asset('images/developer_2.jpg') }}" alt="Mojahidul Islam Image">
                            </div>
                            <div class="col-md-8">
                                <h3 class="mt-3">Md Parvez Ahmmed </h3>
                                <h5>Mobile: +8801885518864</h5>
                                <h5>Email: pj.parvaz45@gmail.com</h5>
                                <div class="flex">
                                    <span class="fs-5">
                                        <a href="http://"><i class="fab fa-facebook"></i></a> 
                                        <a href="http://"><i class="fab fa-linkedin-in"></i></a> 
                                    </span>
                                </div>
                            </div>
                        </div>
                        <span class="mdi mdi-graph-outline p-0 m-0"
                            style="color: var(--bs-gray-500);position: absolute;top:0;right:4px;"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" >
                        <div class="card-body row">
                            <div class="col-md-4">
                                <img loading="lazy" class="border border-5 border-primary" id="liveImage" style=" height:100%; width:100%; border-radius:50%;" src="{{ asset('images/developer_1.jpg') }}" alt="Mojahidul Islam Image">
                            </div>
                            <div class="col-md-8">
                                <h3 class="mt-3">Zabir Emu </h3>
                                <h5>Mobile: +8801612418511</h5>
                                <h5>Email: +8801612418511</h5>
                                <div class="flex">
                                    <span class="fs-5">
                                        <a href="http://"><i class="fab fa-facebook"></i></a> 
                                        <a href="http://"><i class="fab fa-linkedin-in"></i></a> 
                                    </span>
                                </div>
                            </div>                            
                        </div>
                        <span class="mdi mdi-graph-outline p-0 m-0"
                            style="color: var(--bs-gray-500);position: absolute;top:0;right:4px;"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div>
@endsection

