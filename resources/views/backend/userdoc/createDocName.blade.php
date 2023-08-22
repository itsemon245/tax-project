@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['User Data', 'Document', 'Create Name']" />

    <x-backend.ui.section-card name="Create Document Name">

        <x-btn-back></x-btn-back>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-4">
                    <form action="{{ route('userDoc.backend.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <x-backend.form.text-input label="New Name" placeholder="Document Name" name="name" />
                        <button class="btn btn-primary btn-sm rounded-3 w-100">Submit</button>
                    </form>
                </div>
                <div class="col-md-8">
                    <table class="table table-striped w-100">
                        <thead class="bg-light">
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Created By</th>
                                <th>Creatd at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($userDocs as $key => $doc)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $doc->name }}</td>
                                    <td>{{ $doc->user->id === auth()->id() ? 'Created By You' : 'Created By ' . $doc->user->name }}
                                    </td>
                                    <td>
                                        {{ $doc->created_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        @if (!$doc->user->hasRole('user') && !$doc->user->hasRole('partner'))
                                            <x-backend.ui.button type="delete"
                                                action="{{ route('userDoc.backend.destroy', $doc->id) }}" class="btn-sm" />
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No names yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
