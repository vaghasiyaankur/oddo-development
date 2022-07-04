<div class="live-preview">
    <div class="modal fade" id="facilityCreate" tabindex="-1" aria-labelledby="exampleModalgridLabel"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Funtionality Edit Modals</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="faclityForm" method="post" action="javascript:void(0)">
                        <div class="mb-2">
                            <label class="form-label" for="exampleDropdownFormtext"> Name</label>
                            <input type="text" class="form-control faclityName" id="exampleDropdownFormtext" placeholder="">
                        </div>
                        <div class="modal-select-icon mb-2">
                            <label> Icon</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text h-100 selectedIcon"></span>
                                </div>
                                <input type="text" class="form-control iconPicker faclityIcon" placeholder="Search Your Icon">
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="color--picker-input d-flex align-items-center">
                                <div class="picker-title">
                                    <h5 class="fs-13 mb-0 me-3">Color :</h5>
                                </div>
                                <div class="pickr"></div>
                            </div>
                        </div>
                        <div class="mb-3 facilityDescription">
                            <textarea name="content" class="facilityDescription" id="createCKEditor"></textarea>
                        </div>
                        <input type="hidden" class="pickr-field" value="#4169e1" name="color">
                        <div class="mb-2">
                            <div class="form-check custom-checkbox d-flex justify-content-end align-items-center">
                                <button type="submit" class="btn btn-success faciltySubmit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>