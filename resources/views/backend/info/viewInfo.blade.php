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
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Info', 'View Info']" />
                </div>
                <h4 class="page-title">View Info</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <x-backend.ui.section-card name="Hero List">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <x-backend.table.basic :data="$infos">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Info Image</th>
                                    <th>Title</th>
                                    <th>Section</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($infos as $key => $info)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td><img src="{{ useImage($info->image_url) }}" alt="{{ $info->title }}"
                                                width="80px" loading="lazy"></td>
                                        <td>{{ Str::limit($info->title, 20, '...') }}</td>
                                        <td>{{ $info->section_id === 1 ? 'Section 1' : 'Section 2' }}</td>
                                        <td>{!! Str::limit($info->description, 80, '...') !!}</td>
                                        <td>
                                            {!! $info->status === 1
                                                ? "<span class='badge bg-success'>Active</span>"
                                                : "<span class='badge bg-danger'>Deactive</span>" !!}
                                        </td>
                                        <td>
                                            <a href="{{ Route('info.edit', $info) }}"
                                                class="btn btn-blue btn-sm waves-effect waves-light">Edit</a>
                                            <button onclick='deleteinfo("infoDelete-{{ $info->id }}")'
                                                class="btn btn-danger btn-sm waves-effect waves-light">Delete</button>
                                            <form class="d-none" id="infoDelete-{{ $info->id }}"
                                                action="{{ Route('info.destroy', $info) }}" method="post">
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
@endsection

@push('customJs')
    <script>
        const deleteinfo = id => {
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
