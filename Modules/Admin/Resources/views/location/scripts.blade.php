<script>
    Dropzone.autoDiscover = false;
    var myNewdDropzone = new Dropzone(".dropzone",  {
        url: '/test',
        method: 'post',
        autoProcessQueue: true,
        autoQueue: false,
        uploadMultiple: false,
        maxFilesize:1,
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

    var editMyNewdDropzone = new Dropzone(".editDropzone",  {
        url: '/test-demo',
        method: 'post',
        autoProcessQueue: true,
        autoQueue: false,
        uploadMultiple: false,
        maxFilesize:1,
        maxFiles: 1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",  
        thumbnailWidth: '500',
        thumbnailHeight: '500',
        clickable: true,
        previewsContainer: "#editGallery",
        previewTemplate: document.querySelector('#edit-dropzone-preview').innerHTML,
        init : function() {
            var editMyDropzone = this;
        },
    });

   

    $(document).ready(function(){
        var baseUrl = $('#base_url').val();

        $. ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // location Submit
        $(document).on('click', '.locationSubmit', function(){
            let cityName = $('.cityName').val();
            !cityName ? $(`#cityName-error`).html(`The city field is required.`) : $(`#cityName-error`).html(``);

            let country = $('.country').val();
            let status = $('.status:checked').val();

            let files = myNewdDropzone.getAcceptedFiles();
            var file = [];
            files.filter(async (f,i)=> {
                file = f.dataURL;
            });

            if (!cityName) {
                return;
            }
        
            $('.loadingShow span').css('display', 'block');
            $('.loadingHide').addClass('d-none');

            formdata = new FormData();
            formdata.append('name', cityName);
            formdata.append('file', file);
            formdata.append('country', country);
            formdata.append('status', status);

            $.ajax({
                url: "{{route('add.location')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (response) { 
                    $(".modal").modal("hide");
                    myNewdDropzone.removeAllFiles(true);
                    $('#cityName-error').html('');
                    $('#image-error').html('');
                    $(".locationForm").trigger("reset");
                    locationList();
                    toastMixin.fire({ title: response.success, icon: 'success' });
                }, error:function (response) {
                        $('.loadingShow span').css('display', 'none');
                        $('.loadingHide').removeClass('d-none');
                    $('#cityName-error').text(response.responseJSON.errors.name);
                    $('#image-error').text(response.responseJSON.errors.file);
                }   
            }); 
        });

        // featured Status
        $(document).on('change', '.featured', function(){
            let uuId = $(this).data("uu_id");
            let featured = $(this).data("value");

            formdata = new FormData();
            formdata.append('uuId', uuId);
            formdata.append('featured', featured);

            $.ajax({
                url: "{{route('featured.location')}}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (res) { 
                    locationList();
                },
            }); 
        });

        // delete Location
        $(document).on('click', '.delete-city', function(){
            let uuid = $(this).data('value');
            formdata = new FormData();
            formdata.append('uuid', uuid);

            $('.loadingShow span').css('display', 'block');
            $('.loadingHide').addClass('d-none');

            $.ajax({
                url: baseUrl + "/admin/delete-location/" + uuid,
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (response) { 
                    if(response.danger){
                        toastMixin.fire({ title: response.danger, icon: 'error' });
                    }else{
                        toastMixin.fire({ title: response.warning, icon: 'warning' });
                    }
                    locationList();
                },
            }); 
        });

        $(document).on('click', '.location-Edit', function(){
            
            // myNewdDropzone.removeAllFiles(true);
            $('.deleteValue').val(0);
            $('#imagePreview').show().html('');

            let location = $(this).data("value");
            $(".edit_id").val(location.UUID);
            $(".EditcityName").val(location.name);
            $(".editCountry option[value='"+location.country_id+"']").attr('selected',true);
            if(location.status == 1){
                $('.status_active').prop("checked", true);
                $('.status_deactive').prop("checked", false);
            }else{
                $('.status_active').prop("checked", false);
                $('.status_deactive').prop("checked", true);
            }

            // $('#dropzone-preview').show();
                $('#imagePreview').append(`<li class="mt-2 list-unstyled" id="dropzone-preview-list " style=" list-style:none !important; "
                                        <div class="border rounded">
                                                <div class="d-flex p-2 align-items-center">
                                                <div class="flex-shrink-0 me-3"> 
                                                    <div class="avatar-sm bg-light rounded">
                                                        <img data-dz-thumbnail class="img-fluid rounded d-block imageSet" 
                                                            src="`+baseUrl +`/storage/`+ location.background_image+ `" alt="Dropzone-Image" />
                                                        <input type="hidden" class="imageDataValue" value="`+location.background_image+`">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="pt-1">
                                                        <h5 class="fs-14 mb-1" data-dz-name>`+location.background_image+`</h5>
                                                        <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                                   </div>
                                                </div>
                                               <div class="flex-shrink-0 ms-3">
                                                    <input type="hidden" class="deleteValue" value="0">
                                                    <button  class="btn btn-sm btn-danger deleteImage">Delete</button>
                                                </div>
                                            </div>
                                        </div>  
                                    </li>`);
        });

        $(document).on('click', '.deleteImage', function(){
            $('.deleteValue').val(1);
            $('#imagePreview').hide();
        });


        $(document).on('click', '.updateLocation', function(){
            let id = $('.edit_id').val();
            let cityName = $('.EditcityName').val();
            !cityName ? $(`#EditcityName-error`).html(`The city field is required.`) : $(`#cityName-error`).html(``);

            let country = $('.editCountry').val();
            let status = $('.editStatus:checked').val();

            let image = $('.deleteValue').val();
            
            let files = editMyNewdDropzone.getAcceptedFiles();
            var file = [];
            files.filter(async (f,i)=> {
                file = f.dataURL;
            });

            if (!cityName) {
                return;
            }
        
            $('.loadingShow span').css('display', 'block');
            $('.loadingHide').addClass('d-none');

            formdata = new FormData();

            formdata.append('name', cityName);
            formdata.append('image', image);
            formdata.append('file', file);
            formdata.append('country', country);
            formdata.append('status', status);

            $.ajax({
                url: baseUrl + "/admin/update-location/" + id,
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function (response) { 
                    $(".modal").modal("hide");
                    editMyNewdDropzone.removeAllFiles(true);
                    $('#EditcityName-error').html('');
                    $('#Editimage-error').html('');
                    $(".locationForm").trigger("reset");
                    toastMixin.fire({ title: response.success, icon: 'success' });
                    locationList();
                }, error:function (response) {
                        $('.loadingShow span').css('display', 'none');
                        $('.loadingHide').removeClass('d-none');
                    $('#EditcityName-error').text(response.responseJSON.errors.name);
                    $('#Editimage-error').text(response.responseJSON.errors.file);
                }   
            }); 
        });


        // location List
        function locationList(){
            $.ajax({
                url: "{{route('location.list')}}",
                type: "GET",
                dataType: "HTML",
                success: function (response) {
                    $(".city_list").html(response);
                    setTimeout(function() {
                        $('.loadingShow span').css('display', 'none');
                        $('.loadingHide').removeClass('d-none');
                    },  2000);
                }
            });
        }  
    });



</script>