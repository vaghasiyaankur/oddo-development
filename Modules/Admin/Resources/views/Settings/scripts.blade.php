<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/filepond/4.25.2/filepond.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js">
</script>

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

    $(document).on('click', '.logoButton', function(e){
        e.preventDefault();

        let whiteBackground = $('.whiteBackground')[0].files[0];
        let blackBackground = $('.blackBackground')[0].files[0];
        let favicon = $('.favicon')[0].files[0];

        if(whiteBackground || blackBackground || favicon){
            formdata = new FormData();
            formdata.append('whiteBackground', whiteBackground);
            formdata.append('blackBackground', blackBackground);
            formdata.append('favicon', favicon);
            
            $.ajax({
                url: "{{route('update.logo')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (response) { 
                    toastMixin.fire({ title: response.success, icon: 'success' });
                }, error:function (response) {
                    toastMixin.fire({ title: 'error', icon: 'success' });
                }   
            }); 
        }else{
            // toastMixin.fire({ title: 'change logo.', icon: 'error' });
        }
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
            var symbol = $('.selectCurrency').find(':selected').data('id');
            console.log(symbol);
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

           !siteName ? $(`#siteName-error`).html(`The siteName field is required.`) : $(`#siteName-error`).html(``);
           !primaryEmail ? $(`#primaryEmail-error`).html(`The primaryEmail field is required.`) : $(`#primaryEmail-error`).html(``);
           !contactNumber ? $(`#contactNumber-error`).html(`The contactNumber field is required.`) : $(`#contactNumber-error`).html(``);
           !currencySymbol ? $(`#currencySymbol-error`).html(`The currencySymbol field is required.`) : $(`#currencySymbol-error`).html(``);


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
        FilePond.create(document.querySelector("input#file01"), {
            labelIdle: fileponLayout,
            imagePreviewHeight: fileponReviewHeight
        });
        FilePond.create(document.querySelector("input#file02"), {
            labelIdle: fileponLayout,
            imagePreviewHeight: fileponReviewHeight
        });
    });

    $(document).ready(function () {
        const inputFile = $("input[type='file']");
        inputFile.on("change", function () {
            console.log($(this).val());
        });
    });
</script>