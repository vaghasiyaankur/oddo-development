@extends('layout::user.UserSite.master')

@section('title', 'Photo')
@section('meta_description', 'Page Photo')
@section('meta_keywords', 'Page, Photo')

@section('content')
    <!------ Pannel Form start ------->
    <section class="pannel-form admin-pannel-main py-5">
        <div class="container">
            <div class="admin-pannel-inner">
                <div class="row">
                    <div class="col-lg-3">
                        @include('usersite::side-bar')
                    </div>
                    <div class="col-lg-9">
                        <main class="property-photos">
                            <div class="pannel-heading">
                                <h2 class=" purple-dark pannel-title">Property Photos</h2>
                                <h5 class="heading-fs-16 purple-dark">Greate photos invite guestes to get the full experience
                                    of your property,so upload some high-resolution photos that represent all your property
                                    has to offer. We'll display these photos on your property's page on the website. </h5>
                            </div>
                            <div class="form-info-box mt-3">
                                <div class="photos-dropbox">
                                    <div class="dropbox-title">
                                        <h5 class="mb-3">Photo Gallery</h5>
                                    </div>
                                    <div class="drop-box-main">
                                        <div id="dropBox" class="position-relative">
                                            <h5 class="m-0 heading-fs-16">Upload at least 1 photo </h5>
                                            <p class="para-fs-14">You"ll also be able to upload more after registration</p>
                                            <p class="m-0 fw-bold">Drag & Drop Your Photos Here...</p>
                                            <span class="d-l-Purple ">or</span>
                                            <div class="imguplode-btn imgUploader" id="image_upload">
                                                <a href="javascript" class="button purple">Add Photos</a>
                                            </div>
                                            <form class="imgUploader mt-2">
                                                {{-- <input type="file" id="imgUpload" multiple accept="image/*" onClick='add_photo()'> --}}
                                                {{-- <input type="button" onClick='add_photo()'> --}}
                                                <label class="uploader-opacity" for="imgUpload">Add Photos</label>
                                            </form>
                                        </div>
                                        <span id="image_error" class="mt-2 text-danger"></span>
                                        <input type="hidden" class="hotelId" value="{{ @$hotelDetail->UUID }}">
                                        @if (isset($hotelPhotos))
                                            <div class="sortable row editImageDiv" id="gallery"
                                                data-id="{{ $hotelPhotos->count() > 0 ? '1' : '0' }}">
                                                <span id="main-photo-error" class="text-danger ui-sortable-handle"></span>
                                                @foreach ($hotelPhotos as $hotelPhoto)
                                                    @if ($hotelPhoto->main_photo == 1)
                                                        <div class="dz-preview well dz-image-preview main_photos col-lg-4 me-0 ms-0 main-photo-wrapper position-relative"
                                                            name="image" id="dz-preview-template">
                                                            <div class="dz-details me-0 ms-0 border">
                                                                <div class="dz-details-inner d-block m-0">
                                                                    <div class="gallery-img m-0">
                                                                        <img class="image--preview--show w-100 img-fluid imageEditValue"
                                                                            style="min-height:280px; min-width:280px"
                                                                            data-dz-thumbnail=""
                                                                            src="{{ @$hotelPhoto->photos ? asset('storage/' . @$hotelPhoto->photos) : asset('assets/images/default.png') }}"
                                                                            data-id="{{ $hotelPhoto->UUID }}"
                                                                            onerror="this.src='{{ asset('assets/images/default.png') }}'">
                                                                    </div>
                                                                    <div
                                                                        class="gallery-btn d-block ms-0 me-0  text-center d-flex justify-content-between align-items-center editImageParentClass">
                                                                        <div class="d-flex remove-selected-image">
                                                                            <a href="javascript:;"
                                                                                class="dz-remove text-white deleteImages editDeleteimage deleteImage_{{ $hotelPhoto->id }}"
                                                                                data-id="{{ $hotelPhoto->UUID }}">
                                                                                <i class="fa-solid fa-trash-can"></i>
                                                                            </a>
                                                                        </div>

                                                                        <div class="selectPhotoType">
                                                                            <select
                                                                                class="form-select c-form-select editPhotoCategory"
                                                                                data-id="{{ $hotelPhoto->UUID }}"
                                                                                data-delete="0">
                                                                                @foreach ($photoCategories as $photoCategory)
                                                                                    <option value="{{ $photoCategory->id }}"
                                                                                        {{ $photoCategory->id == $hotelPhoto->category_id ? 'selected' : '' }}>
                                                                                        {{ $photoCategory->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="dz-success-mark"><span> </span></div>
                                                            <div class="dz-error-mark"><span></span></div>
                                                            <div class="dz-error-message">
                                                                <span data-dz-errormessage=""></span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach

                                                @foreach ($hotelPhotos as $hotelPhoto)
                                                    @if ($hotelPhoto->main_photo == 0)
                                                        <div class="dz-preview well dz-image-preview main_photos col-lg-4 me-0 ms-0 main-photo-wrapper position-relative"
                                                            name="image" id="dz-preview-template">
                                                            <div class="dz-details me-0 ms-0 border">
                                                                <div class="dz-details-inner d-block m-0">
                                                                    <div class="gallery-img m-0">
                                                                        <img class="image--preview--show w-100 img-fluid imageEditValue"
                                                                            style="min-height:280px; min-width:280px"
                                                                            data-dz-thumbnail=""
                                                                            src="{{ @$hotelPhoto->photos ? asset('storage/' . @$hotelPhoto->photos) : asset('assets/images/default.png') }}"
                                                                            onerror="this.src='{{ asset('assets/images/default.png') }}'"
                                                                            data-id="{{ $hotelPhoto->UUID }}">
                                                                    </div>
                                                                    <div
                                                                        class="gallery-btn d-block ms-0 me-0  text-center d-flex justify-content-between align-items-center editImageParentClass">
                                                                        <div class="d-flex remove-selected-image">
                                                                            <a href="javascript:;"
                                                                                class="dz-remove text-white deleteImages editDeleteimage deleteImage_{{ $hotelPhoto->id }}"
                                                                                data-id="{{ $hotelPhoto->UUID }}">
                                                                                <i class="fa-solid fa-trash-can"></i>
                                                                            </a>
                                                                        </div>

                                                                        <div class="selectPhotoType">
                                                                            <select
                                                                                class="form-select c-form-select editPhotoCategory"
                                                                                data-id="{{ $hotelPhoto->UUID }}"
                                                                                data-delete="0">
                                                                                @foreach ($photoCategories as $photoCategory)
                                                                                    <option
                                                                                        value="{{ $photoCategory->id }}"
                                                                                        {{ $photoCategory->id == $hotelPhoto->category_id ? 'selected' : '' }}>
                                                                                        {{ $photoCategory->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="dz-success-mark"><span> </span></div>
                                                            <div class="dz-error-mark"><span></span></div>
                                                            <div class="dz-error-message">
                                                                <span data-dz-errormessage=""></span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                {{-- <span id="main-photo-error" class="text-danger"></span> --}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="photo-description-box mt-4">
                                <h5 class="m-0 fw-bold">No professional Photos? No Problem.</h5>
                                <div class="photo-des-inner mt-4">
                                    <div class="photo-des-single d-flex">
                                        <p><i class="fa-solid fa-angle-right pe-3"></i></p>
                                        <p class="para-fs-14"><span>You can use :</span> <i
                                                class="fa-solid fa-mobile-screen"></i><span class="pe-2 ps-2">A
                                                smartphone</span><i class="fa-solid fa-camera ps-2 pe-2"></i> <span>A
                                                digital camera</span></p>
                                    </div>
                                    <div class="photo-des-single d-flex">
                                        <p><i class="fa-solid fa-angle-right pe-3"></i></p>
                                        <p class="para-fs-14">Tip! <span class="text-decoration-underline">Guests love
                                                photos! Here are some tips to help you take a greate photos of your
                                                property:</span></p>
                                    </div>
                                    <div class="photo-des-single d-flex">
                                        <p><i class="fa-solid fa-angle-right pe-3"></i></p>
                                        <p class="para-fs-14">If you don't know who took a photo, it's best to avoid using
                                            it. Only use photos which you took own the copyright to, or if it was taken by
                                            someone else,make sure you have photographer's consent to use the photo</p>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="another-c-details mt-4">
                        <a href="javascript:;" class="btn another-c-d-btn w-100  save-photo-button">Continue
                            <div class="spinner-border" role="status" style="display: none;">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </a>
                    </div>
                    </main>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!------ Pannel Form end ------->

    <div id="hotel-photo-preview" style="display:none;">
        <div class="dz-preview well dz-image-preview col-lg-4 me-0 ms-0 main-photo-wrapper position-relative"
            id="dz-preview-template">
            <div class="dz-details me-0 ms-0 border">
                <div class="dz-details-inner d-block m-0">
                    <div class="gallery-img m-0">
                        <img class="image--preview--show w-100 img-fluid" style="min-height:280px; min-width:280px"
                            data-dz-thumbnail="" src="{{ asset('assets/images/default_Image.png') }}" data-id="0">
                    </div>
                    <div
                        class="gallery-btn d-block ms-0 me-0  text-center d-flex justify-content-between align-items-center">
                        <div class="d-flex remove-selected-image">
                            <a href="javascript:;" class="dz-remove text-white" data-dz-remove>
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </div>

                        <div class="selectPhotoType">
                            <select class="form-select c-form-select photoCategory">
                                @foreach ($photoCategories as $photoCategory)
                                    <option value="{{ $photoCategory->id }}">{{ $photoCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
        <div class="dz-success-mark"><span> </span></div>
        <div class="dz-error-mark"><span></span></div>
        <div class="dz-error-message">
            <span data-dz-errormessage=""></span>
        </div>
    </div>


@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('Adminpannel design/css/pannel.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <style>
        .remove-selected-image {
            border: 1px solid #c7acac;
            border-radius: 4px;
            padding: 6px 11px;
            background: red;
        }

        .main-photo-wrapper:nth-child(2):before {
            content: "Main Photo";
            max-width: 150px;
            height: 23px;
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
            font-size: 16px;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
        }

        .pannel-form .property-photos .drop-box-main .uploader-opacity {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
        }

        .spinner-border {
            float: right;
            width: 20px;
            height: 20px;
            margin-top: 4px;
            border: 3px solid currentColor;
            border-right-color: transparent;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        function deleteImage() {
            var image = JSON.parse(localStorage.getItem("deleteImage"));

            $.each(image, function(key, val) {
                $('.deleteImage_' + key).parents('.dz-image-preview').hide();
            });
        }

        deleteImage();

        var myNewdDropzone = new Dropzone(".uploader-opacity", {
            url: '/test',
            method: 'post',
            autoProcessQueue: false,
            autoQueue: false,
            autoDiscover: false,
            maxFilesize: 50,
            maxFiles: 100,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            thumbnailWidth: '500',
            thumbnailHeight: '500',
            clickable: true,
            maxThumbnailFilesize: 20,
            filesizeBase: 1000,
            previewsContainer: "#gallery",
            previewTemplate: document.querySelector('#hotel-photo-preview').innerHTML,
            init: function() {
                var myDropzone = this;
            },
        });

         // Get the existing image URLs from the backend (you can pass them from your Laravel controller)
         var existingUuids = {!! json_encode($hotelPhotos->pluck('UUID'))!!}
        
         // Inform Dropzone about the existing images
         var existedImages = [];

         existingUuids.forEach(function(uuid){
            var mockFile = { UUID:uuid, size:50000};// Replace 'size' with the actual size of the image.
            existedImages.push(mockFile);
         });
         myNewdDropzone.files.push.apply(myNewdDropzone.files, existedImages);
        
        $(document).ready(function() {
            var baseUrl = $('#base_url').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var data = $('.sortable').sortable();

            if (localStorage.getItem("deleteImage") === null) {
                localStorage.setItem('deleteImage', JSON.stringify({}));
            }

            $(document).on('click', '.save-photo-button', function() {
                
                if (myNewdDropzone.files.length == 0) {
                    $('#image_error').html('Please Select At Least 1 Photo');
                    return;
                } else  $('#image_error').html('');
                    
                var deleteImage = localStorage.getItem('deleteImage');

                var hotelId = $('.hotelId').val();
                let files = myNewdDropzone.getAcceptedFiles();
                var deleteImage = JSON.parse(localStorage.getItem("deleteImage"));
                var formData = new FormData();

                var photocategories = $('.photoCategory option:selected').map(function() {
                    return $(this).val();
                }).get();
                $('.spinner-border').show();

                files.filter(async (f, i) => {
                    var main = 0;
                    var mainSrc = $(".image--preview--show:first").attr("alt");
                    if (mainSrc == f.upload.filename) {
                        var main = 1;
                    };

                    var photoCategory = '';
                    $(photocategories).each(function(index, value) {
                        if (index == i) photoCategory = value;
                    });

                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"),
                        },
                        url: baseUrl + "/user/save-photos/" + hotelId,
                        type: "POST",
                        data: {
                            'url': f.dataURL,
                            'main': main,
                            'mainSrc': mainSrc,
                            'hotelId': hotelId,
                            'deleteImage': deleteImage,
                            'photoCategory': photoCategory
                        },
                        success: function(response) {
                            if (response.redirect_url) {
                                window.location = response.redirect_url;
                            }
                        },
                    });
                });

                var editImage = $('.editImageDiv').data('id');
                if (editImage == 1) {
                    var main_photos = $('.image--preview--show').map(function(n) {
                        if (n == 0) {
                            main = 1;
                        } else {
                            main = 0;
                        }
                        return {
                            'main': main,
                            'id': $(this).data('id')
                        };
                    }).get();

                    var EditImages = $('.editPhotoCategory option:selected').map(function(n) {
                        return {
                            'id': $(this).parents('.editPhotoCategory').data('id'),
                            'propertyType': $(this).val()
                        };
                    }).get();

                    var deleteImages = localStorage.getItem('deleteImage');

                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                        url: "{{ route('update-photos') }}",
                        type: "POST",
                        data: {
                            deleteImages: deleteImages,
                            EditImages: EditImages,
                            hotelId: hotelId,
                            main_photos: main_photos
                        },
                        success: function(response) {
                            if (response.redirect_url) {
                                window.location = response.redirect_url;
                            }
                        },
                    });
                }
            });

            $(document).on('click', '.deleteImages', function() {
                if (localStorage.getItem("deleteImage") === null) {
                    localStorage.setItem('deleteImage', JSON.stringify({}));
                }

                var id = $(this).data('id');

                var obj = JSON.parse(localStorage.getItem("deleteImage"));
                
                // Find the index of the object with the given UUID
                var ImageDelete = myNewdDropzone.files.findIndex(item => item.UUID === id);

                // Remove the file from Dropzone
                if (myNewdDropzone.files[ImageDelete]) {
                    myNewdDropzone.removeFile(myNewdDropzone.files[ImageDelete]);
                }
                var number = id;
                if (number in obj) {
                    // console.log(obj);
                } else {
                    obj[number] = id;
                }

                localStorage.setItem('deleteImage', JSON.stringify(obj));
                $(this).parents('.dz-image-preview').remove();
            });

        });

        function updateImage() {
            var images = $('.editPhotoCategory option:selected').map(function() {
                return {
                    'id': $(this).parents('.editPhotoCategory').data('id'),
                    'value': $(this).val()
                };
            }).get();
        }

        // refresh to delete edit image  
        localStorage.removeItem('deleteImage');
    </script>
@endpush
