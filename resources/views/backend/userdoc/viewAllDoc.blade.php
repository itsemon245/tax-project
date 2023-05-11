@extends('backend.layouts.app')

@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'User-Documents', 'Show']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="User Documents">
        <div class="col-md-12">
            <x-backend.table.basic>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Title</th>
                        <th>Images</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            
                <tbody>
                    @forelse ($upload_documents as $key => $document)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $document->user->user_name }}</td>
                            <td>{{ $document->title }}</td>
                            <td>
                                @if ($document_images > 0)
                                    @forelse ($document_images as $image)
                                    <img src="{{ $image }}">
                                    @empty
                                     <h5>No Data Found...</h5>   
                                    @endforelse
                                @else
                                <img src="{{ $document_images[0] }}">
                                @endif
                            </td>
                            <td>
                                <x-backend.ui.button class="btn-primary btn-sm">Edit</x-backend.ui.button>
                            </td>
                            <td>
                                <div class="button-group">

                                    <x-backend.ui.button type="edit" href="#" class="btn-sm" >Edit</x-backend.ui.button>
                                    <x-backend.ui.button type="delete" action="#" class="btn-sm">Delete</x-backend.ui.button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                    {{-- {{ dd(json_decode($upload_documents[0]->images)) }} --}}
                </tbody>
            </x-backend.table.basic>
            
        </div>
    </x-backend.ui.section-card>
    @push('customJs')
        <script></script>
    @endpush
@endsection
