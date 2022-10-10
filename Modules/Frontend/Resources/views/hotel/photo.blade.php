<div class="modal fade img-popup-slider photo-popup-main" id="categoryPhotosPopup" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <button type="button" data-bs-dismiss="modal" class="modal-close" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body d-flex justify-content-center align-items-center">
                <div class="img-swiper">
                    <div class="slider slider-single mb-5">
                        @if (isset($hotelPhotos))
                            @foreach ($hotelPhotos as $key => $hotelPhoto)
                                <div><img src="{{ @$hotelPhoto->photos ? asset('storage/' . $hotelPhoto->photos) : asset('assets/images/default.png') }}"
                                        onerror="this.src='{{asset('assets/images/default.png')}}'"
                                        style="width: 857px; height: 551px;" alt=""></div>
                            @endforeach
                        @endif
                    </div>
                    <div class="slider slider-nav">
                        @if (@$hotelPhotos)
                            @foreach ($hotelPhotos as $key => $hotelPhoto)
                                <img src="{{ @$hotelPhoto->photos ? asset('storage/' . @$hotelPhoto->photos) : asset('assets/images/default.png') }}"
                                    onerror="this.src='{{asset('assets/images/default.png')}}'"
                                    style="width: 72px !important; height: 72px;" class="me-2" alt="">
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // $('.slider-single').slick({
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     loop: true,
    //     arrows: true,
    //     draggable: false,
    //     fade: true,
    //     asNavFor: '.slider-nav'
    // });
    // $('.slider-nav').slick({
    //     slidesToShow: 10,
    //     slidesToScroll: 1,
    //     asNavFor: '.slider-single',
    //     dots: false,
    //     loop: true,
    //     draggable: false,
    //     centerMode: true,
    //     focusOnSelect: true,
    //     responsive: [{
    //             breakpoint: 1024,
    //             settings: {
    //                 slidesToShow: 8,
    //                 slidesToScroll: 1,
    //             },
    //         },
    //         {
    //             breakpoint: 767,
    //             settings: {
    //                 slidesToShow: 7,
    //                 slidesToScroll: 1,
    //             },
    //         },
    //         {
    //             breakpoint: 600,
    //             settings: {
    //                 slidesToShow: 6,
    //                 slidesToScroll: 1,
    //             },
    //         },
    //         {
    //             breakpoint: 576,
    //             settings: {
    //                 slidesToShow: 5,
    //                 slidesToScroll: 1,
    //             },
    //         },
    //         {
    //             breakpoint: 480,
    //             settings: {
    //                 slidesToShow: 3,
    //                 slidesToScroll: 1,
    //             },
    //         },
    //         {
    //             breakpoint: 360,
    //             settings: {
    //                 slidesToShow: 2,
    //                 slidesToScroll: 1,
    //             },
    //         },
    //     ],
    // });

    // $('.modal').on('shown.bs.modal', function(e) {
    //     $('.slider-single').slick('setPosition');
    //     $('.swiper').addClass('open');
    // });

    // $('.modal').on('shown.bs.modal', function(e) {
    //     $('.slider-nav').slick('setPosition');
    //     $('.swiper').addClass('open');
    // });
</script>
