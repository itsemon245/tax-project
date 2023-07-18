@extends('backend.layouts.app')

@section('content')
    <x-backend.ui.breadcrumbs :list="['Course', 'Create']" />
    <x-backend.ui.section-card name="Create Course">
        <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
            @csrf


            {{-- rest of the fields goes down here --}}
            <div class="container rounded bg-white py-3 px-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">Course Info</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <x-backend.form.text-input label="Course Name" required type="text"
                                            name="name">
                                        </x-backend.form.text-input>
                                    </div>
                                    <div class="col-md-3">
                                        <x-backend.form.text-input label="Course Price" type="number" name="price">
                                        </x-backend.form.text-input>
                                    </div>
                                    <div class="col-md-5">
                                        <x-backend.form.text-input label="Page Title" type="text" name="page_title">
                                        </x-backend.form.text-input>
                                    </div>
                                    <div class="col-md-6">
                                        <x-form.ck-editor id="description" label="Course Description" type="text"
                                            name="description" placeholder="Course Description">
                                        </x-form.ck-editor>

                                    </div>
                                    <div class="col-md-6">
                                        <x-backend.form.image-input style="aspect-ratio:4/1;" label="Page Banner" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">Cards Section</div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach (range(1, 2) as $key)
                                        <div class="col-md-6">
                                            <div class="card border border-2">
                                                <div class="card-body p-2">
                                                    <x-backend.form.text-input
                                                        label="{{ $key === 1 ? 'Card 1 Title' : 'Exam Card Title' }}"
                                                        type="text" name="page_card_titles[]">
                                                    </x-backend.form.text-input>
                                                    <x-form.text-area id="page-card-description-{{ $key }}"
                                                        name="page_card_descriptions[]"
                                                        placeholder="{{ $key === 1 ? 'Card 1 Description' : 'Exam Card Description' }}"
                                                        label="{{ $key === 1 ? 'Card 1 Description' : 'Exam Card Description' }}">
                                                    </x-form.text-area>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">Learn More Section</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <x-form.text-area label="Learn More Description" name="learn_more_description"
                                            placeholder="A brief Description of learn more section" rows='2'>
                                        </x-form.text-area>
                                    </div>
                                    <div class="col-md-6">
                                        <x-form.text-area label="Course Preview" type="url" name="preview"
                                            placeholder="https://www.youtube.com/watch?v=-mUTU9MDOC8" rows='2'>
                                        </x-form.text-area>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    @foreach (range(1, 3) as $i)
                                        <div class="col-md-3">
                                            <x-backend.form.image-input style="aspect-ratio:2/1.5;" label="Learn More Image"
                                                name="learn_more_images[]" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">Explore Topic Section</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <x-form.text-area label="Explore Topic Description" name="explore_topic_description"
                                            placeholder="A brief Description of learn more section" rows='2'>
                                        </x-form.text-area>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    @foreach (range(1, 3) as $i)
                                        <div class="col-md-4">
                                            <x-form.ck-editor id="explore-topic-{{ $i }}"
                                                label="Explore Topic List {{ $i }}" name="explore_topic_lists[]"
                                                placeholder='A brief description of topics' />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <x-backend.ui.button class="btn-primary">
                            Submit
                        </x-backend.ui.button>
                    </div>
                </div>
            </div>
        </form>

    </x-backend.ui.section-card>

    @push('customJs')
    @endpush
@endsection
