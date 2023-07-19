@extends('backend.layouts.app')

@section('content')
    <x-backend.ui.breadcrumbs :list="['Course', 'Create']" />
    <x-backend.ui.section-card name="Create Course">
        <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
            @csrf


            {{-- rest of the fields goes down here --}}
            <div class="container rounded bg-white py-3 px-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header py-1" role="button">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Course Info</span>
                                    <span class="mdi mdi-chevron-down"></span>
                                </div>
                            </div>
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
                                        <x-form.text-area class="h-100" id="description"
                                            label="Course Description" type="text" name="description"
                                            placeholder="Course Description">
                                        </x-form.text-area>
                                    </div>
                                    <div class="col-md-6">
                                        <x-backend.form.image-input class="h-100" id="page-banner" name="page_banner"
                                            style="aspect-ratio:3/1.5;" label="Page Banner" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header py-1" role="button">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Cards Section</span>
                                    <span class="mdi mdi-chevron-down"></span>
                                </div>
                            </div>
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
                            <div class="card-header py-1" role="button">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Learn More Section</span>
                                    <span class="mdi mdi-chevron-down"></span>
                                </div>
                            </div>
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
                                            <x-backend.form.image-input id="learn-more-image-{{ $i }}"
                                                style="aspect-ratio:2/1.5;" label="Learn More Image"
                                                name="learn_more_images[]" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header py-1" role="button">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Feature Section</span>
                                    <span class="mdi mdi-chevron-down"></span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <x-form.ck-editor id="course-includes" label="Course Includes"
                                            name="course_includes" placeholder="List of item course includes"
                                            rows='2'>
                                        </x-form.ck-editor>
                                    </div>
                                    <div class="col-md-6">
                                        <x-form.ck-editor id="graduates-receives" label="Graduate receives"
                                            name="graduate_receives" placeholder="List of item of graduate receives"
                                            rows='2'>
                                        </x-form.ck-editor>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header py-1" role="button">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">Explore Topic Section</span>
                                    <span class="mdi mdi-chevron-down"></span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <x-form.text-area label="Explore Topic Description"
                                            name="explore_topic_description"
                                            placeholder="A brief Description of learn more section" rows='2'>
                                        </x-form.text-area>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    @foreach (range(1, 3) as $i)
                                        <div class="col-md-4">
                                            <x-form.ck-editor id="explore-topic-{{ $i }}"
                                                label="Explore Topic List {{ $i }}"
                                                name="explore_topic_lists[]"
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
        <script>
            $(document).ready(function() {
                const headers = $('form .card-header')
                headers.each((i, header) => {
                    $(header).click(e => {
                        let icon = $(header).find('.mdi');
                        icon.toggleClass('mdi-chevron-down')
                        icon.toggleClass('mdi-chevron-up')
                        $(header).next().slideToggle();
                    })
                })
            });
        </script>
    @endpush
@endsection
