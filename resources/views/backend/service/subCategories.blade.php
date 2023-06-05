@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Service', 'Sub Categories']" />

    <x-backend.ui.section-card name="Service Sub Categories">

        {{-- Select category option --}}
        {{-- <form action="{{ route('service-subcategory.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-1">
                                        <label for="category" class="form-label">Select Service Category</label>
                                        <select name="category" class="form-select"
                                            id="category
                                        @error('category')
                                        is-invalid
                                        @enderror
                                        ">
                                            <option selected disabled>Select</option>
                                                <option value="Categoryon">Categoryone</option>
                                                <option value="Categorytwo">Categorytwo</option>
                                                <option value="Categorythree">Categorythree</option>
                                                <option value="Categoryfour">Categoryfour</option>
                                           
                                        </select>
                                        @error('category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-lg-6">
                                    <div>
                                        <label for="service_sub_category" class="form-label">Sub-Category</label>
                                        <input type="text" id="service_sub_category" name="service_sub_category"
                                            placeholder="Type Service Sub-Category"
                                            class="form-control
                                        @error('service_sub_category')
                                        is-invalid
                                        @enderror
                                        ">
                                        @error('service_sub_category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <x-backend.form.image-input class="mt-3" name="image" />
                                </div>
                                <div class="col-md-6">
                                    <x-form.ck-editor id="ck-editor" name="description"></x-form.ck-editor>
                                </div>
                                <div class="mt-1"><button class="btn btn-primary w-100 btn-sm profile-button"
                                        type="submit">Add Service Sub-Category</button>
                                </div>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div>
            </div>
        </form> --}}
        {{-- Show all categories table --}}
                <div class="card">
                    <div class="card-body">
                        <x-backend.table.basic>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sub Category</th>
                                    <th>Sub Category Actions</th>
                                    <th>Available Services</th>
                                    <th>Service Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subCategories as $key => $subCategory)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        <strong>{{ $subCategory->name }}</strong>
                                    </td>
                                    <td>
                                        <x-backend.ui.button type="edit" class="btn-primary text-capitalize" href="{{route('service-subcategory.edit', $subCategory->id)}}"></x-backend.ui.button>
                                        <x-backend.ui.button type="delete" class="btn-primary text-capitalize" action="{{route('service-subcategory.destroy', $subCategory->id)}}"></x-backend.ui.button>
                                    </td>
                                    <td>
                                       <span class="badge bg-primary text-capitalize" style="font-size: 15px;"> {{count($subCategory->services)}} services</span>
                                       
                                    </td>
                                    <td>
                                        <x-backend.ui.button type="custom" class="btn-success text-capitalize" href="{{route('service.create', $subCategory->id)}}">Create New</x-backend.ui.button>
                                        <x-backend.ui.button type="custom" class="btn-primary text-capitalize" href="{{route('service.index', $subCategory->id)}}">View All</x-backend.ui.button>
                                        
                                    </td>
                                </tr>  
                                @empty
                                <tr>
                                    <td colspan="4"><span>No data found.</span></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </x-backend.table.basic>
                    </div> <!-- end card body-->
                </div> <!-- end card -->

    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
