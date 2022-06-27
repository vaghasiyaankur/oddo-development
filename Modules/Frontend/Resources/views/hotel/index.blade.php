@extends('layout::user.Frontend.master')

@section('title')
hotel
@endsection

@push('css')
<!-------- Swiper Css Cdn --------->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.2.3/swiper-bundle.css" />
<style>
    /*  */
    .bed-selector .room {
        background: #FFFFFF;
        box-shadow: 0px 0px 19px rgb(0 0 0 / 10%);
        border-radius: 8px;
        height: 111px;
        width: 180px;
    }

    .bed-selector .room .title-container {
        display: flex;
        align-items: center;
        background: #E6E8F5;
        border-radius: 8px 8px 0px 0px;
    }

    .bed-selector .room .title-container .check {
        margin-right: 20px;
    }

    .bed-selector .dropdown-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        /* height: 150px; */
        padding: 12px;
    }

    .bed-selector .dropdown-container .column {
        display: flex;
        flex-direction: column;
    }

    .bed-selector .dropdown-container .column .label {
        font-size: 14px;
    }

    .bed-selector .dropdown,
    .bed-selector .default-dropdown {
        width: 40px;
        height: 25px;
        margin: 10px auto;
    }

    .bed-selector .select-div {
        padding: 6px 10px;
        width: 130px;
        border: 1px solid #878996;
        border-radius: 5px
    }

    .bed-selector .option-none {
        display: none;
    }

    .bed-selector .select-option {
        position: absolute;
        z-index: 9999;
    }

    /*  */
    /* Css for select2  */
    section.check-in-out .check-in-out-bottom .select2 {
        width: 100% !important;
    }

    section.check-in-out .check-in-out-bottom .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 38px;
    }

    section.check-in-out .check-in-out-bottom .select2-container .select2-selection--single {
        height: 38px;
    }

    section.check-in-out .check-in-out-bottom .select2-container--default .select2-selection--single {
        border: 1px solid #878996;
        border-radius: 5px;
    }

    section.check-in-out .check-in-out-bottom .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #6A78C7;
        line-height: 35px;
    }

    section.check-in-out .check-in-out-bottom .select2-dropdown.select2-dropdown--below {
        width: 211px !important;
        height: 200px !important;
        border: 1px solid #878996;
        top: 10px !important;
    }

    .select2-container--open .select2-dropdown--above {
        width: 211px !important;
        height: 200px !important;
        border: 1px solid #878996;
        top: 0px !important;
    }

    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border: 1px solid #aaa;
        ;
    }

    .select2-search--dropdown {
        display: none;
    }

    .select2-results__option {
        padding-right: 20px;
        vertical-align: middle;
    }

    /* .select2-results__option:before {
        content: "";
        display: inline-block;
        position: relative;
        height: 20px;
        width: 20px;
        border: 2px solid #e9e9e9;
        border-radius: 4px;
        background-color: #fff;
        margin-right: 20px;
        vertical-align: middle;
    }

    .select2-results__option[aria-selected=true]:before {
        font-family: fontAwesome;
        content: "\f00c";
        color: #fff;
        background-color: #f77750;
        border: 0;
        display: inline-block;
        padding-left: 3px;
    } */
</style>
@endpush

