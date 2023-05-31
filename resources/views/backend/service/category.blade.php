@extends('backend.layouts.app')


@section('content')
  <x-backend.ui.breadcrumbs :list="['Frontend', 'Service', 'Category', 'Create']" />

  <x-backend.ui.section-card name="Service Category">

{{-- add category field --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-1">Add Service Category</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('product-category.store') }}" method="POST">
                            @csrf
                            <div>
                                <input type="text" id="simpleinput" name="service_category" placeholder="Input Service Category" class="form-control
                                @error('service_category')
                                is-invalid
                                @enderror
                                ">
                                @error('service_category')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-1"><button class="btn btn-primary w-100 btn-sm profile-button" type="submit">Add Service Category</button>
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
                <h4 class="header-title">All Service Categories</h4>
                <x-backend.table.basic>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Lorem, ipsum dolor.</td>
                            <td>54:00 AM</td>
                        </tr> 
                        <td valign="top" colspan="3" class="dataTables_empty">No data available in table</td>
                    </tbody>
                </x-backend.table.basic>
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