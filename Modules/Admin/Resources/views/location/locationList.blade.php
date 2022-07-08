@if(count($cities))
@foreach ($cities as $city)
<div class="col-xl-2 col-lg-4 col-sm-6">
    <div class="gallery-box edit-data-box card">
        <div class="edit-box">
            <div class="dropdown">
                <button  class="btn btn-white bg-success btn-sm dropdown position-absolute translate-middle rounded-pill"
                    style="right:-8px;top: 42px;z-index:111;" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="ri-more-fill text-white"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end p-0" style="border-radius:8px;min-width: 4rem;">
                    <li>
                        <a class="dropdown-item location-Edit" style="padding: 0.35rem 0.75rem;" href="javascript:;"
                            data-bs-toggle="modal" data-bs-target="#editLocation" data-value="{{$city}}">
                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                            Edit</a>
                    </li>
                    <li>
                        <a class="dropdown-item text-danger delete-city" style="padding: 0.35rem 0.75rem;" href="javascript:;" data-value="{{$city->UUID}}"> 
                            <i class="ri-delete-bin-fill align-bottom me-2 text-danger"></i>
                            Delete</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="gallery-container">
                <img class="gallery-img img-fluid mx-auto"
                    src="{{asset('storage/'.@$city->background_image)}}" alt="" >
                <div class="gallery-overlay d-flex justify-content-between">
                    <h5 class="overlay-caption mb-1">{{$city->name}}</h5>
                    <div class="deactive--status  {{ $city->status == 1 ? 'd-none':
                        ''}}">
                        <i class="bx bx-block fs-5 text-danger"></i>
                    </div>
                </div>
        </div>
        <div class="box-content">
            <div class="d-flex align-items-center mt-2">
                <div class="flex-grow-1 text-muted"><a href="" class="text-body text-truncate">10 listed Disended</a>
                </div>
                <div class="flex-shrink-0">
                    <div class="d-flex gap-3">
                        <label class="mb-0" for="">Feature</label>
                        <div class="form-check form-switch form-switch-success ms-1">
                            <input class="form-check-input featured" type="checkbox" role="switch" id="SwitchCheck3" {{ $city->featured == 1 ? 'checked':
                            ''}}  data-uu_id="{{$city->UUID}}" data-value="{{$city->featured}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end col-->
@endforeach
@else
{{-- FOR EMPTY TABLE --}}
<div class="empty-table w-100 text-center py-5">
    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c"
        style="width:75px;height:75px">
    </lord-icon>
    <h4>No records has been added yet.</h4>
    <h6>Add a new record by simpley clicking the button on top right side.</h6>
</div>
@endif