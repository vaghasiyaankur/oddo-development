@extends('user_site.layout.master')

@section('title')
    home
@endsection

@section('content')
<!------- homepage-swiper section start ------->
<section class="swiper-container loading homepage-swiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image:url({{asset('assets/images/swiper-img1.jpg')}})">
            <img src="assets/images/swiper-img1.jpg" class="entity-img img-fluid" />
            <div class="content">
                <p class="swiper-logo text-center"><img src="{{asset('assets/images/icons/n-logo-1.png')}}" alt=""></p>
                <p class="title">New york</p>
            </div>
        </div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/images/swiper-img2.jpg')}})">
            <img src="{{asset('assets/images/swiper-img2.jpg')}}" class="entity-img img-fluid" />
            <div class="content">
                <p><img src="{{asset('assets/images/icons/p-logo-2.png')}}"></p>
                <p class="title">Paris</p>
            </div>
        </div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/images/swiper-img3.jpg')}})">
            <img src="{{asset('assets/images/swiper-img3.jpg')}}" class="entity-img img-fluid" />
            <div class="content">
                <p><img src="{{asset('assets/images/icons/n-logo-1.png')}}"></p>
                <p class="title">Bilbao</p>
            </div>
        </div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/images/swiper-img4.jpg')}})">
            <img src="{{asset('assets/images/swiper-img4.jpg')}}" class="entity-img img-fluid" />
            <div class="content">
                <p><img src="{{asset('assets/images/icons/p-logo-2.png')}}"></p>
                <p class="title">Lyon</p>
            </div>
        </div>
        <div class="swiper-slide" style="background-image:url({{asset('assets/images/swiper-img-5.jpg')}})">
            <img src="{{asset('assets/images/swiper-img-5.jpg')}}" class="entity-img img-fluid" />
            <div class="content">
                <p><img src="{{asset('assets/images/icons/Spain.png')}}"></p>
                <p class="title">Madrid</p>
            </div>
        </div>
    </div>
    <!--navigation buttons -->
    <div class="swiper-button-prev swiper-button-white"></div>
    <div class="swiper-button-next swiper-button-white"></div>
