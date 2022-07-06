<div class="live-preview">
    <div class="modal fade modalEdit" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Funtionality Edit Modals</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="editFaclityForm" method="post" action="javascript:void(0)">
                        <input type="hidden" class="edit_id">
                        <div class="mb-2">
                            <label class="form-label" for="exampleDropdownFormtext"> Name</label>
                            <input type="text" class="form-control editfaclinityName" id="exampleDropdownFormtext" placeholder="">
                            <span class="text-danger" id="editfaclinityName-error"></span>
                        </div>
                        <div class="modal-select-icon mb-2">
                            <label> Icon</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text h-100 selected-icon"></span>
                                </div>
                                <input type="text" class="form-control icon-picker editFaclityIcon" placeholder="Search Your Icon">
                            </div>
                            <span class="text-danger" id="editFaclityIcon-error"></span>
                        </div>
                        
                        <div class="mb-3">
                            <div class="color--picker-input" >
                                <div class="picker-title mb-2">
                                    <h5 class="fs-13 mb-0 me-3">Color</h5>
                                </div>
                                <div class="color--picker d-flex align-items-center" style="border: 1px solid #ced4da;">
                                    <div class="editPickr" style="padding: 0 7px;"></div>
                                    <input type="text" class="pickr-field w-100 p-2 border-0 EditfacilityColor" style="border-left:1px solid #ced4da !important;"  name="color">
                                </div>
                            </div>
                            <span class="text-danger" id="EditfacilityColor-error"></span>
                        </div>
                        <div class="mb-3 facilitydesc">
                            <textarea name="content" class="editFacilityDescription" id="Editor"></textarea>
                            <span class="text-danger" id="editFacilityDescription-error"></span>
                        </div>
                        <div class="mb-2">
                            <div class="form-check custom-checkbox d-flex justify-content-end align-items-center">
                                <button type="submit" class="btn btn-success editFacilitySubmit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>