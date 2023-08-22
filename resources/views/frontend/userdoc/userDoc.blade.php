@extends('frontend.layouts.app')

@section('main')
    @push('customCss')
        <style>
            #myDocumnets {
                padding: 60px 0;
                font-family: 'Poppins', sans-serif;
            }

            h1.myDocsHead {
                font-size: 2rem;
                font-weight: 500;
            }

            .myDocsHeadPara {
                padding: 10 0;
            }

            .cross-icon {
                position: absolute;
                right: 20px;
                top: 20px;
            }
        </style>
    @endpush

    <div id="myDocumnets">
        <div class="container">
            <div class="row">

                <div class="my_header text-center">
                    <h1 class="myDocsHead">Upload Your Document</h1>
                    <h2 class="myDocsHead">Protecting your personal information is important to us</h2>
                    <p class="myDocsHeadPara">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Atque quasi
                        officiis
                        aut voluptate, id quis
                        iusto facilis pariatur dicta corrupti?</p>
                </div>
                <div class="d-flex gap-4 align-items-end">
                    <a id="upload-btn" href="{{ route('user-doc.create') }}" class="btn btn-success mb-2">Upload New
                        Document</a>
                    <div class="">
                        <x-backend.form.select-input label="Tax Year" placeholder="Select Tax Year..." name="year">
                            @foreach (range(currentYear(), 2020) as $year)
                                <option value="{{ $year - 1 . '-' . $year }}" @selected($year - 1 . '-' . $year === $reqYear)>
                                    {{ $year - 1 . '-' . $year }}</option>
                            @endforeach
                        </x-backend.form.select-input>
                    </div>
                    <a id="load-btn" href="{{ route('user-doc.index') . '?year=' . currentFiscalYear() }}"
                        class="btn btn-info mb-2">
                        <span class="mdi mdi-reload font-16 me-2"></span>Load Documents</a>
                </div>

                <div class="row mt-3">
                    @forelse ($userDocs as $i => $doc)
                        <div class="col-sm-6 col-lg-4">
                            <div class="card h-100  position-relative">
                                <div class="card-body h-100  py-3">
                                    <div class="">
                                        @foreach ($doc->files as $key => $file)
                                            <span
                                                class="btn {{ $key === 0 ? 'btn-success' : 'btn-light' }} rounded-3 text-uppercase">{{ $file->mimeType }}</span>
                                        @endforeach
                                        <h2 class="pt-3">{{ $doc->name }}</h2>
                                    </div>
                                    <div class="col-lg-12 d-flex justify-content-between align-items-center">
                                        <div class="myDoc_info">
                                            <p>Submitted on: {{ $doc->created_at->format('d M, Y') }}</p>
                                            <span class="mdi mdi-file-outline font-16"></span><span>{{ count($doc->files) }}
                                                Files</span>
                                        </div>
                                        <div class="icon">
                                            <span><i class="fas fa-ellipsis-h show-menu"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div id="doc-menu-{{ $i }}"
                                    class="card bg-success py-3 h-100 w-100 position-absolute top-0 start-0 d-none">
                                    <div class="card-body">
                                        <div class="cross-icon">
                                            <span class="mdi mdi-close close-menu"></span>
                                        </div>
                                        <ul class="list-unstyled fw-medium mb-0">
                                            <li class="my-3"><a class="text-white p-3 "
                                                    href="{{ route('user-doc.show', $doc->id) }}">Preview document
                                                </a></li>
                                            <li class="my-3"><a class="text-white p-3 "
                                                    href="{{ route('user-doc.show', $doc->id) }}">View details</a>
                                            </li>
                                            <li class="my-3">
                                                <button data-url='{{ route('user-doc.move-to', $doc->id) }}'
                                                    class="move-to-year text-white px-3 bg-transparent border-0">
                                                    Move to another year</button>
                                                <div class="d-inline-block d-none">
                                                    <div class="d-flex">
                                                        <x-backend.form.select-input placeholder="Select Tax Year..."
                                                            name="move-year">
                                                            @foreach (range(currentYear(), 2020) as $year)
                                                                <option value="{{ $year - 1 . '-' . $year }}"
                                                                    @selected($year - 1 . '-' . $year === $reqYear)>
                                                                    {{ $year - 1 . '-' . $year }}</option>
                                                            @endforeach
                                                        </x-backend.form.select-input>
                                                    </div>
                                                </div>

                                            <li class="">
                                                <form action="{{ route('user-doc.destroy', $doc->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="delete-doc text-danger d-block px-3 bg-transparent border-0">
                                                        Delete document</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-8">
                            <div class="bg-light h-100 d-flex align-items-center justify-content-center rounded">
                                <p class="text-muted mb-0">No Documents Uploaded in {{ $reqYear }}</p>
                            </div>
                        </div>
                    @endforelse

                    <div class="col-lg-4 col-12">
                        <div class="p-3 h-100 bg-light rounded">
                            <h2 class="">Upload Tips:</h2>
                            <ul class="px-3 mb-0">
                                <li class="p-1">Only upload your prior year tax return here. We will ask for other forms
                                    later</li>
                                <li class="p-1">Make sure your pdf isn't password protected</li>
                            </ul>
                        </div>
                    </div>

                </div>



            </div>
        </div>
    </div>

    @push('customJs')
        <script>
            $(document).ready(function() {
                $('.move-to-year').click(function(e) {
                    let btn = $(this)
                    btn.next().toggleClass('d-none')
                    btn.next().find('select').on('change', function(e) {
                        let url = btn.attr('data-url') + "?year=" + e.target.value
                        location.assign(url)
                    })
                })

                $('.show-menu').each(function(i, element) {
                    $(element).click(function() {
                        let menu = $(this).parents().find('#doc-menu-' + i)
                        console.log(menu);
                        menu.toggleClass('d-none')
                    })
                })
                $('.close-menu').each(function(i, element) {
                    $(element).click(function() {
                        let menu = $(this).parents().find('#doc-menu-' + i)
                        console.log(menu);
                        menu.toggleClass('d-none')
                    })
                })

                $('select[name="year"]').on('change', e => {
                    let btn = $('#load-btn');
                    let upload = $('#upload-btn');
                    let url = btn.attr('href').split('=').shift() + "=" + e.target.value
                    let upUrl = upload.attr('href') + "?year=" + e.target.value
                    btn.attr('href', url)
                    upload.attr('href', upUrl)
                })

                var deleteBtn = $('.delete-doc');
                deleteBtn.on('click', function(e) {
                    e.preventDefault()
                    var form = $(this).parent()
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            form.submit()
                        }
                    })
                })
            });
        </script>
    @endpush
@endsection
