@extends('frontend.layouts.app')

@section('main')

    @php
        $banners = getRecords('banners');
        $exptcategories = getRecords('expert_categories');
        // dd($exptcategories);
    @endphp
    <x-frontend.hero-section :banners="$banners" />

    <div id="browse_section">
        <div class="px-lg-5 px-2">
            <div class="d-flex center_sm">
                <h2 class="browse_header">Browse Experts</h2>
                <div class="line">
                    <div class="circle_left"></div>
                    <div class="circle_right"></div>
                </div>
            </div>
            <div class="row" id="hx-filtered-experts">
                <div class="col-12">
                    <button onclick="filter.clickHandler(event)" id="filter-menu-btn" data-target="#filter-menu"
                        class="btn btn-secondary text-dark rounded-1 d-lg-none mb-3 fw-medium waves-effect waves-dark">
                        <span class="mdi mdi-filter font-14"></span>
                        Filter
                    </button>
                </div>
                <div id="filter-menu" class="col-6 col-sm-6 col-md-4 col-lg-3 d-none d-lg-block">
                    <form hx-get="{{ route('expert.browse') }}" hx-target="#hx-filtered-experts" hx-swap="outerHTML"
                        hx-select="#hx-filtered-experts" hx-push-url="true" method="get">
                        <div class="filter-menu p-3 shadow bg-light rounded-2 ">
                            <div class="filters">
                                <x-range-slider class="" tooltips="false" name="experience" id="experience"
                                    :from="$minExp" :to="$maxExp" :min-value="request()->query('experience_from')" :max-value="request()->query('experience_to')" step='1'
                                    icon="Yrs" :is-dropdown="true"></x-range-slider>

                                <div class="card">
                                    <div class="card-header py-1" role="button">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="">Location</div>
                                            <span class="mdi mdi-chevron-down"></span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @php
                                            $selectedDistrict = request()->query('district');
                                            $selectedThana = request()->query('thana');
                                            $selectedBranch = request()->query('branch');
                                        @endphp
                                        <x-form.selectize class="mb-2" id="district" name="district" label="District"
                                            placeholder="District">
                                            @foreach ($districts as $district)
                                                <option value="{{ $district }}" @selected($district === $selectedDistrict)>
                                                    {{ $district }}</option>
                                            @endforeach
                                        </x-form.selectize>
                                        <x-form.selectize class="mb-2" id="thana" name="thana" label="Thana"
                                            placeholder="Thana">
                                            @foreach ($thanas as $thana)
                                                <option value="{{ $thana }}" @selected($thana === $selectedThana)>
                                                    {{ $thana }}</option>
                                            @endforeach
                                        </x-form.selectize>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header py-1" role="button">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="">Categories</div>
                                            <span class="mdi mdi-chevron-down"></span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @php
                                            $catCollection = collect(request()->query('categories'));
                                        @endphp
                                        @foreach ($exptcategories as $exptcategory)
                                            <label class="filter form-check-label"
                                                for="{{ str($exptcategory->name)->slug() }}">
                                                <input type="checkbox" class="form-check-input" name="categories[]"
                                                    value="{{ $exptcategory->name }}"
                                                    id="{{ str($exptcategory->name)->slug() }}"
                                                    @checked($catCollection->contains(fn($val) => $val === $exptcategory->name)) />
                                                <span class="ms-3">{{ $exptcategory->name }}</span>
                                            </label>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header py-1" role="button">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="">Job Title</div>
                                            <span class="mdi mdi-chevron-down"></span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @php
                                            $postCollection = collect(request()->query('posts'));
                                        @endphp
                                        @foreach ($posts as $post)
                                            <label class="filter form-check-label" for="{{ str($post)->slug() }}">
                                                <input type="checkbox" class="form-check-input" name="posts[]"
                                                    value="{{ $post }}" id="{{ str($post)->slug() }}"
                                                    @checked($postCollection->contains(fn($val) => $val === $post))>
                                                <span class="ms-3">{{ $post }}</span>
                                            </label>
                                            <br>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="d-flex gap-3 justify-content-center mt-3">
                                    <x-backend.ui.button type="custom" :href="route('expert.browse')"
                                        class="btn-outline-primary mb-0">Clear</x-backend.ui.button>
                                    <x-backend.ui.button class="btn-primary">Apply</x-backend.ui.button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-9">
                    @if (count(request()->query()) > 0)
                        <div class="d-flex justify-content-center align-items-center gap-3 p-2 my-2">
                            <h5 class="mb-0 text-warning"><span class="mdi mdi-alert-outline text-warning font-18"></span>
                                Filters Applied</h5>
                            <x-backend.ui.button type="custom" :href="route('expert.browse')"
                                class="btn-sm btn-outline-danger text-bold">
                                <span class="mdi mdi-close font-14"></span>
                                Clear Filters</x-backend.ui.button>
                        </div>
                    @endif
                    <div class="row">
                        @forelse ($experts as $expert)
                            <div class="col-sm-6 col-md-4 col-lg-4 col-xxl-3 mb-3">
                                <div class="card h-100 mx-3 mx-sm-0">
                                    <div class="card-body">
                                        <div class="d-flex gap-3 justify-content-center mb-3">
                                            <div class="d-flex flex-column align-items-center">
                                                <img loading="lazy" src="{{ useImage($expert->image) }}" width="64px"
                                                    height="64px;" alt="" class="rounded rounded-circle mb-2"
                                                    style="object-fit: cover;">
                                                <div class="d-block">
                                                    <x-avg-review-stars icon-font="font-14" :avg="$expert->reviews_avg_rating" />
                                                    <div>Rating: {{ $expert->reviews_avg_rating ?? 0 }}</div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="font-lg-18 fw-bold">{{ $expert->name }}</div>
                                                <span
                                                    class="badge bg-success text-wrap">{{ str($expert->post)->limit(15, '...') }}</span>
                                                <div class="mt-1 fw-medium">Experience: {{ $expert->experience }} years
                                                </div>
                                                <h5 class="text-primary fw-medium" style="text-wrap:balance!important;">
                                                    @foreach ($expert->expertCategories as $key => $expertCategory)
                                                        {{ $expertCategory->name }}
                                                        @if ($key + 1 !== $expert->expertCategories->count())
                                                            ,
                                                        @endif
                                                    @endforeach
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center px-md-3">
                                            <a href="{{ route('consultation.make', $expert->id) }}"
                                                class="btn btn-primary fw-medium  w-100 mb-2">
                                                Consultation
                                            </a>
                                            <a href="{{ route('expert.profile', $expert->id) }}"
                                                class="btn btn-outline-primary fw-medium w-100 mb-2">Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="bg-light text-center">
                                    <div class="d-flex flex-column justify-content-center" style="height: 50vh;">
                                        No Experts Found!
                                    </div>
                                </div>
                            </div>
                        @endforelse
                        <div class="col-12 mt-2">
                            <div class="paginator float-end">
                                {{ $experts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-frontend.testimonial-section :testimonials="$reviews">
    </x-frontend.testimonial-section>
@endsection


@push('customJs')
    <script>
        const filter = {
            toggle: {
                btnIcon: function(jQBtn) {
                    jQBtn.find('.mdi')
                        .toggleClass('mdi-filter')
                        .toggleClass('mdi-close')

                },
                content: function(target) {
                    target.next().toggleClass('col-6 col-sm-6 col-md-8')
                    target.next().find('.row').children()
                        .toggleClass('col-sm-6 col-md-4')
                        .toggleClass('col-sm-12 col-md-6')
                },
                menu: function(target) {
                    return target
                        .toggleClass('d-none d-lg-block')
                },

            },
            clickHandler: function(event) {
                let btn = $(event.target)
                let target = $(event.target.dataset.target)
                this.toggle.btnIcon(btn)
                this.toggle.menu(target)
                this.toggle.content(target)

            }
        }
        const headers = $('form .card-header')
        headers.each((i, header) => {
            $(header).click(e => {
                let icon = $(header).find('.mdi');
                icon.toggleClass('mdi-chevron-down')
                icon.toggleClass('mdi-chevron-up')
                $(header).next().slideToggle();
            })
        })

        $('#thana').on('change', e => {
            let thana = e.target.value
            let url = "{{ route('ajax.get.branches', 'THANA') }}"
            if (thana !== '') {
                url = url.replace('THANA', thana)
                $.ajax({
                    type: "get",
                    url: url,
                    success: function(response) {
                        $('#branch').children().remove()
                        console.log(response);
                        console.log($('#branch'));
                        $('#branch').append(
                            `<option disabled>No branches available</option>`
                        )
                        if (response.length > 0) {
                            $('#branch').children().remove()
                            $('#branch').append(
                                `<option disabled selected>Select Branches</option>`
                            )
                            response.forEach(item => {
                                $('#branch').append(
                                    `<option value="${item.id}">${item.location}</option>`
                                )
                            });
                        }
                    }
                });
            }
        })
    </script>
@endpush
