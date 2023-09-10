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

        <x-backend.ui.button class="btn-sm btn-info mb-3" href="{{ route('product.index') }}"
            type="custom">Back</x-backend.ui.button>
        {{-- Select category option --}}
        <form action="{{ route('product-sub-category.store') }}" method="POST">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <x-backend.form.select-input id="category" label="Category" name="category"
                                placeholder="Choose Category">
                                @forelse ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @empty
                                    <option disabled>No Records Found!</option>
                                @endforelse
                            </x-backend.form.select-input>
                        </div> <!-- end col -->
                        {{-- Add sub-category --}}
                        <div class="col-md-6">
                            <x-backend.form.text-input name="name" label="Sub Category" placeholder="Sub Category" />
                        </div> <!-- end col -->
                        <div class="mt-1">
                            <x-backend.ui.button class="btn-sm btn-primary" type="submit">Create</x-backend.ui.button>
                        </div>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </form>
        {{-- Show all categories table --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">All Sub-Categories</h4>
                        <x-backend.table.basic :data="$subCategories">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sub-Category</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subCategories as $key => $sub)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $sub->name }}</td>
                                        <td>{{ $sub->productCategory->name }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <x-backend.ui.button type="edit" :href="route('product-sub-category.edit', $sub->id)" class="btn-sm" />
                                                <x-backend.ui.button type="delete" :action="route('product-sub-category.destroy', $sub->id)" class="btn-sm" />

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
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>

    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
