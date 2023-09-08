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
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'About us', 'page', 'Partner Section']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="Partner Section">
        <form action="{{ route('partner-section.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <x-backend.form.text-input label="Name" type="text" class="mb-2" name="name" required />
                    <div class="row">
                        <div class="col-md-6">
                            <x-backend.form.text-input label="Designation" class="mb-2" type="text" name="designation"
                                required />
                        </div>
                        <div class="col-md-6">
                            <x-backend.form.text-input label="Email" class="mb-2" type="email" name="email"
                                required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <x-backend.form.text-input label="Phone" class="mb-2" type="text" name="phone"
                                required />
                        </div>
                        <div class="col-md-6">
                            <x-backend.form.text-input label="Facebook" class="mb-2" type="text" name="facebook"
                                required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <x-backend.form.text-input label="Twitter" class="mb-2" type="text" name="twitter"
                                required />
                        </div>
                        <div class="col-md-6">
                            <x-backend.form.text-input label="Linkedin" class="mb-2" type="text" name="linkedin"
                                required />
                        </div>
                    </div>
                    <x-backend.form.image-input class="mt-1 border rounded" name="image" />
                    <x-backend.ui.button class="btn-primary w-100 btn-sm mt-1">Create</x-backend.ui.button>
        </form>
        </div>
        <div class="col-md-6 mt-3">
            <x-backend.table.basic>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($partnerSection as $key => $item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <form action="{{ route('partner-section.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <x-backend.ui.button class="btn-danger btn-sm">Delete</x-backend.ui.button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-backend.table.basic>
            <div class="paginate  md-md-0 mt-3 mt-md-0 me-4 me-md-0">
                {{ $partnerSection->links() }}
            </div>
        </div>
        </div>
    </x-backend.ui.section-card>
    @push('customJs')
        <script></script>
    @endpush
@endsection
