@extends('layout::admin.master')
@section('title','Room')

@push('css')
<style>
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
                    @include('admin::room.create')
                </div>
                <div class="edit_div d-none">
                    @include('admin::room.edit')
                </div>
            </div>
            <div class="col-lg-8">
                <h4 class="">Room List </h4>
                <div class="card" id="orderList" style="border-radius: 0.75rem;">
                    <div class="card-body border border-end-0 border-start-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive roomTypeTable">
                                    @include('admin::room.room_list')
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
    @include('admin::room.scripts')
@endpush
