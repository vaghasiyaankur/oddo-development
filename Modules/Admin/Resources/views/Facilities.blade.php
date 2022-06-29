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
                                <h5 class="card-title mb-0 ms-3">Facilities</h5>
                            </div>
                            <div class="col-lg-6">
                                <div class="search-box">
                                    <input type="text" class="form-control search"
                                        placeholder="Search for Amenity status or something...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <div class="col-lg-1 ps-0">
                                <div class="btn-group">
                                        <a class="btn btn-success text-nowrap" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i class="ri-add-line align-bottom me-1"></i> Add Facilities</a>
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
                                                    <th scope="col">SL</th>
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
                                                    <td><i class=" ri-community-fill fs-4"></i></td>
                                                    <td>#6A78C7</td>
                                                    <td class="text-wrap">Lorem ipsum dolor</td>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch"
                                                                id="SwitchCheck1" checked="">
                                                            <label class="form-check-label ms-2"
                                                                for="SwitchCheck1">Yes/No</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="link-success fs-17 pe-3"><i
                                                                class="ri-edit-2-line"></i></a>
                                                        <a href="javascript:void(0);" class="link-danger fs-17"><i
                                                                class="ri-delete-bin-line"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><a href="#" class="fw-medium">#2</a></th>
                                                    <td>Fittness Center</td>
                                                    <td><i class=" ri-community-fill fs-4"></i></td>
                                                    <td>#6A78C7</td>
                                                    <td>Lorem ipsum dolor Lorem, ipsum dolor.</td>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch"
                                                                id="SwitchCheck1">
                                                            <label class="form-check-label ms-2"
                                                                for="SwitchCheck1">Yes/No</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="link-success fs-17 pe-3"><i
                                                                class="ri-edit-2-line"></i></a>
                                                        <a href="javascript:void(0);" class="link-danger fs-17"><i
                                                                class="ri-delete-bin-line"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><a href="#" class="fw-medium">#3</a></th>
                                                    <td>Free Wifi</td>
                                                    <td><i class=" ri-community-fill fs-4"></i></td>
                                                    <td>#6A78C7</td>
                                                    <td>Lorem ipsum dolor Lorem, ipsum dolor.</td>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch"
                                                                id="SwitchCheck1" checked="">
                                                            <label class="form-check-label ms-2"
                                                                for="SwitchCheck1">Yes/No</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="link-success fs-17 pe-3"><i
                                                                class="ri-edit-2-line"></i></a>
                                                        <a href="javascript:void(0);" class="link-danger fs-17"><i
                                                                class="ri-delete-bin-line"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row"><a href="#" class="fw-medium">#4</a></th>
                                                    <td>Free Parking</td>
                                                    <td><i class=" ri-community-fill fs-4"></i></td>
                                                    <td>#6A78C7</td>
                                                    <td>Lorem ipsum dolor Lorem, ipsum dolor.</td>
                                                    <td>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch"
                                                                id="SwitchCheck1">
                                                            <label class="form-check-label ms-2"
                                                                for="SwitchCheck1">Active/Deactive</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="link-success fs-17 pe-3"><i
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
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalgridLabel">Funtionality Edit Modals</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-2">
                                <label class="form-label" for="exampleDropdownFormtext">Funtionality Name</label>
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
    </script>
@endpush
