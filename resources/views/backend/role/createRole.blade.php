@extends('backend.layouts.app')

@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Role', 'Create']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="Create Role">
        <form action="{{ route('role.store') }}" method="post">
            @csrf
            <div class="container">
                <x-backend.form.text-input label="Title" type="text" name="title" />
                <div class="row">
                    <x-form.check-box name="permission" label="permission name" checked="true"/>
                </div>

            </div>
        </form>
    </x-backend.ui.section-card>
    @push('customJs')
        
    @endpush
@endsection
