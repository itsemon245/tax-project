@extends('backend.layouts.app')
@push('customCss')
    <style>
        .custom-editor .ck-content.ck-editor__editable {
            min-height: 90px !important;
        }
    </style>
@endpush

@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Branch', 'Location', 'Edit']" />

    <!-- end page title -->

    @php
        $jsonString =
            '[{"_id":"bandarban","district":"Bandarban","coordinates":"21.8311, 92.3686","upazilla":["Ali Kadam","Thanchi","Lama","Bandarban Sadar","Rowangchhari","Naikhongchhari","Ruma"]},{"_id":"brahmanbaria","district":"Brahmanbaria","coordinates":"23.9608, 91.1115","upazilla":["Akhaura","Nasirnagar","Bancharampur","Sarail","Ashuganj","Bijoynagar","Nabinagar","Kasba","Brahmanbaria Sadar"]},{"_id":"chandpur","district":"Chandpur","coordinates":"23.2513, 90.8518","upazilla":["Haziganj","Faridganj","Matlab Dakshin","Chandpur Sadar","Kachua","Haimchar","Shahrasti","Matlab Uttar"]},{"_id":"chattogram","district":"Chattogram","coordinates":"22.5150, 91.7539","upazilla":["Rangunia","Sitakunda","Boalkhali","Patiya","Banshkhali","Karnaphuli","Lohagara","Hathazari","Mirsharai","Sandwip","Raozan","Chandanaish","Fatikchhari","Anwara","Satkania"]},{"_id":"cox\'s bazar","district":"Cox\'s Bazar","coordinates":"21.5641, 92.0282","upazilla":["Maheshkhali","Chakaria","Cox\'s Bazar Sadar","Ukhia","Pekua","Ramu","Teknaf","Kutubdia"]},{"_id":"cumilla","district":"Cumilla","coordinates":"23.4576, 91.1809","upazilla":["Titas","Monohargonj","Chandina","Cumilla Adarsha Sadar","Meghna","Nangalkot","Chauddagram","Barura","Cumilla Sadar Dakshin","Laksam","Daudkandi","Homna","Burichang","Debidwar","Muradnagar","Brahmanpara","Lalmai"]},{"_id":"feni","district":"Feni","coordinates":"22.9409, 91.4067","upazilla":["Fulgazi","Parshuram","Feni Sadar","Sonagazi","Daganbhuiyan","Chhagalnaiya"]},{"_id":"khagrachari","district":"Khagrachari","coordinates":"23.1322, 91.9490","upazilla":["Lakshmichhari","Panchhari","Mahalchhari","Dighinala","Manikchhari","Matiranga","Ramgarh","Khagrachhari Sadar"]},{"_id":"lakshmipur","district":"Lakshmipur","coordinates":"22.9447, 90.8282","upazilla":["Raipur","Ramganj","Lakshmipur Sadar","Ramgati","Kamalnagar"]},{"_id":"noakhali","district":"Noakhali","coordinates":"22.8724, 91.0973","upazilla":["Subarnachar","Hatiya","Kabirhat","Noakhali Sadar","Begumganj","Senbagh","Sonaimuri","Chatkhil","Companiganj"]},{"_id":"rangamati","district":"Rangamati","coordinates":"22.7324, 92.2985","upazilla":["Rajasthali","Kawkhali","Belaichhari","Kaptai","Barkal","Juraichhari","Naniyachar","Rangamati Sadar","Bagaichhari","Langadu"]}]';
        $jsonObject = json_decode($jsonString);
        $districts = collect($jsonObject);
        
    @endphp
    <x-backend.ui.section-card name="Edit Location">
        <form action="{{ route('map.update', $map->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <x-form.selectize class="mb-1" id="district" name="district" placeholder="Select District..."
                                label="District" :canCreate="false" required>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->district }}" @selected($district->district === $map->district)>
                                        {{ $district->district }}</option>
                                @endforeach
                            </x-form.selectize>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @php
                            $defaultThanas = $districts->filter(fn($d) => $d->district === $map->district)->first()?->upazilla;
                        @endphp
                        <label for="thana">Thana</label>
                        <select id="thana" name="thana" placeholder="Select Thana...">
                            @foreach ($defaultThanas as $thana)
                                <option value="{{ $thana }}" @selected(trim($thana) == trim($map->thana))>
                                    {{ $thana }}</option>
                            @endforeach
                        </select>
                        <div class="text-success fw-bold mt-1 mb-2">Selected: {{$map->thana}}</div>
                    </div>
                    <div class="col-md-6">
                        <x-backend.form.text-input class="mb-1" label="Location" type="text" name="location"
                            :value="$map->location" required />
                        <x-form.text-area id="iframe-link" name="iframe_link" label="Iframe Link"
                            placeholder="<iframe ....></iframe>" rows="8" required>
                            {{ $map->src }}
                        </x-form.text-area>

                    </div>
                    <div class="col-md-6">
                        <div class="custom-editor">

                            <x-form.ck-editor label="Address" id="address" name="address" placeholder="Address" required>
                                {!! $map->address !!}
                            </x-form.ck-editor>
                        </div>

                    </div>
                    <div class="col-12">
                        <x-backend.ui.button class="btn-primary btn-sm float-end">Update</x-backend.ui.button>
                    </div>
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
                const thanaSelecize = thanaSelect[0].selectize
                thanaSelecize.addItem('Patiya')

                $('#district').on('input', e => {
                    // grab ups based on district
                    const jsonString =
                        '[{"_id":"bandarban","district":"Bandarban","coordinates":"21.8311, 92.3686","upazilla":["Ali Kadam","Thanchi","Lama","Bandarban Sadar","Rowangchhari","Naikhongchhari","Ruma"]},{"_id":"brahmanbaria","district":"Brahmanbaria","coordinates":"23.9608, 91.1115","upazilla":["Akhaura","Nasirnagar","Bancharampur","Sarail","Ashuganj","Bijoynagar","Nabinagar","Kasba","Brahmanbaria Sadar"]},{"_id":"chandpur","district":"Chandpur","coordinates":"23.2513, 90.8518","upazilla":["Haziganj","Faridganj","Matlab Dakshin","Chandpur Sadar","Kachua","Haimchar","Shahrasti","Matlab Uttar"]},{"_id":"chattogram","district":"Chattogram","coordinates":"22.5150, 91.7539","upazilla":["Rangunia","Sitakunda","Boalkhali","Patiya","Banshkhali","Karnaphuli","Lohagara","Hathazari","Mirsharai","Sandwip","Raozan","Chandanaish","Fatikchhari","Anwara","Satkania"]},{"_id":"cox\'s bazar","district":"Cox\'s Bazar","coordinates":"21.5641, 92.0282","upazilla":["Maheshkhali","Chakaria","Cox\'s Bazar Sadar","Ukhia","Pekua","Ramu","Teknaf","Kutubdia"]},{"_id":"cumilla","district":"Cumilla","coordinates":"23.4576, 91.1809","upazilla":["Titas","Monohargonj","Chandina","Cumilla Adarsha Sadar","Meghna","Nangalkot","Chauddagram","Barura","Cumilla Sadar Dakshin","Laksam","Daudkandi","Homna","Burichang","Debidwar","Muradnagar","Brahmanpara","Lalmai"]},{"_id":"feni","district":"Feni","coordinates":"22.9409, 91.4067","upazilla":["Fulgazi","Parshuram","Feni Sadar","Sonagazi","Daganbhuiyan","Chhagalnaiya"]},{"_id":"khagrachari","district":"Khagrachari","coordinates":"23.1322, 91.9490","upazilla":["Lakshmichhari","Panchhari","Mahalchhari","Dighinala","Manikchhari","Matiranga","Ramgarh","Khagrachhari Sadar"]},{"_id":"lakshmipur","district":"Lakshmipur","coordinates":"22.9447, 90.8282","upazilla":["Raipur","Ramganj","Lakshmipur Sadar","Ramgati","Kamalnagar"]},{"_id":"noakhali","district":"Noakhali","coordinates":"22.8724, 91.0973","upazilla":["Subarnachar","Hatiya","Kabirhat","Noakhali Sadar","Begumganj","Senbagh","Sonaimuri","Chatkhil","Companiganj"]},{"_id":"rangamati","district":"Rangamati","coordinates":"22.7324, 92.2985","upazilla":["Rajasthali","Kawkhali","Belaichhari","Kaptai","Barkal","Juraichhari","Naniyachar","Rangamati Sadar","Bagaichhari","Langadu"]}]';
                    const data = JSON.parse(jsonString)
                    const UP = data.filter(item => item.district === e.target.value)[0]
                        .upazilla
                    const upazillas = UP.map(item => {
                        return {
                            thana: item,
                            id: item.toLowerCase()
                        }
                    })

                    thanaSelecize.clear();
                    thanaSelecize.clearOptions();
                    console.log(upazillas);
                    thanaSelecize.load(set => set(upazillas))

                })
            });
        </script>
    @endpush
@endsection
