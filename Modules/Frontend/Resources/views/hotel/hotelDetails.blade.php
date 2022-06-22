@extends('layout::user.Frontend.master')

@section('title')
hotel
@endsection

@push('css')
<!------- Slick theme css  ------->
<link rel="stylesheet" href="https://kenwheeler.github.io/slick/slick/slick-theme.css">
@endpush

@section('content')
<!------- h-details-title section start ------->
<section class="h-details-title pt-3">
    <div class="container">
        <div class="h-details-title-box">
            <div class="h-details-heading">
                <h2>Holiday Inn Madrid</h2>
            </div>
            <div class="h-title-box-inner d-flex flex-wrap justify-content-between align-items-center mt-3">
                <div class="h-rating">
                    <span class="rating-text bg-green ">9/10</span>
                    <span><img src="{{asset('assets/images/icons/start.png') }}"></span>
                    <span><img src="{{asset('assets/images/icons/start.png') }}"></span>
                    <span><img src="{{asset('assets/images/icons/start.png') }}"></span>
                    <span><img src="{{asset('assets/images/icons/start.png') }}"></span>
                    <span class="h-rating-location para-fs-14"><img src="{{asset('assets/images/icons/loaction-purple.png') }}"
                            class="me-3 ms-5">Madrid, Spain. 1,36 km to the center</span>
                </div>
                <div class="h-rating-btn mt-md-0 mt-3">
                    <a href="hotelsresult.html" class="btn reserve-btn bg-purple para-d-l-p">Reserve a Room</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!------- h-details-title section end ------->
