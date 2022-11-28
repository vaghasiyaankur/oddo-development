@extends('layout::user.Frontend.master')

@section('title', 'Contact Us')
@section('meta_description', 'contactus')
@section('meta_keywords', 'contactus')
@push('css')
    <style>
        .contact-us-title {
            text-align: center;
            padding: 40px 0 65px;
            margin: 0 auto;
            border-bottom: 1px solid rgba(224, 224, 224, 1);
        }
        .contact-us-title h5 {
            font-size: 32px;
            font-family: 'Avenir LT Std';
            color: #373e4a;
            font-weight: 500;
            line-height: 1.3;
        }
        .contact-us-title h6 {
            font-size: 22px;
            font-family: 'Avenir LT Std';
            color: #373e4a;
            font-weight: 500;
            line-height: 1.3;
        }
        .contactus-section {
            padding: 70px 0 100px;
        }
        .contact-right-area h3,.contact-info h6{
            font-family: 'Inter', sans-serif;
            color: #212121;
            font-weight: 700;
            margin: 0;
            line-height: 1.1;
            word-break: break-word;
        }
        .contactus-section .contact-wrapper {
            padding: 100px 0;
            position: relative;
        }
        .contactus-section .contact-wrapper .contact-wrapper-right-thumb {
            position: absolute;
            top: 0;
            right: 0;
            width: 60%;
            overflow: hidden;
            z-index: -1;
            height: 100%;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-image: url('../../storage/Property/hotel.webp');
        }
        .contactus-section .contact-wrapper .contact-wrapper-right-thumb::before {
            position: absolute;
            content: "";
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fafafa;
            opacity: 0.95;
        }
        .contactus-section .contact-left-area.bg_img {
            padding: 80px 110px;
            border-radius: 10px;
            height: 100%;
            overflow: hidden;
            z-index: -1;
            position: relative;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('../../storage/Property/hotel.webp');
        }
        .contactus-section .contact-left-area::before {
            position: absolute;
            content: "";
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #212121;
            opacity: 0.55;
            z-index: -1;
        }
        .contactus-section .contact-info-wrapper {
            padding: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            -webkit-border-radius: 8px;
            background-color: #fff;
        }
        .contactus-section .contact-info:first-child {
            padding-top: 0;
        }
        .contactus-section .contact-info {
            padding: 20px 0;
            border-bottom: 1px solid #f2f2f2;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }
        .contactus-section .contact-info .icon {
            width: 50px;
            height: 50px;
            -webkit-transform: translateY(3px);
            -ms-transform: translateY(3px);
            transform: translateY(3px);
            background: #859eeb;
            color: #fff;
            border-radius: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .contactus-section .contact-info .icon i {
            font-size: 19px;
            font-weight: 900;
            font-family: "Font Awesome 5 Free";
            -webkit-font-smoothing: antialiased;
            display: inline-block;
            font-style: normal;
            font-variant: normal;
            text-rendering: auto;
            line-height: 1;
        }
        .contactus-section .contact-info .content {
            width: calc(100% - 50px);
            padding-left: 20px;
        }
        .contactus-section .contact-right-area .description {
            font-size: 20px;
        }
        .contactus-section .contact-right-area {
            padding: 0 80px 0 50px;
        }
        .contactus-section label {
            color: #212121;
            margin-bottom: 8px;
            font-size: 15px;
            font-weight: 500;
        }
        .contactus-section .custom-icon-field {
            position: relative;
        }
        .contactus-section .custom-icon-field .form--control,
        .contactus-section .custom-icon-field .select {
            padding-left: 40px;
        }
        .contactus-section .form--control {
            padding: 10px 20px;
            border: 1px solid #e5e5e5;
            width: 100%;
            background-color: #fff;
            color: #363636;
            height: 45px;
            -webkit-border-radius: 5px;
        }
        .contactus-section .custom-icon-field>i {
            position: absolute;
            top: 0;
            left: 0;
            width: 38px;
            display: flex;
            padding-left: 15px;
            color: #c4c4c4;
            /* height: 100%; */
            font-weight: 900;
            margin-top: 15px;
            align-items: center;
        }
        .contactus-section textarea {
            min-height: 150px !important;
            resize: none;
            width: 100%;
        }
        .contactus-section .btn--base {
            background: #859eeb;
            color: #fff;
            transition: all 0.3s;
        }
        .contactus-section .contact-info a {
            color: #000;
        }
        .contactus-section .btn--base:hover{
            box-shadow: 0px 0px 12px rgb(0 0 0 / 35%);
            color: white;
        }

        /* --- MEDIA QUERRY START --- */

        @media screen and (max-width:1250px){
            .contactus-section .contact-right-area h3{
                font-size: 32px;
            }
            .contactus-section .contact-wrapper{
                padding: 80px 0;
            }
            .contactus-section .contact-right-area {
                padding: 0 50px 0 35px;
            }
            .contactus-section .contact-left-area.bg_img{
                padding: 65px 70px;
            }
            .contactus-section .contact-info-wrapper{
                padding: 40px 28px;
            }
            .contact-info .content p{
                font-size: 15px;
            }
        }
        @media screen and (max-width:992px){
            .contactus-section .contact-wrapper {
                padding: 0 0 40px;
            }
            .contactus-section .contact-wrapper .contact-wrapper-right-thumb{
                width: 100%;
                background: none;
            }
            .contactus-section .contact-wrapper .contact-wrapper-right-thumb::before{
                background-color: #fafafa00 !important;
            }
            .contactus-section .btn--base{
                display: flex;
                margin: 0 auto;
            }
            .contactus-section .contact-right-area {
                padding: 35px 50px 35px 35px;
                border: 1px solid #e5e5e5;
            }
        }
        @media screen and (max-width:768px){
            .contact-us-title h5{
                font-size: 26px;
            }
            .contact-us-title h6{
                font-size: 19px;    
            }
            .contact-us-title{
                padding: 45px 0;
            }
        }
        .spinner-border{
            margin-top: 3px;
            float: right;
            left: 55px;
            width: 18px !important;
            height: 18px !important;
        }
        /* .loadingBtn{
            width: 131px !important;
            height: 38px !important;
            bottom: 1% !important;
            background-color: white;
        } */
        @media screen and (max-width:992px){
            .spinner-border{
                left: 49%;
            }
        }
    </style>
@endpush

@section('content')
<div class="contact-us-title container">
    <h5>Haven’t found what you’re looking for? </h5> <h6>Contact us</h6>
</div>
    <!-- contact section start -->
    <section class="contactus-section">
        <div class="container">
            <div class="contact-wrapper">
                <div class="contact-wrapper-right-thumb bg_img">
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="contact-left-area bg_img">
                            <div class="contact-info-wrapper">
                                <div class="contact-info-list">
                                    <div class="contact-info">
                                        <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                        <div class="content">
                                            <h6 class="title mb-1">Address</h6>
                                            <p>15205 North Kierland Blvd.</p>
                                        </div>
                                    </div><!-- contact-info end -->
                                    <div class="contact-info">
                                        <div class="icon"><i class="fas fa-envelope"></i></div>
                                        <div class="content">
                                            <h6 class="title mb-1">Email Address</h6>
                                            <p>
                                                <a href=""><span class="__cf_email__">Odda-devlopment.com</span></a>
                                            </p>
                                        </div>
                                    </div><!-- contact-info end -->
                                    <div class="contact-info">
                                        <div class="icon"><i class="fas fa-phone-alt"></i></div>
                                        <div class="content">
                                            <h6 class="title mb-1">Phone Number</h6>
                                            <p><a href="tel:123 - 4567890">123 - 4567890</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-lg-0 mt-4">
                        <div class="contact-right-area">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h3 class="title mb-2">Get In Touch With Us</h3>
                                    <p class="description">Do you have any question?</p>
                                </div>
                            </div>
                            <div id="success-div"></div>
                            <form method="post" action="" class="verify-gcaptcha contactForm" style="position: relative;margin-top:30px;">
                                @csrf
                                <input type="hidden" name="" value="">
                                <div class="mb-3">
                                    <label>Name</label>
                                    <div class="custom-icon-field">
                                        <input name="name" type="text" class="form--control name" value=""
                                            placeholder="Enter Your Name" required>
                                        <i class="fas fa-user-alt"></i>
                                        <span class="text-danger" id="name-error"></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <div class="custom-icon-field">
                                        <input name="email" type="email" class="form--control email" value=""
                                            placeholder="Enter Email Address" required>
                                        <i class="fas fa-envelope"></i>
                                        <span class="text-danger" id="email-error"></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Subject</label>
                                    <input name="subject" type="text" class="form--control subject" value=""
                                        placeholder="Enter Subject" required>
                                        <span class="text-danger" id="subject-error"></span>
                                </div>
                                <div class="mb-3">
                                    <label>Message</label>
                                    <textarea name="message" wrap="off" class="form--control message" placeholder="Write Message" required></textarea>
                                    <span class="text-danger" id="message-error"></span>
                                </div>
                                {{-- <button type="submit" class="btn btn--base ContactBtn">Send Message</button> --}}
                                <div class="mt-4 position-relative">
                                    <button type="submit" class="btn btn--base ContactBtn">Send Message</button>
                                    <div class="spinner-border" role="status" style="display: none;position: absolute;top:7px;color: rgb(120 134 211);">
                                        <span class="sr-only">Loading...</span>
                                    {{-- </div> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('script')
<script>
    
    $('#success-div').html('');

$(document).ready(function(){
    $(document).on('click','.ContactBtn',function(e){
        e.preventDefault();
        let name = $('.name').val();
            !name ? $(`#name-error`).html(`The name field is required.`) : $(`#name-error`).html(``);

        let email = $('.email').val();
            !email ? $(`#email-error`).html(`The email field is required.`) : $(`#email-error`).html(``);

        let subject = $('.subject').val();
            !subject ? $(`#subject-error`).html(`The subject field is required.`) : $(`#subject-error`).html(``);

        let message = $('.message').val();
            !message ? $(`#message-error`).html(`The message field is required.`) : $(`#message-error`).html(``);

        
        if (!name || !email || !subject || !message) {
            return;
        }

        formdata = new FormData();
        formdata.append('name', name);
        formdata.append('email', email);
        formdata.append('subject', subject);
        formdata.append('message', message);

        $('.spinner-border').show();
        $(".btn--base").css({"opacity": ".4"});
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('user.contact')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (response) {
                    
                    if (response.status == 1) {
                        $('.spinner-border').hide();
                        $('#success-div').html(` <div class="alert alert-borderless alert-success text-center p-1" role="alert"  style="position:absolute;margin-top:-10px;width:39%;">
                                            <span id="">`+response.success+`</span>
                                        </div>`);
                        setTimeout(function(){
                            $('#success-div').html(``);
                        }, 4000000);
                        $(".btn--base").css({ 'background-color' : '', 'opacity' : '' });
                        $('#name-error').text('');
                        $('#email-error').text('');
                        $('#subject-error').text('');
                        $('#message-error').text('');
                        $('.contactForm')[0].reset();
                    }else {
                        $('.spinner-border').hide();
                        $(".btn--base").css({ 'background-color' : '', 'opacity' : '' });
                        $('.contactForm')[0].reset();
                        $('#name-error').text(response.errors.name);
                        $('#email-error').text(response.errors.email);
                        $('#subject-error').text(response.errors.subject);
                        $('#message-error').text(response.errors.message);
                    }

                }, error:function (response) {
                }
            });

    });
});
</script>
@endpush
