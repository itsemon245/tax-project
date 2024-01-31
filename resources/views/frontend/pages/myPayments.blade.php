@extends('frontend.layouts.app')
@section('main')
    <div class="container my-5">
        <h3 class="text-center text-muted">My Payments:</h3>
        <div class="row">
            @if ($payments->count() > 0)
                <table class="table table-responsive table-striped">
                    <thead class="bg-light">
                        <tr>
                            <th class="">No</th>
                            <th class="">Name</th>
                            <th class="">Price</th>
                            <th class="">Trainer</th>
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $key => $course)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>

                                    <a href="{{ route('video.byCourse', $course->id) }}"
                                        class="gap-2 d-flex align-items-start text-reset">
                                        <div>
                                            <span data-feather="folder" class="icon-dual"></span>
                                        </div>
                                        <div>
                                            <div class="fw-medium">{{ $course->name }}</div>
                                            <div>{{ $course->videos()->count() }} Videos</div>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    {{ $course->price }}
                                </td>
                                <td>
                                    <div class="gap-2 d-flex align-items-start">
                                        <div>
                                            <img loading="lazy" src="{{ asset('backend/assets/images/users/user-1.jpg') }}"
                                                class="rounded rounded-circle" width="48px" height="48px" alt="">
                                        </div>
                                        <div>
                                            <div class="fw-medium">
                                                <a href="javascript: void(0);"
                                                    class="text-reset">{{ fake()->name('female') }}</a>
                                            </div>
                                            <span>{{ fake()->jobTitle() }}</span>
                                        </div>
                                    </div>
                                </td>


                                <td>
                                    <div>
                                        <x-backend.ui.button type="custom" class="btn-sm text-capitalize btn-dark "
                                            href="#">
                                            Preview
                                        </x-backend.ui.button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <section class="rounded bg-light d-flex align-items-center justify-content-center" style="height: 400px;">
                    <div class="">
                        <p>You havn't made any payments yet!</p>
                    </div>
                </section>
            @endif
        </div>
    </div>
@endsection
