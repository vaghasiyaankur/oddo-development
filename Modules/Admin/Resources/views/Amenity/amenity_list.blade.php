<?php
    $color = ['#6A78C7','#219653', '#6FCF97', '#9B51E0', '#2d9cdb', '#f2994a'];
?>
<div class="card-body border border border-end-0 border-start-0 ">
    <div class="categories-main">
        <div class="row amenity-list">
            @foreach($amenities as $amenity)
                <div class="col-md-2 mb-2 mb-4">
                    <div class="card card-body edit-data-box position-reletive px-2">
                        <div class="edit-box">
                            <span
                                class=" position-absolute translate-middle badge rounded-pill bg-success p-2 amenityEdit"
                                data-bs-toggle="modal" data-bs-target="#exampleModalgrid"
                                style="right:-26px;top: 13px;" data-value="{{$amenity}}"><i class="ri-pencil-line"
                                    style="font-size: 13px;"></i></span>
                        </div>
                        <div class="delete-box">
                           
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="amenity-card--logo flex-shrink-0">
                                <div class="avatar-sm rounded-circle" style="background: {{$color[array_rand($color)]}}">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-2">
                                <h5 class="card-title">{{$amenity->amenities}}</h5>
                                <div class="form-check form-switch form-switch-success ms-1">
                                    <input class="form-check-input featured" type="checkbox" role="switch"
                                        data-value="{{$amenity}}" id="SwitchCheck3" {{ $amenity->featured == 1 ? 'checked': ''}}>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>