<!------- h-details-gallery section start -------->
<section class="h-deatils-gallery hotel-result pt-md-5 pt-3">
    <div class="container">
        <div class="h-gallery-inner border--bottom">
            <div class="row">
                <div class="col-6 col-md-4 col-lg-3 mb-2 mb-lg-0 text-start h-gallery--flex">
                    <div class="h-gallery-single">
                        <h5 class="heading-fs-16 mb-lg-3 mb-2 purple-dark">Lobby</h5>
                        <div class="gallery-single-img">
                            <div class="swiper-s-img">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#imgPopup"><img
                                        src="assets/images/h-details-1.png" class="img-fluid img-wrapper"></a>
                            </div>
                            <!------- img slider popup start -------->
                            <div class="modal fade img-popup-slider" id="imgPopup" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-end">
                                            <button type="button" data-bs-dismiss="modal" class="modal-close"
                                                aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center align-items-center">
                                            <div class="img-swiper">
                                                <div class="slider slider-single mb-5">
                                                    <div><img src="{{asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                </div>
                                                <div class="slider slider-nav">
                                                    <img src="{{asset('assets/images/nav-img1.png') }}" class="me-2" alt="">
                                                    <img src="{{asset('assets/images/nav-img2.png') }}" class="me-2" alt="">
                                                    <img src="{{asset('assets/images/nav-img3.png') }}" class="me-2" alt="">
                                                    <img src="{{asset('assets/images/nav-img4.png') }}" class="me-2" alt="">
                                                    <img src="{{asset('assets/images/nav-img5.png') }}" class="me-2" alt="">
                                                    <img src="{{asset('assets/images/nav-img6.png') }}" class="me-2" alt="">
                                                    <img src="{{asset('assets/images/nav-img7.png') }}" class="me-2" alt="">
                                                    <img src="{{asset('assets/images/nav-img8.png') }}" class="me-2" alt="">
                                                    <img src="{{asset('assets/images/nav-img9.png') }}" class="me-2" alt="">
                                                    <img src="{{asset('assets/images/nav-img10.png') }}" class="me-2" alt="">
                                                    <img src="{{asset('assets/images/nav-img11.png') }}" class="me-2" alt="">
                                                    <img src="{{asset('assets/images/nav-img12.png') }}" class="me-2" alt="">
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
                <div class="col-6 col-md-4 col-lg-3 mb-2 mb-lg-0 text-start h-gallery--flex ">
                    <div class="h-gallery-single">
                        <h5 class="heading-fs-16 mb-lg-3 mb-2 purple-dark">Rooms</h5>
                        <div class="gallery-single-img">
                            <div class="swiper-s-img">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#imgPopup"><img
                                        src="{{asset('assets/images/h-details-2.png') }}" class="img-fluid img-wrapper"></a>
                            </div>
                            <!------- img slider popup start -------->
                            <div class="modal fade img-popup-slider" id="imgPopup" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-end">
                                            <button type="button" data-bs-dismiss="modal" class="modal-close"
                                                aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center align-items-center">
                                            <div class="img-swiper">
                                                <div class="slider slider-single mb-5">
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                </div>
                                                <div class="slider slider-nav">
                                                    <img src="{{ asset('assets/images/nav-img1.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img2.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img3.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img4.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img5.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img6.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img7.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img8.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img9.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img10.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img11.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img12.png') }}" class="me-2" alt="">
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
                <div class="col-6 col-md-4 col-lg-3 mb-2 mb-lg-0 text-start h-gallery--flex">
                    <div class="h-gallery-single">
                        <h5 class="heading-fs-16 mb-lg-3 mb-2 purple-dark">Amenities</h5>
                        <div class="gallery-single-img">
                            <div class="swiper-s-img">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#imgPopup"><img
                                        src="{{ asset('assets/images/h-details-3.png') }}" class="img-fluid img-wrapper"></a>
                            </div>
                            <!------- img slider popup start -------->
                            <div class="modal fade img-popup-slider" id="imgPopup" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-end">
                                            <button type="button" data-bs-dismiss="modal" class="modal-close"
                                                aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center align-items-center">
                                            <div class="img-swiper">
                                                <div class="slider slider-single mb-5">
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                </div>
                                                <div class="slider slider-nav">
                                                    <img src="{{ asset('assets/images/nav-img1.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img2.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img3.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img4.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img5.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img6.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img7.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img8.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img9.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img10.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img11.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img12.png') }}" class="me-2" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3 mb-2 mb-lg-0 text-start h-gallery--flex">
                    <div class="h-gallery-single">
                        <h5 class="heading-fs-16 mb-lg-3 mb-2 purple-dark">Restaurant</h5>
                        <div class="gallery-single-img">
                            <div class="swiper-s-img">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#imgPopup"><img
                                        src="{{ asset('assets/images/h-details-4.png') }}" class="img-fluid img-wrapper"></a>
                            </div>
                            <!------- img slider popup start -------->
                            <div class="modal fade img-popup-slider" id="imgPopup" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-end">
                                            <button type="button" data-bs-dismiss="modal" class="modal-close"
                                                aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center align-items-center">
                                            <div class="img-swiper">
                                                <div class="slider slider-single mb-5">
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                    <div><img src="{{ asset('assets/images/img-popup-bg.png') }}" alt=""></div>
                                                </div>
                                                <div class="slider slider-nav">
                                                    <img src="{{ asset('assets/images/nav-img1.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img2.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img3.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img4.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img5.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img6.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img7.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img8.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img9.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img10.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img11.png') }}" class="me-2" alt="">
                                                    <img src="{{ asset('assets/images/nav-img12.png') }}" class="me-2" alt="">
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
<!------- h-details-gallery section end -------->
<!-------- h-details-amenities section start --------->
<section class="h-d-amenities pt-4 pb-4">
    <div class="container">
        <div class="h-d-amenities-inner border--bottom">
            <h5 class="heading-fs-16  purple-dark">Amenities</h5>
            <div class="amenities-card d-flex flex-wrap">
                <div class="amenities-single-card me-2 mb-3">
                    <img src="{{ asset('assets/images/icons/h-d-a-1.png') }} " class="pe-3">
                    <span class="para-fs-14">Air Conditioning</span>
                </div>
                <div class="amenities-single-card me-2 mb-3">
                    <img src="{{ asset('assets/images/icons/h-d-a-2.png') }} " class="pe-3">
                    <span class="para-fs-14">Pool</span>
                </div>
                <div class="amenities-single-card me-2 mb-3">
                    <img src="{{ asset('assets/images/icons/h-d--a3.png') }} " class="pe-3">
                    <span class="para-fs-14">Gym</span>
                </div>
                <div class="amenities-single-card me-2 mb-3">
                    <img src="{{ asset('assets/images/icons/h-d--a3.png') }} " class="pe-3">
                    <span class="para-fs-14">Pet Friendly</span>
                </div>
                <div class="amenities-single-card me-2 mb-3">
                    <img src="{{ asset('assets/images/icons/h-d-a-1.png') }}" class="pe-3">
                    <span class="para-fs-14">Air Conditioning</span>
                </div>
                <div class="amenities-single-card me-2 mb-3">
                    <img src="{{ asset('assets/images/icons/h-d-a-4.png') }}" class="pe-3">
                    <span class="para-fs-14">Washer</span>
                </div>
                <div class="amenities-single-card me-2 mb-3">
                    <img src="{{ asset('assets/images/icons/h-d-a-5.png') }}" class="pe-3">
                    <span class="para-fs-14">Spa</span>
                </div>
                <div class="amenities-single-card me-2 mb-3">
                    <img src="{{ asset('assets/images/icons/h-d-a-6.png') }}" class="pe-3">
                    <span class="para-fs-14">Free Wi-Fi</span>
                </div>
                <div class="amenities-single-card me-2 mb-3">
                    <img src="{{ asset('assets/images/icons/h-d-a-2.png') }} " class="pe-3">
                    <span class="para-fs-14">Pool</span>
                </div>
                <div class="amenities-single-card me-2 mb-3">
                    <img src="{{ asset('assets/images/icons/h-d--a3.png') }} " class="pe-3">
                    <span class="para-fs-14">Gym</span>
                </div>
                <div class="amenities-single-card me-2 mb-3">
                    <img src="{{ asset('assets/images/icons/h-d-a-5.png') }}" class="pe-3">
                    <span class="para-fs-14">Spa</span>
                </div>
            </div>
            <div class="amenities-link ">
                <a href="#" class="amenities-d-link purple">See all Amenities details</a>
            </div>
        </div>
    </div>