</section>
<!------- homepage-swiper section end ------->
<!------- Check-in-out section start ------->
<section class="check-in-out">
    <div class="container">
        <div class="check-in-out-inner">
            <h4>Hotels</h4>
            <div class="check-in-out-form">
                <div class="check-in-out-top">
                    <div class=" row">
                        <div class="col-lg-6 mb-2">
                            <label for="hotels"></label>
                            <div class="d-flex align-items-center search-input">
                                <input class="form-control border-0" id="hotels" type="text" placeholder="Search Place">
                                <i class="fa-solid fa-magnifying-glass pe-3"></i>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-2">
                            <label for="checkin">Check In </label>
                            <div class="calender_input_box d-flex align-items-center position-relative">
                                <div class="cal-icon"><img src="assets/images/icons/cal-1.png" class="trip_icon pe-2">
                                </div>
                                <div class="cal-placeholder w-100"><input placeholder="08/19/2020" type="text"
                                        name="checkIn" id="date_checkin" class="calendar"></div>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-2">
                            <label for="checkin">Check Out </label>
                            <div class="calender_input_box d-flex align-items-center position-relative">
                                <div class="cal-icon"><img src="assets/images/icons/cal-2.png" class="trip_icon pe-2">
                                </div>
                                <div class="cal-placeholder w-100"><input placeholder="08/28/2020" type="text"
                                        name="checkIn" id="date_checkout" class="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="check-in-out-bottom">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-4 select-option pe-lg-0 mt-2">
                            <label>Guests</label>
                            <select class="select2-icon" name="icon">
                                <option value="fa-user-group" data-icon="fa-user-group">2</option>
                                <option value="fa-user" data-icon="fa-user">1</option>
                                <option value="fa-users" data-icon="fa-users">3</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-4 select-option pe-lg-0 mt-2">
                            <label>Room</label>
                            <select class="select2-icon" name="icon">
                                <option value="fa-door-closed" data-icon="fa-door-closed">2</option>
                                <option value="fa-door-closed" data-icon="fa-door-closed">1</option>
                                <option value="fa-door-closed" data-icon="fa-door-closed">3</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-4 select-option pe-lg-0 mt-2">
                            <label>Bed</label>
                            <select class="select2-icon" name="icon">
                                <option value="fa-bed" data-icon="fa-bed">2</option>
                                <option value="fa-bed" data-icon="fa-bed">1</option>
                                <option value="fa-bed" data-icon="fa-bed">3</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mt-4 col-md-3 col-sm-6 col-6 text-lg-center">
                            <div class="check-in-out  -icon">
                                <div class="mb-1 check-icons-inner">
                                    <img src="{{asset('assets/images/icons/check-1.png')}}" class="img-fluid">
                                    <img src="{{asset('assets/images/icons/check-2.png')}}" class="img-fluid">
                                </div>
                                <div class="check-icons-inner">
                                    <img src="{{asset('assets/images/icons/check-3.png')}}" class="img-fluid">
                                    <img src="{{asset('assets/images/icons/check-1.png')}}" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 mt-4 col-md-3 col-sm-6 col-6 ps-0 me-lg-2 white-space">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Things to do
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-2 mt-4 col-md-3 col-sm-6 col-6 text-lg-center">
                            <div class="check-in-out-icon">
                                <div class="mb-1 check-icons-inner">
                                    <img src="{{asset('assets/images/icons/check-5.png')}}" class="img-fluid">
                                    <img src="{{asset('assets/images/icons/check-6.png')}}" class="img-fluid">
                                </div>
                                <div class="check-icons-inner">
                                    <img src="{{asset('assets/images/icons/check-7.png')}}" class="img-fluid">
                                    <img src="{{asset('assets/images/icons/check-8.png')}}" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 mt-4 col-md-3 col-sm-6 col-6 ps-0 white-space">
                            <div class="form-check ">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                <label class="form-check-label" for="flexCheckChecked">
                                    Transportation
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="check-in-out-btn mt-5 text-center">
                    <a href="#" class="btn search-btn purple">Search</a>
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
            <p class="pb-5">Travel planning and booking made easy</p>
        </div>
        <!------- pagination start -------->
        <div class="pagination-main pt-3">
            <ul class="list-group list-group-horizontal mt-2 justify-content-center align-items-baseline">
                <div class="text-center list-group-main">
                    <li class="list-group-item pagination-list"><a href="#" class="purple text-decoration-none"> 1</a>
                    </li>
                    <span><a href="#" class="pagination-text text-decoration-none"> Explore</a></span>
                </div>
                <div class="list-right-arrow">
                    <li class="list-group-item border-0"><img src="assets/images/icons/Vector.png" class="img-fluid">
                    </li>
                </div>

                <div class="list-group-main text-center">
                    <li class="list-group-item pagination-list"><a href="#" class="purple text-decoration-none"> 2</a>
                    </li>
                    <span><a href="#" class="pagination-text text-decoration-none">Plan</a> </span>
                </div>
                <div class="list-right-arrow">
                    <li class="list-group-item border-0"><img src="assets/images/icons/Vector.png" class="img-fluid">
                    </li>
                </div>
                <div class="list-group-main text-center">
                    <li class="list-group-item pagination-list purple"><a href="#" class="purple text-decoration-none">
                            3</a></li>
                    <span><a href="#" class="pagination-text text-decoration-none"> Book</a></span>
                </div>
            </ul>
        </div>
        <!------- pagination end -------->
        <!------- travel info start ------->
        <div class="travel-info-main pt-5">
            <div class="container">
                <div class="travel-info-inner position-relative">
                    <div class="travel-info-logo-img travel-info-bg bg-white position-relative">
                        <img src="{{asset('assets/images/icons/t-info-1.png')}}" class="img-fluid">
                    </div>
                    <div class="travel-info-car">
                        <div class="travel-info-car-img travel-info-bg bg-blue position-relative">
                            <img src="{{asset('assets/images/icons/t-info-2.png')}}" class="img-fluid">
                        </div>
                    </div>
                    <div class="travel-info-bank">
                        <div class="travel-info-bank-img travel-info-bg bg-purple position-relative">
                            <img src="{{asset('assets/images/icons/t-info-3.png')}}" class="img-fluid">
                        </div>
                    </div>
                    <div class="travel-info-tree">
                        <div class="travel-info-tree-img travel-info-bg bg-green position-relative">
                            <img src="{{asset('assets/images/icons/t-info-4.png')}}" class="img-fluid">
                        </div>
                    </div>
                    <div class="travel-info-bag">
                        <div class="travel-info-bag-img travel-info-bg bg-yellow position-relative">
                            <img src="{{asset('assets/images/icons/t-info-5.png')}}" class="img-fluid">
                        </div>
                    </div>
                    <div class="travel-info-rest">
                        <div class="travel-info-rest-img travel-info-bg bg-green-two position-relative">
                            <img src="{{asset('assets/images/icons/t-info-6.png')}}" class="img-fluid">
                        </div>
                    </div>
                    <div class="rounded-pill bg-danger text-white coming--pill">COMING SOON</div>
                    <div class="travel-info-csoon">
                        <div class="travel-info-csoon-img travel-info-bg d-pink position-relative">
                            <img src="{{asset('assets/images/icons/t-info-7.png')}}" class="img-fluid">
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
            <div class="s-top-city-head text-center mb-5">
                <h2>Top Cities in Spain <img src="{{asset('assets/images/icons/Spain.png')}}" class="img-fluid"></h2>
            </div>
            <div class="s-top-city-main">
                <div class="slick-wrapper position-relative">
                    <div id="slick1" class="result-swpier-img">
                        <div class="slide-item position-relative ">
                            <div class="t-city-card-img"><img src="{{asset('assets/images/s-city-1.png')}}" class="img-fluid"></div>
                            <div class="position-absolute">
                                <div class="s-city-img-content">
                                    <h3 class="text-white">Málaga</h3>
                                    <div class="d-flex  justify-content-center align-items-center">
                                        <span><img src="{{asset('assets/images/icons/city-s.png')}}"></span>
                                        <span class="text-white para-fs-14 ps-2">Spain</span>
                                    </div>
                                </div>
                                <div class="t-city-card-button">
                                    <a href="#" class="btn bg-purple t-city-btn">Explore</a>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item position-relative ">
                            <div class="t-city-card-img"><img src="{{asset('assets/images/s-city-2.png')}}" class="img-fluid"></div>
                            <div class="position-absolute ">
                                <div class="s-city-img-content">
                                    <h3 class="text-white">Valencia</h3>
                                    <div class="d-flex  justify-content-center align-items-center">
                                        <span><img src="{{asset('assets/images/icons/city-s.png')}}"></span>
                                        <span class="text-white para-fs-14 ps-2">Spain</span>
                                    </div>
                                </div>
                                <div class="t-city-card-button">
                                    <a href="#" class="btn bg-purple t-city-btn">Explore</a>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item position-relative ">
                            <div class="t-city-card-img"><img src="{{asset('assets/images/s-city-3.png')}}" class="img-fluid"></div>
                            <div class="position-absolute ">
                                <div class="content">
                                    <h3 class="text-white ">Madrid</h3>
                                    <div class="d-flex  justify-content-center align-items-center">
                                        <span><img src="{{asset('assets/images/icons/city-s.png')}}"></span>
                                        <span class="text-white para-fs-14 ps-2">Spain</span>
                                    </div>
                                </div>
                                <div class="t-city-card-button">
                                    <a href="#" class="btn bg-purple t-city-btn">Explore</a>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item position-relative">
                            <div class="t-city-card-img"><img src="{{asset('assets/images/s-city-4.png')}}" class="img-fluid"></div>
                            <div class="position-absolute">
                                <div class="content">
                                    <h3 class="text-white">Mallorca</h3>
                                    <div class="d-flex  justify-content-center align-items-center">
                                        <span><img src="{{asset('assets/images/icons/city-s.png')}}"></span>
                                        <span class="text-white para-fs-14 ps-2">Spain</span>
                                    </div>
                                </div>
                                <div class="t-city-card-button">
                                    <a href="#" class="btn bg-purple t-city-btn">Explore</a>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item position-relative">
                            <div class="t-city-card-img"><img src="{{asset('assets/images/sc-city-5.png')}}" class="img-fluid"></div>
                            <div class="position-absolute ">
                                <div class="content">
                                    <h3 class="text-white">Sevilla</h3>
                                    <div class="d-flex  justify-content-center align-items-center">
                                        <span><img src="{{asset('assets/images/icons/city-s.png')}}"></span>
                                        <span class="text-white para-fs-14 ps-2">Spain</span>
                                    </div>
                                </div>
                                <div class="t-city-card-button">
                                    <a href="#" class="btn bg-purple t-city-btn">Explore</a>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item position-relative">
                            <div class="t-city-card-img"><img src="{{asset('assets/images/s-city-6.png')}}" class="img-fluid"></div>
                            <div class="position-absolute">
                                <div class="content">
                                    <h3 class="text-white">Barcelona</h3>
                                    <div class="d-flex  justify-content-center align-items-center">
                                        <span><img src="{{asset('assets/images/icons/city-s.png')}}"></span>
                                        <span class="text-white para-fs-14 ps-2">Spain</span>
                                    </div>
                                </div>
                                <div class="t-city-card-button">
                                    <a href="#" class="btn bg-purple t-city-btn">Explore</a>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item position-relative">
                            <div class="t-city-card-img"><img src="{{asset('assets/images/s-city-1.png')}}" class="img-fluid"></div>
                            <div class="position-absolute">
                                <div class="content">
                                    <h3 class="text-white">Málaga</h3>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <span><img src="{{asset('assets/images/icons/city-s.png')}}"></span>
                                        <span class="text-white para-fs-14 ps-2">Spain</span>
                                    </div>
                                </div>
                                <div class="t-city-card-button">
                                    <a href="#" class="btn bg-purple t-city-btn">Explore</a>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item position-relative">
                            <div class="t-city-card-img"><img src="{{asset('assets/images/s-city-2.png')}}" class="img-fluid"></div>
                            <div class="position-absolute ">
                                <div class="content">
                                    <h3 class="text-white">Valencia</h3>
                                    <div class="d-flex  justify-content-center align-items-center">
                                        <span><img src="{{asset('assets/images/icons/city-s.png')}}"></span>
                                        <span class="text-white para-fs-14 ps-2">Spain</span>
                                    </div>
                                </div>
                                <div class="t-city-card-button">
                                    <a href="#" class="btn bg-purple t-city-btn">Explore</a>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item position-relative">
                            <div class="t-city-card-img"><img src="{{asset('assets/images/s-city-3.png')}}" class="img-fluid"></div>
                            <div class="position-absolute  ">
                                <div class="content">
                                    <h3 class="text-white">Madrid</h3>
                                    <div class="d-flex  justify-content-center align-items-center">
                                        <span><img src="{{asset('assets/images/icons/city-s.png')}}"></span>
                                        <span class="text-white para-fs-14 ps-2">Spain</span>
                                    </div>
                                </div>
                                <div class="t-city-card-button">
                                    <a href="#" class="btn bg-purple t-city-btn">Explore</a>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item position-relative">
                            <div class="t-city-card-img"><img src="{{asset('assets/images/s-city-4.png')}}" class="img-fluid"></div>
                            <div class="position-absolute">
                                <div class="content">
                                    <h3 class="text-white">Mallorca</h3>
                                    <div class="d-flex  justify-content-center align-items-center">
                                        <span><img src="{{asset('assets/images/icons/city-s.png')}}"></span>
                                        <span class="text-white para-fs-14 ps-2">Spain</span>
                                    </div>
                                </div>
                                <div class="t-city-card-button">
                                    <a href="#" class="btn bg-purple t-city-btn">Explore</a>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item position-relative">
                            <div class="t-city-card-img"><img src="{{asset('assets/images/sc-city-5.png')}}" class="img-fluid"></div>
                            <div class="position-absolute">
                                <div class="content">
                                    <h3 class="text-white">Sevilla</h3>
                                    <div class="d-flex  justify-content-center align-items-center">
                                        <span><img src="assets/images/icons/city-s.png"></span>
                                        <span class="text-white para-fs-14 ps-2">Spain</span>
                                    </div>
                                </div>
                                <div class="t-city-card-button">
                                    <a href="#" class="btn bg-purple t-city-btn">Explore</a>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item position-relative">
                            <div class="t-city-card-img"><img src="{{asset('assets/images/s-city-6.png')}}" class="img-fluid"></div>
                            <div class="position-absolute">
                                <div class="content">
                                    <h3 class="text-white">Barcelona</h3>
                                    <div class="d-flex  justify-content-center align-items-center">
                                        <span><img src="{{asset('assets/images/icons/city-s.png')}}"></span>
                                        <span class="text-white para-fs-14 ps-2">Spain</span>
                                    </div>
                                </div>
                                <div class="t-city-card-button">
                                    <a href="#" class="btn bg-purple t-city-btn">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!------- Top cities section end -------->
