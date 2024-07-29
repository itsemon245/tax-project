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
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Review']" />
    <x-backend.ui.section-card name="All Review">
        @can('manage reviews')
        <x-backend.ui.button type="custom" href="{{ route('backend.review.create') }}" class="btn-success btn-sm mb-2"><span
            class="fw-bold fs-5 me-1">+</span>Create Review</x-backend.ui.button>
        @endcan
        <div class="table-responsive">
            <x-backend.table.basic :items="$reviews">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Author</th>
                        <th>Type</th>
                        <th>Review</th>
                        @canany(['manage reviews', 'read reviews'])
                        <th>Action</th>   
                        @endcanany
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reviews as $key=>$review)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $review->name }}</td>
                            <td>{{ $review->reviewable_type }}</td>
                            <td>{!! Str::limit($review->comment, 20, '...') !!}</td>
                            @canany(['manage reviews', 'read reviews'])
                            <td>
                                <div class="btn-group">
                                    @can('read reviews')
                                    <a href="{{ route('backend.review.show', $review->id) }}" class="btn btn-sm btn-success">View</a>
                                    @endcan
                                    @can('manage reviews')
                                    <form action="{{ route('backend.review.destroy', $review) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <x-backend.ui.button
                                        class="btn-danger btn-sm text-capitalize">Delete</x-backend.ui.button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                            @endcanany
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <h5 class="d-flex justify-content-center text-muted">No record found</h5>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </x-backend.table.basic>
        </div>
    </x-backend.ui.section-card>
@endsection
