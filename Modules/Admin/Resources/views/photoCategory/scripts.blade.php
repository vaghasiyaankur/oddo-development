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

    // submit Photo Category
    $(document).on('click', '.photo-category-submit', function(){
        let photoCategory = $('.photoCategory').val();
        !photoCategory ? $(`#photoCategory-error`).html(`The Photo Category field is required.`) : $(`#photoCategory-error`).html(``);

        if (!photoCategory) {
            return;
        }

        $('.loadingShow span').css('display', 'block');
        $('.loadingHide').addClass('d-none');

        formdata = new FormData();
        formdata.append('photoCategory', photoCategory);

        $.ajax({
            url: "{{route('add.photoCategory')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) { 
                $(".PhotoCategoryForm").trigger("reset");
                photoCategoryList();
                toastMixin.fire({ title: response.success, icon: 'success' });
            }, error:function (response) {
                setTimeout(function() {
                    $('.loadingShow span').css('display', 'none');
                    $('.loadingHide').removeClass('d-none');
                },  100);
                $('#photoCategory-error').text(response.responseJSON.errors.photoCategory);
            }
        }); 
    });

    // delete Photo Category
    $(document).on('click', '.delete-photoCategory', function(){
        let id = $(this).data('value');

        $('.loadingShow span').css('display', 'block');
        $('.loadingHide').addClass('d-none');
        
    
        formdata = new FormData();
        formdata.append('id', id);
        $.ajax({
            url: baseUrl + "/admin/delete-photo-category/" + id,
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (res) { 
                photoCategoryList();
                if(res.danger){
                    toastMixin.fire({ title: res.danger, icon: 'error' });
                }else{
                    toastMixin.fire({ title: res.warning, icon: 'warning' });
                }
            },
        }); 
    });

    // edit Photo Category
    $(document).on('click', '.edit-photoCategory', function(){
        let photoCategory = $(this).data("value");
        $('.edit_div').show();
        $('.edit_div').removeClass("d-none");
        $('.create_div').hide();
        $(".edit-photoCategory").val(photoCategory.name);
        $(".edit_id").val(photoCategory.id);
    });

    // update Photo Category
    $(document).on('click', '.photo-category-update', function(){
        let id = $(".edit_id").val();
        let photoCategory = $('.edit-photoCategory').val();
        !photoCategory ? $(`#edit-photoCategory-error`).html(`The Photo Category field is required.`) : $(`#edit-photoCategory-error`).html(``);

        if (!photoCategory) {
            return;
        }

        $('.loadingShow span').css('display', 'block');
        $('.loadingHide').addClass('d-none');

        formdata = new FormData();
        formdata.append('id', id);
        formdata.append('photoCategory', photoCategory);

        $.ajax({
            url: baseUrl + "/admin/update-photo-category/" + id,
            data: formdata,
            type: "POST",
            processData: false,
            contentType: false,
            success: function (response) {
                $(".updatephotoCategoryForm").trigger("reset");
                $('.edit_div').hide();
                $('.create_div').show();
                photoCategoryList();
                toastMixin.fire({ title: response.success, icon: 'success' });
            }, error:function (response) {
                setTimeout(function() {
                    $('.loadingShow span').css('display', 'none');
                    $('.loadingHide').removeClass('d-none');
                },  100);
                $('#edit-photoCategory-error').text(response.responseJSON.errors.photoCategory);
            }
        });
    });

    // Photo Category list
    function photoCategoryList(){
            $.ajax({
                url: "{{route('photoCategory.list')}}",
                type: "GET",
                dataType: "HTML",
                success: function (response) {
                    setTimeout(function() {
                        $('.loadingShow span').css('display', 'none');
                        $('.loadingHide').removeClass('d-none');
                    },  1500);
                    $(".photoCategoryTable").html(response);
                }
            });
        }
});
</script>