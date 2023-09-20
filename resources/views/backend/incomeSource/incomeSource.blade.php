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
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Footer', 'Social-Media']" />

    <x-backend.ui.section-card name="All Income Sources">

        {{-- Social media handle option --}}
        <form action="{{ route('income-source.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <x-backend.form.text-input type="text" id="title" label="Title" name="title"
                                        placeholder="Select Title" required />
                                </div> <!-- end col -->
                                <div class="col-md-12">
                                    <x-backend.form.text-input type="file" label="Image" name="image" required />
                                </div>
                                {{-- social media link  --}}
                                <div class="mt-3"><button class="btn btn-primary w-100 btn-sm profile-button"
                                        type="submit">Add Income Source</button>
                                </div>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div>
        </form>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">All Income Sources</h4>
                    <x-backend.table.basic :items="$data">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $key => $item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td><img loading="lazy" src="{{ useImage($item->image) }}" alt="{{ $item->title }}" width="80px">
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <x-backend.ui.button type="edit"
                                                href="{{ route('income-source.edit', $item) }}" class="btn-sm" />
                                            <form action="{{ route('income-source.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <x-backend.ui.button class="text-capitalize btn-sm btn-danger">Delete
                                                </x-backend.ui.button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%" class="text-center"><span>No data found.</span></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </x-backend.table.basic>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
        </div>






        {{-- Show all categories table --}}
        <div class="row">

        </div>

    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
