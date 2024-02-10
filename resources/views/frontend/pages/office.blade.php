@extends('frontend.layouts.app')
@section('main')
    {{-- @php
        $jsonString =
            '[{"_id":"bandarban","district":"Bandarban","coordinates":"21.8311, 92.3686","upazilla":["Ali Kadam","Thanchi","Lama","Bandarban Sadar","Rowangchhari","Naikhongchhari","Ruma"]},{"_id":"brahmanbaria","district":"Brahmanbaria","coordinates":"23.9608, 91.1115","upazilla":["Akhaura","Nasirnagar","Bancharampur","Sarail","Ashuganj","Bijoynagar","Nabinagar","Kasba","Brahmanbaria Sadar"]},{"_id":"chandpur","district":"Chandpur","coordinates":"23.2513, 90.8518","upazilla":["Haziganj","Faridganj","Matlab Dakshin","Chandpur Sadar","Kachua","Haimchar","Shahrasti","Matlab Uttar"]},{"_id":"chattogram","district":"Chattogram","coordinates":"22.5150, 91.7539","upazilla":["Rangunia","Sitakunda","Boalkhali","Patiya","Banshkhali","Karnaphuli","Lohagara","Hathazari","Mirsharai","Sandwip","Raozan","Chandanaish","Fatikchhari","Anwara","Satkania"]},{"_id":"cox\'s bazar","district":"Cox\'s Bazar","coordinates":"21.5641, 92.0282","upazilla":["Maheshkhali","Chakaria","Cox\'s Bazar Sadar","Ukhia","Pekua","Ramu","Teknaf","Kutubdia"]},{"_id":"cumilla","district":"Cumilla","coordinates":"23.4576, 91.1809","upazilla":["Titas","Monohargonj","Chandina","Cumilla Adarsha Sadar","Meghna","Nangalkot","Chauddagram","Barura","Cumilla Sadar Dakshin","Laksam","Daudkandi","Homna","Burichang","Debidwar","Muradnagar","Brahmanpara","Lalmai"]},{"_id":"feni","district":"Feni","coordinates":"22.9409, 91.4067","upazilla":["Fulgazi","Parshuram","Feni Sadar","Sonagazi","Daganbhuiyan","Chhagalnaiya"]},{"_id":"khagrachari","district":"Khagrachari","coordinates":"23.1322, 91.9490","upazilla":["Lakshmichhari","Panchhari","Mahalchhari","Dighinala","Manikchhari","Matiranga","Ramgarh","Khagrachhari Sadar"]},{"_id":"lakshmipur","district":"Lakshmipur","coordinates":"22.9447, 90.8282","upazilla":["Raipur","Ramganj","Lakshmipur Sadar","Ramgati","Kamalnagar"]},{"_id":"noakhali","district":"Noakhali","coordinates":"22.8724, 91.0973","upazilla":["Subarnachar","Hatiya","Kabirhat","Noakhali Sadar","Begumganj","Senbagh","Sonaimuri","Chatkhil","Companiganj"]},{"_id":"rangamati","district":"Rangamati","coordinates":"22.7324, 92.2985","upazilla":["Rajasthali","Kawkhali","Belaichhari","Kaptai","Barkal","Juraichhari","Naniyachar","Rangamati Sadar","Bagaichhari","Langadu"]}]';
        $jsonObject = json_decode($jsonString);
        $districts = collect($jsonObject);
        
    @endphp --}}
    <section>
        <h4 class="my-5 text-center fs-3">Which Office Do You Prefer?</h4>
        <div id="contact_details">
            <div class="container">
                <div class="row" style="flex-direction: row-reverse;">

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center bg-light py-3 rounded font-18 fw-medium mb-2">
                                    Filter Branches
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <select class="tail-select" hx-get="{{ route('office') }}" hx-select="#hx-filter-target"
                                        hx-target="#hx-filter-target" hx-swap="outerHTML" label="Select District"
                                        id="branch-district" name="branch-district" required
                                        placeholder="Select District...">
                                        @foreach ($districts as $district)
                                            <option value="{{ $district }}" @selected(trim($district) === 'Chattogram')>{{ trim($district) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="branch-thana">Thana <span class="text-danger">*</span></label>
                                    <select class="tail-select" hx-get={{ route('office') }} hx-select="#hx-filter-target"
                                        hx-target="#hx-filter-target" hx-swap="outerHTML" id="branch-thana"
                                        name="branch-thana" required placeholder="Select Thana...">
                                        @foreach ($thanas as $thana)
                                            <option value="{{ trim($thana) }}">{{ $thana }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="hx-filter-target" class="row" style="flex-direction: row-reverse;" hx-tranisition>
                        @if ($maps->count() > 0)
                            <div class="col-12 my-2">
                                Available Branches
                            </div>
                            <div class="col-lg-6 mb-lg-0 mb-4">
                                <embed style='object-fit:cover;' src="{{ $maps[0]->src }}"
                                    class="border w-100 h-100 rounded-3 shadow-sm " />
                            </div>

                            <div class="col-lg-6 ">
                                <div class="rounded-3 shadow-sm border w-100 h-100 bg-light p-3" id="branch-wrapper">
                                    @foreach ($maps as $key => $map)
                                        <div class="p-3 mb-4">
                                            <h4>{{ $map->location }}</h4>
                                            <div class="mb-3">{!! $map->address !!}</div>
                                            <div class="d-flex gap-5">

                                                <div>
                                                    <a href="{{ route('appointment.make') }}" class="text-dark fw-bold"
                                                        style="text-decoration: underline!important;">Make
                                                        Appointment</a>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($key + 1 !== count($maps))
                                            <hr class="bg-light">
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('customJs')
    {{-- Selectize start --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
        integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Selectize end --}}
    {{-- <script>
        function branchSelection() {
            // let districtSelctize = $('#branch-district').selectize({
            //     maxItems: 1,
            //     sortField: 'text',
            //     create: false,
            //     labelField: 'district',
            //     valueField: 'district',
            //     searchField: 'district',
            // });
            let thanaSelect = $('#branch-thana').selectize({
                maxItems: 1,
                sortField: 'text',
                create: false,
                labelField: 'thana',
                valueField: 'thana',
                searchField: ['thana', 'id'],
            });
            const thanaSelecize = thanaSelect[0].selectize

            $('#branch-thana').on('change', e => {
                console.log('hello')
            })

            $('#branch-district').on('input', e => {
                // grab ups based on district
                const jsonString =
                    '[{"_id":"bandarban","district":"Bandarban","coordinates":"21.8311, 92.3686","upazilla":["Ali Kadam","Thanchi","Lama","Bandarban Sadar","Rowangchhari","Naikhongchhari","Ruma"]},{"_id":"brahmanbaria","district":"Brahmanbaria","coordinates":"23.9608, 91.1115","upazilla":["Akhaura","Nasirnagar","Bancharampur","Sarail","Ashuganj","Bijoynagar","Nabinagar","Kasba","Brahmanbaria Sadar"]},{"_id":"chandpur","district":"Chandpur","coordinates":"23.2513, 90.8518","upazilla":["Haziganj","Faridganj","Matlab Dakshin","Chandpur Sadar","Kachua","Haimchar","Shahrasti","Matlab Uttar"]},{"_id":"chattogram","district":"Chattogram","coordinates":"22.5150, 91.7539","upazilla":["Rangunia","Sitakunda","Boalkhali","Patiya","Banshkhali","Karnaphuli","Lohagara","Hathazari","Mirsharai","Sandwip","Raozan","Chandanaish","Fatikchhari","Anwara","Satkania"]},{"_id":"cox\'s bazar","district":"Cox\'s Bazar","coordinates":"21.5641, 92.0282","upazilla":["Maheshkhali","Chakaria","Cox\'s Bazar Sadar","Ukhia","Pekua","Ramu","Teknaf","Kutubdia"]},{"_id":"cumilla","district":"Cumilla","coordinates":"23.4576, 91.1809","upazilla":["Titas","Monohargonj","Chandina","Cumilla Adarsha Sadar","Meghna","Nangalkot","Chauddagram","Barura","Cumilla Sadar Dakshin","Laksam","Daudkandi","Homna","Burichang","Debidwar","Muradnagar","Brahmanpara","Lalmai"]},{"_id":"feni","district":"Feni","coordinates":"22.9409, 91.4067","upazilla":["Fulgazi","Parshuram","Feni Sadar","Sonagazi","Daganbhuiyan","Chhagalnaiya"]},{"_id":"khagrachari","district":"Khagrachari","coordinates":"23.1322, 91.9490","upazilla":["Lakshmichhari","Panchhari","Mahalchhari","Dighinala","Manikchhari","Matiranga","Ramgarh","Khagrachhari Sadar"]},{"_id":"lakshmipur","district":"Lakshmipur","coordinates":"22.9447, 90.8282","upazilla":["Raipur","Ramganj","Lakshmipur Sadar","Ramgati","Kamalnagar"]},{"_id":"noakhali","district":"Noakhali","coordinates":"22.8724, 91.0973","upazilla":["Subarnachar","Hatiya","Kabirhat","Noakhali Sadar","Begumganj","Senbagh","Sonaimuri","Chatkhil","Companiganj"]},{"_id":"rangamati","district":"Rangamati","coordinates":"22.7324, 92.2985","upazilla":["Rajasthali","Kawkhali","Belaichhari","Kaptai","Barkal","Juraichhari","Naniyachar","Rangamati Sadar","Bagaichhari","Langadu"]}]';
                const data = JSON.parse(jsonString)
                const UP = data.filter(item => item.district == e.target.value.trim())[0]
                    .upazilla
                const upazillas = UP.map(item => {
                    return {
                        thana: item,
                        id: item.toLowerCase
                    }
                })
                thanaSelecize.clear();
                thanaSelecize.clearOptions();
                thanaSelecize.load(set => set(upazillas));
            })

            // $('#branch-thana').on('change', e => {
            //     let thana = e.target.value.trim()
            //     console.log(thana);
            //     let url = "{{ route('ajax.get.branches', 'THANA') }}"
            //     if (thana !== '') {
            //         url = url.replace('THANA', thana)
            //         $.ajax({
            //             type: "get",
            //             url: url,
            //             success: function(response) {
            //                 console.log(response);
            //                 let branchWrapper = $('#branch-wrapper')
            //                 branchWrapper.children().remove()

            //                 branchWrapper.append(
            //                     `<div class="text-center">
        //                                 <div class="d-flex flex-column justify-content-center" style="height:300px;">
        //                                     No branches available
        //                                 </div>    
        //                             </div>`
            //                 )
            //                 if (response.length > 0) {
            //                     branchWrapper.children().remove()
            //                     response.forEach((item, i) => {
            //                         let branchInput = `
        //                         <div class="p-3 mb-4">
        //                         <h4>${item.location}</h4>
        //                         <div class="mb-3">
        //                         ${item.address}    
        //                         </div>
        //                         <div class="d-flex gap-5">
        //                             <div>
        //                                 <a href="{{ route('appointment.make') }}" class="text-dark fw-bold"
        //                                     style="text-decoration: underline!important;">Make
        //                                     Appointment</a>
        //                             </div>
        //                         </div>
        //                     </div>
        //                     ${
        //                         i+1 !== response.length ? '<hr class="bg-light">' : ''
        //                     }
        //                     `
            //                         branchWrapper.append(branchInput)
            //                     });
            //                 }
            //             }
            //         });
            //     }
            // })
        }
        branchSelection();
    </script> --}}
@endpush
