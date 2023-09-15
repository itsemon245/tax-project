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
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Case Study', 'List']" />
    <x-backend.ui.section-card name="Case Study List">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <x-backend.table.basic :data="$data">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Chalan Name</th>
                                    <th>Date</th>
                                    <th>Ammount</th>
                                    @canany(['manage chalan', 'read chalan'])
                                    <th>Action</th> 
                                    @endcanany
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $key => $chalan)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $chalan->chalan_title }}</td>
                                        <td>{{ $chalan->date }}</td>
                                        <td>{{ $chalan->total_ammount }}</td>
                                        @canany(['manage chalan', 'read chalan'])
                                        <td>

                                            @can('read chalan')
                                            <a href="{{ route('chalan.show', $chalan->id) }}"
                                                class="btn btn-warning btn-sm">Show</a>
                                            @endcan

                                            @can('manage chalan')
                                            <a href="{{ route('chalan.edit', $chalan->id) }}"
                                                class="btn btn-info btn-sm">Copy</a>



                                            <form action="{{ route('case-study.destroy', $chalan->id) }}" method="post"
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
