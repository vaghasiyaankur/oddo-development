<script>
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
            defaultValue: 'bi-search',
            // valueFormat: val => `bi ${val}`
        });

        iconpicker.set() // Set as empty
        // iconpicker.set('bi-alarm') // Reset with a value
    })();
    
    ClassicEditor.create( document.querySelector( '#editor' ) ).catch( error => {
        console.error( error );
    });

    ClassicEditor.create( document.querySelector( '#createCKEditor' ) ).catch( error => {
        console.error( error );
    });


    $(document).ready(function() {
        var current_color = $(".pickr-field").val() || null;
        $('[data-bs-toggle="popover"]').popover();
        const pickr = Pickr.create({
        el: ".pickr",
        theme: 'nano', // or 'monolith', or 'nano'
        closeOnScroll: true,
        defaultRepresentation: "HEXA",
        default: current_color,
        components: {
            
            // Main components
            preview: true,
            opacity: true,
            hue: true,

            // Input / output Options
            interaction: {
                hex: false,
                rgba: false,
                hsla: false,
                hsva: false,
                cmyk: false,
                input: false,
                clear: false,
                cancel: false,
                save: false
            }
        }
    });

    pickr.on("change", function(color,instance) {
        current_color = color.toHEXA().toString();
        $('.pickr-field').val(current_color);
    });

    

        $(document).on('click', '.faciltySubmit', function(){

            console.log($('.pcr-result').val());
            // let faclityName = $('.faclityName').val();
            // !faclityName ? $(`#faclityName-error`).html(`The Amenitycategory field is required.`) : $(`#faclityName-error`).html(``);

            // let faclityIcon = $('.faclityIcon').val();
            // !faclityIcon ? $(`#faclityIcon-error`).html(`The Amenitycategory field is required.`) : $(`#faclityIcon-error`).html(``);

            // let amenityCategory = $('.amenityCategory').val();
            // !amenityCategory ? $(`#amenityCategory-error`).html(`The Amenitycategory field is required.`) : $(`#amenityCategory-error`).html(``);
            
            // let facilityDescription = $('.facilityDescription').val();
            // !facilityDescription ? $(`#amenityCategory-error`).html(`The Amenitycategory field is required.`) : $(`#facilityDescription-error`).html(``);

        });

    });
</script>