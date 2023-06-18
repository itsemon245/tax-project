@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Video', 'View']" />

    <x-backend.ui.section-card name="Video List">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <x-backend.table.basic>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Video</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($videos as $key => $video)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>
                                            <video width="320" height="240" controls>
                                                <source src="{{ $video->video }}" type="video/mp4">
                                            </video>
                                        </td>
                                        <td>
                                            {{ Str::limit($video->title, 20, '...') }}
                                            <br>
                                            <span class="text-muted" title="Status">Status: {!! $video->status
                                                ? "<span class='badge bg-success'>Active</span>"
                                                : "<span class='badge bg-danger'>Deactive</span>" !!}</span>
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
