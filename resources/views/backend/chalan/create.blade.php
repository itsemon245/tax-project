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
            .chala_table{
                border: 1px solid #333;
                margin: 20px 0 0 0;
            }
            .chalan_table_row{
                border: 1px solid #333;
                padding: 10px 10px 24px 10px;
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
                    <div class="col-lg-7 mx-auto d-flex">
                        <p class="me-2"> কোড নংঃ </p>
                        <div class="code">
                            <div class="d-inline-block me-3">
                                <input type="text" class="">
                            </div>
                            <div class="d-inline-block me-3">
                                <input type="text" class="g-0">
                                <input type="text" class="g-0">
                                <input type="text" class="g-0">
                                <input type="text" class="g-0">
                            </div>
                            <div class="code_no d-inline-block me-3">
                                <input type="text" class="">
                                <input type="text" class="">
                                <input type="text" class="">
                                <input type="text" class="">
                            </div>
                            <div class="code_no d-inline-block">
                                <input type="text" class="">
                                <input type="text" class="">
                                <input type="text" class="">
                                <input type="text" class="">
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-12">
                        <table class="w-100 chala_table">
                            <tbody>
                                <tr>
                                    <td colspan="8" class="col-lg-8 chalan_table_row">জমা প্রদানকারী কতৃক পূরণ করিতে হইবে</td>
                                    <td colspan="2" class="col-lg-2 chalan_table_row">টাকার অ ংক</td>
                                    <td colspan="2" rowspan="4" class="col-lg-2 chalan_table_row">বিভাগের নাম এবং চালানের পৃষ্টাংকনকারী কর্মকর্তা নাম, পদবী ও দপ্তর।*</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="col-lg-2 chalan_table_row">12</td>
                                    <td colspan="2" class="col-lg-2 chalan_table_row">12</td>
                                    <td colspan="2" class="col-lg-2 chalan_table_row">12</td>
                                    <td colspan="2" class="col-lg-2 chalan_table_row">12</td>
                                    <td colspan="1" class="col-lg-1 chalan_table_row">12</td>
                                    <td colspan="1" class="col-lg-1 chalan_table_row">12</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-backend.ui.section-card>
    <!-- end row-->
@endsection
