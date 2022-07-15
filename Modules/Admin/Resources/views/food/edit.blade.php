<h4 class="">Edit Food Form</h4>
<div class="card" style="border-radius: 0.75rem;">
    <div class="card-body">
        <form class="editFoodForm" method="post" action="javascript:void(0)">
            <div class="mb-3">
                <input type="hidden" class="edit_id">
                <label class="form-label" for="food">Add Food</label>
                <input type="text" class="form-control editFood" id="food"
                    placeholder="Enter Food" value="">
                <span class="text-danger" id="editFood-error"></span>
            </div>
            <button class="btn btn-success food-update">Update</button>
        </form>
    </div>
</div>