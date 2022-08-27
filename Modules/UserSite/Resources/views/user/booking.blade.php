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
        table thead th{
            background-color: #eef1f7 !important;
            color: #8195a8 !important;
        }
        .hotelimg_box img{
            max-width: 60px;
            width: 100%;
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
                        <div class="booking-title-text">
                            <h5 class="mb-4" style="color: #8195a8;font-weight: 600;">Bookings Details :</h5>
                        </div>
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="live-preview">
                                    <div class="table-responsive table-card">
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
                                    </div>
                                </div>
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
@endpush
