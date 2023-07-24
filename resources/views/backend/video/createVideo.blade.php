@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Course', 'Video', 'Create']" />

    <x-backend.ui.section-card name="Create Video">
        <x-backend.ui.button type="custom" class="btn-info btn-sm mb-2" :href="route('video.byCourse', $courseId)">Back</x-backend.ui.button>
        <form action="{{ route('video.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-md-6 mt-2">
                    <div class="drop-area h-100">
                        <div id="upload-container"
                            class="position-relative h-100 d-flex align-items-center justify-content-center mb-2">
                            <div role="button" id="browseFile"
                                class="bg-light w-100 h-100 d-flex align-items-center justify-content-center rounded rounded-3 shadow shadow-sm p-5 mb-2">
                                <div id="text">
                                    <span class="fw-bold">Choose a file</span> or Drag here
                                </div>
                            </div>
                            <div class="position-absolute d-flex flex-column align-items-center justify-content-center">
                                <div id="apex-progress" class="">

                                </div>
                                <button id="cancelUpload" type="button"
                                    class="d-none btn btn-soft-danger rounded-3 waves-effect waves-light font-medium">
                                    <span class="btn-label bg-transparent me-1 pe-1"><i class="mdi mdi-close-circle-outline"
                                            style="font-size: inherit!important;"></i></span>
                                    <span>Cancel</span>
                                </button>

                                <div id="success" class="d-none alert alert-success rounded-3 py-2 px-3">
                                    <span class="mdi mdi-check-all me-2" style="font-size: inherit!important;"></span>
                                    <span style="font-weight: 500;">Video Uploaded</span>
                                </div>
                                <div id="error" class="d-none alert alert-danger rounded-3 py-2 px-3">
                                    <span class="mdi mdi-close me-2" style="font-size: inherit!important;"></span>
                                    <span style="font-weight: 500;">Somethin went wrong!</span>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12">
                            <x-backend.form.text-input label="Video Title" required type="text" name="title">
                            </x-backend.form.text-input>
                        </div>
                        <div class="col-6">
                            <x-backend.form.text-input label="Section" required type="text" name="section"
                                :value="$section">
                            </x-backend.form.text-input>
                        </div>
                        <div class="col-6">
                            <x-backend.form.select-input label="Select Course" placeholder="Choose Course" required
                                type="text" name="course_id">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}" @if ($course->id === $courseId) selected @endif>
                                        {{ $course->name }}</option>
                                @endforeach
                            </x-backend.form.select-input>
                        </div>
                        <input type="text" name="video" hidden>
                        <input type="text" name="file_name" hidden>
                        <div class="col-12">
                            <x-form.ck-editor id="ck-editor1" name="description" placeholder="Description"
                                label="Description">
                            </x-form.ck-editor>
                        </div>
                        <div class="col-12">
                            <x-backend.ui.button type="submit" class="btn-primary rounded-3 w-100">Create
                            </x-backend.ui.button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </x-backend.ui.section-card>


    @push('customJs')
        <!-- Resumable JS -->
        <script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>
        <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
        <script>
            let options = {
                series: [0],
                colors: ["#22C55E"],
                chart: {
                    height: 220,
                    type: 'radialBar',
                },
                plotOptions: {
                    radialBar: {
                        hollow: {
                            margin: 0,
                            size: "65%",
                        },
                        startAngle: -120,
                        endAngle: 120,
                        dataLabels: {
                            name: {
                                fontSize: '16px',
                                color: '#22C55E',
                                offsetY: 20
                            },
                            value: {
                                fontSize: '14px',
                                fontWeight: 600,
                                color: '#22C55E',
                                offsetY: -20,
                                formatter: function(val) {
                                    return val + "%";
                                }
                            },
                            button: {
                                fontSize: '16px',
                                color: '#f1556c',
                            }
                        }
                    }
                },
                stroke: {
                    dashArray: 3
                },
                labels: ['Completed'],
            };

            let progress = $('#apex-progress');

            let chart = new ApexCharts(document.querySelector('#apex-progress'), options);
            chart.render()
            progress.hide()



            function updateProgress(progress) {
                chart.updateOptions({
                    series: [progress]
                })
            }


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
            resumable.assignDrop(browseFile[0]);

            function video(action) {
                progress.toggle()
                $("#cancelUpload").toggleClass('d-none')
                $("#browseFile").find("#text").toggle()

                if (action === 'upload') {
                    $("#browseFile").css('opacity', 0.4)
                    resumable.upload()
                } else {
                    $("#browseFile").css('opacity', 1)
                    resumable.cancel()
                }
            }

            resumable.on('fileAdded', e => video('upload'));
            $("#cancelUpload").on("click", e => video('cancel'))

            resumable.on('fileProgress', function(file) { // trigger when file progress update
                updateProgress(Math.floor(file.progress() * 100));
            });

            resumable.on('fileSuccess', function(file, response) { // trigger when file upload complete
                response = JSON.parse(response)
                $('input[name="video"]').val(response.path);
                $('input[name="file_name"]').val(response.fileName);
                $('#cancelUpload').addClass('d-none')
                $('#success').removeClass('d-none')
            });

            resumable.on('fileError', function(file, response) { // trigger when there is any error
                updateProgress(0);
                $("#cancelUpload").hide()
                $('#success').removeClass('d-none')
            });
        </script>
    @endpush
@endsection
