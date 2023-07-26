@extends('layout::user.UserSite.master')

@section('title')
Add-Layout
@endsection
@section('title', 'Calender')
@section('meta_description', 'Page Calender')
@section('meta_keywords', 'Page, Calender')

@push('css')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"> -->
<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="      ">  -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap-grid.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<link rel="stylesheet" href="{{asset('user/asset/css/user-style.css')}}">
<style>
   /* .calendar-wrapper {
   height: auto;
   max-width: 730px;
   margin: 0 auto;
} */

   .calendar-header {
      height: 100%;
      padding: 20px;
      color: #fff;
      /* font-family: 'Roboto', sans-serif; */
      font-weight: 300;
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
   }

   .blue.lighten-3 {
      background: rgba(106, 120, 199, 0.15) !important;
   }

   .header-background {
      background-image: url("../../assets/images/calender-header.png");
      height:125px;
      background-position: center;
      background-size: cover;
      width: 100%;
      background-repeat: no-repeat;
      background-color: #fff;
      border-radius: 10px 10px 0 0;
   }

   .calendar-content {
      background-color: #fff;
      padding: 30px 20px;
      overflow: hidden;
      border-radius: 0 0 10px 10px;
   }

   .calendar-wrapper.z-depth-2 {
      filter: drop-shadow(0px 0px 1.222775936126709px rgba(80, 89, 126, 0.02)) drop-shadow(0px -1.8700000047683716px 3.380819082260132px rgba(80, 89, 126, 0.04)) drop-shadow(0px 0px 8.13970947265625px rgba(80, 89, 126, 0.05)) drop-shadow(0px 17px 27px rgba(80, 89, 126, 0.07));
      border-radius: 10px;
   }

   .emptyForm {
      padding: 20px;
      padding-left: 15%;
      padding-right: 15%;
   }

   .emptyForm h4 {
      color: #fff;
      margin-bottom: 2rem;
   }

   h2#month-name ,h5#todayDayName{
      color: #393C52;
      text-align: center;
      font-size: 20px;
      font-style: normal;
      font-weight: 700;
      line-height: 24px;
   }

   /* h5#todayDayName {
      font-size: 24px;
      line-height: 34px;
      margin-top: 12px;
      margin-bottom: 9px;
      color: #353535;
   } */

   #table-body .col:hover {
      cursor: pointer;
      /* border: 1px solid grey; */
      background-color: #E0E0E0;
   }

   .empty-day:hover {
      cursor: default !important;
      background-color: #fff !important;
   }

   #table-body .row .col {
      padding: .75rem;
   }

   #table-body .col {
      border: 1px solid transparent;
   }

   #table-body {}

   #table-body .row {
      margin-bottom: 0;
   }

   /* #table-body .col {
      padding-top: 0.5rem !important;
      padding-bottom: 0.5rem !important;
   } */

   #calendar-table {
      text-align: center;
      width: 100%;
      max-width: 90%;
      margin: 0 auto;
   }

   .prev-button {
      position: absolute;
      cursor: pointer;
      left: 34%;
      top: 47%;
      color: #393C52 !important;
   }

   .prev-button i ,.next-button i {
      font-size: 2em;
   }

   .next-button {
      position: absolute;
      cursor: pointer;
      right: 34%;
      top: 47%;
      color: #393C52 !important;
   }

   @media (max-width:992px) {
      .content-wrapper {
         margin-left: 0;
      }

      .mobile-header {
         display: block;
      }

      .calendar-wrapper {
         margin-top: 80px;
      }

      .sidebar-wrapper {
         background-color: #EEEEEE !important;
      }

      .sidebar-title {
         background-color: #5A649C !important;
      }

      .empty-message {
         color: black;
      }
   }

   @media (max-width:767px) {
      .content-wrapper .container {
         width: auto;
      }

      .calendar-content {
         padding-left: 5%;
         padding-right: 5%;
      }

      body .row {
         margin-bottom: 0;
      }
   }

   @media (max-width:450px) {
      .content-wrapper {
         padding-left: 0;
         padding-right: 0;
      }

      .content-wrapper .container {
         padding-left: 0;
         padding-right: 0;
      }
   }

   div.modal .modal-dialog {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 0;
    margin-bottom: 0;
}

.modal-content {
   background-color: white !important;
   border-radius: 10px;
   box-shadow: 0px 0.7698959708213806px 1.222775936126709px 0px rgba(0, 0, 0, 0.02), 0px 2.1286637783050537px 3.380819082260132px 0px rgba(0, 0, 0, 0.04), 0px 5.125002384185791px 8.13970947265625px 0px rgba(0, 0, 0, 0.05), 0px 17px 27px 0px rgba(0, 0, 0, 0.07);
}

