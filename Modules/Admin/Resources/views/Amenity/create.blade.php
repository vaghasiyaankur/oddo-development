<div class="live-preview">
    <div class="modal fade" id="exampleModalgrid2" tabindex="-1" aria-labelledby="exampleModalgridLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Amenities Create Modals</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-2">
                            <label class="form-label" for="exampleDropdownFormtext">Amenity Name</label>
                            <input type="text" class="form-control" id="exampleDropdownFormtext"
                                placeholder="Enter Amenity Name">
                        </div>
                        <div class="modal-select-icon mb-2">
                            <label>Amenities Icon</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text h-100 selectedIcon"></span>
                                </div>
                                <input type="text" class="form-control iconpicker" placeholder="Search Your Icon">
                            </div>
                        </div>
                        <div class=" mb-2">
                            <label>Amenities Icon</label>
                            <select class="form-select mb-3" aria-label="Default select example">
                                @foreach($amenityCategories as $category)
                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="active-deactive-input">
                                <div class="form-check form-check-inline form-radio-success me-1">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="WithoutinlineRadio1" value="option1" checked="">
                                    <label class="form-check-label" for="WithoutinlineRadio1">Active</label>
                                </div>
                                <div class="form-check form-check-inline form-radio-danger">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="WithoutinlineRadio2" value="option2">
                                    <label class="form-check-label" for="WithoutinlineRadio2">Deactive</label>
                                </div>
                            </div>
                            <div class="Submit--btn">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>