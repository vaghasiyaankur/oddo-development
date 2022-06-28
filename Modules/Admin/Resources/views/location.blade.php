@extends('layout::admin.master')

@push('css')
 <!-- autocomplete css -->
 {{-- <link rel="stylesheet" href="assets/libs//autocomplete.js/css/autoComplete.css"> --}}
 <link rel="stylesheet" href="{{ asset('assets/Admin/js/autocomplete.js/css/autoComplete.css') }}">
@endpush

@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="orderList">
                <div class="card-header  border-0">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-5">
                            <h5 class="card-title mb-0">Location</h5>
                        </div>
                        <div class="col-lg-6">
                            <div class="search-box">
                                <input type="text" class="form-control search"
                                    placeholder="Search for order ID, customer, status or something...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <div class="col-lg-1 ps-0">
                            <div class="live-preview">
                                <button type="button" class="btn btn-primary text-nowrap" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                                    Location Details
                                </button>
                            </div>
                            {{-- <div class="btn-group">
                                <button type="button" class="btn btn-success dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Location details
                                </button>
                                <div class="dropdown-menu dropdown-menu-md p-4">
                                    <form>
                                        <div class="mb-2">
                                            <label for="autoCompleteCars" class="text-muted">Search City </label>
                                            <div class="search-box">
                                                <input type="text" class="form-control search"
                                                    placeholder="Search City...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Upload image</label>
                                            <input class="form-control form-control-sm" id="formSizeSmall" type="file">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </form>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body border border-dashed border-end-0 border-start-0">
                    <div class="gallery-light">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="gallery-box card">
                                    <div class="gallery-container">
                                        <a class="image-popup" href="assets/images/small/img-1.jpg" title="">
                                            <img class="gallery-img img-fluid mx-auto" src="{{ asset('assets/Admin/assets/images/small/img-1.jpg') }}" alt="">
                                            <div class="gallery-overlay">
                                                <h5 class="overlay-caption">New York</h5>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="box-content">
                                        <div class="d-flex align-items-center mt-2">
                                            <div class="flex-grow-1 text-muted"><a href="" class="text-body text-truncate">10 listed Disended</a></div>
                                            <div class="flex-shrink-0">
                                                <div class="d-flex gap-3">
                                                   <label for="">Feature</label>
                                                   <div class="form-check form-switch form-switch-success ms-1">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck3" checked="">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="gallery-box card">
                                    <div class="gallery-container">
                                        <a class="image-popup" href="assets/images/small/img-1.jpg" title="">
                                            <img class="gallery-img img-fluid mx-auto" src="{{ asset('assets/Admin/assets/images/small/img-12.jpg') }}" alt="">
                                            <div class="gallery-overlay">
                                                <h5 class="overlay-caption">North America</h5>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="box-content">
                                        <div class="d-flex align-items-center mt-2">
                                            <div class="flex-grow-1 text-muted"><a href="" class="text-body text-truncate">10 listed Disended</a></div>
                                            <div class="flex-shrink-0">
                                                <div class="d-flex gap-3">
                                                   <label for="">Feature</label>
                                                   <div class="form-check form-switch form-switch-success ms-1">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck3" checked="">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="gallery-box card">
                                    <div class="gallery-container">
                                        <a class="image-popup" href="assets/images/small/img-1.jpg" title="">
                                            <img class="gallery-img img-fluid mx-auto" src="{{ asset('assets/Admin/assets/images/small/img-7.jpg') }}" alt="">
                                            <div class="gallery-overlay">
                                                <h5 class="overlay-caption">India</h5>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="box-content">
                                        <div class="d-flex align-items-center mt-2">
                                            <div class="flex-grow-1 text-muted"><a href="" class="text-body text-truncate">10 listed Disended</a></div>
                                            <div class="flex-shrink-0">
                                                <div class="d-flex gap-3">
                                                   <label for="">Feature</label>
                                                   <div class="form-check form-switch form-switch-success ms-1">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck3" checked="">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="gallery-box card">
                                    <div class="gallery-container">
                                        <a class="image-popup" href="assets/images/small/img-1.jpg" title="">
                                            <img class="gallery-img img-fluid mx-auto" src="{{ asset('assets/Admin/assets/images/small/img-9.jpg') }}" alt="">
                                            <div class="gallery-overlay">
                                                <h5 class="overlay-caption">New York</h5>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="box-content">
                                        <div class="d-flex align-items-center mt-2">
                                            <div class="flex-grow-1 text-muted"><a href="" class="text-body text-truncate">10 listed Disended</a></div>
                                            <div class="flex-shrink-0">
                                                <div class="d-flex gap-3">
                                                   <label for="">Feature</label>
                                                   <div class="form-check form-switch form-switch-success ms-1">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck3" checked="">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="gallery-box card">
                                    <div class="gallery-container">
                                        <a class="image-popup" href="assets/images/small/img-1.jpg" title="">
                                            <img class="gallery-img img-fluid mx-auto" src="{{ asset('assets/Admin/assets/images/small/img-9.jpg') }}" alt="">
                                            <div class="gallery-overlay">
                                                <h5 class="overlay-caption">New York</h5>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="box-content">
                                        <div class="d-flex align-items-center mt-2">
                                            <div class="flex-grow-1 text-muted"><a href="" class="text-body text-truncate">10 listed Disended</a></div>
                                            <div class="flex-shrink-0">
                                                <div class="d-flex gap-3">
                                                   <label for="">Feature</label>
                                                   <div class="form-check form-switch form-switch-success ms-1">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck3" checked="">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="gallery-box card">
                                    <div class="gallery-container">
                                        <a class="image-popup" href="assets/images/small/img-1.jpg" title="">
                                            <img class="gallery-img img-fluid mx-auto" src="{{ asset('assets/Admin/assets/images/small/img-7.jpg') }}" alt="">
                                            <div class="gallery-overlay">
                                                <h5 class="overlay-caption">New York</h5>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="box-content">
                                        <div class="d-flex align-items-center mt-2">
                                            <div class="flex-grow-1 text-muted"><a href="" class="text-body text-truncate">10 listed Disended</a></div>
                                            <div class="flex-shrink-0">
                                                <div class="d-flex gap-3">
                                                   <label for="">Feature</label>
                                                   <div class="form-check form-switch form-switch-success ms-1">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck3" checked="">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-xl-3 col-lg-4 col-sm-6">
                                <div class="gallery-box card">
                                    <div class="gallery-container">
                                        <a class="image-popup" href="assets/images/small/img-1.jpg" title="">
                                            <img class="gallery-img img-fluid  mx-auto" src="{{ asset('assets/Admin/assets/images/small/img-12.jpg') }}" alt="">
                                            <div class="gallery-overlay">
                                                <h5 class="overlay-caption">New York</h5>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="box-content">
                                        <div class="d-flex align-items-center mt-2">
                                            <div class="flex-grow-1 text-muted"><a href="" class="text-body text-truncate">10 listed Disended</a></div>
                                            <div class="flex-shrink-0">
                                                <div class="d-flex gap-3">
                                                   <label for="">Feature</label>
                                                   <div class="form-check form-switch form-switch-success ms-1">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck3" checked="">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
</div>
<!-- End Page-content -->   
<!-- location details fill modal start -->
<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Grid Modals</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-2">
                        <label for="autoCompleteCars" class="text-muted">Search City </label>
                        <div class="search-box">
                            <input type="text" class="form-control search"
                                placeholder="Search City...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="">Upload image</label>
                        <input class="form-control form-control-sm" id="formSizeSmall" type="file">
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>   
<!-- location details fill modal end -->   
@endsection

@push('scripts')
<!-- autocomplete js -->
<script src="{{ asset('assets/Admin/js/autocomplete.js/autoComplete.min.js') }}"></script>
@endpush

