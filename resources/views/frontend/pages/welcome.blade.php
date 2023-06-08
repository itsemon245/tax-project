@extends('frontend.layouts.app')
@section('main')
    <x-frontend.hero-section :banners="$banners" />
    <x-frontend.products-section :productCategory="$productCategory" />

    <section class="px-lg-5 px-2 my-5">
        <h4 class="text-center my-5" style="font-size:28px; font-weight:600;">{{$subCategories[0]->serviceCategory->name}}</h4>
        <div class="row mx-lg-5 mx-2">
            @foreach ($subCategories as $sub)
            <div class="col-md-4 col-lg-3 col-sm-6">
                <div class="d-flex flex-column align-items-center">
                    <img style="width:150px;aspect-ratio:1/1;" class="rounded rounded-circle mb-3"
                        src="{{ useImage($sub->image) }}" alt="">
                    <a class="text-dark text-capitalize" href="{{route('service.sub', $sub->id)}}"><h6>{{$sub->name}}</h6></a>
                    <p class="text-center text-muted">{{$sub->description}}</p>
                </div>
            </div>
            @endforeach
            
        </div>
    </section>
    
    <x-frontend.appointment-section :sections="$appointmentSections" />


    <!-- Center modal content -->
    <div class="modal fade" id="appointmentTypeModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myCenterModalLabel">Choose Appointment Type</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center gap-5 p-5">
                    <a href="{{route('appointment.make', 1)}}" class="border shadow d-inline-flex flex-column align-items-center rounded p-2 gap-2">
                        <img src="{{asset('frontend/assets/images/physical-appointment.png')}}" class="rounded" style="width:120px;aspect-ratio:1/0.9;" alt="">
                        <h6 class="mb-0 text-dark" style="font-family: 'Poppins">Physical</h6>
                    </a>
                    <a href="{{route('appointment.make', 0)}}" class="border shadow d-inline-flex flex-column align-items-center rounded p-2 gap-2">
                        <img src="{{asset('frontend/assets/images/virtual-appointment.png')}}" class="rounded" style="width:120px;aspect-ratio:1/0.9;" alt="">
                        <h6 class="mb-0 text-dark" style="font-family: 'Poppins">Virtual</h6>
                    </a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <x-frontend.info-section :title="$infos1[0]->title" class="text-capitalize">
        @foreach ($infos1 as $info)
            <x-frontend.info-card :$info />
        @endforeach
    </x-frontend.info-section>
    <x-frontend.info-section :title="$infos2[0]->title" class="text-danger text-capitalize">
        @foreach ($infos2 as $info)
            <x-frontend.info-card :$info />
        @endforeach
    </x-frontend.info-section>
    <x-frontend.testimonial-section :testimonials="$testimonials">
    </x-frontend.testimonial-section>
@endsection
