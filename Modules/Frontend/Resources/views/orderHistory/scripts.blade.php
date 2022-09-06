<script>

    var baseUrl = $('#base_url').val();

    $. ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $(".starrate span.ctrl").width($(".starrate span.cont").width());
        $(".starrate span.ctrl").height($(".starrate span.cont").height());

        // star rating
        $(document).on('click', '.star', function() {
            var stars = $(this).closest('.ratingW').find('li');
            stars.removeClass('on');
            var thisIndex = $(this).parents('li').index();

            for (var i = 0; i <= thisIndex; i++) {
                stars.eq(i).addClass('on');
            }

            var review = $(this).closest('.reviewMainDiv');
            var child = review.find('.cleanessSpan').html(thisIndex + 1);
            review.find('.reviewValue').val(thisIndex + 1);

            if (thisIndex + 1 <= 2) {
                review.find('.ratingColor').removeClass('bg-green').addClass('bg-red');
            } else {
                review.find('.ratingColor').removeClass('bg-red').addClass('bg-green');
            }
        });

        // submit review form
        $(document).on('click', '.reviewSubmit', function(){
            var staffReview = $('.staffReview').val();
            var cleanessReview = $('.cleanessReview').val();
            var roomReview = $('.roomReview').val();
            var locationReview = $('.locationReview').val();
            var breakfastReview = $('.breakfastReview').val();
            var serviceStaffReview = $('.serviceStaffReview').val();
            var propertyConditionReview = $('.propertyConditionReview').val();
            var priceQualityReview = $('.priceQualityReview').val();
            var amenityReview = $('.amenityReview').val();
            var internetReview = $('.internetReview').val();
            var feedbackReview = $('.feedbackReview').val();
            var hotel_id = $('.hotel_id').val();
            var room_id = $('.room_id').val();

            !staffReview || !cleanessReview || !roomReview || !locationReview || !breakfastReview ||
            !serviceStaffReview || !propertyConditionReview || !priceQualityReview || !amenityReview || !internetReview ? $(`#review-error`).html(`please select all review and ratings.`) : $(`#review-error`).html(``);

            !feedbackReview ? $(`#feedbackReview-error`).html(`The feedback field is required.`) : $(`#feedbackReview-error`).html(``);

            if (!feedbackReview || !staffReview || !cleanessReview || !roomReview || !locationReview || !breakfastReview ||
            !serviceStaffReview || !propertyConditionReview || !priceQualityReview || !amenityReview || !internetReview) {
                return;
            }

            formdata = new FormData();
            formdata.append('staffReview', staffReview);
            formdata.append('cleanessReview', cleanessReview);
            formdata.append('roomReview', roomReview);
            formdata.append('locationReview', locationReview);
            formdata.append('breakfastReview', breakfastReview);
            formdata.append('serviceStaffReview', serviceStaffReview);
            formdata.append('propertyConditionReview', propertyConditionReview);
            formdata.append('priceQualityReview', priceQualityReview);
            formdata.append('amenityReview', amenityReview);
            formdata.append('internetReview', internetReview);
            formdata.append('feedbackReview', feedbackReview);
            formdata.append('hotel_id', hotel_id);
            formdata.append('room_id', room_id);

            $.ajax({
                url: "{{route('add.review')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (response) {
                    $(".reviewForm").find('input:text, input:password, input:file, select, textarea').val('');
                    $('#review__popup').modal('hide');
                    orderHistoryList();
                }, error:function (response) {

                }
            });
        });

        // popup details add
        $(document).on('click', '#popUp', function(){
            var id = $(this).data('id');
            var hotel_id = $("#hotel_id_"+id).val();
            var room_id = $("#room_id_"+id).val();

            $(".hotel_id").val(hotel_id);
            $(".room_id").val(room_id);
        });

        $(document).on('click', '.reviewPopUp', function(){
            var reviewId = $(this).data('id');

            formdata = new FormData();
            formdata.append('reviewId', reviewId);

            $.ajax({
                url: "{{route('show.review')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (response) {
                    $(".ratingFormViewPopUp").html(response);
                    $('.reviews-popup-main').modal('show');

                    var valueHover = $('#starrate').data('val');
                    upStars(valueHover);
                }, error:function (response) {

                }
            });

        });
    });

    function orderHistoryList() {
        $.ajax({
            url: "{{route('list.review')}}",
            type: "GET",
            dataType: "HTML",
            success: function (response) {
                $(".order-history-details").html(response);
            }
        });   
    }

    // set rating popup
    function upStars(val) {
        var val = parseFloat(val);
        var full = Number.isInteger(val);
        val = parseInt(val);
        var stars = $("#starrate img");

        stars.slice(0, val).attr("src", ""+baseUrl+"/assets/images/icons/star.png");
        if (!full) { stars.slice(val, val + 1).attr("src", ""+baseUrl+"/assets/images/icons/half-star.png"); val++ }
        stars.slice(val, 5).attr("src", "");
    }
</script>
