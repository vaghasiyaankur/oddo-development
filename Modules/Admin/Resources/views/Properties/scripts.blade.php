<script>
    // $(document).on('change', '.status', function(){
    //     console.log('sdfghh');
    //     let property = $(this).data("value");
    //     let status = property.status;
    //     let id     = property.id;

    //     formdata = new FormData();
    //     formdata.append('status', status);
    //     formdata.append('id', id);

    //     $.ajax({
    //         url: "{{route('property.status')}}",
    //         type: "POST",
    //         processData: false,
    //         contentType: false,
    //         data: formdata,
    //         success: function (res) {
    //             facilitiesList();
    //         },
    //     });
    // });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('change', '.amenityCategoryStatus', function(){
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

    function PropertyList(){
        $.ajax({
            url: "{{route('property.list')}}",
            type: "GET",
            dataType: "HTML",
            success: function (response) {
                // setTimeout(function() {
                //     $('.loadingShow span').css('display', 'none');
                //     $('.loadingHide').removeClass('d-none');
                // },  1500);
                $(".propertiesTable").html(response);
            }
        });
    }

</script>
