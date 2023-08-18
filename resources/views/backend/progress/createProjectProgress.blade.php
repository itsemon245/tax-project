
@php
    use Illuminate\Support\Str;
@endphp
@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Project', 'Create']" />

    <x-backend.ui.section-card name="Project Create">
        <div class="container my-3">  
            <form method="POST" action="{{ route('project.store') }}" >
                @csrf
                <div class="row">
                    {{-- {{ dd($clients) }} --}}
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
                                            <a href="#finish" data-bs-toggle="tab" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2" aria-selected="false" role="tab" tabindex="-1">
                                                <i class="mdi mdi-book-plus-multiple"></i>
                                                <span class="d-none d-sm-inline">Assign</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                        
                            
                                <div class="tab-content ">
                                    {{-- <div id="bar" class="progress my-3" style="height: 7px;">
                                        <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 33.33%;"></div>
                                    </div> --}}
                            
                                    <div class="tab-pane my-3 active" id="project-info" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <x-backend.form.text-input label="Project Name" name='name'  required />
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <x-backend.form.text-input label="Weekdays" type="number" name='weekdays' required />
                                            </div>
                                                <div class="col-md-6 mb-2">
                                                    <x-backend.form.text-input label="Start Date" type="date" required name='start_date'   />
                                                </div>
                                            <div class="col-md-6 mb-2">
                                                <x-backend.form.text-input label="End Date" type="date" required name='end_date'   />
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <x-backend.form.text-input label="Daily Target" type="number" required name="daily_target"   />
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <x-backend.form.text-input label="Total Clients" name="" placeholder="{{ count($clients) }}" disabled />
                                                <input type="text" hidden value="{{ count($clients) }}" name="total_clients"> 
                                            </div>
                                            {{-- {{ dd($users[0]) }} --}}
                                        </div> <!-- end row -->
                                    </div>
                                    <div class="tab-pane my-3" id="finish" role="tabpanel">
                                        <div class="row">
                                            <div class="col-12">
                                                <x-backend.table.basic>
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Phone</th>
                                                            <th>Circle</th>
                                                            <th>Zone</th>
                                                            <th>Assign</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($clients as $key=>$client)
                                                        <tr>
                                                            <input type="hidden" value="{{ $client->id }}" name="clients[]">
                                                            {{-- {{ dd($user) }} --}}
                                                            <td>{{ ++$key }}</td>
                                                            <td>{{ $client->name }}</td>
                                                            <td>{{ $client->phone }}</td>
                                                            <td>{{ $client->circle }}</td>
                                                            <td>{{ $client->zone }}</td>
                                                            <td>
                                                                <div class="d-flex flex-wrap gap-1">
                                                                    @foreach ($users as $conut => $user)
                                                                    <div style="max-width: 400px;">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input" value="{{ $user->id }}" name="client_{{ $client->id }}_users[]" type="checkbox" id="{{ Str::slug($user->user_name) }}">
                                                                            <label class="form-check-label text-primary" for="{{ Str::slug($user->user_name) }}">
                                                                                {{ $user->name }}
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="4">
                                                                    <h5 class="d-flex justify-content-center text-muted">No record found</h5>
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </x-backend.table.basic>
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
            let circleSelect = $('#thana').selectize({
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
