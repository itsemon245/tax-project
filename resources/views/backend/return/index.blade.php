@extends('backend.layouts.app')
@section('content')
    {{-- @push('customCss')
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
                        min-width: 5re;m;
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

            /* .copy {                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 } */
        </style>
    @endpush --}}
    @push('customCss')
        <style>
        @media print {
        .table th,
        td {
        font-size: 12pt !important;
        }

}
        .inner {
        display: table;
        margin: 0 auto;
        border: 2px solid black;
        max-width:280px;
      }
      .dotted-border {
                border: 4px dotted var(--ct-dark);
                height: 1.2rem;
                border-top: 0;
                border-right: 0;
                border-left: 0;
            }
        </style>
    @endpush
    <x-backend.ui.breadcrumbs :list="['Management', 'Return', 'List']" />

    <x-backend.ui.section-card style="box-shadow: none!important;">     
        <table style="border-collapse: collapse; width: 100%;" class="mt-3">
            <tbody>
            <tr>
            <td style="width: 26.8615%;"></td>
            <td style="width: 48.1558%;"><h3 class="text-center mb-0">National Board of Revenue </h3></td>
            <td style="width: 24.9826%;"><h4>IT-11GA(2023)</h4></td>
            </tr>
            <tr>
            <td style="width: 48.1558%; text-align: center;" colspan="3">www.nbr.gov.bd.</td>
            </tr>
            <tr>
            <td style="width: 26.8615%;"></td>
            <td style="width: 48.1558%; text-align: center;"></td>
            <td style="width: 24.9826%;"></td>
            </tr>
            <tr>
            <td style="width: 26.8615%;">
            <table style="border-collapse: collapse; width: 100%;">
            <tbody>
            <tr>
            <td style="width: 100%;">
            <table style="border-collapse: collapse; width: 100%;" >
            <tbody>
            <tr>
            <td style="width: 100%; border: 1px solid black;" colspan="2"><h5 class="my-0 text-center">For official use</h5></td>
            </tr>
            <tr>
            <td style="width: 80%; border: 1px solid black"><small>Serial number of Return register</small></td>
            <td style="width: 30%; border: 1px solid black">  </td>
            </tr>
            <tr>
                <td style="width: 80%; border: 1px solid black"><small>Volume number of Return register</small></td>
                <td style="width: 30%; border: 1px solid black">  </td>
            </tr>
            <tr>
                <td style="width: 80%; border: 1px solid black"><small>Date of Return submission</small></td>
                <td style="width: 30%; border: 1px solid black">  </td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            </td>
            <td style="width: 30%; text-align: center;">
            <table style="border-collapse: collapse; width: 100%;" border="1">
            <tbody>
            <tr>
            <td style="width: 100%;" class="px-0">
            <h3 class="mb-0"><strong>Return of Income Tax</strong></h3>
            <p><strong>For an individual and </strong></p>
            </td>
            </tr>
            </tbody>
            </table>
            </td>
            </tr>
            </tbody>
            </table>
            <div class="container mx-auto border border-2 border-dark mt-3" style="max-width: 100%" >
                <ol class="mt-2 h6">
                    <li class="mb-2">
                        <div class="d-flex">
                            <div class="col-md-3">Name of the Assessee: </div>
                            <div class="col-md-9"><input id="" class="dotted-border w-100" name="" type="text" /></div>
                        </div>
                    </li>
                  
                    <li class="mb-2">
                        <div class="d-flex">
                            <div class="col-md-6">National ID/Passport Number No (if NID not) available :</div>
                            <div class="col-md-6"><input id="" class="dotted-border w-100" name="" type="text" /></div>
                        </div>
                    </li>
                    <li class="mb-2">TIN:
                        <x-backend.form.box-input :range="range(1, 12)" />
                    </li>
                    <li class="mb-2">
                        (a) Circle:<input id="" class="dotted-border" name="" type="text"/>54<input id="" class="dotted-border" name="" type="text"/>(b) Taxes Zone:<input id="" class="dotted-border" name="" type="text"/>03<input id="" class="dotted-border" name="" type="text"/>Chattogram.
                    </li>
                    <div class="mb-2">
                        <span class="d-inline-block me-3">
                        <li>
                                Assessment Year: <x-backend.form.box-input :range="range(1, 6)" />
                        </li>
                        </span>
                        <span class="d-inline-block">
                            <li>
                                Residential Status:
                                Resident
                                    <input class="form-check-input" type="radio" value="" name="residential" id="resident">
                                    <label class="form-check-label" for="resident">
                                    </label>
                                    Non-resident
                                    <input class="form-check-input" type="radio" value="" name="residential" id="nonResident">
                                    <label class="form-check-label" for="nonResident">
                                    </label>
                            </li>
                        </span>
                    </div>
                    <li class="mb-2">
                        Assessee status:(Tick one):
                        Normal
                            <input class="form-check-input" type="radio" value="" name="assessee_status" id="normal">
                            <label class="form-check-label" for="normal">
                            </label>
                            Firm
                            <input class="form-check-input" type="radio" value="" name="assessee_status" id="firm">
                            <label class="form-check-label" for="firm">
                            </label>
                            Hindu undivided family
                            <input class="form-check-input" type="radio" value="" name="assessee_status" id="hindu">
                            <label class="form-check-label" for="hindu">
                            </label>
                            Other
                            <input class="form-check-input" type="radio" value="" name="assessee_status" id="other">
                            <label class="form-check-label" for="other">
                            </label>
                    </li>
                    <li class="mb-2">
                        <span class="text-decoration-underline mb-2 d-block">Tick on the box(es) below if you are:</span>
                        <div>
                            <label class="form-check-label mb-1" for="freedom">
                            A gezetted war-wounded freedom fighter
                            <input class="form-check-input" type="checkbox" value="" name="freedom" id="freedom">
                            </label>
                            <label class="form-check-label mb-1" for="female">
                            Female
                            <input class="form-check-input" type="checkbox" value="" name="female" id="female">
                            </label>
                            <label class="form-check-label mb-1" for="third_gender">
                            Third gender
                            <input class="form-check-input" type="checkbox" value="" name="third_gender" id="third_gender">
                            </label>
                            <label class="form-check-label mb-1" for="disability">
                            A person with disability
                            <input class="form-check-input" type="checkbox" value="" name="disability" id="disability">
                            </label>
                            <label class="form-check-label mb-1" for="aged">
                            Aged 65 years or more 
                            <input class="form-check-input" type="checkbox" value="" name="aged" id="aged">
                            </label>
                            <label class="form-check-label mb-1" for="legal_guardian">
                            A parent/legal guardian of a person with disability
                            <input class="form-check-input" type="checkbox" value="" name="legal_guardian" id="legal_guardian">
                            </label>
                    </li>
                    <li class="mb-2">
                        <div class="d-flex">
                            <table class="me-4" style="border-collapse: collapse; width: 40%;" border="1">
                                <tbody>
                                <tr>
                                <td style="width: 50%;" class="py-2 px-3">
                                <p class="mb-1 mx-auto">Date of Birth (DD-MM-YY)</p>
                                <span class="me-2">
                                <input type="date" class="dotted-border" name="" id=""/>
                                </span>
                                </td>
                            </tr>
                            </tbody>
                            </table>
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="width: 50%;">
                                            <li>
                                                <p class="mb-0">Spouse name:<input id="" class="dotted-border" name="" type="text"/></p>
                                                <p>
                                                    <small>
                                                        Spouse TIN (if assessee): <input id="" class="dotted-border" name="" type="text"/>
                                                    </small>
                                                </p>
                                            </li>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </li>
                    <li class="mb-2">
                        <p>
                            Contract Address: 
                            <span><input id="" class="dotted-border w-100" name="" type="text"/></span>
                        </p>
                        <div class="row">
                            <span class="col-md-6 row">
                                <span class="col-md-4">
                                    Telephone:
                                </span>
                                <span class="col-md-8">
                                    <input id="" class="dotted-border w-100" name="" type="text"/>
                                </span>
                            </span>
                            <span class="col-md-6 row">
                                <span class="col-md-3">
                                    Mobile:
                                </span>
                                <span class="col-md-9">
                                    <input id="" class="dotted-border w-100" name="" type="text"/>
                                </span>
                            </span>
                        </div>
                    </li>
                    <li class="mb-2">
                        <div class="row">
                            <div class="col-md-4">
                                If employed, employer’s name:
                            </div>
                             <div class="col-md-8">
                                <input id="" class="dotted-border w-100" name="" type="text" />
                             </div>
                        </div>
                    </li>
                    <li class="mb-2">
                        <div class="row mb-2">
                            <div class="col-md-3">
                                (a) Name of Business:
                            </div>
                             <div class="col-md-9">
                                <input id="" class="dotted-border w-100" name="" type="text" />
                             </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                (b) Business identification Number (BIN):
                            </div>
                             <div class="col-md-7">
                                <input id="" class="dotted-border w-100" name="" type="text" />
                             </div>
                        </div>
                    </li>
                    <li class="mb-5">
                        Name of partners/members in case of firm and private partnership:
                        <input id="" class="dotted-border w-100" name="" type="text" />
                    </li>
                </ol>
            </div>
        </x-backend.ui.section-card>
        <x-backend.ui.section-card>
            <h4 class="mx-auto text-center mt-5 fw-bold">
                Statement of income & Income Tax for the year ended of the<input id="" class="dotted-border" name="" type="text" />
            </h4>
            <h6 class="mx-auto text-center mt-3">
                Name of assessee:<input id="" class="dotted-border" name="" type="text" /> TIN <x-backend.form.box-input :range="range(1, 10)" />
            </h6>
            @php
                $array = [
                    'Income from Salary (as in schedule 1)',
                    'Income from House property (as in schedule 2)',
                    'Income from Agricultural (as in schedule 3)',
                    'Income from Business or Profession (as in schedule 4)',
                    'Capital gains',
                    'Income from financial resources (Bank interest / profit, dividend, securities etc)',
                    'Income from Other sources (royality, license fee, honorarium, fee, cash incentive etc.)',
                    'Income from Firm or private partnership',
                    'Income of minor or spouse under section (if not a taxpayer)',
                    'Foreign income',
                    'Total income (aggregate of 1 to 10)',
                ];
                $secondArray = [
                    'Income tax leviable on gross taxable income',
                    'Tax rebate (annex Schedule 5)',
                    'Net tax after tax rebate (12-13)',
                    'Minimum tax',
                    'Tax payable (between serial 14 and 15, whichever is greater)'
                ];
            @endphp
            <div class="container mx-auto mt-5 h6" style="max-width: 100%">
                <table style="border-collapse: collapse; width: 100%; height: 28px;" border="1">
                    <tbody>
                    <tr style="height: 10px;">
                    <th style="width: 10.9951%; text-align: center; height: 10px; border: 1px solid black;">Serial<br />No</th>
                    <th style="width: 63.1872%; text-align: center; height: 10px; border: 1px solid black;">Particulars of Total Income</th>
                    <th style="width: 25.8176%; height: 10px; text-align: center; border: 1px solid black;">Amount in taka</th>
                    </tr>
                    @foreach ($array as $key =>$item)
                    <tr style="height: 33px;">
                        <td style="width: 10.9951%; height: 18px; border: 1px solid black;" class="text-center">{{ ++$key }}.</td>
                        <td style="width: 63.1872%; height: 18px; border: 1px solid black;">{{ $item }}</td>
                        <td style="width: 25.8176%; height: 18px; border: 1px solid black;"></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <table style="border-collapse: collapse; width: 100%; height: 28px;" border="1" class="mt-4">
                    <tbody>
                    <h5 class="d-flex justify-content-between mt-3 mb-0"><span>Tax Computation</span><span>Amount in taka</span></h5>
                    @foreach ($secondArray as $key =>$itemTwo)
                    <tr style="height: 34px;">
                        <td style="width: 10.9951%; height: 18px; border: 1px solid black;" class="text-center">{{ 12+$key }}.</td>
                        <td style="width: 63.1872%; height: 18px; border: 1px solid black;">{{ $itemTwo }}</td>
                        <td style="width: 25.8176%; height: 18px; border: 1px solid black;"></td>
                    </tr>
                    @endforeach
                    <tr style="height: 34px;">
                        <td rowspan="2" style="width: 10.9951%; height: 18px; border: 1px solid black;" class="text-center">17.</td>
                        <td style="width: 63.1872%; height: 18px; border: 1px solid black;">(a) Surcharge payable for net wealth (if any)
                        </td>
                        <td style="width: 25.8176%; height: 18px; border: 1px solid black;"></td>
                    </tr>
                    <tr style="height: 34px;">
                        <td style="width: 63.1872%; height: 18px; border: 1px solid black;">(b) Environmental surcharge (if any)
                        </td>
                        <td style="width: 25.8176%; height: 18px; border: 1px solid black;"></td>
                    </tr>
                    <tr style="height: 34px;">
                        <td style="width: 10.9951%; height: 18px; border: 1px solid black;" class="text-center">18.</td>
                        <td style="width: 63.1872%; height: 18px; border: 1px solid black;">Deferred interest, penalty or any other amount under the income tax act (in any)
                        </td>
                        <td style="width: 25.8176%; height: 18px; border: 1px solid black;"></td>
                    </tr>
                    <tr style="height: 34px;">
                        <td style="width: 10.9951%; height: 18px; border: 1px solid black;" class="text-center">19.</td>
                        <td style="width: 63.1872%; height: 18px; border: 1px solid black;" class="fw-bold">Total amount payable (16 + 17 + 18)
                        </td>
                        <td style="width: 25.8176%; height: 18px; border: 1px solid black;"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </x-backend.ui.section-card>
        <x-backend.ui.section-card>
            <div class="container mx-auto mt-2 mb-5 h6" style="max-width: 100%">
               <h4 class="text-center mt-3 text-decoration-underline">Verification</h4>
               <h3 class="text-center mt-3">I<input id="" class="dotted-border" name="" type="text" />father/Husband<input id="" class="dotted-border" name="" type="text" /></h3>
               <h4 class="text-center mt-3">E-TIN: <x-backend.form.box-input :range="range(1, 12)" /> <span>Solemnly declare that to the best of my
                knowledge and belief the information given in this return and statements and documents annexed herewith is correct
                and complete.</span> </h4>
                <table class="mt-2">
                    <tr>
                        <td>
                            <h4 class="mt-2 mb-0">Place: Chattogram.</h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4 class="mb-0">Date: <input id="" class="dotted-border" name="" type="text" /></h4>
                        </td>
                    </tr>
                </table>
                <div class="w-100 d-flex justify-content-end">
                    <div style="width: 40%; float:right; mb-3">
                        <h4 class="text-center">Signature</h4>
                        <h3 class="text-center">(Abdullah Al Mamun)</h3>
                    </div>
                </div>
            </div>
            <h4 class="text-center text-decoration-underline">Schedule-3 (Investment tax credit)</h4>
            <h5 class="text-center mt-1">(Section 44(2)(b) read with part ‘B’ of Sixth Schedule)</h5>
            @php
                $thirdArray = [
                    'Life insurance premium',
                    'Contribution to deferred annuity',
                    'contribution to Provident Fund to which Provident Fund Act,1925 applies ',
                    'Self contribution & employer’s contribution to Recognized Provident Fund',
                    'Contribution to Super annuation Fund',
                    'Investment in approved debenture or debenture stock, Stock or Shares',
                    'Contribution to deposit pension scheme ',
                    'Contribution to Benevolent Fund and group insurance premium',
                    'Contribution to Zakat Fund',
                    ' Others, if any ( give details )',
                ];
            @endphp
            <div class="container mx-auto mt-1 h6" style="max-width: 100%">
                <table class="table">
                    <tbody class="border border-2 border-dark">
                        @foreach ($thirdArray as $key => $itemThree)
                            <tr>
                                <td style="width:5%;"  class="py-0">{{ ++$key }}</td>
                                <td style="width: 70%;" class="py-0">{{ $itemThree }}</td>
                                <td style="width: 25%; border-bottom: 1px dotted black;" class="text-left" class="py-0">Tk</td>
                           </tr>
                        @endforeach
                        <tr class="h5">
                            <td colspan="2" class="py-0 text-center">{{ $itemThree }}</td>
                            <td style="width: 25%; border-bottom: 1px dotted black;" class="text-left" class="py-0">Tk</td>
                       </tr>
                    </tbody>
                  </table>
                  <span>*Please attach certificates of investment.</span>
            </div>

        </x-backend.ui.section-card>
        <x-backend.ui.section-card>
            <div class="container mx-auto mt-3 h6" style="max-width: 100%; margin-bottom: 450px;">
                <h4 class="text-center text-decoration-underline mb-3">List of documents furnished</h4>
                <div class="d-flex px-3 border border-2 border-dark">
                    <div style="width: 50%">
                        @foreach (range(1, 5) as $key => $item)
                        <h4 class="mb-5">{{ ++$key }}.</h4>
                        @endforeach
                    </div>
                    <div style="width: 50%">
                        @foreach (range(1, 5) as $key => $item)
                        <h4 class="mb-5">{{ 6+$key }}.</h4>
                        @endforeach
                    </div>
                </div>
                <h4 class="mt-3 mb-5">*Incomplete return is not acceptable</h4>
            </div>
        </x-backend.ui.section-card>
        <x-backend.ui.section-card>
            <div class="container mx-auto mt-5 h5" style="max-width: 100%">
                <h4 class="text-center">SCHEDULES SHOWING DETAILS OF INCOME</h4>
                <div class="mt-2 d-flex justify-content-between">
                    <h4 class="mt-2">Name of the Assessee: <span class="fw-bold">Abdullah Al Mamun</span></h4>
                    <h4>TIN:<x-backend.form.box-input :range="range(1, 8)" /></h4>
                </div>
                <h5 class="text-decoration-underline text-center">Schedule-1 (Salaries)</h5>
                @php
                    $arrayFour = [
                        'Basic pay',
                        'Special pay',
                        'Dearness allowance',
                        'Conveyance allowance',
                        'House rent allowance',
                        'Medical allowance',
                        'Servant allowance',
                        'Leave allowance',
                        'Honorarium / Reward/ Fee',
                        'Overtime allowance',
                        'Bonus / Ex-gratia',
                        'Other allowances',
                        'Employee’s Contribution to Recognized Provident Fund',
                        'Interest accrued on Recognized Provident Fund',
                        'Deemed income for transport facility',
                        'Deemed income for free furnished/unfurnished accommodation',
                        'Other, if any (give detail)',
                        'Net taxable income from salary',

                    ];
                @endphp
                <table style="border-collapse: collapse; width: 100%;" border="1">
                    <tbody>
                    <tr>
                    <td style="width: 70%; text-align: center; border:1px solid black; border:1px solid black;">Pay &amp; Allowance</td>
                    <td style="width: 10%; text-align: center; border:1px solid black;">Amount of<br />Income (Tk.)</td>
                    <td style="width: 10%; text-align: center; border:1px solid black;">Amount of exempted<br />income (Tk.)</td>
                    <td style="width: 10%; text-align: center; border:1px solid black;">Net taxable<br />Income (Tk.)</td>
                    </tr>
                        @foreach ($arrayFour as $itemFour)
                        <tr>
                            <td style="width: 55%; border:1px solid black;">{{ $itemFour }}</td>
                            <td style="width: 10%; border:1px solid black;"></td>
                            <td style="width: 10%; border:1px solid black;"></td>
                            <td style="width: 10%; border:1px solid black;"></td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                <h5 class="text-center text-decoration-underline mt-3">Schedule-2 (House Property income)</h5>
                @php
                    $arrayFive = [
                        '1. Annual rental income',
                        '2. Claimed Expenses :',
                        'Repair, Collection, etc.',
                        'Municipal or local tax',
                        'Land Revenue',
                        'Interest on loan/Mortgage/Capital charge',
                        'Insurance Premium',
                        ' Other, if any',
                    ];
                @endphp
                <table style="border-collapse: collapse; width: 100%;">
                    <tbody>
                    <tr>
                        <td style="width: 25%; border: 1px solid black;" class="text-center">
                            Location and description of property
                        </td>
                        <td style="width: 25%; border: 1px solid black;" class="text-center">
                            Particulars
                        </td>
                        <td style="width: 25%; border: 1px solid black;" class="text-center">Tk.</td>
                        <td style="width: 25%; border: 1px solid black;" class="text-center">Tk.</td>
                    </tr>
                    <tr>
                        <td rowspan="2" style="width: 25%; border: 1px solid black;" class="text-center">
                        </td>
                        <td style="width: 25%;" class="text-left">
                            <table style="border-collapse: collapse;">
                                @foreach ($arrayFive as $itemFive)
                                <tr>
                                    <td style="width: 25%; border-bottom: 1px solid black;">{{ $itemFive }}</td>
                                </tr>
                                @endforeach
                                <tr class="text-right">
                                    <td style="width: 25%; border-bottom: 1px solid black;" >Total = </td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 25%;" class="text-left">
                            <table style="border-collapse: collapse;">
                                @foreach ($arrayFive as $itemFive)
                                <tr>
                                    <td style="width: 25%; border-bottom: 1px solid black; border-left:1px solid black;" class="text-white">{{ $itemFive }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td style="width: 25%; border-bottom: 1px solid black;" class="text-white">{{ $itemFive }}</td>
                                </tr>
                            </table>
                        </td>
                        <td rowspan="2" style="width: 25%; border: 1px solid black;" class="text-center"></td>
                    </tr>
                    
                    {{-- <tr>
                        <td style="width: 25%; border: 1px solid black;">kdfjsk</td>
                        <td style="width: 25%; border: 1px solid black;"></td>
                    </tr> --}}
                    </tbody>
                    </table>
            </div>
        </x-backend.ui.section-card>
        <x-backend.ui.section-card>
            <div class="container mx-auto mt-4 h5" style="max-width: 100%">
                <h4 style="text-align: end;" class="pe-4">IT-10B</h4>
                <p class="text-center">Statement of assets and liabilities (as on <input id="" class="dotted-border" name="" type="text" />)</p>
                <p class="text-center">Name of the Assessee: <span class="fw-bold me-3">Abdullah Al Mamun</span>TIN <x-backend.form.box-input :range="range(1, 8)"/></p>
                <table style="border-collapse: collapse; width: 100%;" class="mb-4">
                    <tr>
                        <td style="width: 70%;" class="pt-2 ps-3">(a) Business Capital (Closing balance)</td>
                        <td>Tk. .......................... </td>
                    </tr>
                    <tr>
                        <td style="width: 70%;" class="pt-2 ps-3">(b) Directors Shareholdings in Limited Companies ( at cost).</td>
                        <td>Tk. .......................... </td>
                    </tr>
                    <tr>
                        <td style="width: 70%;" class="pt-2 ps-3 d-flex justify-content-between"><span class="text-decoration-underline">Name of Companies </span><span class="text-decoration-underline">Number of shares</span></td>
                        <td></td>
                    </tr>
                </table>
                <table style="border-collapse: collapse; width: 100%;" class="mb-4">
                    <tr class="h4">
                        <td style="width: 70%;" class="pt-2 ps-3">2. Non-Agricultural Property (at cost with legal expenses ) :</td>
                        <td>Tk. .......................... </td>
                    </tr>
                    <tr>
                        <td style="width: 70%;" class="pt-2 ps-3">Land/House property (Description & location of property)</td>
                       
                    </tr>
                </table>
                <table style="border-collapse: collapse; width: 100%;" class="mb-2">
                    <tr class="h4">
                        <td style="width: 70%;" class="pt-2 ps-3">3. Agricultural Property (at cost with legal expenses ) :</td>
                        <td>Tk. .......................... </td>
                    </tr>
                    <tr>
                        <td style="width: 70%;" class="pt-2 ps-3">Land/House property (Description & location of property)</td>
                       
                    </tr>
                </table>
                <table style="border-collapse: collapse; width: 100%;" class="mb-2">
                    <tr class="h4">
                        <td style="width: 50%;" class="pt-2 ps-3">4. Investments:</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="width: 50%;" class="pt-2 ps-5">(a) Shares/Debentures</td>
                        <td style="width: 25%;">Tk. .............................</td>
                        <td style="width: 25%;"></td>
                    </tr>
                    <tr>
                        <td style="width: 50%;" class="pt-2 ps-5">(b) Saving Certificate/Unit Certificate/Bond </td>
                        <td style="width: 25%;">Tk. .............................</td>
                        <td style="width: 25%;"></td>
                    </tr>
                    <tr>
                        <td style="width: 50%;" class="pt-2 ps-5">(c) Prize bond/Savings Scheme.</td>
                        <td style="width: 25%;">Tk. .............................</td>
                        <td style="width: 25%;"></td>
                    </tr>
                    <tr>
                        <td style="width: 50%;" class="pt-2 ps-5">(d) Loans given</td>
                        <td style="width: 25%;">Tk. .............................</td>
                        <td style="width: 25%;"></td>
                    </tr>
                    <tr>
                        <td style="width: 50%;" class="pt-2 ps-5">(e) Other Investment</td>
                        <td style="width: 25%;">Tk. .............................</td>
                        <td style="width: 25%;"></td>
                    </tr>
                    <tr>
                        <td style="width: 50%;" class="pt-2 ps-5"></td>
                        <td style="width: 25%;" >Total = </td>
                        <td style="width: 25%;">Tk. .............................</td>
                    </tr>
                </table>
                <table style="border-collapse: collapse; width: 100%;" class="mb-2">
                    <tr>
                        <td style="width: 70%;" class="ps-3 h4">5. Motor Vehicles (at cost) :</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="width: 70%;" class="ps-5"><small>Type of motor vehicle and Registration number.</small></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="width: 70%;" class="pt-4 ps-3 h4">6. Jewellery (quantity and cost) :</td>
                        <td class="h4">Tk. ..........................</td>
                    </tr>
                    <tr>
                        <td style="width: 70%;" class="pt-4 ps-3 h4">7. Furniture (at cost) :</td>
                        <td class="h4">Tk. ..........................</td>
                    </tr>
                    <tr>
                        <td style="width: 70%;" class="pt-4 ps-3 h4">8. Electronic Equipment (at cost) :</td>
                        <td class="h4">Tk. ..........................</td>
                    </tr>
                </table>
                <table style="border-collapse: collapse; width: 100%;" class="mb-2">
                    <tr class="h4">
                        <td style="width: 50%;" class="pt-2 ps-3">9. Cash asset Outside Business:</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="width: 50%;" class="pt-2 ps-5">(a) Cash in hand</td>
                        <td style="width: 25%;">Tk. .............................</td>
                        <td style="width: 25%;"></td>
                    </tr>
                    <tr>
                        <td style="width: 50%;" class="pt-2 ps-5">(b) Cash at bank</td>
                        <td style="width: 25%;">Tk. .............................</td>
                        <td style="width: 25%;"></td>
                    </tr>
                    <tr>
                        <td style="width: 50%;" class="pt-2 ps-5">(c) Other deposits</td>
                        <td style="width: 25%;">Tk. .............................</td>
                        <td style="width: 25%;"></td>
                    </tr>
                    <tr>
                        <td style="width: 50%;" class="pt-2 ps-5"></td>
                        <td style="width: 25%;">Total = </td>
                        <td style="width: 25%;">Tk. .............................</td>
                    </tr>
                </table>
            </div>
        </x-backend.ui.section-card>
    <!-- end row-->

    @push('customJs')
        <script>
           
        </script>
    @endpush
@endsection
