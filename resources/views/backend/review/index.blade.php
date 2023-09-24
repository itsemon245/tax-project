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
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Service', 'Sub Categories']" />

    <x-backend.ui.section-card name="Service Sub Categories">



        {{-- Show all categories table --}}
        <div class="card">
            <div class="card-body">
                <x-backend.ui.button type="custom" class="btn-success text-capitalize mb-2 btn-sm"
                    href="{{ route('service.subs.create', $categoryId) }}">New Sub Category</x-backend.ui.button>
                <x-backend.table.basic :items="$subCategories">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-capitalize">{{ $slug }} Name</th>
                            <th>Reviews</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subCategories as $key => $subCategory)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    <strong>{{ $subCategory->name }}</strong>
                                </td>
                                <td>
                                    <x-backend.ui.button type="edit" class="btn-primary btn-sm text-capitalize"
                                        href="{{ route('service-subcategory.edit', $subCategory->id) }}"></x-backend.ui.button>
                                    <x-backend.ui.button type="delete" class="btn-primary btn-sm text-capitalize"
                                        action="{{ route('service-subcategory.destroy', $subCategory->id) }}"></x-backend.ui.button>
                                </td>
                                <td>
                                    <span class="badge bg-primary text-capitalize" style="font-size: 15px;">
                                        {{ count($subCategory->services) }} services</span>

                                </td>
                                <td>
                                    <x-backend.ui.button type="custom" class="btn-success btn-sm text-capitalize"
                                        href="{{ route('service.create', $subCategory->id) }}">Create
                                        New</x-backend.ui.button>
                                    <x-backend.ui.button type="custom" class="btn-primary btn-sm text-capitalize"
                                        href="{{ route('service.index', $subCategory->id) }}">View All</x-backend.ui.button>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"><span>No data found.</span></td>
                            </tr>
                        @endforelse
                    </tbody>
                </x-backend.table.basic>
            </div> <!-- end card body-->
        </div> <!-- end card -->

    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
