<!------- img slider popup start -------->
<div class="modal fade img-popup-slider" id="image" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <button type="button" data-bs-dismiss="modal" class="modal-close image-close"
                    aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body display-flex-items py-sm-5">
                <div class="img-swiper">
                    <div class="slider slider-single mb-5" >
                        @foreach ($hotelPhotos as $hotelPhoto)
                            <div class="slider-single-img" ><img
                                    src="{{ @$hotelPhoto->photos ? asset('storage/' . @$hotelPhoto->photos) : asset('assets/images/default.png') }}" 
                                    onerror="this.src='{{asset('assets/images/default.png')}}'"
                                    alt="" style="width: 857px; height: 551px;">
                            </div>
                        @endforeach
                    </div>
                    <div class="slider slider-nav">
                        @foreach ($hotelPhotos as $hotelPhoto)
                            <div class="slder-nav-img d-block"><img
                                    src="{{ @$hotelPhoto->photos ? asset('storage/' . @$hotelPhoto->photos) : asset('assets/images/default.png') }}"
                                    onerror="this.src='{{asset('assets/images/default.png')}}'"
                                    class="me-2" alt=""
                                    style="width: 72px; height: 72px;">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!------- img slider popup end -------->