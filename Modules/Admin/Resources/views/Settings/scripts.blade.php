<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/filepond/4.25.2/filepond.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js"></script>

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

    $(document).on('click', '.selectSettingTab', function() {
        var target = $(this).data('target');
        var active = $(this).addClass('active');

        $('.selectSettingTab').removeClass('active');
        $(this).addClass('active');
         console.log();

        formdata = new FormData();
        formdata.append('target', target);

        $.ajax({
            url: "{{route('setting.change')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) {
                $('.settingContent').empty();
                $('.settingContent').html(response);
            }, error:function (response) {

            }
        }); 
    });

    $(".profilePicUpload").change(function() {
        var id = $(this).data('value');
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.profilePicPreview_' + id).css('background-image', 'url(' + e.target.result + ')' );
                $('.profilePicPreview_' + id).hide();
                $('.profilePicPreview_' + id).fadeIn(650);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

    $(document).on('click', '.logo-btn', function(e){
        e.preventDefault();

        var formdata = new FormData();

        logo = FilePondLogo.getFiles();
        for (var i = 0; i < logo.length; i++) {
            formdata.append('logo', logo[i].file);
        }

        var favicon = FilePondFavicon.getFiles();
        for (var i = 0; i < favicon.length; i++) {
            formdata.append('favicon', favicon  [i].file);
        }

        $.ajax({
            url: "{{route('update.logo')}}",
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) {
                toastMixin.fire({ title: response.success, icon: 'success' });
                logoFavicon();  
            }, error:function (response) {
                console.log(response.error);
                toastMixin.fire({ title: 'please select logo or favicon.', icon: 'error' });
            }
        });
    });

    $(document).on('click', '.deleteFavicon', function(){
        let id = $(this).data('value');

        formdata = new FormData();
        formdata.append('id', id);

        $.ajax({
            url: baseUrl + "/admin/delete/favicon/" + id,
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) {
                logoFavicon();
                toastMixin.fire({ title: response.danger, icon: 'error' });
            },
        });
    });

    $(document).on('click', '.deleteLogo', function(){
        let id = $(this).data('value');

        formdata = new FormData();
        formdata.append('id', id);

        $.ajax({
            url: baseUrl + "/admin/delete/logo/" + id,
            type: "POST",
            processData: false,
            contentType: false,
            data: formdata,
            success: function (response) {
                // logoFavicon();
                toastMixin.fire({ title: response.danger, icon: 'error' });
                logoFavicon();
            },
        });
    });
});

    $(document).ready(function(){
        
        $('.selectCurrency').change(function(){
            var currency = $(this).val();
            var symbol = $(this).find(':selected').data('id');
            $('.symbol').val(symbol);
            $('.currencySpan').text('('+currency+')');
        });

        function selectCurrency(){
            var currency = $('.selectCurrency').val();
            $('.currencySpan').text('('+currency+')');
            var symbol = $('.selectCurrency').find(':selected').data('id');
            $('.symbol').val(symbol);
        }

        selectCurrency();

        $(document).on('click', '.generalSettingBtn', function(){
           var siteName =  $('.siteName').val();
           var primaryEmail =  $('.primaryEmail').val();
           var contactNumber =  $('.contactNumber').val();
           var timeZone =  $('.timeZone').find(":selected").text();
           var selectCurrency =  $('.selectCurrency').find(":selected").text();
           var currencySymbol =  $('.currencySymbol').val();

           !siteName ? $(`#siteName-error`).html(`The site name field is required.`) : $(`#siteName-error`).html(``);
           !primaryEmail ? $(`#primaryEmail-error`).html(`The primary email field is required.`) : $(`#primaryEmail-error`).html(``);
           !contactNumber ? $(`#contactNumber-error`).html(`The contact number field is required.`) : $(`#contactNumber-error`).html(``);
           !currencySymbol ? $(`#currencySymbol-error`).html(`The currency symbol field is required.`) : $(`#currencySymbol-error`).html(``);


           if (!siteName || !primaryEmail || !contactNumber || !currencySymbol) {
                return;
            }

            formdata = new FormData();
            formdata.append('siteName', siteName);
            formdata.append('primaryEmail', primaryEmail);
            formdata.append('contactNumber', contactNumber);
            formdata.append('timeZone', timeZone);
            formdata.append('selectCurrency', selectCurrency);
            formdata.append('currencySymbol', currencySymbol);

            $.ajax({
                url: "{{route('update.generalSetting')}}",
                data: formdata,
                type: "POST",
                processData: false,
                contentType: false,
                success: function (response) {
                    toastMixin.fire({ title: response.success, icon: 'success' });
                }, error:function (response) {
                    console.log('hello');
                }
            });
        });
    });

    $(document).on('click', '.emailSettingBtn', function(){
        var id = $('.id').val();
        var host_name =  $('.host_name').val();
        var port_name =  $('.port_name').val();
        var encryption =  $('.encryption').val();
        var username =  $('.username').val();
        var password =  $('.password').val();
        var from_email =  $('.fromemail').val();
        var from_name =  $('.fromname').val();
        console.log(host_name);

        !host_name ? $(`#hostname-error`).html(`The hostname field is required.`) : $(`#hostname-error`).html(``);
        !port_name ? $(`#portname-error`).html(`The portname field is required.`) : $(`#portname-error`).html(``);
        !encryption ? $(`#encryption-error`).html(`The encryption field is required.`) : $(`#encryption-error`).html(``);
        !username ? $(`#username-error`).html(`The username field is required.`) : $(`#username-error`).html(``);
        !password ? $(`#password-error`).html(`The password field is required.`) : $(`#password-error`).html(``);


        if (!host_name || !port_name || !encryption || !username || !password) {
            return;
        }

        formdata = new FormData();
        formdata.append('id', id);
        formdata.append('host_name', host_name);
        formdata.append('port_name', port_name);
        formdata.append('encryption', encryption);
        formdata.append('username', username);
        formdata.append('password', password);
        formdata.append('fromemail', from_email);
        formdata.append('fromname', from_name);

        $.ajax({
            url: "{{route('update.emailSetting')}}",
            data: formdata,
            type: "POST",
            processData: false,
            contentType: false,
            success: function (response) {
                toastMixin.fire({ title: response.success, icon: 'success' });
                emailSettings();
            }, error:function (response) {
                console.log('hello');
            }
        });
    });

    function emailSettings() {
        $.ajax({
            url: "{{route('emailsetting.show')}}",
            type: "GET",
            dataType: "HTML",
            success: function (response) {
                setTimeout(function() {
                    $('.settingContent').empty();
                    $('.settingContent').html(response);
                },  1500);
            }

        });
    }

    function logoFavicon() {
        $.ajax({
            url: "{{route('logoFavicon.show')}}",
            type: "GET",
            dataType: "HTML",
            success: function (response) {
                setTimeout(function() {
                    $('.settingContent').empty();
                    $('.settingContent').html(response);
                },  1500);
            }

        });
    }



    FilePond.registerPlugin(
        FilePondPluginFileEncode,
        FilePondPluginFileValidateSize,
        FilePondPluginImagePreview
    );

    FilePond.registerPlugin(
        FilePondPluginFileEncode,
        FilePondPluginFileValidateSize,
        FilePondPluginImagePreview
    );

    const fileponLayout = `
        <i class="icon">
            <svg width="40" height="40" viewBox="0 0 81 80" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M51.2347 50.2564L40.9782 40L30.7217 50.2564" stroke="#172B4D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M40.9788 40V63.0769" stroke="#172B4D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M62.4913 56.3849C64.9922 55.0215 66.9679 52.8641 68.1065 50.2532C69.245 47.6423 69.4817 44.7265 68.7791 41.9662C68.0765 39.2058 66.4747 36.758 64.2264 35.0091C61.9781 33.2603 59.2115 32.3099 56.3631 32.308H53.1323C52.3562 29.3061 50.9096 26.5191 48.9013 24.1567C46.8931 21.7943 44.3754 19.9179 41.5376 18.6685C38.6997 17.4192 35.6156 16.8294 32.517 16.9436C29.4184 17.0578 26.3861 17.8729 23.6479 19.3277C20.9097 20.7824 18.5369 22.839 16.7079 25.3428C14.8789 27.8466 13.6414 30.7325 13.0883 33.7834C12.5352 36.8343 12.6809 39.9709 13.5145 42.9574C14.3481 45.9439 15.848 48.7025 17.9012 51.0259" stroke="#172B4D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M51.2347 50.2564L40.9782 40L30.7217 50.2564" stroke="#172B4D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </i>
        <br>
        Drag & Drop your files or <a href="javascript:;" class="border-bottom text-black">Browser</a>
    `;

    const fileponReviewHeight = 200;

    // Select the file input and use create() to turn it into a pond
    $(document).ready(function () {
        FilePondLogo = FilePond.create(document.querySelector("input#file01"), {
            labelIdle: fileponLayout,
            imagePreviewHeight: fileponReviewHeight
        });

        FilePondFavicon = FilePond.create(document.querySelector("input#file02"), {
            labelIdle: fileponLayout,
            imagePreviewHeight: fileponReviewHeight
        });
    });
</script>
