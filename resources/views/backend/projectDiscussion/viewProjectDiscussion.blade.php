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
    <x-backend.ui.breadcrumbs :list="['Backend', 'Project Discussion', 'List']" />
    <x-backend.ui.section-card name="Project Discussion List">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <x-backend.table.basic :items="$projectDiscussions">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Location</th>
                                    <th>Message</th>
                                    @canany(['manage discussion', 'read discussion'])
                                    <th>Action</th>
                                    @endcanany
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($projectDiscussions as $key => $projectDiscussion)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $projectDiscussion->name }}</td>
                                        <td>{{ $projectDiscussion->phone }}</td>
                                        <td>{{ Str::limit($projectDiscussion->email, 10, '...') }}</td>
                                        <td>{{ Str::limit($projectDiscussion->location, 10, '...') }}</td>
                                        <td>{{ Str::limit($projectDiscussion->message, 10, '...') }}</td>
                                        @canany(['manage discussion', 'read discussion'])
                                        <td>
                                            @can('read discussion')
                                            <a class="btn btn-sm btn-info"
                                            href="{{ route('project-discussion.show', $projectDiscussion) }}">
                                            View
                                            </a>
                                            @endcan
                                            @can('manage discussion')
                                            <form action="{{ route('project-discussion.destroy', $projectDiscussion) }}"
                                            method="post" class="d-inline-block py-0">
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
