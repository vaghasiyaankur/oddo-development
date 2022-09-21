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
    
    // show paypal value
     // show stripe value
     $(document).on('change', '.paypal_mode', function(){
        var mode = $(this).val();
        var type = $(this).data('value');

        var paypalForm = $(this).parents('.card');
        paypalForm.find('.spinner-container').css('display', 'block');

        $.ajax({
            url: "{{route('show.paypal')}}",
            type: "GET",
            dataType:'json',
            data : { mode : mode, type : type},
            success: function (response) {

               setTimeout(function(){ 
                    $('.spinner-container').css('display', 'none');
                 }, 500);

                if (response.mode == 'live') {
                    $('.paypal_id').val(response.paymentGateways.live_client_id);
                    $('.paypal_key').val(response.paymentGateways.live_client_secret_key);
                    $('.paypal_api_key').val(response.paymentGateways.live_api_secret_key);
                    
                } else {
                    $('.paypal_id').val(response.paymentGateways.test_client_id);
                    $('.paypal_key').val(response.paymentGateways.test_client_secret_key);
                    $('.paypal_api_key').val(response.paymentGateways.test_api_secret_key);
                }
            }
        });
    });

    // Update Paypal
    $(document).on('click', '.updatePaypal', function(){
        var paypal_id = $('.paypal_id').val();     
        !paypal_id ? $(`#paypal_id_error`).html(`The Paypal Client ID field is required.`) : $(`#paypal_id_error`).html(``);

        var paypal_key = $('.paypal_key').val();
        !paypal_key ? $(`#paypal_key_error`).html(`The Paypal Client Secret field is required.`) : $(`#paypal_key_error`).html(``);

        var paypal_api_key = $('.paypal_api_key').val();
        !paypal_api_key ? $(`#paypal_api_key_error`).html(`The Paypal Signature field is required.`) : $(`#paypal_api_key_error`).html(``);

        var paypal_mode = $('.paypal_mode:checked').val();
        var paypal_UUID = $('.paypal_UUID').val();

        if (!paypal_id || !paypal_key || !paypal_api_key) {
            return;
        }

        var paypalForm = $(this).parents('.card');
        paypalForm.find('.spinner-container').css('display', 'block');

        formdata = new FormData();
        formdata.append('paypal_id', paypal_id);
        formdata.append('paypal_key', paypal_key);
        formdata.append('paypal_api_key', paypal_api_key);
        formdata.append('paypal_UUID', paypal_UUID);
        formdata.append('paypal_mode', paypal_mode);

        $.ajax({
            url: baseUrl + "/admin/update/paypal/" + paypal_UUID,
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) { 

                setTimeout(function(){ 
                    $('.spinner-container').css('display', 'none');
                 }, 500);

                toastMixin.fire({ title: response.success, icon: 'success' });
            }, error:function (response) {
                // console.log(response);
            }
        }); 
    });

    // update stripe 
    $(document).on('click', '.updateStripe', function(){
        var stripe_client_id = $('.stripe_client_id').val();
        !stripe_client_id ? $(`#stripe_client_id_error`).html(`The Stripe Client ID field is required.`) : $(`#stripe_client_id_error`).html(``);
        
        var stripe_secret_key = $('.stripe_secret_key').val();
        !stripe_secret_key ? $(`#stripe_secret_key_error`).html(`The Stripe Client Secret error field is required.`) : $(`#stripe_secret_key_error`).html(``);
        
        var stripe_mode = $('.stripe_mode:checked').val();
        var stripe_id = $('.stripe_id').val();    


        if (!stripe_id || !stripe_client_id || !stripe_secret_key) {
            return;
        }

        var paypalForm = $(this).parents('.card');
        paypalForm.find('.spinner-container').css('display', 'block');

        formdata = new FormData();
        formdata.append('stripe_id', stripe_id);
        formdata.append('stripe_client_id', stripe_client_id);
        formdata.append('stripe_secret_key', stripe_secret_key);
        formdata.append('stripe_mode', stripe_mode);


        $.ajax({
            url: baseUrl + "/admin/update/stripe/" + stripe_id,
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) { 

                setTimeout(function(){ 
                    $('.spinner-container').css('display', 'none');
                 }, 500);
                toastMixin.fire({ title: response.success, icon: 'success' });
            }, error:function (response) {
                // console.log(response);
            }
        }); 
    });

     // show stripe value
     $(document).on('change', '.stripe_mode', function(){
        var mode = $(this).val();
        var type = $(this).data('value');

        var paypalForm = $(this).parents('.card');
        paypalForm.find('.spinner-container').css('display', 'block');
        
        $.ajax({
            url: "{{route('show.stripe')}}",
            type: "GET",
            dataType:'json',
            data : { mode : mode, type : type},
            success: function (response) {

                setTimeout(function(){ 
                    $('.spinner-container').css('display', 'none');
                 }, 500);

                if (response.mode == 'live') {
                    $('.stripe_client_id').val(response.paymentGateways.live_client_id);
                    $('.stripe_secret_key').val(response.paymentGateways.live_client_secret_key);
                } else {
                    $('.stripe_client_id').val(response.paymentGateways.test_client_id);
                    $('.stripe_secret_key').val(response.paymentGateways.test_client_secret_key);
                }
            }
        });
    });

    // update razorpay 
    $(document).on('click', '.updateRazor', function(){
        var razor_client_id = $('.razor_client_id').val();
        !razor_client_id ? $(`#razor_client_id_error`).html(`The Razorpay Client ID field is required.`) : $(`#razor_client_id_error`).html(``);
        
        var razor_client_secret_key = $('.razor_client_secret_key').val();
        !razor_client_secret_key ? $(`#razor_client_secret_key_error`).html(`The Razorpay Client Secret error field is required.`) : $(`#razor_client_secret_key_error`).html(``);

        var razorpay_mode = $('.razorpay_mode:checked').val();
        var razor_id = $('.razor_id').val();    

        if (!razor_id || !razor_client_id || !razor_client_secret_key) {
            return;
        }
        var paypalForm = $(this).parents('.card');
        paypalForm.find('.spinner-container').css('display', 'block');

        formdata = new FormData();
        formdata.append('razor_id', razor_id);
        formdata.append('razor_client_id', razor_client_id);
        formdata.append('razor_client_secret_key', razor_client_secret_key);
        formdata.append('razorpay_mode', razorpay_mode);

        $.ajax({
            url: baseUrl + "/admin/update/razorpay/" + razor_id,
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) { 
                setTimeout(function(){ 
                    $('.spinner-container').css('display', 'none');
                 }, 500);

                toastMixin.fire({ title: response.success, icon: 'success' });
            }, error:function (response) {
                // console.log(response);
            }
        }); 
    });

    // show razorpay value
    $(document).on('change', '.razorpay_mode', function(){
        var mode = $(this).val();
        var type = $(this).data('value');
        
        var paypalForm = $(this).parents('.card');
        paypalForm.find('.spinner-container').css('display', 'block');

        $.ajax({
            url: "{{route('show.razorpay')}}",
            type: "GET",
            dataType:'json',
            data : { mode : mode, type : type},
            success: function (response) {

                setTimeout(function(){ 
                    $('.spinner-container').css('display', 'none');
                 }, 500);


                if (response.mode == 'live') {
                    $('.razor_client_id').val(response.paymentGateways.live_client_id);
                    $('.razor_client_secret_key').val(response.paymentGateways.live_client_secret_key);
                } else {
                    $('.razor_client_id').val(response.paymentGateways.test_client_id);
                    $('.razor_client_secret_key').val(response.paymentGateways.test_client_secret_key);
                }
            }
        });
    });

    // payment Status
    $(document).on('change', '.payment_status', function(){
        var type = $(this).data('value');

        if($(this).prop("checked") == true){
            var status  = 1;
        }else{
            var status  = 0;
        }

        formdata = new FormData();
        formdata.append('type', type);
        formdata.append('status', status);

        $.ajax({
            url: "{{route('paymentGateways.status')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) { 
                // $('.updateLoader').addClass('off').removeClass('on');
                // toastMixin.fire({ title: response.success, icon: 'success' });
            }, error:function (response) {
                // console.log(response);
            }
        }); 
    });
});
</script>