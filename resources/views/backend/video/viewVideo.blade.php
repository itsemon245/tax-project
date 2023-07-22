@extends('backend.layouts.app')

@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Video', 'View']" />

    <x-backend.ui.section-card name="Video List">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <x-backend.ui.button type="custom" :href="route('video.create') . '?course_id=' . $course->id" class="btn-success btn-sm mb-2"><span
                                class="fw-bold fs-5 me-1">+</span>New Video</x-backend.ui.button>

                        <x-backend.table.basic>
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
                                            <div class="d-flex align-items-start gap-1">
                                                <span class="mdi mdi-television-play"></span>
                                                <div class="p-1">
                                                    <p class="fw-medium mb-0">
                                                        {{ str($video->title)->title() }}
                                                    </p>
                                                    <span class="text-muted">Section: {{ $video->section }}</span>
                                                </div>
                                            </div>


                                        </td>
                                        <td>{!! Str::limit($video->description, 100, '...') !!}</td>
                                        <td>
                                            <a href="{{ route('video.edit', $video->id) }}"
                                                class="btn btn-info btn-sm">Edit</a>
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
