@php $logoFavicon = Modules\Admin\Http\Controllers\AdminController::logoFavicon() @endphp
<!DOCTYPE html>
<html lang="en" data-layout="horizontal" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>odda / @yield('title')</title>
    <link rel="shortcut icon" href="{{ $logoFavicon->favicon == null ? asset('storage/'.$logoFavicon->default_favicon) : asset('storage/'.$logoFavicon->favicon) }}">

    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/Admin/assets/css/style.css') }}">

    <!-- App favicon -->
    <link rel="stylesheet" href="{{ asset('assets/Admin/assets/images/favicon.ico') }}">

    <!-- Layout config Js -->
    <script src="{{ asset('assets/Admin/assets/js/layout.js') }}"></script>

    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="{{ asset('assets/Admin/assets/css/bootstrap.min.css') }}">

    <!-- Icons Css -->
    <link rel="stylesheet" href="{{ asset('assets/Admin/assets/css/icons.min.css') }}">

    <!-- App Css-->
    <link rel="stylesheet" href="{{ asset('assets/Admin/assets/css/app.min.css') }}">

    <!-- custom Css-->
    <link rel="stylesheet" href="{{ asset('assets/Admin/assets/css/custom.min.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Sweet Alert css-->
    {{-- <link href="{{ asset('assets/Admin/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css">
    <style>
        .submenu_active {
            color: #0ab39c !important;
        }
        .navbar-menu .navbar-nav .nav-link{
            white-space: nowrap;
        }
        /* .navbar-nav{
            overflow: auto;
        } */

        /* dropdown menu start */
        .navbar-header .topbar-head-dropdown .dropdown-menu.show {
            position: absolute !important;
            right: 0;
            /* width: 100% !important;
            min-width: 320px !important; */
            top: 70px !important;
        }

        @media screen and (max-width:400px){
            .navbar-header .topbar-head-dropdown .dropdown-menu.show {
                right: -30px;
                max-width: 100% !important;
            }
        }
        .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 100000000;
        }
        .overlay .overlayDoor:before, .overlay .overlayDoor:after {
        content: "";
        position: absolute;
        width: 50%;
        height: 100%;
        background: #fff;
        transition: 0.5s cubic-bezier(0.77, 0, 0.18, 1);
        transition-delay: 0.8s;
        }
        .overlay .overlayDoor:before {
        left: 0;
        }
        .overlay .overlayDoor:after {
        right: 0;
        }
        .overlay.loaded .overlayDoor:before {
        left: -50%;
        }
        .overlay.loaded .overlayDoor:after {
        right: -50%;
        }
        .overlay.loaded .overlayContent {
        opacity: 0;
        margin-top: -15px;
        }
        .overlay .overlayContent {
        position: relative;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        transition: 0.5s cubic-bezier(0.77, 0, 0.18, 1);
        }



        .loader {
        width: 128px;
        height: 128px;
        border: 3px solid #0ab39c;
        border-bottom: 3px solid transparent;
        border-radius: 50%;
        position: relative;
        -webkit-animation: spin 1s linear infinite;
                animation: spin 1s linear infinite;
        display: flex;
        justify-content: center;
        align-items: center;
        }
        .loader .inner {
        width: 64px;
        height: 64px;
        border: 3px solid transparent;
        border-top: 3px solid #0ab39c;
        border-radius: 50%;
        -webkit-animation: spinInner 1s linear infinite;
                animation: spinInner 1s linear infinite;
        }

        @-webkit-keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
        }

        @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
        }
        @-webkit-keyframes spinInner {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(-720deg);
        }
        }
        @keyframes spinInner {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(-720deg);
        }
        }
    </style>
    @stack('css')

</head>
<body>
    <!------- Main Url For javascript  -------->
    <input type="hidden" value="{{URL::to('')}}" id="base_url">

    @include('layout::admin.includes.header')
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

        @yield('content')
        @include('layout::admin.includes.footer')
    </div>
    <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->


    <!-- jquery Cdn Link -------->
    <script src="{{ asset('assets/Admin/assets/js/jquery.min.js') }}"></script>


    <!----- Bootstrap cdn Link ------->
    <script src="{{ asset('assets/Admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/Admin/assets/libs/simplebar/simplebar.min.js') }}"></script>

    <script src="{{ asset('assets/Admin/assets/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('assets/Admin/assets/libs/feather-icons/feather.min.js') }}"></script>

    <script src="{{ asset('assets/Admin/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>

    <!-- Sweet Alerts js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

    <script src="{{ asset('assets/Admin/assets/js/custom.js') }}"></script>

    {{-- <script src="{{ asset('assets/Admin/assets/js/plugins.js') }}"></script> --}}

    <!-- input step init -->
    <script src="{{ asset('assets/Admin/assets/js/form-input-spin.init.js') }}"></script>

    <!-- ecommerce cart js -->
    {{-- <script src="{{ asset('assets/Admin/js/pages/ecommerce-cart.init.js') }}"></script> --}}

    <!-- icon picker js -->
    <script src="https://unpkg.com/codethereal-iconpicker@1.2.1/dist/iconpicker.js"></script>
    <script>
        $(document).ready(function() {
            $(".topnav-hamburger").click(function() {
                $("body").toggleClass('menu');
            });

            $(document).on("click", function(event) {
                var $trigger = $(".headerDiv");
                if ($trigger !== event.target && !$trigger.has(event.target).length) {
                    $(".notifactionDiv").removeClass("show");
                }
            });

            $('.btnNotificaion').click(function() {
                $('.notifactionDiv').toggleClass('show');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Users can skip the loading process if they want.
            $('.skip').click(function() {
                $('.overlay, body').addClass('loaded');
            })

            // Will wait for everything on the page to load.
            $(window).bind('load', function() {
                $('.overlay, body').addClass('loaded');
                setTimeout(function() {
                    $('.overlay').css({'display':'none'})
                }, 2000)
            });

            // Will remove overlay after 1min for users cannnot load properly.
            setTimeout(function() {
                $('.overlay, body').addClass('loaded');
            }, 60000);
        });
        $('#page-header-user-dropdown').on('click',function(){
            
        })
    </script>
    @stack('scripts')
</body>

</html>
