// Main Url
let base_url = $('#base_url').val();
// Hide navbar when scroll
// $(document).ready(function () {
//   $(document).scroll(function () {
//       $('.navbar-collapse').collapse('hide');
//   });
// });

// hide navbar when click outside 
// $(document).on('click', function () {
//   $('.collapse').collapse('hide');
// });

// js for top city slider (index.html)
$('#slick1').slick({
  rows: 2,
  dots: false,
  arrows: true,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 3,
  responsive: [
{ breakpoint: 992,
settings: {
  slidesToShow: 2,
  slidesToScroll: 2,        
}
},
{ breakpoint: 776,
  settings: {
  slidesToShow: 1,
  slidesToScroll: 1,
  rows: 1 
  }
}],
  // draggable: false,
  prevArrow: "<i class='slick-prev pull-left fa-solid fa-angle-left' aria-hidden='true'></i>",
  nextArrow: "<i class=' slick-next pull-right fa-solid fa-angle-right' aria-hidden='true'></i>"
      });

  // <!------ Js for select2 option ------->

  function formatText (icon) {
    return $('<span><i class="fas ' + $(icon.element).data('icon') + '"></i> ' + icon.text + '</span>');
    };
    $('.select2-icon').select2({
      width: "50%",
      templateSelection: formatText,
      templateResult: formatText,
      placeholder : "Placeholder",
      });


  //----  clander js checkin check-out start ----//
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
  //----  clander js checkin check-out  end----//

// js for tooltip (hotelresult)
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});

// js for multiselect datepiker calender start (hotelresult page)
var separator = ' - ', dateFormat = 'MM/DD/YYYY';
  var options = {
    autoUpdateInput: false,
    autoApply: true,
    locale: {
      format: dateFormat,
      separator: separator,
  },
  opens: "right"
};


  $('[data-datepicker=separateRange]')
      .daterangepicker(options)
      .on('apply.daterangepicker' ,function(ev, picker) {
          var boolStart = this.name.match(/value_from_start_/g) == null ? false : true;
          var boolEnd = this.name.match(/value_from_end_/g) == null ? false : true;

          var mainName = this.name.replace('value_from_start_', '');
          if(boolEnd) {
              mainName = this.name.replace('value_from_end_', '');
              $(this).closest('form').find('[name=value_from_end_'+ mainName +']').blur();
          }

          $(this).closest('form').find('[name=value_from_start_'+ mainName +']').val(picker.startDate.format(dateFormat));
          $(this).closest('form').find('[name=value_from_end_'+ mainName +']').val(picker.endDate.format(dateFormat));

          $(this).trigger('change').trigger('keyup');
      })
      .on('show.daterangepicker', function(ev, picker) {
          var boolStart = this.name.match(/value_from_start_/g) == null ? false : true;
          var boolEnd = this.name.match(/value_from_end_/g) == null ? false : true;
          var mainName = this.name.replace('value_from_start_', '');
          if(boolEnd) {
              mainName = this.name.replace('value_from_end_', '');
          }

          var startDate = $(this).closest('form').find('[name=value_from_start_'+ mainName +']').val();
          var endDate = $(this).closest('form').find('[name=value_from_end_'+ mainName +']').val();

          $('[name=daterangepicker_start]').val(startDate).trigger('change').trigger('keyup');
          $('[name=daterangepicker_end]').val(endDate).trigger('change').trigger('keyup');
          
          if(boolEnd) {
              $('[name=daterangepicker_end]').focus();
          }
      });
// js for multiselect calender end (hotelresult page)