</section>
<!-------- h-details-amenities section end --------->
<!------- h-details-n-b section start ---------->
<section class="h-details-n-b pb-4">
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
                <div class="small-box-main d-flex mb-3">
                    <div class="small-box-wrapper d-flex jstify-content-between align-items-center me-2">
                        <div class="small-box-single-img ">
                            <img src="{{ asset('assets/images/icons/location-popup-1.png') }}">
                        </div>
                        <div class="small-box-text ps-2 pe-3">
                            <span>Museums</span>
                        </div>
                    </div>
                    <div class="small-box-wrapper d-flex jstify-content-between align-items-center me-2">
                        <div class="small-box-single-img">
                            <img src="{{ asset('assets/images/icons/location-popup-2.png') }}">
                        </div>
                        <div class="small-box-text ps-2 pe-3">
                            <span>Plazas</span>
                        </div>
                    </div>
                    <div class="small-box-wrapper d-flex jstify-content-between align-items-center me-2">
                        <div class="small-box-single-img">
                            <img src="{{ asset('assets/images/icons/location-popup-3.png') }}">
                        </div>
                        <div class="small-box-text ps-2 pe-3">
                            <span> Parks </span>
                        </div>
                    </div>
                    <div class="small-box-wrapper d-flex jstify-content-between align-items-center me-2">
                        <div class="small-box-single-img">
                            <img src="{{ asset('assets/images/icons/location-popup-4.png') }}">
                        </div>
                        <div class="small-box-text ps-2 pe-3">
                            <span> Markets </span>
                        </div>
                    </div>
                    <div class="small-box-wrapper d-flex jstify-content-between align-items-center me-2">
                        <div class="small-box-single-img">
                            <img src="{{ asset('assets/images/icons/locaion-5.png') }}"/>
                        </div>
                        <div class="small-box-text ps-2 pe-3">
                            <span> Cathedrals </span>
                        </div>
                    </div>
                    <div class="small-box-wrapper d-flex jstify-content-between align-items-center me-2">
                        <div class="small-box-single-img">
                            <img src="{{ asset('assets/images/icons/location-popup-6.png') }}">
                        </div>
                        <div class="small-box-text ps-2 pe-3">
                            <span> Restaurants </span>
                        </div>
                    </div>
                    <div class="small-box-wrapper d-flex jstify-content-between align-items-center me-2">
                        <div class="small-box-single-img">
                            <img src="{{ asset('assets/images/icons/location-popup-7.png') }}">
                        </div>
                        <div class="small-box-text ps-2 pe-3">
                            <span> Transportation </span>
                        </div>
                    </div>
                    <div class="small-box-wrapper d-flex jstify-content-between align-items-center me-2">
                        <div class="small-box-single-img">
                            <img src="{{ asset('assets/images/icons/location-popup-7.png') }}">
                        </div>
                        <div class="small-box-text ps-2 pe-3">
                            <span> Transportation </span>
                        </div>
                    </div>
                    <div class="small-box-wrapper d-flex jstify-content-between align-items-center me-2">
                        <div class="small-box-single-img">
                            <img src="{{ asset('assets/images/icons/location-popup-4.png') }}">
                        </div>
                        <div class="small-box-text ps-2 pe-3">
                            <span> Markets </span>
                        </div>
                    </div>
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
                                        <div class="location-popup-card-single nearby-single-card ms-3 mt-4">
                                            <div class="card-single-head d-flex align-items-center bg-purple">
                                                <div class="card-head-img pe-3"><img
                                                        src="{{ asset('assets/images/icons/locationpopup-card1.png') }}"></div>
                                                <div class="card-head-text">Museums</div>
                                            </div>
                                            <div class="card-content nearby-card-content">
                                                <p class="mb-2">Museo del Prado </p>
                                                <p class="mb-2">Thyssen-Bornemisza Museum</p>
                                                <p class="mb-2">Museo Nacional Centro de Arte </p>
                                                <p class="mb-2">Atocha Headquarters (Sabatini and Nouvel buildings)
                                                </p>
                                                <p class="mb-2">Palacio de Velázquez (Retiro Park) </p>
                                                <p class="mb-2">Palacio de Cristal (Retiro Park) </p>
                                            </div>
                                        </div>
                                        <div class="location-popup-card-single nearby-single-card mt-4">
                                            <div class="card-single-head d-flex align-items-center bg-green">
                                                <div class="card-head-img pe-3"><img
                                                        src="{{ asset('assets/images/icons/locationpopup-card2.png') }}"></div>
                                                <div class="card-head-text">Parks</div>
                                            </div>
                                            <div class="card-content nearby-card-content">
                                                <p class="mb-2">Museum of Entomology (UCM) </p>
                                                <p class="mb-2">Hispanic Pharmacy Museum (UCM)</p>
                                                <p class="mb-2">Museum of Geology (UCM)</p>
                                                <p class="mb-2">Museum of Dentistry "Luis de Macorra" UCM</p>
                                            </div>
                                        </div>
                                        <div class="location-popup-card-single mt-4 nearby-single-card">
                                            <div class="card-single-head d-flex align-items-center bg-green-two">
                                                <div class="card-head-img pe-3"><img
                                                        src="{{ asset('assets/images/icons/locationpopup-card3.png') }}"></div>
                                                <div class="card-head-text">Markets</div>
                                            </div>
                                            <div class="card-content nearby-card-content">
                                                <p class="mb-2">Museum of Entomology (UCM) </p>
                                                <p class="mb-2">Hispanic Pharmacy Museum (UCM)</p>
                                                <p class="mb-2">Museum of Geology (UCM)</p>
                                                <p class="mb-2">Museum of Dentistry "Luis de Macorra" UCM</p>
                                            </div>
                                        </div>
                                        <div class="location-popup-card-single mt-4 nearby-single-card">
                                            <div class="card-single-head d-flex align-items-center bg-purple-2">
                                                <div class="card-head-img pe-3"><img
                                                        src="{{ asset('assets/images/icons/locationpopup-card4.png') }}"></div>
                                                <div class="card-head-text">Beaches</div>
                                            </div>
                                            <div class="card-content nearby-card-content">
                                                <p class="mb-2">Museum of Entomology (UCM) </p>
                                                <p class="mb-2">Hispanic Pharmacy Museum (UCM)</p>
                                                <p class="mb-2">Museum of Geology (UCM)</p>
                                                <p class="mb-2">Museum of Dentistry "Luis de Macorra" UCM</p>
                                            </div>
                                        </div>
                                        <div class="location-popup-card-single mt-4 nearby-single-card">
                                            <div class="card-single-head d-flex align-items-center bg-purple-2">
                                                <div class="card-head-img pe-3"><img
                                                        src="{{ asset('assets/images/icons/locationpopup-card4.png') }}"></div>
                                                <div class="card-head-text">Beaches</div>
                                            </div>
                                            <div class="card-content nearby-card-content">
                                                <p class="mb-2">Museum of Entomology (UCM) </p>
                                                <p class="mb-2">Hispanic Pharmacy Museum (UCM)</p>
                                                <p class="mb-2">Museum of Geology (UCM)</p>
                                                <p class="mb-2">Museum of Dentistry "Luis de Macorra" UCM</p>
                                            </div>
                                        </div>
                                        <div class="location-popup-card-single nearby-single-card mt-4">
                                            <div class="card-single-head d-flex align-items-center bg-green">
                                                <div class="card-head-img pe-3"><img
                                                        src="{{ asset('assets/images/icons/locationpopup-card2.png') }}"></div>
                                                <div class="card-head-text">Parks</div>
                                            </div>
                                            <div class="card-content nearby-card-content">
                                                <p class="mb-2">Museum of Entomology (UCM) </p>
                                                <p class="mb-2">Hispanic Pharmacy Museum (UCM)</p>
                                                <p class="mb-2">Museum of Geology (UCM)</p>
                                                <p class="mb-2">Museum of Dentistry "Luis de Macorra" UCM</p>
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
<!------- h-details-n-b section end ---------->
<!------- hotel-policies section start -------->
<section class="hotel-policies ">
    <div class="container">
        <div class="h-policies-main">
            <h5 class="heading-fs-16 purple-dark">Policies</h5>
            <div class="row align-items-end">
                <div class="col-xl-4 col-lg-5">
                    <div class="row">
                        <div class="col-6 mb-2 mb-md-0">
                            <div class="h-check-in-out border-green">
                                <div class="timepicker_div ">
                                    <img src="{{ asset('assets/images/icons/cal-icon.png') }}" class="pe-2">
                                    <span class="check-text text--green">check-in-time</span>
                                    <input type="text" class="form-control timepicker text-center"
                                        placeholder=" Time">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="h-check-in-out border-red h-gallery--flex">
                                <div class="timepicker_div ">
                                    <img src="{{ asset('assets/images/icons/check-close.png') }}" class="pe-2">
                                    <span class="check-text text--red">check-in-out</span>
                                    <input type="text" class="form-control timepicker text-center"
                                        placeholder=" Time">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-xl-6">
                    <div class="row align-items-end">
                        <div class="col-sm-4 mt-2 mt-lg-0 mb-2 mb-sm-0">
                            <div class="policies-extra">
                                <h5 class="para-fs-14">Extras</h5>
                                <p class="policies-text m-0"><a href="javascript:;" class=" purple">Extra Bed</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-2 mb-sm-0">
                            <div class="policies-extra">
                                <p class="policies-text m-0"><a href="javascript:;" class="  purple">Valet
                                        Parking</a></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="policies-extra">
                                <p class="policies-text m-0"><a href="javascript:;" class="  purple">Pet Allowed
                                        <span class="ps-2 purple">$45</span></a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- <div class="h-policies-inner d-flex flex-wrap">
                <div class="h-checkInOut-main d-flex flex-wrap">
                    <div class="h-check-in-out border-green me-xl-3 me-2 mb-4 mb-lg-0">
                        <div class="timepicker_div ">
                            <img src="assets/images/icons/cal-icon.png" class="pe-2">
                            <span class="check-text text--green">check-in-time</span>
                            <input type="text" class="form-control timepicker text-center" placeholder=" Time">
                        </div>
                    </div>
                    <div class="h-check-in-out border-red me-xl-5 me-3 mb-4 mb-lg-0">
                        <div class="timepicker_div ">
                            <img src="assets/images/icons/check-close.png" class="pe-2">
                            <span class="check-text text--red">check-in-out</span>
                            <input type="text" class="form-control timepicker text-center" placeholder=" Time">
                        </div>
                    </div>
                </div>
                <div class="h-policies-extra d-flex align-items-end flex-wrap">
                    <div class="policies-extra ms-xl-5 ms-lg-3 ms-0 me-2 ">
                        <h5 class="para-fs-14 pb-2">Extras</h5>
                        <p class="policies-text m-0"><a href="javascript:;" class=" purple">Extra Bed</a></p>
                    </div>
                    <div class="policies-extra me-2 mt-2 mt-sm-0">
                        <p class="policies-text m-0"><a href="javascript:;" class="  purple">Valet Parking</a></p>
                    </div>
                    <div class="policies-extra me-2 mt-md-0 mt-2">
                        <p class="policies-text m-0"><a href="javascript:;" class="  purple">Pet Allowed <span
                                    class="ps-2 purple">$45</span></a></p>
                    </div>
                </div>
            </div> -->
            <div class="policies-link pt-4 pb-3">
                <a href="#" class="purple">See all Policies details</a>
            </div>
        </div>
    </div>
