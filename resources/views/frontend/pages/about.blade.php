@extends('frontend.layouts.app')
@section('main')
    <x-frontend.hero-section :banners="getRecords('banners')" />
    <div class="row mt-4 mb-4 ">
        {{-- About us section --}}
        <h3 class="d-flex justify-content-center mb-4">ABOUT US</h3>
        <div class="col-md-11 d-flex justify-content-center mx-5">
            <div class="text-bg-secondary p-4">
                <h5 class="d-flex justify-content-left p-3 mx-5">Lorem ipsum dolor sit amet.</h5>
                <p class="d-flex justify-content-left p-3 mx-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit repudiandae, nisi omnis fuga quis expedita, culpa ad beatae mollitia maxime commodi non? Excepturi omnis laborum voluptatem? Nobis adipisci eum eius ipsam deleniti ipsa delectus qui! Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae optio dignissimos natus molestiae ut dolorum cum quaerat ratione dolores soluta. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus maxime iusto dolore cumque repudiandae aperiam aspernatur. Eveniet deserunt nobis sit aspernatur incidunt tenetur, reiciendis numquam iusto. Velit perspiciatis neque ipsam.</p>
            </div>
        </div>
    </div>

    {{-- Section --}}
    <div class="row h-400 mx-5 border text-bg-secondary">
        <div class="col-md-6">
           <div class="p-5 col-md-12">
            <img src="{{ asset('frontend/assets/images/products/product-11.jpg') }}" style="width: 100%;height:200px;">
           </div>
        </div>
        <div class="col-md-6 p-5">
            <h4>Lorem ipsum dolor sit amet.</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto doloribus tempora et ipsam quo ullam exercitationem optio consequatur culpa omnis error, quidem magnam ut inventore natus minus rem, commodi earum suscipit vel minima voluptate numquam est. Labore nam rem voluptatem?</p>
        </div>
    </div>
    <h3 class="d-flex justify-content-center mt-5">Lorem ipsum dolor sit amet.</h3>
    <x-frontend.info-section :title="$infos2[0]->title" class="text-danger text-capitalize">
        @foreach ($infos2 as $info)
            <x-frontend.info-card :$info />
        @endforeach
    </x-frontend.info-section>
    <x-frontend.testimonial-section :$testimonials>
    </x-frontend.testimonial-section>
    {{-- About us content --}}
@endsection