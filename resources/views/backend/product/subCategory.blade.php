@extends('backend.layouts.app')
@section('content')
{{-- Select category option --}}
<div class="row">
    <div class="col-6 mt-2">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                            <div class="mb-1">
                                <form action="{{ route('product-subcategory.store') }}" method="POST">
                                    @csrf
                                <label for="category" class="form-label">Select Category</label>
                                <select name="category_id" class="form-select" id="category
                                @error('category_id')
                                is-invalid
                                @enderror
                                ">
                                    <option selected disabled >Select</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                    </div> <!-- end col -->
                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div>
{{-- Add sub-category --}}
<div class="col-6 mt-2">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                        <div>
                            <input type="text" id="simpleinput" name="sub_category" placeholder="Type Sub-Category" class="form-control
                            @error('sub_category')
                            is-invalid
                            @enderror
                            ">
                            @error('sub_category')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-1"><button class="btn btn-primary w-100 btn-sm profile-button" type="submit">Add Sub-Category</button>
                        </div>
                    </form>
                </div> <!-- end col -->
            </div>
        </div> <!-- end card-body -->
    </div> <!-- end card -->
</div>
</div>
{{-- Show all categories table --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">All Sub-Categories</h4>
                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Sub-Category</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{ dd(count($sub_categories)) }} --}}
                        @forelse ($sub_categories as $key => $sub_category)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $sub_category->name }}</td>
                            <td>{{ $sub_category->product_category->name }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-blue btn-sm waves-effect waves-light">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                                </div>
                            </td>
                        </tr> 
                        @empty
                            <tr>
                                <td colspan = "100%"><span>No data found.</span></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
@endsection
