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
  <!-------- Custom CSS Link -------->
  <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/reponsive.css')}}">
  @stack('links')
  @stack('css')
</head>
<body>
  <!------- Main Url For javascript  -------->
  <input type="hidden" value="{{URL::to('')}}" id="base_url">

    <!------- Header start  -------->
    @include('layout::user.includes.header')
    <!------- Header End ------->

    @yield('content')

    <!-------- Footer start -------->
    @include('layout::user.includes.footer')
    <!-------- Footer end -------->




    <!-------Jquery Cdn Link ------->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!------- Bootstrap JS Link ------->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <!-------- select2 js link ------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!------- Swiper js cdn------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/js/swiper.min.js"></script>
    <!------ slick js cdn -------->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>

    @stack('script-link')

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