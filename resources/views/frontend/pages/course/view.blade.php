@extends('frontend.layouts.app')
@section('main')
    {{-- jquery script start --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div id="carouselExampleFade" class="border-bottom carousel slide carousel-fade" data-bs-ride="carousel">

        <div class="mt-4" style="height: 300px;">
            <div class="row h-100 ps-5">
                <div class="col-md-6 mt-3 h-100">
                    <p class="mt-3 ps-5">Tax Prepration course one</p>
                    <h4 class="mt-3 ps-5">A meaningful carrer starts here.</h4>
                    <p class="mt-3 ps-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam in maiores quidem iste
                        animi natus earum magni. Autem, veritatis perspiciatis. Earum nobis provident quisquam nulla
                        assumenda quam fugiat, voluptatem numquam eligendi, neque tenetur corrupti sed? Recusandae suscipit
                        ullam libero</p>
                    <div class="ps-5">
                        <x-backend.ui.button class="btn-success d-block">Enroll in our tax one</x-backend.ui.button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mt-4 pt-5">
                        <img src="{{ asset('backend/assets/images/products/product-3.png') }}"
                            style="width: 300px;height:180px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="col-md-6 shadow-lg mt-4 mb-4">
            <h3 class="text-center mt-4">New to tax prep but love numbers?</h3>
            <p class="text-center px-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur voluptas nam
                voluptatum, molestias impedit dolore! Dolor quis, cumque exercitationem dicta iusto atque dolorum eaque
                repudiandae odio! Ut reprehenderit temporibus voluptate aliquam? Cum, soluta reiciendis velit blanditiis ea
                molestiae rem odit. Est ipsam molestiae delectus minima, dicta praesentium modi quos? Atque deleniti,
                dolorum numquam reiciendis corrupti tenetur quibusdam officiis dignissimos corporis.</p>
            <div class="ps-5 d-flex justify-content-center text-center">
                <x-backend.ui.button class="mb-3 btn-dark  d-block">Enroll in our tax course</x-backend.ui.button>
            </div>
        </div>
        <div class="col-md-6 shadow-lg mt-4 mb-4">
            <h3 class="text-center mt-4">Already have tax prep experience?</h3>
            <p class="text-center px-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur voluptas nam
                voluptatum, molestias impedit dolore! Dolor quis, cumque exercitationem dicta iusto atque dolorum eaque
                repudiandae odio! Ut reprehenderit temporibus voluptate aliquam? Cum, soluta reiciendis velit blanditiis ea
                molestiae rem odit. Est ipsam molestiae delectus minima, dicta praesentium modi quos? Atque deleniti,
                dolorum numquam reiciendis corrupti tenetur quibusdam officiis dignissimos corporis.</p>
            <div class="ps-5 d-flex justify-content-center text-center">
                <a href="{{ route('mcq.test') }}">
                    <x-backend.ui.button class="mb-3 btn-dark  d-block">Start the assessment</x-backend.ui.button>
                </a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h2 class="d-flex justify-content-center text-center">Learn more about the course.</h2>
            <p class="mt-3 d-flex justify-content-center text-center">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo assumenda nobis voluptate ex eum omnis
                necessitatibus eaque exercitationem harum, totam at sequi magni maxime tempore expedita nisi voluptatum
                laborum asperiores.
            </p>
            <div class="row">
                <div class="col-md-4 d-flex justify-content-center">
                    <img src="{{ asset('frontend/assets/images/e-learning.png') }}" alt="">
                </div>
                <div class="col-md-4 d-flex justify-content-center">
                    <img src="{{ asset('frontend/assets/images/e-learning.png') }}" alt="">
                </div>
                <div class="col-md-4 d-flex justify-content-center">
                    <img src="{{ asset('frontend/assets/images/e-learning.png') }}" alt="">
                </div>
                <div class="d-flex justify-content-center">
                    <x-backend.ui.button class="mb-3 btn-info d-block">Enroll now</x-backend.ui.button>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <iframe width="100%" height="650" src="https://www.youtube.com/embed/tgbNymZ7vqY">
        </iframe>
    </div>
    <div class="continer">
        <div class="row">
            <div class="col-md-6 mt-5 mb-4 d-flex justify-content-center text-center ">
                <ul>
                    <h2>Tax Course Included:</h2>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                </ul>
            </div>
            <div class="col-md-6 mt-4 d-flex justify-content-center text-center ">
                <ul>
                    <h2>Graduates Receive:</h2>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bg-light mt-3 mb-4 ">
        <h3 class="text-center pt-4">Lorem ipsum dolor sit.</h3>
        <p class="text-center mt-3 py-5 pt-4 px-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, commodi
            accusantium! Reprehenderit, nulla at debitis voluptatibus id necessitatibus tenetur vero magnam, impedit iusto
            consectetur fugiat fugit excepturi obcaecati rerum laboriosam optio ipsa commodi ab itaque ad odio sapiente
            maiores blanditiis. Perferendis, mollitia reiciendis.</p>
    </div>
    <div class="continer">
        <div class="row">
            <div class="col-md-4 mt-5 mb-4 d-flex justify-content-center text-center ">
                <ul>
                    <h2>Tax Course Included:</h2>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                </ul>
            </div>
            <div class="col-md-4 mt-4 d-flex justify-content-center text-center ">
                <ul>
                    <h2>Graduates Receive:</h2>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                </ul>
            </div>
            <div class="col-md-4 mt-4 d-flex justify-content-center text-center ">
                <ul>
                    <h2>Graduates Receive:</h2>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                </ul>
            </div>
        </div>
    </div>

    @push('customJs')
    @endpush
@endsection

































{{--         
        @push('customJs')
            <script>
                // const images = $('.hero-image')
                // $.each(images, (index, image) => {
                //     image.addEventListener('load', () => {
                //         const color = extractColor.getImageColor(image)
                //         const textColor = extractColor.getContrastColor(color)
                //         console.log(textColor);
                //         $(`#hero-content-${image.id}`).css('color', `${textColor}!important`)
                //         // console.log( $(`#hero-content-${image.id}`).css('color'));
                //     })
                // });
            </script>
        @endpush --}}