</section>
<!------- hotel-policies section end -------->
<!-------- Hotel Room section start -------->
<section class="hotel-room">
    <div class="container">
        <div class="hotel-room-inner">
            <div class="hotel-room-heading pb-4">
                <h5>Pick your room for <span class="purple">Orlando, Florida</span></h5>
            </div>
            @foreach ($hotels as $hotel)
                <div class="room-card-main mb-3">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="room-single-card p-3">
                                <div class="single-card-img">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#imgPopup"> <img
                                            src="{{ asset('assets/images/room-img1.png') }}" class="img-fluid w-100 img-wrapper"></a>
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
                                                            <div class="silder-nav-img"><img
                                                                    src="{{ asset('assets/images/nav-img1.png') }}" class="me-2"
                                                                    alt=""></div>
                                                            <div class="silder-nav-img"><img
                                                                    src="{{ asset('assets/images/nav-img2.png') }}" class="me-2"
                                                                    alt=""></div>
                                                            <div class="silder-nav-img"><img
                                                                    src="{{ asset('assets/images/nav-img3.png') }}" class="me-2"
                                                                    alt=""></div>
                                                            <div class="silder-nav-img"><img
                                                                    src="{{ asset('assets/images/nav-img4.png') }}" class="me-2"
                                                                    alt=""></div>
                                                            <div class="silder-nav-img"><img
                                                                    src="{{ asset('assets/images/nav-img5.png') }}" class="me-2"
                                                                    alt=""></div>
                                                            <div class="silder-nav-img"><img
                                                                    src="{{ asset('assets/images/nav-img6.png') }}" class="me-2"
                                                                    alt=""></div>
                                                            <div class="silder-nav-img"><img
                                                                    src="{{ asset('assets/images/nav-img7.png') }}" class="me-2"
                                                                    alt=""></div>
                                                            <div class="silder-nav-img"><img
                                                                    src="{{ asset('assets/images/nav-img8.png') }}" class="me-2"
                                                                    alt=""></div>
                                                            <div class="silder-nav-img"><img
                                                                    src="{{ asset('assets/images/nav-img9.png') }}" class="me-2"
                                                                    alt=""></div>
                                                            <div class="silder-nav-img"><img
                                                                    src="{{ asset('assets/images/nav-img10.png') }}" class="me-2"
                                                                    alt=""></div>
                                                            <div class="silder-nav-img"><img
                                                                    src="{{ asset('assets/images/nav-img11.png') }}" class="me-2"
                                                                    alt=""></div>
                                                            <div class="silder-nav-img"><img
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
                                        <h5 class="purple-dark">{{@$hotel->property_name}}</h5>
                                    </div>
                                    <div class="single-small-title">
                                        <h5 class="heading-fs-16 purple-dark">
                                            <img src="{{ asset('assets/images/icons/room-m.png') }}" class="pe-2">12 Nights</p>
                                    </div>
                                </div>
                                <div class="h-room-info-main">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="para-fs-14">Overview</h5>
                                            <div class="room-overview">
                                                <p class="mb-2"><img src="{{ asset('assets/images/icons/h-room1.png') }}"><span
                                                        class="para-fs-14 ps-3">{{@$hotel->room->number_of_room}} {{@$hotel->room->Roomlist->room_name}}</span> </p>
                                                <p class="mb-2"><img src="{{ asset('assets/images/icons/h-room2.png') }}"><span
                                                        class="para-fs-14 ps-3">$450 per night</span> </p>
                                                <p class="mb-2"><img src="{{ asset('assets/images/icons/h-room3.png') }}"><span
                                                        class="para-fs-14 ps-3">2 Adults</span> </p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="para-fs-14">Amenities</h5>
                                            <div class="room-overview">
                                                <p class="mb-2"><img src="{{ asset('assets/images/icons/search-i-2') }}.png"><span
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
                                    <p class="para-fs-14"><img src="{{ asset('assets/images/icons/right.png') }}"><span
                                            class="text--green ps-3">Free Cancel</span> </p>
                                    <p class="para-fs-14 pt-4 mb-2"><span class="text--red">2 Rooms Left</span> </p>
                                    <h5 class="purple-dark"><span
                                            class="text-decoration-line-through para-fs-14 pe-3 d-l-Purple">$1,425.00</span>$2,134.00
                                    </h5>
                                    <p class="mb-4 para-fs-14 d-l-Purple">For 12 Nights, Tax. Included</p>
                                    <a href="#" class="t-city-btn bg-purple mt-3">Add Room</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <div class="room-card-main mb-3">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="room-single-card p-3">
                            <div class="single-card-img">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#imgPopup"> <img
                                        src="{{ asset('assets/images/room-img2.png') }}" class="img-fluid w-100  img-wrapper"></a>
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
                                    <h5 class="purple-dark">Student Room</h5>
                                </div>
                                <div class="single-small-title">
                                    <h5 class="heading-fs-16 purple-dark">
                                        <img src="{{ asset('assets/images/icons/room-m.png') }}" class="pe-2">12 Nights</p>
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
                                            <p class="mb-2"><img src="{{ asset('assets/images/icons/search-i-2.p') }}ng"><span
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
                                        class="text-decoration-line-through para-fs-14 pe-3 d-l-Purple">$1,425.00</span>$1,037.00
                                </h5>
                                <p class="mb-4 para-fs-14 d-l-Purple">For 12 Nights, Tax. Included</p>
                                <a href="#" class="t-city-btn bg-purple mt-3">Add Room</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="room-card-main mb-3">
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
@endsection

@push('script')
<!------ script for time piker -------->
<script>
    $(document).ready(function () {
        $('.timepicker').mdtimepicker();
    });
</script>
<!-------- image popup slider image js------>
<script>
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
    })
    $('.modal').on('shown.bs.modal', function (e) {
        $('.slider-nav').slick('setPosition');
        $('.swiper').addClass('open');
    })
</script>
@endpush