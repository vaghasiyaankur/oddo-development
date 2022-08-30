@extends('layout::user.Frontend.master')

@section('title')
    Order History
@endsection


@push('css')
    {{-- <link rel="stylesheet" href="https://kenwheeler.github.io/slick/slick/slick-theme.css"> --}}

    <style>
        .review_details_popup .accordion-button::after {
            content: "" !important;
            margin-left: 11px;
            width: 0.80rem;
            height: 0.80rem;
            background-size: 0.80rem;
        }

        /* rating css */
        input.star {
            display: none;
        }

        label.mdi {
            float: right;
            /* padding: 10px; */
                font-size: 17px;
            color:
                #444;
            transition: all .2s;
        }

        input.star:checked~label.mdi:before {
            color:
                #ffc700;
            transition: all .25s;
        }

        input.star-5:checked~label.mdi:before {
            color:
                #ffc700;
            text-shadow: 0 0 5px #7f8c8d;
        }

        input.star-1:checked~label.mdi:before {
            color:
                #ffc700;
        }

        label.mdi:hover {
            transform: rotate(-15deg) scale(1.3);
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
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <div class="d-flex flex-wrap align-items-center p-3 justify-content-sm-evenly justify-content-start j_c_center"
                                href="#collapseOne" data-bs-toggle="collapse" aria-expanded="false"
                                aria-controls="collapseExample">
                                <a class="btn p-0 mb-2">
                                    <img src="assets/images/icons/downarrow.png">
                                </a>
                                <div class="col_id fs-6">Order Id:1019013671</div>
                                <div class="col_totl fs-6 mt-1 mt-md-0">Total:$2,450.00</div>
                                <div
                                    class="col_amt fs-6 d-flex flex-wrap align-items-center justify-content-sm-center mt-2 mt-md-0">
                                    <img src="assets/images/icons/order-d_right-icon.png" alt="">
                                    <span class="ps-1">Purchesed on </span><span class="ps-1 mt-1 mt-md-0">24 Aug 19,
                                        12:44pm</span>
                                </div>
                            </div>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body p-0">
                                <div class="order-id d-flex flex-wrap align-items-center justify-content-evenly">
                                    <p class="mb-0 or-id">Order Id: 1020657781</p>
                                    <p class="mb-0 or-total">Total: $2,550.00</p>
                                    <div
                                        class="purches-date d-flex flex-wrap align-items-center justify-content-center ms-sm-3">
                                        <img src="assets/images/icons/order-right-icon.png" class="pe-1" alt="">
                                        <span class="ps-1">Purchesed on </span><span class="ps-1">24 Aug 19,
                                            12:44pm</span>
                                    </div>
                                </div>
                                <div class="order-id-inner">
                                    <div class="row">
                                        <div class="recipt_button text-end mt-3">
                                            <a href="javascript:;" data-bs-toggle="modal"
                                                data-bs-target="#review__popup"><span class="recipt-btn me-4">+ Add
                                                    Review</span></a>
                                        </div>
                                        <div class="col-12 col-lg-6 left-order-list">
                                            <span class="h-btn">Hotels</span>
                                            <div class="holiday-details">
                                                <h5 class="h--title ms-2">Hotel Holiday Inn</h5>
                                                <div class="h-date d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon.png" alt="">
                                                    <p class="m-0 pe-2">Mar 23, 2020</p>
                                                    <img src="assets/images/icons/order-h-eroow.png" alt="">
                                                    <p class="m-0 ps-2">Jun 12, 2020</p>
                                                </div>
                                                <div class="h-pepl d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon2.png" alt="">
                                                    <p class="m-0">2 Guests, 1 Infant</p>
                                                </div>
                                                <div class="h-room d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon3.png" alt="">
                                                    <p class="m-0">2 Rooms, 1 King, 2 Queen</p>
                                                </div>
                                                <div class="h-totl d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <p class="m-0 h--totl ms-2 mt-2">Total</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <p class="m-0 pe-2 h-amount">$1,245.00</p><span
                                                            class="h--totl text-muted">for 8 nights</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="holiday-details mb-3">
                                                <h5 class="h--title ms-2">Hotel Holiday Inn</h5>
                                                <div class="h-date d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon.png" alt="">
                                                    <p class="m-0 pe-2">Mar 23, 2020</p>
                                                    <img src="assets/images/icons/order-h-eroow.png" alt="">
                                                    <p class="m-0 ps-2">Jun 12, 2020</p>
                                                </div>
                                                <div class="h-pepl d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon2.png" alt="">
                                                    <p class="m-0">2 Guests, 1 Infant</p>
                                                </div>
                                                <div class="h-room d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon3.png" alt="">
                                                    <p class="m-0">2 Rooms, 1 King, 2 Queen</p>
                                                </div>
                                                <div class="h-totl d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <p class="m-0 h--totl ms-2 mt-2">Total</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <p class="m-0 pe-2 h-amount">$1,245.00</p><span
                                                            class="h--totl text-muted">for 8 nights</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 right-order-list">
                                            <span class="h-btn">Transportation</span>
                                            <div class="transpot-details p-3">
                                                <img src="assets/images/icons/order-transpot-icon.png" alt="">
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
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <div class="d-flex flex-wrap align-items-center p-3 justify-content-sm-evenly justify-content-start j_c_center"
                                href="#collapsetwo" data-bs-toggle="collapse" aria-expanded="false"
                                aria-controls="collapseExample">
                                <a class="btn p-0 mb-2">
                                    <img src="assets/images/icons/downarrow.png">
                                </a>
                                <div class="col_id fs-6">Order Id:1019013671</div>
                                <div class="col_totl fs-6 mt-1 mt-md-0">Total:$2,450.00</div>
                                <div
                                    class="col_amt fs-6 d-flex flex-wrap align-items-center justify-content-sm-center mt-2 mt-md-0">
                                    <img src="assets/images/icons/order-d_right-icon.png" alt="">
                                    <span class="ps-1">Purchesed on </span><span class="ps-1 mt-1 mt-md-0">24 Aug 19,
                                        12:44pm</span>
                                </div>
                            </div>
                        </h2>
                        <div id="collapsetwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body p-0">
                                <div class="order-id d-flex flex-wrap align-items-center justify-content-evenly">
                                    <p class="mb-0 or-id">Order Id: 1020657781</p>
                                    <p class="mb-0 or-total">Total: $2,550.00</p>
                                    <div
                                        class="purches-date d-flex flex-wrap align-items-center justify-content-center ms-sm-3">
                                        <img src="assets/images/icons/order-right-icon.png" class="pe-1"
                                            alt="">
                                        <span class="ps-1">Purchesed on </span><span class="ps-1">24 Aug 19,
                                            12:44pm</span>
                                    </div>
                                </div>
                                <div class="order-id-inner">
                                    <div class="row">
                                        <div class="recipt_button text-end mt-3">
                                            <a href="javascript:;"><span class="recipt-btn me-4">+ Add Review</span></a>
                                        </div>
                                        <div class="col-12 col-lg-6 left-order-list">
                                            <span class="h-btn">Hotels</span>
                                            <div class="holiday-details">
                                                <h5 class="h--title ms-2">Hotel Holiday Inn</h5>
                                                <div class="h-date d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon.png" alt="">
                                                    <p class="m-0 pe-2">Mar 23, 2020</p>
                                                    <img src="assets/images/icons/order-h-eroow.png" alt="">
                                                    <p class="m-0 ps-2">Jun 12, 2020</p>
                                                </div>
                                                <div class="h-pepl d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon2.png" alt="">
                                                    <p class="m-0">2 Guests, 1 Infant</p>
                                                </div>
                                                <div class="h-room d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon3.png" alt="">
                                                    <p class="m-0">2 Rooms, 1 King, 2 Queen</p>
                                                </div>
                                                <div class="h-totl d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <p class="m-0 h--totl ms-2 mt-2">Total</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <p class="m-0 pe-2 h-amount">$1,245.00</p><span
                                                            class="h--totl text-muted">for 8 nights</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="holiday-details mb-3">
                                                <h5 class="h--title ms-2">Hotel Holiday Inn</h5>
                                                <div class="h-date d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon.png" alt="">
                                                    <p class="m-0 pe-2">Mar 23, 2020</p>
                                                    <img src="assets/images/icons/order-h-eroow.png" alt="">
                                                    <p class="m-0 ps-2">Jun 12, 2020</p>
                                                </div>
                                                <div class="h-pepl d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon2.png" alt="">
                                                    <p class="m-0">2 Guests, 1 Infant</p>
                                                </div>
                                                <div class="h-room d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon3.png" alt="">
                                                    <p class="m-0">2 Rooms, 1 King, 2 Queen</p>
                                                </div>
                                                <div class="h-totl d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <p class="m-0 h--totl ms-2 mt-2">Total</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <p class="m-0 pe-2 h-amount">$1,245.00</p><span
                                                            class="h--totl text-muted">for 8 nights</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 right-order-list">
                                            <span class="h-btn">Transportation</span>
                                            <div class="transpot-details p-3">
                                                <img src="assets/images/icons/order-transpot-icon.png" alt="">
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
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <div class="d-flex flex-wrap align-items-center p-3 justify-content-sm-evenly justify-content-start j_c_center"
                                href="#collapseThree" data-bs-toggle="collapse" aria-expanded="false"
                                aria-controls="collapseExample">
                                <a class="btn p-0 mb-2">
                                    <img src="assets/images/icons/downarrow.png">
                                </a>
                                <div class="col_id fs-6">Order Id:1019013671</div>
                                <div class="col_totl fs-6 mt-1 mt-md-0">Total:$2,450.00</div>
                                <div
                                    class="col_amt fs-6 d-flex flex-wrap align-items-center justify-content-sm-center mt-2 mt-md-0">
                                    <img src="assets/images/icons/order-d_right-icon.png" alt="">
                                    <span class="ps-1">Purchesed on </span><span class="ps-1 mt-1 mt-md-0">24 Aug 19,
                                        12:44pm</span>
                                </div>
                            </div>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body p-0">
                                <div class="order-id d-flex flex-wrap align-items-center justify-content-evenly">
                                    <p class="mb-0 or-id">Order Id: 1020657781</p>
                                    <p class="mb-0 or-total">Total: $2,550.00</p>
                                    <div
                                        class="purches-date d-flex flex-wrap align-items-center justify-content-center ms-sm-3">
                                        <img src="assets/images/icons/order-right-icon.png" class="pe-1"
                                            alt="">
                                        <span class="ps-1">Purchesed on </span><span class="ps-1">24 Aug 19,
                                            12:44pm</span>
                                    </div>
                                </div>
                                <div class="order-id-inner">
                                    <div class="row">
                                        <div class="recipt_button text-end mt-3">
                                            <a href="javascript:;"><span class="recipt-btn me-4">+ Add Review</span></a>
                                        </div>
                                        <div class="col-12 col-lg-6 left-order-list">
                                            <span class="h-btn">Hotels</span>
                                            <div class="holiday-details">
                                                <h5 class="h--title ms-2">Hotel Holiday Inn</h5>
                                                <div class="h-date d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon.png" alt="">
                                                    <p class="m-0 pe-2">Mar 23, 2020</p>
                                                    <img src="assets/images/icons/order-h-eroow.png" alt="">
                                                    <p class="m-0 ps-2">Jun 12, 2020</p>
                                                </div>
                                                <div class="h-pepl d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon2.png" alt="">
                                                    <p class="m-0">2 Guests, 1 Infant</p>
                                                </div>
                                                <div class="h-room d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon3.png" alt="">
                                                    <p class="m-0">2 Rooms, 1 King, 2 Queen</p>
                                                </div>
                                                <div class="h-totl d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <p class="m-0 h--totl ms-2 mt-2">Total</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <p class="m-0 pe-2 h-amount">$1,245.00</p><span
                                                            class="h--totl text-muted">for 8 nights</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="holiday-details mb-3">
                                                <h5 class="h--title ms-2">Hotel Holiday Inn</h5>
                                                <div class="h-date d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon.png" alt="">
                                                    <p class="m-0 pe-2">Mar 23, 2020</p>
                                                    <img src="assets/images/icons/order-h-eroow.png" alt="">
                                                    <p class="m-0 ps-2">Jun 12, 2020</p>
                                                </div>
                                                <div class="h-pepl d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon2.png" alt="">
                                                    <p class="m-0">2 Guests, 1 Infant</p>
                                                </div>
                                                <div class="h-room d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon3.png" alt="">
                                                    <p class="m-0">2 Rooms, 1 King, 2 Queen</p>
                                                </div>
                                                <div class="h-totl d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <p class="m-0 h--totl ms-2 mt-2">Total</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <p class="m-0 pe-2 h-amount">$1,245.00</p><span
                                                            class="h--totl text-muted">for 8 nights</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 right-order-list">
                                            <span class="h-btn">Transportation</span>
                                            <div class="transpot-details p-3">
                                                <img src="assets/images/icons/order-transpot-icon.png" alt="">
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
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <div class="d-flex flex-wrap align-items-center p-3 justify-content-sm-evenly justify-content-start j_c_center"
                                href="#collapseFour" data-bs-toggle="collapse" aria-expanded="false"
                                aria-controls="collapseExample">
                                <a class="btn p-0 mb-2">
                                    <img src="assets/images/icons/downarrow.png">
                                </a>
                                <div class="col_id fs-6">Order Id:1019013671</div>
                                <div class="col_totl fs-6 mt-1 mt-md-0">Total:$2,450.00</div>
                                <div
                                    class="col_amt fs-6 d-flex flex-wrap align-items-center justify-content-sm-center mt-2 mt-md-0">
                                    <img src="assets/images/icons/order-d_right-icon.png" alt="">
                                    <span class="ps-1">Purchesed on </span><span class="ps-1 mt-1 mt-md-0">24 Aug 19,
                                        12:44pm</span>
                                </div>
                            </div>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body p-0">
                                <div class="order-id d-flex flex-wrap align-items-center justify-content-evenly">
                                    <p class="mb-0 or-id">Order Id: 1020657781</p>
                                    <p class="mb-0 or-total">Total: $2,550.00</p>
                                    <div
                                        class="purches-date d-flex flex-wrap align-items-center justify-content-center ms-sm-3">
                                        <img src="assets/images/icons/order-right-icon.png" class="pe-1"
                                            alt="">
                                        <span class="ps-1">Purchesed on </span><span class="ps-1">24 Aug 19,
                                            12:44pm</span>
                                    </div>
                                </div>
                                <div class="order-id-inner">
                                    <div class="row">
                                        <div class="recipt_button text-end mt-3">
                                            <a href="javascript:;"><span class="recipt-btn me-4">+ Add Review</span></a>
                                        </div>
                                        <div class="col-12 col-lg-6 left-order-list">
                                            <span class="h-btn">Hotels</span>
                                            <div class="holiday-details">
                                                <h5 class="h--title ms-2">Hotel Holiday Inn</h5>
                                                <div class="h-date d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon.png" alt="">
                                                    <p class="m-0 pe-2">Mar 23, 2020</p>
                                                    <img src="assets/images/icons/order-h-eroow.png" alt="">
                                                    <p class="m-0 ps-2">Jun 12, 2020</p>
                                                </div>
                                                <div class="h-pepl d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon2.png" alt="">
                                                    <p class="m-0">2 Guests, 1 Infant</p>
                                                </div>
                                                <div class="h-room d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon3.png" alt="">
                                                    <p class="m-0">2 Rooms, 1 King, 2 Queen</p>
                                                </div>
                                                <div class="h-totl d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <p class="m-0 h--totl ms-2 mt-2">Total</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <p class="m-0 pe-2 h-amount">$1,245.00</p><span
                                                            class="h--totl text-muted">for 8 nights</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="holiday-details mb-3">
                                                <h5 class="h--title ms-2">Hotel Holiday Inn</h5>
                                                <div class="h-date d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon.png" alt="">
                                                    <p class="m-0 pe-2">Mar 23, 2020</p>
                                                    <img src="assets/images/icons/order-h-eroow.png" alt="">
                                                    <p class="m-0 ps-2">Jun 12, 2020</p>
                                                </div>
                                                <div class="h-pepl d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon2.png" alt="">
                                                    <p class="m-0">2 Guests, 1 Infant</p>
                                                </div>
                                                <div class="h-room d-flex align-items-center">
                                                    <img src="assets/images/icons/order-hotel-icon3.png" alt="">
                                                    <p class="m-0">2 Rooms, 1 King, 2 Queen</p>
                                                </div>
                                                <div class="h-totl d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <p class="m-0 h--totl ms-2 mt-2">Total</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <p class="m-0 pe-2 h-amount">$1,245.00</p><span
                                                            class="h--totl text-muted">for 8 nights</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6 right-order-list">
                                            <span class="h-btn">Transportation</span>
                                            <div class="transpot-details p-3">
                                                <img src="assets/images/icons/order-transpot-icon.png" alt="">
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
                                                            class="badge bg-green text-body fs-12 fw-medium ms-auto"
                                                            style="
                                                        color: #fff !important;
                                                    "><i
                                                                class="mdi mdi-star text-warning pe-1"></i><span class="cleanessSpan"></span>/5</span>
                                                    </button>
                                                </h2>
                                                <div id="staff-collapseRating" class="accordion-collapse collapse"
                                                    aria-labelledby="staff-headingRating" style="">
                                                    <div class="accordion-body text-body p-2 pt-0">
                                                        <div class="d-flex flex-column gap-2">
                                                            <div class="form-check ps-2">
                                                                <label class="form-check-label" for="productratingRadio4">
                                                                    <span class="text-muted">
                                                                        <input class="star staff-5 cleanessReview" value="5"
                                                                            id="staff-5" type="radio"
                                                                            name="star" />
                                                                        <label class="mdi mdi-star"
                                                                            for="staff-5"></label>
                                                                        <input class="star staff-4 cleanessReview" value="4"
                                                                            id="staff-4" type="radio"
                                                                            name="star" />
                                                                        <label class="mdi mdi-star"
                                                                            for="staff-4"></label>
                                                                        <input class="star staff-3 cleanessReview" value="3"
                                                                            id="staff-3" type="radio"
                                                                            name="star" />
                                                                        <label class="mdi mdi-star"
                                                                            for="star-3"></label>
                                                                        <input class="star staff-2 cleanessReview" value="2"
                                                                            id="staff-2" type="radio"
                                                                            name="star" />
                                                                        <label class="mdi mdi-star"
                                                                            for="staff-2"></label>
                                                                        <input class="star staff-1 cleanessReview" value="1"
                                                                            id="staff-1" type="radio"
                                                                            name="star" />
                                                                        <label class="mdi mdi-star"
                                                                            for="staff-1"></label>
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
                                                            class="badge bg-orange text-body fs-12 fw-medium ms-auto"
                                                            style="color: #fff !important"><i
                                                                class="mdi mdi-star text-warning pe-1"></i><span class="cleanessSpan"></span>/5</span>
                                                    </button>
                                                </h2>
                                                <div id="Cleanless-collapseRating" class="accordion-collapse collapse"
                                                    aria-labelledby="Cleanless-headingRating" style="">
                                                    <div class="accordion-body text-body p-2 pt-0">
                                                        <div class="d-flex flex-column gap-2">
                                                            <div class="form-check ps-2">
                                                                <label class="form-check-label" for="productratingRadio4">
                                                                    <span class="text-muted">
                                                                        <input class="star star-5 cleanessReview" value="5"
                                                                            id="star-5" type="radio"
                                                                            name="star" />
                                                                        <label class="mdi mdi-star"
                                                                            for="star-5"></label>
                                                                        <input class="star star-4 cleanessReview" value="4"
                                                                            id="star-4" type="radio"
                                                                            name="star" />
                                                                        <label class="mdi mdi-star"
                                                                            for="star-4"></label>
                                                                        <input class="star star-3 cleanessReview" value="3"
                                                                            id="star-3" type="radio"
                                                                            name="star" />
                                                                        <label class="mdi mdi-star"
                                                                            for="star-3"></label>
                                                                        <input class="star star-2 cleanessReview" value="2"
                                                                            id="star-2" type="radio"
                                                                            name="star" />
                                                                        <label class="mdi mdi-star"
                                                                            for="star-2"></label>
                                                                        <input class="star star-1 cleanessReview" value="1"
                                                                            id="star-1" type="radio"
                                                                            name="star" />
                                                                        <label class="mdi mdi-star"
                                                                            for="star-1"></label>

                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="Room-headingRating">
                                                    <button
                                                        class="accordion-button bg-transparent shadow-none collapsed p-3 py-2"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#Room-collapseRating" aria-expanded="false"
                                                        aria-controls="Room-collapseRating">
                                                        <span class="text-muted fs-6">Room</span><span
                                                            class="badge bg-red text-body fs-12 fw-medium ms-auto"
                                                            style="
                                                        color: #fff !important;
                                                    "><i
                                                                class="mdi mdi-star text-warning pe-1"></i>2/5</span>
                                                    </button>
                                                </h2>
                                                <div id="Room-collapseRating" class="accordion-collapse collapse"
                                                    aria-labelledby="Room-headingRating" style="">
                                                    <div class="accordion-body text-body p-2 pt-0">
                                                        <div class="d-flex flex-column gap-2">
                                                            <div class="form-check ps-2">
                                                                <label class="form-check-label" for="productratingRadio4">
                                                                    <span class="text-muted">
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star"></i>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="Location-headingRating">
                                                    <button
                                                        class="accordion-button bg-transparent shadow-none collapsed p-3 py-2"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#Location-collapseRating" aria-expanded="false"
                                                        aria-controls="Location-collapseRating">
                                                        <span class="text-muted fs-6">Location</span><span
                                                            class="badge bg-red text-body fs-12 fw-medium ms-auto"
                                                            style="color: #fff !important"><i
                                                                class="mdi mdi-star text-warning pe-1"></i>2/5</span>
                                                    </button>
                                                </h2>
                                                <div id="Location-collapseRating" class="accordion-collapse collapse"
                                                    aria-labelledby="Location-headingRating" style="">
                                                    <div class="accordion-body text-body p-2 pt-0">
                                                        <div class="d-flex flex-column gap-2">
                                                            <div class="form-check ps-2">
                                                                <label class="form-check-label" for="productratingRadio4">
                                                                    <span class="text-muted">
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star"></i>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="Breakfast-headingRating">
                                                    <button
                                                        class="accordion-button bg-transparent shadow-none collapsed p-3 py-2"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#Breakfast-collapseRating" aria-expanded="false"
                                                        aria-controls="Breakfast-collapseRating">
                                                        <span class="text-muted fs-6">Breakfast</span><span
                                                            class="badge bg-green text-body fs-12 fw-medium ms-auto"
                                                            style="color: #fff !important"><i
                                                                class="mdi mdi-star text-warning pe-1"></i>4/5</span>
                                                    </button>
                                                </h2>
                                                <div id="Breakfast-collapseRating" class="accordion-collapse collapse"
                                                    aria-labelledby="Breakfast-headingRating" style="">
                                                    <div class="accordion-body text-body p-2 pt-0">
                                                        <div class="d-flex flex-column gap-2">
                                                            <div class="form-check ps-2">
                                                                <label class="form-check-label" for="productratingRadio4">
                                                                    <span class="text-muted">
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star"></i>
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
                                        <div class="col-12 mb-2">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="Service-headingRating">
                                                    <button
                                                        class="accordion-button bg-transparent shadow-none collapsed p-3 py-2"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#Service-collapseRating" aria-expanded="false"
                                                        aria-controls="Service-collapseRating">
                                                        <span class="text-muted fs-6">Service & Staff</span><span
                                                            class="badge bg-green text-body fs-12 fw-medium ms-auto"
                                                            style="color: #fff !important"><i
                                                                class="mdi mdi-star text-warning pe-1"></i>5/5</span>
                                                    </button>
                                                </h2>
                                                <div id="Service-collapseRating" class="accordion-collapse collapse"
                                                    aria-labelledby="Service-headingRating" style="">
                                                    <div class="accordion-body text-body p-2 pt-0">
                                                        <div class="d-flex flex-column gap-2">
                                                            <div class="form-check ps-2">
                                                                <label class="form-check-label" for="productratingRadio4">
                                                                    <span class="text-muted">
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star"></i>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="property-headingRating">
                                                    <button
                                                        class="accordion-button bg-transparent shadow-none collapsed p-3 py-2"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#property-collapseRating" aria-expanded="false"
                                                        aria-controls="property-collapseRating">
                                                        <span class="text-muted fs-6">Property condition</span><span
                                                            class="badge bg-green text-body fs-12 fw-medium ms-auto"
                                                            style="color: #fff !important"><i
                                                                class="mdi mdi-star text-warning pe-1"></i>4/5</span>
                                                    </button>
                                                </h2>
                                                <div id="property-collapseRating" class="accordion-collapse collapse"
                                                    aria-labelledby="property-headingRating" style="">
                                                    <div class="accordion-body text-body p-2 pt-0">
                                                        <div class="d-flex flex-column gap-2">
                                                            <div class="form-check ps-2">
                                                                <label class="form-check-label" for="productratingRadio4">
                                                                    <span class="text-muted">
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star"></i>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="Price-headingRating">
                                                    <button
                                                        class="accordion-button bg-transparent shadow-none collapsed p-3 py-2"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#Price-collapseRating" aria-expanded="false"
                                                        aria-controls="Price-collapseRating">
                                                        <span class="text-muted fs-6">Price / Quality</span><span
                                                            class="badge bg-red text-body fs-12 fw-medium ms-auto"
                                                            style="color: #fff !important"><i
                                                                class="mdi mdi-star text-warning pe-1"></i>2/5</span>
                                                    </button>
                                                </h2>
                                                <div id="Price-collapseRating" class="accordion-collapse collapse"
                                                    aria-labelledby="Price-headingRating" style="">
                                                    <div class="accordion-body text-body p-2 pt-0">
                                                        <div class="d-flex flex-column gap-2">
                                                            <div class="form-check ps-2">
                                                                <label class="form-check-label" for="productratingRadio4">
                                                                    <span class="text-muted">
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star"></i>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="Amenities-headingRating">
                                                    <button
                                                        class="accordion-button bg-transparent shadow-none collapsed p-3 py-2"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#Amenities-collapseRating" aria-expanded="false"
                                                        aria-controls="Amenities-collapseRating">
                                                        <span class="text-muted fs-6">Amenities</span><span
                                                            class="badge bg-green text-body fs-12 fw-medium ms-auto"
                                                            style="color: #fff !important"><i
                                                                class="mdi mdi-star text-warning pe-1"></i>4/5</span>
                                                    </button>
                                                </h2>
                                                <div id="Amenities-collapseRating" class="accordion-collapse collapse"
                                                    aria-labelledby="Amenities-headingRating" style="">
                                                    <div class="accordion-body text-body p-2 pt-0">
                                                        <div class="d-flex flex-column gap-2">
                                                            <div class="form-check ps-2">
                                                                <label class="form-check-label" for="productratingRadio4">
                                                                    <span class="text-muted">
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star"></i>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="Internet-headingRating">
                                                    <button
                                                        class="accordion-button bg-transparent shadow-none collapsed p-3 py-2"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#Internet-collapseRating" aria-expanded="false"
                                                        aria-controls="Internet-collapseRating">
                                                        <span class="text-muted fs-6">Internet</span><span
                                                            class="badge bg-green text-body fs-12 fw-medium ms-auto"
                                                            style="
                                                        color: #FFF !important;
                                                    "><i
                                                                class="mdi mdi-star text-warning pe-1"></i>4/5</span>
                                                    </button>
                                                </h2>
                                                <div id="Internet-collapseRating" class="accordion-collapse collapse"
                                                    aria-labelledby="Internet-headingRating" style="">
                                                    <div class="accordion-body text-body p-2 pt-0">
                                                        <div class="d-flex flex-column gap-2">
                                                            <div class="form-check ps-2">
                                                                <label class="form-check-label" for="productratingRadio4">
                                                                    <span class="text-muted">
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star text-warning"></i>
                                                                        <i class="mdi mdi-star"></i>
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
                            </div>
                            <div class="row mt-2 mb-4">
                                <div class="col-12">
                                    <div>
                                        <label for="exampleFormControlTextarea5" class="form-label fs-5">Add Your Feedback
                                            :</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea5" rows="3"
                                            placeholder="Please enter your feedback here !"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback-btn text-end ">
                                <button class="btn w-100 reviewSubmit"
                                    style="background-color: #6a78d2;border: 1px solid #6a78d5;color: #fff;">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- HOTEL REVIEW POPOUP END --}}
@endsection
@push('script')
<script>
    $(document).ready(function(){
        $(document).on('change','.cleanessReview', function(){
            var cleanessReview = $('.cleanessReview:checked').val();
            var review = $(this).closest('.reviewMainDiv');
            var child = review.find('.cleanessSpan').html(cleanessReview);
        });
    });
</script>
@endpush
