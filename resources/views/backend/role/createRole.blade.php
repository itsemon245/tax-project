@extends('backend.layouts.app')

@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Role', 'Create']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="Create Role">
        <x-backend.ui.button type="custom" :href="route('role.index')" class="btn-secondary btn-sm mb-1">Back</x-backend.ui.button>
        <form class="" action="{{ route('role.store') }}" method="post">
            @csrf

            <div class="container">
                <x-backend.form.text-input label="Role" type="text" name="role" placeholder="Admin" />

                <h5 class="mt-2">Assign Permissions</h5>
                <div class="row">
                    @foreach ($permissions as $group => $permissions)
                        @foreach ($permissions as $permission)
                            <div class="col-lg-3 col-md-4 col-6 mb-1">
                                <x-form.check-box :id="$permission->id" name="permissions[]" label="{{ $permission->name }}"
                                    value="{{ $permission->name }}" />
                            </div>
                        @endforeach
                    @endforeach
                </div>
                <div class="d-flex mt-1">
                    <x-backend.ui.button class="btn-primary btn-sm">Submit</x-backend.ui.button>
                </div>

            </div>
        </form>
    </x-backend.ui.section-card>
    @push('customJs')
    @endpush
@endsection
