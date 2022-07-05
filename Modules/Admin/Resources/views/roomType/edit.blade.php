<h4 class="">Room-Type Edit Form</h4>
<div class="card" style="border-radius: 0.75rem;">
    <div class="card-body">
        <form class="roomTypeForm" method="post" action="javascript:void(0)">
            <div class="mb-3">
                <label class="form-label" for="editRoomName">Add Room Type</label>
                <input type="text" class="form-control edit-roomType" id="editRoomName"
                    placeholder="Enter Room Type">
                <span class="text-danger" id="edit-roomType-error"></span>
            </div>
            <button class="btn btn-success room-type-update">Update</button>
        </form>
    </div>
</div>