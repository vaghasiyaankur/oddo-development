@extends('frontend::layouts.master')

@section('title')
    Planner
@endsection


@push('css')
{{-- <link rel="stylesheet" href="https://kenwheeler.github.io/slick/slick/slick-theme.css"> --}}
@endpush


@section('content')

    <!------------PLANNER SECTION START-------------->

    <section class="planner-section pb-5">
        <div class="container">
            <h5 class="planner-title text-center">My Planner</h5>
            <div class="add-checkout-btn d-flex justify-content-between align-items-center flex-wrap mb-3 ms-2">
                <div class="add_city_">
                    <span class="add__text">Add City</span><img src="{{ asset('assets/images/icons/pluse-big-blue.png') }}"
                        class="ms-2" alt="">
                </div>
                <div class="exploer-btn- d-flex justify-content-between align-items-center mt-2 mt-sm-0">
                    <a href="{{ route('checkout.index') }}" class="e_btn cart__btn"><span>Go to Checkout <img
                                src="{{ asset('assets/images/icons/planer-cart.png') }}" class="mb-1 ms-1" alt=""></span></a>
                </div>
            </div>
            <!------First Accordion start----->
            <div class="planner-acording">
                <div class="planner-acording-inner">
                    <!------Accordion title ------>
                    <div class="planner-acording-title">
                        <div
                            class="planner-acording-input d-lg-flex justify-content-between align-itmes-center flex-wrap">
                            <!------ Dropdown ------->
                            <div class="p-a-dropdown mb-2 mb-lg-0">
                                <label class="mb-2">City</label>
                                <div class="mm-dropdown">
                                    <div class="textfirst">Select<img
                                            src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-arrow-down-b-128.png"
                                            width="10" height="10" class="down" /></div>
                                    <ul>
                                        @foreach ($cities as $city)
                                        <li class="input-option" data-value="{{ $loop->iteration }}">
                                            <img src="{{asset('storage/'.@$city->country->icon)}}" width="20" height="20" /><span
                                                class="ps-3">{{ $city->name.','.$city->country->country_name }}</span>
                                        </li>
                                        @endforeach
                                        {{-- <li class="input-option" data-value="2">
                                            <img src="{{ asset('assets/images/icons/city-s.png') }}" alt="" width="20"
                                                height="20" /><span class="ps-3"></span> Madrid, Spain
                                        </li>
                                        <li class="input-option" data-value="3">
                                            <img src="{{ asset('assets/images/icons/city-s.png') }}" alt="" width="20"
                                                height="20" /><span class="ps-3"></span> Barcelona, Spain
                                        </li> --}}
                                    </ul>
                                    <input type="hidden" class="option" name="namesubmit" value="" />
                                </div>
                            </div>
                            <!------ Calender ------>
                            <div class="p-a-calender d-lg-flex ">
                                <div class="p-a-checkin pe-lg-3 mb-2 mb-lg-0">
                                    <label class="mb-2">From</label>
                                    <div class="calender_input_box d-flex align-items-center position-relative">
                                        <div class="cal-icon"><img src="{{ asset('assets/images/icons/cal-1.png') }}"
                                                class="trip_icon pe-2"></div>
                                        <div class="cal-placeholder w-100"><input type="text" id="p_a_from"
                                                class="calendar border-0" placeholder="08/19/2020" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="p-a-checkout ps-lg-3 mb-2 mb-lg-0">
                                    <label class="mb-2">To</label>
                                    <div class="calender_input_box d-flex align-items-center position-relative">
                                        <div class="cal-icon"><img src="{{ asset('assets/images/icons/cal-1.png') }}"
                                                class="trip_icon pe-2"></div>
                                        <div class="cal-placeholder w-100"><input placeholder="08/19/2020" type="text"
                                                class="calendar border-0" id="p_a_to"></div>
                                    </div>
                                </div>
                            </div>
                            <!------ Icons ------>
                            <div class="p-a-icon mt-2">
                                <div class="p-a-icon-img mt-3">
                                    <a href="javascript:;" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                        class="click-down-arrow"><img src="{{ asset('assets/images/icons/down-arrow.png') }}"></a>
                                    <a href="#"><img src="{{ asset('assets/images/icons/remove-b.png') }}"></a>
                                    <a href="#"><img src="{{ asset('assets/images/icons/menuicon.png') }}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!------- Collapse inner ------>
                    <div id="collapseOne" class="accordion-collapse collapse show p-acording-wrapper"
                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body p-a-body">
                            <div class="p-a-tablink ">
                                <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                                    <li class="nav-item " role="presentation">
                                        <button class="nav-link active rounded-pill" id="pills-overview-tab"
                                            data-bs-toggle="pill" data-bs-target="#pills-overview" type="button"
                                            role="tab" aria-controls="pills-home" aria-selected="true">Overview</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link rounded-pill" id="pills-daily-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-daily" type="button" role="tab"
                                            aria-controls="pills-profile" aria-selected="false">Daily</button>
                                    </li>
                                </ul>
                                <div class="tab-content p-a-tabcontent saved-section" id="pills-tabContent">
                                    <div class="tab-pane fade show active p-a-tabcontent-inner" id="pills-overview"
                                        role="tabpanel" aria-labelledby="pills-overview-tab">
                                        <!-------Map section start ------->
                                        <div class="p-a-tab-map">
                                            <div class="pwm-gmap overflow-hidden">
                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d463081.43252067344!2d-3.4872597865933366!3d40.31538629590688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xc42e3783261bc8b%3A0xa6ec2c940768a3ec!2sSpain!5e0!3m2!1sen!2sin!4v1651553036245!5m2!1sen!2sin"
                                                    width="100%" height="360" style="border:0;" allowfullscreen=""
                                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                        </div>
                                        <!------- Map section end -------->
                                        <!------ Hotel details swiper start -------->
                                        <div class="saved-hotels-details p-a-details pt-4 pb-5">
                                            <h5 class="box-title-text mb-4">Hotels (32)
                                                <img src="{{ asset('assets/images/icons/h-s-pluse.png') }}" class="mb-2 ps-3">
                                            </h5>
                                            <div class="hotel-wrapper mb-5 p-a-swpier">
                                                <div class="hotel-box me-3">
                                                    <img src="{{ asset('assets/images/save card.png') }}" class="img-fluid" alt="">
                                                    <div class="content">
                                                        <h5 class="ms-2">Hotel W Madrid</h5>
                                                        <span class="d-l-Purple mb-3 ms-2"><img
                                                                src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                                                class="mb-2 me-2 d-inline">
                                                            Madrid</span>
                                                        <p class="d-l-Purple mt-2 mb-1 ms-1"><span
                                                                class="purpel-text fw-bold">10/19/20 -
                                                                10/22/20 </span> 3 nights</p>
                                                        <span class="purple-dark"><img
                                                                src="{{ asset('assets/images/icons/order-hotel-icon2.png') }}"
                                                                class="d-inline" alt=""> 2 Adults</span>
                                                        <div class="text-with--btn d-flex justify-content-between">
                                                            <div class="">
                                                                <span><img
                                                                        src="{{ asset('assets/images/icons/order-hotel-icon3.png') }}"
                                                                        class="d-inline" alt="">2
                                                                    Rooms</span>
                                                                <p class="mb--0 ms-4 ps-2 purple-dark">1 King, 1 Queen
                                                                </p>
                                                            </div>
                                                            <div class="icons_">
                                                                <a href="javacsript:;"><img
                                                                        src="{{ asset('assets/images/icons/pluse-big-blue.png') }}"
                                                                        class="me-1 d-inline" alt=""></a>
                                                                <a href="javacsript:;"><img
                                                                        src="{{ asset('assets/images/icons/remove-s.png') }}"
                                                                        class="d-inline" style="width:44px;" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="search-result-price__tag b-1 p-a-details-btn position-relative">
                                                        <button class="price-btn">Show me Hotels</button>
                                                    </div>
                                                </div>
                                                <div class="hotel-box me-3">
                                                    <img src="{{ asset('assets/images/save card.png') }}" class="img-fluid" alt="">
                                                    <div class="content">
                                                        <h5 class="ms-2">Hotel W Madrid</h5>
                                                        <span class="d-l-Purple mb-3 ms-2"><img
                                                                src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                                                class="mb-2 me-2 d-inline">
                                                            Madrid</span>
                                                        <p class="d-l-Purple mt-2 mb-1 ms-1"><span
                                                                class="purpel-text fw-bold">10/19/20 -
                                                                10/22/20 </span> 3 nights</p>
                                                        <span class="purple-dark"><img
                                                                src="{{ asset('assets/images/icons/order-hotel-icon2.png') }}"
                                                                class="d-inline" alt=""> 2 Adults</span>
                                                        <div class="text-with--btn d-flex justify-content-between">
                                                            <div class="">
                                                                <span><img
                                                                        src="{{ asset('assets/images/icons/order-hotel-icon3.png') }}"
                                                                        class="d-inline" alt="">2
                                                                    Rooms</span>
                                                                <p class="mb--0 ms-4 ps-2 purple-dark">1 King, 1 Queen
                                                                </p>
                                                            </div>
                                                            <div class="icons_">
                                                                <a href="javacsript:;"><img
                                                                        src="{{ asset('assets/images/icons/pluse-big-blue.png') }}"
                                                                        class="me-1 d-inline" alt=""></a>
                                                                <a href="javacsript:;"><img
                                                                        src="{{ asset('assets/images/icons/remove-s.png') }}"
                                                                        class="d-inline" style="width:44px;" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="search-result-price__tag b-2 p-a-details-btn position-relative ">
                                                        <button class="price-btn">Show me Hotels</button>
                                                    </div>
                                                </div>
                                                <div class="hotel-box me-3">
                                                    <img src="{{ asset('assets/images/save card.png') }}" class="img-fluid" alt="">
                                                    <div class="content">
                                                        <h5 class="ms-2">Hotel W Madrid</h5>
                                                        <span class="d-l-Purple mb-3 ms-2"><img
                                                                src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                                                class="mb-2 me-2 d-inline">
                                                            Madrid</span>
                                                        <p class="d-l-Purple mt-2 mb-1 ms-1"><span
                                                                class="purpel-text fw-bold">10/19/20 -
                                                                10/22/20 </span> 3 nights</p>
                                                        <span class="purple-dark"><img
                                                                src="{{ asset('assets/images/icons/order-hotel-icon2.png') }}"
                                                                class="d-inline" alt=""> 2 Adults</span>
                                                        <div class="text-with--btn d-flex justify-content-between">
                                                            <div class="">
                                                                <span><img
                                                                        src="{{ asset('assets/images/icons/order-hotel-icon3.png') }}"
                                                                        class="d-inline" alt="">2
                                                                    Rooms</span>
                                                                <p class="mb--0 ms-4 ps-2 purple-dark">1 King, 1 Queen
                                                                </p>
                                                            </div>
                                                            <div class="icons_">
                                                                <a href="javacsript:;"><img
                                                                        src="{{ asset('assets/images/icons/pluse-big-blue.png') }}"
                                                                        class="me-1 d-inline" alt=""></a>
                                                                <a href="javacsript:;"><img
                                                                        src="{{ asset('assets/images/icons/remove-s.png') }}"
                                                                        class="d-inline" style="width:44px;" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="search-result-price__tag b-3 p-a-details-btn position-relative ">
                                                        <button class="price-btn">Show me Hotels</button>
                                                    </div>
                                                </div>
                                                <div class="hotel-box me-3">
                                                    <img src="{{ asset('assets/images/save card.png') }}" class="img-fluid" alt="">
                                                    <div class="content">
                                                        <h5 class="ms-2">Hotel W Madrid</h5>
                                                        <span class="d-l-Purple mb-3 ms-2"><img
                                                                src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                                                class="mb-2 me-2 d-inline">
                                                            Madrid</span>
                                                        <p class="d-l-Purple mt-2 mb-1 ms-1"><span
                                                                class="purpel-text fw-bold">10/19/20 -
                                                                10/22/20 </span> 3 nights</p>
                                                        <span class="purple-dark"><img
                                                                src="{{ asset('assets/images/icons/order-hotel-icon2.png') }}"
                                                                class="d-inline" alt=""> 2 Adults</span>
                                                        <div class="text-with--btn d-flex justify-content-between">
                                                            <div class="">
                                                                <span><img
                                                                        src="{{ asset('assets/images/icons/order-hotel-icon3.png') }}"
                                                                        class="d-inline" alt="">2
                                                                    Rooms</span>
                                                                <p class="mb--0 ms-4 ps-2 purple-dark">1 King, 1 Queen
                                                                </p>
                                                            </div>
                                                            <div class="icons_">
                                                                <a href="javacsript:;"><img
                                                                        src="{{ asset('assets/images/icons/pluse-big-blue.png') }}"
                                                                        class="me-1 d-inline" alt=""></a>
                                                                <a href="javacsript:;"><img
                                                                        src="{{ asset('assets/images/icons/remove-s.png') }}"
                                                                        class="d-inline" style="width:44px;" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="search-result-price__tag b-3 p-a-details-btn position-relative ">
                                                        <button class="price-btn">Show me Hotels</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--------- Hotel details swiper end -------->
                                        <!-------- Selected place swiper start --------->
                                        <div class="p-a-selected-place pb-5">
                                            <h5 class="box-title-text mb-4">Places (32)
                                                <img src="{{ asset('assets/images/icons/h-s-pluse.png') }}" class="mb-2 ps-3">
                                            </h5>
                                            <div class="p-a-swpier">
                                                <div class="place-box p-a-place-box me-3">
                                                    <div class="box-img position-relative">
                                                        <img src="{{ asset('assets/images/place-card1.png') }}" alt=""
                                                            class="img-fluid w-100">
                                                        <img src="{{ asset('assets/images/icons/p-card-s1.png') }}"
                                                            class="position-absolute p-lb" alt="">
                                                    </div>
                                                    <div class="box-content">
                                                        <h5 class="p-contnt-title mb-2">El Quijote</h5>
                                                        <span class="d-l-Purple mb-3 "><img
                                                                src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                                                class="mb-2 me-2 d-inline">
                                                            Madrid</span>
                                                        <div
                                                            class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                                            <a href="javascript:;" class="e_btn">Explore</a>
                                                            <div class="d-flex">
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/pwm-white-pluse.png') }}"
                                                                        class="me-1" alt=""></a>
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/remove-s.png') }}"
                                                                        class="me-1" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="place-box p-a-place-box me-3">
                                                    <div class="box-img position-relative">
                                                        <img src="assets/images/similer-card-2.png"
                                                            class="img-fluid w-100" alt="">
                                                        <img src="{{ asset('assets/images/icons/p-card-s2.png') }}"
                                                            class="position-absolute p-lb" alt="">
                                                    </div>
                                                    <div class="box-content">
                                                        <h5 class="p-contnt-title mb-4 pb-2">Super Plaza</h5>
                                                        <span class="d-l-Purple mb-3 "><img
                                                                src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                                                class="mb-2 me-2 d-inline">
                                                            Madrid</span>
                                                        <div
                                                            class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                                            <a href="javascript:;" class="e_btn"
                                                                style="background: #EB5757;">Explore</a>
                                                            <div class="d-flex">
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/pwm-white-pluse.png') }}"
                                                                        class="me-1" alt=""></a>
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/remove-s.png') }}"
                                                                        class="me-1" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="place-box p-a-place-box me-3">
                                                    <div class="box-img position-relative">
                                                        <img src="assets/images/similer-card-1.png"
                                                            class="img-fluid w-100" alt="">
                                                        <img src="{{ asset('assets/images/icons/p-card-s2.png') }}"
                                                            class="position-absolute p-lb" alt="">
                                                    </div>
                                                    <div class="box-content">
                                                        <h5 class="p-contnt-title mb-4 pb-2">Mega Market</h5>
                                                        <span class="d-l-Purple mb-3 "><img
                                                                src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                                                class="mb-2 me-2 d-inline">
                                                            Madrid</span>
                                                        <div
                                                            class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                                            <a href="javascript:;" class="e_btn"
                                                                style="background: #27AE60;">Explore</a>
                                                            <div class="d-flex">
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/pwm-white-pluse.png') }}"
                                                                        class="me-1" alt=""></a>
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/remove-s.png') }}"
                                                                        class="me-1" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="place-box p-a-place-box me-3">
                                                    <div class="box-img position-relative">
                                                        <img src="{{ asset('assets/images/place-card4.png') }}" class="img-fluid w-100"
                                                            alt="">
                                                        <img src="{{ asset('assets/images/icons/p-card-s3.png') }}"
                                                            class="position-absolute p-lb" alt="">
                                                    </div>
                                                    <div class="box-content">
                                                        <h5 class="p-contnt-title mb-2">Modern Art <br> Museum</h5>
                                                        <span class="d-l-Purple mb-3 "><img
                                                                src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                                                class="mb-2 me-2 d-inline">
                                                            Madrid</span>
                                                        <div
                                                            class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                                            <a href="javascript:;" class="e_btn"
                                                                style="background: #27AE60;">Explore</a>
                                                            <div class="d-flex">
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/pwm-white-pluse.png') }}"
                                                                        class="me-1" alt=""></a>
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/remove-s.png') }}"
                                                                        class="me-1" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="place-box p-a-place-box me-3">
                                                    <div class="box-img position-relative">
                                                        <img src="{{ asset('assets/images/place-card1.png') }}" class="img-fluid w-100"
                                                            alt="">
                                                        <img src="{{ asset('assets/images/icons/p-card-s1.png') }}"
                                                            class="position-absolute p-lb" alt="">
                                                    </div>
                                                    <div class="box-content">
                                                        <h5 class="p-contnt-title mb-4 pb-2">Quijote Museum</h5>
                                                        <span class="d-l-Purple mb-3 "><img
                                                                src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                                                class="mb-2 me-2 d-inline">
                                                            Madrid</span>
                                                        <div
                                                            class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                                            <a href="javascript:;" class="e_btn">Explore</a>
                                                            <div class="d-flex">
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/pwm-white-pluse.png') }}"
                                                                        class="me-1" alt=""></a>
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/remove-s.png') }}"
                                                                        class="me-1" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="place-box p-a-place-box me-3">
                                                    <div class="box-img position-relative">
                                                        <img src="{{ asset('assets/images/place-card2.png') }}" class="img-fluid w-100"
                                                            alt="">
                                                        <img src="{{ asset('assets/images/icons/p-card-s1.png') }}"
                                                            class="position-absolute p-lb" alt="">
                                                    </div>
                                                    <div class="box-content">
                                                        <h5 class="p-contnt-title mb-2">Modern Art <br>Museum</h5>
                                                        <span class="d-l-Purple mb-3 "><img
                                                                src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                                                class="mb-2 me-2 d-inline">
                                                            Madrid</span>
                                                        <div
                                                            class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                                            <a href="javascript:;" class="e_btn">Explore</a>
                                                            <div class="d-flex">
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/pwm-white-pluse.png') }}"
                                                                        class="me-1" alt=""></a>
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/remove-s.png') }}"
                                                                        class="me-1" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="place-box p-a-place-box me-3">
                                                    <div class="box-img position-relative">
                                                        <img src="{{ asset('assets/images/place-card2.png') }}" class="img-fluid w-100"
                                                            alt="">
                                                        <img src="{{ asset('assets/images/icons/p-card-s1.png') }}"
                                                            class="position-absolute p-lb" alt="">
                                                    </div>
                                                    <div class="box-content">
                                                        <h5 class="p-contnt-title mb-2">Modern Art <br>Museum</h5>
                                                        <span class="d-l-Purple mb-3 "><img
                                                                src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                                                class="mb-2 me-2 d-inline">
                                                            Madrid</span>
                                                        <div
                                                            class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                                            <a href="javascript:;" class="e_btn">Explore</a>
                                                            <div class="d-flex">
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/pwm-white-pluse.png') }}"
                                                                        class="me-1" alt=""></a>
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/remove-s.png') }}"
                                                                        class="me-1" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-------- Selected place swiper end ------->
                                        <!------- Restaurants swiper start -------->
                                        <div class="p-a-restaurants pb-5">
                                            <h5 class="box-title-text mb-4">Restaurants (162)
                                                <img src="{{ asset('assets/images/icons/plusegreen.png') }}" class="mb-2 ps-3">
                                            </h5>
                                            <div class="p-a-swpier">
                                                <div class="place-box p-a-place-box me-3">
                                                    <div class="box-img position-relative">
                                                        <img src="{{ asset('assets/images/rest-swiper1.png') }}" alt=""
                                                            class="img-fluid w-100">
                                                        <img src="{{ asset('assets/images/icons/location-popup-6.png') }}"
                                                            class="position-absolute p-lb" alt="">
                                                    </div>
                                                    <div class="box-content">
                                                        <h5 class="p-contnt-title mb-2">Nature <br>Museum</h5>
                                                        <span class="d-l-Purple mb-3 "><img
                                                                src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                                                class="mb-2 me-2 d-inline">
                                                            Barcelona</span>
                                                        <div
                                                            class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                                            <a href="javascript:;" class="e_btn">Explore</a>
                                                            <div class="d-flex">
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/pwm-white-pluse.png') }}"
                                                                        class="me-1" alt=""></a>
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/remove-s.png') }}"
                                                                        class="me-1" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="place-box p-a-place-box me-3">
                                                    <div class="box-img position-relative">
                                                        <img src="{{ asset('assets/images/rest-swiper2.png') }}" alt=""
                                                            class="img-fluid w-100">
                                                        <img src="{{ asset('assets/images/icons/location-popup-6.png') }}"
                                                            class="position-absolute p-lb" alt="">
                                                    </div>
                                                    <div class="box-content">
                                                        <h5 class="p-contnt-title mb-2">Nature <br>Museum</h5>
                                                        <span class="d-l-Purple mb-3 "><img
                                                                src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                                                class="mb-2 me-2 d-inline">
                                                            Barcelona</span>
                                                        <div
                                                            class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                                            <a href="javascript:;" class="e_btn">Explore</a>
                                                            <div class="d-flex">
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/pwm-white-pluse.png') }}"
                                                                        class="me-1" alt=""></a>
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/remove-s.png') }}"
                                                                        class="me-1" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="place-box p-a-place-box me-3">
                                                    <div class="box-img position-relative">
                                                        <img src="{{ asset('assets/images/rest-swiper3.png') }}" alt=""
                                                            class="img-fluid w-100">
                                                        <img src="{{ asset('assets/images/icons/location-popup-6.png') }}"
                                                            class="position-absolute p-lb" alt="">
                                                    </div>
                                                    <div class="box-content">
                                                        <h5 class="p-contnt-title mb-2">Nature <br>Museum</h5>
                                                        <span class="d-l-Purple mb-3 "><img
                                                                src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                                                class="mb-2 me-2 d-inline">
                                                            Barcelona</span>
                                                        <div
                                                            class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                                            <a href="javascript:;" class="e_btn">Explore</a>
                                                            <div class="d-flex">
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/pwm-white-pluse.png') }}"
                                                                        class="me-1" alt=""></a>
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/remove-s.png') }}"
                                                                        class="me-1" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="place-box p-a-place-box me-3">
                                                    <div class="box-img position-relative">
                                                        <img src="{{ asset('assets/images/rest-swiper3.png') }}" alt=""
                                                            class="img-fluid w-100">
                                                        <img src="{{ asset('assets/images/icons/location-popup-6.png') }}"
                                                            class="position-absolute p-lb" alt="">
                                                    </div>
                                                    <div class="box-content">
                                                        <h5 class="p-contnt-title mb-2">Nature <br>Museum</h5>
                                                        <span class="d-l-Purple mb-3 "><img
                                                                src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                                                class="mb-2 me-2 d-inline">
                                                            Barcelona</span>
                                                        <div
                                                            class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                                            <a href="javascript:;" class="e_btn">Explore</a>
                                                            <div class="d-flex">
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/pwm-white-pluse.png') }}"
                                                                        class="me-1" alt=""></a>
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/remove-s.png') }}"
                                                                        class="me-1" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!------- Restaurants swiper end -------->
                                        <!------ Nearby Towns swiper start -------->
                                        <div class="p-a-nearby pb-5">
                                            <h5 class="box-title-text mb-4">Nearby Towns (6)
                                                <img src="{{ asset('assets/images/icons/pluse-blue.png') }}" class="mb-2 ps-3">
                                            </h5>
                                            <div class="p-a-swpier">
                                                <div class="place-box p-a-place-box me-3">
                                                    <div class="box-img position-relative">
                                                        <img src="{{ asset('assets/images/nearby1.png') }}" alt=""
                                                            class="img-fluid w-100">
                                                        <img src="{{ asset('assets/images/icons/location-10.png') }}"
                                                            class="position-absolute p-lb" alt="">
                                                    </div>
                                                    <div class="box-content">
                                                        <h5 class="p-contnt-title mb-2">Nature <br>Museum</h5>
                                                        <span class="d-l-Purple mb-3 "><img
                                                                src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                                                class="mb-2 me-2 d-inline">
                                                            Barcelona</span>
                                                        <div
                                                            class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                                            <a href="javascript:;" class="e_btn">Explore</a>
                                                            <div class="d-flex">
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/pwm-white-pluse.png') }}"
                                                                        class="me-1" alt=""></a>
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/remove-s.png') }}"
                                                                        class="me-1" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="place-box p-a-place-box me-3">
                                                    <div class="box-img position-relative">
                                                        <img src="{{ asset('assets/images/nearby-2.png') }}" alt=""
                                                            class="img-fluid w-100">
                                                        <img src="{{ asset('assets/images/icons/location-10.png') }}"
                                                            class="position-absolute p-lb" alt="">
                                                    </div>
                                                    <div class="box-content">
                                                        <h5 class="p-contnt-title mb-2">Nature <br>Museum</h5>
                                                        <span class="d-l-Purple mb-3 "><img
                                                                src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                                                class="mb-2 me-2 d-inline">
                                                            Barcelona</span>
                                                        <div
                                                            class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                                            <a href="javascript:;" class="e_btn">Explore</a>
                                                            <div class="d-flex">
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/pwm-white-pluse.png') }}"
                                                                        class="me-1" alt=""></a>
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/remove-s.png') }}"
                                                                        class="me-1" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="place-box p-a-place-box me-3">
                                                    <div class="box-img position-relative">
                                                        <img src="{{ asset('assets/images/nearby-3.png') }}" alt=""
                                                            class="img-fluid w-100">
                                                        <img src="{{ asset('assets/images/icons/location-10.png') }}"
                                                            class="position-absolute p-lb" alt="">
                                                    </div>
                                                    <div class="box-content">
                                                        <h5 class="p-contnt-title mb-2">Nature <br>Museum</h5>
                                                        <span class="d-l-Purple mb-3 "><img
                                                                src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                                                class="mb-2 me-2 d-inline">
                                                            Barcelona</span>
                                                        <div
                                                            class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                                            <a href="javascript:;" class="e_btn">Explore</a>
                                                            <div class="d-flex">
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/pwm-white-pluse.png') }}"
                                                                        class="me-1" alt=""></a>
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/remove-s.png') }}"
                                                                        class="me-1" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="place-box p-a-place-box me-3">
                                                    <div class="box-img position-relative">
                                                        <img src="{{ asset('assets/images/nearby1.png') }}" alt=""
                                                            class="img-fluid w-100">
                                                        <img src="{{ asset('assets/images/icons/location-10.png') }}"
                                                            class="position-absolute p-lb" alt="">
                                                    </div>
                                                    <div class="box-content">
                                                        <h5 class="p-contnt-title mb-2">Nature <br>Museum</h5>
                                                        <span class="d-l-Purple mb-3 "><img
                                                                src="{{ asset('assets/images/icons/search-h-loaction.png') }}" alt=""
                                                                class="mb-2 me-2 d-inline">
                                                            Barcelona</span>
                                                        <div
                                                            class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                                            <a href="javascript:;" class="e_btn">Explore</a>
                                                            <div class="d-flex">
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/pwm-white-pluse.png') }}"
                                                                        class="me-1" alt=""></a>
                                                                <a href="javascript:;"><img
                                                                        src="{{ asset('assets/images/icons/remove-s.png') }}"
                                                                        class="me-1" alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!------ Nearby Towns swiper end -------->
                                        <!------- Transportation box start------->
                                        <section class="credit-box">
                                            <h5 class="box-title-text mb-4">Transportation (4)
                                                <img src="{{ asset('assets/images/icons/pluse-blue.png') }}" class="mb-2 ps-3">
                                            </h5>
                                            <div class="credit-box-main">
                                                <div
                                                    class="credit-box-inner d-flex justify-content-between align-items-center">
                                                    <div class="credit-heading">
                                                        <h2 class="heading">Uber</h2>
                                                        <h5 class="heading-fs-16 d-l-Purple m-0">Credits</h5>
                                                    </div>
                                                </div>
                                                <div
                                                    class="price-text-main d-flex justify-content-between align-items-center mt-3">
                                                    <div class="price-text">
                                                        <p>$50</p>
                                                    </div>
                                                    <div class="offer-text">
                                                        <p class="box-title-text"><span class="text--green"> 10%
                                                                off</span> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <!------- Transportation box end------->
                                    </div>

                                    <!--=========================== DAILY TAB CONTENT ========================= -->

                                    <div class="tab-pane fade" id="pills-daily" role="tabpanel"
                                        aria-labelledby="pills-daily-tab">
                                        <!-------Map section start ------->
                                        <div class="p-a-tab-map">
                                            <div class="pwm-gmap overflow-hidden">
                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d463081.43252067344!2d-3.4872597865933366!3d40.31538629590688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xc42e3783261bc8b%3A0xa6ec2c940768a3ec!2sSpain!5e0!3m2!1sen!2sin!4v1651553036245!5m2!1sen!2sin"
                                                    width="100%" height="360" style="border:0;" allowfullscreen=""
                                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                        </div>
                                        <!------- Map section end -------->

                                        <!----------SWIPER DATE START----------->
                                        <div class="orgrnnize-date mb-5">
                                            <h5>Organize your day</h5>
                                            <div class="swiper-container pt-3">
                                                <div class="swiper-wrapper">
                                                    <!-- Slides -->
                                                    <div class="swiper-slide">
                                                        <a href="javascript:;">
                                                            <p class="m-0">10/22/20</p>
                                                        </a>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <a href="javascript:;">
                                                            <p class="m-0">10/21/20</p>
                                                        </a>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <a href="javascript:;">
                                                            <p class="m-0">10/21/20</p>
                                                        </a>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <a href="javascript:;">
                                                            <p class="m-0">10/21/20</p>
                                                        </a>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <a href="javascript:;">
                                                            <p class="m-0">10/21/20</p>
                                                        </a>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <a href="javascript:;">
                                                            <p class="m-0">10/21/20</p>
                                                        </a>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <a href="javascript:;">
                                                            <p class="m-0">10/21/20</p>
                                                        </a>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <a href="javascript:;">
                                                            <p class="m-0">10/21/20</p>
                                                        </a>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <a href="javascript:;">
                                                            <p class="m-0">10/21/20</p>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- If we need navigation buttons -->
                                                <div class="swiper-button-prev"></div>
                                                <div class="swiper-button-next"></div>
                                            </div>
                                            <!----------SWIPER DATE END----------->
                                        </div>
                                        <div class="schedule-section">
                                            <p>Your Schedule for <span style="color: #6a78d1;">Mon 10, Aug - 2020</span>
                                            </p>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="accordion" id="accordionExample1">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="acordin_Museums">
                                                                <button class="accordion-button" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapse_Museums"
                                                                    aria-expanded="true"
                                                                    aria-controls="collapse_Museums">
                                                                    <img src="{{ asset('assets/images/icons/check-1.png') }}"
                                                                        alt=""><span class="ms-3">Museums</span>
                                                                </button>
                                                            </h2>
                                                            <div id="collapse_Museums"
                                                                class="accordion-collapse collapse show">
                                                                <div class="accordion-body ">
                                                                    <div
                                                                        class="Museums-inner d-flex align-items-center mb-2">
                                                                        <img src="{{ asset('assets/images/icons/acoding-M1.png') }}"
                                                                            alt="">
                                                                        <span class="ms-3">The Cristal Palace</span>
                                                                    </div>
                                                                    <div
                                                                        class="Museums-inner d-flex align-items-center mb-2">
                                                                        <img src="{{ asset('assets/images/icons/acoding-M2.png') }}"
                                                                            alt="">
                                                                        <span class="ms-3">Prado Museum</span>
                                                                    </div>
                                                                    <div
                                                                        class="Museums-inner d-flex align-items-center mb-2">
                                                                        <img src="{{ asset('assets/images/icons/acoding-M3.png') }}"
                                                                            alt="">
                                                                        <span class="ms-3">Reina Sofia Museum</span>
                                                                    </div>
                                                                    <div
                                                                        class="Museums-inner d-flex align-items-center mb-2">
                                                                        <img src="{{ asset('assets/images/icons/acoding-M4.png') }}"
                                                                            alt="">
                                                                        <span class="ms-3">Thyssen-Bornemisza ...</span>
                                                                    </div>
                                                                    <div
                                                                        class="Museums-inner d-flex align-items-center mb-2">
                                                                        <img src="{{ asset('assets/images/icons/acoding-M5.png') }}"
                                                                            alt="">
                                                                        <span class="ms-3">Oro Museum</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="acordin_park">
                                                                <button class="accordion-button" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapse_park" aria-expanded="true"
                                                                    aria-controls="collapse_park">
                                                                    <img src="{{ asset('assets/images/icons/check-2.png') }}"
                                                                        alt=""><span class="ms-3">Parks</span>
                                                                </button>
                                                            </h2>
                                                            <div id="collapse_park"
                                                                class="accordion-collapse collapse show">
                                                                <div class="accordion-body">
                                                                    <div
                                                                        class="Museums-inner d-flex align-items-center mb-2">
                                                                        <img src="{{ asset('assets/images/icons/acoding-P1.png') }}"
                                                                            alt="">
                                                                        <span class="ms-3">Colina’s Park</span>
                                                                    </div>
                                                                    <div
                                                                        class="Museums-inner d-flex align-items-center mb-2">
                                                                        <img src="{{ asset('assets/images/icons/acoding-P2.png') }}"
                                                                            alt="">
                                                                        <span class="ms-3">Bicentenary Park</span>
                                                                    </div>
                                                                    <div
                                                                        class="Museums-inner d-flex align-items-center mb-2">
                                                                        <img src="{{ asset('assets/images/icons/acoding-P3.png') }}"
                                                                            alt="">
                                                                        <span class="ms-3">Tree Streets Park</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="acordin_Market">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapse_Market"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapse_Market">
                                                                    <img src="{{ asset('assets/images/icons/location-popup-4.png') }}"
                                                                        alt=""><span class="ms-3">Markets</span>
                                                                </button>
                                                            </h2>
                                                            <div id="collapse_Market"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="acordin_Market"
                                                                data-bs-parent="#accordionExample1">
                                                                <div class="accordion-body">
                                                                    3
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- First accordion end -->

        </div>
    </section>

    <!------------PLANNER SECTION END-------------->
