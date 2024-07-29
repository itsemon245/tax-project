 {{-- Review Section starts --}}
 @php
     $avgRating = round($item->reviews_avg_rating, 1);
 @endphp
 @props(['canReview' => false,'reviews' => []])
 <div class="">
     <div class="row mb-4">
         <div class="col-md-4">
             <div class="card p-3 w-100 h-100">
                 <div class="card-body">
                     <h5>Rating</h5>
                     <div class="d-flex justify-content-center">
                         <div>
                             <x-avg-review-stars :avg="$item->reviews_avg_rating" />
                             <p class="text-center">{{ $item->reviews_count }} Reviews</p>
                         </div>
                     </div>

                     <div class="bars">
                         @foreach (range(5, 1) as $key)
                             @php
                                 $progress = $item->reviews_count ? round(($item['reviews_' . $key . 'star'] / $item->reviews_count) * 100) : 0;
                             @endphp
                             <div class="row align-items-center justify-content-start">
                                 <div class="col-10">
                                     <div class="progress w-100" style="background: var(--bs-gray-200);">
                                         <div class="progress-bar" role="progressbar"
                                             style="width: {{ $progress }}%;background:var(--bs-yellow);"
                                             aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
                                             {{ $progress }}%</div>
                                     </div>
                                 </div>
                                 <div class="col-2">
                                     <span class={{ $key == 1 ? 'ps-1' : '' }}>{{ $key }}</span>
                                     <span class="fas fa-star" style="color: var(--bs-yellow);"></span>
                                 </div>
                             </div>
                         @endforeach
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-md-8">
             <div class="card p-3 w-100 h-100">
                 @auth
                     @if ($canReview)
                         <div class="card-body">
                             <h5 class="text-center">Write a review</h5>
                             <label class="mb-0 form-text fs-6">Give a rating</label>
                             <div class="rating mb-3">
                                 <i class="fas fa-star input-star fs-5" style="color: var(--bs-gray-400);cursor: pointer;"
                                     data-index="1"></i>
                                 <i class="fas fa-star input-star fs-5" style="color: var(--bs-gray-400);cursor: pointer;"
                                     data-index="2"></i>
                                 <i class="fas fa-star input-star fs-5" style="color: var(--bs-gray-400);cursor: pointer;"
                                     data-index="3"></i>
                                 <i class="fas fa-star input-star fs-5" style="color: var(--bs-gray-400);cursor: pointer;"
                                     data-index="4"></i>
                                 <i class="fas fa-star input-star fs-5" style="color: var(--bs-gray-400);cursor: pointer;"
                                     data-index="5"></i>
                                 <div id="rating-error"></div>
                             </div>
                             <div class="mb-3">
                                 <div class="form-inputs">
                                     <input type="hidden" value="{{ $item->id }}" name="item_id">
                                     <input type="hidden" value="{{ $slug }}" name="slug">
                                     <input type="hidden" value="" name="rating">
                                     <textarea class="form-control" rows="3" id="comment" name="comment" placeholder="Describe your experience"></textarea>
                                     <div id="comment-error"></div>
                                 </div>
                             </div>
                             <button id="submit-button" type="button" class="btn btn-primary">Submit</button>
                         </div>
                     @endif
                 @endauth
                 <div class="col-12">
                     <div class="bg-light text-center rounded">
                         <div class="d-flex flex-column justify-content-center" style="height: 50vh;">
                             @auth
                                 <span class="font-16 fw-medium"> Please purchase the item to be able to review!</span>
                             @else
                                 <span class="font-16 fw-medium"> Please login to be able to review!</span>
                             @endauth
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="card p-3">
         <div class="card-body">
             <h4 class="">Recent Reviews</h4>
             <div class="review-list">
                 @forelse ($reviews as $review)
                     <div class="d-flex gap-3 align-items-start border p-3 rounded-3 mb-3">
                         <img loading="lazy" src="{{ useImage($review->avatar) }}" alt="img" width="48px"
                             height="48px" class=" rounded-circle shadow-4-strong d-block">
                         <div>
                             <div class="mb-2">
                                 <h5 class="mb-0">{{ $review->name }}</h5>
                                 <small>{{ Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</small>
                                 <div class="rating">
                                     @foreach (range(1, 5) as $rating)
                                         @php
                                             $color = $rating > $review->rating ? 'var(--bs-gray-200)' : 'var(--bs-yellow)';
                                         @endphp
                                         <span class="fas fa-star" style="color: {{ $color }};"></span>
                                     @endforeach
                                 </div>
                             </div>
                             <p class="text-muted mb-0">{{ $review->comment }}
                             </p>
                         </div>
                     </div>
                 @empty
                     <div class="text-center text-muted mb-2 no-review">
                         No reviews to be found
                     </div>
                 @endforelse
             </div>

         </div>
     </div>
 </div>
 {{-- Review Section starts --}}


 @push('customJs')
     <script>
         $(document).ready(function() {

             $('.input-star').click(e => {
                 let yellow = 'var(--bs-yellow)'
                 let gray = 'var(--bs-gray-400)'
                 let icon = $(e.target)
                 let value = e.target.dataset.index
                 icon.prevAll().css('color', yellow)
                 icon.css('color', yellow)
                 icon.nextAll().css('color', gray)
                 $('input[name="rating"]').val(value)
             })


             $('#submit-button').click(function(e) {
                 let comment = $('[name="comment"]').val();
                 let rating = $('input[name="rating"]').val();
                 let itemId = $('input[name="item_id"]').val();
                 let slug = $('input[name="slug"]').val();
                 let url = "{{ route('review.store', 'slug') }}"
                 url = url.replace('slug', slug)

                 $.ajax({
                     method: "post",
                     url: url,
                     data: {
                         'item_id': itemId,
                         "comment": comment,
                         'rating': rating,
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
                                <img loading="lazy" src="${data.avatar}" alt="img"
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
         });
     </script>
 @endpush
