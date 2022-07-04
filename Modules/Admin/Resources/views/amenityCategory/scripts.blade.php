<script>
var baseUrl = $('#base_url').val();
$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.amenity-category-submit', function(){
        let amenityCategory = $('.amenityCategory').val();
        !amenityCategory ? $(`#amenityCategory-error`).html(`The Amenitycategory field is required.`) : $(`#amenityCategory-error`).html(``);

        if (!amenityCategory) {
            return;
        }
        formdata = new FormData();
        formdata.append('amenityCategory', amenityCategory);

        $.ajax({
            url: "{{route('add.amenitycategory')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (res) { 
                $(".amenityCategoryForm").trigger("reset");
                CategoryList();
            },
        }); 
    });

    $(document).on('click', '.edit-amenityCategory', function(){

        let amenityCategory = $(this).data("value");
        $('.edit_div').show();
        $('.edit_div').removeClass("d-none");
        $('.create_div').hide();
        $(".category").val(amenityCategory.category);
        $(".edit_id").val(amenityCategory.id);
    });

    $(document).on('click', '.amenity-category-update', function(){
        let id = $(".edit_id").val();
        let category = $('.category').val();

        
        formdata = new FormData();
        formdata.append('id', id);
        formdata.append('category', category);

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
            }
        });
    });

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
            success: function (res) { 
                CategoryList();
            },
        }); 
    });

    $(document).on("click", ".delete-amenityCategory", function () {
        let id = $(this).data('value');
        
        formdata = new FormData();
        formdata.append('id', id);
        $.ajax({
            url: baseUrl + "/admin/delete-amenity-category/" + id,
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (res) { 
                CategoryList();
            },
        }); 
    });


    function CategoryList() {
        $.ajax({
            url: "{{route('amenitycategory.list')}}",
            type: "GET",
            dataType: "HTML",
            success: function (response) {
                $(".amenityCategoryTable").html(response);
                CRMTableThreeReactive();
            }
        });
    }
});
</script>