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
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Product', 'Category']" />

    <x-backend.ui.section-card name="Product Category">

        {{-- add category field --}}
        @can('manage product')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-1">Add Category</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('product-category.store') }}" method="POST">
                                    @csrf
                                    <div>
                                        <input type="text" id="simpleinput" name="category" placeholder="Type Category"
                                            class="form-control
                                @error('category')
                                is-invalid
                                @enderror
                                ">
                                        @error('category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-1"><button class="btn btn-primary w-100 btn-sm profile-button"
                                            type="submit">Add Category</button>
                                    </div>
                                </form>
                            </div> <!-- end col -->
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
        @endcan
        {{-- Show all categories table --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">All Categories</h4>
                        <x-backend.table.basic :items="$categories">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    @can('manage product')
                                    <th>Actions</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $key => $category)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $category->name }}</td>
                                        @can('manage product')
                                        <td>
                                            <x-backend.ui.button type="edit"
                                                href="{{ route('product-category.edit', $category->id) }}"
                                                class="btn-sm" />
                                            <x-backend.ui.button type="delete"
                                                action="{{ route('product-category.destroy', $category->id) }}"
                                                class="btn-sm" />
                                        </td>
                                        @endcan
                                    </tr>
                                @empty
                                    <td valign="top" colspan="3" class="dataTables_empty">No data available in table
                                    </td>
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
