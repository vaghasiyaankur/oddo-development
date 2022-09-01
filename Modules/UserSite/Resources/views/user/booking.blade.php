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
    <!------ Datepiker cdn ------->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.css" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> --}}

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

        /* .hotel--booking-box .booking--inner-box .inner-right-content {
                width: 100%;
                padding: 15px 20px;
            }

            .offer--button {
                padding: 6px 11px;
                background-color: #eef1f7 !important;
                color: #889cad !important;
                font-weight: 600;
                border-radius: 6px;
            } */

        /* .hotel--booking-box .page-item.active .page-link {
                z-index: 3;
                color: #fff !important;
                background-color: #6a78c7;
                border-color: #6a78c7;
            } */

        /* .page-link {
                color: #000;
            } */
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
                                            <a class="nav-link active" data-bs-toggle="tab" href="#nav-light-home"
                                                role="tab" aria-selected="false">
                                                All (38)
                                            </a>
                                        </li>
                                        <li class="nav-item order-3 order-lg-2">
                                            <a class="nav-link" data-bs-toggle="tab" href="#nav-light-profile"
                                                role="tab" aria-selected="false">
                                                Upcoming Booking (18)
                                            </a>
                                        </li>
                                        <li class="nav-item order-4 order-lg-3">
                                            <a class="nav-link " data-bs-toggle="tab" href="#nav-light-messages"
                                                role="tab" aria-selected="true">
                                                Past Booking (20)
                                            </a>
                                        </li>
                                        <li class="nav-item order-1 order-lg-4">
                                            <form>
                                                <a class="nav-link " role="tab" aria-selected="true"
                                                    name="value_from_start_date"s data-datepicker="separateRange">
                                                    <i class="fa-solid fa-calendar-days" style="color: #8195a8;"></i>
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Nav tabs -->
                            <div class="tab-content text-muted">
                                <div class="tab-pane active" id="nav-light-home" role="tabpanel">
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
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="hotel--title">
                                                            <h6 class="fw-bold mb-0">Vienna House Easy Cracow</h6>
                                                        </div>
                                                        <div class="title-price--tage">
                                                            <sup class="me-1"> &euro;</sup><span
                                                                class="fs-5 fw-normal">84</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="h-date d-flex align-items-center"
                                                            style="margin-left: -8px;">
                                                            <img src="{{ asset('assets/images/icons/order-hotel-icon.png') }}"
                                                                alt="">
                                                            <p class="m-0 pe-sm-2">Mar 23, 2020</p>
                                                            <img src="{{ asset('assets/images/icons/order-h-eroow.png') }}"
                                                                alt="">
                                                            <p class="m-0 ps-sm-2">Jun 12, 2020</p>
                                                        </div>
                                                        <div class="hotel--title-rate">
                                                            <span class="fw-bold" style="color: #14d014;">Save
                                                                &euro;4</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="h-pepl d-flex align-items-center"
                                                            style="margin-left: -8px;">
                                                            <img src="{{ asset('assets/images/icons/order-hotel-icon2.png') }}"
                                                                alt="">
                                                            <p class="m-0 ">2 Guests, 1 Infant</p>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <p class="m-0 pe-2 h-amount">$1278
                                                            </p><span class="h--totl text-muted">for 1 nights</span>
                                                        </div>
                                                        {{-- <div class="d-flex align-items-center">
                                                            <a href="javascript:;" style="color: #000"><span
                                                                    class="text-uppercase fw-bold"
                                                                    style="font-size: 13px;"><i
                                                                        class="fa-regular fa-heart"></i>
                                                                    favorite</span></a>
                                                            <a href="javascript:;" class="btn offer--button ms-2">View
                                                                offers</a>
                                                        </div> --}}
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
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="hotel--title">
                                                            <h6 class="fw-bold mb-0">Chatrium Hotel Riverside Carcow</h6>
                                                        </div>
                                                        <div class="title-price--tage">
                                                            <sup class="me-1"> &euro;</sup><span
                                                                class="fs-5 fw-normal">84</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="h-date d-flex align-items-center"
                                                            style="margin-left: -8px;">
                                                            <img src="{{ asset('assets/images/icons/order-hotel-icon.png') }}"
                                                                alt="">
                                                            <p class="m-0 pe-2">Mar 23, 2020</p>
                                                            <img src="{{ asset('assets/images/icons/order-h-eroow.png') }}"
                                                                alt="">
                                                            <p class="m-0 ps-2">Jun 12, 2020</p>
                                                        </div>
                                                        <div class="hotel--title-rate">
                                                            <span class="fw-bold" style="color: #14d014;">Save
                                                                &euro;4</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="h-pepl d-flex align-items-center"
                                                            style="margin-left: -8px;">
                                                            <img src="{{ asset('assets/images/icons/order-hotel-icon2.png') }}"
                                                                alt="">
                                                            <p class="m-0 ">2 Guests, 1 Infant</p>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <p class="m-0 pe-2 h-amount">$1278
                                                            </p><span class="h--totl text-muted">for 1 nights</span>
                                                        </div>
                                                        {{-- <div class="d-flex align-items-center">
                                                            <a href="javascript:;" style="color:#000"> <span
                                                                    class="text-uppercase fw-bold"
                                                                    style="font-size: 13px;"><i class="fa-solid fa-heart"
                                                                        style="color: red;"></i>
                                                                    saved</span></a>
                                                            <a href="javascript:;" class="btn offer--button ms-2">View
                                                                offers</a>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-0 text-center text-sm-start align-items-center mb-4 px-3">
                                            <div class="col-sm-6">
                                                <div>
                                                    <p class="mb-sm-0 text-muted">Showing <span
                                                            class="fw-semibold">1</span> to
                                                        <span class="fw-semibold">2</span> of <span
                                                            class="fw-semibold">2</span> entries
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-sm-6">
                                                <ul
                                                    class="pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                                                    <li class="page-item disabled">
                                                        <a href="#" class="page-link">Previous</a>
                                                    </li>
                                                    <li class="page-item ">
                                                        <a href="#" class="page-link">1</a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a href="#" class="page-link">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">Next</a>
                                                    </li>
                                                </ul>
                                            </div><!-- end col -->
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="nav-light-profile" role="tabpanel">
                                    <div class="row">
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
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="hotel--title">
                                                            <h6 class="fw-bold mb-0">Chatrium Hotel Riverside Carcow</h6>
                                                        </div>
                                                        <div class="title-price--tage">
                                                            <sup class="me-1"> &euro;</sup><span
                                                                class="fs-5 fw-normal">84</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="h-date d-flex align-items-center"
                                                            style="margin-left: -8px;">
                                                            <img src="{{ asset('assets/images/icons/order-hotel-icon.png') }}"
                                                                alt="">
                                                            <p class="m-0 pe-2">Mar 23, 2020</p>
                                                            <img src="{{ asset('assets/images/icons/order-h-eroow.png') }}"
                                                                alt="">
                                                            <p class="m-0 ps-2">Jun 12, 2020</p>
                                                        </div>
                                                        <div class="hotel--title-rate">
                                                            <span class="fw-bold" style="color: #14d014;">Save
                                                                &euro;4</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="h-pepl d-flex align-items-center"
                                                            style="margin-left: -8px;">
                                                            <img src="{{ asset('assets/images/icons/order-hotel-icon2.png') }}"
                                                                alt="">
                                                            <p class="m-0 ">2 Guests, 1 Infant</p>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <p class="m-0 pe-2 h-amount">$1278
                                                            </p><span class="h--totl text-muted">for 1 nights</span>
                                                        </div>
                                                        {{-- <div class="d-flex align-items-center">
                                                            <a href="javascript:;" style="color:#000"> <span
                                                                    class="text-uppercase fw-bold"
                                                                    style="font-size: 13px;"><i class="fa-solid fa-heart"
                                                                        style="color: red;"></i>
                                                                    saved</span></a>
                                                            <a href="javascript:;" class="btn offer--button ms-2">View
                                                                offers</a>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-0 text-center text-sm-start align-items-center mb-4 px-3">
                                            <div class="col-sm-6">
                                                <div>
                                                    <p class="mb-sm-0 text-muted">Showing <span
                                                            class="fw-semibold">1</span> to
                                                        <span class="fw-semibold">2</span> of <span
                                                            class="fw-semibold">2</span> entries
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-sm-6">
                                                <ul
                                                    class="pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                                                    <li class="page-item disabled">
                                                        <a href="#" class="page-link">Previous</a>
                                                    </li>
                                                    <li class="page-item ">
                                                        <a href="#" class="page-link">1</a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a href="#" class="page-link">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">Next</a>
                                                    </li>
                                                </ul>
                                            </div><!-- end col -->
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane " id="nav-light-messages" role="tabpanel">
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
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="hotel--title">
                                                            <h6 class="fw-bold mb-0">Vienna House Easy Cracow</h6>
                                                        </div>
                                                        <div class="title-price--tage">
                                                            <sup class="me-1"> &euro;</sup><span
                                                                class="fs-5 fw-normal">84</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="h-date d-flex align-items-center"
                                                            style="margin-left: -8px;">
                                                            <img src="{{ asset('assets/images/icons/order-hotel-icon.png') }}"
                                                                alt="">
                                                            <p class="m-0 pe-2">Mar 23, 2020</p>
                                                            <img src="{{ asset('assets/images/icons/order-h-eroow.png') }}"
                                                                alt="">
                                                            <p class="m-0 ps-2">Jun 12, 2020</p>
                                                        </div>
                                                        <div class="hotel--title-rate">
                                                            <span class="fw-bold" style="color: #14d014;">Save
                                                                &euro;4</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="h-pepl d-flex align-items-center"
                                                            style="margin-left: -8px;">
                                                            <img src="{{ asset('assets/images/icons/order-hotel-icon2.png') }}"
                                                                alt="">
                                                            <p class="m-0 ">2 Guests, 1 Infant</p>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <p class="m-0 pe-2 h-amount">$1278
                                                            </p><span class="h--totl text-muted">for 1 nights</span>
                                                        </div>
                                                        {{-- <div class="d-flex align-items-center">
                                                            <a href="javascript:;" style="color: #000"><span
                                                                    class="text-uppercase fw-bold"
                                                                    style="font-size: 13px;"><i
                                                                        class="fa-regular fa-heart"></i>
                                                                    favorite</span></a>
                                                            <a href="javascript:;" class="btn offer--button ms-2">View
                                                                offers</a>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-0 text-center text-sm-start align-items-center mb-4 px-3">
                                            <div class="col-sm-6">
                                                <div>
                                                    <p class="mb-sm-0 text-muted">Showing <span
                                                            class="fw-semibold">1</span> to
                                                        <span class="fw-semibold">2</span> of <span
                                                            class="fw-semibold">2</span> entries
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-sm-6">
                                                <ul
                                                    class="pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                                                    <li class="page-item disabled">
                                                        <a href="#" class="page-link">Previous</a>
                                                    </li>
                                                    <li class="page-item ">
                                                        <a href="#" class="page-link">1</a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a href="#" class="page-link">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">Next</a>
                                                    </li>
                                                </ul>
                                            </div><!-- end col -->
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
@endsection


@push('scripts')
    <!------Datepiker js cdn ------->

    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/moment.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.js"></script>

    <script>
        jQuery(document).ready(function() {
            jQuery('.date_checkin').datepicker({
                dateFormat: 'mm-dd-yy',
                startDate: '+1d'
            });
        });
        jQuery(document).ready(function() {
            jQuery('.date_checkout').datepicker({
                dateFormat: 'mm-dd-yy',
                startDate: '+1d'
            });
        });
        // js for multiselect datepiker calender start (hotelresult page)
        var separator = ' - ',
            dateFormat = 'MM/DD/YYYY';
        var options = {
            autoUpdateInput: false,
            autoApply: true,
            locale: {
                format: dateFormat,
                separator: separator,
            },
            opens: "right"
        };


        $('[data-datepicker=separateRange]')
            .daterangepicker(options)
            .on('apply.daterangepicker', function(ev, picker) {
                var boolStart = this.name.match(/value_from_start_/g) == null ? false : true;
                var boolEnd = this.name.match(/value_from_end_/g) == null ? false : true;

                var mainName = this.name.replace('value_from_start_', '');
                if (boolEnd) {
                    mainName = this.name.replace('value_from_end_', '');
                    $(this).closest('form').find('[name=value_from_end_' + mainName + ']').blur();
                }

                $(this).closest('form').find('[name=value_from_start_' + mainName + ']').val(picker.startDate.format(
                    dateFormat));
                $(this).closest('form').find('[name=value_from_end_' + mainName + ']').val(picker.endDate.format(
                    dateFormat));

                $(this).trigger('change').trigger('keyup');
            })
            .on('show.daterangepicker', function(ev, picker) {
                var boolStart = this.name.match(/value_from_start_/g) == null ? false : true;
                var boolEnd = this.name.match(/value_from_end_/g) == null ? false : true;
                var mainName = this.name.replace('value_from_start_', '');
                if (boolEnd) {
                    mainName = this.name.replace('value_from_end_', '');
                }

                var startDate = $(this).closest('form').find('[name=value_from_start_' + mainName + ']').val();
                var endDate = $(this).closest('form').find('[name=value_from_end_' + mainName + ']').val();

                $('[name=daterangepicker_start]').val(startDate).trigger('change').trigger('keyup');
                $('[name=daterangepicker_end]').val(endDate).trigger('change').trigger('keyup');

                if (boolEnd) {
                    $('[name=daterangepicker_end]').focus();
                }
            });
        // js for multiselect calender end (hotelresult page)
    </script>
@endpush
