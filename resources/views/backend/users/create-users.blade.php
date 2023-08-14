@extends('backend.layouts.app')

@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'User', 'Create']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="Create User">
        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mt-3">
                    <x-backend.form.image-input name="user_image" />
                </div>

                <div class="col-md-6">
                    <x-backend.form.text-input label="Name" type="text" name="name" required />

                    <x-backend.form.text-input label="User Name" type="text" name="user_name" required />

                    <x-backend.form.text-input label="Email" type="email" name="email" required />

                    <x-backend.form.text-input label="Phone" type="phone" name="phone" required />

                    <x-backend.form.text-input label="Password" type="password" name="password" required />

                    <x-backend.form.text-input label="Confirm Password" type="password" name="confirm_password" required />

                    <x-backend.form.text-input label="Admin Referance" type="text" name="admin_ref" required />

                    <x-backend.form.select-input label="Role" name="role_id" required placeholder="Select Role">
                        @foreach ($roles as $role)
                            <option id="{{ $role->id }}">{{$role->name}}</option>
                        @endforeach
                    </x-backend.form.select-input>

                    <x-backend.ui.button type="submit" class="btn-primary mt-2">Create</x-backend.ui.button>

                </div>
            </div>
        </form>
    </x-backend.ui.section-card>
@endsection
