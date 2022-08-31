@extends('layout::user.Frontend.master')

@section('title')
    Order History
@endsection


@push('css')
    <style>
        .review_details_popup .accordion-button::after {
            content: "" !important;
            margin-left: 11px;
            width: 0.80rem;
            height: 0.80rem;
            background-size: 0.80rem;
        }

        .ratingW {
            position: relative;
            margin: 10px 0 0;
        }

        .ratingW li {
            display: inline-block;
            margin: 0px;
        }

        .ratingW li a {
            display: block;
            position: relative;
        }

        .star {
            position: relative;
            display: inline-block;
            width: 0;
            height: 0;
            margin-left: .9em;
            margin-right: .9em;
            margin-bottom: 1.2em;
            border-right: .3em solid transparent;
            border-bottom: .7em solid #ddd;
            border-left: .3em solid transparent;
            font-size: 10px;
        }

        .star:before,
        .star:after {
            content: '';
            display: block;
            width: 0;
            height: 0;
            position: absolute;
            top: .6em;
            left: -1em;
            border-right: 1em solid transparent;
            border-bottom: .7em solid #ddd;
            border-left: 1em solid transparent;
            -webkit-transform: rotate(-35deg);
            transform: rotate(-35deg);
        }

        .star:after {
            -webkit-transform: rotate(35deg);
            transform: rotate(35deg);
        }


        .ratingW li.on .star {
            position: relative;
            display: inline-block;
            width: 0;
            height: 0;
            margin-left: .9em;
            margin-right: .9em;
            margin-bottom: 1.2em;
            border-right: .3em solid transparent;
            border-bottom: .7em solid #FC0;
            border-left: .3em solid transparent;
            font-size: 10px;
        }

        .ratingW li.on .star:before,
        .ratingW li.on .star:after {
            content: '';
            display: block;
            width: 0;
            height: 0;
            position: absolute;
            top: .6em;
            left: -1em;
            border-right: 1em solid transparent;
            border-bottom: .7em solid #FC0;
            border-left: 1em solid transparent;
            -webkit-transform: rotate(-35deg);
            transform: rotate(-35deg);
        }

        .ratingW li.on .star:after {
            -webkit-transform: rotate(35deg);
            transform: rotate(35deg);
        }
        .order-history{
            min-height: 575px;
        }



        .order-history .order-history-details .accordion .reviewBtn  {
            border: 1px solid lightgray;
            padding: 8px 14px;
            font-weight: 600;
            font-size: 16px;
            line-height: 24px;
            color: #6a78c7;
            background: #ffffff;
            border-radius: 9px;
        }

        .reviews-popup-main .reviews-popup .reviews-popup-heading {
            border-bottom: 1px solid #a4a6ba;
            padding: 32px 34px 17px 40px;
        }

        .reviews-popup-main .reviews-popup {
            width: 100%;
            max-width: 852px;
            /* height: 100%;
                max-height: 746px; */
            background: #ffffff;
            border-radius: 8px;
            margin: 0 auto;
        }

        .reviews-popup-main .reviews-popup .reviews-heading h4 {
            font-style: normal;
            font-weight: 400;
            font-size: 32px;
            line-height: 32px;
            color: #393c52;
            white-space: nowrap;
        }

        .reviews-popup-main .reviews-popup .reviews-heading P {
            font-weight: 400;
            font-size: 14px;
            line-height: 22px;
            color: #878996;
        }

        .total-review .total-review-text {
            padding: 8px 9px;
            background: #219653;
            border-radius: 5px;
            color: #fff;
            font-weight: 400;
            font-size: 12px;
            line-height: 12px;
        }

        .reviews-popup-main .popup-content-main {
            padding: 16px 26px 17px 40px;
        }

        .para-fs-14 {
            font-weight: 400;
            font-size: 14px;
            line-height: 22px;
            color: #393c52;
        }

        .reviews-popup-main .popup-content-main .review-section-total-review .review-section-text {
            padding: 0px 8px;
            border-radius: 5px;
            color: #ffffff;
            font-size: 14px;
            line-height: 24px;
        }
        .reviews-popup-main .review-popup-img{
            width: 100%;
            max-width: 235px;
        }
    </style>
