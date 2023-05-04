@extends('backend.layouts.app')


@section('content')
  <x-backend.ui.breadcrumbs :list="['Frontend', 'Product', 'Sub-Category', 'Edit']" />

  <x-backend.ui.section-card name="Edit Sub-Category">
    {{-- Select category option --}}
    <form action="{{ route('product-subcategory.store') }}" method="POST">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <x-backend.form.select-input id="category" label="Category" name="category"
                                >
                                @forelse ($categories as $category)
                                {{ dd($productSubCategory) }}
                                    <option @if ($productSubCategory->product_category_id == $category->id)
                                        selected
                                    @endif value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @empty
                                    <option disabled>No Records Found!</option>
                                @endforelse
                             </x-backend.form.select-input>
                            </div> <!-- end col -->
                        {{-- Add sub-category --}}
                            <div class="col-md-6">
                                    <div>
                                        <label for="sub_category" class="form-label">Sub-Category</label>
                                        <input type="text" id="sub_category" name="sub_category" placeholder="Type Sub-Category" class="form-control
                                        @error('sub_category')
                                        is-invalid
                                        @enderror
                                        ">
                                        @error('sub_category')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                            </div> <!-- end col -->
                            <div class="mt-1"><button class="btn btn-primary w-100 btn-sm profile-button" type="submit">Add Sub-Category</button>
                            </div>
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div>
        </div>
        </form>     
  </x-backend.ui.section-card>
  

  @push('customJs')
      <script>
          
      </script>
  @endpush
@endsection