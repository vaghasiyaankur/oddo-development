@extends('layout::admin.master')

@push('css')
    <!-- dropzone css -->
    <link rel="stylesheet" href="{{ asset('assets/Admin/assets/libs/dropzone/dropzone.css') }}" type="text/css" />

    <style>
        .Upload--img .dropzone {
            min-height: 132px;
            padding: 13px 17px;
            border: 2px dashed #e9ebec;
        }

        .gallery-light .edit-box {
            opacity: 0;
            transition: all 0.5S ease;
            transform: translateY(50px);
        }

        .gallery-light .edit-data-box:hover .edit-box {
            opacity: 1;
            transform: translateY(-20px);
            z-index: 111;
        }
    </style>
@endpush

@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="orderList">
                    <div class="card-header  border-0">
                        <div class="row d-flex align-items-center">
                            <div class="col-sm-4">
                                <h5 class="card-title mb-0 ms-0 ms-sm-3  mb-3 mb-sm-0">Location</h5>
                            </div>
                            <div class="col-sm-8">
                                <div class="d-flex align-items-center justify-content-evenly">
                                    <div class="search-box w-100">
                                        <input type="text" class="form-control search"
                                            placeholder="Search for Location, Country , status or something...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                    <div class="live-preview ms-4">
                                        <button type="button" class="btn btn-success text-nowrap" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalgrid">
                                            Location Details
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border border-end-0 border-start-0 border-bottom-0">
                        <div class="gallery-light">
                            <div class="row">
                                <div class="col-xl-2 col-lg-4 col-sm-6">
                                    <div class="gallery-box edit-data-box card">
                                        <div class="edit-box">
                                            <span class=" position-absolute translate-middle badge rounded-pill bg-success p-2"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalgrid"
                                                style="right:-8px;top: 42px;z-index:111;"><i
                                                    class=" ri-pencil-fill " style="font-size: 13px;"></i></span>
                                        </div>
                                        <div class="gallery-container">
                                            <a class="image-popup" href="assets/images/small/img-1.jpg" title="">
                                                <img class="gallery-img img-fluid mx-auto"
                                                    src="{{ asset('assets/Admin/assets/images/small/img-1.jpg') }}"
                                                    alt="">
                                                <div class="gallery-overlay">
                                                    <h5 class="overlay-caption">New York</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="box-content">
                                            <div class="d-flex align-items-center mt-2">
                                                <div class="flex-grow-1 text-muted"><a href=""
                                                        class="text-body text-truncate">10 listed Disended</a></div>
                                                <div class="flex-shrink-0">
                                                    <div class="d-flex gap-3">
                                                        <label for="">Feature</label>
                                                        <div class="form-check form-switch form-switch-success ms-1">
                                                            <input class="form-check-input" type="checkbox" role="switch"
                                                                id="SwitchCheck3" checked="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-2 col-lg-4 col-sm-6">
                                    <div class="gallery-box edit-data-box card">
                                        <div class="edit-box">
                                            <span class=" position-absolute translate-middle badge rounded-pill bg-success p-2"
                                            data-bs-toggle="modal" data-bs-target="#exampleModalgrid"
                                            style="right:-8px;top: 42px;z-index:111;"><i
                                                class=" ri-pencil-fill " style="font-size: 13px;"></i></span>
                                        </div>
                                        <div class="gallery-container">
                                            <a class="image-popup" href="assets/images/small/img-1.jpg" title="">
                                                <img class="gallery-img img-fluid mx-auto"
                                                    src="{{ asset('assets/Admin/assets/images/small/img-12.jpg') }}"
                                                    alt="">
                                                <div class="gallery-overlay">
                                                    <h5 class="overlay-caption">New York</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="box-content">
                                            <div class="d-flex align-items-center mt-2">
                                                <div class="flex-grow-1 text-muted"><a href=""
                                                        class="text-body text-truncate">10 listed Disended</a></div>
                                                <div class="flex-shrink-0">
                                                    <div class="d-flex gap-3">
                                                        <label for="">Feature</label>
                                                        <div class="form-check form-switch form-switch-success ms-1">
                                                            <input class="form-check-input" type="checkbox" role="switch"
                                                                id="SwitchCheck3" checked="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-2 col-lg-4 col-sm-6">
                                    <div class="gallery-box edit-data-box card">
                                        <div class="edit-box">
                                            <span class=" position-absolute translate-middle badge rounded-pill bg-success p-2"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalgrid"
                                                style="right:-8px;top: 42px;z-index:111;"><i
                                                    class=" ri-pencil-fill " style="font-size: 13px;"></i></span>
                                        </div>
                                        <div class="gallery-container">
                                            <a class="image-popup" href="assets/images/small/img-1.jpg" title="">
                                                <img class="gallery-img img-fluid mx-auto"
                                                    src="{{ asset('assets/Admin/assets/images/small/img-7.jpg') }}"
                                                    alt="">
                                                <div class="gallery-overlay">
                                                    <h5 class="overlay-caption">New York</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="box-content">
                                            <div class="d-flex align-items-center mt-2">
                                                <div class="flex-grow-1 text-muted"><a href=""
                                                        class="text-body text-truncate">10 listed Disended</a></div>
                                                <div class="flex-shrink-0">
                                                    <div class="d-flex gap-3">
                                                        <label for="">Feature</label>
                                                        <div class="form-check form-switch form-switch-success ms-1">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="SwitchCheck3" checked="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-2 col-lg-4 col-sm-6">
                                    <div class="gallery-box edit-data-box card">
                                        <div class="edit-box">
                                            <span class=" position-absolute translate-middle badge rounded-pill bg-success p-2"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalgrid"
                                                style="right:-8px;top: 42px;z-index:111;"><i
                                                    class=" ri-pencil-fill " style="font-size: 13px;"></i></span>
                                        </div>
                                        <div class="gallery-container">
                                            <a class="image-popup" href="assets/images/small/img-1.jpg" title="">
                                                <img class="gallery-img img-fluid mx-auto"
                                                    src="{{ asset('assets/Admin/assets/images/small/img-1.jpg') }}"
                                                    alt="">
                                                <div class="gallery-overlay">
                                                    <h5 class="overlay-caption">New York</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="box-content">
                                            <div class="d-flex align-items-center mt-2">
                                                <div class="flex-grow-1 text-muted"><a href=""
                                                        class="text-body text-truncate">10 listed Disended</a></div>
                                                <div class="flex-shrink-0">
                                                    <div class="d-flex gap-3">
                                                        <label for="">Feature</label>
                                                        <div class="form-check form-switch form-switch-success ms-1">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="SwitchCheck3" checked="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-2 col-lg-4 col-sm-6">
                                    <div class="gallery-box edit-data-box card">
                                        <div class="edit-box">
                                            <span class=" position-absolute translate-middle badge rounded-pill bg-success p-2"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalgrid"
                                                style="right:-8px;top: 42px;z-index:111;"><i
                                                    class=" ri-pencil-fill " style="font-size: 13px;"></i></span>
                                        </div>
                                        <div class="gallery-container">
                                            <a class="image-popup" href="assets/images/small/img-1.jpg" title="">
                                                <img class="gallery-img img-fluid mx-auto"
                                                    src="{{ asset('assets/Admin/assets/images/small/img-2.jpg') }}"
                                                    alt="">
                                                <div class="gallery-overlay">
                                                    <h5 class="overlay-caption">New York</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="box-content">
                                            <div class="d-flex align-items-center mt-2">
                                                <div class="flex-grow-1 text-muted"><a href=""
                                                        class="text-body text-truncate">10 listed Disended</a></div>
                                                <div class="flex-shrink-0">
                                                    <div class="d-flex gap-3">
                                                        <label for="">Feature</label>
                                                        <div class="form-check form-switch form-switch-success ms-1">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="SwitchCheck3" checked="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-2 col-lg-4 col-sm-6">
                                    <div class="gallery-box edit-data-box card">
                                        <div class="edit-box">
                                            <span class=" position-absolute translate-middle badge rounded-pill bg-success p-2"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalgrid"
                                                style="right:-8px;top: 42px;z-index:111;"><i
                                                    class=" ri-pencil-fill " style="font-size: 13px;"></i></span>
                                        </div>
                                        <div class="gallery-container">
                                            <a class="image-popup" href="assets/images/small/img-1.jpg" title="">
                                                <img class="gallery-img img-fluid mx-auto"
                                                    src="{{ asset('assets/Admin/assets/images/small/img-12.jpg') }}"
                                                    alt="">
                                                <div class="gallery-overlay">
                                                    <h5 class="overlay-caption">New York</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="box-content">
                                            <div class="d-flex align-items-center mt-2">
                                                <div class="flex-grow-1 text-muted"><a href=""
                                                        class="text-body text-truncate">10 listed Disended</a></div>
                                                <div class="flex-shrink-0">
                                                    <div class="d-flex gap-3">
                                                        <label for="">Feature</label>
                                                        <div class="form-check form-switch form-switch-success ms-1">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="SwitchCheck3" checked="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-2 col-lg-4 col-sm-6">
                                    <div class="gallery-box edit-data-box card">
                                        <div class="edit-box">
                                            <span class=" position-absolute translate-middle badge rounded-pill bg-success p-2"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalgrid"
                                                style="right:-8px;top: 42px;z-index:111;"><i
                                                    class=" ri-pencil-fill " style="font-size: 13px;"></i></span>
                                        </div>
                                        <div class="gallery-container">
                                            <a class="image-popup" href="assets/images/small/img-1.jpg" title="">
                                                <img class="gallery-img img-fluid mx-auto"
                                                    src="{{ asset('assets/Admin/assets/images/small/img-3.jpg') }}"
                                                    alt="">
                                                <div class="gallery-overlay">
                                                    <h5 class="overlay-caption">New York</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="box-content">
                                            <div class="d-flex align-items-center mt-2">
                                                <div class="flex-grow-1 text-muted"><a href=""
                                                        class="text-body text-truncate">10 listed Disended</a></div>
                                                <div class="flex-shrink-0">
                                                    <div class="d-flex gap-3">
                                                        <label for="">Feature</label>
                                                        <div class="form-check form-switch form-switch-success ms-1">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="SwitchCheck3" checked="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-2 col-lg-4 col-sm-6">
                                    <div class="gallery-box edit-data-box card">
                                        <div class="edit-box">
                                            <span class=" position-absolute translate-middle badge rounded-pill bg-success p-2"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalgrid"
                                                style="right:-8px;top: 42px;z-index:111;"><i
                                                    class=" ri-pencil-fill " style="font-size: 13px;"></i></span>
                                        </div>
                                        <div class="gallery-container">
                                            <a class="image-popup" href="assets/images/small/img-1.jpg" title="">
                                                <img class="gallery-img img-fluid mx-auto"
                                                    src="{{ asset('assets/Admin/assets/images/small/img-7.jpg') }}"
                                                    alt="">
                                                <div class="gallery-overlay">
                                                    <h5 class="overlay-caption">New York</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="box-content">
                                            <div class="d-flex align-items-center mt-2">
                                                <div class="flex-grow-1 text-muted"><a href=""
                                                        class="text-body text-truncate">10 listed Disended</a></div>
                                                <div class="flex-shrink-0">
                                                    <div class="d-flex gap-3">
                                                        <label for="">Feature</label>
                                                        <div class="form-check form-switch form-switch-success ms-1">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="SwitchCheck3" checked="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xl-2 col-lg-4 col-sm-6">
                                    <div class="gallery-box edit-data-box card">
                                        <div class="edit-box">
                                            <span class=" position-absolute translate-middle badge rounded-pill bg-success p-2"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalgrid"
                                                style="right:-8px;top: 42px;z-index:111;"><i
                                                    class=" ri-pencil-fill " style="font-size: 13px;"></i></span>
                                        </div>
                                        <div class="gallery-container">
                                            <a class="image-popup" href="assets/images/small/img-1.jpg" title="">
                                                <img class="gallery-img img-fluid mx-auto"
                                                    src="{{ asset('assets/Admin/assets/images/small/img-9.jpg') }}"
                                                    alt="">
                                                <div class="gallery-overlay">
                                                    <h5 class="overlay-caption">New York</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="box-content">
                                            <div class="d-flex align-items-center mt-2">
                                                <div class="flex-grow-1 text-muted"><a href=""
                                                        class="text-body text-truncate">10 listed Disended</a></div>
                                                <div class="flex-shrink-0">
                                                    <div class="d-flex gap-3">
                                                        <label for="">Feature</label>
                                                        <div class="form-check form-switch form-switch-success ms-1">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="SwitchCheck3" checked="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
    </div>
    <!-- End Page-content -->
    <!-- location details fill modal start -->
    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Loaction Details Add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="autoCompleteCars" class="">Enter City </label>
                            <div class="location-box">
                                <input type="text" class="form-control" id="exampleDropdownFormtext"
                                    placeholder="Enter City Name">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Upload Your Image</label>
                            <div class="Upload--img">
                                <div class="dropzone">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple="multiple">
                                    </div>
                                    <div class="dz-message needsclick m-0">
                                        <div class="mb-1">
                                            <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                        </div>

                                        <h5>Drop files here or click to upload.</h5>
                                    </div>
                                </div>

                                <ul class="list-unstyled mb-0" id="dropzone-preview">
                                    <li class="mt-2" id="dropzone-preview-list">
                                        <!-- This is used as the file preview template -->
                                        <div class="border rounded">
                                            <div class="d-flex p-2 align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-sm bg-light rounded">
                                                        <img data-dz-thumbnail class="img-fluid rounded d-block"
                                                            src="#" alt="Dropzone-Image" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="pt-1">
                                                        <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                        <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                                    </div>
                                                </div>
                                                <div class="flex-shrink-0 ms-3">
                                                    <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <!-- end dropzon-preview -->
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="active-deactive-input">
                                <div class="form-check form-check-inline form-radio-success me-1">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="WithoutinlineRadio1" value="option1" checked>
                                    <label class="form-check-label" for="WithoutinlineRadio1">Active</label>
                                </div>
                                <div class="form-check form-check-inline form-radio-danger">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="WithoutinlineRadio2" value="option2">
                                    <label class="form-check-label" for="WithoutinlineRadio2">Deactive</label>
                                </div>
                            </div>
                            <div class="Submit--btn">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- location details fill modal end -->
@endsection

@push('scripts')
    <!-- dropzone min -->
    <script src="{{ asset('assets/Admin/assets/libs/dropzone/dropzone-min.js') }}"></script>

    <script src="{{ asset('assets/Admin/assets/js/pages/form-file-upload.init.js') }}"></script>
@endpush
