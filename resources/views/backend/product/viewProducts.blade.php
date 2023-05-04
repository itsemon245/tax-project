@extends('backend.layouts.app')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Hero', 'Create']" />
                </div>
                <a href="{{ route('product.create') }}" class="mt-3 btn btn-primary waves-effect waves-light profile-button">
                    Create Product
                </a>
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
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Discount Type</th>
                                <th>Most Popular</th>
                                <th>Package Feature</th>
                                <th>ratting</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Author</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td title="{{ $product->title }}">{{ Str::limit($product->title, 20, '...') }}</td>
                                    <td title="{{ $product->sub_title }}">
                                        {{ Str::limit($product->sub_title, 20, '...') }}
                                    </td>
                                    <td>{{ $product->productCategory->name }}</td>
                                    <td>{{ $product->productSubCategory->name }}</td>
                                    <td>৳{{ $product->price }}</td>
                                    <td>{{ $product->discount }}%</td>
                                    <td>{!! $product->is_discount_fixed
                                        ? "<span class='badge bg-primary'>Fixed</span>"
                                        : "<span class='badge bg-info'>Percentage</span>" !!}</td>
                                    <td>{!! $product->is_most_popular
                                        ? "<span class='badge bg-success'>Yes</span>"
                                        : "<span class='badge bg-danger'>No</span>" !!}
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach (json_decode($product->package_features) as $feature)
                                                <li style="color: {{ $feature->color }}">{{ $feature->package_feature }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $product->ratting }}</td>
                                    <td>{!! $product->description !!}</td>
                                    <td>{!! $product->status
                                        ? "<span class='badge bg-success'>Active</span>"
                                        : "<span class='badge bg-danger'>Deactive</span>" !!}
                                    </td>
                                    <td>{{ $product->user->name }}</td>
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
            $("#" + id).submit()
        }
    </script>
@endpush
