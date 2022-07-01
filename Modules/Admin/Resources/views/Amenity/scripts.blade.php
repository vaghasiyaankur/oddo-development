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
                hideOnSelect: false,
                fade: true,
                defaultValue: 'bi-search',
                // valueFormat: val => `bi ${val}`
            });

            iconpicker.set() // Set as empty
            // iconpicker.set('bi-search') // Reset with a value
        })();

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
                hideOnSelect: false,
                fade: true,
                defaultValue: 'bi-search',
                // valueFormat: val => `bi ${val}`
            });

            iconpicker.set() // Set as empty
            // iconpicker.set('bi-alarm') // Reset with a value
        })();

        // $(document).on('click', '.amenity-button', function() {
        //     $('.option-select').toggleClass('show');
        // });

        // $(document).on('click', '.save-amenity', function(){
        //     let amenityName = $('.amenityName').val();
        //     !amenityCategory ? $(`#amenityName-error`).html(`The Amenity field is required.`) : $(`#amenityName-error`).html(``);
            
        //     let amenityIcon = $('.amenityIcon').val();
        //     !amenityCategory ? $(`#amenityIcon-error`).html(`The Icon field is required.`) : $(`#amenityCategory-error`).html(``);
            
        //     var status = $('input[name="status"]:checked').val();

        //     if (!amenityName || !amenityIcon) {
        //         return;
        //     }

        //     formdata = new FormData();
        //     formdata.append('amenityCategory', amenityCategory);

        //     $.ajax({
        //         url: "{{route('add.amenitycategory')}}",
        //         type: "POST",
        //         processData: false,
        //         contentType: false,
        //         data: formdata,
        //         success: function (res) { 
        //             $(".amenityCategoryForm").trigger("reset");
        //             CategoryList();
        //         },
        //     }); 
        // });
    });
</script>