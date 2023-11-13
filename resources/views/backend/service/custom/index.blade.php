
@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Service', 'Custom', 'List']" />

    <x-backend.ui.section-card name="View Custom Services">
        <x-backend.table.basic :items="$services">

        </x-backend.table.basic>

    </x-backend.ui.section-card>
    <!-- end row-->
@endsection
