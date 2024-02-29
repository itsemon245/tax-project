@pushOnce('customCss')
    <link rel="stylesheet" href="{{ asset('libs/filepond/dist/filepond.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('libs/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css') }}"
        type="text/css">
    <style>
        .filepond--root {
            max-height: 600px;
        }

        @media (min-width: 30em) {
            .filepond--item {
                width: calc(50% - 0.5em);
            }
        }

        @media (min-width: 50em) {
            .filepond--item {
                width: calc(33.33% - 0.5em);
            }
        }
    </style>
@endPushOnce

<input type="file" class="filepond" name="fileponds[]" multiple data-allow-reorder="true" data-max-file-size='5MB'>



@pushOnce('customJs')
    <script src="{{ asset('libs/filepond/dist/filepond.min.js') }}"></script>
    <script src="{{ asset('libs/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js') }}"></script>
    <script
        src="{{ asset('libs/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js') }}">
    </script>
    <script src="{{ asset('libs/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js') }}">
    </script>

    <script>
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageExifOrientation,
            FilePondPluginFileValidateSize,
        );

        // Select the file input and use 
        // create() to turn it into a pond
        $('.filepond').each((i, input) => {
            const pond = FilePond.create(input, {
                allowMultiple: true,
                allowImagePreview: true,
                allowImageExifOrientation: true,
                allowImageCrop: true,
                allowReorder: true,
                server: {
                    url: '{{route("filepond.upload")}}',
                    process: {
                        url: '/',
                        method: 'POST',
                        headers:{
                            'X-CSRF-TOKEN': '{{csrf_token()}}',
                        },
                    },
                    revert: {
                        url: '/',
                        method: 'DELETE',
                    },
                    restore: {
                        url: '/',
                        method: 'POST',
                    },
                    fetch: null,
                },
            });
        })
    </script>
@endPushOnce
