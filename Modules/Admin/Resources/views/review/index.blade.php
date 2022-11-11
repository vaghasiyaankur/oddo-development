@extends('layout::admin.master')
@section('title', 'Reviews')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/Admin/assets/libs/@simonwep/pickr/themes/classic.min.css') }}" />
    <!-- 'monolith' theme -->
    <link rel="stylesheet" href="{{ asset('assets/Admin/assets/libs/@simonwep/pickr/themes/monolith.min.css') }}" />
    <!-- 'nano' theme -->
    <link rel="stylesheet" href="{{ asset('assets/Admin/assets/libs/@simonwep/pickr/themes/nano.min.css') }}" />

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

        @-webkit-keyframes moving-gradient {
            0% {
                background-position: -250px 0;
            }

            100% {
                background-position: 250px 0;
            }
        }

        .table__body span {
            display: none;
        }

        .table__body .td-2 {
            width: 40px;
        }

        .table__body .td-2 span {
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

        .table__body .td-3 {
            max-width: 400px;
        }

        .table__body .td-3 span {
            height: 16px;
            background: linear-gradient(to right, #eee 20%, #ddd 50%, #eee 80%);
            background-size: 500px 100px;
            animation-name: moving-gradient;
            animation-duration: 1s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
            animation-fill-mode: forwards;
        }

        nav {
            float: right;
            margin-top: 20px;
        }

        .page-content .card-header .search-box .close-icon {
            position: absolute;
            right: 10px;
            top: 7px;
            font-size: 17px;
        }

        .form-check button {
            width: 75px;
        }
        .dropdown-menu.show{
            /* min-width: 120px !important; */
        }
        .btn-group .sorting{
            margin-right: 30px;
           min-width: 150px;
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
                            <div class=" col-sm-5">
                                <h5 class="card-title mb-0 ms-0 ms-sm-3  mb-3 mb-sm-0">Reviews</h5>
                            </div>
                            <div class=" col-sm-7 float-right">
                                <div class="d-flex align-items-center justify-content-evenly">
                                    <div class="search-box w-100">
                                        <input type="text" value="" class="form-control search" name="search"
                                            placeholder="Search for Review or something...">
                                        <i class="ri-search-line search-icon"></i>
                                        <i class="ri-close-line close-icon cancelBtn d-none"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border border border-end-0 border-start-0">
                        <div class="categories-main">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive reviewTable">
                                        @include('admin::review.reviewList')
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

@endsection

@push('scripts')
    <script src="{{ asset('assets/Admin/assets/libs/@simonwep/pickr/pickr.min.js') }}"></script>

    <!-- init form-pickers js -->
    <script src="{{ asset('assets/Admin/assets/js/pages/form-pickers.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    @include('admin::review.scripts')
@endpush
