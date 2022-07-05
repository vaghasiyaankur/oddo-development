@extends('layout::admin.master')

@push('css')
<!-- 'classic'color picker css theme -->
<link rel="stylesheet" href="{{ asset('assets/Admin/assets/libs/@simonwep/pickr/themes/classic.min.css') }}" />
<!-- 'monolith' theme -->
<link rel="stylesheet" href="{{ asset('assets/Admin/assets/libs/@simonwep/pickr/themes/monolith.min.css') }}" />
<!-- 'nano' theme -->
<link rel="stylesheet" href="{{ asset('assets/Admin/assets/libs/@simonwep/pickr/themes/nano.min.css') }}" />

<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
<!-- quill css -->
{{--
<link href="{{ asset('assets/Admin/assets/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/Admin/assets/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/Admin/assets/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" /> --}}
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

    /* .pcr-app.visible {
        left: 730.594px !important;
    } */

    .ck_editer_input .ck-editor .ck-editor__editable {
        min-height: 111px !important;
    }

    .color--picker-input .color--picker input.pickr-field {
        outline: none;
    }

    .color--picker-input .color--picker .pickr {
        padding: 0 8px;
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
                                        data-bs-target="#facilityCreate"><i class="ri-add-line align-bottom me-1"></i>
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
                                <div class="table-responsive facilitiesTable">
                                    @include('admin::facilities.facilities_list')
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

<!--facility create Modal start -->
@include('admin::facilities.create')
<!--facility create Modal end -->

<!--facility edit Modal start -->
@include('admin::facilities.edit')
<!--facility edit Modal end -->
@endsection


@push('scripts')
<!-- Modern colorpicker bundle -->
<script src="{{ asset('assets/Admin/assets/libs/@simonwep/pickr/pickr.min.js') }}"></script>

<!-- init form-pickers js -->
<script src="{{ asset('assets/Admin/assets/js/pages/form-pickers.init.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

{{--
<!-- ckeditor -->
<script src="{{ asset('assets/Admin/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

<!-- init js -->
<script src="{{ asset('assets/Admin/assets/js/pages/form-editor.init.js') }}"></script>
<!-- quill js -->
<script src="{{ asset('assets/Admin/assets/libs/quill/quill.min.js') }}"></script> --}}

@include('admin::facilities.scripts')
@endpush