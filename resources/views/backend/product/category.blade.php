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

    <x-backend.ui.section-card name="Product Categories">
        <div class="row">
            @forelse ($categories as $category)
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-2">
                                <h4 class="header-title mb-0">{{ $category->name }}</h4>
                                <span class="badge bg-light text-dark">Name locked</span>
                            </div>

                            @can('manage product')
                                <form action="{{ route('product-category.update', $category->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <x-form.ck-editor id="product-category-description-{{ $category->id }}"
                                        name="description" label="Description" placeholder="Category Description">
                                        {!! $category->description !!}
                                    </x-form.ck-editor>
                                    <x-backend.ui.button class="btn-sm btn-primary" type="submit">Update
                                        Description</x-backend.ui.button>
                                </form>
                            @else
                                <div class="border rounded p-2 bg-light">
                                    {!! $category->description ?: '<span class="text-muted">No description added.</span>' !!}
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center text-muted">
                            No categories found.
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        @if (method_exists($categories, 'links'))
            <div class="paginate my-2">
                {{ $categories->onEachSide(3)->links() }}
            </div>
        @endif
    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
