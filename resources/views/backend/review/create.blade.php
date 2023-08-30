@extends('backend.layouts.app')

@section('content')
@php
    $reviewable_types = [
    'Book' => 'Book',
    'Product' => 'Product', 
    'ExpertProfile' => 'Expert Profile', 
    'Course' => 'Course', 
    'Service' => 'Service', 
    'CaseStudy' => 'Case Study',
    
    ];
@endphp
    <x-backend.ui.breadcrumbs :list="['Frontend', 'Review', 'Create']" />
    <x-backend.ui.section-card name="Create Review">
        <form action="{{ route('review.store', 'Product') }}" method="post">
            <section class="container">
                <div class="row">
                    <div class="col-md-6">
                        <x-backend.form.select-input id="reviewable_type" required label="Reviewable Type" name="reviewable_type"
                        placeholder="Choose type...">
                        @forelse ($reviewable_types as $key => $reviewable_type)
                        <option value="{{ $key }}">{{ $reviewable_type }}</option>
                        @empty
                        <option disabled>No Records Found!</option>
                        @endforelse
                        </x-backend.form.select-input>
                    </div>
    
                    <div class="col-md-6">
                        <x-backend.form.select-input id="reviewable_item" required label="Reviewable Item" name="item_id"
                        placeholder="Choose item...">
                            <option disabled>No Records Found!</option>
                        </x-backend.form.select-input>
                    </div>
                    <x-backend.form.text-input type="text" name="name" label="Author Name" required />
                    {{-- <input type="text"  name="name"> --}}
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="mb-0 form-text fs-6">Give a rating</label>
                        <div class="rating mb-1">
                            <i class="fas fa-star input-star fs-5"
                                style="color: var(--bs-gray-400);cursor: pointer;" data-index="1"></i>
                            <i class="fas fa-star input-star fs-5"
                                style="color: var(--bs-gray-400);cursor: pointer;" data-index="2"></i>
                            <i class="fas fa-star input-star fs-5"
                                style="color: var(--bs-gray-400);cursor: pointer;" data-index="3"></i>
                            <i class="fas fa-star input-star fs-5"
                                style="color: var(--bs-gray-400);cursor: pointer;" data-index="4"></i>
                            <i class="fas fa-star input-star fs-5"
                                style="color: var(--bs-gray-400);cursor: pointer;" data-index="5"></i>
                            <div id="rating-error"></div>
                        </div>
                        <div class="mb-3">
                            <div class="form-inputs">
                                <input type="hidden" value="2" name="item_id">
                                <input type="hidden" value="book" name="slug">
                                <input type="hidden" value="" name="rating">
                                <textarea class="form-control" rows="3" id="comment" name="comment" placeholder="Input your comment..."></textarea>
                                <div id="comment-error"></div>
                            </div>
                        </div>
                        <button id="submit-button" type="button" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </div>
            </section>
        </form>
    </x-backend.ui.section-card>
@endsection
@push('customJs')
<script>
    $(document).ready(function() {
        let action = "{{ route('review.store', 'SLUG') }}";
        $('#reviewable_type').on('change', function() {
            var selectedValue = $(this).val();
            action = action.replace('SLUG', selectedValue);
            let url = "{{ route('ajax.get.items', 'SLUG') }}";
            url = url.replace('SLUG', selectedValue);
                $.ajax({
                type: 'GET', 
                url: url,
                success: function(response) {
                    $('#reviewable_item').children().remove()
                   response.forEach(element => {
                       let option = `<option value="${element.id}"> ${element.title ?? element.name} </option>`
                       $('#reviewable_item').append(option)
                   });

                },
            });
        });
        $('#submit-button').click(function(e) {
            let comment = $('[name="comment"]').val();
            let name = $('[name="name"]').val();
            let rating = $('input[name="rating"]').val();
            let itemId = $('input[name="item_id"]').val();

            $.ajax({
                method: "post",
                url: action,
                data: {
                    'item_id': itemId,
                    "comment": comment,
                    'rating': rating,
                    'name' : name,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        let data = response.data
                        let icons = '';
                        for (let i = 1; i < 6; i++) {
                            let color = i > data.rating ? 'var(--bs-gray-200)' :
                                'var(--bs-yellow)'
                            icons +=
                                `\n<span class="fas fa-star" style="color:${color};"></span>`
                        }

                        let review = ` 
                            <div class="d-flex gap-3 align-items-start border p-3 rounded-3 mb-3">
                                <img src="${data.avatar}" alt="img"
                                    width="64px" height="64px" class=" rounded-circle shadow-4-strong d-block">
                                <div>
                                    <div class="mb-2">
                                        <h5 class="mb-0">${data.name}</h5>
                                        <small>${data.createdAt}</small>
                                        <div class="rating">
                                            ${icons}
                                        </div>
                                    </div>
                                    <p class="text-muted mb-0">${data.comment}
                                    </p>
                                </div>
                            </div>
                        `

                        $('.no-review').remove()
                        $('.review-list').prepend(review)

                        Toast.fire({
                            icon: "success",
                            title: response.message
                        })
                        console.log(response);
                    } else {
                        Toast.fire({
                            icon: "error",
                            title: response.message
                        })
                    }
                },
                error: function(err) {
                    let errors = err.responseJSON.errors
                    if (errors.rating) {
                        $('#rating-error').html(
                            `<span class="text-danger">${errors.rating}</span>`)
                    }
                    if (errors.comment) {
                        $('#comment-error').html(
                            `<span class="text-danger">${errors.comment}</span>`)
                    }
                }
            });
        })
        $('.input-star').click(e => {
            let yellow = 'var(--ct-yellow)'
            let gray = 'var(--ct-gray-400)'
            let icon = $(e.target)
            let value = e.target.dataset.index
            icon.prevAll().css('color', yellow)
            icon.css('color', yellow)
            icon.nextAll().css('color', gray)
            $('input[name="rating"]').val(value)
        })
    });
</script>
@endpush



