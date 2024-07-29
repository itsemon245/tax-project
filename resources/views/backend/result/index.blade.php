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
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Frontend', 'Result']" />

    <x-backend.ui.section-card name="Show All Results">

        <x-backend.table.basic :items="$results">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Candidate</th>
                    <th>Exam Info.</th>
                    <th>Total Marks</th>
                    <th>Passing Marks</th>
                    <th>Right Answer</th>
                    <th>You Got</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($results as $key=>$item)
                    <tr
                        style="background-color: {{ $item->has_passed ? 'rgba(172, 255, 47, 0.200)' : 'rgba(255, 47, 64, 0.200)' }};">
                        <td>{{ ++$key }}</td>
                        <td>Name: {{ $item->user->name }} <p>User Name: {{ $item->user->user_name }}</p>
                        </td>
                        <td>{{ $item->exam->name }}</td>
                        <td>{{ $item->exam->total_marks }}</td>
                        <td>{{ $item->exam->passing_marks }}</td>
                        <td>{{ $item->right }}</td>
                        <td>{{ $item->obtained_marks }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
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
