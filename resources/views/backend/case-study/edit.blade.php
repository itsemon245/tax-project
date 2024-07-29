@extends('backend.layouts.app')
@section('content')
    <x-backend.ui.breadcrumbs :list="['Dashboard', 'Frontend', 'Course', 'Case Study']" />

    <x-backend.ui.section-card name="Case Study Create">
        <form action="{{ route('case-study.update', $caseStudy->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card p-3">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <x-backend.form.text-input label="Name" type="text" name="name"
                            value="{{ $caseStudy->name ?? '' }}">
                        </x-backend.form.text-input>
                        <x-form.text-area name="intro" placeholder="Intro"
                            label="intro">{{ $caseStudy->intro }}</x-form.text-area>
                    </div>

                    <div class="col-md-6 mb-2">
                        <x-form.ck-editor id="ck-editor1" name="description" placeholder="Description"
                            label="Description">{{ $caseStudy->description }}</x-form.ck-editor>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <x-backend.form.image-input name="image" image="{{ $caseStudy->image }}" />
                    </div>
                    <div class="col-md-6">
                        <div class="row">



                            <div class="col-md-12">
                                <x-backend.form.select-input id="packages" label="Package" name="case_study_package_id"
                                    placeholder="Choose Package...">
                                    @forelse ($caseStudyPackage as $package)
                                        <option value="{{ $package->id }}" @selected($package->id === $caseStudy->case_study_package_id)>
                                            {{ $package->name }}</option>
                                    @empty
                                        <option value="yearly">No Package</option>
                                    @endforelse
                                </x-backend.form.select-input>
                            </div>
                            <div class="col-md-12">
                                <x-backend.form.select-input id="categories" label="Category" name="case_study_category_id"
                                    placeholder="Choose Cateogry...">
                                    @forelse ($caseStudyCategory as $category)
                                        <option value="{{ $category->id }}" @selected($category->id === $caseStudy->case_study_category_id)>
                                            {{ $category->name }}</option>
                                    @empty
                                        <option value="yearly">No Category</option>
                                    @endforelse
                                </x-backend.form.select-input>
                            </div>
                            {{-- <div class="col-md-12">
                            <x-backend.form.text-input label="Likes"
                                placeholder="Likes" type="number" name="likes" value="{{$caseStudy->likes ?? '' }}"/>
                            </div> --}}

                            <div class="col-md-12">
                                <x-backend.form.text-input label="Price" placeholder="Price" type="number" name="price"
                                    value="{{ $caseStudy->price === 'Free' ? 0 : $caseStudy->price }}" />
                            </div>

                            <div class="col-md-12">
                                <x-backend.form.text-input label="Upload Files" type="file" name="download_link" />
                            </div>

                            <div class="col-md-4">
                                <x-backend.ui.button class="btn-primary btn btn-sm">Update</x-backend.ui.button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </x-backend.ui.section-card>
    <!-- end row-->

    @push('customJs')
        <script>
            $(document).ready(function() {
                const fetchCategories = (e) => {
                    let url = "{{ route('ajax.caseStudyCategories', 'ID') }}";
                    url = url.replace('ID', e.target.value)
                    $.ajax({
                        type: "get",
                        url: url,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $('#categories').children().remove()
                            response.data.forEach(category => {
                                $('#categories').append(
                                    `<option value="${category.id}">${category.name}</option>`
                                )
                            });
                        }
                    });
                }

                $('#packages').on('change', e => fetchCategories(e))
            });
        </script>
    @endpush
@endsection
