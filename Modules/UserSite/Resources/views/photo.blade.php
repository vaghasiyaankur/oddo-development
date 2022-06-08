@extends('user_site.layout.master')

@section('title')
Photo
@endsection

@section('content')
    <!------ Pannel Form start ------->
    <section class="pannel-form admin-pannel-main py-5">
        <div class="container">
            <div class="admin-pannel-inner">
                <div class="row">
                    <div class="col-3">
                        @include('usersite::side-bar')
                    </div>
                    <div class="col-lg-9">
                        <main class="property-photos">
                            <div class="pannel-heading">
                                <h2 class=" purple-dark pannel-title">Property Photos</h2>
                                <h5 class="heading-fs-16 purple-dark">Greate photos invite guestes to get the full experience of your property,so upload some high-resolution photos that represent all your property has to offer. We'll display these photos on your property's page on the website.  </h5>
                            </div>
                            <div class="form-info-box mt-3">
                                <div class="photos-dropbox">
                                    <div class="dropbox-title">
                                        <h5 class="m-0">Photo Gallery</h5>
                                    </div>
                                    <div class="drop-box-main">
                                        <div id="dropBox" class="position-relative">
                                            <h5 class="m-0 heading-fs-16">Upload at least 1 photo </h5>
                                            <p class="para-fs-14">You"ll also be able to upload more after registration</p>
                                            <p class="m-0 fw-bold">Drag & Drop Your Photos Here...</p>
                                            <span class="d-l-Purple ">or</span> 
                                            <div class="imguplode-btn imgUploader">
                                                <a href="javascript" class="button purple">Add Photos</a>
                                            </div>
                                            <form class="imgUploader mt-2">
                                                {{-- <input type="file" id="imgUpload" multiple accept="image/*" onClick='add_photo()'> --}}
                                                {{-- <input type="button" onClick='add_photo()'> --}}
                                                <label class="uploader-opacity" for="imgUpload">Add Photos</label>
                                            </form>
                                        </div> 
                                        <div class="sortable row" id="gallery">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="photo-description-box mt-4">
                                    <h5 class="m-0 fw-bold">No professional Photos? No Problem.</h5>
                                    <div class="photo-des-inner mt-4">
                                        <div class="photo-des-single d-flex">
                                            <p><i class="fa-solid fa-angle-right pe-3"></i></p>
                                            <p class="para-fs-14"><span>You can use :</span> <i class="fa-solid fa-mobile-screen"></i><span class="pe-2 ps-2">A smartphone</span><i class="fa-solid fa-camera ps-2 pe-2"></i> <span>A digital camera</span></p>
                                        </div>
                                        <div class="photo-des-single d-flex">
                                            <p><i class="fa-solid fa-angle-right pe-3"></i></p>
                                            <p class="para-fs-14">Tip! <span class="text-decoration-underline">Guests love photos! Here are some tips to help you take a greate photos of your property:</span></p>
                                        </div>
                                        <div class="photo-des-single d-flex">
                                            <p><i class="fa-solid fa-angle-right pe-3"></i></p>
                                            <p class="para-fs-14">If you don't know who took a photo, it's best to avoid using it. Only use photos which you took own the copyright to, or if it was taken by someone else,make sure you have photographer's consent to use the photo</p>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="another-c-details mt-4">
                                <a href="javascript:;" class="btn another-c-d-btn w-100 save-photo-button">Continue</a>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------ Pannel Form end ------->

        <div id="hotel-photo-preview" style="display:none;">
            <div class="dz-preview well dz-image-preview col-lg-4 me-0 ms-0 main-photo-wrapper position-relative"  id="dz-preview-template">
                <div class="dz-details me-0 ms-0 border">
                    <div class="dz-details-inner d-block m-0">
                        <div class="gallery-img m-0">
                            <img class="image--preview--show w-100 img-fluid" style="min-height:280px; min-width:280px" data-dz-thumbnail="">
                        </div>
                        <div class="gallery-btn d-block ms-0 me-0 ">
                            <a href="javascript:;" class="crop-selected-image text-dark">
                                <i class="fa-solid fa-pen"></i> <span>Edit</span>
                            </a>
                            <a href="javascript:;" class="dz-remove remove-selected-image text-dark  ps-5" data-dz-remove>
                                <i class="fa-solid fa-trash-can"></i> <span>Delete</span> 
                            </a>
                        </div>
                    </div>
                </div>
                <div class="dz-success-mark"><span> </span></div>
                <div class="dz-error-mark"><span></span></div>
                <div class="dz-error-message">
                    <span data-dz-errormessage=""></span>
                </div>
            </div>
            
        </div>

@endsection

@push('css')
<link rel="stylesheet" href="{{asset('Adminpannel design/css/pannel.css')}}">
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<style>
    .main-photo-wrapper:first-child:before{
        content: "Main Photo";
        max-width: 150px;
        height: 20px;
        text-align: center;
        background: #6a78c7;
        color: #fff;
        border-radius: 3px;
        margin: auto;
        padding: 0px 8px;
        display: inline-block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        font-size: 14px;
        position: absolute;
        top: 0;
        left:0;
        right: 0;
    }
    .pannel-form .property-photos .drop-box-main .uploader-opacity{
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    }
</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>
 

    var myNewdDropzone = new Dropzone(".uploader-opacity",  {
        url: '/test',
        method: 'post',
        autoProcessQueue: false,
        autoQueue: false,
        maxFiles: 100,
        thumbnailWidth: '500',
        thumbnailHeight: '500',
        clickable: true,
        previewsContainer: "#gallery",
        previewTemplate: document.querySelector('#hotel-photo-preview').innerHTML,
        init : function() {
            var myDropzone = this;
        },
    });

    
    
    
    
    $(document).ready(function(){
          
    var data = $('.sortable').sortable();

    $(document).on('click','.save-photo-button', function(){
        let files = myNewdDropzone.getAcceptedFiles();

        var formData = new FormData();       
        files.filter(async (f,i)=> {
            var main = 0;
            if(i == 0){
                var main = 1;
            };
            $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "{{route('save-photos')}}",
            type: "POST",
            data: {'url' : f.dataURL, 'main' : main},
            success: function (res) {
                console.log('dsds');
            },
        });
        });
        
    });

});

</script>
@endpush