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
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $key => $course)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    <div
                                        class="gap-2 d-flex align-items-start text-reset">
                                        <div>
                                            <span data-feather="folder" class="icon-dual"></span>
                                        </div>
                                        <div>
                                            <div class="fw-medium">{{ $course->name }}</div>
                                            <div>{{ $course->purchasable_type }} </div>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    {{ $course->price }}
                                </td>
                                <td>
                                    <div>
                                        <x-backend.ui.button type="custom" class="btn-sm text-capitalize btn-dark "
                                            href="{{ route('page.my.payment.show', $course->id) }}">
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