@section('content')
<!------- Hotel-result Check-in-out section start ------->
<section class="check-in-out hotel-result py-3">
    <div class="container">
        <div class="check-in-out-inner">
            <h4>Hotels</h4>
            <div class="check-in-out-form">
                <div class="check-in-out-top">
                    <div class=" row align-items-center">
                        <div class="col-lg-6 mb-2">
                            <label for="hotels"></label>
                            <div class="d-flex align-items-center search-input">
                                <input class="form-control border-0" id="autocomplete" type="text"
                                    placeholder="Search Place" name="search" value="{{request()->search}}">
                                <input type="hidden" id="latitude" name="latitude" class="form-control">
                                <input type="hidden" name="longitude" id="longitude" class="form-control">
                                <i class="fa-solid fa-magnifying-glass pe-3"></i>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <form action="javascript: void(0);">
                                <div
                                    class="custom-calender-piker d-lg-flex justify-content-lg-center position-relative align-items-center">
                                    <div class="check-text-label pt-4 pe-xl-4 pe-lg-3">
                                        <label class="check-inout mt-2">Check-In</label>
                                        <div class="input--text d-flex align-items-center">
                                            <img src="assets/images/icons/cal-1.png" class="px-2">
                                            <input type="text" class="input--control ps-xl-2"
                                                name="value_from_start_date" placeholder="08/19/2020"
                                                data-datepicker="separateRange" value="{{request()->checkIn}}" />
                                        </div>
                                    </div>
                                    <div class="check-text-label pt-4">
                                        <label class="check-inout check-out-label mt-2">Check-Out</label>
                                        <div class="input--text d-flex align-items-center">
                                            <img src="assets/images/icons/cal-2.png" class="px-2">
                                            <input type="text" class="input--control ps-xl-2" name="value_from_end_date"
                                                placeholder="08/19/2020" data-datepicker="separateRange"
                                                value="{{request()->checkOut}}" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="check-in-out-bottom">
                    <div class="row align-items-center">
                         <div class="col-lg-3 col-md-4 select-option pe-lg-0 mt-2">
                            <label>Guests</label>
                            <select class="form-control js-example-tags select_guest" name="guest">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>                                
                            </select>   
                        </div>
                        <div class="col-lg-3 col-md-4 select-option pe-lg-0 mt-2">                            
                            <label>Room</label>
                                <select class="form-control  select_room" name="room">
                                    <option selected="selected">1</option>
                                    <option>2</option>
                                    <option>3</option>                                
                                </select>                                                            
                        </div>
                         
                       
                        <div class="col-lg-3 col-md-4 select-option pe-lg-0 mt-2">
                            <label>Beds</label>
                            <div class="bed-selector ">
                                <div class="select-div d-flex justify-content-between align-items-center">
                                    <i class="fa-solid fa-car" style="color: #878996"></i>
                                    <span style="color: #878996">king</span>
                                    <i class="fa-solid fa-caret-down" style="color: #878996"></i>
                                    {{-- <i class="fa-solid fa-angle-down" style="color: #6A78C7;"></i> --}}
                                </div>
                                <div class="select-option option-none">
                                    <div class="room">
                                        <div class="title-container">
                                            <h5 class="title" style="margin:10px;">Room 1</h5>
                                        </div>
                                        <section class="dropdown-container">
                                            <div class="dropdown-inner">
                                                <input type="checkbox">
                                                <label for="">1 King</label>
                                            </div>
                                            <div class="dropdown-inner">
                                                <input type="checkbox">
                                                <label for="">2 Twin</label>
                                            </div>
                                            <div class="dropdown-inner">
                                                <input type="checkbox">
                                                <label for="">2 Queen</label>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="room">
                                        <div class="title-container">
                                            <h5 class="title" style="margin:10px;">Room 1</h5>
                                        </div>
                                        <section class="dropdown-container">
                                            <div class="dropdown-inner">
                                                <input type="checkbox">
                                                <label for="">1 King</label>
                                            </div>
                                            <div class="dropdown-inner">
                                                <input type="checkbox">
                                                <label for="">2 Twin</label>
                                            </div>
                                            <div class="dropdown-inner">
                                                <input type="checkbox">
                                                <label for="">2 Queen</label>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <!-- <label>Bed</label>
                            <select class="select2-icon" name="icon" multiple="multiple">
                            <option value="fa-bed" data-icon="fa-bed">2</option>
                            <option value="fa-bed" data-icon="fa-bed">1</option>
                            <option value="fa-bed" data-icon="fa-bed">3</option>
                            </select> -->
                        </div>
                        <div class="check-in-out-btn mt-3 text-xl-end text-center col-lg-3">
                            <a href="#" class="btn search-btn purple" id='SubmitSearch'>Search</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-------Hotel Result Check-in-out section end ------->
