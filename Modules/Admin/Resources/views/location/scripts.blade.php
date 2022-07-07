<script>
    Dropzone.autoDiscover = false;
    var myNewdDropzone = new Dropzone(".dropzone",  {
        url: '/test',
        method: 'post',
        autoProcessQueue: true,
        autoQueue: false,
        uploadMultiple: false,
        maxFilesize:30,
        maxFiles: 1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",  
        thumbnailWidth: '500',
        thumbnailHeight: '500',
        clickable: true,
        previewsContainer: "#gallery",
        previewTemplate: document.querySelector('#dropzone-preview').innerHTML,
        init : function() {
            var myDropzone = this;
        },
    });

    $(document).ready(function(){
        var baseUrl = $('#base_url').val();

        $. ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.locationSubmit', function(){
            let cityName = $('.cityName').val();
            !cityName ? $(`#cityName-error`).html(`The Amenity field is required.`) : $(`#cityName-error`).html(``);

            let files = myNewdDropzone.getAcceptedFiles();
            // var formData = new FormData();  
                
            // var mainSrc = $(".img-fluid").attr("alt");

            console.log(files);

        });
        
    });



</script>