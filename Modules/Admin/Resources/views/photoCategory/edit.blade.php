<h4 class="">photo-Category Edit Form</h4>
<div class="card" style="border-radius: 0.75rem;">
    <div class="card-body">
        <form class="updatephotoCategoryForm" method="post" action="javascript:void(0)">
            <input type="text" style="display: none;" class="edit_id" value="0">
            <div class="mb-3">
                <label class="form-label" for="photocateogry">Edit Photo Category</label>
                <input type="text" class="form-control edit-photoCategory category" id="photocateogry"
                    placeholder="Enter photo Category" value="">
                <span class="text-danger" id="edit-photoCategory-error"></span>
            </div>
            <button class="btn btn-success photo-category-update">Update</button>
        </form>
    </div>
</div>