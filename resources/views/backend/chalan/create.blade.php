@extends('backend.layouts.app')
@section('content')
    @push('customCss')
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@300;400;500;600;700;800&family=Noto+Serif+Bengali:wght@400;500;600;700;800&display=swap');

            @page {
                size: A4 landscape;
                font: 12pt;
            }
            @page{
                @top-left{
                    content: 'Hello World'
                }
            }

            @media print {

                .table th,
                td {
                    font-size: 12pt !important;
                }

            }

            .dotted-border {
                border: 4px dotted var(--ct-dark);
                height: 1.2rem;
                border-top: 0;
                border-right: 0;
                border-left: 0;
            }

            .chalan {
                position: relative;
            }

            /* .upper-table input {
                        text-align: center;
                        height: 1.4rem;
                        vertical-align: middle;
                        min-width: 5rem;
                        max-width: 10rem;

                    } */
            .upper-table td {
                font-weight: 500;
                font-size: 1.1rem;
            }

            .extra-info {
                padding: 0 .5rem;
            }

            .extra-info>li {
                border-bottom: 1px solid black;
                margin-top: 1.5rem;
            }

            .chalan>* {
                font-family: 'Noto Sans Bengali', sans-serif !important;
            }

            .chalan .indicators {
                position: absolute;
                right: 0;
                top: 0;
            }

            .parent {
                position: relative;
                /* margin-bottom: 1.5rem; */
            }

            .parent .center {
                position: absolute;
                left: 50%;
                /* transform: translate(); */
            }

            .parent .right {
                position: absolute;
                right: 0;
            }

            .table th,
            td {
                color: black;
                font-size: 1rem;
                font-weight: 400;
                vertical-align: top;
                padding: 0.2rem !important;
            }

            .table {
                margin-bottom: 0.2rem !important;
            }

            .table th {
                text-wrap: balance;
                font-size: 0.9rem;
                font-weight: 400;
                text-align: center !important;
            }

            .table td span {
                font-weight: 600;
            }

            .footnote>* {
                color: black;
                font-family: 'Noto Sans Bengali', sans-serif !important;
                font-size: .9rem;
                font-weight: 300;
                padding-left: 1rem;
            }

            /* .copy {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                border: 1px solid #333;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                font-size: 10px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                color: #000;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            }

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            .chalan_title {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                font-size: 24px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                font-weight: 500;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                color: #000;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            }

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            .chalan {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                color: #000;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            }

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            .chalan_title_input {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                width: 200px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            }

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            .code input {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                border: 1px solid #333;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                width: 30px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                height: 30px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            }

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            .chala_table {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                border: 1px solid #333;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                margin: 20px 0 0 0;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            }

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            .chalan_table_row {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                border: 1px solid #333;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                padding: 8px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                font-size: 10px !important;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            }

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            .chalan_table_row1 {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                border: 1px solid #333;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                padding: 10px 10px 24px 10px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                border-right: transparent;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            }

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            label,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            input {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                display: block;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                margin-bottom: 10px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            }

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            option {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                font-size: 10px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            } */
        </style>
    @endpush
    <x-backend.ui.breadcrumbs :list="['Management', 'Chalan', 'Create']" />

    <x-backend.ui.section-card style="box-shadow: none!important;">

        <div class="chalan">
            <div class="parent">
                <div class="d-inline-block right">
                    <table class="table table-bordered border-dark">
                        <tr>
                            <td class="px-3">১ম (মূল) কপি</td>
                            <td class="px-3">২য় কপি</td>
                            <td class="px-3">৩য় কপি</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div>
                <div class="d-block fs-3 fw-medium text-dark text-center">চালান ফরম</div>
                <table class="mx-auto upper-table">
                    <tbody>
                        <tr>
                            <td class="text-center">টি, আর ফরম নংঃ ৬ (এস, আর ৩৭ দ্রষ্টব্য)</td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                চালান নংঃ
                                <input type="text" class="dotted-border" style="width: 4rem;" name=""
                                    id="" />
                                তারিখঃ <input type="date" class="dotted-border" name="" id=""/>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">বাংলাদেশ ব্যাংক/সোনালি ব্যাংকের চট্টগ্রাম জেলার
                                <input type="text" class="dotted-border" name="" id="">
                                টাকা জমা দেওয়ার চালান
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center py-2"> কোড নংঃ <x-backend.form.box-input :range="range(1, 13)" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <table class="table table-bordered border-dark">
                <thead>
                    <tr>
                        <th colspan="4">জমা প্রদানকারী কতৃক পূরণ করিতে হইবে</th>
                        <th colspan="2">টাকার অঙ্ক</th>
                        <th rowspan="2">বিভাগের নাম এবং
                            চালানের পৃষ্টাংকনকারী কর্মকর্তা নাম, পদবী ও দপ্তর।*</th>
                    </tr>
                    <tr>
                        <th>যাহার মারফত প্রদত্ত হইল তাহার নাম
                            ঠিকানা।</th>
                        <th>যে ব্যক্তির/ প্রতিষ্ঠানের পক্ষ হইতে
                            টাকা প্রদত্ত হইল তাহার নাম, পদবী ও ঠিকানা</th>
                        <th>কি বাবদ ফি জমা দেওয়া হইল তাহার
                            বিবরন</th>
                        <th>মুদ্রা ও নোটের বিবরণ / ড্রাফট,
                            পে-অর্ডার ও চেকের বিবরন</th>
                        <th>টাকা</th>
                        <th>পয়সা</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td style="max-width: 24ch;">
                            <div>
                                <span>Name:</span> {{ fake()->name() }}
                            </div>
                            <div>
                                <span>
                                    Phone:
                                </span>
                                {{ fake()->phoneNumber() }}
                            </div>
                            <div>
                                <span>Location:</span>
                                <div class="ps-2">
                                    {{ fake()->address() }}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <span>Client Name:</span>
                                {{ fake()->name() }}
                            </div>
                            <div>
                                <span>Company Name:</span>
                                {{ fake()->company() }}
                            </div>
                            <div>
                                <span>Location:</span>
                                <div>
                                    Location
                                </div>
                            </div>
                            <div>
                                <span>Tin/Circle:</span>
                                <div>
                                    Tin
                                </div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <span>Purpose:</span> Purpose
                            </div>
                            <div>
                                <span>Year:</span> Year
                            </div>
                            <div>
                                <span>Description:</span>
                                <div class="ps-2">
                                    Description
                                </div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <span>Cheque No.:</span> {{ random_int(10000000, 1000000000) }}
                            </div>
                            <div>
                                <span>Date:</span> {{ now()->format('d/m/Y') }}
                            </div>
                            <span class="d-block">Random Bank Bangladesh,</span>
                            <span class="d-block">Chattogram Branch</span>
                        </td>
                        <td style="vertical-align: middle!important;">
                            <span>200/-</span>
                        </td>
                        <td style="vertical-align: middle!important;">
                            <span>.00</span>
                        </td>
                        <td style="max-width: 24ch;" style="vertical-align: middle;">
                            <ul class="list-unstyled extra-info">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">টাকা কথায়ঃ দুই শত টাকা মাত্র
                            <span class="float-end">
                                মোট টাকাঃ
                            </span>
                        </td>
                        <td>200/-</td>
                        <td>.00</td>
                        <td colspan="2" rowspan="3" style="vertical-align: bottom;">
                            <div class="text-center">ম্যানেজার</div>
                            <div class="text-center">বাংলাদেশ ব্যাংক/সোনালি ব্যাংক
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" style="vertical-align: middle;">
                            টাকা পাওয় গেলঃ 200/- (দুই শত টাকা মাত্র)
                        </td>

                    </tr>
                    <tr>
                        <td colspan="6" style="vertical-align: middle;">
                            তারিখঃ {{ now('Asia/Dhaka')->locale('bn_BD')->format('d/m/Y') }} ইং
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class='footnote'>
                <ul class="list-unstyled">
                    <li>
                        নোটঃ
                        <ul style="list-style: bengali;">
                            <li>
                                সংলিষ্ট দপ্তরের সহিত যোগাযোগ করিয়া সঠিক নাম্বার জানিয়া
                                লইবেন
                            </li>
                            <li>
                                * যেঁ সকল ক্ষেত্রে কর্মকর্তা কতৃক পৃষ্টাংকন প্রয়োজন, সে
                                সকল ক্ষেত্রে প্রযোজ্য
                                হইবে।
                            </li>
                        </ul>
                    </li>
                    <li>
                        বাঃ নিঃ মুঃ ৬৩/২০১১-১২, ৫০ লক্ষ কপি, মুদ্রণাদেশ নং-৫৩/১১-১২
                    </li>
                </ul>
            </div>
        </div>
        <div>
            <x-backend.ui.button class="btn-primary btn btn-sm d-print-none">Create</x-backend.ui.button>
        </div>
    </x-backend.ui.section-card>
    <!-- end row-->

    @push('customJs')
        <script>
            function toggleInputFields() {
                const paymentMethod = document.getElementById('payment').value;
                const bankInputsDiv = document.getElementById('bankInputs');
                const bankInputs = document.getElementById('bankInput');

                if (paymentMethod === 'bank') {
                    bankInputsDiv.style.display = 'block';
                } else {
                    bankInputsDiv.style.display = 'none';
                }

                if (paymentMethod === 'cash') {
                    bankInputs.style.display = 'block';
                } else {
                    bankInputs.style.display = 'none';
                }
            }
        </script>


        <script>
            $(document).ready(function() {
                $('#userSelect').on('change', function() {
                    var userId = $(this).val();
                    //alert(userId)
                    var url = "{{ route('admin.chalan.client', ':userID') }}";
                    url = url.replace(':userID', userId);
                    if (userId) {
                        $.ajax({
                            url: url,
                            type: 'GET',
                            success: function(data) {

                                console.log(data)

                                $('#adress').val(data.location);
                                $('#company').val(data.company);
                                $('#circle').val(data.circle);
                            }
                        });
                    } else {
                        $('#location').val('');
                        $('#company').val('');
                        $('#circle').val('');
                    }
                });
            });
        </script>
    @endpush
@endsection