.modal-title-text {
    font-size: 24px;
    font-weight: 500;
    color: #353535;
}
.modal .price-input-radio{
   border-radius: 3px;
   background: #6a78c70d;
   padding: 20px;
   margin: 20px 0;
}
.modal .price-input-radio .form-check-label ,.modal .price-input .form-check-label{
   color:  #A4A6BA;
   font-size: 18px;
   font-style: normal;
   font-weight: 500;
   line-height: normal;
}
.modal .price-input-radio .title-label,.modal .price-input .title-label{
   color:  #353535;
   font-size: 22px;
   font-style: normal;
   font-weight: 500;
   line-height: normal;
}
.modal .price-input{
   border-radius: 3px;
   background: #6a78c70d;
   padding: 20px;
}
.modal .price-input-radio .form-radio-btn{
   width: 15px;
   height: 15px;
   accent-color:#6A78C7;
}
.modal .price-input-radio .form-radio-btn[type="radio"]:checked .form-check-label{
   color: #A4A6BA;
}
.modal-save-button a{
   padding: 8px 30px;
   border-radius: 5px;
   background: #6A78C7;
   color: #FFF;
   font-size: 18px;
   font-weight: 600;
   min-width: 146px;
   max-width: 146px;
   display: inline-block;
}
.dog-example {
   width: 100%;
   padding: 10px;
   border-radius: 5px;
   border: 1px solid #A4A6BA;
   outline: none;
   font-size: 18px;
}

.modal-content .modal-content-inner {
    padding: 18px 22px;
}
.modal-header {
   padding: 0;
}
.modal .modal-close{
   position: absolute;
   bottom: 21%
}  
.modal .modal-close .modal-close-btn{
   width: 44px;
   height: 44px;
   border-radius: 100%;
   background:#ffffff66; 
   outline: none;
   border: none;
   cursor: pointer;
}
.calender-open-text{
   color: #1DB450;
   font-size: 12px;
   font-style: normal;
   font-weight: 700;
   line-height: 22px;
   margin-right: 10px;
}
.optionEdit{
   color: #6A78C7;
   border-radius: 1px;
   background: rgba(106, 120, 199, 0.15);
   padding: 5px;
}
.content-wrapper .calendar-content #table-header{
   margin-bottom: 20px;
}
.content-wrapper .calendar-content #table-header .col{
   color: #6A78C7;
   text-align: center;
   font-size: 18px;
   font-style: normal;
   font-weight: 600;
   line-height: 22px;
}
.content-wrapper .calendar-content #table-header .col{
   color: #393C52;
   text-align: center;
   font-size: 18px;
   font-style: normal;
   font-weight: 700;
   line-height: 16px;
}
.content-wrapper #price-div #price{
   color: #A4A6BA;
   font-size: 14px;
   font-style: normal;
   font-weight: 600;
   line-height: 22px;
}
@media (min-width:576px){
   .modal-dialog{
      max-width: 420px;
   }
}
</style>
@endpush


@section('content')
<section class="account-content">
   <div class="container">
      <div class="row py-4">
         @include('usersite::user.sidebar.sidebar')
         <div class="col-lg-10 col-md-10 col-12 right-side-content">
            <div id="tabs">
               <div class="col-xs-12 ">
                     <h2 class="hotelProperty_title mb-4">Calender & Pricing</h3>
                  <div class="main-wrapper">
                     <div class="content-wrapper  lighten-3">
                        <div class="calendar-wrapper z-depth-2">
                           <div class="header-background">
                              <div class="calendar-header">
                                 <a class="prev-button" id="prev">
                                    <i class="material-icons">keyboard_arrow_left</i>
                                 </a>
                                 <a class="next-button" id="next">
                                    <i class="material-icons">keyboard_arrow_right</i>
                                 </a>
                                 <div class="row header-title">
                                    <div class="header-text text-center">
                                       <h2 id="month-name">February</h2>
                                       <h5 id="todayDayName">Today is Friday 7 Feb</h5>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="calendar-content">
                              <div id="calendar-table" class="calendar-cells">
                                 <div id="table-header">
                                    <div class="row">
                                       <div class="col">Mon</div>
                                       <div class="col">Tue</div>
                                       <div class="col">Wed</div>
                                       <div class="col">Thu</div>
                                       <div class="col">Fri</div>
                                       <div class="col">Sat</div>
                                       <div class="col">Sun</div>
                                    </div>
                                 </div>
                                 <div id="table-body" class="">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- Modal -->
