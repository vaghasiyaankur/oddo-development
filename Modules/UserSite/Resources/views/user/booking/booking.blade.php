@extends('layout::user.UserSite.master')

@section('title')
    Add-Layout
@endsection


@push('css')

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="{{ asset('user/asset/css/user-style.css') }}">
    <!------ Datepiker cdn ------->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.css" />

    <style>
        .daterangepicker.opensright:after {
            left: 230px;
            border: none;
        }

        .daterangepicker.opensright:before {
            left: 229px;
            border: none;
        }

        .daterangepicker {
            left: auto !important;
            right: 81px !important;
        }

        .daterangepicker .calendar td,
        .daterangepicker .calendar th {
            min-width: 25px;
            font-size: 14px;
        }

        @media screen and (max-width:1123px) {
            .calendar.left {
                max-width: 210px;
            }

            .daterangepicker_input {
                max-width: 202px;
            }

            .calendar.right {
                max-width: 188px;
            }

            .daterangepicker_input {
                max-width: 183px;
            }
        }

        @media screen and (max-width:699px) {
            .daterangepicker {
                left: 22px !important;
                right: auto !important;
            }
        }

        @media screen and (max-width:420px) {
            .daterangepicker {
                max-width: 209px !important;
            }
        }
    </style>
@endpush

@section('content')
    <section class="account-content" style="min-height: 608px;">
        <div class="container-fluid container-lg">
            <div class="row py-4">
                @include('usersite::user.sidebar.sidebar')
                <div class="col-lg-10 col-md-10 col-12 right-side-content px-3">
                        <div id="tabs">
                        <div class="hotel--booking-box">
                            <div
                                class="booking-title-text d-flex justify-content-between align-items-center flex-wrap mb-4">
                                <div class="right-sidetitle">
                                    <h5 class="mb-0 mt-2 mt-md-0" style="color: #8195a8;font-weight: 600;">Bookings Details
                                        :</h5>
                                </div>
                                <div class="rightside_content mt-3 mt-lg-0 overflow-auto">
                                    <ul class="nav nav-pills nav-custom nav-custom-light" role="tablist">
                                        <li class="nav-item order-2 order-lg-1">
                                            <a class="nav-link active selectFilter" data-bs-toggle="tab" href="#nav-light-home"
                                                role="tab" aria-selected="false" data-target="All">
                                                All ({{ $bookings->total() }})
                                            </a>
                                        </li>

                                        <li class="nav-item order-3 order-lg-2">
                                            <a class="nav-link selectFilter" data-bs-toggle="tab" href="#nav-light-profile"
                                                role="tab" aria-selected="false" data-target="upcomingBooking">
                                                Upcoming Booking ({{ $bookings->count() }})
                                            </a>
                                        </li>

                                        <li class="nav-item order-4 order-lg-3">
                                            <a class="nav-link selectFilter" data-bs-toggle="tab" href="#nav-light-messages"
                                                role="tab" aria-selected="true" data-target="pastBooking">
                                                Past Booking ({{ $bookings->count() }})
                                            </a>
                                        </li>

                                        <li class="nav-item order-1 order-lg-4">
                                            <form>
                                                <a class="nav-link" role="tab" aria-selected="true"
                                                    name="value_from_start_date" data-datepicker="separateRange">
                                                    <i class="fa-solid fa-calendar-days" style="color: #8195a8;"></i>
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Nav tabs -->
                            <div class="tab-content text-muted">
                                @include('usersite::user.booking.all')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
    <!------Datepiker js cdn ------->

    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/moment.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.js"></script>

    @include('usersite::user.booking.script')
@endpush
