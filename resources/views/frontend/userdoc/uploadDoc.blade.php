@extends('frontend.layouts.app')
@section('main')
    {{-- form start --}}
    <form action="{{ route('user-doc.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="px-5 my-5">
                <h4 class="card-title text-center mb-3">Upload Documents</h4>
                <div class="row mb-2">
                    <div class="col-8">
                        <x-form.selectize id="doc-name" label="Document Name" name="name" placeholder="Document Name">
                            @foreach ($names as $name)
                                <option value="{{ $name }}">{{ $name }}</option>
                            @endforeach
                        </x-form.selectize>
                    </div>
                    <div class="col-4">
                        <x-backend.form.select-input label="Tax Year" placeholder="Select Tax Year..." name="">
                            @foreach (range(2023, 1980) as $year)
                                <option value="">{{ $year . '-' . $year - 1 }}</option>
                            @endforeach
                        </x-backend.form.select-input>
                    </div>
                </div>
                <label class="mb-2">Select Documents</label>
                <x-form.file-pond />
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </div>
    </form>
    {{-- form end --}}


    @push('customJs')
        <script>
            var product_name = $('#product_name');
            var product_slug = $('#product_slug');
            product_name.on('keyup', function() {
                var value = $(this).val();
                var slug = value.split(' ').join('-').toLowerCase();
                product_slug.val(slug)
            })
        </script>
        <script>
            ClassicEditor
                .create(document.querySelector('.editor'))
                .catch(error => {});
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#image').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#show_image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0'])
                })
            })
        </script>
        <script>
            var catName = $('#catName');
            catName.on('keyup', function() {
                var value = $(this).val();
                var convertValue = value.split(' ').join('-').toLowerCase();
                $('#slug').val(convertValue);
            })
        </script>

        <script>
            $(function() {
                // Multiple images preview in browser
                var imagesPreview = function(input, placeToInsertImagePreview) {

                    if (input.files) {
                        var filesAmount = input.files.length;

                        for (i = 0; i < filesAmount; i++) {
                            var reader = new FileReader();

                            reader.onload = function(event) {
                                $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                    placeToInsertImagePreview);
                            }

                            reader.readAsDataURL(input.files[i]);
                        }
                    }

                };

                $('#gallery-photo-add').on('change', function() {
                    imagesPreview(this, 'div.gallery');
                });
            });
        </script>

        <script>
            var category = $('#category');
            category.on('change', function() {
                var value = $(this).val();
                $.ajax({
                    url: '/category/' + value,
                    method: 'get',
                    success: function(data) {
                        var subCategories = [];
                        data.map(element => {
                            var subCategory =
                                `<option value="${element.id}">${element.sub_name}</option>`;
                            subCategories.push(subCategory);
                        })
                        $('#sub_category').html(subCategories)
                    },
                })
            })
        </script>
    @endpush
@endsection
