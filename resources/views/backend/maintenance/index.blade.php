@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Web Site', 'Maintenance']" />

    <x-backend.ui.section-card name="Web Site Maintenance">

        {{-- Select category option --}}
        <form action="{{ route('maintenance.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <x-backend.form.image-input id="logo" required style="aspect-ratio:1.8/.7;" label="Web Site logo" name="logo"/>                                 
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-md-3" style="max-width: 100%;">
                                            <label for="favicon">
                                                    <span class="form-label text-capitalize">Favicon<span class="text-danger"> *</span></span>
                                                <input id="favicon" name="favicon" type="file" hidden>
                                                <img class="w-100 border border-2 border-primary rounded-circle" style="aspect-ratio:1/1;" id="live-favicon"
                                                    src="{{ asset('images/Placeholder_view_vector.svg.png') }}">
                                            </label>
                                            @error('favicon')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-9 mt-3">
                                            <x-backend.form.text-input type="text" required name="title" label="Web Title" />
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                                {{-- Add sub-category --}}
                                <div class="col-md-6">
                                    <div class="mb-1">
                                        <x-backend.form.text-input type="email" class="mb-3" required name="email" label="Web E-mail" />
                                        <x-backend.form.text-input type="phone" class="mb-3" required name="phone" label="Web Phone" />
                                        <x-backend.form.text-input type="phone" class="mb-3" required name="whatsapp" label="Web What's App" />
                                        <div class="mt-4">
                                            <label for="exampleColorInput" class="form-label">Button Color<span class="text-danger"> *</span></label>
                                            <input type="color" class="form-control pb-2" name="btn_color" id="exampleColorInput" value="#38BDF8"/>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                                <div class="mt-2"><button class="btn btn-primary w-100 btn-sm profile-button"
                                        type="submit">Save Change</button>
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
                $(document).ready(function() {  
                const input = $('#favicon')
                input.on('input', e => {
                    const image = $('#live-'+e.target.id)
                    const url = URL.createObjectURL(e.target.files[0])
                    image.attr('src', url)
                })
                });
        </script>
    @endpush
@endsection
