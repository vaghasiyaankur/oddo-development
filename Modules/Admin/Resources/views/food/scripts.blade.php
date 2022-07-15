<script>
$(document).ready(function(){
    var baseUrl = $('#base_url').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // food submit
    $(document).on('click', '.food-submit', function(){
        let food = $('.food').val();
        !food ? $(`#food-error`).html(`The food field is required.`) : $(`#food-error`).html(``);

        if (!food) {
            return;
        }
        
        $('.loadingShow span').css('display', 'block');
        $('.loadingHide').addClass('d-none');

        formdata = new FormData();
        formdata.append('food', food);

        $.ajax({
            url: "{{route('add.food')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) { 
                $(".foodForm").trigger("reset");
                foodList();
                toastMixin.fire({ title: response.success, icon: 'success' });
                setTimeout(function() {
                    $('.loadingShow span').css('display', 'none');
                    $('.loadingHide').removeClass('d-none');
                },  1500);
            }, error:function (response) {
                    $('.loadingShow span').css('display', 'none');
                    $('.loadingHide').removeClass('d-none');
                $('#food-error').text(response.responseJSON.errors.food);
            }
        }); 
    });

    // status food
    $(document).on('change', '.amenityCategoryStatus', function(){
        let status = $(this).data("value");
        let id = $(this).data('id');

        formdata = new FormData();
        formdata.append('status', status);
        formdata.append('id', id);

        $.ajax({
            url: "{{route('status.food')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) { 
                foodList();
            },
        }); 
    });

    // delete food
    $(document).on("click", ".delete-food", function () {
        let id = $(this).data('value');
        
        $('.loadingShow span').css('display', 'block');
        $('.loadingHide').addClass('d-none');
        
        formdata = new FormData();
        formdata.append('id', id);
        $.ajax({
            url: baseUrl + "/admin/delete-food/" + id,
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) { 
                foodList();
                toastMixin.fire({ title: response.danger, icon: 'error' });
            },
        }); 
    });

    // food edit
    $(document).on("click", ".edit-food", function () {
        let food = $(this).data("value");
        let id = $(this).data("id");

        $('.edit_div').show();
        $('.edit_div').removeClass("d-none");
        $('.create_div').hide();
        $(".editFood").val(food);
        $(".edit_id").val(id);
    }); 

    // update food
    $(document).on("click", ".food-update", function () {
        let id = $(".edit_id").val();
        let editFood = $('.editFood').val();
        !editFood ? $(`#editFood-error`).html(`The food field is required.`) : $(`#editFood-error  `).html(``);

        if (!editFood) {
            return;
        }
        
        formdata = new FormData();
        formdata.append('id', id);
        formdata.append('editFood', editFood);

        $('.loadingShow span').css('display', 'block');
        $('.loadingHide').addClass('d-none');

        $.ajax({
            url: baseUrl + "/admin/update-food/" + id,
            data: formdata, 
            type: "POST",
            processData: false,
            contentType: false,
            success: function (response) {
                $("#editFoodForm").trigger("reset");
                $('.edit_div').hide();
                $('.create_div').show();
                foodList();
                toastMixin.fire({ title: response.success, icon: 'success' });
            }, error:function (response) {
                setTimeout(function() {
                    $('.loadingShow span').css('display', 'none');
                    $('.loadingHide').removeClass('d-none');
                },  1500);
                $('#editFood-error').text(response.responseJSON.errors.editFood);
            }
        });
    });

    // food list
    function foodList(){
        $.ajax({
            url: "{{route('food.list')}}",
            type: "GET",
            dataType: "HTML",
            success: function (response) {
                setTimeout(function() {
                    $('.loadingShow span').css('display', 'none');
                    $('.loadingHide').removeClass('d-none');
                },  1500);
                $(".foodTable").html(response);
            }
        });
    }
});
</script>