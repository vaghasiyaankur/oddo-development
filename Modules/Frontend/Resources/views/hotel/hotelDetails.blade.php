@extends('layout::user.Frontend.master')

@section('title', 'Hotel Detail')
@section('meta_description', 'Page Hotel Detail')
@section('meta_keywords', 'Page, Hotel Detail')

@push('css')
    <!------- Slick theme css  ------->
    <link rel="stylesheet" href="https://kenwheeler.github.io/slick/slick/slick-theme.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">


    <style>
        .small-box-single-img {
            background-color: #6A78C7;
            width: 32px;
            height: 32px;
            border-radius: 5px;
            text-align: center;
        }

        #img-icon {
            -webkit-filter: invert(100%) sepia(0%) saturate(0%) hue-rotate(93deg) brightness(103%) contrast(103%);
            filter: invert(100%) sepia(0%) saturate(0%) hue-rotate(93deg) brightness(103%) contrast(103%);
        }


        /*  */
        .mainCategoryImageDiv .img-popup-slider .img-swiper .slider-single img {
            width: 100%;
            object-fit: cover;
        }

        .mainCategoryImageDiv .img-popup-slider .img-swiper .slick-next:before {
            content: "\f105";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
        }

        .mainCategoryImageDiv .img-popup-slider .img-swiper .slick-prev:before {
            content: "\f104";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
        }

        .mainCategoryImageDiv .img-popup-slider .img-swiper {
            width: 100%;
            max-width: 857px;
            margin: 0 auto;
        }

        .reserve-btn:hover {
            color: white;
            background-color: #566ce2;
        }

        .property-name {
            color: black;
            font-weight: 800;
        }




        /* ===== Hotel details swiper start ===== */
        .section-padding {
            width: 100%;
            margin: 30px auto;
            position: relative;
        }

        .section-padding .owl-item .item {
            transform: translate3d(0, 0, 0);
            margin: 50px 0;
            height: 100%;
            width: 100%;
            max-height: 400px;
            min-height: 400px;
        }

        .section-padding .owl-item .item img {
            -webkit-transition: 0.3s;
            -webkit-box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.1);
            box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.1);
            -o-transition: 0.3s;
            transition: 0.3s;
            -webkit-transform: scale(0.8);
            -ms-transform: scale(0.8);
            transform: scale(0.8);
        }

        .section-padding .owl-carousel .owl-nav button.owl-next,
        .section-padding .owl-carousel .owl-nav button.owl-prev {
            background: #FFFFFF;
            box-shadow: 2px 1px 9px rgba(0, 0, 0, 0.09);
            border-radius: 50%;
            width: 100%;
            max-width: 50px;
            position: absolute;
            height: 100%;
            max-height: 50px;
            min-height: 50px;
            top: 40%;
            right: 28%;
        }

        .section-padding .owl-carousel .owl-nav button.owl-next span,
        .section-padding .owl-carousel .owl-nav button.owl-prev span {
            color: #6A78C7;
            font-size: 35px;
            line-height: 35px;
        }

        .section-padding .owl-carousel .owl-nav button.owl-prev {
            left: 28%;
        }

        .section-padding .owl-item.center .item img {
            -webkit-transform: scale(1.15);
            -ms-transform: scale(1.15);
            transform: scale(1.15);
        }

        .section-padding .owl-nav {
            text-align: center;
        }

        .section-padding .owl-carousel .owl-item img {
            display: block;
            width: 100%;
            height: 100%;
            max-height: 400px;
            min-height: 400px;
            object-fit: cover;
        }

        .section-padding .owl-nav button {
            font-size: 24px !important;
            margin: 10px;
            color: #033aff !important;
        }

        .section-padding .owl-item.active .item {
            opacity: 0.7;
        }

        .section-padding .owl-item.active.center .item {
            opacity: 1;
        }

        .section-padding .owl-item.active.center .item img {
            border: 14px solid rgba(231, 234, 255, 0.7);
            border-radius: 14px;
        }

        .section-padding p.counter-text {
            font-weight: 750;
            font-size: 22px;
            line-height: 26px;
            color: #767992;
        }

        /* ===== Hotel details tab swiper start ===== */
        .h-gallery-inner .nav-pills li.nav-item {
            width: 100%;
            flex: 0 0 13%;
            margin: 0 10px;
        }

        .h-gallery-inner .nav-pills::before {
            position: absolute;
            content: "";
            top: 50%;
            width: 100%;
            z-index: -6;
            border: 1px solid rgb(106 120 199 / 10%);
        }

        .h-gallery-inner .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            background: linear-gradient(180deg, #6A78C7 0%, #8F9DE9 100%);
            border-radius: 40px;
            background-color: #e9f0fe;
            box-shadow: 0px 0px 1px 3px #c3d6fd;
            color: #ffffff !important;
            z-index: 1;
        }

        .h-gallery-inner .nav-pills .nav-link,
        .nav-pills .show>.nav-link {
            color: #6A78C7 !important;
            background: rgb(231 234 255 / 80%);
            border-radius: 30px;
        }

        .h-gallery-inner .nav-pills .nav-link {
            padding: 12px 0px;
            font-size: 16px;
            font-weight: 600;
            line-height: 19px;
            color: #878996;
            width: 100%;
        }


        @media screen and (max-width:1024px) {
            .section-padding .owl-item .item {
                width: 100%;
                max-height: 300px;
                min-height: 300px;
            }

            .section-padding .owl-carousel .owl-item img {
                max-height: 300px;
                min-height: 300px;
            }

            .section-padding .owl-carousel .owl-nav button.owl-prev {
                left: 17%;
            }

            .section-padding .owl-carousel .owl-nav button.owl-next,
            .section-padding .owl-carousel .owl-nav button.owl-prev {
                width: 100%;
                max-width: 45px;
                height: 100%;
                max-height: 45px;
                min-height: 45px;
                right: 17%;
                top: 40%;
            }

            .section-padding .owl-carousel .owl-nav button.owl-next span,
            .section-padding .owl-carousel .owl-nav button.owl-prev span {
                color: #6A78C7;
                font-size: 32px;
                line-height: 32px;
            }

            .h-gallery-inner .nav-pills li.nav-item {
                width: 100%;
                flex: 0 0 15%;
                margin: 0 7px;
            }

            .h-gallery-inner .nav-pills .nav-link {
                padding: 12px 0px;
                font-size: 14px;
                font-weight: 600;
                line-height: 19px;
                color: #878996;
                width: 100%;
            }

        }

        @media screen and (max-width:992px) {
            .saved-hotels-details .slick-initialized .slick-slide {
                margin-right: 15px;
            }

            .h-gallery-inner .nav-pills li.nav-item {
                width: 100%;
                flex: 1 0 15%;
                margin: 0 5px;
            }
        }

        @media screen and (max-width:767px) {
            .h-gallery-inner .nav-pills li.nav-item {
                width: 100%;
                flex: 0 0 29%;
                margin: 0 10px 10px;
            }

            .h-gallery-inner .nav-pills::before {
                position: absolute;
                content: "";
                top: 50%;
                width: 100%;
                z-index: -6;
                border: 1px solid transparent;
            }
        }

        @media screen and (max-width:576px) {

            .section-padding .owl-carousel .owl-nav button.owl-next,
            .section-padding .owl-carousel .owl-nav button.owl-prev {
                width: 100%;
                max-width: 40px;
                height: 100%;
                max-height: 40px;
                min-height: 40px;
                right: 5%;
                top: 38%;
            }

            .section-padding .owl-item.active .item {
                opacity: 1;
            }

            .section-padding .owl-carousel .owl-nav button.owl-prev {
                left: 5%;
            }

            .section-padding .owl-carousel .owl-nav button.owl-next span,
            .section-padding .owl-carousel .owl-nav button.owl-prev span {
                color: #6A78C7;
                font-size: 30px;
                line-height: 30px;
            }

            .section-padding .owl-item.active .item img {
                border: 14px solid rgba(231, 234, 255, 0.7);
                border-radius: 14px;
            }

            .section-padding .owl-item .item {
                transform: translate3d(0, 0, 0);
                margin: 0px;
            }

            .section-padding {
                margin: 0px;
            }
            .section-padding p.counter-text {
                font-size: 18px;
                line-height: 24px;
            }
        }

        @media screen and (max-width:480px) {
            .h-gallery-inner .nav-pills {
                justify-content: center !important;
            }

            .h-gallery-inner .nav-pills li.nav-item {
                width: 100%;
                flex: 0 0 100%;
                margin: 0 10px 10px;
            }

        }
    </style>
