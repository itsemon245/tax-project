@extends('frontend.layouts.app')
@section('main')
    <div class="container my-5">
        <h3 class="text-center text-muted">Packages:</h3>
        <div class="row">
            @if (count($packages) > 0)
                <table class="table table-responsive table-striped">
                    <thead class="bg-light">
                        <tr>
                            <th class="">No</th>
                            <th class="">Name</th>
                            <th class="" style="width: 80px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($packages as $key => $package)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>

                                    <a href="#" class="d-flex align-items-start gap-2 text-reset">
                                        <div>
                                            <span data-feather="folder" class="icon-dual"></span>
                                        </div>
                                        <div>
                                            <div class="fw-medium">{{ $package->name }}</div>
                                            <div class="d-flex mt-2 gap-2 align-items-center">
                                                <span data-feather="package" class="icon-dual w-4 h-4"></span>
                                                {{ $package->caseStudies?->count() }} Packages
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <x-backend.ui.button type="custom" class="btn-sm text-capitalize btn-dark"
                                        href="{{ route('course.caseStudy.index', ['package_id' => $package->id]) }}">
                                        CaseStudies
                                    </x-backend.ui.button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <section class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 400px;">
                    <div class="">
                        <p>You havn't purchased any caseStudies yet!</p>
                        <a href="{{ route('course.caseStudy.page') }}"
                            class="btn btn-primary rounded-3 w-100 mx-auto">Explore
                            CaseStudies</a>
                    </div>
                </section>
            @endif
        </div>
    </div>
    @if (count($studies) > 0)
        <div class="container my-5">
            <h3 class="text-center text-muted">Case Studies:</h3>
            <div class="row">
                <table class="table table-responsive table-striped">
                    <thead class="bg-light">
                        <tr>
                            <th class="">No</th>
                            <th class="">Name</th>
                            <th class="" style="width: 80px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($studies as $key => $study)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>

                                    <a href="#" class="d-flex align-items-start gap-2 text-reset">
                                        <div>
                                            <span data-feather="folder" class="icon-dual"></span>
                                        </div>
                                        <div>
                                            <div class="fw-medium">{{ $study->name }}</div>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <x-backend.ui.button type="custom" class="btn-sm text-capitalize btn-dark"
                                        href="{{ route('course.caseStudy.show', ['caseStudy' => $study]) }}">
                                        View
                                    </x-backend.ui.button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    @endif
@endsection
