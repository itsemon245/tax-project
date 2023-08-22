@extends('frontend.layouts.app')
@section('main')
    <div class="container">
        <div class="px-5 my-5">
            <h4 class="text-center mb-3">{{ $userDoc->name }} Documents</h4>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex gap-3 flex-wrap align-items-center">
                        @foreach ($userDoc->files as $key => $file)
                            <div style="max-width: 20rem;">

                                @switch($file->mimeType)
                                    @case('pdf')
                                        <img style="object-fit: cover;" class="w-100 border rounded rounded-3"
                                            src="https://www.associationservicesgroup.net/wp-content/uploads/2017/07/PDF-Placeholder-e1500896019213.png"
                                            alt="{{ $userDoc->name }}">
                                    @break

                                    @case('zip')
                                        <img style="object-fit: cover;" class="w-100 border rounded rounded-3"
                                            src="{{ asset('images/zip-placeholder.png') }}" alt="{{ $userDoc->name }}">
                                    @break

                                    @default
                                        <img style="object-fit: cover;" class="w-100 border rounded rounded-3"
                                            src="{{ useImage($file->file) }}" alt="{{ $userDoc->name }}">
                                    @break
                                @endswitch
                                <div class="btn btn-light rounded-3 text-uppercase mt-2 me-2">
                                    {{ $file->mimeType }} File
                                </div>
                                <a href="{{ route('user-doc.download', ['userDoc' => $userDoc, 'fileIndex' => $key]) }}"
                                    class="btn btn-primary rounded-3 text-uppercase mt-2">
                                    Download <span class="mdi mdi-download font-16"></span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('customJs')
    @endpush
@endsection
