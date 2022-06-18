<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>odda / @yield('title')</title>
   <!------- Bootstrap CSS Link------->
   <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css') }}">
   <!------- Fontawsomee cdn link ------->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
   <!------- Font Family Link ------->
   <link rel="stylesheet" href="{{asset('assets/fonts/stylesheet.css') }}"> 
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
  <link rel="stylesheet" href="{{asset('assets/css/timepiker.css') }}">
  <!-------- Custom CSS Link -------->
  <link rel="stylesheet" href="{{asset('assets/css/custom.css') }}">
  <link rel="stylesheet" href="{{asset('assets/css/reponsive.css') }}">

  @stack('css')

</head>

<body>

<!------- Main Url For javascript  -------->
<input type="hidden" value="{{URL::to('')}}" id="base_url">

  <!------- Header start  -------->
@include('frontend::layouts.includes.header')
<!------- Header End ------->

@yield('content')

<!-------- Footer start -------->
@include('frontend::layouts.includes.footer')
<!-------- Footer end -------->


<!-------Jquery Cdn Link ------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!------- Bootstrap JS Link ------->
<script src="{{asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<!------- Swiper js cdn------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/js/swiper.min.js"></script>
<!------ slick js cdn -------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>
<!-------- select2 js link ------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!------Moment js cdn ------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
<!------Datepiker js cdn ------->
<script type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/moment.min.js"></script>
<script type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.js"></script>
<!------- Custom JS Link -----  -->
<script src="{{asset('assets/js/custom.js') }}"></script>
<!------- Timepiker js link ---------->
<script src="{{asset('assets/js/timepiker.js') }}"></script>

@stack('script')

</body>

</html>