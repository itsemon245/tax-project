@extends('frontend.layouts.app')

@section('main')
    @push('customCss')
        <style>
            #myDocumnets {
                padding: 60px 0;
                font-family: 'Poppins', sans-serif;
            }

            h1.myDocsHead {
                font-size: 2rem;
                font-weight: 500;
            }

            .myDocsHeadPara {
                padding: 10 0;
            }

            .card.text_card {
                background-color: #22C55E !important;
                border: none !important;
                box-shadow: 0;
            }

            .preview_details {
                list-style: none;
                color: white;
            }

            .preview_details a {
                color: white;
                display: block;
                padding: 13px 0;
            }

            .myDocs_alert {
                background: #ECEFF1;
            }

            .tips_details {
                list-style: none;
                color: #000;
                padding: 20px 0 !important;
            }

            .tips_details li {
                padding: 17px 0 !important;
            }

            .cardDetails {
                top: -45px;
                left: 18px;
                display: none;
            }

            .cardDetails1 {
                top: -45px;
                left: 18px;
                display: none;
            }

            .cross-icon {
                position: absolute;
                right: 20px;
                top: 20px;
            }
        </style>
    @endpush

    <div id="myDocumnets">
        <div class="container">
            <div class="row">

                <div class="my_header text-center">
                    <h1 class="myDocsHead">Upload Your Document</h1>
                    <h2 class="myDocsHead">Protecting your personal information is important to us</h2>
                    <p class="myDocsHeadPara">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque quasi
                        officiis
                        aut voluptate, id quis
                        iusto facilis pariatur dicta corrupti?</p>
                </div>
                <div class="d-flex gap-4 align-items-center">
                    <a href="{{ route('user-doc.create') }}" class="btn btn-success mt-2">Upload New
                        Document</a>
                    <div class="">
                        <x-backend.form.select-input label="Tax Year" placeholder="Select Tax Year..." name="">
                            @foreach (range(2023, 1980) as $year)
                                <option value="">{{ $year . '-' . $year - 1 }}</option>
                            @endforeach
                        </x-backend.form.select-input>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 mt-5 position-relative">
                            <div class="card pt-3">
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <button
                                            class="myDocsButton btn btn-success waves-effect waves-light pe-3">XLS</button>
                                        <h2 class="pt-3">1. Inventory-Ok (1)</h2>
                                        <p>Unregonized</p>
                                    </div>
                                    <div class="col-lg-12 d-flex justify-content-between align-items-center">
                                        <div class="myDoc_info">
                                            <h3>Added by me</h3>
                                            <p>Jun 4, 2023</p>
                                        </div>
                                        <div class="icon">
                                            <span><i class="fas fa-ellipsis-h show-tab"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-11 col-md-12 col-11 mt-5 position-absolute cardDetails">
                                <div class="card text_card pt-3">
                                    <div class="card-body">

                                        <div class="cross-icon">
                                            <span class="mdi mdi-close close-tab"></span>
                                        </div>

                                        <div class="col-lg-12">
                                            <ul class="preview_details">
                                                <li><a href="">Preview document </a></li>
                                                <li><a href="">View details</a></li>
                                                <li><a href="">Move to another year</a></li>
                                                <li><a href="">Delete document</a></li>
                                            </ul>



                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 mt-5 position-relative">
                            <div class="card pt-3">
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <button
                                            class="myDocsButton btn btn-success waves-effect waves-light pe-3">XLS</button>
                                        <h2 class="pt-3">1. Inventory-Ok (1)</h2>
                                        <p>Unregonized</p>
                                    </div>
                                    <div class="col-lg-12 d-flex justify-content-between align-items-center">
                                        <div class="myDoc_info">
                                            <h3>Added by me</h3>
                                            <p>Jun 4, 2023</p>
                                        </div>
                                        <div class="icon">
                                            <span><i class="fas fa-ellipsis-h show-tab1"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-11 col-md-12 col-11 mt-5 position-absolute cardDetails1">
                                <div class="card text_card pt-3">
                                    <div class="card-body">

                                        <div class="cross-icon">
                                            <span class="mdi mdi-close close-tab1"></span>
                                        </div>

                                        <div class="col-lg-12">
                                            <ul class="preview_details">
                                                <li><a href="">Preview document </a></li>
                                                <li><a href="">View details</a></li>
                                                <li><a href="">Move to another year</a></li>
                                                <li><a href="">Delete document</a></li>
                                            </ul>



                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-4 pt-5">
                            <div class="myDocs_alert px-3 pt-3">
                                <h2 class="pt-3 px-3">Upload Tips:</h2>
                                <ul class="tips_details px-3">
                                    <li>Lorem ipsum dolor sit amet.</li>
                                    <li>Only upload your prior year tax return here. We will ask for other forms later</li>
                                    <li>Make sure your pdf isn't password protected</li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>



            </div>
        </div>
    </div>

    @push('customJs')
        <script>
            var closeTab = $('.close-tab');
            closeTab.click(function() {
                $('.cardDetails').hide();
            })

            var closeTab = $('.show-tab');
            closeTab.click(function() {
                $('.cardDetails').show();
            })
        </script>
        <script>
            var closeTab = $('.close-tab1');
            closeTab.click(function() {
                $('.cardDetails1').hide();
            })

            var closeTab = $('.show-tab1');
            closeTab.click(function() {
                $('.cardDetails1').show();
            })
        </script>
    @endpush
@endsection
