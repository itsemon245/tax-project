@extends('backend.layouts.app')
@section('content')
    @push('customCss')
        <style>
            @page {
                size: A4;
                margin-left: 1cm;
            }


            .dotted-border {
                border: 2px dotted var(--ct-dark);
                height: 1.25rem;
                border-top: 0;
                border-right: 0;
                border-left: 0;
                min-width: 3rem;
            }

            p {
                margin-bottom: 0 !important;
            }

            .return-form * {
                font-family: 'Times New Roman', Times, serif !important;
                font-size: 1rem;
                color: black;
            }

            .br-page {
                page-break-after: always;
            }

            .page-1 .upper-table td {
                color: black;
                padding: 2px;
            }

            .page-1 .upper-table {
                margin-top: 4px;
            }

            .form label {
                max-width: max-content;
                font-weight: 400;
                display: inline;
            }

            .form ol>li {
                margin-bottom: 8px;
            }

            .page-1 .form .inner-table td {
                vertical-align: middle;
                padding: 2px;
            }

            section {
                counter-reset: serial;
            }

            .reset__serial {
                counter-reset: serial;
            }

            .table th {
                text-align: center;
            }

            .table th,
            .table td {
                padding: 2px;
                vertical-align: top;
            }

            .page-4 .table th,
            .page-4 .table td {
                padding: 0;
            }


            .page-6 .table td {
                line-height: 1rem;
                vertical-align: middle;
            }

            .table .serial::before {
                counter-increment: serial;
                content: counter(serial)".";
                font-weight: 600;
            }

            .document-list .ck-content.ck-editor__editable {
                min-height: 150px !important;
            }
        </style>
    @endpush
    <x-backend.ui.breadcrumbs :list="['Management', 'Return', 'Create']" />

    <x-backend.ui.section-card style="box-shadow: none!important;">
        <h4 class="my-2 text-center d-print-none">Create Return</h4>
        <div class="return-form">
            <section class="page-1">
                <div>
                    <div class="mx-auto">
                        <h6 class="text-center mb-1 ">National Board of Revenue</h6>
                        <p class="text-center">www.nbr.gov.bd</p>
                    </div>
                    <div class="text-end text-dark fw-bold float-end">IT-11GA(2023)</div>
                </div>
                <table class="w-100">
                    <tr>
                        <td>
                            <table class="table-bordered border-2 border-dark w-100 upper-table">
                                <tr>
                                    <td colspan="2">
                                        <h3 class="m-0 fw-bold font-16 text-center">For Official Use</h3>
                                    </td>

                                </tr>
                                <tr>
                                    <td>Serieal No. Of Return Register</td>
                                    <td style="width: 4rem;"></td>
                                </tr>
                                <tr>
                                    <td>Volume No. Of Return Register</td>
                                    <td style="width: 4rem;"></td>
                                </tr>
                                <tr>
                                    <td>Date Of Return Submission</td>
                                    <td style="width: 4rem;"></td>
                                </tr>
                            </table>
                        </td>
                        <td colspan="3" class="px-3">
                            <div class="text-uppercase font-16 fw-bold p-1 border border-dark text-center text-dark"
                                style="max-width:max-content;">From of
                                return of income <br> for natural person</div>
                        </td>
                    </tr>
                </table>
                <div class="border border-dark p-2 mt-3 form">
                    <ol class="text-dark list-unstyled">
                        <li>1. <label for="tax-payer-name">Name Of Taxpayer:</label> <input id="tax-payer-name"
                                class="w-75 dotted-border" name="tax_payer_name" type="text"></li>
                        <li>2. <label for="nid">NID No. / Passport No (if no NID is available):</label> <input
                                id="nid" type="number" class="w-50 dotted-border" name="nid"></li>
                        <li>3. <label for="tin">TIN:</label>

                            <x-backend.form.box-input name="tin" :range="range(1, 13)" />
                        </li>
                        <li>
                            <ul class="p-0" style="list-style-type: none;">
                                <li class="d-inline">4.</li>
                                <li class="d-inline">
                                    <label for="circle">(a) Circle:</label> <input id="circle" style="width: 120px;"
                                        class="dotted-border" name="circle" type="text">
                                </li>
                                <li class="d-inline">
                                    <label for="zone">(b) Taxes Zone:</label> <input id="zone"
                                        style="width: 120px;" class="dotted-border" name="zone" type="text">
                                </li>
                                <li class="d-inline">
                                    <label for="district">(c) District:</label> <input id="district" style="width: 120px;"
                                        class="dotted-border" name="district" type="text">
                                </li>
                            </ul>
                        </li>
                        <li class="mb-0">
                            <table class="inner-table">
                                <tr>
                                    <td class="ps-0">
                                        5.
                                        <label for="assesment-year">Assesment Year:</label>
                                        <input id="assesment-year" class="" name="assesment_year" type="date">
                                    </td>
                                    <td class="ps-3">
                                        6. Residenstial Status:
                                        <label for="residential" class="ps-2">Residential</label>
                                        <input id="residential" name="residential" type="radio" value="true">

                                        <label for="residential" class="ps-2">Non-Residential</label>
                                        <input id="residential" name="residential" type="radio" value="false">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="ps-0">
                                        7. Taxpayer Status:
                                        <label for="individual" class="ps-2">Individual</label>
                                        <input id="individual" name="taxpayer_status" type="radio" value="individual">

                                        <label for="firm" class="ps-2">Firm</label>
                                        <input id="firm" name="taxpayer_status" type="radio" value="firm">

                                        <label for="hindu-family" class="ps-2">Hindu Undevided Family</label>
                                        <input id="hindu-family" name="taxpayer_status" type="radio"
                                            value="hindu undevided family">

                                        <label for="others" class="ps-2">Others</label>
                                        <input id="others" name="taxpayer_status" type="radio" value="others">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="ps-0">
                                        8. Tick on the boxes to get special benefits:
                                        <div>
                                            <label for="freedom-fighter" class="ps-3">A gezette war-wounded freedom
                                                fighter</label>
                                            <input id="freedom-fighter" name="special_benefits" type="checkbox"
                                                value="freedom fighter">

                                            <label for="female" class="ps-3">Female</label>
                                            <input id="female" name="special_benefits" type="checkbox"
                                                value="female">

                                            <label for="third-gender" class="ps-3">Third Gender</label>
                                            <input id="third-gender" name="special_benefits" type="checkbox"
                                                value="third gender">

                                            <label for="disabled-person" class="ps-3">Disabled Person</label>
                                            <input id="disabled-person" name="special_benefits" type="checkbox"
                                                value="disabled person">
                                        </div>
                                        <div>
                                            <label for="aged-65" class="ps-3">Aged 65 years or more</label>
                                            <input id="aged-65" name="special_benefits" type="checkbox"
                                                value="age 65 years or more">

                                            <label for="parent-of-disabled" class="ps-3">A parent of a disabled
                                                person</label>
                                            <input id="parent-of-disabled" name="special_benefits" type="checkbox"
                                                value="a parent of a disabled person">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="dob"> 9. Date Of Birth:</label>
                                        <input type="date" name="dob" id="dob">
                                    </td>
                                    <td>
                                        <div> 10.
                                            <label for="spouse_name">Spouse Name:</label>
                                            <input type="text" class="dotted-border" name="spouse_name"
                                                id="spouse_name">
                                        </div>
                                        <div>
                                            <label for="spouse_tin">Spouse TIN (if Tax Payer):</label>
                                            <input type="text" class="dotted-border" name="spouse_tin"
                                                id="spouse_tin">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        11. <label for="address">Address</label>
                                        <textarea name="address" id="address" class="w-100" rows="2"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        12.
                                        <label for="telephone" class="ps-2">Telephone:</label>
                                        <input type="number" class="dotted-border" style="width: 19%;" name="telephone"
                                            id="telephone">

                                        <label for="mobile" class="ps-2">Mobile:</label>
                                        <input type="number" class="dotted-border" style="width: 19%;" name="mobile"
                                            id="mobile">

                                        <label for="email" class="ps-2">Email:</label>
                                        <input type="email" class="dotted-border" style="width: 19%;" name="email"
                                            id="email">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <label for="employer_name">13. If employed, employer's name (last employer's name
                                            in case of multiple employment):</label>
                                        <div>
                                            <input type="text" class="dotted-border w-100" name="employer_name"
                                                id="employer_name">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        14.
                                        <label for="organization" class="ps-2 mb-2"> (a) Name Of Organization:</label>
                                        <input type="text" class="dotted-border mb-2" style="width: 68%;"
                                            name="organization" id="organization">
                                        <br>
                                        <label for="bin" class="ps-4"> (b) Business Identification Number
                                            (BIN):</label>
                                        <input type="text" class="dotted-border" style="width: 53%;" name="bin"
                                            id="bin">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        15. <label for="name_of_partners">Name and TIN of Partners/Members in case of
                                            Firm/Associate of Person:</label>
                                        <textarea name="name_of_partners" id="name_of_partners" class="w-100" rows="2"></textarea>
                                    </td>
                                </tr>
                            </table>
                        </li>
                    </ol>
                </div>
            </section>
            <div class="br-page"></div>

            <section class="page-2-3">
                <div class="page-2">
                    <h2 class="fw-bold text-center">
                        Statement of Income and Tax during Income Year ended <input type="date" style="width: 45%;"
                            class="">
                    </h2>
                    <h2 class="fw-bold text-center">
                        Name of the Taxpayer <input type="text" class="w-75 dotted-border">
                    </h2>
                    <div class="text-center">
                        <label for="tin" class="fw-bold">TIN:</label>
                        <x-backend.form.box-input name="tin" :range="range(1, 13)" />
                    </div>
                    <table class="table table-bordered border-dark mt-3">
                        <thead>
                            <th class="fw-bold" style="width: 30px;">
                                Serial No.
                            </th>
                            <th class="fw-bold" colspan="2">Particulars of Total Income</th>
                            <th class="fw-bold">Amount</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="serial text-center" style="width: max-content;"></td>
                                <td colspan="2">Income from Employment (annex Scedule 1)</td>
                                <td class="text-center">
                                    <input type="number" step="0.01" class="hide-default-action dotted-border px-0"
                                        style="width: 100px;">
                                </td>
                            </tr>
                            <tr>
                                <td class="serial text-center" style="width: max-content;"></td>
                                <td colspan="2">Income from Rent (annex Scedule 2)</td>
                                <td class="text-center">
                                    <input type="number" step="0.01" class="hide-default-action dotted-border px-0"
                                        style="width: 100px;">
                                </td>
                            </tr>
                            <tr>
                                <td class="serial text-center" style="width: max-content;"></td>
                                <td colspan="2">Income from Agriculture (annex Scedule 3)</td>
                                <td class="text-center">
                                    <input type="number" step="0.01" class="hide-default-action dotted-border px-0"
                                        style="width: 100px;">
                                </td>
                            </tr>
                            <tr>
                                <td class="serial text-center" style="width: max-content;"></td>
                                <td colspan="2">Income from Business (annex Scedule 4)</td>
                                <td class="text-center">
                                    <input type="number" step="0.01" class="hide-default-action dotted-border px-0"
                                        style="width: 100px;">
                                </td>
                            </tr>
                            <tr>
                                <td class="serial text-center" style="width: max-content;"></td>
                                <td colspan="2">Income from Capital Gains</td>
                                <td class="text-center">
                                    <input type="number" step="0.01" class="hide-default-action dotted-border px-0"
                                        style="width: 100px;">
                                </td>
                            </tr>
                            <tr>
                                <td class="serial text-center" style="width: max-content;"></td>
                                <td colspan="2">Income from financial Assets (<span class="font-13">Bank Interest /
                                        Devidend, Securities, Profits etc</span> )</td>
                                <td class="text-center">
                                    <input type="number" step="0.01" class="hide-default-action dotted-border px-0"
                                        style="width: 100px;">
                                </td>
                            </tr>
                            <tr>
                                <td class="serial text-center" style="width: max-content;"></td>
                                <td colspan="2">Income from Other Sources (<span class="font-13">Royality, License Fee,
                                        Honorarium, Govt. Incentive etc</span> )</td>
                                <td class="text-center">
                                    <input type="number" step="0.01" class="hide-default-action dotted-border px-0"
                                        style="width: 100px;">
                                </td>
                            </tr>
                            <tr>
                                <td class="serial text-center" style="width: max-content;"></td>
                                <td colspan="2">Income from Firm or AOP</td>
                                <td class="text-center">
                                    <input type="number" step="0.01" class="hide-default-action dotted-border px-0"
                                        style="width: 100px;">
                                </td>
                            </tr>
                            <tr>
                                <td class="serial text-center" style="width: max-content;"></td>
                                <td colspan="2">Income from minor or spouse (<span>if not Taxpayer</span> )</td>
                                <td class="text-center">
                                    <input type="number" step="0.01" class="hide-default-action dotted-border px-0"
                                        style="width: 100px;">
                                </td>
                            </tr>
                            <tr>
                                <td class="serial text-center" style="width: max-content;"></td>
                                <td colspan="2">Taxable from Abroad (<span>if not Taxpayer</span> )</td>
                                <td class="text-center">
                                    <input type="number" step="0.01" class="hide-default-action dotted-border px-0"
                                        style="width: 100px;">
                                </td>
                            </tr>
                            <tr>
                                <td class="serial text-center" style="width: max-content;"></td>
                                <td colspan="2" class="fw-bold">Total Income (<span class="fw-bold">Aggregate of 1 to
                                        10</span> )</td>
                                <td class="text-center">
                                    <span id="total-income"></span>
                                </td>
                            </tr>

                            {{-- Tax Computatios --}}
                            <tr>
                                <td colspan="4" style="height: 64px;vertical-align:bottom;" class="border-0 fw-bold">
                                    Tax
                                    Computation</td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td colspan="2">Gross Tax on Taxable Income</td>
                                <td class="text-center">
                                    <input type="number" step="0.01" class="hide-default-action dotted-border px-0"
                                        style="width: 100px;">
                                </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td colspan="2">Tax Rebate (annex Schedule 5)</td>
                                <td class="text-center">
                                    <input type="number" step="0.01" class="hide-default-action dotted-border px-0"
                                        style="width: 100px;">
                                </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td colspan="2">Net Tax after Rebate (12-13)</td>
                                <td class="text-center">
                                    <input type="number" step="0.01" class="hide-default-action dotted-border px-0"
                                        style="width: 100px;">
                                </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td colspan="2">Minimum Tax</td>
                                <td class="text-center">
                                    <input type="number" step="0.01" class="hide-default-action dotted-border px-0"
                                        style="width: 100px;">
                                </td>
                            </tr>
                            <tr>
                                <td class="serial text-center" rowspan="2" style="vertical-align: middle;"></td>
                                <td colspan="2">(a) Net wealth Surcharge (if applicable)</td>
                                <td class="text-center">
                                    <input type="number" step="0.01" class="hide-default-action dotted-border px-0"
                                        style="width: 100px;">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">(a) Enviormental Surcharge (if applicable)</td>
                                <td class="text-center">
                                    <input type="number" step="0.01" class="hide-default-action dotted-border px-0"
                                        style="width: 100px;">
                                </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td colspan="2">Delay Interest, penalty or any other amount under the Income Tax Act (if
                                    any)</td>
                                <td class="text-center">
                                    <input type="number" step="0.01" class="hide-default-action dotted-border px-0"
                                        style="width: 100px;">
                                </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td colspan="2" class="fw-bold">Total Amount Payable (16 + 17 + 18)</td>
                                <td class="text-center">
                                    <input type="number" step="0.01" class="hide-default-action dotted-border px-0"
                                        style="width: 100px;">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="br-page"></div>


                <div class="page-3">
                    <table class="table table-bordered border-dark mt-3">
                        <thead>
                            <tr class="border-0">
                                <th colspan="3" class="border-0">
                                    <div class="fw-bold text-start">
                                        Particulars of Tax Payment
                                    </div>
                                </th>
                                <th colspan="3" class="border-0">
                                    <div class="fw-bold">
                                        Amount in Taka
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="serial text-center" style="width: max-content;"></td>
                                <td>Tax Deducted Or Collected at Source (attach proof)</td>
                                <td style="width:100px;text-align:center;"><input type="text"
                                        class="w-75 dotted-border"></td>
                                <td class="text-center" rowspan="5" style="width:150px;vertical-align: middle;">
                                    <input type="text" class="w-75 dotted-border">
                                </td>
                            </tr>
                            <tr>
                                <td class="serial text-center" style="width: max-content;"></td>
                                <td>Advance Tax Paid (attach proof)</td>
                                <td style="width:100px;text-align:center;"><input type="text"
                                        class="w-75 dotted-border"></td>
                            </tr>
                            <tr>
                                <td class="serial text-center" style="width: max-content;"></td>
                                <td>Advancements of tax refund [mention assesment year(s) of refund]</td>
                                <td style="width:100px;text-align:center;"><input type="text"
                                        class="w-75 dotted-border"></td>
                            </tr>
                            <tr>
                                <td class="serial text-center" style="width: max-content;"></td>
                                <td>Tax Paid with this Return</td>
                                <td style="width:100px;text-align:center;"><input type="text"
                                        class="w-75 dotted-border"></td>
                            </tr>
                            <tr>
                                <td class="serial text-center" style="width: max-content;"></td>
                                <td>Total Tax Paid and Adjusted (20 + 21 + 22 + 23)</td>
                                <td style="width:100px;text-align:center;"><input type="text"
                                        class="w-75 dotted-border"></td>
                            </tr>
                            <tr>
                                <td class="serial text-center" style="width: max-content;"></td>
                                <td>Excess Payment (24-19)</td>
                                <td>
                                    {{-- 24 - 19 --}}
                                </td>
                                <td>
                                    {{-- calculation of 24 - 19 --}}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="border-0" style="height: 30px;"></td>
                            </tr>
                            <tr>
                                <td class="serial text-center" style="width: max-content;"></td>
                                <td colspan="2">Tax Exempted / Tax Free Income(attach proof)</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- list of documents --}}
                    <section>
                        <div class="text-center fw-bold">List of Documents Furnished with this Return</div>
                        <div class="border border-dark row document-list">
                            <div class="col-6">
                                <x-form.ck-editor id="list-1" name=""
                                    placeholder="List Of Documents"></x-form.ck-editor>
                            </div>
                            <div class="col-6">
                                <x-form.ck-editor id="list-2" name=""
                                    placeholder="List Of Documents"></x-form.ck-editor>
                            </div>
                        </div>
                    </section>
                    {{-- Verification --}}

                    <table class="table table-borderless">
                        <tr>
                            <td colspan="2">
                                <h2 class="fw-bold text-center mt-1" style="text-decoration: underline;">
                                    Verifcation</h2>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="mb-2">

                                    <span class="fw-bold">I</span> <input type="text" class="dotted-border"
                                        style="width: 25%">
                                    Father/Husband <input type="text" class="dotted-border" style="width: 55%">
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div>
                                    <label for="tin" class="fw-bold">TIN:</label>
                                    <x-backend.form.box-input name="tin" :range="range(1, 13)" /> I Solemnly declare
                                    that to the best of
                                    my knowledge and belief the information given in this return and statements and
                                    documents annexed
                                    herewith is correct and complete
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="height: 40px;"></td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <label for="place" class="fw-bold">Place:</label>
                                    <input id="place" class="dotted-border">
                                </div>
                                <div>
                                    <label for="date" class="fw-bold">Date:</label>
                                    <input id="date" class="dotted-border">
                                </div>
                            </td>
                            <td>
                                <div class="text-center fw-bold">
                                    Signature
                                </div>
                                <div class="text-center fw-bold">
                                    (<input class="text-center  dotted-border" style="border-width: 4px;">)

                                </div>
                                <div class="text-center">
                                    (Name in block letters)
                                </div>
                            </td>
                        </tr>

                    </table>
                </div>
                <div class="br-page"></div>
            </section>

            <section class="page-4">
                <section>
                    <h1 class="fs-3 fw-bold text-uppercase text-center mb-0">Schedule-1</h1>
                    <h2 class="fs-4 fw-bold text-center mb-0">Particulars of Income from Employment</h2>
                    <div class="fw-bold text-center mb-1"> a) This part is applicable for employees receiving
                        salary under government pay scale </div>
                    <div class="mb-1">
                        <label for="name">Name of Taxpayer:</label> <input type="text" id="name"
                            class="dotted-border w-25">
                        <label for="tin">TIN:</label>
                        <x-backend.form.box-input :range="range(1, 13)" />
                    </div>
                    <table class="table table-bordered border-dark mb-1">
                        <thead>
                            <th class="fw-bold text-center" style="vertical-align: middle;">Particulars</th>
                            <th class="text-center fw-bold" style="width: 130px;">Amount of Income (Taka)</th>
                            <th class="text-center fw-bold" style="width: 150px;">Expired Amount (Taka)</th>
                            <th class="text-center fw-bold" style="width: 130px;">Net taxable Income (Tk.)</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td> <span class="serial me-1"></span> Basic Pay</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td style="font-size: 0.9rem;"> <span class="serial me-1"></span> Arrear Pay (<span
                                        class="font-13">if not included
                                        in taxable income earlier</span>)</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span> Special allowance</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span> House Rent allowance</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span> Medical allowance</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span> Conveyance allowance</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span>Festival allowance</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span>Support Staff allowance</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span>Leave allowance</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span>Honorarium / Reward</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span> Overtime allowance</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span> Bangla Noboborsho allowances</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span> Interest accrued on Provident Fund</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span> Lump Grant</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span> Gratuity</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span> Others, if any (provide detail)</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span> Total</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <section>
                    <div class="fw-bold"> b) This part is applicable for employees other than receiving salary under
                        government pay scale </div>
                    <table class="table table-bordered border-dark mb-0">
                        <thead>
                            <th class="fw-bold text-center" style="vertical-align: middle;">Particulars</th>
                            <th class="text-center fw-bold" style="width: 130px;">Income(Taka)</th>
                            <th class="text-center fw-bold" style="width: 130px;">Income(Taka)</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td> <span class="serial me-1"></span> Basic Pay</td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span>Allowances</td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span>Advance / Arrear Salary</td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span>Gratuity, Annuity, Pension or similar benefit</td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span>Prequisites</td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span>Receipt in lieu of or in addition to Salary or Wages
                                </td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span>Income from Employee's Share Scheme</td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span>Accommodation Facility</td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span>Transport Facility</td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span>Any other Facility provided by Employer</td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span>Employer's Contribution to Recognized Provident Fund
                                </td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span>Others, if any (provide detail)</td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span>Total Salary Received (aggregate of 1 to 12)</td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                            </tr>
                            <tr>
                                <td> <span class="serial me-1"></span>Exempted Amount (as per Part 1 of 6th Schedule)</td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                            </tr>
                            <tr>
                                <td class="fw-bold"> <span class="serial me-1"></span>Total income from salary (13-14)
                                </td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                                <td class="text-center"><input class="dotted-border w-75" /></td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
            <div class="br-page"></div>

            <section class="page-6 font-14">

                <section>
                    <h1 class="fs-5 fw-bold text-uppercase text-center my-0">Schedule-4</h1>
                    <h2 class="fs-6 fw-bold text-center my-0">(Particulars of Income from Business)</h2>
                    <div class="mb-1">
                        <label for="name">Name of Taxpayer:</label> <input type="text" id="name"
                            class="dotted-border w-25">
                        <label for="tin">TIN:</label>
                        <x-backend.form.box-input :range="range(1, 13)" />
                        <div>
                            <label for="name-of-business">Name of Business:</label> <input type="text"
                                id="name-of-business" class="dotted-border w-25">
                            <label for="nature-of-business">Nature of Business:</label> <input type="text"
                                id="nature-of-business" class="dotted-border w-25">
                        </div>
                        <div>
                            <label for="address-of-business">Address of Business:</label> <input type="text"
                                id="address-of-business" class="dotted-border w-25">
                        </div>
                    </div>
                    <table class="table table-bordered border-dark mb-1">
                        <thead>
                            <th class="fw-bold text-center font-16" style="vertical-align: middle;width:30px;">SL</th>
                            <th class="text-center fw-bold font-16">Summary of Income</th>
                            <th class="text-center fw-bold font-16" style="width: 150px;">Amount in Taka</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class=""> Sales / Turnover/ Receipt</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class=""> Gross Profit</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">General, Cost Of Goods Sold And Other Expenses</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Bad Debts</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Net Profit (02-03)</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="height: 20px;border:none;"></td>
                            </tr>
                            <tr>
                                <th class="fw-bold font-16 text-center" colspan="2">Summary of Balance Sheet</th>
                                <th class="text-center font-16 fw-bold" style="width: 150px;">Amount in Taka</th>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Cash and Bank Balance</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Inventory</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Fixed Assets</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Other Assets</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="fw-bold">Total Assets(6+7+8+9)</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Opening Capital</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Net Profit</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Drawing during the Income Year</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Closing Capital (11+12-13)</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Liablities</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="fw-bold">Total Capital & Liabilities (14+15)</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>

                        </tbody>
                    </table>
                </section>


                <section>
                    <h1 class="fs-5 fw-bold text-uppercase text-center my-0">Schedule-5</h1>
                    <h2 class="fs-6 fw-bold text-center my-0">(Particulars of Investment Tax Credit)</h2>
                    <div class="mb-1">
                        <label for="name">Name of Assessee:</label> <input type="text" id="name"
                            class="dotted-border w-25">
                        <label for="tin">TIN:</label>
                        <x-backend.form.box-input :range="range(1, 13)" />
                    </div>
                    <div class="fw-bold">
                        Particulars of Rebateable Investment
                    </div>
                    <table class="table table-bordered border-dark mb-1">
                        <thead>
                            <th class="text-center fw-bold font-16" colspan="2">Summary of Income</th>
                            <th class="text-center fw-bold font-16" style="width: 150px;">Amount in Taka</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Life Insurence Premium or Contractual Deferred Annuity Paid in
                                    Bangladesh</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Contribution to Deposit Pension Scheme</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Investment in Government Securities, Unit Certificate, Mutual Fund, ETF
                                    or Join Investment Scheme Unit Certificate</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Investment in Securities listed with Approved Stock Exchange</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Contribution to Provident Fund to which Provident Fund Act, 1925 applies
                                </td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Self & Employer's Contribution to Recognized Provident Fund</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Contribution to Super Annuation Fund</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Contribution to Benevolent Fund / Group Insurance Premium</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Contribution to Zakat Fund</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Others, if any (provide detail)</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Total Investment (aggregate of 1 to 10)</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                            <tr>
                                <td class="serial text-center"></td>
                                <td class="">Amount of Tax Rebate</td>
                                <td class="text-center"> <input class="dotted-border w-75" /> </td>
                            </tr>
                        </tbody>
                    </table>
                </section>

            </section>
            <div class="br-page"></div>

            <section class="page-7 mt-3">
                <div class="text-end fw-bold mb-2">IT-10BB(2023)</div>
                <h1 class="fs-4 fw-bold text-center mb-0">Statement of Expenses Relating to Lifestyle</h1>
                <h2 class="text-center mt-0 mb-1" style="text-decoration: underline;">(For Natural Person)</h2>
                <div class="mb-1">
                    <label for="name">Name of Taxpayer:</label> <input type="text" id="name"
                        class="dotted-border w-25">
                    <label for="tin">TIN:</label>
                    <x-backend.form.box-input :range="range(1, 13)" />
                </div>
                <table class="table table-bordered border-dark">
                    <thead>
                        <tr>
                            <th style="width: 30px;text-align: center;">Serial No.</th>
                            <th class="text-center">Details of Expenditure</th>
                            <th class="text-center">Amount in Taka</th>
                            <th class="text-center">Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="serial text-center"></td>
                            <td class="">Personal and family fooding, clothing and other essentials</td>
                            <td class="text-center">
                                <input type="text" class="dotted-border w-75">
                            </td>
                            <td class="text-center">
                                <input type="text" class="dotted-border w-75">
                            </td>
                        </tr>
                        <tr>
                            <td class="serial text-center"></td>
                            <td class="">Housing Expense</td>
                            <td class="text-center">
                                <input type="text" class="dotted-border w-75">
                            </td>
                            <td class="text-center">
                                <input type="text" class="dotted-border w-75">
                            </td>
                        </tr>
                        <tr>
                            <td class="serial text-center"></td>
                            <td class="">Personal Transport Expense</td>
                            <td class="text-center">
                                <input type="text" class="dotted-border w-75">
                            </td>
                            <td class="text-center">
                                <input type="text" class="dotted-border w-75">
                            </td>
                        </tr>
                        <tr>
                            <td class="serial text-center"></td>
                            <td class="">Utility Expense (Electricity, Gas, Water, Telephone, Mobile, Internet etc.
                                Bills)</td>
                            <td class="text-center">
                                <input type="text" class="dotted-border w-75">
                            </td>
                            <td class="text-center">
                                <input type="text" class="dotted-border w-75">
                            </td>
                        </tr>
                        <tr>
                            <td class="serial text-center"></td>
                            <td class="">Education Expense</td>
                            <td class="text-center">
                                <input type="text" class="dotted-border w-75">
                            </td>
                            <td class="text-center">
                                <input type="text" class="dotted-border w-75">
                            </td>
                        </tr>
                        <tr>
                            <td class="serial text-center"></td>
                            <td class="">Personal Expense for Local and Foreign Travel, Vacation etc.</td>
                            <td class="text-center">
                                <input type="text" class="dotted-border w-75">
                            </td>
                            <td class="text-center">
                                <input type="text" class="dotted-border w-75">
                            </td>
                        </tr>
                        <tr>
                            <td class="serial text-center"></td>
                            <td class="">Festival and Other Special Expense</td>
                            <td class="text-center">
                                <input type="text" class="dotted-border w-75">
                            </td>
                            <td class="text-center">
                                <input type="text" class="dotted-border w-75">
                            </td>
                        </tr>
                        <tr>
                            <td class="serial text-center"></td>
                            <td class="">Tax Deducted / Collected at Source (with TS on Profit of Sanchaypatra) and
                                Tax & Surcharge Paid based on Tax Return of Last Year</td>
                            <td class="text-center">
                                <input type="text" class="dotted-border w-75">
                            </td>
                            <td class="text-center">
                                <input type="text" class="dotted-border w-75">
                            </td>
                        </tr>
                        <tr>
                            <td class="serial text-center"></td>
                            <td class="">Interest Paid on Personal Loan Recieved from Institution & other Source</td>
                            <td class="text-center">
                                <input type="text" class="dotted-border w-75">
                            </td>
                            <td class="text-center">
                                <input type="text" class="dotted-border w-75">
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end" colspan="2">Total Expenditure</td>
                            <td class="text-center">
                                <input type="text" class="dotted-border w-75">
                            </td>
                            <td class="text-center">
                                <input type="text" class="dotted-border w-75">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center mb-5 px-3">
                    <h6 class="fw-bold mb-1">Demonstration</h6>
                    <p class="text-start">I solemnly declare that ot the best of my knowledge and belief the information
                        given in this
                        IT-10BB(2023) is correct and complete</p>
                </div>
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6 text-center">
                        (<input type="text" class="dotted-border w-75">)
                        <div class="text-center">Name & Signature of the Tax Payer</div>
                        <label>Date:</label> <input type="text" class="dotted-border w-75">
                    </div>
                </div>
            </section>
            <div class="br-page"></div>

            <section class="page-8-9">
                <div class="page-8">
                    <div class="fw-bold text-end">IT-10B(2023)</div>
                    <h2 class="fs-4 fw-bold text-center">Statement of Assets, Liabilities and Expenses (as on <input
                            type="text" class="dotted-border">)</h2>
                    <div class="border border-dark p-1 mb-5">
                        <h3 class="text-capitalize fw-bold fs-4 text-center">To Whom It May Concern</h3>
                        <ul>
                            <li>All Public Servants</li>
                            <li>If the amount of Total Asset at home and abroad exceeds Taka 40,00,000</li>
                            <li>The amount of Total Asset does not exceed Tk. 40,00,000 but owns a Motor Car in a any time
                                or
                                outside Bangladesh or being a Shareholder Director of a Company.</li>
                            <li>Every Non-Bangladeshi and Non-Resident Bangladesh Natural Person shall submit the statement
                                only
                                in respect of Assets Located in Bangladesh.</li>
                        </ul>
                    </div>
                    <div class="mb-1">
                        <label for="name">Name of Taxpayer:</label> <input type="text" id="name"
                            class="dotted-border w-25">
                        <label for="tin">TIN:</label>
                        <x-backend.form.box-input :range="range(1, 13)" />
                    </div>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td class="">
                                    <h2 class="fs-5 fw-bold my-0 serial">Sources of Fund:</h2>
                                    <ol style='list-style:lower-roman;'>
                                        <li>
                                            <div>Total income shown in Return</div>
                                            <div>(Sl. No. 11 of statement of Total Income)</div>
                                        </li>
                                        <li>
                                            <div>Tax Exempted Income (Please see instruction page)</div>
                                        </li>
                                        <li>
                                            <div>Receipt of Gift and Others</div>
                                        </li>
                                    </ol>
                                </td>
                                <td>
                                    <ul class="list-unstyled">
                                        <li style="height:1.5rem;"></li>
                                        <li>Tk. 4,17,000/-</li>
                                        <li style="height:1rem;"></li>
                                        <li>Tk. 17,60,000/-</li>
                                        <li style="text-decoration: underline;">Tk. 16,30,000/-</li>
                                    </ul>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-end">Total Source of Fund:</td>
                                <td>
                                    Tk. <input type="text" style="width:80%;display:inline;" class="dotted-border">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="fw-bold serial">Net wealth as on last date of previous incoome
                                    year
                                </td>
                                <td>
                                    Tk. <input type="text" style="width:80%;display:inline;" class="dotted-border">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="fw-bold serial">Sum of Source of Fund and Previous Year's Net
                                    Wealth
                                    (2+3)</td>
                                <td>
                                    Tk. <input type="text" style="width:80%;display:inline;" class="dotted-border">
                                </td>
                            </tr>
                            <tr>
                                <td class="" style="vertical-align: top;">

                                    <div><span class="serial"></span> <span>(a)</span> Expenses relating to lifestyle
                                        <span class="font-13">(as per
                                            IT-10BB)</span>
                                    </div>
                                    <div> <span class="ms-2">(b)</span>Gift/Expenses/Loss Not Mentioned in IT-10BB</div>
                                </td>
                                <td>
                                    <ul class="list-unstyled">
                                        <li> Tk. <input type="text" style="width:80%;display:inline;"
                                                class="dotted-border"></li>
                                        <li> Tk. <input type="text" style="width:80%;display:inline;"
                                                class="dotted-border"></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-end">Total Expenses and Loss=</td>
                                <td>
                                    Tk. <input type="text" style="width:80%;display:inline;" class="dotted-border">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="fw-bold serial">Net wealth os on last date of this Financial
                                    Year
                                    (3-4)</td>
                                <td>
                                    Tk. <input type="text" style="width:80%;display:inline;" class="dotted-border">
                                </td>
                            </tr>
                            <tr>
                                <td class="">
                                    <h2 class="fs-5 fw-bold my-0 serial">Personal Liabilities Outside Bangladesh</h2>
                                    <ol style='list-style:lower-roman;'>
                                        <li>
                                            Institutional Liabilities
                                        </li>
                                        <li>
                                            Non-Institutional Liabilities
                                        </li>
                                        <li>
                                            Other Liabilities
                                        </li>
                                    </ol>
                                </td>
                                <td>
                                    <ul class="list-unstyled">
                                        <li> Tk. <input type="text" style="width:80%;display:inline;"
                                                class="dotted-border"></li>
                                        <li> Tk. <input type="text" style="width:80%;display:inline;"
                                                class="dotted-border"></li>
                                        <li> Tk. <input type="text" style="width:80%;display:inline;"
                                                class="dotted-border"></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-end">Total Liabilities Outside Bangladesh=</td>
                                <td>
                                    Tk. <input type="text" style="width:80%;display:inline;" class="dotted-border">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="fw-bold serial">Gross Wealth (5+6)</td>
                                <td>
                                    Tk. <input type="text" style="width:80%;display:inline;" class="dotted-border">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="br-page">

                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h2 class="fs-5 fw-bold my-0 serial">Particulars of Assets (if needed attach separate
                                        sheet)</h2>
                                    <ol style='list-style:lower-alpha;' class="mb-0">
                                        <li value="1">
                                            Total Asset of Business
                                        </li>
                                        <li style="list-style: none;">
                                            Less: Business Liabilities <span class="font-12">(Institutional & Non-Institutional)</span>
                                        </li>
                                    </ol>
                                </td>
                                <td>
                                    <ul class="list-unstyled mb-0">
                                        <li style="height: 1.5rem;"></li>
                                        <li> Tk. <input type="text"
                                                class="dotted-border w-75"></li>
                                        <li> Tk. <input type="text"
                                                class="dotted-border w-75"></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-end">Business Capital of Partnership Firm=</td>
                                <td>
                                    Tk. <input type="text" style="width:80%;display:inline;" class="dotted-border">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <ol style="list-style: lower-alpha;" class="mb-0">
                                        <li value="2">
                                            <div class="row">
                                                <h3 class="fs-5 fw-bold col-9">Director's Shaeholdings in Companies* </h3>
                                                <div class="col-3">Tk.<input type="text"
                                                        class="w-75 dotted-border"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <h3 class="fs-5 fw-bold col-9">Capital of Partnership business</h3>
                                                <div class="col-3">Tk.<input type="text"
                                                        class="w-75 dotted-border"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-9">
                                                    <h3 class="fs-5 fw-bold ">Non-Agriculture Property/Land/House Property
                                                    </h3>
                                                    <div class="font-13">(Acquisition / Cost Value with Legal Expense /
                                                        Acquired Price / Building Cost / Investment)</div>
                                                    <div class="font-13">Location and Description of Non-Agricultural
                                                        Property (use separate sheet if needed)</div>
                                                </div>
                                                <div class="col-3">Tk.<input type="text"
                                                        class="w-75 dotted-border"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-9">
                                                    <h3 class="fs-5 fw-bold ">Agriculture Property</h3>
                                                    <div class="font-13">(Acquisition / Cost Value with Legal Expense)
                                                        Location and Description of Non-Agricultural Property (use separate
                                                        sheet if needed)</div>
                                                </div>
                                                <div class="col-3">Tk.<input type="text"
                                                        class="w-75 dotted-border"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row align-items-end">
                                                <div class="col-9">
                                                    <h3 class="fs-5 fw-bold ">Financial assets value</h3>
                                                    <div class="row">
                                                        <div class="col-9">
                                                            <ol style="list-style:lower-roman">
                                                                <li class="font-14">Share/Deventure/Bond/Securities/Unit
                                                                    Certificate etc</li>
                                                                <li class="font-14">Sanchaypatra/Deposit Pension Schem
                                                                </li>
                                                                <li class="font-14">Loan Given (Mention Name & NID of Loan
                                                                    Receiver)</li>
                                                                <li class="font-14">Savings Deposit / Term Deposit</li>
                                                                <li class="font-14">Provident fund or Other fund (if any)
                                                                </li>
                                                                <li class="font-14">Other investment</li>
                                                            </ol>
                                                        </div>
                                                        <div class="col-3">
                                                            <ul class="list-unstyled">
                                                                <li>Tk. 4,17,000/-</li>
                                                                <li>Tk. 17,60,000/-</li>
                                                                <li>Tk. 16,30,000/-</li>
                                                                <li>Tk. 17,60,000/-</li>
                                                                <li>Tk. 16,30,000/-</li>
                                                                <li style="text-decoration: underline;">Tk. 16,30,000/-
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-9 text-end">
                                                    Total Financial Assets= 
                                                </div>
                                                <div class="col-3">
                                                    Tk.<input type="text" class="w-75 dotted-border">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-9">
                                                    <h3 class="fs-5 fw-bold">Motor Vehicles (at cost)</h3>
                                                    <div class="font-13">(Cost Value including Registration Expense)</div>
                                                    <div class="font-13">(Mention Type and Registration Number of Motor
                                                        Vehicle)</div>
                                                </div>
                                                <div class="col-3">Tk.<input type="text"
                                                        class="w-75 dotted-border"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-9">
                                                    <h3 class="fs-5 fw-bold">Ornaments (Mention Quantity)</h3>
                                                </div>
                                                <div class="col-3">Tk.<input type="text"
                                                        class="w-75 dotted-border"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-9">
                                                    <h3 class="fs-5 fw-bold">Furniture, Electronic Items</h3>
                                                </div>
                                                <div class="col-3">Tk.<input type="text"
                                                        class="w-75 dotted-border"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-9">
                                                    <h3 class="fs-5 fw-bold">Other Assets (Except Assets Mentioned in SI.K)</h3>
                                                </div>
                                                <div class="col-3">Tk.<input type="text"
                                                        class="w-75 dotted-border"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row align-items-end">
                                                <div class="col-9">
                                                    <h3 class="fs-5 fw-bold ">Cash in Hand and Fund Outside Business:</h3>
                                                    <div class="row fw-bold">
                                                        <div class="col-9">
                                                            <ol style="list-style:lower-roman">
                                                                <li class="font-14">Bank Balance</li>
                                                                <li class="font-14">Cash in Hand</li>
                                                                <li class="font-14">Others</li>
                                                            </ol>
                                                        </div>
                                                        <div class="col-3">
                                                            <ul class="list-unstyled">
                                                                <li>Tk.<input type="text" class="w-75 dotted-border"></li>
                                                                <li>Tk.<input type="text" class="w-75 dotted-border"></li>
                                                                <li>Tk.<input type="text" class="w-75 dotted-border"></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-9 text-end fw-bold">
                                                    Total Cash in Hand and Fund Outside Business= 
                                                </div>
                                                <div class="col-3">
                                                    Tk.<input type="text" class="w-75 dotted-border">
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class=" serial">Asset Outside Bangladesh</td>
                                <td>
                                    Tk. <input type="text" style="width:80%;display:inline;" class="dotted-border">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class=" serial">Total Assets in Bangladesh and Outside Bangladesh (8+9)</td>
                                <td>
                                    Tk. <input type="text" style="width:80%;display:inline;" class="dotted-border">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <h2 class="text-center fw-bold mb-0" style="text-decoration: underline;">Verification</h2>
                                    <p>I Solemnly declare
                                        that to the best of
                                        my knowledge and belief the information given in this IT-10B(2023) is correct and complete</p>
                                    <div class="row">
                                        <div class="col-7">
                                            
                                        </div>
                                        <div class="col-5">
                                            <h3 class="fs-5 fw-bold">Name & Signature of the Taxpayer</h3>
                                            <div><label>Date: </label> <input type="text" class="dotted-border"></div>
                                        </div>
                                    </div>
                                </td>
                                
                            </tr>
        
                        </tbody>
                    </table>
                </div>
            </section>
            <div class="br-page"></div>


        </div>

    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