@endpush


@section('content')
    <!-------- ORDER HISTORY SECTION START ---------->
    <section class="order-history">
        <div class="container">
            <div class="order-history-title text-center">
                <h4>Order History</h4>
            </div>
            <div class="order-history-details">
                <div class="accordion" id="accordionExample">

                        @forelse ($orderHistorys as $orderHistory)

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <div class="d-flex flex-wrap align-items-center p-3 justify-content-sm-evenly justify-content-start j_c_center"
                                    href="#collapse_{{ $orderHistory->UUID }}" data-bs-toggle="collapse" aria-expanded="false"
                                    aria-controls="collapseExample">
                                    <a class="btn p-0 mb-2">
                                        <img src="{{  asset('assets/images/icons/downarrow.png') }}">
                                    </a>
                                    <div class="col_id fs-6">Order Id: {{ $orderHistory->UUID }}</div>
                                    <div class="col_totl fs-6 mt-1 mt-md-0">Total:$ {{ $orderHistory->rent }}</div>
                                    <div
                                        class="col_amt fs-6 d-flex flex-wrap align-items-center justify-content-sm-center mt-2 mt-md-0">
                                        <img src="{{  asset('assets/images/icons/order-d_right-icon.png') }}" alt="">
                                        <span class="ps-1">Purchesed on </span><span class="ps-1 mt-1 mt-md-0">{!! date('d M y', strtotime($orderHistory->start_date)) !!}</span>
                                    </div>
                                </div>
                            </h2>
                            <div id="collapse_{{ $orderHistory->UUID }}" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body p-0">
                                    <div class="order-id d-flex flex-wrap align-items-center justify-content-evenly">
                                        <p class="mb-0 or-id">Order Id: {{ $orderHistory->UUID }}</p>
                                        <p class="mb-0 or-total">Total: ${{ $orderHistory->rent }}</p>
                                        <div
                                            class="purches-date d-flex flex-wrap align-items-center justify-content-center ms-sm-3">
                                            <img src="{{  asset('assets/images/icons/order-right-icon.png') }}" class="pe-1" alt="">
                                            <span class="ps-1">Purchesed on </span><span class="ps-1">{!! date('d M y', strtotime($orderHistory->start_date)) !!}</span>
                                        </div>
                                    </div>
                                    <div class="order-id-inner">
                                        <div class="row">
                                            <div class="recipt_button text-end mt-3">

                                                @foreach ($reviews as $key => $review)
                                                    @if ($review->hotel_id == $orderHistory->hotel_id)

                                                        <div class="recipt_button text-end mt-3">
                                                            <a href="javascript:;" data-bs-toggle="modal"
                                                                data-bs-target="#review_view_popup" class="reviewPopUp" data-id="{{ $orderHistory->UUID }}">
                                                                <span class="reviewBtn me-5 ">View Review</span>
                                                            </a>
                                                        </div>

                                                    @else

                                                        <a href="javascript:;" data-id="{{ $orderHistory->UUID }}"  data-bs-toggle="modal"
                                                        data-bs-target="#review__popup" id="popUp">
                                                            <span class="recipt-btn me-4">+ Add Review</span>
                                                        </a>
                                                    @endif
                                                    @endforeach

                                                    @if (!count($reviews))
                                                    <a href="javascript:;" data-id="{{ $orderHistory->UUID }}"  data-bs-toggle="modal"
                                                        data-bs-target="#review__popup" id="popUp">
                                                            <span class="recipt-btn me-4">+ Add Review</span>
                                                        </a>
                                                    @endif


                                                <input type="hidden" id="hotel_id_{{ $orderHistory->UUID }}" value="{{ $orderHistory->hotel_id }}">
                                                <input type="hidden" id="room_id_{{ $orderHistory->UUID }}" value="{{ $orderHistory->room_id }}">
                                            </div>
                                            <div class="col-12 col-lg-6 left-order-list">
                                                <span class="h-btn">Hotels</span>
                                                <div class="holiday-details">
                                                    <h5 class="h--title ms-2">{{  $orderHistory->hotel->property_name }}</h5>
                                                    <div class="h-date d-flex align-items-center">
                                                        <img src="{{  asset('assets/images/icons/order-hotel-icon.png') }}" alt="">
                                                        <p class="m-0 pe-2">{!! date('M d,Y', strtotime($orderHistory->start_date)) !!}</p>
                                                        <img src="{{  asset('assets/images/icons/order-h-eroow.png') }}" alt="">
                                                        <p class="m-0 ps-2">{!! date('M d,Y', strtotime($orderHistory->end_date)) !!}</p>
                                                    </div>
                                                    <div class="h-pepl d-flex align-items-center">
                                                        <img src="{{  asset('assets/images/icons/order-hotel-icon2.png') }}" alt="">
                                                        <p class="m-0">2 Guests, 1 Infant</p>
                                                    </div>
                                                    <div class="h-room d-flex align-items-center">
                                                        <img src="{{  asset('assets/images/icons/order-hotel-icon3.png') }}" alt="">
                                                        <p class="m-0">2 Rooms, 1 King, 2 Queen</p>
                                                    </div>
                                                    <div class="h-totl d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <p class="m-0 h--totl ms-2 mt-2">Total</p>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <p class="m-0 pe-2 h-amount">$ {{ $orderHistory->rent }}</p><span
                                                                class="h--totl text-muted">for 8 nights</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6 right-order-list">
                                                <span class="h-btn">Transportation</span>
                                                <div class="transpot-details p-3">
                                                    <img src="{{  asset('assets/images/icons/order-transpot-icon.png') }}" alt="">
                                                    <div class="h-totl d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <p class="m-0 h--totl ms-2 mt-2">Total</p>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <p class="m-0 pe-2 h-amount">$1,245.00</p><span
                                                                class="h--totl text-muted">for 10 rides</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty

                        @endforelse
                    </div>
            </div>
        </div>
    </section>
    {{-- HOTEL REVIEW POPOUP START --}}
    <div class="modal fade review_details_popup" id="review__popup" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-body py-sm-5 modal-dialog-centered">
                    <div class="review--box">
                        <div class="review--title d-flex justify-content-between align-items-center mb-3">
                            <h5 style="color: #6a78d2;">Add Your Feedback :</h5>
                            <button type="button" data-bs-dismiss="modal" class="modal-close" aria-label="Close"><i
                                    class="fa-solid fa-xmark text-dark"></i></button>
                        </div>
                        <div class="review_form_inner">
                            <form class="reviewForm">
                                <div class="row mb-4">
                                    <h5 class="mb-3">How would you rate our hotels facilities ?</h5>

                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-12 mb-2 reviewMainDiv">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="staff-headingRating">
                                                        <button
                                                            class="accordion-button bg-transparent shadow-none collapsed p-3 py-2"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#staff-collapseRating" aria-expanded="false"
                                                            aria-controls="staff-collapseRating">
                                                            <span class="text-muted fs-6">Staff</span><span
                                                                class="badge bg-red text-body fs-12 fw-medium ms-auto ratingColor"
                                                                style="
                                                            color: #fff !important;
                                                        "><i
                                                                    class="mdi mdi-star text-warning pe-1"></i><span
                                                                    class="cleanessSpan">0</span>/5</span>
                                                                    <input type="hidden" class="staffReview reviewValue">
                                                        </button>
                                                    </h2>
                                                    <div id="staff-collapseRating" class="accordion-collapse collapse"
                                                        aria-labelledby="staff-headingRating" style="">
                                                        <div class="accordion-body text-body p-2 pt-0">
                                                            <div class="d-flex flex-column gap-2">
                                                                <div class="form-check ps-2">
                                                                    <label class="form-check-label" for="productratingRadio4">
                                                                        <span class="text-muted">
                                                                            <ul class="ratingW ps-0">
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                            </ul>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 reviewMainDiv">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="Cleanless-headingRating">
                                                        <button
                                                            class="accordion-button bg-transparent shadow-none collapsed p-3 py-2"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#Cleanless-collapseRating" aria-expanded="false"
                                                            aria-controls="Cleanless-collapseRating">
                                                            <span class="text-muted fs-6">Cleaness</span><span
                                                                class="badge bg-red text-body fs-12 fw-medium ms-auto ratingColor"
                                                                style="color: #fff !important"><i
                                                                    class="mdi mdi-star text-warning pe-1"></i><span
                                                                    class="cleanessSpan">0</span>/5</span>
                                                                    <input type="hidden" class="cleanessReview reviewValue">
                                                        </button>
                                                    </h2>
                                                    <div id="Cleanless-collapseRating" class="accordion-collapse collapse"
                                                        aria-labelledby="Cleanless-headingRating" style="">
                                                        <div class="accordion-body text-body p-2 pt-0">
                                                            <div class="d-flex flex-column gap-2">
                                                                <div class="form-check ps-2">
                                                                    <label class="form-check-label" for="productratingRadio4">
                                                                        <span class="text-muted">
                                                                            <ul class="ratingW ps-0">
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                            </ul>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 reviewMainDiv">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="Room-headingRating">
                                                        <button
                                                            class="accordion-button bg-transparent shadow-none collapsed p-3 py-2"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#Room-collapseRating" aria-expanded="false"
                                                            aria-controls="Room-collapseRating">
                                                            <span class="text-muted fs-6">Room</span><span
                                                                class="badge bg-red text-body fs-12 fw-medium ms-auto ratingColor"
                                                                style="
                                                            color: #fff !important;
                                                        "><i
                                                                    class="mdi mdi-star text-warning pe-1"></i><span
                                                                    class="cleanessSpan">0</span>/5</span>
                                                                    <input type="hidden" class="roomReview reviewValue">
                                                        </button>
                                                    </h2>
                                                    <div id="Room-collapseRating" class="accordion-collapse collapse"
                                                        aria-labelledby="Room-headingRating" style="">
                                                        <div class="accordion-body text-body p-2 pt-0">
                                                            <div class="d-flex flex-column gap-2">
                                                                <div class="form-check ps-2">
                                                                    <label class="form-check-label" for="productratingRadio4">
                                                                        <span class="text-muted">
                                                                            <ul class="ratingW ps-0">
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                            </ul>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 reviewMainDiv">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="Location-headingRating">
                                                        <button
                                                            class="accordion-button bg-transparent shadow-none collapsed p-3 py-2"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#Location-collapseRating" aria-expanded="false"
                                                            aria-controls="Location-collapseRating">
                                                            <span class="text-muted fs-6">Location</span><span
                                                                class="badge bg-red text-body fs-12 fw-medium ms-auto ratingColor"
                                                                style="color: #fff !important"><i
                                                                    class="mdi mdi-star text-warning pe-1"></i><span
                                                                    class="cleanessSpan">0</span>/5</span>
                                                                    <input type="hidden" class="locationReview reviewValue">
                                                        </button>
                                                    </h2>
                                                    <div id="Location-collapseRating" class="accordion-collapse collapse"
                                                        aria-labelledby="Location-headingRating" style="">
                                                        <div class="accordion-body text-body p-2 pt-0">
                                                            <div class="d-flex flex-column gap-2">
                                                                <div class="form-check ps-2">
                                                                    <label class="form-check-label" for="productratingRadio4">
                                                                        <span class="text-muted">
                                                                            <ul class="ratingW ps-0">
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                            </ul>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 reviewMainDiv">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="Breakfast-headingRating">
                                                        <button
                                                            class="accordion-button bg-transparent shadow-none collapsed p-3 py-2"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#Breakfast-collapseRating" aria-expanded="false"
                                                            aria-controls="Breakfast-collapseRating">
                                                            <span class="text-muted fs-6">Breakfast</span><span
                                                                class="badge bg-red text-body fs-12 fw-medium ms-auto ratingColor"
                                                                style="color: #fff !important"><i
                                                                    class="mdi mdi-star text-warning pe-1"></i><span
                                                                    class="cleanessSpan">0</span>/5</span>
                                                                    <input type="hidden" class="breakfastReview reviewValue">
                                                        </button>
                                                    </h2>
                                                    <div id="Breakfast-collapseRating" class="accordion-collapse collapse"
                                                        aria-labelledby="Breakfast-headingRating" style="">
                                                        <div class="accordion-body text-body p-2 pt-0">
                                                            <div class="d-flex flex-column gap-2">
                                                                <div class="form-check ps-2">
                                                                    <label class="form-check-label" for="productratingRadio4">
                                                                        <span class="text-muted">
                                                                            <ul class="ratingW ps-0">
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                            </ul>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-12 mb-2 reviewMainDiv">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="Service-headingRating">
                                                        <button
                                                            class="accordion-button bg-transparent shadow-none collapsed p-3 py-2"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#Service-collapseRating" aria-expanded="false"
                                                            aria-controls="Service-collapseRating">
                                                            <span class="text-muted fs-6">Service & Staff</span><span
                                                                class="badge bg-red text-body fs-12 fw-medium ms-auto ratingColor"
                                                                style="color: #fff !important"><i
                                                                    class="mdi mdi-star text-warning pe-1"></i><span
                                                                    class="cleanessSpan">0</span>/5</span>
                                                                    <input type="hidden" class="serviceStaffReview reviewValue">
                                                        </button>
                                                    </h2>
                                                    <div id="Service-collapseRating" class="accordion-collapse collapse"
                                                        aria-labelledby="Service-headingRating" style="">
                                                        <div class="accordion-body text-body p-2 pt-0">
                                                            <div class="d-flex flex-column gap-2">
                                                                <div class="form-check ps-2">
                                                                    <label class="form-check-label" for="productratingRadio4">
                                                                        <span class="text-muted">
                                                                            <ul class="ratingW ps-0">
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                            </ul>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 reviewMainDiv">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="property-headingRating">
                                                        <button
                                                            class="accordion-button bg-transparent shadow-none collapsed p-3 py-2"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#property-collapseRating" aria-expanded="false"
                                                            aria-controls="property-collapseRating">
                                                            <span class="text-muted fs-6">Property condition</span><span
                                                                class="badge bg-red text-body fs-12 fw-medium ms-auto ratingColor"
                                                                style="color: #fff !important"><i
                                                                    class="mdi mdi-star text-warning pe-1"></i><span
                                                                    class="cleanessSpan">0</span>/5</span>
                                                                    <input type="hidden" class="propertyConditionReview reviewValue">
                                                        </button>
                                                    </h2>
                                                    <div id="property-collapseRating" class="accordion-collapse collapse"
                                                        aria-labelledby="property-headingRating" style="">
                                                        <div class="accordion-body text-body p-2 pt-0">
                                                            <div class="d-flex flex-column gap-2">
                                                                <div class="form-check ps-2">
                                                                    <label class="form-check-label" for="productratingRadio4">
                                                                        <span class="text-muted">
                                                                            <ul class="ratingW ps-0">
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                            </ul>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 reviewMainDiv">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="Price-headingRating">
                                                        <button
                                                            class="accordion-button bg-transparent shadow-none collapsed p-3 py-2"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#Price-collapseRating" aria-expanded="false"
                                                            aria-controls="Price-collapseRating">
                                                            <span class="text-muted fs-6">Price / Quality</span><span
                                                                class="badge bg-red text-body fs-12 fw-medium ms-auto ratingColor"
                                                                style="color: #fff !important"><i
                                                                    class="mdi mdi-star text-warning pe-1"></i><span
                                                                    class="cleanessSpan">0</span>/5</span>
                                                                    <input type="hidden" class="priceQualityReview reviewValue">
                                                        </button>
                                                    </h2>
                                                    <div id="Price-collapseRating" class="accordion-collapse collapse"
                                                        aria-labelledby="Price-headingRating" style="">
                                                        <div class="accordion-body text-body p-2 pt-0">
                                                            <div class="d-flex flex-column gap-2">
                                                                <div class="form-check ps-2">
                                                                    <label class="form-check-label" for="productratingRadio4">
                                                                        <span class="text-muted">
                                                                            <ul class="ratingW ps-0">
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                            </ul>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 reviewMainDiv">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="Amenities-headingRating">
                                                        <button
                                                            class="accordion-button bg-transparent shadow-none collapsed p-3 py-2"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#Amenities-collapseRating" aria-expanded="false"
                                                            aria-controls="Amenities-collapseRating">
                                                            <span class="text-muted fs-6">Amenities</span><span
                                                                class="badge bg-red text-body fs-12 fw-medium ms-auto ratingColor"
                                                                style="color: #fff !important"><i
                                                                    class="mdi mdi-star text-warning pe-1"></i><span
                                                                    class="cleanessSpan">0</span>/5</span>
                                                                    <input type="hidden" class="amenityReview reviewValue">
                                                        </button>
                                                    </h2>
                                                    <div id="Amenities-collapseRating" class="accordion-collapse collapse"
                                                        aria-labelledby="Amenities-headingRating" style="">
                                                        <div class="accordion-body text-body p-2 pt-0">
                                                            <div class="d-flex flex-column gap-2">
                                                                <div class="form-check ps-2">
                                                                    <label class="form-check-label" for="productratingRadio4">
                                                                        <span class="text-muted">
                                                                            <ul class="ratingW ps-0">
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                            </ul>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2 reviewMainDiv">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="Internet-headingRating">
                                                        <button
                                                            class="accordion-button bg-transparent shadow-none collapsed p-3 py-2"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#Internet-collapseRating" aria-expanded="false"
                                                            aria-controls="Internet-collapseRating">
                                                            <span class="text-muted fs-6">Internet</span><span
                                                                class="badge bg-red text-body fs-12 fw-medium ms-auto ratingColor"
                                                                style="
                                                            color: #FFF !important;
                                                        "><i
                                                                    class="mdi mdi-star text-warning pe-1"></i><span
                                                                    class="cleanessSpan">0</span>/5</span>
                                                                    <input type="hidden" class="internetReview reviewValue">
                                                        </button>
                                                    </h2>
                                                    <div id="Internet-collapseRating" class="accordion-collapse collapse"
                                                        aria-labelledby="Internet-headingRating" style="">
                                                        <div class="accordion-body text-body p-2 pt-0">
                                                            <div class="d-flex flex-column gap-2">
                                                                <div class="form-check ps-2">
                                                                    <label class="form-check-label" for="productratingRadio4">
                                                                        <span class="text-muted">
                                                                            <ul class="ratingW ps-0">
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                                <li><a href="javascript:void(0);">
                                                                                        <div class="star"></div>
                                                                                    </a></li>
                                                                            </ul>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger" id="review-error"></span>
                                </div>
                                <div class="row mt-2 mb-4">
                                    <div class="col-12">
                                        <div>
                                            <label for="exampleFormControlTextarea5" class="form-label fs-5">Add Your Feedback
                                                :</label>
                                            <textarea class="form-control feedbackReview" id="exampleFormControlTextarea5" rows="3"
                                                placeholder="Please enter your feedback here !"></textarea>
                                        </div>
                                            <span class="text-danger" id="feedbackReview-error"></span>
                                    </div>
                                </div>
                                <input type="hidden" class="hotel_id" value="0">
                                <input type="hidden" class="room_id" value="0">
                                <div class="feedback-btn text-end ">
                                    <button class="btn w-100 reviewSubmit"
                                        style="background-color: #6a78d2;border: 1px solid #6a78d5;color: #fff;">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- HOTEL REVIEW POPOUP END --}}

    @include('frontend::orderHistory.view')
@endsection


@push('script')
@include('frontend::orderHistory.scripts')
@endpush
