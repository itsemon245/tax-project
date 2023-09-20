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
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    @isset($bookCategory)
                        <div class="card-header text-center bg-white fw-bold">Update Category</div>
                        <div class="card-body">
                            <form action="{{ route('book-category.update', $bookCategory->id) }}" method="post">
                                @csrf
                                @method('PATCH')

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <x-backend.form.text-input label="Category Name" placeholder="Category Name"
                                                    type="text" name="category_name" :value="$bookCategory->name" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <x-backend.ui.button class="btn-primary btn btn-sm">Update</x-backend.ui.button>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="card-header text-center bg-white fw-bold">Create Category</div>
                        <div class="card-body">
                            <form action="{{ route('book-category.store') }}" method="post">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <x-backend.form.text-input label="Category Name" placeholder="Category Name"
                                                    type="text" name="category_name" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <x-backend.ui.button class="btn-primary btn btn-sm">Create</x-backend.ui.button>
                                </div>
                            </form>
                        </div>
                    @endisset
                </div>
            </div>
            <div class="col-md-7">
                <x-backend.table.basic :items="$data">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $key=>$bookCategory)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ str($bookCategory->name)->headline() }}</td>
                                <td>


                                    <x-backend.ui.button type="edit" :href="route('book-category.edit', $bookCategory)"
                                        class="btn-sm"></x-backend.ui.button>
                                    <x-backend.ui.button type="delete" :action="route('book-category.destroy', $bookCategory)" class="btn-sm" />

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
            </div>
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