<!-------  Map Section star-------->
<section class="hotel-result g-map-main">
    <div class="container ">
        <div class="g-map-inner position-relative">
            <div class="g-map overflow-hidden">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d440859.40502705984!2d-1.207392589264925!3d41.65372810770349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xc42e3783261bc8b%3A0xa6ec2c940768a3ec!2sSpain!5e0!3m2!1sen!2sin!4v1653181050700!5m2!1sen!2sin"
                    width="100%" height="450" style="border:0;"></iframe>
            </div>
        </div>
    </div>
</section>
<!------- Map Section end-------->
<!-------Weather Section Start ---------->
<section class="weather-main check-in-out pb-0 pt-3">
    <div class="container">
        <div class="weather-inner check-in-out-inner py-2">
            <div class="row align-items-center">
                <div class="col-2">
                    <div class="weather-text">
                        <h5 class="heading-fs-16 purple m-0">Weather in Medrid</h5>
                        <p class="m-0 para-d-l-p">8/9/2020 - 12/9/2020</p>
                    </div>
                </div>
                <div class="col-10">
                    <div class="weather-swiper">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide text-center">
                                    <div class="para-fs-14"><span class="purple fw-bold"> Mon 8</span> </div>
                                    <img src="{{asset('assets/images/we-1.png')}}">
                                    <div class="para-d-l-p">20 <sup>&deg;</sup></div>
                                </div>
                                <div class="swiper-slide text-center">
                                    <div class="para-fs-14"><span class="purple fw-bold"> Tue 9</span> </div>
                                    <img src="{{asset('assets/images/we-2.png')}}" alt="">
                                    <div class="para-d-l-p">29 <sup>&deg;</sup></div>
                                </div>
                                <div class="swiper-slide text-center">
                                    <div class="para-fs-14"><span class="purple fw-bold"> Wed 10 </span></div>
                                    <img src="{{asset('assets/images/we-3.png')}}" alt="">
                                    <div class="para-d-l-p">24 <sup>&deg;</sup></div>
                                </div>
                                <div class="swiper-slide text-center active">
                                    <div class="para-fs-14"><span class="purple fw-bold"> Thu 11 </span></div>
                                    <img src="{{asset('assets/images/we-4.png')}}" alt="">
                                    <div class="para-d-l-p">33 <sup>&deg;</sup></div>
                                </div>
                                <div class="swiper-slide text-center active">
                                    <div class="para-fs-14"><span class="purple fw-bold"> Fri 12 </span></div>
                                    <img src="{{asset('assets/images/we-5.png')}}">
                                    <div class="para-d-l-p">20 <sup>&deg;</sup></div>
                                </div>
                                <div class="swiper-slide text-center">
                                    <div class="para-fs-14"><span class="purple fw-bold"> Sat 13 </span></div>
                                    <img src="{{asset('assets/images/we-1.png')}}" alt="">
                                    <div class="para-d-l-p">20 <sup>&deg;</sup></div>
                                </div>
                                <div class="swiper-slide text-center">
                                    <div class="para-fs-14"><span class="purple fw-bold"> Sun 14 </span></div>
                                    <img src="{{asset('assets/images/we-2.png')}}" alt="">
                                    <div class="para-d-l-p">29 <sup>&deg;</sup></div>
                                </div>
                                <div class="swiper-slide text-center">
                                    <div class=" para-fs-14"><span class="purple fw-bold"> Mon 15 </span></div>
                                    <img src="{{asset('assets/images/we-3.png')}}">
                                    <div class="para-d-l-p">20 <sup>&deg;</sup></div>
                                </div>
                                <div class="swiper-slide text-center">
                                    <div class=" para-fs-14"><span class="purple fw-bold">Tue 16 </span> </div>
                                    <img src="{{asset('assets/images/we-4.png')}}" alt="">
                                    <div class="para-d-l-p">20 <sup>&deg;</sup></div>
                                </div>
                                <div class="swiper-slide text-center">
                                    <div class="purple"><span class="purple fw-bold">Wed 17 </span></div>
                                    <img src="{{asset('assets/images/we-5.png')}}" alt="">
                                    <div class="para-d-l-p">29 <sup>&deg;</sup></div>
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-------Weather Section End ---------->
<!------- Search result Start ------->
<section class="hotel-result search-result pt-4 pb-5">
    <div class="container">
        <div class="search-result-inner">
            <div class="row">
                <div class="col-lg-3">
                    <aside class="side-content">
                        <span class="side-text">Viewing 350 results</span>
                        <form class="hotel-result-form">
                            <div class="hotels-result-search">
                                <h5 class="search-heading">Search</h5>
                                <div class="input-group align-items-center search-input">
                                    <i class="fa-solid fa-magnifying-glass ps-2"></i>
                                    <input type="text" class="form-control" placeholder="Search by name">
                                </div>
                                <div class="input-group align-items-center search-input mt-2">
                                    <i class="fa-solid fa-magnifying-glass ps-2"></i>
                                    <input type="text" class="form-control" placeholder="Search by proximity">
                                </div>
                            </div>
                            <div class="hotels-result-sort pt-4">
                                <h5 class="search-heading ">Sort By</h5>
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                        checked>
                                    <div class="search-prefe-main d-flex justify-content-between align-items-center">
                                        <div class="search-prefe-text">
                                            <label class="form-check-label ps-2" for="flexCheckChecked">
                                                My preferences
                                            </label>
                                        </div>
                                        <div class="search-prefe-icon">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#myPreferences"><img
                                                    src="{{asset('assets/images/icons/h-s-pluse.png')}}"></a>
                                            <!--------- MyPreferences popup start---------->
                                            <div class="modal fade mypreferences-popup" id="myPreferences"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header justify-content-end">
                                                            <button type="button" data-bs-dismiss="modal"
                                                                class="modal-close" aria-label="Close"><i
                                                                    class="fa-solid fa-xmark"></i></button>
                                                        </div>
                                                        <div class="modal-body py-sm-5">
                                                            <div class="hotels-result-sort hotel-sort-popup"
                                                                id="preferences-scroll">
                                                                <div class="hotel-sort-popup-heading">
                                                                    <h4>My Preferences</h4>
                                                                </div>
                                                                <h5 class="search-heading pt-3">Sort By</h5>
                                                                <div class="hotel-result-sort-popup d-sm-flex">
                                                                    <div class="form-check pe-4">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="flexCheckDefault">
                                                                        <label class="form-check-label"
                                                                            for="flexCheckDefault">
                                                                            Price: low to high
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check pe-4">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="flexCheckChecked" checked>
                                                                        <label class="form-check-label"
                                                                            for="flexCheckDefault">
                                                                            Price: high to low
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check pe-4">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="flexCheckDefault">
                                                                        <label class="form-check-label"
                                                                            for="flexCheckDefault">
                                                                            Guess Review
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="hotels-filter ">
                                                                    <div class="hotels-result-top-filter">
                                                                        <div class="small-heading mt-3">
                                                                            <h6>Top filters </h6>
                                                                        </div>
                                                                        <div class="hotels-top-filter-popup ">
                                                                            <div class="row">
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input"
                                                                                            type="checkbox" value=""
                                                                                            id="flexCheckDefault">
                                                                                        <label class="form-check-label "
                                                                                            for="flexCheckDefault">
                                                                                            Final price with taxes +
                                                                                            fees
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input"
                                                                                            type="checkbox" value=""
                                                                                            id="flexCheckDefault">
                                                                                        <label class="form-check-label"
                                                                                            for="flexCheckDefault">
                                                                                            Breakfast Included
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input"
                                                                                            type="checkbox" value=""
                                                                                            id="flexCheckChecked"
                                                                                            checked>
                                                                                        <label class="form-check-label"
                                                                                            for="flexCheckDefault">
                                                                                            Flexible Check-In
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-check">
                                                                                        <input class="form-check-input"
                                                                                            type="checkbox" value=""
                                                                                            id="flexCheckDefault">
                                                                                        <label class="form-check-label"
                                                                                            for="flexCheckDefault">
                                                                                            Flexible Check-Out
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="hotels-result-style">
                                                                        <div class="small-heading mt-3">
                                                                            <h6>Style </h6>
                                                                        </div>
                                                                        <div
                                                                            class="hotels-result-style-popup d-sm-flex">
                                                                            <div class="form-check pe-3">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    id="flexCheckDefault">
                                                                                <label class="form-check-label"
                                                                                    for="flexCheckDefault">
                                                                                    Modern
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check pe-3">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    id="flexCheckChecked" checked>
                                                                                <label class="form-check-label"
                                                                                    for="flexCheckDefault">
                                                                                    Historic
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check pe-3">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    id="flexCheckDefault">
                                                                                <label class="form-check-label"
                                                                                    for="flexCheckDefault">
                                                                                    Contemporary
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="hotels-result-budget">
                                                                        <div class="small-heading mt-3">
                                                                            <h6>Budget </h6>
                                                                        </div>
                                                                        <div class="row g-3 align-items-center pb-4">
                                                                            <div class="col-md-3 col-5">
                                                                                <input type="tel" class="form-control"
                                                                                    placeholder="$ Min">
                                                                            </div>
                                                                            <div class="col-md-1 col-2 p-0 text-center">
                                                                                <span class="form-text">to</span>
                                                                            </div>
                                                                            <div class="col-md-3 col-5">
                                                                                <input type="tel" class="form-control"
                                                                                    placeholder="$ Max">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="hotels-result-property">
                                                                        <div class="small-heading mt-3">
                                                                            <h6>Property Class </h6>
                                                                        </div>
                                                                        <div class="hotels-result-property d-sm-flex">
                                                                            <div class="form-check pe-4">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    id="flexCheckDefault">
                                                                                <span class="property-class-icon"><img
                                                                                        src="{{asset('assets/images/icons/start.png')}}"></span>
                                                                                <span class="property-class-icon"><img
                                                                                        src="{{asset('assets/images/icons/start.png')}}"></span>
                                                                                <span class="property-class-icon "><img
                                                                                        src="{{asset('assets/images/icons/start.png')}}"></span>
                                                                                <span class="property-class-icon "><img
                                                                                        src="{{asset('assets/images/icons/start.png')}}"></span>
                                                                                <span class="property-class-icon "><img
                                                                                        src="{{asset('assets/images/icons/start.png')}}"></span>
                                                                            </div>
                                                                            <div class="form-check pe-4">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    id="flexCheckChecked" checked>
                                                                                <span class="property-class-icon"><img
                                                                                        src="{{asset('assets/images/icons/start.png')}}"></span>
                                                                                <span class="property-class-icon "><img
                                                                                        src="{{asset('assets/images/icons/start.png')}}"></span>
                                                                                <span class="property-class-icon "><img
                                                                                        src="{{asset('assets/images/icons/start.png')}}"></span>
                                                                                <span class="property-class-icon "><img
                                                                                        src="{{asset('assets/images/icons/start.png')}}"></span>
                                                                            </div>
                                                                            <div class="form-check pe-4">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    id="flexCheckChecked" checked>
                                                                                <span class="property-class-icon"><img
                                                                                        src="{{asset('assets/images/icons/start.png')}}"></span>
                                                                                <span class="property-class-icon "><img
                                                                                        src="{{asset('assets/images/icons/start.png')}}"></span>
                                                                                <span class="property-class-icon "><img
                                                                                        src="{{asset('assets/images/icons/start.png')}}"></span>
                                                                            </div>
                                                                            <div class="form-check pe-4">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    id="flexCheckDefault">
                                                                                <span class="property-class-icon"><img
                                                                                        src="{{asset('assets/images/icons/start.png')}}"></span>
                                                                                <span class="property-class-icon "><img
                                                                                        src="{{asset('assets/images/icons/start.png')}}"></span>
                                                                            </div>
                                                                            <div class="form-check pe-4">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    id="flexCheckDefault">
                                                                                <span class="property-class-icon"><img
                                                                                        src="{{asset('assets/images/icons/start.png')}}"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="hotels-results-amenities">
                                                                        <div class="small-heading mt-3">
                                                                            <h6>Amenities </h6>
                                                                        </div>
                                                                        <div
                                                                            class="hotels-results-amenities-popup d-sm-flex">
                                                                            <div class="form-check pe-md-4 pe-3">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    id="flexCheckDefault">
                                                                                <label class="form-check-label"
                                                                                    for="flexCheckDefault">
                                                                                    All Amenities
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check pe-md-4 pe-3">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    id="flexCheckDefault">
                                                                                <label class="form-check-label"
                                                                                    for="flexCheckDefault">
                                                                                    Elevator
                                                                                </label>
                                                                                <span class="amenities-icon"><img
                                                                                        src="{{asset('assets/images/icons/amenities-2.png')}}"
                                                                                        alt=""></span>
                                                                            </div>
                                                                            <div class="form-check pe-md-4 pe-3">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    id="flexCheckChecked" checked>
                                                                                <label class="form-check-label"
                                                                                    for="flexCheckDefault">
                                                                                    Breakfast
                                                                                </label>
                                                                                <span class="amenities-icon"><img
                                                                                        src="{{asset('assets/images/icons/amenities-3.png')}}"
                                                                                        alt=""></span>
                                                                            </div>
                                                                            <div class="form-check pe-md-4 pe-3">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    id="flexCheckDefault">
                                                                                <label class="form-check-label"
                                                                                    for="flexCheckDefault">
                                                                                    Pool
                                                                                </label>
                                                                                <span class="amenities-icon"><img
                                                                                        src="{{asset('assets/images/icons/amenities-4.png')}}"
                                                                                        alt=""></span>
                                                                            </div>
                                                                            <div class="form-check pe-md-4 pe-3">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    id="flexCheckDefault">
                                                                                <label class="form-check-label"
                                                                                    for="flexCheckDefault">
                                                                                    Bar
                                                                                </label>
                                                                                <span class="amenities-icon"><img
                                                                                        src="{{asset('assets/images/icons/amenities-5.png')}}"
                                                                                        alt=""></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="preference-popup-save-btn text-center mt-5">
                                                                    <button
                                                                        class="preference-popup-btn btn bg-purple">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--------- MyPreferences popup end---------->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label ps-2" for="flexCheckDefault">
                                        Price: low to high
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label ps-2" for="flexCheckDefault">
                                        Price: high to low
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label ps-2" for="flexCheckDefault">
                                        Guess Review
                                    </label>
                                </div>
                                <div class="custom-filter mb-lg-0 mb-4">
                                    <a href="#"><img src="{{asset('assets/images/icons/h-s-pluse.png')}}" alt=""></a>
                                    <span class="custom-filter-text ps-2 purple"> Add Custom Filter</span>
                                    </label>
                                </div>
                            </div>
                            <div class="hotels-filter result-mobile-view">
                                <div class="hotels-result-top-filter pt-4">
                                    <h5 class="search-heading">Filter By</h5>
                                    <div class="small-heading">
                                        <h6>Top filters </h6>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label ps-2" for="flexCheckDefault">
                                            Final price with taxes fees
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label ps-2" for="flexCheckDefault">
                                            Breakfast Included
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                            checked>
                                        <label class="form-check-label ps-2" for="flexCheckDefault">
                                            Flexible Check-In
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label ps-2" for="flexCheckDefault">
                                            Flexible Check-Out
                                        </label>
                                    </div>
                                </div>
                                <div class="hotels-result-style pt-1">
                                    <div class="small-heading">
                                        <h6>Style </h6>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label ps-2" for="flexCheckDefault">
                                            Modern
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                            checked>
                                        <label class="form-check-label ps-2" for="flexCheckDefault">
                                            Historic
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label ps-2" for="flexCheckDefault">
                                            Contemporary
                                        </label>
                                    </div>
                                </div>
                                <div class="hotels-result-budget pt-1">
                                    <div class="small-heading">
                                        <h6>Budget </h6>
                                    </div>
                                    <div class="row g-0  align-items-center ">
                                        <div class="col-4 col-lg-5">
                                            <input type="tel" class="form-control" placeholder="$ Min">
                                        </div>
                                        <div class="col-2 p-0 text-center">
                                            <span class="form-text">to</span>
                                        </div>
                                        <div class="col-4 col-lg-5">
                                            <input type="tel" class="form-control" placeholder="$ Max">
                                        </div>
                                    </div>
                                </div>
                                <div class="hotels-result-property pt-4">
                                    <div class="small-heading">
                                        <h6>Property Class </h6>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <span class="property-class-icon ps-2"><img
                                                src="{{asset('assets/images/icons/start.png')}}"></span>
                                        <span class="property-class-icon"><img
                                                src="{{asset('assets/images/icons/start.png')}}"></span>
                                        <span class="property-class-icon "><img
                                                src="{{asset('assets/images/icons/start.png')}}"></span>
                                        <span class="property-class-icon "><img
                                                src="{{asset('assets/images/icons/start.png')}}"></span>
                                        <span class="property-class-icon "><img
                                                src="{{asset('assets/images/icons/start.png')}}"></span>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                            checked>
                                        <span class="property-class-icon ps-2"><img
                                                src="{{asset('assets/images/icons/start.png')}}"></span>
                                        <span class="property-class-icon "><img
                                                src="{{asset('assets/images/icons/start.png')}}"></span>
                                        <span class="property-class-icon "><img
                                                src="{{asset('assets/images/icons/start.png')}}"></span>
                                        <span class="property-class-icon "><img
                                                src="{{asset('assets/images/icons/start.png')}}"></span>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                            checked>
                                        <span class="property-class-icon ps-2"><img
                                                src="{{asset('assets/images/icons/start.png')}}"></span>
                                        <span class="property-class-icon "><img
                                                src="{{asset('assets/images/icons/start.png')}}"></span>
                                        <span class="property-class-icon "><img
                                                src="{{asset('assets/images/icons/start.png')}}"></span>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <span class="property-class-icon ps-2"><img
                                                src="{{asset('assets/images/icons/start.png')}}"></span>
                                        <span class="property-class-icon "><img
                                                src="{{asset('assets/images/icons/start.png')}}"></span>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <span class="property-class-icon ps-2"><img
                                                src="{{asset('assets/images/icons/start.png')}}"></span>
                                    </div>
                                </div>
                                <div class="hotels-results-neigh pt-4">
                                    <div class="small-heading ">
                                        <h6>Neighborhood </h6>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label ps-2" for="flexCheckDefault">
                                            Pequeña Habana
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                            checked>
                                        <label class="form-check-label ps-2" for="flexCheckDefault">
                                            Brickell
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label ps-2" for="flexCheckDefault">
                                            Wynwood
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                            checked>
                                        <label class="form-check-label ps-2" for="flexCheckDefault">
                                            Cooconut Groove
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label ps-2" for="flexCheckDefault">
                                            Overtown
                                        </label>
                                    </div>
                                </div>
                                <div class="hotels-results-amenities pt-1">
                                    <div class="small-heading">
                                        <h6>Amenities </h6>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label ps-2" for="flexCheckDefault">
                                            All Amenities
                                        </label>
                                    </div>
                                    @foreach($amenities as $amenity)
                                        <div class="form-check">
                                            <input class="form-check-input ps-2" type="checkbox" value="" id="flexCheckChecked">
                                            <label class="form-check-label " for="flexCheckDefault">
                                                {{@$amenity->amenities}}
                                            </label>
                                            <span class="amenities-icon"><img
                                                    src="{{asset('storage/'.@$amenity->icon)}}" alt=""></span>
                                        </div>
                                    @endforeach
                                    {{-- <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label ps-2" for="flexCheckDefault">
                                            Elevator
                                        </label>
                                        <span class="amenities-icon"><img
                                                src="{{asset('assets/images/icons/amenities-2.png')}}" alt=""></span>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                            checked>
                                        <label class="form-check-label ps-2" for="flexCheckDefault">
                                            Breakfast
                                        </label>
                                        <span class="amenities-icon"><img
                                                src="{{asset('assets/images/icons/amenities-3.png')}}" alt=""></span>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label ps-2" for="flexCheckDefault">
                                            Pool
                                        </label>
                                        <span class="amenities-icon"><img
                                                src="{{asset('assets/images/icons/amenities-4.png')}}" alt=""></span>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                            checked>
                                        <label class="form-check-label ps-2" for="flexCheckDefault">
                                            Bar
                                        </label>
                                        <span class="amenities-icon"><img
                                                src="{{asset('assets/images/icons/amenities-5.png')}}" alt=""></span>
                                    </div> --}}
                                </div>
                                <div class="hotels-result-filter-btn text-center pb-4">
                                    <button class="btn bg-purple filter-btn">Filter</button>
                                </div>
                            </div>
                        </form>
                    </aside>
                </div>

                <!-------- Search Hotel Result -------->
                @include('frontend::hotel.hotelResult')
                <!-------- Search Hotel Result end -------->

            </div>
        </div>
    </div>
    </div>
