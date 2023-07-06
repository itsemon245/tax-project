@extends('frontend.layouts.app')
@section('main')
    <section>
        <h4 class="my-5 text-center fs-3">Which Office Do You Prefer?</h4>
        <div id="contact_details">
            <div class="container">
                <div class="row" style="flex-direction: row-reverse;">

                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <embed style='object-fit:cover;' src="{{ $maps[0]->src }}"
                            class="border w-100 h-100 rounded-3 shadow-sm " />
                    </div>

                    <div class="col-lg-6 ">
                        <div class="rounded-3 shadow-sm border w-100 h-100 bg-light p-3">
                            @foreach ($maps as $key => $map)
                                <div class="p-3 mb-4">
                                    <h4>{{ $map->location }}</h4>
                                    <div class="mb-3">{!! $map->address !!}</div>
                                    <div class="d-flex gap-5">
                                        <div>
                                            <a href="#" class="text-dark fw-bold"
                                                style="text-decoration: underline!important;">Office
                                                Details</a>
                                        </div>
                                        <div>
                                            <a href="{{ route('appointment.make') }}" class="text-dark fw-bold"
                                                style="text-decoration: underline!important;">Make
                                                Appointment</a>
                                        </div>
                                    </div>
                                </div>
                                @if ($key + 1 !== count($maps))
                                    <hr class="bg-light">
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('customJs')
   
@endpush
