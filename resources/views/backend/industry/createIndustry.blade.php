@extends('backend.layouts.app')
@push('customCss')
    <style>
        .custom-editor .ck-content.ck-editor__editable {
            min-height: 100px !important;
        }

        .section-editor .ck-content.ck-editor__editable {
            min-height: 160px !important;
        }
    </style>
@endpush
@section('content')
    <x-backend.ui.breadcrumbs :list="['Pages', 'Industry', 'Create']" />
    <x-backend.ui.section-card name="Create Industry">
        <div class="mb-3">
            <a href="{{ route('industry.index') }}" class="btn-info btn btn-sm">BACK</a>
        </div>
        <form action="{{ route('industry.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- rest of the fields goes down here --}}
            <div class="container rounded bg-white py-3 px-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="custom-editor">
                            <x-form.ck-editor id="ck-editor2" name="page_description" placeholder="Page Description"
                                label="Page Description">
                            </x-form.ck-editor>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <x-backend.form.text-input name="title" placeholder="Title"
                            label="Title"></x-backend.form.text-input>
                        <x-form.text-area class="h-75" id="ck-editor-intro" name="intro" placeholder="Intro"
                            label="Intro">
                        </x-form.text-area>
                    </div>
                    <div class="col-md-4">
                        <div class="h-100">
                            <x-backend.form.image-input name="image" placeholder="Logo"
                                label="Logo"></x-backend.form.image-input>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="custom-editor">
                            <x-form.ck-editor id="ck-editor-description" name="description" placeholder="Description"
                                label="Description">
                            </x-form.ck-editor>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <x-form.sections />
                    </div>
                    <div class="mt-3">
                        <button type="submit"
                            class="btn btn-primary waves-effect waves-light profile-button">Create</button>
                    </div>
                </div>
            </div>
        </form>
    </x-backend.ui.section-card>


    @push('customJs')
        <script>
            let itemCount = 0;
            const featureLength = () => {
                $('#packacgeFeaturesInputs').children().length < 2 ?
                    $("#removePackageFeatureBtn").addClass('d-none') :
                    $("#removePackageFeatureBtn").removeClass('d-none')
            }

            const addPackageFeature = () => {
                itemCount++
                const inputs = `
               <div class="row">
                    <div class="col-md-7">
                        <div class="mb-2">
                            <label for=section-title${itemCount} class="form-label mb-0">Section Title ${itemCount}</label>
                           <input type='text' name="section_titles[]" placeholder="Section Title" class="form-control" />
                        </div>
                        <div class="mb-2 section-editor">
                            <label for="section-editor-${itemCount}" class="form-label mb-0">Section Description ${itemCount}</label>
                            <textarea class="custom-editor" id="section-editor-${itemCount}" name="section_descriptions[]" placeholder="Section Description">
                                
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-5">  
                        <label for="section-image-${itemCount}" class="mb-0">
                                <p class="mb-0 form-label">Section Image ${itemCount}</p>
                                <input id="section-image-${itemCount}" class="custom-input" data-index="${itemCount}" type="file" name="section_images[]" hidden>
                                <img loading="lazy" class="w-100 border border-2 border-primary" id="live-${itemCount}"
                                    src="{{ asset('images/Placeholder_view_vector.svg.png') }}">
                        </label>
                        <p class="mt-2" id="note-${itemCount}">
                            <span class="text-danger" style="font-weight: 500;">*</span>Accepted files : <span class="text-success" style="font-weight: 500;">jpg, png, svg, webp up to 5 MB</span> 
                        </p>
                    </div>
                </div>
            `
                $('#packacgeFeaturesInputs').append(inputs)


                CKEDITOR.ClassicEditor.create(document.getElementById(`section-editor-${itemCount}`), {

                    // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                    toolbar: {
                        items: [
                            'heading', '|',
                            'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                            'bulletedList', 'numberedList', 'todoList', '|',
                            'undo', 'redo',
                            'fontSize', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                            'link', 'blockQuote', 'insertTable', '|',
                            'outdent', 'indent', 'alignment', 'horizontalLine',
                        ],
                        shouldNotGroupWhenFull: true
                    },
                    // Changing the language of the interface requires loading the language file using the <script> tag.
                    // language: 'es',
                    list: {
                        properties: {
                            styles: true,
                            startIndex: true,
                            reversed: true
                        }
                    },
                    // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                    heading: {
                        options: [{
                                model: 'paragraph',
                                title: 'Paragraph',
                                class: 'ck-heading_paragraph'
                            },
                            {
                                model: 'heading1',
                                view: 'h1',
                                title: 'Heading 1',
                                class: 'ck-heading_heading1'
                            },
                            {
                                model: 'heading2',
                                view: 'h2',
                                title: 'Heading 2',
                                class: 'ck-heading_heading2'
                            },
                            {
                                model: 'heading3',
                                view: 'h3',
                                title: 'Heading 3',
                                class: 'ck-heading_heading3'
                            },
                            {
                                model: 'heading4',
                                view: 'h4',
                                title: 'Heading 4',
                                class: 'ck-heading_heading4'
                            },
                            {
                                model: 'heading5',
                                view: 'h5',
                                title: 'Heading 5',
                                class: 'ck-heading_heading5'
                            },
                            {
                                model: 'heading6',
                                view: 'h6',
                                title: 'Heading 6',
                                class: 'ck-heading_heading6'
                            }
                        ]
                    },
                    // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                    placeholder: 'Section Description',

                    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                    fontSize: {
                        options: [10, 12, 14, 'default', 18, 20, 22, 24, 28, 32, 36],
                        supportAllValues: true
                    },
                    // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                    htmlSupport: {
                        allow: [{
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }]
                    },
                    // Be careful with enabling previews
                    // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                    // htmlEmbed: {
                    //     showPreviews: true
                    // },
                    // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                    link: {
                        decorators: {
                            addTargetToExternalLinks: true,
                            defaultProtocol: 'https://',
                            toggleDownloadable: {
                                mode: 'manual',
                                label: 'Downloadable',
                                attributes: {
                                    download: 'file'
                                }
                            }
                        }
                    },

                    // The "super-build" contains more premium features that require additional configuration, disable them below.
                    // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                    removePlugins: [
                        // These two are commercial, but you can try them out without registering to a trial.
                        'ExportPdf',
                        'ExportWord',
                        'CKBox',
                        'CKFinder',
                        'EasyImage',
                        // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                        // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                        // Storing images as Base64 is usually a very bad idea.
                        // Replace it on production website with other solutions:
                        // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                        // 'Base64UploadAdapter',
                        'RealTimeCollaborativeComments',
                        'RealTimeCollaborativeTrackChanges',
                        'RealTimeCollaborativeRevisionHistory',
                        'PresenceList',
                        'Comments',
                        'TrackChanges',
                        'TrackChangesData',
                        'RevisionHistory',
                        'Pagination',
                        'WProofreader',
                        // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                        // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                        'MathType',
                        // The following features are part of the Productivity Pack and require additional license.
                        'SlashCommand',
                        'Template',
                        'DocumentOutline',
                        'FormatPainter',
                        'TableOfContents'
                    ],
                })


                const imageInputs = $('.custom-input')
                imageInputs.each((i, input) => {
                    input.addEventListener('change', e => {
                        const image = document.querySelector('#live-' + e.target.dataset.index)
                        const url = URL.createObjectURL(e.target.files[0])
                        image.src = url
                    })
                })


                featureLength()
            }
            addPackageFeature()

            const removePackageFeature = () => {
                itemCount--
                $("#packacgeFeaturesInputs").find(".row:last").remove()
                featureLength()
            }
        </script>
    @endpush
@endsection
