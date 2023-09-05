@php
    use App\Models\Industry;
    $industries = Industry::limit(6)->get();
@endphp
<section class="row px-lg-5 px-2 mt-5">
    <h3 class="text-center">Industries We Serve</h3>
    <div class="d-flex justify-content-center">
        <div class="container">
            <div class="row">
                <div class="mb-3">
                    {!! $industries[0]->page_description !!}
                </div>
                @foreach ($industries as $industry)
                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="border bg-light w-100 px-0 px-md-3 px-lg-5 py-3 rounded h-100">
                            <a class="text-dark" href="{{ route('industry.page.show', $industry->id) }}">
                                <div class="d-flex">
                                    <img style="width:64px;" src="{{ useImage($industry->image) }}" class="rounded"
                                        alt="{{ $industry->title }}" />
                                    <h6 class="px-3">{{ $industry->title }}</h6>
                                </div>
                                <p class="tex-justify text-muted mt-2" style="max-width: 35ch;">{!! $industry->intro !!}</p>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="d-flex justify-content-center">
                <a class="btn btn-secondary text-black mt-3" href="{{ route('industry.page.index') }}">All
                    Industries</a>
            </div>
        </div>
    </div>
</section>
