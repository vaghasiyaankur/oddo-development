<h4 class="">Room Edit Form</h4>
<div class="card" style="border-radius: 0.75rem;">
    <div class="card-body">
        <form class="editRoomForm" method="post" action="javascript:void(0)">
            <input type="hidden" class="edit_id">
            <div class="mb-3">
                <label class="form-label" for="roomName">Edit Room Name</label>
                <input type="text" class="form-control room" id="editRoomName"
                    placeholder="Enter Room Name">
                <span class="text-danger" id="editRoomName-error"></span>
            </div>
            <div class=" mb-2">
                <label>Amenities Icon</label>
                <select class="form-select mb-3 roomType" id="edtiRoomType" aria-label="Default select example" name="roomType">
                    @foreach($roomTypes as $roomType)
                        <option value="{{$roomType->id}}">{{$roomType->room_type}}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success room-update">Update</button>
        </form>
    </div>
</div>