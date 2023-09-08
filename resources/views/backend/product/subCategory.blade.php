@extends('backend.layouts.app')


@section('content')
    @push('customCss')
        <style>
            .paginate {
                float: right;
            }

            div.dataTables_paginate {
                margin: 0;
                white-space: nowrap;
                text-align: right;
                display: none !important;
            }
        </style>
    @endpush
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Product', 'Sub-Category']" />

    <x-backend.ui.section-card name="Product Sub Category">

        {{-- Select category option --}}
        <form action="{{ route('product-subcategory.store') }}" method="POST">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-1">
                                        @csrf
                                        <label for="category" class="form-label">Select Category</label>
                                        <select name="category_id" class="form-select"
                                            id="category
                                @error('category_id')
                                is-invalid
                                @enderror
                                ">
                                            <option selected disabled>Select</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->
                                {{-- Add sub-category --}}
                                <div class="col-lg-6">
                                    <div>
                                        <label for="sub_category" class="form-label">Sub-Category</label>
                                        <input type="text" id="sub_category" name="sub_category"
                                            placeholder="Type Sub-Category"
                                            class="form-control
                                @error('sub_category')
                                is-invalid
                                @enderror
                                ">
                                        @error('sub_category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->
                                <div class="mt-1"><button class="btn btn-primary w-100 btn-sm profile-button"
                                        type="submit">Add Sub-Category</button>
                                </div>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div>
            </div>
        </form>
        {{-- Show all categories table --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">All Sub-Categories</h4>
                        <x-backend.table.basic>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sub-Category</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sub_categories as $key => $sub_category)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $sub_category->name }}</td>
                                        <td>{{ $sub_category->productCategory->name }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('product-subcategory.edit', $sub_category->id) }}"
                                                    class="btn btn-blue btn-sm waves-effect waves-light">Edit</a>
                                                <form action="{{ route('product-subcategory.destroy', $sub_category->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-backend.ui.button
                                                        class="btn-danger btn-sm">Delete</x-backend.ui.button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%"><span>No data found.</span></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </x-backend.table.basic>
                        <div class="paginate  md-md-0 mt-3 mt-md-0 me-4 me-md-0">
                            {{ $sub_categories->links() }}
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>

    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
