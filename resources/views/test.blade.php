@extends('backend.layouts.app')


@section('content')
    {{-- <ul>
        @foreach ($clients as $client)
            @foreach ($client->projects as $project)
                <li>
                    Project: {{ $project->name }}
                    <span class="mx-3"></span>
                    Client: {{ $client->name }}
                    <span class="ms-3">Tasks:</span>
                    <ul class="d-inline-flex gap-2 list-unstyled">
                        @foreach ($client->tasks($project->id)->get() as $task)
                            <li>{{ $task->name }}</li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        @endforeach
    </ul> --}}

    @push('customCss')
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@300;400;500;600;700;800&family=Noto+Serif+Bengali:wght@400;500;600;700;800&display=swap');

            @page {
                size: A4 Portrait;
                font: 12pt;
            }

            @page {
                @top-left {
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

            .return {
                position: relative;
                width: 100%;
            }

            .return .formNo {
                text-align: end;
                color: black;
                font-size: 16px;
            }

            .return .heading {
                text-align: center;
                color: black;
                font-size: 20px;
                padding: 12px 0;
            }

            .return .details {
                text-align: start;
                color: black;
                font-size: 16px;
            }

            .return .table_start td.tin_num {
                width: 28px !important;
                height: 40px !important;
            }

            .flex_row {
                display: inline-block;
            }

            .table_1 {
                width: 100%;
                position: relative;
            }

            .width-1 {
                position: absolute;
                right: 0;
                margin: auto 0;
            }

            footer_1 {
                width: 100% !important;
                position: relative;
            }

            .footer_2 {
                display: block;
            }

            .footer_information {
                position: absolute;
                right: 0;
                display: block;
            }

            .table {
                padding: 0 !important;
            }

            .table>:not(caption)>*>* {
                padding: 2px 2px !important;
            }

            .table {
                vertical-align: middle;
            }
        </style>
    @endpush
    <x-backend.ui.breadcrumbs :list="['Management', 'Return', 'Create']" />

    <x-backend.ui.section-card style="box-shadow: none!important;">
        <div class="return">
            <div class="formNo">
                Form No. IT-10BB
            </div>
            <div class="heading">
                FORM
            </div>
            <div class="details">
                Statement under section 75(2)(d)(i) and section 80 of the Income Tax Ordinance, 1984
                (XXXVI of 1984) regarding particulars of life style
            </div>
            <div class="table_start">
                <div class="table-heading">
                    <table class="table_1 table-responsive">
                        <tr>
                        <tr class="flex_row">
                            <td colspan="12" style="padding-top:8px">
                                Name of the Assessee: Abdullah Al Mamun
                            </td>
                        </tr>
                        <tr class="flex_row width-1">
                            <td colspan="2">TIN</td>
                            <td class="tin_num"><input type="text" name="" class="w-100 border p-0"></td>
                            <td class="tin_num"><input type="text" name="" class="w-100 border p-0"></td>
                            <td class="tin_num"><input type="text" name="" class="w-100 border p-0"></td>
                            <td class="tin_num"><input type="text" name="" class="w-100 border p-0"></td>
                            <td class="tin_num"><input type="text" name="" class="w-100 border p-0"></td>
                            <td class="tin_num"><input type="text" name="" class="w-100 border p-0"></td>
                            <td class="tin_num"><input type="text" name="" class="w-100 border p-0"></td>
                            <td class="tin_num"><input type="text" name="" class="w-100 border p-0"></td>
                            <td class="tin_num"><input type="text" name="" class="w-100 border p-0"></td>
                            <td class="tin_num"><input type="text" name="" class="w-100 border p-0"></td>
                            <td class="tin_num"><input type="text" name="" class="w-100 border p-0"></td>
                            <td class="tin_num"><input type="text" name="" class="w-100 border p-0"></td>
                        </tr>
                        </tr>
                    </table>
                    <table class="table table-bordered mt-1 table-responsive">
                        <tr>
                            <th>Serial No. </th>
                            <th>Particulars of Expenditure </th>
                            <th>Amount of Tk. </th>
                            <th>Comments </th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Personal and fooding expenses</td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder="TK:"></td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Tax paid including deduction at source of
                                the last financial year</td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder="TK:"></td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Accommodation expenses </td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder="TK:"></td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Transport expenses </td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder="TK:"></td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Electric Bill for residence </td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder="TK:"></td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Wasa Bill for residence </td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder="TK:"></td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Gas Bill for residence </td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder="TK:"></td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Telephone Bill for residence</td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder="TK:"></td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Education expenses for children </td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder="TK:"></td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Personal expenses for Foreign travel </td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder="TK:"></td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder=""></td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Festival and other special expenses, if any </td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder="TK:"></td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder=""></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Total Expenditure </td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder="TK:"></td>
                            <td><input type="text" name="" class="form-control"
                                    style="border:none!important; box-shadow:none;" placeholder=""></td>
                        </tr>
                    </table>


                </div>
            </div>
            <div class="footer_1">
                <div class="footer_desc">
                    <tr>
                        <div class="footer_2">
                            I solemnly declare that to the best of my knowledge and belief the information given in
                            the
                            IT-10BB is correct and complete.
                        </div>
                    </tr>
                    <tr>
                        <div class="footer_information">
                            <div>
                                (Abdullah Al Mamun)
                                Name & signature of the Assessee
                            </div>
                            <div>
                                Date <span class="d-inline-block"><input type="text"
                                        class="form-control dotted-border" style="box-shadow:none;" /></span>
                            </div>
                        </div>
                    </tr>

                </div>
            </div>
        </div>
    </x-backend.ui.section-card>
@endsection
