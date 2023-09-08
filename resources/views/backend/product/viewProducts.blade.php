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
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right mt-0">
                    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Hero', 'Create']" />
                </div>
                <h4 class="page-title">View Products</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <x-backend.table.basic>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Details</th>
                                <th>Product Pricing</th>
                                <th>Product Features</th>
                                <th>Action</th>
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
                                                        <span
                                                            class="badge fw-bold bg-secondary bg-gradient p-1 fs-6">{{ $product->type }}</span>
                                                    @break

                                                    @case('Gold')
                                                        <span
                                                            class="badge fw-bold bg-warning bg-gradient p-1 fs-6">{{ $product->type }}</span>
                                                    @break

                                                    @case('Platinum')
                                                        <span
                                                            class="badge fw-bold bg-soft-success text-success bg-gradient p-1 fs-6">{{ $product->type }}</span>
                                                    @break

                                                    @case('Exclusive')
                                                        <span
                                                            class="badge fw-bold bg-success bg-gradient p-1 fs-6">{{ $product->type }}</span>
                                                    @break

                                                    @default
                                                @endswitch
                                                @if ($product->is_most_popular)
                                                    <span class="badge bg-primary p-1 fs-6 ms-1">Most Popular</span>
                                                @endif
                                            </div>
                                        </div>
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
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ Route('product.edit', $product) }}"
                                                class="btn btn-blue btn-sm waves-effect waves-light">Edit</a>
                                            <button onclick='deleteProduct("productDelete-{{ $product->id }}")'
                                                class="btn btn-danger btn-sm waves-effect waves-light">Delete</button>
                                            <form class="d-none" id="productDelete-{{ $product->id }}"
                                                action="{{ Route('product.destroy', $product) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </x-backend.table.basic>
                    <div class="paginate  md-md-0 mt-3 mt-md-0 me-4 me-md-0">
                        {{ $products->links() }}
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
@endsection

@push('customJs')
    <script>
        const deleteProduct = id => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Deleted',
                        text: "Your file has been deleted.",
                        icon: 'success',
                        showConfirmButton: false
                    })
                    $("#" + id).submit()
                }
            })
        }
    </script>
@endpush
