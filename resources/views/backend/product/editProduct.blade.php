@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Product', 'Edit']" />

    <!-- end row-->
    <x-backend.ui.section-card name="Edit Product">
        <x-backend.ui.button class="btn-sm btn-info mb-3" href="{{ route('product.index') }}"
            type="custom">Back</x-backend.ui.button>
        <!-- Add product Form -->
        <form action="{{ route('product.update', $product) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="container rounded bg-white py-3 px-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <x-backend.form.text-input label="Title" required type="text" name="title"
                                    :value="$product->title" required>
                                </x-backend.form.text-input>
                            </div>
                            <div class="col-md-6">
                                <x-backend.form.text-input label="Sub Title" type="text" name="sub_title"
                                    :value="$product->sub_title" required>
                                </x-backend.form.text-input>
                            </div>
                            <div class="col-md-6">
                                <x-backend.form.select-input onchange="getProductSubCategories(event)"
                                    data-target="#sub-category" id="category" label="Category" name="category"
                                    placeholder="Choose Category..." required>
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}" @selected($category->id === $product->product_category_id)>
                                            {{ $category->name }}
                                        </option>
                                    @empty
                                        <option disabled>No Records Found!</option>
                                    @endforelse
                                </x-backend.form.select-input>
                            </div>
                            <div class="col-md-6">
                                <x-backend.form.select-input id="sub-category" label="Product Sub Category"
                                    placeholder="Choose Sub Category" name="sub_category" required>
                                    @forelse ($subs as $sub)
                                        <option value="{{ $sub->id }}" @selected($sub->id === $product->product_sub_category_id)>
                                            {{ $sub->name }}
                                        </option>
                                    @empty
                                        <option disabled>No Records Found!</option>
                                    @endforelse
                                </x-backend.form.select-input>
                            </div>
                            <div class="col-md-4">
                                <x-backend.form.text-input label="Price" type="number" name="price" :value="$product->price">
                                </x-backend.form.text-input>
                            </div>
                            <div class="col-md-5 col-8">
                                <div class="mb-2">
                                    <label class="form-label mb-0 p-0 col-12">Amount</label>
                                    <div class="d-flex align-items-center justify-content-center border shadow-sm rounded"
                                        style="overflow: hidden;">
                                        <input type="text" id="is-discount" name="is_discounts_fixed"
                                            :value="$product - > is_discount_fixed" hidden>
                                        <input type="number" id="discount-amount" name="discount_amount"
                                            :value="$product - > discount" class="amount border-0 rounded-0 w-100 ps-2"
                                            style="outline:transparent;" placeholder="0" aria-label="Discont">


                                        <span id="slot-1-service-discount-icon-1"
                                            style="padding-top:.25rem;padding-bottom:0.25rem;"
                                            class="mdi {{ $product->is_discount_fixed ? 'mdi-currency-bdt' : 'mdi-percent-outline' }} bg-light px-xxl-3 px-2 text-success font-18"></span>


                                        <span onclick="discount.toggle(this)"
                                            style="padding-top:.25rem;padding-bottom:0.25rem;"
                                            class="mdi mdi-swap-horizontal bg-blue px-xxl-3 px-2  text-white font-18"
                                            style="cursor: pointer;"></span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-4">
                                <label for="most_popular mb-3">Most Popular</label>
                                <div>
                                    <div class="form-check mb-2 form-check-success d-inline-block me-2">
                                        <input class="form-check-input custom-radio-input rounded-circle"
                                            name="most_popular" type="radio" value="1" id="most_popular-true"
                                            @checked($product->is_most_popular)>
                                        <label class="form-check-label" for="most_popular-true">Yes</label>
                                    </div>
                                    <div class="form-check mb-2 form-check-danger d-inline-block ">
                                        <input class="form-check-input custom-radio-input rounded-circle"
                                            name="most_popular" type="radio" value="0" id="most_popular-false"
                                            @checked(!$product->is_most_popular)>
                                        <label class="form-check-label" for="most_popular-false">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">

                                <x-form.ck-editor id="ck-editor1" name="description" placeholder="Description"
                                    label="Description">
                                    {!! $product->description !!}
                                </x-form.ck-editor>

                            </div><!-- end col -->

                            <div class="col-12">
                                <div class="repeater">
                                    {{-- Feat Template --}}
                                    <div class="row d-none" id="feat-template">
                                        <div class="col-md-6">
                                            <x-backend.form.text-input label="Package Feature" type="test"
                                                name="package_feature[]">
                                            </x-backend.form.text-input>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-2">
                                                <label for="color" class="form-label mb-0">Color</label>
                                                <select class="form-select" id="color" name="color[]">
                                                    <option value="#282e38" selected>Black</option>
                                                    <option value="#1abc9c">Green</option>
                                                    <option value="#f1556c">Red</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- feat Repeater --}}
                                    <div id="feat-repeater" data-count="1">
                                        @foreach (json_decode($product->package_features) as $feat)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <x-backend.form.text-input label="Package Feature" type="test"
                                                        name="package_feature[]" :value="$feat->package_feature">
                                                    </x-backend.form.text-input>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label for="color" class="form-label mb-0">Color</label>
                                                        <select class="form-select" id="color" name="color[]">
                                                            <option value="#282e38" style="color:#282e38;"
                                                                @selected($feat->color === '#282e38')>Black
                                                            </option>
                                                            <option value="#1abc9c" style="color:#1abc9c;"
                                                                @selected($feat->color === '#1abc9c')>Green
                                                            </option>
                                                            <option value="#f1556c" style="color:#f1556c;"
                                                                @selected($feat->color === '#f1556c')>Red
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="actions d-flex justify-content-center gap-2">
                                        <span onclick="repeater.decrement(event)" role="button"
                                            data-container="#feat-repeater"
                                            class="decrement mdi mdi-delete text-danger bg-soft-danger px-1 rounded rounded-circle"></span>
                                        <span onclick="repeater.increment(event)" role="button"
                                            data-template="#feat-template" data-container="#feat-repeater"
                                            class="increment mdi mdi-plus text-success bg-soft-success px-1 rounded rounded-circle"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <x-backend.ui.button class="btn-sm btn-primary mt-3 float-end">Update</x-backend.ui.button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </form>

    </x-backend.ui.section-card>
