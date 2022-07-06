<h4 class="">Amenity-Category Edit Form</h4>
<div class="card" style="border-radius: 0.75rem;">
    <div class="card-body">
        <form class="updateamenityCategoryForm" method="post" action="javascript:void(0)">
            <input type="text" style="display: none;" class="edit_id" value="0">
            <div class="mb-3">
                <label class="form-label" for="amenitycateogry">Edit Amenity Category</label>
                <input type="text" class="form-control amenityCategory category" id="amenitycateogry"
                    placeholder="Enter Amenity Category" value="">
                <span class="text-danger" id="editAmenityCategory-error"></span>
            </div>
            <button class="btn btn-success amenity-category-update">Update</button>
        </form>
    </div>
</div>