@extends('backend.layouts.app')


@section('content')
  <x-backend.ui.breadcrumbs :list="['Frontend', 'Product', 'Category']" />

  <x-backend.ui.section-card name="Product Category">

{{-- add category field --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-1">Add Category</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('product-category.store') }}" method="POST">
                            @csrf
                            <div>
                                <input type="text" id="simpleinput" name="category" placeholder="Type Category" class="form-control
                                @error('category')
                                is-invalid
                                @enderror
                                ">
                                @error('category')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-1"><button class="btn btn-primary w-100 btn-sm profile-button" type="submit">Add Category</button>
                            </div>
                        </form>
                    </div> <!-- end col -->
                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div><!-- end col -->
</div>
{{-- Show all categories table --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">All Categories</h4>
                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $key => $category)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('product-category.edit', $category) }}" class="btn btn-blue btn-sm waves-effect waves-light">Edit</a>
                                    <a href="{{ route('product-category.destroy', $category) }}" class="btn btn-danger btn-sm waves-effect waves-light">Delete</a>
                                </div>
                            </td>
                        </tr> 
                        @empty
                        <td valign="top" colspan="3" class="dataTables_empty">No data available in table</td>
                        @endforelse
                    </tbody>
                </table>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
      
  </x-backend.ui.section-card>
  

  @push('customJs')
      <script>
          
      </script>
  @endpush
@endsection