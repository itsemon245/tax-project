@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Frontend', 'Course', 'Case Study Package']" />

    <x-backend.ui.section-card name="Case Study Package Create">
        <form action="{{ route('case.study.backend.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card p-3">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <x-backend.form.text-input label="Title" type="text" name="title" value="{{ $caseStudyData->page_title ?? ''}}">
                            
                        </x-backend.form.text-input>
                    </div>
                    <div class="col-md-12 mb-2">
                        <x-form.ck-editor id="ck-editor1" name="page_description" placeholder="Page Description"
                            label="Page Description">{{$caseStudyData->page_description ?? ''}}
                        </x-form.ck-editor>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <x-backend.form.image-input name="image" image="{{$caseStudyData->page_image ?? ''}}"/>
                    </div>
                    <div class="col-md-6">
                        <div class="row">

                            <div class="col-md-12">
                                <x-backend.form.text-input label="Name"
                                    placeholder="Name" type="text" name="name" />
                            </div>
                            <div class="col-md-12">
                                <x-backend.form.text-input label="Price"
                                    placeholder="Price" type="number" name="price" />
                            </div>

                            <div class="col-md-12">
                                <x-backend.form.text-input label="Limit"
                                    placeholder="Limit" type="number" name="limit" />
                            </div>
                            
                            <div class="col-md-12">
                                <x-backend.form.select-input id="type" label="Billing Type" name="billing_type"
                                    placeholder="Choose type...">
                                    <option value="monthly">Monthly</option>
                                    <option value="yearly">Yearly</option>
                                    <option value="onetime">Onetime</option>
                                </x-backend.form.select-input>
                            </div>
                            
                            <div class="col-md-4">
                                <x-backend.ui.button class="btn-primary btn btn-sm">Create</x-backend.ui.button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </form>
    </x-backend.ui.section-card>
    <!-- end row-->
@endsection