<div class="modal fade" id="date_2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-content-inner">
                <div class="modal-header pb-3 justify-content-center border--bottom">
                  <input type="hidden" class="" id='value-edit' value="">
                    <h5 class="modal-title-text mb-0 " id="staticBackdropLabel">Edit Price</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="price-input-radio">
                  <div class="mb-2">
                     <label class="title-label">Hotel</label>
                  </div>
                  <div class="form-check form-check-inline ps-0">
                     <input class="form-radio-btn" type="radio" name="showPrice" id="flexRadioDefault1" value="open" checked>
                     <label class="form-check-label" for="flexRadioDefault1">
                     Open
                     </label>
                  </div>
                  <div class="form-check form-check-inline">
                     <input class="form-radio-btn" type="radio" name="showPrice" value="close" id="flexRadioDefault2" >
                     <label class="form-check-label" for="flexRadioDefault2">
                     Close
                     </label>
                  </div>
               </div>
               <div class="price-input">
                  <label class="title-label mb-2" for="album_title">Price</label>
                  <input type="text" class="dog-example py-2" id="priceInput">
               </div>
               <div class="modal-save-button text-center mt-4">
                  <a href="javascript:;" id="edit-price-btn" data-id="0"
                        data-type="create" data-bs-dismiss="modal">Save</a>
               </div>
            </div>
        </div>
        <div class="modal-close">
           <button type="button" class="modal-close-btn" data-bs-dismiss="modal" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
           </button>
        </div>
    </div>
</div>
@endsection


@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
   integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
   integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<script>
   $(".button-collapse").sideNav();
   var calendar = document.getElementById("calendar-table");
   var gridTable = document.getElementById("table-body");
   var currentDate = new Date();
   var selectedDate = currentDate;
   var selectedDayBlock = null;
   var globalEventObj = {};

function createCalendar(date, side) {
   var currentDate = date;
   var startDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);

   var monthTitle = document.getElementById("month-name");
   var monthName = currentDate.toLocaleString("en-US", {
      month: "long"
   });
   var yearNum = currentDate.toLocaleString("en-US", {
      year: "numeric"
   });
   monthTitle.innerHTML = `${monthName} ${yearNum}`;

   if (side == "left") {
      gridTable.className = "animated fadeOutRight";
   } else {
      gridTable.className = "animated fadeOutLeft";
   }

   setTimeout(() => {
      gridTable.innerHTML = "";

      var newTr = document.createElement("div");
      newTr.className = "row";
      var currentTr = gridTable.appendChild(newTr);

      for (let i = 1; i < (startDate.getDay() || 7); i++) {
         let emptyDivCol = document.createElement("div");
         emptyDivCol.className = "col empty-day";
         currentTr.appendChild(emptyDivCol);
      }

      var lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
      lastDay = lastDay.getDate();

      for (let i = 1; i <= lastDay; i++) {
         if (currentTr.children.length >= 7) {
            currentTr = gridTable.appendChild(addNewRow());
         }
         let currentDay = document.createElement("div");
         currentDay.className = "col";
         if (selectedDayBlock == null && i == currentDate.getDate() || selectedDate.toDateString() == new Date(currentDate.getFullYear(), currentDate.getMonth(), i).toDateString()) {
            selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), i);

            selectedDayBlock = currentDay;
            setTimeout(() => {
               currentDay.classList.add("blue");
               currentDay.classList.add("lighten-3");
               var element = currentDay.querySelector(".optionEdit");
               element.classList.remove("d-none");
               var calender_open = currentDay.querySelector(".calender-open-text");
               calender_open.classList.remove("d-none");
            }, 900);
         }
         currentDay.innerHTML = i;

         //show marks
         if (globalEventObj[new Date(currentDate.getFullYear(), currentDate.getMonth(), i).toDateString()]) {
            let eventMark = document.createElement("div");
            eventMark.className = "day-mark";
            currentDay.appendChild(eventMark);
         }

         currentTr.appendChild(currentDay);
      }

      for (let i = currentTr.getElementsByTagName("div").length; i < 7; i++) {
         let emptyDivCol = document.createElement("div");
         emptyDivCol.className = "col empty-day";
         currentTr.appendChild(emptyDivCol);
      }

      if (side == "left") {
         gridTable.className = "animated fadeInLeft";
      } else {
         gridTable.className = "animated fadeInRight";
      }

      function addNewRow() {
         let node = document.createElement("div");
         node.className = "row";
         return node;
      }

   }, !side ? 0 : 270);
}

createCalendar(currentDate);

var todayDayName = document.getElementById("todayDayName");
todayDayName.innerHTML = "Today is " + currentDate.toLocaleString("en-US", {
   weekday: "long",
   day: "numeric",
   month: "short"
});
var prevButton = document.getElementById("prev");
var nextButton = document.getElementById("next");

