@extends('layout::user.Frontend.master')

@section('title')
    home
@endsection


@push('css')
    <!-------- Swiper Css Cdn --------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.2.3/swiper-bundle.css" />

    <style>
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

        .select2-results__option:before {
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
        }
    </style>
@endpush


@section('content')
    <!------- homepage-swiper section start ------->
    <section class="swiper-container loading homepage-swiper">
        <div class="swiper-wrapper">
            @foreach ($cities as $city)
                <div class="swiper-slide" style="background-image:url({{ asset('storage/' . @$city->background_image) }})">
                    <img src="{{ asset('storage/' . $city->background_image) }}" class="entity-img img-fluid" />
                    <div class="content">
                        <p class="swiper-logo text-center"><img src="{{ asset('storage/' . @$city->country->icon) }}"
                                alt=""></p>
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
                                    {{-- <input class="form-control border-0" id="hotels" type="text" placeholder="Search Place"> --}}
                                    <input type="text" name="search" id="autocomplete" class="form-control border-0"
                                        placeholder="Search Place" value="{{ request()->search }}">
                                    <input type="hidden" id="latitude" name="latitude" class="form-control">
                                    <input type="hidden" name="longitude" id="longitude" class="form-control">
                                    <i class="fa-solid fa-magnifying-glass pe-3"></i>
                                </div>
                                <span class="search-error text-danger"></span>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <form action="javascript: void(0);">
                                    <div
                                        class="custom-calender-piker d-lg-flex justify-content-lg-center position-relative align-items-center">
                                        <div class="check-text-label pt-4 pe-xl-4 pe-lg-3">
                                            <label class="check-inout mt-2">Check-In </label>
                                            <div class="input--text d-flex align-items-center">
                                                <img src="assets/images/icons/cal-1.png" class="px-2">
                                                <input type="text" class="input--control ps-xl-2"
                                                    name="value_from_start_date" placeholder="08/19/2020"
                                                    data-datepicker="separateRange" value="{{ request()->checkIn }}" />
                                            </div>
                                        </div>
                                        <div class="check-text-label pt-4">
                                            <label class="check-inout check-out-label mt-2">Check-Out</label>
                                            <div class="input--text d-flex align-items-center">
                                                <img src="assets/images/icons/cal-2.png" class="px-2">
                                                <input type="text" class="input--control ps-xl-2"
                                                    name="value_from_end_date" placeholder="08/19/2020"
                                                    data-datepicker="separateRange" value="{{ request()->checkOut }}" />
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
                                @php
                                    $selectGuest = explode(',', request()->guest);
                                @endphp
                                <select class="select2-icon " name="guest" multiple="multiple" value="1">
                                    <option value="2" data-icon="fa-user-group"
                                        {{ in_array('2', $selectGuest) ? 'selected' : '' }}>2</option>
                                    <option value="1" data-icon="fa-user"
                                        {{ in_array('1', $selectGuest) ? 'selected' : '' }}>1</option>
                                    <option value="3" data-icon="fa-users"
                                        {{ in_array('3', $selectGuest) ? 'selected' : '' }}>3</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-4 select-option pe-lg-0 mt-2">
                                <label>Room</label>
                                @php
                                    $selectRoom = explode(',', request()->room);
                                @endphp
                                <select class="select2-icon" name="room" multiple="multiple">
                                    <option value="1" {{ in_array('1', $selectRoom) ? 'selected' : '' }}>1 King
                                    </option>
                                    <option value="2" {{ in_array('2', $selectRoom) ? 'selected' : '' }}>2 Queen
                                    </option>
                                    <option value="3" {{ in_array('3', $selectRoom) ? 'selected' : '' }}>3 Twin
                                    </option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-4 select-option pe-lg-0 mt-2">
                                <label>Bed</label>
                                @php
                                    $selectBed = explode(',', request()->bed);
                                @endphp
                                <select class="select2-icon" name="bed" multiple="multiple">
                                    <option value="2" data-icon="fa-bed"
                                        {{ in_array('2', $selectBed) ? 'selected' : '' }}>2</option>
                                    <option value="1" data-icon="fa-bed"
                                        {{ in_array('1', $selectBed) ? 'selected' : '' }}>1</option>
                                    <option value="3" data-icon="fa-bed"
                                        {{ in_array('3', $selectBed) ? 'selected' : '' }}>3</option>
                                </select>
                            </div>
                            <div class="col-lg-2 mt-4 col-md-3 col-sm-6 col-6 text-lg-center">
                                <div class="check-in-out-icon">
                                    <div class="mb-1 check-icons-inner">
                                        <img src="assets/images/icons/check-1.png" class="img-fluid">
                                        <img src="assets/images/icons/check-2.png" class="img-fluid">
                                    </div>
                                    <div class="check-icons-inner">
                                        <img src="assets/images/icons/check-3.png" class="img-fluid">
                                        <img src="assets/images/icons/check-1.png" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 mt-4 col-md-3 col-sm-6 col-6 ps-0 white-space">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                        checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Things to do
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-2 mt-4 col-md-3 col-sm-6 col-6 text-lg-center">
                                <div class="check-in-out-icon">
                                    <div class="mb-1 check-icons-inner">
                                        <img src="assets/images/icons/check-5.png" class="img-fluid">
                                        <img src="assets/images/icons/check-6.png" class="img-fluid">
                                    </div>
                                    <div class="check-icons-inner">
                                        <img src="assets/images/icons/check-7.png" class="img-fluid">
                                        <img src="assets/images/icons/check-8.png" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1 mt-4 col-md-3 col-sm-6 col-6 ps-0 white-space">
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                        checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Transportation
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="check-in-out-btn mt-5 text-center">
                            <a href="javascript:;" class="btn search-btn purple" id="SubmitSearch">Search</a>
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
                <p class="pb-sm-5">Travel planning and booking made easy</p>
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
                        <li class="list-group-item border-0"><img src="assets/images/icons/Vector.png" class="img-fluid">
                        </li>
                    </div>
                    <div class="list-group-main text-center">
                        <li class="list-group-item pagination-list"><a href="#"
                                class="purple text-decoration-none"> 2</a>
                        </li>
                        <span><a href="#" class="pagination-text text-decoration-none">Plan</a> </span>
                    </div>
                    <div class="list-right-arrow">
                        <li class="list-group-item border-0"><img src="assets/images/icons/Vector.png" class="img-fluid">
                        </li>
                    </div>
                    <div class="list-group-main text-center">
                        <li class="list-group-item pagination-list purple"><a href="#"
                                class="purple text-decoration-none">
                                3</a></li>
                        <span><a href="#" class="pagination-text text-decoration-none"> Book</a></span>
                    </div>
                </ul>
            </div>
            <!------- pagination end -------->
            <!------- travel info start ------->
            <div class="travel-info-main pt-sm-5 pt-3">
                <div class="container">
                    <div class="travel-info-inner position-relative">
                        <div class="travel-info-logo-img travel-info-bg bg-white position-relative">
                            <img src="assets/images/icons/t-info-1.png" class="img-fluid">
                        </div>
                        <div class="travel-info-car">
                            <div class="travel-info-car-img travel-info-bg bg-blue position-relative">
                                <img src="assets/images/icons/t-info-2.png" class="img-fluid">
                            </div>
                        </div>
                        <div class="travel-info-bank">
                            <div class="travel-info-bank-img travel-info-bg bg-purple position-relative">
                                <img src="assets/images/icons/t-info-3.png" class="img-fluid">
                            </div>
                        </div>
                        <div class="travel-info-tree">
                            <div class="travel-info-tree-img travel-info-bg bg-green position-relative">
                                <img src="assets/images/icons/t-info-4.png" class="img-fluid">
                            </div>
                        </div>
                        <div class="travel-info-bag">
                            <div class="travel-info-bag-img travel-info-bg bg-yellow position-relative">
                                <img src="assets/images/icons/t-info-5.png" class="img-fluid">
                            </div>
                        </div>
                        <div class="travel-info-rest">
                            <div class="travel-info-rest-img travel-info-bg bg-green-two position-relative">
                                <img src="assets/images/icons/t-info-6.png" class="img-fluid">
                            </div>
                        </div>
                        <div class="rounded-pill bg-danger text-white coming--pill">COMING SOON</div>
                        <div class="travel-info-csoon">
                            <div class="travel-info-csoon-img travel-info-bg d-pink position-relative">
                                <img src="assets/images/icons/t-info-7.png" class="img-fluid">
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
    <section class="s-top-city">
        <div class="container">
            <div class="s-top-city-inner ">
                <div class="s-top-city-head text-center mb-sm-5 mb-3">
                    <h2>Top Cities in Spain <img src="assets/images/icons/Spain.png" class="img-fluid m-view-img mb-2">
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
                                            {{-- {{dd(@$city->slug)}} --}}
                                            <a href="{{ route('city.explore', @$city->slug) }}"
                                                class="btn bg-purple t-city-btn">Explore</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- @foreach ($cities as $city)
                     <div class="slide-item position-relative ">
                        <div class="t-city-card-img"><img src="{{asset('storage/'.@$city->background_image)}}"  style="width: 327px; height: 401px;" class="img-fluid"></div>
                        <div class="position-absolute">
                           <div class="s-city-img-content">
                              <h3 class="text-white">{{ @$city->name}}</h3>
                              <div class="d-flex  justify-content-center align-items-center">
                                 <span><img src="{{asset('storage/'.@$city->country->icon)}}"></span>
                                 <span class="text-white para-fs-14 ps-2">{{ @$city->country->country_name }}</span>
                              </div>
                           </div>
                           <div class="t-city-card-button">
                              <a href="#" class="btn bg-purple t-city-btn">Explore</a>
                           </div>
                        </div>
                     </div>
                     @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------- Top cities section end -------->
    <!------- Top hotels section start ------->
    <section class="t-hotels-main pb-5 pt-md-5 pt-3">
        <div class="container">
            <div class="t-hotels-inner">
                <div class="t-hotels-head text-center mb-md-5 mb-3">
                    <h2>Partnering with top hotels</h2>
                </div>
                <div class="top-hotels-img text-center">
                    <img src="assets/images/t-hotel-bg.png" class="img-fluid">
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
    </section>
    <!------- Top hotels section end ------->
