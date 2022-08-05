@extends('layout::user.Frontend.master')

@section('title')
    search
@endsection


@push('css')
<style>
    .rateing_stars .checked {
        color: gold;
    }

    .rateing_stars span {
        color: lightgray;
    }
</style>
@endpush


@section('content')
    <!-------MULTI-SEARCH SECTION START-------->

    <section class="multi-search-section">
        <div class="container">
            <div class="multi-s-title text-center">
                <h5>Customize your trip</h5>
                <p>Tell us what you like and we will build it for you</p>
            </div>
            <div class="city_search mx-auto ">
                <div class="city_search_title d-flex align-items-center mb-3 mb-md-0">
                    <p class="m-0 multi_s_pera mx-auto">What city are you travelling to?</p><img src="assets/images/icons/succes-pass-reset.png" alt="">
                </div>
                <!-- <div class="inputWithIcon text-center">
                    <input type="text" class="flag_search_box" placeholder="Madrid, Spain">
                    <i><img src="assets/images/icons/Spain.png" class="inpt-icon" alt=""></i>
                    <img src="assets/images/icons/search-icon.png" class="flag_search_i_" alt="">
                </div> -->
                <div class="inputWithIcon d-flex align-items-center mx-auto ">
                    <i><img src="assets/images/icons/Spain.png" class="inpt-icon" alt=""></i>
                    <input type="text" class="form-control p-0 bg-transparent border-0 para-fs-14" placeholder="Search place">
                    <i class="fa-solid fa-magnifying-glass ps-2 bg-transparent"></i>
                </div>
            </div>
            <div class="visiting_dates mx-auto mt-2">
                <div class="city_search_title d-flex align-items-center mb-3 mb-md-0">
                    <p class="m-0 multi_s_pera mx-auto">What dates are you visiting?</p><img src="assets/images/icons/succes-pass-reset.png" alt="">
                </div>
                <div class="p-a-calender d-flex justify-content-center align-items-center">
                    <div class="p-a-checkin pe-3">
                        <label class="mb-2">From</label>
                        <div class="calender_input_box d-flex align-items-center position-relative">
                            <div class="cal-icon"><img src="assets/images/icons/cal-1.png" class="trip_icon pe-2"></div>
                            <div class="cal-placeholder w-100"><input type="text" id="p_a_from" class="calendar border-0" placeholder="08/19/2020" autocomplete="off"> </div>
                        </div>
                    </div>
                    <div class="p-a-checkout ps-3">
                        <label class="mb-2">To</label>
                        <div class="calender_input_box d-flex align-items-center position-relative">
                            <div class="cal-icon"><img src="assets/images/icons/cal-1.png" class="trip_icon pe-2"></div>
                            <div class="cal-placeholder w-100"><input placeholder="08/19/2020" type="text" class="calendar border-0" id="p_a_to"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="multi_calender_box_">
                    <div class="calender_box d-flex flex-wrap justify-content-center">
                        <div class="mt-2">
                            <label class="m-0">Form
                                <img src="assets/images/icons/trip-date.png" class="trip_icon" alt="">
                                <input placeholder="08/19/2020" type="text" name="checkIn" id="datepicker_multi"
                                    value="" class="calendar mt-2">
                            </label>
                        </div>
                        <div class="mt-2">
                            <label class="m-0">To
                                <img src="assets/images/icons/trip-c-date.png" class="trip_c_icon" alt="">
                                <input placeholder="08/19/2020" type="text" name="checkIn" id="datepicker_search"
                                    value="" class="calendar mt-2">

                            </label>
                        </div>
                    </div>
                </div> -->
            <!--  -->
            <div class="view_select mx-auto mt-2">
                <div class="city_search_title d-flex align-items-center mb-3 mb-md-0">
                    <p class="m-0 multi_s_pera mx-auto">What are you interested in doing?</p><img src="assets/images/icons/succes-pass-reset.png" alt="">
                </div>
                <p class="text-center">Select all the ones you want</p>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="small-box-wrapper d-flex jstify-content-between align-items-center  mb-2">
                            <div class="small-box-single-img ">
                                <img src="assets/images/icons/location-popup-1.png">
                            </div>
                            <div class="small-box-text ps-2 pe-3">
                                <span class="para-fs-14">Museums</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="small-box-wrapper d-flex jstify-content-between align-items-center mb-2">
                            <div class="small-box-single-img">
                                <img src="assets/images/icons/location-popup-2.png">
                            </div>
                            <div class="small-box-text ps-2 pe-3">
                                <span class="para-fs-14">Plazas</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="small-box-wrapper d-flex jstify-content-between align-items-center mb-2">
                            <div class="small-box-single-img">
                                <img src="assets/images/icons/locaion-5.png">
                            </div>
                            <div class="small-box-text ps-2 pe-3">
                                <span class="para-fs-14"> Cathedrals </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="small-box-wrapper d-flex jstify-content-between align-items-center mb-2">
                            <div class="small-box-single-img">
                                <img src="assets/images/icons/location-9.png">
                            </div>
                            <div class="small-box-text ps-2 pe-3">
                                <span class="para-fs-14"> Shops </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="small-box-wrapper d-flex jstify-content-between align-items-center mb-2">
                            <div class="small-box-single-img">
                                <img src="assets/images/icons/location-popup-3.png">
                            </div>
                            <div class="small-box-text ps-2 pe-3">
                                <span class="para-fs-14"> Parks </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="small-box-wrapper d-flex jstify-content-between align-items-center mb-2">
                            <div class="small-box-single-img">
                                <img src="assets/images/icons/location-popup-4.png">
                            </div>
                            <div class="small-box-text ps-2 pe-3">
                                <span class="para-fs-14"> Markets </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="small-box-wrapper d-flex jstify-content-between align-items-center mb-2">
                            <div class="small-box-single-img">
                                <img src="assets/images/icons/location-popup-6.png">
                            </div>
                            <div class="small-box-text ps-2 pe-3">
                                <span class="para-fs-14"> Restaurants </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="small-box-wrapper d-flex jstify-content-between align-items-center active mb-2">
                            <div class="small-box-single-img">
                                <img src="assets/images/icons/location-10.png">
                            </div>
                            <div class="small-box-text ps-2 pe-3">
                                <span class="para-fs-14"> Nearby Towns </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="small-box-wrapper d-flex jstify-content-between align-items-center mb-2">
                            <div class="small-box-single-img">
                                <img src="assets/images/icons/location-popup-7.png">
                            </div>
                            <div class="small-box-text ps-2 pe-3">
                                <span class="para-fs-14"> Transportation </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="small-box-wrapper d-flex jstify-content-between align-items-center mb-2">
                            <div class="small-box-single-img">
                                <img src="assets/images/icons/loaction-11.png">
                            </div>
                            <div class="small-box-text ps-2 pe-3">
                                <span class="para-fs-14"> Beaches </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="small-box-wrapper d-flex jstify-content-between align-items-center mb-2">
                            <div class="small-box-single-img">
                                <img src="assets/images/icons/location-12.png">
                            </div>
                            <div class="small-box-text ps-2 pe-3">
                                <span class="para-fs-14"> Bars </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="small-box-wrapper d-flex jstify-content-between align-items-center mb-2">
                            <div class="small-box-single-img">
                                <img src="assets/images/icons/location-12.png">
                            </div>
                            <div class="small-box-text ps-2 pe-3">
                                <span class="para-fs-14">Nature </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uber-discount city_search_title mx-auto">
                <div class="text-center mb-3">
                    <img src="assets/images/icons/uber-i.png" alt="">
                </div>
                <p class="m-0 multi_s_pera text-center">Do you want to add Uber credits at a<span style="color: #39e66e;"> 10% discount</span> to your trip?</p>
                <div class="checkbox d-flex justify-content-center align-items-center mt-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="yes">
                        <label class="form-check-label me-5" for="yes"> Yes</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="no">
                        <label class="form-check-label me-5" for="no"> No</label>
                    </div>
                </div>
            </div>
            <div class="restorant-view mx-auto">
                <div class="text-center mb-4">
                    <img src="assets/images/icons/restorant-icon.png" alt="">
                </div>
                <div class="city_search_title">
                    <p class="m-0 multi_s_pera text-center">What are your restaurant preferences?</p>
                </div>
                <div class="r-light-pera">
                    <p>Cousines</p>
                    <!-- SWIPER START -->
                    <div class="restorant_swiper mb-3">
                        <div class="card">
                            <img src="assets/images/restorant-s-card1.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                        <div class="card">
                            <img src="assets/images/restorant-s-card2.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                        <div class="card">
                            <img src="assets/images/restorant-s-card3.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                        <div class="card">
                            <img src="assets/images/restorant-s-card4.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                        <div class="card">
                            <img src="assets/images/restorant-s-card5.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                        <div class="card">
                            <img src="assets/images/restorant-s-card1.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                        <div class="card">
                            <img src="assets/images/restorant-s-card2.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </div>
                    <!-- SWIPER END -->
                    <div class="price-check-b">
                        <p class="m-0">Price</p>
                        <div class="price_check d-flex align-items-center flex-wrap">
                            <div class="form-check">
                                <label class="form-check-label me-sm-5 me-2" style="color: #39e66e;">$$$
                                    <input class="form-check-input mt-2" type="checkbox" value="">
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label me-sm-5 me-2" style="color: #39e66e;">$$
                                    <input class="form-check-input mt-2" type="checkbox" value="">
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label me-sm-5" style="color: #39e66e;">$
                                    <input class="form-check-input mt-2" type="checkbox" value="">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="restorant-rate mx-auto p-sm-4 p-2 overflow-auto">
                <div class="text-center mb-4">
                    <img src="assets/images/icons/restorant-bed-i.png" alt="">
                </div>
                <div class="city_search_title mb-5">
                    <p class="m-0 multi_s_pera text-center">What are your restaurant preferences?</p>
                </div>
                <div class="raesto-check-book d-sm-flex align-items-center">
                    <div class="form-check">
                        <label class="form-check-label me-sm-5 me-2">
                            <input class="form-check-input mt-2" type="checkbox" value="">
                            Top Location</label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label me-5">
                            Breakfast Included
                            <input class="form-check-input mt-2" type="checkbox" value="">
                        </label>
                    </div>
                </div>
                <div class="raesto-check-book d-sm-flex  align-items-center mt-3">
                    <div class="form-check">
                        <label class="form-check-label me-3">
                            <input class="form-check-input mt-2" type="checkbox" value="">
                            Flexible Check-In
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label me-2">
                            <input class="form-check-input mt-2" type="checkbox" value="">
                            Flexible Check-Out
                        </label>
                    </div>
                </div>
                <div class="restoro_input_rate d-flex align-items-center justify-content-center mt-3 mb-5 flex-wrap">
                    <div class="rsto_input text-center me-3">
                        <p class="mb-2 resto_in_pera_">Maximum price per night</p>
                        <input type="number" placeholder="Enter amount" class="ms-3">
                        <img src="assets/images/icons/$.png" class="dollericon" alt="">
                    </div>
                    <div class="rsto_input">
                        <p class="resto_in_pera_">Property Class</p>
                        <div class="rateing_stars mb-3">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                </div>
                <div class="restoro_input_rate d-flex align-items-center justify-content-center mt-3 mb-5 flex-wrap">
                    <div class="rsto_input text-center me-3">
                        <p class="mb-2 resto_in_pera_">Maximum price per night</p>
                        <input type="number" placeholder="Enter amount" class="ms-3">
                        <img src="assets/images/icons/$.png" class="dollericon" alt="">
                    </div>
                    <div class="rsto_input ">
                        <p class="resto_in_pera_">Property Class</p>
                        <div class="rateing_stars mb-3">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="account-section text-center m_b_5 mt-3">
                <a href="multisearchresult.html"><button class="account-pass-btn mt-3">Search</button></a>
            </div>
        </div>
    </section>

    <!-------MULTI-SEARCH SECTION START-------->
@endsection

@push('script')
<script>
    // star rateing js //
    $(".js-example-tags").select2({
        tags: true
    });
    // RESTORANT SWIPER JS //
    $('.restorant_swiper').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        spaceBetween: 2,
        autoplay: false,
        autoplaySpeed: 2000,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 2,
            }
        }, {
            breakpoint: 776,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        }, {
            breakpoint: 567,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }],
    });
</script>
<script>
    //---- select date js ----//

    jQuery(document).ready(function() {
        jQuery('#p_a_from').datepicker({
            dateFormat: 'dd-mm-yy',
            startDate: '+1d'
        });
    });
    jQuery(document).ready(function() {
        jQuery('#p_a_to').datepicker({
            dateFormat: 'dd-mm-yy',
            startDate: '+1d'
        });
    });
</script>
@endpush
