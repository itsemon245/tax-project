@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Book', 'Create']" />

    <x-backend.ui.section-card name="Book Section">

        <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">


                <div class="col-md-6 mt-3">
                    <x-backend.form.image-input name="book_image" required />
                </div>

                <div class="col-md-6">

                    <div class="row">

                        <div class="col-md-6">
                            <x-backend.form.text-input label="Book Title" required type="text" name="book_title">
                            </x-backend.form.text-input>
                        </div>

                        <div class="col-md-6">
                            <x-backend.form.text-input label="Author" required type="text" name="author">
                            </x-backend.form.text-input>
                        </div>


                        <div class="col-md-6">
                            <x-backend.form.text-input label="Sample pdf" required type="file" name="sample_pdf">
                            </x-backend.form.text-input>
                        </div>

                        <div class="col-md-6">
                            <x-backend.form.text-input label="Pdf" required type="file" name="pdf">
                            </x-backend.form.text-input>
                        </div>

                        <div class="col-md-12">
                            <label for="book_desc">Book Description</label>
                            <textarea required type="text" name="book_desc" class="form-control" rows="4"></textarea>
                        </div>


                        <div class="col-md-12">
                            <x-backend.form.text-input label="Price" required type="number" name="price">
                            </x-backend.form.text-input>
                        </div>

                        <div class="col-md-12">
                            <x-backend.ui.button type="submit" class="btn-primary mt-2">Create</x-backend.ui.button>
                        </div>



                    </div>

                </div>

            </div>

        </form>

    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
