@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Frontend', 'Course', 'Case Study Package']" />
    <x-backend.ui.section-card name="Case Study Edit">
       <form action="{{ route('case.study.package.backend.update', $datum->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card p-3">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <x-backend.form.text-input label="Title" type="text" name="title" value="{{ $caseStudyData->page_title ?? ''}}"></x-backend.form.text-input>
                </div>
                <div class="col-md-12 mb-2">
                    <x-form.ck-editor id="ck-editor1"  name="page_description" placeholder="Page Description"
                    label="Page Description">
                    {{ $caseStudyData->page_description ?? ''}}
                </x-form.ck-editor>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <x-backend.form.image-input  name="image" image="{{$caseStudyData->page_image ?? ''}}" />
                </div>
                <div class="col-md-6">
                    <div class="row">
                       
                        <div class="col-md-12">
                            <x-backend.form.text-input label="Name"
                                placeholder="Name" type="text" name="name" value="{{$datum->name ?? ''}}"/>
                        </div>
                        <div class="col-md-12">
                            <x-backend.form.text-input label="Price"
                                placeholder="Price" type="number" name="price"  value="{{$datum->price ?? ''}}"/>
                        </div>

                        <div class="col-md-12">
                            <x-backend.form.text-input label="Limit"
                                placeholder="Limit" type="number" name="limit"  value="{{$datum->limit ?? ''}}"/>
                        </div>
                        
                        <div class="col-md-12">
                            <x-backend.form.select-input id="type" label="Billing Type" name="billing_type"
                                placeholder="Choose type...">
                                <option value="monthly" {{$datum->billing_type == 'monthly' ? selected : ''}}>Monthly</option>
                                <option value="yearly" {{$datum->billing_type == 'yearly' ? selected : ''}}>Yearly</option>
                                <option value="onetime" {{$datum->billing_type == 'onetime' ? selected : ''}}>Onetime</option>
                            </x-backend.form.select-input>
                        </div>
                        
                        <div class="col-md-4">
                            <x-backend.ui.button class="btn-primary btn btn-sm">Update</x-backend.ui.button>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
        </form>
    </x-backend.ui.section-card>
    <!-- end row-->
@endsection
