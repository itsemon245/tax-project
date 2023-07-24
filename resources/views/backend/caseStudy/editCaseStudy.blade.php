@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Frontend', 'Course', 'Case Study']" />

    <x-backend.ui.section-card name="Case Study Edit">
       <form action="{{ route('case.study.backend.update', $datum) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card p-3">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <x-backend.form.text-input label="Title" type="text" value="{{ $datum->title }}" name="title">
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-12 mb-2">
                    <x-form.ck-editor id="ck-editor1"  name="page_description" placeholder="Page Description"
                    label="Page Description">
                    {{ $datum->page_description }}
                </x-form.ck-editor>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <x-backend.form.image-input  name="image"  />
                    <img src="{{ $datum->image }}" alt="">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <x-backend.form.select-input id="duration" label="Duration" name="duration"
                            placeholder="{{ $datum->duration != null ? $datum->duration : 'Choose duration...' }}">
                            <option value="weekly">Weekly</option>
                            <option value="quarterly">Quarterly</option>
                            <option value="yearly">Yearly</option>
                            <option value="lifetime">Lifetime</option>
                            </x-backend.form.select-input>
                        </div>
                        <div class="col-md-12">
                            <x-backend.form.select-input id="type" label="Type" name="type"
                            placeholder="{{ $datum->type != null ? $datum->type : 'Choose type...' }}">
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
                            placeholder="{{ $datum->type != null ? $datum->orders : 'Choose Orders...' }}">
                            @foreach (range(1, 10) as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                            </x-backend.form.select-input>
                        </div>
                        <div class="col-md-12">
                            <x-backend.form.text-input type="number" value="{{ $datum->rate }}" name="rate" label="Rate" required />
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
