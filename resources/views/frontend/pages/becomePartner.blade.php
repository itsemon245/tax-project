@php
    $data = [
                [
                    "_id"=> "barishal",
                    "division"=> "Barishal",
                    "divisionbn"=> "বরিশাল",
                    "coordinates"=> "22.3811, 90.3372"
                ],
                    [
                    "_id"=> "chattogram",
                    "division"=> "Chattogram",
                    "divisionbn"=> "চট্টগ্রাম",
                    "coordinates"=> "23.1793, 91.9882"
                ],
                    [
                    "_id"=> "dhaka",
                    "division"=> "Dhaka",
                    "divisionbn"=> "ঢাকা",
                    "coordinates"=> "23.9536, 90.1495"
                ],
                    [
                    "_id"=> "khulna",
                    "division"=> "Khulna",
                    "divisionbn"=> "খুলনা",
                    "coordinates"=> "22.8088, 89.2467"
                ],
                    [
                    "_id"=> "mymensingh",
                    "division"=> "Mymensingh",
                    "divisionbn"=> "ময়মনসিংহ",
                    "coordinates"=> "24.7136, 90.4502"
                ],
                    [
                    "_id"=> "rajshahi",
                    "division"=> "Rajshahi",
                    "divisionbn"=> "রাজশাহী",
                    "coordinates"=> "24.7106, 88.9414"
                ],
                    [
                    "_id"=> "rangpur",
                    "division"=> "Rangpur",
                    "divisionbn"=> "রংপুর",
                    "coordinates"=> "25.8483, 88.9414"
                ],
                    [
                    "_id"=> "sylhet",
                    "division"=> "Sylhet",
                    "divisionbn"=> "সিলেট",
                    "coordinates"=> "24.7050, 91.6761"
                ]
];
@endphp
@extends('frontend.layouts.app')
@section('main')
       <div class="container my-3">

            <h4 class="title-header mb-3 text-center">Become Partner Progress</h4>
        
            <form method="POST" action="{{ route('user-profile.update.become', $user->id) }}" class="">
                $@csrf
                @method("PUT")
                <div class="d-flex justify-content-center">
                    <div style="max-width: 650px;" class="px-md-0 px-2">
                        <div id="progressbarwizard">
                    
                            <div class="d-flex justify-content-center">
                                <ul class="nav nav-pills bg-light nav-justified form-wizard-header w-100" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a href="#account-2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 active" aria-selected="true" role="tab" tabindex="-1">
                                            <i class="mdi mdi-account-circle"></i>
                                            <span class="d-none d-sm-inline">Account</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#profile-tab-2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 " aria-selected="false" role="tab">
                                            <i class="mdi mdi-office-building-marker"></i>
                                            <span class="d-none d-sm-inline">Address</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#finish" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2" aria-selected="false" role="tab" tabindex="-1">
                                            <i class="mdi mdi-checkbox-marked-circle-outline "></i>
                                            <span class="d-none d-sm-inline">Finish</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                    
                        
                            <div class="tab-content ">
                    
                                <div id="bar" class="progress my-3" style="height: 7px;">
                                    <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 33.33%;"></div>
                                </div>
                        
                                <div class="tab-pane my-3 active" id="account-2" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Full Name" name='name' :value="$user->name" placeholder="John Doe" required />
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Username" name='username' disabled :value="$user->user_name" required />
                                        </div>
                                            <div class="col-md-6">
                                                <x-backend.form.text-input label="Phone No." name='phone' :value="$user->phone" required />
                                            </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Email" name='email' disabled :value="$user->email" required />
                                        </div>
                                        
                                    </div> <!-- end row -->
                                </div>
                                <div class="tab-pane my-3 " id="profile-tab-2" role="tabpanel"> 
        
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4">
                                            <label for="division">Division <span class="text-danger">*</span></label>
                                            <select class="selectize" id="division" name="division" placeholder="Select Division..." required>
                                                <option disabled selected>Select Division</option>
                                                @foreach ($data as $item)
                                                <option class="divisions" value="{{$item['division']}}">{{$item['division']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label for="district">District <span class="text-danger">*</span></label>
                                            <select id="district" name="district" placeholder="Select District..." required>
                                                <option disabled selected>Select Division First</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label for="thana">Thana <span class="text-danger">*</span></label>
                                            <select id="thana" name="thana" placeholder="Select Thana..." required>
                                                <option disabled selected>Select District First</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="address">Address</label>
                                            <div class="">
                                                <textarea name="address" id="address" class="form-control" placeholder="{{"House No:,\nStreet No:,\nPost Office:"}}" cols="30" required="" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div> <!-- end row -->
                                </div>
                                <div class="tab-pane my-3" id="finish" role="tabpanel">
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
                
                                <ul class="list-unstyled d-flex justify-content-md-start justify-content-between gap-3 mb-0 wizard">
                                    <li class="previous">
                                        <a href="javascript: void(0);" class="btn btn-dark">Previous</a>
                                    </li>
                                    <li class="next" id="next-btn">
                                        <a href="javascript: void(0);" class="btn btn-primary">Next</a>
                                    </li>
                                </ul>
                
                            </div> <!-- tab-content -->
                        </div>
                    </div>
                    
                </div> <!-- end #progressbarwizard-->
            </form>
       </div>
@endsection
@push('customJs')
    {{-- Selectize start --}}
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
    integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
    />
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
    integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
    ></script>
    {{-- Selectize end --}}
    <script src="{{ asset('frontend/assets/js/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/form-wizard.init.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('#division').selectize({
                maxItems: 1,
                sortField:'text',
                create: false,
            });
            let districtSelctize = $('#district').selectize({
                maxItems:1,
                sortField:'text',
                create:false,
                labelField: 'district',
                valueField: 'district',
                searchField: 'district',
            });
            let thanaSelect = $('#thana').selectize({
                maxItems:1,
                sortField:'text',
                create:true,
                labelField: 'thana',
                valueField: 'thana',
                searchField: ['thana', 'id'],
            });

            $('#division').on('input', e=>{
                const division = e.target.value;

                const settings = {
                    async: true,
                    crossDomain: true,
                    url: 'https://bdapi.p.rapidapi.com/v1.1/division/'+division,
                    method: 'GET',
                    headers: {
                        'X-RapidAPI-Key': '3fdd0dc0f2mshcea4717a7ec6a05p1e2854jsn1bce68040ab7',
                        'X-RapidAPI-Host': 'bdapi.p.rapidapi.com'
                    }
                };

                $.ajax(settings).done(function (response) {
                   const data = response.data;
                   console.log(data);
                   const selectize = districtSelctize[0].selectize
                    selectize.clear();
                    selectize.clearOptions();
                    selectize.load(set => set(data));

                    //set eventlistenr for district select
                    $('#district').on('input', e=>{
                        // grab ups based on district
                        const UP = data.filter(item => item.district === e.target.value)[0].upazilla
                        const upazillas = UP.map(item=>{
                            return {thana: item, id: item.toLowerCase}
                        })
                        const thanaSelecize = thanaSelect[0].selectize
                            thanaSelecize.clear();
                            thanaSelecize.clearOptions();
                            thanaSelecize.load(set => set(upazillas));

                    })
                });
                
            })

           
            

            const nextBtn = $('#next-btn')
            nextBtn.click(()=>{
                setTimeout(() => {
                    const isLast = $('#finish').hasClass('active');
                console.log(isLast);
                if (isLast) {
                    const submitBtn = `<button type="submit" class="btn btn-primary">Submit</button>`
                    nextBtn.html(submitBtn)
                }
                }, 100);
            })



            // function setData(id, district = '' canCreate=false) { 
            //     let param = id+'s'
            //     if (district !== '') {
            //         param = 'division/'+district
            //     }
            //     const settings = {
            //         async: true,
            //         crossDomain: true,
            //         url: `https://bdapi.p.rapidapi.com/v1.1/${param}`,
            //         method: 'GET',
            //         headers: {
            //             'X-RapidAPI-Key': '3fdd0dc0f2mshcea4717a7ec6a05p1e2854jsn1bce68040ab7',
            //             'X-RapidAPI-Host': 'bdapi.p.rapidapi.com'
            //         }
            //     };
            //     $.ajax(settings).done(function (res) {
            //             const data = res.data
            //             console.log(data);
            //             $('#'+id).selectize({
            //             maxItems: 1,
            //             valueField: id,
            //             labelField: id,
            //             searchField: id,
            //             options: data,
            //             create: canCreate
            //             });
                    
            //     });
            // }

                
        });

        
    </script>
@endpush










