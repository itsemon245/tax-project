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
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Frontend', 'Achievement']" />

    <x-backend.ui.section-card name="Industries">
        <x-backend.ui.button type="custom" href="{{ route('achievements.create') }}"
            class="mb-3 btn-sm btn-success">Create</x-backend.ui.button>
        <x-backend.table.basic>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Total Achievements</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $key=>$item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td><img src="{{ useImage($item->image) }}" alt="" width="80px"></td>
                        <td>{{ $item->total_user }}</td>
                        <td>{{ $item->user }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('achievements.edit', $item) }}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('achievements.destroy', $item) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <x-backend.ui.button class="btn-danger btn-sm text-capitalize">Delete
                                    </x-backend.ui.button>
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
        <div class="paginate md-md-0 mt-3 mt-md-0 me-4 me-md-0">
            {{ $banners->links() }}
        </div>
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
