<script>
    // Base Url
    var baseUrl = $('#base_url').val();

    // token ajax
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    jQuery(document).ready(function() {
        jQuery('.date_checkin').datepicker({
            dateFormat: 'mm-dd-yy',
            startDate: '+1d'
        });
    });

    jQuery(document).ready(function() {
        jQuery('.date_checkout').datepicker({
            dateFormat: 'mm-dd-yy',
            startDate: '+1d'
        });
    });
    // js for multiselect datepiker calender start (hotelresult page)
    var separator = ' - ',
        dateFormat = 'MM/DD/YYYY';
    var options = {
        autoUpdateInput: false,
        locale: {
            format: dateFormat,
            separator: separator,
        },
        opens: "right"
    };


    $('[data-datepicker=separateRange]')
        .daterangepicker(options)
        .on('apply.daterangepicker', function(ev, picker) {
            var boolStart = this.name.match(/value_from_start_/g) == null ? false : true;
            var boolEnd = this.name.match(/value_from_end_/g) == null ? false : true;

            var mainName = this.name.replace('value_from_start_', '');
            if (boolEnd) {
                mainName = this.name.replace('value_from_end_', '');
                $(this).closest('form').find('[name=value_from_end_' + mainName + ']').blur();
            }

            $(this).closest('form').find('[name=value_from_start_' + mainName + ']').val(picker.startDate.format(
                dateFormat));
            $(this).closest('form').find('[name=value_from_end_' + mainName + ']').val(picker.endDate.format(
                dateFormat));

            $(this).trigger('change').trigger('keyup');
        })
        .on('show.daterangepicker', function(ev, picker) {
            var boolStart = this.name.match(/value_from_start_/g) == null ? false : true;
            var boolEnd = this.name.match(/value_from_end_/g) == null ? false : true;
            var mainName = this.name.replace('value_from_start_', '');
            if (boolEnd) {
                mainName = this.name.replace('value_from_end_', '');
            }

            var startDate = $(this).closest('form').find('[name=value_from_start_' + mainName + ']').val();
            var endDate = $(this).closest('form').find('[name=value_from_end_' + mainName + ']').val();

            $('[name=daterangepicker_start]').val(startDate).trigger('change').trigger('keyup');
            $('[name=daterangepicker_end]').val(endDate).trigger('change').trigger('keyup');

            if (boolEnd) {
                $('[name=daterangepicker_end]').focus();
            }
        });


    $(document).ready(function() {
        $(document).on('click', '.applyBtn', function() {
            var start_date = $("input[name=daterangepicker_start]").val();
            var end_date = $("input[name=daterangepicker_end]").val();

            var url = new URL(location);

            window.location.href = location.pathname + "?start_date=" + start_date + "&end_date=" + end_date;
        });
    });





    // js for multiselect calender end (hotelresult page)

    // $(document).on('click', '.selectFilter', function() {
    //     var filter = $(this).data('target');
    //     var active = $(this).addClass('active');

    //     $('.selectSettingTab').removeClass('active');
    //     $(this).addClass('active');
    //     //  console.log();

    //     formdata = new FormData();
    //     formdata.append('filter', filter);

    //     // $('.updateLoader').addClass('on').removeClass('off');
    //     $.ajax({
    //         url: "{{ route('booking.filter') }}",
    //         type: "POST",
    //         processData: false,
    //         contentType: false,
    //         data: formdata,
    //         success: function (response) {
    //             console.log(response);
    //             // $('.updateLoader').addClass('off').removeClass('on');
    //             $('.tab-content').empty();
    //             $('.tab-content').html(response);
    //         }, error:function (response) {

    //         }
    //     });
    // });
</script>
