@extends('backend.layouts.app')
@section('content')
    @push('customCss')
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@300;400;500;600;700;800&family=Noto+Serif+Bengali:wght@400;500;600;700;800&display=swap');

            @page {
                size: A4 landscape;
                font: 12pt;
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

        <form action="{{ route('chalan.store') }}" method="post" class="chalan">
            @csrf
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
                                <input name="chalan_no" type="text" class="dotted-border text-center"
                                    style="width: 4rem;" name="" id="" />
                                তারিখঃ <input name="date" type="date" class="dotted-border" name=""
                                    id="">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">বাংলাদেশ ব্যাংক/সোনালি ব্যাংকের চট্টগ্রাম জেলার
                                <input type="text" class="dotted-border text-center" name="bank_name" id="">
                                টাকা জমা দেওয়ার চালান
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center py-2"> কোড নংঃ <x-backend.form.box-input name="code"
                                    :range="range(1, 13)" />
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
                                    style="max-width: 8rem;" name="" id="" />
                            </div>
                            <div class="mb-2">
                                <span>
                                    Phone:
                                </span>
                                <input type="text" name="phone" class="dotted-border" style="max-width: 8rem;"
                                    name="" id="" />
                            </div>
                            <div>
                                <span>Location:</span>
                                <textarea name="" name="location" class="dotted-border ms-2" rows="10" id=""></textarea>
                            </div>
                        </td>
                        <td style="max-width: 25ch;">
                            <div class="px-2">
                                <x-form.selectize name="client_id" id="client_id" label="Select Client"
                                    placeholder="Select Client" :can-create="false">
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach

                                </x-form.selectize>
                            </div>
                            <div class="d-none" id="client-info">
                                <div class="mb-1">
                                    <span>Company:</span>
                                    <span id="company" class="text-capitalize"></span>
                                </div>

                                <div class="mb-1">
                                    <span>Tin:</span>
                                    <span id="tin"></span>
                                </div>
                                <div class="mb-1">
                                    <span>Circle:</span>
                                    <span id="circle"></span>
                                </div>
                                <div class="mb-1">
                                    <span>Location:</span>
                                    <div id="location">
                                        Location
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td style="max-width: 25ch;">
                            <div class="mb-2">
                                <span>Purpose:</span> <input type="text" name="purpose" class="dotted-border"
                                    style="max-width: 8rem;" name="" id="" />
                            </div>
                            <div class="d-flex gap-1 align-items-center mb-2">
                                <label for="year" class="d-inline">Year:</label>
                                <select id="year" class="form-select d-inline" placeholder="Select Year..."
                                    name="year">
                                    @foreach (range(currentYear(), 2020) as $year)
                                        <option value="{{ $year - 1 . '-' . $year }}">
                                            {{ $year - 1 . '-' . $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <span>Description:</span>
                                <textarea name="" name="location" class="dotted-border ms-2" rows="10" id=""></textarea>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex gap-3 p-2">
                                <div class="form-check form-check-success">
                                    <input class="form-check-input rounded-circle" type="radio" name="payment_type"
                                        value="cash" id="cash" checked>
                                    <label class="form-check-label" for="cash">Cash</label>
                                </div>
                                <div class="form-check form-check-primary">
                                    <input class="form-check-input rounded-circle" type="radio" name="payment_type"
                                        value="bank" id="bank">
                                    <label class="form-check-label" for="bank">Bank</label>
                                </div>
                            </div>
                            <div id="payment-info" class="d-none">
                                <div class="mb-2">
                                    <span>Cheque No.:</span> <input type="text" name="cheque_no" class="dotted-border"
                                        style="max-width: 8rem;" name="" id="" />
                                </div>
                                <div class="mb-2">
                                    <span class="d-block">Bank: </span> <input type="text" name="bank"
                                        class="dotted-border ms-2" name="" id="" />
                                </div>
                                <div class="mb-2">
                                    <span class="d-block">Branch: </span> <input type="text" name="branch"
                                        class="dotted-border ms-2" name="" id="" />
                                </div>
                            </div>
                        </td>
                        <td style="vertical-align: middle!important;">
                            <input type="text" name="amount" class="dotted-border mx-1" name=""
                                id="" style="max-width: 6rem;" />
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
                        <td colspan="4" class="py-1">টাকা কথায়ঃ <input type="text" name="amount_in_words"
                                class="dotted-border mx-1 py-2" style="width: 70%;" />
                            <span class="float-end">
                                মোট টাকাঃ
                            </span>
                        </td>
                        <td>
                            <span class="amount"></span>/-
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
                            টাকা পাওয় গেলঃ <span class="amount"></span>/- (<span id="in-words"></span>)
                        </td>

                    </tr>
                    <tr>
                        <td colspan="6" style="vertical-align: middle;">
                            তারিখঃ <span class="date"></span>
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
                <x-backend.ui.button class="btn-primary btn btn-sm d-print-none text-white">Create</x-backend.ui.button>
            </div>
        </form>
    </x-backend.ui.section-card>
    <!-- end row-->

    @push('customJs')
        <script>
            $(document).ready(function() {
                let paymentType = $('input[name="payment_type"]')
                let date = $('input[name="date"]')
                let amount = $('input[name="amount"]')
                let inWords = $('input[name="amount_in_words"]')
                paymentType.on('change', function(e) {
                    let paymentInfo = $('#payment-info')
                    if (e.target.value == 'cash') {
                        paymentInfo.addClass('d-none')
                        paymentInfo.find('input').val(null)
                    } else {
                        paymentInfo.removeClass('d-none')
                    }
                })

                date.on('input', e => {
                    $('.date').text(e.target.value)
                })
                amount.on('input', e => {
                    $('.amount').text(e.target.value)
                })
                inWords.on('input', e => {
                    $('#in-words').text(e.target.value)
                })


                $('#client_id').on('change', function(e) {
                    var userId = e.target.value
                    var url = "{{ route('get.client.info', ':userID') }}";
                    url = url.replace(':userID', userId);
                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(data) {
                            $('#location').text(data.present_address);
                            $('#company').text(data.company_name);
                            $('#circle').text(data.circle);
                            $('#tin').text(data.tin);
                            $('#client-info').removeClass('d-none')
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
