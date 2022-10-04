@extends('layout::admin.master')
@section('title','Pages')

@push('css')
<!-- 'classic'color picker css theme -->
<link rel="stylesheet" href="{{ asset('assets/Admin/assets/libs/@simonwep/pickr/themes/classic.min.css') }}" />
<!-- 'monolith' theme -->
<link rel="stylesheet" href="{{ asset('assets/Admin/assets/libs/@simonwep/pickr/themes/monolith.min.css') }}" />
<!-- 'nano' theme -->
<link rel="stylesheet" href="{{ asset('assets/Admin/assets/libs/@simonwep/pickr/themes/nano.min.css') }}" />

<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>

{{-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc"></script> --}}
@endpush

@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="orderList">
                <div class="card-header  border-0">
                    <div class="card-heading d-flex justify-content-between align-items-center">
                        <div class="single-main-head">
                            <h5 class="purple-dark">Pages</h5>
                        </div>
                        <div class="single-small-title">
                            <a class="btn btn-success text-nowrap" href="{{ route('pages.index') }}">
                                <i class="fa fa-list-ul me-1"></i>
                                Pages
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body  border-0">
                    <form class="createPages" method="post" action="javascript:void(0);">
                    <div class="row">
                        <div class="col-lg-12 pb-3">
                            <input type="hidden" class="id" value="{{isset($page) ? $page->UUID : ''}}"> 
                            <label for="labelInput" class="form-label ">Title</label>
                            <input type="text" class="form-control title" id="labelInput" placeholder="Title" value="{{isset($page) ? $page->title : ''}}">
                            <span class="text-danger" id="title-error"></span>
                        </div>

                        <div class="col-lg-12 pb-3">
                            <label for="labelInput" class="form-label ">Slug</label>
                            <input type="text" class="form-control slug" id="labelInput" placeholder="slug" value="{{isset($page) ? $page->slug : ''}}">
                            <span class="text-danger" id="slug-error"></span>
                        </div>

                        <div class="col-lg-12 pb-3">
                            <label for="labelInput" class="form-label ">Description (Meta Tag)</label>
                            <input type="text" class="form-control description" id="labelInput"
                                placeholder="Description (Meta Tag)" value="{{isset($page) ? $page->meta_description : ''}}">
                            <span class="text-danger" id="description-error"></span>
                        </div>

                        <div class="col-lg-12 pb-3">
                            <label for="exampleInputdate" class="form-label">Keywords (Meta Tag)</label>
                            <input type="text" class="form-control keywords" id="labelInput"
                                placeholder="Keywords (Meta Tag)" value="{{isset($page) ? $page->meta_key : ''}}">
                            <span class="text-danger" id="keywords-error"></span>
                        </div>

                        <div class="col-lg-4 pb-3">
                            <label for="exampleInputdate" class="form-label">Visibility</label>
                            <div class="active-deactive-input">
                                <div class="form-check form-check-inline form-radio-success me-1 pe-4">
                                    <input class="form-check-input status" type="radio" name="status" id="visibilityShow"
                                        value="1"  {{isset($page) && $page->status == 1 ? 'checked' : ''}}>
                                    <label class="form-check-label" for="visibilityShow">Show</label>
                                </div>
                                <div class="form-check form-check-inline form-radio-success">
                                    <input class="form-check-input status" type="radio" name="status" id="visibilityHide"
                                        value="0" {{isset($page) && $page->status == 0 ? 'checked' : ''}}>
                                    <label class="form-check-label" for="visibilityHide">hide</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 pb-3">
                            <label for="exampleInputdate" class="form-label">Location</label>
                            <div class="active-deactive-input">
                                <div class="form-check form-check-inline form-radio-success me-1 pe-4">
                                    <input class="form-check-input location" type="radio" name="location" id="locationActive"
                                        value="1" {{isset($page) && $page->location == 1 ? 'checked' : ''}} >
                                    <label class="form-check-label" for="locationActive">Top Menu</label>
                                </div>
                                <div class="form-check form-check-inline form-radio-success">
                                    <input class="form-check-input location" type="radio" name="location" id="locationDeactive"
                                        value="0" {{isset($page) && $page->location == 0 ? 'checked' : ''}}>
                                    <label class="form-check-label" for="locationDeactive">Quick Links</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 pb-3">
                            <div class="form-select-click">
                                <label for="exampleInputdate" class="form-label">Title Show</label>
                                <div class="active-deactive-input">
                                    <div class="form-check form-check-inline form-radio-success me-1 pe-4">
                                        <input class="form-check-input titleShow" type="radio" name="titleShow" id="titleShow"
                                            value="1" {{isset($page) && $page->show_title == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="titleShow">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline form-radio-success">
                                        <input class="form-check-input titleShow" type="radio" name="titleShow" id="titleHide"
                                            value="0" {{isset($page) && $page->show_title == 0 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="titleHide">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 pb-3">
                            <label for="exampleInputdate" class="form-label">Content</label>
                            {{-- <textarea class="tinyMCE" id="tiny">  
                            </textarea> --}}
                            <textarea name="content" class="pageContent" id="createCKEditor">
                                {{isset($page) ? $page->description : ''}}
                            </textarea>   
                            <span class="text-danger" id="content-error"></span>

                        </div>
                        
                        <div class="col-lg-12 pb-3">
                            <button class="btn btn-success page-update pull-right">Update</button>
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
@include('admin::pages.scripts')
<script>
    let theEditor;
    ClassicEditor.create(document.querySelector('#createCKEditor')).then(editor => {
        theEditor = editor;
    }).catch(error => {
        console.error(error);
    });

    function getDataFromTheEditor() {
        return theEditor.getData();
    }
</script>
@endpush