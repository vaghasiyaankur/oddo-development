@extends('layout::user.UserSite.master')

@section('title')
Add-Layout
@endsection


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
      background-color: rgba(18, 15, 25, 0.25);
      height: 100%;
      padding: 20px;
      color: #fff;
      /* font-family: 'Roboto', sans-serif; */
      font-weight: 300;
      position: relative;
   }

   .header-title {
      padding-left: 15%;
   }

   .blue.lighten-3 {
      background-color: #90CAF9 !important;
   }

   .header-background {
      background-image: url("https://raw.githubusercontent.com/JustMonk/codepen-resource-project/master/img/compressed-header.jpg");
      height: 200px;
      background-position: center right;
      background-size: cover;
   }

   .calendar-content {
      background-color: #fff;
      padding: 15px 20px;
      overflow: hidden;
   }

   .calendar-wrapper.z-depth-2 {
      box-shadow: 0 4px 5px 0 rgb(0 0 0 / 14%), 0 1px 10px 0 rgb(0 0 0 / 12%), 0 2px 4px -1px rgb(0 0 0 / 30%);
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

   h2#month-name {
      font-size: 43px;
      line-height: 53px;
      margin-top: 21px;
      margin-bottom: 17px;
   }

   h5#todayDayName {
      font-size: 24px;
      line-height: 34px;
      margin-top: 12px;
      margin-bottom: 9px;
   }

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

   #table-body .col {
      padding-top: 1.3rem !important;
      padding-bottom: 1.3rem !important;
   }

   #calendar-table {
      text-align: center;
   }

   .prev-button {
      position: absolute;
      cursor: pointer;
      left: 0%;
      top: 35%;
      color: grey !important;
   }

   .prev-button i {
      font-size: 4em;
   }

   .next-button {
      position: absolute;
      cursor: pointer;
      right: 0%;
      top: 35%;
      color: grey !important;
   }

   .next-button i {
      font-size: 4em;
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
   border-radius: 24px;
}

.dog-title-text {
    font-size: 32px;
    font-weight: 600;
    color: #385774;
}

.dog-example {
   width: 100%;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #212529;
    outline: none;
    font-size: 18px;
}

.modal-content .modal-content-inner {
    padding: 20px 30px;
}

.modal-header {
   padding: 0;
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
                  <div class="dog-title-text">
                     <h2 class="dog-title-text">Calender & Pricing</h3>
                  </div>
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
                                    <div class="header-text">
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
                <div class="modal-header pb-4">
                  <input type="hidden" class="" id='value-edit' value="">
                    <h5 class="dog-title-text mb-0 " id="staticBackdropLabel">Edit Price</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="price-input-radio">
                  <div class="mb-2">
                     <label class="fs-5 form-check-label">Hotel</label>
                  </div>
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="showPrice" id="flexRadioDefault1" value="open" checked>
                     <label class="form-check-label" for="flexRadioDefault1">
                     Open
                     </label>
                  </div>
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="showPrice" value="close" id="flexRadioDefault2" >
                     <label class="form-check-label" for="flexRadioDefault2">
                     Close
                     </label>
                  </div>
               </div>
               <div class="price-input mt-3">
                  <label class="form-check-label mb-2 fs-5" for="album_title">Price</label>
                  <input type="text" class="dog-example py-2 mb-3" id="priceInput">
               </div>
                  <div class="model-last-button text-end mt-4">
                     <a href="javascript:;" class="py-2 px-4 btn btn-success" id="edit-price-btn" data-id="0"
                           data-type="create" data-bs-dismiss="modal">Save</a>
                  </div>
            </div>
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
      date(data);
   }, 270);
}
nextButton.onclick = function changeMonthNext() {
   currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1);
   createCalendar(currentDate, "right");
   setTimeout(() => {
      data = document.getElementById("table-body").childNodes;
      date(data);
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
      }
   }

   selectedDayBlock = e.target;
   selectedDayBlock.classList.add("blue");
   selectedDayBlock.classList.add("lighten-3");
   var element = selectedDayBlock.querySelector(".optionEdit");
   element.classList.remove("d-none");


   selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), parseInt(e.target.innerHTML));
   
}

var changeFormButton = document.getElementById("changeFormButton");
var addForm = document.getElementById("addForm");




function date(data){  
   $(data).each(function(item){
      $($(this).children(".col").not('.empty-day')).each(function(val){
         var date = $(this).text();
         var price = '400';
         $(this).html(date+'<div class="d-flex justify-content-evenly" id="price-div"><p class="m-0 price_'+date+'" data-date="'+date+'" id="price">$ '+price+'</p><a class="optionEdit d-none" data-bs-toggle="modal" data-bs-target="#date_'+date+'"><i class="fa-solid fa-marker"></i></a></div>');
      });
   });
}

var d = new Date();
var day = d.getDate();
var datePrice = $('#value-edit').val(day);
var col = $('.modal').attr('id','date_'+day);

$(document).ready(function(){
   var data =$('#table-body').children('.row');
   date(data);

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