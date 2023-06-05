@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Service', 'View All']" />

    <x-backend.ui.section-card name="View All Services">

        
    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
