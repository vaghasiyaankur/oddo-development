<script>
    $('.search').keyup(function(){
        var search = $(this).val();
        var searchLength = $(this).val().length;
        var status = $('.sorting').find(":selected").val();
        searchLengthData(searchLength);
        ReviewList(search);

        // console.log(search);
        $('.loadingShow span').css('display', 'block');
        $('.loadingHide').addClass('d-none');
    });

    function searchLengthData(searchLength) {
        if(searchLength >= 1){
            $('.close-icon').removeClass('d-none');
        }else{
            $('.close-icon').addClass('d-none');
        }
    }

    $(document).on('click', '.cancelBtn', function(){
        var search = $('.search').val('');
        var searchLength = $(search).val().length;
        searchLengthData(searchLength);
        ReviewList();
    });

    function ReviewList(data = null){

         $.ajax({
            url: "{{route('review.list')}}",
            type: "GET",
            dataType: "HTML",
            data : { search : data},
            success: function (response) {
                setTimeout(function() {
                        $('.loadingShow span').css('display', 'none');
                        $('.loadingHide').removeClass('d-none');
                        $(".reviewTable").html(response);
                },  1500);
             }
         });
     }

    </script>
