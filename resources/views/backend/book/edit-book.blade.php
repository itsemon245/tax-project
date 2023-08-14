@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Book', 'Create']" />

    <x-backend.ui.section-card name="Book Section">

        <form action="{{ route('book.update', $book->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">


                <div class="col-md-6 mt-3">
                    <x-backend.form.image-input name="book_image" :image="$book->thumbnail" />
                </div>


                <div class="col-md-6">

                    <div class="row">

                        <div class="col-md-6">
                            <x-backend.form.select-input id="section" label="Book Category Name" name="book_category_id"
                                placeholder="Choose Book Category...">
                                @forelse ($bookCategories as $bookCategory)
                                    <option value="{{ $bookCategory->id }}" {{$bookCategory->id == $book->book_category_id ? 'selected' : ''}}>{{ $bookCategory->book_category }}</option>
                                @empty
                                @endforelse
                            </x-backend.form.select-input>
                        </div>

                        <div class="col-md-6">
                            <x-backend.form.text-input label="Book Title" required type="text" name="book_title"
                                value="{{ $book->title }}" />
                        </div>

                        <div class="col-md-6">
                            <x-backend.form.text-input label="Author" required type="text" name="author"
                                value="{{ $book->author }}" />
                        </div>


                        <div class="col-md-6">
                            <x-backend.form.text-input label="Sample pdf" type="file" name="sample_pdf" />
                        </div>

                        <div class="col-md-6">
                            <x-backend.form.text-input label="Pdf" type="file" name="pdf" />
                        </div>

                        <div class="col-md-12">
                            <label for="book_desc">Book Description</label>
                            <textarea required type="text" name="book_desc" class="form-control" rows="4">+{{ $book->description }}</textarea>
                        </div>


                        <div class="col-md-12">
                            <x-backend.form.text-input label="Price" required type="number" name="price"
                                value="{{ $book->price }}" />
                        </div>

                        <div class="col-md-12">
                            <x-backend.ui.button class="btn-primary mt-2">Update</x-backend.ui.button>
                        </div>

                    </div>

                </div>

        </form>

    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
