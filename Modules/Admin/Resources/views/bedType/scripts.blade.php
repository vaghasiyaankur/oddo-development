<script>
$(document).ready(function(){
    var baseUrl = $('#base_url').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // add bed
    $(document).on('click', '.bed-type-submit', function(){
        let bedtype = $('.bedtype').val();
        !bedtype ? $(`#bedtype-error`).html(`The bed type field is required.`) : $(`#bedtype-error`).html(``);

        let bedsize = $('.bedsize').val();
        !bedsize ? $(`#bedsize-error`).html(`The bed size field is required.`) : $(`#bedsize-error`).html(``);

        if (!bedtype || !bedsize) {
            return;
        }
        
        $('.loadingShow span').css('display', 'block');
        $('.loadingHide').addClass('d-none');

        formdata = new FormData();
        formdata.append('bedtype', bedtype);
        formdata.append('bedsize', bedsize);

        $.ajax({
            url: "{{route('add.bedtype')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) { 
                $(".bedTypeForm").trigger("reset");
                bedTypeList();
                toastMixin.fire({ title: response.success, icon: 'success' });
            }, error:function (response) {
                    $('.loadingShow span').css('display', 'none');
                    $('.loadingHide').removeClass('d-none');
                $('#bedtype-error').text(response.responseJSON.errors.bedtype);
            }
        }); 
    });

    // edit bed
    $(document).on('click', '.edit-bedtype', function(){
        let bed = $(this).data("value");
        $('.edit_div').show();
        $('.edit_div').removeClass("d-none");
        $('.create_div').hide();
        $(".editBedtype").val(bed.bed_type);
        $(".editBedSize").val(bed.bed_size);
        $(".edit_id").val(bed.UUID);
    });

    // update bed
    $(document).on('click', '.bed-type-update', function(){
        let id = $(".edit_id").val();

        let editBedtype = $('.editBedtype').val();
        !editBedtype ? $(`#editBedtype-error`).html(`The bed type field is required.`) : $(`#editBedtype-error`).html(``);

        let editBedSize = $('.editBedSize').val();
        !editBedSize ? $(`#editBedSize-error`).html(`The bed size field is required.`) : $(`#editBedSize-error`).html(``);

        if (!editBedtype || !editBedSize) {
            return;
        }
        
        formdata = new FormData();
        formdata.append('id', id);
        formdata.append('editBedtype', editBedtype);
        formdata.append('editBedSize', editBedSize);

        $('.loadingShow span').css('display', 'block');
        $('.loadingHide').addClass('d-none');

        $.ajax({
            url: baseUrl + "/admin/update-bed/" + id,
            data: formdata,
            type: "POST",
            processData: false,
            contentType: false,
            success: function (response) {
                $("#editBedTypeForm").trigger("reset");
                $('.edit_div').hide();
                $('.create_div').show();
                $('#editBedtype-error').html('');
                bedTypeList();
                toastMixin.fire({ title: response.success, icon: 'success' });
                setTimeout(function() {
                    $('.loadingShow span').css('display', 'none');
                    $('.loadingHide').removeClass('d-none');
                },  1500);
            }, error:function (response) {
                $('#editBedtype-error').text(response.responseJSON.errors.editBedtype);
            }
        });
    });

    // delete bed
    $(document).on('click', '.delete-bedtype', function(){
        let id = $(this).data('value');

        $('.loadingShow span').css('display', 'block');
        $('.loadingHide').addClass('d-none');

        $.ajax({
            url: baseUrl + "/admin/delete-bed/" + id,
            type: "POST",
            processData: false,
            contentType: false,
            success: function (response) { 
                if(response.danger){
                    toastMixin.fire({ title: response.danger, icon: 'error' });
                }else{
                    toastMixin.fire({ title: response.warning, icon: 'warning' });
                }
                bedTypeList();
            },
        }); 
    });

    // status bed
    $(document).on('change', '.Status-bedtype', function(){
        let status = $(this).data("value");
        let id = $(this).data("id");

        formdata = new FormData();
        formdata.append('status', status);
        formdata.append('id', id);

        $.ajax({
            url: "{{route('status.bedtype')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) { 
                bedTypeList();
            },
        }); 
    });

    function bedTypeList() {
        $.ajax({
            url: "{{route('bedtype.list')}}",
            type: "GET",
            dataType: "HTML",
            success: function (response) {
                setTimeout(function() {
                    $('.loadingShow span').css('display', 'none');
                    $('.loadingHide').removeClass('d-none');
                },  1500);
                $(".bedTypeTable").html(response);
            }
        });
    }

});

</script>