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

    <x-backend.ui.section-card name="Achievements">
        @can('manage achievement')
        <x-backend.ui.button type="custom" href="{{ route('achievements.create') }}"
        class="mb-3 btn-sm btn-success">Create</x-backend.ui.button>
        @endcan
        <x-backend.table.basic :data="$data">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Total Achievements</th>
                    <th>Title</th>
                    @can('manage achievement')
                    <th>Action</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $key => $item)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td><img src="{{ useImage($item->image) }}" alt="" width="80px"></td>
                        <td>{{ $item->count }}</td>
                        <td>{{ $item->title }}</td>
                        @can('manage achievement')
                        <td>
                            <x-backend.ui.button type="edit" class="btn-sm" :href="route('achievements.edit', $item->id)" />
                            <x-backend.ui.button type="delete" class="btn-sm" :action="route('achievements.destroy', $item->id)" />
                        </td>
                        @endcan
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
