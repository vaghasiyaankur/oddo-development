<!DOCTYPE html>
<html lang="en" data-layout="horizontal" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>odda / @yield('title')</title>
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/Admin/assets/css/style.css') }}">

    <!-- App favicon -->
    <link rel="stylesheet" href="{{ asset('assets/Admin/assets/css/favicon.ico') }}">

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

    <script src="{{ asset('assets/Admin/assets/js/plugins.js') }}"></script>

    <script src="{{ asset('assets/Admin/js/form-input-spin.init.js') }}"></script>

    <!-- input step init -->
    <script src="{{ asset('assets/Admin/assets/js/form-input-spin.init.js') }}"></script>

    <!-- ecommerce cart js -->
    <script src="{{ asset('assets/Admin/js/ecommerce-cart.init.js') }}"></script>

    <!-- icon picker js -->
    <script src="https://unpkg.com/codethereal-iconpicker@1.2.1/dist/iconpicker.js"></script>
    
    @stack('scripts')
</body>

</html>
