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

            /* .copy {                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 } */
        </style>
    @endpush --}}
    @push('customCss')
        <style>
        .inner {
        display: table;
        margin: 0 auto;
        border: 2px solid black;
        max-width:280px;
      }
        </style>
    @endpush
    <x-backend.ui.breadcrumbs :list="['Management', 'Return', 'List']" />

    <x-backend.ui.section-card style="box-shadow: none!important;">
          <div>
                <div class="d-block fs-3 mt-4 fw-medium text-dark text-center">National Board of Revenue</div>
                <table class="mx-auto upper-table">
                    <tbody>
                        <tr>
                            <td class="text-center">www.nbr.gov.bd </td>
                            <td style="position: absolute; left:5;">IT-11GA(2023) </td>
                        </tr>
                        <tr>
                           <td class="inner mt-2">
                            <div class="px-2 py-1">
                               <h3 class="m-0 text-center">Return of Income Tax</h3>
                               <p class="m-0 text-center"><small>For an individual and </small></p>
                               <p class="m-0 text-center">Other assesse ( Other the company)
                            </p>
                            </div>
                           </td>
                        </tr>

             
                    </tbody>
                </table>
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
