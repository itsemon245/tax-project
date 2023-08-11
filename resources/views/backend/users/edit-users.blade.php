@extends('backend.layouts.app')

@section('content')
    <!-- start page title -->
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'User', 'Create']" />
    <!-- end page title -->

    <x-backend.ui.section-card name="Create User">
        <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mt-3">
                    <x-backend.form.image-input name="user_image" :image="$user->image_url" />
                </div>

                <div class="col-md-6">
                    <x-backend.form.text-input label="Name" type="text" name="name" required value="{{$user->name}}"/>

                    <x-backend.form.text-input label="User Name" type="text" name="user_name" required value="{{$user->user_name}}"/>

                    <x-backend.form.text-input label="Email" type="email" name="email" required value="{{$user->email}}"/>

                    <x-backend.form.text-input label="Phone" type="phone" name="phone" required value="{{$user->phone}}"/>

                    <x-backend.form.text-input label="Password" type="password" name="password" />

                    <x-backend.form.text-input label="Confirm Password" type="password" name="confirm_password"  />

                    <x-backend.form.text-input label="Admin Referance" type="text" name="admin_ref" required value="{{$user->name}}"/>

                    <x-backend.form.select-input label="Role" name="role_id" required placeholder="Select Role">
                        @foreach ($roles as $role)
                            <option id="{{ $role->id }}"  {{$role->id == $userRole->roles[0]->id ? 'selected' : ''}}>{{$role->name}}</option>
                        @endforeach
                    </x-backend.form.select-input>

                    <x-backend.ui.button type="submit" class="btn-primary mt-2">Update</x-backend.ui.button>

                </div>
            </div>
        </form>
    </x-backend.ui.section-card>
    
@endsection