</section>
<!------- Search result end ------->
@endsection

@push('script')

<!-------- Google Place Search -------->
<script type='text/javascript'
    src='https://maps.googleapis.com/maps/api/js?libraries=places&v=3&language=En&key=AIzaSyBZhREk9TESs69r99eYGKkIQ725IqOP8Zc&ver=5.9.3'>
</script>

<!-------- Weather swiper js start--------->
<script>
    // Google Place Search 
     google.maps.event.addDomListener(window, 'load', initialize);
    
    function initialize() {
        var input = document.getElementById('autocomplete');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            $('#latitude').val(place.geometry['location'].lat());
            $('#longitude').val(place.geometry['location'].lng());
    
            $("#latitudeArea").removeClass("d-none");
            $("#longtitudeArea").removeClass("d-none");
        });
       
    }
const swiper = new Swiper(".swiper", {
  slidesPerGroup: 1,
  loop: false,
  Infinity: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  speed: 400,
  slidesPerView: 7,
  spaceBetween: 7,
  //     breakpoints: {
  //         900: {
  //             slidesPerView: 10,
  //             spaceBetween: 10,
  //             slidesOffsetAfter: 200,
  //         },
  // },
});        
</script>
<!-------- Weather swiper js end--------->

<!-------- image popup (slider image js)------>
<script>
    $('.slider-single').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  draggable: false,
  fade: true,
  asNavFor: '.slider-nav'
});

