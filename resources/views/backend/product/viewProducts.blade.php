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
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Hero', 'Create']" />

    <!-- end page title -->
    <x-backend.ui.section-card name="Products">
        @can('manage product')
            <x-backend.ui.button class="btn-sm btn-success mb-3" href="{{ route('product.create') }}"
                type="custom">Create</x-backend.ui.button>
        @endcan
        <x-backend.table.basic :items="$products">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Details</th>
                    <th>Product Pricing</th>
                    <th>Product Features</th>
                    @can('manage product')
                        <th>Action</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <div class="d-flex gap-3">
                                <p class="fs-5 fw-bold mb-0">
                                    <span>Title:</span>
                                    {{ $product->title }}
                                </p>
                                <div>
                                    @switch($product->type)
                                        @case('Silver')
                                            <span class="badge fw-bold bg-secondary bg-gradient p-1 fs-6">{{ $product->type }}</span>
                                        @break

                                        @case('Gold')
                                            <span class="badge fw-bold bg-warning bg-gradient p-1 fs-6">{{ $product->type }}</span>
                                        @break

                                        @case('Platinum')
                                            <span
                                                class="badge fw-bold bg-soft-success text-success bg-gradient p-1 fs-6">{{ $product->type }}</span>
                                        @break

                                        @case('Exclusive')
                                            <span class="badge fw-bold bg-success bg-gradient p-1 fs-6">{{ $product->type }}</span>
                                        @break

                                        @default
                                    @endswitch
                                    @if ($product->is_most_popular)
                                        <span class="badge bg-primary p-1 fs-6 ms-1">Most Popular</span>
                                    @endif
                                </div>
                            </div>
                            <p class="fs-5 fw-bold mb-0">
                                <span>Category:</span> 
                                {{ $product->productCategory?->name }}
                            </p>
                            <p class="mb-1" style="font-weight: 500;">
                                <span>Sub Title:</span>
                                {{ $product->sub_title }}
                            </p>
                            <p class="text-muted">
                                <span class="fw-bold text-secondary">Description:</span>
                                {{ $product->description }}
                            </p>
                        </td>
                        <td>
                            <span title="Price"><b>Price:
                                    {{ $product->price }}৳</b></span><br>
                            <span class="text-muted" title="Discount">
                                Discount:
                                {{ $product->discount }}{{ $product->is_discount_fixed ? '৳' : '%' }}
                            </span><br>
                        </td>
                        <td>
                            <ul>
                                @foreach (json_decode($product->package_features) as $feature)
                                    <li style="color: {{ $feature->color }}">{{ $feature->package_feature }}
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        @can('manage product')
                            <td>
                                <x-backend.ui.button type="edit" class="btn-sm" :href="route('product.edit', $product->id)" />
                                <x-backend.ui.button type="delete" class="btn-sm" :action="route('product.destroy', $product->id)" />
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </x-backend.table.basic>
    </x-backend.ui.section-card>
    <!-- end row-->
@endsection
