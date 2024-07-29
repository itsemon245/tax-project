@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Footer', 'Social-Media', 'Edit']" />

    <x-backend.ui.section-card name="Social-Media Edit">

        {{-- Social media handle option --}}
        <form action="{{ route('income-source.update', $incomeSource) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mt-3">
                                        <x-backend.form.text-input type="text" id="title" label="Title" name="title"
                                        placeholder="Select Title" required value="{{$incomeSource->title}}"/>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-md-12 mt-2">
                                    <x-backend.form.text-input type="file" label="Image" name="image"/>
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
