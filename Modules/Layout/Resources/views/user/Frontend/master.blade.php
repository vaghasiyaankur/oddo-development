@php
    $logoFavicon = Modules\Frontend\Http\Controllers\HomeController::logoFavicon();
    $generalSetting = App\Models\GeneralSetting::first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name ="description" content="@yield('meta_description', 'page Odda-development')">
    <meta name ="keywords" content="@yield('meta_keywords', 'page,Odda-development')">
    <meta name="author" content="Odda">
    <title>{{ $generalSetting->site_name }} / @yield('title')</title>
    <link rel="shortcut icon" href="{{ $logoFavicon->favicon == null ? asset('storage/'.$logoFavicon->default_favicon) : asset('storage/'.$logoFavicon->favicon) }}">
    <!------- Bootstrap CSS Link------->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!------- Fontawsomee cdn link ------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />



    <!------- Font Family Link ------->
    <link rel="stylesheet" href="{{ asset('assets/fonts/stylesheet.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">

    <!-------- Slick css cdn ------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" />

    <!------ Swiper css link ------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css">

    <!------- select2 css link ------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css">

    <!------ Datepiker cdn ------->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.css" />

    <!------- Timepiker css Link------->
    <link rel="stylesheet" href="{{ asset('assets/css/timepiker.css') }}">

    <!-------- Custom CSS Link -------->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/reponsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style-responsive.css') }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Icons Css -->
    <link href="{{ asset('assets/Admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css">

    @stack('css')

    <style>
        .log_in_modal_ .btn-close {
            position: absolute;
            top: 14px;
            right: 13px;
            z-index: 10;
            box-shadow: none;
        }

        .log_in_modal_ .card {
            box-shadow: 0 0 19px rgb(0 0 1 / 15%);
        }

        .log_in_modal_ .card .log_in_btn {
            color: #fff;
            background-color: #6A78C7 ;
            border-color: #6A78C7;
        }

        .log_in_modal_ .card .log_in_btn:hover {
            color: #fff;
            background-color: #7e8de7;
            border-color: #6A78C7;
        }

        .log_in_modal_ .spinner-border{
            margin-top: 3px;
            float: right;
            width: 18px !important;
            height: 18px !important;
        }
        /* .daterangepicker {
            top: 869.391px !important;
            left: 1025px !important;
        } */
        .range_inputs {
            display: flex;
            justify-content: end;
            width: 100%;
            align-items: center;
        }
        .range_inputs .cancelBtn{
            border: 1px solid #d9c8c8;
            margin-top: 5px;
        }
        .ranges{
            width: 100%;
            padding: 0 56px;
        }

        .daterangepicker{
            top: 260.797px;
            left: 1323px;
            right: auto;
            max-width: 516px;
            /* width: 100%; */
        }
        @media screen and (max-width:1200px){
            header.header .navbar .navbar-nav .nav-item{
            padding-right: 8px;            
            }
            header.header .navbar .navbar-nav .nav-item a.nav-link{
                font-size: 13px;
                line-height: 26px;
            }
        }

        /* notification-button css */

        .notification-button {
            width: 100%;
            max-width: 30px;
            height: 100%;
            min-height: 30px;
            max-height: 30px;
            border-radius: 50%;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
            position: relative;
        }
        .notification-button .notification-box{
            top: 42px;
            left: 0;
            /* opacity: 0; */
            z-index: 9999;
            right: -17px;
            width: 335px;
            min-height: 212px;
            /* display: none; */
            /* visibility: hidden; */
            position: absolute;
            border-radius: 5px;
            backdrop-filter: blur(10px);
            background: rgb(255 255 255 / 90%);
            box-shadow: 0 0 5px rgb(185 185 185 / 30%);
            transition: all ease 0.2s;
        }
        .notification-button .notification-box::after {
            top: -20px;
            left: 5px;
            content: "";
            z-index: -1;
            position: absolute;
            transition: all 1s ease;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-top: 10px solid transparent;
            border-bottom: 10px solid rgb(255 255 255);
            filter: drop-shadow(0 0 0px rgb(247 55 87 / 30%));
        }
        .notification-button .notification-heading {
            font-size: 16px;
            color: #212529;
            line-height: 1.2;
            font-weight: 800;
            padding: 10px 20px;
            letter-spacing: 0.5px;
        }
        .notification-button .inner-box {
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: left;
            height: 100%;
            padding: 15px;
            border-top: 1px solid rgb(238 241 247);
        }
        .notification-button .notification-data {
            width: 100%;
            padding: 0 15px;
        }
        .notification-button .notification-img {
            width: 100%;
            max-width: 50px;
            height: 100%;
            max-height: 50px;
            min-height: 50px;
            border-radius: 50%;
            overflow: hidden;
        }
        
        .notification-button .notification-icon i{
            color: #42455a;
        }
        .notification-button .notification-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            min-height: 50px;
            max-width: 50px;
        }
        .notification-button .notification-data h5 {
            font-size: 16px;
            color: #42455a;
            margin-bottom: 0;
        }
        .notification-button .notification-data .data-time span {
            font-size: 14px;
            color: #959596;
        }
        .notification-button .notification-data .data-time span i {
            margin-right: 5px;
        }
        .notification-button .inner-box:hover{
            background-color: #eef1f782;
        }
        .notification-close-btn a{
            color: #42455a;
        }
        .notificationCount{
            width: 18px;
            height: 18px;
            text-align: center;
            justify-content: center;
            margin-left: 35px;
            margin-top: -13px;
        } 
        .data-content{
            margin-left: -3.5px;
            position: absolute;
            margin-top: -1px;
        } 
        .notification-empty{
            position: absolute;
            top: 40% !important;
            left: 20%;
            margin-left: 10px;
            text-align: center;
            color: black;
        } 
        .mobile-view-notification{
            display: none;
        }

        @media screen and (max-width:992px){
            .mobile-view-notification{
                display: flex;
                position: absolute;
                right: 78px;
                top: 33px;
            }
            .notification-button .notification-box{
                left: -295px;
            }
            .notification-box::after {
                top: -20px;
                right: 16px;
            }
            .notification-button .notification-box::after {
            top: -20px;
            left: 88%;
            width: 15px;
        }
        }
    </style>

