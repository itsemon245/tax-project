@extends('frontend.layouts.app')
@section('main')

    
        {{-- form start --}}
        <form action="{{ route('user-doc.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row ms-2">
                <div class="col-md-2"></div>
                <div class="col-md-10 ">
                            <h5 class="card-title" style="margin: 2rem 0rem 2rem 3rem;">Upload Documents</h5>
                                <div class="row px-5">
                                    <div class="col-md-6 mb-5">
                                        <x-backend.form.select-input id="Document_type" label="Document type" name="document_type"
                                        placeholder="Choose Document type...">
                                        @foreach ($doc_types as $doc_type)
                                        <option value="{{ $doc_type->id }}">{{ $doc_type->doc_type_name }}</option>
                                        @endforeach

                                     </x-backend.form.select-input>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <x-backend.form.text-input type="text" name="title" label="Text Input" required />
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-2" >Select Documents</label>
                                        <div class="border border-3 p-4 rounded">
                                            <div class="col-md-12 mb-3">
                                                <input type="file" class="form-control" name="gallery_images[]"
                                                       id="gallery-photo-add" multiple>
                                            </div>
                                            <style>
                                                .gallery img {
                                                    display: inline-block;
                                                    width: 60px;
                                                    margin: 12px 12px;
                                                }
                                            </style>
                                            <div class="gallery"></div>
                                        </div>
                                        <div class="mt-3">
                                           

                                            <button type="submit" class="btn btn-primary w-100 btn-sm">Submit</button>
                                        </div>
                                    </div>
                                </div><!--end row-->
                </div>
            </div>
        </form>
        {{-- form end --}}
    
    
        @push('customJs')
            <script>
                var product_name = $('#product_name');
                var product_slug = $('#product_slug');
                product_name.on('keyup',function(){
                    var value = $(this).val();
                    var slug = value.split(' ').join('-').toLowerCase();
                    product_slug.val(slug)
                })
            </script>
            <script>
                ClassicEditor
                    .create(document.querySelector('.editor'))
                    .catch(error => {
                    });
            </script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#image').change(function (e) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#show_image').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(e.target.files['0'])
                    })
                })
            </script>
            <script>
                var catName = $('#catName');
                catName.on('keyup', function () {
                    var value = $(this).val();
                    var convertValue = value.split(' ').join('-').toLowerCase();
                    $('#slug').val(convertValue);
                })
            </script>
    
            <script>
                $(function () {
                    // Multiple images preview in browser
                    var imagesPreview = function (input, placeToInsertImagePreview) {
    
                        if (input.files) {
                            var filesAmount = input.files.length;
    
                            for (i = 0; i < filesAmount; i++) {
                                var reader = new FileReader();
    
                                reader.onload = function (event) {
                                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                                }
    
                                reader.readAsDataURL(input.files[i]);
                            }
                        }
    
                    };
    
                    $('#gallery-photo-add').on('change', function () {
                        imagesPreview(this, 'div.gallery');
                    });
                });
            </script>
    
            <script>
                var category = $('#category');
                category.on('change', function () {
                    var value = $(this).val();
                    $.ajax({
                        url: '/category/' + value,
                        method: 'get',
                        success: function (data) {
                            var subCategories= [];
                            data.map(element=> {
                                var subCategory = `<option value="${element.id}">${element.sub_name}</option>`;
                                subCategories.push(subCategory);
                            })
                            $('#sub_category').html(subCategories)
                        },
                    })
                })
            </script>
        @endpush
    @endsection

