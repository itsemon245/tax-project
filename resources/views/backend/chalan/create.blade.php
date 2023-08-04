@extends('backend.layouts.app')
@section('content')
    @push('customCss')
        <style>
            .copy {
                border: 1px solid #333;
                font-size: 16px;
                color: #000
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
                padding: 10px 10px 24px 10px;
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
        </style>
    @endpush
    <x-backend.ui.breadcrumbs :list="['Management', 'Chalan', 'Create']" />

    <x-backend.ui.section-card name="Create Chalan">

        <div class="container">
            <div class="row">
                <div class="col-lg-6"></div>
                <div class="col-lg-6 mb-3">
                    <div class="row justify-content-end text-center">
                        <div class="col-lg-3 copy">১ম (মূল) কপি</div>
                        <div class="col-lg-3 copy">২য় কপি</div>
                        <div class="col-lg-3 copy">৩য় কপি</div>
                    </div>
                </div>
                <div class="text-center chalan">
                    <p class="chalan_title">চালান ফরম</p>
                    <h5>টি, আর ফরম নং ৬ (এস, আর ৩৭ দ্রষ্টব্য)</h5>
                    <div class="col-lg-6 mx-auto">
                        <div class="chalan-no d-flex justify-content-center">
                            <div class="col-lg-6">
                                <x-backend.form.text-input type="text" name="text_input"
                                    class="chalan_title_input  dotted-border" required label="চালান নং" />
                            </div>
                            <div class="col-lg-6">
                                <x-backend.form.text-input type="date" name="text_input"
                                    class="chalan_title_input dotted-border" required label="তারিখ" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="d-flex align-item-center">
                            <p class="w-100">বাংলাদেশ ব্যাংক/ <b> সোনালী ব্যাংকের </b> চট্টগ্রাম জেলার </p>
                            <x-backend.form.text-input type="text" name="chalan_no"
                                class="chalan_title_input dotted-border" required />
                            <p class="w-100"> টাকা জমা দেওয়ার চালান </p>
                        </div>
                    </div>
                    <div class="col-lg-10 mx-auto d-flex">
                        <p class="me-2"> কোড নংঃ </p>
                        <div class="code d-flex mx-auto">
                            <div class="d-inline-block me-3 d-flex">
                                <input type="text" class="">
                            </div>
                            <div class="d-inline-block me-3 d-flex">
                                <input type="text" class="g-0">
                                <input type="text" class="g-0">
                                <input type="text" class="g-0">
                                <input type="text" class="g-0">
                            </div>
                            <div class="code_no d-inline-block me-3 d-flex">
                                <input type="text" class="">
                                <input type="text" class="">
                                <input type="text" class="">
                                <input type="text" class="">
                            </div>
                            <div class="code_no d-inline-block d-flex">
                                <input type="text" class="">
                                <input type="text" class="">
                                <input type="text" class="">
                                <input type="text" class="">
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-12 table-responsive">
                        <table class="w-100 chala_table">
                            <tbody>
                                <tr>
                                    <td colspan="8" class="col-lg-8 chalan_table_row">জমা প্রদানকারী কতৃক পূরণ করিতে হইবে
                                    </td>
                                    <td colspan="2" class="col-lg-2 chalan_table_row">টাকার অ ংক</td>
                                    <td colspan="2" rowspan="2" class="col-lg-2 chalan_table_row">বিভাগের নাম এবং
                                        চালানের পৃষ্টাংকনকারী কর্মকর্তা নাম, পদবী ও দপ্তর।*</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="col-lg-2 chalan_table_row">যাহার মারফত প্রদত্ত হইল তাহার নাম
                                        ঠিকানা।</td>
                                    <td colspan="2" class="col-lg-2 chalan_table_row">যে ব্যক্তির/ প্রতিষ্ঠানের পক্ষ হইতে
                                        টাকা প্রদত্ত হইল তাহার নাম, পদবী ও ঠিকানা</td>
                                    <td colspan="2" class="col-lg-2 chalan_table_row">কি বাবদ ফি জমা দেওয়া হইল তাহার
                                        বিবরন </td>
                                    <td colspan="2" class="col-lg-2 chalan_table_row">মুদ্রা ও নোটের বিবরণ ড্রাফট,
                                        পে-অর্ডার ও চেকের বিবরন</td>
                                    <td colspan="1" class="col-lg-1 chalan_table_row">টাকা</td>
                                    <td colspan="1" class="col-lg-1 chalan_table_row">পয়সা</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="col-lg-2">
                                        <div class="d-flex">
                                            <div class="col-lg-3">
                                                <label for="name" class=" mx-1">Name</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class=" me-1">
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-lg-3">
                                                <label for="name" class="my-3 mx-1">Location</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="my-3 me-1">
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-lg-3">
                                                <label for="name" class="mx-1">Phone Number</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class=" me-1">
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="2" class="col-lg-2 pt-3 chalan_table_row">
                                        <div class="d-flex">
                                            <div class="col-lg-3">
                                                <label for="name" class="mx-1">Client Name</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="me-1">
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-lg-3">
                                                <label for="name" class="my-3 mx-1">Company Name</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="my-3 me-1">
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-lg-3">
                                                <label for="name" class="my-3 mx-1">Location</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <input type="text" class="my-3 me-1">
                                            </div>
                                        </div>
                                        <div class="d-flex">

                                            <label for="name" class=" mx-1">Tin:</label>
                                            <input type="text" class=" me-1 dotted-border">
                                            <label for="name" class="mx-1">/Circle</label>
                                        </div>
                                    </td>
                                    <td colspan="2" class="col-lg-2 chalan_table_row">
                                        <div class="d-flex">
                                            <div class="col-lg-3">
                                                <label for="name" class="mx-1">Purpose:</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" class="me-1">
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-lg-3">
                                                <label for="name" class="my-3 mx-1">Year:</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="date" class="my-3 me-1">
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-lg-3">
                                                <label for="name" class="my-3 mx-1">Distription</label>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" class="my-3 me-1">
                                            </div>
                                        </div>
                                    </td>
                                    <td colspan="2" class="col-lg-2 chalan_table_row">
                                        <label for="payment">Select Payment Method:</label>
                                        <select id="payment" onchange="toggleInputFields()" class="form-control">
                                            <option value="cash">Cash</option>
                                            <option value="bank">Bank</option>
                                        </select>

                                        <div id="bankInputs" style="display: none;">
                                            <label for="bankName">Bank Name:</label>
                                            <input type="text" id="bankName">

                                            <label for="accountNumber">Account Number:</label>
                                            <input type="text" id="accountNumber">
                                        </div>
                                    </td>
                                    <td colspan="1" class="col-lg-1 chalan_table_row">
                                        <input type="text" class="form-control" placeholder="Ammount">
                                    </td>
                                    <td colspan="1" class="col-lg-1 chalan_table_row">
                                        <input type="text" class="form-control" placeholder="Ammount">
                                    </td>
                                    <td colspan="2" rowspan="2" class="col-lg-2 chalan_table_row"> 
                                        <label for="">Org Name Text</label>
                                        <input type="text" class="form-control dotted-border">
                                    </td>   
                                </tr>
                                <tr>
                                    <td colspan="8" class="col-lg-8 chalan_table_row text-start"> <span class="d-inline-block"> টাকা কথায়</span> <input type="text" class="d-inline-block w-75 dotted-border"> <span class="text-end ms-5 w-25"> মোট টাকা </span> </td>
                                    <td colspan="1" class="col-lg-1 chalan_table_row">
                                        <input type="text" class="form-control" placeholder="Ammount"> </td>
                                    <td colspan="1" class="col-lg-1 chalan_table_row"> 
                                        <input type="text" class="form-control" placeholder="Ammount">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="8" class="col-lg-8 chalan_table_row text-start"> <span class="d-inline-block"> টাকা পাওয়া গেল </span> <input type="text" class="d-inline-block w-75 dotted-border"> </td>
                                </tr>
                                <tr>
                                    <td colspan="8" class="col-lg-8 chalan_table_row1 text-start"> <span class="d-inline-block">তারিখ</span> <input type="date" class="d-inline-block w-25 form-control"> </td>
                                    <td colspan="4" rowspan="4" class="text-center">
                                        <span class="d-block">ম্যানেজার </span>
                                        <span class="">বাংলাদেশ ব্যাংক/সোনালী ব্যাংক </span>
                                    </td>
                                </tr>
                               
                            </tbody>
                            
                        </table>
                        <div class=" d-flex flex-column text-start">
                            <span>নোটঃ ১। সংলিষ্ট দপ্তরের সহিত যোগাযোগ করিয়া সঠিক নাম্বার জানিয়া লইবেন</span>
                            <span>নোটঃ ২। *  যেঁ সকল ক্ষেত্রে কর্মকর্তা কতৃক পৃষ্টাংকন প্রয়োজন, সে সকল ক্ষেত্রে প্রযোজ্য হইবে।</span>
                            <span>বাঃ নিঃ মুঃ ৬৩/২০১১-১২, ৫০ লক্ষ কপি, মুদ্রণাদেশ নং-৫৩/১১-১২</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-backend.ui.section-card>
    <!-- end row-->

    @push('customJs')
        <script>
            function toggleInputFields() {
                const paymentMethod = document.getElementById('payment').value;
                const bankInputsDiv = document.getElementById('bankInputs');

                if (paymentMethod === 'bank') {
                    bankInputsDiv.style.display = 'block';
                } else {
                    bankInputsDiv.style.display = 'none';
                }
            }
        </script>
    @endpush
@endsection
