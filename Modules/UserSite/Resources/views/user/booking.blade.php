@extends('layout::user.UserSite.master')

@section('title')
    Add-Layout
@endsection


@push('css')
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="      ">  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap-grid.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="{{ asset('user/asset/css/user-style.css') }}">

    <style>
        table tbody tr td {
            padding: 30px 10px !important;
        }

        table thead th {
            background-color: #eef1f7 !important;
            color: #8195a8 !important;
        }

        .hotelimg_box img {
            max-width: 60px;
            width: 100%;
        }

        .hotel--booking-box .booking--inner-box {
            border: 1px solid lightgrey;
            min-height: 150px;
            border-radius: 11px;
            box-shadow: 0px 0px 5px rgb(0 0 0 / 10%);
        }

        .hotel--booking-box .booking--inner-box .hotel_book_img img {
            width: 100%;
            max-width: 179px;
            height: 100%;
            object-fit: cover;
            border-radius: 11px 0px 0px 11px;
        }

        .hotel--booking-box .booking--inner-box .inner-right-content {
            width: 100%;
            padding: 15px 20px;
        }
        .offer--button{
            padding: 6px 11px;
            background-color: #eef1f7 !important;
            color: #889cad !important;
            font-weight: 600;
            border-radius: 6px;
        }
        .hotel--booking-box .page-item.active .page-link {
            z-index: 3;
            color: #fff !important;
            background-color: #6a78c7;
            border-color: #6a78c7;
        }
        .hotel--booking-box .page-item .page-link{
            color: #000;
        }
    </style>
@endpush