<!------- Top hotels section start ------->
<section class="t-hotels-main pb-5 pt-5">
    <div class="container">
        <div class="t-hotels-inner">
            <div class="t-hotels-head text-center  mb-5">
                <h2>Partnering with top hotels</h2>
            </div>
            <div class="top-hotels-img text-center">
                <img src="{{asset('assets/images/t-hotel-bg.png')}}" class="img-fluid">
            </div>
            <div class="top-hotels-wraper">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                        <div class="top-hotels-card m-0">
                            <div class="top-hotels-card-inner bg-white text-center mx-auto">
                                <img src="{{asset('assets/images/icons/t-hotels-1.png')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                        <div class="top-hotels-card m-0">
                            <div class="top-hotels-card-inner bg-white text-center mx-auto">
                                <img src="{{asset('assets/images/icons/t-hotels-2.png')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                        <div class="top-hotels-card m-0">
                            <div class="top-hotels-card-inner bg-white text-center mx-auto">
                                <img src="{{asset('assets/images/icons/t-hotels-3.png')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                        <div class="top-hotels-card m-0">
                            <div class="top-hotels-card-inner bg-white text-center mx-auto">
                                <img src="{{asset('assets/images/icons/t-hotels-4.png')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                        <div class="top-hotels-card m-0">
                            <div class="top-hotels-card-inner bg-white text-center mx-auto">
                                <img src="{{asset('assets/images/icons/t-hotels-5.png')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                        <div class="top-hotels-card m-0">
                            <div class="top-hotels-card-inner bg-white text-center mx-auto">
                                <img src="{{asset('assets/images/icons/t-hotels-1.png')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                        <div class="top-hotels-card m-0">
                            <div class="top-hotels-card-inner bg-white text-center mx-auto">
                                <img src="{{asset('assets/images/icons/t-hotels-4.png')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                        <div class="top-hotels-card m-0">
                            <div class="top-hotels-card-inner bg-white text-center mx-auto">
                                <img src="{{asset('assets/images/icons/t-hotels-2.png')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!------- Top hotels section end ------->
