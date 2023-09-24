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
    <x-backend.ui.breadcrumbs :list="['Backend', 'Expert Profiles', 'View']" />

    <x-backend.ui.section-card name="Expert List">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <x-backend.table.basic :items="$profiles">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Profile Details</th>
                                    <th>Profile Descriptions</th>
                                    <th>Image</th>
                                    @canany(['update expert', 'delete expert'])
                                    <th>Action</th>
                                    @endcanany
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($profiles as $key => $profile)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>
                                            <span><b>Name:
                                                    {{ $profile->name }}</b></span><br>
                                            <span class="text-muted">Post: {{ $profile->post }}</span><br>
                                            <span class="text-muted">Join Date:
                                                {{ $profile->join_date }}</span><br>
                                            <span class="text-muted">Experience:
                                                {{ $profile->experience }} Years</span><br>
                                            <span class="text-muted">Availability:
                                                {{ $profile->availability }}</span><br>
                                        </td>
                                        <td>
                                            <span class="text-muted">Bio: {!! Str::limit($profile->bio, 100, '...') !!}</span><br>
                                            <span class="text-muted">Description: {!! Str::limit($profile->description, 100, '...') !!}</span><br>
                                            <span class="text-muted">At a Glance: {!! $profile->at_a_glance !!}</span>
                                        </td>
                                        <td>
                                            <img loading="lazy" src="{{ useImage($profile->image) }}" alt="image" width="80px"
                                                loading="lazy" class="mb-2" />
                                        </td>
                                        @canany(['update expert', 'delete expert'])
                                        <td>
                                            @can('update expert')
                                            <a href="{{ route('expert-profile.edit', $profile->id) }}"
                                                class="btn btn-info btn-sm">Edit</a>
                                            @endcan
                                            @can('delete expert')
                                            <button onclick='deleteProfile("profileDelete-{{ $profile->id }}")'
                                                class="btn btn-danger btn-sm waves-effect waves-light">Delete</button>
                                            <form class="d-none" id="profileDelete-{{ $profile->id }}"
                                                action="{{ Route('expert-profile.destroy', $profile->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            @endcan
                                        </td>
                                        @endcanany
                                    </tr>
                                @endforeach
                            </tbody>
                        </x-backend.table.basic>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </x-backend.ui.section-card>

    <!-- end row-->

    @push('customJs')
        <script>
            const deleteProfile = id => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Deleted',
                            text: "Your file has been deleted.",
                            icon: 'success',
                            showConfirmButton: false
                        })
                        $("#" + id).submit()
                    }
                })
            }
        </script>
    @endpush
@endsection
