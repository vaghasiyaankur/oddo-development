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
    </style>
@endpush

@forelse ($hotels as $hotel)
<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="share-section mb-5">
            <div class="drag-section justify-content-between flex-wrap">
                <div class="d-flex align-items-center mb-3 mb-lg-0">
                    @if (@$hotel->mainPhoto->first()->photos)
                        <img src="{{asset('storage/'.@$hotel->mainPhoto->first()->photos)}}" alt="" class="drag-image">
                    @else
                        <img src="{{asset('assets/images/default-image.png')}}" alt="default" class="drag-image">
                    @endif
                    
                    <span>
                        <h2 class="property-subtitle-text">{{$hotel->property_name}}</h2>
                    </span>
                </div>
                <div class="upload-delete-button-step d-flex justify-content-between flex-wrap">
                    @if ($hotel->photo)
                        <a href="javascript:;" class="white-button-step px-3 py-2 d-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#image_{{ $hotel->UUID }} ">Albums</a>
                    @endif
                    <a href="javascript:;" class="white-button-step px-3 py-2 d-flex align-items-center me-2">Preview</a>
                    <a href="{{route('basic-info', ['id' => $hotel->UUID])}}"
                        class="white-button-step py-2 d-flex align-items-center me-2 px-3">Edit Property</a>
                    <a href="javascript:;" class="white-button-step px-3 py-2 d-flex align-items-center propertyDelete"
                        data-value="{{ $hotel->UUID }}">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>

  <!------- img slider popup start -------->
  <div class="modal fade img-popup-slider" id="image_{{ $hotel->UUID }}" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <button type="button" data-bs-dismiss="modal" class="modal-close"
                    aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body display-flex-items py-sm-5">
                <div class="img-swiper">
                    <div class="slider slider-single mb-5">
                        @foreach ($hotel->photos as $photo)
                            <div class="slider-single-img"><img
                                    src="{{ asset('storage/' . @$photo->photos) }}"
                                    alt="" style="width: 857px; height: 551px;">
                            </div>
                        @endforeach
                    </div>
                    <div class="slider slider-nav">
                        @foreach ($hotel->photos as $photo)
                            <div class="slder-nav-img d-block"><img
                                    src="{{ asset('storage/' . @$photo->photos) }}"
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
@empty
{{-- FOR EMPTY TABLE --}}
<main data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1000"
    class="d-flex justify-content-center align-items-center result-main-content border-semidark mt-4" style="    overflow: hidden;">
    <div class="result-main-inner d-flex align-items-center justify-content-center" style="width: 966px;height: 345px;">
        <div class="empty-table w-100 text-center py-5">
            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
            </lord-icon>
            <h4>No records has been added yet.</h4>
            <h6>Add a new Property by simpley clicking the button.</h6>
            <div class="another-c-details mt-4">
                <a href="{{route('property-category')}}" class="btn another-c-d-btn"
                    style="background-color: #6A78C7 !important; color: white;white-space:nowrap;">Add Property</a>
            </div>
        </div>
    </div>
</main>
@endforelse

@push('scripts')
{{-- <script src="{{ asset('assets/js/custom.js') }}"></script> --}}
    <script>
        $('.slider-single').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            loop: true,
            arrows: true,
            draggable: false,
            fade: true,
            asNavFor: '.slider-nav'
        });

        $('.slider-nav').slick({
            slidesToShow: 10,
            slidesToScroll: 1,
            asNavFor: '.slider-single',
            dots: false,
            loop: true,
            draggable: false,
            centerMode: true,
            focusOnSelect: true,
            responsive: [
                {
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
    </script>
@endpush