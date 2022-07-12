@extends('layout::admin.master')

@section('title')
Bathroom
@endsection

@push('css')
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
</style>
@endpush

@section('content')
    <div class="page-content px-4">
        <div class="row">
            <div class="col-lg-4">
                <div class="create_div">
                    @include('admin::bathroom.create')
                </div>
                <div class="edit_div d-none">
                    @include('admin::bathroom.edit')
                </div>
            </div>
            <div class="col-lg-8">
                <h4 class="">Bathroom Item List</h4>
                <div class="card" id="orderList" style="border-radius: 0.75rem;">
                    <div class="card-body border border-end-0 border-start-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive bathroom-list">
                                    @include('admin::bathroom.bathroomList')
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
@endsection

@push('scripts')
    @include('admin::bathroom.scripts')
@endpush