$('.slider-nav').slick({
  slidesToShow: 10,
  slidesToScroll: 1,
  asNavFor: '.slider-single',
  dots: false,
  draggable: false,
  centerMode: true,
  focusOnSelect: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 8,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 7,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 6,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 360,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },
  ],
});

$('.modal').on('shown.bs.modal', function (e) {
  $('.slider-single').slick('setPosition');
  $('.swiper').addClass('open');
});

$('.modal').on('shown.bs.modal', function (e) {
  $('.slider-nav').slick('setPosition');
  $('.swiper').addClass('open');
});

   
$(document).on('click', '#SubmitSearch', function(){
  var search = $("input[name=search]").val();
  !search ? $(`.search-error`).html(`Please enter a destination to start searching.`) : $(`.search-error`).html(``);
  var checkIn = $("input[name=value_from_start_date]").val();
  var checkOut = $("input[name=value_from_end_date]").val();
  var guest = $("select[name=guest]").val();
  var room = $("select[name=room]").val();
  var bed = $("select[name=bed]").val();

  if (!search) {
    return;
  }


  window.location.href = base_url + "/hotel?search=" + search + "&checkIn=" + checkIn + "&checkOut=" + checkOut +"&guest=" + guest + "&room=" + room + "&bed=" + bed;

});
</script>
<!-- custom-selector js -->
<script>
    $(document).ready(function () {
      $(document).on('click', '.select-div', function () {
        $(".select-option").toggleClass("option-none");
      });

        $(".js-example-tags").select2({
            tags: true
        });

    });
</script>
@endpush