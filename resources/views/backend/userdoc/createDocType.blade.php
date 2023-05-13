@extends('backend.layouts.app')


@section('content')
  <x-backend.ui.breadcrumbs :list="['Frontend', 'Docment type', 'Create']" />

  <x-backend.ui.section-card name="Create Document Type">

{{-- add category field --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-1">Add Document Type</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('user-doc-type.store') }}" method="POST">
                            @csrf
                            <div>
                                <input type="text" id="simpleinput" name="add_document_type" placeholder="Add Document Type" class="form-control
                                @error('add_document_type')
                                is-invalid
                                @enderror
                                ">
                                @error('add_document_type')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-1">
                                <x-backend.ui.button class="btn-primary btn-sm w-100">Add Document type</x-backend.ui.button>
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
                <h4 class="header-title">All Document type</h4>
                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Document type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($doc_types as $key => $doc_type)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ ucwords($doc_type->doc_type_name) }}</td>
                            <td>
                                {{-- {{ dd($doc_type) }} --}}
                                <div class="btn-group">
                                    <x-backend.ui.button type="edit" href="{{ route('user-doc-type.edit', $doc_type) }}" class="btn-sm" />
                                    <form action="#" method="post">
                                        @csrf
                                        <x-backend.ui.button class="btn-danger btn-sm">Delete</x-backend.ui.button>
                                    </form>
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