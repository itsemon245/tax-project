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
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Frontend', 'Industries Section']" />

    <x-backend.ui.section-card name="Industries">
        @can('manage industry')
        <div class="mb-2">
            <a href="{{ route('industry.create') }}" class="btn btn-sm btn-primary">(+) Create</a>
        </div>  
        @endcan
        <x-backend.table.basic :data="$industries">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Details</th>
                    <th>Description</th>
                    @canany(['manage industry', 'read industry'])
                    <th>Action</th>
                    @endcanany
                </tr>
            </thead>
            <tbody>
                @forelse ($industries as $key=>$industry)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <div class="d-flex mb-2">
                                <img style="width:48px;" src="{{ useImage($industry->image) }}" class="rounded"
                                    alt="" />
                                <h6 class="px-3">{{ $industry->title }}</h6>
                            </div>
                            <p class="tex-justify text-muted text-wrap" style="max-width: 30ch;">{!! Str::limit($industry->intro, 80, '...') !!}
                            </p>

                        </td>
                        <td>
                            <div class="text-wrap" style="max-width: 40ch;">
                                {!! str($industry->description)->limit(200, '<span class="text-danger fw-bold font-20">...</span>') !!}
                            </div>
                        </td>
                        <td>
                            @can('read industry')
                            <x-backend.ui.button type="custom" class="btn-sm btn-dark"
                            :href="route('industry.show', $industry->id)">View</x-backend.ui.button>
                            @endcan
                            @can('manage industry')
                            <x-backend.ui.button type="edit" class="btn-sm" :href="route('industry.edit', $industry->id)" />
                            <x-backend.ui.button type="delete" class="btn-sm" :action="route('industry.destroy', $industry->id)" />
                            @endcan

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
