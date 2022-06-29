@extends('layout::admin.master')

@push('css')
@endpush

@section('content')
    <div class="page-content px-4">
        <div class="row">
            <div class="col-lg-4">
                <h4 class="">Amenity Add Form </h4>
                <div class="card" style="border-radius: 0.75rem;">
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label" for="exampleDropdownFormEmail">Add Amenity Type</label>
                                <input type="email" class="form-control" id="exampleDropdownFormEmail"
                                    placeholder="Enter Amenity Type">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <h4 class="">Amenity List </h4>
                <div class="card" id="orderList" style="border-radius: 0.75rem;">
                    <div class="card-body border border-end-0 border-start-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap mb-0 ">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sl</th>
                                                <th scope="col">Amenity-Name</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><a href="#" class="fw-medium">#1</a></th>
                                                <td>Bed</td>
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
                                                <td>Tea Maker</td>
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
                                                <td>Coffe Maker</td>
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
            <!--end col-->
        </div>
    </div>
    <!-- End Page-content -->
@endsection

@push('scripts')
@endpush
