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
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Service', 'View All']" />

    <x-backend.ui.section-card name="View All Services">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <x-backend.table.basic :items="$services">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Service Details</th>
                                    <th>Service Pricing</th>
                                    <th>Service Sections</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $key => $service)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>
                                            <span title="Title"><b>Title:
                                                    {{ Str::limit($service->title, 20, '...') }}</b></span><br>
                                            <span class="text-muted" title="Intro">Intro:
                                                {{ Str::limit($service->intro, 20, '...') }}</span><br>
                                            <span class="text-muted" title="Category">Category:
                                                {{ $service->serviceCategory->name }}</span><br>
                                            <span class="text-muted" title="Sub Category">Sub Category:
                                                {{ $service->serviceSubCategory->name }}</span><br>
                                            <span class="text-muted" title="Ratings">Ratings:
                                                {{ $service->rating }}</span><br>
                                            <span class="text-muted" title="Reviews">Reviews:
                                                {{ Str::limit($service->reviews, 20, '...') }}</span><br>
                                            <span class="text-muted text-wrap" title="Description">Description:
                                                {{ Str::limit($service->description, 100, '...') }}</span><br>
                                        </td>
                                        <td>
                                            <span title="Price"><b>Price:
                                                    {{ $service->price }}৳</b></span><br>
                                            <span class="text-muted" title="Discount">
                                                Discount:
                                                {{ $service->discount }}{{ $service->is_discount_fixed ? '৳' : '%' }}
                                            </span><br>
                                            <span class="text-muted text-wrap" title="Price Description">Price Description:
                                                {{ Str::limit($service->price_description, 100, '...') }}</span><br>
                                        </td>
                                        <td>
                                            @foreach (json_decode($service->sections) as $section)
                                                <div class="card">
                                                    <div class="card-body">
                                                        <img loading="lazy" src="{{ useImage($section->image) }}" alt="image"
                                                            width="80px" loading="lazy" class="mb-2">
                                                        <h3>{{ $section->title }}</h3>
                                                        <p>{{ Str::limit($section->description, 100, '...') }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ Route('service.edit', $service) }}"
                                                    class="btn btn-blue btn-sm waves-effect waves-light">Edit</a>
                                                <button onclick='deleteService("serviceDelete-{{ $service->id }}")'
                                                    class="btn btn-danger btn-sm waves-effect waves-light">Delete</button>
                                                <form class="d-none" id="serviceDelete-{{ $service->id }}"
                                                    action="{{ Route('service.destroy', $service) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </x-backend.table.basic>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </x-backend.ui.section-card>


    @push('customJs')
        <script>
            const deleteService = id => {
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
@endsection