@endsection
@push('script')
    <!-------- Google Place Search -------->
    <script type='text/javascript'
        src='https://maps.googleapis.com/maps/api/js?libraries=places&v=3&language=En&key=AIzaSyBZhREk9TESs69r99eYGKkIQ725IqOP8Zc&ver=5.9.3'>
    </script>

    <!-- // Home page slider start -->
    <script>
        $(document).on('click', '#SubmitSearch', function() {
            console.log('sasa');
            var search = $("input[name=search]").val();
            !search ? $(`.search-error`).html(`Please enter a destination to start searching.`) : $(`.search-error`)
                .html(``);
            var checkIn = $("input[name=value_from_start_date]").val();
            var checkOut = $("input[name=value_from_end_date]").val();
            var guest = $("select[name=guest]").val();
            var room = $("select[name=room]").val();
            var bed = $("select[name=bed]").val();

            if (!search) {
                return;
            }


            window.location.href = base_url + "/search?search=" + search + "&checkIn=" + checkIn + "&checkOut=" +
                checkOut + "&guest=" + guest + "&room=" + room + "&bed=" + bed;

        });

        var sliderSelector = '.swiper-container',
            options = {
                init: false,
                loop: true,
                speed: 800,
                slidesPerView: 5,
                spaceBetween: 10,
                centeredSlides: true,
                effect: 'coverflow',
                coverflowEffect: {
                    rotate: 0,
                    stretch: -100,
                    depth: 200,
                    modifier: 1,
                    slideShadows: true,
                },
                grabCursor: true,
                parallax: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    1023: {
                        slidesPerView: 3,
                        spaceBetween: 0
                    },
                    992: {
                        slidesPerView: 2,
                        spaceBetween: 0
                    },
                    567: {
                        slidesPerView: 1,
                        spaceBetween: 0
                    }
                },
                // Events
                on: {
                    imagesReady: function() {
                        this.el.classList.remove('loading');
                    }
                }
            };
        var mySwiper = new Swiper(sliderSelector, options);

        // Initialize slider
        mySwiper.init();
    </script>
    <!-- // Home page slider end -->

    <!-- // js for top city slider (index.html) -->
    <script>
        $('#slick1').not('.slick-initialized').slick({
            rows: 2,
            dots: false,
            arrows: true,
            infinite: true,
            speed: 2000,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                },
                {
                    breakpoint: 776,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        rows: 1
                    }
                }
            ],
            prevArrow: "<i class='slick-prev pull-left fa-solid fa-angle-left' aria-hidden='true'></i>",
            nextArrow: "<i class=' slick-next pull-right fa-solid fa-angle-right' aria-hidden='true'></i>"
        });


        // Google Place Search 
        google.maps.event.addDomListener(window, 'load', initialize);

        function initialize() {
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                $('#latitude').val(place.geometry['location'].lat());
                $('#longitude').val(place.geometry['location'].lng());

                $("#latitudeArea").removeClass("d-none");
                $("#longtitudeArea").removeClass("d-none");
            });

        }


        $(document).on('click', '#SubmitSearch', function() {
            var search = $("input[name=search]").val();
            !search ? $(`.search-error`).html(`Please enter a destination to start searching.`) : $(`.search-error`)
                .html(``);
            var checkIn = $("input[name=value_from_start_date]").val();
            var checkOut = $("input[name=value_from_end_date]").val();
            var guest = $("select[name=guest]").val();
            var room = $("select[name=room]").val();
            var bed = $("select[name=bed]").val();

            if (!search) {
                return;
            }


            window.location.href = base_url + "/search?search=" + search + "&checkIn=" + checkIn + "&checkOut=" +
                checkOut + "&guest=" + guest + "&room=" + room + "&bed=" + bed;

        });
    </script>
@endpush
