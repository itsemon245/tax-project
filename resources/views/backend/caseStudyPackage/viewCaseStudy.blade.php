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
        <x-backend.ui.button type="custom" href="{{ route('case.study.package.backend.index') }}"
            class="mb-3 btn-sm btn-success">Create</x-backend.ui.button>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <x-backend.table.basic :data="$CaseStudyPackages">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Package</th>
                                    <th>Title</th>
                                    <th>Duration</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($CaseStudyPackages as $key => $CaseStudyPackage)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $CaseStudyPackage->name }}</td>
                                        <td>{{ $CaseStudyPackage->limit }}</td>
                                        <td>{{ $CaseStudyPackage->price }}</td>
                                        <td>{{ $CaseStudyPackage->billing_type }}</td>
                                        <td>
                                            <a href="{{ route('case.study.package.backend.edit', $CaseStudyPackage->id) }}"
                                                class="btn btn-info btn-sm">Edit</a>

                                            <form
                                                action="{{ route('case.study.package.backend.delete', $CaseStudyPackage->id) }}"
                                                method="post" class="d-inline-block py-0">
                                                @csrf
                                                @method('DELETE')
                                                <x-backend.ui.button
                                                    class="btn-danger btn-sm text-capitalize">Delete</x-backend.ui.button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </x-backend.table.basic>
                        <div class="paginate  md-md-0 mt-3 mt-md-0 me-4 me-md-0">
                            {{ $CaseStudyPackages->links() }}
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
