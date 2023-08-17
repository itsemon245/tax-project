@extends('backend.layouts.app')

@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Review']" />
    <x-backend.ui.section-card name="All Review">
        <x-backend.ui.button type="custom" :href="route('backend.review.create')" class="btn-success btn-sm mb-2"><span
                class="fw-bold fs-5 me-1">+</span>Create Review</x-backend.ui.button>
        <div class="table-responsive">
            <x-backend.table.basic>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th>Review</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{ dd($reviews) }} --}}
                    @forelse ($reviews as $key=>$review)
                    <tr>
                        {{-- {{ dd($review) }} --}}
                        <td>{{ ++$key }}</td>
                        <td>{!! Str::limit($review->user_id, 15, '...') !!}</td>
                        <td>{!! Str::limit($review->reviewable_type, 15, '...') !!}</td>
                        <td>{!! Str::limit($review->comment, 15, '...') !!}</td>
                        <td>
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-success">View</a>
                                <form action="{{ route('backend.review.destroy', $review) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <x-backend.ui.button class="btn-danger btn-sm text-capitalize">Delete</x-backend.ui.button>
                                </form>
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
        </div>

    </x-backend.ui.section-card>
@endsection
