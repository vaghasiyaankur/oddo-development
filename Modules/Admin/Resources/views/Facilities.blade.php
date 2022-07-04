@extends('layout::admin.master')

@push('css')
    <!-- 'classic'color picker css theme -->
    <link rel="stylesheet" href="{{ asset('assets/Admin/assets/libs/@simonwep/pickr/themes/classic.min.css') }}" />
    <!-- 'monolith' theme -->
    <link rel="stylesheet" href="{{ asset('assets/Admin/assets/libs/@simonwep/pickr/themes/monolith.min.css') }}" />
    <!-- 'nano' theme -->
    <link rel="stylesheet" href="{{ asset('assets/Admin/assets/libs/@simonwep/pickr/themes/nano.min.css') }}" />


    <!-- quill css -->
    <link href="{{ asset('assets/Admin/assets/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/Admin/assets/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/Admin/assets/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .amenity-type-select .iconpicker-dropdown ul {
            left: -21px !important;
            max-width: 237px !important;
            overflow: auto;
            border-radius: 10px;
            height: 100%;
            min-height: 146px;
        }

        .modal-select-icon .iconpicker-dropdown ul {
            width: 100%;
            max-width: 459px !important;
            border-radius: 10px;
            overflow: auto;
            padding-top: 6px;
            height: 100%;
            min-height: 109px;
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

        .pcr-app.visible {
            left: 730.594px !important;
        }

        .ck_editer_input .ck-editor .ck-editor__editable {
            min-height: 111px !important;
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
                            <div class=" col-sm-4">
                                <h5 class="card-title mb-0 ms-0 ms-sm-3  mb-3 mb-sm-0">Facilities</h5>
                            </div>
                            <div class=" col-sm-8">
                                <div class="d-flex align-items-center justify-content-evenly">
                                    <div class="search-box w-100">
                                        <input type="text" class="form-control search"
                                            placeholder="Search for Amenity status or something...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                    <div class="btn-group ms-4">
                                        <a class="btn btn-success text-nowrap" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalgrid"><i class="ri-add-line align-bottom me-1"></i>
                                            Add Facilities</a>
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
                                                    <th scope="col">Facilities-Name</th>
                                                    <th scope="col">Icon</th>
                                                    <th scope="col">Color</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row"><a href="#" class="fw-medium">#1</a></th>
                                                    <td>Bar</td>
                                                    <td><i class=" ri-goblet-line fs-4"></i></td>
                                                    <td>#6A78C7</td>
                                                    <td>
                                                        <button tabindex="0"
                                                            class="btn btn-soft-success waves-effect waves-light"
                                                            data-bs-toggle="popover" data-bs-trigger="focus" title=""
                                                            data-bs-content="And here's some amazing content. It's very engaging. Right?"
                                                            data-bs-original-title="">View Description</button>
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
                                                <tr>
                                                    <th scope="row"><a href="#" class="fw-medium">#2</a></th>
                                                    <td>Fittness Center</td>
                                                    <td><i class=" ri-community-fill fs-4"></i></td>
                                                    <td>#000</td>
                                                    <td>
                                                        <button tabindex="0"
                                                            class="btn btn-soft-success waves-effect waves-light"
                                                            data-bs-toggle="popover" data-bs-trigger="focus" title=""
                                                            data-bs-content="And here's some amazing content. It's very engaging. Right?"
                                                            data-bs-original-title="">View Description</button>
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
                                                <tr>
                                                    <th scope="row"><a href="#" class="fw-medium">#3</a></th>
                                                    <td>Free Wifi</td>
                                                    <td><i class="ri-wifi-line fs-4"></i></td>
                                                    <td>#c7c6C7</td>
                                                    <td>
                                                        <button tabindex="0"
                                                            class="btn btn-soft-success waves-effect waves-light"
                                                            data-bs-toggle="popover" data-bs-trigger="focus"
                                                            title=""
                                                            data-bs-content="And here's some amazing content. It's very engaging. Right?"
                                                            data-bs-original-title="">View Description</button>
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
                                                <tr>
                                                    <th scope="row"><a href="#" class="fw-medium">#4</a></th>
                                                    <td>Free Parking</td>
                                                    <td><i class=" ri-parking-fill fs-4"></i></td>
                                                    <td>#6A78C7</td>
                                                    <td>
                                                        <button tabindex="0"
                                                            class="btn btn-soft-success waves-effect waves-light"
                                                            data-bs-toggle="popover" data-bs-trigger="focus"
                                                            title=""
                                                            data-bs-content="And here's some amazing content. It's very amazing content engaging. Right?"
                                                            data-bs-original-title="">View Description</button>
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
                                            </tbody>
                                        </table>
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
            <div class="modal-dialog modal-dialog-top">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalgridLabel">Funtionality Edit Modals</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-2">
                                <label class="form-label" for="exampleDropdownFormtext"> Name</label>
                                <input type="text" class="form-control" id="exampleDropdownFormtext" placeholder="">
                            </div>
                            <div class="modal-select-icon mb-2">
                                <label> Icon</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text h-100 selectedIcon"></span>
                                    </div>
                                    <input type="text" class="form-control iconPicker" placeholder="Search Your Icon">
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="color--picker-input d-flex align-items-center">
                                    <div class="picker-title">
                                        <h5 class="fs-13 mb-0 me-3">Color :</h5>
                                    </div>
                                    <div class="classic-colorpicker"></div>
                                </div>
                            </div>
                            <div class="mb-3 ck_editer_input">
                                <div class="ckeditor-classic"></div>
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
    <!-- Modern colorpicker bundle -->
    <script src="{{ asset('assets/Admin/assets/libs/@simonwep/pickr/pickr.min.js') }}"></script>

    <!-- init form-pickers js -->
    <script src="{{ asset('assets/Admin/assets/js/pages/form-pickers.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- ckeditor -->
    <script src="{{ asset('assets/Admin/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('assets/Admin/assets/js/pages/form-editor.init.js') }}"></script>
    <!-- quill js -->
    <script src="{{ asset('assets/Admin/assets/libs/quill/quill.min.js') }}"></script>


    <script>
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
                hideOnSelect: true,
                fade: true,
                defaultValue: 'bi-search',
                // valueFormat: val => `bi ${val}`
            });

            iconpicker.set() // Set as empty
            // iconpicker.set('bi-alarm') // Reset with a value
        })();
        $(document).ready(function() {
            $('[data-bs-toggle="popover"]').popover();
        });
    </script>
@endpush
