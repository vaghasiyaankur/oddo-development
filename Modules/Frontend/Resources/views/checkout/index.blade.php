@extends('layout::user.Frontend.master')

@section('title')
    Checkout
@endsection


@push('css')
{{-- <link rel="stylesheet" href="https://kenwheeler.github.io/slick/slick/slick-theme.css"> --}}
@endpush


@section('content')


    <!---------CHECKOUT SECTION START----------->
    <section class="checkout-section">
        <div class="container">
            <div class="checkout-title text-center">
                <h5>Checkout</h5>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <div class="left-payment-box mx-auto ms-lg-auto">
                        <div class="payment-heading pt-4 pb-3">
                            <p class="m-0">Payment Information</p>
                        </div>
                        <div class="account-section">
                            <div class="l-payment-details ">
                                <div class="payment-details-box d-flex flex-md-wrap justify-content-between align-items-center">
                                    <div class="d-flex flex-md-wrap justify-content-between align-items-center">
                                        <img src="assets/images/icons/payment-icon.png" class="payment-icon" alt="">
                                        <div class="ps-sm-4 ps-2">
                                            <p class="m-0 masterc_details">Mastercard</p>
                                            <p class="m-0 masterc_details">•••• 0657</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-md-wrap justify-content-between align-items-center">
                                        <div class="expier_card_date">
                                            <p class="m-0 masterc_ex">Expires in</p>
                                            <p class="m-0 masterc_ex">06/22</p>
                                        </div>
                                        <img src="assets/images/icons/payment-cansel.png" class="payment_cansel" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account-section  mb-4">
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#add_credit_card"><button
                                    class="account-pass-btn mt-4">Add credit card</button></a>
                            <!------ CHANGE PASSWORD MODAL ------->
                            <div class="modal fade" id="add_credit_card" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-end">
                                            <button type="button" class="modal-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body d-flex align-items-center justify-content-center">
                                            <div class="modal-body-add-card text-center">
                                                <div class="modal-title mx-auto">
                                                    <h5>Add New Credit Card</h5>
                                                </div>
                                                <div class="modal-form">
                                                    <div class="row">
                                                        <div class="col-ld-12">
                                                            <div class="mb-4">
                                                                <p class="mb-1 text-start">Card Number</p>
                                                                <input type="password" class="form-control"
                                                                    id="exampleInputPassword1" value="1851138194523  ">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-4">
                                                                <p class="mb-1 text-start">Exp Month</p>
                                                                <input type="text" class="form-control p-2"
                                                                    id="exampleInputPassword1"value="Placeholder" >
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-4">
                                                                <p class="mb-1 text-start">Exp Year</p>
                                                                <input type="text" class="form-control p-2"
                                                                    id="exampleInputPassword1" value="Placeholder" >
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-4">
                                                                <p class="mb-1 text-start">CVC</p>
                                                                <input type="text" class="form-control p-2"
                                                                    id="exampleInputPassword1" value="Placeholder" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="javascript:;"><button class="account-pass-btn mt-3 mt-md-5">Add credit card</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-----------CHANGE PASSWORD POPUP END--------------->
                        </div>
                        <div class="bill-ibnfo mt-2 mb-4">
                            <p>Billing Information</p>
                        </div>
                        <div class="row">
                            <div class="col-md-4 pe-0">
                                <div class="mb-3 mb-md-4">
                                    <p class="m-0 text-start">First Name</p>
                                    <input type="text" class="form-control p-2" id="exampleInputPassword1"
                                        value="Andres">
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="mb-3 mb-md-4">
                                    <p class="m-0 text-start">Last Name</p>
                                    <input type="text" class="form-control p-2" id="exampleInputPassword1"
                                        value="Bernardo">
                                </div>
                            </div>
                            <div class="col-md-4 ps-0">
                                <div class="mb-3 mb-md-4 ms-3 ms-md-0">
                                    <p class="m-0 text-start">Phone Number</p>
                                    <input type="text" class="form-control p-2" id="exampleInputPassword1"
                                        value="Andres">
                                </div>
                            </div>
                            <div class="col-md-6 pe-0">
                                <div class="mb-3 mb-md-4">
                                    <p class="m-0 text-start">Address Line 1</p>
                                    <input type="text" class="form-control p-2" id="exampleInputPassword1"
                                        value="Calle 34 # 83 - 32">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 mb-md-4">
                                    <p class="m-0 text-start">Address Line 2</p>
                                    <input type="text" class="form-control p-2" id="exampleInputPassword1"
                                        value="Calle 34 # 83 - 32">
                                </div>
                            </div>
                            <div class="col-md-4 pe-0">
                                <div class="mb-3 mb-md-5">
                                    <p class="m-0 text-start">City</p>
                                    <input type="text" class="form-control p-2" id="exampleInputPassword1"
                                        value="Bogotá">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 mb-md-5">
                                    <p class="m-0 text-start">State</p>
                                    <input type="text" class="form-control p-2" id="exampleInputPassword1"
                                        value="Cundinamarca">
                                </div>
                            </div>
                            <div class="col-md-4 ps-0">
                                <div class="mb-5 ms-3 ms-md-0">
                                    <p class="m-0 text-start">Zip Code</p>
                                    <input type="text" class="form-control p-2" id="exampleInputPassword1"
                                        value="Bogotá">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="right-payment-box text-start mx-auto mx-lg-0">
                        <h5 class="pt-4 pb-3">Resume</h5>
                        <div class="hotel_r_details mb-3">
                            <div
                                class="icon-with_price d-flex flex-md-wrap justify-content-between align-items-center mb-1">
                                <div class="d-flex align-items-center">
                                    <img src="assets/images/icons/order-hotel-icon3.png" alt="">
                                    <p class="m-0 ms-3">Hotel Holiday Inn Madrid</p>
                                </div>
                                <p class="m-0">$1,245.00</p>
                            </div>
                            <div class="date-h-detail d-flex justify-content-between align-items-center mb-1 rp_pera">
                                <div class="d-flex align-items-center ms-5">
                                    <p class="m-0 me-2">Mar 23, 2020</p>
                                    <img src="assets/images/icons/order-h-eroow.png" alt="">
                                    <p class="m-0 ms-2">Jun 12, 2020</p>
                                </div>
                                <div class="">8 nights</div>
                            </div>
                            <p class="ms-5 mb-1 rp_pera">2 Guests, 1 Infant</p>
                            <p class="ms-5 mb-1 rp_pera">2 Rooms, 1 King, 2 Singles</p>
                        </div>
                        <div class="hotel_r_details mb-3">
                            <div
                                class="icon-with_price d-flex flex-md-wrap justify-content-between align-items-center mb-1">
                                <div class="d-flex align-items-center">
                                    <img src="assets/images/icons/order-hotel-icon3.png" alt="">
                                    <p class="m-0 ms-3">Hotel Hilton Barcelona</p>
                                </div>
                                <p class="m-0">$2,245.00</p>
                            </div>
                            <div class="date-h-detail d-flex justify-content-between align-items-center mb-1 rp_pera">
                                <div class="d-flex align-items-center ms-5">
                                    <p class="m-0 me-2">Jun 13, 2020</p>
                                    <img src="assets/images/icons/order-h-eroow.png" alt="">
                                    <p class="m-0 ms-2">Jun 24, 2020</p>
                                </div>
                                <div class="">12 nights</div>
                            </div>
                            <p class="ms-5 mb-1 rp_pera">2 Guests, 1 Infant</p>
                            <p class="ms-5 mb-1 rp_pera">2 Rooms, 1 King, 2 Singles</p>
                        </div>
                        <div class="uber_rent ms-2 mb-3">
                            <div
                                class="icon-with_price d-flex flex-wrap justify-content-between align-items-center mb-1">
                                <div class="d-flex align-items-center">
                                    <img src="assets/images/icons/uber-rent.png" alt="">
                                    <p class="m-0 ms-4">Uber Ride</p>
                                </div>
                                <p class="m-0">$500.00</p>
                            </div>
                            <p class="text-end rp_pera">20 rides</p>
                        </div>
                        <div class="car_rent ms-2 ps-1 mb-4">
                            <div
                                class="icon-with_price d-flex flex-wrap justify-content-between align-items-center mb-1">
                                <div class="d-flex align-items-center">
                                    <img src="assets/images/icons/car-rent.png" alt="">
                                    <p class="m-0 ms-4">Car Rental</p>
                                </div>
                                <p class="m-0">$1,200.00</p>
                            </div>
                            <div class="date-h-detail d-flex justify-content-between align-items-center mb-1 rp_pera">
                                <div class="d-flex align-items-center ms-4 ps-3">
                                    <p class="m-0 me-2">Jun 13, 2020</p>
                                    <img src="assets/images/icons/order-h-eroow.png" alt="">
                                    <p class="m-0 ms-2">Jun 24, 2020</p>
                                </div>
                                <div class="">5 nights</div>
                            </div>
                        </div>
                        <span class="h_r_line d-none d-md-block"></span>
                        <p class="pt-4 text-end border-top">Total:<span class="ps-4">$4,550.00</span></p>
                    </div>
                    <div class="account-section d-flex justify-content-center justify-content-lg-start ms-lg-5 ps-lg-5 mb-4">
                        <a href="javascript:;"><button class="account-pass-btn mt-3">Confirm and Pay</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------CHECKOUT SECTION START----------->   

