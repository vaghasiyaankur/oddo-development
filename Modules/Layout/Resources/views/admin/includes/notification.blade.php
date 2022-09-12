<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end notifactionDiv p-0">
    <div class="dropdown-head bg-primary bg-pattern rounded-top">
        <div class="p-3">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications </h6>
                </div>
                <div class="col-auto dropdown-tabs">
                    <span class="badge badge-soft-light fs-13"> New</span>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content" id="notificationItemsTabContent">

        <div class="tab-pane fade py-2 ps-2 active show" id="all-noti-tab" role="tabpanel">
            <div data-simplebar="init" style="max-height: 300px;" class="pe-2">
                <div class="simplebar-wrapper" style="margin: 0px -8px 0px 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                aria-label="scrollable content"
                                style="height: auto; overflow: hidden scroll;">
                                <div class="simplebar-content" style="padding: 0px 8px 0px 0px;">
                                    @if (@$hotels) 
                                        @foreach ($hotels as $hotelDetails)
                                                
                                            @foreach ($hotelDetails as $hotel)
                                            <div class="text-reset notification-item d-block dropdown-item position-relative">
                                                <div class="d-flex">
                                                    <div class="avatar-xs me-3">
                                                        <span
                                                            class="avatar-title bg-soft-info text-info rounded-circle fs-16">
                                                            <i class="bx bx-badge-check"></i>
                                                        </span>
                                                    </div>
                                                    <div class="flex-1">
                                                        <h6 class="mt-0 mb-2 lh-base">{{@$hotel->property_name}}</h6>
                                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> Just {{$hotel->created_at->diffForHumans() }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="fs-15">
                                                        <a href="javascript:;" class="btn btn-primary py-1 px-2 deleteNotification" data-id="{{$hotel->id}}">X</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        
                                        @endforeach
                                    @endif
                                    {{-- <div class="my-3 text-center">
                                        <button type="button"
                                            class="btn btn-soft-success waves-effect waves-light">View
                                            All Notifications <i
                                                class="ri-arrow-right-line align-middle"></i></button>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: auto; height: 510px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                    <div class="simplebar-scrollbar"
                        style="height: 176px; display: block; transform: translate3d(0px, 0px, 0px);">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

