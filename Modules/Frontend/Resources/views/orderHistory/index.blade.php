@extends('frontend::layouts.master')

@section('title')
    Order History
@endsection


@push('css')
{{-- <link rel="stylesheet" href="https://kenwheeler.github.io/slick/slick/slick-theme.css"> --}}
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
                            <div class="d-flex flex-wrap align-items-center p-3 justify-content-sm-evenly justify-content-start j_c_center" href="#collapseOne" data-bs-toggle="collapse"
                                aria-expanded="false" aria-controls="collapseExample">
                                <a class="btn p-0 mb-2">
                                    <img src="assets/images/icons/downarrow.png">
                                </a>
                                <div class="col_id fs-6">Order Id:1019013671</div>
                                <div class="col_totl fs-6 mt-1 mt-md-0">Total:$2,450.00</div>
                                <div class="col_amt fs-6 d-flex flex-wrap align-items-center justify-content-sm-center mt-2 mt-md-0">
                                    <img src="assets/images/icons/order-d_right-icon.png" alt="">
                                    <span class="ps-1">Purchesed on </span><span class="ps-1 mt-1 mt-md-0">24 Aug 19, 12:44pm</span>
                                </div>
                            </div>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body p-0">
                                <div class="order-id d-flex flex-wrap align-items-center justify-content-evenly">
                                    <p class="mb-0 or-id">Order Id: 1020657781</p>
                                    <p class="mb-0 or-total">Total: $2,550.00</p>
                                    <div class="purches-date d-flex flex-wrap align-items-center justify-content-center ms-sm-3">
                                        <img src="assets/images/icons/order-right-icon.png" class="pe-1" alt="">
                                        <span class="ps-1">Purchesed on </span><span class="ps-1">24 Aug 19, 12:44pm</span>
                                    </div>
                                </div>
                                <div class="order-id-inner">
                                    <div class="row">
                                        <div class="recipt_button text-end mt-3">
                                            <a href="recipt-conformation.html"><span class="recipt-btn me-4">Receipt</span></a>
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
                            <div class="d-flex flex-wrap align-items-center p-3 justify-content-sm-evenly justify-content-start j_c_center" href="#collapsetwo" data-bs-toggle="collapse"
                                aria-expanded="false" aria-controls="collapseExample">
                                <a class="btn p-0 mb-2">
                                    <img src="assets/images/icons/downarrow.png">
                                </a>
                                <div class="col_id fs-6">Order Id:1019013671</div>
                                <div class="col_totl fs-6 mt-1 mt-md-0">Total:$2,450.00</div>
                                <div class="col_amt fs-6 d-flex flex-wrap align-items-center justify-content-sm-center mt-2 mt-md-0">
                                    <img src="assets/images/icons/order-d_right-icon.png" alt="">
                                    <span class="ps-1">Purchesed on </span><span class="ps-1 mt-1 mt-md-0">24 Aug 19, 12:44pm</span>
                                </div>
                            </div>
                        </h2>
                        <div id="collapsetwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body p-0">
                                <div class="order-id d-flex flex-wrap align-items-center justify-content-evenly">
                                    <p class="mb-0 or-id">Order Id: 1020657781</p>
                                    <p class="mb-0 or-total">Total: $2,550.00</p>
                                    <div class="purches-date d-flex flex-wrap align-items-center justify-content-center ms-sm-3">
                                        <img src="assets/images/icons/order-right-icon.png" class="pe-1" alt="">
                                        <span class="ps-1">Purchesed on </span><span class="ps-1">24 Aug 19, 12:44pm</span>
                                    </div>
                                </div>
                                <div class="order-id-inner">
                                    <div class="row">
                                        <div class="recipt_button text-end mt-3">
                                            <a href="recipt-conformation.html"><span class="recipt-btn me-4">Receipt</span></a>
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
                            <div class="d-flex flex-wrap align-items-center p-3 justify-content-sm-evenly justify-content-start j_c_center" href="#collapseThree" data-bs-toggle="collapse"
                                aria-expanded="false" aria-controls="collapseExample">
                                <a class="btn p-0 mb-2">
                                    <img src="assets/images/icons/downarrow.png">
                                </a>
                                <div class="col_id fs-6">Order Id:1019013671</div>
                                <div class="col_totl fs-6 mt-1 mt-md-0">Total:$2,450.00</div>
                                <div class="col_amt fs-6 d-flex flex-wrap align-items-center justify-content-sm-center mt-2 mt-md-0">
                                    <img src="assets/images/icons/order-d_right-icon.png" alt="">
                                    <span class="ps-1">Purchesed on </span><span class="ps-1 mt-1 mt-md-0">24 Aug 19, 12:44pm</span>
                                </div>
                            </div>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body p-0">
                                <div class="order-id d-flex flex-wrap align-items-center justify-content-evenly">
                                    <p class="mb-0 or-id">Order Id: 1020657781</p>
                                    <p class="mb-0 or-total">Total: $2,550.00</p>
                                    <div class="purches-date d-flex flex-wrap align-items-center justify-content-center ms-sm-3">
                                        <img src="assets/images/icons/order-right-icon.png" class="pe-1" alt="">
                                        <span class="ps-1">Purchesed on </span><span class="ps-1">24 Aug 19, 12:44pm</span>
                                    </div>
                                </div>
                                <div class="order-id-inner">
                                    <div class="row">
                                        <div class="recipt_button text-end mt-3">
                                            <a href="recipt-conformation.html"><span class="recipt-btn me-4">Receipt</span></a>
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
                            <div class="d-flex flex-wrap align-items-center p-3 justify-content-sm-evenly justify-content-start j_c_center" href="#collapseFour" data-bs-toggle="collapse"
                                aria-expanded="false" aria-controls="collapseExample">
                                <a class="btn p-0 mb-2">
                                    <img src="assets/images/icons/downarrow.png">
                                </a>
                                <div class="col_id fs-6">Order Id:1019013671</div>
                                <div class="col_totl fs-6 mt-1 mt-md-0">Total:$2,450.00</div>
                                <div class="col_amt fs-6 d-flex flex-wrap align-items-center justify-content-sm-center mt-2 mt-md-0">
                                    <img src="assets/images/icons/order-d_right-icon.png" alt="">
                                    <span class="ps-1">Purchesed on </span><span class="ps-1 mt-1 mt-md-0">24 Aug 19, 12:44pm</span>
                                </div>
                            </div>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body p-0">
                                <div class="order-id d-flex flex-wrap align-items-center justify-content-evenly">
                                    <p class="mb-0 or-id">Order Id: 1020657781</p>
                                    <p class="mb-0 or-total">Total: $2,550.00</p>
                                    <div class="purches-date d-flex flex-wrap align-items-center justify-content-center ms-sm-3">
                                        <img src="assets/images/icons/order-right-icon.png" class="pe-1" alt="">
                                        <span class="ps-1">Purchesed on </span><span class="ps-1">24 Aug 19, 12:44pm</span>
                                    </div>
                                </div>
                                <div class="order-id-inner">
                                    <div class="row">
                                        <div class="recipt_button text-end mt-3">
                                            <a href="recipt-conformation.html"><span class="recipt-btn me-4">Receipt</span></a>
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
    check-out.html
@endsection
@push('script')


@endpush
