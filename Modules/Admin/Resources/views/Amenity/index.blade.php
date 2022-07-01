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

        .iconpicker-dropdown ul li.selected {
            background-color: #0ab39c !important;
            color: #fff;
        }
    </style>
@endpush

@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="orderList">
                    <div class="card-header  border-0">
                        <div class="row align-items-center">
                            <div class=" col-sm-4">
                                <h5 class="card-title mb-0 ms-0 ms-sm-3  mb-3 mb-sm-0">Amenity</h5>
                            </div>
                            <div class=" col-sm-8">
                                <div class="d-flex align-items-center justify-content-evenly">
                                    <div class="search-box w-100">
                                        <input type="text" class="form-control search"
                                            placeholder="Search for Amenity status or something...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                    <div class="btn-group d-flex justify-content-end ms-4">
                                        <button type="button" class="btn btn-success  text-nowrap"  data-bs-toggle="modal" data-bs-target="#exampleModalgrid2">
                                            Amenity Types <i class=" ri-arrow-down-s-line"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-md p-4  option-select"
                                            style="top: 45px;left: -98px;">
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('admin::Amenity.amenity_list')
                </div>
            </div>
            <!--end col-->
        </div>
    </div>
    <!-- End Page-content -->
    <!--Amenity edit Modal start -->
    @include('admin::Amenity.edit')
    @include('admin::Amenity.create')
    <!--Amenity edit Modal end -->
@endsection


@push('scripts')
@include('admin::Amenity.scripts')
@endpush
