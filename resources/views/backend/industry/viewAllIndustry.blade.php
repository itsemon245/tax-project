@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Frontend', 'Industries Section']" />

    <x-backend.ui.section-card name="Industries">
        <div>
            <a href="{{ route('industry.create') }}" class="btn btn-sm btn-primary">(+) Create</a>
        </div>
        <form action="{{ route('info.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-backend.table.basic>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($Industries as $key=>$industry)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="btn-group">
                                <x-backend.ui.button type="edit" href="#" class="btn-sm" />
                                <x-backend.ui.button type="delete" action="#" class="btn-sm" />
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
        </form>
    </x-backend.ui.section-card>
    <!-- end row-->
@endsection

@push('customJs')
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
@endpush
