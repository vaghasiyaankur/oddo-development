@extends('layout::user.Frontend.master')

@section('title', 'SavedDestinations We love
Destinations We loveDestinations We love
Destinations We love')
@section('meta_description', 'Page Saved')
@section('meta_keywords', 'Page, Saved')

@push('css')
<style>
    .hotel-wrapper .hotel-box img {
    object-fit: cover;
    max-height: 139px;
    border-radius: 9px 9px 0px 0px;
}
</style>
@endpush


@section('content')

      <!-- SAVEED SECTION START -->

      <section class="saved-section">
        <div class="container">
            <div class="s_img_with mt-5 mb-5">
                <div class="s_img_with_text">
                    <h5 class="mb-0">Saved for Later</h5>
                </div>
            </div>
            <div class="saved-hotels-details">
                <h5 class="box-title-text mb-4 text-center">My next trip <span class="hotelTotalShow"></span></h5>
                <div class="hotel-wrapper mb-4">
                    <div class="row wishlistDiv">
                        @include('frontend::saved.wishlist')
                    </div>
                </div>
            </div>
            <div class="selected-place-details">
                <h5 class="box-title-text mb-0 text-center">Places (32)</h5>
                <div class="selected-place-details-inner">
                    <div class="d-flex align-items-center justify-content-between place-icon-view mb-3 flex-wrap">
                        <div class="place-name d-flex align-items-center mb-2">
                            <a class="place-name-icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </a>
                            <a>
                                <img src="assets/images/icons/save-Spain.png" alt=""
                                    class="me-2 mb-1 img-fluid">
                            </a>
                            <span class="purple-dark">Madrid, Spain (6)</span>
                        </div>
                        <div class="place-icon-right d-flex align-items-center justify-content-end mb-2">
                            <a class="place-right-text">
                                View
                            </a>
                            <a class="place-right-icon">
                                <i class="fa-sharp fa-solid fa-table-cells-large"></i>
                            </a>
                            <a class="place-right-location">
                                <i class="fa-solid fa-location-dot"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-lg-4 mb-4">
                            <div class="card place-box h-100">
                                <div class="box-img">
                                    <img src="assets/images/place-card1.png" alt="" class="img-fluid w-100">
                                    {{-- <img src="assets/images/icons/p-card-s1.png" class="position-absolute p-lb" alt=""> --}}
                                </div>
                                <div class="box-content">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h5 class="p-contnt-title">Nature Museum</h5>
                                        <img src="assets/images/icons/p-card-s1.png" class="img-fluid" alt="">
                                    </div>
                                    
                                    <span class="d-l-Purple"><img src="assets/images/icons/search-h-loaction.png"
                                            alt="" class="mb-2 me-2 ">
                                        Madrid</span>
                                </div>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center">
                                    <a class="e_btn">Explore</a>
                                    <div class="exploer-icons d-flex">
                                        <div class="exploer-icons-inner plus-icon">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                        <div class="exploer-icons-inner delete-icon">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-4">
                            <div class="card place-box h-100 ">
                                <div class="box-img">
                                    <img src="assets/images/similer-card-2.png" class="img-fluid w-100" alt="">
                                    {{-- <img src="assets/images/icons/p-card-s2.png" class="position-absolute p-lb" alt=""> --}}
                                </div>
                                <div class="box-content">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h5 class="p-contnt-title">Super Plaza</h5>
                                        <img src="assets/images/icons/p-card-s2.png" class="img-fluid" alt="">
                                    </div>
                                    <span class="d-l-Purple"><img src="assets/images/icons/search-h-loaction.png"
                                            alt="" class="mb-2 me-2">
                                        Madrid</span>
                                
                                </div>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center">
                                    <a class="e_btn">Explore</a>
                                    <div class="exploer-icons d-flex">
                                        <div class="exploer-icons-inner plus-icon">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                        <div class="exploer-icons-inner delete-icon">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-4">
                            <div class="card place-box h-100 ">
                                <div class="box-img">
                                    <img src="assets/images/similer-card-1.png" class="img-fluid w-100" alt="">
                                    {{-- <img src="assets/images/icons/p-card-s2.png" class="position-absolute p-lb" alt=""> --}}
                                </div>
                                <div class="box-content">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h5 class="p-contnt-title">Mega Market</h5>
                                        <img src="assets/images/icons/p-card-s2.png" class="img-fluid" alt="">
                                    </div>
                                    <span class="d-l-Purple"><img src="assets/images/icons/search-h-loaction.png"
                                            alt="" class="mb-2 me-2">
                                        Madrid</span>
                                </div>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center">
                                    <a class="e_btn">Explore</a>
                                    <div class="exploer-icons d-flex">
                                        <div class="exploer-icons-inner plus-icon">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                        <div class="exploer-icons-inner delete-icon">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-4">
                            <div class="card place-box h-100 ">
                                <div class="box-img">
                                    <img src="assets/images/place-card4.png" class="img-fluid w-100" alt="">
                                    {{-- <img src="assets/images/icons/p-card-s3.png" class="position-absolute p-lb" alt=""> --}}
                                </div>
                                <div class="box-content">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h5 class="p-contnt-title">Modern Art Museum</h5>
                                        <img src="assets/images/icons/p-card-s3.png" class="img-fluid" alt="">
                                    </div>
                                    <span class="d-l-Purple"><img src="assets/images/icons/search-h-loaction.png"
                                            alt="" class="mb-2 me-2">
                                        Madrid</span>
                                </div>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center">
                                    <a class="e_btn">Explore</a>
                                    <div class="exploer-icons d-flex">
                                        <div class="exploer-icons-inner plus-icon">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                        <div class="exploer-icons-inner delete-icon">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-4">
                            <div class="card place-box h-100">
                                <div class="box-img">
                                    <img src="assets/images/place-card1.png" class="img-fluid w-100" alt="">
                                    {{-- <img src="assets/images/icons/p-card-s1.png" class="position-absolute p-lb" alt=""> --}}
                                </div>
                                <div class="box-content">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h5 class="p-contnt-title">Quijote Museum</h5>
                                        <img src="assets/images/icons/p-card-s1.png" class="img-fluid" alt="">
                                    </div>
                                    <span class="d-l-Purple"><img src="assets/images/icons/search-h-loaction.png"
                                            alt="" class="mb-2 me-2">
                                        Madrid</span>
                                </div>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center">
                                    <a class="e_btn">Explore</a>
                                    <div class="exploer-icons d-flex">
                                        <div class="exploer-icons-inner plus-icon">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                        <div class="exploer-icons-inner delete-icon">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-4">
                            <div class="card place-box h-100 ">
                                <div class="box-img">
                                    <img src="assets/images/place-card2.png" class="img-fluid w-100" alt="">
                                    {{-- <img src="assets/images/icons/p-card-s1.png" class="position-absolute p-lb" alt=""> --}}
                                </div>
                                <div class="box-content">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h5 class="p-contnt-title">Modern Art Museum</h5>
                                        <img src="assets/images/icons/p-card-s1.png" class="img-fluid" alt="">
                                    </div>
                                    <span class="d-l-Purple"><img src="assets/images/icons/search-h-loaction.png"
                                            alt="" class="mb-2 me-2">
                                        Madrid</span>
                                </div>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center">
                                    <a class="e_btn">Explore</a>
                                    <div class="exploer-icons d-flex">
                                        <div class="exploer-icons-inner plus-icon">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                        <div class="exploer-icons-inner delete-icon">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="selected-place-details-inner">
                    <!-- barcelona spain card -->
                    <div class="place-icon-view d-flex align-items-center justify-content-between  mb-3 flex-wrap">
                        <div class="place-name d-flex align-items-center mb-2">
                            <a class="place-name-icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </a>
                            <a>
                                <img src="assets/images/icons/save-Spain.png" alt=""
                                class="mb-1 me-2 img-fluid">
                            </a>
                            <span class="purple-dark">Barcelona, Spain (12)</span>
                        </div>
                        <div class="place-icon-right d-flex align-items-center justify-content-end mb-2">
                            <a class="place-right-text">
                                View
                            </a>
                            <a class="place-right-icon">
                                <i class="fa-sharp fa-solid fa-table-cells-large"></i>
                            </a>
                            <a class="place-right-location">
                                <i class="fa-solid fa-location-dot"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-lg-4 mb-4">
                            <div class="card place-box h-100">
                                <div class="box-img">
                                    <img src="assets/images/place-card-5.png" alt="" class="img-fluid w-100">
                                    {{-- <img src="assets/images/icons/p-card-s1.png" class="position-absolute p-lb" alt=""> --}}
                                </div>
                                <div class="box-content">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h5 class="p-contnt-title">Nature Museum</h5>
                                        <img src="assets/images/icons/p-card-s1.png" class="img-fluid" alt="">
                                    </div>
                                    <span class="d-l-Purple"><img src="assets/images/icons/search-h-loaction.png"
                                            alt="" class="mb-2 me-2 ">
                                        Madrid</span>
                                </div>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center">
                                    <a class="e_btn">Explore</a>
                                    <div class="exploer-icons d-flex">
                                        <div class="exploer-icons-inner plus-icon">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                        <div class="exploer-icons-inner delete-icon">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-4">
                            <div class="card place-box h-100 ">
                                <div class="box-img">
                                    <img src="assets/images/place-card-6.png" class="img-fluid w-100" alt="">
                                    {{-- <img src="assets/images/icons/p-card-s2.png" class="position-absolute p-lb" alt=""> --}}
                                </div>
                                <div class="box-content">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h5 class="p-contnt-title">Super Plaza</h5>
                                        <img src="assets/images/icons/p-card-s2.png" class="img-fluid" alt="">
                                    </div>
                                    <span class="d-l-Purple"><img src="assets/images/icons/search-h-loaction.png"
                                            alt="" class="mb-2 me-2">
                                        Madrid</span>
                                </div>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center">
                                    <a class="e_btn">Explore</a>
                                    <div class="exploer-icons d-flex">
                                        <div class="exploer-icons-inner plus-icon">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                        <div class="exploer-icons-inner delete-icon">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-4">
                            <div class="card place-box h-100 ">
                                <div class="box-img">
                                    <img src="assets/images/place-card-7.png" class="img-fluid w-100" alt="">
                                    {{-- <img src="assets/images/icons/p-card-s3.png" class="position-absolute p-lb" alt=""> --}}
                                </div>
                                <div class="box-content">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h5 class="p-contnt-title">Mega Market</h5>
                                        <img src="assets/images/icons/p-card-s3.png" class="img-fluid" alt="">
                                    </div>
                                    <span class="d-l-Purple"><img src="assets/images/icons/search-h-loaction.png"
                                            alt="" class="mb-2 me-2">
                                        Madrid</span>
                                </div>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center">
                                    <a class="e_btn">Explore</a>
                                    <div class="exploer-icons d-flex">
                                        <div class="exploer-icons-inner plus-icon">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                        <div class="exploer-icons-inner delete-icon">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-4">
                            <div class="card place-box h-100 ">
                                <div class="box-img">
                                    <img src="assets/images/place-card-8.png" class="img-fluid w-100" alt="">
                                    {{-- <img src="assets/images/icons/p-card-s3.png" class="position-absolute p-lb" alt=""> --}}
                                </div>
                                <div class="box-content">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h5 class="p-contnt-title">Modern Art  Museum</h5>
                                        <img src="assets/images/icons/p-card-s3.png" class="img-fluid" alt="">
                                    </div>
                                    <span class="d-l-Purple"><img src="assets/images/icons/search-h-loaction.png"
                                            alt="" class="mb-2 me-2">
                                        Madrid</span>
                                </div>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center">
                                    <a class="e_btn">Explore</a>
                                    <div class="exploer-icons d-flex">
                                        <div class="exploer-icons-inner plus-icon">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                        <div class="exploer-icons-inner delete-icon">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-4">
                            <div class="card place-box h-100">
                                <div class="box-img">
                                    <img src="assets/images/place-card-9.png" class="img-fluid w-100" alt="">
                                    {{-- <img src="assets/images/icons/p-card-s1.png" class="position-absolute p-lb" alt=""> --}}
                                </div>
                                <div class="box-content">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h5 class="p-contnt-title">Quijote Museum</h5>
                                        <img src="assets/images/icons/p-card-s1.png" class="img-fluid" alt="">
                                    </div>
                                    <span class="d-l-Purple"><img src="assets/images/icons/search-h-loaction.png"
                                            alt="" class="mb-2 me-2">
                                        Madrid</span>
                                </div>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center">
                                    <a class="e_btn">Explore</a>
                                    <div class="exploer-icons d-flex">
                                        <div class="exploer-icons-inner plus-icon">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                        <div class="exploer-icons-inner delete-icon">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-4">
                            <div class="card place-box h-100 ">
                                <div class="box-img">
                                    <img src="assets/images/place-card-10.png" class="img-fluid w-100" alt="">
                                    {{-- <img src="assets/images/icons/p-card-s1.png" class="position-absolute p-lb" alt=""> --}}
                                </div>
                                <div class="box-content">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h5 class="p-contnt-title">Modern Art Museum</h5>
                                        <img src="assets/images/icons/p-card-s1.png" class="img-fluid" alt="">
                                    </div>
                                    <span class="d-l-Purple"><img src="assets/images/icons/search-h-loaction.png"
                                            alt="" class="mb-2 me-2">
                                        Madrid</span>
                                    
                                </div>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center">
                                    <a class="e_btn">Explore</a>
                                    <div class="exploer-icons d-flex">
                                        <div class="exploer-icons-inner plus-icon">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                        <div class="exploer-icons-inner delete-icon">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="selected-place-details-inner">
                    <!-- Paris France -->
                    <div class="place-icon-view d-flex align-items-center justify-content-between  mb-3 flex-wrap">
                        <div class="place-name d-flex align-items-center mb-2">
                            <a class="place-name-icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </a>
                            <a>
                                <img src="assets/images/icons/save-France.png" alt=""
                                    class="mb-1 me-2 img-fluid ">
                            </a>
                            <span class="purple-dark">Paris, France (12)</span>
                        </div>
                        <div class="place-icon-right d-flex align-items-center justify-content-end mb-2">
                            <a class="place-right-text">
                                View
                            </a>
                            <a class="place-right-icon">
                                <i class="fa-sharp fa-solid fa-table-cells-large"></i>
                            </a>
                            <a class="place-right-location">
                                <i class="fa-solid fa-location-dot"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-lg-4 mb-4">
                            <div class="card place-box h-100">
                                <div class="box-img">
                                    <img src="assets/images/place-card-5.png" alt="" class="img-fluid w-100">
                                    {{-- <img src="assets/images/icons/p-card-s1.png" class="position-absolute p-lb" alt=""> --}}
                                </div>
                                <div class="box-content">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h5 class="p-contnt-title">Nature History Museum</h5>
                                        <img src="assets/images/icons/p-card-s1.png" class="img-fluid" alt="">
                                    </div>
                                    <span class="d-l-Purple"><img src="assets/images/icons/search-h-loaction.png"
                                            alt="" class="mb-2 me-2 ">
                                        Barcelona</span>
                                </div>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center">
                                    <a class="e_btn">Explore</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-4">
                            <div class="card place-box h-100 ">
                                <div class="box-img">
                                    <img src="assets/images/place-card-6.png" class="img-fluid w-100" alt="">
                                    {{-- <img src="assets/images/icons/p-card-s2.png" class="position-absolute p-lb" alt=""> --}}
                                </div>
                                <div class="box-content">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h5 class="p-contnt-title">Cerralbo Arts & Crafts Museum</h5>
                                        <img src="assets/images/icons/p-card-s2.png" class="img-fluid" alt="">
                                    </div>
                                    <span class="d-l-Purple"><img src="assets/images/icons/search-h-loaction.png"
                                            alt="" class="mb-2 me-2">
                                        Barcelona</span>
                                </div>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center">
                                    <a class="e_btn">Explore</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-4">
                            <div class="card place-box h-100 ">
                                <div class="box-img">
                                    <img src="assets/images/place-card-7.png" class="img-fluid w-100" alt="">
                                    {{-- <img src="assets/images/icons/p-card-s3.png" class="position-absolute p-lb" alt=""> --}}
                                </div>
                                <div class="box-content">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h5 class="p-contnt-title">Lazaro Galdiano Museum</h5>
                                        <img src="assets/images/icons/p-card-s3.png" class="img-fluid" alt="">
                                    </div>
                                    <span class="d-l-Purple"><img src="assets/images/icons/search-h-loaction.png"
                                            alt="" class="mb-2 me-2">
                                        Barcelona</span>
                                </div>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center">
                                    <a class="e_btn">Explore</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-4">
                            <div class="card place-box h-100 ">
                                <div class="box-img">
                                    <img src="assets/images/place-card-8.png" class="img-fluid w-100" alt="">
                                    {{-- <img src="assets/images/icons/p-card-s3.png" class="position-absolute p-lb" alt=""> --}}
                                </div>
                                <div class="box-content">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h5 class="p-contnt-title">Modern Art Museum</h5>
                                        <img src="assets/images/icons/p-card-s3.png" class="img-fluid" alt="">
                                    </div>
                                    <span class="d-l-Purple"><img src="assets/images/icons/search-h-loaction.png"
                                            alt="" class="mb-2 me-2">
                                        Barcelona</span>
                                </div>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center">
                                    <a class="e_btn">Explore</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-4">
                            <div class="card place-box h-100">
                                <div class="box-img">
                                    <img src="assets/images/place-card-9.png" class="img-fluid w-100" alt="">
                                    {{-- <img src="assets/images/icons/p-card-s1.png" class="position-absolute p-lb" alt=""> --}}
                                </div>
                                <div class="box-content">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h5 class="p-contnt-title">Quijote Museum</h5>
                                        <img src="assets/images/icons/p-card-s1.png" class="img-fluid" alt="">
                                    </div>
                                    <span class="d-l-Purple"><img src="assets/images/icons/search-h-loaction.png"
                                            alt="" class="mb-2 me-2">
                                        Madrid</span>
                                </div>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center">
                                    <a class="e_btn">Explore</a>
                                    <div class="exploer-icons d-flex">
                                        <div class="exploer-icons-inner plus-icon">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-4">
                            <div class="card place-box h-100 ">
                                <div class="box-img">
                                    <img src="assets/images/place-card-10.png" class="img-fluid w-100" alt="">
                                    {{-- <img src="assets/images/icons/p-card-s1.png" class="position-absolute p-lb" alt=""> --}}
                                </div>
                                <div class="box-content">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h5 class="p-contnt-title">Modern Art Museum</h5>
                                        <img src="assets/images/icons/p-card-s1.png" class="img-fluid" alt="">
                                    </div>
                                    <span class="d-l-Purple"><img src="assets/images/icons/search-h-loaction.png"
                                            alt="" class="mb-2 me-2">
                                        Madrid</span>
                                </div>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center">
                                    <a class="e_btn">Explore</a>
                                    <div class="exploer-icons d-flex">
                                        <div class="exploer-icons-inner plus-icon">
                                            <i class="fa-solid fa-plus"></i>
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

    <!-- SAVEED SECTION END -->
@endsection
@push('script')
<script>
$(document).ready(function(){
    var baseUrl = $('#base_url').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.removeWishlist', function(e){
        e.preventDefault();
        let hotelId = $(this).data('id');

        if (!hotelId) {
            return;
        }
        
        formdata = new FormData();
        formdata.append('hotelId', hotelId);

        $.ajax({
            url: "{{route('wishlish.remove')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) { 
                console.log('done');
                wishList();
            }, error:function (response) {
                console.log('fail');
            }
        }); 
    });

    function wishlistCount() {
        var hotelCount = $('.hotelCount').val();
        var hotelTotalShow = $('.hotelTotalShow').text('('+hotelCount+')');
    }

    wishlistCount();

    function wishList() {
        $.ajax({
            url: "{{route('wishlist.list')}}",
            type: "GET",
            dataType: "HTML",
            success: function (response) {
                $(".wishlistDiv").html(response);
                wishlistCount();
            }
        });
    }
});
</script>
@endpush
