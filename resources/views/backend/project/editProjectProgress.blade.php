@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Project', 'Edit']" />
    <x-backend.ui.section-card name="Project Edit">
        <div class="container">
            <x-backend.ui.button type="custom" href="{{ route('project.index') }}"
                class="btn-info btn-sm mb-3">Back</x-backend.ui.button>
            <form method="POST" action="{{ route('project.update', $project) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="px-md-0 px-2">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <x-backend.form.text-input label="Project Name" value="{{ $project->name }}"
                                        name='name' required />
                                </div>
                                <div class="col-md-6 mb-2">
                                    <x-backend.form.text-input label="Weekdays" value="{{ $project->weekdays }}"
                                        type="number" name='weekdays' required />
                                </div>
                                <div class="col-md-6 mb-2">
                                    <x-backend.form.text-input label="Start Date" value="{{ $project->start_date }}"
                                        type="date" required name='start_date' />
                                </div>
                                <div class="col-md-6 mb-2">
                                    <x-backend.form.text-input label="End Date" value="{{ $project->end_date }}"
                                        type="date" required name='end_date' />
                                </div>
                                <div class="col-md-6 mb-2">
                                    <x-backend.form.text-input label="Daily Target" value="{{ $project->daily_target }}"
                                        type="number" required name="daily_target" />
                                </div>
                                <div class="col-md-6 mb-2">
                                    <x-backend.form.text-input label="Total Clients" name=""
                                        placeholder="{{ count($clients) }}" disabled />
                                    <input type="text" hidden value="{{ count($clients) }}" name="total_clients">
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="text-muted text-center font-18 fw-bold">Tasks</div>
                                <div id="packacgeFeaturesInputs">
                                    @foreach ($project->tasks as $task)
                                        <div class="mt-1">
                                            <x-backend.form.text-input type="text" name="tasks[]" label="Task" :value="$task->name" />
                                        </div>
                                    @endforeach
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="icon-item mx-1 mt-3" style="cursor: pointer" onclick="addPackageFeature()"
                                        title="Add Package Feature">
                                        <i data-feather="plus-square" class="icon-dual"></i>
                                    </div>
                                    <div id="removePackageFeatureBtn" class="icon-item mx-1 mt-3" style="cursor: pointer"
                                        onclick="removePackageFeature()" title="Add Package Feature">
                                        <i data-feather="minus-square" class="icon-dual"></i>
                                    </div>
                                </div>
                            </div> --}}
                            <button class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </x-backend.ui.section-card>
    <!-- end row-->
@endsection
@push('customJs')
    <script src="{{ asset('frontend/assets/js/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/form-wizard.init.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('.custom-check-label').each((i, label) => {
                $(label).click(e => {
                    console.log('hello world');
                    $(label).toggleClass('bg-soft-success');
                })
            })

            const nextBtn = $('#next-btn')
            nextBtn.click(() => {
                setTimeout(() => {
                    const isLast = $('#finish').hasClass('active');
                    console.log(isLast);
                    if (isLast) {
                        const submitBtn =
                            `<button type="submit" class="btn btn-primary">Submit</button>`
                        nextBtn.html(submitBtn)
                    }
                }, 100);
            })
            const prevBtn = $('#prev-btn')
            prevBtn.click(() => {
                const submitBtn = `<a href="javascript: void(0);" class="btn btn-primary">Next</a>`
                nextBtn.html(submitBtn)
            })
        });
    </script>

    {{-- <script>
        let itemCount = 0;
        const featureLength = () => {
            $('#packacgeFeaturesInputs').children().length < 2 ?
                $("#removePackageFeatureBtn").addClass('d-none') :
                $("#removePackageFeatureBtn").removeClass('d-none')
        }

        const addPackageFeature = () => {
            itemCount++
            const inputs = `
                        <div class="mt-1">
                            <x-backend.form.text-input type="text" name="tasks[]" label="Task"  />
                        </div>
                    `
            $('#packacgeFeaturesInputs').append(inputs)
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

        const removePackageFeature = () => {
            itemCount--
            $("#packacgeFeaturesInputs").find('div:last').remove()
            featureLength()
        }
    </script> --}}
@endpush
