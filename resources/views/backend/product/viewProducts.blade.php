@extends('backend.layouts.app')
@section('content')
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

                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
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
                                        <span title="Title"><b>{{ Str::limit($product->title, 20, '...') }}</b></span><br>
                                        <span title="Sub Title">{{ Str::limit($product->sub_title, 20, '...') }}</span><br>
                                        <span title="Category"><b>{{ $product->productCategory->name }}</b></span><br>
                                        <span title="Sub Category">{{ $product->productSubCategory->name }}</span><br>
                                        <span title="Author"><b>{{ $product->user->name }}</b></span><br>
                                        <span title="Rattings">{{ $product->ratting }}</span><br>
                                        <span title="Most Popular">{!! $product->is_most_popular
                                            ? "<span class='badge bg-success'>Yes</span>"
                                            : "<span class='badge bg-danger'>No</span>" !!}</span><br>
                                        <span title="Status">{!! $product->status
                                            ? "<span class='badge bg-success'>Active</span>"
                                            : "<span class='badge bg-danger'>Deactive</span>" !!}</span><br>
                                        <span title="Description">{!! $product->description !!}</span><br>
                                    </td>
                                    <td>
                                        <span title="Price"><b>{{ $product->price }}৳</b></span><br>
                                        <span title="Discount">
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
                    </table>
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