@endsection
@push('script')
<script>
    // planner-accordion swiper js
    $('.p-a-swpier').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        speed: 300,
        loop: true,
        accessibility: false,
        dots: false,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
        ]
    });
</script>
<script>
    $('.modal').on('shown.bs.modal', function (e) {
        $('.slider-single').slick('setPosition');
        $('.swiper').addClass('open');
    })
    $('.modal').on('shown.bs.modal', function (e) {
        $('.slider-nav').slick('setPosition');
        $('.swiper').addClass('open');
    })
</script>

<script>
    // dropdown with img js
    $(function () {
        // Set
        var main = $('div.mm-dropdown .textfirst')
        var li = $('div.mm-dropdown > ul > li.input-option')
        var inputoption = $("div.mm-dropdown .option")
        var default_text = 'Select<img src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-arrow-down-b-128.png" width="10" height="10" class="down" />';

        // Animation
        main.click(function () {
            main.html(default_text);
            li.toggle('fast');
        });

        // Insert Data
        li.click(function () {
            // hide
            li.toggle('fast');
            var livalue = $(this).data('value');
            var lihtml = $(this).html();
            main.html(lihtml);
            inputoption.val(livalue);
        });
    });
</script>
<script>
    // DATE PIKER JS CALENDER
    $(function () {
        $("#p_a_from").datepicker({
            dateFormat: "dd-mm-yy",
            duration: "fast"
        });
    });
    $(function () {
        $("#p_a_to").datepicker({
            dateFormat: "dd-mm-yy",
            duration: "fast"
        });
    });

</script>

<!-- ==============DAILY TAB TIME SWIPER================= -->
<script>
    // <!---------SUB TITLE SWIPER JS--------->
    $(document).ready(function () {
        // Assign some jquery elements we'll need
        var $swiper = $(".swiper-container");
        var $bottomSlide = null; // Slide whose content gets 'extracted' and placed
        // into a fixed position for animation purposes
        var $bottomSlideContent = null; // Slide content that gets passed between the
        // panning slide stack and the position 'behind'
        // the stack, needed for correct animation style

        var mySwiper = new Swiper(".swiper-container", {
            spaceBetween: 1,
            slidesPerView: 5,
            centeredSlides: true,
            roundLengths: true,
            loop: true,
            arrow: true,
            observer: true,
            observeParents: true,
            loopAdditionalSlides: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            }
        });
    });
    
    // $(document).on('click', '.click-down-arrow', function () {
    //     $(".slick-next").trigger('click')
    // })
</script>


@endpush
