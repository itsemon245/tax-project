@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Service', 'Custom', 'Create']" />

    <x-backend.ui.section-card name="Create Custom Service">

        <form action="{{ route('custom-service.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mt-3">
                    <x-backend.form.image-input name="image" />
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <x-backend.form.text-input label="Link" name="link" placeholder="https://" required />
                        </div>
                        <div class="col-md-6">
                            <x-backend.form.select-input id="page_name" label="Page Name" name="page_name"
                                placeholder="Choose page name...">
                                @foreach ($pageNames as $name)
                                    <option value="{{ $name }}">{{ $name }}</option>
                                @endforeach
                            </x-backend.form.select-input>
                        </div>
                    </div>

                    <x-backend.form.text-input label="Title" type="text" required name="title" />
                    <x-form.text-area id="desc" name="description" id="description" label="Description"
                        placeholder="Description"></x-form.text-area>
                    <x-backend.ui.button class="btn-primary mt-2">Create</x-backend.ui.button>

                </div>
            </div>
        </form>
    </x-backend.ui.section-card>
    <!-- end row-->
@endsection
