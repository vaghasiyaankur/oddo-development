@extends('layout::admin.master')

@push('css')
@endpush

@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="orderList">
                    <div class="card-header  border-0">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-5">
                                <h5 class="card-title mb-0">Amenities Types </h5>
                            </div>
                            <div class="col-lg-6">
                                {{-- <div class="search-box">
                                <input type="text" class="form-control search"
                                    placeholder="Search for order ID, customer, status or something...">
                                <i class="ri-search-line search-icon"></i>
                            </div> --}}
                            </div>
                            <div class="col-lg-1 ps-0">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Amenity Types
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-md p-4" style="">
                                        <form>
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleDropdownFormEmail">Amenity Type</label>
                                                <input type="email" class="form-control" id="exampleDropdownFormEmail" placeholder="Enter Amenity Type">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Sign in</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border border-dashed border-end-0 border-start-0">
                      <div class="row">
                        <div class="col-lg-9">
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap mb-0 table-bordered ">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sl</th>
                                            <th scope="col">Amenity-types</th>
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
                                                    <label class="form-check-label ms-2" for="SwitchCheck1">Yes/No</label>
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
                                                    <label class="form-check-label ms-2" for="SwitchCheck1">Yes/No</label>
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
                                                    <label class="form-check-label ms-2" for="SwitchCheck1">Yes/No</label>
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
                                            <td>James White</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="SwitchCheck1">
                                                    <label class="form-check-label ms-2" for="SwitchCheck1">Yes/No</label>
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
