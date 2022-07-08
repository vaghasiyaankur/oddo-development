<!-- location details fill modal start -->
<div class="modal fade" id="editLocation" tabindex="-1" aria-labelledby="exampleModalgridLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Loaction Details Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="locationForm" method="post" action="javascript:void(0)">
                    <div class="mb-3">
                        <label for="autoCompleteCars" class="">Enter City </label>
                        <div class="location-box">
                            <input type="text" class="form-control EditcityName" id="exampleDropdownFormtext"
                                placeholder="Enter City Name">
                            <span class="text-danger" id="EditcityName-error"></span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Country</label>
                        <select class="form-select mb-3 editCountry" aria-label="Default select example" name="">
                            @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->country_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Upload Your Image</label>
                        <div class="Upload--img">
                            <div class="editDropzone">
                                <div id="dropBox" class="position-relative">
                                    <form class="imgUploader mt-2">
                                        <div class="fallback">
                                        </div>
                                        <div class="dz-message needsclick m-0">
                                            <div class="mb-1">
                                                <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                            </div>
    
                                            <h5>Drop files here or click to upload.</h5>
                                        </div> 
                                </div> 
                            </div>
                            <span class="text-danger" id="image-error"></span>
                            
                            <div id="editGallery">
                                <ul class="mb-0" id="edit-dropzone-preview"  style="">
                                </ul>
                                <!-- end dropzon-preview -->
                            </div>
                        </div>
                    </div>
                    {{-- <div class="d-flex justify-content-between align-items-center">
                        <div class="active-deactive-input">
                            <div class="form-check form-check-inline form-radio-success me-1">
                                <input class="form-check-input editStatus status_active" type="radio" name="inlineRadioOptions"
                                    id="WithoutinlineRadio1" value="1" checked>
                                <label class="form-check-label" for="WithoutinlineRadio1">Active</label>
                            </div>
                            <div class="form-check form-check-inline form-radio-danger">
                                <input class="form-check-input editStatus status_deactive" type="radio" name="inlineRadioOptions"
                                    id="WithoutinlineRadio2" value="0">
                                <label class="form-check-label" for="WithoutinlineRadio2">Deactive</label>
                            </div>
                        </div> --}}
                        <div class="Submit--btn">
                            <button type="submit" class="btn btn-success locationSubmit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- location details fill modal end -->

    