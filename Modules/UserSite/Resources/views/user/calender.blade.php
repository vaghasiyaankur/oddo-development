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
   /* padding-left: 15%;
   padding-right: 15%; */
   overflow: hidden;
}
.calendar-wrapper.z-depth-2 {
    box-shadow: 0 4px 5px 0 rgb(0 0 0 / 14%), 0 1px 10px 0 rgb(0 0 0 / 12%), 0 2px 4px -1px rgb(0 0 0 / 30%);
}
/* 
.event-mark {
   width: 5px;
   height: 5px;
   background-color: teal;
   border-radius: 100px;
   position: absolute;
   left: 46%;
   top: 70%;
} */

/* .calendar-footer {
   height: 200px;
   font-family: 'Roboto', sans-serif;
   font-weight: 300;
   text-align: center;
   background-color: #4b6289 !important;
   position: relative;
   overflow: hidden;
} */

/* .addForm {
   position: absolute;
   top: 100%;
   width: 100%;
   height: 100%;
   background-color: #4b5889 !important;
   transition: top 0.5s cubic-bezier(1, 0, 0, 1);
   padding: 0 5px 0 5px;
}

.addForm input {
   color: #fff;
}

.addForm .row {
   padding-left: 0.75rem;
   padding-right: 0.75rem;
   margin-bottom: 0;
}

.addForm h4 {
   color: #fff;
   margin-bottom: 1rem;
} */

/* .addEventButtons {
   text-align: right;
   padding: 0 0.75rem 0 0.75rem;
}

.addEventButtons a {
   color: black;
   font-weight: 300;
} */

.emptyForm {
   padding: 20px;
   padding-left: 15%;
   padding-right: 15%;
}

.emptyForm h4 {
   color: #fff;
   margin-bottom: 2rem;
}
h2#month-name{
   font-size:43px;
   line-height:53px;
   margin-top:21px;
   margin-bottom:17px;
}
h5#todayDayName{
   font-size:24px;
   line-height:34px;
   margin-top:12px;
   margin-bottom:9px;
}
/* .sidebar-wrapper {
   color: #fff;
   background-color: #5a649c !important;
   padding-top: 0;
   padding-bottom: 20px;
   font-family: 'Roboto', sans-serif;
   font-weight: 300;
   padding-left: 0;
   padding-right: 0;
}

.sidebar-title {
   padding: 50px 6% 50px 12%;
}

.sidebar-title h4 {
   margin-top: 0;
}

.sidebar-events {
   overflow-x: hidden;
   overflow-y: hidden;
   margin-bottom: 70px;
}

.empty-message {
   font-size: 1.2rem;
   padding: 15px 6% 15px 12%;
}

.eventCard {
   background-color: #fff;
   color: black;
   padding: 12px 24px 12px 24px;
   border-bottom: 1px solid #E5E5E5;
   white-space: nowrap;
   position: relative;
   animation: slideInDown 0.5s;
}

.eventCard-header {
   font-weight: bold;
}

.eventCard-description {
   color: grey;
}

.eventCard-mark-wrapper {
   position: absolute;
   right: 0;
   top: 0;
   height: 100%;
   width: 60px;
   background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 25%, rgba(255, 255, 255, 1) 100%);
}

.eventCard-mark {
   width: 8px;
   height: 8px;
   background-color: #b39ddb;
   border-radius: 100px;
   position: absolute;
   left: 50%;
   top: 45%;
}

.day-mark {
   width: 7px;
   height: 7px;
   background-color: #b39ddb;
   border-radius: 100px;
   position: absolute;
   left: 47%;
   top: 67%;
} */

/* .content-wrapper {
   padding-top: 50px;
   padding-bottom: 50px;
   margin-left: 300px;
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
/* 
.addEvent {
   box-shadow: 0 5px 15px rgb(57, 168, 228);
   background-color: #39a8e4;
   padding: 10px;
   padding-left: 3em;
   padding-right: 3em;
   cursor: pointer;
   border-radius: 25px;
   color: #fff !important;
   background-image: linear-gradient(135deg, #8d8dd4, #45ced4);
}

.addEvent:hover {
   transition: box-shadow 0.5s;
   box-shadow: 0 4px 25px rgb(57, 168, 228);
} */

