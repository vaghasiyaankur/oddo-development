<h4 class="">Edit Bed Type Form</h4>
<div class="card" style="border-radius: 0.75rem;">
    <div class="card-body">
        <form class="editBedTypeForm" method="post" action="javascript:void(0)">
            <div class="mb-3"> 
                <input type="hidden" class="edit_id">
                <label class="form-label" for="editBedtype">Add Bed Type</label>
                <input type="text" class="form-control editBedtype" id="editBedtype"
                    placeholder="Enter bed type" value="">
                <span class="text-danger" id="editBedtype-error"></span>
            </div>
            <div class="mb-3">
                <label class="form-label" for="editBedSize">Add Bed Size</label>
                <input type="text" class="form-control editBedSize" id="editBedSize"
                    placeholder="Enter bed size" value="">
                <span class="text-danger" id="editBedSize-error"></span>
            </div>
            <button class="btn btn-success bed-type-update">update</button>
        </form>
    </div>
</div>