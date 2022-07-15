<h4 class="">Add Food Form</h4>
<div class="card" style="border-radius: 0.75rem;">
    <div class="card-body">
        <form class="foodForm" method="post" action="javascript:void(0)">
            <div class="mb-3">
                <label class="form-label" for="food">Add Food</label>
                <input type="text" class="form-control food" id="food"
                    placeholder="Enter Food" value="">
                <span class="text-danger" id="food-error"></span>
            </div>
            <button class="btn btn-success food-submit">Save</button>
        </form>
    </div>
</div>