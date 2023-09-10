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
        <x-backend.ui.button type="custom" href="{{ route('case-study.create') }}"
            class="mb-3 btn-sm btn-success">Create</x-backend.ui.button>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <x-backend.table.basic :data="$data">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Package</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($data as $key => $CaseStudy)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $CaseStudy->caseStudyCategory->case_study_category ?? '' }}</td>
                                        <td>{{ $CaseStudy->caseStudyPackage->name }}</td>
                                        <td>{{ $CaseStudy->name }}</td>
                                        <td><img src="{{ useImage($CaseStudy->image) }}" alt="" width="80px" /></td>
                                        <td>{!! Str::limit($CaseStudy->description, 10, '...') !!}</td>
                                        <td>
                                            <a href="{{ route('case-study.edit', $CaseStudy->id) }}"
                                                class="btn btn-info btn-sm">Edit</a>

                                            <form action="{{ route('case-study.destroy', $CaseStudy->id) }}" method="post"
                                                class="d-inline-block py-0">
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
                            {{ $data->links() }}
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
