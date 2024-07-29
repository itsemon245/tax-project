

@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Service', 'Sub Category', 'Create']" />

    <x-backend.ui.section-card name="Create Sub Category">

            <form action="{{ route('service-subcategory.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="service_category_id" value="{{$categoryId}}" hidden />
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <x-backend.form.image-input name="image" />
                                    </div>
                                    <div class="col-md-6">
                                        <x-backend.form.text-input class="mb-2" name="name" placeholder="Sub Category" label="Sub Category Name" required/>
                                        <x-form.ck-editor id="ck-editor" name="description" placeholder="Sub Category Description"></x-form.ck-editor>
                                        <x-backend.ui.button class="btn-primary mt-2 text-capitalize w-100">Create</x-backend.ui.button>
                                    </div>
                                </div>
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div>
                </div>
            </form>
    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection