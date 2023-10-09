<section class="" style="background: var(--bs-gray-100);">
    <div id="appointmentSection" class="carousel slide pointer-event" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($sections as $key => $item)
                <li data-bs-target="#appointmentSection" data-bs-slide-to="{{ $key }}"
                    class="{{ $sections[0]->id === $item->id ? 'active' : '' }}"
                    aria-current="{{ $sections[0]->id === $item->id ? 'true' : 'false' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner p-5" role="listbox">
            @foreach ($sections as $item)
                <div class="carousel-item {{ $sections[0]->id === $item->id ? 'active' : '' }}">
                    <div class="row align-items-cetner justify-content-center mx-3">
                        <div class="col-md-5 pe-3">
                            <div class="row justify-content-center">
                                <img class="mb-2 rounded-3 p-0" loading="lazy" style="max-width:350px; object-fit:cover;"
                                    src="{{ useImage($item->image) }}" alt="">
                            </div>
                        </div>
                        <div class="col-md-5 align-self-center justify-self-center ps-3">
                            <div>
                                <h2 class="mb-0" style="font-size:30px;font-weight:600;">{{$item->title}}</h2>
                                <p class="mb-1" style="font-size:20px;font-weight:400;">{{$item->sub_title}}</p>
                                <span class="mb-0 px-3 py-1 bg-success rounded text-light text-capitalize"
                                    style="font-size:18px;font-weight:400;">{{$item->tag}}</span>
                            </div>
                            <div class="my-4" style="max-width:500px;text-align:justify;">
                                {{$item->description}}
                            </div>
                            <div class="d-flex gap-3 align-items-center flex-wrap">
                                 <!-- Center modal -->
                                <a class="btn btn-primary waves-effect waves-light" href="{{route('appointment.make')}}">Make Appointment</a>
                                <div class="me-2">
                                    <a class="text-capitalize a d-flex align-items-center gap-2" href="{{route('office')}}">
                                        <span class="mdi mdi-map-marker-outline  text-primary"></span>
                                        Our Office
                                    </a>
                                </div>
                                <div class="me-2">
                                    <a class="text-capitalize a d-flex align-items-center gap-2" href="{{route('expert.browse')}}">
                                        <img loading="lazy" src="{{ asset('frontend/assets/icons/tax-expert-icon.svg') }}"
                                            alt="">
                                        Tax Expert
                                    </a>
                                </div>
                                <div>
                                    <a class="text-capitalize a d-flex align-items-center gap-2" href="{{route('tax.calculator')}}">
                                        <span class="mdi mdi-calculator-variant-outline  text-primary"></span>
                                        Tax Calculator
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#appointmentSection" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#appointmentSection" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
</section>