@endpush

@section('content')
    <!------- h-details-title section start ------->
    <section class="h-details-title pt-3">
        <div class="container">
            <div class="h-details-title-box">
                {{-- <h3 class="align-items-center property-name">{{ @$hotel->property_name }} </h3> --}}
                <div class="h-details-title-box-inner">
                    <div class="h-details-heading d-flex justify-content-sm-between align-items-center flex-wrap">
                        <div class="d-block">
                            <h6 class="d-flex align-items-center mx-1">
                                <span class="city-name">
                                    Holiday In {{ @$hotel->city->name }}
                                </span>
                                <span class="rating-text ms-2 py-1">{{ @$hotel->propertytype->type }}
                                </span>
                            </h6>
                        </div>
                        <div class="h-rating d-md-block d-none">
                            @for ($i = 0; $i < 5; $i++)
                                <span>
                                    <img src="{{ @$hotel->star_rating > $i ? '' . asset('assets/images/icons/start.png') : '' }}">
                                </span>
                            @endfor
                            <span class="rating-text">{{ @$hotel->star_rating }}/5</span>
                        </div>
                    </div>
                    <div class="h-title-box-inner row align-items-center mt-4">
                        <div class="col-md-8 justify-content-md-end justify-content-center">
                            <span class="h-rating-location d-flex align-items-center para-fs-15">
                                <div class="h-rating-location-img mb-1">
                                    <img src="{{ asset('assets/images/location-icon.png') }}" class="img-fluid">
                                </div>
                                <p class="mb-0"> {{ @$hotel->street_addess }}, {{ @$hotel->city->name }}
                                    {{ @$hotel->country_id ? ',' . $hotel->country->country_name : '' }},
                                    {{ @$hotel->pos_code }}.</p>
                            </span>
                        </div>
                        <div class="col-md-4 d-flex justify-content-md-end justify-content-center align-items-center">
                            <div class="h-rating d-block d-md-none w-100 mt-3">
                                @for ($i = 0; $i < 5; $i++)
                                    <span>
                                        <img
                                            src="{{ @$hotel->star_rating > $i ? '' . asset('assets/images/icons/start.png') : '' }}">
                                    </span>
                                @endfor
                                <span class="rating-text">{{ @$hotel->star_rating }}/5</span>
                            </div>
                            <div class="h-rating-btn mt-lg-0 mt-3 w-100 d-flex justify-content-end">
                                <a href="#hotel-room" class="btn reserve-btn para-d-l-p">Reserve a Room</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------- h-details-title section end ------->
    <!------- h-details-gallery section start -------->
    {{-- <input type="hidden" value="{{ @$hotel->id }}" class="hotel_id_{{ $hotel->UUID }}">
    <input type="hidden" value="{{ @$hotel->category->id }}" class="category_id_{{ $hotel->UUID }}"> --}}
        <section class="h-deatils-gallery hotel-result pt-md-5 pt-4">
            <div class="container">
                <div class="h-gallery-inner border--bottom">
                    <ul class="nav nav-pills mb-3 justify-content-md-center justify-content-sm-start position-relative"
                        id="pills-tab" role="tablist">
                        @foreach($photosWithCategories as $index=>$photosWithCategory)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link @if($loop->first) active @endif" id="photo-category-{{ $photosWithCategory->id }}-tab" data-bs-toggle="pill"
                                data-bs-target="#photo-category-{{ $photosWithCategory->id }}" type="button" role="tab" aria-controls="photo-category-{{ $photosWithCategory->id }}"
                                aria-selected="true">{{ $photosWithCategory->name }} ({{ $photosWithCategory->photo->count() }})</button>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="tab-content" id="pills-tabContent">

                @foreach($photosWithCategories as $photosWithCategory)
                <div class="tab-pane fade show @if($loop->first) active @endif" id="photo-category-{{ $photosWithCategory->id }}" role="tabpanel" aria-labelledby="photo-category-{{ $photosWithCategory->id }}-tab"
                    tabindex="0">
                    <div class="section-padding">
                        <div class="product_tab_slider owl-carousel owl-loaded">
                            @foreach($photosWithCategory->photo as $photo)
                            <div class="item">
                                <img src="{{ asset('storage/'. $photo->photos) }}?auto=compress&cs=tinysrgb&w=1600&lazy=load"
                                    alt="" title="" class="img-fluid">
                            </div>
                            @endforeach
                        </div>
                        <p class="counter-text text-center">
                            (<span class="slider-counter">1/{{$photosWithCategory->photo->count()}}</span>)
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        <!------ Hotel details swiper start -------->
        {{-- <section class="h-deatils-gallery hotel-result pt-md-5 pt-3">
            <div class="container">
                <div class="saved-hotels-details p-a-details">
                    <h5 class="heading-fs-16  purple-dark text-center">Hotel Pictures ({{ $hotelPictures->count() }})</h5>
                    <div class="py-5 p-a-swpier">
                        @foreach ($hotelPictures as $hotelPicture)  
                            <div class="">
                                <img src="{{ @$hotelPicture->photos ? asset('storage/' . $hotelPicture->photos) : asset('assets/images/default.png') }}" class="img-fluid" style="width: 425px; height: 415px; object-fit:cover;" alt="" onerror="this.src='{{asset('assets/images/default.png')}}'">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section> --}}

    <!------ Hotel details swiper start -------->
    {{-- <div class="h-deatils-gallery hotel-result pt-md-5 pt-3">
        <div class="saved-hotels-details p-a-details">
            <h5 class="heading-fs-16  purple-dark text-center">Hotel Pictures ({{ $hotelPictures->count() }})</h5>
            <div class="section-padding">
                <div class="screenshot_slider owl-carousel owl-loaded">
                    <div class="item">
                        <img src="https://images.pexels.com/photos/15371312/pexels-photo-15371312.jpeg?auto=compress&cs=tinysrgb&w=1600&lazy=load"
                            alt="" title="" class="img-fluid">
                    </div>
                    <div class="item">
                        <img src="https://images.pexels.com/photos/13393875/pexels-photo-13393875.jpeg?auto=compress&cs=tinysrgb&w=1600&lazy=load"
                            alt="" title="" class="img-fluid">
                    </div>
                    <div class="item">
                        <img src="https://images.pexels.com/photos/15579683/pexels-photo-15579683.jpeg?auto=compress&cs=tinysrgb&w=1600&lazy=load"
                            alt="" title="" class="img-fluid">
                    </div>
                    <div class="item">
                        <img src="https://images.pexels.com/photos/15579683/pexels-photo-15579683.jpeg?auto=compress&cs=tinysrgb&w=1600&lazy=load"
                            alt="" title="" class="img-fluid">
                    </div>
                    <div class="item">
                        <img src="https://images.pexels.com/photos/13393875/pexels-photo-13393875.jpeg?auto=compress&cs=tinysrgb&w=1600&lazy=load"
                            alt="" title="" class="img-fluid">
                    </div>
                    <div class="item">
                        <img src="https://images.pexels.com/photos/15579683/pexels-photo-15579683.jpeg?auto=compress&cs=tinysrgb&w=1600&lazy=load"
                            alt="" title="" class="img-fluid">
                    </div>
                    <div class="item">
                        <img src="https://images.pexels.com/photos/13393875/pexels-photo-13393875.jpeg?auto=compress&cs=tinysrgb&w=1600&lazy=load"
                            alt="" title="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!--------- Hotel details swiper end -------->

    <!------- h-details-gallery section end -------->
    <!-------- h-details-amenities section start --------->
    <section class="h-d-amenities">
        <div class="container">
            <div class="h-d-amenities-inner border--bottom">
                <h5 class="heading-fs-16 text-center purple-dark">Amenities</h5>
                <div class="row amenities-card py-5">
                    @foreach ($hotel->amenity() as $amenity)
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="amenities-single-card">
                                {{-- <img src="{{ asset('storage/'.@$amenity->icon) }}" class="pe-3"> --}}
                                <i class="{{ $amenity->icon }} pe-3"></i>
                                <span class="para-fs-14">{{ @$amenity->amenities }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-------- h-details-amenities section end --------->

    <!-------- h-details-amenities section start --------->
    <section class="h-d-amenities">
        <div class="container">
            <div class="h-d-amenities-inner border--bottom">
                <h5 class="heading-fs-16 text-center purple-dark">Popular Facilities</h5>
                <div class="row amenities-card py-5">
                    @foreach ($hotel->facilities() as $facilities)
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="amenities-single-card">
                                <i class="{{ $facilities->icon }} pe-3"></i>
                                <span class="para-fs-14">{{ @$facilities->facilities_name }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-------- h-details-amenities section end --------->

    <!------- h-details-n-b section start ---------->
    {{-- <section class="h-details-n-b pb-4">
        <div class="container">
            <div class="h-d-near-by-inner border--bottom">
                <div class="near-b-heading">
                    <h5 class="heading-fs-16 purple-dark">What’s near by</h5>
                </div>
                <div class="nearby-place d-flex flex-wrap justify-content-between align-items-center pb-4">
                    <div class="nearby-text ">
                        <p class="para-d-l-p m-0">Pick the places you want to visit.</p>
                    </div>
                    <div class="show-map">
                        <span class="purple">Show Map <img src="{{ asset('assets/images/icons/h-d-showmap.png') }}"
                                class="ps-2"></span>
                    </div>
                </div>
                <div class="h-d-nearby-loaction overflow-auto">
                    <div class="small-box-main d-flex mb-3" >

                        @foreach ($hotel->facilities() as $facility)
                            <div class="small-box-wrapper d-flex jstify-content-between align-items-center me-2">
                                <div class="small-box-single-img" style="background-color: {{@$facility->color}} !important;">
                                    <i id="img-icon" class="{{ @$facility->icon }}"></i>
                                </div>
                                <div class="small-box-text ps-2 pe-3">
                                    <span>{{@$facility->facilities_name}}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="nearby-location-main">
                        <div class="location-popup nearby-loaction">
                            <div class="location-popup-inner">
                                <div class="location-popup-locat position-relative">
                                    <div class="loaction-popup-gmap">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d788790.9018211137!2d-3.794533563867567!3d39.44188449494803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xc42e3783261bc8b%3A0xa6ec2c940768a3ec!2sSpain!5e0!3m2!1sen!2sin!4v1651900367722!5m2!1sen!2sin"
                                            width="100%" height="381" style="border:0;" allowfullscreen=""
                                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                    <div class="location-popup-hilton">
                                        <img src="{{ asset('assets/images/icons/location-popup-L.png') }}">
                                    </div>
                                    <div class="loaction-dist-radius">
                                        <div class="dist-radius-innner">
                                            <div class="dist-radius-content">
                                                <h5 class="mt-4 text-center">Distance Radius</h5>
                                                <div class="dist-radius-total">
                                                    <p class="m-0">1.5</p>
                                                </div>
                                                <div class="dist-radius-mile-text text-center">
                                                    <p>Miles</p>
                                                </div>
                                                <div class="dist-radius-rang pe-3 ps-3">
                                                    <input type="range" class="form-range" id="customRange1">
                                                </div>
                                                <div class="dist-radius-mile d-flex justify-content-between">
                                                    <span>0.5mi</span><span>5mi</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="loaction-popup-content-box nearby-content-box">
                                    <div class="loaction-popup-box-main  position-relative">
                                        <div class="loaction-popup-card d-flex mb-4">
                                            @foreach ($hotel->facilities() as $key => $facility)
                                                <div class="location-popup-card-single nearby-single-card {{ $key == 0 ? 'ms-1': ''}} mt-4">
                                                    <div class="card-single-head d-flex align-items-center" style="background: {{@$facility->color;}}">
                                                        <div class="card-head-img pe-3 lh-1">
                                                            <i id="img-icon" class="mb-1 {{ @$facility->icon }}"> </i></div>
                                                        <div class="card-head-text">{{@$facility->facilities_name}}</div>
                                                    </div>
                                                    <div class="card-content nearby-card-content">
                                                        <p class="mb-2">{{@$facility->description}}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!------- h-details-n-b section end ---------->
     <!------- hotel-policies section start -------->
     <section class="hotel-policies">
        <div class="container">
            <div class="h-policies-main">
                <h5 class="heading-fs-16 purple-dark">Policies</h5>
                <div class="row py-5">
                    <div class="col-lg-5 pe-lg-4 h-policies-main-inner">
                        <div class="row">
                            <div class="col-sm-6 mb-2 mb-md-0">
                                <div class="h-check-in-out border-green">
                                    <div class="timepicker_div ">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/images/icons/cal-icon.png') }}" class="pe-2">
                                            <span class="check-text text--green">check-in-time</span>
                                        </div>
                                        <span class="form-control  text-center">{{ @$hotel->check_in }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="h-check-in-out border-red h-gallery--flex">
                                    <div class="timepicker_div ">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/images/icons/check-close.png') }}" class="pe-2">
                                            <span class="check-text text--red">check-in-out</span>
                                        </div>
                                        <span class="form-control  text-center">{{ @$hotel->check_out }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 ps-lg-4 mt-3 mt-lg-0">
                        {{-- <div class="row align-items-end">
                            <div class="col-sm-4 mt-2 mt-lg-0 mb-2">
                                <div class="policies-extra">
                                    <p class="policies-text m-0"><a href="javascript:;" class=" purple">Extra Bed</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-4 mb-2">
                                <div class="policies-extra">
                                    <p class="policies-text m-0"><a href="javascript:;" class="  purple">Valet
                                            Parking</a></p>
                                </div>
                            </div>
                            <div class="col-sm-4 mb-2">
                                <div class="policies-extra">
                                    <p class="policies-text m-0"><a href="javascript:;" class="  purple">Pet Allowed
                                            <span class="ps-2 purple">$45</span></a></p>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row align-items-end">
                            <div class="col-sm-4 mt-2 mt-lg-0 mb-2">
                                <div class="h-check-in-out border-green">
                                    <div class="timepicker_div ">
                                        <div class="d-flex align-items-center">
                                            <i class="fa-solid fa-bed pe-2"></i>
                                            <span class="check-text">Extra Bed</span>
                                        </div>
                                        @if ($hotel->extra_bed == 'yes')
                                            <div class="d-flex align-items-center">
                                                <span class="form-control text-center">{{ @$hotel->number_extra_bed }}</span>
                                            </div>
                                        @else
                                            <div class="d-flex align-items-center">
                                                <span class="form-control text-center">0</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 mb-2">
                                <div class="h-check-in-out border-red h-gallery--flex">
                                    <div class="timepicker_div ">
                                        <div class="d-flex align-items-center">
                                            <i class="fa-solid fa-square-parking pe-2"></i>
                                            <span class="check-text">Parking</span>
                                        </div>
                                        @if ($hotel->parking_available == 'yes')
                                            <div class="d-flex align-items-center">
                                                <span class="form-control text-center">{{ @$hotel->parking_type. "/" .@$hotel->parking_site }}</span>
                                            </div>
                                        @else
                                        <div class="d-flex align-items-center">
                                            <span class="form-control text-center">No Parking Available</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="policies-link pt-4 pb-3">
                    <a href="#" class="purple">See all Policies details</a>
                </div> --}}
            </div>
        </div>
    </section>

    <!-------- Hotel Room section start -------->
    <section class="hotel-room" id="hotel-room">
        <div class="container">
            <div class="hotel-depiction">
                {{-- <p class="depiction-text">
                    You're eligible for a Genius discount at Hotel Regent Laguna! To save at this property, all you have to do is sign in.
                    Located in Anjuna, a 13-minute walk from Anjuna Beach, Hotel Regent Laguna provides accommodations with an outdoor 
                    swimming pool, free private parking, a garden and a restaurant. With free WiFi, this 4-star hotel offers room service
                    and a 24-hour front desk. The property has a concierge service, a tour desk and currency exchange for guests. 
                    At the hotel every room includes air conditioning, a seating area, a flat-screen TV with satellite channels, a
                    safety deposit box and a private bathroom with a shower, free toiletries and a hairdryer. At Hotel Regent Laguna 
                    all rooms come with bed linen and towels.</p> --}}
                    <p class="depiction-text">{{ $hotel->description }}</p>
            </div>
           
            <div class="hotel-room-inner">
                <div class="hotel-room-heading pb-2 d-flex justify-content-between align-items-center flex-wrap">
                    <h5 class="mb-2">Pick your room for <span class="purple">{{ @$hotel->city->name }},
                            {{ @$hotel->country->country_name }}</span>
                    </h5>
                    <button type="button" class="btn reserve-btn bg-purple para-d-l-p mb-2" data-bs-toggle="modal"
                        data-bs-target="#reviews-popup-main">
                        Review
                    </button>
                </div>
                <div class="room-card-main">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="room-single-card">
                                <div
                                    class="card-heading d-flex justify-content-between align-items-center pb-mb-4 pb-4 flex-wrap">
                                    <div class="single-main-head">
                                        <h5 class="purple-dark mb-0">{{ @$hotel->room->roomtype->room_type }},
                                            {{ @$hotel->room->roomlist->room_name }}</h5>
                                    </div>
                                    {{-- <div class="single-small-title">
                                        <h5 class="heading-fs-16 purple-dark d-flex align-items-center mb-0">
                                            <img src="{{ asset('assets/images/icons/room-m.png') }}" class="pe-2">
                                            <p class="mb-0"> 12
                                                Nights</p>
                                        </h5>
                                    </div> --}}
                                </div>
                                <div class="h-room-info-main pt-md-4 py-lg-4">
                                    <div class="row">
                                        <div class="col-md-4 h-room-overview">
                                            <h5 class="para-fs-14 mb-3">Overview</h5>
                                            <div class="room-overview">
                                                <p
                                                    class="mb-2 {{ @$hotel->room->smoking_policy == 'n-smoking' ? '' : 'd-none' }}">
                                                    {{-- <img src="{{ asset('assets/images/icons/no-smoking.png') }}"> --}}
                                                    <span class="para-fs-14">Smoking restricted</span>
                                                </p>
                                                <p class="mb-2 {{ @$hotel->room->room_size ? '' : 'd-none' }}">
                                                    {{-- <img src="{{ asset('assets/images/icons/h-room2.png') }}"> --}}
                                                    <span class="para-fs-14">{{ @$hotel->room->room_size }}
                                                        {{ @$hotel->room->room_cal_type }}</span>
                                                </p>
                                                <p class="mb-2">
                                                    {{-- <img src="{{ asset('assets/images/icons/bed.png') }}"> --}}
                                                    <span class="para-fs-14">{{ @$hotel->room->bed->no_of_bed }}
                                                        number of bed</span>
                                                </p>
                                                <p class="mb-2">
                                                    {{-- <img src="{{ asset('assets/images/icons/bed.png') }}"> --}}
                                                    <span class="para-fs-14">{{ @$hotel->room->bed->bedType->bed_type }}
                                                        / {{ @$hotel->room->bed->bedType->bed_size }}</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 h-room-overview">
                                            <h5 class="para-fs-14 mb-3">Overview</h5>
                                            <div class="room-overview">
                                                <p class="mb-2 {{ @$hotel->parking_available == 'yes' ? '' : 'd-none' }}">
                                                    {{-- <img src="{{ asset('assets/images/icons/parking-sign.png') }}"> --}}
                                                    <span class="para-fs-14">parking</span>
                                                </p>
                                                <p class="mb-2">
                                                    {{-- <img src="{{ asset('assets/images/icons/english-breakfast.png') }}"> --}}
                                                    <span class="para-fs-14">Breakfast :-
                                                        {{ @$hotel->breakfast }}{{ @$hotel->breakfast == 'optional' ? ', ' . $hotel->foodType->food_type : '' }}
                                                    </span>
                                                </p>
                                                <p class="mb-2">
                                                    {{-- <img src="{{ asset('assets/images/icons/english-breakfast.png') }}"> --}}
                                                    @if (@$hotel->lunch == 'optional')
                                                        <span class="para-fs-14">Lunch :-
                                                            {{ @$hotel->lunch }}{{ @$hotel->lunch == 'optional' ? ', ' . $hotel->foodLunchType->food_type : '' }}
                                                        </span>
                                                    @else
                                                        <span class="para-fs-14">Lunch :-
                                                            {{ @$hotel->lunch }}
                                                        </span>
                                                    @endif
                                                </p>
                                                <p class="mb-2">
                                                    {{-- <img src="{{ asset('assets/images/icons/english-breakfast.png') }}"> --}}
                                                    @if (@$hotel->dinner == 'optional')
                                                        <span class="para-fs-14">Dinner :-
                                                            {{ @$hotel->dinner }}{{ @$hotel->dinner == 'optional' ? ', ' . $hotel->foodDinnerType->food_type : '' }}
                                                        </span>
                                                    @else   
                                                        <span class="para-fs-14">Dinner :-
                                                            {{ @$hotel->dinner }}
                                                        </span>
                                                    @endif
                                                </p>
                                                <p class="mb-2">
                                                    {{-- <img src="{{ asset('assets/images/icons/bed.png') }}"> --}}
                                                    <span class="para-fs-14">Extra bed :- {{ @$hotel->extra_bed }},
                                                        Extra bed provided </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div
                                            class="col-md-4 h-room-overview {{ @$hotel->room->bathroom_item ? '' : 'd-none' }}">
                                            <h5 class="para-fs-14 mb-3">In your private bathroom</h5>
                                            <div class="room-overview">
                                                @foreach ($hotel->room->bathroom() as $item)
                                                    <p class="mb-2">
                                                        <i class="{{ @$item->icon }}"></i>
                                                        <span class="para-fs-14 ps-2">{{ @$item->item }}</span>
                                                    </p>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 border--left">
                            <div class="room-single-card">
                                <div class="single-card-price">
                                    <p class="para-fs-14"><img src="{{ asset('assets/images/icons/right.png') }}"><span
                                            class="text--green ps-3">Free Cancel</span> </p>
                                    <p class="para-fs-14 pt-4 mb-2"><span class="text--red">{{ $numberOfRoomLeft != 0 ? $numberOfRoomLeft .' Room Left' : 'No Room Available' }}</span> </p>
                                    <h5 class="purple-dark">
                                        <span
                                            class="text-decoration-line-through para-fs-14 pe-3 d-l-Purple">$1,425.00</span>
                                        @php
                                            $price = preg_replace('/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i', "$1,", number_format(exchange_rate($hotel->room->price_room)));
                                        @endphp
                                        {{ $price }}
                                    </h5>
                                    {{-- <p class="mb-4 para-fs-14">For 12 Nights, Tax. Included</p> --}}
                                    <a href="#" class="t-city-btn bg-purple mt-3 reserve-btn">Add Room</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="room-card-main mb-3">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="room-single-card p-3">
                            <div class="single-card-img">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#imgPopup"> <img
                                        src="{{ asset('assets/images/room-img-3.png') }}" class="img-fluid w-100 img-wrapper"></a>
                                <!------- img slider popup start -------->
                                <div class="modal fade img-popup-slider" id="imgPopup" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-fullscreen modal-dialog-centered"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header justify-content-end">
                                                <button type="button" data-bs-dismiss="modal" class="modal-close"
                                                    aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                            </div>
                                            <div
                                                class="modal-body d-flex justify-content-center align-items-center">
                                                <div class="img-swiper">
                                                    <div class="slider slider-single mb-5">
                                                        <div class="slider-single-img"><img
                                                                src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                        <div class="slider-single-img"><img
                                                                src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                        <div class="slider-single-img"><img
                                                                src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                        <div class="slider-single-img"><img
                                                                src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                        <div class="slider-single-img"><img
                                                                src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                        <div class="slider-single-img"><img
                                                                src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                        <div class="slider-single-img"><img
                                                                src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                        <div class="slider-single-img"><img
                                                                src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                        <div class="slider-single-img"><img
                                                                src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                        <div class="slider-single-img"><img
                                                                src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                        <div class="slider-single-img"><img
                                                                src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                        <div class="slider-single-img"><img
                                                                src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                        <div class="slider-single-img"><img
                                                                src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                        <div class="slider-single-img"><img
                                                                src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                        <div class="slider-single-img"><img
                                                                src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    </div>
                                                    <div class="slider slider-nav">
                                                        <div class="slider-nav-img"><img
                                                                src="{{ asset('assets/images/nav-img1.png') }}" class="me-2"
                                                                alt=""></div>
                                                        <div class="slider-nav-img"><img
                                                                src="{{ asset('assets/images/nav-img2.png') }}" class="me-2"
                                                                alt=""></div>
                                                        <div class="slider-nav-img"><img
                                                                src="{{ asset('assets/images/nav-img3.png') }}" class="me-2"
                                                                alt=""></div>
                                                        <div class="slider-nav-img"><img
                                                                src="{{ asset('assets/images/nav-img4.png') }}" class="me-2"
                                                                alt=""></div>
                                                        <div class="slider-nav-img"><img
                                                                src="{{ asset('assets/images/nav-img5.png') }}" class="me-2"
                                                                alt=""></div>
                                                        <div class="slider-nav-img"><img
                                                                src="{{ asset('assets/images/nav-img6.png') }}" class="me-2"
                                                                alt=""></div>
                                                        <div class="slider-nav-img"><img
                                                                src="{{ asset('assets/images/nav-img7.png') }}" class="me-2"
                                                                alt=""></div>
                                                        <div class="slider-nav-img"><img
                                                                src="{{ asset('assets/images/nav-img8.png') }}" class="me-2"
                                                                alt=""></div>
                                                        <div class="slider-nav-img"><img
                                                                src="{{ asset('assets/images/nav-img9.png') }}" class="me-2"
                                                                alt=""></div>
                                                        <div class="slider-nav-img"><img
                                                                src="{{ asset('assets/images/nav-img10.png') }}" class="me-2"
                                                                alt=""></div>
                                                        <div class="slider-nav-img"><img
                                                                src="{{ asset('assets/images/nav-img11.png') }}" class="me-2"
                                                                alt=""></div>
                                                        <div class="slider-nav-img"><img
                                                                src="{{ asset('assets/images/nav-img12.png') }}" class="me-2"
                                                                alt=""> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!------- img slider popup end -------->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="room-single-card  p-3">
                            <div class="card-heading d-flex justify-content-between align-items-center">
                                <div class="single-main-head">
                                    <h5 class="purple-dark">Classic Room</h5>
                                </div>
                                <div class="single-small-title">
                                    <h5 class="heading-fs-16 purple-dark">
                                        <img src="assets/images/icons/room-m.png" class="pe-2">12 Nights</p>
                                </div>
                            </div>
                            <div class="h-room-info-main">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="para-fs-14">Overview</h5>
                                        <div class="room-overview">
                                            <p class="mb-2"><img src="{{ asset('assets/images/icons/h-room1.png') }}"><span
                                                    class="para-fs-14 ps-3">1 Double Bed</span> </p>
                                            <p class="mb-2"><img src="{{ asset('assets/images/icons/h-room2.png') }}"><span
                                                    class="para-fs-14 ps-3">$450 per night</span> </p>
                                            <p class="mb-2"><img src="{{ asset('assets/images/icons/h-room3.png') }}"><span
                                                    class="para-fs-14 ps-3">2 Adults</span> </p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="para-fs-14">Amenities</h5>
                                        <div class="room-overview">
                                            <p class="mb-2"><img src="{{ asset('assets/images/icons/search-i-2.png') }}"><span
                                                    class="para-fs-14 ps-3">Breakfast</span> </p>
                                            <p class="mb-2"><img src="{{ asset('assets/images/icons/h-room4.png') }}"><span
                                                    class="para-fs-14 ps-3">Dinner</span> </p>
                                            <p class="mb-2"><img src="{{ asset('assets/images/icons/h-room5.png') }}"><span
                                                    class="para-fs-14 ps-3">Lunch</span> </p>
                                            <p class="mb-2"><img src="{{ asset('assets/images/icons/h-room6.png') }}"><span
                                                    class="para-fs-14 ps-3">Hot Tub</span> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 border--left">
                        <div class="room-single-card pt-lg-4 pb-4 pt-0 px-4">
                            <div class="single-card-price">
                                <p class="para-fs-14"><img src="{{ asset('assets/images/icons/room-ex.png') }}"><span
                                        class="ps-3">No Refundable</span> </p>
                                <p class="para-fs-14 pt-4 mb-2"><span class="text--red">2 Rooms Left</span> </p>
                                <h5 class="purple-dark"><span
                                        class="text-decoration-line-through para-fs-14 pe-3 d-l-Purple">$1,425.00</span>$915.00
                                </h5>
                                <p class="mb-4 para-fs-14 d-l-Purple">For 12 Nights, Tax. Included</p>
                                <a href="#" class="t-city-btn bg-purple mt-3">Add Room</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            </div>
        </div>
    </section>
    <!-------- Hotel Room section end -------->
    <div class="mainReviewPopupDiv">
        @include('frontend::hotel.review')
    </div>
    <!------- img slider popup start -------->
    <div class="mainCategoryImageDiv">
        @include('frontend::hotel.photo')
    </div>
    <!------- img slider popup end -------->
@endsection


@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        var owl = $('.screenshot_slider').owlCarousel({
            items: 1,
            loop: true,
            responsiveClass: true,
            nav: true,
            margin: 0,
            dots: false,
            autoplayTimeout: 4000,
            smartSpeed: 400,
            // navText: ['&#8592;', '&#8594;'],
            responsive: {
                576: {
                    items: 2,
                    center: true,
                },
                1025: {
                    items: 3,
                    center: true,

                }
            }
        });
        var owl = $('.product_tab_slider').owlCarousel({
            items: 1,
            loop: true,
            responsiveClass: true,
            nav: true,
            margin: 0,
            dots: false,
            autoplayTimeout: 4000,
            smartSpeed: 400,
            // navText: ['&#8592;', '&#8594;'],
            responsive: {
                576: {
                    items: 2,
                    center: true,
                },
                1025: {
                    items: 3,
                    center: true,

                }
            }

        });
        $('.product_tab_slider').on('initialized.owl.carousel changed.owl.carousel', function(e) {
            if (!e.namespace) {
                return;
            }
            var carousel = e.relatedTarget;
            $('.slider-counter').text(carousel.relative(carousel.current()) + 1 + '/' + carousel.items().length);
        });
    </script>
    <!-- icon picker js -->
    <script src="https://unpkg.com/codethereal-iconpicker@1.2.1/dist/iconpicker.js"></script>

    <!------ script for time piker -------->
    <script>
        $(document).ready(function() {
            $('.timepicker').mdtimepicker();
        });
    </script>

    <script>
        $(document).on('click', '.photoPopup', function(e) {
            e.preventDefault();

            var id = $(this).data('id');
            var category_id = $(this).data('category');

            formdata = new FormData();
            formdata.append('id', id);
            formdata.append('category_id', category_id);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('hotel.photo') }}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function(response) {
                    $('.mainCategoryImageDiv').html(response);
                    $('#categoryPhotosPopup').modal('show');
                    slickCarousel();
                },
                error: function(response) {

                }
            });
        });

        $(document).on('click', '.modal-close', function() {
            $('.modal-backdrop').hide();
        });
    </script>

    <!-------- image popup slider image js------>
    <script>
        function slickCarousel() {

            $('.slider-single').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                loop: true,
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
                loop: true,
                draggable: false,
                centerMode: true,
                focusOnSelect: true,
                responsive: [{
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
        }

        // $('.modal').on('shown.bs.modal', function(e) {
        //     $('.slider-single').slick('setPosition');
        //     $('.swiper').addClass('open');
        // });

        // $('.modal').on('shown.bs.modal', function(e) {
        //     $('.slider-nav').slick('setPosition');
        //     $('.swiper').addClass('open');
        // });
    </script>

    <script>
        // planner-accordion swiper js
        $('.p-a-swpier').slick({
            nextButton: '.slick-next',
            prevButton: '.slick-prev',
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            speed: 300,
            loop: true,
            autoplay: true,
            autoplaySpeed: 2000,
            accessibility: false,
            dots: false,
            responsive: [{
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
@endpush
