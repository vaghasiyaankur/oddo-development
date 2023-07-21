@extends('layout::user.Frontend.master')

@section('meta_description', 'Page Home')
@section('meta_keywords', 'Page,Home')

@section('title', 'Home')


@push('css')
    <!-------- Swiper Css Cdn --------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.2.3/swiper-bundle.css" defer/>

    <style>
        /*  */
        .bed-selector {
            position: relative;
            /* top: 17px; */
            cursor: pointer;
        }

        .bed-selector .room {
            background: #FFFFFF;
            box-shadow: 0px 0px 19px rgb(0 0 0 / 10%);
            border-radius: 8px;
            height: 100%;
            width: 100%;
            line-height: 30px;
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
            padding: 6px 17px;
            /* width: 170px; */
            width: 100%;
            border: 1px solid #878996;
            border-radius: 5px;
        }
        .bed-selector .select-div i.fa-sharp {
            color: #6A78C7;
            background: rgb(106 120 199 / 10%);
            padding: 0 4px;
            border-radius: 3px;
        }

        .bed-selector .option-none {
            display: none;
        }

        .bed-selector .select-option {
            position: absolute;
            z-index: 9999;
        }

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
            max-width: 211px !important;
            max-height: 200px !important;
            border: 1px solid #878996;
            top: 0px !important;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: 1px solid #aaa;
        }

        .select2-search--dropdown {
            display: none;
        }

        .select2-results__option {
            padding-right: 20px;
            vertical-align: middle;
        }

        .dropdown-inner .form-check-input:checked {
            border-color: #6A78C7;
            background-color: #6A78C7 !important;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #6a78c7;
            color: white;
        }

        .t-city-card-button .btn:hover {
            background-color: #566ce2;
            color: #fff;
        }
        .check-in-out-inner .check-in-out-bottom .check-in-out-icon{
            flex: 0 0 50%;
            /* padding-left: 38px; */
        }
        .check-in-out-inner .check-in-out-top {
            border-right: 1px solid #767992;
        }
        .check-icons-inner .check-image{
            background: rgb(106 120 199 / 20%);
            border-radius: 3px;
            width: 100%;
            max-width: 38px;
            height: 100%;
            min-height: 38px;
            max-height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
        }
    
        /* .check-in-out-inner .check-in-out-bottom .check--out_btn_{
            flex: 0 0 50%;
            padding-right: 135px;
        } */

        .top-hotels-img img{
            width: 100%;
            height:100%;
            max-height: 493px;
            max-width:1230px;
        }

        .top-hotels-card-inner img {
            width: 100%;
            height: 100%;
            max-width: 240px;
            max-height: 240px;
            object-fit: none;
        }
        
        .swiper-logo img{
            width: 100%;
            height: 100%;
            max-height: 23px;
            max-width: 32px;
        }

        /* .check-icons-inner img{
            width: 100%;
            height: 100%;
            max-height: 32px;
            max-width: 32px;
        } */

        .checkInDiv img{
            width: 100%;
            height: 100%;
            max-height: 31px;
            max-width: 31px;
        }

        .checkoutDiv img{
            width: 100%;
            height: 100%;
            max-height: 31px;
            max-width: 31px;
        }

        .explorePlan img{
            width: 100%;
            height: 100%;
            max-height: 41px;
            max-width: 41px;
        }

        /* dropdown css */
        .guests-option.select-option{
            max-width: 100%!important;
            height: 100%;
            /* margin-right: 13px; */
        }
        .hotel-result .check-in-out-inner .check-in-out-form .check-in-out-bottom .select-option{
            max-width: 100% !important;
            cursor: pointer;
        }
        .guests-option .drop-down{
            display: inline-block;
            position: relative;
            /* padding-top: 35px; */
            width: 100%;
        }
        .guests-option .drop-down__button{
            display: inline-block;
            line-height: 36px;
            padding: 0 17px;
            width: 100%;
            position: relative;
            border-radius: 4px;
            /* box-shadow: 0px 4px 6px 0px rgba(0,0,0,0.2); */
            cursor: pointer;
            border: 1px solid #878996;
            border-radius: 5px;
        }
        .guests-option .drop-down__button .drop-down__guest.toggle i {
            color: #6A78C7;
            font-size: 13px;
            padding: 0 4px;
        }
        .guests-option .drop-down__name {
            font-size: 15px;
            line-height: 20px;
            color: #393C52;
            font-weight: 500;
            padding-left: 10px;
        }
        .guests-option .drop-down__button .drop-down__name.toggle i {
            color: #6A78C7;
            font-size: 13px;
            padding: 0 4px;
        }
        .guests-option .drop-down__button i.fa-sharp {
            position: absolute;
            top: 10px;
            right: 18px;
            color: #6A78C7;
            background: rgb(106 120 199 / 10%);
            padding: 0 4px;
            border-radius: 3px;
        }
        .guests-option .drop-down__guest {
            font-size: 15px;
            line-height: 20px;
            color: #393C52;
            font-weight: 500;
            border-right: 1px solid #767992;
            padding-right: 10px;
        }
        .guests-option .drop-down__icon {
            width: 18px;
            vertical-align: middle;
            margin-left: 14px;
            height: 18px;
            border-radius: 50%;
            transition: all 0.4s;
            -webkit-transition: all 0.4s;
            -moz-transition: all 0.4s;
            -ms-transition: all 0.4s;
            -o-transition: all 0.4s;
        }
        .guests-option .drop-down__menu-box {
            position: absolute;
            width: 100%;
            left: 0;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0px 0px 5px 0px rgb(0 0 0 / 53%);
            transition: all 0.3s;
            visibility: hidden;
            opacity: 0;
            margin-top: 5px;
        }
        /* .guests-option .drop-down__button::after{
            content: "\f107";
            position: absolute;
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            right: 17px;
            color: #6A78C7;
        }
        .guests-option .drop-down__button::before {
            content: "\f500";
            position: absolute;
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            left: 17px;
            color: #6A78C7;
        } */
       
        .guests-option .drop-down__menu {
            margin: 0;
            padding: 0px;
            list-style: none;
        }
        .guests-option .drop-down__menu-box:before{
            content: '';
            background-color: transparent;
            border-right: 10px solid transparent;
            position: absolute;
            border-left: 10px solid transparent;
            border-bottom: 10px solid #dadada;
            border-top: 10px solid transparent;
            top: -20px;
            right: 30px;
        }

        .guests-option .drop-down__menu-box:after{
            content:'';
            background-color: transparent;
        }
        .guests-option .drop-down__item {
            font-size: 15px;
            padding: 13px 0;
            text-align: left;
            font-weight: 500;
            color: #000;
            cursor: pointer;
            position: relative;
            border-bottom: 1px solid #e0e2e9;
        }
        .guests-option .drop-down__item-icon {
            width: 15px;
            height: 15px;
            position: absolute;
            right: 0px;
            fill: #8995b6;
        }
        .guests-option .drop-down__item:hover .drop-down__item-icon{
             fill: #3d6def;
        }
       
        .guests-option .drop-down__item:last-of-type{
            border-bottom: 0;
        }
        .guests-option .drop-down--active .drop-down__menu-box{
            visibility: visible;
            opacity: 1;
            margin-top: 15px;
            z-index: 111;
        }
        .guests-option .quantity {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }
        .guests-option .quantity  .quantity__minus,
        .guests-option .quantity  .quantity__plus, 
        .room__minus, .room__plus {
            display: block;
            width: 27px;
            height: 27px;
            margin: 0 10px;
            background: #fff;
            text-decoration: none;
            text-align: center;
            line-height: 24px;
            /* font-size: 20px; */
            border: 1px solid #878996;
        }
       
        .guests-option .quantity  .quantity__minus,
        .guests-option .quantity  .quantity__plus, 
        .room__minus, .room__plus{
             border-radius:50px ;
        }
        
        .guests-option .quantity .quantity__input, .room__input {
            width: 38px;
            height: 28px;
            margin: 0;
            padding: 0;
            border-radius: 7px;
            border: 1px solid #878996;
            text-align: center;
            color: #6A78C7;
        }
        
        .guests-option .quantity .quantity__minus,
        .guests-option .quantity .quantity__plus{
            color: #6A78C7;
        }
        
        .guests-option .quantity .room__minus,
        .guests-option .quantity .room__plus {
            color: #6A78C7;
        } 
        .btn-reset{
            background: #f33e3e;
            border: transparent;
        }
        .btn-reset, .btn-apply{
            padding: .300rem .50rem;
        }
        .hotel-result .check-in-out-inner .check-in-out-form .check-in-out-bottom .select-room{
            /* margin: 0px 16px; */
        }
        .quantity__minus[disabled], .room__minus[disabled]{
            --tw-border-opacity: 1;
            color: #bbbcc2 !important;
            border: 1px solid #bbbcc2 !important;
            background-color: rgba(243,244,245,var(--tw-bg-opacity)) !important;
            cursor: not-allowed;
        }
        /* @media screen and (max-width:1200px){
            .guests-option .drop-down__guest{
                padding: 0 5px 0 23px;
            }        
        } */
        @media screen and (max-width:992px){
            .check-in-out-inner .check-in-out-top {
                border-right: 1px solid transparent;
            }
        }
        
        .card .card-image .wislist.active, .card .wislist.active{
            color: #ff0000e6;
            background-color: #fff;
        }
    </style>
