<h4 class="">Add Bathroom Item</h4>
<div class="card" style="border-radius: 0.75rem;">
    <div class="card-body">
        <form class="bathroomItemForm" method="post" action="javascript:void(0)">
            <div class="mb-3">
                <label class="form-label" for="item">Add Item</label>
                <input type="text" class="form-control item" id="item"
                    placeholder="Enter Item" value="{{old('name')}}">
                <span class="text-danger" id="item-error"></span>
            </div>
            <div class="modal-select-icon mb-2">
                <label>Icon</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text h-100 selected-icon"></span>
                    </div>
                    <input type="text" class="form-control iconpicker  bathroomIcon" placeholder="Search Your Icon">
                </div>
                <span class="text-danger" id="bathroomIcon-error"></span>
            </div>
            <button class="btn btn-success submitForm">Save</button>
        </form>
    </div>
</div>