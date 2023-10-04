@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Product', 'Sub-Category', 'Edit']" />

    <x-backend.ui.section-card name="Edit Sub-Category">
        <x-backend.ui.button class="btn-sm btn-info mb-3" href="{{ route('product-sub-category.index') }}"
            type="custom">Back</x-backend.ui.button>
        {{-- Select category option --}}
        <form action="{{ route('product-sub-category.update', $productSubCategory->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <x-backend.form.select-input id="category" label="Category" name="category"
                                        placeholder="Choose Category">
                                        @forelse ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if ($category->id == $productSubCategory->productCategory->id) selected @endif">
                                                {{ $category->name }}
                                            </option>
                                        @empty
                                            <option disabled>No Records Found!</option>
                                        @endforelse
                                    </x-backend.form.select-input>
                                </div> <!-- end col -->
                                {{-- Add sub-category --}}
                                <div class="col-md-6">
                                    <x-backend.form.text-input name="sub_category" label="Sub Category"
                                        placeholder="Sub Category" :value="$productSubCategory->name" />
                                </div> <!-- end col -->
                                <div class="mt-1">
                                    <x-backend.ui.button class="btn-sm btn-primary"
                                        type="submit">Update</x-backend.ui.button>
                                </div>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div>
            </div>
        </form>
    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
