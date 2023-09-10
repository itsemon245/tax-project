@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Product', 'Category', 'Edit']" />

    <x-backend.ui.section-card name="Edit Category">
        {{-- add category field --}}
        <x-backend.ui.button class="btn-sm btn-info mb-3" href="{{ route('product-category.index') }}"
            type="custom">Back</x-backend.ui.button>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('product-category.update', $productCategory->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <x-backend.form.text-input type="text" :value="$productCategory->name" name="category"
                                            label="Edit Category" placeholder="Type Category" class="form-control" />
                                    </div>
                                    <div class="mt-1"><button class="btn btn-primary w-100 btn-sm profile-button"
                                            type="submit">Update Category</button>
                                    </div>
                                </form>
                            </div> <!-- end col -->
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
