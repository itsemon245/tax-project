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










