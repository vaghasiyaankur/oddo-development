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
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <title>{{ $generalSetting->site_name }} / @yield('title')</title>
  <meta name ="description" content="@yield('meta_description', 'page Odda-development')">
  <meta name ="keywords" content="@yield('meta_keywords', 'page,Odda-development')">
  <meta name="author" content="Odda">
  <link rel="shortcut icon" href="{{ $logoFavicon->favicon == null ? asset('storage/'.$logoFavicon->default_favicon) : asset('storage/'.$logoFavicon->favicon) }}">
  <!------- Bootstrap CSS Link------->
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
  <!------- Fontawsomee cdn link ------->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
  <!------- Font Family Link ------->
  <link rel="stylesheet" href="{{asset('assets/fonts/stylesheet.css')}}">
  <!-------- Custom CSS Link -------->
  <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/reponsive.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  {{-- @stack('links') --}}

  @stack('css')
  <style>
    /* notification-button css */

        .notification-button {
            width: 100%;
            max-width: 40px;
            height: 100%;
            min-height: 40px;
            max-height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-right: 25px;
            padding-top: 10px;
            position: relative;
            margin-right: 15px;
            border-right: 1px solid #B1BACA;
        }
        .notification-button .notification-icon i{
            color: #B4B8CF;
             font-size: 20px;
        }
        /* .notification-button:hover .notification-box{
            opacity: 1;
            visibility: visible;
        } */
        .notification-button .notification-box{
            top: 50px;
            right: -50px !important;
            /* opacity: 0; */
            z-index: 9999;
            right: -17px;
            width: 335px;
            min-height: 111px;
            /* display: none; */
            /* visibility: hidden; */
            position: absolute;
            border-radius: 5px;
            backdrop-filter: blur(10px);
            background: linear-gradient(2.29deg, #FFEEEE 2.02%, #FFFFFF 89.4%);
            box-shadow: 0px 1px 9px rgba(167, 82, 82, 0.3);
            transition: all ease 0.2s;
            border-bottom: 5px solid #DC3B3B;
        }
        .notification-button .notification-box::after {
            top: -20px;
            right: 72px;
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
            width: 17px;
            height: 17px;
            text-align: center;
            justify-content: center;
            margin-left: 36px;
            margin-top: -6px;
            background: #6A78C7;
        } 
        .data-content{
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        } 
        .notification-empty{
            position: absolute;
            top: 40% !important;
            left: 20%;
            margin-left: 10px;
            text-align: center;
            color: black;
        } 
  </style>
  
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
  <script>
    $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
   });
   $(document).ready(function(){

        $(document).on('click','.notification-button',function() {
            var countValue = $('.hotelCount').val();            
            if(countValue != 0){
                show();
            }
            $('.notification-box').toggle();
        });
        
            window.addEventListener('mouseup',function(event){
                    var pol = document.getElementById('box');
                    if(event.target != pol && event.target.parentNode != pol){
                        pol.style.display = 'none';
                    }
            }); 
       function show() {
           $.ajax({
               url: "{{route('bookingNotification.show')}}",
               type: 'post',
               dataType: "HTML",
               processData: false,
               contentType: false,
               success: function(response){
                   $('.notification-box').html(response);
               }
           });
       }

       $(document).on('click','.notification-close-btn', function(){
            $('.notification-button').removeProp('display','none');
            $('.notification-box').removeProp('display','none');
           var hotel_id = $(this).data('id');

           formdata = new FormData();
           formdata.append('hotel_id', hotel_id);

           $.ajax({
               url: "{{route('booking.delete')}}",
               type: "POST",
               processData: false,
               contentType: false,
               data: formdata,
               success: function (response) {
                   show();
               },
           });
       });

       notificationCount();
       setInterval(notificationCount,5000);
       show();  

       // count notifiation
       function notificationCount(){
           $.ajax({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               url: "{{route('booking.notification')}}",
               type: 'post',
               processData: false,
               contentType: false,
               success: function(response){
                   var count = $('.data-content').html(response.hotelCount);
                   $('.hotelCount').val(response.hotelCount);
               }
           });
       }
       
   });
   
</script>
@stack('scripts')
  <!-- // Home page slider end -->
</body>
</html>
