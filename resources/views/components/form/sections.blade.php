    <div>
        <input type="hidden" id="section-count" value="{{ count($sections) }}" disabled>
        <label for="" class="form-label my-3"><b>SECTIONS</b></label>
        <div id="packacgeFeaturesInputs">
            @foreach ($sections as $key => $section)
                <div class="row">
                    <input type="hidden" name="section_ids[]" value="{{ $section->id }}">
                    <div class="col-md-7">
                        <div class="mb-2">
                            <label for=section-title${itemCount} class="form-label mb-0">Section Title
                                {{ ++$key }}</label>
                            <input type='text' name="section_titles[]" placeholder="Section Title"
                                class="form-control" value="{{ $section->title }}" />
                        </div>
                        <div class="mb-2 section-editor">
                            <x-form.ck-editor id="section-editor-{{ $key }}" name="section_descriptions[]"
                                placeholder="Section Description">
                                {!! $section->description !!}
                            </x-form.ck-editor>

                        </div>
                    </div>
                    <div class="col-md-5">
                        <x-backend.form.image-input id="section-image-{{ $key }}"
                            lable="Section Image {{ $key }}" name="section_images[]"
                            image="{{ $section->image }}" />
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <div class="icon-item mx-1 mt-3" style="cursor: pointer" onclick="addPackageFeature()"
                title="Add Package Feature">
                <span class="mdi mdi-plus text-success bg-soft-success px-1 py-1 rounded rounded-circle"></span>

            </div>
            <div id="removePackageFeatureBtn" class="icon-item mx-1 mt-3" role="button"
                onclick="removePackageFeature()" title="Add Package Feature">
                <span class="mdi mdi-delete text-danger bg-soft-danger px-1 py-1 rounded rounded-circle"></span>
            </div>
        </div>
    </div>

    @push('customJs')
        <script>
            let itemCount = parseInt($('#section-count').val());

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
                                        <img class="w-100 border border-2 border-primary" id="live-${itemCount}"
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
            if (itemCount === 0) {
                addPackageFeature()
            }


            const removePackageFeature = () => {
                let last = $("#packacgeFeaturesInputs").find(".row:last");
                let id = last.find('[name="section_ids[]"]').val();
                let url = '{{ route('ajax.section.destroy', 'ID') }}'
                url = url.replace('ID', id)
                $.ajax({
                    type: "delete",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        itemCount--
                        featureLength()
                        last.remove()
                        Toast.fire({
                            icon: "success",
                            title: "Success",
                            text: response.message
                        })
                    }
                });

            }
        </script>
    @endpush
