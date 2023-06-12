@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Video', 'Create']" />

    <x-backend.ui.section-card name="Video Section">

        <form action="{{ route('video.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <x-backend.form.text-input label="Video Title" required type="text" name="title">
                    </x-backend.form.text-input>
                </div>
                <div class="col-md-6">
                    <div class="video-container">
                        <div id="upload-container" class="text-center mb-2">
                            <button type="button" id="browseFile" class="btn btn-primary">Browse Video</button>
                            <button type="button" id="cancelUpload" class="btn btn-danger" style="display: none">Cancel Uploading</button>
                        </div>
                        <video id="videoPreview" src="" controls style="display: none; width: 100%; height: auto"></video>
                        <div class="progress" style="display: none; height: 25px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%; height: 100%">0%
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="video" name="video">
                </div>
                <div class="col-md-12">
                    <x-form.ck-editor id="ck-editor1" name="description" placeholder="Description" label="Description">
                    </x-form.ck-editor>
                </div>
                <div class="col-md-12">
                    <x-backend.ui.button type="submit" class="btn-primary mt-2">Create</x-backend.ui.button>
                </div>
            </div>
        </form>

    </x-backend.ui.section-card>


    @push('customJs')
        <!-- Resumable JS -->
        <script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>
        <script>
            let browseFile = $('#browseFile');
            let resumable = new Resumable({
                target: '{{ route('video.upload') }}',
                query: {
                    _token: '{{ csrf_token() }}'
                }, // CSRF token
                fileType: ['mp4', 'mkv', 'avi', 'wmv'],
                headers: {
                    'Accept': 'application/json'
                },
                testChunks: false,
                throttleProgressCallbacks: 1,
            });

            resumable.assignBrowse(browseFile[0]);

            resumable.on('fileAdded', function(file) { // trigger when file picked
                showProgress();
                $("#cancelUpload").show()
                $("#browseFile").hide()
                resumable.upload() // to actually start uploading.
            });

            $("#cancelUpload").on("click", function(){
                resumable.cancel()
                updateProgress(0);
                $("#cancelUpload").hide()
                $("#browseFile").show()
                hideProgress()
            })

            resumable.on('fileProgress', function(file) { // trigger when file progress update
                updateProgress(Math.floor(file.progress() * 100));
            });

            resumable.on('fileSuccess', function(file, response) { // trigger when file upload complete
                response = JSON.parse(response)
                $('#video').val(response.path);
                $('#videoPreview').attr('src', response.path);
                $('#upload-container').hide();
                $('#videoPreview').show();
            });
            
            resumable.on('fileError', function(file, response) { // trigger when there is any error
                alert('Video uploading error.')
                updateProgress(0);
                $("#cancelUpload").hide()
                $("#browseFile").show()
            });

            let progress = $('.progress');

            function showProgress() {
                progress.find('.progress-bar').css('width', '0%');
                progress.find('.progress-bar').html('0%');
                progress.find('.progress-bar').removeClass('bg-success');
                progress.show();
            }

            function updateProgress(value) {
                progress.find('.progress-bar').css('width', `${value}%`)
                progress.find('.progress-bar').html(`${value}%`)
            }

            function hideProgress() {
                progress.hide();
            }
        </script>
    @endpush
@endsection
