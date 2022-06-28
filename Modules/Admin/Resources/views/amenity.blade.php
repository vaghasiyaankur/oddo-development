@extends('layout::admin.master')

@push('css')
    <style>
        .edit-box {
            opacity: 0;
            transition: all 0.5S ease;
            transform: translateY(50px);
        }

        .edit-data-box:hover .edit-box {
            opacity: 1;
            transform: translateY(-20px);
        }

        .amenity-type-select .iconpicker-dropdown ul {
            left: -21px !important;
            max-width: 237px !important;
            overflow: auto;
            border-radius: 10px;
        }

        .modal-select-icon .iconpicker-dropdown ul {
            width: 100%;
            max-width: 459px !important;
            border-radius: 10px;
            overflow: auto;
        }

        .option-select {
            display: none;
        }

        /* width */
        .iconpicker-dropdown ul::-webkit-scrollbar {
            width: 4px;
        }

        /* Track */
        .iconpicker-dropdown ul::-webkit-scrollbar-track {
            background: transparent;
            border-radius: 10px;
        }

        /* Handle */
        .iconpicker-dropdown ul::-webkit-scrollbar-thumb {
            background: #0ab39c;
            border-radius: 10px;
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
                            <div class="col-lg-5">
                                <h5 class="card-title mb-0">Amenity</h5>
                            </div>
                            <div class="col-lg-6">
                                <div class="search-box">
                                    <input type="text" class="form-control search"
                                        placeholder="Search for order ID, customer, status or something...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <div class="col-lg-1 ps-0">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success amenity-button">
                                        Amenity Types <i class=" ri-arrow-down-s-line"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-md p-4  option-select"
                                        style="top: 45px;left: -98px;">
                                        <form>
                                            <div class="mb-2">
                                                <label class="form-label" for="exampleDropdownFormtext">Amenity Name</label>
                                                <input type="text" class="form-control" id="exampleDropdownFormtext"
                                                    placeholder="Enter Amenity Name">
                                            </div>
                                            <div class="amenity-type-select mb-2">
                                                <label>Amenities Icon</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text h-100 selected-icon"></span>
                                                    </div>
                                                    <input type="text" class="form-control iconpicker"
                                                        placeholder="Search Your Icon">
                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <div class="form-check custom-checkbox">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="rememberdropdownCheck">
                                                    <label class="form-check-label" for="rememberdropdownCheck">Remember
                                                        me</label>
                                                </div>
                                            </div>
                                            <a href="javascript:;"><button type="submit" class="btn btn-primary">Sign
                                                    in</button></a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border border-dashed border-end-0 border-start-0">
                        <div class="categories-main">
                            <div class="row">
                                <div class="col-sm-2 mb-2 mb-4">
                                    <div class="card card-body edit-data-box position-reletive px-2">
                                        <div class=" edit-box">
                                            <span
                                                class=" position-absolute translate-middle badge rounded-pill bg-success p-2"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalgrid"
                                                style="right:-26px;top: 13px;"><i class="ri-pencil-line"
                                                    style="font-size: 13px;"></i></span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('assets/Admin/assets/images/users/avatar-1.jpg') }}"
                                                    alt="" class="avatar-sm rounded-circle">
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <h5 class="card-title fw-bold">Amenity type name</h5>
                                                <div class="form-check form-switch form-switch-success ms-1">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="SwitchCheck3" checked="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 mb-2 mb-4">
                                    <div class="card card-body edit-data-box position-reletive px-2">
                                        <div class=" edit-box">
                                            <span
                                                class=" position-absolute translate-middle badge rounded-pill bg-success p-2"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalgrid"
                                                style="right:-26px;top: 13px;"><i class="ri-pencil-line"
                                                    style="font-size: 13px;"></i></span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('assets/Admin/assets/images/users/avatar-1.jpg') }}"
                                                    alt="" class="avatar-sm rounded-circle">
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <h5 class="card-title fw-bold">Amenity type name</h5>
                                                <div class="form-check form-switch form-switch-success ms-1">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="SwitchCheck3" checked="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 mb-2 mb-4">
                                    <div class="card card-body edit-data-box position-reletive px-2">
                                        <div class=" edit-box">
                                            <span
                                                class=" position-absolute translate-middle badge rounded-pill bg-success p-2"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalgrid"
                                                style="right:-26px;top: 13px;"><i class="ri-pencil-line"
                                                    style="font-size: 13px;"></i></span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('assets/Admin/assets/images/users/avatar-1.jpg') }}"
                                                    alt="" class="avatar-sm rounded-circle">
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <h5 class="card-title fw-bold">Amenity type name</h5>
                                                <div class="form-check form-switch form-switch-success ms-1">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="SwitchCheck3" checked="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 mb-2 mb-4">
                                    <div class="card card-body edit-data-box position-reletive px-2">
                                        <div class=" edit-box">
                                            <span
                                                class=" position-absolute translate-middle badge rounded-pill bg-success p-2"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalgrid"
                                                style="right:-26px;top: 13px;"><i class="ri-pencil-line"
                                                    style="font-size: 13px;"></i></span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('assets/Admin/assets/images/users/avatar-1.jpg') }}"
                                                    alt="" class="avatar-sm rounded-circle">
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <h5 class="card-title fw-bold">Amenity type name</h5>
                                                <div class="form-check form-switch form-switch-success ms-1">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="SwitchCheck3" checked="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 mb-2 mb-4">
                                    <div class="card card-body edit-data-box position-reletive px-2">
                                        <div class=" edit-box">
                                            <span
                                                class=" position-absolute translate-middle badge rounded-pill bg-success p-2"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalgrid"
                                                style="right:-26px;top: 13px;"><i class="ri-pencil-line"
                                                    style="font-size: 13px;"></i></span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('assets/Admin/assets/images/users/avatar-1.jpg') }}"
                                                    alt="" class="avatar-sm rounded-circle">
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <h5 class="card-title fw-bold">Amenity type name</h5>
                                                <div class="form-check form-switch form-switch-success ms-1">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="SwitchCheck3" checked="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 mb-2 mb-4">
                                    <div class="card card-body edit-data-box position-reletive px-2">
                                        <div class=" edit-box">
                                            <span
                                                class=" position-absolute translate-middle badge rounded-pill bg-success p-2"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalgrid"
                                                style="right:-26px;top: 13px;"><i class="ri-pencil-line"
                                                    style="font-size: 13px;"></i></span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('assets/Admin/assets/images/users/avatar-1.jpg') }}"
                                                    alt="" class="avatar-sm rounded-circle">
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <h5 class="card-title fw-bold">Amenity type name</h5>
                                                <div class="form-check form-switch form-switch-success ms-1">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="SwitchCheck3" checked="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 mb-2 mb-4">
                                    <div class="card card-body edit-data-box position-reletive px-2">
                                        <div class=" edit-box">
                                            <span
                                                class=" position-absolute translate-middle badge rounded-pill bg-success p-2"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalgrid"
                                                style="right:-26px;top: 13px;"><i class="ri-pencil-line"
                                                    style="font-size: 13px;"></i></span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('assets/Admin/assets/images/users/avatar-1.jpg') }}"
                                                    alt="" class="avatar-sm rounded-circle">
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <h5 class="card-title fw-bold">Amenity type name</h5>
                                                <div class="form-check form-switch form-switch-success ms-1">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="SwitchCheck3" checked="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 mb-2 mb-4">
                                    <div class="card card-body edit-data-box position-reletive px-2">
                                        <div class=" edit-box">
                                            <span
                                                class=" position-absolute translate-middle badge rounded-pill bg-success p-2"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalgrid"
                                                style="right:-26px;top: 13px;"><i class="ri-pencil-line"
                                                    style="font-size: 13px;"></i></span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('assets/Admin/assets/images/users/avatar-1.jpg') }}"
                                                    alt="" class="avatar-sm rounded-circle">
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <h5 class="card-title fw-bold">Amenity type name</h5>
                                                <div class="form-check form-switch form-switch-success ms-1">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="SwitchCheck3" checked="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 mb-2 mb-4">
                                    <div class="card card-body edit-data-box position-reletive px-2">
                                        <div class=" edit-box">
                                            <span
                                                class=" position-absolute translate-middle badge rounded-pill bg-success p-2"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalgrid"
                                                style="right:-26px;top: 13px;"><i class="ri-pencil-line"
                                                    style="font-size: 13px;"></i></span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('assets/Admin/assets/images/users/avatar-1.jpg') }}"
                                                    alt="" class="avatar-sm rounded-circle">
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <h5 class="card-title fw-bold">Amenity type name</h5>
                                                <div class="form-check form-switch form-switch-success ms-1">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="SwitchCheck3" checked="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 mb-2 mb-4">
                                    <div class="card card-body edit-data-box position-reletive px-2">
                                        <div class=" edit-box">
                                            <span
                                                class=" position-absolute translate-middle badge rounded-pill bg-success p-2"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalgrid"
                                                style="right:-26px;top: 13px;"><i class="ri-pencil-line"
                                                    style="font-size: 13px;"></i></span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('assets/Admin/assets/images/users/avatar-1.jpg') }}"
                                                    alt="" class="avatar-sm rounded-circle">
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                <h5 class="card-title fw-bold">Amenity type name</h5>
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
                        <h5 class="modal-title" id="exampleModalgridLabel">Amenities Edit Modals</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-2">
                                <label class="form-label" for="exampleDropdownFormtext">Amenity Name</label>
                                <input type="text" class="form-control" id="exampleDropdownFormtext"
                                    placeholder="Enter Amenity Name">
                            </div>
                            <div class="modal-select-icon mb-2">
                                <label>Amenities Icon</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text h-100 selectedIcon"></span>
                                    </div>
                                    <input type="text" class="form-control iconPicker" placeholder="Search Your Icon">
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="form-check custom-checkbox d-flex justify-content-end align-items-center">
                                    <button type="submit" class="btn btn-success">Submit</button>
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
    <script>
        (async () => {
            const response = await fetch(
                'https://unpkg.com/codethereal-iconpicker@1.2.1/dist/iconsets/bootstrap5.json')
            const result = await response.json()


            const iconpicker = new Iconpicker(document.querySelector(".iconpicker"), {
                icons: result,
                showSelectedIn: document.querySelector(".selected-icon"),
                searchable: true,
                selectedClass: "selected",
                containerClass: "my-picker",
                hideOnSelect: false,
                fade: true,
                defaultValue: 'bi-search',
                // valueFormat: val => `bi ${val}`
            });

            iconpicker.set() // Set as empty
            // iconpicker.set('bi-search') // Reset with a value
        })();

        (async () => {
            const response = await fetch(
                'https://unpkg.com/codethereal-iconpicker@1.2.1/dist/iconsets/bootstrap5.json')
            const result = await response.json()


            const iconpicker = new Iconpicker(document.querySelector(".iconPicker"), {
                icons: result,
                showSelectedIn: document.querySelector(".selectedIcon"),
                searchable: true,
                selectedClass: "selected",
                containerClass: "my-picker",
                hideOnSelect: false,
                fade: true,
                defaultValue: 'bi-search',
                // valueFormat: val => `bi ${val}`
            });

            iconpicker.set() // Set as empty
            // iconpicker.set('bi-alarm') // Reset with a value
        })();

        $(document).on('click', '.amenity-button', function() {
            $('.option-select').toggleClass('show');
        });
    </script>
@endpush
