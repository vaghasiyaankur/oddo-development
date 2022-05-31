<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>odda / @yield('title')</title>
    <!------- Bootstrap CSS Link------->  
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!------- Fontawsomee cdn link ------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <!------- Font Family Link ------->
    <link rel="stylesheet" href="{{asset('assets/fonts/stylesheet.css')}}">
    <!------- select2 css link ------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css">
    <!-------- Slick css cdn ------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <!------ Swiper css link ------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css">
    
    <!-------- Custom CSS Link -------->
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/reponsive.css')}}">
    <style>
      /* Css for select2  */
      .select2{
        width: 100% !important;
      }
      .select2-container--default .select2-selection--single .select2-selection__arrow{
        height: 38px;
      }
      .select2-container .select2-selection--single{
        height: 38px;
      }
      .select2-container--default .select2-selection--single{
        border: 1px solid #878996;
        border-radius: 5px;
      }
      .select2-container--default .select2-selection--single .select2-selection__rendered{
        color: #6A78C7;
        line-height: 35px;
      }
     /*------------- CALENDER CSS ------------*/
  .check-in-out .calendar {
      background: transparent;
      font-size: 14px;
      border: none;
      width: 100%;
    }
    
    .ui-datepicker {
      background: #ffffff !important;
      border-radius: 15px;
      width: 100%;
      max-width: 255px;
    }
    .ui-datepicker-header {
      height: 50px;
      line-height: 50px;
      color: #ffffff;
      background: #31639c;
    }
    
    .ui-datepicker-prev,
    .ui-datepicker-next {
      width: 20px;
      height: 20px;
      text-indent: 9999px;
      border-radius: 100%;
      cursor: pointer;
      overflow: hidden;
      margin-top: 12px;
    }
    
    .ui-datepicker-prev {
      float: left;
      margin-left: 12px;
    }
    
    .ui-datepicker-prev:after {
      transform: rotate(45deg);
      margin: -43px 0px 0px 8px;
    }
    
    .ui-datepicker-next {
      float: right;
      margin-right: 20px;
    }
    
    .ui-datepicker-next:after {
      transform: rotate(-135deg);
      margin: -43px 0px 0px 6px;
    }
    
    .ui-datepicker-prev:after,
    .ui-datepicker-next:after {
      content: "";
      position: absolute;
      display: block;
      width: 8px;
      height: 8px;
      border-left: 2px solid #ffffff;
      border-bottom: 2px solid #ffffff;
    }
    
    .ui-datepicker-prev:hover,
    .ui-datepicker-next:hover,
    .ui-datepicker-prev:hover:after,
    .ui-datepicker-next:hover:after {
      border-color: #333333;
    }
    
    .ui-datepicker-title {
      text-align: center;
      font-size: 15px;
    }
    
    .ui-datepicker-calendar {
      width: 100%;
      text-align: center;
      border: 1px solid lightgray;
    }
    
    .ui-datepicker-calendar thead tr th span {
      display: block;
      width: 28px;
      color: #31639c;
      margin-bottom: -2px;
      font-size: 14px;
    }
    
    .ui-state-default {
      display: block;
      text-decoration: none;
      color: #333333;
      line-height: 19px;
      font-size: 12px;
    }
    
    .ui-state-default:hover {
      color: #ffffff;
      background: #31639c;
      border-radius: 50px;
      transition: all 0.25s cubic-bezier(0.7, -0.12, 0.2, 1.12);
    }
    
    .ui-state-active {
      color: #ffffff;
      background-color: #31639c;
      border-radius: 50px;
    }
    
    .ui-datepicker-unselectable .ui-state-default {
      color: #eee;
      border: 2px solid transparent;
    }
    .calender_input_box{
        border: 1px solid #878996;
        border-radius: 5px;
        padding-left: 16px;
        padding-top: 6px;
        padding-bottom: 6px;
    }
    .calender_input_box .cal-icon {
        line-height: 0;
    }
    .calender_input_box .calendar:focus-visible {
      outline: -webkit-focus-ring-color auto 0px;
    }
/* ***** Calender end ******** */
    </style>

    @stack('css')

</head>
<body>
    <!------- Header start  -------->
    @include('user_site.layout.includes.header')
    <!------- Header End ------->

    @yield('content')

    <!-------- Footer start -------->
    @include('user_site.layout.includes.footer')
    <!-------- Footer end -------->




    <!-------Jquery Cdn Link ------->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!------- Bootstrap JS Link ------->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <!-------- select2 js link ------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!------- Swiper js cdn------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/js/swiper.min.js"></script>
    <!------ slick js cdn -------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>

    

  <script>
     //----  clander js checkin check-out  ----//
     jQuery(document).ready(function () {
            jQuery('#date_checkin').datepicker({
                dateFormat: 'mm-dd-yy',
                startDate: '+1d'
            });
        });
        jQuery(document).ready(function () {
            jQuery('#date_checkout').datepicker({
                dateFormat: 'mm-dd-yy',
                startDate: '+1d'
            });
        });
  </script>
    <!-- // Home page slider start -->
  <script>
    // Params
    var sliderSelector = '.swiper-container',
    options = {
      init: false,
      loop: true,
      speed:800,
      slidesPerView: 5, // or 'auto'
      spaceBetween: 10,
      centeredSlides : true,
      effect: 'coverflow', // 'cube', 'fade', 'coverflow',
      coverflowEffect: {
        rotate: 0, // Slide rotate in degrees
        stretch: -100, // Stretch space between slides (in px)
        depth: 200, // Depth offset in px (slides translate in Z axis)
        modifier: 1, // Effect multipler
        slideShadows : true, // Enables slides shadows
      },
      grabCursor: true,
      parallax: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        1023: {
          slidesPerView: 1,
          spaceBetween: 0
        }
      },
      // Events
      on: {
        imagesReady: function(){
          this.el.classList.remove('loading');
        }
      }
    };
  var mySwiper = new Swiper(sliderSelector, options);

  // Initialize slider
  mySwiper.init();

  
</script>
@stack('scripts')
  <!-- // Home page slider end -->
</body>
</html>