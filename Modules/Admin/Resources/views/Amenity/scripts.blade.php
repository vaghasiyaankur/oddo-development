<script>
    var baseUrl = $('#base_url').val();
    
    $(document).ready(function(){ 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        (async () => {
            const response = await fetch(
                'https://unpkg.com/codethereal-iconpicker@1.2.1/dist/iconsets/bootstrap5.json')
            const result = await response.json()

            const iconpicker = new Iconpicker(document.querySelector(".iconpicker"), {
                icons: result,
                showSelectedIn: document.querySelector(".selected-icon"),
                searchable: true,
                selectedClass: "selected",
                containerClass: "my-picker",
                hideOnSelect: true,
                fade: true,
                defaultValue: 'bi-search',
                // valueFormat: val => `bi ${val}`
            });

            iconpicker.set() // Set as empty
            // iconpicker.set('bi-search') // Reset with a value
        })();

        function  iconPickerEdit(iconSelect){
            (async () => {
                const response = await fetch(
                    'https://unpkg.com/codethereal-iconpicker@1.2.1/dist/iconsets/bootstrap5.json')
                const result = await response.json()

                const iconpicker = new Iconpicker(document.querySelector(".iconPicker"), {
                    icons: result,
                    showSelectedIn: document.querySelector(".selectedIcon"),
                    searchable: true,
                    selectedClass: "selected",
                    containerClass: "my-picker",
                    hideOnSelect: true,
                    fade: true,
                    defaultValue: iconSelect,
                    // valueFormat: val => `bi ${val}`
                });

                iconpicker.set(iconSelect) // Set as empty
                // iconpicker.set('bi-alarm') // Reset with a value
            })();
        }
        


        // $(document).on('click', '.amenity-button', function() {
        //     $('.option-select').toggleClass('show');
        // });

        $(document).on('click', '.save-amenity', function(){
            let amenityName = $('.amenityName').val();
            !amenityName ? $(`#amenityName-error`).html(`The Amenity field is required.`) : $(`#amenityName-error`).html(``);
            
            let amenityIcon = $('.amenityIcon').val();
            !amenityIcon ? $(`#amenityIcon-error`).html(`The Icon field is required.`) : $(`#amenityIcon-error`).html(``);

            let amenityCategory = $('.amenityCategory').val();
            
            var status = $('input[name="status"]:checked').val();

            if (!amenityName || !amenityIcon) {
                return;
            }

            formdata = new FormData();
            formdata.append('amenityName', amenityName);
            formdata.append('amenityIcon', amenityIcon);
            formdata.append('amenityCategory', amenityCategory);
            formdata.append('status', status);

            $.ajax({
                url: "{{route('add.amenity')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (res) { 
                    $(".modal").modal("hide");
                    $(".amenityForm").trigger("reset");
                    amenityList();
                },
            }); 
        });


        $(document).on('click', '.amenityEdit', function(){
            let amenity = $(this).data("value");
            $(".edit_id").val(amenity.id);
            $("#amenityName").val(amenity.amenities);
            $("#amenityCategory option[value='"+amenity.amenities_category_id+"']").attr('selected',true);
            if(amenity.status == 1){
                $('#status_active').prop("checked", true);
                $('#status_deactive').prop("checked", false);
            }else{
                $('#status_active').prop("checked", false);
                $('#status_deactive').prop("checked", true);
            }

            var iconSelect = amenity.icon;
            iconPickerEdit(iconSelect);

        });

        $(document).on('click', '.edit-amenity', function(){
            let amenityName = $('#amenityName').val();
            !amenityName ? $(`#amenityName-edit-error`).html(`The Amenity field is required.`) : $(`#amenityName-error`).html(``);
            
            let amenityIcon = $('#amenityIcon').val();
            !amenityIcon ? $(`#amenityIcon-edit-error`).html(`The Icon field is required.`) : $(`#amenityIcon-error`).html(``);

            let amenityCategory = $('#amenityCategory').val();
            let status = $('input[name="e_status"]:checked').val();
            let id = $('.edit_id').val();

            if (!amenityName || !amenityIcon) {
                return;
            }

            formdata = new FormData();
            formdata.append('id', id);
            formdata.append('amenityName', amenityName);
            formdata.append('amenityIcon', amenityIcon);
            formdata.append('amenityCategory', amenityCategory);
            formdata.append('status', status);

            $.ajax({
                url: baseUrl + "/admin/update-amenity/" + id,
                data: formdata,
                type: "POST",
                processData: false,
                contentType: false,
                success: function (response) {
                    $(".modal").modal("hide");
                    $(".updateAmenityForm").trigger("reset");
                    amenityList();
                }
            });
        });

        $(document).on('change', '.featured', function(){
            let amenity = $(this).data("value");
            let featured = amenity.featured;
            let id     = amenity.id;

            formdata = new FormData();
            formdata.append('featured', featured);
            formdata.append('id', id);

            $.ajax({
                url: "{{route('featured.amenity')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (res) { 
                    amenityList();
                },
            }); 
        });

        $(document).on('click', '.amenityDelete', function(){
            let id = $(this).data('value');
            console.log(id);
            formdata = new FormData();
            formdata.append('id', id);
            $.ajax({
                url: baseUrl + "/admin/delete-amenity/" + id,
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (res) { 
                    amenityList();
                },
            }); 
        });

        function amenityList() {
            $.ajax({
                url: "{{route('amenity.list')}}",
                type: "GET",
                dataType: "HTML",
                success: function (response) {
                    $(".amenity-list").html(response);
                }
            });
        }
    });
</script>