<?php
$color = ['#6A78C7', '#219653', '#6FCF97', '#9B51E0', '#2d9cdb', '#f2994a'];
?>
<div class="card-body border border border-end-0 border-start-0 ">
    <div class="categories-main">
        <div class="row amenity-list">
            @foreach ($amenities as $amenity)
                <div class="col-md-2 mb-2 mb-4">
                    <div class="card card-body edit-data-box position-reletive px-2">
                        <div class="d-flex align-items-center">
                            <div class="amenity-card--logo flex-shrink-0">
                                <div class="avatar-sm rounded-circle"
                                    style="background: {{ $color[array_rand($color)] }}">
                                    <i class="{{$amenity->icon}}"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h5 class="card-title">{{ $amenity->amenities }}</h5>
                                <div class="form-check form-switch form-switch-success d-flex justify-content-between align-items-center ms-1">
                                   <div class="status--check">
                                    <input class="form-check-input featured" type="checkbox" role="switch"
                                    data-value="{{ $amenity }}" id="SwitchCheck3"
                                    {{ $amenity->featured == 1 ? 'checked' : '' }}>
                                   </div>
                                   @if($amenity->status == 0)
                                    <div class="deactive--status">
                                        <i class="ri-forbid-line fs-5 text-danger"></i>
                                    </div>
                                   @endif
                                </div>
                            </div>
                            <div class="edit-box">
                                {{-- <span
                                    class=" position-absolute translate-middle badge rounded-pill bg-success p-2 amenityEdit"
                                    data-bs-toggle="modal" data-bs-target="#exampleModalgrid" style="right:-26px;top: 13px;"
                                    data-value="{{ $amenity }}"><i class="ri-pencil-line"
                                        style="font-size: 13px;"></i></span> --}}
                                <div class="dropdown"><button
                                        class="btn btn-white bg-success btn-sm dropdown position-absolute translate-middle rounded-pill"
                                        style="right:-22px;top:-3px;" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false"><i class="ri-more-fill text-white"></i></button>
                                    <ul class="dropdown-menu dropdown-menu-end p-0" style="border-radius:8px;min-width: 4rem;">
                                        <li>
                                            <a class="dropdown-item" style="padding: 0.35rem 0.75rem;"
                                                href="javascript:;"><i
                                                    class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" style="padding: 0.35rem 0.75rem;"
                                                href="javascript:;"><i
                                                    class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
