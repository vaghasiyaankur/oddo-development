@extends('layout::admin.master')

@push('css')
<style>
.headingText{
    position: absolute;
    top: 45%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.headingText h2{
    font-size: 35px !important;
    color: #fff !important;
}
@media screen and (max-width:768px){
    .profile-setting-img{
        height: 164px !important;
    }
    .headingText {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
}
</style>
@endpush

@section('content')
    <div class="page-content px-4">
        <div class="container-fluid">

            <div class="position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg profile-setting-img position-relative">
                    <img src="{{ asset('assets/admin/assets/images/profile-bg.jpg') }}" class="profile-wid-img" alt="">
                    {{-- <div class="overlay-content">
                        <div class="text-end p-3">
                            <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                                <input id="profile-foreground-img-file-input" type="file" class="profile-foreground-img-file-input">
                                <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                                    <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                                </label>
                            </div>
                        </div>
                    </div> --}}
                    <div class="headingText">
                        <h2>Settings</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <!--end col-->
                <div class="col-xxl-12">
                    <div class="card mt-n5">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist" style="flex-wrap: nowrap;overflow: auto;white-space: nowrap;">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="true">
                                        Personal Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab" aria-selected="false">
                                        Change Password
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#experience" role="tab" aria-selected="false">
                                        Experience
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#privacy" role="tab" aria-selected="false">
                                        Privacy Policy
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-4" style="min-height: 500px; height: 100%;">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">

                                </div>
                                <!--end tab-pane-->
                                <div class="tab-pane" id="changePassword" role="tabpanel">

                                </div>
                                <!--end tab-pane-->
                                <div class="tab-pane" id="experience" role="tabpanel">

                                </div>
                                <!--end tab-pane-->
                                <div class="tab-pane" id="privacy" role="tabpanel">

                                </div>
                                <!--end tab-pane-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div>
    </div>
    <!-- End Page-content -->
@endsection

@push('scripts')
    @include('admin::room.scripts')
@endpush