/* .mobile-header {
   padding: 0;
   display: none;
   padding-top: 20px;
   padding-bottom: 20px;
   position: fixed;
   z-index: 99;
   width: 100%;
   background-color: #5a649c !important;
}

.mobile-header a i {
   color: #fff;
   font-size: 38px;
}

.mobile-header h4 {
   color: #fff;
}

.mobile-header .row {
   margin-bottom: 0;
}

.mobile-header h4 {
   margin: 0;
   font-family: 'Roboto', sans-serif;
   font-weight: 300;
} */

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
                        <!-- <div class="mobile-header z-depth-1">
                           <div class="row">
                              <div class="col-2">
                                 <a href="#" data-activates="sidebar" class="button-collapse" style="">
                                    <i class="material-icons">menu</i>
                                 </a>
                              </div>
                              <div class="col">
                                 <h4>Events</h4>
                              </div>
                           </div>
                        </div> -->

                        <div class="main-wrapper">

                        <!-- <div class="sidebar-wrapper z-depth-2 side-nav fixed">

                        <div class="sidebar-title">
                           <h4>Events</h4>
                           <h5 id="eventDayName">Date</h5>
                        </div>
                        <div class="sidebar-events" id="sidebarEvents">
                           <div class="empty-message">Sorry, no events to selected date</div>
                        </div>

                        </div> -->

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

            <!-- <div class="calendar-footer">
            <div class="emptyForm" id="emptyForm">
               <h4 id="emptyFormTitle">No events now</h4>
               <a class="addEvent" id="changeFormButton">Add new</a>
            </div>
            <div class="addForm" id="addForm">
               <h4>Add new event</h4>

               <div class="row">
                  <div class="input-field col s6">
                  <input id="eventTitleInput" type="text" class="validate">
                  <label for="eventTitleInput">Title</label>
                  </div>
                  <div class="input-field col s6">
                  <input id="eventDescInput" type="text" class="validate">
                  <label for="eventDescInput">Description</label>
                  </div>
               </div>

               <div class="addEventButtons">
                  <a class="waves-effect waves-light btn blue lighten-2" id="addEventButton">Add</a>
                  <a class="waves-effect waves-light btn grey lighten-2" id="cancelAdd">Cancel</a>
               </div>

            </div>
            </div> -->

         </div>
      </div>

      </div>
                              </div>
                        </div>
                     </div>
                  </div>
      </div>
   </section>
@endsection


@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous"></script>
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

// var sidebar = document.getElementById("sidebar");
$('col').click(function(){
    alert(globalEventObj[selectedDate.toDateString()]);
});
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

            // document.getElementById("eventDayName").innerHTML = selectedDate.toLocaleString("en-US", {
            //    month: "long",
            //    day: "numeric",
            //    year: "numeric"
            // });

            selectedDayBlock = currentDay;
            setTimeout(() => {
               currentDay.classList.add("blue");
               currentDay.classList.add("lighten-3");
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
}
nextButton.onclick = function changeMonthNext() {
   currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1);
   createCalendar(currentDate, "right");
}

function addEvent(title, desc) {
   if (!globalEventObj[selectedDate.toDateString()]) {
      globalEventObj[selectedDate.toDateString()] = {};
      alert(globalEventObj[selectedDate.toDateString()]);
   }
   globalEventObj[selectedDate.toDateString()][title] = desc;
}


