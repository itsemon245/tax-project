@extends('backend.layouts.app')
@section('content')
    @push('customCss')
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@300;400;500;600;700;800&family=Noto+Serif+Bengali:wght@400;500;600;700;800&display=swap');

            @page {
                size: A4 landscape;
                font: 12pt;
                margin: auto;
            }

            @media print {

                .table th,
                td {
                    font-size: 12pt !important;
                }

            }

            .dotted-border {
                border: 4px dotted var(--ct-dark);
                height: 1.4rem;
                border-top: 0;
                padding-top: 4px;
                border-right: 0;
                border-left: 0;
            }

            .chalan {
                position: relative;
            }


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
                                <input type="text" class="dotted-border text-center text-dark" style="width: 4rem;"
                                    value="{{ $chalan->chalan_no }}" disabled />
                                তারিখঃ {{ $chalan->date->format('d/m/Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">বাংলাদেশ ব্যাংক/সোনালি ব্যাংকের চট্টগ্রাম জেলার
                                <input type="text" class="dotted-border text-center text-dark"
                                    value="{{ $chalan->bank_name }}" disabled>
                                টাকা জমা দেওয়ার চালান
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center py-2"> কোড নংঃ <x-backend.form.box-input name="code"
                                    :value="$chalan->code" />
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
                            <div class="mb-2">
                                <span>Name:</span> <input type="text" name="name" class="dotted-border"
                                    style="max-width: 8rem;" value="{{ $chalan->name }}" />
                            </div>
                            <div class="mb-2">
                                <span>
                                    Phone:
                                </span>
                                <input type="text" name="phone" class="dotted-border" style="max-width: 8rem;"
                                    value="{{ $chalan->phone }}" />
                            </div>
                            <div>
                                <span>Location:</span>
                                <div class="font-14">
                                    {{ $chalan->location }}
                                </div>
                            </div>
                        </td>
                        <td style="max-width: 25ch;">
                            <div class="">
                                <span>Client:</span>
                                <span id="name" class="text-capitalize">{{ $chalan->client?->name }}</span>
                            </div>
                            <div class="" id="client-info">
                                <div class="">
                                    <span>Company:</span>
                                    <span id="company" class="text-capitalize">{{ $chalan->client?->company_name }}</span>
                                </div>

                                <div class="">
                                    <span>Tin:</span>
                                    <span id="tin">{{ $chalan->client?->tin }}</span>
                                </div>
                                <div class="">
                                    <span>Circle:</span>
                                    <span id="circle">{{ $chalan->client?->circle }}</span>
                                </div>
                                <div class="">
                                    <span>Location:</span>
                                    <div class="font-14" id="location" style="line-break: word;">
                                        {{ $chalan->client?->present_address }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td style="max-width: 25ch;">
                            <div class="mb-2">
                                <span>Purpose:</span> <input type="text" name="purpose" class="dotted-border"
                                    style="max-width: 8rem;" value="{{ $chalan->purpose }}" />
                            </div>
                            <div class="d-flex gap-1 align-items-center mb-2">
                                <label for="year" class="d-inline">Year:</label>
                                <span>{{ $chalan->year }}</span>

                            </div>
                            <div>
                                <span>Description:</span>
                                <div class="font-14">{{ $chalan->description }}</div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex gap-3 p-2">
                                <span>Payment Type: </span>
                                <span class="text-capitalize">{{ $chalan->payment_type }}</span>
                            </div>
                            @if ($chalan->payment_type === 'bank')
                                <div id="payment-info" class="d-none">
                                    <div class="mb-2">
                                        <span>Cheque No.:</span> <span>{{$chalan->cheque_no}}</span>
                                    </div>
                                    <div class="mb-2">
                                        <span class="d-block">Bank: </span> <span>{{$chalan->bank}}</span>
                                    </div>
                                    <div class="mb-2">
                                        <span class="d-block">Branch: </span><span>{{$chalan->branch}}</span>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td style="vertical-align: middle!important;">
                            <span>{{$chalan->amount}}/-</span>
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
                        <td colspan="4" class="py-1">টাকা কথায়ঃ <span>{{$chalan->amount_in_words}}</span>
                            <span class="float-end">
                                মোট টাকাঃ 
                            </span>
                        </td>
                        <td>
                            <span>{{$chalan->amount}}</span>/-
                        </td>
                        <td>.00</td>
                        <td colspan="2" rowspan="3" style="vertical-align: bottom;">
                            <div class="text-center">ম্যানেজার</div>
                            <div class="text-center">বাংলাদেশ ব্যাংক/সোনালি ব্যাংক
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" style="vertical-align: middle;">
                            টাকা পাওয় গেলঃ <span>{{$chalan->amount}}</span>/- (<span>{{$chalan->amount_in_words}}</span>)
                        </td>

                    </tr>
                    <tr>
                        <td colspan="6" style="vertical-align: middle;">
                            তারিখঃ <span class="date">{{$chalan->date->format('d/m/Y')}}</span>
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
        <button id="print-btn" class="btn btn-primary d-print-none my-2 rounded-2 fw-medium">
            <span class="mdi mdi-printer font-16"></span>
            Print
        </button>
    </x-backend.ui.section-card>
    <!-- end row-->
@endsection

@push('customJs')
    <script>
        $(document).ready(function () {
            $('#print-btn').click(e=>{
                window.print()
            })
        });
    </script>
@endpush