@section('content')
    <section class="account-content" style="min-height: 608px;">
        <div class="container">
            <div class="row py-4">
                @include('usersite::user.sidebar.sidebar')
                <div class="col-lg-10 col-md-10 col-12 right-side-content">
                    <div id="tabs">
                        <div class="hotel--booking-box">
                            <div class="booking-title-text">
                                <h5 class="mb-4" style="color: #8195a8;font-weight: 600;">Bookings Details :</h5>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 mb-4">
                                    <div class="booking--inner-box d-flex">
                                        <div class="hotel_book_img">
                                            <img src="{{ asset('storage/hotels/02.jpg') }}">
                                        </div>
                                        <div class="inner-right-content">
                                            <div
                                                class="title--with-price d-flex justify-content-between akign-items-center mb-1">
                                                <div class="title--badge">
                                                    <span class="badge"
                                                        style="background-color: #eef1f7;color: #8195a8;font-size: 13px;">Hotel</span>
                                                </div>
                                                <div class="title-price--tage">
                                                    <sup class="me-1"> &euro;</sup><span class="fs-5 fw-normal">84</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="">
                                                    <h6 class="fw-bold mb-0">Vienna House Easy Cracow</h6>
                                                </div>
                                                <div class="">
                                                    <span class="fw-bold" style="color: #14d014;">Save &euro;4</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="h-date d-flex align-items-center" style="margin-left: -8px;">
                                                    <img src="{{ asset('assets/images/icons/order-hotel-icon.png') }}"
                                                        alt="">
                                                    <p class="m-0 pe-2">Mar 23, 2020</p>
                                                    <img src="{{ asset('assets/images/icons/order-h-eroow.png') }}"
                                                        alt="">
                                                    <p class="m-0 ps-2">Jun 12, 2020</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <p class="m-0 pe-2 h-amount">$1278
                                                    </p><span class="h--totl text-muted">for 1 nights</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="h-pepl d-flex align-items-center" style="margin-left: -8px;">
                                                    <img src="{{ asset('assets/images/icons/order-hotel-icon2.png') }}"
                                                        alt="">
                                                    <p class="m-0 ">2 Guests, 1 Infant</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                   <a href="javascript:;" style="color: #000"><span class="text-uppercase fw-bold" style="font-size: 13px;"><i class="fa-regular fa-heart"></i> favorite</span></a>
                                                    <a href="javascript:;" class="btn offer--button ms-2">View offers</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4">
                                    <div class="booking--inner-box d-flex">
                                        <div class="hotel_book_img">
                                            <img src="{{ asset('storage/hotels/01.jpg') }}">
                                        </div>
                                        <div class="inner-right-content">
                                            <div
                                                class="title--with-price d-flex justify-content-between akign-items-center mb-1">
                                                <div class="title--badge">
                                                    <span class="badge"
                                                        style="background-color: #eef1f7;color: #8195a8;font-size: 13px;">Hotel</span>
                                                </div>
                                                <div class="title-price--tage">
                                                    <sup class="me-1"> &euro;</sup><span class="fs-5 fw-normal">84</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="">
                                                    <h6 class="fw-bold mb-0">Chatrium Hotel Riverside Carcow</h6>
                                                </div>
                                                <div class="">
                                                    <span class="fw-bold" style="color: #14d014;">Save &euro;4</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="h-date d-flex align-items-center" style="margin-left: -8px;">
                                                    <img src="{{ asset('assets/images/icons/order-hotel-icon.png') }}"
                                                        alt="">
                                                    <p class="m-0 pe-2">Mar 23, 2020</p>
                                                    <img src="{{ asset('assets/images/icons/order-h-eroow.png') }}"
                                                        alt="">
                                                    <p class="m-0 ps-2">Jun 12, 2020</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <p class="m-0 pe-2 h-amount">$1278
                                                    </p><span class="h--totl text-muted">for 1 nights</span>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="h-pepl d-flex align-items-center" style="margin-left: -8px;">
                                                    <img src="{{ asset('assets/images/icons/order-hotel-icon2.png') }}"
                                                        alt="">
                                                    <p class="m-0 ">2 Guests, 1 Infant</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                   <a href="javascript:;" style="color:#000"> <span class="text-uppercase fw-bold" style="font-size: 13px;"><i class="fa-solid fa-heart" style="color: red;"></i> saved</span></a>
                                                    <a href="javascript:;" class="btn offer--button ms-2">View offers</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-0 text-center text-sm-start align-items-center mb-4">
                                    <div class="col-sm-6">
                                        <div>
                                            <p class="mb-sm-0 text-muted">Showing <span class="fw-semibold">1</span> to <span class="fw-semibold">10</span> of <span class="fw-semibold">12</span> entries</p>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-sm-6">
                                        <ul class="pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                                            <li class="page-item disabled">
                                                <a href="#" class="page-link">Previous</a>
                                            </li>
                                            <li class="page-item active">
                                                <a href="#" class="page-link">1</a>
                                            </li>
                                            <li class="page-item ">
                                                <a href="#" class="page-link">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">Next</a>
                                            </li>
                                        </ul>
                                    </div><!-- end col -->
                            </div>

                            {{-- <div class="table-responsive table-card">
                                        <table class="table align-middle table-nowrap mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col" style="width: 46px;">
                                                        <div class="form-check ps-1">
                                                            <label class="form-check-label" for="cardtableCheck">+</label>
                                                        </div>
                                                    </th>
                                                    <th scope="col">Hotel Name</th>
                                                    <th scope="col">Trip Date</th>
                                                    <th scope="col">Nights</th>
                                                    <th scope="col">Guests</th>
                                                    <th scope="col">Traveller</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="cardtableCheck01">
                                                            <label class="form-check-label" for="cardtableCheck01"></label>
                                                        </div>
                                                    </td>
                                                    <td><a href="#"
                                                            class="fw-medium d-flex align-items-center"><img
                                                                style="max-width: 60px;width: 100%;"
                                                                src="{{ asset('storage/hotels/02.jpg') }}" alt="">
                                                            <div class="ps-4 text-dark">
                                                                <h5 class="mb-0">japanice hotels</h5>
                                                                <h6 class="mb-0 text-muted">japanice hotels</h6>
                                                            </div>
                                                        </a></td>
                                                    <td>07 Oct, 2021</td>
                                                    <td>6 Nights</td>
                                                    <td>6 Guests</td>
                                                    <td>William Elmore</td>
                                                    <td>IDR 2,100,00</td>
                                                    <td><span class="badge bg-success">Paid</span></td>
                                                    <td class="pe-4">
                                                        <div class="dropdown">
                                                            <a href="#" role="button" id="dropdownMenuLink1"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-solid fa-ellipsis-vertical text-dark"></i>
                                                            </a>

                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                                <li><a class="dropdown-item" href="#">View</a></li>
                                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="cardtableCheck01">
                                                            <label class="form-check-label" for="cardtableCheck01"></label>
                                                        </div>
                                                    </td>
                                                    <td><a href="#"
                                                            class="fw-medium d-flex align-items-center"><img
                                                                style="max-width: 60px;width: 100%;"
                                                                src="{{ asset('storage/hotels/02.jpg') }}" alt="">
                                                            <div class="ps-4 text-dark">
                                                                <h5 class="mb-0">Mesuireans hotels</h5>
                                                                <h6 class="mb-0 text-muted">Tokyo</h6>
                                                            </div>
                                                        </a></td>
                                                    <td>04 Dec, 2017</td>
                                                    <td>4 Nights</td>
                                                    <td>5 Guests</td>
                                                    <td>Tony William</td>
                                                    <td>IDR 19,299,10</td>
                                                    <td><span class="badge bg-danger">Canceled</span></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" role="button" id="dropdownMenuLink1"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-solid fa-ellipsis-vertical text-dark"></i>
                                                            </a>

                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                                <li><a class="dropdown-item" href="#">View</a></li>
                                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="cardtableCheck01">
                                                            <label class="form-check-label" for="cardtableCheck01"></label>
                                                        </div>
                                                    </td>
                                                    <td><a href="#"
                                                            class="fw-medium hotelimg_box d-flex align-items-center"><img
                                                                style="max-width: 60px;width: 100%;"
                                                                src="{{ asset('storage/hotels/02.jpg') }}" alt="">
                                                            <div class="ps-4 text-dark">
                                                                <h5 class="mb-0">japanice hotels</h5>
                                                                <h6 class="mb-0 text-muted">london</h6>
                                                            </div>
                                                        </a></td>
                                                    <td>07 Oct, 2021</td>
                                                    <td>6 Nights</td>
                                                    <td>6 Guests</td>
                                                    <td>William Elmore</td>
                                                    <td>IDR 2,100,00</td>
                                                    <td><span class="badge bg-success">Paid</span></td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" role="button" id="dropdownMenuLink1"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-solid fa-ellipsis-vertical text-dark"></i>
                                                            </a>

                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                                <li><a class="dropdown-item" href="#">View</a></li>
                                                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
  <!-- project list init -->
  <script src="{{ asset('assets/js/pages/project-list.init.js') }}"></script>
@endpush
