@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Show All', 'Project']" />

    <x-backend.ui.section-card name="Projects">
        <div class="mb-2">
            <a href="{{ route('project.create') }}" class="btn btn-sm btn-primary">(+) Create</a>
        </div>
        <x-backend.table.basic>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Project Name</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $key=>$project)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{!! Str::limit($project->name, 15, '...') !!}</td>
                    <td>{{ \Carbon\Carbon::parse($project->start_date)->format('d-M-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($project->end_date)->format('d-M-Y') }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('project.edit', $project) }}" class="btn btn-sm btn-success">Edit</a>
                            <form action="{{ route('project.destroy', $project->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <x-backend.ui.button class="btn-danger btn-sm text-capitalize">Delete</x-backend.ui.button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <h5 class="d-flex justify-content-center text-muted">No record found</h5>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </x-backend.table.basic>
    </x-backend.ui.section-card>
    <!-- end row-->
@endsection

{{-- @push('customJs')
    <script>
        const getSectionTitle = (e) => {
            const section_id = e.value
            let url = "{{ route('getInfoSectionTitle', ':sectionId') }}"
            url = url.replace(':sectionId', section_id)

            $.ajax({
                type: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(title) {
                    $('input[name="title"]').val('')
                    $('input[name="old_title"]').val('')

                    $('input[name="title"]').val(title)
                    $('input[name="old_title"]').val(title)
                },
                error: function(error) {
                    $('input[name="title"]').val('')
                    $('input[name="old_title"]').val('')
                    console.log(error)
                }
            });
        }
    </script>
@endpush --}}
