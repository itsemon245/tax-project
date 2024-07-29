@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['User Data', 'Documents', 'Show']" />
    <x-backend.ui.section-card name="{{ $userDoc->name }} Documents">
        <x-btn-back class="me-2 mb-3"></x-btn-back>
        <div class="container">
            <h4>From: {{ $userDoc->user->name }}</h4>
            <h6>Phone: {{ $userDoc->user->phone }}</h6>
            <div class="row align-items-center">
                @foreach ($userDoc->files as $key => $file)
                    <div class="col-md-4 mb-4">
                        <div class="row">
                            <div class="col-12" style="max-height: 20rem;height:15rem;">
                                @switch($file->mimeType)
                                    @case('pdf')
                                        <img loading="lazy" style="object-fit: cover;" class="w-100 h-100 border rounded rounded-3"
                                            src="https://www.associationservicesgroup.net/wp-content/uploads/2017/07/PDF-Placeholder-e1500896019213.png"
                                            alt="{{ $userDoc->name }}">
                                    @break

                                    @case('zip')
                                        <img loading="lazy" style="object-fit: cover;" class="w-100 h-100 border rounded rounded-3"
                                            src="{{ asset('images/zip-placeholder.png') }}" alt="{{ $userDoc->name }}">
                                    @break

                                    @default
                                        <a href="{{ useImage($file->file) }}">
                                            <img loading="lazy" style="object-fit: cover;" class="w-100 h-100  border rounded rounded-3"
                                                src="{{ useImage($file->file) }}" alt="{{ $userDoc->name }}">
                                        </a>
                                    @break
                                @endswitch
                            </div>
                            <div class="col-12">
                                <a href="{{ route('userDoc.backend.download', ['userDoc' => $userDoc, 'fileIndex' => $key]) }}"
                                    class="btn btn-primary rounded-3 text-capitalize mt-2 me-2">
                                    Download <span class="mdi mdi-download font-16"></span>
                                </a>
                                <a href="{{ useImage($file->file) }}" class="btn btn-light rounded-3 text-capitalize mt-2">
                                    Preview <span class="mdi mdi-eye font-16"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </x-backend.ui.section-card>


    @push('customJs')
    @endpush
@endsection
