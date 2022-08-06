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
</script>