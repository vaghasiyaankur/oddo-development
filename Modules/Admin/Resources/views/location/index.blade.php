@extends('layout::admin.master')

@push('css')
<!-- dropzone css -->
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <style>
        .Upload--img .dropzone {
            min-height: 132px;
            padding: 13px 17px;
            border: 2px dashed #e9ebec;
        }


    .Upload--img .editDropzone {
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

    #editGallery  li#dropzone-preview-list {
        list-style: none;
    }

    #gallery li#dropzone-preview-list {
        list-style: none;
    }


    .gallery-box .gallery-img {
        object-fit: cover;
        width: 100%;
        min-height: 180px;
        max-height: 180px;
    }

    .editDropzone .dz-message {
        text-align: center;
        margin: 2em 0;
    }
    .imageSet {
        object-fit: cover;
        width: 100%;
        min-height: 50px;
        max-height: 50px;
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
                                            data-bs-target="#createLocation">
                                            <i class=" ri-add-line align-bottom me-1"></i>
                                            Add Location
                                     </button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body border border-end-0 border-start-0 border-bottom-0">

                    <div class="gallery-light">
                        <div class="row city_list">
                            @include('admin::location.locationList')
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

    <!--location create Modal start -->
    @include('admin::location.create')
    <!--location create Modal end -->

    <!--location edit Modal start -->
    @include('admin::location.edit')
    <!--location edit Modal end -->
@endsection


@push('scripts')
    <!-- dropzone min -->
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    @include('admin::location.scripts')
@endpush
