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
    <x-backend.ui.breadcrumbs :list="['Course', 'Video', 'View']" />

    <x-backend.ui.section-card name="Video List">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <x-backend.ui.button type="custom" :href="route('video.create') . '?course_id=' . $course->id" class="btn-success btn-sm mb-2"><span
                                class="fw-bold fs-5 me-1">+</span>New Video</x-backend.ui.button>

                        <x-backend.table.basic :data="$videos">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($videos as $key => $video)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>
                                            <a href="{{ route('video.show', $video->id) }}"
                                                class="d-flex align-items-start gap-1 text-reset">
                                                <span class="mdi mdi-television-play"></span>
                                                <div class="p-1">
                                                    <p class="fw-medium mb-0">
                                                        {{ str($video->title)->title() }}
                                                    </p>
                                                    <span class="text-muted">Section: {{ $video->section }}</span>
                                                </div>
                                            </a>


                                        </td>
                                        <td>{!! Str::limit($video->description, 100, '...') !!}</td>
                                        <td>
                                            <x-backend.ui.button type="custom" class="btn-sm btn-dark" :href="route('video.show', $video->id)">
                                                View</x-backend.ui.button>
                                            <x-backend.ui.button type="edit" class="btn-sm" :href="route('video.edit', $video->id)" />
                                            <button onclick='deleteVideo("videoDelete-{{ $video->id }}")'
                                                class="btn btn-danger btn-sm waves-effect waves-light">Delete</button>
                                            <form class="d-none" id="videoDelete-{{ $video->id }}"
                                                action="{{ Route('video.destroy', $video->id) }}" method="post">
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
            const deleteVideo = id => {
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
