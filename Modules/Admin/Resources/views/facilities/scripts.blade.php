<script>
    var baseUrl = $('#base_url').val();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
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

    function  iconPickerEdit(iconSelect){
        (async () => {
            const response = await fetch(
                'https://unpkg.com/codethereal-iconpicker@1.2.1/dist/iconsets/bootstrap5.json')
            const result = await response.json()

            const iconpicker = new Iconpicker(document.querySelector(".icon-picker"), {
                icons: result,
                showSelectedIn: document.querySelector(".selected-icon"),
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

    let theEditor;
    ClassicEditor.create(document.querySelector('#createCKEditor')).then(editor => {
        theEditor = editor;
    }).catch(error => {
        console.error(error);
    }); 

    function getDataFromTheEditor() {
        return theEditor.getData();
    }
    
    let Editor;
    ClassicEditor.create(document.querySelector('#Editor')).then(editEditor => {
        Editor = editEditor;
    }).catch(error => {
        console.error(error);
    });

    function setDataFromEditor(desc) {
        return Editor.setData(desc);
    }



$(document).ready(function() {
    
    var current_color = $(".facilityColor").val() || null;
    var edit_color    = $(".EditfacilityColor").val() || "#4169e1";
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
        $('.facilityColor').val(current_color);
    });

    const editPickr = Pickr.create({
        el: ".editPickr",
        theme: 'nano', // or 'monolith', or 'nano'
        closeOnScroll: true,
        defaultRepresentation: "HEXA",
        default: edit_color,
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

    editPickr.on("change", function(color,instance) {
        edit_color = color.toHEXA().toString();
        $('.EditfacilityColor').val(edit_color);
    });
        

    // insert facility
    $(document).on('click', '.faciltySubmit', function(){
        let faclityName = $('.faclityName').val();
        !faclityName ? $(`#faclityName-error`).html(`The facility name field is required.`) : $(`#faclityName-error`).html(``);

        let faclityIcon = $('.faclityIcon').val();
        !faclityIcon ? $(`#faclityIcon-error`).html(`The facility icon field is required.`) : $(`#faclityIcon-error`).html(``);

        let facilityColor = $('.facilityColor').val();
        !facilityColor ? $(`#facilityColor-error`).html(`The facility color field is required.`) : $(`#facilityColor-error`).html(``);
        
        // let facilityDescription = $('.facilityDescription').text();
        let facilityDescription = getDataFromTheEditor();
        !facilityDescription ? $(`#facilityDescription-error`).html(`The facility description field is required.`) : $(`#facilityDescription-error`).html(``);

        if (!faclityName|| !faclityIcon|| !facilityColor|| !facilityDescription) {
            return;
        }

        formdata = new FormData();
        formdata.append('faclityName', faclityName);
        formdata.append('faclityIcon', faclityIcon);
        formdata.append('facilityColor', facilityColor);
        formdata.append('facilityDescription', facilityDescription);

        $.ajax({
            url: "{{route('add.facility')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (res) { 
                toastMixin.fire({ title: res.success, icon: 'success' });
                $(".createFaclityForm").trigger("reset");
                $("#facilityCreate").modal("hide");
                facilitiesList();
            }, error:function (response) {
                $('#faclityName-error').text(response.responseJSON.errors.faclityName);
            }
        }); 
    });
    
    //  edit Facility
    $(document).on('click', '.editFacility', function(){
        let facility = $(this).data("value");
        $(".edit_id").val(facility.id);
        $(".editfaclinityName").val(facility.facilities_name);
        $(".EditfacilityColor").val(facility.color);
        let desc = facility.description;
        setDataFromEditor(desc);
        var iconSelect = facility.icon;
        iconPickerEdit(iconSelect);
    });

    $(document).on('click', '.editFacilitySubmit', function(){
        let editFaclityName = $('.editfaclinityName').val();
        !editFaclityName ? $(`#editfaclinityName-error`).html(`The facility name field is required.`) : $(`#editfaclinityName-error`).html(``);

        let editFaclityIcon = $('.editFaclityIcon').val();
        !editFaclityIcon ? $(`#editFaclityIcon-error`).html(`The facility icon field is required.`) : $(`#editFaclityIcon-error`).html(``);

        let editFacilityColor = $('.EditfacilityColor').val();
        !editFacilityColor ? $(`#EditfacilityColor-error`).html(`The facility color field is required.`) : $(`#EditfacilityColor-error`).html(``);
        
        let editFacilityDescription = Editor.getData();
        !editFacilityDescription ? $(`#editFacilityDescription-error`).html(`The facility description field is required.`) : $(`#editFacilityDescription-error`).html(``);

        let id = $('.edit_id').val();

        if (!editFaclityName|| !editFaclityIcon|| !editFacilityColor|| !editFacilityDescription) {
            return;
        }
        formdata = new FormData();
        formdata.append('id', id);
        formdata.append('editFaclityName', editFaclityName);
        formdata.append('editFaclityIcon', editFaclityIcon);
        formdata.append('editFacilityColor', editFacilityColor);
        formdata.append('editFacilityDescription', editFacilityDescription);

        $.ajax({
            url: baseUrl + "/admin/update-facility/" + id,
            data: formdata,
            type: "POST",
            processData: false,
            contentType: false,
            success: function (response) {
                $(".modalEdit").modal("hide");
                $(".editFaclityForm").trigger("reset");
                facilitiesList();
                toastMixin.fire({ title: response.success, icon: 'success' });
            }, error:function (response) {
                $('#editfaclinityName-error').text(response.responseJSON.errors.editFaclityName);
            }
        });
    });

    $(document).on('change', '.status', function(){
        let facility = $(this).data("value");
        let status = facility.status;
        let id     = facility.id;

        formdata = new FormData();
        formdata.append('status', status);
        formdata.append('id', id);

        $.ajax({
            url: "{{route('status.facility')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (res) { 
                facilitiesList();
            },
        }); 
    });

    $(document).on('click', '.deleteFacility', function(){
        let id = $(this).data('value');
        console.log(id);
        formdata = new FormData();
        formdata.append('id', id);
        $.ajax({
            url: baseUrl + "/admin/delete-facility/" + id,
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) { 
                facilitiesList();
                toastMixin.fire({ title: response.danger, icon: 'error' });
            },
        }); 
    });

    // facilities Table
    function facilitiesList() {
        $.ajax({
            url: "{{route('facilities.list')}}",
            type: "GET",
            dataType: "HTML",
            success: function (response) {
                $(".facilitiesTable").html(response);
            }
        });
    }
});
</script>