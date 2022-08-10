@extends('layout::admin.master')
@section('title','Settings')

@push('css')
<link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css">
<link rel="stylesheet" href="https://unpkg.com/filepond/dist/filepond.min.css">
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
/*card page */
.card {
    border: none;
    box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.03);
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
}
.form-group {
    margin-bottom: 15px;
}
.image-upload .thumb .profilePicPreview.logoPicPrev {
    background-size: contain !important;
    background-position: center;
}
.image-upload .thumb .profilePicPreview {
    width: 100%;
    height: 310px;
    display: block;
    border: 3px solid #f1f1f1;
    box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.25);
    border-radius: 10px;
    background-size: cover !important;
    background-position: top;
    background-repeat: no-repeat;
    position: relative;
    overflow: hidden;
}
.image-upload .thumb .profilePicPreview .remove-image {
    position: absolute;
    top: -9px;
    right: -9px;
    text-align: center;
    width: 55px;
    height: 55px;
    font-size: 24px;
    border-radius: 50%;
    background-color: #df1c1c;
    color: #fff;
    display: none;
}
.image-upload .thumb .profilePicUpload {
    font-size: 0;
    opacity: 0;
}
input:not([type="radio"]), textarea {
    padding: 10px 20px;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
    background-color: transparent;
    font-size: 0.875rem !important;
}
.image-upload .thumb .avatar-edit label {
    text-align: center;
    line-height: 45px;
    font-size: 18px;
    cursor: pointer;
    padding: 2px 25px;
    width: 100%;
    border-radius: 5px;
    box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.16);
    transition: all 0.3s;
}

.bg--dark {
    background-color: #071251 !important;
}

/* logo & favicon start  */
.logo-favicon .card{
    background: #FFFFFF;
    box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, 0.25);
}

.logo-uplod svg {
  width: auto;
}

.logo-uplod .filepond--credits {
  display: none;
}
.logo-uplod  .filepond--root {
  width: 100%;
  max-width: 420px;
  margin-left: auto;
  margin-right: auto;
}
.logo-uplod .filepond--root .filepond--drop-label {
    height:100%;
    min-height: 232px;
}
.logo-uplod .filepond--drop-label {
  color: #4c4e53;
}
.logo-uplod .filepond--label-action {
  text-decoration-color: #babdc0;
}
.logo-uplod .filepond--panel-root {
  border-radius: 2em;
  background-color: #edf0f4;
  height: 1em;
}
.logo-uplod .filepond--item-panel {
  background-color: #595e68;
}
.logo-uplod .filepond--drip-blob {
  background-color: #7f8a9a;
}

.tab-content .tab-pane .logo-favicon .logo-btn{
    position: absolute;
    top: 70px;
    right: 20px;
    background: #0ab39c;
    padding: 5px 10px;
    border-radius: 5px;
    color: #fff;
}
.logo-image{
    width: 100%;
    max-width: 420px;
    background: #edf0f4;
    margin: 0 auto;
    height: 100%;
    min-height: 232px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    position: relative;
}
.logo-image .logo-btn-close{
    position: absolute;
    top: 5px;
    right: 5px;
    background: #0ab39c;
    border-radius: 50%;
    padding: 0px 5px;
    color: #fff;
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
                                    <a class="nav-link active" data-bs-toggle="tab" href="#generalSetting" role="tab" aria-selected="true">
                                       General Setting
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#logoFavicon" role="tab" aria-selected="false">
                                        Logo and Favicon
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#emailSetting" role="tab" aria-selected="false">
                                        Email Setting
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#privacy" role="tab" aria-selected="false">
                                        Privacy Policy
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="card-body p-4" style="min-height: 500px; height: 100%;">
                            <div class="tab-content">
                                <div class="tab-pane active" id="generalSetting" role="tabpanel">
                                    @include('admin::settings.generalSetting')
                                </div>
                                <!--end tab-pane-->
                                <!--end tab-pane-->
                                <div class="tab-pane" id="logoFavicon" role="tabpanel">
                                    @include('admin::settings.logoFavicon')
                                </div>
                                <!--end tab-pane-->
                                <div class="tab-pane" id="emailSetting" role="tabpanel">
                                    @include('admin::settings.emailSetting')
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
    @include('admin::settings.scripts')
@endpush
