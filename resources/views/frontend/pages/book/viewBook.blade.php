@extends('frontend.layouts.app')
@section('main')
    @push('customCSS')
        <style>
            .yellow {
                color: yellow;
            }
        </style>
    @endpush
    <section class="py-md-5 my-5 ">
        <div class="container px-2">
            <div class="row mb-24">
                <div class="col-md-4 mb-3 mb-md-0">
                    <img loading="lazy" style="object-fit: cover;" class="rounded w-100 h-100 border"
                        src="{{ useImage($book->thumbnail) }}" alt="" />
                </div>
                <div class="col-md-8">
                    <div class="w-100 h-100 p-3">
                        <div class="">
                            <h5 class="text-capitalize fs-3 mb-0">{{ $book->title }}</h5>
                            <span class="">by </span> <i style="font-weight: 500;">{{ $book->author }}</i>
                            <p class="mb-3 fw-bold fs-5">
                                Price:
                                <span class="text-dark" style="font-weight: 500;"> {{ $book->price }}</span>
                                <span class="mdi mdi-currency-bdt text-dark"></span>
                            </p>
                            <p class="mw-2xl mb-5">
                                {{ $book->description }}
                            </p>
                        </div>
                        <div class="d-flex gap-3">
                            <x-backend.ui.button type="custom"
                                href="{{ route('payment.create', ['model' => Book::class, 'id' => $book->id]) }}"
                                class="btn-success text-light px-3 py-2 d-inline-flex align-items-center justify-content-center gap-2">
                                <span class="mdi mdi-cart-outline"></span>
                                <span style="font-weight: 500;">Buy Now</span>
                            </x-backend.ui.button>

                            <x-backend.ui.button type="custom" href="" style="background: var(--bs-gray-400);"
                                class="text-dark py-2 px-3 d-inline-flex align-items-center justify-content-center gap-2">
                                <span class="mdi mdi-download"></span>
                                <span style="font-weight: 500;">Download Sample</span>
                            </x-backend.ui.button>
                        </div>
                    </div>
                </div>
                <div class="p-3 mt-3">
                    <h5>Description:</h5>
                    <div class="text-muted">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, rerum ipsum aliquid voluptates
                        architecto provident amet nemo. Temporibus dolorum qui impedit tempore vel repudiandae totam
                        tenetur. Maiores, et, tempore nam quae deleniti corrupti sit blanditiis debitis dicta autem id
                        dolorem doloremque magni amet consequuntur dolores eveniet distinctio natus quia repudiandae.
                        Temporibus corrupti doloribus, repellat, itaque totam rerum asperiores iusto enim quisquam, vero
                        quaerat! Expedita laudantium ipsam obcaecati placeat commodi libero quae eveniet labore illo
                        voluptatem soluta consequuntur, aliquid quia iusto, dolore odit ipsum eos, corrupti quos sapiente?
                        Sit consequuntur voluptatum recusandae ullam ipsa maxime ea, enim officiis earum, dignissimos sint?
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <x-review-section :item="$book" :reviews="$reviews" :slug="'book'" :can-review="$canReview" />
            </div>


        </div>
    </section>
@endsection
