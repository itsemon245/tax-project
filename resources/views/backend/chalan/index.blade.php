@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Management', 'Chalan', 'List']" />

    <x-backend.ui.section-card name="List Chalan">

        <x-backend.form.text-input type="text" name="text_input" class="dotted-border" required />
        <x-backend.form.box-input value="12548" name="box_input" />
    </x-backend.ui.section-card>
@endsection
