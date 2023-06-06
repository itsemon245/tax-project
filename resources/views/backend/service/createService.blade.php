@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Service', 'Create']" />

    <x-backend.ui.section-card name="Create New Service">

        <form action="" method="post">
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
                            <div class="col-md-12">
                                <x-form.ck-editor id="ck-editosr" name="description" placeholder="Description">
                                </x-form.ck-editor>
                            </div>
                            <div class="col-md-12">
                                <x-form.ck-editor id="ck-editor" name="price_description" placeholder="Price Description">
                                </x-form.ck-editor>
                            </div>
                            <div class="col-md-12">
                                <label for="color" class="form-label my-3"><b>SECTIONS</b></label>
                                <div id="packacgeFeaturesInputs"></div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="icon-item mx-1 mt-3" style="cursor: pointer" onclick="addPackageFeature()"
                                        title="Add Package Feature">
                                        <i data-feather="plus-square" class="icon-dual"></i>
                                    </div>
                                    <div id="removePackageFeatureBtn" class="icon-item mx-1 mt-3" style="cursor: pointer"
                                        onclick="removePackageFeature()" title="Add Package Feature">
                                        <i data-feather="minus-square" class="icon-dual"></i>
                                    </div>
                                </div>
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
        <script>
            const featureLength = () => {
                $('#packacgeFeaturesInputs').children().length < 2 ?
                    $("#removePackageFeatureBtn").addClass('d-none') :
                    $("#removePackageFeatureBtn").removeClass('d-none')
            }

            const addPackageFeature = () => {
                const inputs = `
               <div class="row">
                    <div class="col-md-6">
                        <div class="mt-1">
                            <x-backend.form.text-input label="Title" type="text" name="sections_title[]"></x-backend.form.text-input>
                        </div>
                        <div class="mt-1">
                            <x-form.ck-editor id="ck-editor" name="sections_description[]" placeholder="Price Description"></x-form.ck-editor>
                        </div>
                    </div>
                    <div class="col-md-6">  
                        <x-backend.form.image-input name="sections_image[]" />
                    </div>
                </div>
            `
                $('#packacgeFeaturesInputs').append(inputs)
                featureLength()
            }
            addPackageFeature()

            const removePackageFeature = () => {
                $("#packacgeFeaturesInputs").find(".row:last").remove()
                featureLength()
            }
        </script>
    @endpush
@endsection
