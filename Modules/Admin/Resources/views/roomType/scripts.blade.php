<script>
    $(document).ready(function(){
        // Base Url
        var baseUrl = $('#base_url').val();

        // token ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // submit room Type
        $(document).on('click', '.room-type-submit', function(){
            let roomtype = $('.roomType').val();
            !roomtype ? $(`#roomType-error`).html(`The room type field is required.`) : $(`#roomType-error`).html(``);

            if (!roomtype) {
                return;
            }
            formdata = new FormData();
            formdata.append('roomtype', roomtype);

            $.ajax({
                url: "{{route('add.roomtype')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (res) { 
                    $(".roomType").trigger("reset");
                    roomTypeList();
                },
            }); 
        });

        $(document).on('change', '.roomTypeStatus', function(){
            let roomtype = $(this).data("value");

            let status = roomtype.status;
            let id     = roomtype.id;

            formdata = new FormData();
            formdata.append('status', status);
            formdata.append('id', id);

            $.ajax({
                url: "{{route('status.roomtype')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (res) { 
                    roomTypeList();
                },
            }); 
        });

        // $(document).on('click', '.delete-roomType', function(){
        //     let id = $(this).data('value');
        
        //     formdata = new FormData();
        //     formdata.append('id', id);
        //     $.ajax({
        //         url: baseUrl + "/admin/delete-roomtype/" + id,
        //         type: "POST",
        //         processData: false,
        //         contentType: false,
        //         data: formdata,
        //         success: function (res) { 
        //             roomTypeList();
        //         },
        //     }); 
        // });



        // room type list
        function roomTypeList(){
            $.ajax({
                url: "{{route('roomtype.list')}}",
                type: "GET",
                dataType: "HTML",
                success: function (response) {
                    $(".roomTypeTable").html(response);
                }
            });
        }
    });
</script>