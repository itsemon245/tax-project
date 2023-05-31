@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Service', 'Sub-Category', "Create"]" />

    <x-backend.ui.section-card name="Service Sub Category">

        {{-- Select category option --}}
        <form action="#" method="POST">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-1">
                                        @csrf
                                        <label for="category" class="form-label">Select Service Category</label>
                                        <select name="category_id" class="form-select"
                                            id="category
                                        @error('category_id')
                                        is-invalid
                                        @enderror
                                        ">
                                            <option selected disabled>Select</option>
                                            {{-- @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach --}}
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- end col -->
                                {{-- Add sub-category --}}
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
                                <div class="mt-1"><button class="btn btn-primary w-100 btn-sm profile-button"
                                        type="submit">Add Service Sub-Category</button>
                                </div>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div>
            </div>
        </form>
        {{-- Show all categories table --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">All Service Sub-Categories</h4>
                        <x-backend.table.basic>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sub-Category</th>
                                    <th>Category</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Lorem.</td>
                                        <td>Lorem, ipsum.</td>
                                        <td>04:44 PM</td>
                                    </tr>
                                    <tr>
                                        <td colspan="100%"><span>No data found.</span></td>
                                    </tr>
                            </tbody>
                        </x-backend.table.basic>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>

    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
