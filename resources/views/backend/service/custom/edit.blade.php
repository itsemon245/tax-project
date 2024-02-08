@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Service', 'Custom', 'Edit']" />

    <x-backend.ui.section-card name="Edit Custom Service">

        <form action="{{ route('custom-service.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mt-3">
                    <x-backend.form.image-input :image="$service->image->url" name="image" />
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <x-backend.form.text-input :value="$service->link" label="Link" name="link"
                                placeholder="https://" required />
                        </div>
                        <div class="col-md-6">
                            <x-backend.form.select-input id="page_name" label="Page Name" name="page_name"
                                placeholder="Choose page name...">
                                @foreach ($pageNames as $name)
                                    <option value="{{ $name }}" @selected(str($service->page_name)->trim() === str($name->value))>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </x-backend.form.select-input>
                        </div>
                    </div>

                    <x-backend.form.text-input label="Title" type="text" required name="title" :value="$service->title" />

                    <div class="mt-1">
                        <x-form.text-area id="desc" name="description" id="description" label="Description"
                            placeholder="Description">{{ $service->description }}</x-form.text-area>
                    </div>
                    <x-backend.ui.button class="btn-primary mt-2">Update</x-backend.ui.button>
                </div>
            </div>
        </form>
    </x-backend.ui.section-card>
    <!-- end row-->
@endsection
