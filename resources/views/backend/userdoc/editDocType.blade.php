@extends('backend.layouts.app')


@section('content')
  <x-backend.ui.breadcrumbs :list="['Frontend', 'Docment type', 'Edit']" />

  <x-backend.ui.section-card name="Edit Document Type">

{{-- add category field --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-1">Edit Document Type</h4>
                <div class="row">
                    <div class="col-lg-12">
                        {{ dd($documentType) }}
                        <form action="" method="POST">
                            @csrf
                            {{-- @method('PUT') --}}
                            <div>
                                <input type="text" id="simpleinput" value="{{ $documentType->doc_type_name }}" name="add_document_type" placeholder="Update Document Type" class="form-control
                                @error('add_document_type')
                                is-invalid
                                @enderror
                                ">
                                @error('add_document_type')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-1">
                                <x-backend.ui.button class="btn-primary btn-sm w-100">Update Document type</x-backend.ui.button>
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
      <script>
          
      </script>
  @endpush
@endsection