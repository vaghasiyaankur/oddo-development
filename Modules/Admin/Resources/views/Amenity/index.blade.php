@extends('layout::admin.master')

@section('title')
Amenity
@endsection

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

        .amenity-card--logo .avatar-sm{
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            background: #0ab39cbf;
            color: #fff;
        }

        @-webkit-keyframes moving-gradient {
            0% {
                background-position: -250px 0;
            }

            100% {
                background-position: 250px 0;
            }
        }

         span {
            display: block;
        }

         .td-2 {
            width: 40px;
        }

         .td-2 span {
            background-color: rgba(0, 0, 0, 0.15);
            width: 40px;
            height: 21px;
            background: linear-gradient(to right, #eee 20%, #ddd 50%, #eee 80%);
            background-size: 500px 100px;
            animation-name: moving-gradient;
            animation-duration: 1s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
            animation-fill-mode: forwards;
        }

         .td-3 {
            max-width: 400px;
        }

         .td-3 span {
            height: 16px;
            background: linear-gradient(to right, #eee 20%, #ddd 50%, #eee 80%);
            background-size: 500px 100px;
            animation-name: moving-gradient;
            animation-duration: 1s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
            animation-fill-mode: forwards;
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
                                        <button type="button" class="btn btn-success  text-nowrap rounded-1"  data-bs-toggle="modal" data-bs-target="#exampleModalgrid2"><i class=" ri-add-line align-bottom me-1"></i>
                                            Amenity 
                                        </button>
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
    <!--Amenity create Modal start -->
    @include('admin::Amenity.create')
    <!--Amenity create Modal end -->

     <!--Amenity edit Modal start -->
    @include('admin::Amenity.edit')
    <!--Amenity edit Modal end -->
@endsection


@push('scripts')
@include('admin::Amenity.scripts')
@endpush
