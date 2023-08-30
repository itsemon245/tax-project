@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Service', 'Create']" />

    <x-backend.ui.section-card name="Create New Service">

        <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="service_category_id" value="{{ $subCategory->service_category_id }}" hidden />
            <input type="text" name="service_sub_category_id" value="{{ $subCategory->id }}" hidden />

            {{-- rest of the fields goes down here --}}
            <div class="container rounded bg-white py-3 px-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <x-backend.form.text-input label="Title" required type="text" name="title">
                                </x-backend.form.text-input>
                            </div>
                            <div class="col-md-6">
                                <x-backend.form.text-input label="Intro" type="text" name="intro">
                                </x-backend.form.text-input>
                            </div>
                            <div class="col-md-3">
                                <x-backend.form.text-input label="Price" type="number" name="price">
                                </x-backend.form.text-input>
                            </div>
                            <div class="col-md-3">
                                <x-backend.form.text-input label="Discount" type="number" name="discount">
                                </x-backend.form.text-input>
                            </div>
                            <div class="col-md-3">
                                <div class="mt-1">
                                    <x-backend.form.select-input id="discount-type" label="Discount Type" required
                                        name="discount_type">
                                        <option value="0" selected>Percentage</option>
                                        <option value="1">Fixed</option>
                                    </x-backend.form.select-input>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <x-backend.form.text-input label="Ratting" type="number" name="ratting">
                                </x-backend.form.text-input>
                            </div>
                            <div class="col-md-6">
                                <x-backend.form.text-input label="Reviews" type="text" name="reviews">
                                </x-backend.form.text-input>
                            </div>
                            <div class="col-md-6">
                                <x-backend.form.text-input label="Delivery Date" type="date" name="delivery_date">
                                </x-backend.form.text-input>
                            </div>
                            <div class="col-md-6">
                                <x-form.ck-editor id="ck-editor2" name="price_description" placeholder="Price Description"
                                    label="Price Description">
                                </x-form.ck-editor>
                            </div>
                            <div class="col-md-6">
                                <x-form.ck-editor id="ck-editor1" name="description" placeholder="Description"
                                    label="Description">
                                </x-form.ck-editor>
                            </div>
                            <div class="col-md-12">
                                <x-form.sections :sections="$service->sections"/>
                            </div>
                            <div class="mt-3">
                                <button type="submit"
                                    class="btn btn-primary waves-effect waves-light profile-button">Create
                                    Service</button>
                            </div>


                        </div>


                    </div>
                </div>
            </div>
        </form>
    </x-backend.ui.section-card>
    @push('customJs')
    @endpush
@endsection
