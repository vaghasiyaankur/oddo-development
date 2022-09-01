{{-- HOTEL REVIEW VIEW POPOUP START --}}
<div class="modal fade reviews-popup-main" id="review_view_popup" data-bs-backdrop="static" data-bs-keyboard="false"
tabindex="-1" aria-labelledby="staticBackdropLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
            </div>
            <div class="modal-body py-sm-5">
                <div class="reviews-popup overflow-auto">
                    <div class="reviews-popup-inner position-relative">
                        <button type="button" data-bs-dismiss="modal" class="modal-close" aria-label="Close"
                            style="color: #000;position:absolute;right:22px;top:10px;"><i
                            class="fa-solid fa-xmark"></i></button>
                        <div class="reviews-popup-heading d-flex justify-content-between align-items-center flex-wrap">
                            <div class="reviews-heading">
                                <h4 class="m-0">{{ @$ReviewsPopup->hotel->property_name }} Reviews</h4>
                                <div class="d-flex">
                                    <p class="m-1 me-3">Madrid, Spain.</p>
                                    <div class="reviews-star starrate" id="starrate" data-val="{{ @$reviewCount }}" data-max="5">
                                        <span class="cont m-1">
                                            <img src="{{ asset('assets/images/icons/star.png') }}">
                                            <img src="{{ asset('assets/images/icons/star.png') }}">
                                            <img src="{{ asset('assets/images/icons/half-star.png') }}">
                                            <img src="{{ asset('assets/images/icons/star.png') }}">
                                            <img src="{{ asset('assets/images/icons/star.png') }}">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="total-review mt-2 mb-3 me-5">
                                <span class="good-text">{{ @$reviewCount >= 2.5 ? 'Good' : 'Bed'}}</span>
                                <span class="total-review-text ms-3">{{ @$reviewCount }}/5</span>
                            </div>
                        </div>

                        <div class="popup-content-main mb-3 ">
                            <div class="popup-content-first">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="review-popup-img">
                                            <img src="{{ asset('assets/images/reviews-popup-1.png') }}" class="img-fluid w-100">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-5">
                                        <div class="review-section">
                                            <div
                                                class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                <span class=" para-fs-14">Staff</span>
                                                <span class="review-section-text bg-green"> {{ @$ReviewsPopup->staff }}/5</span>
                                            </div>
                                            <div
                                                class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                <span class="para-fs-14">Amenities</span>
                                                <span class="review-section-text bg-red"> {{ @$ReviewsPopup->cleaness }}/5</span>
                                            </div>
                                            <div
                                                class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                <span class="para-fs-14">Cleanless</span>
                                                <span class="review-section-text bg-orange"> {{ @$ReviewsPopup->rooms }}/5</span>
                                            </div>
                                            <div
                                                class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                <span class="para-fs-14">Room</span>
                                                <span class="review-section-text bg-green"> {{ @$ReviewsPopup->location }}/5</span>
                                            </div>
                                            <div
                                                class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                <span class="para-fs-14">Breakfast</span>
                                                <span class="review-section-text bg-red"> {{ @$ReviewsPopup->breakfast }}/5</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-5 p-sm-0 offset-sm-1">
                                        <div class="review-section">
                                            <div
                                                class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                <span class="para-fs-14">Internet</span>
                                                <span class="review-section-text bg-orange"> {{ @$ReviewsPopup->service_staff }}/5</span>
                                            </div>
                                            <div
                                                class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                <span class="para-fs-14">Property
                                                    Condition</span>
                                                <span class="review-section-text bg-red"> {{ @$ReviewsPopup->property }}/5</span>
                                            </div>
                                            <div
                                                class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                <span class="para-fs-14">Service
                                                    &amp; Staff</span>
                                                <span class="review-section-text bg-green"> {{ @$ReviewsPopup->price_quality }}/5</span>
                                            </div>
                                            <div
                                                class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                <span class="para-fs-14">Price /
                                                    Quality</span>
                                                <span class="review-section-text bg-orange"> {{ @$ReviewsPopup->amenities }}/5</span>
                                            </div>
                                            <div
                                                class="review-section-total-review d-flex align-items-center justify-content-between mt-2">
                                                <span class="para-fs-14">Location</span>
                                                <span class="review-section-text bg-green"> {{ @$ReviewsPopup->internet }}/5</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="popup-reviews-comment">
                                <div class="popup-reviews-comment-inner">
                                    <div
                                        class="comment-reviews-heading d-flex justify-content-between align-items-center mt-4 flex-wrap">
                                        <div class="comment-reviews-text">
                                            <h5 class="mb-0">Your Feedback :</h5>
                                        </div>
                                    </div>
                                    <div class="reviews-comment-text-main mt-2">
                                        <div class="row mt-3">
                                            <div class="col-sm-1 col-2 text-center">
                                                <img src="{{ asset('assets/images/icons/review-popup-2.png') }}">
                                            </div>
                                            <div class="col-sm-11 col-12 p-0 ">
                                                <div class="reviews-comment-content">
                                                    <p class="reviews-comment para-fs-14 mt-1">
                                                        {{ @$ReviewsPopup->feedback }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- HOTEL REVIEW VIEW POPOUP END --}}
