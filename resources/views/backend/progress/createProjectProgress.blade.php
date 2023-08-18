@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Progress', 'Project Progress', 'Create']" />

    <x-backend.ui.section-card name="Progress Create">
        <div class="container my-3">  
            <form method="POST" action="#" >
                @csrf
                @method("PUT")
                <div class="row">
                    <div class="col-md-12">
                        <div class="px-md-0 px-2">
                            <div id="progressbarwizard">
                        
                                <div class="d-flex justify-content-center">
                                    <ul class="nav nav-pills bg-light nav-justified form-wizard-header w-100" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a href="#project-info" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 active" aria-selected="true" role="tab" tabindex="-1">
                                                <i class="mdi mdi-information-outline"></i>
                                                <span class="d-none d-sm-inline">Project Info</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a href="#profile-tab-2" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 " aria-selected="false" role="tab">
                                                <i class="mdi mdi-progress-clock"></i>
                                                <span class="d-none d-sm-inline">Target</span>
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
                            
                                    <div class="tab-pane my-3 active" id="project-info" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <x-backend.form.text-input label="Project Name" name='name'  required />
                                            </div>
                                            <div class="col-md-6">
                                                <x-backend.form.text-input label="Weekdays" name='weekdays' disabled />
                                            </div>
                                                <div class="col-md-6">
                                                    <x-backend.form.text-input label="Start Date" type="date" required name='start_date'   />
                                                </div>
                                            <div class="col-md-6">
                                                <x-backend.form.text-input label="End Date" type="date" required name='end_date'   />
                                            </div>
                                            
                                        </div> <!-- end row -->
                                    </div>
                                    <div class="tab-pane my-3 " id="profile-tab-2" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-4">
                                                <x-backend.form.text-input label="Total Target" name='total_target'  required />                                            
                                            </div>
                                        </div>
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
                                        <li class="previous" id="prev-btn">
                                            <a href="javascript: void(0);" class="btn btn-dark">Previous</a>
                                        </li>
                                        <li class="next" id="next-btn">
                                            <a href="javascript: void(0);" class="btn btn-primary">Next</a>
                                        </li>
                                    </ul>
                    
                                </div> <!-- tab-content -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
       </div>
    </x-backend.ui.section-card>
    <!-- end row-->
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
            const prevBtn = $('#prev-btn')
            prevBtn.click(()=>{
                const submitBtn = `<a href="javascript: void(0);" class="btn btn-primary">Next</a>`
                nextBtn.html(submitBtn)
            })



                
        });

        
    </script>
@endpush
