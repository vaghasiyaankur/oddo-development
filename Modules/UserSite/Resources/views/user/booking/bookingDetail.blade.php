@extends('layout::user.UserSite.master')

@section('title', 'booking')
@section('meta_description', 'Page booking')
@section('meta_keywords', 'Page, booking')


@push('css')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<link rel="stylesheet" href="{{ asset('user/asset/css/user-style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" />
   <!------ Datepiker cdn ------->
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.css" />
<style>
    .booking-details{
        padding: 80px 0;
    }
    .booking-details .booking-title{
        border-bottom: 1px solid #DBDBDB;
        padding-bottom: 25px;
    }
    .booking-details .booking-title h1{
        font-weight: 750;
        font-size: 24px;
        line-height: 29px;
        color: #6A78C7;
    }
    .daterangepicker.opensright:after {
            left: 230px;
            border: none;
        }

    .daterangepicker.opensright:before {
        left: 229px;
        border: none;
    }

    .daterangepicker .calendar td,
    .daterangepicker .calendar th {
        min-width: 25px;
        font-size: 14px;
    }
    .daterangepicker .ranges{
        display: none;
    }
    .selectize-control.single .selectize-input:after {
        content: '\f107';
        display: block;
        position: absolute;
        top: 25%;
        right: 25px;
        margin-top: -3px;
        width: 0;
        height: 0;
        border:1px solid transparent;
        font-family: "Font Awesome 6 free"; 
	    font-weight: 900;
    }
    
    .selectize-control.single .selectize-input.dropdown-active:after {
        top: 100%;
        right: 17px;
        margin-top: -5px;
        border: 1px solid transparent;
        font-family: "Font Awesome 6 free";
        font-weight: 900;
        transform: rotate(179deg);
    }
    .selectize-dropdown-content .option{
        padding: 9px 10px;
    }
    .selectize-dropdown .active {
        background-color: rgb(21 110 174 / 20%);
        color: #156EAE;
        font-weight: 400;
        font-size: 16px;
        line-height: 19px;
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

    @media screen and (max-width:420px) {
        .daterangepicker {
            max-width: 209px !important;
        }
    }
    
</style>

@endpush

@section('content')
    <div class="booking-details">
        <div class="container">
           <div class="booking-title">
                <h1 class="text-center mb-0">Booking Details</h1>
           </div>
           <div class="booking-details-content pt-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Booking Number</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="3860300137">
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Customer Full Name*</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="John Smith">
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Customer Phone Number*</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="+91 82383 40644">
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Room Type</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Deluxe Room">
                        </div>
                        
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Number of Nights*</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="3">
                            <span style="color: #ED2E2E;">Number of night will be calculated based check-in & check-out date. </span style="color: #ED2E2E;">
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Subtotal (USD)</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="500.00">
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Total Rent (USD)</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="500.00">
                        </div>
                        <div class="mb-4">
                            <label for="inputState" class="form-label">Payment Status*</label>
                            <select id="select-state" placeholder="Pick a state...">
                                <option selected>Paid</option>
                                <option selected>Not Yet Paid</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Booking Date</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="3860300137">
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Customer Email*</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="John Smith">
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Room Name</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="John Smith">
                        </div>
                        <div class="mb-4 position-relative">
                            <div class="d-flex mb-2">
                                <label class="check-inout check-out-label">Check-In Date*</label>
                                <label class="check-inout check-out-label ps-5">Check-Out Date*</label>
                            </div>
                            <?php 
                                $checkInDate = Carbon\Carbon::tomorrow()->format('d/m/Y');
                                $checkOutDate = Carbon\Carbon::now()->addDays(2)->format('d/m/Y');
                                $CheckIn = request()->checkIn;
                                $CheckOut = request()->checkOut;
                            ?>
                            <div class="check-text-label">
                                <div class="input--text d-flex align-items-center checkInDiv mt-2">
                                    <input type="text" class="form-control input--control ps-xl-2"
                                        name="value_from_start_date" placeholder="{{ $checkInDate }}"
                                        data-datepicker="separateRange" value="{{ $CheckIn ? $CheckIn : $checkInDate }}" />
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Number of Guests*</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="3">
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Discount (USD)</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="0.00 %">
                        </div>
                        <div class="mb-4">
                            <label for="inputState" class="form-label">Payment Method*</label>
                            
                            <select id="select-state" placeholder="Pick a state...">
                                <option selected>Paid</option>
                                <option>Paytm</option>
                                <option>Google Pay</option>
                                <option>UPI</option>
                                <option>Phone Pay</option>
                                <option>Net Banking</option>
                            </select>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
@endsection


@push('scripts')
    <!------Datepiker js cdn ------->

    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/moment.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"></script>
    @include('usersite::user.booking.script')

 <script>
       $(document).ready(function () {
        $('select').selectize({
            sortField: 'text'
        });
    });
 </script>
@endpush
