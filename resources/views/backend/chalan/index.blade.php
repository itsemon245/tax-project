@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Management', 'Chalan', 'List']" />

    <x-backend.ui.section-card name="List Chalan">

        <x-backend.form.text-input type="text" name="text_input" class="dotted-border" required />
    </x-backend.ui.section-card>
    <!-- end row-->
@endsection
