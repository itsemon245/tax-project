@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Frontend', 'Course', 'Case Study']" />

    <x-backend.ui.section-card name="Case Study Create">
        <form action="{{ route('case-study.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card p-3">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <x-backend.form.text-input label="Name" type="text" name="name">
                        </x-backend.form.text-input>
                    </div>

                    <div class="col-md-12 mb-2">
                        <x-form.ck-editor id="ck-editor1" name="description" placeholder="Description"
                            label="Description"></x-form.ck-editor>
                    </div>

                    <div class="col-md-12 mb-2">
                        <x-form.ck-editor id="ck-editor2" name="intro" placeholder="Intro"
                            label="intro"></x-form.ck-editor>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <x-backend.form.image-input name="image" />
                    </div>
                    <div class="col-md-6">
                        <div class="row">

                            <div class="col-md-12">
                                <x-backend.form.select-input id="type" label="Case Study Package" name="case_study_category_id"
                                    placeholder="Choose Cateogry...">
                                    @forelse ($caseStudyCategory as $category)
                                    <option value="{{$category->id}}">{{$category->case_study_category}}</option>
                                    @empty
                                    <option value="yearly">No Category</option>
                                    @endforelse
                                </x-backend.form.select-input>
                            </div>

                            <div class="col-md-12">
                                <x-backend.form.select-input id="type" label="Package" name="case_study_package_id"
                                    placeholder="Choose Package...">
                                    @forelse ($caseStudyPackage as $package)
                                    <option value="{{$package->id}}">{{$package->name}}</option>
                                    @empty
                                    <option value="yearly">No Package</option>
                                    @endforelse
                                </x-backend.form.select-input>
                            </div>

                            <div class="col-md-12">
                                <x-backend.form.text-input label="Likes"
                                    placeholder="Likes" type="number" name="likes" />
                            </div>

                            <div class="col-md-12">
                                <x-backend.form.text-input label="price"
                                    placeholder="price" type="number" name="price" />
                            </div>

                            <div class="col-md-12">
                                <x-backend.form.text-input label="Upload Files" type="file" name="download_link" />
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