@endsection
@push('script')
<script>
    // planner-accordion swiper js
    $('.p-a-swpier').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        speed: 300,
        loop: true,
        accessibility: false,
        dots: false,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
        ]
    });
</script>
<script>
    $('.modal').on('shown.bs.modal', function (e) {
        $('.slider-single').slick('setPosition');
        $('.swiper').addClass('open');
    })
    $('.modal').on('shown.bs.modal', function (e) {
        $('.slider-nav').slick('setPosition');
        $('.swiper').addClass('open');
    })
</script>

<script>
    // dropdown with img js
    $(function () {
        // Set
        var main = $('div.mm-dropdown .textfirst')
        var li = $('div.mm-dropdown > ul > li.input-option')
        var inputoption = $("div.mm-dropdown .option")
        var default_text = 'Select<img src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-arrow-down-b-128.png" width="10" height="10" class="down" />';

        // Animation
        main.click(function () {
            main.html(default_text);
            li.toggle('fast');
        });

        // Insert Data
        li.click(function () {
            // hide
            li.toggle('fast');
            var livalue = $(this).data('value');
            var lihtml = $(this).html();
            main.html(lihtml);
            inputoption.val(livalue);
        });
    });
</script>
<script>
    // DATE PIKER JS CALENDER
    $(function () {
        $("#p_a_from").datepicker({
            dateFormat: "dd-mm-yy",
            duration: "fast"
        });
    });
    $(function () {
        $("#p_a_to").datepicker({
            dateFormat: "dd-mm-yy",
            duration: "fast"
        });
    });

</script>

<!-- ==============DAILY TAB TIME SWIPER================= -->
<script>
    // <!---------SUB TITLE SWIPER JS--------->
    $(document).ready(function () {
        // Assign some jquery elements we'll need
        var $swiper = $(".swiper-container");
        var $bottomSlide = null; // Slide whose content gets 'extracted' and placed
        // into a fixed position for animation purposes
        var $bottomSlideContent = null; // Slide content that gets passed between the
        // panning slide stack and the position 'behind'
        // the stack, needed for correct animation style

        var mySwiper = new Swiper(".swiper-container", {
            spaceBetween: 1,
            slidesPerView: 5,
            centeredSlides: true,
            roundLengths: true,
            loop: true,
            arrow: true,
            observer: true,
            observeParents: true,
            loopAdditionalSlides: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            }
        });
    });
    
    // $(document).on('click', '.click-down-arrow', function () {
    //     $(".slick-next").trigger('click')
    // })
</script>


@endpush
