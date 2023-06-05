

@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Service', 'Sub Category', 'Edit']" />

    <x-backend.ui.section-card name="Create Sub Category">

            <form action="{{ route('service-subcategory.update', $subCategory->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <x-backend.form.image-input name="image" image="{{$subCategory->image}}" />
                                    </div>
                                    <div class="col-md-6">
                                        <x-backend.form.text-input class="mb-2" name="name" placeholder="Sub Category" label="Sub Category Name" value="{{$subCategory->name}}" required/>
                                        <x-backend.form.select-input class="mb-2" name="service_category_id" placeholder="Category Name" label="Category Name" required>
                                            @foreach (getRecords('service_sub_categories') as $item)
                                                <option value="{{$item->id}}" @if ($item->id===$subCategory->service_category_id)
                                                    selected
                                                @endif>{{$item->name}}</option>
                                            @endforeach
                                        </x-backend.form.select-input>
                                        <x-form.ck-editor id="ck-editor" name="description" placeholder="Sub Category Description">
                                            {!! $subCategory->description!!}
                                        </x-form.ck-editor>
                                        <x-backend.ui.button class="btn-primary mt-2 text-capitalize w-100">Update</x-backend.ui.button>
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