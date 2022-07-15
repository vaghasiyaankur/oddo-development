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

            $('.loadingShow span').css('display', 'block');
            $('.loadingHide').addClass('d-none');

            formdata = new FormData();
            formdata.append('roomtype', roomtype);

            $.ajax({
                url: "{{route('add.roomtype')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (response) { 
                    $(".roomTypeForm").trigger("reset");
                    roomTypeList();
                    toastMixin.fire({ title: response.success, icon: 'success' });
                }, error:function (response) {
                    setTimeout(function() {
                        $('.loadingShow span').css('display', 'none');
                        $('.loadingHide').removeClass('d-none');
                    },  100);
                    $('#roomType-error').text(response.responseJSON.errors.roomtype);
                }
            }); 
        });

        // edit roomType
        $(document).on('click', '.edit-roomType', function(){
            let roomtype = $(this).data("value");
            $('.edit_div').show();
            $('.edit_div').removeClass("d-none");
            $('.create_div').hide();
            $(".edit-roomType").val(roomtype.room_type);
            $(".edit_id").val(roomtype.id);
        });

        $(document).on('click', '.room-type-update', function(){
            let id = $(".edit_id").val();
            let roomtype = $('.edit-roomType').val();
            !roomtype ? $(`#edit-roomType-error`).html(`The room type field is required.`) : $(`#edit-roomType-error`).html(``);

            $('.loadingShow span').css('display', 'block');
            $('.loadingHide').addClass('d-none');

            formdata = new FormData();
            formdata.append('id', id);
            formdata.append('roomtype', roomtype);

            $.ajax({
                url: baseUrl + "/admin/update-roomtype/" + id,
                data: formdata,
                type: "POST",
                processData: false,
                contentType: false,
                success: function (response) {
                    $(".editRoomTypeForm").trigger("reset");
                    $('.edit_div').hide();
                    $('.create_div').show();
                    roomTypeList();
                }, error:function (response) {
                    setTimeout(function() {
                        $('.loadingShow span').css('display', 'none');
                        $('.loadingHide').removeClass('d-none');
                    },  100);
                    $('#edit-roomType-error').text(response.responseJSON.errors.roomtype);
                }
            });
        });

        // roomType status on / off
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

        // delete roomType
        $(document).on('click', '.delete-roomType', function(){
            let id = $(this).data('value');

            $('.loadingShow span').css('display', 'block');
            $('.loadingHide').addClass('d-none');
            
        
            formdata = new FormData();
            formdata.append('id', id);
            $.ajax({
                url: baseUrl + "/admin/delete-roomtype/" + id,
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (res) { 
                    roomTypeList();
                    if(res.danger){
                        toastMixin.fire({ title: res.danger, icon: 'error' });
                    }else{
                        toastMixin.fire({ title: res.warning, icon: 'warning' });
                    }
                },
            }); 
        });

        // room type list
        function roomTypeList(){
            $.ajax({
                url: "{{route('roomtype.list')}}",
                type: "GET",
                dataType: "HTML",
                success: function (response) {
                    setTimeout(function() {
                        $('.loadingShow span').css('display', 'none');
                        $('.loadingHide').removeClass('d-none');
                    },  1500);
                    $(".roomTypeTable").html(response);
                }
            });
        }
    });
</script>