@endsection

@push('customJs')
    <script>
        repeater = {
            count: function(targetCount, action) {

                return count;
            },
            template: (id) => {
                let template = $(id).clone().removeClass('d-none')
                template.find('input').attr('disabled', false)
                template.find('select').attr('disabled', false)
                return template
            },
            increment: function(e) {
                let container = $(e.target.dataset.container)
                let count = parseInt(container.attr('data-count'))
                count++
                container.attr('data-count', count)
                container.append(this.template(e.target.dataset.template))
            },
            decrement: function(e) {
                let container = $(e.target.dataset.container)
                let count = parseInt(container.attr('data-count'))
                if (count > 1) {
                    container.children().last().remove()
                    count--
                    container.attr('data-count', count)
                }
            }
        }
        const discount = {
            isFixed: false,
            toggle: function(element) {
                console.log(element);
                this.isFixed = !this.isFixed;
                let isDiscount = $(element).parent().find('#is-discount')
                console.log(isDiscount);
                isDiscount.val(this.isFixed)
                let icon = $(element).prev()
                icon
                    .toggleClass('mdi-currency-bdt')
                    .toggleClass('mdi-percent-outline')
            },

        }

        function getProductSubCategories(e) {
            let category = e.target.value;
            let target = $(e.target.dataset.target)
            let url = "{{ route('ajax.get.productSubCategories', 'CATEGORY') }}"
            url = url.replace('CATEGORY', category)
            $.ajax({
                type: "get",
                url: url,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    target.children().remove()
                    response.data.forEach(sub => {
                        let option = `
                        <option value="${sub.id}" class="text-capitalize">${sub.name}</option>
                        `
                        target.append(option)
                    });
                }
            });
        }
    </script>
@endpush
