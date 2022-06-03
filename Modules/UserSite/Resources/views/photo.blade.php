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
                                        <div id="dropBox">
                                            <h5 class="m-0 heading-fs-16">Upload at least 1 photo </h5>
                                            <p class="para-fs-14">You"ll also be able to upload more after registration</p>
                                            <p class="m-0 fw-bold">Drag & Drop Your Photos Here...</p>
                                            <span class="d-l-Purple ">or</span> 
                                            <form class="imgUploader mt-2">
                                                <input type="file" id="imgUpload" multiple accept="image/*" onchange="filesManager(this.files)">
                                                <label class="button purple" for="imgUpload">Add Photos</label>
                                            </form>
                                            <div id="gallery"></div>
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
                                <a href="javascript:;" class="btn another-c-d-btn w-100">Continue</a>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------ Pannel Form end ------->

@endsection

@push('css')
<link rel="stylesheet" href="{{asset('Adminpannel design/css/pannel.css')}}">
@endpush

@push('scripts')
<script>
// jjs for hide and show on butoon 
$(document).ready(function(){
        let dropBox = document.getElementById('dropBox');

    // modify all of the event types needed for the script so that the browser
    // doesn't open the image in the browser tab (default behavior)
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(evt => {
    dropBox.addEventListener(evt, prevDefault, false);
    });
    function prevDefault (e) {
    e.preventDefault();
    e.stopPropagation();
    }

    // remove and add the hover class, depending on whether something is being
    // actively dragged over the box area
    ['dragenter', 'dragover'].forEach(evt => {
    dropBox.addEventListener(evt, hover, false);
    });
    ['dragleave', 'drop'].forEach(evt => {
    dropBox.addEventListener(evt, unhover, false);
    });
    function hover(e) {
    dropBox.classList.add('hover');
    }
    function unhover(e) {
    dropBox.classList.remove('hover');
    }

    // the DataTransfer object holds the data being dragged. it's accessible
    // from the dataTransfer property of drag events. the files property has
    // a list of all the files being dragged. put it into the filesManager function
    dropBox.addEventListener('drop', mngDrop, false);
    function mngDrop(e) {
    let dataTrans = e.dataTransfer;
    let files = dataTrans.files;
    filesManager(files);
    }

    // use FormData browser API to create a set of key/value pairs representing
    // form fields and their values, to send using XMLHttpRequest.send() method.
    // Uses the same format a form would use with multipart/form-data encoding
    function upFile(file) {
    //only allow images to be dropped
    let imageType = /image.*/;
    if (file.type.match(imageType)) {
        let url = 'HTTP/HTTPS URL TO SEND THE DATA TO';
        // create a FormData object
        let formData = new FormData();
        // add a new value to an existing key inside a FormData object or add the
        // key if it doesn't exist. the filesManager function will loop through
        // each file and send it here to be added
        formData.append('file', file);

        // standard file upload fetch setup
        fetch(url, {
            method: 'put',
            body: formData
        })
        .then(response => response.json())
        .then(result => { console.log('Success:', result); })
        .catch(error => { console.error('Error:', error); });
    } else {
        console.error("Only images are allowed!", file);
    }
    }
    // use the FileReader API to get the image data, create an img element, and add
    // it to the gallery div. The API is asynchronous so onloadend is used to get the
    // result of the API function
    function previewFile(file) {
    // only allow images to be dropped
    let imageType = /image.*/;
    if (file.type.match(imageType)) {
        let fReader = new FileReader();
        let gallery = document.getElementById('gallery');
        // reads the contents of the specified Blob. the result attribute of this
        // with hold a data: URL representing the file's data
        fReader.readAsDataURL(file);
        // handler for the loadend event, triggered when the reading operation is
        // completed (whether success or failure)
        fReader.onloadend = function() {
            let wrap = document.createElement('div');
            let img = document.createElement('img');
            // set the img src attribute to the file's contents (from read operation)
            img.src = fReader.result;
            let imgCapt = document.createElement('p');
            // the name prop of the file contains the file name, and the size prop
            // the file size. convert bytes to KB for the file size
            let fSize = (file.size / 1000) + ' KB';
            imgCapt.innerHTML = `<span class="fName">${file.name}</span><span class="fSize">${fSize}</span><span class="fType">${file.type}</span>`;
            gallery.appendChild(wrap).appendChild(img);
            gallery.appendChild(wrap).appendChild(imgCapt);
        }
    } else {
        console.error("Only images are allowed!", file);
    }
    }

    function filesManager(files) {
    // spread the files array from the DataTransfer.files property into a new
    // files array here
    files = [...files];
    // send each element in the array to both the upFile and previewFile
    // functions
    files.forEach(upFile);
    files.forEach(previewFile);
    } 
});
</script>
@endpush