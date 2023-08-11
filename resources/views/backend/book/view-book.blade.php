@extends('backend.layouts.app')


@section('content')
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Book', 'List']" />

    <x-backend.ui.section-card name="Book Section">

        <x-backend.table.basic>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Book Category Name</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Sample Pdf</th>
                    <th>Pdf</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($books as $key => $book)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $book->bookCategory->book_category }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ Str::limit($book->description, 20, '...') }}</td>
                        <td><a href="{{ useImage($book->sample_pdf) }}"><img src="{{ asset('images/pdf-icon-4.png') }}"
                                    alt="" width="40"></a></td>
                        <td><a href="{{ useImage($book->pdf) }}"><img src="{{ asset('images/pdf-icon-4.png') }}" alt=""
                                    width="40"></a></td>
                        <td>{{ $book->price }}/-</td>
                        <td>
                            <x-backend.ui.button type="edit" :href="route('book.edit', $book->id)" class="btn-sm" />
                            <x-backend.ui.button type="delete" :action="route('book.destroy', $book->id)" class="btn-sm" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-backend.table.basic>


    </x-backend.ui.section-card>


    @push('customJs')
        <script></script>
    @endpush
@endsection
