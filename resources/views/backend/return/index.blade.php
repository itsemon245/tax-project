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
            }
            .br-page{
                page-break-after: always;
            }

            .page-1 .upper-table td {
                color: var(--ct-dark);
                padding: 2px;
            }

            .page-1 .upper-table {
                margin-top: 4px;
            }

            .form label {
                max-width: max-content;
                color: var(--ct-dark);
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

            .hide-default-action[type=number]::-webkit-inner-spin-button,
            .hide-default-action[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
        </style>
    @endpush
    <x-backend.ui.breadcrumbs :list="['Management', 'Return', 'Create']" />

    <x-backend.ui.section-card style="box-shadow: none!important;">
        <h4 class="my-2 text-center d-print-none">Create Return</h4>
        <div class="return-form">
            <div class="page-1">
                <div>
                    <div class="mx-auto">
                        <h6 class="text-center mb-1 fw-bold">National Board of Revenue</h6>
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
                                        <h3 class="m-0 fw-bold font-18 text-center">For Official Use</h3>
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
                            <div class="text-uppercase font-18 fw-bold p-1 border border-dark text-center text-dark"
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
                            @foreach (range(1, 13) as $i)
                                <input id="tin" type="number"
                                    class="box-input border border-dark text-center d-inline hide-default-action"
                                    style="width:2rem!important;" value="" max="9">
                            @endforeach
                            <input name="tin" value="" hidden>
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
                        {{-- <div class="row">
                            <li class="col-5">
                                <div class="row">
                                    <label for="assesment-year" class="col-8">Assesment Year:</label>
                                    <input id="assesment-year" class="dotted-border col-4" name="assesment_year"
                                        type="date">
                                </div>
                            </li>
                            <li class="col-7">
                                <div class="row">
                                    <div class="col-4 p-0"></div>
                                    <div class="col-8 p-0">
                                        <div class="row">
                                            <div class="col-5">
                                                <input id="residential" name="residential" type="radio" value="true">
                                                <label for="residential">Residential</label>
                                            </div>
                                            <div class="col-7">
                                                <input id="residential" name="residential" type="radio" value="false">
                                                <label for="residential">Non-Residential</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div> --}}
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
            </div>
            <div class="br-page"></div>
            <div>
                Hello World
            </div>
        </div>

    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
