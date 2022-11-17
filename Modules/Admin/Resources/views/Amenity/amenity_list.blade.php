<?php
$color = ['#6A78C7', '#219653', '#6FCF97', '#9B51E0', '#2d9cdb', '#f2994a'];
?>
<div class="card-body border border border-end-0 border-start-0 ">
    <div class="categories-main">
        <div class="row amenity-list">
            @if(count($amenities))
            @foreach ($amenities as $amenity)
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-2 mb-4">
                <div class="card card-body edit-data-box position-reletive px-2">
                    <div class="d-flex align-items-center">
                        <div class="amenity-card--logo flex-shrink-0 load-3 loadingShow">
                            <div class="avatar-sm rounded-circle div-icon loadingHide"
                                style="background: {{ $color[array_rand($color)] }}">
                                <i class="{{$amenity->icon}}"></i>
                            </div>

                            <span class="loadingShow"></span>
                        </div>
                        <div class="flex-grow-1 ms-2 load-1 loadingShow">
                            <span class=""></span>
                            <div class="loadingHide">
                                <h5 class="card-title">{{ $amenity->amenities }}</h5>
                            </div>
                            <div class="load-2 loadingShow">
                                <span class=" mt-2"></span>
                                <div
                                    class="form-check form-switch form-switch-success d-flex justify-content-between align-items-center ms-1 loadingHide">
                                    <div class="status--check">
                                        <input class="form-check-input featured" type="checkbox" role="switch"
                                            data-value="{{ $amenity }}" id="SwitchCheck3" {{ $amenity->featured == 1 ?
                                        'checked' : '' }}>
                                    </div>
                                    @if($amenity->status == 0)
                                    <div class="deactive--status">
                                        <i class="bx bx-block fs-5 text-danger"></i>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="edit-box loadingHide">
                            <div class="dropdown"><button
                                    class="btn btn-white bg-success btn-sm dropdown position-absolute translate-middle rounded-pill"
                                    style="right:-22px;top:-10px;" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="ri-more-fill text-white"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end p-0"
                                    style="border-radius:8px;min-width: 4rem;">
                                    <li>
                                        <a class="dropdown-item amenityEdit" style="padding: 0.35rem 0.75rem;"
                                            href="javascript:;" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalgrid" data-value="{{ $amenity }}"><i
                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-danger amenityDelete"
                                            style="padding: 0.35rem 0.75rem;" href="javascript:;"
                                            data-value="{{ $amenity->id }}"><i
                                                class="ri-delete-bin-fill align-bottom me-2 text-danger"></i>
                                            Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
            @endforeach
            @else
            {{-- FOR EMPTY TABLE --}}
            <div class="empty-table w-100 text-center py-5">
                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                    colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
                </lord-icon>
                <h4>No records has been added yet.</h4>
            </div>
            @endif
        </div>
    </div>
</div>