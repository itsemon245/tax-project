@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Service', 'Custom', 'List']" />

    <x-backend.ui.section-card name="View Custom Services">
        <x-backend.table.basic :items="$services">
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Details</td>
                    <td>Page Name</td>
                    <td>Image</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $key => $service)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <h5>Title: {{ $service->title }}</h5>
                            <div>Description: </div>
                            <div>{{ $service->description }}</div>
                        </td>
                        <td>
                            <span
                                class="badge bg-soft-success text-success font-13 text-capitalize">{{ $service->page_name }}</span>
                        </td>
                        <td>
                            <img width="150" height="150" style="object-fit: cover;" src="{{ $service->image->url }}"
                                alt="{{ str($service->title)->slug }}">
                        </td>
                        <td>
                            <x-backend.ui.button type="edit" :href="route('custom-service.edit', $service)" class="btn-sm"></x-backend.ui.button>
                            <x-backend.ui.button type="delete" :action="route('custom-service.destroy', $service)" class="btn-sm"></x-backend.ui.button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-backend.table.basic>

    </x-backend.ui.section-card>
    <!-- end row-->
@endsection
