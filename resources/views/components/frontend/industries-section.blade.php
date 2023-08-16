@php
use App\Models\Industry;
    $industries = Industry::limit(6)->orderBy('id', 'DESC')->get();
@endphp
<section class="row px-lg-5 px-2 mt-5">
    <h3 class="text-center">Industries We Serve</h3>
    <div class="d-flex justify-content-center">
        <div class="container">
            <div class="row">
                <div>
                    {!! $industries[0]->page_description !!}
                </div>
                @foreach ($industries as $industry)
                    <div class="col-md-4 col-sm-6 mb-3">
                        <div class="border bg-light w-100 px-0 px-md-3 px-lg-5 py-3 rounded">
                            <a class="text-dark">
                                <div class="d-flex">
                                    <img style="width:48px;"
                                    src="{{ $industry->logo }}" class="rounded" alt="" />
                                <h6 class="px-3">{{ $industry->name }}</h6>
                                </div>
                                <p class="tex-justify text-muted">{!! Str::limit($industry->description, 80, '...') !!}</p>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="d-flex justify-content-center">
                <a class="btn btn-secondary text-black mt-3" href="{{ route('show.all.industries') }}">All Industries</a>
            </div>
        </div>
    </div>
</section>