@endsection

@push('links')
 <!------- select2 css link ------->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css">
 <!-------- Slick css cdn ------->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
 <!------ Swiper css link ------>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css">
@endpush

@push('css')
<style>
    /* Css for select2  */
    .select2{
      width: 100% !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow{
      height: 38px;
    }
    .select2-container .select2-selection--single{
      height: 38px;
    }
    .select2-container--default .select2-selection--single{
      border: 1px solid #878996;
      border-radius: 5px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
      color: #6A78C7;
      line-height: 35px;
    }
   /*------------- CALENDER CSS ------------*/
.check-in-out .calendar {
    background: transparent;
    font-size: 14px;
    border: none;
    width: 100%;
  }
  
  .ui-datepicker {
    background: #ffffff !important;
    border-radius: 15px;
    width: 100%;
    max-width: 255px;
  }
  .ui-datepicker-header {
    height: 50px;
    line-height: 50px;
    color: #ffffff;
    background: #31639c;
  }
  
  .ui-datepicker-prev,
  .ui-datepicker-next {
    width: 20px;
    height: 20px;
    text-indent: 9999px;
    border-radius: 100%;
    cursor: pointer;
    overflow: hidden;
    margin-top: 12px;
  }
  
  .ui-datepicker-prev {
    float: left;
    margin-left: 12px;
  }
  
  .ui-datepicker-prev:after {
    transform: rotate(45deg);
    margin: -43px 0px 0px 8px;
  }
  
  .ui-datepicker-next {
    float: right;
    margin-right: 20px;
  }
  
  .ui-datepicker-next:after {
    transform: rotate(-135deg);
    margin: -43px 0px 0px 6px;
  }
  
  .ui-datepicker-prev:after,
  .ui-datepicker-next:after {
    content: "";
    position: absolute;
    display: block;
    width: 8px;
    height: 8px;
    border-left: 2px solid #ffffff;
    border-bottom: 2px solid #ffffff;
  }
  
  .ui-datepicker-prev:hover,
  .ui-datepicker-next:hover,
  .ui-datepicker-prev:hover:after,
  .ui-datepicker-next:hover:after {
    border-color: #333333;
  }
  
  .ui-datepicker-title {
    text-align: center;
    font-size: 15px;
  }
  
  .ui-datepicker-calendar {
    width: 100%;
    text-align: center;
    border: 1px solid lightgray;
  }
  
  .ui-datepicker-calendar thead tr th span {
    display: block;
    width: 28px;
    color: #31639c;
    margin-bottom: -2px;
    font-size: 14px;
  }
  
  .ui-state-default {
    display: block;
    text-decoration: none;
    color: #333333;
    line-height: 19px;
    font-size: 12px;
  }
  
  .ui-state-default:hover {
    color: #ffffff;
    background: #31639c;
    border-radius: 50px;
    transition: all 0.25s cubic-bezier(0.7, -0.12, 0.2, 1.12);
  }
  
  .ui-state-active {
    color: #ffffff;
    background-color: #31639c;
    border-radius: 50px;
  }
  
  .ui-datepicker-unselectable .ui-state-default {
    color: #eee;
    border: 2px solid transparent;
  }
  .calender_input_box{
      border: 1px solid #878996;
      border-radius: 5px;
      padding-left: 16px;
      padding-top: 6px;
      padding-bottom: 6px;
  }
  .calender_input_box .cal-icon {
      line-height: 0;
  }
  .calender_input_box .calendar:focus-visible {
    outline: -webkit-focus-ring-color auto 0px;
  }
/* ***** Calender end ******** */
  </style>
@endpush

@push('scripts')
    <!------- Custom JS Link -----  -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
@endpush