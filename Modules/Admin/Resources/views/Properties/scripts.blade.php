<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('change', '.PropertyStatus', function(){
        let status = $(this).data("value");
        let id = $(this).data('id');

        formdata = new FormData();
        formdata.append('status', status);
        formdata.append('id', id);

        $.ajax({
            url: "{{route('property.status')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) {
                PropertyList();
            },
        });
    });

    function PropertyList(data = null){
        $.ajax({
            url: "{{route('property.list')}}",
            type: "GET",
            dataType: "HTML",
            data : { search : data },
            success: function (response) {
                setTimeout(function() {
                        $('.loadingShow span').css('display', 'none');
                        $('.loadingHide').removeClass('d-none');
                        $(".propertiesTable").html(response);
                },  1500);
            }
        });
    }


    $('.search').keyup(function(){
        var search = $(this).val();
        var searchLength = $(this).val().length;
        searchLengthData(searchLength);
        PropertyList(search);

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
        PropertyList();
    });
</script>
