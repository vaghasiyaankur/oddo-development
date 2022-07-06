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

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #0ab39c;
            border-color: #03a690;
        }

        /* ********************* */
       .page-content .hide {
            display: none;
        }
        @keyframes placeHolderShimmer {
            0% {
                background: #ececec;
            }

            30% {
                background: #F7F7F7;
            }

            50% {
                background: #ececec;
            }

            80% {
                background: #F7F7F7;
            }

            100% {
                background: #ececec;
            }
        }

        .table-row-loader .loading-animation {
            animation: placeHolderShimmer 3s infinite;
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
                                <h5 class="card-title mb-0 ms-0 ms-sm-3  mb-3 mb-sm-0">Properties</h5>
                            </div>
                            <div class=" col-sm-8">
                                <div class="d-flex align-items-center justify-content-evenly ">
                                    <div class="search-box w-100">
                                        <input type="text" class="form-control search"
                                            placeholder="Search for properties status or something...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                    <div class="btn-group ms-4">
                                        <a class="btn btn-success text-nowrap" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalgrid"><i class="ri-add-line align-bottom me-1"></i>
                                            Add
                                            Property</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border border border-end-0 border-start-0">
                        <div class="categories-main">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table align-middle mb-0 ">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col" class="text-nowrap">Property-Type</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="js-table-row-load-1 hide">
                                                    <th scope="row"><a href="#" class="fw-medium">#1</a></th>
                                                    <td>Farm House</td>
                                                    <td>
                                                        <button tabindex="0"
                                                            class="btn btn-soft-success waves-effect waves-light"
                                                            data-bs-toggle="popover" data-bs-trigger="focus" title=""
                                                            data-bs-content="And here's some amazing content. It's very engaging amazing content. Right?"
                                                            data-bs-original-title="">View Description</button>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-sm bg-light rounded p-1 me-2">
                                                            <a href="javascript:;"><img
                                                                    src="{{ asset('assets/Admin/assets/images/products/img-1.png') }}"
                                                                    alt="" class="img-fluid d-block"></a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch"
                                                                id="SwitchCheck1" checked="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="link-success fs-17 pe-3"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i
                                                                class="ri-edit-2-line"></i></a>
                                                        <a href="javascript:void(0);" class="link-danger fs-17"><i
                                                                class="ri-delete-bin-line"></i></a>
                                                    </td>
                                                </tr>
                                                <tr class="js-table-row-load-1 hide">
                                                    <th scope="row"><a href="#" class="fw-medium">#2</a></th>
                                                    <td>Fittness Room</td>
                                                    <td>
                                                        <button tabindex="0"
                                                            class="btn btn-soft-success waves-effect waves-light"
                                                            data-bs-toggle="popover" data-bs-trigger="focus" title=""
                                                            data-bs-content="And here's some amazing content. It's very engaging. Right?"
                                                            data-bs-original-title="">View Description</button>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-sm bg-light rounded p-1 me-2">
                                                            <a href="javascript:;"><img
                                                                    src="{{ asset('assets/Admin/assets/images/products/img-1.png') }}"
                                                                    alt="" class="img-fluid d-block"></a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch"
                                                                id="SwitchCheck1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="link-success fs-17 pe-3"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i
                                                                class="ri-edit-2-line"></i></a>
                                                        <a href="javascript:void(0);" class="link-danger fs-17"><i
                                                                class="ri-delete-bin-line"></i></a>
                                                    </td>
                                                </tr>
                                                <tr class="js-table-row-load-1 hide">
                                                    <th scope="row"><a href="#" class="fw-medium">#3</a></th>
                                                    <td>Hotle</td>
                                                    <td>
                                                        <button tabindex="0"
                                                            class="btn btn-soft-success waves-effect waves-light"
                                                            data-bs-toggle="popover" data-bs-trigger="focus"
                                                            title=""
                                                            data-bs-content="And here's some amazing content. It's very engaging. Right?"
                                                            data-bs-original-title="">View Description</button>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-sm bg-light rounded p-1 me-2">
                                                            <a href="javascript:;"><img
                                                                    src="{{ asset('assets/Admin/assets/images/products/img-1.png') }}"
                                                                    alt="" class="img-fluid d-block"></a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="SwitchCheck1" checked="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="link-success fs-17 pe-3"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i
                                                                class="ri-edit-2-line"></i></a>
                                                        <a href="javascript:void(0);" class="link-danger fs-17"><i
                                                                class="ri-delete-bin-line"></i></a>
                                                    </td>
                                                </tr>
                                                <tr class="js-table-row-load-1 hide">
                                                    <th scope="row"><a href="#" class="fw-medium">#4</a></th>
                                                    <td>NEW ADDED</td>
                                                    <td>
                                                        <button tabindex="0"
                                                            class="btn btn-soft-success waves-effect waves-light"
                                                            data-bs-toggle="popover" data-bs-trigger="focus"
                                                            title=""
                                                            data-bs-content="And here's some amazing content. It's very amazing content engaging. Right?"
                                                            data-bs-original-title="">View Description</button>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-sm bg-light rounded p-1 me-2">
                                                            <a href="javascript:;"><img
                                                                    src="{{ asset('assets/Admin/assets/images/products/img-1.png') }}"
                                                                    alt="" class="img-fluid d-block"></a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="SwitchCheck1">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="link-success fs-17 pe-3"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i
                                                                class="ri-edit-2-line"></i></a>
                                                        <a href="javascript:void(0);" class="link-danger fs-17"><i
                                                                class="ri-delete-bin-line"></i></a>
                                                    </td>
                                                </tr>
                                                <tr class="js-table-row-loader">
                                                    <td colspan="6" class="p-0">
                                                        <div class="table-row-loader d-flex py-2 border-bottom">
                                                            <div class="flex-shrink-1 m-3 p-2 loading-animation ">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 m-3 p-2 loading-animation">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 m-3 p-2 loading-animation">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 m-3 p-2 loading-animation">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 m-3 p-2 loading-animation">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 m-3 p-2 loading-animation">
                                                            </div>
                                                        </div>
                                                        <div class="table-row-loader d-flex py-2 border-bottom">
                                                            <div class="flex-shrink-1 m-3 p-2 loading-animation ">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 m-3 p-2 loading-animation">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 m-3 p-2 loading-animation">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 m-3 p-2 loading-animation">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 m-3 p-2 loading-animation">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 m-3 p-2 loading-animation">
                                                            </div>
                                                        </div>
                                                        <div class="table-row-loader d-flex py-2 border-bottom">
                                                            <div class="flex-shrink-1 m-3 p-2 loading-animation ">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 m-3 p-2 loading-animation">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 m-3 p-2 loading-animation">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 m-3 p-2 loading-animation">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 m-3 p-2 loading-animation">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 m-3 p-2 loading-animation">
                                                            </div>
                                                        </div>
                                                        <div class="table-row-loader d-flex py-2 ">
                                                            <div class="flex-shrink-1  m-3 p-2 loading-animation ">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 m-3 p-2 loading-animation">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 m-3 p-2 loading-animation">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 m-3 p-2 loading-animation">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 m-3 p-2 loading-animation">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 m-3 p-2 loading-animation">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        {{-- FOR EMPTY TABLE --}}
                                        {{-- <div class="empty-table w-100 text-center py-5">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
                                            </lord-icon>
                                            <h4>No records has been added yet.</h4>
                                            <h6>Add a new record by simpley clicking the button on top right side.</h6>
                                        </div> --}}

                                        <div class="table-footer align-items-center pt-2 justify-content-between d-flex">
                                            <div class="flex-shrink-0">
                                                <div class="text-muted">Showing <span class="fw-semibold">1</span> of
                                                    <span class="fw-semibold">2</span> Results
                                                </div>
                                            </div>
                                            <ul class="pagination pagination-separated pagination-sm mb-0">
                                                <li class="page-item ">
                                                    <a href="#" class="page-link">←</a>
                                                </li>
                                                <li class="page-item active">
                                                    <a href="#" class="page-link">1</a>
                                                </li>
                                                <li class="page-item ">
                                                    <a href="#" class="page-link">2</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">→</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
    </div>

    <!-- End Page-content -->
    <!--Amenity edit Modal start -->
    <div class="live-preview">
        <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalgridLabel">Property Edit Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="autoCompleteCars" class="">Enter Name </label>
                                <div class="location-box">
                                    <input type="text" class="form-control" id="exampleDropdownFormtext"
                                        placeholder="Enter Name">
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
                                                            <strong class="error text-danger"
                                                                data-dz-errormessage></strong>
                                                        </div>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-3">
                                                        <button data-dz-remove
                                                            class="btn btn-sm btn-danger">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- end dropzon-preview -->
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea5" class="form-label">Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea5" rows="3"></textarea>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="active-deactive-input">
                                    <div class="form-check form-check-inline form-radio-success me-1">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="WithoutinlineRadio1" value="option1">
                                        <label class="form-check-label" for="WithoutinlineRadio1">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline form-radio-danger">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="WithoutinlineRadio2" value="option2"checked="">
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
    </div>
    <!--Amenity edit Modal end -->
@endsection


@push('scripts')
    <!-- dropzone min -->
    <script src="{{ asset('assets/Admin/assets/libs/dropzone/dropzone-min.js') }}"></script>

    <script src="{{ asset('assets/Admin/assets/js/pages/form-file-upload.init.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script>
        setTimeout(function() {
            $('.js-table-row-load-1').show();
        },  600);

        setTimeout(function() {
            $('.js-table-row-load-2').show();
        }, 900);

        setTimeout(function() {
            $('.js-table-row-loader').hide();
        }, 600);
    </script>
    <script>
        $(document).ready(function() {
            $('[data-bs-toggle="popover"]').popover();
        });
    </script>
@endpush
