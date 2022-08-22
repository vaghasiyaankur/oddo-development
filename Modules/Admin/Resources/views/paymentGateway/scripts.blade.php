<script>
$(document).ready(function(){
    
    var baseUrl = $('#base_url').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    // payment height set
    // $('.payment_main_div').each(function() {  
    //     var highestBox = 0;
    //     $('.card-body', this).each(function(){
    //         if($(this).height() > highestBox)
    //         {
    //             highestBox = $(this).height(); 
    //         }
    //     });  
    //     $('.card-body',this).height(highestBox);          
    // }); 

    // Update Paypal
    $(document).on('click', '.updatePaypal', function(){
        var paypal_id = $('.paypal_id').val();     
        !paypal_id ? $(`#paypal_id_error`).html(`The Paypal Client ID field is required.`) : $(`#paypal_id_error`).html(``);

        var paypal_key = $('.paypal_key').val();
        !paypal_key ? $(`#paypal_key_error`).html(`The Paypal Client Secret field is required.`) : $(`#paypal_key_error`).html(``);

        var paypal_api_key = $('.paypal_api_key').val();
        !paypal_api_key ? $(`#paypal_api_key_error`).html(`The Paypal Signature field is required.`) : $(`#paypal_api_key_error`).html(``);

        var paypal_UUID = $('.paypal_UUID').val();

        if (!paypal_id || !paypal_key || !paypal_api_key) {
            return;
        }

        formdata = new FormData();
        formdata.append('paypal_id', paypal_id);
        formdata.append('paypal_key', paypal_key);
        formdata.append('paypal_api_key', paypal_api_key);
        formdata.append('paypal_UUID', paypal_UUID);

        $.ajax({
            url: baseUrl + "/admin/update/paypal/" + paypal_UUID,
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) { 
                toastMixin.fire({ title: response.success, icon: 'success' });
            }, error:function (response) {
                // console.log(response);
            }
        }); 
    });

});
</script>