@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Frontend', 'Course', 'Case Study']" />

    <x-backend.ui.section-card name="Case Study Create">
        <div class="mb-3">
            <a href="#" class="btn-info btn btn-sm">BACK</a>
        </div>
       <form action="{{ route('case.study.backend.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card p-3">
            <h4>Case Study Page Content</h4>
            <div class="row">
                <div class="col-md-12 mb-2">
                    <x-backend.form.text-input label="Title"  type="text" name="title">
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-12 mb-2">
                    <x-form.ck-editor id="ck-editor1"  name="page_description" placeholder="Page Description"
                    label="Page Description">
                </x-form.ck-editor>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <x-backend.form.image-input name="image"  />
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <x-backend.form.select-input id="duration" label="Duration" name="duration"
                            placeholder="Choose duration...">
                            <option value="weekly">Weekly</option>
                            <option value="quarterly">Quarterly</option>
                            <option value="yearly">Yearly</option>
                            <option value="lifetime">Lifetime</option>
                            </x-backend.form.select-input>
                        </div>
                        <div class="col-md-12">
                            <x-backend.form.select-input id="type" label="Type" name="type"
                            placeholder="Choose type...">
                                <option value="free">Free</option>
                                <option value="basic">Basic</option>
                                <option value="silver">Silver</option>
                                <option value="gold">Gold</option>
                                <option value="platinum">Platinum</option>
                                <option value="exclusive">Exclusive</option>
                            </x-backend.form.select-input>
                        </div>
                        <div class="col-md-12">
                            <x-backend.form.select-input id="orders" label="Orders" name="orders"
                            placeholder="Choose Orders...">
                            @foreach (range(1, 10) as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                            </x-backend.form.select-input>
                        </div>
                        <div class="col-md-12">
                            <x-backend.form.text-input type="number" name="rate" label="Rate" required />
                        </div>
                    </div>
                </div>
            </div>
            <x-backend.ui.button class="btn-primary btn btn-sm">Create</x-backend.ui.button>
        </div>
        </form>
    </x-backend.ui.section-card>
    <!-- end row-->
@endsection
