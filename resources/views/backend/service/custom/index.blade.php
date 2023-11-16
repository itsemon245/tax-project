@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Service', 'Custom', 'List']" />

    <x-backend.ui.section-card name="View Custom Services">
        <x-backend.table.basic :items="$services">
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Details</td>
                    <td>Image</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $key => $service)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>Title</td>
                        <td>
                        </td>
                        <td>Actions</td>
                    </tr>
                @endforeach
            </tbody>
        </x-backend.table.basic>

    </x-backend.ui.section-card>
    <!-- end row-->
@endsection
