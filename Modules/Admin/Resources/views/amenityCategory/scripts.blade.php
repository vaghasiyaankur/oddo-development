<script>
$(document).ready(function(){
    // baseurl
    var baseUrl = $('#base_url').val();

    // csrf token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // insert amenity category
    $(document).on('click', '.amenity-category-submit', function(){
        let amenityCategory = $('.amenityCategory').val();
        !amenityCategory ? $(`#amenityCategory-error`).html(`The Amenitycategory field is required.`) : $(`#amenityCategory-error`).html(``);

        if (!amenityCategory) {
            return;
        }
        
        $('.loadingShow span').css('display', 'block');
        $('.loadingHide').addClass('d-none');

        formdata = new FormData();
        formdata.append('amenityCategory', amenityCategory);

        $.ajax({
            url: "{{route('add.amenitycategory')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) { 
                $(".amenityCategoryForm").trigger("reset");
                CategoryList();
                toastMixin.fire({ title: response.success, icon: 'success' });
                setTimeout(function() {
                    $('.loadingShow span').css('display', 'none');
                    $('.loadingHide').removeClass('d-none');
                },  1500);
            }, error:function (response) {
                    $('.loadingShow span').css('display', 'none');
                    $('.loadingHide').removeClass('d-none');
                $('#amenityCategory-error').text(response.responseJSON.errors.amenityCategory);
            }
        }); 
    });

    // edit amenity categorty 
    $(document).on('click', '.edit-amenityCategory', function(){

        let amenityCategory = $(this).data("value");
        $('.edit_div').show();
        $('.edit_div').removeClass("d-none");
        $('.create_div').hide();
        $(".category").val(amenityCategory.category);
        $(".edit_id").val(amenityCategory.id);
    });

    // amenity update
    $(document).on('click', '.amenity-category-update', function(){
        let id = $(".edit_id").val();
        let category = $('.category').val();
        !category ? $(`#editAmenityCategory-error`).html(`The Amenitycategory field is required.`) : $(`#editAmenityCategory-error  `).html(``);

        if (!category) {
            return;
        }
        
        formdata = new FormData();
        formdata.append('id', id);
        formdata.append('category', category);

        $('.loadingShow span').css('display', 'block');
        $('.loadingHide').addClass('d-none');

        $.ajax({
            url: baseUrl + "/admin/update-amenity-category/" + id,
            data: formdata,
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
            type: "POST",
            processData: false,
            contentType: false,
            success: function (response) {
                $("#updateamenityCategoryForm").trigger("reset");
                $('.edit_div').hide();
                $('.create_div').show();
                CategoryList();
                toastMixin.fire({ title: response.success, icon: 'success' });
                setTimeout(function() {
                    $('.loadingShow span').css('display', 'none');
                    $('.loadingHide').removeClass('d-none');
                },  1500);
            }, error:function (response) {
                $('#editAmenityCategory-error').text(response.responseJSON.errors.category);
            }
        });
    });

    // amenitycategory status
    $(document).on('change', '.amenityCategoryStatus', function(){
        let amenityCategory = $(this).data("value");

        let status = amenityCategory.status;
        let id     = amenityCategory.id;

        formdata = new FormData();
        formdata.append('status', status);
        formdata.append('id', id);

        $.ajax({
            url: "{{route('status.amenityCategory')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) { 
                CategoryList();
            },
        }); 
    });

    // delete amenity category
    $(document).on("click", ".delete-amenityCategory", function () {
        let id = $(this).data('value');
        
        $('.loadingShow span').css('display', 'block');
        $('.loadingHide').addClass('d-none');
        
        formdata = new FormData();
        formdata.append('id', id);
        $.ajax({
            url: baseUrl + "/admin/delete-amenity-category/" + id,
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) { 
                CategoryList();
                toastMixin.fire({ title: response.danger, icon: 'error' });
            },
        }); 
    });

    // list amenity Category
    function CategoryList() {
        $.ajax({
            url: "{{route('amenitycategory.list')}}",
            type: "GET",
            dataType: "HTML",
            success: function (response) {
                setTimeout(function() {
                    $('.loadingShow span').css('display', 'none');
                    $('.loadingHide').removeClass('d-none');
                },  1500);
                $(".amenityCategoryTable").html(response);
            }
        });
    }
});
</script>