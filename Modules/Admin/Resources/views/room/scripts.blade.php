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

    // create RoomList
    $(document).on('click', '.room-submit', function(){
        let roomName = $('#roomName').val();
        !roomName ? $(`#roomName-error`).html(`The room type field is required.`) : $(`#roomName-error`).html(``);

        let roomType = $('#roomType').val();

        if (!roomName) {
            return;
        }

        $('.loadingShow span').css('display', 'block');
        $('.loadingHide').addClass('d-none');

        formdata = new FormData();
        formdata.append('roomName', roomName);
        formdata.append('roomType', roomType);

        $.ajax({
            url: "{{route('add.room')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) { 
                $(".roomForm").trigger("reset");
                roomList();
                toastMixin.fire({ title: response.success, icon: 'success' });
            }, error:function (response) {
                $('#roomName-error').text(response.responseJSON.errors.roomName);
            }
        }); 
    });

    // edit RoomList
    $(document).on('click', '.edit-room', function(){
        let room = $(this).data("value");
        $('.edit_div').show();
        $('.edit_div').removeClass("d-none");
        $('.create_div').hide();
        $("#editRoomName").val(room.room_name);
        $("#edtiRoomType option[value='"+room.room_type_id+"']").attr('selected',true);
        $(".edit_id").val(room.id);
    });

    // edit RoomType
    $(document).on('click', '.room-update', function(){
        let editRoomName = $('#editRoomName').val();
        !editRoomName ? $(`#editRoomName-edit-error`).html(`The room type is required.`) : $(`#editRoomName-error`).html(``);

        let edtiRoomType = $('#edtiRoomType').val();
        let id = $('.edit_id').val();

        $('.loadingShow span').css('display', 'block');
        $('.loadingHide').addClass('d-none');

        if (!editRoomName) {
            return;
        }

        formdata = new FormData();
        formdata.append('id', id);
        formdata.append('editRoomName', editRoomName);
        formdata.append('edtiRoomType', edtiRoomType);

        $.ajax({
            url: baseUrl + "/admin/update-room/" + id,
            data: formdata,
            type: "POST",
            processData: false,
            contentType: false,
            success: function (res) {
                $(".editRoomForm").trigger("reset");
                roomList();
                toastMixin.fire({ title: res.success, icon: 'success' });
            }, error:function (response) {
                $('#editRoomName-error').text(response.responseJSON.errors.editRoomName);
            }
        });
    });

    // delete RoomType
    $(document).on('click', '.delete-room', function(){
        let id = $(this).data('value');

        $('.loadingShow span').css('display', 'block');
        $('.loadingHide').addClass('d-none');
        
        formdata = new FormData();
        formdata.append('id', id);
        $.ajax({
            url: baseUrl + "/admin/delete-room/" + id,
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (res) { 
                roomList();
                if(res.danger){
                    toastMixin.fire({ title: res.danger, icon: 'error' });
                }else{
                    toastMixin.fire({ title: res.warning, icon: 'warning' });
                }
            },
        }); 
    });

    // status RoomType
    $(document).on('change', '.roomStatus', function(){
        let room = $(this).data("value");

        let status = room.status;
        let id     = room.id;

        formdata = new FormData();
        formdata.append('status', status);
        formdata.append('id', id);

        $.ajax({
            url: "{{route('status.room')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (res) { 
                roomList();
            },
        }); 
    });

    // room List
    function roomList(){
        $.ajax({
            url: "{{route('room.list')}}",
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