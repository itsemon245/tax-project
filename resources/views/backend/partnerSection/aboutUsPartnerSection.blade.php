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
    <x-backend.ui.breadcrumbs :list="['Homepage', 'About us', 'Partner Section']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="Partner Section">
        <div class="row">
            @can('manage partner')
            <div class="col-md-6">
                <div class="row">
                        <form action="{{ route('partner-section.store') }}" class="d-none" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="col-md-6">
                            <x-backend.form.image-input class="mt-1 border rounded" name="image" />
                        </div>
                        <div class="col-md-6">
                            <x-backend.form.text-input label="Name" type="text" class="mb-2" name="name"
                                required />
                            <x-backend.form.text-input label="Email" class="mb-2" type="email" name="email" />
                            <x-backend.form.text-input label="Designation" class="mb-2" type="text"
                                name="designation" />
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <x-backend.form.text-input label="Phone" class="mb-2" type="text" name="phone" />
                        </div>
                        <div class="col-md-6">
                            <x-backend.form.text-input label="Facebook" class="mb-2" type="text" name="facebook"
                                placeholder="https://" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <x-backend.form.text-input label="Twitter" class="mb-2" type="text" name="twitter"
                                placeholder="https://" />
                        </div>
                        <div class="col-md-6">
                            <x-backend.form.text-input label="Linkedin" class="mb-2" type="text" name="linkedin"
                                placeholder="https://" />
                        </div>
                    </div>

                    <x-backend.ui.button class="btn-primary w-100 btn-sm mt-1">Create</x-backend.ui.button>
                </form>
            </div>
            @endcan
        <div class="col-md-6 mt-3">
            <x-backend.table.basic :data="$partnerSection">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Details</th>
                        @can('manage partner')
                        <th>Action</th>
                        @endcan
                    </tr>
                </thead>

                <tbody>
                    @foreach ($partnerSection as $key => $item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>
                                <div class="d-flex gap-3">
                                    <img src="{{ useImage($item->image) }}" alt="{{ $item->name }}" width="64px"
                                        height="64px" class="rounded-circle " style="object-fit: cover;">
                                    <div>
                                        <div class="font-16 fw-bold">{{ $item->name }}</div>
                                        <div class="fw-medium">{{ $item->designation }}</div>
                                        <div> <span class="mdi mdi-phone font-16"></span> {{ $item->phone }}</div>
                                        <div> <span class="mdi mdi-facebook font-16"></span> {{ $item->facebook }}</div>
                                        <div> <span class="mdi mdi-twitter font-16"></span> {{ $item->twitter }}</div>
                                        <div> <span class="mdi mdi-linkedin font-16"></span> {{ $item->linkedin }}</div>
                                    </div>
                                </div>
                            </td>
                            @can('manage partner')
                            <td>
                                <form action="{{ route('partner-section.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <x-backend.ui.button class="btn-danger btn-sm">Delete</x-backend.ui.button>
                                </form>
                            </td>
                            @endcan

                        </tr>
                    @endforeach
                </tbody>
            </x-backend.table.basic>
        </div>
        </div>
    </x-backend.ui.section-card>
    @push('customJs')
        <script></script>
    @endpush
@endsection
