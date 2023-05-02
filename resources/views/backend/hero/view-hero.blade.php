@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Hero', 'List']" />

    <x-backend.ui.section-card name="Hero List">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <x-backend.table.basic>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Hero Image</th>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Button Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($banners as $key => $banner)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td><img src="{{ useImage($banner->image_url) }}" alt="{{ $banner->title }}"
                                                width="80px" loading="lazy"></td>
                                        <td>{{ Str::limit($banner->title, 20, '...') }}</td>
                                        <td>{{ Str::limit($banner->sub_title, 20, '...') }}</td>
                                        <td>{{ $banner->button }}</td>
                                        <td>
                                            <a href="{{ route('banner.edit', $banner->id) }}"
                                                class="btn btn-info btn-sm">Edit</a>
<<<<<<< HEAD
                                            <button class="btn btn-danger btn-sm hero-delete">Delete</button>
                                            <form action="{{ route('banner.destroy', $banner->id) }}" method="post" class="form">
=======
                                            <button id="delete-item" class="btn btn-danger btn-sm">Delete</button>
                                            <form id="deleteItem" action="{{ route('banner.destroy', $banner->id) }}"
                                                method="post">
>>>>>>> cfc07c5b6dc6beb47cde26ca7dc507cfcab9586f
                                                @csrf
                                                @method('DELETE')
                                            </form>
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