function showEvents() {
//    let sidebarEvents = document.getElementById("sidebarEvents");
//    let objWithDate = globalEventObj[selectedDate.toDateString()];

//    sidebarEvents.innerHTML = "";

//    if (objWithDate) {
//       let eventsCount = 0;
//       for (key in globalEventObj[selectedDate.toDateString()]) {
//          let eventContainer = document.createElement("div");
//          eventContainer.className = "eventCard";

//          let eventHeader = document.createElement("div");
//          eventHeader.className = "eventCard-header";

//          let eventDescription = document.createElement("div");
//          eventDescription.className = "eventCard-description";

//          eventHeader.appendChild(document.createTextNode(key));
//          eventContainer.appendChild(eventHeader);

//          eventDescription.appendChild(document.createTextNode(objWithDate[key]));
//          eventContainer.appendChild(eventDescription);

//          let markWrapper = document.createElement("div");
//          markWrapper.className = "eventCard-mark-wrapper";
//          let mark = document.createElement("div");
//          mark.classList = "eventCard-mark";
//          markWrapper.appendChild(mark);
//          eventContainer.appendChild(markWrapper);

//          sidebarEvents.appendChild(eventContainer);

//          eventsCount++;
//       }
//       let emptyFormMessage = document.getElementById("emptyFormTitle");
//       emptyFormMessage.innerHTML = `${eventsCount} events now`;
//    } else {
//       let emptyMessage = document.createElement("div");
//       emptyMessage.className = "empty-message";
//       emptyMessage.innerHTML = "Sorry, no events to selected date";
//       sidebarEvents.appendChild(emptyMessage);
//       let emptyFormMessage = document.getElementById("emptyFormTitle");
//       emptyFormMessage.innerHTML = "No events now";
//    }
}

gridTable.onclick = function (e) {

   if (!e.target.classList.contains("col") || e.target.classList.contains("empty-day")) {
      return;
   }

   if (selectedDayBlock) {
      if (selectedDayBlock.classList.contains("blue") && selectedDayBlock.classList.contains("lighten-3")) {
         selectedDayBlock.classList.remove("blue");
         selectedDayBlock.classList.remove("lighten-3");
      }
   }
   selectedDayBlock = e.target;
   selectedDayBlock.classList.add("blue");
   selectedDayBlock.classList.add("lighten-3");

   selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), parseInt(e.target.innerHTML));
//    var z = document.createElement('p'); 
//     z.innerHTML = '$ 500';
//     selectedDayBlock.appendChild(z);




// showEvents();

   document.getElementById("eventDayName").innerHTML = selectedDate.toLocaleString("en-US", {
      month: "long",
      day: "numeric",
      year: "numeric"
   });

}

var changeFormButton = document.getElementById("changeFormButton");
var addForm = document.getElementById("addForm");
changeFormButton.onclick = function (e) {
   addForm.style.top = 0;
}

var cancelAdd = document.getElementById("cancelAdd");
cancelAdd.onclick = function (e) {
   addForm.style.top = "100%";
   let inputs = addForm.getElementsByTagName("input");
   for (let i = 0; i < inputs.length; i++) {
      inputs[i].value = "";
   }
   let labels = addForm.getElementsByTagName("label");
   for (let i = 0; i < labels.length; i++) {
      labels[i].className = "";
   }
}

var addEventButton = document.getElementById("addEventButton");
addEventButton.onclick = function (e) {
   let title = document.getElementById("eventTitleInput").value.trim();
   let desc = document.getElementById("eventDescInput").value.trim();

   if (!title || !desc) {
      document.getElementById("eventTitleInput").value = "";
      document.getElementById("eventDescInput").value = "";
      let labels = addForm.getElementsByTagName("label");
      for (let i = 0; i < labels.length; i++) {
         labels[i].className = "";
      }
      return;
   }

   addEvent(title, desc);
//    showEvents();

   if (!selectedDayBlock.querySelector(".day-mark")) {
      selectedDayBlock.appendChild(document.createElement("div")).className = "day-mark";
   }

   let inputs = addForm.getElementsByTagName("input");
   for (let i = 0; i < inputs.length; i++) {
      inputs[i].value = "";
   }
   let labels = addForm.getElementsByTagName("label");
   for (let i = 0; i < labels.length; i++) {
      labels[i].className = "";
   }

}
    </script>
@endpush