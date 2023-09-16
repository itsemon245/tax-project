@push('customCss')
    <link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css" />
@endpush
@extends('backend.layouts.app')
@section('content')
    @php
        $jsonString =
            '[{"_id":"bandarban","district":"Bandarban","coordinates":"21.8311, 92.3686","upazilla":["Ali Kadam","Thanchi","Lama","Bandarban Sadar","Rowangchhari","Naikhongchhari","Ruma"]},{"_id":"brahmanbaria","district":"Brahmanbaria","coordinates":"23.9608, 91.1115","upazilla":["Akhaura","Nasirnagar","Bancharampur","Sarail","Ashuganj","Bijoynagar","Nabinagar","Kasba","Brahmanbaria Sadar"]},{"_id":"chandpur","district":"Chandpur","coordinates":"23.2513, 90.8518","upazilla":["Haziganj","Faridganj","Matlab Dakshin","Chandpur Sadar","Kachua","Haimchar","Shahrasti","Matlab Uttar"]},{"_id":"chattogram","district":"Chattogram","coordinates":"22.5150, 91.7539","upazilla":["Rangunia","Sitakunda","Boalkhali","Patiya","Banshkhali","Karnaphuli","Lohagara","Hathazari","Mirsharai","Sandwip","Raozan","Chandanaish","Fatikchhari","Anwara","Satkania"]},{"_id":"cox\'s bazar","district":"Cox\'s Bazar","coordinates":"21.5641, 92.0282","upazilla":["Maheshkhali","Chakaria","Cox\'s Bazar Sadar","Ukhia","Pekua","Ramu","Teknaf","Kutubdia"]},{"_id":"cumilla","district":"Cumilla","coordinates":"23.4576, 91.1809","upazilla":["Titas","Monohargonj","Chandina","Cumilla Adarsha Sadar","Meghna","Nangalkot","Chauddagram","Barura","Cumilla Sadar Dakshin","Laksam","Daudkandi","Homna","Burichang","Debidwar","Muradnagar","Brahmanpara","Lalmai"]},{"_id":"feni","district":"Feni","coordinates":"22.9409, 91.4067","upazilla":["Fulgazi","Parshuram","Feni Sadar","Sonagazi","Daganbhuiyan","Chhagalnaiya"]},{"_id":"khagrachari","district":"Khagrachari","coordinates":"23.1322, 91.9490","upazilla":["Lakshmichhari","Panchhari","Mahalchhari","Dighinala","Manikchhari","Matiranga","Ramgarh","Khagrachhari Sadar"]},{"_id":"lakshmipur","district":"Lakshmipur","coordinates":"22.9447, 90.8282","upazilla":["Raipur","Ramganj","Lakshmipur Sadar","Ramgati","Kamalnagar"]},{"_id":"noakhali","district":"Noakhali","coordinates":"22.8724, 91.0973","upazilla":["Subarnachar","Hatiya","Kabirhat","Noakhali Sadar","Begumganj","Senbagh","Sonaimuri","Chatkhil","Companiganj"]},{"_id":"rangamati","district":"Rangamati","coordinates":"22.7324, 92.2985","upazilla":["Rajasthali","Kawkhali","Belaichhari","Kaptai","Barkal","Juraichhari","Naniyachar","Rangamati Sadar","Bagaichhari","Langadu"]}]';
        $jsonObject = json_decode($jsonString);
        $districts = collect($jsonObject);
        
    @endphp
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Expert Profile', 'Create']" />

    <x-backend.ui.section-card name="Expert Section">

        <form action="{{ route('expert-profile.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <p class="m-0">Select Category <span class="text-danger">*</span></p>
                    <div class="card p-2 d-flex justify-content-around">
                        <div class="row">
                            @foreach ($expertCategories as $expertCategory)
                                {{-- <div class="col-md-4"><x-form.check-box type="checkbox" name="expert_categories[]" :label="$expertCategory->name" />
                            </div> --}}
                                <div class="col-md-4">
                                    <input type="checkbox" value="{{ $expertCategory->id }}" class="form-check-input"
                                        id="{{ Str::slug($expertCategory->name, '-') }}" name="expert_categories[]">
                                    <label class="form-check-label"
                                        for="{{ Str::slug($expertCategory->name, '-') }}">{{ $expertCategory->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <x-backend.form.text-input label="Name" required type="text" name="name">
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-6">
                    <x-backend.form.text-input label="Post" required type="text" name="post">
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-6">
                    <x-form.ck-editor id="ck-editor1" name="bio" placeholder="Bio" label="Bio">
                    </x-form.ck-editor>
                </div>
                <div class="col-md-6">
                    <x-form.ck-editor id="ck-editor2" name="description" placeholder="description" label="Description">
                    </x-form.ck-editor>
                </div>
                <div class="col-md-6 col-lg-3">
                    <x-backend.form.text-input label="Experience" required type="number" name="experience">
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-6 col-lg-3">

                    <div>
                        <label for="district">District <span class="text-danger">*</span></label>
                        <select id="district" name="district" required placeholder="Select District...">
                            <option selected disabled></option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->district }}">{{ $district->district }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">

                    <div>
                        <label for="thana">Thana <span class="text-danger">*</span></label>
                        <select id="thana" name="thana" required placeholder="Select Thana...">
                            <option disabled selected>Select District First</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <x-backend.form.text-input label="Join Date" required type="date" name="join_date">
                    </x-backend.form.text-input>
                </div>

                <div class="col-md-6">
                    <x-backend.form.text-input label="Availability Date" required type="text" name="availability"
                        placeholder="Sat-Fri(08:00AM-11:55PM)">
                    </x-backend.form.text-input>
                    <br>
                    <x-form.ck-editor id="ck-editor3" name="at_a_glance" placeholder="Sat-Fri(08:00AM-11:55PM)"
                        label="At a Glance">
                    </x-form.ck-editor>

                </div>

                <div class="col-md-6 mt-3">
                    <x-backend.form.image-input name="image" />
                </div>

                <div class="col-md-12">
                    <x-backend.ui.button type="submit" class="btn-primary mt-2">Create</x-backend.ui.button>
                </div>
            </div>
        </form>

    </x-backend.ui.section-card>

    @pushOnce('customJs')
        {{-- Selectize start --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
            integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
            integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {{-- Selectize end --}}
        <script src="{{ asset('frontend/assets/js/jquery.bootstrap.wizard.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/form-wizard.init.js') }}"></script>
    @endPushOnce

    @push('customJs')
        <script>
            $(document).ready(function() {

                let districtSelctize = $('#district').selectize({
                    maxItems: 1,
                    sortField: 'text',
                    create: false,
                    labelField: 'district',
                    valueField: 'district',
                    searchField: 'district',
                });
                let thanaSelect = $('#thana').selectize({
                    maxItems: 1,
                    sortField: 'text',
                    create: false,
                    labelField: 'thana',
                    valueField: 'thana',
                    searchField: ['thana', 'id'],
                });

                $('#district').on('input', e => {
                    // grab ups based on district
                    const jsonString =
                        '[{"_id":"bandarban","district":"Bandarban","coordinates":"21.8311, 92.3686","upazilla":["Ali Kadam","Thanchi","Lama","Bandarban Sadar","Rowangchhari","Naikhongchhari","Ruma"]},{"_id":"brahmanbaria","district":"Brahmanbaria","coordinates":"23.9608, 91.1115","upazilla":["Akhaura","Nasirnagar","Bancharampur","Sarail","Ashuganj","Bijoynagar","Nabinagar","Kasba","Brahmanbaria Sadar"]},{"_id":"chandpur","district":"Chandpur","coordinates":"23.2513, 90.8518","upazilla":["Haziganj","Faridganj","Matlab Dakshin","Chandpur Sadar","Kachua","Haimchar","Shahrasti","Matlab Uttar"]},{"_id":"chattogram","district":"Chattogram","coordinates":"22.5150, 91.7539","upazilla":["Rangunia","Sitakunda","Boalkhali","Patiya","Banshkhali","Karnaphuli","Lohagara","Hathazari","Mirsharai","Sandwip","Raozan","Chandanaish","Fatikchhari","Anwara","Satkania"]},{"_id":"cox\'s bazar","district":"Cox\'s Bazar","coordinates":"21.5641, 92.0282","upazilla":["Maheshkhali","Chakaria","Cox\'s Bazar Sadar","Ukhia","Pekua","Ramu","Teknaf","Kutubdia"]},{"_id":"cumilla","district":"Cumilla","coordinates":"23.4576, 91.1809","upazilla":["Titas","Monohargonj","Chandina","Cumilla Adarsha Sadar","Meghna","Nangalkot","Chauddagram","Barura","Cumilla Sadar Dakshin","Laksam","Daudkandi","Homna","Burichang","Debidwar","Muradnagar","Brahmanpara","Lalmai"]},{"_id":"feni","district":"Feni","coordinates":"22.9409, 91.4067","upazilla":["Fulgazi","Parshuram","Feni Sadar","Sonagazi","Daganbhuiyan","Chhagalnaiya"]},{"_id":"khagrachari","district":"Khagrachari","coordinates":"23.1322, 91.9490","upazilla":["Lakshmichhari","Panchhari","Mahalchhari","Dighinala","Manikchhari","Matiranga","Ramgarh","Khagrachhari Sadar"]},{"_id":"lakshmipur","district":"Lakshmipur","coordinates":"22.9447, 90.8282","upazilla":["Raipur","Ramganj","Lakshmipur Sadar","Ramgati","Kamalnagar"]},{"_id":"noakhali","district":"Noakhali","coordinates":"22.8724, 91.0973","upazilla":["Subarnachar","Hatiya","Kabirhat","Noakhali Sadar","Begumganj","Senbagh","Sonaimuri","Chatkhil","Companiganj"]},{"_id":"rangamati","district":"Rangamati","coordinates":"22.7324, 92.2985","upazilla":["Rajasthali","Kawkhali","Belaichhari","Kaptai","Barkal","Juraichhari","Naniyachar","Rangamati Sadar","Bagaichhari","Langadu"]}]';
                    const data = JSON.parse(jsonString)
                    console.log(data);
                    const UP = data.filter(item => item.district == e.target.value)[0]
                        .upazilla
                    const upazillas = UP.map(item => {
                        return {
                            thana: item,
                            id: item.toLowerCase
                        }
                    })
                    const thanaSelecize = thanaSelect[0].selectize
                    thanaSelecize.clear();
                    thanaSelecize.clearOptions();
                    thanaSelecize.load(set => set(upazillas));

                })
            });
        </script>
    @endpush
@endsection
