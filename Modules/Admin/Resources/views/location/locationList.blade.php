<div class="col-xl-2 col-lg-4 col-sm-6">
    <div class="gallery-box edit-data-box card">
        {{-- <div class="edit-box">
            <span class=" position-absolute translate-middle badge rounded-pill bg-success p-2" data-bs-toggle="modal"
                data-bs-target="#exampleModalgrid" style="right:-8px;top: 42px;z-index:111;"><i class=" ri-pencil-fill "
                    style="font-size: 13px;"></i></span>
        </div> --}}
        <div class="edit-box">
            <div class="dropdown"><button
                    class="btn btn-white bg-success btn-sm dropdown position-absolute translate-middle rounded-pill"
                    style="right:-8px;top: 42px;z-index:111;" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="ri-more-fill text-white"></i></button>
                <ul class="dropdown-menu dropdown-menu-end p-0" style="border-radius:8px;min-width: 4rem;">
                    <li>
                        <a class="dropdown-item amenityEdit" style="padding: 0.35rem 0.75rem;" href="javascript:;"
                            data-bs-toggle="modal" data-bs-target="#exampleModalgrid" data-value=""><i
                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                            Edit</a>
                    </li>
                    <li>
                        <a class="dropdown-item text-danger" style="padding: 0.35rem 0.75rem;" href="javascript:;"><i
                                class="ri-delete-bin-fill align-bottom me-2 text-danger"></i>
                            Delete</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="gallery-container">
            <a class="image-popup" href="assets/images/small/img-1.jpg" title="">
                <img class="gallery-img img-fluid mx-auto"
                    src="{{ asset('assets/Admin/assets/images/small/img-1.jpg') }}" alt="">
                <div class="gallery-overlay d-flex justify-content-between">
                    <h5 class="overlay-caption mb-1">New York</h5>
                    <div class="deactive--status">
                        <i class="bx bx-block fs-5 text-danger"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="box-content">
            <div class="d-flex align-items-center mt-2">
                <div class="flex-grow-1 text-muted"><a href="" class="text-body text-truncate">10 listed Disended</a>
                </div>
                <div class="flex-shrink-0">
                    <div class="d-flex gap-3">
                        <label class="mb-0" for="">Feature</label>
                        <div class="form-check form-switch form-switch-success ms-1">
                            <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end col-->