
@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-------- Slick css cdn ------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" />

    <!------ Swiper css link ------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css">

    <style>
        .img-popup-slider .img-swiper .slider-single img {
            width: 100%;
            object-fit: cover;
        }

        .img-popup-slider .img-swiper .slick-next:before {
            content: "\f105";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
        }

        .img-popup-slider .img-swiper .slick-prev:before {
            content: "\f104";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
        }

        .img-popup-slider .img-swiper {
            width: 100%;
            max-width: 857px;
            margin: 0 auto;
        }

        .slick-track {
            width: 18141px !important;
        }

        .slick-track .slick-cloned,
        .slick-active {
            width: 76px !important;
        }

        /* .slider-nav .slick-list .slick-track{
                        width: 2508px !important; */
        /* transform: translate3d(-456px, 0px, 0px) !important; */
        /* } */
        .slick-list {
            padding: 0px 0px !important;
        }

        .slider-nav .slick-list .slick-track .slick-slide {
            width: 86px !important;
        }

        .slder-nav-img img {
            width: 82px !important;
        }
    </style>
@endpush


@forelse ($hotels as $hotel)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100 hotelProperty_card border-0">
            <div class="card-image">
                <div href="javascript:;" class="image-slide albumBtn" data-id="{{ $hotel->UUID }}">
                    <img src="{{ @$hotel->mainPhoto->first()->photos ? asset('storage/' . @$hotel->mainPhoto->first()->photos) : asset('assets/images/default-image.png') }}" class="img-fluid">
                </div>
                @if (!empty($hotel->slug) && $hotel->complete == 1)
                    <div class="watch-list">
                        <a href="{{ route('hotel.detail', $hotel->slug) }}" class="watch-list-icon"><i class="fa-solid fa-eye"></i></a>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <h2 class="card-title">{{ $hotel->property_name }}</h2>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="hotel_rating d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            @for($i = 0; $i < 5; $i++)
                            <?php
                                $checkstar = number_format($hotel->review_avg_total_rating, '1', '.', '') - $i;                   
                            ?>
                            @if($checkstar >= 1 )
                                <i class="fa-solid fa-star rating"></i>  
                            @elseif( $checkstar < 1 && $checkstar > 0)
                                <i class="fa-regular fa-star-half-stroke rating"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                        </p>
                        <span class="rating_label ps-2">({{(float)number_format($hotel->review_avg_total_rating, '1', '.', '')}})</span>
                    </div>
                    <div class="hotel_location d-flex align-items-center">
                        <img src="{{ asset('assets/images/icons/ei-location.png') }}" class="img-fluid">
                        <span class="location_name ps-2">{{ @$hotel->city->name }}</span>
                    </div>
                </div>                                            
            </div>
            <div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                <a href="{{ route('basic-info', ['id' => $hotel->UUID]) }}" class="change_btn">Edit
                    <span class="ps-2"><i class="fa-regular fa-pen-to-square"></i></span>
                </a>
                <div class="exploer-icons d-flex">
                    <a href="{{route('calender', ['id' => $hotel->UUID])}}" class="exploer-icons-inner calender-icon">
                        <i class="fa-solid fa-calendar-days"></i>
                    </a>
                    <div class="exploer-icons-inner delete-icon propertyDelete" data-value="{{ $hotel->UUID }}">
                        <i class="fa-regular fa-trash-can"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
    {{-- FOR EMPTY TABLE --}}
    <div class="noFound_search">
        <div class="text-center">
            <img src="{{asset('assets/images/find-hote-img.png')}}" class="img-fluid">
        </div>
        <p class="mb-o text-center">No Hotel Found</p>
    </div>
@endforelse

<div class="popupImage">
    @if (isset($hotelPhotos))
        @include('usersite::home.popup-image')
    @endif
</div>

@push('scripts')
    {{-- <script src="{{ asset('assets/js/custom.js') }}"></script> --}}
    <script>
        function slider() {
            $('.slider-single').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                loop: true,
                draggable: false,
                fade: true,
                asNavFor: '.slider-nav'
            });
            $('.slider-nav').slick({
                slidesToShow: 10,
                slidesToScroll: 1,
                // infinite: true,
                speed: 500,
                asNavFor: '.slider-single',
                dots: false,
                loop: true,
                arrows: false,
                // autoplay: true,
                // autoplaySpeed: 1500,
                draggable: true,
                centerMode: true,
                focusOnSelect: true,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 8,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 7,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 6,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 5,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 360,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        },
                    },
                ],
            });
        }

        $(document).on('click', '.image-close', function() {
            $('.popupImage').prop("disabled", false);
        });

        $(document).on('click', '.albumBtn', function() {
            $(this).prop("disabled", true);
            var id = $(this).data('id');

            formdata = new FormData();
            formdata.append('id', id);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('show.image') }}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formdata,
                success: function(response) {
                    $('.popupImage').html(response);
                    $('.slick-prev').trigger('click');
                    $('.img-popup-slider').modal('show');
                    slider();
                },
                error: function(response) {

                }
            });
        });
    </script>
@endpush
