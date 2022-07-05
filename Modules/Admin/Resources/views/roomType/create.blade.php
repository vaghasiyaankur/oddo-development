<h4 class="">Room-Type Add Form</h4>
<div class="card" style="border-radius: 0.75rem;">
    <div class="card-body">
        <form class="roomTypeForm" method="post" action="javascript:void(0)">
            <div class="mb-3">
                <label class="form-label" for="roomName">Add Room Type</label>
                <input type="text" class="form-control roomType" id="roomName"
                    placeholder="Enter Room Type">
                <span class="text-danger" id="roomType-error"></span>
            </div>
            <button class="btn btn-success room-type-submit">Save</button>
        </form>
    </div>
</div>