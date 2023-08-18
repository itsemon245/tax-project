@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Project', 'Create']" />

    <x-backend.ui.section-card name="Project Create">
        <div class="container my-3">
            <form method="POST" action="{{ route('project.store') }}">
                @csrf
                <div class="row">
                    {{-- {{ dd($clients) }} --}}
                    <div class="col-md-12">
                        <div class="px-md-0 px-2">
                            <div id="progressbarwizard">

                                <div class="d-flex justify-content-center">
                                    <ul class="nav nav-pills bg-light nav-justified form-wizard-header w-100" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a href="#project-info" data-bs-toggle="tab" data-toggle="tab"
                                                class="nav-link rounded-0 pt-2 pb-2 active" aria-selected="true"
                                                role="tab" tabindex="-1">
                                                <i class="mdi mdi-information-outline"></i>
                                                <span class="d-none d-sm-inline">Project Info</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a href="#finish" data-bs-toggle="tab" data-toggle="tab"
                                                class="nav-link rounded-0 pt-2 pb-2" aria-selected="false" role="tab"
                                                tabindex="-1">
                                                <i class="mdi mdi-book-plus-multiple"></i>
                                                <span class="d-none d-sm-inline">Assign</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>


                                <div class="tab-content ">
                                    {{-- <div id="bar" class="progress my-3" style="height: 7px;">
                                        <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 33.33%;"></div>
                                    </div> --}}

                                    <div class="tab-pane my-3 active" id="project-info" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <x-backend.form.text-input label="Project Name" name='name' required />
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <x-backend.form.text-input label="Weekdays" type="number" name='weekdays'
                                                    required />
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <x-backend.form.text-input label="Start Date" type="date" required
                                                    name='start_date' />
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <x-backend.form.text-input label="End Date" type="date" required
                                                    name='end_date' />
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <x-backend.form.text-input label="Daily Target" type="number" required
                                                    name="daily_target" />
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <x-backend.form.text-input label="Total Clients" name=""
                                                    placeholder="{{ count($clients) }}" disabled />
                                                <input type="text" hidden value="{{ count($clients) }}"
                                                    name="total_clients">
                                            </div>
                                            {{-- {{ dd($users[0]) }} --}}
                                        </div> <!-- end row -->
                                    </div>
                                    <div class="tab-pane my-3" id="finish" role="tabpanel">
                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-striped mb-0">
                                                    <thead class="table-secondary">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Phone</th>
                                                            <th>Circle</th>
                                                            <th>Zone</th>
                                                            <th class="text-center">Assign</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($clients as $key=>$client)
                                                            <tr>
                                                                <input type="hidden" value="{{ $client->id }}"
                                                                    name="clients[]">
                                                                {{-- {{ dd($user) }} --}}
                                                                <td>{{ ++$key }}</td>
                                                                <td>{{ $client->name }}</td>
                                                                <td>{{ $client->phone }}</td>
                                                                <td>{{ $client->circle }}</td>
                                                                <td>{{ $client->zone }}</td>
                                                                <td>
                                                                    <div class="d-flex flex-wrap gap-2">
                                                                        @foreach ($users as $conut => $user)
                                                                            <div>
                                                                                <div class="form-check p-0">
                                                                                    <input class="form-check-input" hidden
                                                                                        value="{{ $user->id }}"
                                                                                        name="client_{{ $client->id }}_users[]"
                                                                                        type="checkbox"
                                                                                        id="client-{{ $client->id }}-users-{{ $user->id }}">
                                                                                    <label style="max-width: 200px;"
                                                                                        class="custom-check-label form-check-label text-dark bg-light text-secondary border rounded rounded-2 p-1"
                                                                                        for="client-{{ $client->id }}-users-{{ $user->id }}">
                                                                                        {{ $user->name }}
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="4">
                                                                    <h5 class="d-flex justify-content-center text-muted">No
                                                                        record found</h5>
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div>

                                    <ul
                                        class="list-unstyled d-flex justify-content-md-start justify-content-between gap-3 mb-0 wizard">
                                        <li class="previous" id="prev-btn">
                                            <a href="javascript: void(0);" class="btn btn-dark">Previous</a>
                                        </li>
                                        <li class="next" id="next-btn">
                                            <a href="javascript: void(0);" class="btn btn-primary">Next</a>
                                        </li>
                                    </ul>

                                </div> <!-- tab-content -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </x-backend.ui.section-card>
    <!-- end row-->
@endsection
@push('customJs')
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
@endpush