@endpush


@section('content')
    <!------- homepage-swiper section start ------->
    <section class="swiper-container loading homepage-swiper">
        <div class="swiper-wrapper">
            @foreach ($cities as $city)
                    <div class="swiper-slide" style="background-image:url({{ @$city->background_image ? asset('storage/' . @$city->background_image) : asset('assets/images/defaultImage.png') }})" onerror="this.src='{{asset('assets/images/defaultImage.png')}}'">
                    {{-- <img src="{{ asset('storage/' . $city->background_image) }}" class="entity-img img-fluid" /> --}}
                    <div class="content">
                        <div class="swiper-logo text-center"><img src="{{ asset('storage/' . @$city->country->icon) }}"
                                alt=""></div>
                        <p class="title">{{ $city->name }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <!--navigation buttons -->
        <div class="swiper-button-prev swiper-button-white"></div>
        <div class="swiper-button-next swiper-button-white"></div>
    </section>
    <!------- homepage-swiper section end ------->
    <!------- Check-in-out section start ------->
    <section class="check-in-out hotel-result">
        <div class="container">
            <div class="check-in-out-inner">
                <h4>Hotels</h4>
                <div class="check-in-out-form">
                    <div class="row">
                        <div class="col-lg-6 check-in-out-top pe-lg-4">
                            <div class="col-12 mb-4 pb-2">
                                <label for="hotels"></label>
                                <div class="d-flex align-items-center search-input mt-2">
                                    {{-- <input class="form-control border-0" id="hotels" type="text" placeholder="Search Place"> --}}
                                    <input type="text" name="search" id="autocomplete" class="form-control border-0"
                                        placeholder="Search Place" value="{{ request()->search }}">
                                    <input type="hidden" id="latitude" name="latitude" class="form-control">
                                    <input type="hidden" name="longitude" id="longitude" class="form-control">
                                    <i class="fa-solid fa-magnifying-glass pe-3" style="color: #767992;"></i>
                                </div>
                                <span class="search-error text-danger position-absolute"></span>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mb-lg-0 pb-lg-0 mb-4 pb-2">
                                    <div class="guests-option select-option">
                                        <div class="drop-down">
                                            @php
                                                $selectGuest = Request()->guest;
                                                $selectRoom = Request()->room;
                                            @endphp
                                            <div id="dropDown" class="drop-down__button">
                                                <span class="drop-down__guest toggle">
                                                    <i class="fa-solid fa-user"></i>
                                                    <span class="guestNum"> {{ $selectGuest ? $selectGuest : 4 }} </span> 
                                                    Guests
                                                </span>
                                                <span class="drop-down__name toggle">
                                                    <i class="fa-solid fa-house"></i>
                                                    <span class="roomNum"> {{ $selectRoom ? $selectRoom : 1 }} </span> 
                                                    Room
                                                </span>
                                                <i class="fa-sharp fa-solid fa-caret-down"></i>
                                            </div>
                                            <div class="drop-down__menu-box">
                                              <ul class="drop-down__menu">
                                                <li data-name="profile" class="drop-down__item">
                                                    <div class="d-flex align-items-center justify-content-between px-3">
                                                        <div>Guests</div>
                                                        @php
                                                        $selectGuest = Request()->guest;
                                                        @endphp
                                                        <div class="quantity">
                                                            <button class="quantity__minus"><span>-</span></button>
                                                            <input type="text" class="quantity__input select_guest" name="guest" value="{{ $selectGuest ? $selectGuest : 1 }}">
                                                            <button class="quantity__plus"><span>+</span></button>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-name="dashboard" class="drop-down__item">
                                                    <div class="d-flex align-items-center justify-content-between px-3">
                                                        <div>Room</div>
                                                        @php
                                                        $selectRoom = Request()->room;
                                                        @endphp
                                                        <div class="quantity">
                                                            <button href="#" class="room__minus"><span>-</span></button>
                                                            <input type="text" class="room__input select_room" name="room" value="{{ $selectRoom ? $selectRoom : 1 }}">
                                                            <a href="#" class="room__plus"><span>+</span></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-name="dashboard" class="drop-down__item">
                                                    <div class="d-flex align-items-center justify-content-between px-3">
                                                        <button type="button" class="btn border-dark btn-reset text-white">Reset</button>
                                                        <button type="button" class="btn bg-purple btn-apply applyBtn text-white">Apply</button>
                                                    </div>
                                                </li>
                                              </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-lg-0 pb-lg-0 select-option mb-4 pb-2">
                                    <div class="select-option">
                                        <div class="bed-selector">
                                            <div class="select-div d-flex justify-content-between align-items-center">
                                                <p class="mb-0">
                                                    <i class="fa-solid fa-car pe-2" style="color: #6A78C7"></i>
                                                    <span style="color: #393C52">king</span>
                                                </p>
                                                <i class="fa-sharp fa-solid fa-caret-down"></i>
                                            </div>
                                            <div class="select-option select-room option-none w-100">
                                                <div class="room">
                                                    <div class="title-container">
                                                        <h5 class="title" style="margin:10px;">Room 1</h5>
                                                    </div>
                                                    <section class="dropdown-container">
                                                        <div class="dropdown-inner">
                                                            <input class="form-check-input hotelBeds" type="checkbox" id="king_1">
                                                            <label for="king_1">1. King</label>
                                                        </div>
                                                        <div class="dropdown-inner hotelBeds">
                                                            <input type="checkbox" id="twin_1">
                                                            <label for="twin_1">2. Twin</label>
                                                        </div>
                                                        <div class="dropdown-inner hotelBeds">
                                                            <input type="checkbox" id="queen_1">
                                                            <label for="queen_1">3. Queen</label>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 check-in-out-bottom ps-lg-4">
                            <form action="javascript: void(0);">
                                <div
                                    class="row custom-calender-piker d-lg-flex justify-content-lg-center position-relative align-items-center">
                                    <?php 
                                        $checkInDate = Carbon\Carbon::tomorrow()->format('d/m/Y');
                                        $checkOutDate = Carbon\Carbon::now()->addDays(2)->format('d/m/Y');
                                        $CheckIn = request()->checkIn;
                                        $CheckOut = request()->checkOut;
                                    ?>
                                    <div class="check-text-label col-sm-6  mb-4 pb-2">
                                        <label class="check-inout">Check-In </label>
                                        <div class="input--text d-flex align-items-center checkInDiv mt-2">
                                            <img src="{{ asset('assets/images/icons/cal-1.png') }}" class="px-2">
                                            <input type="text" class="input--control ps-xl-2"
                                                name="value_from_start_date" placeholder="{{ $checkInDate }}"
                                                data-datepicker="separateRange" value="{{ $CheckIn ? $CheckIn : $checkInDate }}" />
                                                <i class="fa-sharp fa-solid fa-caret-down"></i>
                                        </div>
                                    </div>
                                    <div class="check-text-label col-sm-6  mb-4 pb-2">
                                        <label class="check-inout check-out-label">Check-Out</label>
                                        <div class="input--text d-flex align-items-center checkoutDiv mt-2">
                                            <img src="{{ asset('assets/images/icons/cal-2.png') }}" class="px-2">
                                            <input type="text" class="input--control ps-xl-2"
                                                name="value_from_end_date" placeholder="{{ $checkOutDate }}"
                                                data-datepicker="separateRange" value="{{ $CheckOut ? $CheckOut : $checkOutDate }}" />
                                                <i class="fa-sharp fa-solid fa-caret-down"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 mb-lg-0 pb-lg-0 mb-sm-4 pb-sm-2">
                                        <div class="check-in-out-icon align-items-center" style="text-align: left;">
                                            <div class="check-icons-inner d-flex">
                                                <div class="check-image">
                                                    <img src="{{ asset('assets/images/icons/check-1.png') }}" class="img-fluid">
                                                </div>
                                                <div class="check-image">
                                                    <img src="{{ asset('assets/images/icons/check-2.png') }}" class="img-fluid">
                                                </div>
                                                <div class="check-image">
                                                    <img src="{{ asset('assets/images/icons/check-3.png') }}" class="img-fluid">
                                                </div>
                                                <div class="check-image">
                                                    <img src="{{ asset('assets/images/icons/check-1.png') }}" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-4 pb-2 mb-lg-0 pb-lg-0">
                                        <div class="check--out_btn_">
                                            <div class="check-in-out-btn text-center">
                                                <a href="javascript:;" class="btn search-btn purple w-100" id="SubmitSearch">Search</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------- Check-in-out section end ------->
    <!------- Travel Planning section start  -------->
    <section class="travel-planning">
        <div class="travel-planning-inner">
            <div class="travel-planning-heading text-center">
                <h1>A one stop shop for <span class="purple"> travel</span></h1>
                <p class="pb-sm-3">Travel planning and booking made easy</p>
            </div>
            <!------- pagination start -------->
            <div class="pagination-main pt-3">
                <ul class="list-group list-group-horizontal mt-2 justify-content-center align-items-baseline">
                    <div class="text-center list-group-main">
                        <li class="list-group-item pagination-list"><a href="#"
                                class="purple text-decoration-none"> 1</a>
                        </li>
                        <span><a href="#" class="pagination-text text-decoration-none"> Explore</a></span>
                    </div>
                    <div class="list-right-arrow">
                        <li class="list-group-item explorePlan border-0"><img src="{{ asset('assets/images/icons/Vector.png') }}" class="img-fluid">
                        </li>
                    </div>
                    <div class="list-group-main text-center">
                        <li class="list-group-item pagination-list"><a href="#"
                                class="purple text-decoration-none"> 2</a>
                        </li>
                        <span><a href="#" class="pagination-text text-decoration-none">Plan</a> </span>
                    </div>
                    <div class="list-right-arrow">
                        <li class="list-group-item explorePlan border-0"><img src="{{ asset('assets/images/icons/Vector.png') }}" class="img-fluid">
                        </li>
                    </div>
                    <div class="list-group-main text-center">
                        <li class="list-group-item pagination-list purple">
                            <a href="#" class="purple text-decoration-none"> 3</a>
                        </li>
                        <span>
                            <a href="#" class="pagination-text text-decoration-none"> Book</a>
                        </span>
                    </div>
                </ul>
            </div>
            <!------- pagination end -------->
            <!------- travel info start ------->
            <div class="travel-info-main pt-sm-5 pt-3">
                <div class="container">
                    <div class="travel-info-inner position-relative">
                        <div class="travel-info-logo-img travel-info-bg bg-white position-relative">
                            <img src="{{ asset('assets/images/icons/t-info-1.png') }}" class="img-fluid">
                        </div>
                        <div class="travel-info-car">
                            <div class="travel-info-car-img travel-info-bg bg-blue position-relative">
                                <img src="{{ asset('assets/images/icons/t-info-2.png') }}" class="img-fluid">
                            </div>
                        </div>
                        <div class="travel-info-bank">
                            <div class="travel-info-bank-img travel-info-bg bg-purple position-relative">
                                <img src="{{ asset('assets/images/icons/t-info-3.png') }}" class="img-fluid">
                            </div>
                        </div>
                        <div class="travel-info-tree">
                            <div class="travel-info-tree-img travel-info-bg bg-green position-relative">
                                <img src="{{ asset('assets/images/icons/t-info-4.png') }}" class="img-fluid">
                            </div>
                        </div>
                        <div class="travel-info-bag">
                            <div class="travel-info-bag-img travel-info-bg bg-yellow position-relative">
                                <img src="{{ asset('assets/images/icons/t-info-5.png') }}" class="img-fluid">
                            </div>
                        </div>
                        <div class="travel-info-rest">
                            <div class="travel-info-rest-img travel-info-bg bg-green-two position-relative">
                                <img src="{{ asset('assets/images/icons/t-info-6.png') }}" class="img-fluid">
                            </div>
                        </div>
                        <div class="rounded-pill bg-danger text-white coming--pill">COMING SOON</div>
                        <div class="travel-info-csoon">
                            <div class="travel-info-csoon-img travel-info-bg d-pink position-relative">
                                <img src="{{ asset('assets/images/icons/t-info-7.png') }}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!------- travel info end ------->
        </div>
    </section>
    <!------- Travel Planning section end  -------->
    <!------- Top cities section start -------->
    {{-- <section class="s-top-city">
        <div class="container">
            <div class="s-top-city-inner ">
                <div class="s-top-city-head text-center mb-sm-5 mb-3 {{ count($cities) ? '' : 'd-none' }}">
                    <h2>Top Cities
                    </h2>
                </div>
                <div class="s-top-city-main">
                    <div class="slick-wrapper position-relative">
                        <div id="slick1" class="result-swpier-img">
                            @foreach ($cities as $city)
                                <div class="slide-item position-relative">
                                    <div class="t-city-card-img"><img
                                            src="{{ asset('storage/' . @$city->background_image) }}"
                                            style="width: 327px; height: 401px;" class="img-fluid"></div>
                                    <div class="position-absolute">
                                        <div class="s-city-img-content">
                                            <h3 class="text-white">{{ @$city->name }}</h3>
                                            <div class="d-flex  justify-content-center align-items-center">
                                                <span><img src="{{ asset('storage/' . @$city->country->icon) }}"></span>
                                                <span
                                                    class="text-white para-fs-14 ps-2">{{ @$city->country->country_name }}</span>
                                            </div>
                                        </div>
                                        <div class="t-city-card-button">
                                            <a href="{{ route('city.explore', @$city->slug) }}"
                                                class="btn bg-purple t-city-btn">Explore</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </section> --}}

    <section class="s-top-city">
        <div class="container">
            <div class="s-top-city-inner ">
                <div class="s-top-city-head text-center mb-sm-5 mb-3 {{ count($propertyTypes) ? '' : 'd-none' }}">
                    <h2>Browse By Property Type
                    </h2>
                </div>
                <div class="s-top-city-main">
                    <div class="slick-wrapper position-relative">
                        <div id="slick1" class="result-swpier-img">
                            @foreach ($propertyTypes as $propertyType)
                                <div class="slide-item position-relative homeslideItem">
                                    <div class="t-city-card-img position-relative">
                                        <img src="{{ $propertyType->image ? asset('storage/' . @$propertyType->image) : asset('assets/images/default.png') }}"
                                        style="width: 327px; height: 401px;" class="img-fluid" onerror="this.src='{{asset('assets/images/default.png')}}'">
                                    </div>
                                    <div class="position-absolute" style="z-index: 9999;">
                                        <div class="s-city-img-content">
                                            <h4 class="text-white fw-bold">{{@$propertyType->type}}</h4>
                                        </div>
                                        <div class="t-city-card-button">
                                            <a href="javascript:;"
                                                class="btn bg-purple t-city-btn propertyTypeBtn" data-id="{{@$propertyType->UUID}}">Explore</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </section>
    <!------- Top cities section end -------->
    <!------- Top Recommended Home section start -------->
@if (!empty($recommended_hotels))
    <section class="recommended-home pt-md-5 pt-3 pb-2">
        <div class="container">
            <div class="recommended-home-inner">
                <div class="recommended-home-head text-center">
                    <h2>Recommended Hotels</h2>
                </div>
                <div class="recommended-home-main py-5">
                    <div class="row">
                        @foreach ($recommended_hotels as $recommended_hotel) 
                            <div class="col-lg-4 col-md-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-image">
                                        <img src="{{asset('storage/' . @$recommended_hotel->mainPhoto->first()->photos)}}" alt="" class="img-fluid">
                                        <a href="javascript:;" class="mb-0 price">{{currency()['sumbol'] }} {{number_format(exchange_rate($recommended_hotel->room->price_room))
                                        }} / Night</a>
                                        <div class="wislist {{ @$recommended_hotel->wishlistData($recommended_hotel->id) ? 'removeWishlist active' : 'addWishlist' }}" data-id='{{ $recommended_hotel->UUID }}'>
                                            <i class="fa-solid fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="card-contents">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <h2 class="card-content-title mb-0">{{$recommended_hotel->property_name}}</h2>
                                            <div class="client-guests d-flex align-items-center">
                                                <div class="client-guests-image">
                                                    <img src="{{asset('assets/images/location-icon.png')}}" alt="" class="img-fluid">
                                                </div>
                                                <span class="mb-0">{{$recommended_hotel->country->country_name}}</span>
                                            </div>
                                        </div>
                                        <div class="client-rooms py-2 d-flex">
                                            <p class="mb-0 rateing">
                                                @for($i = 0; $i < 5; $i++)
                                                    <?php
                                                        $checkstar = number_format($recommended_hotel->reviews_avg_total_rating, '1', '.', '') - $i;                   
                                                    ?>
                                                    @if($checkstar >= 1 )
                                                        <i class="fas fa-star"></i>
                                                    @elseif( $checkstar < 1 && $checkstar > 0)
                                                        <i class="fas fa-star-half-alt"></i>
                                                    @else
                                                        <small class="far fa-star"></small>
                                                    @endif
                                                @endfor
                                            </p>
                                            <span style="padding-top: 4px;">({{(float)number_format($recommended_hotel->reviews_avg_total_rating, '1', '.', '')}})</span>
                                        </div>                         
                                        <div class="client-guests d-flex align-items-center py-2">
                                            <div class="client-guests-image">
                                                <img src="{{asset('assets/images/user-icon.png')}}" alt="" class="img-fluid">
                                            </div>
                                            <p class="mb-0">{{ $recommended_hotel->room ? $recommended_hotel->room->guest_stay_room : '' }} Guests</p>
                                        </div>
                                        <div class="client-guests d-flex align-items-center py-2 w-100 ">
                                            <div class="d-flex align-items-center w-100">
                                                <div class="client-guests-image">
                                                    <img src="{{asset('assets/images/bed-icon.png')}}" alt="" class="img-fluid">
                                                </div>
                                                <p class="mb-0">{{ $recommended_hotel->room->bed ? $recommended_hotel->room->number_of_room : '' }} Bedrooms</p>
                                            </div>
                                            {{-- <div class="d-flex align-items-center w-100">
                                                <div class="client-guests-image">
                                                    <img src="{{asset('assets/images/bath-icon.png')}}" alt="" class="img-fluid">
                                                </div>
                                                <p class="mb-0">2 Bathrooms</p>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center see-all-btn">
                    <a href="javascript:;" class="btn bg-purple text-white recommendedHotels" data-id="recommended_hotels">See All</a>
                </div>
            </div>
        </div>
    </section>
    
@endif
    <!------- Top Recommended Home section start -------->
    
    <!------- Top popular Home section start -------->
    @if (!empty($popular_hotels))
        <section class="popular-home pt-md-5 pt-3 pb-2">
            <div class="container">
                <div class="recommended-home-inner">
                    <div class="recommended-home-head text-center">
                        <h2>Popular Hotels</h2>
                    </div>
                    <div class="recommended-home-main py-5">
                        <div class="row">
                            
                        @foreach ($popular_hotels as $popular_hotel)
                            <div class="col-lg-4 col-md-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-image">
                                        <img src="{{asset('storage/' . @$popular_hotel->mainPhoto->first()->photos)}}" alt="" class="img-fluid">
                                        <a href="javascript:;" class="mb-0 price">{{currency()['sumbol'] }} {{number_format(exchange_rate($popular_hotel->room->price_room))
                                        }} / Night</a>
                                        
                                        <div class="wislist {{ @$popular_hotel->wishlistData($popular_hotel->id) ? 'removeWishlist active' : 'addWishlist' }}" data-id='{{ $popular_hotel->UUID }}'>
                                            <i class="fa-solid fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="card-contents">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <h2 class="card-content-title mb-0">{{$popular_hotel->property_name}}</h2>
                                            <div class="client-guests d-flex align-items-center">
                                                <div class="client-guests-image">
                                                    <img src="{{asset('assets/images/location-icon.png')}}" alt="" class="img-fluid">
                                                </div>
                                                <span class="mb-0">{{$popular_hotel->country->country_name}}</span>
                                            </div>
                                        </div>
                                        <div class="client-rooms py-2 d-flex">
                                            <p class="mb-0 rateing">
                                                @for($i = 0; $i < 5; $i++)
                                                    <?php
                                                        $popular_star = number_format($popular_hotel->reviews_avg_total_rating, '1', '.', '') - $i;                   
                                                    ?>
                                                    @if($popular_star >= 1 )
                                                        <i class="fa-solid fa-star"></i>
                                                    @elseif( $popular_star < 1 && $popular_star > 0)
                                                        <i class="fa-solid fa-star-half-stroke"></i>
                                                    @else
                                                        <small class="fa-regular fa-star"></small>
                                                    @endif
                                                @endfor
                                            </p>
                                            <span style="padding-top: 4px;">({{(float)number_format($popular_hotel->reviews_avg_total_rating, '1', '.', '')}})</span>
                                        </div>                         
                                        <div class="client-guests d-flex align-items-center py-2">
                                            <div class="client-guests-image">
                                                <img src="{{asset('assets/images/user-icon.png')}}" alt="" class="img-fluid">
                                            </div>
                                            <p class="mb-0">{{ $popular_hotel->room ? $popular_hotel->room->guest_stay_room : '' }} Guests</p>
                                        </div>
                                        <div class="client-guests d-flex align-items-center py-2 w-100 ">
                                            <div class="d-flex align-items-center w-100">
                                                <div class="client-guests-image">
                                                    <img src="{{asset('assets/images/bed-icon.png')}}" alt="" class="img-fluid">
                                                </div>
                                                <p class="mb-0">{{ $popular_hotel->room->bed ? $popular_hotel->room->number_of_room : '' }} Bedrooms</p>
                                            </div>
                                            {{-- <div class="d-flex align-items-center w-100">
                                                <div class="client-guests-image">
                                                    <img src="{{asset('assets/images/bath-icon.png')}}" alt="" class="img-fluid">
                                                </div>
                                                <p class="mb-0">2 Bathrooms</p>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex align-items-center justify-content-center see-all-btn">
                        <a href="javascript:;" class="btn bg-purple text-white popularHotels" data-id="popular_hotels">See All</a>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!------- Top popular Home section start -------->
    <!------- Top hotels section start ------->
    <section class="t-hotels-main pt-md-5 pt-3 {{ $partners->count() ? 'pb-2' : 'pb-5' }}">
        <div class="container">
            <div class="t-hotels-inner">
                <div class="t-hotels-head text-center mb-md-5 mb-3">
                    <h2>Partnering with top hotels</h2>
                </div>
                <div class="position-relative">
                    <div class="top-hotels-img text-center">
                        <img src="{{asset('assets/images/t-hotel-bg.webp')}}" class="img-fluid">
                    </div>
                    <div class="top-hotels-wraper">
                        <div class="row">
                            @foreach ($partners as $partner)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="top-hotels-card m-0">
                                        <div class="top-hotels-card-inner bg-white text-center mx-auto">
                                            <img src="{{ asset('storage/' . @$partner->logo) }}" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------- Top hotels section end ------->

    <!-- Modal -->
    <div class="modal fade" id="registerTokenFail" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-white">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="position: absolute;right: 13px;top: 13px;z-index:99"></button>
                <div class="modal-body text-center p-5">
                    <div class="swal2-icon swal2-error swal2-icon-show" style="display: flex;"><span
                            class="swal2-x-mark">
                            <span class="swal2-x-mark-line-left"></span>
                            <span class="swal2-x-mark-line-right"></span>
                        </span>
                    </div>
                    <div class="mt-3 pt-2">
                        <h4>Your Registration Token Time is out!</h4>
                        <p class="text-muted">Please tap the button below to Re-Sign-in in Odda</p>
                        <!-- Toogle to second dialog -->
                        <button class="btn btn-warning" data-bs-target="#register_modal" data-bs-toggle="modal"
                            data-bs-dismiss="modal" style="background-color: #6a78c7;border:#6a78c7;color: #fff;">
                            Sign up
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <!------- Custom JS Link -----  -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    @include('frontend::home.script')
@endpush
