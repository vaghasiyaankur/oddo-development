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
            <div class="s_img_with_text mt-5 mb-5">
                <h5>Saved for Later</h5>
            </div>
            <div class="saved-hotels-details">
                <h5 class="box-title-text mb-4">My next trip <span class="hotelTotalShow"></span></h5>
                <div class="hotel-wrapper mb-4">
                    <div class="row wishlistDiv">
                        @include('frontend::saved.wishlist')
                    </div>
                </div>
            </div>
            <div class="selected-place-details">
                <h5 class="box-title-text mb-3">Places (32)</h5>
                <div class="place-icon-view d-flex justify-content-between align-items-center flex-wrap mb-3">
                    <div class="place-name align-items-center mt-2">
                        <a href="javascript:;"><img src="assets/images/icons/search-h-loaction.png" alt=""
                                class="mb-2 me-2"></a>
                        <a href="javascript:;"><img src="assets/images/icons/save-Spain.png" alt=""
                                class="mb-2 me-2"></a>
                        <span class="purple-dark">Madrid, Spain (6)</span>
                    </div>
                    <div class="place-icon-right">
                        <a href="javascript:;" style="color: #A4A6BA;" class="me-1"><span>View</span></a>
                        <a href="javascript:;"><span><img src="assets/images/icons/place-icon-2.png" class="mb-2 me-1"
                                    alt=""></span></a>
                        <a href="javascript:;"><span><img src="assets/images/icons/place-icon-1.png" class="mb-2 me-1"
                                    alt=""></span></a>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="place-box">
                            <div class="box-img position-relative">
                                <img src="assets/images/place-card1.png" alt="" class="img-fluid w-100">
                                <img src="assets/images/icons/p-card-s1.png" class="position-absolute p-lb" alt="">
                            </div>
                            <div class="box-content">
                                <h5 class="p-contnt-title mb-2">Nature <br>Museum</h5>
                                <span class="d-l-Purple mb-3 "><img src="assets/images/icons/search-h-loaction.png"
                                        alt="" class="mb-2 me-2 ">
                                    Madrid</span>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                    <a href="javascript:;" class="e_btn">Explore</a>
                                    <div class="">
                                        <a href="javascript:;"><img src="assets/images/icons/pwm-white-pluse.png"
                                                class="me-1" alt=""></a>
                                        <a href="javascript:;"><img src="assets/images/icons/remove-s.png" class="me-1"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="place-box ">
                            <div class="box-img position-relative">
                                <img src="assets/images/similer-card-2.png" class="img-fluid w-100" alt="">
                                <img src="assets/images/icons/p-card-s2.png" class="position-absolute p-lb" alt="">
                            </div>
                            <div class="box-content">
                                <h5 class="p-contnt-title mb-4 pb-2">Super Plaza</h5>
                                <span class="d-l-Purple mb-3 "><img src="assets/images/icons/search-h-loaction.png"
                                        alt="" class="mb-2 me-2">
                                    Madrid</span>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                    <a href="javascript:;" class="e_btn" style="background: #EB5757;">Explore</a>
                                    <div class="">
                                        <a href="javascript:;"><img src="assets/images/icons/pwm-white-pluse.png"
                                                class="me-1" alt=""></a>
                                        <a href="javascript:;"><img src="assets/images/icons/remove-s.png" class="me-1"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="place-box ">
                            <div class="box-img position-relative">
                                <img src="assets/images/similer-card-1.png" class="img-fluid w-100" alt="">
                                <img src="assets/images/icons/p-card-s2.png" class="position-absolute p-lb" alt="">
                            </div>
                            <div class="box-content">
                                <h5 class="p-contnt-title mb-4 pb-2">Mega Market</h5>
                                <span class="d-l-Purple mb-3 "><img src="assets/images/icons/search-h-loaction.png"
                                        alt="" class="mb-2 me-2">
                                    Madrid</span>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                    <a href="javascript:;" class="e_btn" style="background: #27AE60;">Explore</a>
                                    <div class="">
                                        <a href="javascript:;"><img src="assets/images/icons/pwm-white-pluse.png"
                                                class="me-1" alt=""></a>
                                        <a href="javascript:;"><img src="assets/images/icons/remove-s.png" class="me-1"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="place-box ">
                            <div class="box-img position-relative">
                                <img src="assets/images/place-card4.png" class="img-fluid w-100" alt="">
                                <img src="assets/images/icons/p-card-s3.png" class="position-absolute p-lb" alt="">
                            </div>
                            <div class="box-content">
                                <h5 class="p-contnt-title mb-2">Modern Art <br> Museum</h5>
                                <span class="d-l-Purple mb-3 "><img src="assets/images/icons/search-h-loaction.png"
                                        alt="" class="mb-2 me-2">
                                    Madrid</span>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                    <a href="javascript:;" class="e_btn" style="background: #27AE60;">Explore</a>
                                    <div class="">
                                        <a href="javascript:;"><img src="assets/images/icons/pwm-white-pluse.png"
                                                class="me-1" alt=""></a>
                                        <a href="javascript:;"><img src="assets/images/icons/remove-s.png" class="me-1"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="place-box">
                            <div class="box-img position-relative">
                                <img src="assets/images/place-card1.png" class="img-fluid w-100" alt="">
                                <img src="assets/images/icons/p-card-s1.png" class="position-absolute p-lb" alt="">
                            </div>
                            <div class="box-content">
                                <h5 class="p-contnt-title mb-4 pb-2">Quijote Museum</h5>
                                <span class="d-l-Purple mb-3 "><img src="assets/images/icons/search-h-loaction.png"
                                        alt="" class="mb-2 me-2">
                                    Madrid</span>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                    <a href="javascript:;" class="e_btn">Explore</a>
                                    <div class="">
                                        <a href="javascript:;"><img src="assets/images/icons/pwm-white-pluse.png"
                                                class="me-1" alt=""></a>
                                        <a href="javascript:;"><img src="assets/images/icons/remove-s.png" class="me-1"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="place-box ">
                            <div class="box-img position-relative">
                                <img src="assets/images/place-card2.png" class="img-fluid w-100" alt="">
                                <img src="assets/images/icons/p-card-s1.png" class="position-absolute p-lb" alt="">
                            </div>
                            <div class="box-content">
                                <h5 class="p-contnt-title mb-2">Modern Art <br>Museum</h5>
                                <span class="d-l-Purple mb-3 "><img src="assets/images/icons/search-h-loaction.png"
                                        alt="" class="mb-2 me-2">
                                    Madrid</span>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                    <a href="javascript:;" class="e_btn">Explore</a>
                                    <div class="">
                                        <a href="javascript:;"><img src="assets/images/icons/pwm-white-pluse.png"
                                                class="me-1" alt=""></a>
                                        <a href="javascript:;"><img src="assets/images/icons/remove-s.png" class="me-1"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- barcelona spain card -->
                <div class="place-icon-view d-flex justify-content-between align-items-center flex-wrap mb-3">
                    <div class="place-name align-items-center mt-2">
                        <a href="javascript:;"><img src="assets/images/icons/search-h-loaction.png" alt=""
                                class="mb-2 me-2"></a>
                        <a href="javascript:;"><img src="assets/images/icons/save-Spain.png" alt=""
                                class="mb-2 me-2"></a>
                        <span class="purple-dark">Barcelona, Spain (12)</span>
                    </div>
                    <div class="place-icon-right">
                        <a href="javascript:;" style="color: #A4A6BA;" class="me-1"><span>View</span></a>
                        <a href="javascript:;"><span><img src="assets/images/icons/place-icon-2.png" class="mb-2 me-1"
                                    alt=""></span></a>
                        <a href="javascript:;"><span><img src="assets/images/icons/place-icon-1.png" class="mb-2 me-1"
                                    alt=""></span></a>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="place-box">
                            <div class="box-img position-relative">
                                <img src="assets/images/place-card-5.png" alt="" class="img-fluid w-100">
                                <img src="assets/images/icons/p-card-s1.png" class="position-absolute p-lb" alt="">
                            </div>
                            <div class="box-content">
                                <h5 class="p-contnt-title mb-2">Nature <br>Museum</h5>
                                <span class="d-l-Purple mb-3 "><img src="assets/images/icons/search-h-loaction.png"
                                        alt="" class="mb-2 me-2 ">
                                    Madrid</span>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                    <a href="javascript:;" class="e_btn">Explore</a>
                                    <div class="">
                                        <a href="javascript:;"><img src="assets/images/icons/pwm-white-pluse.png"
                                                class="me-1" alt=""></a>
                                        <a href="javascript:;"><img src="assets/images/icons/remove-s.png" class="me-1"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="place-box ">
                            <div class="box-img position-relative">
                                <img src="assets/images/place-card-6.png" class="img-fluid w-100" alt="">
                                <img src="assets/images/icons/p-card-s2.png" class="position-absolute p-lb" alt="">
                            </div>
                            <div class="box-content">
                                <h5 class="p-contnt-title mb-4 pb-2">Super Plaza</h5>
                                <span class="d-l-Purple mb-3 "><img src="assets/images/icons/search-h-loaction.png"
                                        alt="" class="mb-2 me-2">
                                    Madrid</span>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                    <a href="javascript:;" class="e_btn" style="background: #EB5757;">Explore</a>
                                    <div class="">
                                        <a href="javascript:;"><img src="assets/images/icons/pwm-white-pluse.png"
                                                class="me-1" alt=""></a>
                                        <a href="javascript:;"><img src="assets/images/icons/remove-s.png" class="me-1"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="place-box ">
                            <div class="box-img position-relative">
                                <img src="assets/images/place-card-7.png" class="img-fluid w-100" alt="">
                                <img src="assets/images/icons/p-card-s3.png" class="position-absolute p-lb" alt="">
                            </div>
                            <div class="box-content">
                                <h5 class="p-contnt-title mb-4 pb-2">Mega Market</h5>
                                <span class="d-l-Purple mb-3 "><img src="assets/images/icons/search-h-loaction.png"
                                        alt="" class="mb-2 me-2">
                                    Madrid</span>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                    <a href="javascript:;" class="e_btn" style="background: #27AE60;">Explore</a>
                                    <div class="">
                                        <a href="javascript:;"><img src="assets/images/icons/pwm-white-pluse.png"
                                                class="me-1" alt=""></a>
                                        <a href="javascript:;"><img src="assets/images/icons/remove-s.png" class="me-1"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="place-box ">
                            <div class="box-img position-relative">
                                <img src="assets/images/place-card-8.png" class="img-fluid w-100" alt="">
                                <img src="assets/images/icons/p-card-s3.png" class="position-absolute p-lb" alt="">
                            </div>
                            <div class="box-content">
                                <h5 class="p-contnt-title mb-2">Modern Art <br> Museum</h5>
                                <span class="d-l-Purple mb-3 "><img src="assets/images/icons/search-h-loaction.png"
                                        alt="" class="mb-2 me-2">
                                    Madrid</span>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                    <a href="javascript:;" class="e_btn" style="background: #27AE60;">Explore</a>
                                    <div class="">
                                        <a href="javascript:;"><img src="assets/images/icons/pwm-white-pluse.png"
                                                class="me-1" alt=""></a>
                                        <a href="javascript:;"><img src="assets/images/icons/remove-s.png" class="me-1"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="place-box">
                            <div class="box-img position-relative">
                                <img src="assets/images/place-card-9.png" class="img-fluid w-100" alt="">
                                <img src="assets/images/icons/p-card-s1.png" class="position-absolute p-lb" alt="">
                            </div>
                            <div class="box-content">
                                <h5 class="p-contnt-title mb-4 pb-2">Quijote Museum</h5>
                                <span class="d-l-Purple mb-3 "><img src="assets/images/icons/search-h-loaction.png"
                                        alt="" class="mb-2 me-2">
                                    Madrid</span>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                    <a href="javascript:;" class="e_btn">Explore</a>
                                    <div class="">
                                        <a href="javascript:;"><img src="assets/images/icons/pwm-white-pluse.png"
                                                class="me-1" alt=""></a>
                                        <a href="javascript:;"><img src="assets/images/icons/remove-s.png" class="me-1"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="place-box ">
                            <div class="box-img position-relative">
                                <img src="assets/images/place-card-10.png" class="img-fluid w-100" alt="">
                                <img src="assets/images/icons/p-card-s1.png" class="position-absolute p-lb" alt="">
                            </div>
                            <div class="box-content">
                                <h5 class="p-contnt-title mb-2">Modern Art <br>Museum</h5>
                                <span class="d-l-Purple mb-3 "><img src="assets/images/icons/search-h-loaction.png"
                                        alt="" class="mb-2 me-2">
                                    Madrid</span>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                    <a href="javascript:;" class="e_btn">Explore</a>
                                    <div class="">
                                        <a href="javascript:;"><img src="assets/images/icons/pwm-white-pluse.png"
                                                class="me-1" alt=""></a>
                                        <a href="javascript:;"><img src="assets/images/icons/remove-s.png" class="me-1"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Valencia Spain  Map-->
                {{-- <div class="place-icon-view d-flex justify-content-between align-items-center flex-wrap">
                    <div class="place-name align-items-center mt-2">
                        <a href="javascript:;"><img src="assets/images/icons/search-h-loaction.png" alt=""
                                class="mb-2 me-2"></a>
                        <a href="javascript:;"><img src="assets/images/icons/save-Spain.png" alt=""
                                class="mb-2 me-2"></a>
                        <span class="purple-dark">Valencia, Spain (12)</span>
                    </div>
                    <div class="place-icon-right">
                        <a href="javascript:;" style="color: #A4A6BA;" class="me-1"><span>View</span></a>
                        <a href="javascript:;"><span><img src="assets/images/icons/place-icon2.png" class="mb-2 me-1"
                                    alt=""></span></a>
                        <a href="javascript:;"><span><img src="assets/images/icons/place-icon1.png" class="mb-2 me-1"
                                    alt=""></span></a>
                    </div>
                </div>
                <div class="map-place">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d786588.731672099!2d-4.022084791868385!3d39.635934014944716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xc42e3783261bc8b%3A0xa6ec2c940768a3ec!2sSpain!5e0!3m2!1sen!2sin!4v1653073080931!5m2!1sen!2sin"
                        width="600" height="450" style="border:0;border-radius: 8px;" class="w-100" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div> --}}
                <!-- Paris France -->
                <div class="place-icon-view d-flex justify-content-between align-items-center flex-wrap mb-3">
                    <div class="place-name align-items-center mt-2">
                        <a href="javascript:;"><img src="assets/images/icons/search-h-loaction.png" alt=""
                                class="mb-2 me-2"></a>
                        <a href="javascript:;"><img src="assets/images/icons/save-France.png" alt=""
                                class="mb-2 me-2"></a>
                        <span class="purple-dark">Paris, France (12)</span>
                    </div>
                    <div class="place-icon-right">
                        <a href="javascript:;" style="color: #A4A6BA;" class="me-1"><span>View</span></a>
                        <a href="javascript:;"><span><img src="assets/images/icons/place-icon-2.png" class="mb-2 me-1"
                                    alt=""></span></a>
                        <a href="javascript:;"><span><img src="assets/images/icons/place-icon-1.png" class="mb-2 me-1"
                                    alt=""></span></a>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="place-box">
                            <div class="box-img position-relative">
                                <img src="assets/images/place-card-5.png" alt="" class="img-fluid w-100">
                                <img src="assets/images/icons/p-card-s1.png" class="position-absolute p-lb" alt="">
                            </div>
                            <div class="box-content">
                                <h5 class="p-contnt-title mb-2">Nature History <br>Museum</h5>
                                <span class="d-l-Purple mb-3 "><img src="assets/images/icons/search-h-loaction.png"
                                        alt="" class="mb-2 me-2 ">
                                    Barcelona</span>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                    <a href="javascript:;" class="e_btn">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="place-box ">
                            <div class="box-img position-relative">
                                <img src="assets/images/place-card-6.png" class="img-fluid w-100" alt="">
                                <img src="assets/images/icons/p-card-s2.png" class="position-absolute p-lb" alt="">
                            </div>
                            <div class="box-content">
                                <h5 class="p-contnt-title mb-2">Cerralbo Arts & <br> Crafts Museum</h5>
                                <span class="d-l-Purple mb-3 "><img src="assets/images/icons/search-h-loaction.png"
                                        alt="" class="mb-2 me-2">
                                    Barcelona</span>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                    <a href="javascript:;" class="e_btn">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="place-box ">
                            <div class="box-img position-relative">
                                <img src="assets/images/place-card-7.png" class="img-fluid w-100" alt="">
                                <img src="assets/images/icons/p-card-s3.png" class="position-absolute p-lb" alt="">
                            </div>
                            <div class="box-content">
                                <h5 class="p-contnt-title mb-2">Lazaro Galdiano <br> Museum</h5>
                                <span class="d-l-Purple mb-3 "><img src="assets/images/icons/search-h-loaction.png"
                                        alt="" class="mb-2 me-2">
                                    Barcelona</span>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                    <a href="javascript:;" class="e_btn">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="place-box ">
                            <div class="box-img position-relative">
                                <img src="assets/images/place-card-8.png" class="img-fluid w-100" alt="">
                                <img src="assets/images/icons/p-card-s3.png" class="position-absolute p-lb" alt="">
                            </div>
                            <div class="box-content">
                                <h5 class="p-contnt-title mb-2">Modern Art <br>Museum</h5>
                                <span class="d-l-Purple mb-3 "><img src="assets/images/icons/search-h-loaction.png"
                                        alt="" class="mb-2 me-2">
                                    Barcelona</span>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                    <a href="javascript:;" class="e_btn">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="place-box">
                            <div class="box-img position-relative">
                                <img src="assets/images/place-card-9.png" class="img-fluid w-100" alt="">
                                <img src="assets/images/icons/p-card-s1.png" class="position-absolute p-lb" alt="">
                            </div>
                            <div class="box-content">
                                <h5 class="p-contnt-title mb-4 pb-2">Quijote Museum</h5>
                                <span class="d-l-Purple mb-3 "><img src="assets/images/icons/search-h-loaction.png"
                                        alt="" class="mb-2 me-2">
                                    Madrid</span>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                    <a href="javascript:;" class="e_btn">Explore</a>
                                    <div class="">
                                        <a href="javascript:;"><img src="assets/images/icons/pwm-white-pluse.png"
                                                class="me-1" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="place-box ">
                            <div class="box-img position-relative">
                                <img src="assets/images/place-card-10.png" class="img-fluid w-100" alt="">
                                <img src="assets/images/icons/p-card-s1.png" class="position-absolute p-lb" alt="">
                            </div>
                            <div class="box-content">
                                <h5 class="p-contnt-title mb-2">Modern Art <br>Museum</h5>
                                <span class="d-l-Purple mb-3 "><img src="assets/images/icons/search-h-loaction.png"
                                        alt="" class="mb-2 me-2">
                                    Madrid</span>
                                <div class="exploer-btn- d-flex justify-content-between align-items-center mt-2">
                                    <a href="javascript:;" class="e_btn">Explore</a>
                                    <div class="">
                                        <a href="javascript:;"><img src="assets/images/icons/pwm-white-pluse.png"
                                                class="me-1" alt=""></a>
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
