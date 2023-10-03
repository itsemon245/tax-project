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
    <x-backend.ui.section-card name="Info List">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <x-backend.table.basic :items="$infos">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Info Image</th>
                                    <th>Title</th>
                                    <th>Section</th>
                                    <th>Description</th>
                                    @can('manage info section')
                                    <th>Action</th>
                                    @endcan
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($infos as $key => $info)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td><img loading="lazy" src="{{ useImage($info->image_url) }}" alt="{{ $info->title }}"
                                                width="80px" loading="lazy"></td>
                                        <td>{{ Str::limit($info->title, 20, '...') }}</td>
                                        <td>{{ $info->section_id === 1 ? 'Section 1' : 'Section 2' }}</td>
                                        <td>{!! Str::limit($info->description, 40, '...') !!}</td>
                                        @can('manage info section')
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
@endsection


