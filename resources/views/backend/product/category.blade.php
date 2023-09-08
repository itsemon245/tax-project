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
        {{-- Show all categories table --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">All Categories</h4>
                        <x-backend.table.basic>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $key => $category)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('product-category.edit', $category) }}"
                                                    class="btn btn-blue btn-sm waves-effect waves-light">Edit</a>
                                                <form action="{{ route('product-category.destroy', $category->id) }}"
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
                                    <td valign="top" colspan="3" class="dataTables_empty">No data available in table
                                    </td>
                                @endforelse
                            </tbody>
                        </x-backend.table.basic>
                        <div class="paginate  md-md-0 mt-3 mt-md-0 me-4 me-md-0">
                            {{ $categories->links() }}
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