prevButton.onclick = function changeMonthPrev() {
   currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() - 1);
   createCalendar(currentDate, "left");
   setTimeout(() => {
      data = document.getElementById("table-body").childNodes;
      date(data, currentDate.getMonth() + 1, currentDate.getFullYear());
   }, 270);
}
nextButton.onclick = function changeMonthNext() {
   currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1);
   createCalendar(currentDate, "right");
   setTimeout(() => {
      data = document.getElementById("table-body").childNodes;
      date(data, currentDate.getMonth() + 1, currentDate.getFullYear());
   }, 270);
}

gridTable.onclick = function (e) {

   if (!e.target.classList.contains("col") || e.target.classList.contains("empty-day")) {
      return;
   }

   if (selectedDayBlock) {
      if (selectedDayBlock.classList.contains("blue") && selectedDayBlock.classList.contains("lighten-3")) {
         selectedDayBlock.classList.remove("blue");
         selectedDayBlock.classList.remove("lighten-3");
         var element = selectedDayBlock.querySelector(".optionEdit");
         element.classList.add("d-none");
         var calender_open = selectedDayBlock.querySelector(".calender-open-text");
         calender_open.classList.add("d-none");
      }
   }

   selectedDayBlock = e.target;
   selectedDayBlock.classList.add("blue");
   selectedDayBlock.classList.add("lighten-3");
   var element = selectedDayBlock.querySelector(".optionEdit");
   element.classList.remove("d-none");
   var calender_open = selectedDayBlock.querySelector(".calender-open-text");
   calender_open.classList.remove("d-none");


   selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), parseInt(e.target.innerHTML));
   
}

var changeFormButton = document.getElementById("changeFormButton");
var addForm = document.getElementById("addForm");




function date(data, month, year){  
   var uuid = window.location.pathname.split('/').pop();
   var url = "{{ route('calender.priceShow', ['uuid' => 'placeholder']) }}";
   url = url.replace('placeholder', uuid);

   $.ajax({
      type: "POST",
      data: { month: month, year : year },
      url: url,
      success: function (response) {
         $(data).each(function(item){
            $($(this).children(".col").not('.empty-day')).each(function(val){
               var date = $(this).text();
               var price = response.calendarData[date];
               // $(this).html(date+'<div class="d-flex justify-content-evenly" id="price-div"><p class="m-0 price_'+date+'" data-date="'+date+'" id="price">$ '+price+'</p><a class="optionEdit d-none" data-bs-toggle="modal" data-bs-target="#date_'+date+'"><i class="fa-solid fa-marker"></i></a></div>');
               $(this).html(date+'<div class="" id="price-div"><p class="m-0 price_'+date+'" data-date="'+date+'" id="price">$ '+price+'</p><p class="mb-0"><span class="calender-open-text d-none">Open</span><a class="optionEdit d-none" data-bs-toggle="modal" data-bs-target="#date_'+date+'"><i class="fa-solid fa-pencil"></i></a></p></div>');
            });
         });
      }
   });
}

var d = new Date();
var day = d.getDate();
var datePrice = $('#value-edit').val(day);
var col = $('.modal').attr('id','date_'+day);

$(document).ready(function(){
   var data =$('#table-body').children('.row');
   date(data, currentDate.getMonth() + 1, currentDate.getFullYear());

   $(document).on('click', '.col',function(){
      var dates = $(this).children('#price-div').children('#price').attr('data-date');
      var datePrice = $('#value-edit').val(dates);
      var col = $('.modal').attr('id','date_'+dates);
   });

   $(document).on('click', '#edit-price-btn', function(){
      var price = $('#priceInput').val();
      var dateValue = $('#value-edit').val();
      var hotel = $('input[name="showPrice"]:checked').val();
      var date = $('.price_'+dateValue).text('$ '+price);
      if(hotel == 'close'){
         var close = $('.price_'+dateValue).html('<p class="text-danger">Close</p>');
      }else{
         if(price != ''){
            var date = $('.price_'+dateValue).text('$ '+price);
         }else{
            var date = $('.price_'+dateValue).text('$ 400');
         }
      }
   });

   $(document).on('change', 'input[name="showPrice"]', function(){
      var hotel = $('input[name="showPrice"]:checked').val();
      if(hotel == 'close'){
         $('.price-input').hide();
      }else{
         $('.price-input').show();
      }
   });
});
</script>
@endpush

{{-- <a data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-marker"></i></a> --}}
{{-- document.getElementById('price').textContent --}}