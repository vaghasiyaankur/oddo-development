<h4 class="">Add Bed Type Form</h4>
<div class="card" style="border-radius: 0.75rem;">
    <div class="card-body">
        <form class="bedTypeForm" method="post" action="javascript:void(0)">
            <div class="mb-3"> 
                <label class="form-label" for="bedtype">Add Bed Type</label>
                <input type="text" class="form-control bedtype" id="bedtype"
                    placeholder="Enter bed type" value="">
                <span class="text-danger" id="bedtype-error"></span>
            </div>
            <div class="mb-3">
                <label class="form-label" for="bedSize">Add Bed Size</label>
                <input type="text" class="form-control bedsize" id="bedSize"
                    placeholder="Enter bed size" value="">
                <span class="text-danger" id="bedsize-error"></span>
            </div>
            <button class="btn btn-success bed-type-submit">Save</button>
        </form>
    </div>
</div>