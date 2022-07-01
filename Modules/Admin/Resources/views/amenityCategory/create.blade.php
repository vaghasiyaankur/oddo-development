<h4 class="">Amenity-Category Add Form</h4>
<div class="card" style="border-radius: 0.75rem;">
    <div class="card-body">
        <form class="amenityCategoryForm" method="post" action="javascript:void(0)">
            <div class="mb-3">
                <label class="form-label" for="amenitycateogry">Add Amenity Category</label>
                <input type="text" class="form-control amenityCategory" id="amenitycateogry"
                    placeholder="Enter Amenity Category" value="{{old('name')}}">
                <span class="text-danger" id="amenityCategory-error"></span>
            </div>
            <button class="btn btn-success amenity-category-submit">Save</button>
        </form>
    </div>
</div>