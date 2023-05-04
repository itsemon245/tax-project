@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend','Footer','Social-Media', 'Edit']" />

    <x-backend.ui.section-card name="Social-Media Edit">

        {{-- Social media handle option --}}
        <form action="{{ route('social-handle.update', $socialHandle) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mt-3">
                                        <x-backend.form.select-input id="social" label="Social" required name="social">
                                            <option @if ($socials[0]->name == $socialHandle->name)
                                                selected
                                            @endif>
                                                {{ $socialHandle->name }}
                                            </option>
                                        </x-backend.form.select-input>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-md-12 mt-2">
                                    <x-backend.form.text-input type="text" name="social_link" label="Social Link" :value="$socialHandle->link" class="other classes" required /></label>
                                </div>
                                {{-- social media link  --}}
                                <div class="mt-3"><button class="btn btn-primary w-100 btn-sm profile-button"
                                        type="submit">Update</button>
                                </div>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div>
            </form>
            </div>


    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
