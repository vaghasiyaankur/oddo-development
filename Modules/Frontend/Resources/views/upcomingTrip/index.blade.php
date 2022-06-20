@extends('frontend::layouts.master')

@section('title')
    Upcoming Trips
@endsection


@push('css')
{{-- <link rel="stylesheet" href="https://kenwheeler.github.io/slick/slick/slick-theme.css"> --}}
@endpush


@section('content')

    <!-------- UPCOMING TRIP SECTION SECTION START ---------->
    <section class="upcoming-trip-section order-history">
        <div class="container">
            <div class="upcoming-trip-title text-center">
                <h4>Upcoming Trips</h4>
                <div class="flag-with-text d-flex flex-wrap align-items-center justify-content-center">
                    <img src="assets/images/icons/n-logo-1.png" alt="">
                    <p class="m-0 spain-i-text ms-3">Your trip to United States</p>
                </div>
            </div>
            <div class="upcoming-trip-details order-history-details">
                <!------ ACCORDION START ----->
                <div class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-collapse">
                            <div class="accordion-body a-bx-shadow p-0">
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
                                        <div class="col-12 col-lg-6 left-order-list mt-4">
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
                                        <div class="col-12 col-lg-6 right-order-list mt-4">
                                            <span class="h-btn">Transportation</span>
                                            <div class="transpot-details p-sm-3 p-2">
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
                <!------ ACCORDION END ----->
                <div class="cansel-Reservation text-center">
                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#cansel_reservation"><span>Cancel
                            Reservation</span></a>

                    <!------ CANSEL TRIP POPUP MODAL START ------->
                    <div class="modal fade" id="cansel_reservation" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header justify-content-end">
                                    <button type="button" class="modal-close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>
                                <div class="modal-body d-flex align-items-center justify-content-center">
                                    <div class="modal-body-trip text-center">
                                        <div class="modal-title mx-auto mb-4">
                                            <img src="assets/images/icons/upcoming-Alert.png" alt="">
                                        </div>
                                        <div class="modal-form">
                                            <p class="trip-pera mx-auto">Are you sure you want to cancel the following
                                                reservation?</p>
                                            <div
                                                class="spain-text d-flex justify-content-center align-items-center mb-4 ">
                                                <img src="assets/images/icons/Spain.png" alt="">
                                                <p class="m-0 spain-i-text ms-3">Madrid, Spain</p>
                                            </div>
                                            <div class="holiday-details">
                                                <h5 class="h--title text-start ms-2">Hotel Holiday Inn</h5>
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
                                            <p class="tript-p-text">Free cancelation until 19/08/2020</p>
                                            <div class="cansel-Reservation text-center mb-0">
                                                <a href="javascript:;" data-bs-toggle="modal"
                                                    data-bs-target="#conformation_c_trip"><span>Confirm Cancelation</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-----------CANSEL TRIP POPUP END--------------->

                    <!------CONFORMATION CANSEL TRIP POPUP MODAL START ------->
                    <div class="modal fade" id="conformation_c_trip" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header justify-content-end">
                                    <button type="button" class="modal-close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>
                                <div class="modal-body d-flex align-items-center justify-content-center">
                                    <div class="modal-body-cansel-trip text-center">
                                        <div class="modal-title mx-auto mb-4">
                                            <p class="cansel-t-pera mx-auto">You’ve succesfully cancelled reservation<span class="text-danger"> # 10280</span></p>
                                        </div>
                                        <div class="modal-form"> 
                                            <div class="spain-text d-flex justify-content-center align-items-center mb-5">
                                                <img src="assets/images/icons/Spain.png" alt="">
                                                <p class="m-0 spain-i-text ms-3">Madrid, Spain</p>
                                            </div>
                                            <div class="holiday-details opacity-50">
                                                <h5 class="h--title text-start ms-2">Hotel Holiday Inn</h5>
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
                                            <p class="tript-p-text">We are sorry that you had to cancel.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-----------CONFORMATION CANSEL TRIP POPUP END--------------->
                </div>
            </div>
        </div>
    </section>

    <!-------- UPCOMING TRIP SECTION END ---------->

@endsection
@push('script')


@endpush
