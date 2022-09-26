@push('css')
<style>
    /* popup scroll */
    .reviews-popup-main .reviews-popup::-webkit-scrollbar-track {
        border-radius: 10px;
        background-color: transparent;
    }

    .reviews-popup-main .reviews-popup::-webkit-scrollbar {
        width: 7px;
        background-color: transparent;
    }
    
    .reviews-popup-main .reviews-popup::-webkit-scrollbar-thumb {
        border-radius: 20px;
        background-color: #a9a9a9;
    }
</style>
@endpush

<div class="modal fade reviews-popup-main" id="reviews-popup-main"
    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true" data-id="" role="dialog">
    <div
        class="modal-dialog modal-dialog-scrollable modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <button type="button" data-bs-dismiss="modal" class="modal-close"
                    aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body py-sm-5">
                <div class="reviews-popup overflow-auto">
                    <div class="reviews-popup-inner">
                        <div
                            class="reviews-popup-heading d-flex justify-content-between align-items-center flex-wrap">
                            <div class="reviews-heading">
                                <h4 class="m-0">{{@$hotelRating['hotelData']->property_name}} Reviews</h4>
                                <p class="m-0">{{ @$hotelRating['hotelData']->city->name }}{{ @$hotelRating['hotelData']->country_id
                                  ? ',' .@$hotelRating['hotelData']->country->country_name: '' }}</p>
                                <div class="reviews-star">
                                    @for ($i = 0; $i < 5; $i++)
                                        <span><img
                                                src="{{ @$hotelRating['hotelData']->star_rating > $i ? '' . asset('assets/images/icons/start.png') : '' }}"></span>
                                    @endfor
                                </div>
                            </div>
                            <div class="total-review mt-2 mb-3">
                                @if (@$hotelRating['rating'])
                                    <span class="good-text">{{ @$hotelRating['rating'] >= 2.5 ? 'Good' : 'Bed'}}</span>
                                    <span class="total-review-text ms-3 {{round(@$hotelRating['rating'], 1) <= 2 ? 'bg-red' : 'bg-green' }}">{{round(@$hotelRating['rating'], 1)}}/5</span>
                                @endif
                            </div>
                        </div>
                        <div class="popup-content-main">
                            <div class="popup-content-first">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="review-popup-img">
                                            @if (@$hotelRating['hotelData'])
                                                <img src="{{ asset('storage/' . @$hotelRating['hotelData']->mainPhotoData->photos) }}"
                                                class="img-fluid w-100" style="object-fit: cover; width: 100%; min-height: 165px; max-height: 165px;">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-5">
                                        <div class="review-section">
                                            <div
                                                class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                <span
                                                    class=" para-fs-14">Staff</span>
                                                <span
                                                    class="review-section-text  {{round(@$hotelRating['review']->staff, 1) <= 2 ? "bg-red" : 'bg-green' }}">{{round(@$hotelRating['review']->staff, 1)}}/5</span>
                                            </div>
                                            <div
                                                class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                <span
                                                    class="para-fs-14">Amenities</span>
                                                <span
                                                    class="review-section-text  {{round(@$hotelRating['review']->amenities, 1) <= 2 ? "bg-red" : 'bg-green' }}">{{round(@$hotelRating['review']->amenities, 1)}}/5</span>
                                            </div>
                                            <div
                                                class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                <span
                                                    class="para-fs-14">Cleanless</span>
                                                <span
                                                    class="review-section-text  {{round(@$hotelRating['review']->cleaness, 1) <= 2 ? "bg-red" : 'bg-green' }}">{{round(@$hotelRating['review']->cleaness, 1)}}/5</span>
                                            </div>
                                            <div
                                                class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                <span
                                                    class="para-fs-14">Room</span>
                                                <span
                                                    class="review-section-text  {{round(@$hotelRating['review']->room, 1) <= 2 ? "bg-red" : 'bg-green' }}">{{round(@$hotelRating['review']->room, 1)}}/5</span>
                                            </div>
                                            <div
                                                class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                <span
                                                    class="para-fs-14">Breakfast</span>
                                                <span
                                                    class="review-section-text  {{round(@$hotelRating['review']->breakfast, 1) <= 2 ? "bg-red" : 'bg-green' }}">{{round(@$hotelRating['review']->breakfast, 1)}}/5</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-md-3 col-sm-5 p-sm-0 offset-sm-1">
                                        <div class="review-section">
                                            <div
                                                class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                <span
                                                    class="para-fs-14">Internet</span>
                                                <span
                                                    class="review-section-text {{round(@$hotelRating['review']->internet, 1) <= 2 ? "bg-red" : 'bg-green' }}  ">{{round(@$hotelRating['review']->internet, 1)}}/5</span>
                                            </div>
                                            <div
                                                class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                <span class="para-fs-14">Property
                                                    Condition</span>
                                                <span
                                                    class="review-section-text  {{round(@$hotelRating['review']->property, 1) <= 2 ? "bg-red" : 'bg-green' }}">{{round(@$hotelRating['review']->property, 1)}}/5</span>
                                            </div>
                                            <div
                                                class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                <span class="para-fs-14">Service
                                                    & Staff</span>
                                                <span
                                                    class="review-section-text  {{round(@$hotelRating['review']->sestaff, 1) <= 2 ? "bg-red" : 'bg-green' }}">{{round(@$hotelRating['review']->sestaff, 1)}}/5</span>
                                            </div>
                                            <div
                                                class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                <span class="para-fs-14">Price /
                                                    Quality</span>
                                                <span
                                                    class="review-section-text  {{round(@$hotelRating['review']->quality, 1) <= 2 ? "bg-red" : 'bg-green' }}">{{round(@$hotelRating['review']->quality, 1)}}/5</span>
                                            </div>
                                            <div
                                                class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                <span
                                                    class="para-fs-14">Location</span>
                                                <span
                                                    class="review-section-text  {{round(@$hotelRating['review']->location, 1) <= 2 ? "bg-red" : 'bg-green' }}">{{round(@$hotelRating['review']->location, 1)}}/5</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (@$hotelRating['hotelReviews'])
                            <div class="popup-reviews-comment">
                                <div class="popup-reviews-comment-inner">
                                    <div
                                        class="comment-reviews-heading d-flex justify-content-between align-items-center mt-4 flex-wrap">
                                        <div class="comment-reviews-text">
                                            <h5>Reviews ({{@$hotelRating['hotelReviews']->count()}})</h5>
                                        </div>                                                    
                                    </div>
                                    <div class="reviews-comment-text-main mt-4">           
                                        @foreach (@$hotelRating['hotelReviews'] as $hotelReview)    
                                            <div class="row border-bottom mt-3">
                                                <div
                                                    class="col-sm-1 col-2 text-center">
                                                    <img src="{{asset('assets/images/icons/review-popup-2.png')}}">
                                                </div>
                                                <div class="col-sm-8 col-9 p-0 ">
                                                    <div class="reviews-comment-content">
                                                        <div class="review-section-total-review d-flex mb-2">
                                                            <span class="pe-3">{{ @$hotelReview->user->name}} {{ @$hotelReview->user->last_name }}</span>
                                                            <span class="review-section-text bg-green">{{@$hotelReview->total_rating}}/5</span>
                                                        </div>
                                                        <p
                                                            class="comment-small-text para-fs-14">
                                                            Traveled in June 20 - 2019
                                                        </p>
                                                        <p
                                                            class="reviews-comment para-fs-14">
                                                            {{ $hotelReview->feedback }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-12 p-0">
                                                    <div class="verified-text">
                                                        <p class="reviews-verified-text">
                                                            Verified Traveller</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>