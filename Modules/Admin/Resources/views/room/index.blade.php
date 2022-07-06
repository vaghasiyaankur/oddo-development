@extends('layout::admin.master')

@push('css')
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
