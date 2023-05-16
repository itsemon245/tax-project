@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Docment type', 'Edit']" />

    <x-backend.ui.section-card name="Edit Document Type">

        {{-- add category field --}}
        <form action="{{route('document-type.update', $documentType->id)}}" method="POST">
            @csrf
            @method('PUT')
            <x-backend.form.text-input name="document_type" label="Document Type" :value="$documentType->name" />
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
