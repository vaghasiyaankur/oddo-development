<h4 class="">Edit Bathroom Item</h4>
<div class="card" style="border-radius: 0.75rem;">
    <div class="card-body">
        <form class="editBathroomItemForm" method="post" action="javascript:void(0)">
            <input type="hidden" class="edit_id">
            <div class="mb-3">
                <label class="form-label" for="item">Add Item</label>
                <input type="text" class="form-control editItem" id="item"
                    placeholder="Enter Item" value="">
                <span class="text-danger" id="editItem-error"></span>
            </div>
            <div class="modal-select-icon mb-2">
                <label>Amenities Icon</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text h-100 selectedIcon"></span>
                    </div>
                    <input type="text" class="form-control iconPicker editBathroomIcon" placeholder="Search Your Icon">
                </div>
                <span class="text-danger" id="editBathroomIcon-error"></span>
            </div>
            <button class="btn btn-success UpdateSubmitForm">Update</button>
        </form>
    </div>
</div>