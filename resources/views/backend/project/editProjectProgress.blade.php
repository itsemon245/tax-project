@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Project', 'Edit']" />

    <x-backend.ui.section-card name="Project Edit">
        <form method="POST" action="{{ route('project.update', $project) }}">
            @csrf
            @method('PUT')
            <a href="{{ route('project.index') }}" class="btn btn-info btn-sm mb-2">Back</a>
            <div class="row">
                <div class="col-md-12">
                    <div class="px-md-0 px-2">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <x-backend.form.text-input label="Project Name" value="{{ $project->name }}" name='name' required />
                            </div>
                            <div class="col-md-6 mb-2">
                                <x-backend.form.text-input label="Weekdays" value="{{ $project->weekdays }}" type="number" name='weekdays'
                                    required />
                            </div>
                            <div class="col-md-6 mb-2">
                                <x-backend.form.text-input label="Start Date" value="{{ $project->start_date }}"  type="date" required
                                    name='start_date' />
                            </div>
                            <div class="col-md-6 mb-2">
                                <x-backend.form.text-input label="End Date" value="{{ $project->end_date }}" type="date" required
                                    name='end_date' />
                            </div>
                            <div class="col-md-6 mb-2">
                                <x-backend.form.text-input label="Daily Target" value="{{ $project->daily_target }}" type="number" required
                                    name="daily_target" />
                            </div>
                            <div class="col-md-6 mb-2">
                                <x-backend.form.text-input label="Total Clients" name=""
                                    placeholder="{{ count($clients) }}" disabled />
                                <input type="text" hidden value="{{ count($clients) }}"
                                    name="total_clients">
                            </div>
                        </div> <!-- end row -->
                        <button class="btn btn-primary btn-sm">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </x-backend.ui.section-card>
    <!-- end row-->
@endsection
{{-- @push('customJs')
    {{-- Selectize end --}}
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
{{-- @endpush --}} 
