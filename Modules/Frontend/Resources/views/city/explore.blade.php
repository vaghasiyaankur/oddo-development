@extends('layout::user.Frontend.master')

@section('title')
    Explore City
@endsection


@push('css')

@endpush


@section('content')
    <!-------- Pwm-hero section start--------->
    <section class="pwm-hero pt-3">
        <div class="container">
            <div class="pwm-hero-inner position-relative">
                <div class="pwm-hero-img text-center mb-4">
                    <img src="{{ asset('assets/images/pwm-hero-bg.png') }}" class="img-fluid">
                </div>
                <div class="pwm-hero-wraper w-100 text-center">
                    <h2 class="hero-text">{{ @$city->name }}</h2>
                    <div class="hero-logo mb-4 d-flex justify-content-center align-content-center">
                        <span><img src="{{asset('storage/'.@$city->country->icon)}}" class="m-view-img"></span>
                        <span class="ps-2 logo-text">{{ @$city->country->country_name }}</span>
                    </div>
                    <div class="input-group align-items-center pwd-search-input">
                        <input type="text" class="form-control p-0 bg-transparent border-0 para-fs-14"
                            placeholder="Search place">
                        <i class="fa-solid fa-magnifying-glass ps-2 bg-transparent"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-------- Pwm-hero section end--------->
    <!------- pwm info box section start ------>
    <section class="pwm-info-box">
        <div class="container">
            <div class="small-box-main pwm-small-box">
                <div class="row">
                    @foreach($properties as $property)
                    <div class=" col-lg-3 col-md-4 col-sm-6">
                        <div class="small-box-wrapper d-flex jstify-content-between align-items-center  mb-2">
                            <div class="small-box-single-img ">
                                <img src="{{ asset('assets/images/icons/location-popup-'.$loop->iteration.'.png') }}">
                            </div>
                            <div class="small-box-text ps-2 pe-3">
                                <span class="para-fs-14">{{ @$property->type }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!------- pwm info box section end ------>
    <!------- pwm map section start  -------->
    <section class="pwm-map">
        <div class="container">
            <div class="pwm-map-inner position-relative">
                <div class="pwm-heading text-center pt-5 pb-3">
                    <h2>Explore Towns near {{ @$city->name }}, {{ @$city->country->country_name }} <img src="{{asset('storage/'.@$city->country->icon)}}"
                            class="m-view-img mb-2"></h2>
                </div>
                <div class="pwm-gmap overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d463081.43252067344!2d-3.4872597865933366!3d40.31538629590688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xc42e3783261bc8b%3A0xa6ec2c940768a3ec!2sSpain!5e0!3m2!1sen!2sin!4v1651553036245!5m2!1sen!2sin"
                        width="100%" height="320" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="pwm-map-far-box">
                    <div class="far-box-top text-center">
                        <img src="{{ asset('assets/images/icons/far-box-img.png') }}" class="img-fluid">
                        <h5 class="heading-fs-16 mb-0 purple-dark">How far from the city</h5>
                    </div>
                    <div class="pwm-far-box-inner">
                        <div class="far-check-box">
                            <div class="form-check mb-2 ">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1" checked>
                                <label class="form-check-label para-fs-14" for="flexCheckDefault1">
                                    1 hour away
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                                <label class="form-check-label para-fs-14" for="flexCheckDefault2">
                                    2-3 hours away
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                <label class="form-check-label para-fs-14" for="flexCheckDefault3">
                                    3+ hours away
                                </label>
                            </div>
                        </div>
                        <div class="far-box-btn text-center">
                            <a href="#" class="filter-btn bg-primary btn text-white">Filter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------- pwm map section end  -------->
    <!------- pwm accordion section start ---------->
    <section class="pwm-accordion pt-3">
        <div class="container">
            <div class="pwm-accordion-inner">
                <div class="pwm-accordion-title d-md-flex justify-content-between align-items-center mb-2">
                    <div class="pwm-accordion-text d-flex align-items-center">
                        <div class="accordion-text text-primary pe-4 ">
                            <span>{{ @$city->name }}</span>
                        </div>
                        <div class="accordion-icontext"><img src="{{ asset('assets/images/icons/accordion-car1.png') }}"
                                class="ps-1 pe-2">
                            <span class="para-d-l-p fw-bold">25 min Away</span>
                        </div>
                    </div>
                    <div class="pwm-accordion-button mt-md-0 mt-2">
                        <a href="#" class="btn accordion-btn d-l-Purple">Information</a>
                        <a href="#restMadrid" class="btn btn-primary filter-btn me-sm-3" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="collapseExample">Restaurants</a>
                        <span class="accordion-pluse-icon"><img src="{{ asset('assets/images/icons/accordion-pluse.png') }}"
                                class="m-view-img"></span>
                    </div>
                </div>
                <!----- Restaurants Accordion start ------->
                <div class="collapse rest-accordion show" id="restMadrid">
                    <div class="card card-body rest-accordion-body overflow-auto">
                        <div class="rest-accordion-inner">
                            <div class="rest-accordion-heading">
                                <h5 class="heading-fs-16"><span class="d-l-Purple">Restaurants in </span>{{ @$city->name }}, {{ @$city->country->country_name }}
                                </h5>
                            </div>
                            <div class="rest-accordion-list">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-1.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Fábula Taberna</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Meditarrean</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-2.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">El Albero</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Asian</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-3.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">As de Espadas</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Mexican</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-4.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Fábula Taberna</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Meditarrean</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-5.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Fábula Taberna</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Meditarrean</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-6.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Fábula Taberna</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Meditarrean</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-4.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Casa Tabordo</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Meditarrean</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-5.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Ristorante il Tempietto</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Asian</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-6.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Entre Dos Fuegos</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Mexican</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-6.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Fábula Taberna</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Meditarrean</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-6.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Fábula Taberna</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Meditarrean</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!----- Restaurants Accordion end ------->
            </div>
            <div class="pwm-accordion-inner">
                <div class="pwm-accordion-title d-md-flex justify-content-between align-items-center my-2">
                    <div class="pwm-accordion-text d-flex align-items-center">
                        <div class="accordion-text d-l-Purple pe-4">
                            <span>Rascafria</span>
                        </div>
                        <div class="accordion-icontext"><img src="{{ asset('assets/images/icons/accordion-car1.png') }}"
                                class="ps-1 pe-2">
                            <span class="para-d-l-p fw-bold">40 min Away</span>
                        </div>
                    </div>
                    <div class="pwm-accordion-button mt-md-0 mt-2">
                        <a href="#" class="btn accordion-btn d-l-Purple">Information</a>
                        <a href="#restRascafria" class="btn me-sm-3 accordion-btn" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="collapseExample">Restaurants</a>
                        <span class="accordion-pluse-icon"><img src="{{ asset('assets/images/icons/accordion-pluse.png') }}"
                                class="m-view-img"></span>
                    </div>
                </div>
                <!----- Restaurants Accordion start ------->
                <div class="collapse rest-accordion" id="restRascafria">
                    <div class="card card-body rest-accordion-body overflow-auto">
                        <div class="rest-accordion-inner">
                            <div class="rest-accordion-heading">
                                <h5 class="heading-fs-16"><span class="d-l-Purple">Restaurants in </span>Madrid, Spain
                                </h5>
                            </div>
                            <div class="rest-accordion-list">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-1.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Fábula Taberna</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Meditarrean</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-2.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">El Albero</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Asian</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-3.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">As de Espadas</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Mexican</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-4.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Fábula Taberna</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Meditarrean</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-5.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Fábula Taberna</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Meditarrean</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-6.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Fábula Taberna</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Meditarrean</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-4.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Casa Tabordo</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Meditarrean</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-5.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Ristorante il Tempietto</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Asian</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-6.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Entre Dos Fuegos</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Mexican</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-6.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Fábula Taberna</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Meditarrean</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-6.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Fábula Taberna</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Meditarrean</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!----- Restaurants Accordion end ------->
            </div>
            <div class="pwm-accordion-inner">
                <div class="pwm-accordion-title d-md-flex justify-content-between align-items-center my-2">
                    <div class="pwm-accordion-text d-flex align-items-center">
                        <div class="accordion-text d-l-Purple pe-4">
                            <span>El Escorial</span>
                        </div>
                        <div class="accordion-icontext"><img src="{{ asset('assets/images/icons/accordion-car1.png') }}"
                                class="ps-1 pe-2">
                            <span class="para-d-l-p fw-bold">47 min Away</span>
                        </div>
                    </div>
                    <div class="pwm-accordion-button mt-md-0 mt-2">
                        <a href="#" class="btn accordion-btn d-l-Purple">Information</a>
                        <a href="#restElEscorial" class="btn accordion-btn me-sm-3" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="collapseExample">Restaurants</a>
                        <span class="accordion-pluse-icon"><img src="{{ asset('assets/images/icons/accordion-pluse.png') }}"
                                class="m-view-img"></span>
                    </div>
                </div>
                <!----- Restaurants Accordion start ------->
                <div class="collapse rest-accordion" id="restElEscorial">
                    <div class="card card-body rest-accordion-body overflow-auto">
                        <div class="rest-accordion-inner">
                            <div class="rest-accordion-heading">
                                <h5 class="heading-fs-16"><span class="d-l-Purple">Restaurants in </span>Madrid, Spain
                                </h5>
                            </div>
                            <div class="rest-accordion-list">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-1.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Fábula Taberna</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Meditarrean</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-2.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">El Albero</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Asian</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-3.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">As de Espadas</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Mexican</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-4.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Fábula Taberna</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Meditarrean</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-5.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Fábula Taberna</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Meditarrean</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-6.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Fábula Taberna</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Meditarrean</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-4.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Casa Tabordo</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Meditarrean</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-5.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Ristorante il Tempietto</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Asian</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-6.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Entre Dos Fuegos</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Mexican</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-6.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Fábula Taberna</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Meditarrean</p>
                                            </div>
                                        </div>
                                        <div
                                            class="rest-accordionp-data d-flex justify-content-between align-items-center">
                                            <div class="rest-accordion-left d-flex align-items-center flex-wrap">
                                                <img src="{{ asset('assets/images/rest-accord-6.png') }}" class="pe-3">
                                                <p class="para-fs-14 m-0 fw-bold">Fábula Taberna</p>
                                            </div>
                                            <div class="rest-accordion-right">
                                                <p class="m-0">Meditarrean</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!----- Restaurants Accordion end ------->
            </div>
            <div class="pwm-accordion-inner">
                <div class="pwm-accordion-title d-md-flex justify-content-between align-items-center my-2">
                    <div class="pwm-accordion-text d-flex align-items-center">
                        <div class="accordion-text text-primary pe-sm-4 pe-2">
                            <span>Alcalá de Henares</span>
                        </div>
                        <div class="accordion-icontext">
                            <img src="{{ asset('assets/images/icons/accordion-car1.png') }}" class="ps-1 pe-2">
                            <span class="para-d-l-p fw-bold">47 min Away</span>
                        </div>
                    </div>
                    <div class="pwm-accordion-button mt-md-0 mt-2">
                        <a href="#restHenares" class="filter-btn bg-primary btn me-sm-4 text-white"
                            data-bs-toggle="collapse" role="button" aria-expanded="false"
                            aria-controls="collapseExample">Close</a>
                        <a href="#" class="btn accordion-btn  me-sm-3 ">Restaurants</a>
                        <span class="accordion-pluse-icon"><img src="{{ asset('assets/images/icons/accordion-pluse.png') }}"
                                class="m-view-img"></span>
                    </div>
                </div>
                <!----- Restaurants Accordion start ------->
                <div class="collapse rest-accordion" id="restHenares">
                    <div class="card card-body rest-accordion-body rest-accordion-body-close overflow-auto">
                        <div class="rest-accordion-inner ">
                            <div class="rest-accordion-list">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="rest-acccord-close">
                                            <div class="rest-accord-close-img">
                                                <img src="{{ asset('assets/images/accor-inner.png') }}" class="img-fluid w-100">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="rest-accordion-heading">
                                            <h5 class="heading-fs-16 mb-3"><span class="d-l-Purple">Information about
                                                </span>Alcalá de Henares, Spain
                                            </h5>
                                        </div>
                                        <div class="rest-accord-close-text">
                                            <p class="para-fs-14">Informally known as Alcala, this small town is perfect
                                                for a last minute escape from Madrid because it’s easily accessible via
                                                the Cercanias train system. Alcala is a beautiful medieval city that is
                                                famous for being the hometown of the famous writer Miguel de Cervantes
                                                and is also home to a beautiful medieval university! The town might be
                                                small, but it’s no stranger to a good time! Alcala is packed full of
                                                tavern style tapas restaurants and even some pretty rowdy bars – one of
                                                the most popular drinking spots is actually located in an old medieval
                                                brothel. There are many markets and community events to visit as well!
                                                The student population is pretty large so there are many opportunities
                                                to make new friends and experience a nice change from the craziness of
                                                Madrid.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!----- Restaurants Accordion end ------->
            </div>
        </div>
    </section>
    <!------- pwm accordion section end ---------->
@endsection
@push('script')

@endpush