</head>

<body>

    <!------- Main Url For javascript  ------->
    <input type="hidden" value="{{ URL::to('') }}" id="base_url">

    <!------- Header start  -------->
    @include('layout::user.includes.header')
    <!------- Header End ------->

    @yield('content')

    @if(!auth()->check())
        @include('frontend::auth.login')
        @include('frontend::auth.register')
        @include('frontend::auth.forget')
    @endif

    <!-------- Footer start -------->
    @include('layout::user.includes.footer')
    <!-------- Footer end -------->

    <!-------Jquery Cdn Link ------->

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>


    <!------- Bootstrap JS Link ------->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <!------- Swiper js cdn------->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/js/swiper.min.js"></script>

    <!------ slick js cdn -------->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>

    <!-------- select2 js link ------->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <!------Moment js cdn ------->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>

    <!------Datepiker js cdn ------->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/moment.min.js"></script>
    <script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.js"></script> --}}

    <!------- Timepiker js link ---------->

    <script src="{{ asset('assets/js/timepiker.js') }}"></script>

    <!-- icon picker js -->

    <script src="https://unpkg.com/codethereal-iconpicker@1.2.1/dist/iconpicker.js"></script>



    {{-- <script src="{{ asset('assets/Admin/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script> --}}

    <!-- Sweet Alerts js -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

    <script src="{{ asset('assets/Admin/assets/js/custom.js') }}"></script>

    @if (!auth()->check())
        <!-- password-addon init -->
        <script src="{{ asset('assets/Admin/assets/js/pages/password-addon.init.js') }}"></script> 
    @endif
@stack('script')

</body>

</html>
