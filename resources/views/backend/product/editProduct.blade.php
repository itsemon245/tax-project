@extends('backend.layouts.app')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Products', 'View Products', 'Edit Product']" />
                </div>
                <h4 class="page-title">Edit Product</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <!-- Add product Form -->
                    <form action="{{ route('product.update', $product) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="container rounded bg-white py-3 px-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <x-backend.from.text-input label="Title" required type="text" name="title"
                                                value="{{ $product->title }}">
                                            </x-backend.from.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.from.text-input label="Sub Title" type="text" name="sub_title"
                                                value="{{ $product->sub_title }}">
                                            </x-backend.from.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mt-1">
                                                <label for="category" class="form-label">Category <span
                                                        style="color:red;">*</span></label>
                                                <select class="form-select" id="category" name="category"
                                                    onchange="getSubCategories(this)">
                                                    @forelse ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $category->id === $product->product_category_id ? 'selected' : '' }}>
                                                            {{ $category->category }}
                                                        </option>
                                                    @empty
                                                        <option disabled>No Records Found!</option>
                                                    @endforelse
                                                </select>
                                                @error('category')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mt-1">
                                                <label for="sub-category" class="form-label">Sub Category <span
                                                        style="color:red;">*</span></label>
                                                <select class="form-select" id="sub-category" name="sub_category">
                                                    <option selected value="{{ $product->product_sub_category_id }}">
                                                        {{ $product->product_sub_category_id }}</option>
                                                </select>
                                                @error('sub_category')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.from.text-input label="Price" type="number" name="price"
                                                value="{{ $product->price }}">
                                            </x-backend.from.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.from.text-input label="Discount" type="number" name="discount"
                                                value="{{ $product->discount }}">
                                            </x-backend.from.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mt-1">
                                                <label for="discount-type" class="form-label">Discount Type <span
                                                        style="color:red;">*</span></label>
                                                <select class="form-select" id="discount-type" name="discount_type">
                                                    <option value="0"
                                                        {{ !$product->is_discount_fixed ? 'selected' : '' }}>Percentage
                                                    </option>
                                                    <option value="1"
                                                        {{ $product->is_discount_fixed ? 'selected' : '' }}>Fixed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <x-backend.from.text-input label="Ratting" type="number" name="ratting"
                                                value="{{ $product->ratting }}">
                                            </x-backend.from.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mt-1">
                                                <label for="most-populer" class="form-label">Most Popular <span
                                                        style="color:red;">*</span></label>
                                                <select class="form-select" id="most-populer" name="most_popular">
                                                    <option value="0"
                                                        {{ !$product->is_most_popular ? 'selected' : '' }}>No</option>
                                                    <option value="1"
                                                        {{ $product->is_most_popular ? 'selected' : '' }}>Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mt-1">
                                                <label for="status" class="form-label">Status <span
                                                        style="color:red;">*</span></label>
                                                <select class="form-select" name="status">
                                                    <option value="1" {{ $product->status ? 'selected' : '' }}>Active
                                                    </option>
                                                    <option value="0" {{ !$product->status ? 'selected' : '' }}>
                                                        Deactive
                                                    </option>
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
                                            <div id="snow-editor" style="height: 300px;">
                                                {!! $product->description !!}
                                            </div>
                                            <textarea class="d-none" name="description" id="description"></textarea>
                                            <!-- end Snow-editor-->
                                        </div><!-- end col -->



                                        <div class="mt-3">
                                            <button type="submit"
                                                class="btn btn-primary waves-effect waves-light profile-button"
                                                onclick="descriptionAdd()">Update
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
                        <x-backend.from.text-input label="Package Feature" type="test"
                            name="package_feature[]">
                        </x-backend.from.text-input>
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

        const printPackageFeature = () => {
            const inputs = [];
            @forelse (json_decode($product->package_features) as $feature)
                inputs.push(`
               <div class="row">
                    <div class="col-md-6">
                        <x-backend.from.text-input label="Package Feature" type="test"
                            name="package_feature[]" value="{{ $feature->package_feature }}">
                        </x-backend.from.text-input>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-1">
                            <label for="color" class="form-label">Color</label>
                            <select class="form-select" id="color" name="color[]">
                                <option value="#282e38" {{ $feature->color === '#282e38' ? 'selected' : '' }}>Black</option>
                                <option value="#1abc9c" {{ $feature->color === '#1abc9c' ? 'selected' : '' }}>Green</option>
                                <option value="#f1556c" {{ $feature->color === '#f1556c' ? 'selected' : '' }}>Red</option>
                            </select>
                        </div>
                    </div>
                </div>
            `)
            @empty
                inputs.push(`
               <div class="row">
                    <div class="col-md-6">
                        <x-backend.from.text-input label="Package Feature" type="test"
                            name="package_feature[]">
                        </x-backend.from.text-input>
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
            `)
            @endforelse

            $('#packacgeFeaturesInputs').append(inputs)
            featureLength()
        }
        printPackageFeature()

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
                        `<option value="${subCategory.id}">${subCategory.sub_category}</option>`).join(
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
