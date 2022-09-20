@php $logoFavicon = Modules\Frontend\Http\Controllers\HomeController::logoFavicon() @endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>odda / @yield('title')</title>
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

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
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
    </style>
    
</head>

<body>

    <!------- Main Url For javascript  ------->
    <input type="hidden" value="{{ URL::to('') }}" id="base_url">

    <!------- Header start  -------->
    @include('layout::user.includes.header')
    <!------- Header End ------->

    @yield('content')
    @include('frontend::auth.login')
    @include('frontend::auth.register')
    @include('frontend::auth.forget')
    <!-------- Footer start -------->
    @include('layout::user.includes.footer')
    <!-------- Footer end -------->

    <!-------Jquery Cdn Link ------->

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.js"></script>

    <!------- Custom JS Link -----  -->

    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!------- Timepiker js link ---------->

    <script src="{{ asset('assets/js/timepiker.js') }}"></script>

    <!-- icon picker js -->

    <script src="https://unpkg.com/codethereal-iconpicker@1.2.1/dist/iconpicker.js"></script>

    <!-- password-addon init -->

    <script src="{{ asset('assets/Admin/assets/js/pages/password-addon.init.js') }}"></script>
    
    <script src="{{ asset('assets/Admin/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>

    <!-- Sweet Alerts js -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

    <script src="{{ asset('assets/Admin/assets/js/custom.js') }}"></script>

@stack('script')

</body>

</html>
