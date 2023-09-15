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
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Users', 'List']" />

    <x-backend.ui.section-card name="Users List">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <x-backend.table.basic :data="$data">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Phone</th>
                                    <th>Admin Reference</th>
                                    @canany(['create user', 'update user', 'delete user'])
                                    <th>Action</th>    
                                    @endcanany
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $key => $user)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td><img src="{{ useImage($user->image_url) }}" alt="{{ $user->user_name }}"
                                                width="80px" loading="lazy"></td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-capitalize">
                                            <span
                                                class="px-2 py-1 bg-soft-success text-success rounded rounded-3 fw-medium">{{ $user->getRoleNames()->first() }}</span>
                                        </td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{!! Str::limit($user->admin_ref, 15, '...') !!}</td>
                                        @canany(['update user', 'delete user'])
                                        <td>
                                            @can('update user')
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="btn btn-info btn-sm">Edit</a>
                                            @endcan
                                            @can('delete user')
                                            <form action="{{ route('users.destroy', $user->id) }}" method="post"
                                                class="d-inline-block py-0">
                                                @csrf
                                                @method('DELETE')
                                                <x-backend.ui.button
                                                    class="btn-danger btn-sm text-capitalize">Delete</x-backend.ui.button>
                                            </form>
                                            @endcan
                                        </td> 
                                        @endcanany
                                    
                                    </tr>
                                @endforeach
                            </tbody>
                        </x-backend.table.basic>
                        <div id="myPaginator" class="paginate my-2">
                            {{ $data?->links('pagination::simple-bootstrap-5')}}
                        </div>
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
