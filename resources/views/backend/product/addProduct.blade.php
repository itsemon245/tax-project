@extends('backend.layouts.app')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Products', 'View Products', 'Add Product']" />
                </div>
                <h4 class="page-title">Add Product</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <!-- Add product Form -->
                    <form action="{{ route('product.store') }}" method="POST">
                        @csrf
                        <div class="container rounded bg-white py-3 px-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Title" required type="text"
                                                name="title">
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Sub Title" type="text" name="sub_title">
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">

                                            <x-backend.form.select-input id="category" label="Category" name="category"
                                                placeholder="Choose Category..." onchange="getSubCategories(this)">
                                                @forelse ($categories as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                @empty
                                                    <option disabled>No Records Found!</option>
                                                @endforelse
                                            </x-backend.form.select-input>
                                        </div>
                                        <div class="col-md-6">
                                            {{-- <div class="mt-1">
                                                <label for="sub-category" class="form-label">Sub Category <span
                                                        style="color:red;">*</span></label>
                                                <select class="form-select" id="sub-category" name="sub_category">
                                                    <option selected disabled>Choose Category first...</option>
                                                </select>
                                                @error('sub_category')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div> --}}
                                            <x-backend.form.select-input id="sub-category" label="Sub Category"
                                                name="category" placeholder="Choose Category first..." name="sub_category">
                                            </x-backend.form.select-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Price" type="number" name="price">
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Discount" type="number" name="discount">
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mt-1">
                                                <label for="discount-type" class="form-label">Discount Type <span
                                                        style="color:red;">*</span></label>
                                                <select class="form-select" id="discount-type" name="discount_type">
                                                    <option value="0" selected>Percentage</option>
                                                    <option value="1">Fixed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Ratting" type="number" name="ratting">
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mt-1">
                                                <label for="most-populer" class="form-label">Most Popular <span
                                                        style="color:red;">*</span></label>
                                                <select class="form-select" id="most-populer" name="most_popular">
                                                    <option value="0" selected>No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            {{-- Dynamic Package Feature --}}
                                            <div id="packacgeFeaturesInputs"></div>
                                            <div class="d-flex align-items-center justify-content-center">
                                                <div class="icon-item mx-1 mt-3" style="cursor: pointer"
                                                    onclick="addPackageFeature()" title="Add Package Feature">
                                                    <i data-feather="plus-square" class="icon-dual"></i>
                                                </div>
                                                <div id="removePackageFeatureBtn" class="icon-item mx-1 mt-3"
                                                    style="cursor: pointer" onclick="removePackageFeature()"
                                                    title="Add Package Feature">
                                                    <i data-feather="minus-square" class="icon-dual"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="snow-editor" class="form-label">Description</label>
                                            <div id="snow-editor" style="height: 300px;"></div>
                                            <textarea class="d-none" name="description" id="description"></textarea>
                                        </div><!-- end col -->



                                        <div class="mt-3">
                                            <button type="submit"
                                                class="btn btn-primary waves-effect waves-light profile-button"
                                                onclick="descriptionAdd()">Create
                                                Product</button>
                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </form>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
@endsection

@push('customJs')
    <script>
        const descriptionAdd = () => {
            $("#description").val($('.ql-editor').html())
        }
        const featureLength = () => {
            $('#packacgeFeaturesInputs').children().length < 2 ?
                $("#removePackageFeatureBtn").addClass('d-none') :
                $("#removePackageFeatureBtn").removeClass('d-none')
        }

        const addPackageFeature = () => {
            const inputs = `
               <div class="row">
                    <div class="col-md-6">
                        <x-backend.form.text-input label="Package Feature" type="test"
                            name="package_feature[]">
                        </x-backend.form.text-input>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-1">
                            <label for="color" class="form-label">Color</label>
                            <select class="form-select" id="color" name="color[]">
                                <option value="#282e38" selected>Black</option>
                                <option value="#1abc9c">Green</option>
                                <option value="#f1556c">Red</option>
                            </select>
                        </div>
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

        const getSubCategories = (e) => {
            const category_id = e.value
            let url = "{{ route('getSubcategory', ':categoryId') }}"
            url = url.replace(':categoryId', category_id)

            $.ajax({
                type: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    const subCategories = data.map(subCategory =>
                        `<option value="${subCategory.id}">${subCategory.name}</option>`).join(
                        '')
                    $("#sub-category").html('')
                    $("#sub-category").html(
                        `<option selected disabled>Choose Sub Category...</option>` +
                        subCategories
                    )
                },
                error: function(error) {
                    console.log(error)
                }
            });
        }
    </script>
@endpush
