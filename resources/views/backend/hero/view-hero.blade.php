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
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Hero', 'List']" />

    <x-backend.ui.section-card name="Hero List">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <x-backend.table.basic :items="$banners">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Hero Image</th>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Button Link</th>
                                    @can('manage banner')
                                    <th>Action</th>
                                    @endcan
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($banners as $key => $banner)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td><img loading="lazy" src="{{ useImage($banner->image_url) }}" alt="{{ $banner->title }}"
                                                width="80px" loading="lazy"></td>
                                        <td>{{ Str::limit($banner->title, 20, '...') }}</td>
                                        <td>{{ Str::limit($banner->sub_title, 20, '...') }}</td>
                                        <td>{{ $banner->button }}</td>
                                        @can('manage banner')
                                        <td>
                                            <a href="{{ route('banner.edit', $banner->id) }}"
                                                class="btn btn-info btn-sm">Edit</a>

                                            <form action="{{ route('banner.destroy', $banner->id) }}" method="post"
                                                class="d-inline-block py-0">
                                                @csrf
                                                @method('DELETE')
                                                <x-backend.ui.button
                                                    class="btn-danger btn-sm text-capitalize">Delete</x-backend.ui.button>
                                            </form>
                                        </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </x-backend.table.basic>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </x-backend.ui.section-card>

    <!-- end row-->

    @push('customJs')
        <script>
            var heroDelete = $('#delete-item');
            heroDelete.on('click', function() {
                var form = $(this).next('form')
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
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        form.submit()
                    }
                })
            })
        </script>
    @endpush
@endsection
