<h4 class="">Room Add Form</h4>
<div class="card" style="border-radius: 0.75rem;">
    <div class="card-body">
        <form class="roomForm" method="post" action="javascript:void(0)">
            <div class="mb-3">
                <label class="form-label" for="roomName">Add Room Name</label>
                <input type="text" class="form-control room" id="roomName" placeholder="Enter Room Name">
                <span class="text-danger" id="roomName-error"></span>
            </div>
            <div class=" mb-2">
                <label>Amenities Icon</label>
                <select class="form-select mb-3 roomType" id="roomType" aria-label="Default select example"
                    name="roomType">
                    @foreach ($roomTypes as $roomType)
                        <option value="{{ $roomType->id }}">{{ $roomType->room_type }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success room-submit">Save</button>
        </form>
    </div>
</div>
