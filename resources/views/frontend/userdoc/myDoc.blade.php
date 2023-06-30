@php
    $banners = getRecords('banners');
    $partners = getRecords('partner_sections');
@endphp

@extends('frontend.layouts.app')

@section('main')
    @push('customCss')
        <style>
            #myDocumnets {
                padding: 60px 0;
                font-family: 'Poppins', sans-serif;
                ;
            }

            h1.myDocsHead {
                font-size: 2rem;
                font-weight: 500;
            }

            .myDocsHeadPara {
                padding: 10 0;
            }
        </style>
    @endpush
    <x-frontend.hero-section :banners="$banners" />

    <div id="myDocumnets">
        <div class="container">
            <div class="row">

                <div class="my_header text-center">
                    <h1 class="myDocsHead">Upload Your Document</h1>
                    <h2 class="myDocsHead">Protecting your personal information is important to us</h2>
                    <p class="myDocsHeadPara">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque quasi officiis
                        aut voluptate, id quis
                        iusto facilis pariatur dicta corrupti?</p>
                </div>

                <div class="col-lg-12">
                    <div class="myDocsButton">
                        <div class="col-lg-8">
                           <div class="row">
                             <div class="col-lg-3">
                                 <a herf="{{ route('user-doc.create') }}"
                                     class="myDocsButton btn btn-success waves-effect waves-light pe-3">Upload Document</a>
                             </div>
                             <div class="col-lg-5">
                                 <select class="form-control" name="">
                                     <option value="select year" disabled selected>Tax year</option>
                                     <option value="">2023</option>
                                     <option value="">2022</option>
                                     <option value="">2021</option>
                                     <option value="">2020</option>
                                     <option value="">2019</option>
                                     <option value="">2018</option>
                                     <option value="">2017</option>
                                     <option value="">2016</option>
                                     <option value="">2015</option>
                                     <option value="">2014</option>
                                     <option value="">2013</option>
                                     <option value="">2012</option>
                                     <option value="">2011</option>
                                     <option value="">2010</option>
                                     <option value="">2009</option>
                                 </select>
                             </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
