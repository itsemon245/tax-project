@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Docment type', 'Edit']" />

    <x-backend.ui.section-card name="Edit Document Type">

        {{-- add category field --}}
        <form action="{{route('user-doc-type.update', $documentType->id)}}" method="POST">
            @csrf
            @method('PUT')
            <x-backend.form.text-input name="add_document_type" label="Document Type" :value="$documentType->doc_type_name" />
            <div class="mt-1">
                <x-backend.ui.button class="btn-primary btn-sm w-100">Update Document type</x-backend.ui.button>
            </div>
        </form>
        </div>
    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
